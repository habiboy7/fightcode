@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-center px-4 bg-white mb-12 " style="height: calc(105vh - 80px);">
        <div class="grid md:grid-cols-2  gap-6 max-w-6xl w-full ">

            {{-- Kanan: Gambar --}}
            <div class="hidden md:flex justify-center items-center">
                <img src="img/regisImage.jpeg" alt="Gambar Login" class="max-h-[600px] w-[500px] object-cover rounded-xl " />
            </div>

            {{-- Kiri: Form Login --}}
            <div class="w-full max-w-md mx-auto">
                {{-- Header --}}
                <div class="text-center space-y-6 mb-6">
                    <h1 class="text-3xl font-bold text-gray-900">
                        Daftar Akun FightCode
                    </h1>
                </div>

                {{-- Form --}}
                <form method="POST" action="" class="space-y-5">
                    @csrf
                    <div class="space-y-5 ">
                        <div class="relative">
                            <label for="nama" class="font-semibold">Nama Lengkap</label>
                            <input id="nama" type="nama" name="name" placeholder="Nama Lengkap"
                                class="w-full mt-2 px-4 py-3 rounded-sm border border-gray-300  " required />
                            <p class="text-sm text-gray-500">Masukkan Nama Asli Anda</p>
                        </div>

                        <div class="relative">
                            <label for="Email" class="font-semibold">Email</label>
                            <input type="email" name="email" placeholder="Alamat Email"
                                class="w-full mt-2 px-4 py-3 pr-12 rounded-sm border border-gray-300" required />
                            <p class="text-sm text-gray-500">Gunakan alamat Email yang aktif</p>
                        </div>
                        <div class="relative">
                            <label for="password" class="font-semibold">Password</label>
                            <input id="password" type="password" name="password" placeholder="Password"
                                class="w-full mt-2 px-4 py-3 pr-12 rounded-sm border border-gray-300" required />
                            <p class="text-sm text-gray-500">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</p>
                        </div>
                        <div class="relative">
                            <label for="password-konfirmasi" class="font-semibold">Konfirmasi Password</label>
                            <input id="password-konfirmasi" type="password" name="password_confirmation" placeholder="Password"
                                class="w-full mt-2 px-4 py-3 pr-12 rounded-sm border border-gray-300" required />
                        </div>
                    </div>

                    {{-- Tombol Daftar --}}
                    <button type="submit"
                        class="w-full text-lg py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold">
                        Daftar
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
                        <span>Daftar dengan Google</span>
                    </a>

                </form>
            </div>
        </div>
    </div>
@endsection
