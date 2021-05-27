@if ($paginator->hasPages())
<ul class="shop-pagination box-shadow text-center ptblr-10-30">
    @if ($paginator->onFirstPage())
    <li><a><i class="zmdi zmdi-chevron-left"></i></a></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="zmdi zmdi-chevron-left"></i></a></li>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li><a href="#">01</a></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="active"><a>{{$page}}</a></li>
    @else
    <li><a href="{{$url}}">{{$page}}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <li>
        <a href="{{ $paginator->nextPageUrl() }}">
            <i class=" zmdi
            zmdi-chevron-right"></i></a>
    </li>
    @else
    <li>
        <a>
            <i class=" zmdi
            zmdi-chevron-right"></i>
        </a>
    </li>
    @endif
</ul>
@endif
