<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/fightCode.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body x-data="{ sidebarOpen: window.innerWidth >= 768 }" x-init="window.addEventListener('resize', () => sidebarOpen = window.innerWidth >= 768)" class="bg-gray-100" style="font-family: 'Inter', sans-serif;">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Main wrapper --}}
    <div :class="{ 'ml-64': sidebarOpen, 'ml-0': !sidebarOpen }" class="transition-all duration-300 min-h-screen">
        {{-- Header --}}
        @include('partials.header')

        {{-- Content --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    @stack('scripts')

</body>

</html>
