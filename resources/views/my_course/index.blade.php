@extends('layouts.sidebarLayout')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 mb-6 pl-12 md:pl-0">My Courses</h2>

    @if ($courses->isEmpty())
        <div class="flex flex-col items-center justify-center mt-16 text-center text-gray-600">
            <img src="{{ asset('img/emptyCourse.svg') }}" alt="No course yet" class="w-60 mb-6">
            <h3 class="text-xl font-semibold">Kamu belum membeli course apapun</h3>
            <p class="mt-2 text-md text-gray-600">Mulai belajar sekarang dan grow up skillmu dengan memilih course favoritmu!</p>
            <a href="{{ route('Learning Path') }}"
                class="mt-6 inline-block bg-teal-600 text-white px-6 py-2 rounded-lg hover:bg-teal-700 transition">
                Lihat Learning Path
            </a>
        </div>
    @else
        <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($courses as $purchase)
                @php
                    $course = $purchase->course;
                @endphp
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                        class="h-48 full object-cover">
                    <div class="p-4 flex flex-col justify-between">
                        <h3 class="text-lg font-bold text-center text-gray-800">{{ $course->title }}</h3>
                        <a href="{{ route('my-course.learn', $course->id) }}"
                            class="mt-4 inline-block text-white text-center font-semibold bg-teal-600 hover:bg-teal-700 py-2 px-4 rounded-full transition">
                            Mulai Belajar
                        </a>
                    </div>
                </div>  
            @endforeach                 
        </div>
    @endif
@endsection

