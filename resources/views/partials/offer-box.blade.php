@if($offerBox = \App\Setting::getOfferBox())
<aside class="offer-bottom-box">
    @if($offerBox->image)
        <div class="offer-bottom-box--image" style="background-image: url('{{ $offerBox->image }}')"></div>
    @endif

    <div class="offer-bottom-box--content">
        <h4 class="offer-bottom-box--content__title">{{ $offerBox->title }}</h4>

        @if($offerBox->content)
            <div class="offer-bottom-box--content__description">
                {!! $offerBox->content !!}
            </div>
        @endif

        @if($offerBox->buttons)
            <div class="offer-bottom-box--content__buttons">
                @foreach($offerBox->buttons as $button)
                    <a href="{{ $button['button']['url'] }}" target="{{ $button['button']['target'] }}" title="{{ $button['button']['title'] }}">{{ $button['button']['title'] }}</a>
                @endforeach
            </div>
        @endif
    </div>
</aside>
@endif