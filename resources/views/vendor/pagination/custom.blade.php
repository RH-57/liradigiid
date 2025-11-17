@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        <ul class="flex items-center space-x-2">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-4 py-2 rounded-xl bg-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fa-solid fa-chevron-left"></i>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-4 py-2 rounded-xl bg-white shadow-md hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                {{-- Dots --}}
                @if (is_string($element))
                    <li class="px-4 py-2 text-gray-400">{{ $element }}</li>
                @endif

                {{-- Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-4 py-2 rounded-xl bg-blue-600 text-white shadow-md font-semibold">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-4 py-2 rounded-xl bg-white text-gray-700 shadow-md hover:bg-blue-600 hover:text-white transition-all duration-300">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-4 py-2 rounded-xl bg-white shadow-md hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="px-4 py-2 rounded-xl bg-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
            @endif

        </ul>
    </nav>
@endif
