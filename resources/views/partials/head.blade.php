<head>
  <meta charset="utf-8">

  <title>@php(bloginfo( 'name' )) @php(wp_title())</title>
  <meta name="description" content="@php(bloginfo( 'description' ))">

  <!-- DOCUMENT SETTINGS -->
  <meta http-equiv="Content-Type" content="@php(bloginfo( 'html_type' ))" charset="@php(bloginfo( 'charset' ))">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- RESPONSIVE UTILITIES -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="mobile-web-app-capable" content="yes">

  <link rel="apple-touch-icon" sizes="57x57" href="{{ App\getResourceUrl('/favicons/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ App\getResourceUrl('/favicons/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ App\getResourceUrl('/favicons/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ App\getResourceUrl('/favicons/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ App\getResourceUrl('/favicons/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ App\getResourceUrl('/favicons/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ App\getResourceUrl('/favicons/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ App\getResourceUrl('/favicons/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ App\getResourceUrl('/favicons/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ App\getResourceUrl('/favicons/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ App\getResourceUrl('/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ App\getResourceUrl('/favicons/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ App\getResourceUrl('/favicons/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ App\getResourceUrl('/favicons/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ App\getResourceUrl('/favicons/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">


  @php(wp_head())
</head>