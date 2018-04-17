@if($image = get_the_post_thumbnail_url(null, 'banner' . (\App\App::isPhone() ? '-mobile' : '')))
    <div class="banner-page | small-padding-site-wrapper | js-enabled-banner" style="background-image: url('{{ $image }}');">
        @if($bannerContent)
            <div class="content">
                <div class="container">
                    @if($bannerContent->subtitle)
                        <h2>{{ $bannerContent->subtitle }}</h2>
                    @endif

                    <h1>{{ $bannerContent->title }}</h1>
                </div>
            </div>
        @endif
    </div>
@endif