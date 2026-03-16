<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-900">

<div class="flex min-h-screen">
    {{-- Sidebar (Konsisten dengan Dashboard) --}}
    <aside class="w-64 flex-shrink-0 border-r border-slate-200 bg-white">
        <div class="p-8 flex flex-col items-center justify-center text-center border-b border-slate-50">
    {{-- Logo Ikonik (Bulat Modern) --}}
    <div class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center shadow-lg shadow-slate-200 mb-4 rotate-3 hover:rotate-0 transition-transform duration-300">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
        </svg>
    </div>

    {{-- Judul & Subtitle di Tengah --}}
    <div>
        <h1 class="text-xl font-black tracking-tighter text-slate-800 leading-none">WARUNG RZ</h1>
        <div class="flex items-center justify-center space-x-1 mt-2">
        </div>
    </div>
</div>
        
        <nav class="mt-4 px-4 space-y-1">
            <div class="px-3 py-2 text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Main Menu</div>
            
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="text-sm font-medium">Dashboard</span>
            </a>

            <a href="{{ route('kasir.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('kasir.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span class="text-sm font-medium">Kasir (POS)</span>
            </a>

            <a href="{{ route('products.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('products.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                <span class="text-sm font-medium">Produk</span>
            </a>

            <a href="{{ route('categories.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('categories.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span class="text-sm font-medium">Kategori Produk</span>
            </a>
            
            <a href="{{ route('reports.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('reports.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <span class="text-sm font-medium">Laporan Keuangan</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-100 mt-auto">
            <div class="flex items-center space-x-3 px-2 mb-4">
                <div class="w-8 h-8 rounded-full bg-slate-900 flex items-center justify-center text-white text-[10px] font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-slate-500 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full py-2 border border-slate-200 text-xs font-bold text-slate-600 hover:bg-red-50 hover:text-red-600 hover:border-red-100 rounded-lg transition">
                    LOGOUT
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 overflow-y-auto">
        <header class="h-16 flex items-center justify-between px-8 bg-white border-b border-slate-200 sticky top-0 z-10">
            <h2 class="text-sm font-semibold text-slate-800 italic uppercase">Ringkasan Arus Kas</h2>
            <div class="text-[11px] font-medium text-slate-500 bg-slate-50 px-3 py-1 rounded-md border border-slate-100">
                {{ date('l, d M Y') }}
            </div>
        </header>

        <div class="p-8 space-y-8">
            {{-- Filter Area --}}
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-slate-900 tracking-tight uppercase italic">Periode: {{ $filter }}</h3>
                    <p class="text-xs text-slate-400 mt-1">Pantau performa keuangan Warung RZ secara real-time.</p>
                </div>
                
                <form action="{{ route('reports.index') }}" method="GET" class="flex items-center bg-white border border-slate-200 p-1 rounded-lg shadow-sm">
                    @foreach(['daily' => 'Harian', 'weekly' => 'Mingguan', 'monthly' => 'Bulanan'] as $key => $label)
                        <button type="submit" name="filter" value="{{ $key }}" 
                            class="px-4 py-1.5 text-[10px] font-bold rounded-md transition {{ $filter == $key ? 'bg-slate-900 text-white' : 'text-slate-500 hover:text-slate-900' }}">
                            {{ strtoupper($label) }}
                        </button>
                    @endforeach
                </form>
            </div>

            {{-- Stat Cards: Menampilkan hasil hitungan dari Controller --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
    {{-- Card Total Pendapatan --}}
    <button onclick="openModal('modalRevenue')" class="text-left bg-white p-6 rounded-xl border border-slate-200 shadow-sm transition hover:border-slate-900 group">
        <p class="text-[10px] font-bold text-slate-400 uppercase group-hover:text-slate-900">Total Pendapatan (Klik Detail)</p>
        <h3 class="text-2xl font-bold text-emerald-600 mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
    </button>

    {{-- Card Pengeluaran --}}
    <button onclick="openModal('modalExpenseDetail')" class="text-left bg-white p-6 rounded-xl border border-slate-200 shadow-sm transition hover:border-red-500 group">
        <p class="text-[10px] font-bold text-slate-400 uppercase group-hover:text-red-500">Pengeluaran (Klik Detail)</p>
        <h3 class="text-2xl font-bold text-red-500 mt-2">Rp {{ number_format($totalExpense, 0, ',', '.') }}</h3>
    </button>

    <div class="bg-white p-6 rounded-xl border border-slate-200">
        <p class="text-[10px] font-bold text-slate-400 uppercase">Laba Kotor</p>
        <h3 class="text-2xl font-bold text-slate-900 mt-2">Rp {{ number_format($grossProfit, 0, ',', '.') }}</h3>
    </div>

    <div class="bg-white p-6 rounded-xl border-2 border-slate-900">
        <p class="text-[10px] font-bold text-slate-900 uppercase">Profit Bersih</p>
        <h3 class="text-2xl font-bold text-slate-900 mt-2">Rp {{ number_format($netProfit, 0, ',', '.') }}</h3>
    </div>
</div>

{{-- MODAL DETAIL PENDAPATAN --}}
<div id="modalRevenue" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50">
            <h3 class="font-bold text-slate-800 italic uppercase">Rincian Pendapatan ({{ $filter }})</h3>
            <button onclick="closeModal('modalRevenue')" class="text-slate-400 hover:text-red-500">✕ CLOSE</button>
        </div>
        <div class="p-6 max-h-[400px] overflow-y-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-[10px] uppercase font-bold text-slate-500">
                    <tr>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Pelanggan</th> {{-- Tambah Header Pelanggan --}}
                        <th class="p-3">ID Order</th>
                        <th class="p-3 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
    @forelse($revenueDetails as $item)
    <tr class="hover:bg-slate-50">
        <td class="p-3 text-slate-600 text-xs">{{ $item->created_at->format('d/m/Y H:i') }}</td>
        
        <td class="p-3">
            <span class="font-bold text-slate-800 uppercase italic block">{{ $item->customer ?? 'Guest' }}</span>
            {{-- LIST PRODUK YANG DIBELI --}}
            <div class="mt-1 space-y-0.5">
                @foreach($item->items as $orderDetail)
                    <p class="text-[10px] text-slate-500 flex justify-between">
                        <span>• {{ $orderDetail->product->name }} (x{{ $orderDetail->quantity }})</span>
                    </p>
                @endforeach
            </div>
        </td>

        <td class="p-3 text-slate-400 font-medium text-xs">#{{ $item->id }}</td>
        
        <td class="p-3 text-right font-bold text-emerald-600">
            Rp {{ number_format($item->total_price, 0, ',', '.') }}
        </td>
    </tr>
    @empty
    <tr><td colspan="4" class="p-8 text-center text-slate-400 italic">Belum ada transaksi periode ini.</td></tr>
    @endforelse
</tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL DETAIL PENGELUARAN --}}
<div id="modalExpenseDetail" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-red-50">
            <h3 class="font-bold text-slate-800 italic uppercase">Rincian Pengeluaran ({{ $filter }})</h3>
            <button onclick="closeModal('modalExpenseDetail')" class="text-slate-400 hover:text-red-500 font-bold">✕ CLOSE</button>
        </div>
        <div class="p-6 max-h-[400px] overflow-y-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-[10px] uppercase font-bold text-slate-500">
                    <tr>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Keterangan</th>
                        <th class="p-3 text-right">Nominal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($expenseDetails as $exp)
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 text-slate-600 font-medium">{{ \Carbon\Carbon::parse($exp->date)->format('d/m/Y') }}</td>
                        <td class="p-3 font-bold text-slate-800 uppercase">{{ $exp->name }}</td>
                        <td class="p-3 text-right font-bold text-red-600">Rp {{ number_format($exp->amount, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-8 text-center text-slate-400 italic">Belum ada catatan pengeluaran periode ini.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 bg-slate-50 border-t border-slate-100 text-right">
            <span class="text-[10px] font-bold text-slate-400 uppercase">Total: </span>
            <span class="text-sm font-bold text-red-600">Rp {{ number_format($totalExpense, 0, ',', '.') }}</span>
        </div>
    </div>
</div>

{{-- TABEL PRODUK TERJUAL --}}
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">
    <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
        <h3 class="text-sm font-bold text-slate-800 uppercase italic">📦 Produk Terjual Periode Ini</h3>
        <span class="text-[10px] font-bold bg-slate-900 text-white px-2 py-1 rounded">LIVE UPDATE</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-[10px] uppercase font-bold text-slate-500">
                <tr>
                    <th class="p-4">Nama Produk</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4 text-center">Total Terjual</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($soldProducts as $sold)
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-4 font-bold text-slate-800">{{ $sold->product->name ?? 'Produk Dihapus' }}</td>
                    <td class="p-4 text-slate-500 text-xs">{{ $sold->product->category->name ?? '-' }}</td>
                    <td class="p-4 text-center">
                        <span class="bg-emerald-50 text-emerald-700 font-black px-3 py-1 rounded-full border border-emerald-100">
                            {{ $sold->total_qty }} Item
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-8 text-center text-slate-400 italic">Belum ada produk yang terjual di periode ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

            {{-- Action Cards --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <a href="{{ route('expenses.create') }}" class="group bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:border-slate-900 transition-all flex items-center justify-between">
                    <div class="flex items-center space-x-5">
                        <div class="w-14 h-14 rounded-full bg-slate-50 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">💸</div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-800 uppercase">Catat Pengeluaran Baru</h4>
                            <p class="text-[11px] text-slate-400 mt-1">Input belanja stok, listrik, atau operasional tanpa ribet.</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-slate-300 group-hover:text-slate-900 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>

                <a href="{{ route('reports.pdf', ['filter' => $filter]) }}" class="group bg-slate-900 p-8 rounded-2xl shadow-lg hover:shadow-slate-200 transition-all flex items-center justify-between">
                    <div class="flex items-center space-x-5">
                        <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center text-2xl">📄</div>
                        <div>
                            <h4 class="text-sm font-bold text-white uppercase">Cetak Laporan PDF</h4>
                            <p class="text-[11px] text-slate-400 mt-1">Unduh rekapitulasi laporan untuk arsip toko.</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </a>
            </div>
        </div>
    </main>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Biar background gak bisa di-scroll
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.body.style.overflow = 'auto'; // Aktifin scroll lagi
    }
</script>

</body>
</html>