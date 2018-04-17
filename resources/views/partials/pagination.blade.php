@if($paginationShow)
    <div class="pagination--hld">
        @if($paginationLinkPrev)
            <a href="{{ $paginationLinkPrev }}"><i class="fa fa-chevron-left"></i> {{ __('Poprzednia') }}</a>
        @endif

        <span>{{ __('Strona', 'sage') }} <span>{{ $paginationCurrentPage }}</span> {{ __('z', 'sage') }} {{ $paginationMaxPage }}</span>

        @if($paginationLinkNext)
            <a href="{{ $paginationLinkNext }}">{{ __('Następna') }} <i class="fa fa-chevron-right"></i></a>
        @endif
    </div>
@endif