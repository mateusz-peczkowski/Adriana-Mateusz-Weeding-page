@extends('layouts.app')

<?php
$blockExternalContent = true;

$fields = (object) get_fields($post);

$image = $fields->details_image ? $fields->details_image['url'] : get_the_post_thumbnail_url($post);

$topInfo = [];

if ($players = $fields->players) {
    array_push($topInfo, (object) [
        'icon' => 'fa-users',
        'title' => __('Uczestnicy', 'sage'),
        'value' => $players
    ]);
}

if ($target = $fields->target) {
    array_push($topInfo, (object) [
        'icon' => 'fa-bullseye',
        'title' => __('Cel', 'sage'),
        'value' => $target
    ]);
}

if ($date_of_production = $fields->date_of_production) {
    array_push($topInfo, (object) [
        'icon' => 'fa-video-camera',
        'title' => __('Rok produkcji', 'sage'),
        'value' => $date_of_production
    ]);
}
?>

@section('content')
    <section class="details-page | js-enabled-banner">
        @if($image)
            <div class="details-page--image" style="background-image: url('{{ $image }}')">
                <img src="{{ $image }}" alt="{{ $post->post_title }}">
            </div>
        @endif

        <div class="content">
            <div class="container">
                @if($production_subtitle = $fields->production_subtitle)
                    <h2 class="details-page--subtitle">{{ $production_subtitle }}</h2>
                @endif

                @if($production_title = $fields->production_title)
                    <h1 class="details-page--title">{{ $production_title }}</h1>
                @endif

                @if($topInfo AND count($topInfo))
                    <ul class="top-info-list">
                        @foreach($topInfo as $info)
                            <li>
                                <i class="fa {{ $info->icon }}"></i>
                                <p><span>{{ $info->title }}:</span> {{ $info->value }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if($movies = $fields->contents)
                    <div class="movies--list">
                        @foreach($movies as $movie)
                            <div class="movies--list__box">
                                <div class="column">
                                    <iframe width="450" height="300" src="https://www.youtube.com/embed/{{ $movie['youtube_id'] }}" frameborder="0" allowfullscreen></iframe>
                                </div>

                                <article class="column">
                                    <h4>{{ $movie['title'] }}</h4>

                                    {!! $movie['description'] !!}
                                </article>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection