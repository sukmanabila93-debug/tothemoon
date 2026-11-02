@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    @if (session('success'))
        <div class="bg-green-50 text-green-700 px-4 py-3 rounded-xl text-xs font-medium border border-green-200 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- KOTAK PENCARIAN & FILTER -->
    <div>
        <form action="{{ route('admin.messages.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            
            <!-- Input Cari Nama/Pesan -->
            <div class="relative w-full sm:w-64 flex-shrink-0">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama, subjek..." onblur="this.form.submit()"
                        class="w-full pl-9 pr-3 py-2 bg-white border border-gray-200 rounded-lg text-xs focus:border-black focus:ring-black shadow-sm transition">
            </div>

            <!-- Dropdown Filter -->
            <div class="w-full sm:w-44">
                <select name="filter" onchange="this.form.submit()" 
                    class="w-full bg-white border border-gray-200 rounded-lg text-xs py-2 px-3 focus:border-black focus:ring-black shadow-sm text-gray-700 font-semibold cursor-pointer">
                    <option value="semua" {{ ($filter ?? '') == 'semua' ? 'selected' : '' }}>Semua</option>
                    <option value="baru" {{ ($filter ?? '') == 'baru' ? 'selected' : '' }}>Belum Dibaca (Baru)</option>
                    <option value="dibaca" {{ ($filter ?? '') == 'dibaca' ? 'selected' : '' }}>Sudah Dibaca</option>                    
                </select>
            </div>

        </form>
    </div>

    <!-- LIST CARD PESAN MASUK -->
    <div class="bg-white border border-gray-100 rounded-xl overflow-hidden shadow-sm divide-y divide-gray-100">
        
        @forelse($messages as $msg)
        <a href="{{ route('admin.messages.show', $msg->id) }}" 
           class="flex items-center justify-between p-3.5 md:p-4 transition hover:bg-gray-50/80 {{ !$msg->is_read ? 'bg-blue-50/30' : 'bg-white' }}">
            
            <!-- Kiri: Avatar & Teks -->
            <div class="flex items-center gap-3.5 min-w-0">
                <!-- Avatar Profil Bulat (Diperkecil ukurannya) -->
                <div class="w-10 h-10 bg-gray-100 rounded-full flex-shrink-0 flex items-center justify-center text-gray-400 border border-gray-200 shadow-inner">
                    <svg class="w-5 h-5 translate-y-0.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                    </svg>
                </div>

                <!-- Nama & Preview Pesan -->
                <div class="min-w-0">
                    <div class="flex items-center gap-2">
                        <h4 class="text-xs font-bold text-gray-900 truncate">{{ $msg->name }}</h4>
                        @if(!$msg->is_read)
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span>
                        @endif
                    </div>
                    <p class="text-[11px] text-gray-500 truncate mt-0.5">{{ $msg->message }}</p>
                </div>
            </div>

            <!-- Kanan: Tanggal & Panah -->
            <div class="flex items-center gap-3 flex-shrink-0 pl-3">
                <span class="text-[11px] text-gray-400 hidden sm:inline">{{ $msg->created_at->format('d M Y') }}</span>
                <div class="w-7 h-7 rounded-lg bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </div>

        </a>
        @empty
        <div class="py-12 text-center">
            <div class="flex flex-col items-center justify-center text-gray-400">
                <svg class="w-10 h-10 mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                <p class="text-xs font-medium">Tidak ada pesan masuk.</p>
            </div>
        </div>
        @endforelse

    </div>

    <!-- Pagination -->
    @if($messages->hasPages())
    <div class="px-2 py-1">
        {{ $messages->appends(['search' => $search, 'filter' => $filter])->links() }}
    </div>
    @endif

</div>
@endsection