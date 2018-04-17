@extends('layouts.app')

<?php
    $blockExternalContent = true;
?>

@section('content')
    <div class="banner-page" style="background-image: url('@asset('images/404.jpg')');">
        <div class="content">
            <div class="container">
                <h2>{{ __('Podana strona nie istnieje', 'sage') }}</h2>

                <h1>{{ __('Czyżbyś zabłądził?', 'sage') }}</h1>
            </div>
        </div>
    </div>
@endsection