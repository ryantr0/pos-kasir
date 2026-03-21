<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengeluaran - Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-900">

<div class="flex min-h-screen">
    {{-- Sidebar (Sama dengan Dashboard & Report) --}}
    <aside class="w-64 flex-shrink-0 border-r border-slate-200 bg-white flex flex-col">
        <div class="p-6">
            <h1 class="text-xl font-bold tracking-tight text-slate-800 uppercase">WARUNG RZ</h1>
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
    </form>
</div>
    </aside>

    <main class="flex-1 overflow-y-auto">
        <header class="h-16 flex items-center justify-between px-8 bg-white border-b border-slate-200 sticky top-0 z-10">
            <div class="flex items-center space-x-4">
                <a href="{{ route('reports.index') }}" class="text-slate-400 hover:text-slate-900 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h2 class="text-sm font-bold text-slate-800 uppercase tracking-tight italic">Catat Pengeluaran Baru</h2>
            </div>
            <div class="text-[11px] font-medium text-slate-500 bg-slate-50 px-3 py-1 rounded-md border border-slate-100">
                {{ date('l, d M Y') }}
            </div>
        </header>

        <div class="p-8 max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-8 border-b border-slate-100 bg-slate-50/30">
                    <h3 class="text-lg font-black text-slate-900 uppercase italic">Form Pengeluaran</h3>
                    <p class="text-xs text-slate-400 mt-1">Pastiin semua input bener biar laporan keuangan nggak berantakan, Bang.</p>
                </div>

                <form action="{{ route('expenses.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Pengeluaran --}}
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Pengeluaran</label>
                            <input type="text" name="name" required placeholder="Contoh: Bayar Listrik" 
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-slate-900 focus:ring-0 transition-all text-sm placeholder:text-slate-300">
                        </div>

                        {{-- Tanggal --}}
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Tanggal</label>
                            <input type="date" name="date" required value="{{ date('Y-m-d') }}"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-slate-900 focus:ring-0 transition-all text-sm">
                        </div>
                    </div>

                    {{-- Nominal --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nominal (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">Rp</span>
                            <input type="number" name="amount" required placeholder="0"
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-slate-900 focus:ring-0 transition-all text-sm font-bold">
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Keterangan (Opsional)</label>
                        <textarea name="description" rows="3" placeholder="Detail pengeluaran..." 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-slate-900 focus:ring-0 transition-all text-sm placeholder:text-slate-300"></textarea>
                    </div>

                    <div class="pt-4 flex items-center justify-end space-x-4">
                        <a href="{{ route('reports.index') }}" class="px-6 py-3 text-xs font-bold text-slate-400 hover:text-slate-900 transition-colors uppercase">Batal</a>
                        <button type="submit" class="px-10 py-3 bg-slate-900 text-white rounded-xl text-xs font-black shadow-lg shadow-slate-200 hover:shadow-xl hover:-translate-y-0.5 transition-all uppercase tracking-widest">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

</body>
</html>