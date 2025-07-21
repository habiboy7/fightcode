@extends('layouts.sidebarLayout')

@section('content')
    <div class="max-w-5xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">{{ $course->title }}</h1>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <div class="relative w-full pt-[50.25%] mb-6">
                <iframe src="{{ $course->video_url }}" class="absolute top-0 left-0 w-full h-full rounded-lg" frameborder="0"
                    allowfullscreen
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                </iframe>
            </div>

            {{-- @if ($course->deskripsi)
                <p class="text-gray-700 leading-relaxed">{{ $course->deskripsi }}</p>
            @endif --}}
        </div>
    </div>


    {{-- Form Testimoni --}}
    <div class="mt-12 max-w-5xl mx-auto bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Berikan Testimoni Kamu</h3>

        <form action="{{ route('testimoni.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">

            <div>
                <label class="block text-md font-medium px-2 text-gray-700 mb-1">Komentar</label>
                <textarea name="comment" rows="4"
                    class="w-full p-2 border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500"
                    placeholder="Tulis testimoni kamu tentang course ini..." required></textarea>
            </div>

            <button type="submit"
                class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                Kirim Testimoni
            </button>
        </form>
    </div>
@endsection
