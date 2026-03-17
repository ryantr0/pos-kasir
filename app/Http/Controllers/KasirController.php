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
    // 1. Validasi tetap sama (Ditambahkan validasi payment_method agar aman)
    $request->validate([
        'customer' => 'required|string|max:255', 
        'total_price' => 'required|numeric',
        'items' => 'required|array',
        'payment_method' => 'required', // <--- Tambahkan ini agar wajib milih CASH/QRIS
    ]);

    try {
        \DB::transaction(function () use ($request) {
            // 2. Simpan order dengan tambahan user_id dan payment_method
            $order = \App\Models\Order::create([
                'customer' => $request->customer, 
                'total_price' => $request->total_price,
                'user_id' => auth()->id(), 
                'payment_method' => $request->payment_method, // <--- INI KUNCINYA: Biar QRIS masuk laporan!
            ]);

            foreach ($request->items as $item) {
                $product = \App\Models\Product::find($item['id']);
                
                if ($product) {
                    // 3. Update Stok dan Terjual
                    $product->decrement('stock', $item['qty']); 
                    $product->increment('sold', $item['qty']);
                    
                    // 4. Simpan ke tabel order_details lewat relasi
                    $order->items()->create([
                        'product_id' => $product->id,
                        'quantity'   => $item['qty'],
                        'price'      => $product->price,
                    ]);
                }
            }
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi Berhasil, data ' . $request->customer . ' sudah tercatat!'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal simpan transaksi: ' . $e->getMessage()
        ], 500);
    }
}







}