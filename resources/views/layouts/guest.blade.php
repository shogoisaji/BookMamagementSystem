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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
            <div>
                <a href="/">
                    <x-application-logo class="w-50 h-50 fill-current" />
                </a>
            </div>

            <div class="w-full p-10 lg:max-w-3xl mb-10 bg-gray-400 shadow-md overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>
        </div>
        <script src="https://book-mamagement-system.vercel.app/build/assets/app-633d7d34.js defer"></script>

    </body>
</html>
