<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - TOTHEMOON</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#FAFAFA] text-gray-900 antialiased flex flex-col min-h-screen selection:bg-black selection:text-white" x-data="{ mobileMenuOpen: false }">

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

        <!-- Dropdown Menu Mobile -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="md:hidden bg-white border-b border-gray-100 px-4 pt-2 pb-6 space-y-3 uppercase tracking-widest text-sm" style="display: none;">
            <a href="{{ route('home') }}" class="block py-2 {{ request()->routeIs('home') ? 'text-black font-bold' : 'text-gray-500' }}">Home</a>
            <a href="{{ route('shop') }}" class="block py-2 {{ request()->routeIs('shop', 'product.detail') ? 'text-black font-bold' : 'text-gray-500' }}">Shop</a>
            <a href="{{ route('about') }}" class="block py-2 {{ request()->routeIs('about') ? 'text-black font-bold' : 'text-gray-500' }}">About</a>
            <a href="{{ route('contact') }}" class="block py-2 {{ request()->routeIs('contact') ? 'text-black font-bold' : 'text-gray-500' }}">Contact</a>
        </div>
    </header>

    <!-- KONTEN UTAMA HALAMAN LOGIN (KARTU TENGAH DIPERKECIL MENJADI max-w-4xl) -->
    <main class="flex-grow flex items-center justify-center py-5 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 grid grid-cols-1 md:grid-cols-2">
            
            <!-- SISI KIRI: VIDEO BACKGROUND & OVERLAY -->
            <div class="relative min-h-[300px] md:min-h-[450px] flex items-end p-6 overflow-hidden bg-black">
                <!-- Tag Video -->
                <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-60">
                    <source src="{{ asset('videos/vidioILY.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                <!-- Teks di dalam Video -->
                <div class="relative z-10 text-white">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-white block mb-1">Welcome Back</span>
                    <h2 class="text-xl md:text-lg font-extrabold uppercase tracking-wider">TOTHEMOON ADMIN</h2>
                </div>
            </div>

            <!-- SISI KANAN: FORM LOGIN -->
            <div class="p-8 md:p-10 flex flex-col justify-center bg-white">
                
                <!-- Jarak bawah diperkecil dari mb-8 ke mb-4 agar tidak terlalu jauh ke Email -->
                <div class="mb-5">
                    <h2 class="text-xl font-extrabold text-gray-900 tracking-tight mb-1">Admin Login</h2>
                    <p class="text-gray-400 text-xs">Masukkan akun rahasia Anda untuk masuk.</p>
                </div>

                <!-- Pesan Error -->
                @if ($errors->any())
                    <div class="mb-4 bg-red-50 text-red-600 p-2.5 rounded-lg text-xs font-medium border border-red-200">
                        Email atau password yang Anda masukkan salah.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- EMAIL -->
                    <div>
                        <label class="block text-[11px] font-extrabold uppercase tracking-widest text-black mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="masukkan email" class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:border-black focus:ring-black transition shadow-sm placeholder:text-gray-300">
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="block text-[11px] font-extrabold uppercase tracking-widest text-black mb-1">Password</label>
                        <input id="password" type="password" name="password" required placeholder="masukkan password" class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:border-black focus:ring-black transition shadow-sm placeholder:text-gray-300">
                    </div>

                    <!-- TOMBOL SUBMIT -->
                    <div class="pt-2">
                        <button type="submit" class="w-full bg-black text-white font-bold py-3 rounded-xl hover:bg-gray-800 transition duration-300 uppercase tracking-widest text-[11px] shadow-md">
                            MASUK KE DASHBOARD
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#2D2D2D] text-white pt-10 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-5">
            
            <div>
                <h3 class="font-bold text-sm tracking-wider mb-3 uppercase text-white">Tothemoon</h3>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Brand Lokal dari Bandung, Indonesia.<br>
                    Est. 2024. <br>
                    <span class="italic text-xs text-gray-500 mt-1 block">Without a Rocket, Just Your Own Way.</span>
                </p>
            </div>

            <div>
                <h3 class="font-semibold mb-3 uppercase tracking-wider text-sm text-white">Navigation</h3>
                <ul class="space-y-2.5 text-sm text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('shop') }}" class="hover:text-white transition">Shop</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-3 uppercase tracking-wider text-sm text-white">Customer Info</h3>
                <ul class="space-y-2.5 text-sm text-gray-400">
                    <li><a href="{{ route('shop') }}" class="hover:text-white transition">Product Catalog</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Size Guide</a></li>
                </ul>
            </div>

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

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 border-t border-gray-700/50 flex justify-center items-center text-xs text-gray-400">
            <p>&copy; {{ date('Y') }} Tothemoon. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>