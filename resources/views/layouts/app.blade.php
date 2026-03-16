<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false, darkMode: localStorage.getItem('dark') === 'true' }" :class="{ 'dark': darkMode }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Warung RZ') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <style>
            [x-cloak] { display: none !important; }
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="antialiased bg-[#f8fafc] dark:bg-slate-950 text-slate-900 dark:text-slate-100 transition-colors duration-300">
        <div class="flex min-h-screen relative overflow-x-hidden">
            
            <aside 
                :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 transition-transform duration-300 transform lg:translate-x-0 lg:static lg:inset-0 flex flex-col">
                
                <div class="p-6 flex flex-col items-center justify-center text-center border-b border-slate-50 dark:border-slate-800">
                    <div class="w-12 h-12 bg-slate-900 dark:bg-emerald-500 rounded-xl flex items-center justify-center shadow-lg mb-3 rotate-3 hover:rotate-0 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h1 class="text-lg font-black tracking-tighter text-slate-800 dark:text-white leading-none uppercase">WARUNG RZ</h1>
                </div>

                <nav class="mt-4 px-4 space-y-1 flex-1 overflow-y-auto">
                    <div class="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Main Menu</div>
                    
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-slate-900 text-white dark:bg-emerald-600 shadow-md' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span class="text-sm font-semibold">Dashboard</span>
                    </a>

                    <a href="{{ route('kasir.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('kasir.*') ? 'bg-slate-900 text-white dark:bg-emerald-600 shadow-md' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="text-sm font-semibold">Kasir (POS)</span>
                    </a>

                    <a href="{{ route('products.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('products.*') ? 'bg-slate-900 text-white dark:bg-emerald-600 shadow-md' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <span class="text-sm font-semibold">Produk</span>
                    </a>
                </nav>

                <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center space-x-2 py-2.5 bg-red-50 dark:bg-red-900/10 text-red-600 dark:text-red-400 text-xs font-bold rounded-xl hover:bg-red-100 transition uppercase tracking-widest">
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </aside>

            <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm lg:hidden"></div>

            <div class="flex-1 flex flex-col min-w-0">
                <header class="h-16 flex items-center justify-between px-4 lg:px-8 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-30">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="p-2 mr-3 text-slate-600 dark:text-slate-400 lg:hidden hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </button>
                        <h2 class="text-sm font-extrabold text-slate-800 dark:text-white uppercase tracking-tight">
                            {{ $header ?? 'Dashboard Overview' }}
                        </h2>
                    </div>

                    <div class="flex items-center space-x-3">
                        <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" class="p-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-800 text-slate-500 dark:text-slate-400 hover:bg-slate-900 hover:text-white transition-all duration-300">
                            <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                            <svg x-show="!darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 118.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                        </button>
                        <div class="hidden sm:block text-[11px] font-bold text-slate-500 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-lg uppercase tracking-wider">
                            {{ date('D, d M Y') }}
                        </div>
                    </div>
                </header>

                <main class="p-4 lg:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>