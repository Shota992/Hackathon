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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-3 sm:pt-0 bg-cyan-800">
            <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-800 ">
                    Register as a New User
                </a>
            </div>

            <div class="w-full h-full sm:max-w-md mt-6 px-6 py-4 bg-white border-red-700 border-t-4  shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-center my-8">
                    <img src="{{ asset('images/logo_icon_black.png') }}" alt="CoreConnect" class="h-12 w-auto">
                </div>
                {{ $slot }}
            </div>


        </div>
    </body>



</html>
