<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/fightCode.png') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ ucfirst(Route::currentRouteName() ?? 'Default') }}</title>
    <style>
        [x-cloak] {
            display: none !important;
        }

    </style>


</head>

<body class="h-full">

    <div class="min-h-full">
        {{-- Navbar : mengambl di component navbar --}}
        <x-navbar></x-navbar>
        <x-toast></x-toast>


        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{-- content --}}
                @yield('content')


                <x-footer></x-footer>
            </div>
        </main>
    </div>

    @stack('scripts')
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>
