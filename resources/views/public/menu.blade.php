<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-900" x-data="{ open: false, activeCategory: 'all' }">
    
    <header class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-[100] px-4 py-3 shadow-sm">
    <div class="max-w-4xl mx-auto flex items-center justify-between relative h-10">
        
        <div class="flex items-center space-x-3 z-10 w-32">
            <h1 class="text-[20px] font-black tracking-tighter text-slate-800 uppercase hidden sm:block">WARUNG RZ MENU</h1>
        </div>

<div class="relative flex flex-col items-center mt-4 mb-4">
    
    <button 
        @click="open = !open" 
        type="button"
        class="relative z-[120] flex items-center space-x-2 px-2 py-1.5 transition-all duration-300 active:scale-95 group cursor-pointer bg-transparent border-none"
    >
        <span 
            class="text-[11px] font-black uppercase tracking-[0.2em] text-black"
            x-text="open ? 'TUTUP' : 'daftar menu'"
        ></span>

        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-5 w-5 text-black" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor" 
            stroke-width="2.5"
        >
            <path x-cloak x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            <path x-cloak x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>

<div 
        x-show="open" 
        x-cloak
        @click.away="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        /* mt-[-12px] menarik kotak ke atas agar tombol masuk ke area putih */
        /* pt-16 memberi ruang di atas supaya kategori tidak tertutup tombol TUTUP */
        class="absolute top-0 mt-[-12px] w-[calc(100%-3rem)] max-w-sm bg-white border border-slate-50 shadow-2xl z-[100] pt-16 pb-8 px-6 rounded-[2.5rem]"
    >
        <div class="relative z-[110] flex flex-col gap-3 items-center w-full"> 
            
            <button 
                type="button"
                @click="activeCategory = 'all'; open = false"
                :class="activeCategory === 'all' ? 'bg-slate-900 text-white shadow-lg' : 'border border-slate-100 bg-white text-slate-700'"
                class="w-full px-6 py-3.5 rounded-full text-[11px] font-semibold transition-all uppercase tracking-wider cursor-pointer">
                SEMUA MENU
            </button>

            @foreach($categories as $category)
            <button 
                type="button"
                @click="activeCategory = '{{ Str::slug($category->name) }}'; open = false"
                :class="activeCategory === '{{ Str::slug($category->name) }}' ? 'bg-slate-900 text-white shadow-lg shadow-slate-200' : 'border border-slate-200 bg-white text-slate-600'"
                class="w-full px-6 py-3.5 rounded-full text-[11px] font-bold transition-all uppercase tracking-wider cursor-pointer">
                {{ $category->name }}
            </button>
            @endforeach
        </div>
    </div>
    </div>
</header>

    <main class="max-w-5xl mx-auto pt-8">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-0.5 sm:gap-4 px-0.5 sm:px-4">
            @forelse($products as $p)
                <div 
                    x-show="activeCategory === 'all' || activeCategory === '{{ Str::slug($p->category->name ?? '') }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="bg-white sm:rounded-2xl border border-slate-100 overflow-hidden flex flex-col transition-all shadow-sm hover:shadow-md"
                >
                    <div class="aspect-square bg-slate-50 relative overflow-hidden">
                        @if($p->image)
                            <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-300 font-black text-2xl uppercase">
                                {{ substr($p->name, 0, 1) }}
                            </div>
                        @endif

                        @if(!$p->is_ready)
                        <div class="absolute inset-0 bg-white/70 backdrop-blur-[2px] flex items-center justify-center">
                            <span class="bg-rose-500 text-white text-[9px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-lg">Habis Stok</span>
                        </div>
                        @endif
                    </div>

                    <div class="p-3 sm:p-4 flex flex-col items-center text-center">
                        <h4 class="text-[12px] font-bold text-slate-800 uppercase truncate mt-0.5 w-full">
                            {{ $p->name }}
                        </h4>
                        
                        <p class="text-sm font-black text-slate-900 mt-1">
                            Rp {{ number_format($p->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 text-center">
                    <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.3em]">Belum Ada Produk</p>
                </div>
            @endforelse
        </div>
    </main>

    

</body>
</html>