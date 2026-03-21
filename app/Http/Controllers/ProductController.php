<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Wajib import Model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
        public function index(Request $request)
        {
            // 1. Mulai query dengan eager loading 'category' (Tetap seperti kode Abang)
            $query = \App\Models\Product::with('category');

            // 2. LOGIKA TAMBAHAN: Filter category_id (Tetap dipertahankan sesuai request Abang)
            if ($request->has('category_id') && $request->category_id != '') {
                $query->where('category_id', $request->category_id);
            }

            // 3. Ambil data terbaru (Pastikan kolom 'stock' sudah ada di database)
            $products = $query->latest()->get();
            
            // 4. Ambil semua data kategori untuk label filter (Tetap dipertahankan)
            $categories = \App\Models\Category::all();

            return view('products.index', compact('products', 'categories'));
        }

    public function create()
    {
        // Ambil semua data kategori untuk ditampilkan di dropdown form tambah
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'price'       => 'required|numeric',
        'stock'       => 'required|numeric|min:0', // TAMBAHKAN VALIDASI STOK
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Tambahkan 'stock' ke dalam array only agar bisa disimpan
    $data = $request->only(['name', 'price', 'stock', 'category_id', 'description']);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    \App\Models\Product::create($data);

    return redirect()->route('products.index')->with('success', 'PRODUK BERHASIL DISIMPAN!');
}

public function edit(Product $product)
    {
        // Ambil semua kategori untuk dropdown di form edit (Sudah Benar)
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

public function update(Request $request, Product $product)
{
    // 1. Validasi data
    $validatedData = $request->validate([
        'name'        => 'required|string|max:255',
        'price'       => 'required|numeric',
        'stock'       => 'required|integer|min:0', 
        'category_id' => 'required|exists:categories,id', 
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'is_ready'    => 'required|in:0,1' // Tambahkan ini agar validasi select-nya ketat
    ]);

    // 2. Logika hapus & simpan gambar (Sudah benar sesuai kode Abang)
    if ($request->hasFile('image')) {
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }
        $validatedData['image'] = $request->file('image')->store('products', 'public');
    }

    // 3. LOGIKA KUNCI: Menentukan is_ready (DIUBAH AGAR BISA BACA SELECT)
    // Pakai input() karena select dropdown selalu mengirimkan nilai, bukan cek keberadaan (has)
    $validatedData['is_ready'] = $request->input('is_ready');

    // 4. Update semua data (Sekarang stok dan status ready sudah sinkron)
    $product->update($validatedData);

    return redirect()->route('products.index')->with('success', 'PRODUK BERHASIL DIUPDATE!');
}

public function destroy(Product $product)
{
    // Logika hapus (Sudah benar, tidak saya ubah)
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    $product->delete();
    return redirect()->route('products.index')->with('success', 'PRODUK BERHASIL DIHAPUS!');
}
}