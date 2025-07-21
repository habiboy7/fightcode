@extends('layouts.layout')

@section('content')
    <!-- Hero Section -->
    <section class="relative group h-[500px] overflow-hidden">
        <!-- Background Image Div (kena efek hover) -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat filter grayscale brightness-50 transition duration-300 ease-in-out group-hover:filter-none group-hover:brightness-100"
            style="background-image: url('{{ asset('img/snow.jpeg') }}'); z-index: 0;">
        </div>

        <!-- Overlay hitam + konten -->
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center  px-6 lg:px-24 z-10">
            <div class="bg-white p-8 rounded-xl max-w-md shadow-xl">
                <p class="text-md text-gray-700 mb-2">About FightCode</p>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                    Belajar Lebih Mudah, Kapan Saja dan Di Mana Saja
                </h1>
                <p class="text-gray-600 mb-6 text-justify">
                    Bergabunglah bersama komunitas pembelajar aktif, bangun skill bareng, dan diskusi langsung di Discord!
                </p>
                <div class="flex  gap-2">
                    <a href="https://discord.gg/ZGSAFGN6" target="_blank"
                        class="bg-emerald-600 text-white px-5 py-2 rounded-full font-medium hover:bg-emerald-700 flex items-center gap-2">
                        <iconify-icon icon="ri:discord-line" width="24" height="24"></iconify-icon>
                        Join Discord</a>
                    <a href="{{ route('Learning Path') }}"
                        class="border border-gray-300 px-5 py-2 rounded-full font-medium text-gray-700 hover:bg-gray-100">Gabung
                        Kelas</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Our Story Section -->
    <section class="py-16 px-4 lg:px-48 text-center ">
        <div class="mb-4">
            <span class="inline-block bg-gray-200 font-semibold text-lg px-6 py-2 rounded-full">FightCode Story</span>
        </div>
        <p class="text-2xl md:text-3xl text-gray-800 leading-relaxed">
            Didirikan dengan semangat untuk membuka akses seluas-luasnya terhadap pendidikan teknologi, FightCode hadir
            sebagai platform belajar dan ruang berkembang bagi semua kalangan.
            Kami percaya bahwa kemajuan teknologi tidak boleh hanya dinikmati oleh segelintir orang, tapi harus menjadi alat
            pemberdayaan bagi seluruh masyarakat Indonesia.
            Melalui pendekatan edukatif, komunitas kolaboratif, dan konten berbasis praktik nyata, FightCode berkomitmen
            mendukung percepatan transformasi digital di Indonesia.
        </p>
    </section>

    <section class="px-6 py-16 lg:px-32 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- LEFT: Dynamic Title -->
            <div>
                <p class="text-blue-600 font-semibold uppercase text-sm mb-2">The Best Developer Community</p>
                <h1 id="dynamicText"
                    class="text-4xl md:text-5xl font-bold text-gray-700 leading-tight min-h-[130px] transition-all duration-300">
                    Community for developers in Indonesia
                </h1>
            </div>

            <!-- RIGHT: Stats Blocks -->
            <div class="space-y-6">
                <div class="rounded-xl hover:bg-yellow-500  group border p-6 shadow-sm flex flex-col items-center transition duration-300">
                    <p class="text-3xl font-bold text-gray-800 group-hover:text-white">120K<span class="text-teal-600 group-hover:text-white">+</span></p>
                    <p class="text-lg font-semibold  mt-1 group-hover:text-white">Proyek digital sukses dari pengguna</p>
                </div>
                <div class="rounded-xl hover:bg-blue-500 group border p-6 shadow-sm flex flex-col items-center transition duration-300">
                    <p class="text-3xl font-bold text-gray-800 group-hover:text-white">8K<span class="text-teal-600 group-hover:text-white">+</span></p>
                    <p class="text-lg font-semibold  mt-1 group-hover:text-white">Mentor dan praktisi industri aktif</p>
                </div>
                <div class="rounded-xl hover:bg-purple-500 border p-6 group shadow-sm flex flex-col items-center transition duration-300">
                    <p class="text-3xl font-bold text-gray-800 group-hover:text-white">650<span class="text-teal-600 group-hover:text-white">+</span></p>
                    <p class="text-lg font-semibold mt-1 group-hover:text-white">Event dan workshop terselenggara</p>
                </div>
                <div class="rounded-xl hover:bg-green-500 border p-6 group shadow-sm flex flex-col items-center transition duration-300">
                    <p class="text-3xl font-bold text-gray-800 group-hover:text-white">97%<span class="text-teal-600 group-hover:text-white">+</span></p>
                    <p class="text-lg font-semibold mt-1 group-hover:text-white">Peserta merasa terbantu & berkembang</p>
                </div>

            </div>
        </div>

        <!-- TEXT ANIMATION SCRIPT -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const phrases = [
                    "Platform edukasi teknologi terbaik",
                    "Learning space for all tech enthusiasts",
                    "Community for developers in Indonesia",
                    "Empowering the future of digital talent",
                ];

                const target = document.getElementById('dynamicText');
                let index = 0;

                function updateText() {
                    target.classList.remove('opacity-100');
                    target.classList.add('opacity-0');
                    setTimeout(() => {
                        target.textContent = phrases[index];
                        target.classList.remove('opacity-0');
                        target.classList.add('opacity-100');
                        index = (index + 1) % phrases.length;
                    }, 300);
                }

                setInterval(updateText, 3000); // ganti tiap 3 detik
            });
        </script>
    </section>
@endsection()
