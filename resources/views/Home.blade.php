{{-- x layout ini manggil blade component yg ada di layout --}}
@extends('layouts.layout')

@section('content')
    <!-- Hero Section -->

    <section>
        <div class="min-h-screen  from-blue-50 via-white to-purple-50 py-4">
            <div class="container mx-auto px-4 lg:px-12">
                <!-- Heading -->
                <div class="text-center mb-12 relative">
                    <div class="flex justify-center mb-4">
                        <div class="w-8 h-1 bg-red-500 rounded-full rotate-45"></div>
                        <div class="w-4 h-1 bg-red-500 rounded-full rotate-45 ml-2"></div>
                    </div>
                    <h1 class="text-2xl lg:text-6xl font-bold z-1">
                        Your Journey to Greatness <br> Is the Future in Progress
                    </h1>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                    <!-- Certified Educator -->
                    <div class="lg:col-span-3">
                        <div class="bg-white p-6 rounded-xl shadow-lg">
                            <h3 class="text-lg text-center font-semibold text-slate-800 mb-6">Certified Educator</h3>

                            <div class="space-y-4">
                                <div class="flex items-center space-x-3 hover:bg-gray-50 p-2 rounded-lg gap-3">
                                    <div class=" w-10 h-10 flex items-center justify-center ">
                                        <iconify-icon icon="flat-color-icons:google" width="48"
                                            height="48"></iconify-icon>
                                    </div>
                                    <div>
                                        <p class="font-medium text-slate-800">Google</p>
                                        <p class="text-sm text-slate-500">Google Community Dev</p>
                                    </div>
                                </div>

                                {{-- aws --}}
                                <div class="flex items-center space-x-3 hover:bg-gray-50 p-2 rounded-lg gap-3">
                                    <div class="bg-blue-100 w-10 h-10 flex items-center justify-center rounded-lg">
                                        <div class=" w-10 h-10 rounded-sm flex items-center justify-center">
                                            <iconify-icon icon="skill-icons:aws-dark" width="48"
                                                height="48"></iconify-icon>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-slate-800">AWS</p>
                                        <p class="text-sm text-slate-500">Amazon Community Global</p>
                                    </div>
                                </div>

                                {{-- microsoft --}}
                                <div class="flex items-center space-x-3 hover:bg-gray-50 p-2 rounded-lg gap-3">
                                    <div class="bg-blue-100 w-10 h-10 flex items-center justify-center rounded-lg">
                                        <div class=" w-10 h-10 rounded-sm flex items-center justify-center">
                                            <iconify-icon icon="logos:microsoft-icon" width="48"
                                                height="48"></iconify-icon>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-slate-800">Microsoft</p>
                                        <p class="text-sm text-slate-500">Microsoft Global Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Image/Visual -->
                    <div class="lg:col-span-6 flex justify-center relative mt-[-175px]">
                        <img src="{{ asset('img/theGirl.png') }}" alt="Education Girl"
                            class="w-full max-w-md lg:max-w-lg max-h-[85vh] z-10 object-contain">
                        <div class="absolute bottom-0 w-full h-20 bg-gradient-to-t from-gray-100 to-transparent z-[11]">
                        </div>
                    </div>

                    <!-- Description + CTA -->
                    <div class="lg:col-span-3 space-y-6">
                        <p class="text-lg text-slate-600">
                            Siap Naik Level?
                            Pelajari skill dunia nyata dan bangun masa depanmu bersama mentor terbaik.
                        </p>

                        <a href="{{ route('Learning Path') }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-lg font-medium px-8 py-4 rounded-full transition-transform transform hover:scale-105 hover:shadow-lg">
                            Get Start Learn
                        </a>

                        @php
                            $gambarTesti = [
                                asset('img/testiHome/a.jpeg'),
                                asset('img/testiHome/b.jpeg'),
                                asset('img/testiHome/c.jpeg'),
                                asset('img/testiHome/d.jpeg'),
                            ];
                        @endphp

                        <!-- Rating -->
                        <div class="pt-6 space-y-3">
                            <div class="flex items-center space-x-2">
                                @foreach ($gambarTesti as $avatar)
                                    <img src="{{ $avatar }}" alt="User Avatar"
                                        class="w-10 h-10 rounded-full object-cover ring-2 ring-white" />
                                @endforeach
                                <div
                                    class="w-10 h-10 bg-slate-200 rounded-full border-2 border-white flex items-center justify-center text-slate-600 text-xs shadow-md">
                                    +5k
                                </div>
                            </div>


                            <div class="flex items-center space-x-3">
                                <span class="text-3xl font-bold text-slate-800">5.0</span>
                                <div class="flex space-x-1">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                            class="w-5 h-5 text-yellow-400">
                                            <path
                                                d="M12 .587l3.668 7.571L24 9.75l-6 5.848 1.417 8.268L12 19.771 4.583 23.866 6 15.598 0 9.75l8.332-1.592z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-sm text-slate-500">(130k review)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Alumni FightCode -->
    <section class="py-16 ">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-semibold text-gray-900 mb-1">Alumni FightCode Bekerja Pada</h2>
            <p class="text-lg text-black mb-8">Perusahaan Besar dan Terkenal</p>
            <div
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-x-[10px] gap-y-3 items-center justify-items-center">
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/Pertamina.jpg" alt="pertamina" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/Traveloka.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/paragon.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/bca.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/gojek.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/bumn.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/garuda.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/indofood.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/kai.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/bni.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/tokped.jpg" alt="" class="h-full w-auto object-contain">
                </div>
                <div
                    class="w-full max-w-[197px] aspect-[2.2/1] border border-gray-300 rounded-sm bg-white flex items-center justify-center transition transform hover:scale-105 hover:shadow-lg overflow-hidden">
                    <img src="img/mitra/lenovo.jpg" alt="" class="h-full w-auto object-contain">
                </div>
            </div>
        </div>
    </section>

    <!-- Accordion FAQ -->
    <section id="FAQ" class="py-16" x-data="{
        openIndex: null,
        images: ['satu.jpg', 'dua.png', 'tiga.png', 'karina.jpg'],
        descriptions: [
            'Kurikulum FightCode dirancang bersama para profesional industri, memastikan materi yang kamu pelajari selalu relevan dan sesuai kebutuhan dunia kerja saat ini.',
            'Dengan sistem belajar yang fleksibel, kamu bisa mengakses materi kapan saja dan di mana saja. Cocok untuk mahasiswa, pekerja, atau siapa pun yang ingin upgrade skill.',
            'Alumni FightCode telah bekerja di berbagai startup, BUMN, hingga perusahaan multinasional. Kamu bisa belajar, terinspirasi, dan membangun relasi dari komunitas alumni kami.',
            'Kami bantu kamu menyiapkan portofolio yang standout dan memberikan arahan karier dari mentor berpengalaman agar kamu siap bersaing di dunia profesional.'
        ]
    }">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <!-- Kiri: Accordion -->
                <div class="space-y-4">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Kenapa Harus Belajar di FightCode?</h2>
                    <p class="text-black text-lg text-justify mb-8">
                        FightCode Academy bukan hanya tempat belajar, tapi juga ruang untuk berkembang. Kode Anda akan
                        direview oleh para profesional, memastikan Anda belajar dengan standar industri.
                    </p>

                    <template
                        x-for="(item, index) in [
                    'Kurikulum Berbasis Standar Industri',
                    'Belajar fleksible sesuai jadwal Anda',
                    'Jaringan Alumni Terbukti di Dunia Kerja',
                    'Bimbingan Karier & Portofolio Siap Kerja'
                ]"
                        :key="index">
                        <div class="border border-gray-200 rounded-lg">
                            <button @click="openIndex === index ? openIndex = null : openIndex = index"
                                class="w-full p-4 flex items-center justify-between font-medium text-gray-900">
                                <span x-text="item"></span>
                                <svg class="w-5 h-5 text-gray-400 transform transition-transform"
                                    :class="{ 'rotate-180': openIndex === index }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M6 9l6 6 6-6" />
                                </svg>
                            </button>
                            <div x-show="openIndex === index" x-transition class="p-4 text-gray-700 text-sm">
                                <p x-text="descriptions[index]"></p>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Kanan: Gambar -->
                <div class="relative flex justify-center items-center">
                    <div
                        class="bg-gray-100 mt-12 rounded-2xl p-8 relative w-full max-w-md flex items-center justify-center">
                        <img :src="`/img/accordion/` + (openIndex !== null ? images[openIndex] : 'satu.jpg')"
                            alt="Gambar Dinamis" class="w-[400px] h-[300px] object-contain transition-all duration-300" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo kelas gratis -->
    <section class="bg-[#040924] px-8 rounded-[30px] overflow-hidden mt-12">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center text-white">

                <!-- Konten Kiri -->
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold">Gabung Kelas Gratis dan Tingkatkan Kapabilitas Fundamental Anda</h2>
                    <p class="text-white text-lg font-medium">
                        Dapatkan akses kelas gratis yang dikembangkan langsung oleh para mentor ahli untuk memperkuat
                        pemahaman Anda sejak awal.
                    </p>
                    <a href="{{ route('Learning Path') }}"
                        class="bg-[#129990] hover:bg-[#2447f9] text-white px-8 py-2 rounded-[30px] inline-block text-lg">
                        Gabung Kelas
                    </a>
                </div>

                <!-- Konten Kanan -->
                <div class="grid grid-cols-2 gap-4 overflow-hidden h-[400px] mask-image-fade">
                    <!-- Kolom kiri scroll ke bawah -->
                    <div class="flex flex-col gap-4 animate-scrollDown">
                        <div class="flex flex-col gap-4">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/five.jpg" alt="image">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/eight.jpg" alt="image">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/seven.png" alt="image">
                        </div>
                        <div class="flex flex-col gap-4">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/five.jpg" alt="image">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/eight.jpg" alt="image">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/seven.png" alt="image">
                        </div>
                    </div>

                    <!-- Kolom kanan scroll ke atas -->
                    <div class="left-1/2 flex flex-col gap-4 animate-scrollUp">
                        <div class="flex flex-col gap-4">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/nine.jpg" alt="image">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/one.jpg" alt="image">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/two.jpg" alt="image">
                        </div>
                        <div class="flex flex-col gap-4">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/nine.jpg" alt="image">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/one.jpg" alt="image">
                            <img class="rounded-lg shadow-lg" src="img/freeClass/two.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-16" id="testimoni">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl text-center font-bold text-gray-900 mb-6">Testimoni Siswa</h2>

            <div class="swiper max-w-4xl mx-auto">
                <div class="swiper-wrapper">
                    @foreach ($testimonies as $testimony)
                        <div class="swiper-slide bg-white  shadow-lg p-6 flex flex-col md:flex-row items-center gap-6">
                            @php
                                $user = $testimony->user;
                                $avatar =
                                    $user && $user->avatar
                                        ? (Str::startsWith($user->avatar, 'http')
                                            ? $user->avatar
                                            : asset('storage/avatar/' . $user->avatar))
                                        : 'https://ui-avatars.com/api/?name=' .
                                            urlencode($user->name ?? 'Guest') .
                                            '&size=128&background=0D8ABC&color=fff';
                            @endphp

                            <img src="{{ $avatar }}" alt="{{ $user->name ?? 'Guest' }}"
                                class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md">


                            <div class="flex-1">
                                <p class="text-gray-600 text-lg italic mb-4">"{{ $testimony->comment }}"</p>
                                <div>
                                    <div class="font-bold text-gray-900">{{ $testimony->user->name }}</div>
                                    <div class="text-gray-600">{{ $testimony->course->title }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination mt-4"></div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 3000, // ganti setiap 3 detik
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
@endsection
