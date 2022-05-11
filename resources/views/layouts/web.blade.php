<!DOCTYPE html>
<html lang="{{ (str_replace('_', '-', app()->getLocale()) == 'ar') ? "dir=rtl" : "dir=ltr" }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <meta name="robots" content="noindex">
    {{-- <meta name="robots" content="index,follow"> --}}

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('icon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('icon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="150x150" href="{{ asset('icon/mstile-150x150.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('icon/safari-pinned-tab.svg') }}">

    {{-- Meta --}}
    <meta name="author" content="@yield('meta_author', '')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <meta name="description" content="@yield('description')" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="@yield('canonical')" />
    <link rel="canonical" href="@yield('canonical')" />

    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
    {{-- Custom Web CSS --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"> --}}

    @yield('styles')

    {{-- Jquery --}}
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>  --}}

</head>

<body class="{{ count(Request::segments()) !== 3 ? 'bg-bg ' : 'bg-white' }} font-sans" dir="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr' }}">

    @include('partials.frontend.mobile-menu')

    <!-- Desktop Header -->
    <div class="mx-auto md:max-w-[1028px] md:mt-[50px]">

        <div class="flex flex-col md:flex-row w-full">

            @include('partials.frontend.sidebar')

            <!-- Main Content -->
            @yield('content')

        </div>

        @include('partials.frontend.footer')

    </div>

    {{-- @include('partials.frontend.footer') --}}


    {{----------- All Scripts --------------}}

    {{-- jQuery cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- AJAX jQuery cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- Alpine Js Cdn --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script> --}}
    {{-- FontAwsome 6 --}}
    {{-- <script src="https://kit.fontawesome.com/2c6b599d00.js" crossorigin="anonymous"></script> --}}

    @yield('scripts')
</body>

</html>
