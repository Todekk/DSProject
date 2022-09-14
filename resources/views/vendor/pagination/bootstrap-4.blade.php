@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="text-align: center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li style="display:inline" class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true"></span>
                </li>
            @else
                <li style="display:inline" class="page-item">
                    <a class="anchorButton" style="background-color:rgb(18, 122, 240); text-decoration: none; color: black" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">PREVIOUS</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li style="display:inline" class="page-item disabled" aria-disabled="true"><span class="page-link" style="background-color:rgb(18, 122, 240); text-decoration: none; color: black">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li style="display:inline" class="page-item active" aria-current="page"><span class="anchorButton" style="background-color:rgb(18, 122, 240); text-decoration: none; color: black">{{ $page }}</span></li>
                        @else
                            <li style="display:inline" class="page-item"><a class="anchorButton" style="background-color:rgb(18, 122, 240); text-decoration: none; color: black" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item" style="display:inline">
                    <a class="anchorButton" style="background-color:rgb(18, 122, 240); text-decoration: none; color: black" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">NEXT</a>
                </li>
            @else
                <li style="display:inline" class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true"></span>
                </li>
            @endif
        </ul>
    </nav>
@endif

<style>
    .anchorButton{
        text-decoration: none;
        text-align: center;
        border: 3px;
        background-color: rgb(18, 122, 240);
        padding: 14px 25px;
        font-weight: bold;
        border-radius: 10px;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>
