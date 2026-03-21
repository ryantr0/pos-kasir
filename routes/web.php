<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PurchaseController;
use App\Models\Product;
use App\Http\Controllers\AIChatController;

// 1. Landing Page
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// 2. Group Middleware Auth (Semua route di dalam sini aman)
Route::middleware(['auth'])->group(function () {

    // DASHBOARD - Logic Fill Gaps Rp 0
    Route::get('/dashboard', function (Request $request) {
        $start = $request->get('start_date', now()->subDays(6)->format('Y-m-d'));
        $end = $request->get('end_date', now()->format('Y-m-d'));

        // Ambil data asli dari DB
        $rawSales = \App\Models\Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->whereBetween('created_at', [$start . ' 00:00:00', $end . ' 23:59:59'])
            ->groupBy('date')
            ->pluck('total', 'date');

        // Logika Fill Gaps (Agar tanggal kosong muncul Rp 0)
        $salesData = collect();
        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1D'),
            (new DateTime($end))->modify('+1 day')
        );

        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');
            $salesData->push([
                'date'  => $formattedDate,
                'total' => $rawSales[$formattedDate] ?? 0 
            ]);
        }

        return view('dashboard', [
            'totalProduk'       => \App\Models\Product::count(),
            'totalKategori'     => \App\Models\Category::count(),
            'pendapatanHariIni' => \App\Models\Order::whereDate('created_at', today())->sum('total_price') ?? 0,
            'transaksiHariIni'  => \App\Models\Order::whereDate('created_at', today())->count(),
            'transaksiTerbaru'  => \App\Models\Order::latest()->take(5)->get(),
            'salesData'         => $salesData,
            'produkTerlaris'    => \App\Models\Product::orderBy('sold', 'desc')->take(5)->get(),
            'stokMenipis'       => Product::where('stock', '<=', 5)->get(),
            'start'             => $start, 
            'end'               => $end,
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

        Route::get('/api/categories/{id}/products', function ($id) {
        return Product::where('category_id', $id)->get();
    });
    
    Route::post('/ai/ask', [AIChatController::class, 'ask'])->name('ai.ask');
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


    Route::get('/purchases/download-pdf', [PurchaseController::class, 'downloadPDF'])->name('purchases.pdf');
    Route::resource('purchases', PurchaseController::class);
});

    Route::get('/tutorial', function () {
        return view('tutorial.index');
    })->name('tutorial.index');

require __DIR__.'/auth.php';