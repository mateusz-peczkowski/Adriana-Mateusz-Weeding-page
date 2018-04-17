@extends('layouts.app')

<?php
$blockExternalContent = true;

$fields = (object) get_fields($post);

$image = $fields->details_image ? $fields->details_image['url'] : get_the_post_thumbnail_url($post);

$topInfo = [];

if ($birthday = $fields->birthday_date) {
    $birthday = explode('/', $birthday);

    $birthday = (date("md", date("U", mktime(0, 0, 0, $birthday[1], $birthday[2], $birthday[0]))) > date("md")
        ? ((date("Y") - $birthday[0]) - 1)
        : (date("Y") - $birthday[0]));

    array_push($topInfo, (object) [
        'icon' => 'fa-calendar',
        'title' => __('Wiek', 'sage'),
        'value' => $birthday
    ]);
}

if ($discipline = $fields->discipline) {
    array_push($topInfo, (object) [
        'icon' => 'fa-bullseye',
        'title' => __('Dyscyplina', 'sage'),
        'value' => $discipline
    ]);
}

if ($specialization = $fields->specialization) {
    array_push($topInfo, (object) [
        'icon' => 'fa-trophy',
        'title' => __('Specjalizacja', 'sage'),
        'value' => $specialization
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
                @if($position = $fields->position)
                    <h2 class="details-page--subtitle">{{ $position }}</h2>
                @endif

                <h1 class="details-page--title">{{ $post->post_title }}</h1>

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

                @if($features = $fields->features)
                    <div class="features--list">
                        @foreach($features as $feature)
                            @if($featureList = $feature['features'] AND count($featureList))
                                <article class="features--list__item">
                                    <h3 class="title">{{ $feature['title'] }}</h3>

                                    <ul>
                                        @foreach($featureList as $featureItem)
                                            <li>{{ $featureItem['title'] }}</li>
                                        @endforeach
                                    </ul>
                                </article>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection