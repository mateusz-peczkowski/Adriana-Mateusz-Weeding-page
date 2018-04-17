{{--
  Template Name: Teams
--}}

@extends('layouts.app')

<?php
    $blockExternalContent = false;

    $bannerContent = (object) [
        'title' => get_field('banner_title'),
        'subtitle' => get_field('banner_subtitle')
    ];
?>

@section('content')
    @include('partials.flexible.page')

    @if($teams = \App\Team::all() AND count($teams))
        <section class="team-listing">
            <div class="container">
                <div class="team-listing--hld">
                    @foreach($teams as $team)
                        <a href="{{ $team->url }}" title="{{ $team->name }}" class="team-listing--hld__item">
                            <div class="image-box" style="background-image: url('{{ $team->image }}')">
                                <img src="{{ $team->image }}" alt="{{ $team->name }}">

                                <div class="hover">
                                    <i class="fa fa-search"></i>
                                    <p>{{ __('Zobacz więcej', 'sage') }}</p>
                                </div>
                            </div>

                            <div class="content-box">
                                <h4 class="content-box--title">{{ $team->name }}</h4>
                                <h5 class="content-box--position">{{ $team->position }}</h5>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection