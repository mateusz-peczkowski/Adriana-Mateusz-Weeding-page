<ul class="right-widget-sidebar">
    @if($socialList = \App\Setting::getSocials() AND count($socialList))
        @foreach($socialList as $social)
            <li>
                <a href="{{ $social->url }}" target="_blank" class="{{ $social->class }}"><i class="fa fa-{{ $social->class }}"></i></a>
            </li>
        @endforeach
    @endif
        <li>
            <a href="mailto:biuro@walka-start.pl" class="envelope"><i class="fa fa-envelope"></i></a>
        </li>
</ul>