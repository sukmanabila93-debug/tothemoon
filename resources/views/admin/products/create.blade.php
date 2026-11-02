@extends('layouts.admin')

@section('content')
<div x-data="{ imagePreview: null }">

    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Tambah Produk</h1>
        <p class="text-gray-500 text-sm mt-1">Isi detail dan spesifikasi produk Tothemoon</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-600 p-4 rounded-md mb-6 text-sm border border-red-200">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Kolom Kiri: Upload Gambar (Lebar 4) -->
            <div class="lg:col-span-4">
                
                <!-- Container Utama Gambar (Persis Mockup) -->
                <div class="border border-gray-300 rounded-lg overflow-hidden bg-white"
                    x-data="{ img1: null, img2: null, img3: null }">"
                     
                    <!-- AREA ATAS: Upload & Preview Gambar Utama -->
                    <div class="relative w-full aspect-[4/5] bg-[#F9F9F9] flex flex-col items-center justify-center cursor-pointer hover:bg-gray-100 transition"
                         @click="document.getElementById('main_image').click()">
                        
                        <!-- Placeholder text -->
                        <div x-show="!img1" class="text-center p-6 flex flex-col items-center">
                            <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-sm text-gray-600 font-medium">Klik untuk mengunggah gambar<br>atau drag & drop</p>
                            <p class="text-xs text-gray-400 mt-2">(Format JPG, PNG, Max 5MB)</p>
                        </div>

                        <!-- Preview Foto Utama -->
                        <img x-show="img1" :src="img1" class="w-full h-full object-cover object-top absolute inset-0" style="display: none;">
                        
                        <input type="file" name="main_image" id="main_image" class="hidden" required accept="image/*"
                               @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => img1 = e.target.result; reader.readAsDataURL(file); }">
                    </div>

                    <!-- AREA BAWAH: 3 Kotak Thumbnail -->
                    <div class="flex items-center gap-4 p-4 border-t border-gray-200 bg-white">
                        
                        <!-- Thumbnail 1 (Otomatis merefleksikan gambar utama) -->
                        <div class="w-16 h-16 rounded-md border border-gray-200 overflow-hidden bg-gray-50 flex-shrink-0">
                            <img x-show="img1" :src="img1" class="w-full h-full object-cover" style="display: none;">
                        </div>

                        <!-- Thumbnail 2 (Klik untuk unggah Foto 2) -->
                        <div class="w-16 h-16 rounded-md border border-gray-300 overflow-hidden bg-[#F9F9F9] flex items-center justify-center cursor-pointer hover:border-black transition flex-shrink-0 relative"
                             @click="document.getElementById('image_2').click()">
                            <span x-show="!img2" class="text-2xl text-gray-500 font-light">+</span>
                            <img x-show="img2" :src="img2" class="w-full h-full object-cover absolute inset-0" style="display: none;">
                            
                            <input type="file" name="image_2" id="image_2" class="hidden" accept="image/*"
                                   @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => img2 = e.target.result; reader.readAsDataURL(file); }">
                        </div>

                        <!-- Thumbnail 3 (Klik untuk unggah Foto 3) -->
                        <div class="w-16 h-16 rounded-md border border-gray-300 overflow-hidden bg-[#F9F9F9] flex items-center justify-center cursor-pointer hover:border-black transition flex-shrink-0 relative"
                             @click="document.getElementById('image_3').click()">
                            <span x-show="!img3" class="text-2xl text-gray-500 font-light">+</span>
                            <img x-show="img3" :src="img3" class="w-full h-full object-cover absolute inset-0" style="display: none;">
                            
                            <input type="file" name="image_3" id="image_3" class="hidden" accept="image/*"
                                   @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => img3 = e.target.result; reader.readAsDataURL(file); }">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Form Input Terstruktur (Lebar 8) -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- SEGMEN 1: INFORMASI UTAMA -->
                <div class="bg-white p-6 md:p-8 border border-gray-100 rounded-xl shadow-sm space-y-5">
                    <h3 class="text-sm font-extrabold text-black uppercase tracking-wider border-b border-gray-100 pb-3 mb-5">Informasi Utama</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-600 tracking-wider mb-1.5">Nama Produk<span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 tracking-wider mb-2">Kategori<span class="text-red-500">*</span></label>
                            <select name="category_id" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-2">Harga (Rp)<span class="text-red-500">*</span></label>
                            <input type="number" name="price" value="{{ old('price') }}" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-3">Pilihan Ukuran<span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-6">
                            @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="sizes[]" value="{{ $size }}" class="rounded border-gray-300 text-black shadow-sm focus:border-black focus:ring focus:ring-black focus:ring-opacity-50 w-4 h-4"
                                {{ is_array(old('sizes')) && in_array($size, old('sizes')) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm font-bold text-gray-900">{{ $size }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-2">Tautan Shopee<span class="text-red-500">*</span></label>
                        <input type="url" name="shopee_link" value="{{ old('shopee_link') }}" placeholder="https://shopee.co.id/..." class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-3">Status Tampil<span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-8">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="status" value="aktif" class="border-gray-300 text-black focus:ring-black w-4 h-4" {{ old('status', 'aktif') == 'aktif' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm font-medium text-gray-900">Aktif</span>
                            </label>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="status" value="nonaktif" class="border-gray-300 text-black focus:ring-black w-4 h-4" {{ old('status') == 'nonaktif' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm font-medium text-gray-500">Nonaktif</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- SEGMEN 2: SPESIFIKASI & DESKRIPSI (Sinkron dengan User) -->
                <div class="bg-white p-6 md:p-8 border border-gray-100 rounded-xl shadow-sm space-y-5">
                    <h3 class="text-sm font-extrabold text-black uppercase tracking-wider border-b border-gray-100 pb-3 mb-5">Spesifikasi & Detail</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Disimpan ke dalam array 'details' JSON -->
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-2">Bahan / Kain</label>
                            <input type="text" name="details[bahan]" value="{{ old('details.bahan', '') }}" placeholder="Contoh: Katun" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-2">Motif</label>
                            <input type="text" name="details[motif]" value="{{ old('details.motif', '') }}" placeholder="Contoh: Polos / Sablon" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-2">Detail Material</label>
                            <input type="text" name="details[material]" value="{{ old('details.material', '') }}" placeholder="Contoh: 100% Cotton 16s" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-2">Cutting / Potongan</label>
                            <input type="text" name="details[cutting]" value="{{ old('details.cutting', '') }}" placeholder="Contoh: Oversize Boxy" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 tracking-wider mb-2">Deskripsi Lengkap<span class="text-red-500">*</span></label>
                        <textarea name="description" rows="5" placeholder="Tuliskan deskripsi utama produk..." class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>{{ old('description') }}</textarea>
                        <p class="text-[10px] text-gray-400 mt-1">*Aturan cuci & Info pengiriman sudah diatur otomatis oleh sistem frontend.</p>
                    </div>
                </div>

                <!-- Tombol Action -->
                <div class="pt-2 flex justify-end gap-4">
                    <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-200 rounded-md text-sm font-bold text-gray-600 hover:bg-gray-50 transition">Batal</a>
                    <button type="submit" class="px-8 py-3 bg-black text-white rounded-md text-sm font-bold hover:bg-gray-800 transition shadow-md uppercase tracking-wider">Simpan Produk</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection