@if($posts = $content['metamorphosis'] AND count($posts))
    <section class="section-flexible">
        <div class="section-flexible--layout">
            <div class="container">
                @if($content['title'])
                    <h3 class="section-flexible--title">{{ $content['title'] }}</h3>
                @endif

                <div class="section-flexible--body">
                    <div class="offer-gallery-box | js-content-gallery-mosaic">
                        <div class="grid-sizer"></div>
                        @foreach($posts as $post)
                            <?php
                                $attachmentId = get_post_thumbnail_id($post);
                                $attachment = wp_get_attachment_metadata($attachmentId);

                                $small = true;

                                if ($attachment['width'] > $attachment['height'] && $attachment['width'] > 500) {
                                    $small = false;
                                }
                            ?>
                            <div class="offer-gallery-box--item | grid-item{{ !$small ? ' width2' : '' }}">
                                {!! wp_get_attachment_image($attachmentId, 'full') !!}
                            </div>
                        @endforeach
                    </div>
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