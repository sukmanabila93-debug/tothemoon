<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO THE MOON - Local Brand Fashion</title>
    <!-- Memanggil Tailwind CSS bawaan Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#FAFAFA] text-gray-900 antialiased flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false }">

    <!-- NAVBAR -->
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="font-bold text-sm md:text-lg text-black tracking-widest uppercase">
                        TOTHEMOON.WAR
                    </a>
                </div>

                <!-- Navigation Menu (Desktop) -->
                <nav class="hidden md:flex space-x-8 text-xs uppercase tracking-widest">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-black font-bold' : 'text-gray-400 font-medium hover:text-black transition duration-300' }}">HOME</a>
                    <a href="{{ route('shop') }}" class="{{ request()->routeIs('shop', 'product.detail') ? 'text-black font-bold' : 'text-gray-400 font-medium hover:text-black transition duration-300' }}">SHOP</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-black font-bold' : 'text-gray-400 font-medium hover:text-black transition duration-300' }}">ABOUT</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-black font-bold' : 'text-gray-400 font-medium hover:text-black transition duration-300' }}">CONTACT</a>
                </nav>

                <!-- Tombol Hamburger (Mobile / HP) -->
                <div class="flex md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-black focus:outline-none p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Dropdown Menu Mobile (Tampil saat ikon garis 3 diklik di HP) -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="md:hidden bg-white border-b border-gray-100 px-4 pt-2 pb-6 space-y-3 uppercase tracking-widest text-sm">
            <a href="{{ route('home') }}" class="block py-2 {{ request()->routeIs('home') ? 'text-black font-bold' : 'text-gray-500' }}">Home</a>
            <a href="{{ route('shop') }}" class="block py-2 {{ request()->routeIs('shop', 'product.detail') ? 'text-black font-bold' : 'text-gray-500' }}">Shop</a>
            <a href="{{ route('about') }}" class="block py-2 {{ request()->routeIs('about') ? 'text-black font-bold' : 'text-gray-500' }}">About</a>
            <a href="{{ route('contact') }}" class="block py-2 {{ request()->routeIs('contact') ? 'text-black font-bold' : 'text-gray-500' }}">Contact</a>
        </div>
    </header>

    <!-- KONTEN HALAMAN -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#2D2D2D] text-white pt-10 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-5">
            
            <!-- Kolom 1: Brand Info -->
            <div>
                <h3 class="font-bold text-sm tracking-wider mb-3 uppercase text-white">Tothemoon</h3>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Tothemoon adalah brand fashion lokal yang lahir dari semangat dan keberanian berekspresi.<br>
                    <span class="italic text-xs text-gray-500 mt-1 block">Without a Rocket, Just Your Own Way.</span>
                </p>
            </div>

            <!-- Kolom 2: Navigation -->
            <div>
                <h3 class="font-semibold mb-3 uppercase tracking-wider text-sm text-white">Navigation</h3>
                <ul class="space-y-2.5 text-sm text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('shop') }}" class="hover:text-white transition">Shop</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Customer Info -->
            <div>
                <h3 class="font-semibold mb-3 uppercase tracking-wider text-sm text-white">Customer Info</h3>
                <ul class="space-y-2.5 text-sm text-gray-400">
                    <li><a href="{{ route('shop') }}" class="hover:text-white transition">Product Catalog</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Connect With Us (Social Media Links) -->
            <div>
                <h3 class="font-semibold mb-3 uppercase tracking-wider text-sm text-white">Connect With Us</h3>
                <ul class="space-y-2.5 text-sm text-gray-400">
                    <li>
                        <a href="https://instagram.com/tothemoon.wear" target="_blank" class="hover:text-white transition flex items-center gap-2.5">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" class="w-4 h-4 grayscale invert"> Instagram
                        </a>
                    </li>
                    <li>
                        <a href="https://tiktok.com/@tothemoon.id" target="_blank" class="hover:text-white transition flex items-center gap-2.5">
                            <img src="https://cdn4.iconfinder.com/data/icons/social-media-flat-7/64/Social-media_Tiktok-512.png" class="w-4 h-4 grayscale invert"> Tiktok
                        </a>
                    </li>
                    <li>
                        <a href="https://shopee.co.id" target="_blank" class="hover:text-white transition flex items-center gap-2.5">
                            <img src="https://cdn-icons-png.flaticon.com/512/107/107831.png" class="w-4 h-4 invert"> Shopee Official Store
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Copyright & Credits -->
        <div class="text-center text-gray-500 text-xs mt-16">
            Team Dev Bismillah ©2026 All rights reserved
        </div>
    </div>
    </footer>

</body>
</html>