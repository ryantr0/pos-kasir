<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - RYAN STORE</title>
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
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Create Admin Account</p>
        </div>

        <div class="w-full sm:max-w-md bg-white border border-slate-200 shadow-sm rounded-2xl overflow-hidden">
            <div class="p-8">
                <div class="mb-8 text-center"> {{-- Tambahkan text-center di sini --}}
                <h2 class="text-xl font-bold text-slate-800 uppercase tracking-tight">
                    REGISTER
                </h2>
            </div>  

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="name" class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition outline-none"
                            >
                        @if($errors->has('name'))
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition outline-none">
                        @if($errors->has('email'))
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Password</label>
                        <input id="password" type="password" name="password" required 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition outline-none">
                        @if($errors->has('password'))
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="mb-8">
                        <label for="password_confirmation" class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition outline-none">
                    </div>

                    <button type="submit" class="w-full bg-slate-900 text-white text-xs font-bold py-4 rounded-xl hover:bg-black shadow-md transition-all active:scale-[0.98] uppercase tracking-widest mb-4">
                        REGISTER
                    </button>

                    <a href="{{ route('login') }}" class="block w-full text-center text-[11px] font-bold text-slate-400 hover:text-slate-900 transition uppercase tracking-widest">
                        Sudah punya akun? Login
                    </a>
                </form>
            </div>
        </div>
        <p class="mt-8 text-[11px] text-slate-400 font-bold uppercase tracking-widest italic">© 2026 RZ COMPANY — Web Builder</p>
    </div>

</body>
</html>