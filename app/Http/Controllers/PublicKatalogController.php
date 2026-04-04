<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class PublicKatalogController extends Controller
{
    public function index()
    {
        // Ambil produk yang statusnya aktif/stok ada, urutkan dari yang terbaru
        $products = Product::where('stock', '>', 0)
                            ->with('category')
                            ->latest()
                            ->get();

        $categories = Category::all();

        return view('public.menu', compact('products', 'categories'));
    }
}
