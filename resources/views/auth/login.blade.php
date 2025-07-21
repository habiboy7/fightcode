<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/fightCode.png') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ ucfirst(Route::currentRouteName() ?? 'Default') }}</title>
</head>

<body class="h-full bg-white overflow-hidden">

    <x-navbar></x-navbar>

    <div class="flex items-center justify-center px-4" style="height: calc(100vh - 80px);">
        <div class="grid md:grid-cols-2 items-center gap-6 max-w-6xl w-full">
            {{-- Kiri: Form Login --}}
            <div class="w-full max-w-md mx-auto">
                {{-- Header --}}
                <div class="text-center space-y-6 mb-6">
                    <h1 class="text-3xl font-bold text-gray-900">
                        Selamat Datang <br /> Sobat FightCode
                    </h1>
                    <p class="text-gray-600 text-lg">Ayo lanjutkan eksplorasi dan belajarmu</p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div class="space-y-4 ">
                        <input type="email" name="email" placeholder="Email"
                            class="w-full px-4 py-3 rounded-full border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600"
                            required />

                        <div class="relative">
                            <input type="password" name="password" placeholder="Password" id="password"
                                class="w-full px-4 py-3 pr-12 rounded-full border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                required />

                            <button type="button" id="togglePassword"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none">

                                {{-- Icon Mata Tertutup --}}
                                <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a9.959 9.959 0 012.15-3.362M6.634 6.634A9.977 9.977 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.978 9.978 0 01-4.244 5.136M3 3l18 18" />
                                </svg>

                                {{-- Icon Mata Terbuka --}}
                                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                            </button>

                        </div>
                    </div>


                    {{-- Alert gagal login --}}
                    @if ($errors->has('email'))
                        <div class="text-red-600 text-lg font-normal text-center">{{ $errors->first('email') }}</div>
                    @endif


                    {{-- Remember Me dan Lupa Password --}}
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" id="remember"
                                class="border-gray-300 text-blue-600 focus:ring-blue-500 rounded" />
                            <label for="remember" class="text-gray-600">Remember Me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-gray-600 hover:text-gray-800">
                                Lupa Password?
                            </a>
                        @endif
                    </div>



                    {{-- Tombol Login --}}
                    <button type="submit"
                        class="w-full text-lg py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold">
                        Masuk
                    </button>

                    {{-- Divider --}}
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">Atau</span>
                        </div>
                    </div>

                    {{-- Google Login --}}
                    <a href="{{ route('google.login') }}"
                        class="w-full inline-flex justify-center items-center py-3 border border-gray-300 rounded-full font-medium hover:bg-gray-50">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                            <path fill="#4285F4"
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="#34A853"
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="#FBBC05"
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path fill="#EA4335"
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                        <span>Masuk dengan Google</span>
                    </a>

                    <div class="text-center text-md text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-gray-900 font-medium hover:underline">
                            Daftar
                        </a>
                    </div>
                </form>
            </div>

            {{-- Kanan: Gambar --}}
            <div class="hidden md:flex justify-center items-center">
                <img src="img/loginImage.jpeg" alt="Gambar Login"
                    class="max-h-[600px] w-[500px] object-cover rounded-xl " />
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            const eyeClosed = document.getElementById('eyeClosed');
            const eyeOpen = document.getElementById('eyeOpen');

            toggleButton.addEventListener('click', function() {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';

                // Ganti icon mata
                eyeClosed.classList.toggle('hidden', isPassword);
                eyeOpen.classList.toggle('hidden', !isPassword);
            });
        });
    </script>


</body>

</html>
