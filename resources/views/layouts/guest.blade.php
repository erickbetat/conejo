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
    <body class="font-sans text-gray-100 antialiased min-h-screen bg-brand-black relative">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-brand-red/10 via-brand-black to-brand-black z-0"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20 z-0"></div>
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
            <div>
                <a href="/">
                    <img src="{{ asset('images/logos/conejo-color.png') }}" alt="Conejo Cantú" class="h-20 md:h-24 w-auto object-contain drop-shadow-[0_0_20px_rgba(230,32,32,0.4)] transition-transform hover:scale-105">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-8 py-8 bg-brand-dark/80 backdrop-blur-xl border-2 border-brand-red/20 shadow-[0_0_50px_rgba(230,32,32,0.1)] overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
