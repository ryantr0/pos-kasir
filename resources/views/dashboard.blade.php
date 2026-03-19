<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung RZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    
</head>


<body class="bg-[#f8fafc] antialiased text-slate-900">
        <div class="flex min-h-screen">
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
                <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Dashboard Overview</h2>
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

        <div class="p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Total Produk</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalProduk }}</h3>
                </div>
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Kategori</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalKategori }}</h3>
                </div>
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Pendapatan Hari Ini</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">
                        Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                    </h3>
                </div>
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Transaksi</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">
                        {{ $transaksiHariIni }}
                    </h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Tabel Transaksi (Kiri) --}}
    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                <h3 class="text-xs font-black text-slate-800 uppercase tracking-wider">Transaksi Terbaru</h3>               
                <a href="{{ route('reports.index') }}" class="text-[10px] font-bold text-slate-400 hover:text-slate-900 uppercase tracking-wider transition">Lihat Semua →</a>
            </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                        <th class="px-6 py-3">Pelanggan</th>
                        <th class="px-6 py-3 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($transaksiTerbaru as $trx)
                    <tr class="hover:bg-slate-50 transition-colors">
                        {{-- Pastikan kolom di DB namanya 'customer' --}}
                        <td class="px-6 py-4 font-medium text-slate-700">
                            {{ $trx->customer ?? 'Guest' }}
                        </td>
                        
                        {{-- Format Rupiah yang bener: nominal, desimal, pemisah desimal, pemisah ribuan --}}
                        <td class="px-6 py-4 text-right font-bold text-emerald-600">
                            Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="px-6 py-10 text-center text-slate-400 text-xs italic">
                            Belum ada transaksi hari ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

{{-- Diagram Tren Pendapatan (Pro Version) --}}
<div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col hover:shadow-xl hover:border-emerald-100 transition-all duration-500 group">
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                {{-- Diubah dari text-xl ke text-sm, dan font-bold ke font-black biar tetap tegas walau kecil --}}
                <h3 class="text-xs font-black text-slate-800 tracking-wider uppercase">STATISTIK PENJUALAN</h3>
            </div>
        </div>

        {{-- Filter Tanggal Mini --}}
        <form action="{{ route('dashboard') }}" method="GET" class="flex items-center bg-slate-50 border border-slate-200 p-1 rounded-xl gap-2">
            <div class="flex items-center space-x-1 px-1">
                <input type="date" name="start_date" value="{{ $start }}" 
                    class="w-24 text-[9px] font-bold border-none focus:ring-0 text-slate-600 bg-transparent p-0 transition-all">
                <span class="text-slate-300 text-[10px]">—</span>
                <input type="date" name="end_date" value="{{ $end }}" 
                    class="w-24 text-[9px] font-bold border-none focus:ring-0 text-slate-600 bg-transparent p-0 transition-all">
            </div>
            <button type="submit" class="bg-slate-900 text-white p-1.5 rounded-lg hover:bg-emerald-600 transition-colors">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </form>
    </div>

    {{-- INI YANG PENTING: Tempat Grafiknya --}}
    <div class="relative h-64 w-full">
        <canvas id="salesChart"></canvas>
    </div>
</div>

{{-- Load Chart.js dari CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100">
        <h3 class="text-xs font-black text-slate-800 uppercase tracking-wider">Produk Terlaris</h3>
    </div>

    <div class="p-6 space-y-4">
        @forelse($produkTerlaris as $item)
        <div class="flex items-center justify-between p-3 rounded-lg border border-slate-50 bg-slate-50/50">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded bg-white border border-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-400">#</div>
                <div>
                    {{-- Nama produk juga kita bikin tegas --}}
                    <p class="text-xs font-bold text-slate-800 uppercase">{{ $item->name }}</p>
                    <p class="text-[10px] text-slate-500 font-medium">{{ $item->sold }} TERJUAL</p>
                </div>
            </div>
        </div>
        @empty
        <div class="py-10 text-center text-slate-400 text-xs italic">Data penjualan kosong.</div>
        @endforelse
    </div>
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
document.addEventListener('DOMContentLoaded', function() {
    // --- 1. LOGIKA GRAFIK (SAGE GREEN THEME) ---
    const canvas = document.getElementById('salesChart');
    if (canvas) {
        const ctx = canvas.getContext('2d');

        // Data dari Laravel
        const labels = {!! json_encode($salesData->pluck('date')->map(fn($d) => date('d M', strtotime($d)))) !!};
        const dataValues = {!! json_encode($salesData->pluck('total')) !!};

        // Konfigurasi Warna
        const colorPrimary = '#a3b18a'; 
        const colorHover = '#3a5a40';   
        const colorGrid = '#f1f5f9';    
        const colorText = '#94a3b8';    
        const colorTooltipBg = '#1e293b'; 

        // Gradient Fill
        const gradientFill = ctx.createLinearGradient(0, 0, 0, 400);
        gradientFill.addColorStop(0, 'rgba(163, 177, 138, 0.4)'); 
        gradientFill.addColorStop(0.6, 'rgba(163, 177, 138, 0.1)'); 
        gradientFill.addColorStop(1, 'rgba(255, 255, 255, 0)');     

        // Shadow Effect
        ctx.shadowColor = 'rgba(163, 177, 138, 0.3)';
        ctx.shadowBlur = 12;
        ctx.shadowOffsetX = 0;
        ctx.shadowOffsetY = 8;

        Chart.defaults.font.family = "'Inter', sans-serif";

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Revenue',
                    data: dataValues,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderColor: colorPrimary,
                    borderWidth: 3.5,
                    tension: 0.42,
                    pointRadius: 0,
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: colorHover,
                    pointHoverBorderWidth: 3,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: { left: 10, right: 10, top: 20, bottom: 10 }
                },
                animation: {
                    duration: 2500,
                    easing: 'easeOutQuart'
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        enabled: true,
                        backgroundColor: colorTooltipBg,
                        titleFont: { size: 13, weight: 'bold' },
                        bodyFont: { size: 13 },
                        padding: 16,
                        cornerRadius: 12,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                let label = ' Total: ';
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('id-ID', { 
                                        style: 'currency', 
                                        currency: 'IDR',
                                        maximumFractionDigits: 0 
                                    }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        display: false,
                    },
                    x: {
                        grid: {
                            display: true,
                            color: colorGrid,
                            drawBorder: false,
                            lineWidth: 0.5
                        },
                        ticks: {
                            color: colorText,
                            font: { size: 10, weight: '600' },
                            padding: 12,
                            maxRotation: 0,
                            autoSkip: true,
                            maxTicksLimit: 7
                        }
                    }
                }
            }
        }); // <-- Tadi kurang kurung penutup di sini
    }

    // --- 2. FUNGSI JAM REAL-TIME (TETAP TERJAGA) ---
    function updateClock() {
        const now = new Date();
        
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        
        const clockElement = document.getElementById('realtime-clock');
        if (clockElement) {
            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
        
        const options = { weekday: 'long', year: 'numeric', month: 'short', day: '2-digit' };
        const dateString = now.toLocaleDateString('en-GB', options); 
        
        const dateElement = document.getElementById('realtime-date');
        if (dateElement) {
            dateElement.textContent = dateString;
        }
    }

    setInterval(updateClock, 1000);
    updateClock();
});

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