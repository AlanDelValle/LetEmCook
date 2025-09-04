@if ($paginator->hasPages())
    <nav class="flex justify-center mt-6">
        <ul class="flex gap-1">            
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 rounded-lg cardpage border border-white/10 cursor-not-allowed">
                        &lsaquo;
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-3 py-2 rounded-lg cardpage hover:border-blue-500 transition">
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-3 py-2 rounded-lg cardpage border border-white/10">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-2 rounded-lg cardpage border border-blue-500 transition">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-3 py-2 rounded-lg cardpage border border-white/10 hover:border-blue-500 transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-3 py-2 rounded-lg cardpage border border-white/10 hover:border-blue-500 transition">
                        &rsaquo;
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 rounded-lg cardpage border border-white/10 cursor-not-allowed">
                        &rsaquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif