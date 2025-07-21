<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/fightCode.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ ucfirst(Route::currentRouteName() ?? 'Default') }}</title>
    @livewireStyles
</head>

<body x-data="{ sidebarOpen: false }" class="h-full flex">

    <div :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
        class="fixed md:static inset-y-0 left-0 z-40 w-80 bg-white border-r transform md:translate-x-0 transition-transform duration-300 ease-in-out">
        @include('components.sidebar')
    </div>

    <!-- Tombol hamburger untuk mobile -->
    <button @click="sidebarOpen = !sidebarOpen"
        class="md:hidden fixed top-4 left-4 z-50 bg-white p-2 rounded shadow-lg">
        <svg class="h-6 w-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>




    <main class="flex-1 overflow-y-auto px-4 md:px-12 py-6">
        @yield('content')
    </main>




    @stack('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Overlay ketika sidebar terbuka -->
    <div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden">
    </div>

    @livewireScripts
</body>


</html>
