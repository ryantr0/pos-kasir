<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-[#f8fafc] antialiased text-slate-900" x-data="{ open: true }">
    <div class="flex min-h-screen relative overflow-hidden">
        
        {{-- Overlay Mobile (Hanya muncul di layar kecil saat menu buka) --}}
        <div x-show="open" 
         @click="open = false" 
         x-transition.opacity
         class="fixed inset-0 bg-slate-900/50 z-40 lg:hidden"
         x-cloak>
    <   /div>

        {{-- Sidebar: Logic diperbaiki agar LG (Laptop) bisa ikut geser --}}
        <aside 
            :class="open ? 'w-64' : 'w-0 lg:-ml-64'"
            class="fixed lg:relative inset-y-0 left-0 z-50 flex-shrink-0 border-r border-slate-200 bg-white transition-all duration-300 ease-in-out flex flex-col overflow-hidden">s="fixed inset-y-0 left-0 z-50 flex-shrink-0 border-r border-slate-200 bg-white transition-all duration-300 ease-in-out flex flex-col lg:static">
            
            <div class="w-64 flex flex-col h-full">
                <div class="p-8 flex flex-col items-center justify-center text-center border-b border-slate-50">
                    <div class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center shadow-lg shadow-slate-200 mb-4 rotate-3 hover:rotate-0 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-xl font-black tracking-tighter text-slate-800 leading-none uppercase">Warung RZ</h1>
                        <div class="flex items-center justify-center space-x-1 mt-2"></div>
                    </div>
                </div>

                <nav class="mt-4 px-4 space-y-1 overflow-y-auto flex-1">
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

                    <a href="{{ route('purchases.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('purchases.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} ">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span class="text-sm font-medium">Belanja Barang</span>
                    </a>
                    <a href="{{ route('tutorial.index') }}" 
                    class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('tutorial.*') ? 'bg-indigo-600 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18 18.246 18.477 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="text-sm font-medium">Panduan Sistem</span>
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
                        @if(auth()->user()->role === 'admin')
                        <div class="mt-8 pt-6 border-t border-slate-100">
                            <a href="{{ route('admin.users') }}" 
                               class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.users') ? 'bg-slate-900 text-white shadow-lg shadow-slate-200' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                                <svg class="w-5 h-5 {{ request()->routeIs('admin.users') ? 'text-white' : 'text-slate-400 group-hover:text-slate-900' }}" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span class="text-sm font-bold uppercase tracking-tight">Manajemen Akun</span>
                            </a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 overflow-y-auto min-w-0 transition-all duration-300">
            <header class="h-20 flex items-center justify-between px-4 lg:px-8 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40">
                <div class="flex items-center gap-4">
                    {{-- Tombol Hamburger (Aktif di Laptop & HP) --}}
                    <button @click="open = !open" class="p-2 rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-900 hover:text-white transition-all duration-200 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                    
                    <div>
                        <h2 class="text-xs lg:text-sm font-bold text-slate-900 uppercase tracking-wider">Dashboard Overview</h2>
                        <p class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">Warung RZ </p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">                
                    <div class="hidden md:flex flex-col items-end border-r border-slate-200 pr-3">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">Hari ini</span>
                        <span id="realtime-date" class="text-[11px] font-extrabold text-slate-700 uppercase">
                            {{ date('l, d M Y') }}
                        </span>
                    </div>

                    <div class="bg-slate-900 px-4 py-2 rounded-xl shadow-lg shadow-slate-200 flex items-center space-x-2 border border-slate-800">
                        <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></div>
                        <span id="realtime-clock" class="text-sm font-black text-white tabular-nums tracking-widest">
                            00:00:00
                        </span>
                    </div>
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
                <h3 class="text-xs font-black text-slate-800 uppercase tracking-wider">Transaksi Terbaru</h3>               
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

{{-- WIDGET KANAN: STATISTIK PENJUALAN (Clean Line Chart) --}}
    <div class="lg:col-span-1 bg-white rounded-xl border border-slate-200 shadow-sm p-6 flex flex-col hover:border-slate-400 transition-all duration-500 group">
        <div class="mb-6 flex flex-col gap-4">
            <div class="flex items-center gap-2">
                <span class="flex h-2 w-2 rounded-full bg-slate-900 animate-pulse"></span>
                <h3 class="text-xs font-black text-slate-800 tracking-wider uppercase">Statistik Penjualan</h3>
            </div>

            <form action="{{ route('dashboard') }}" method="GET" class="flex items-center bg-slate-50 border border-slate-200 p-1 rounded-xl gap-2">
                <div class="flex items-center space-x-1 px-1">
                    <input type="date" name="start_date" value="{{ $start }}" class="w-24 text-[9px] font-bold border-none focus:ring-0 text-slate-600 bg-transparent p-0">
                    <span class="text-slate-300 text-[10px]">—</span>
                    <input type="date" name="end_date" value="{{ $end }}" class="w-24 text-[9px] font-bold border-none focus:ring-0 text-slate-600 bg-transparent p-0">
                </div>
                <button type="submit" class="bg-slate-900 text-white p-1.5 rounded-lg hover:bg-black transition-colors">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </form>
        </div>

        <div class="relative h-64 w-full">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

{{-- Load Chart.js dari CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- Grid Utama: Pakai 3 kolom di layar besar --}}
<div class="grid grid-cols-1 lg:grid-cols-5 gap-5 items-start">
    
    {{-- WIDGET KIRI: PRODUK TERLARIS (Dibuat lebih lebar pakai col-span-2) --}}
    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">
            <h3 class="text-xs font-black text-slate-800 uppercase tracking-wider">Produk Terlaris</h3>
        </div>

        <div class="p-1 space-y-1">
            @forelse($produkTerlaris as $item)
            <div class="flex items-center justify-between p-3 rounded-lg border border-slate-50 bg-slate-50/50">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded bg-white border border-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-400">#</div>
                    <div>
                        <p class="text-xs font-bold text-slate-800 uppercase">{{ $item->name }}</p>
                        <p class="text-[10px] text-slate-500 font-medium">{{ $item->sold }} TERJUAL</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="py-10 text-center text-slate-400 text-xs italic">Data penjualan kosong.</div>
            @endforelse

            {{-- AREA DIAGRAM --}}
            <div class="mt-6 pt-6 border-t border-slate-50">
                <div class="relative h-[350px] w-full"> {{-- Tinggi ditambah dikit biar puas --}}
                    <canvas id="produkTerlarisChart"></canvas>
                </div>
                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest italic mt-4">
                    * Data berdasarkan jumlah total item yang terjual.
                </p>
            </div>
        </div>
    </div>

 {{-- WIDGET KANAN: RADAR RESTOCK (Lebar Proporsional & Isi Lega) --}}
{{-- UBAH: Saya tambahkan h-fit agar box tidak melar ke bawah. lg:w-[400px] agar di desktop lebar box pas. --}}
<div x-data="{ open: false }" class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden h-fit self-start w-full lg:w-[400px]">
    {{-- Header Lega --}}
    <div class="px-3 py-4 border-b border-slate-100 flex items-center justify-between bg-rose-50/20">
        <h3 class="text-xs font-black text-rose-600 uppercase tracking-widest flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            Radar Restock
        </h3>
        <span class="px-2 py-1 bg-rose-100 text-rose-700 text-[10px] font-bold rounded-md uppercase">
            ≤ 5
        </span>
    </div>
    
    {{-- Container List --}}
    <div class="p-4 space-y-3">
        @forelse($stokMenipis as $index => $item)
            <div x-show="open || {{ $index }} < 5" 
                 x-transition
                 class="flex items-center justify-between p-3 rounded-lg border border-slate-50 bg-slate-50/50 hover:bg-slate-50 hover:border-slate-100 transition-all group">
                
                {{-- Bagian Kiri: Icon + Nama --}}
                <div class="flex items-center space-x-3.5 overflow-hidden">
                    <div class="w-10 h-10 rounded-lg bg-white border border-slate-100 flex items-center justify-center text-slate-300 group-hover:text-rose-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="leading-tight overflow-hidden">
                        {{-- UBAH: max-w-xs biar nama produk nggak ngerusak layout dan font-sm --}}
                        <p class="text-sm font-black text-slate-800 uppercase truncate max-w-xs group-hover:text-rose-700">{{ $item->name }}</p>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Stok Saat Ini</p>
                    </div>
                </div>

                {{-- Bagian Kanan: Angka & Tombol --}}
                {{-- UBAH: Saya pisahkan angka stok biar lebih gede dan mencolok --}}
                <div class="flex items-center space-x-3 text-right">
                    <div class="text-right">
                        <p class="text-lg font-black text-rose-600 tabular-nums">{{ $item->stock }}</p>
                        <p class="text-[9px] text-slate-500 font-medium -mt-1 uppercase tracking-wider">Unit</p>
                    </div>
                    <a href="{{ route('products.edit', $item->id) }}" class="text-[9px] font-black text-slate-500 hover:text-white hover:bg-slate-900 uppercase border border-slate-200 px-3 py-1.5 rounded-lg bg-white shadow-sm transition-all group-hover:scale-105 active:scale-95">
                        RESTOCK
                    </a>
                </div>
            </div>
        @empty
            <div class="py-10 text-center bg-slate-50 rounded-lg border-2 border-dashed border-slate-100">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] italic">Stock Tidak Ada Yang Kosong !</p>
            </div>
        @endforelse

        {{-- Tombol Toggle --}}
        @if(count($stokMenipis) > 5)
            <button @click="open = !open" class="w-full mt-2 py-3 border-t border-slate-100 text-[10px] font-black text-slate-400 hover:text-slate-900 transition-all uppercase tracking-[0.3em] flex items-center justify-center space-x-2">
                <span x-text="open ? 'SEMBUNYIKAN' : 'LIHAT SEMUA ({{ count($stokMenipis) - 5 }} LAGI)'"></span>
                <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        @endif
    </div>
</div>



<div class="fixed bottom-6 right-6 z-50 flex flex-col items-end font-sans text-slate-700">
    
    <div id="ai-chat-window" class="hidden mb-4 w-80 sm:w-96 transition-all duration-300 ease-in-out transform scale-95 opacity-0 origin-bottom-right">
        <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-xl">
            
            <div class="bg-slate-900 p-4 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-slate-800 rounded flex items-center justify-center text-lg border border-slate-700">🤖</div>
                    <div>
                        <h3 class="text-[11px] font-bold text-white uppercase tracking-wider">RZ Assistant</h3>
                        <span class="text-[9px] text-slate-400 flex items-center italic">Ready to help</span>
                    </div>
                </div>
                <button onclick="toggleChat()" class="text-slate-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div id="chat-content" class="h-80 overflow-y-auto p-4 space-y-4 bg-white scrollbar-thin scrollbar-thumb-slate-200">
                <div class="flex justify-start">
                    <div class="max-w-[85%] bg-slate-50 border border-slate-100 text-slate-600 p-3 rounded-lg rounded-tl-none text-[11px] leading-relaxed">
                        Halo. Ada yang bisa saya bantu hari ini?
                    </div>
                </div>
            </div>

            <div class="p-3 bg-white border-t border-slate-100">
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg p-1 focus-within:bg-white focus-within:ring-1 focus-within:ring-slate-900 transition-all">
                    <input type="text" id="chat-input" 
                        class="w-full bg-transparent border-none py-2 px-3 text-[11px] focus:outline-none placeholder-slate-400" 
                        placeholder="Ketik pesan di sini...">
                    <button onclick="sendToAI()" class="bg-slate-900 text-white px-4 py-2 rounded-md hover:bg-black transition-all active:scale-95 text-[10px] font-bold uppercase tracking-tight">
                        Kirim
                    </button>
                </div>
            </div>
        </div>
    </div>

    <button onclick="toggleChat()" id="chat-btn" 
        class="w-14 h-14 bg-slate-900 text-white rounded-xl flex items-center justify-center shadow-lg hover:bg-black transition-all duration-300 active:scale-90 group">
        <span class="text-2xl group-hover:scale-110 transition-transform">🤖</span>
    </button>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- 1. LOGIKA GRAFIK (SAGE GREEN THEME) ---
    const canvas = document.getElementById('salesChart');
    if (canvas) {
        const ctx = canvas.getContext('2d');

        // Data dari Laravel
        const labels = {!! json_encode($salesData->pluck('date')->map(fn($d) => date('d M', strtotime($d)))) !!};
        const dataValues = {!! json_encode($salesData->pluck('total')) !!};

        // Konfigurasi Warna
        const colorPrimary = '#a3b18a'; 
        const colorHover = '#3a5a40';   
        const colorGrid = '#f1f5f9';    
        const colorText = '#94a3b8';    
        const colorTooltipBg = '#1e293b'; 

        // Gradient Fill
        const gradientFill = ctx.createLinearGradient(0, 0, 0, 400);
        gradientFill.addColorStop(0, 'rgba(163, 177, 138, 0.4)'); 
        gradientFill.addColorStop(0.6, 'rgba(163, 177, 138, 0.1)'); 
        gradientFill.addColorStop(1, 'rgba(255, 255, 255, 0)');     

        // Shadow Effect
        ctx.shadowColor = 'rgba(163, 177, 138, 0.3)';
        ctx.shadowBlur = 12;
        ctx.shadowOffsetX = 0;
        ctx.shadowOffsetY = 8;

        Chart.defaults.font.family = "'Inter', sans-serif";

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Revenue',
                    data: dataValues,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderColor: colorPrimary,
                    borderWidth: 3.5,
                    tension: 0.42,
                    pointRadius: 0,
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: colorHover,
                    pointHoverBorderWidth: 3,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: { left: 10, right: 10, top: 20, bottom: 10 }
                },
                animation: {
                    duration: 2500,
                    easing: 'easeOutQuart'
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        enabled: true,
                        backgroundColor: colorTooltipBg,
                        titleFont: { size: 13, weight: 'bold' },
                        bodyFont: { size: 13 },
                        padding: 16,
                        cornerRadius: 12,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                let label = ' Total: ';
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('id-ID', { 
                                        style: 'currency', 
                                        currency: 'IDR',
                                        maximumFractionDigits: 0 
                                    }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        display: false,
                    },
                    x: {
                        grid: {
                            display: true,
                            color: colorGrid,
                            drawBorder: false,
                            lineWidth: 0.5
                        },
                        ticks: {
                            color: colorText,
                            font: { size: 10, weight: '600' },
                            padding: 12,
                            maxRotation: 0,
                            autoSkip: true,
                            maxTicksLimit: 7
                        }
                    }
                }
            }
        }); // <-- Tadi kurang kurung penutup di sini
    }

    // --- 2. FUNGSI JAM REAL-TIME (TETAP TERJAGA) ---
    function updateClock() {
        const now = new Date();
        
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        
        const clockElement = document.getElementById('realtime-clock');
        if (clockElement) {
            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
        
        const options = { weekday: 'long', year: 'numeric', month: 'short', day: '2-digit' };
        const dateString = now.toLocaleDateString('en-GB', options); 
        
        const dateElement = document.getElementById('realtime-date');
        if (dateElement) {
            dateElement.textContent = dateString;
        }
    }

    setInterval(updateClock, 1000);
    updateClock();
});

function toggleChat() {
    const windowEl = document.getElementById('ai-chat-window');
    
    if (windowEl.classList.contains('hidden')) {
        windowEl.classList.remove('hidden');
        setTimeout(() => {
            windowEl.classList.remove('scale-95', 'opacity-0');
            windowEl.classList.add('scale-100', 'opacity-100');
        }, 10);
    } else {
        windowEl.classList.add('scale-95', 'opacity-0');
        windowEl.classList.remove('scale-100', 'opacity-100');
        setTimeout(() => {
            windowEl.classList.add('hidden');
        }, 200);
    }
}

async function sendToAI() {
    const input = document.getElementById('chat-input');
    const box = document.getElementById('chat-content');
    if(!input.value) return;

    const userMsg = input.value;
    
    // Bubble Chat User: Hitam
    box.innerHTML += `
        <div class="flex justify-end">
            <div class="max-w-[85%] bg-slate-900 text-white p-3 rounded-lg rounded-tr-none text-[11px] shadow-sm">
                ${userMsg}
            </div>
        </div>`;
    
    input.value = '';
    box.scrollTop = box.scrollHeight;

    try {
        const res = await fetch("{{ route('ai.ask') }}", {
            method: "POST",
            headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
            body: JSON.stringify({ message: userMsg })
        });
        
        const data = await res.json();
        
        // Bubble Chat AI: Abu-abu Terang
        box.innerHTML += `
            <div class="flex justify-start">
                <div class="max-w-[85%] bg-slate-100 border border-slate-200 text-slate-800 p-3 rounded-lg rounded-tl-none text-[11px]">
                    ${data.answer}
                </div>
            </div>`;
    } catch (e) {
        box.innerHTML += `<div class="text-[9px] text-red-500 p-2 italic text-center">Gagal terhubung ke server.</div>`;
    }
    box.scrollTop = box.scrollHeight;
}

document.getElementById('chat-input').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') sendToAI();
});

document.addEventListener('DOMContentLoaded', function() {
    // Pengaturan Global Chart (Font & Warna Dasar)
    Chart.defaults.color = '#64748b';
    Chart.defaults.font.family = 'Inter, ui-sans-serif, system-ui';

    // 1. Diagram Produk Terlaris (Bar Chart - Black Theme)
    const ctxTerlaris = document.getElementById('produkTerlarisChart').getContext('2d');
    new Chart(ctxTerlaris, {
        type: 'bar',
        data: {
            labels: {!! json_encode($produkTerlaris->pluck('name')) !!},
            datasets: [{
                data: {!! json_encode($produkTerlaris->pluck('sold')) !!},
                backgroundColor: '#0f172a', // Hitam tegas
                borderRadius: 4, // Kotak sedikit tumpul, tidak lebay
                barPercentage: 0.5,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { 
                    beginAtZero: true,
                    grid: { color: '#f1f5f9' },
                    ticks: { font: { weight: 'bold' } }
                },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. Statistik Penjualan (Line Chart - Black Theme)
    const ctxSales = document.getElementById('salesChart').getContext('2d');
    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: {!! isset($labelsSales) ? json_encode($labelsSales) : '["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"]' !!},
            datasets: [{
                data: {!! isset($dataSales) ? json_encode($dataSales) : '[0, 0, 0, 0, 0, 0, 0]' !!},
                borderColor: '#0f172a', // Garis hitam
                borderWidth: 2,
                fill: false, // Tanpa warna di bawah garis biar minimalis
                tension: 0.3, // Lekukan halus
                pointRadius: 0, // Titik dihilangkan biar clean
                pointHoverRadius: 5,
                pointHoverBackgroundColor: '#0f172a'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { display: false }, // Sembunyikan angka Y biar fokus ke tren
                x: { 
                    grid: { display: false },
                    ticks: { font: { size: 9, weight: '900' } }
                }
            }
        }
    });
});
</script>

</body>
</html>