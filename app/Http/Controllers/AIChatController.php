<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AIChatController extends Controller
{ 
    public function ask(Request $request)
    {
        try {
            $apiKey = env('GROQ_API_KEY');
            $userMsg = strtolower($request->message); 
            $today = Carbon::today()->toDateString();

          // --- 1. DETEKSI TANGGAL (WAJIB PALING ATAS & FIX) ---
            $startDate = null;

            // Perbaikan: Cek kata kunci "tanggal" dulu baru ambil angkanya 
            // Agar angka stok/harga di chat tidak sengaja terbaca sebagai tanggal
            if (preg_match('/tanggal\s+(\d+)/', $userMsg, $matches)) {
                $day = str_pad($matches[1], 2, '0', STR_PAD_LEFT);
                $startDate = Carbon::now()->format('Y-m') . "-" . $day;
            } 
            // Jika tidak ada kata "tanggal", tapi ada angka murni (misal: "belanja 20")
            elseif (preg_match('/\d+/', $userMsg, $matches)) {
                $day = str_pad($matches[0], 2, '0', STR_PAD_LEFT);
                $startDate = Carbon::now()->format('Y-m') . "-" . $day;
            }
            // Cek kata "kemarin"
            elseif (str_contains($userMsg, 'kemarin')) {
                $startDate = Carbon::yesterday()->toDateString();
            }

            // VARIABEL INI KUNCINYA, BANG! (Pakai $targetDate untuk semua query di bawah)
            $targetDate = $startDate ?? $today; 

            // --- 2. DATA DASAR (Kategori & Stok) ---
            $allCategories = Category::all()->pluck('name')->toArray(); 
            $listKategori = empty($allCategories) ? "Belum ada kategori" : implode(', ', $allCategories);

            $productStatus = Product::all()->map(function($p) {
                return [
                    'nama' => $p->name,
                    'stok' => (int)$p->stock,
                    'status' => (bool)$p->is_ready ? 'Tersedia' : 'Kosong',
                    'harga' => (int)$p->price
                ];
            });

            // --- 3. DATA BELANJA BARANG (Purchases) ---
            $historyPurchases = [];
            $totalNominalBelanjaStok = 0; 

            try {
                // Kita pakai $targetDate yang sudah didapat dari Blok 1 (sama kyk Expenses)
                $totalNominalBelanjaStok = DB::table('purchases')
                    ->whereDate('created_at', $targetDate)
                    ->sum('total_price') ?? 0;

                $purchaseData = DB::table('purchases')
                    ->select('item_name', 'category', 'description', 'total_price', 'purchase_date')
                    ->whereDate('created_at', $targetDate) // Filter tanggal yang BENAR
                    ->orderBy('created_at', 'desc')
                    ->get();

                foreach ($purchaseData as $row) {
                    $tampilkanKategori = $row->category ?: ($row->description ?: 'Lainnya');
                    $nama = $row->item_name;
                    $harga = number_format($row->total_price, 0, ',', '.');
                    
                    // Format ini yang bakal dibaca AI di bagian Context
                    $historyPurchases[] = "- $nama ($tampilkanKategori) seharga Rp$harga";
                }
            } catch (\Exception $e) { 
                $historyPurchases[] = "Gagal ambil data belanja: " . $e->getMessage(); 
            }

            // --- 4. DATA PENGELUARAN OPERASIONAL (Expenses) ---
            $historyExpenses = [];
            $totalBiayaHariIni = 0; 
            try {
                $totalBiayaHariIni = DB::table('expenses')
                    ->whereDate('created_at', $today)
                    ->sum('amount') ?? 0;

                $expenseData = DB::table('expenses')
                    ->select('name', 'amount', 'description', DB::raw('DATE(created_at) as tgl'))
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();
                foreach ($expenseData as $row) {
                    $historyExpenses[] = "[$row->tgl] Biaya: $row->name - Rp" . number_format($row->amount, 0, ',', '.');
                }
            } catch (\Exception $e) { $historyExpenses[] = "-"; }

            // --- 5. ANALISA PENJUALAN & PELANGGAN ---

            $totalTerjualHariIni = DB::table('order_details')
                ->whereDate('created_at', $today)
                ->sum('quantity') ?? 0;

            $topCustomerToday = DB::table('orders')
                ->select('customer', DB::raw('SUM(total_price) as total_duit'))
                ->whereDate('created_at', $today)
                ->groupBy('customer')
                ->orderBy('total_duit', 'desc')
                ->first();
            $namaJuaraHariIni = $topCustomerToday ? $topCustomerToday->customer . " (Total belanja hari ini: Rp" . number_format($topCustomerToday->total_duit, 0, ',', '.') . ")" : "Belum ada transaksi hari ini";

            $topCustomers = DB::table('orders')
                ->select('customer', DB::raw('COUNT(*) as total_order'), DB::raw('SUM(total_price) as total_duit'))
                ->groupBy('customer')
                ->orderBy('total_duit', 'desc')
                ->limit(3)->get()
                ->map(fn($c) => "$c->customer ($c->total_order kali beli, total Rp".number_format($c->total_duit,0,',','.').")")
                ->toArray();

            $pendapatanHariIni = DB::table('orders')->whereDate('created_at', $today)->sum('total_price') ?? 0;
            $pendapatanBersihHariIni = $pendapatanHariIni - $totalBiayaHariIni;

            $historyIncome = DB::table('orders')
                ->select(DB::raw('DATE(created_at) as tgl'), DB::raw('SUM(total_price) as total'))
                ->where('created_at', '>=', now()->subDays(7))
                ->groupBy('tgl')->get()
                ->map(fn($row) => "$row->tgl: Rp" . number_format($row->total, 0, ',', '.'))
                ->toArray();

            $topProduct = DB::table('order_details')
                ->join('products', 'order_details.product_id', '=', 'products.id')
                ->select('products.name', DB::raw('SUM(order_details.quantity) as total_qty'))
                ->groupBy('products.name', 'order_details.product_id')
                ->orderBy('total_qty', 'desc')->first();
            $produkTerlaris = $topProduct ? "$topProduct->name (Terjual total $topProduct->total_qty pcs)" : "Belum ada data penjualan";

            $detailLaku = DB::table('order_details')
                ->join('products', 'order_details.product_id', '=', 'products.id')
                ->whereDate('order_details.created_at', $today)
                ->select('products.name', DB::raw('SUM(order_details.quantity) as qty'))
                ->groupBy('products.name')
                ->get()
                ->map(fn($item) => "$item->name ($item->qty pcs)")
                ->toArray();
            $listBarangLaku = empty($detailLaku) ? "Belum ada barang terjual" : implode(', ', $detailLaku);

            $totalQrisHariIni = DB::table('orders')
                ->whereDate('created_at', $today)
                ->where('payment_method', 'QRIS')
                ->sum('total_price') ?? 0;

            // --- PERBAIKAN LOGIC FILTER TANGGAL (FIX UNTUK TANGGAL TUNGGAL & RANGE) ---
            $customRangeQris = 0;
            $customRangeTopProduct = "Belum ada data";
            $customRangeTopCustomer = "Belum ada data";
            $rangeText = "Tidak ada";
            
            preg_match_all('/\d+/', $userMsg, $matches);
            if (count($matches[0]) > 0) {
                $monthYear = Carbon::now()->format('Y-m');
                
                if (count($matches[0]) >= 2) {
                    // Jika ada 2 angka (contoh: 17 sampai 20)
                    $dayStart = str_pad($matches[0][0], 2, '0', STR_PAD_LEFT);
                    $dayEnd = str_pad($matches[0][1], 2, '0', STR_PAD_LEFT);
                    $start = "$monthYear-$dayStart";
                    $end = "$monthYear-$dayEnd";
                    $rangeText = "$start sampai $end";
                } else {
                    // Jika hanya ada 1 angka (contoh: tanggal 17)
                    $day = str_pad($matches[0][0], 2, '0', STR_PAD_LEFT);
                    $start = "$monthYear-$day";
                    $end = "$monthYear-$day";
                    $rangeText = "Tanggal $start";
                }

                $customRangeQris = DB::table('orders')
                    ->whereBetween(DB::raw('DATE(created_at)'), [$start, $end])
                    ->where('payment_method', 'QRIS')
                    ->sum('total_price') ?? 0;

                $topProductRange = DB::table('order_details')
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->select('products.name', DB::raw('SUM(order_details.quantity) as total_qty'))
                    ->whereBetween(DB::raw('DATE(order_details.created_at)'), [$start, $end])
                    ->groupBy('products.name', 'order_details.product_id')
                    ->orderBy('total_qty', 'desc')->first();
                
                if ($topProductRange) {
                    $customRangeTopProduct = "$topProductRange->name (Laku $topProductRange->total_qty pcs)";
                }

                // --- TAMBAHAN: Query Pembeli Terbanyak di Tanggal/Range tersebut ---
                $topCustRange = DB::table('orders')
                    ->select('customer', DB::raw('SUM(total_price) as total_duit'))
                    ->whereBetween(DB::raw('DATE(created_at)'), [$start, $end])
                    ->groupBy('customer')
                    ->orderBy('total_duit', 'desc')
                    ->first();
                
                if ($topCustRange) {
                    $customRangeTopCustomer = "$topCustRange->customer (Total: Rp" . number_format($topCustRange->total_duit, 0, ',', '.') . ")";
                } else {
                    $customRangeTopCustomer = "Tidak ada data pembeli";
                }
            }
                    
            // --- 6. RAKIT CONTEXT ---
            $context = "
            KATEGORI: $listKategori
            RINGKASAN KEUANGAN HARI INI ($today):
            - Total Pendapatan Kotor: Rp" . number_format($pendapatanHariIni, 0, ',', '.') . "
            - TOTAL BELANJA BARANG (DARI PURCHASES): Rp" . number_format($totalNominalBelanjaStok, 0, ',', '.') . "
            - Total Biaya / Pengeluaran (DARI EXPENSES): Rp" . number_format($totalBiayaHariIni, 0, ',', '.') . "
            - PENDAPATAN BERSIH (Profit): Rp" . number_format($pendapatanBersihHariIni, 0, ',', '.') . "
            - Total Pendapatan QRIS HARI INI: Rp" . number_format($totalQrisHariIni, 0, ',', '.') . "
            
            DATA REQUEST TANGGAL KHUSUS (PENTING):
            - Range yang terdeteksi: $rangeText
            - Total QRIS di Range tersebut: Rp" . number_format($customRangeQris, 0, ',', '.') . "
            - PRODUK TERLARIS DI RANGE INI: $customRangeTopProduct
            - PEMBELI TERBANYAK DI RANGE INI: $customRangeTopCustomer

            STATISTIK PRODUK & PELANGGAN:
            - Produk Terjual Hari Ini: $totalTerjualHariIni pcs ($listBarangLaku)
            - PEMBELI TERBANYAK HARI INI: $namaJuaraHariIni
            - PRODUK TERLARIS UMUM: $produkTerlaris
            - PELANGGAN TERLOYAL (TOP 3 UMUM): " . (empty($topCustomers) ? 'Belum ada data' : implode(' | ', $topCustomers)) . "
            
            STOK PRODUK: " . $productStatus->toJson() . "
            RINCIAN ITEM BELANJA STOK (PURCHASES): 
            " . (empty($historyPurchases) ? '-' : implode("\n", $historyPurchases)) . "
            
            RINCIAN BIAYA PENGELUARAN (EXPENSES): 
            " . (empty($historyExpenses) ? '-' : implode("\n", $historyExpenses)) . "
            
            HISTORY PENDAPATAN 7 HARI: " . implode(', ', $historyIncome);
           // --- 7. REQUEST KE AI ---
            $response = Http::withoutVerifying()->timeout(30)
                ->withHeaders(['Authorization' => 'Bearer ' . $apiKey])
                ->post("https://api.groq.com/openai/v1/chat/completions", [
                    'model' => 'llama-3.3-70b-versatile',
                    'messages' => [
                        [
                            'role' => 'system', 
                            'content' => "Kamu RZ Assistant. Panggil 'Bang'. Jawab langsung ke intinya, singkat, dan padat.
                            Gunakan data: $context. 
                            
                            Aturan Jawaban:
                            1. Jika tanya belanja hari ini, SEBUTKAN DAFTARNYA (Nama Barang, Kategori, dan Harga) dari 'RINCIAN ITEM BELANJA STOK (PURCHASES)'.
                            2. Jangan bertele-tele menjelaskan asal data.
                            3. Jika tidak ada belanja, bilang 'Belum ada belanja hari ini, Bang'.
                            4. Gunakan format: 'Hari ini belanja: [Nama Barang] ([Kategori]) - [Harga]'.",
                        ],
                        ['role' => 'user', 'content' => $userMsg]
                    ],
                    'temperature' => 0.1
                ]);

            $result = $response->json()['choices'][0]['message']['content'] ?? 'Error koneksi Bang.';
            return response()->json(['answer' => trim($result)]);

        } catch (\Exception $e) {
            Log::error("Chat Error: " . $e->getMessage());
            return response()->json(['answer' => 'Eror Bang: ' . $e->getMessage()]);
        }
    }
}