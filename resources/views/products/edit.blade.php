<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - RYAN STORE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-900">

<div class="flex min-h-screen">
    <aside class="w-64 flex-shrink-0 border-r border-slate-200 bg-white flex flex-col">
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
        
        <nav class="flex-1 px-4 space-y-1">
    <a href="{{ route('products.index') }}" 
       class="flex items-center space-x-3 px-3 py-2.5 rounded-lg transition-all duration-200 
       {{ request()->routeIs('products.*') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
        
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
        </svg>
        
        <span class="text-sm font-medium">Produk</span>
    </a>
</nav>

        
    </aside>

    <main class="flex-1 overflow-y-auto">
        <header class="h-16 flex items-center justify-between px-8 bg-white border-b border-slate-200 sticky top-0 z-10">
            <div class="flex items-center space-x-2">
                <a href="{{ route('products.index') }}" class="text-slate-400 hover:text-slate-900 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <h2 class="text-sm font-bold text-slate-800 uppercase tracking-widest">Edit Produk</h2>
            </div>
        </header>

        <div class="p-8 max-w-4xl">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Nama Produk</label>
                                <input type="text" name="name" value="{{ $product->name }}" required
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition text-sm">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3">Kategori</label>
                                    <select name="category_id" required 
                                        class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-slate-900 focus:bg-white outline-none transition-all text-sm font-medium appearance-none">
                                        
                                        <option value="" disabled selected>Pilih Kategori Produk...</option>
                                        
                                        {{-- Looping otomatis dari database --}}
                                        @foreach(\App\Models\Category::all() as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    <p class="text-[9px] text-slate-400 mt-2 italic">*Kategori yang muncul di sini adalah yang sudah lo daftarkan di menu Kategori Produk.</p>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Harga (Rp)</label>
                                    <input type="number" name="price" value="{{ $product->price }}" required
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition text-sm font-bold text-slate-900">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Deskripsi Produk</label>
                                <textarea name="description" rows="4" 
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition text-sm">{{ $product->description }}</textarea>
                            </div>

                    </div>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Foto Produk (Biarkan kosong jika tidak diganti)</label>
                                <div class="relative group">
                                    <div class="w-full aspect-square rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 flex flex-col items-center justify-center overflow-hidden">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                                <p class="text-white text-[10px] font-bold uppercase">Ganti Gambar</p>
                                            </div>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-slate-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-[10px] font-bold text-slate-400 uppercase">Pilih Gambar Baru</p>
                                        @endif
                                    </div>
                                    <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                            <div>
                                <span class="block text-sm font-bold text-slate-700">Status Ketersediaan</span>
                                <span class="text-[10px] text-slate-500 italic">*Matikan jika stok barang sedang kosong</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_ready" value="1" class="sr-only peer" {{ $product->is_ready ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                            </label>
                        </div>

                    <div class="mt-10 pt-8 border-t border-slate-100 flex items-center justify-end space-x-4">
                        <a href="{{ route('products.index') }}" class="text-xs font-bold text-slate-400 hover:text-slate-600 transition tracking-widest">BATAL</a>
                        <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl text-xs font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100 uppercase tracking-widest">
                            Update Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

</body>
</html>