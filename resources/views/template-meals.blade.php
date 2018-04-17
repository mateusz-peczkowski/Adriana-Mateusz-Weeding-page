{{--
  Template Name: Meals
--}}

@extends('layouts.app')

<?php
$blockExternalContent = false;

$bannerContent = (object) [
    'title' => get_field('banner_title'),
    'subtitle' => get_field('banner_subtitle')
];

$postsOffset = get_query_var('paged') ?: 1;

$meals = \App\Meal::paginate(3, $postsOffset);

$pagination = null;
$linkNext = null;
$linkPrev = null;
$maxPages = $meals->max_at_page;

if ($maxPages AND $maxPages > 1) {
    $pagination = true;

    if ($postsOffset < $maxPages) {
        $linkNext = get_permalink($post) . 'page/' . ($postsOffset+1);
    }

    if ($postsOffset > 1) {
        $linkPrev = get_permalink($post) . 'page/' . ($postsOffset-1);
    }
}

?>

@section('content')
    @if($postsOffset === 1)
        @include('partials.flexible.page')
    @endif

    <div class="container">
        <div class="meals--list">
            @foreach($meals->posts as $meal)
                <div class="meals--list__box">
                    <div class="column">
                        <iframe width="450" height="300" src="https://www.youtube.com/embed/{{ $meal->youtube_id }}" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <article class="column">
                        <h4>{{ $meal->name }}</h4>

                        {!! $meal->description !!}

                        @if($meal->youtube_id)
                            <a href="https://www.youtube.com/watch?v={{ $meal->youtube_id }}" target="_blank" title="{{ __('Obejrzyj na YT', 'sage') }}" class="site-btn site-btn--reverse">{{ __('Obejrzyj na YT', 'sage') }}</a>
                        @endif
                    </article>
                </div>
            @endforeach
        </div>

        @php($paginationShow = $pagination)
        @php($paginationLinkPrev = $linkPrev)
        @php($paginationLinkNext = $linkNext)
        @php($paginationCurrentPage = $postsOffset)
        @php($paginationMaxPage = $maxPages)

        @include('partials.pagination')
    </div>
@endsection