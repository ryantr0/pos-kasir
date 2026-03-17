<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Wajib import Model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request) // Tambahkan parameter $request di sini
    {
        // Mulai query dengan eager loading 'category'
        $query = Product::with('category');

        // LOGIKA TAMBAHAN: Cek apakah ada filter category_id dari halaman kategori
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->latest()->get();
        
        // Ambil semua data kategori untuk dikirim ke view (berguna untuk label filter)
        $categories = Category::all();

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
            'category_id' => 'required|exists:categories,id', // Validasi harus ada di tabel categories
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'category_id', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        \App\Models\Product::create($data);

        return redirect()->route('products.index')->with('success', 'PRODUK BERHASIL DISIMPAN!');
    }

    public function edit(Product $product)
    {
        // Ambil semua kategori untuk dropdown di form edit
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // Ubah 'category' menjadi 'category_id'
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'category_id' => 'required|exists:categories,id', 
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'PRODUK BERHASIL DIUPDATE!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'PRODUK BERHASIL DIHAPUS!');
    }
}