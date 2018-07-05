@if ($paginator->hasPages())
    <ul class="page-nav">
        @if ($paginator->onFirstPage())

            <li class="page-nav__item disabled"><span class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></span></li>

        @else

            <li class="page-nav__item"><a href="{{ $paginator->previousPageUrl() }}" class="page-nav__item__link" rel="prev"><i class="fa fa-angle-double-left"></i></a></li>

        @endif
        @foreach ($elements as $element)
            @if (is_string($element))

                <li class="page-nav__item disabled"><span class="page-nav__item__link">{{ $element }}</span></li>

            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())

                        <li class="page-nav__item"><span class="page-nav__item__link page-nav__item__link--active">{{ $page }}</span></li>

                    @else

                        <li class="page-nav__item"><a href="{{ $url }}" class="page-nav__item__link">{{ $page }}</a></li>

                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())

            <li class="page-nav__item"><a href="{{ $paginator->nextPageUrl() }}" class="page-nav__item__link" rel="next"><i class="fa fa-angle-double-right"></i></a></li>

        @else

            <li class="page-nav__item disabled"><span class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></span></li>

        @endif
    </ul>
@endif
