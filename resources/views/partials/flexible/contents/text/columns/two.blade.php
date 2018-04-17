<section class="section-flexible">
    <div class="section-flexible--layout | two-column">
        <div class="container">
            @if($content['title'])
                <h3 class="section-flexible--title">{{ $content['title'] }}</h3>
            @endif

            <article class="section-flexible--body">
                <div class="column">
                    {!! $content['left_content'] !!}
                </div>

                <div class="column">
                    {!! $content['right_content'] !!}
                </div>
            </article>
        </div>
    </div>
</section>