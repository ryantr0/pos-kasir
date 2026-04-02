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
    
    // --- TAMBAHAN: Ambil input tanggal custom ---
    $startDate = $request->get('start_date');
    $endDate = $request->get('end_date');
    
    $now = \Carbon\Carbon::now();

    // 2. Inisialisasi Query
    $revenueQuery = \App\Models\Order::query();
    $expenseQuery = \App\Models\Expense::query();
    $soldProductsQuery = \App\Models\OrderDetail::query();

    // 3. Logic Filter Waktu
    // --- PERBAIKAN: Jika ada input start_date & end_date, pakai range tersebut ---
    if ($startDate && $endDate) {
        $filter = $startDate . ' s/d ' . $endDate; // Update label filter untuk tampilan
        $start = $startDate . " 00:00:00";
        $end = $endDate . " 23:59:59";

        $revenueQuery->whereBetween('created_at', [$start, $end]);
        $expenseQuery->whereBetween('date', [$startDate, $endDate]);
        
        $soldProductsQuery->whereHas('order', function($q) use ($start, $end) {
            $q->whereBetween('created_at', [$start, $end]);
        });
    } 
    // --- LOGIKA ASLI TETAP DIPERTAHANKAN (Harian, Mingguan, Bulanan) ---
    elseif ($filter == 'daily') {
        $today = \Carbon\Carbon::today();
        $revenueQuery->whereDate('created_at', $today);
        $expenseQuery->whereDate('date', $today);
        
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

    // 4. AMBIL DETAIL DATA (Tidak berubah)
    $orders = $revenueQuery->with(['items.product', 'user'])->latest()->get(); 
    $expenseDetails = $expenseQuery->latest()->get();

    $soldProducts = $soldProductsQuery->select('product_id', \DB::raw('SUM(quantity) as total_qty'))
                        ->with('product.category')
                        ->groupBy('product_id')
                        ->orderBy('total_qty', 'desc')
                        ->get();

    // 5. Hitung Totalnya (Tidak berubah)
    $totalRevenue = $orders->sum('total_price');
    $totalExpense = $expenseDetails->sum('amount');
    $netProfit = $totalRevenue - $totalExpense;

    // Logic trim() tetap aman
    $qrisTotal = $orders->filter(function($order) {
        return strtoupper(trim($order->payment_method)) === 'QRIS';
    })->sum('total_price');

    $cashTotal = $orders->filter(function($order) {
        return strtoupper(trim($order->payment_method)) === 'CASH';
    })->sum('total_price');

    // Ambil data stok menipis (Radar Restock)
    $stokMenipis = \App\Models\Product::where('stock', '<=', 5)->get();

    // 6. Lempar SEMUA data ke Blade
    return view('reports.index', [
        'orders' => $orders,
        'totalRevenue' => $totalRevenue, 
        'totalExpense' => $totalExpense, 
        'cashTotal' => $cashTotal, 
        'qrisTotal' => $qrisTotal, 
        'grossProfit' => $totalRevenue, 
        'netProfit' => $netProfit, 
        'filter' => $filter,
        'revenueDetails' => $orders,
        'expenseDetails' => $expenseDetails,
        'soldProducts' => $soldProducts,
        'stokMenipis' => $stokMenipis,
    ]);
}

public function downloadPDF(Request $request) 
    {
        $filter = $request->get('filter', 'daily');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        
        $queryRevenue = Order::query();
        $queryExpense = Expense::query();

        // --- PERBAIKAN: Tambahkan logika custom date agar PDF sinkron dengan tampilan web ---
        if ($startDate && $endDate) {
            $filter = $startDate . ' sd ' . $endDate; // Pakai 'sd' bukan 's/d' agar file tidak error
            $queryRevenue->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"]);
            $queryExpense->whereBetween('date', [$startDate, $endDate]);
        } 
        elseif ($filter == 'daily') {
            $queryRevenue->whereDate('created_at', today());
            $queryExpense->whereDate('date', today());
        } elseif ($filter == 'weekly') {
            $queryRevenue->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            $queryExpense->whereBetween('date', [now()->startOfWeek()->toDateString(), now()->endOfWeek()->toDateString()]);
        } elseif ($filter == 'monthly') {
            $queryRevenue->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year);
            $queryExpense->whereMonth('date', now()->month)->whereYear('date', now()->year);
        }

        $revenueDetails = $queryRevenue->with(['items.product', 'user'])->latest()->get();
        $expenseDetails = $queryExpense->latest()->get();
        
        $totalRevenue = $revenueDetails->sum('total_price');
        $totalExpense = $expenseDetails->sum('amount');
        $netProfit = $totalRevenue - $totalExpense;

        $qrisTotal = $revenueDetails->filter(function($i) {
            return strtoupper(trim($i->payment_method)) === 'QRIS';
        })->sum('total_price');

        $cashTotal = $revenueDetails->filter(function($i) {
            return strtoupper(trim($i->payment_method)) === 'CASH' || empty($i->payment_method);
        })->sum('total_price');

        // --- PERBAIKAN: Bersihkan nama file dari karakter '/' agar tidak error ---
        $safeFilterName = str_replace(['/', ' '], ['-', '_'], $filter);
        $dateString = now()->format('d-m-Y');
        $fileName = 'Laporan-Ryan-Coffee-' . $safeFilterName . '-' . $dateString . '.pdf';

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.pdf', compact(
            'totalRevenue', 
            'totalExpense', 
            'netProfit', 
            'filter',
            'revenueDetails',
            'expenseDetails',
            'qrisTotal',
            'cashTotal'
        ));

        return $pdf->download($fileName);
    }

    public function downloadRestockPDF()
{
    // Ambil data stok menipis saja
    $stokMenipis = \App\Models\Product::where('stock', '<=', 5)
                    ->with('category')
                    ->orderBy('stock', 'asc')
                    ->get();

    $dateString = now()->format('d-m-Y');
    $fileName = 'Laporan-Radar-Restock-' . $dateString . '.pdf';

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.pdf_restock', compact('stokMenipis'));

    return $pdf->download($fileName);
}

}