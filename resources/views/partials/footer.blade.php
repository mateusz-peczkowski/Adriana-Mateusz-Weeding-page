<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top--col">
                @php(dynamic_sidebar('bottom-left-side'))

                @if($socialList = \App\Setting::getSocials() AND count($socialList))
                <h4 class="footer-top--col__title">{{ __('Znajdź nas na', 'sage') }}</h4>

                <div class="footer-top--col__body">
                    <ul class="socials">
                        @foreach($socialList as $social)
                            <li>
                                <a href="{{ $social->url }}" target="_blank" class="{{ $social->class }}"><i class="fa fa-{{ $social->class }}"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="footer-top--col">
                @php(dynamic_sidebar('bottom-menu'))
            </div>

            <div class="footer-top--col">
                @php(dynamic_sidebar('recent-posts'))

                <div class="posts-list-button">
                    <a href="/blog" title="{{ __('Zobacz więcej', 'sage') }}">{{ __('Zobacz więcej', 'sage') }}</a>
                </div>
            </div>

            @if($tags = \App\Tag::all() AND count($tags))
            <div class="footer-top--col | full">
                <h4 class="footer-top--col__title">{{ __('Tagi', 'sage') }}</h4>

                <div class="footer-top--col__body">
                    <ul class="tags-list">
                        @foreach($tags as $tag)
                            <li><a href="{{ $tag->url }}" title="{{ $tag->name }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>© 2018 LionGroup – {{ __('Wszelkie prawa zastrzeżone', 'sage') }}</p>

            <p>{{ __('Projekt i realizacja', 'sage') }}: <a href="https://winczi.com" title="Mateusz Pęczkowski" target="_blank">Mateusz Pęczkowski</a></p>
        </div>
    </div>
</footer>