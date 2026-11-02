@extends('layouts.front')

@section('content')
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6"> <!-- Max-w diperkecil ke 6xl agar lebih terpusat dan rapi -->
    
    <!-- Breadcrumb -->
    <div class="text-xs text-gray-400 mb-6 flex flex-wrap items-center gap-2">
        <a href="{{ route('shop') }}" class="hover:text-black transition">Shop</a> 
        <span>&gt;</span> 
        <a href="{{ route('shop', ['category' => $product->category->slug ?? 'all']) }}" class="hover:text-black transition">{{ $product->category->name ?? 'Kategori' }}</a> 
        <span>&gt;</span> 
        <!-- Hapus class truncate dan max-w-xs di sini -->
        <span class="text-black font-semibold">{{ $product->name }}</span>
    </div>

    <!-- Container Grid Utama (Gap diperkecil jadi gap-x-10) -->
    <div class="relative grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6 mb-0">
        
        <!-- 1. GAMBAR PRODUK -->
        <div class="md:col-start-1 md:row-start-1">
            <div class="flex gap-3">
                <!-- Thumbnail -->
                <div class="flex flex-col gap-3 w-1/5">
                    <!-- Foto Utama (Selalu Ada) -->
                    <img src="{{ asset('storage/' . $product->main_image) }}" onclick="swapImage(this)" class="thumbnail-item w-full aspect-square object-cover border border-gray-900 cursor-pointer rounded-sm transition-all duration-300" onerror="this.src='{{ asset($product->main_image) }}'">
                    
                    <!-- Foto Galeri 2 (Hanya muncul jika diisi di database) -->
                    @if(!empty($product->gallery_images['image_2']))
                    <img src="{{ asset('storage/' . $product->gallery_images['image_2']) }}" onclick="swapImage(this)" class="thumbnail-item w-full aspect-square object-cover border border-gray-200 cursor-pointer hover:border-gray-900 rounded-sm transition-all duration-300">
                    @endif

                    <!-- Foto Galeri 3 (Hanya muncul jika diisi di database) -->
                    @if(!empty($product->gallery_images['image_3']))
                    <img src="{{ asset('storage/' . $product->gallery_images['image_3']) }}" onclick="swapImage(this)" class="thumbnail-item w-full aspect-square object-cover border border-gray-200 cursor-pointer hover:border-gray-900 rounded-sm transition-all duration-300">
                    @endif

                    @php
                        $catSlug = $product->category->slug ?? 't-shirt';
                        $sizeGuideImg = 'images/TshirtSize.jpeg';
                        if($catSlug == 'hoodie') {
                            $sizeGuideImg = 'images/HoodieSize.jpeg';
                        } elseif($catSlug == 'pants') {
                            $sizeGuideImg = 'images/PantsSize.jpeg';
                        }
                    @endphp
                    <!-- Thumbnail Size Guide (Selalu Ada) -->
                    <img id="size-guide-thumb" src="{{ asset($sizeGuideImg) }}" onclick="swapImage(this)" class="thumbnail-item w-full aspect-square object-cover border border-gray-200 cursor-pointer hover:border-gray-900 rounded-sm transition-all duration-300" onerror="this.style.display='none'">                </div>

                <!-- Gambar Utama -->
                <div class="w-4/5 bg-[#F3F4F6] rounded-md overflow-hidden flex items-center justify-center aspect-square max-h-[320px]">
                    <img id="main-image" src="{{ asset('storage/' . $product->main_image) }}" class="w-full h-full object-cover object-center mix-blend-multiply hover:scale-105 transition duration-500" onerror="this.src='{{ asset($product->main_image) }}'">
                </div>
            </div>
        </div>

            

        <!-- 2. INFO PRODUK -->
        <div class="md:col-start-2 md:row-start-1">
            
            <!-- Kontainer Pembungkus (Card) -->
            <div class="bg-[#FAFAFA] p-6 md:p-8 rounded-2xl border border-gray-100 shadow-sm">
                
                <p class="text-gray-400 text-[11px] tracking-widest mb-2 uppercase font-semibold">{{ $product->category->name ?? 'FASHION' }} // TOTHEMOON</p>
                <h1 class="text-xl md:text-sm font-extrabold uppercase mb-4 text-gray-900 leading-snug">{{ $product->name }}</h1>

                <div class="flex items-center gap-3 mb-6">
                    <span class="text-sm font-extrabold text-black">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    @if($product->discount_price)
                    <span class="text-sm text-gray-400 line-through">Rp {{ number_format($product->discount_price, 0, ',', '.') }}</span>
                    @endif
                </div>

                <!-- Bagian Ukuran (Diberi jarak dan garis atas agar lebih rapi) -->
                <div class="mb-8 pt-5 border-t border-gray-200">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-gray-900">UKURAN</span>
                        <span class="text-[11px] font-semibold text-gray-500 cursor-pointer ">Size Guide</span>
                    </div>
                    <div class="flex flex-wrap gap-2.5">
                        @foreach($product->sizes as $size)
                        <button class="size-btn border border-gray-300 text-gray-800 bg-white px-5 py-2 text-xs font-bold rounded-lg transition">{{ $size }}</button>
                        @endforeach
                    </div>
                </div>

                <!-- Tombol Shopee -->
                <a href="{{ $product->shopee_link }}" target="_blank" class="w-full bg-black text-white font-bold text-center py-3.5 flex items-center justify-center gap-2 hover:bg-gray-800 transition rounded-lg text-xs uppercase tracking-wider shadow-md hover:-translate-y-0.5 duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    Beli di Shopee
                </a>
                
            </div>
        </div>

        <!-- 3. SPESIFIKASI PRODUK (Kiri) -->
        <div class="md:col-start-1 md:row-start-2">
            <div onclick="toggleAccordion('specs')" class="border-t border-b border-gray-200 py-3 cursor-pointer flex justify-between items-center group">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-800 group-hover:text-black">Spesifikasi & Deskripsi Produk</span>
                <svg id="specs-icon" class="w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
            <div id="specs-content" class="hidden text-xs text-gray-600 py-3 space-y-2.5">
                <div class="grid grid-cols-3"><span class="font-medium text-gray-400">Kategori</span><span class="col-span-2 text-gray-900 font-semibold">{{ $product->category->name }}</span></div>
                <div class="grid grid-cols-3"><span class="font-medium text-gray-400">Stok</span><span class="col-span-2 text-gray-900 font-semibold">{{ $product->status == 'aktif' ? 'TERSEDIA' : 'KOSONG' }}</span></div>
                <div class="grid grid-cols-3"><span class="font-medium text-gray-400">Merek</span><span class="col-span-2 text-gray-900 font-semibold">Tothemoon</span></div>
                <div class="grid grid-cols-3"><span class="font-medium text-gray-400">Bahan</span><span class="col-span-2 text-gray-900 font-semibold">{{ $product->details['bahan'] ?? '-' }}</span></div>
                <div class="grid grid-cols-3"><span class="font-medium text-gray-400">Motif</span><span class="col-span-2 text-gray-900 font-semibold">{{ $product->details['motif'] ?? '-' }}</span></div>
                <div class="grid grid-cols-3"><span class="font-medium text-gray-400">Material Detail</span><span class="col-span-2 text-gray-900 font-semibold">{{ $product->details['material'] ?? '-' }}</span></div>
                <div class="grid grid-cols-3"><span class="font-medium text-gray-400">Cutting</span><span class="col-span-2 text-gray-900 font-semibold">{{ $product->details['cutting'] ?? '-' }}</span></div>
                <div class="grid grid-cols-3"><span class="font-medium text-gray-400">Dikirim Dari</span><span class="col-span-2 text-gray-900 font-semibold">KOTA BANDUNG</span></div>
                
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <h4 class="font-bold text-black uppercase mb-2 text-xs">DETAIL PRODUK</h4>
                    <p class="leading-relaxed text-gray-600">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>

        <!-- 4. INFORMASI LENGKAP (Kanan) -->
        <div class="md:col-start-2 md:row-start-2">
            <div onclick="toggleAccordion('desc')" class="border-t border-b border-gray-200 py-3 cursor-pointer flex justify-between items-center group">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-800 group-hover:text-black">Informasi & Penukaran</span>
                <svg id="desc-icon" class="w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
            
            <div id="desc-content" class="hidden text-xs text-gray-600 py-4 space-y-6">
                <!-- Aturan Cuci -->
                <div>
                    <h4 class="font-bold text-black uppercase mb-2.5 tracking-wide">ATURAN CUCI</h4>
                    <ul class="space-y-1.5 text-gray-600">
                        <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-400 mt-1 flex-shrink-0"></span><span>Balik pakaian sebelum dicuci.</span></li>
                        <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-400 mt-1 flex-shrink-0"></span><span>Gunakan air dingin atau suhu rendah (maks. 30°C).</span></li>
                        <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-400 mt-1 flex-shrink-0"></span><span>Pilih deterjen yang lembut.</span></li>
                        <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-400 mt-1 flex-shrink-0"></span><span>Jangan gunakan pemutih atau pelembut pakaian.</span></li>
                    </ul>
                </div>

                <!-- Info Pengiriman -->
                <div class="pt-2 border-t border-gray-100">
                    <h4 class="font-bold text-black uppercase mb-2.5 tracking-wide">INFO PENGIRIMAN</h4>
                    <ul class="space-y-1.5 text-gray-600">
                        <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-400 mt-1 flex-shrink-0"></span><span>Pengiriman setiap hari Senin - Jumat pukul 16.00 WIB & Sabtu pukul 15.00 WIB.</span></li>
                        <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-400 mt-1 flex-shrink-0"></span><span>Pemesanan lewat dari jam 15.00 WIB akan dikirim pada hari berikutnya.</span></li>
                    </ul>
                </div>

                <!-- Pengembalian dan Penukaran -->
                <div class="pt-2 border-t border-gray-100">
                    <h4 class="font-bold text-black uppercase mb-2.5 tracking-wide">PENGEMBALIAN DAN PENUKARAN</h4>
                    <ul class="space-y-1.5 text-gray-600 leading-relaxed">
                        <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-400 mt-1 flex-shrink-0"></span><span>Kebijakan pengembalian tidak berlaku untuk barang diskon.</span></li>
                        <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-400 mt-1 flex-shrink-0"></span><span>Hanya berlaku jika produk cacat produksi (rusak, berlubang atau robek).</span></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

<script>
    function swapImage(thumbnail) {
        let mainImage = document.getElementById('main-image');
        let tempSrc = mainImage.src;
        mainImage.src = thumbnail.src;
        thumbnail.src = tempSrc;
    }

    function selectSize(clickedBtn) {
        let buttons = document.querySelectorAll('.size-btn');
        buttons.forEach(btn => {
            btn.className = 'size-btn border border-gray-300 hover:border-black text-gray-800 px-5 py-1.5 text-xs font-bold rounded transition';
        });
        clickedBtn.className = 'size-btn border border-black bg-black text-white px-5 py-1.5 text-xs font-bold rounded transition';
    }

    function openSizeGuide(event) {
        event.preventDefault(); 
        let sizeGuideThumb = document.getElementById('size-guide-thumb');
        
        if (sizeGuideThumb) {
            swapImage(sizeGuideThumb);
        }
        
        let mainImage = document.getElementById('main-image');
        if(mainImage) {
            mainImage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    function toggleAccordion(section) {
        let content = document.getElementById(section + '-content');
        let icon = document.getElementById(section + '-icon');
        
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>