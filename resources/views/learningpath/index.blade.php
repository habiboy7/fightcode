@extends('layouts.layout')

@php
    function getLevelColor($level)
    {
        return match ($level) {
            'Beginner' => 'bg-green-100 text-green-800',
            'Intermediate' => 'bg-blue-100 text-blue-800',
            'Expert' => 'bg-orange-100 text-orange-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
@endphp

@section('content')
    <div class="min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Jelajahi Kelas yang Tepat untuk Jalur Karirmu</h1>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="lg:w-56 flex-shrink-0 sticky top-24 self-start h-fit z-10">
                    <form method="GET" action="{{ route('Learning Path') }}">
                        <div class="bg-white rounded-lg p-6 shadow-sm text-lg">

                            <!-- Kategori -->
                            <div class="mb-6">
                                <h3 class="font-semibold text-xl text-gray-900 mb-4">Kategori</h3>
                                <div class="space-y-3">
                                    @foreach (['Semua', 'Design', 'Coding'] as $category)
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" name="categories[]" value="{{ $category }}"
                                                id="category-{{ $category }}" onchange="this.form.submit()"
                                                {{ in_array($category, request()->get('categories', ['Semua'])) ? 'checked' : '' }}
                                                class="border-gray-300 rounded">
                                            <label for="category-{{ $category }}" class="text-md font-medium">
                                                {{ $category }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Level -->
                            <div>
                                <h3 class="font-semibold text-xl text-gray-900 mb-4">Level</h3>
                                <div class="space-y-3">
                                    @foreach (['Beginner', 'Intermediate', 'Expert'] as $level)
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" name="levels[]" value="{{ $level }}"
                                                id="level-{{ $level }}" onchange="this.form.submit()"
                                                {{ in_array($level, request()->get('levels', [])) ? 'checked' : '' }}
                                                class="border-gray-300 rounded">
                                            <label for="level-{{ $level }}" class="text-md font-medium">
                                                {{ $level }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Course Grid  -->
                <div class="flex-1">
                    <div class=" pr-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            @forelse ($courses as $course)
                                <a href="{{ route('Learning Path Detail', $course->id) }}"
                                    class="block bg-white overflow-hidden rounded-lg shadow-sm hover:shadow-lg border">
                                    <div class="aspect-video relative">
                                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                                            class="object-cover w-full h-full" />
                                            
                                    </div>
                                    <div class="p-4">
                                        <h3 class="font-bold text-center text-lg text-gray-900 mb-2 line-clamp-2">
                                            {{ $course->title }}
                                        </h3>
                                        <p class="text-md text-center text-gray-700 mb-2 line-clamp-2">
                                            {{ $course->deskripsi }}
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm px-3 py-1 rounded {{ getLevelColor($course->level) }}">
                                                {{ $course->level }}
                                            </span>
                                            <span
                                                class="font-semibold {{ $course->price == 0 ? 'text-green-600' : 'text-gray-900' }}">
                                                {{ $course->price == 0 ? 'Free' : 'Rp ' . number_format($course->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                
                            @empty
                                <div class="flex flex-col items-center justify-center gap-3 text-center py-12 col-span-full">
                                    <img src="{{ asset('img/emptyCourse.svg') }}" alt="" class="w-60 mb-6">
                                    <p class="text-gray-500">Tidak ada kursus yang sesuai dengan filter yang dipilih.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
