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
    $soldProductsQuery = \App\Models\OrderDetail::query();

    // 3. Logic Filter Waktu (Tetap Dipertahankan Sesuai Aslinya)
    if ($filter == 'daily') {
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

    // 4. AMBIL DETAIL DATA
    $orders = $revenueQuery->with(['items.product', 'user'])->latest()->get(); 
    $expenseDetails = $expenseQuery->latest()->get();

    $soldProducts = $soldProductsQuery->select('product_id', \DB::raw('SUM(quantity) as total_qty'))
                        ->with('product.category')
                        ->groupBy('product_id')
                        ->orderBy('total_qty', 'desc')
                        ->get();

    // 5. Hitung Totalnya
    $totalRevenue = $orders->sum('total_price');
    $totalExpense = $expenseDetails->sum('amount');
    $netProfit = $totalRevenue - $totalExpense;

    // --- PERBAIKAN DI SINI: Ditambahkan trim() untuk hapus spasi gaib ---
    $qrisTotal = $orders->filter(function($order) {
        // strtoupper + trim agar 'qris', 'QRIS ', 'Qris' semua terdeteksi sama
        return strtoupper(trim($order->payment_method)) === 'QRIS';
    })->sum('total_price');

    $cashTotal = $orders->filter(function($order) {
        return strtoupper(trim($order->payment_method)) === 'CASH';
    })->sum('total_price');

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
        'soldProducts' => $soldProducts
    ]);
}

   public function downloadPDF(Request $request) 
{
    $filter = $request->get('filter', 'daily');
    $queryRevenue = Order::query();
    $queryExpense = Expense::query();

    // Logic Filter Tetap Sama (Tidak diubah)
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

    // Tambahkan 'user' di eager loading agar nama kasir muncul di PDF tanpa error
    $revenueDetails = $queryRevenue->with(['items.product', 'user'])->latest()->get();
    $expenseDetails = $queryExpense->latest()->get();
    
    $totalRevenue = $revenueDetails->sum('total_price');
    $totalExpense = $expenseDetails->sum('amount');
    $netProfit = $totalRevenue - $totalExpense;

    // --- HITUNGAN SALDO (QRIS vs CASH) ---
    // Menggunakan strtoupper untuk antisipasi perbedaan case di database
    $qrisTotal = $revenueDetails->filter(function($i) {
        return strtoupper($i->payment_method) === 'QRIS';
    })->sum('total_price');

    $cashTotal = $revenueDetails->filter(function($i) {
        return strtoupper($i->payment_method) === 'CASH' || empty($i->payment_method);
    })->sum('total_price');

    $dateString = now()->translatedFormat('d-F-Y');
    $fileName = 'Laporan-Ryan-Coffee-' . ucfirst($filter) . '-' . $dateString . '.pdf';

    // Kirim semua variabel ke view PDF
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
}