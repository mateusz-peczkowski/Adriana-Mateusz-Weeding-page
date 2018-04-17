@if($posts = $content['productions'] AND count($posts))
<section class="section-flexible">
    <div class="section-flexible--layout">
        <div class="container">
            @if($content['title'])
                <h3 class="section-flexible--title">{{ $content['title'] }}</h3>
            @endif

            <div class="section-flexible--body">
                <div class="production-box">
                    @foreach($posts as $post)
                        @php($postImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'productions-listing')[0])

                        <a href="{{ get_permalink($post) }}" title="{{ $post->post_title }}" class="production-box--item">
                            <div class="image-box" style="background-image: url('{{ $postImage }}')">
                                <img src="{{ $postImage }}" alt="{{ $post->post_title }}">

                                <div class="hover">
                                    <i class="fa fa-search"></i>
                                    <p>{{ __('Zobacz więcej', 'sage') }}</p>
                                </div>
                            </div>

                            <div class="content-box">
                                <h4 class="content-box--title">{{ $post->post_title }}</h4>
                                @if($production = get_field('date_of_production', $post))
                                    <h5 class="content-box--production">{{ __('Rok produkcji', 'sage') }}: {{ $production }}</h5>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            @if($content['productions_link'] AND $link = $content['link'])
                <div class="section-flexible--bottom-link">
                    <a href="{{ $link['url'] }}" target="{{ $link['target'] }}" title="{{ $link['title'] }}">{{ $link['title'] }}</a>
                </div>
            @endif
        </div>
    </div>
</section>
@endif