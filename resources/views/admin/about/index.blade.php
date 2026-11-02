@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 -mt-6">

    @if (session('success'))
        <div class="bg-green-50 text-green-700 px-4 py-3 rounded-lg mb-5 text-xs font-medium border border-green-200 flex items-center shadow-sm">
            <svg class="w-4 h-4 mr-2 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5"
          x-data="{ imgPhilosophy: '{{ isset($settings['about_image']) ? asset('storage/' . $settings['about_image']) : asset('images/about 3.jpeg') }}' }">
        @csrf
        
        <!-- SEGMEN 1: FOTO & FILOSOFI (Padding diperkecil ke p-5 md:p-6) -->
        <div class="bg-white p-5 md:p-6 border border-gray-100 rounded-xl shadow-sm">
            <div class="flex items-center gap-2.5 border-b border-gray-100 pb-3 mb-4">
                <span class="w-5 h-5 bg-black text-white text-[11px] font-bold flex items-center justify-center rounded">01</span>
                <h3 class="text-xs font-extrabold text-gray-900 uppercase tracking-wider">Filosofi Utama</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                <!-- Kiri: Foto -->
                <div class="md:col-span-4">
                    <div class="relative w-full aspect-[4/5] bg-gray-50 border-2 border-dashed border-gray-200 rounded-lg flex flex-col items-center justify-center overflow-hidden hover:border-gray-400 transition-all cursor-pointer group"
                         @click="document.getElementById('phil_img').click()">
                        
                        <img :src="imgPhilosophy" class="w-full h-full object-cover absolute inset-0 transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-[2px]">
                            <span class="bg-white text-black px-3 py-1.5 rounded text-[9px] font-extrabold uppercase tracking-widest shadow-md">Ubah Foto</span>
                        </div>
                        <input type="file" name="philosophy_image" id="phil_img" class="hidden" accept="image/*" @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => imgPhilosophy = e.target.result; reader.readAsDataURL(file); }">
                    </div>
                </div>

                <!-- Kanan: Teks Filosofi -->
                <div class="md:col-span-8 space-y-3">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Kutipan Utama</label>
                        <input type="text" name="about_quote" value="{{ $settings['about_quote'] ?? '“Not every journey needs a rocket.”' }}" class="w-full bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm font-serif italic text-gray-900">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Paragraf Filosofi</label>
                        <textarea name="about_philosophy" rows="6" class="w-full bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm leading-relaxed">{{ $settings['about_philosophy'] ?? "We believe that reaching the moon isn't about having the fastest way to get there, but about having the courage to create your own way.\n\nThe moon represents our dreams, ambitions, and everything beyond our limits. Without a rocket represents the belief that there is no single way to achieve greatness.\n\nNo shortcuts. No limitations. Just your own way of reaching the moon." }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEGMEN 2: VISI & MISI -->
        <div class="bg-white p-5 md:p-6 border border-gray-100 rounded-xl shadow-sm">
            <div class="flex items-center gap-2.5 border-b border-gray-100 pb-3 mb-4">
                <span class="w-5 h-5 bg-black text-white text-[11px] font-bold flex items-center justify-center rounded">02</span>
                <h3 class="text-xs font-extrabold text-gray-900 uppercase tracking-wider">Visi & Misi</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Teks Visi</label>
                    <textarea name="about_vision" rows="5" class="w-full bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm leading-relaxed">{{ $settings['about_vision'] ?? "Menjadi brand yang merepresentasikan kebebasan berekspresi, keberanian bermimpi, dan kepercayaan diri untuk melampaui batas. Kami percaya bahwa setiap orang punya jalannya sendiri untuk mencapai sesuatu yang besar, bahkan tanpa harus memiliki segalanya." }}</textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-600 uppercase tracking-wider mb-1">Poin-Poin Misi <span class="normal-case font-medium text-gray-400 ml-0.5">(Per baris)</span></label>
                    <textarea name="about_mission" rows="5" class="w-full bg-[#FCFCFC] border border-gray-200 rounded-lg focus:border-black focus:ring-black text-xs p-2.5 transition shadow-sm leading-relaxed">{{ $settings['about_mission'] ?? "Menciptakan pakaian yang bukan hanya menjadi bagian dari penampilan, tetapi juga representasi karakter dan identitas diri.\nMenghadirkan karya dengan desain yang autentik, berkarakter, dan memiliki makna.\nMendorong setiap individu untuk berani menjadi diri sendiri, berpikir bebas, dan mengejar apa yang mereka yakini.\nMembangun komunitas yang percaya bahwa keterbatasan bukan alasan untuk berhenti bermimpi." }}</textarea>
                </div>
            </div>
        </div>

        @php 
            $values = isset($settings['about_values']) ? json_decode($settings['about_values'], true) : []; 
        @endphp

        <!-- SEGMEN 3: BRAND VALUES -->
        <div class="bg-white p-5 md:p-6 border border-gray-100 rounded-xl shadow-sm">
            <div class="flex items-center gap-2.5 border-b border-gray-100 pb-3 mb-4">
                <span class="w-5 h-5 bg-black text-white text-[11px] font-bold flex items-center justify-center rounded">03</span>
                <h3 class="text-xs font-extrabold text-gray-900 uppercase tracking-wider">Brand Value</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @foreach([
                    ['AMBISI', 'Selalu berani bermimpi lebih besar, menetapkan tujuan yang lebih tinggi, dan percaya pada potensi diri sendiri.'],
                    ['INDIVIDUALITAS', 'Menghargai keunikan setiap individu, berani tampil berbeda, dan tidak takut menjadi diri sendiri.'],
                    ['KREATIVITAS', 'Berpikir di luar batas, berani mengeksplorasi ide baru, dan menciptakan jalan sendiri.'],
                    ['KEBERANIAN', 'Berani mengambil langkah pertama, menghadapi ketidakpastian, dan mengejar sesuatu yang dianggap mustahil.'],
                    ['AUTENTISITAS', 'Tetap jujur pada identitas diri, memiliki karakter yang kuat, dan tidak kehilangan jati diri hanya demi mengikuti tren.']
                ] as $index => $item)
                
                <div class="p-3 bg-[#FCFCFC] rounded-lg border border-gray-200 hover:border-black transition-colors duration-300 group {{ $index == 4 ? 'md:col-span-2 lg:col-span-2' : '' }}">
                    
                    <!-- Judul -->
                    <div class="flex items-center gap-2 border-b border-gray-100/60 pb-1.5 mb-1.5">
                        <span class="text-[10px] font-bold text-gray-400 font-mono group-hover:text-black transition">0{{ $index + 1 }}.</span>
                        <input type="text" name="about_values[{{ $index }}][title]" value="{{ $values[$index]['title'] ?? $item[0] }}" class="w-full bg-transparent border-none p-0 focus:ring-0 text-[10px] font-extrabold uppercase tracking-widest text-black placeholder-gray-400" placeholder="Judul...">
                    </div>
                    
                    <!-- Deskripsi -->
                    <textarea name="about_values[{{ $index }}][desc]" rows="2" class="w-full bg-transparent border-none p-0 focus:ring-0 text-xs text-gray-600 resize-none leading-relaxed placeholder-gray-400" placeholder="Deskripsi...">{{ $values[$index]['desc'] ?? $item[1] }}</textarea>
                
                </div>
                
                @endforeach
            </div>
        </div>

        <!-- Tombol Action (Dibuat lebih ringkas) -->
        <div class="pt-1 flex justify-end pb-10">
            <button type="submit" class="px-6 py-2.5 bg-black text-white rounded-lg text-xs font-bold hover:bg-gray-800 transition shadow-sm uppercase tracking-widest">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
@endsection