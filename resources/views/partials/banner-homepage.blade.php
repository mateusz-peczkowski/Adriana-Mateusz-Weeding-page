@if($image = get_the_post_thumbnail_url(null, 'banner-home' . (\App\App::isPhone() ? '-mobile' : '')))
    <div class="banner-home | small-padding-site-wrapper | js-enabled-banner" style="background-image: url('{{ $image }}');">
        @if($quote = \App\Home::quotes())
            <div class="quote-content">
                <div class="container">
                    <h1 class="quote-content--description">{!! $quote->content !!}</h1>
                    @if($quote->author)
                        <h2 class="quote-content--author">~ {{ $quote->author }}</h2>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endif