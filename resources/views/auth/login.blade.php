<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RYAN STORE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-900">
    <div class="min-h-screen flex flex-col justify-center items-center p-6">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900 uppercase">WARUNG RZ</h1>
            
        </div>

        <div class="w-full sm:max-w-md bg-white border border-slate-200 shadow-sm rounded-2xl overflow-hidden">
            <div class="p-8">
                <div class="mb-8 text-center"> {{-- Tambahkan text-center di sini --}}
                <h2 class="text-xl font-bold text-slate-800 uppercase tracking-tight">
                    LOGIN
                </h2>
            </div>  

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="email" class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition outline-none placeholder:text-slate-300"
                            >
                        @if($errors->has('email'))
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-5">
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[11px] font-semibold text-blue-600 hover:text-blue-700 transition">Lupa Password?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition outline-none">
                        @if($errors->has('password'))
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="flex items-center mb-8">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                        <label for="remember_me" class="ml-2 text-xs font-semibold text-slate-600 cursor-pointer">Ingat saya di perangkat ini</label>
                    </div>

                    <div class="space-y-3">
                        <button type="submit" class="w-full bg-slate-900 text-white text-xs font-bold py-4 rounded-xl hover:bg-black shadow-md transition-all active:scale-[0.98] uppercase tracking-widest">
                            Masuk Ke Dashboard
                        </button>
                        
                        <a href="{{ route('register') }}" class="block w-full text-center border border-slate-200 text-slate-600 text-xs font-bold py-4 rounded-xl hover:bg-slate-50 transition-all uppercase tracking-widest">
                            Daftar Akun Baru
                        </a>
                    </div>
                </form>
            </div>

            
        </div>

        <p class="mt-8 text-[11px] text-slate-400 font-bold uppercase tracking-widest italic">© 2026 RZ COMPANY — Web Builder</p>
    </div>

</body>
</html>