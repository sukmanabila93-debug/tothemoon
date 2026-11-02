<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - TOTHEMOON</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; background-color: #F8F9FA; }</style>
</head>
<body class="text-gray-900 antialiased flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-xs md:hidden" style="display: none;"></div>

    <!-- SIDEBAR KIRI (Diperkecil menjadi w-56 dan tanpa garis putih) -->
    <aside class="bg-black text-white w-56 flex-shrink-0 hidden md:flex flex-col justify-between transition-all duration-300 z-50 absolute md:relative h-full"
           :class="{'hidden': !sidebarOpen, 'flex': sidebarOpen}">
        
        <div>
            <!-- Logo -->
            <div class="h-16 flex items-center px-6 border-b border-gray-800/80">
                <a href="{{ route('admin.dashboard') }}" class="font-extrabold text-base tracking-widest uppercase">TOTHEMOON</a>
            </div>

            <!-- Menu Navigation -->
            <nav class="p-3 space-y-1.5 text-xs">
                
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white font-bold' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span>Dashboard</span>
                </a>
                
                <!-- Produk -->
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.products.*') ? 'bg-white/10 text-white font-bold' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    <span>Produk</span>
                </a>

                <!-- About Us -->
                <a href="{{ route('admin.about.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.about.*') ? 'bg-white/10 text-white font-bold' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>About Us</span>
                </a>

                <!-- Contact -->
                <a href="{{ route('admin.contact.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.contact.*') ? 'bg-white/10 text-white font-bold' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>Contact</span>
                </a>

                <!-- Messages -->
                 @php
                    $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                @endphp
    
                <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.messages.*') ? 'bg-white/10 text-white font-bold' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>Pesan Masuk</span>
                    </div>
                    @if($unreadCount > 0)
                        <span class="bg-blue-600 text-white text-[9px] font-extrabold px-1.5 py-0.2 rounded-full animate-pulse">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </a>
            </nav>
        </div>

        <!-- Bagian Bawah: Lihat Website & Logout -->
        <div class="p-3 border-t border-gray-800/80 space-y-1">
            <!-- Tombol Lihat Website -->
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 w-full px-3.5 py-2.5 text-gray-400 hover:text-white transition rounded-lg hover:bg-white/5 font-semibold text-xs">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                <span>Lihat Website</span>
            </a>

            <!-- Tombol Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-3.5 py-2.5 text-gray-400 hover:text-white transition rounded-lg hover:bg-white/5 font-semibold text-xs">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- AREA KONTEN KANAN -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <!-- Top Navbar -->
        <header class="sticky top-0 z-30 bg-white shadow-xs h-16 px-4 md:px-8 flex items-center border-b border-gray-200 flex-shrink-0">
            <!-- Tombol Hamburger menggunakan Alpine.js @click="sidebarOpen = !sidebarOpen" -->
            <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 text-gray-600 mr-3 focus:outline-none hover:bg-gray-100 rounded-lg transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>    
            
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold  tracking-wider text-gray-500">Administrator</span>
            </div>
            
            <div class="text-xs text-gray-400 font-medium ml-auto">
                {{ date('l, d M Y') }}
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>

    </div>

</body>
</html>