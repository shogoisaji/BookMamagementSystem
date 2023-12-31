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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-emerald-200">
            <div class="-mt-20 -mb-20">
<lottie-player src="{{ asset('https://book-mamagement-system.vercel.app/animations/bird_walk.json') }}" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>

                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-400 shadow-md overflow-hidden sm:rounded-2xl">
                {{ $slot }}
            </div>
        </div>
        <script src="https://book-mamagement-system.vercel.app/build/assets/app-633d7d34.js defer"></script>
    </body>
</html>
