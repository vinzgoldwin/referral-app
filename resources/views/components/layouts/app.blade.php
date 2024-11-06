<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFFILIATE BET</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<body class="min-h-screen flex flex-col">

<!-- Main Content Wrapper -->
<div class="flex-grow">
    <nav class="bg-white shadow py-4" x-data="{ isOpen: false, dropdownOpen: false }">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <!-- Logo and Navigation -->
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('storage/logo.png') }}" alt="188BET" class="h-11 w-auto hidden sm:block">
                        <img src="{{ asset('storage/logo.png') }}" alt="188BET Mobile" class="h-9 w-auto sm:hidden">
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex space-x-4 ml-6">
{{--                        <a href="/" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Home</a>--}}

                        <!-- Desktop Dropdown -->
                        <div class="relative" x-data="{ open: false }">
{{--                            <button @click="open = !open" @click.away="open = false"--}}
{{--                                    class="flex items-center text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">--}}
{{--                                Pendaftaran--}}
{{--                                <svg class="ml-1 h-4 w-4" :class="{'rotate-180': open}" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.585l3.71-4.355a.75.75 0 111.14.976l-4.25 5a.75.75 0 01-1.14 0l-4.25-5a.75.75 0 01.02-1.06z"></path>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                            <div x-show="open"--}}
{{--                                 class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">--}}
{{--                                <a href="/cara-daftar" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Daftar Afiliasi</a>--}}
{{--                                <a href="/pendaftaran" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Daftar Member</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <!-- Desktop Actions -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="/register" class="bg-cyan-800 text-white px-4 py-2 rounded-md hover:bg-orange-600">DAFTAR</a>
                    <a href="/login" class="bg-cyan-800 text-white px-4 py-2 rounded-md hover:bg-orange-600">LOGIN</a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="isOpen = !isOpen"
                        class="md:hidden text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">Home</a>

                <!-- Mobile Dropdown -->
{{--                <div x-data="{ mobileDropdownOpen: false }">--}}
{{--                    <button @click="mobileDropdownOpen = !mobileDropdownOpen"--}}
{{--                            class="w-full flex items-center justify-between text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">--}}
{{--                        Pendaftaran--}}
{{--                        <svg class="ml-1 h-4 w-4" :class="{'rotate-180': mobileDropdownOpen}" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.585l3.71-4.355a.75.75 0 111.14.976l-4.25 5a.75.75 0 01-1.14 0l-4.25-5a.75.75 0 01.02-1.06z"></path>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <div x-show="mobileDropdownOpen" class="pl-4">--}}
{{--                        <a href="/cara-daftar" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Daftar Afiliasi</a>--}}
{{--                        <a href="/pendaftaran" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Daftar Member</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="mt-4 space-y-2">
                    <a href="/register" class="block w-full bg-orange-500 text-white px-3 py-2 rounded-md text-center hover:bg-orange-600">DAFTAR</a>
                    <a href="/login" class="block w-full bg-orange-500 text-white px-3 py-2 rounded-md text-center hover:bg-orange-600">LOGIN</a>
                </div>
            </div>
        </div>
    </nav>
    {{ $slot }}
</div>


<footer class="py-5 bg-white shadow mt-auto">
    <div class="container mx-auto flex items-center">
        <!-- Top Bar [left] -->
        <ul class="navbar-nav flex space-x-4">
            <li class="nav-item">
                <a href="#" target="_self" class="nav-link text-gray-700"><i class="fas fa-clock text-after"></i> Open Hours: Mon - Fri - 9:00 - 19:00</a>
            </li>
        </ul>

        <!-- Spacer to push the right section to the end -->
        <div class="flex-grow"></div>

        <!-- Top Bar [right] -->
        <ul class="navbar-nav flex space-x-4">
            <li class="nav-item">
                <span class="nav-link text-gray-700"><i class="fas fa-phone text-after"></i> +62-812-345-5662</span>
            </li>
            <li class="nav-item">
                <a href="mailto:testaffiliater@service.com" target="_self" class="nav-link text-gray-700"><i class="fas fa-envelope text-after"></i> testaffiliater@service.com</a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="https://afiliasi188.com/recommends/facebook/" target="_blank" class="nav-link text-gray-700"><i class="fab fa-facebook-f"></i></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a href="https://afiliasi188.com/recommends/instagram/" target="_blank" class="nav-link text-gray-700"><i class="icon-social-instagram"></i></a>--}}
{{--            </li>--}}
        </ul>
    </div>
</footer>

</body>
</html>
