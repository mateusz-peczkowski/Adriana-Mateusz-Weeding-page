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
@endsection