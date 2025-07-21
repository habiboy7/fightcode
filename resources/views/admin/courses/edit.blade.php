@extends('layouts.admin')

@section('content')
    <div class="p-6 bg-white shadow rounded">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Edit Course</h2>
        </div>

        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium text-md mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $course->title) }}"
                    class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label class="block font-medium text-md mb-1">Kategori</label>
                <select name="category"
                    class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}"
                            {{ old('category', $course->category) == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium text-md mb-1">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    rows="4">{{ old('deskripsi', $course->deskripsi) }}</textarea>
            </div>

            <div>
                <label class="block font-medium text-md mb-1">Level</label>
                <select name="level"
                    class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">-- Pilih Level --</option>
                    @foreach ($levels as $level)
                        <option value="{{ $level }}" {{ old('level', $course->level) == $level ? 'selected' : '' }}>
                            {{ $level }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium text-md mb-1">Harga</label>
                <input type="number" name="price" value="{{ old('price', $course->price) }}"
                    class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium text-md mb-1">Link Video YouTube</label>
                <input type="text" name="video_url" value="{{ old('video_url', $course->video_url) }}"
                    class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label class="block font-medium text-md mb-1">Thumbnail Baru (Opsional)</label>
                <input type="file" name="thumbnail"
                    class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label class="block font-medium text-md mb-1">Thumbnail Saat Ini</label>
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Current Thumbnail"
                    class="w-48 h-auto rounded shadow border border-gray-300">
            </div>

            <div class="md:col-span-2 flex justify-end gap-3">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">Update</button>
                <a href="{{ route('admin.courses.index') }}"
                    class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded shadow">Batal</a>
            </div>
        </form>
    </div>
@endsection
