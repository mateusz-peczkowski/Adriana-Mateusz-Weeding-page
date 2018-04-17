<section class="section-flexible">
    <div class="section-flexible--layout | one-column">
        <div class="container">
            @if($content['title'])
                <h3 class="section-flexible--title | text-center">{{ $content['title'] }}</h3>
            @endif

            <article class="section-flexible--body">
                {!! $content['content'] !!}
            </article>
        </div>
    </div>
</section>