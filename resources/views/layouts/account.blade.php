<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="https://book-mamagement-system.vercel.app/build/assets/app-744d80f7.css">
    </head>
    <x-navigation-bar></x-navigation-bar>
    <body class="font-sans text-gray-800 antialiased bg-gray-500">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-emerald-200">
            <div class="w-full p-10 lg:max-w-3xl mt-32 mb-10 bg-gray-200 shadow-md overflow-hidden sm:rounded-3xl">
                @yield('content')
            </div>
        </div>
        <script src="https://book-mamagement-system.vercel.app/build/assets/app-633d7d34.js defer"></script>

    </body>
</html>
