@extends('layouts.sidebarLayout')
@section('content')
    <h1 class="text-2xl font-semibold mb-6 pl-12 md:pl-0">Settings</h1>
    <div class="max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-2">Password</h2>
        <p class="text-lg mb-6">Perbarui kata sandi untuk keamanan akun yang lebih baik</p>

        <form action="{{ route('change.password') }}" method="POST" class="space-y-6">
            @csrf

            @if (session('gantiPass'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                    class="mb-4 p-4 text-green-800 bg-green-100 rounded-md border border-green-300 transition">
                    {{ session('gantiPass') }}

                </div>
            @endif


            @if (!Auth::user()->password)
                <div class="text-md border font-semibold rounded-md bg-blue-100 px-3 py-2 text-blue-900 mb-2">
                    Anda login via Google. Buat password agar bisa login manual.
                </div>
            @endif

            @if (Auth::user()->password)
                {{-- Password Sekarang --}}
                <div class="relative">
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password
                        Sekarang</label>
                    <input type="password" name="current_password" id="current_password"
                        class="w-full px-4 py-3 pr-10 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan password saat ini">

                </div>
            @endif

            {{-- Password Baru --}}
            <div class="relative">
                <label for="new_password" class="block text-lg font-medium text-gray-700 mb-1">Password Baru</label>
                <input type="password" name="new_password" id="new_password"
                    class="w-full px-4 py-3 pr-10 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan password baru">

                <p class="text-md text-gray-500 mt-1">🔒 Password minimal 8 karakter</p>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="relative">
                <label for="new_password_confirmation" class="block text-lg font-medium text-gray-700 mb-1">Konfirmasi
                    Password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                    class="w-full px-4 py-3 pr-10 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Konfirmasi password baru">

            </div>

            <div class="flex justify-end gap-4 pt-4">
                <button type="button" id="cancelButton"
                    class="px-4 py-2 border border-gray-400 rounded-md text-gray-700 hover:bg-gray-100">
                    Batal
                </button>

                <button type="submit" class="px-4 py-2 bg-black text-white font-semibold rounded-md hover:bg-gray-900">
                    Perbarui
                </button>
            </div>
        </form>


        @push('scripts')
            @vite('resources/js/passEdit.js')
        @endpush
    @endsection
