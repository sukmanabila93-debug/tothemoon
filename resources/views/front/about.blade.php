@extends('layouts.front')

@section('content')

<!-- HERO / HEADER ABOUT -->
<section class="relative bg-black text-white w-full h-[400px] md:h-[500px] flex items-center">
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        <img src="{{ isset($settings['about_image']) ? asset('storage/' . $settings['about_image']) : asset('images/about2.jpeg') }}" class="w-full h-full object-cover opacity-90 object-[center_80%]">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-xl">
            <h1 class="text-3xl md:text-5xl font-serif text-white mb-3 uppercase tracking-wide">TOTHEMOON.WAR</h1>
            <p class="space-y-4 text-white text-sm md:text-base leading-relaxed text-left font-light">
                {{ $settings['header_desc'] ?? 'Brand fashion lokal asal Bandung yang lahir dari semangat, mimpi, dan keberanian untuk mengekspresikan diri melalui gaya berpakaian.' }}
            </p>
        </div>
    </div>
</section>

<!-- FILOSOFI / WITHOUT A ROCKET -->
<section class="bg-white py-10 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            
            <div class="w-full">
                <img src="{{ isset($settings['about_image']) ? asset('storage/' . $settings['about_image']) : asset('images/about 3.jpeg') }}" alt="Without a Rocket" class="w-full h-auto max-h-[500px] object-cover rounded-md shadow-sm">
            </div>

            <div>
                <h2 class="text-xl md:text-1xl font-extrabold uppercase tracking-wider mb-6 text-black">
                    TOTHEMOON.WAR — WITHOUT A ROCKET
                </h2>
                
                <blockquote class="text-sm md:text-xl italic font-medium text-gray-800 mb-6">
                    {!! nl2br(e($settings['about_quote'] ?? '“Not every journey needs a rocket.”')) !!}
                </blockquote>

                <div class="space-y-4 text-gray-600 text-sm md:text-base leading-relaxed text-left">
                    {!! nl2br(e($settings['about_philosophy'] ?? "We believe that reaching the moon isn't about having the fastest way to get there, but about having the courage to create your own way.")) !!}
                </div>
            </div>

        </div>
    </div>
</section>

<!-- VISI & MISI -->
<section class="bg-gray-100 py-16 md:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
            
            <!-- VISI -->
            <div class="relative bg-[#FAFAFA] p-6 md:p-8 rounded-xl border border-gray-200 shadow-md hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden group">
                <div class="absolute -right-4 -top-8 text-[120px] font-black text-gray-200 opacity-40 group-hover:scale-105 transition-transform duration-700 pointer-events-none select-none">V</div>

                <div class="relative z-10">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-6 h-[2px] bg-black"></span>
                        <span class="text-xs font-bold uppercase tracking-widest text-black">Visi</span>
                    </div>
                    <h3 class="text-sm md:text-base font-serif uppercase tracking-wide mb-3 text-black">Melampaui Batas</h3>
                    <p class="text-gray-600 text-xs md:text-sm leading-relaxed text-left">
                        {{ $settings['about_vision'] ?? 'Menjadi brand yang merepresentasikan kebebasan berekspresi, keberanian bermimpi, dan kepercayaan diri untuk melampaui batas.' }}
                    </p>
                </div>
            </div>

            <!-- MISI -->
            <div class="relative bg-black p-6 md:p-8 rounded-xl border border-gray-800 shadow-md hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden group">
                <div class="absolute -right-4 -top-8 text-[120px] font-black text-gray-800 opacity-40 group-hover:scale-105 transition-transform duration-700 pointer-events-none select-none">M</div>

                <div class="relative z-10">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-6 h-[2px] bg-white"></span>
                        <span class="text-xs font-bold uppercase tracking-widest text-white">Misi</span>
                    </div>
                    <h3 class="text-sm md:text-base font-serif uppercase tracking-wide mb-4 text-white">Langkah & Aksi</h3>
                    
                    <ul class="space-y-3 text-gray-300 text-xs md:text-sm leading-relaxed text-left">
                        @php
                            $missions = isset($settings['about_mission']) ? explode("\n", $settings['about_mission']) : [];
                        @endphp
                        @forelse($missions as $mission)
                            @if(trim($mission) != '')
                            <li class="flex items-start gap-2">
                                <span>{{ trim($mission) }}</span>
                            </li>
                            @endif
                        @empty
                            <li>Menciptakan pakaian yang bukan hanya menjadi bagian dari penampilan...</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- BRAND VALUES (Dinamis Sesuai Admin) -->
<section class="bg-white py-10 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-xl mx-auto mb-10">
            <h2 class="text-xl md:text-1xl font-extrabold uppercase tracking-widest text-black">BRAND VALUE</h2>
            <div class="w-12 h-0.5 bg-black mx-auto mt-4"></div>
        </div>

        @php
            $values = isset($settings['about_values']) ? json_decode($settings['about_values'], true) : [];
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($values as $val)
                @if(!empty($val['title']))
                <div class="group relative bg-[#FAFAFA] p-8 rounded-xl border border-gray-100 transition-all duration-500 hover:bg-black hover:text-white hover:-translate-y-1.5 hover:shadow-xl">
                    <h4 class="font-extrabold text-sm uppercase tracking-wider mb-3 text-black group-hover:text-white transition-colors duration-300">{{ $val['title'] }}</h4>
                    <p class="text-gray-600 group-hover:text-gray-300 text-xs leading-relaxed transition-colors duration-300">
                        {{ $val['desc'] ?? '' }}
                    </p>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- BANNER BAWAH -->
<section class="bg-[#111] text-white py-10 text-center border-t border-gray-800">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-2xl md:text-1xl  font-serif uppercase tracking-widest mb-4">
        Definisikan Duniamu Sendiri</h2>
        <p class="text-gray-400 text-sm md:text-base max-w-xl mx-auto mb-8 font-light leading-relaxed">
        Saatnya melangkah dengan identitas yang autentik bersama koleksi terbaru TOTHEMOON.WAR </p>
        <a href="{{ route('shop') }}" class="inline-block bg-blue-900 text-white font-bold px-8 py-3.5 rounded-sm text-xs md:text-sm uppercase tracking-widest hover:bg-gray-300 hover:text-black transition-all duration-300 shadow-lg">
            LIHAT KOLEKSI
        </a>
    </div>
</section>

@endsection