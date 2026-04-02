<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Expense;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil filter dari URL (default: daily)
        $filter = $request->get('filter', 'daily');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $now = Carbon::now();

        // 2. Inisialisasi Query
        $revenueQuery = Order::query();
        $expenseQuery = Expense::query();
        $soldProductsQuery = OrderDetail::query();

        // 3. Logic Filter Waktu
        if ($startDate && $endDate) {
            $start = $startDate . " 00:00:00";
            $end = $endDate . " 23:59:59";

            $revenueQuery->whereBetween('created_at', [$start, $end]);
            $expenseQuery->whereBetween('date', [$startDate, $endDate]);
            $soldProductsQuery->whereHas('order', function($q) use ($start, $end) {
                $q->whereBetween('created_at', [$start, $end]);
            });
        } elseif ($filter == 'daily') {
            $today = Carbon::today();
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

        // 4. Ambil Data
        $orders = $revenueQuery->with(['items.product', 'user'])->latest()->get(); 
        $expenseDetails = $expenseQuery->latest()->get();
        $soldProducts = $soldProductsQuery->select('product_id', DB::raw('SUM(quantity) as total_qty'))
                        ->with('product.category')
                        ->groupBy('product_id')
                        ->orderBy('total_qty', 'desc')
                        ->get();

        // 5. Kalkulasi
        $totalRevenue = $orders->sum('total_price');
        $totalExpense = $expenseDetails->sum('amount');
        $netProfit = $totalRevenue - $totalExpense;

        $qrisTotal = $orders->filter(function($order) {
            return strtoupper(trim($order->payment_method)) === 'QRIS';
        })->sum('total_price');

        $cashTotal = $orders->filter(function($order) {
            $method = strtoupper(trim($order->payment_method));
            return $method === 'CASH' || empty($method);
        })->sum('total_price');

        // Radar Restock
        $stokMenipis = Product::where('stock', '<=', 5)->get();

        // 6. Return View (Gunakan array yang rapi agar tidak error lagi)
        return view('reports.index', [
            'orders' => $orders,
            'totalRevenue' => $totalRevenue, 
            'totalExpense' => $totalExpense, 
            'cashTotal' => $cashTotal, 
            'qrisTotal' => $qrisTotal, 
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

        if ($startDate && $endDate) {
            $queryRevenue->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"]);
            $queryExpense->whereBetween('date', [$startDate, $endDate]);
        } elseif ($filter == 'daily') {
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
            $method = strtoupper(trim($i->payment_method));
            return $method === 'CASH' || empty($method);
        })->sum('total_price');

        $safeFilterName = str_replace(['/', ' '], ['-', '_'], $filter);
        $fileName = 'Laporan-WarungRZ-' . $safeFilterName . '-' . now()->format('d-m-Y') . '.pdf';

        $pdf = Pdf::loadView('reports.pdf', compact(
            'totalRevenue', 'totalExpense', 'netProfit', 'filter',
            'revenueDetails', 'expenseDetails', 'qrisTotal', 'cashTotal'
        ));

        return $pdf->download($fileName);
    }

    public function downloadRestockPDF()
    {
        $stokMenipis = Product::where('stock', '<=', 5)
                        ->with('category')
                        ->orderBy('stock', 'asc')
                        ->get();

        $fileName = 'Laporan-Radar-Restock-' . now()->format('d-m-Y') . '.pdf';
        $pdf = Pdf::loadView('reports.pdf_restock', compact('stokMenipis'));

        return $pdf->download($fileName);
    }
}