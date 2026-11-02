@extends('layouts.front')

@section('content')

<!-- HERO SECTION -->
<section class="relative bg-black text-white w-full h-[400px] md:h-[500px] flex items-center">
    
    <!-- Gambar Background -->
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        <img src="{{ asset('images/home.jpeg') }}" alt="Tothemoon Hero" class="w-full h-full object-cover opacity-80">
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-xl">
            <h1 class="text-3xl md:text-5xl font-serif text-white mb-3 uppercase tracking-wide">
                KENAKAN<br>DUNIAMU SENDIRI
            </h1>
            <p class="text-white text-sm md:text-base mb-8 max-w-md leading-relaxed font-light">
                Tothemoon adalah brand fashion lokal yang lahir dari semangat dan keberanian berekspresi.
            </p>
            <a href="{{ route('shop') }}" class="inline-block bg-white text-black px-6 md:px-8 py-2.5 md:py-3 font-extrabold hover:bg-black hover:text-white transition rounded-md text-xs md:text-sm shadow-md">
                JELAJAHI KOLEKSI
            </a>
        </div>
    </div>

</section>

<!-- KOLEKSI UNGGULAN -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex justify-between items-end mb-8">
        <h2 class="text-lg md:text-1xl font-bold uppercase tracking-wider text-black">KOLEKSI UNGGULAN</h2>
        <a href="{{ route('shop') }}" class="text-sm font-medium text-gray-500 hover:text-black transition">LIHAT SEMUA</a>
    </div>

    <!-- Grid Produk (Container Cards) -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        
        @forelse($featuredProducts as $product)
        <a href="{{ route('product.detail', $product->slug) }}" class="group block bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md hover:border-gray-200 transition duration-300">
            <div class="bg-[#F3F4F6] aspect-square rounded-md overflow-hidden mb-4 flex items-center justify-center relative">
                <img src="{{ asset('storage/' . $product->main_image) }}" class="w-full h-full object-cover mix-blend-multiply group-hover:scale-105 transition duration-300" onerror="this.src='{{ asset($product->main_image) }}'">
            </div>
            <h3 class="text-sm font-medium text-gray-900 mb-1 truncate">{{ $product->name }}</h3>
            <p class="text-sm font-bold mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            
            <!-- Beli di Shopee -->
            <div class="flex items-center text-xs font-semibold text-[#EE4D2D] mt-3 pt-3 border-t border-gray-100">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                Beli di Shopee
            </div>
        </a>
        @empty
        <p class="col-span-full text-center text-gray-500 py-6">Belum ada produk unggulan.</p>
        @endforelse

    </div>
</section>

<!-- ABOUT SECTION (Tentang Tothemoon) -->
<section class="relative bg-gray-100 py-12 md:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
            
            <div class="w-full flex justify-center">
                <img src="{{ asset('images/about.jpeg') }}" class="w-full max-w-md h-[320px] md:h-[380px] object-cover rounded-md shadow-sm w-full h-full object-cover aspect-[3/4] hover:scale-110 transition-transform duration-500 cursor-pointer">
            </div>
            
            <!-- Teks Kanan -->
            <div class="md:pr-6">
                <h2 class="text-xl md:text-1xl font-extrabold mb-4 uppercase tracking-wider text-black">TOTHEMOON.WAR — WITHOUT A ROCKET
</h2>
                
                <p class="text-gray-600 text-base leading-relaxed mb-6">
                    Tothemoon adalah brand streetwear lokal yang mendampingi keberanianmu bereksplorasi dan mengekspresikan diri lewat gaya yang autentik.
                </p>
                
                <a href="{{ route('about') }}" class="inline-flex items-center justify-center bg-black text-white font-medium px-6 py-2.5 text-sm rounded hover:bg-[#2D2D2D] hover:text-white transition shadow-md">
                    BACA CERITA KAMI 
                </a>
            </div>
        </div>
    </div>
</section>

@endsection