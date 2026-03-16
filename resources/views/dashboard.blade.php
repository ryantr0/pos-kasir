<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    
</head>


<body class="bg-[#f8fafc] antialiased text-slate-900">
        <div class="flex min-h-screen">
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
            
            <a href="{{ route('dashboard') }}" 
            class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-sm font-medium">Dashboard</span>
            </a>
            

            

            <a href="{{ route('kasir.index') }}" 
            class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('kasir.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span class="text-sm font-medium">Kasir (POS)</span>
            </a>

            <a href="{{ route('products.index') }}" 
            class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('products.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                <span class="text-sm font-medium">Produk</span>
            </a>

            <a href="{{ route('categories.index') }}" 
            class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('categories.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <span class="text-sm font-medium">Kategori Produk</span>
            </a>
            
            <a href="{{ route('reports.index') }}" 
            class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('reports.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <span class="text-sm font-medium">Laporan Keuangan</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-100">
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

    <main class="flex-1 overflow-y-auto">
        <header class="h-16 flex items-center justify-between px-8 bg-white border-b border-slate-200 sticky top-0 z-10">
            <h2 class="text-sm font-semibold text-slate-800">Dashboard Overview</h2>
            <div class="text-[11px] font-medium text-slate-500 bg-slate-50 px-3 py-1 rounded-md border border-slate-100">
                {{ date('l, d M Y') }}
            </div>
        </header>

        <div class="p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Total Produk</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalProduk }}</h3>
                </div>
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Kategori</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalKategori }}</h3>
                </div>
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Pendapatan Hari Ini</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">
                        Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                    </h3>
                </div>
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Transaksi</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">
                        {{ $transaksiHariIni }}
                    </h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Tabel Transaksi (Kiri) --}}
    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">
            <h3 class="text-sm font-bold text-slate-800 italic uppercase">Transaksi Terbaru</h3>
            <a href="{{ route('reports.index') }}" class="text-[10px] font-bold text-slate-400 hover:text-slate-900 uppercase tracking-wider transition">Lihat Semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                        <th class="px-6 py-3">Pelanggan</th>
                        <th class="px-6 py-3 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($transaksiTerbaru as $trx)
                    <tr class="hover:bg-slate-50 transition-colors">
                        {{-- Pastikan kolom di DB namanya 'customer' --}}
                        <td class="px-6 py-4 font-medium text-slate-700">
                            {{ $trx->customer ?? 'Guest' }}
                        </td>
                        
                        {{-- Format Rupiah yang bener: nominal, desimal, pemisah desimal, pemisah ribuan --}}
                        <td class="px-6 py-4 text-right font-bold text-emerald-600">
                            Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="px-6 py-10 text-center text-slate-400 text-xs italic">
                            Belum ada transaksi hari ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Diagram Tren Pendapatan (Kanan) --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 flex flex-col">
        <div class="mb-4">
            <h3 class="text-sm font-bold text-slate-800 italic uppercase">Tren Penjualan</h3>
            <p class="text-[10px] text-slate-400 font-medium">Statistik 7 hari terakhir</p>
        </div>
        <div class="flex-1 min-h-[250px]">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

{{-- Load Chart.js dari CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    
    const labels = {!! json_encode($salesData->pluck('date')->map(fn($d) => date('d M', strtotime($d)))) !!};
    const dataValues = {!! json_encode($salesData->pluck('total')) !!};

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan',
                data: dataValues,
                borderColor: '#0f172a', // Slate-900
                backgroundColor: 'rgba(15, 23, 42, 0.05)',
                borderWidth: 3,
                tension: 0.4, // Bikin garis melengkung estetik
                pointRadius: 4,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#0f172a',
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { display: false }, // Sembunyikan garis Y biar clean
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 10, weight: 'bold' }, color: '#94a3b8' }
                }
            }
        }
    });
</script>

                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                    <h3 class="text-sm font-bold text-slate-800 mb-6">Produk Terlaris</h3>
                    <div class="space-y-4">
                        @forelse($produkTerlaris as $item)
                        <div class="flex items-center justify-between p-3 rounded-lg border border-slate-50 bg-slate-50/50">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded bg-white border border-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-400">#</div>
                                <div>
                                    <p class="text-xs font-bold text-slate-800 uppercase">{{ $item->name }}</p>
                                    <p class="text-[10px] text-slate-500">{{ $item->sold }} terjual</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="py-10 text-center text-slate-400 text-xs italic">Data penjualan kosong.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>