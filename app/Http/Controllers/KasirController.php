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
    $request->validate([
        'customer' => 'required',
        'total_price' => 'required|numeric',
        'items' => 'required|array',
        'payment_method' => 'required',
    ]);

    try {
        return DB::transaction(function () use ($request) {
            // Simpan ke tabel orders
            $order = \App\Models\Order::create([
                'customer' => $request->customer,
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'user_id' => auth()->id() ?? 1, // Pastikan ada ID user
            ]);

            foreach ($request->items as $item) {
                $product = \App\Models\Product::find($item['id']);
                if ($product) {
                    // Update stok
                    $product->decrement('stock', $item['qty']);
                    $product->increment('sold', $item['qty']);

                    // Simpan detail sesuai image_3f1087.png
                    DB::table('order_details')->insert([
                        'order_id'   => $order->id,
                        'product_id' => $product->id,
                        'quantity'   => $item['qty'],
                        'price'      => $product->price, // Pakai harga dari produk
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Berhasil!']);
        });
    } catch (\Exception $e) {
        // Biar Abang tau error aslinya di tab Response Inspect Element
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
}







}