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
    <a href="{{ route('reports.index') }}" 
       class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition-all duration-200 w-full
       {{ request()->is('reports*') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
        
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
        </svg>
        
        <span class="text-sm font-medium">Laporan Keuangan</span>
    </a>
</nav>
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