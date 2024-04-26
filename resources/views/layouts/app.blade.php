<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="/styles/style.css" rel="stylesheet" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 relative">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container mx-auto px-4 pb-32">
                    {{ $slot }}
                </div>
                
            </main>              

            <div class="bg-slate-800 pt-5 absolute bottom-0 w-full">
                <div class="container mx-auto px-5 text-white flex justify-around">
                    <div>
                        <h1 class="mb-3 text-lg">telefoon nummer:</h1>
                        <p class="mb-2 text-lg">06 34627584</p>
                    </div>
                    <div>
                        <h1 class="mb-3 text-xl ">Locatie:</h1>
                        <a class="mb-2 text-lg" href="https://www.google.com/maps/place/Maalderij+37,+1185+ZC+Amstelveen/@52.2880544,4.8362818,16z/data=!3m1!4b1!4m6!3m5!1s0x47c5e03ceaa5f25f:0xc998ef14e952887!8m2!3d52.2880511!4d4.8388567!16s%2Fg%2F11gblf1ps8?entry=ttu" target="_blank">Maalderij 37</a>
                    </div>
                    <div>
                        <h1 class="mb-3 text-xl">E-mailadress:</h1>
                        <p class="mb-2 text-lg">admin@gmail.com</p>
                    </div>
            </div>
        </div>

        
    </body>
</html>
