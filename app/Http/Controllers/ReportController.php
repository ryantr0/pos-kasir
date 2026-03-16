<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
{
    // 1. Ambil filter dari URL (default: daily)
    $filter = $request->get('filter', 'daily');
    $now = \Carbon\Carbon::now();

    // 2. Inisialisasi Query
    $revenueQuery = \App\Models\Order::query();
    $expenseQuery = \App\Models\Expense::query();
    // Tambahan: Query untuk Produk Terjual
    $soldProductsQuery = \App\Models\OrderDetail::query();

    // 3. Logic Filter Waktu
    if ($filter == 'daily') {
        $today = \Carbon\Carbon::today();
        $revenueQuery->whereDate('created_at', $today);
        $expenseQuery->whereDate('date', $today);
        
        // Filter untuk produk terjual (lewat relasi order)
        $soldProductsQuery->whereHas('order', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        });
    } elseif ($filter == 'weekly') {
        $start = $now->copy()->startOfWeek()->toDateTimeString();
        $end = $now->copy()->endOfWeek()->toDateTimeString();
        
        $revenueQuery->whereBetween('created_at', [$start, $end]);
        $expenseQuery->whereBetween('date', [substr($start, 0, 10), substr($end, 0, 10)]);

        $soldProductsQuery->whereHas('order', function($q) use ($start, $end) {
            $q->whereBetween('created_at', [$start, $end]);
        });
    } elseif ($filter == 'monthly') {
        $month = $now->month;
        $year = $now->year;
        
        $revenueQuery->whereMonth('created_at', $month)->whereYear('created_at', $year);
        $expenseQuery->whereMonth('date', $month)->whereYear('date', $year);

        $soldProductsQuery->whereHas('order', function($q) use ($month, $year) {
            $q->whereMonth('created_at', $month)->whereYear('created_at', $year);
        });
    }

    // 4. AMBIL DETAIL DATA
    $revenueDetails = $revenueQuery->with(['items.product'])->latest()->get();
    $expenseDetails = $expenseQuery->latest()->get();

    // Tambahan: Ambil Rangkuman Produk Terjual (Live Update)
    $soldProducts = $soldProductsQuery->select('product_id', \DB::raw('SUM(quantity) as total_qty'))
                        ->with('product.category') // Sekalian ambil kategori produknya
                        ->groupBy('product_id')
                        ->orderBy('total_qty', 'desc')
                        ->get();

    // 5. Hitung Totalnya
    $totalRevenue = $revenueQuery->sum('total_price') ?? 0;
    $totalExpense = $expenseQuery->sum('amount') ?? 0;
    $grossProfit = $totalRevenue; 
    $netProfit = $totalRevenue - $totalExpense;

    // 6. Lempar SEMUA data ke Blade
    return view('reports.index', compact(
        'totalRevenue', 
        'totalExpense', 
        'grossProfit', 
        'netProfit', 
        'filter',
        'revenueDetails',
        'expenseDetails',
        'soldProducts' // Jangan lupa variabel baru ini dikirim ke blade
    ));
}


    public function downloadPDF(Request $request) 
{
    $filter = $request->get('filter', 'daily');
    $now = Carbon::now();
    $queryRevenue = Order::query();
    $queryExpense = Expense::query();

    // Logic Filter (Sama kayak index biar sinkron)
    if ($filter == 'daily') {
        $queryRevenue->whereDate('created_at', today());
        $queryExpense->whereDate('date', today());
    } elseif ($filter == 'weekly') {
        $queryRevenue->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        $queryExpense->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()]);
    } elseif ($filter == 'monthly') {
        $queryRevenue->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year);
        $queryExpense->whereMonth('date', now()->month)->whereYear('date', now()->year);
    }

    // AMBIL DETAIL BUAT DI PDF
    $revenueDetails = $queryRevenue->with(['items.product'])->latest()->get();
    $expenseDetails = $queryExpense->latest()->get();
    
    $totalRevenue = $queryRevenue->sum('total_price') ?? 0;
    $totalExpense = $queryExpense->sum('amount') ?? 0;
    $netProfit = $totalRevenue - $totalExpense;

    // Kirim semua variabel ke view PDF
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.pdf', compact(
        'totalRevenue', 
        'totalExpense', 
        'netProfit', 
        'filter',
        'revenueDetails',
        'expenseDetails'
    ));

    return $pdf->download('Laporan-WARUNG-RZ-'.now()->format('d-m-Y').'.pdf');
}
}