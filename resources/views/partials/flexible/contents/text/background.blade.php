<section class="section-flexible">
    @if($image = $content['image'])
        <div class="img-hld" style="background-image: url('{{ $image['sizes']['banner-home' . (\App\App::isPhone() ? '-mobile' : '')] }}')"></div>
    @endif
    @if($icons = $content['icons'] AND count($icons))
        <div class="section-flexible--layout | bg-image">
            <div class="container">
                <div class="section-flexible--body">
                    <ul class="icons-set">
                        @foreach($icons as $icon)
                            <li>
                                <div class="icon"><i class="fa {{ $icon['icon'] }}"></i></div>
                                <h4>{{ $icon['title'] }}</h4>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</section>