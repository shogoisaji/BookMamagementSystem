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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <nav class="w-full fixed h-36 -mt-12 bg-emerald-500 border-gray-200">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto ">
        <div class="flex items-center flex-shrink-0 pl-2">
          <lottie-player src="{{ asset('animations/bird_walk.json') }}" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>
          <span class="self-center text-3xl font-semibold whitespace-nowrap text-gray-100">Book Mamagement System</span>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 pr-6" id="navbar-user">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lgs md:flex-row md:space-x-8 md:mt-0 md:border-0 ">
            <li>
              <a href="{{ route('book.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0">Home</a>
            </li>
            <li>
              <a href="{{ route('book.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0">Rental</a>
            </li>
            <li>
              <a href="{{ route('account') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0">Account</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <body class="font-sans text-gray-800 antialiased bg-gray-500">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-emerald-200">
            <div class="w-full p-10 lg:max-w-3xl mt-32 mb-10 bg-gray-200 shadow-md overflow-hidden sm:rounded-3xl">
                @yield('content')
            </div>
        </div>
    </body>
</html>
