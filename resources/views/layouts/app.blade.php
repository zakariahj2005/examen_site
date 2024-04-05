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

            <div class="bg-slate-800 py-5 absolute bottom-0 w-full">
                <div class="container mx-auto px-4 text-white flex justify-around">
                    <div class="flex-1">
                        <p class="text-lg">telfoon</p>
                    </div>
                    <div class="flex-1">
                        <p class="text-lg">locatie</p>
                    </div>
                    <div class="flex-1">
                        <p class="text-lg">email</p>
                    </div>
                </div>
            </div>
        </div>

        
    </body>
</html>
