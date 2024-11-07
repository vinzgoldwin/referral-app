<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $pageTitle ?? config('app.name', 'MxFin') }}</title>

        <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' width='128' height='128' viewBox='0 0 200 50'><text x='10' y='40' font-family='Arial, sans-serif' font-size='48' font-weight='bold' fill='%230891B2'>MxFin</text></svg>">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="py-5 bg-white dark:bg-gray-800 shadow mt-auto">
            <div class="container mx-auto px-4 flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0">
                <!-- Footer Left -->
                <ul class="flex space-x-4">
                    <li>
                        <a href="#" target="_self" class="text-gray-700 dark:text-gray-200 flex items-center">
                            <i class="fas fa-clock mr-1"></i> Open Hours: Mon - Fri - 9:00 - 19:00
                        </a>
                    </li>
                </ul>

                <!-- Spacer -->
                <div class="flex-grow hidden sm:block"></div>

                <!-- Footer Right -->
                <ul class="flex space-x-4 flex-col sm:flex-row items-center">
                    <li>
                <span class="text-gray-700 dark:text-gray-200 flex items-center">
                    <i class="fas fa-phone mr-1"></i> +62-812-345-5662
                </span>
                    </li>
                    <li>
                        <a href="mailto:testaffiliater@service.com" class="text-gray-700 dark:text-gray-200 flex items-center">
                            <i class="fas fa-envelope mr-1"></i> testaffiliater@service.com
                        </a>
                    </li>
                </ul>
            </div>
        </footer>

    </body>
</html>
