<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite(['resources/assets/frontoffice_asset/css/animate.css'])
        @vite(['resources/assets/frontoffice_asset/css/bootstrap.min.css'])
        @vite(['resources/assets/frontoffice_asset/css/line-awesome.css'])
        @vite(['resources/assets/frontoffice_asset/css/line-awesome-font-awesome.min.css'])
        @vite(['resources/assets/frontoffice_asset/vendor/fontawesome-free/css/all.min.css'])
        @vite(['resources/assets/frontoffice_asset/css/font-awesome.min.css'])
        @vite(['resources/assets/frontoffice_asset/css/jquery.mCustomScrollbar.min.css'])
        @vite(['resources/assets/frontoffice_asset/lib/slick/slick.css'])
        @vite(['resources/assets/frontoffice_asset/lib/slick/slick-theme.css'])
        @vite(['resources/assets/frontoffice_asset/css/style.css'])
        @vite(['resources/assets/frontoffice_asset/css/responsive.css'])
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        @vite(['resources/assets/frontoffice_asset/js/jquery.min.js'])
        @vite(['resources/assets/frontoffice_asset/js/popper.js'])
        @vite(['resources/assets/frontoffice_asset/js/bootstrap.min.js'])
        @vite(['resources/assets/frontoffice_asset/js/jquery.mCustomScrollbar.js'])
        @vite(['resources/assets/frontoffice_asset/lib/slick/slick.min.js'])
        @vite(['resources/assets/frontoffice_asset/js/scrollbar.js'])
        @vite(['resources/assets/frontoffice_asset/js/script.js'])
    </head>
    <body>
    @yield('slot')
    </body>
</html>
