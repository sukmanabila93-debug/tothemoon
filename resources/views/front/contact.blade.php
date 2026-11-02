@extends('layouts.front')

@section('content')
<section class="relative bg-black text-white w-full h-[400px] md:h-[500px] flex items-center">
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        <img src="{{ asset('images/colactions.jpeg') }}" alt="Colactions" class="w-full h-full object-cover opacity-70 object-[center_70%]">
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-xl">
            <p class="text-xs md:text-sm uppercase tracking-widest text-white mb-2 font-light">
                Get In Touch
            </p>
            <h1 class="text-3xl md:text-5xl font-serif text-white mb-3 uppercase tracking-wide">
                HUBUNGI KAMI!
            </h1>
            <p class="text-white text-sm md:text-base leading-relaxed font-light">
                Punya pertanyaan seputar ukuran, detail koleksi, atau sekadar ingin berdiskusi? Jangan ragu untuk menyapa kami. <br> Kami selalu siap mendengar dari Anda.
            </p>
        </div>
    </div>
</section>

<!-- MAIN CONTENT CONTACT -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
        
        <!-- Info Kontak Kiri (Lebar 5 Kolom) -->
        <div class="lg:col-span-5 space-y-4">
            <div>
                <h3 class="text-lg font-extrabold uppercase tracking-wider text-black mb-2">Let's Connect</h3>
                <p class="text-gray-600 text-xs md:text-sm leading-relaxed mb-6">
                    Silakan hubungi kami melalui jalur komunikasi di bawah ini atau kirimkan pesan langsung melalui formulir.
                </p>
            </div>

            <!-- List Kontak (Bisa Diklik Langsung) -->
            <div class="space-y-3">
                
                <!-- Email Link -->
                <a href="mailto:tothemoon@gmail.com" class="flex items-center gap-3.5 p-3.5 rounded-lg border border-gray-100 bg-[#FAFAFA] hover:border-black hover:shadow-sm transition duration-300 block">
                    <div class="bg-black text-white p-2.5 rounded-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-[10px] font-bold text-black uppercase tracking-wider">Email</h4>
                        <p class="text-xs text-gray-500">{{ $settings['contact_email'] ?? 'tothemoon@gmail.com' }}</p>
                    </div>
                </a>

                <!-- Instagram Link -->
                <a href="https://instagram.com/tothemoon.wear" target="_blank" class="flex items-center gap-3.5 p-3.5 rounded-lg border border-gray-100 bg-[#FAFAFA] hover:border-black hover:shadow-sm transition duration-300 block">
                    <div class="bg-black text-white p-2.5 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </div>
                    <div>
                        <h4 class="text-[10px] font-bold text-black uppercase tracking-wider">Instagram</h4>
                        <p class="text-xs text-gray-500">{{ $settings['contact_ig'] ?? 'tothemoon.wear' }}</p>
                    </div>
                </a>

                <!-- Tiktok Link -->
                <a href="https://tiktok.com/@tothemoon.id" target="_blank" class="flex items-center gap-3.5 p-3.5 rounded-lg border border-gray-100 bg-[#FAFAFA] hover:border-black hover:shadow-sm transition duration-300 block">
                    <div class="bg-black text-white p-2.5 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                    </div>
                    <div>
                        <h4 class="text-[10px] font-bold text-black uppercase tracking-wider">Tiktok</h4>
                        <p class="text-xs text-gray-500">{{ $settings['contact_tiktok'] ?? 'tothemoon.id' }}</p>
                    </div>
                </a>

                <!-- Shopee Link (Menggantikan Lokasi) -->
                <a href="https://shopee.co.id" target="_blank" class="flex items-center gap-3.5 p-3.5 rounded-lg border border-gray-100 bg-[#FAFAFA] hover:border-black hover:shadow-sm transition duration-300 block">
                    <div class="bg-black text-white p-2.5 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-[10px] font-bold text-black uppercase tracking-wider">Shopee Store</h4>
                        <p class="text-xs text-gray-500">{{ $settings['contact_shopee_url'] ?? 'https://shopee.co.id' }} </p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Form Kanan -->
        <div class="lg:col-span-7 bg-white border border-gray-200 p-6 md:p-8 rounded-xl shadow-sm">
            <h3 class="text-base font-extrabold uppercase tracking-wider text-black mb-5">Kirim Pesan</h3>
            
            @if(session('success'))
                <div class="mb-4 bg-green-50 text-green-700 p-3 rounded-lg text-xs font-medium border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <!-- 1. Pastikan action mengarah ke rute contact.send dan method POST -->
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 mb-1.5">Nama Lengkap</label>
                        <!-- 2. Pastikan ada atribut name="name" -->
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md shadow-sm focus:border-black focus:ring-black text-xs p-2.5 border transition" required>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 mb-1.5">Alamat Email</label>
                        <!-- 3. Pastikan ada atribut name="email" -->
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" class="w-full bg-[#FAFAFA] border-gray-200 rounded-md shadow-sm focus:border-black focus:ring-black text-xs p-2.5 border transition" required>
                    </div>
                </div>
                
                <div class="mb-5">
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 mb-1.5">Pesan atau Pertanyaan</label>
                    <!-- 4. Pastikan ada atribut name="message" -->
                    <textarea name="message" rows="4" placeholder="Tulis pesan, kendala, atau pertanyaan Anda di sini..." class="w-full bg-[#FAFAFA] border-gray-200 rounded-md shadow-sm focus:border-black focus:ring-black text-xs p-2.5 border transition" required>{{ old('message') }}</textarea>
                </div>

                <!-- 5. Ubah type="button" menjadi type="submit" -->
                <button type="submit" class="w-full bg-black text-white font-bold py-3 rounded-md hover:bg-gray-800 transition duration-300 uppercase tracking-widest text-[11px] shadow-sm cursor-pointer">
                    Kirim Pesan
                </button>
            </form>
        </div>

    </div>
</section>

@endsection