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
        <p class="px-4 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">
            
        </p>
        
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
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 overflow-y-auto">
        <header class="h-20 flex items-center justify-between px-8 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40">
            <div>
                <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Ringkas Arus KAS</h2>
                <p class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">Warung RZ </p>
            </div>

            <div class="flex items-center space-x-3">              
                <div class="hidden md:flex flex-col items-end border-r border-slate-200 pr-3">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">Hari ini</span>
                    <span id="realtime-date" class="text-[11px] font-extrabold text-slate-700 uppercase">
                        {{ date('l, d M Y') }} {{-- Tetap ada buat tampilan awal --}}
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

        <div class="p-4 space-y-5">
{{-- Container Utama: Menggunakan items-center agar semua elemen sejajar tingginya --}}
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
    
    {{-- Sisi Kiri: Info Periode --}}
<div class="flex-shrink-0">
    <h3 class="text-[14px] font-black text-slate-900 tracking-wide uppercase not-italic">
        <span class="text-slate-400">Periode:</span> 
        
        @if(request('start_date') && request('end_date'))
            {{-- Jika User Pilih Tanggal Custom --}}
            <span class="text-emerald-600">{{ \Carbon\Carbon::parse(request('start_date'))->translatedFormat('d F Y') }}</span> 
            
            @if(request('start_date') !== request('end_date'))
                <span class="text-slate-300 mx-1">s/d</span>
                <span class="text-emerald-600">{{ \Carbon\Carbon::parse(request('end_date'))->translatedFormat('d F Y') }}</span>
            @endif
        @else
            {{-- Jika filter bawaan (Daily/Weekly/Monthly) --}}
            <span class="text-emerald-600">
                @if(strtolower($filter) == 'daily')
                    HARI INI
                @elseif(strtolower($filter) == 'weekly')
                    MINGGU INI
                @elseif(strtolower($filter) == 'monthly')
                    BULAN INI
                @else
                    {{ strtoupper($filter) }}
                @endif
            </span>
        @endif
    </h3>
</div>

    {{-- Sisi Kanan: Gabungan Form Filter dan Tombol Cetak --}}
    <div class="flex flex-wrap items-center gap-3">
        
        {{-- Form Filter --}}
        <form action="{{ route('reports.index') }}" method="GET" class="flex items-center bg-white border border-slate-200 p-1.5 rounded-xl shadow-sm gap-2">
            <div class="flex items-end space-x-2 px-1">
                {{-- Input Dari --}}
                <div class="flex flex-col items-center">
                    <label class="text-[8px] font-black text-slate-400 uppercase tracking-tighter mb-0.5">Dari</label>
                    <input type="date" name="start_date" value="{{ request('start_date', date('Y-m-d')) }}" 
                        class="w-28 text-[10px] font-bold border-none focus:ring-0 text-slate-700 uppercase bg-slate-50 rounded-md px-2 py-1 transition-all text-center">
                </div>

                {{-- Tanda Pisah --}}
                <div class="flex items-center pb-1.5">
                    <span class="text-slate-300 font-bold text-[10px]">—</span>
                </div>

                {{-- Input Sampai --}}
                <div class="flex flex-col items-center">
                    <label class="text-[8px] font-black text-slate-500 uppercase tracking-tighter mb-0.5">Sampai</label>
                    <input type="date" name="end_date" value="{{ request('end_date', date('Y-m-d')) }}" 
                        class="w-28 text-[10px] font-bold border-none focus:ring-0 text-slate-700 uppercase bg-slate-50 rounded-md px-2 py-1 transition-all text-center">
                </div>
            </div>
            
            {{-- Tombol Cari --}}
            <button type="submit" class="group bg-transparent text-slate-400 hover:text-white hover:bg-slate-900 px-3 py-2 rounded-lg text-[10px] font-black transition-all duration-200 flex items-center space-x-1.5 border border-transparent hover:border-slate-900">
                <svg class="w-3 h-3 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span>CARI</span>
            </button>
            
            <div class="w-px h-4 bg-slate-200 mx-1"></div> {{-- Garis Pemisah Tipis --}}

            <a href="{{ route('reports.index') }}" class="pr-2 py-2 text-[9px] font-bold text-slate-400 hover:text-red-500 transition">RESET</a>
        </form>

        {{-- Tombol Cetak PDF Merah (Ukuran Pas) --}}
        <a href="{{ route('reports.pdf', request()->all()) }}" 
            class="group bg-rose-600 px-3 py-2 rounded-xl shadow-md shadow-rose-200 hover:bg-rose-700 transition-all flex items-center space-x-2 border border-rose-500 hover:scale-105 active:scale-95">
            
            {{-- Ikon sedikit lebih besar dari yang tadi --}}
            <div class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center text-xs group-hover:bg-white/30 transition-colors">
                📄
            </div>

            {{-- Teks balik ke text-[10px] biar mantap --}}
            <span class="text-[10px] font-black text-white uppercase tracking-wider not-italic">CETAK PDF</span>

            <svg class="w-3 h-3 text-rose-100 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
        </a>
    </div>
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

    <div class="bg-white p-6 rounded-xl border border-slate-200">
        <p class="text-[10px] font-bold text-slate-900 uppercase">Profit Bersih</p>
        <h3 class="text-2xl font-bold text-slate-900 mt-2">Rp {{ number_format($netProfit, 0, ',', '.') }}</h3>
    </div>
    
</div>


{{-- Ringkasan Metode Bayar --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
    <div class="flex items-center justify-between p-4 bg-white rounded-xl border border-slate-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-lg">💵</div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase">Total Cash</p>
                <p class="text-sm font-black text-slate-900">Rp {{ number_format($cashTotal ?? 0, 0, ',', '.') }}</p>
            </div>
        </div>
        <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded">Duit Laci</span>
    </div>
    <div class="flex items-center justify-between p-4 bg-white rounded-xl border border-slate-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-lg">📱</div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase">Total QRIS</p>
                <p class="text-sm font-black text-slate-900">Rp {{ number_format($qrisTotal ?? 0, 0, ',', '.') }}</p>
            </div>
        </div>
        <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded">Saldo Digital</span>
    </div>
</div>

            {{-- Action Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
    {{-- Card Catat Pengeluaran: Dibuat seukuran dengan Stat Cards --}}
    <a href="{{ route('expenses.create') }}" class="group bg-white p-6 rounded-xl border border-slate-200 shadow-sm hover:border-slate-900 transition-all flex items-center justify-between">
        <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                            💸
                        </div>
                        <div>
                            <h4 class="text-[10px] font-black text-slate-800 uppercase tracking-wider not-italic">Catat Pengeluaran</h4>
                            <p class="text-[9px] text-slate-400 leading-tight uppercase font-bold mt-0.5 not-italic">Input Stok & Oprasional</p>
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-slate-300 group-hover:text-slate-900 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>               
            </div>

<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
    <h3 class="text-lg font-black not-italic tracking-wide uppercase mb-4 text-slate-900">
        Riwayat Transaksi
    </h3>
    
    <table class="w-full text-left">
        <thead>
            <tr class="text-[10px] font-bold uppercase text-slate-400 border-b border-slate-100">
                <th class="pb-3">Waktu</th>
                <th class="pb-3">Pelanggan</th>
                <th class="pb-3">Total</th>
                <th class="pb-3">Kasir (User)</th>
                <th class="pb-3 text-left text-xs font-bold text-slate-400 uppercase">Metode</th>
            </tr>
        </thead>
        <tbody id="transaction-table" class="divide-y divide-slate-100">
            @foreach($orders as $index => $order)
            {{-- Baris ke-6 keatas (index > 4) otomatis disembunyikan dulu --}}
            <tr class="order-row border-b border-slate-50 last:border-0 {{ $index > 4 ? 'hidden' : '' }}">
                <td class="py-4 text-sm text-slate-500">{{ $order->created_at->format('H:i') }}</td>
                <td class="py-4 text-sm font-bold text-slate-900">{{ $order->customer }}</td> 
                <td class="py-4 text-sm font-black text-slate-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td class="py-4 text-left">
                    <span class="px-3 py-1 bg-slate-100 text-slate-900 text-[10px] font-bold rounded-full uppercase">
                        {{ $order->user->name ?? 'System' }}
                    </span>
                </td>
                <td class="py-4 text-left">
                    <span class="px-2 py-1 rounded text-[10px] font-black uppercase {{ $order->payment_method === 'QRIS' ? 'bg-blue-50 text-blue-600' : 'bg-emerald-50 text-emerald-600' }}">
                        {{ $order->payment_method }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
                    @if(count($orders) > 5)
        <div class="mt-6 flex justify-center items-center space-x-6">
            {{-- Tombol Tutup (Hanya muncul kalau yang tampil lebih dari 5) --}}
            <button id="less-btn" onclick="showLess()" class="hidden text-[10px] font-black uppercase tracking-widest text-red-400 hover:text-red-600 transition-colors border-b-2 border-slate-100 hover:border-red-600 pb-1">
                ↑ Tutup
            </button>

            {{-- Tombol Tambah --}}
            <button id="more-btn" onclick="showMore()" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-colors border-b-2 border-slate-100 hover:border-slate-900 pb-1">
                Lihat Lainnya ↓
            </button>
        </div>
        @endif
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

{{-- TABEL PRODUK TERJUAL (VERSI RAMPING) --}}
<div class="max-w-md bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-8" 
     x-data="{ limit: 5, total: {{ $soldProducts->count() }} }">
    
    <div class="p-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
        <h3 class="text-[11px] font-black text-slate-800 uppercase tracking-tight">
            📦 Produk Terjual
        </h3>
        <span class="text-[9px] font-bold bg-slate-900 text-white px-1.5 py-0.5 rounded">LIVE</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-[12px]">
            <thead class="bg-slate-50 text-[9px] uppercase font-bold text-slate-400">
                <tr>
                    <th class="px-4 py-2">Produk</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2 text-center">Qty</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($soldProducts as $index => $sold)
                <tr class="hover:bg-slate-50/50 transition" x-show="{{ $index }} < limit">
                    <td class="px-4 py-2.5 font-bold text-slate-700 leading-tight">
                        {{ $sold->product->name ?? 'Dihapus' }}
                    </td>
                    <td class="px-4 py-2.5 text-slate-400 text-[10px]">
                        {{ $sold->product->category->name ?? '-' }}
                    </td>
                    <td class="px-4 py-2.5 text-center">
                        <span class="text-emerald-700 font-bold">
                            {{ $sold->total_qty }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-slate-400 italic text-xs">Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($soldProducts->count() > 5)
    <div class="px-4 py-2 border-t border-slate-100 bg-slate-50/30 flex justify-center gap-4">
        <button x-show="limit < total" @click="limit += 5" 
                class="text-[10px] font-bold text-indigo-600 hover:underline">
            Lainnya ↓
        </button>
        <button x-show="limit > 5" @click="limit = 5" 
                class="text-[10px] font-bold text-slate-400 hover:underline">
            Sembunyi ↑
        </button>
    </div>
    @endif
</div>
        </div>
    </main>
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
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Biar background gak bisa di-scroll
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.body.style.overflow = 'auto'; // Aktifin scroll lagi
    }
    
    function updateClock() {
        const now = new Date();
        
        // --- Bagian Jam ---
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('realtime-clock').textContent = `${hours}:${minutes}:${seconds}`;
        
        // --- Bagian Tanggal (Update otomatis kalau ganti hari) ---
        const options = { weekday: 'long', year: 'numeric', month: 'short', day: '2-digit' };
        // Format: Monday, 17 Mar 2026
        const dateString = now.toLocaleDateString('en-GB', options); 
        
        const dateElement = document.getElementById('realtime-date');
        if (dateElement) {
            dateElement.textContent = dateString;
        }
    }

    setInterval(updateClock, 1000);
    updateClock();


    let currentShown = 5;
    const defaultShown = 5;
    const rowsPerStep = 5;

    function updateButtons() {
        const rows = document.querySelectorAll('.order-row');
        const moreBtn = document.getElementById('more-btn');
        const lessBtn = document.getElementById('less-btn');
        const totalRows = rows.length;

        // Kontrol Tombol "Lihat Lainnya"
        if (currentShown >= totalRows) {
            moreBtn.classList.add('hidden');
        } else {
            moreBtn.classList.remove('hidden');
        }

        // Kontrol Tombol "Tutup" (Muncul cuma kalau baris yang kebuka > 5)
        if (currentShown > defaultShown) {
            lessBtn.classList.remove('hidden');
        } else {
            lessBtn.classList.add('hidden');
        }
    }

    function showMore() {
        const rows = document.querySelectorAll('.order-row');
        const totalRows = rows.length;
        const nextLimit = currentShown + rowsPerStep;

        for (let i = currentShown; i < nextLimit && i < totalRows; i++) {
            rows[i].classList.remove('hidden');
        }

        currentShown = nextLimit;
        updateButtons();
    }

    function showLess() {
        const rows = document.querySelectorAll('.order-row');
        
        // Kita kurangi jumlah yang tampil sebanyak 5
        const prevLimit = currentShown - rowsPerStep;
        
        // Sembunyikan baris dari batas baru sampai yang tadinya tampil
        rows.forEach((row, index) => {
            if (index >= prevLimit && index >= defaultShown) {
                row.classList.add('hidden');
            }
        });

        // Pastikan nggak kurang dari 5
        currentShown = prevLimit < defaultShown ? defaultShown : prevLimit;
        updateButtons();
    }

    async function sendChat() {
    const input = document.getElementById('user-input');
    const chatBox = document.getElementById('chat-box');
    const msg = input.value;
    
    chatBox.innerHTML += `<p class="text-blue-600"><b>Kamu:</b> ${msg}</p>`;
    input.value = '';

    const res = await fetch("{{ route('ai.ask') }}", {
        method: "POST",
        headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
        body: JSON.stringify({ message: msg })
    });
    
    const data = await res.json();
    chatBox.innerHTML += `<p class="text-slate-800"><b>AI:</b> ${data.answer}</p>`;
    chatBox.scrollTop = chatBox.scrollHeight;
}

// Fungsi buat buka/tutup chat
// Fungsi toggle dengan animasi lebih cepat dan simpel
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
</script>

</body>
</html>