<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ sidebarOpen: false, darkMode: localStorage.getItem('dark') === 'true' }" 
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="antialiased bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100">

    <div class="flex min-h-screen overflow-hidden">
        
        <div x-show="sidebarOpen" class="fixed inset-0 z-50 lg:hidden" x-cloak>
            <div @click="sidebarOpen = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
            
            <nav class="relative flex flex-col w-64 max-w-xs h-full bg-white dark:bg-slate-900 shadow-xl">
                <div class="p-6 border-b dark:border-slate-800">
                    <h1 class="font-black text-emerald-600">WARUNG RZ</h1>
                </div>
                <div class="flex-1 overflow-y-auto p-4 space-y-2">
                    @include('layouts.navigation-links') {{-- Pindahin link navigasi ke file terpisah biar rapi --}}
                </div>
            </nav>
        </div>

        <aside class="hidden lg:flex lg:flex-shrink-0 w-64 flex-col bg-white dark:bg-slate-900 border-r dark:border-slate-800">
            <div class="p-6 border-b dark:border-slate-800 text-center">
                <span class="font-black tracking-widest text-xl">WARUNG RZ</span>
            </div>
            <div class="flex-1 overflow-y-auto p-4 space-y-2">
                @include('layouts.navigation-links')
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            <header class="h-16 flex items-center justify-between px-4 bg-white dark:bg-slate-900 border-b dark:border-slate-800 sticky top-0 z-40">
                <button @click="sidebarOpen = true" class="p-2 lg:hidden text-slate-600 dark:text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                
                <h2 class="font-bold uppercase text-xs tracking-widest">{{ $header ?? 'Dashboard' }}</h2>

                <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" class="p-2 bg-slate-100 dark:bg-slate-800 rounded-lg">
                    <span x-show="!darkMode">🌙</span>
                    <span x-show="darkMode">☀️</span>
                </button>
            </header>

            <main class="flex-1 overflow-y-auto p-4 lg:p-8 bg-[#f8fafc] dark:bg-slate-950">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>