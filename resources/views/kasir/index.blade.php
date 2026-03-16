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
            
            <nav class="mt-4 px-4 flex-1 space-y-1 overflow-y-auto custom-scroll">
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

                <a href="{{ route('reports.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('reports.*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <span class="text-sm font-medium">Laporan</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-100">
                <button onclick="window.location.reload()" class="w-full py-2 text-[10px] font-bold text-slate-400 hover:text-slate-900 uppercase tracking-widest transition">
                    Refresh System
                </button>
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
                        placeholder="Cari menu favorit pelanggan...">
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
            <div class="product-card bg-white rounded-lg border border-slate-200 overflow-hidden flex flex-col hover:border-slate-900 transition-all shadow-sm h-full"
                 data-name="{{ strtolower($p->name) }}" 
                 data-category="{{ $p->category->name ?? '' }}">
                
                <div class="aspect-square bg-slate-50 relative overflow-hidden border-b border-slate-100">
                    @if($p->image)
                        <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300 font-bold text-xs uppercase">
                            {{ substr($p->name, 0, 2) }}
                        </div>
                    @endif
                </div>

                <div class="p-2 flex-1 flex flex-col">
                    <h4 class="text-[10px] font-bold text-slate-800 uppercase truncate mb-0.5" title="{{ $p->name }}">
                        {{ $p->name }}
                    </h4>
                    <p class="text-[11px] font-black text-slate-900 mb-2">
                        Rp {{ number_format($p->price, 0, ',', '.') }}
                    </p>

                    <button @click="addToCart({{ $p->id }}, '{{ $p->name }}', {{ $p->price }})" 
                            class="mt-auto w-full py-1.5 bg-slate-900 text-white rounded-md text-[9px] font-bold uppercase tracking-wider hover:bg-slate-800 transition-colors active:scale-95 flex items-center justify-center space-x-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add</span>
                    </button>
                </div>
            </div>
            @empty
            <div class="col-span-full py-10 text-center text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em]">
                Kosong
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

            <div class="p-5 bg-white border-t border-slate-100">
                <div class="mb-4">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2 block">Nama Pelanggan</label>
                    <input type="text" id="customer_name" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none transition" placeholder="Input Nama...">
                </div>

                <div class="flex justify-between items-center mb-4">
                    <p class="text-[9px] text-slate-400 font-bold uppercase">Total Bayar</p>
                    <p class="text-base font-black text-slate-900 tracking-tighter" x-text="'Rp' + totalPrice.toLocaleString()"></p>
                </div>

                <button @click="checkout()" :disabled="cart.length === 0"
                    class="w-full py-3 bg-slate-900 text-white rounded-lg font-bold text-[10px] uppercase tracking-[0.2em] hover:bg-slate-800 transition disabled:opacity-20 active:scale-95">
                    Proses Checkout
                </button>
            </div>
        </aside>
    </div>

    <script>
        // JS untuk Filter Manual
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

        // Alpine JS Store
        function posSystem() {
        return {
            cart: [],
            totalPrice: 0,
            addToCart(id, name, price) {
                let found = this.cart.find(i => i.id === id);
                if (found) { found.qty++; } 
                else { this.cart.push({ id, name, price, qty: 1 }); }
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
            },
            // --- BAGIAN YANG DIUPDATE ---
            async checkout() {
                // Ambil nilai dari input nama yang ada di Blade
                const customerName = document.getElementById('customer_name').value;

                if (!customerName) {
                    alert('Tolong isi nama pelanggan dulu, Bang!');
                    return;
                }

                if (this.cart.length === 0) {
                    alert('Keranjang masih kosong!');
                    return;
                }

                if (!confirm('Selesaikan transaksi atas nama ' + customerName + '?')) return;

                const res = await fetch("{{ route('kasir.store') }}", {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                    },
                    // Tambahkan properti 'customer' ke dalam body JSON
                    body: JSON.stringify({ 
                        customer: customerName, 
                        total_price: this.totalPrice, 
                        items: this.cart 
                    })
                });

                if (res.ok) { 
                    alert('Transaksi Berhasil!'); 
                    window.location.reload(); 
                } else {
                    alert('Gagal menyimpan transaksi, cek koneksi atau database.');
                }
            }
        }
    }
    </script>

    
</body>
</html>