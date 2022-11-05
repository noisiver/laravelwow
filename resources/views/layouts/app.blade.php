<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Your WoW Server description...">
    <title>World of Warcraft Registration Page</title>

    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <meta name="robots" content="max-image-preview:large">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Your WoW Site Name">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/open_graph.jpg') }}">
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
