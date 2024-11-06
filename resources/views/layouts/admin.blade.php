<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your head content -->
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Include Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<!-- Navbar -->
<nav class="bg-white shadow mb-4">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <div>
                <a href="{{ route('admin.users.index') }}" class="text-xl font-bold">Admin Dashboard</a>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Back to User Dashboard</a>
            </div>
        </div>
    </div>
</nav>

<!-- Content -->
{{ $slot }}

@livewireScripts
<!-- Include any additional scripts -->
</body>
</html>
