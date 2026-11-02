@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-4">
        <span>
            {{-- Tombol Previous (<) --}}
            @if ($paginator->onFirstPage())
                <span class="text-gray-300 cursor-not-allowed px-2 py-1 text-lg font-light">&lt;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-gray-700 hover:text-black px-2 py-1 text-lg font-light transition">&lt;</a>
            @endif
        </span>

        {{-- Elemen Nomor Halaman --}}
        <div class="flex items-center space-x-3 text-base font-normal">
            @foreach ($elements as $element)
                {{ "" }}

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- Halaman Aktif (Kotak Hitam) --}}
                            <span class="w-8 h-8 flex items-center justify-center bg-black text-white font-semibold rounded-md text-sm shadow-sm">{{ $page }}</span>
                        @else
                            {{-- Halaman Biasa --}}
                            <a href="{{ $url }}" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-black font-medium text-sm transition">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        <span>
            {{-- Tombol Next (>) --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-gray-700 hover:text-black px-2 py-1 text-lg font-light transition">&gt;</a>
            @else
                <span class="text-gray-300 cursor-not-allowed px-2 py-1 text-lg font-light">&gt;</span>
            @endif
        </span>
    </nav>
@endif