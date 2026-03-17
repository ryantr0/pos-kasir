<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product; // Tetap di-import jika sewaktu-waktu butuh
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    // Menampilkan riwayat belanja
    public function index()
    {
        // Menghapus 'with(product)' karena abang sekarang pakai input manual 'item_name'
        $purchases = Purchase::latest()->get();
        $products = Product::all(); 
        return view('purchases.index', compact('purchases', 'products'));
    }

    // Menyimpan data belanja
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        // Logika perhitungan total_price sudah benar
        Purchase::create([
            'item_name' => $request->item_name, 
            'qty' => $request->qty,
            'description' => $request->description,
            'purchase_price' => $request->purchase_price,
            'total_price' => $request->qty * $request->purchase_price,
            'purchase_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Catatan belanja disimpan!');
    }

    // Menghapus riwayat belanja
    public function destroy(Purchase $purchase)
    {
        /** * PERBAIKAN: 
         * Karena abang menggunakan input manual 'item_name', kolom 'product_id' di tabel belanja biasanya kosong atau null.
         * Ini yang menyebabkan error "decrement on null" di screenshot abang.
         */
        
        // Kita hapus saja catatannya tanpa mengganggu stok karena ini input belanja bebas
        $purchase->delete();
        
        return redirect()->back()->with('success', 'Catatan belanja berhasil dihapus.');
    }

    public function downloadPDF()
    {
        $purchases = Purchase::latest()->get();
        $pdf = Pdf::loadView('purchases.pdf', compact('purchases'));
        return $pdf->download('riwayat-belanja-warung-rz.pdf');
    }
}