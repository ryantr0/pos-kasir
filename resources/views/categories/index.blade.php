<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Produk - RYAN STORE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-900">

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

           
        </aside>

        <main class="flex-1 flex flex-col">
            <header class="h-20 flex items-center justify-between px-8 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40">
                <div>
                    <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider">kategori produk</h2>
                    <p class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">Warung RZ </p>
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
            
        </aside>

        <div class="p-8">
            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 text-xs font-bold rounded-xl uppercase tracking-wide">
                {{ session('success') }}
            </div>
            @endif

            <div class="mb-8 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <form action="{{ route('categories.store') }}" method="POST" class="flex items-end gap-4">
                    @csrf
                    <div class="flex-1">
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 block">Nama Kategori Baru</label>
                        <input type="text" name="name" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none focus:border-slate-900 transition" >
                    </div>
                    <button type="submit" class="bg-slate-900 text-white px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-black transition shadow-sm uppercase">
                        + Tambah Kategori
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nama Kategori</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Jumlah Produk</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($categories as $category)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                {{-- PERUBAHAN: Sekarang bisa diklik untuk buka Modal Produk --}}
                                <button type="button" onclick="openCategoryModal({{ $category->id }}, '{{ $category->name }}')" class="text-left outline-none group">
                                    <p class="text-sm font-black text-slate-800 uppercase tracking-wider not-italic">
                                        {{ $category->name }}
                                    </p>
                                    <p class="text-[10px] text-slate-400 uppercase tracking-tight not-italic">
                                        Slug: {{ $category->slug }} (Klik untuk detail)
                                    </p>
                                </button>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-block px-3 py-1 bg-slate-100 text-slate-600 text-[10px] font-bold rounded-full">
                                    {{ $category->products_count ?? 0 }} ITEM
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Produk di dalamnya akan kehilangan kategori.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 border border-red-100 text-[10px] font-bold text-red-500 rounded-md hover:bg-red-500 hover:text-white transition uppercase">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="py-20 text-center">
                                <p class="text-slate-400 text-xs italic">Belum ada kategori. Silahkan tambah kategori pertama Abang!</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

{{-- PENAMBAHAN: Modal List Produk (Style Cart) --}}
<div id="category-modal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-200">
            <div class="bg-white px-6 py-6 border-b border-slate-100 flex justify-between items-center">
                <div>
                    {{-- Judul: Ditambah not-italic biar pasti tegak, font-black biar tegas --}}
                    <h3 id="modal-title" class="text-sm font-black text-slate-900 uppercase tracking-widest not-italic">NAMA KATEGORI</h3>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tight not-italic">Daftar Produk Terkait</p>
                </div>
                <button onclick="closeCategoryModal()" class="text-slate-400 hover:text-slate-900 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div id="modal-content" class="px-6 py-4 max-h-[400px] overflow-y-auto space-y-3">
                <div class="flex justify-center py-10">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-slate-900"></div>
                </div>
            </div>
            <div class="bg-slate-50 px-6 py-4 border-t border-slate-100">
                {{-- Tombol Tutup: Juga dipastikan not-italic --}}
                <button onclick="closeCategoryModal()" class="w-full bg-slate-900 text-white px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-widest shadow-lg shadow-slate-200 not-italic">
                    Tutup Detail
                </button>
            </div>
        </div>
    </div>
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

    function openCategoryModal(categoryId, categoryName) {
        const modal = document.getElementById('category-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalContent = document.getElementById('modal-content');

        modal.classList.remove('hidden');
        modalTitle.textContent = categoryName;
        modalContent.innerHTML = `<div class="flex justify-center py-10"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-slate-900"></div></div>`;

        fetch(`/api/categories/${categoryId}/products`)
            .then(response => response.json())
            .then(products => {
                if (products.length === 0) {
                    modalContent.innerHTML = `<p class="text-center text-slate-400 text-xs py-10 italic">Tidak ada produk dalam kategori ini.</p>`;
                    return;
                }

                let html = '';
                products.forEach(product => {
                    // LOGIKA TAMBAHAN: Cek status is_ready
                    const isReady = product.is_ready; 
                    
                    html += `
                    <div class="flex items-center p-3 bg-slate-50 rounded-2xl border border-slate-100 hover:border-slate-300 transition-all ${!isReady ? 'opacity-70' : ''}">
                        <div class="w-12 h-12 bg-white rounded-xl border border-slate-200 flex items-center justify-center overflow-hidden flex-shrink-0 ${!isReady ? 'grayscale' : ''}">
                            ${product.image ? `<img src="/storage/${product.image}" class="w-full h-full object-cover">` : `<svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>`}
                        </div>
                        <div class="ml-4 flex-1">
                            <div class="flex justify-between items-start">
                                <p class="text-[11px] font-black text-slate-800 uppercase leading-none">${product.name}</p>
                                
                                {{-- LABEL STOK HABIS --}}
                                ${!isReady ? `<span class="text-[8px] font-black bg-rose-100 text-rose-600 px-2 py-0.5 rounded-full uppercase tracking-tighter">Habis</span>` : ''}
                            </div>
                            <p class="text-[10px] ${!isReady ? 'text-slate-400 line-through' : 'text-emerald-600'} font-bold mt-1">
                                Rp ${new Intl.NumberFormat('id-ID').format(product.price)}
                            </p>
                        </div>
                    </div>`;
                });
                modalContent.innerHTML = html;
            })
            .catch(error => {
                modalContent.innerHTML = `<p class="text-center text-red-400 text-[10px] py-10 italic uppercase font-bold">Gagal memuat data produk.</p>`;
            });
    }

    function closeCategoryModal() {
        document.getElementById('category-modal').classList.add('hidden');
    }
</script>
</body>
</html>