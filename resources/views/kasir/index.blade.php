<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir - Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-900" x-data="posSystem()">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 flex-shrink-0 border-r border-slate-200 bg-white flex flex-col">
            <div class="p-8 flex flex-col items-center justify-center text-center border-b border-slate-50">
                <div class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center shadow-lg shadow-slate-200 mb-4 rotate-3 hover:rotate-0 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h1 class="text-xl font-black tracking-tighter text-slate-800 leading-none uppercase">WARUNG RZ</h1>
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

        <main class="flex-1 flex flex-col bg-[#fcfcfc] min-w-0">
            <div class="p-6 overflow-y-auto custom-scroll">
                <div class="mb-8 space-y-4">
                    <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                        <div class="relative w-full md:w-96 group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input type="text" id="searchInput" onkeyup="filterProducts()" 
                                class="block w-full pl-10 pr-3 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all shadow-sm" 
                                placeholder="Cari menu ">
                        </div>
                        <div class="hidden md:flex items-center space-x-2 bg-white px-3 py-1 rounded-full border border-slate-100 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[10px] font-bold text-slate-600 uppercase">System Active</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2 overflow-x-auto pb-2 scrollbar-hide">
                        <button onclick="filterCategory('all')" 
                            class="category-btn px-5 py-2 rounded-full text-xs font-bold border transition-all whitespace-nowrap bg-slate-900 text-white border-slate-900 shadow-md shadow-slate-200" 
                            data-category="all">
                            SEMUA MENU
                        </button>
                        @foreach($categories as $category)
                        <button onclick="filterCategory('{{ $category->name }}')" 
                            class="category-btn px-5 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-slate-900 hover:text-slate-900 transition-all whitespace-nowrap" 
                            data-category="{{ $category->name }}">
                            {{ strtoupper($category->name) }}
                        </button>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
                   @forelse($products as $p)
    <div class="product-card group relative bg-white rounded-lg border {{ !$p->is_ready ? 'border-slate-100 opacity-75' : 'border-slate-200 hover:border-slate-900' }} overflow-hidden flex flex-col transition-all shadow-sm h-full"
         data-name="{{ strtolower($p->name) }}" 
         data-category="{{ $p->category->name ?? '' }}">
        
        {{-- Overlay Barang Habis --}}
        @if(!$p->is_ready)
            <div class="absolute inset-0 z-20 flex items-center justify-center bg-white/40 backdrop-blur-[1px]">
                <span class="bg-rose-500 text-white text-[9px] font-black px-2.5 py-1 rounded-full shadow-xl uppercase tracking-widest rotate-12 border-2 border-white">
                    Stok Habis
                </span>
            </div>
        @endif

        {{-- Image Section --}}
        <div class="aspect-square bg-slate-50 relative overflow-hidden border-b border-slate-100 {{ !$p->is_ready ? 'grayscale' : '' }}">
            @if($p->image)
                <img src="{{ asset('storage/' . $p->image) }}" 
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    {{-- JIKA GAMBAR ERROR / 404, PAKSA MUNCULIN INISIAL BIAR GAK KOSONG --}}
                    onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-slate-100 text-slate-400 font-bold text-xs uppercase\'>{{ substr($p->name, 0, 2) }}</div>'">
            @else
                <div class="w-full h-full flex items-center justify-center text-slate-300 font-bold text-xs uppercase">
                    {{ substr($p->name, 0, 2) }}
                </div>
            @endif
        </div>

        {{-- Content Section --}}
        <div class="p-2 flex-1 flex flex-col {{ !$p->is_ready ? 'grayscale' : '' }}">
            <h4 class="text-[10px] font-bold text-slate-800 uppercase truncate mb-0.5" title="{{ $p->name }}">
                {{ $p->name }}
            </h4>
            <p class="text-[11px] font-black text-slate-900 mb-2">
                Rp {{ number_format($p->price, 0, ',', '.') }}
            </p>

            {{-- Tombol Add dengan Proteksi --}}
            <button 
                @click="addToCart({{ $p->id }}, '{{ $p->name }}', {{ $p->price }}, {{ $p->is_ready ? 1 : 0 }})"
                class="mt-auto w-full py-1.5 rounded-md text-[9px] font-bold uppercase tracking-wider transition-all flex items-center justify-center space-x-1
                {{ $p->is_ready 
                    ? 'bg-slate-900 text-white hover:bg-emerald-600 active:scale-95' 
                    : 'bg-slate-200 text-slate-400 cursor-not-allowed' }}"
                {{ !$p->is_ready ? 'disabled' : '' }}>
                
                @if($p->is_ready)
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Add to Cart</span>
                @else
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                    </svg>
                    <span>Unavailable</span>
                @endif
            </button>
        </div>
    </div>
@empty
    <div class="col-span-full py-20 text-center">
        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-50 mb-3">
            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
        </div>
        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em]">Belum Ada Produk di Kategori Ini</p>
    </div>
@endforelse
                </div>
            </div>
        </main>

        <aside class="w-80 bg-white border-l border-slate-200 flex flex-col shadow-xl z-20">
            <div class="p-5 border-b border-slate-50">
                <div class="flex items-center justify-between">
                    <h3 class="text-[11px] font-black text-slate-900 uppercase tracking-widest">Order Summary</h3>
                    <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded" x-text="cart.length + ' Items'"></span>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-2 custom-scroll">
                <template x-for="item in cart" :key="item.id">
                    <div class="flex justify-between items-center p-2 rounded-lg bg-slate-50/50 border border-slate-100">
                        <div class="flex-1 min-w-0 pr-2">
                            <p class="text-[9px] font-bold text-slate-700 uppercase truncate" x-text="item.name"></p>
                            <p class="text-[10px] text-slate-900 font-black mt-0.5" x-text="'Rp' + (item.price * item.qty).toLocaleString()"></p>
                        </div>
                        <div class="flex items-center space-x-1.5">
                            <button @click="updateQty(item.id, -1)" class="w-5 h-5 flex items-center justify-center rounded bg-white border border-slate-200 text-slate-400 hover:text-red-500 font-bold text-[10px]">-</button>
                            <span class="text-[10px] font-black w-3 text-center" x-text="item.qty"></span>
                            <button @click="updateQty(item.id, 1)" class="w-5 h-5 flex items-center justify-center rounded bg-white border border-slate-200 text-slate-400 hover:text-emerald-500 font-bold text-[10px]">+</button>
                        </div>
                    </div>
                </template>
                
                <template x-if="cart.length === 0">
                    <div class="h-full flex flex-col items-center justify-center opacity-20 py-20">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        <p class="text-[8px] font-bold uppercase tracking-widest">Belum ada pesanan</p>
                    </div>
                </template>
            </div>

            <div class="p-5 bg-white border-t border-slate-100 space-y-4">
                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2 block">Nama Pelanggan</label>
                    <input type="text" id="customer_name" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none transition shadow-sm" placeholder="Input Nama...">
                </div>

                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2 block">Metode Bayar</label>
                    <div class="grid grid-cols-2 gap-2">
                        <button type="button" 
                            @click.prevent="paymentMethod = 'CASH'; cashAmount = 0" 
                            :class="paymentMethod === 'CASH' ? 'bg-slate-900 text-white border-slate-900 shadow-md' : 'bg-white text-slate-600 border-slate-200'" 
                            class="py-2 px-4 border rounded-lg text-[10px] font-bold transition-all">
                            CASH
                        </button>

                        <button type="button" 
                            @click.prevent="paymentMethod = 'QRIS'; showQrisModal = true; cashAmount = totalPrice" 
                            :class="paymentMethod === 'QRIS' ? 'bg-slate-900 text-white border-slate-900 shadow-md' : 'bg-white text-slate-600 border-slate-200'" 
                            class="py-2 px-4 border rounded-lg text-[10px] font-bold transition-all">
                            QRIS
                        </button>
                    </div>
                </div>

                <div x-show="paymentMethod === 'CASH'" x-transition class="space-y-3 p-3 rounded-xl bg-slate-50 border border-slate-100">
                    <div>
                        <label class="text-[9px] font-bold text-slate-500 uppercase">Uang Tunai</label>
                        <input type="number" x-model.number="cashAmount" @input="calculateChange" class="w-full px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-slate-900" placeholder="0">
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[9px] font-bold text-slate-400 uppercase">Kembalian</span>
                        <span class="text-xs font-black" :class="changeAmount < 0 ? 'text-red-500' : 'text-emerald-600'" x-text="'Rp' + changeAmount.toLocaleString()"></span>
                    </div>
                </div>

                
<div x-show="showQrisModal" x-cloak x-transition
    {{-- Di sini kuncinya: bg-black/40 bikin background belakang tetap kelihatan (transparan) --}}
    class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-black/40 backdrop-blur-[2px]" 
    @click.self="showQrisModal = false">
    
    {{-- Tombol Close --}}
    <button @click="showQrisModal = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <div class="flex flex-col items-center justify-center space-y-6 w-full max-w-sm px-6">
        
        {{-- Gambar QR --}}
        <div class="w-full">
            <img src="{{ asset('images/IMG_8032.jpg') }}" 
                 class="w-full h-auto object-contain rounded-2xl shadow-2xl border-4 border-white/10">
        </div>

        {{-- Info Tagihan --}}
        <div class="text-center ">
            <p class="text-[10px] font-bold text-white/60 uppercase tracking-widest mb-1">Total Pembayaran</p>
            <h3 class="text-3xl font-black text-white" x-text="'Rp' + totalPrice.toLocaleString()"></h3>
        </div>

        {{-- Button Selesai --}}
        <button @click="showQrisModal = false" 
                class="w-full py-4 bg-white text-slate-900 rounded-xl font-black text-xs uppercase tracking-widest transition-all active:scale-95 shadow-lg">
            Selesai Scan
        </button>
        
        <p class="text-[10px] font-bold text-white/40 uppercase tracking-[0.4em]">Warung RZ</p>
    </div>
</div>

                <div class="pt-2 border-t border-slate-50">
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-[9px] text-slate-400 font-bold uppercase">Total Bayar</p>
                        <p class="text-base font-black text-slate-900 tracking-tighter" x-text="'Rp' + totalPrice.toLocaleString()"></p>
                    </div>

                    {{-- PERBAIKAN DI SINI: Huruf kecil 'cash' diganti jadi 'CASH' agar sinkron --}}
                    <button @click="checkout()" :disabled="cart.length === 0 || (paymentMethod === 'CASH' && (cashAmount < totalPrice || cashAmount === 0))"
                        class="w-full py-3 bg-slate-900 text-white rounded-lg font-bold text-[10px] uppercase tracking-[0.2em] hover:bg-slate-800 transition disabled:opacity-20 active:scale-95">
                        Proses Checkout
                    </button>
                </div>
            </div>
        </aside>
    </div>

<script>
    function filterProducts() {
        let input = document.getElementById('searchInput').value.toLowerCase();
        let cards = document.getElementsByClassName('product-card');
        for (let i = 0; i < cards.length; i++) {
            let name = cards[i].getAttribute('data-name');
            cards[i].style.display = name.includes(input) ? "" : "none";
        }
    }

    function filterCategory(category) {
        let cards = document.getElementsByClassName('product-card');
        let buttons = document.getElementsByClassName('category-btn');
        for (let btn of buttons) {
            if (btn.getAttribute('data-category') === category) {
                btn.classList.add('bg-slate-900', 'text-white', 'border-slate-900', 'shadow-md');
                btn.classList.remove('bg-white', 'text-slate-600', 'border-slate-200');
            } else {
                btn.classList.remove('bg-slate-900', 'text-white', 'border-slate-900', 'shadow-md');
                btn.classList.add('bg-white', 'text-slate-600', 'border-slate-200');
            }
        }
        for (let i = 0; i < cards.length; i++) {
            let cardCat = cards[i].getAttribute('data-category');
            cards[i].style.display = (category === 'all' || cardCat === category) ? "" : "none";
        }
    }

    function posSystem() {
        return {
            cart: [],
            totalPrice: 0,
            paymentMethod: 'CASH', 
            cashAmount: 0,
            changeAmount: 0,
            showQrisModal: false,

            // TAMBAHAN: Pengecekan isReady di sini agar sinkron dengan toggle "Barang Habis"
            addToCart(id, name, price, isReady = true) {
                // Cek jika status barang tidak tersedia (0 atau false)
                if (!isReady || isReady == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Waduh!',
                        text: 'Stok ' + name + ' lagi kosong, Bang!',
                        confirmButtonColor: '#10b981'
                    });
                    return;
                }

                let found = this.cart.find(i => i.id === id);
                if (found) { 
                    found.qty++; 
                } else { 
                    this.cart.push({ id, name, price, qty: 1 }); 
                }
                this.updateTotals();
            },

            updateQty(id, amount) {
                let item = this.cart.find(i => i.id === id);
                if (item) {
                    item.qty += amount;
                    if (item.qty < 1) this.cart = this.cart.filter(i => i.id !== id);
                }
                this.updateTotals();
            },

            updateTotals() {
                this.totalPrice = this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
                this.calculateChange(); 
            },

            calculateChange() {
                this.changeAmount = this.cashAmount - this.totalPrice;
            },

            async checkout() {
    const customerName = document.getElementById('customer_name').value;
    
    // Validasi Dasar
    if (!customerName) { 
        alert('Tolong isi nama pelanggan dulu, Bang!'); 
        return; 
    }
    if (this.cart.length === 0) { 
        alert('Keranjang masih kosong!'); 
        return; 
    }
    if (this.paymentMethod === 'CASH' && this.cashAmount < this.totalPrice) {
        alert('Uang tunai kurang, Bang!');
        return;
    }

    if (!confirm('Selesaikan transaksi atas nama ' + customerName + '?')) return;

    try {
        const res = await fetch("{{ route('kasir.store') }}", {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json',
                'Accept': 'application/json', // WAJIB: Agar Laravel kirim pesan error JSON, bukan halaman HTML
                'X-CSRF-TOKEN': '{{ csrf_token() }}' 
            },
            body: JSON.stringify({ 
                customer: customerName, 
                total_price: this.totalPrice, 
                payment_method: this.paymentMethod, 
                cash_received: this.cashAmount,
                items: this.cart // Pastikan ini mengirim array [{id, qty, price}, ...]
            })
        });

        const data = await res.json(); // Ambil pesan error dari backend

        if (res.ok) { 
            alert('Transaksi Berhasil!'); 
            window.location.reload(); 
        } else {
            // Jika gagal, tampilkan pesan error asli dari Controller
            alert('Gagal: ' + (data.message || 'Terjadi kesalahan sistem'));
            console.error('Error Detail:', data);
        }
    } catch (error) {
        alert('Koneksi terputus atau server down!');
        console.error(error);
    }
}
}
</script>
</body>
</html>