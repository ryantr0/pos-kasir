<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial - Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-[#f8fafc] antialiased text-slate-900" x-data="{ open: false }">
    <div class="flex min-h-screen">
        <aside 
            :class="open ? 'w-64' : 'w-20'" 
            class="fixed inset-y-0 left-0 z-50 flex-shrink-0 border-r border-slate-200 bg-white transition-all duration-300 ease-in-out flex flex-col overflow-hidden lg:static lg:translate-x-0">
            
            <div class="p-4 flex items-center justify-between border-b border-slate-50 min-h-[160px] relative">
                <div x-show="open" x-transition.opacity class="flex flex-col items-center justify-center text-center w-full">
                    <div class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center shadow-lg shadow-slate-200 mb-4 rotate-3 hover:rotate-0 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h1 class="text-xl font-black tracking-tighter text-slate-800 leading-none">WARUNG RZ</h1>
                </div>

                <button @click="open = !open" 
                        :class="open ? 'absolute top-4 right-4' : 'mx-auto'" 
                        class="p-2 rounded-lg hover:bg-slate-100 text-slate-500 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <nav class="mt-4 px-4 space-y-1 flex-1 overflow-y-auto overflow-x-hidden">
                <div x-show="open" class="px-3 py-2 text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Main Menu</div>
                
                <a href="{{ route('dashboard') }}" 
                class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span x-show="open" class="text-sm font-medium whitespace-nowrap">Dashboard</span>
                </a>

                <a href="{{ route('kasir.index') }}" 
                class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('kasir.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span x-show="open" class="text-sm font-medium whitespace-nowrap">Kasir (POS)</span>
                </a>

                <a href="{{ route('products.index') }}" 
                class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('products.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    <span x-show="open" class="text-sm font-medium whitespace-nowrap">Produk</span>
                </a>

                <a href="{{ route('categories.index') }}" 
                class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('categories.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span x-show="open" class="text-sm font-medium whitespace-nowrap">Kategori Produk</span>
                </a>

                <a href="{{ route('reports.index') }}" 
                class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('reports.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <span x-show="open" class="text-sm font-medium whitespace-nowrap">Laporan Keuangan</span>
                </a>

                <a href="{{ route('purchases.index') }}" 
                class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('purchases.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} ">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    <span x-show="open" class="text-sm font-medium whitespace-nowrap">Belanja Barang</span>
                </a>

                <a href="{{ route('tutorial.index') }}" 
                class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('tutorial.*') ? 'bg-indigo-600 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18 18.246 18.477 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span x-show="open" class="text-sm font-medium whitespace-nowrap">Panduan Sistem</span>
                </a>

                <div class="pt-4 mt-4 border-t border-slate-100">
                    <div class="flex items-center space-x-3 px-2 mb-4">
                        <div class="w-8 h-8 shrink-0 rounded-full bg-slate-900 flex items-center justify-center text-white text-[10px] font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div x-show="open" class="overflow-hidden">
                            <p class="text-xs font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-slate-500 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full py-2 border border-slate-200 text-xs font-bold text-slate-600 hover:bg-red-50 hover:text-red-600 hover:border-red-100 rounded-lg transition flex items-center justify-center">
                            <svg class="w-4 h-4 shrink-0" :class="open ? 'mr-2' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            <span x-show="open">LOGOUT</span>
                        </button>
                    </form>
                </div>
            </nav>

            @if(auth()->user()->role === 'admin')
            <div class="p-4 border-t border-slate-100 bg-white" x-show="open">
                <a href="{{ route('admin.users') }}" 
                class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.users') ? 'bg-slate-900 text-white shadow-lg shadow-slate-200' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.users') ? 'text-white' : 'text-slate-400 group-hover:text-slate-900' }}" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span x-show="open" class="text-sm font-bold uppercase tracking-tight whitespace-nowrap">Manajemen Akun</span>
                </a>
            </div>
            @endif
               
        </aside>

{{-- MAIN CONTENT --}}
<main class="flex-1 overflow-y-auto px-8 py-10">
    <div class="mb-10">
        <h2 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Pusat Bantuan</h2>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">PANDUAN PENGGUNAAN FITUR</h1>
        <p class="text-sm text-slate-500 mt-2">Pelajari cara mengelola operasional Warung RZ dengan efisien.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $menus = [
                [
                    'title' => 'Dashboard', 
                    'icon' => '📊', 
                    'desc' => ['Pantau ringkasan penjualan harian', 'Lihat statistik produk terlaris', 'Monitor arus kas secara real-time', ]
                ],
                [
                    'title' => 'Kasir (POS)', 
                    'icon' => '🛒', 
                    'desc' => ['Input transaksi penjualan cepat', 'Pilih metode pembayaran', 'Cetak struk belanja pelanggan']
                ],
                [
                    'title' => 'Produk', 
                    'icon' => '📦', 
                    'desc' => ['Kelola stok barang gudang', 'Atur harga jual & modal', 'Update status ketersediaan barang']
                ],
                [
                    'title' => 'Kategori Produk', 
                    'icon' => '🏷️', 
                    'desc' => ['Kelompokkan produk agar rapi', 'Filter pencarian barang di kasir', 'Manajemen brand atau vendor']
                ],
                [
                    'title' => 'Laporan Keuangan', 
                    'icon' => '📈', 
                    'desc' => ['Unduh laporan laba rugi bulanan', 'Analisa performa operasional', 'Rekapitulasi pajak penjualan']
                ],
                [
                    'title' => 'Belanja Barang', 
                    'icon' => '📝', 
                    'desc' => ['Catat pengeluaran stok baru', 'List daftar belanja supplier', 'Update otomatis saldo operasional']
                ],
                // FITUR BARU: AI ASSISTANT
                [
                    'title' => 'AI Smart Assistant', 
                    'icon' => '✨', 
                    'is_ai' => true,
                    'desc' => ['Prediksi stok habis otomatis', 'Rekomendasi harga jual ideal', 'Analisa otomatis tren pasar']
                ],
            ];
        @endphp

        @foreach($menus as $menu)
        <div class="bg-white border {{ isset($menu['is_ai']) ? 'border-slate-900 shadow-lg shadow-slate-200' : 'border-slate-200' }} rounded-2xl p-6 transition-all duration-300 hover:border-slate-900 hover:shadow-xl hover:shadow-slate-200/50 hover:-translate-y-1 group relative overflow-hidden">
            
            {{-- Badge AI --}}
            @if(isset($menu['is_ai']))
                <div class="absolute top-0 right-0 bg-slate-900 text-white text-[9px] font-black px-3 py-1.5 rounded-bl-xl uppercase tracking-widest">
                    AI Power
                </div>
            @endif

            <div class="flex items-center space-x-4 mb-5">
                <div class="w-12 h-12 {{ isset($menu['is_ai']) ? 'bg-slate-900 text-white' : 'bg-slate-50 text-slate-900' }} rounded-xl flex items-center justify-center text-2xl group-hover:bg-slate-900 group-hover:text-white group-hover:scale-110 transition-all duration-300">
                    {{ $menu['icon'] }}
                </div>
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">{{ $menu['title'] }}</h3>
            </div>
            
            <ul class="space-y-3">
                @foreach($menu['desc'] as $item)
                <li class="flex items-start space-x-3">
                    <span class="w-1.5 h-1.5 rounded-full {{ isset($menu['is_ai']) ? 'bg-slate-900' : 'bg-slate-300' }} mt-1.5 group-hover:bg-slate-900 transition-colors"></span>
                    <p class="text-[13px] {{ isset($menu['is_ai']) ? 'text-slate-800 font-medium' : 'text-slate-500' }} leading-tight group-hover:text-slate-700">
                        {{ $item }}
                    </p>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>

    
</main>

        
        </main>
    </div>
</body>
</html>