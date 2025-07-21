<!DOCTYPE html>
<html lang="en">

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

<body>
    <nav class="bg-white shadow px-4 py-6 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div>
                <a href="{{ route('my-course') }}" class="flex items-center gap-3 text-xl font-semibold">
                    <iconify-icon icon="basil:arrow-left-outline" width="32" height="32"></iconify-icon>
                    Dashboard
                </a>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-xl font-medium hidden md:inline">Halo, {{ Auth::user()->name }}</span>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                    alt="Avatar" class="w-8 h-8 rounded-full">
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>
