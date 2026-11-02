@extends('layouts.admin')

@section('content')
<!-- Membatasi lebar konten agar tidak terlalu melebar (Compact & Elegant) -->
<div class="max-w-6xl mx-auto space-y-6">

    <!-- Statistik Cards (Data Real) -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-5">
        
        <!-- Total Produk -->
        <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4 transition hover:shadow-md">
            <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <div>
                <p class="text-[11px] text-gray-500 font-semibold uppercase tracking-wider">Total Produk</p>
                <h3 class="text-sm font-bold text-gray-900 leading-tight">{{ $totalProducts ?? 0 }}</h3>
            </div>
        </div>

        <!-- Produk Aktif -->
        <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4 transition hover:shadow-md">
            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-[11px] text-gray-500 font-semibold uppercase tracking-wider">Produk Aktif</p>
                <h3 class="text-sm font-bold text-gray-900 leading-tight">{{ $activeProducts ?? 0 }}</h3>
            </div>
        </div>

        <!-- Produk Nonaktif -->
        <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4 transition hover:shadow-md">
            <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
            </div>
            <div>
                <p class="text-[11px] text-gray-500 font-semibold uppercase tracking-wider">Nonaktif</p>
                <h3 class="text-sm font-bold text-gray-900 leading-tight">{{ $inactiveProducts ?? 0 }}</h3>
            </div>
        </div>

        <!-- Kategori -->
        <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4 transition hover:shadow-md">
            <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            </div>
            <div>
                <p class="text-[11px] text-gray-500 font-semibold uppercase tracking-wider">Kategori</p>
                <h3 class="text-sm font-bold text-gray-900 leading-tight">{{ $totalCategories ?? 0 }}</h3>
            </div>
        </div>

    </div>

    <!-- Konten Bawah (Grid Produk & Kategori) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Kiri: Produk Terbaru (Lebar 8) -->
        <div class="lg:col-span-8 bg-white p-5 md:p-6 rounded-xl border border-gray-100 shadow-sm">
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-sm font-extrabold text-gray-900 uppercase tracking-wider">Produk Terbaru</h2>
                <a href="{{ route('admin.products.index') }}" class="text-xs font-semibold text-gray-500 hover:text-black">Lihat Semua</a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @if(isset($latestProducts) && count($latestProducts) > 0)
                    @foreach($latestProducts as $product)
                    <div class="group cursor-pointer" onclick="window.location.href='{{ route('admin.products.edit', $product->id) }}'">
                        <!-- Gambar Produk -->
                        <div class="bg-[#F3F4F6] aspect-square rounded-lg overflow-hidden mb-3 border border-gray-100">
                            <img src="{{ asset('storage/' . $product->main_image) }}" class="w-full h-full object-cover object-top mix-blend-multiply group-hover:scale-105 transition duration-300" onerror="this.src='{{ asset($product->main_image) }}'">
                        </div>
                        <!-- Info Produk -->
                        <h3 class="text-[11px] font-bold text-gray-800 truncate leading-tight">{{ $product->name }}</h3>
                        <div class="flex items-center gap-1.5 mt-1">
                            <p class="text-[10px] font-semibold text-gray-500">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            @if($product->status == 'aktif')
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            @else
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="col-span-full text-xs text-gray-500 text-center py-8">Belum ada produk ditambahkan.</p>
                @endif
            </div>
        </div>

        <!-- Kanan: Kategori Produk (Lebar 4) -->
        <div class="lg:col-span-4 bg-white p-5 md:p-6 rounded-xl border border-gray-100 shadow-sm">
            <h2 class="text-sm font-extrabold text-gray-900 mb-5 uppercase tracking-wider">Kategori</h2>
            
            <div class="space-y-3">
                @if(isset($categories) && count($categories) > 0)
                    @foreach($categories as $cat)
                    <div class="flex justify-between items-center p-3 rounded-lg border border-gray-100 hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-white border border-gray-200 rounded-md flex items-center justify-center shadow-sm">
                                <!-- Ikon T-shirt (default), Anda bisa custom jika mau -->
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            </div>
                            <span class="text-xs font-bold text-gray-800 uppercase tracking-wide">{{ $cat->name }}</span>
                        </div>
                        <span class="text-xs text-gray-500 font-bold bg-gray-100 px-2 py-1 rounded-md">{{ $cat->products_count ?? 0 }} Produk</span>
                    </div>
                    @endforeach
                @else
                    <p class="text-xs text-gray-500 text-center py-4">Belum ada kategori.</p>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection