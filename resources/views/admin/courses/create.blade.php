@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Tambah Course</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Kiri --}}
                <div class="space-y-4">
                    <div>
                        <label class="block font-medium text-md mb-1">Judul</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label class="block font-medium text-md mb-1">Kategori</label>
                        <select name="category"
                            class="w-full border text-gray-600 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div>
                        <label class="block font-medium text-md mb-1">Level</label>
                        <select name="level"
                            class="w-full border text-gray-600 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                            <option value="">-- Pilih Level --</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level }}" {{ old('level') == $level ? 'selected' : '' }}>
                                    {{ $level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-md mb-1">Harga</label>
                        <input type="number" name="price" min="0" value="{{ old('price', 0) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                </div>

                {{-- Kanan --}}
                <div class="space-y-4">
                    <div>
                        <label class="block font-medium text-md mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-medium text-md mb-1">URL Video YouTube</label>
                        <input type="text" name="video_url" value="{{ old('video_url') }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Contoh: https://youtu.be/VeNfHj6MhgA">
                    </div>

                    <div>
                        <label class="block font-medium text-md mb-1">Thumbnail</label>
                        <input type="file" name="thumbnail" accept="image/*" onchange="previewImage(event)"
                            class="block w-full text-md text-gray-600 file:mr-4 file:py-2 file:px-4 file:border file:rounded-md file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />

                        <div id="thumbnail-preview" class="mt-4 hidden">
                            <p class="text-md mb-2">Preview:</p>
                            <img id="preview-image" src="#" alt="Thumbnail Preview"
                                class="w-64 rounded border shadow">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('admin.courses.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const previewDiv = document.getElementById('thumbnail-preview');
            const previewImg = document.getElementById('preview-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewDiv.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewDiv.classList.add('hidden');
                previewImg.src = '';
            }
        }
    </script>
@endsection
