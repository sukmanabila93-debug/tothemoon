@extends('layouts.admin')

@section('content')
<div x-data="{ 
        img1: '{{ asset('storage/' . $product->main_image) }}', 
        img2: '{{ isset($product->gallery_images['image_2']) ? asset('storage/' . $product->gallery_images['image_2']) : '' }}', 
        img3: '{{ isset($product->gallery_images['image_3']) ? asset('storage/' . $product->gallery_images['image_3']) : '' }}' 
    }" 
    class="max-w-6xl mx-auto">

    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Edit Produk</h1>
        <p class="text-gray-500 text-sm mt-1">Perbarui detail dan spesifikasi produk Tothemoon</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-600 p-3 rounded-lg mb-6 text-sm border border-red-200">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Kolom Kiri: Upload Gambar (Lebar 4) -->
            <div class="lg:col-span-4">
                
                <!-- Main Image Upload -->
                <div class="relative w-full aspect-[4/5] bg-gray-50 border border-gray-200 rounded-xl flex flex-col items-center justify-center overflow-hidden hover:shadow-md transition cursor-pointer group"
                     @click="document.getElementById('main_image').click()">
                    
                    <img x-show="img1" :src="img1" class="w-full h-full object-cover object-top absolute inset-0">
                    
                    <!-- Overlay Ubah Foto -->
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <span class="bg-white text-black px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider shadow-sm">Ubah Foto Utama</span>
                    </div>

                    <input type="file" name="main_image" id="main_image" class="hidden" accept="image/*"
                           @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => img1 = e.target.result; reader.readAsDataURL(file); }">
                </div>

                <!-- Thumbnails Bawah -->
                <div class="grid grid-cols-3 gap-3">
                    <!-- Thumbnail 1 (Cermin Gambar Utama) -->
                    <div class="aspect-square rounded-lg border border-gray-200 overflow-hidden bg-gray-50">
                        <img x-show="img1" :src="img1" class="w-full h-full object-cover">
                    </div>

                    <!-- Thumbnail 2 -->
                    <div class="aspect-square rounded-lg border-2 border-dashed border-gray-200 overflow-hidden bg-gray-50 flex items-center justify-center cursor-pointer hover:bg-gray-100 transition relative group"
                         @click="document.getElementById('image_2').click()">
                        <!-- Tampilkan tanda + jika img2 kosong -->
                        <span x-show="!img2" class="text-xl text-gray-400 font-light">+</span>
                        <!-- Tampilkan gambar jika img2 ada -->
                        <img x-show="img2" :src="img2" class="w-full h-full object-cover absolute inset-0" style="display: none;">
                        
                        <div x-show="img2" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center" style="display: none;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </div>
                        
                        <input type="file" name="image_2" id="image_2" class="hidden" accept="image/*"
                               @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => img2 = e.target.result; reader.readAsDataURL(file); }">
                    </div>

                    <!-- Thumbnail 3 -->
                    <div class="aspect-square rounded-lg border-2 border-dashed border-gray-200 overflow-hidden bg-gray-50 flex items-center justify-center cursor-pointer hover:bg-gray-100 transition relative group"
                         @click="document.getElementById('image_3').click()">
                        <!-- Tampilkan tanda + jika img3 kosong -->
                        <span x-show="!img3" class="text-xl text-gray-400 font-light">+</span>
                        <!-- Tampilkan gambar jika img3 ada -->
                        <img x-show="img3" :src="img3" class="w-full h-full object-cover absolute inset-0" style="display: none;">
                        
                        <div x-show="img3" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center" style="display: none;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </div>

                        <input type="file" name="image_3" id="image_3" class="hidden" accept="image/*"
                               @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => img3 = e.target.result; reader.readAsDataURL(file); }">
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
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">Kategori<span class="text-red-500">*</span></label>
                            <select name="category_id" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id') ?? $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Harga (Rp)<span class="text-red-500">*</span></label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-3">Pilihan Ukuran<span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-6">
                            @php $selectedSizes = old('sizes', $product->sizes ?? []); @endphp
                            @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="sizes[]" value="{{ $size }}" class="rounded border-gray-300 text-black shadow-sm focus:border-black focus:ring focus:ring-black focus:ring-opacity-50 w-4 h-4"
                                {{ in_array($size, $selectedSizes) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm font-bold text-gray-900">{{ $size }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Tautan Shopee<span class="text-red-500">*</span></label>
                        <input type="url" name="shopee_link" value="{{ old('shopee_link', $product->shopee_link) }}" placeholder="https://shopee.co.id/..." class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-3">Status Tampil<span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-8">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="status" value="aktif" class="border-gray-300 text-black focus:ring-black w-4 h-4" {{ old('status', $product->status) == 'aktif' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm font-medium text-gray-900">Aktif</span>
                            </label>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="status" value="nonaktif" class="border-gray-300 text-black focus:ring-black w-4 h-4" {{ old('status', $product->status) == 'nonaktif' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm font-medium text-gray-500">Nonaktif</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- SEGMEN 2: SPESIFIKASI & DESKRIPSI -->
                <div class="bg-white p-6 md:p-8 border border-gray-100 rounded-xl shadow-sm space-y-5">
                    <h3 class="text-sm font-extrabold text-black uppercase tracking-wider border-b border-gray-100 pb-3 mb-5">Spesifikasi & Detail</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Bahan / Kain</label>
                            <input type="text" name="details[bahan]" value="{{ old('details.bahan', $product->details['bahan'] ?? 'Katun') }}" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Motif</label>
                            <input type="text" name="details[motif]" value="{{ old('details.motif', $product->details['motif'] ?? 'Polos') }}" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Detail Material</label>
                            <input type="text" name="details[material]" value="{{ old('details.material', $product->details['material'] ?? '') }}" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Cutting / Potongan</label>
                            <input type="text" name="details[cutting]" value="{{ old('details.cutting', $product->details['cutting'] ?? '') }}" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Deskripsi Lengkap<span class="text-red-500">*</span></label>
                        <textarea name="description" rows="5" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md focus:border-black focus:ring-black text-sm p-3 border transition" required>{{ old('description', $product->description) }}</textarea>
                        <p class="text-[10px] text-gray-400 mt-1">*Aturan cuci & Info pengiriman sudah diatur otomatis oleh sistem frontend.</p>
                    </div>
                </div>

                <!-- Tombol Action -->
                <div class="pt-2 flex justify-end gap-4">
                    <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-200 rounded-md text-sm font-bold text-gray-600 hover:bg-gray-50 transition">Batal</a>
                    <button type="submit" class="px-8 py-3 bg-black text-white rounded-md text-sm font-bold hover:bg-gray-800 transition shadow-md uppercase tracking-wider">Simpan Perubahan</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection