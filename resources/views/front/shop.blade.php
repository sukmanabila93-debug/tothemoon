@extends('layouts.front')

@section('content')

<!-- HERO SECTION CATALOG -->
<section class="relative bg-black text-white w-full h-[400px] md:h-[500px] flex items-center">
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        <img src="{{ asset('images/colactions.jpeg') }}" alt="Colactions" class="w-full h-full object-cover opacity-70 object-[center_70%]">
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-xl">
            <p class="text-xs md:text-sm uppercase tracking-widest text-white mb-2 font-light">
                CATALOG
            </p>
            <h1 class="text-3xl md:text-5xl font-serif text-white mb-3 uppercase tracking-wide">
                OUR COLLECTION
            </h1>
            <p class="text-white text-sm md:text-base leading-relaxed font-light">
                Temukan koleksi terbaru Tothemoon dengan desain <br class="hidden md:block">
                Modern dan kualitas terbaik.
            </p>
        </div>
    </div>
</section>

<!-- Konten Produk -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="flex space-x-4 md:space-x-6 mb-10 text-sm font-medium border-b border-gray-200 pb-4 overflow-x-auto">
        <a href="{{ route('shop') }}" 
        class="{{ $selectedCategory == 'all' ? 'bg-black text-white' : 'text-gray-500 hover:text-black' }} px-5 py-1.5 rounded-md font-bold text-xs uppercase tracking-wider transition whitespace-nowrap">
        Semua
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('shop', ['category' => $cat->slug]) }}" 
        class="{{ $selectedCategory == $cat->slug ? 'bg-black text-white' : 'text-gray-500 hover:text-black' }} px-3 py-1.5 rounded-md text-xs font-semibold uppercase tracking-wider transition whitespace-nowrap">
        {{ $cat->name }}
        </a>
        @endforeach
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
        
        @forelse($products as $product)
        <a href="{{ route('product.detail', $product->slug) }}" class="group block bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md hover:border-gray-200 transition duration-300">
            <div class="bg-[#F3F4F6] aspect-square rounded-md overflow-hidden mb-4 flex items-center justify-center relative">
                <img src="{{ asset('storage/' . $product->main_image) }}" class="w-full h-full object-cover mix-blend-multiply group-hover:scale-105 transition duration-300" onerror="this.src='{{ asset($product->main_image) }}'">
            </div>
            <h3 class="text-sm font-medium text-gray-900 mb-1 truncate">{{ $product->name }}</h3>
            <p class="text-sm font-bold mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

            <div class="flex items-center text-xs font-semibold text-[#EE4D2D] mt-3 pt-3 border-t border-gray-100">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                Beli di Shopee
            </div>
        </a>
        @empty
        <div class="col-span-full py-16 text-center text-gray-500">
            <p class="text-base font-medium">Tidak ada produk ditemukan untuk kategori ini.</p>
        </div>
        @endforelse
    </div>

    <!-- PAGINATION YANG DI-CENTER DAN DI-STYLING ESTETIK -->
    <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4 pt-6 border-t border-gray-100">
 
        <!-- PAGINATION YANG TAMPIL DI TENGAH (CENTER) -->
        @if($products->hasPages())
        <div class="flex justify-center items-center">
            {{ $products->appends(['category' => $selectedCategory])->links() }}
        </div>
        @endif
    </div>

</section>

@endsection