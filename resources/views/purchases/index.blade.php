<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja Barang - Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-[#f8fafc] antialiased text-slate-900">
    <div class="flex min-h-screen">
        {{-- Sidebar (Sama persis dengan Dashboard) --}}
        <aside class="w-64 flex-shrink-0 border-r border-slate-200 bg-white">
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

            <a href="{{ route('purchases.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('purchases.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span class="text-sm font-medium">Belanja Barang</span>
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

        {{-- Main Content --}}
        <main class="flex-1 overflow-y-auto">
            <header class="h-20 flex items-center justify-between px-8 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40">
            <div>
                <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Pencatatan belanja barang</h2>
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

    <div class="p-4 space-y-8">
        <p class="text-[10px] text-slate-700 font-medium uppercase tracking-widest">SILAHKAN CATAT DENGAN DETAIL BELANJA BARANG ! </p>
    </div>

            <div class="p-8 space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    {{-- Form Input (Kiri) --}}
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sticky top-24">
                            <h3 class="text-xs font-black text-slate-800 uppercase tracking-widest mb-6">Input Barang Belanja</h3>
                            
                            {{-- Cari bagian Form Input (Kiri) dan ganti isinya dengan ini --}}
                            <form action="{{ route('purchases.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 block">Nama Barang</label>
                                    <input type="text" name="item_name" required class="w-full bg-slate-50 border-slate-200 rounded-xl text-sm" >
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 block">Total</label>
                                        <input type="number" name="qty" required min="1" class="w-full bg-slate-50 border-slate-200 rounded-xl text-sm" >
                                    </div>
                                    <div>
                                        <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 block">Harga Satuan</label>
                                        <input type="number" name="purchase_price" required class="w-full bg-slate-50 border-slate-200 rounded-xl text-sm" >
                                    </div>
                                </div>

                                {{-- Input Deskripsi --}}
                                <div>
                                    <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 block">Deskripsi / Catatan Tambahan</label>
                                    <textarea name="description" rows="3" class="w-full bg-slate-50 border-slate-200 rounded-xl text-sm" ></textarea>
                                </div>

                                <button type="submit" class="w-full py-4 bg-slate-900 text-white rounded-xl font-black text-[10px] uppercase tracking-widest">
                                    Simpan Catatan
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Tabel Riwayat (Kanan) --}}
<div class="lg:col-span-2">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">
            <h3 class="text-xs font-black text-slate-800 uppercase tracking-widest">Barang Belanja</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Produk & Deskripsi</th>
                        <th class="px-6 py-4 text-center">Total</th>
                        <th class="px-6 py-4 text-right">Total Modal</th>
                        <th class="px-6 py-4 text-center">Aksi</th> {{-- Tambah Header Aksi --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($purchases as $item)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 text-slate-400 text-[11px] font-medium">
                            {{ $item->created_at->format('d/m/Y H:i') }}
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="text-slate-800 font-bold uppercase tracking-tight">{{ $item->item_name }}</div>
                            @if($item->description)
                                <div class="text-[10px] text-slate-500 mt-0.5 font-medium leading-relaxed">
                                    {{ $item->description }}
                                </div>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center text-slate-600 font-bold">
                            {{ $item->qty }}
                        </td>
                        
                        <td class="px-6 py-4 text-right text-red-600 font-black tracking-tighter text-base">
                            - Rp {{ number_format($item->total_price, 0, ',', '.') }}
                        </td>

                        {{-- Tombol Hapus --}}
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('purchases.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus catatan belanja ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-300 hover:text-red-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center text-slate-400 text-xs font-medium">
                            Belum ada catatan belanja.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">
    <h3 class="text-xs font-black text-slate-800 uppercase tracking-widest">Barang Belanja</h3>
    
    {{-- Tambahkan Tombol ini bang --}}
<a href="{{ route('purchases.pdf', request()->all()) }}" 
   class="flex items-center space-x-2 bg-rose-50 hover:bg-rose-500 text-rose-600 hover:text-white px-3 py-1.5 rounded-lg transition-all duration-200 text-[10px] font-bold uppercase tracking-wider border border-rose-200 hover:border-rose-500 shadow-sm">
    
    <svg class="w-3 h-3 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
    </svg>
    
    <span>Download PDF</span>
</a>
</div>

                </div>
            </div>
        </main>
    </div>


    <script>
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
</script>
</body>
</html>