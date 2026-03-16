<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Tampilkan daftar kategori
     */
    public function index()
    {
        // Ambil semua kategori dan hitung jumlah produk di dalamnya
        $categories = Category::withCount('products')->latest()->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Simpan kategori baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Buat slug otomatis dari nama
        ]);

        return redirect()->route('categories.index')->with('success', 'KATEGORI BERHASIL DITAMBAHKAN!');
    }

    /**
     * Hapus kategori
     */
    public function destroy(Category $category)
    {
        // Cek jika kategori masih punya produk, opsional bisa dicegah hapus
        if ($category->products()->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'Kategori tidak bisa dihapus karena masih memiliki produk!');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'KATEGORI BERHASIL DIHAPUS!');
    }
}