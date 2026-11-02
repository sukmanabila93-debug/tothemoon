@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 -mt-6">

    @if (session('success'))
        <div class="bg-green-50 text-green-700 px-4 py-3 rounded-lg mb-5 text-xs font-medium border border-green-200 flex items-center shadow-sm">
            <svg class="w-4 h-4 mr-2 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.contact.update') }}" method="POST" class="space-y-5">
        @csrf
        

        <!-- KARTU 1: INFORMASI LINK SOSIAL MEDIA & KONTAK -->
        <div class="bg-white p-5 md:p-6 border border-gray-100 rounded-xl shadow-sm space-y-4">
            <div class="flex items-center gap-2.5 border-b border-gray-100 pb-3 mb-2">
                <h3 class="text-xs font-extrabold text-gray-900 uppercase tracking-wider">Informasi & Tautan Kontak</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Email -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Alamat Email</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'tothemoon@gmail.com' }}" class="w-full bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm" required>
                </div>

                <!-- Instagram -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Username Instagram</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 font-bold text-xs">@</span>
                        <input type="text" name="contact_ig" value="{{ $settings['contact_ig'] ?? 'tothemoon.wear' }}" class="w-full pl-7 bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm" required>
                    </div>
                </div>

                <!-- Tiktok -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Username Tiktok</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 font-bold text-xs">@</span>
                        <input type="text" name="contact_tiktok" value="{{ $settings['contact_tiktok'] ?? 'tothemoon.id' }}" class="w-full pl-7 bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm" required>
                    </div>
                </div>

                <!-- Shopee Name -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Nama Toko Shopee</label>
                    <input type="text" name="contact_shopee_name" value="{{ $settings['contact_shopee_name'] ?? 'Tothemoon.war' }}" class="w-full bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm" required>
                </div>
            </div>

            <div class="pt-1">
                <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Tautan URL Shopee (Link Toko)</label>
                <input type="url" name="contact_shopee_url" value="{{ $settings['contact_shopee_url'] ?? 'https://shopee.co.id' }}" class="w-full bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm" required>
            </div>
        </div>

        <!-- Tombol Aksi Simpan -->
        <div class="pt-1 flex justify-end pb-10">
            <button type="submit" class="px-6 py-2.5 bg-black text-white rounded-lg text-xs font-bold hover:bg-gray-800 transition shadow-sm uppercase tracking-widest">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
@endsection