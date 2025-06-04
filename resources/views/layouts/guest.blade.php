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
<body class="font-sans text-gray-900 antialiased bg-[#343a40]"> <!-- Fond bleu foncé -->

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-2 sm:pt-0">
        <div class="flex justify-center">
            {{-- 
            <a href="/">
                <img src="{{ asset('img/Superette Logo.png') }}" alt="Mon entreprise" class="h-40 w-auto rounded-lg shadow-lg">
            </a> 
            --}}
        </div>

        <div class="w-full max-w-sm mt-1 px-4 py-2 bg-white shadow-md overflow-hidden rounded-lg">
    {{ $slot }}
</div>

    </div>

</body>
</html>
