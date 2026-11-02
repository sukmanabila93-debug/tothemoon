@extends('layouts.admin')

@section('content')
<!-- Bungkus dengan Alpine.js x-data untuk Modal -->
<div x-data="{ showDeleteModal: false, deleteUrl: '', productName: '' }" class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header & Fitur Pencarian / Filter -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-2">
        
        <!-- Area Filter & Tambah Produk -->
        <div class="w-full lg:w-auto flex flex-col sm:flex-row items-center gap-3">
            
            <form action="{{ route('admin.products.index') }}" method="GET" class="w-full flex flex-col sm:flex-row items-center gap-3">
                
                <!-- Filter Kategori -->
                <select name="category_id" onchange="this.form.submit()" class="w-full sm:w-40 bg-white border border-gray-200 rounded-lg text-xs py-2.5 px-3 focus:border-black focus:ring-black shadow-sm text-gray-700 font-semibold cursor-pointer">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ ($category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>

                <!-- Input Pencarian -->
                <div class="relative w-full sm:w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama produk..." onblur="this.form.submit()"
                           class="w-full pl-9 pr-3 py-2.5 bg-white border border-gray-200 rounded-lg text-xs focus:border-black focus:ring-black shadow-sm transition">
                </div>
            </form>
            
            <!-- Tombol Tambah Produk -->
            <a href="{{ route('admin.products.create') }}" class="w-full sm:w-auto bg-black text-white px-5 py-2.5 rounded-lg text-xs font-bold hover:bg-gray-800 transition flex items-center justify-center gap-2 shadow-md uppercase tracking-wider whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                Tambah Produk
            </a>
        </div>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="bg-green-50 text-green-700 p-4 rounded-xl text-sm font-medium border border-green-100 flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data Produk dengan Scroll Vertikal -->
    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
        <!-- max-h-[600px] overflow-y-auto membuat tabel bisa di-scroll ke bawah dan header tetap menempel di atas (sticky) -->
        <div class="max-h-[600px] overflow-y-auto overflow-x-auto relative">
            <table class="w-full text-left border-collapse min-w-max">
                <thead class="sticky top-0 z-10">
                    <tr class="bg-gray-100 border-b border-gray-200 shadow-xs">
                        <th class="py-4 px-6 text-gray-500 font-bold uppercase tracking-wider text-[10px]">No</th>
                        <th class="py-4 px-6 text-gray-500 font-bold uppercase tracking-wider text-[10px]">Gambar</th>
                        <th class="py-4 px-6 text-gray-500 font-bold uppercase tracking-wider text-[10px]">Nama Produk</th>
                        <th class="py-4 px-6 text-gray-500 font-bold uppercase tracking-wider text-[10px]">Kategori</th>
                        <th class="py-4 px-6 text-gray-500 font-bold uppercase tracking-wider text-[10px]">Harga</th>
                        <th class="py-4 px-6 text-gray-500 font-bold uppercase tracking-wider text-[10px]">Status</th>
                        <th class="py-4 px-6 text-gray-500 font-bold uppercase tracking-wider text-[10px] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 bg-white">
                    @forelse($products as $index => $product)
                    <tr class="hover:bg-gray-50/50 transition">
                        
                        <td class="py-4 px-6 text-xs text-gray-500 font-semibold">
                            {{ $loop->iteration }}
                        </td>
                        
                        <td class="py-4 px-6">
                            <div class="w-12 h-12 bg-[#F3F4F6] rounded-md overflow-hidden flex items-center justify-center border border-gray-200/60 shadow-sm">
                                <img src="{{ asset('storage/' . $product->main_image) }}" class="w-full h-full object-cover object-top mix-blend-multiply" onerror="this.src='{{ asset($product->main_image) }}'">
                            </div>
                        </td>
                        
                        <td class="py-4 px-6 max-w-[220px] md:max-w-xs">
                            <h4 class="text-xs font-bold text-gray-900 leading-tight mb-1 truncate cursor-default" title="{{ $product->name }}">{{ $product->name }}</h4>
                            <p class="text-[10px] text-gray-400 font-mono truncate cursor-default" title="{{ $product->slug }}">{{ $product->slug }}</p>
                        </td>
                        
                        <td class="py-4 px-6 text-xs font-semibold text-gray-600">{{ $product->category->name }}</td>
                        
                        <td class="py-4 px-6 text-xs font-bold text-gray-900 whitespace-nowrap">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        
                        <td class="py-4 px-6">
                            @if($product->status == 'aktif')
                                <span class="bg-green-100 text-green-700 px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wide whitespace-nowrap">Aktif</span>
                            @else
                                <span class="bg-gray-100 text-gray-500 px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wide border border-gray-200 whitespace-nowrap">Nonaktif</span>
                            @endif
                        </td>
                        
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="w-8 h-8 rounded-lg bg-gray-50 border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-black hover:text-white hover:border-black transition shadow-sm" title="Edit Produk">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                                <!-- Tombol Buka Modal Hapus -->
                                <button type="button" @click="showDeleteModal = true; deleteUrl = '{{ route('admin.products.destroy', $product->id) }}'; productName = '{{ $product->name }}'" class="w-8 h-8 rounded-lg bg-red-50 border border-red-100 flex items-center justify-center text-red-500 hover:bg-red-600 hover:text-white hover:border-red-600 transition shadow-sm" title="Hapus Produk">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-16 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                <p class="text-sm font-medium">Tidak ada produk ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL HAPUS (Alpine.js) -->
    <div x-show="showDeleteModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
            <!-- Background Overlay -->
            <div x-show="showDeleteModal" x-transition.opacity class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" @click="showDeleteModal = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <!-- Modal Panel -->
            <div x-show="showDeleteModal" x-transition class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full p-8 border border-gray-100">
                <!-- Tombol Close (X) -->
                <div class="absolute top-4 right-4">
                    <button @click="showDeleteModal = false" class="text-gray-400 hover:text-black transition p-1 rounded-md hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-red-100 mb-5 border-4 border-red-50">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-gray-900 mb-2">Hapus Produk?</h3>
                    <p class="text-sm text-gray-500 mb-8 leading-relaxed">
                        Apakah kamu yakin ingin menghapus produk <br> <span class="font-bold text-black" x-text="productName"></span> ini? Tindakan ini tidak dapat dibatalkan.
                    </p>
                </div>
                
                <div class="flex justify-center gap-3">
                    <button type="button" @click="showDeleteModal = false" class="w-full inline-flex justify-center rounded-lg border border-gray-200 shadow-sm px-4 py-3 bg-white text-xs font-bold uppercase tracking-wider text-gray-700 hover:bg-gray-50 focus:outline-none transition">
                        Batal
                    </button>
                    <!-- Form Delete -->
                    <form method="POST" :action="deleteUrl" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-md px-4 py-3 bg-red-600 text-xs font-bold uppercase tracking-wider text-white hover:bg-red-700 focus:outline-none transition">
                        Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection