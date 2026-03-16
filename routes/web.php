<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\KasirController;

// Redirect ke login jika belum ada session, atau ke dashboard jika sudah login
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // DASHBOARD - Data Asli buat Statistik & Diagram
    Route::get('/dashboard', function () {
        $salesData = \App\Models\Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        return view('dashboard', [
            'totalProduk'      => \App\Models\Product::count(),
            'totalKategori'    => \App\Models\Category::count(),
            'pendapatanHariIni' => \App\Models\Order::whereDate('created_at', today())->sum('total_price') ?? 0,
            'transaksiHariIni' => \App\Models\Order::whereDate('created_at', today())->count(),
            'transaksiTerbaru' => \App\Models\Order::latest()->take(5)->get(),
            'salesData'        => $salesData,
            'produkTerlaris'   => \App\Models\Product::orderBy('sold', 'desc')->take(3)->get(),
        ]);
    })->name('dashboard');

    // POS / KASIR
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
    Route::post('/kasir/store', [KasirController::class, 'store'])->name('kasir.store');

    // MANAJEMEN DATA (Produk & Kategori)
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    // LAPORAN & PENGELUARAN
    Route::get('/laporan', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/laporan/pdf', [ReportController::class, 'downloadPDF'])->name('reports.pdf');
    Route::resource('expenses', ExpenseController::class);
    

    // PROFILE SETTINGS
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    

}); // Penutup Middleware Group yang bener

require __DIR__.'/auth.php';


    // CRUD Produk
    Route::resource('products', ProductController::class);

    // CRUD Kategori - Menambahkan route untuk kategori produk baru Abang
    Route::resource('categories', CategoryController::class);

    // Route Kasir (Halaman POS)
    Route::middleware(['auth'])->group(function () {
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
    Route::post('/kasir/store', [KasirController::class, 'store'])->name('kasir.store');
});
    // Laporan Keuangan - Menggunakan Controller agar filter harian/mingguan jalan
    Route::get('/laporan', [ReportController::class, 'index'])->name('reports.index');
    // Route Pengeluaran Manual (Opsional, buat nyatet belanja produk)
    Route::resource('expenses', \App\Http\Controllers\ExpenseController::class);
    Route::get('/laporan/pdf', [ReportController::class, 'downloadPDF'])->name('reports.pdf');  
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

    Route::middleware(['auth'])->group(function () {
    Route::get('/laporan', [ReportController::class, 'index'])->name('reports.index');
});


    // Profile Management
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';