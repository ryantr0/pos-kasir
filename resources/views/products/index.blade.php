<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - RYAN STORE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-900">

<div class="flex min-h-screen">
    <aside class="w-64 flex-shrink-0 border-r border-slate-200 bg-white flex flex-col">
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

    <main class="flex-1 overflow-y-auto">
        <header class="h-20 flex items-center justify-between px-8 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40">
            <div>
                <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Daftar produk</h2>
                <p class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">Warung RZ </p>
            </div>

            {{-- SEARCH BAR BARU --}}
    <div class="flex-1 max-w-md mx-8">
        <div class="relative group">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-4 h-4 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </span>
            <input type="text" id="productSearch" placeholder="Cari nama produk atau kategori..." 
                class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium outline-none focus:border-slate-900 focus:bg-white transition-all">
        </div>
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

         <div class="p-8">
    {{-- AREA BARU UNTUK TOMBOL DI LUAR HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <p class="text-lg font-black text-slate-800 tracking-tight uppercase">Total Produk: {{ $products->count() }}</p>
        </div>
        
        <a href="{{ route('products.create') }}" class="bg-slate-900 text-white px-6 py-3 rounded-xl text-xs font-bold hover:bg-black transition shadow-lg shadow-slate-200 flex items-center space-x-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>TAMBAH PRODUK BARU</span>
        </a>
    </div>

        <div class="p-8">
            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 text-xs font-bold rounded-xl uppercase tracking-wide">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Info Produk</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Kategori</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Harga</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($products as $product)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-[10px] text-slate-400 uppercase font-bold">No Img</div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800 uppercase tracking-tight">{{ $product->name }}</p>
                                        <p class="text-[10px] text-slate-400 font-medium line-clamp-1 max-w-[200px]">{{ $product->description ?? 'Tidak ada deskripsi' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-block px-3 py-1 bg-slate-100 text-slate-600 text-[10px] font-bold rounded-full uppercase italic">
                                    {{ $product->category->name ?? 'Umum' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-black text-slate-900">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="inline-block px-3 py-1.5 border border-slate-200 text-[10px] font-bold text-slate-600 rounded-md hover:bg-slate-900 hover:text-white transition">EDIT</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus produk ini?')" class="px-3 py-1.5 border border-red-100 text-[10px] font-bold text-red-500 rounded-md hover:bg-red-500 hover:text-white transition">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if($products->isEmpty())
                <div class="py-20 text-center">
                    <p class="text-slate-400 text-xs italic">Produk masih kosong, ayo tambah dulu!</p>
                </div>
                @endif
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

    // Fungsi Pencarian Produk
    const searchInput = document.getElementById('productSearch');
    
    if (searchInput) {
        searchInput.addEventListener('keyup', function(e) {
            // Cegah refresh halaman jika tekan Enter
            if (e.key === 'Enter') e.preventDefault();

            let filter = this.value.toLowerCase().trim();
            let rows = document.querySelectorAll('tbody tr:not(#searchEmptyMsg)');
            let hasResults = false;

            rows.forEach(row => {
                // Ambil text dari kolom Info Produk (Nama) dan kolom Kategori
                let productName = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                let categoryName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                if (productName.includes(filter) || categoryName.includes(filter)) {
                    row.style.display = ""; // Munculkan
                    hasResults = true;
                } else {
                    row.style.display = "none"; // Sembunyikan
                }
            });

            // Logika Pesan Kosong
            let tableBody = document.querySelector('tbody');
            let emptyMsg = document.getElementById('searchEmptyMsg');
            
            if (!hasResults && filter !== "") {
                if (!emptyMsg) {
                    let tr = document.createElement('tr');
                    tr.id = 'searchEmptyMsg';
                    tr.innerHTML = `<td colspan="4" class="py-20 text-center text-slate-400 text-xs italic uppercase font-bold tracking-widest">Barang "${filter}" nggak ketemu, Bang...</td>`;
                    tableBody.appendChild(tr);
                }
            } else {
                if (emptyMsg) emptyMsg.remove();
            }
        });
    }
</script>
</body>
</html>