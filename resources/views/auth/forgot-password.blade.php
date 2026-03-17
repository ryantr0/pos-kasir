<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - WARUNG RZ</title>
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
                <div class="mb-6 text-center">
                    <h2 class="text-xl font-bold text-slate-800 uppercase tracking-tight">Lupa Password</h2>
                    <p class="mt-3 text-xs font-medium text-slate-500 leading-relaxed">
                        Masukkan email abang, nanti kami kirim link buat bikin password baru.
                    </p>
                </div>  

                @if (session('status'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-100 rounded-xl text-[11px] font-bold text-green-600 uppercase tracking-wider text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="email" class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition outline-none placeholder:text-slate-300"
                            placeholder="nama@email.com">
                        @if($errors->has('email'))
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="space-y-3">
                        <button type="submit" class="w-full bg-slate-900 text-white text-xs font-bold py-4 rounded-xl hover:bg-black shadow-md transition-all active:scale-[0.98] uppercase tracking-widest">
                            Kirim Link Reset
                        </button>
                        
                        <a href="{{ route('login') }}" class="block w-full text-center border border-slate-200 text-slate-600 text-[11px] font-bold py-4 rounded-xl hover:bg-slate-50 transition-all uppercase tracking-widest">
                            Kembali Ke Login
                        </a>
                    </div>
                </form>
            </div>

            <div class="bg-slate-50 border-t border-slate-100 p-4 text-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Security System — Warung RZ</p>
            </div>
        </div>

        <p class="mt-8 text-[11px] text-slate-400 font-bold uppercase tracking-widest italic">© 2026 RYAN STORE — Integrated Solution</p>
    </div>

</body>
</html>