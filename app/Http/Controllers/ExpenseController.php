<?php

namespace App\Http\Controllers;

use App\Models\Expense; // Import model Expense
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Menampilkan form tambah pengeluaran.
     */
    public function create()
    {
        return view('expenses.create'); // Pastiin file blade lo ada di folder expenses
    }

    /**
     * Menyimpan data pengeluaran baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input biar gak ada data kosong yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        // Simpan ke database
        Expense::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        // Balik ke halaman laporan dengan pesan sukses
        return redirect()->route('reports.index')
            ->with('success', 'Pengeluaran "' . $request->name . '" berhasil dicatat, Bang!');
    }
}