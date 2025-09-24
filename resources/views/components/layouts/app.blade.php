<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-[#111113]">
            <x-layouts.navigation />

            <main>
                <div class="py-4">
                    <div class="max-w-4xl mx-auto space-y-4 sm:px-6 lg:px-8">

                        @isset($header)
                            <div class="text-xs text-white">
                                {{ $header }}
                            </div>
                        @endisset

                        {{ $slot }}

                    </div>
                </div>
            </main>
        </div>
    </body>

</html>
