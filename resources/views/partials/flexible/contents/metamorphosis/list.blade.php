@if($posts = $content['metamorphosis'] AND count($posts))
    <section class="section-flexible">
        <div class="section-flexible--layout | two-column">
            <div class="container">
                @if($content['title'])
                    <h3 class="section-flexible--title">{{ $content['title'] }}</h3>
                @endif

                <div class="section-flexible--body">
                    @foreach($posts as $post)
                        <div class="offer-box">
                            <article class="column">
                                {!! get_the_post_thumbnail($post, 'content-bigger-image') !!}
                            </article>

                            <article class="column">
                                <h4>{{ $post->post_title }}</h4>
                                <hr class="small">

                                {!! get_field('short_description', $post) !!}
                            </article>
                        </div>
                    @endforeach
                </div>

                @if($content['metamorphosis_link'] AND $link = $content['link'])
                    <div class="section-flexible--bottom-link">
                        <a href="{{ $link['url'] }}" target="{{ $link['target'] }}" title="{{ $link['title'] }}">{{ $link['title'] }}</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif