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
            <div class="w-8 h-8 bg-slate-900 rounded-lg flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <h1 class="text-[10px] font-black tracking-tighter text-slate-800 uppercase hidden sm:block">WARUNG RZ</h1>
        </div>

        <div class="flex items-center">
            <button 
                @click="open = !open" 
                type="button"
                :class="open ? 'bg-rose-500 shadow-rose-200' : 'bg-slate-900 shadow-slate-200'"
                class="flex items-center space-x-2 px-4 py-1.5 rounded-full shadow-lg transition-all duration-300 active:scale-95 group cursor-pointer"
            >
               

                <span 
                    class="text-[10px] font-black uppercase tracking-[0.2em] text-white"
                    x-text="open ? 'TUTUP' : 'daftar menu'"
                ></span>

                
            </button>
        </div>

        <div 
            x-show="open" 
            x-cloak
            @click.away="open = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="absolute top-full left-0 w-full bg-white border-b border-x border-slate-100 shadow-2xl z-[100] p-6 rounded-b-3xl mt-0"
        >
            <div class="flex flex-wrap gap-2 justify-center">
                <button 
                    type="button"
                    @click="activeCategory = 'all'; open = false"
                    :class="activeCategory === 'all' ? 'bg-slate-900 text-white shadow-lg shadow-slate-200' : 'border border-slate-200 bg-white text-slate-600'"
                    class="px-6 py-2.5 rounded-full text-[10px] font-bold transition-all uppercase whitespace-nowrap">
                    SEMUA
                </button>

                @foreach($categories as $category)
                <button 
                    type="button"
                    @click="activeCategory = '{{ Str::slug($category->name) }}'; open = false"
                    :class="activeCategory === '{{ Str::slug($category->name) }}' ? 'bg-slate-900 text-white shadow-lg shadow-slate-200' : 'border border-slate-200 bg-white text-slate-600'"
                    class="px-6 py-2.5 rounded-full text-[10px] font-bold transition-all uppercase whitespace-nowrap">
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