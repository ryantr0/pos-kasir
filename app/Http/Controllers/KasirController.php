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
    try {
        // Cek dulu, datanya masuk gak dari depan?
        if (!$request->has('items') || empty($request->items)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Keranjang belanja kosong, Bang! Pilih produk dulu.'
            ], 422);
        }

        return DB::transaction(function () use ($request) {
            // 1. Simpan ke tabel orders
            $order = \App\Models\Order::create([
                'customer' => $request->customer ?? 'Pelanggan Umum',
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'user_id' => auth()->id() ?? 1, 
            ]);

            // 2. Simpan Detail
            foreach ($request->items as $item) {
                // Pastikan nama key 'id', 'qty', dan 'price' sesuai dengan yang dikirim JS Abang
                DB::table('order_details')->insert([
                    'order_id'   => $order->id,
                    'product_id' => $item['id'],
                    'quantity'   => $item['qty'],
                    'price'      => $item['price'] ?? 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // 3. Update Stok (Pakai optional biar gak crash kalau ID produk ngaco)
                $product = \App\Models\Product::find($item['id']);
                if ($product) {
                    $product->decrement('stock', $item['qty']);
                    $product->increment('sold', $item['qty']);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Mantap, Transaksi Berhasil!']);
        });

    } catch (\Exception $e) {
        // Balikin error asli biar kita bisa baca di tab Response
        return response()->json([
            'status' => 'error',
            'message' => 'Ada yang meledak: ' . $e->getMessage()
        ], 500);
    }
}







}