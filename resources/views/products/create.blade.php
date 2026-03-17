<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru - RYAN STORE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Animasi halusan dikit pas hover */
        .input-focus:focus { border-color: #0f172a; ring: 2px; ring-color: #0f172a; }
    </style>
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
            <div class="flex items-center space-x-3">
                <a href="{{ route('products.index') }}" class="w-8 h-8 flex items-center justify-center rounded-full text-slate-400 hover:bg-slate-100 hover:text-slate-900 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <h2 class="text-xs font-bold text-slate-800 uppercase tracking-widest">Tambah Produk Baru</h2>
            </div>
        </header>

        <div class="p-8 max-w-5xl">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                        <div class="lg:col-span-2 space-y-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3">Nama Produk</label>
                                    <input type="text" name="name"  required
                                        class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-slate-900 focus:bg-white outline-none transition-all text-sm font-medium">
                                </div>

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
                                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3">Harga Satuan (Rp)</label>
                                    <input type="number" name="price"  required
                                        class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-slate-900 focus:bg-white outline-none transition-all text-sm font-bold text-slate-900">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3">Deskripsi Singkat</label>
                                <textarea name="description" rows="5" 
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-slate-900 focus:bg-white outline-none transition-all text-sm font-medium leading-relaxed"></textarea>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 text-center">Preview Foto</label>
                            
                            <div class="relative group">
                                <div id="image-preview" class="w-full aspect-square rounded-3xl border-2 border-dashed border-slate-200 bg-slate-50 flex flex-col items-center justify-center overflow-hidden transition-all duration-300 group-hover:border-slate-400">
                                    <div id="preview-placeholder" class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Pilih Gambar</p>
                                    </div>
                                    <img id="image-display" class="hidden w-full h-full object-cover">
                                </div>
                                <input type="file" name="image" id="image-input" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                            </div>
                            
                            <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
                                <h4 class="text-[10px] font-bold text-slate-800 uppercase tracking-widest mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                    Panduan
                                </h4>
                                <ul class="text-[10px] text-slate-500 space-y-2 leading-relaxed italic">
                                    <li>• Gunakan rasio 1:1 (Square) agar rapi di tabel.</li>
                                    <li>• Maksimal ukuran file 2MB.</li>
                                    <li>• Format yang didukung: JPG, PNG, WEBP.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-end space-x-5">
                        <a href="{{ route('products.index') }}" class="text-[11px] font-bold text-slate-400 hover:text-slate-900 transition uppercase tracking-widest">Batalkan</a>
                        <button type="submit" class="bg-slate-900 text-white px-10 py-4 rounded-2xl text-[11px] font-bold hover:bg-black transition-all shadow-xl shadow-slate-200 uppercase tracking-[0.2em]">
                            Simpan Produk Ke Sistem
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<script>
    const imageInput = document.getElementById('image-input');
    const imageDisplay = document.getElementById('image-display');
    const previewPlaceholder = document.getElementById('preview-placeholder');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imageDisplay.src = e.target.result;
                imageDisplay.classList.remove('hidden');
                previewPlaceholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>