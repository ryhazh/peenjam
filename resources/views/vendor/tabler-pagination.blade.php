@if ($paginator->hasPages())
    <nav>
        {{-- Mobile view pagination --}}
        <div class="d-flex d-sm-none justify-content-center">
            <ul class="pagination m-0">
                {{-- First Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;&laquo;</span></li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url(1) }}">&laquo;&laquo;</a>
                    </li>
                @endif

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                            rel="prev">&laquo;</a></li>
                @endif

                {{-- Current Page Number --}}
                <li class="page-item active"><span class="page-link">{{ $paginator->currentPage() }}</span></li>

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                            rel="next">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif

                {{-- Last Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;&raquo;</span></li>
                @endif
            </ul>
        </div>

        {{-- Desktop view pagination --}}
        <div class="d-none d-sm-block">
            <ul class="pagination m-0">
                {{-- First Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;&laquo;</span></li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url(1) }}">&laquo;&laquo;</a>
                    </li>
                @endif

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                            rel="prev">&laquo;</a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                            rel="next">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif

                {{-- Last Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;&raquo;</span></li>
                @endif
            </ul>
        </div>
    </nav>
@endif
