<nav class="pagination-box" aria-label="">
    <ul class="pagination">
            @if($paginator->onFirstPage())
                <li class="pagination__item">
                    <span class="pagination__link pagination__link_disabled">&lt;</span>
                </li>
            @else
                <li class="pagination__item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination__link pagination__link_colored">&lt;</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="pagination__item">
                        <span class="pagination__link pagination__link_disabled">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__item">
                                <span class="pagination__link pagination__link_active">{{ $page }}</span>
                            </li>
                        @else
                            <li class="pagination__item">
                                <a href="{{ $url }}" class="pagination__link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if($paginator->hasMorePages())
                <li class="pagination__item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination__link pagination__link_colored">&gt;</a>
                </li>
            @else
                <li class="pagination__item">
                    <span class="pagination__link pagination__link_disabled">&gt;</span>
                </li>
            @endif
    </ul>
</nav>