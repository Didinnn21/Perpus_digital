<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Perpustakaan Online</title>

    <!-- Bootstrap core CSS -->
    <link href={{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href={{ asset("template/css/fontawesome.css") }}>
    <link rel="stylesheet" href={{ asset("template/css/templatemo-lugx-gaming.css") }}>
    <link rel="stylesheet" href={{ asset("template/css/animate.css") }}>
    <link rel="stylesheet" href={{ asset("template/css/owl.css") }}>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            {{-- Include header/navigation --}}
            @include('layouts.header')
            <div class="container">
            {{-- Main Content --}}
            <main>
                 @yield('content')
            </main>
            </div>
            
            {{-- Include footer --}}
            @include('layouts.footer')

        </div>
    </body>
</html>
