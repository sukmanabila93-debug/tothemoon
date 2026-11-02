@extends('layouts.admin')

@section('content')
<!-- Bungkus dengan Alpine.js x-data untuk mengontrol modal -->
<div class="max-7xl mx-auto space-y-4" x-data="{ showDeleteModal: false }">

    <!-- KARTU UTAMA DETAIL PESAN -->
    <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">

        <!-- INFORMASI DETAIL PENGIRIM -->
        <div class="p-5 space-y-3 text-xs md:text-sm">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-2 items-center border-b border-gray-50 pb-2.5">
                <span class="md:col-span-3 text-gray-400 font-medium text-xs">Nama pengirim</span>
                <span class="md:col-span-9 font-bold text-gray-900 text-sm">{{ $message->name }}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-2 items-center border-b border-gray-50 pb-2.5">
                <span class="md:col-span-3 text-gray-400 font-medium text-xs">Email</span>
                <span class="md:col-span-9 font-mono font-semibold text-xs text-gray-800">
                    <a href="mailto:{{ $message->email }}" class="hover:underline">{{ $message->email }}</a>
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-2 items-center border-b border-gray-50 pb-2.5">
                <span class="md:col-span-3 text-gray-400 font-medium text-xs">Tanggal Kirim</span>
                <span class="md:col-span-9 font-semibold text-xs text-gray-700">{{ $message->created_at->format('d M Y, H.i') }}</span>
            </div>
        </div>

        <!-- KOTAK ISI PESAN -->
        <div class="px-5 pb-5">
            <div class="flex items-center gap-2 mb-2">
                <svg class="w-3.5 h-3.5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                <h3 class="text-[11px] font-bold uppercase tracking-wider text-gray-900">Isi Pesan</h3>
            </div>
            
            <div class="bg-[#FAFAFA] border border-gray-200/60 rounded-lg p-4 text-xs md:text-sm text-gray-800 leading-relaxed whitespace-pre-line shadow-inner">
                {{ $message->message }}
            </div>
        </div>

        <!-- TOMBOL AKSI BAWAH -->
        <div class="px-5 py-3.5 bg-gray-50/50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-2">
            <!-- Tombol Balas via Email -->
            <a href="mailto:{{ $message->email }}?subject=Balasan dari Tothemoon Wear" class="w-full sm:w-auto px-5 py-2.5 bg-black text-white rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-gray-800 transition shadow-sm flex items-center justify-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                Balas via Email
            </a>
            
            <!-- Tombol Pemicu Modal Hapus (Tanpa onsubmit confirm bawaan browser) -->
            <button type="button" @click="showDeleteModal = true" class="w-full sm:w-auto px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-gray-100 transition shadow-sm text-center">
                Hapus Pesan
            </button>
        </div>

    </div>

    <!-- MODAL POP-UP HAPUS KUSTOM (Gaya Persis Referensi) -->
    <div x-show="showDeleteModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
            <!-- Background Overlay Blur -->
            <div x-show="showDeleteModal" x-transition.opacity class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" @click="showDeleteModal = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <!-- Panel Modal -->
            <div x-show="showDeleteModal" x-transition class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full p-8 border border-gray-100 relative">
                
                <!-- Tombol Close (X) di Pojok Kanan Atas -->
                <div class="absolute top-4 right-4">
                    <button @click="showDeleteModal = false" class="text-gray-400 hover:text-black transition p-1 rounded-md hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="text-left">
                    <!-- Ikon Tong Sampah Merah -->
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-red-50 mb-4">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>

                    <!-- Judul & Deskripsi -->
                    <h3 class="text-xl font-extrabold text-gray-900 mb-2">Hapus Pesan</h3>
                    <p class="text-sm text-gray-500 mb-8 leading-relaxed">
                        Apakah Anda yakin ingin menghapus pesan ini?<br>Tindakan ini tidak dapat dibatalkan.
                    </p>
                </div>
                
                <!-- Tombol Aksi Modal (Batal & Hapus Merah) -->
                <div class="flex justify-end gap-3">
                    <button type="button" @click="showDeleteModal = false" class="w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-5 py-2.5 bg-white text-xs font-bold uppercase tracking-wider text-gray-700 hover:bg-gray-50 focus:outline-none transition">
                        Batal
                    </button>
                    
                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-md px-5 py-2.5 bg-red-600 text-xs font-bold uppercase tracking-wider text-white hover:bg-red-700 focus:outline-none transition">
                            Hapus
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection