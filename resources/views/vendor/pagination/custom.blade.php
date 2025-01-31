@if ($paginator->hasPages())
    <nav class="flex items-center justify-center mt-4 space-x-2" role="navigation" aria-label="Pagination Navigation">
        {{-- First Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-lg">&laquo;</span>
        @else
            <a href="{{ $paginator->url(1) }}" class="px-3 py-2 text-orange-600 bg-white border border-orange-300 rounded-lg hover:bg-orange-100">
                &laquo;
            </a>
        @endif

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-lg">&lsaquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-orange-600 bg-white border border-orange-300 rounded-lg hover:bg-orange-100">
                &lsaquo;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-lg">{{ $element }}</span>
            @endif

            {{-- Page Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-2 text-white bg-orange-500 rounded-lg">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-2 text-orange-600 bg-white border border-orange-300 rounded-lg hover:bg-orange-100">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-orange-600 bg-white border border-orange-300 rounded-lg hover:bg-orange-100">
                &rsaquo;
            </a>
        @else
            <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-lg">&rsaquo;</span>
        @endif

        {{-- Last Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="px-3 py-2 text-orange-600 bg-white border border-orange-300 rounded-lg hover:bg-orange-100">
                &raquo;
            </a>
        @else
            <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-lg">&raquo;</span>
        @endif
    </nav>
@endif
