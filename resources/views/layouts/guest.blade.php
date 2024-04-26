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
    <link href="/styles/style.css" rel="stylesheet" />

</head>

<body class="font-sans text-gray-900 antialiased bg-gray-100">
    <div style="width:50%;margin:auto;">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div style="display:flex;flex-direct:column;align-items:stretch;gap:10px;justify-content:center;width:100%;">
            <div class="min-h-screen flex flex-col pt-6 sm:pt-0 ">


                <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>


            </div>

            <div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-gray-100 w-1/4">

                <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <p class="font-bold">Hoe maak je een veilig wachtoord? combineer:<p>                    
                    <p>Kleine letters (a-z)<br>
                    Hoofdletters (A-Z)<br>
                    Cijfers (0-9)<br>
                    Speciale tekens (zoals: #$%&*?)
                    <p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
