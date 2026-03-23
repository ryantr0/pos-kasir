<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category; // 1. WAJIB TAMBAH INI
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // 2. WAJIB TAMBAH INI BUAT TANGGAL

class KasirController extends Controller
{
    public function index()
{
    $products = \App\Models\Product::with('category')->get();
    // Tambahin ini biar filter kategori di Blade lo jalan
    $categories = \App\Models\Category::all(); 

    return view('kasir.index', compact('products', 'categories'));
}

    public function dashboard()
    {
        // Ambil data dasar
        $totalProduk = Product::count();
        $totalKategori = Category::count();

        // Ambil data hari ini
        $pendapatanHariIni = Order::whereDate('created_at', Carbon::today())->sum('total_price') ?? 0;
        $transaksiHariIni = Order::whereDate('created_at', Carbon::today())->count() ?? 0;

        // Data Transaksi Terbaru buat tabel
        $transaksiTerbaru = Order::latest()->take(5)->get();

        // Data buat Chart (7 hari terakhir)
        $salesData = Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Produk Terlaris
        $produkTerlaris = Product::orderBy('sold', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'totalProduk', 
            'totalKategori', 
            'pendapatanHariIni', 
            'transaksiHariIni',
            'transaksiTerbaru',
            'salesData',
            'produkTerlaris'
        ));
    }

    public function store(Request $request) {
    // 1. Validasi Input
    $request->validate([
        'customer' => 'required|string|max:255', 
        'total_price' => 'required|numeric',
        'items' => 'required|array',
        'payment_method' => 'required', 
    ]);

    // 2. CEK LOGIN (PENTING!)
    if (!auth()->check()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Sesi berakhir, silakan login ulang sebagai kasir!'
        ], 401);
    }

    try {
        DB::transaction(function () use ($request) {
            // 3. Simpan ke tabel 'orders'
            // Pastikan Model Order merujuk ke tabel 'orders'
            $order = \App\Models\Order::create([
                'customer' => $request->customer, 
                'total_price' => $request->total_price,
                'user_id' => auth()->id(), // Sekarang aman karena sudah dicek di atas
                'payment_method' => $request->payment_method,
            ]);

            foreach ($request->items as $item) {
                $product = \App\Models\Product::find($item['id']);
                
                if ($product) {
                    // Cek stok cukup gak?
                    if ($product->stock < $item['qty']) {
                        throw new \Exception("Stok produk {$product->name} tidak cukup!");
                    }

                    // 4. Update Stok dan Terjual
                    $product->decrement('stock', $item['qty']); 
                    $product->increment('sold', $item['qty']);
                    
                    // 5. Simpan ke tabel order_details
                    // NOTE: Pastikan di Model Order sudah ada function items()
                    DB::table('order_details')->insert([
                        'order_id'   => $order->id,
                        'product_id' => $product->id,
                        'quantity'   => $item['qty'],
                        'price'      => $product->price,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi Berhasil untuk ' . $request->customer
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal: ' . $e->getMessage() // Ini bakal kasih tau error DB aslinya
        ], 500);
    }
}







}