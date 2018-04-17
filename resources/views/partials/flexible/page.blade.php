@php($contents = (isset($contents) ? $contents : get_field('flexible_content')))

@if($contents)
    @foreach($contents as $content)
        @php($layout = 'partials.flexible.contents.' . str_replace('_', '.', $content['acf_fc_layout']))

        @if(file_exists(\App\getResourceDirectory('views/' . str_replace('.', '/', $layout) . '.blade.php')))
            @include($layout)
        @endif
    @endforeach
@endif