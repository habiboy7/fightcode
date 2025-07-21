@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-6">Kelola Course</h2>

        <!-- Search, Filter, Tambah -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <!-- Form Filter -->
            <form method="GET" action="{{ route('admin.courses.index') }}" class="flex flex-wrap gap-2">
                <!-- Search -->
                <input type="text" name="search" placeholder="Cari judul..." value="{{ request('search') }}"
                    class="w-48 px-3 py-2 border rounded shadow-sm focus:ring focus:ring-blue-200"
                    onchange="this.form.submit()">

                <!-- Filter Kategori -->
                <select name="category" class="w-45 px-3 py-2 border rounded shadow-sm" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>

                <!-- Filter Level -->
                <select name="level" class="w-36 px-3 py-2 border rounded shadow-sm" onchange="this.form.submit()">
                    <option value="">Semua Level</option>
                    @foreach ($levels as $lvl)
                        <option value="{{ $lvl }}" {{ request('level') === $lvl ? 'selected' : '' }}>
                            {{ $lvl }}
                        </option>
                    @endforeach
                </select>
            </form>

            <!-- Tombol Tambah -->
            <a href="{{ route('admin.courses.create') }}"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                + Tambah Course
            </a>
        </div>

        <!-- Tabel Course -->
        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr class="text-center">
                        <th class="px-2 py-3 border border-gray-200">No</th>
                        <th class="px-4 py-3 border border-gray-200">Judul</th>
                        <th class="px-4 py-3 border border-gray-200">Thumbnail</th>
                        <th class="px-3 py-3 border border-gray-200">Kategori</th>
                        <th class="px-3 py-3 border border-gray-200">Level</th>
                        <th class="px-4 py-3 border border-gray-200">Harga</th>
                        <th class="px-4 py-3 border border-gray-200 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $index => $course)
                        <tr class="even:bg-gray-50 text-center text-[18px]">
                            <td class="px-2 py-2 border border-gray-200">{{ $courses->firstItem() + $index }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $course->title }}</td>
                            <td class="px-4 py-2 border border-gray-200">
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Thumbnail"
                                        class="w-30 h-20 object-cover rounded shadow">
                                </div>
                            </td>
                            <td class="px-3 py-2 border border-gray-200">{{ $course->category ?? '-' }}</td>
                            <td class="px-3 py-2 border border-gray-200">{{ $course->level }}</td>
                            <td class="px-4 py-2 border border-gray-200">
                                {{ $course->price == 0 ? 'Free' : 'Rp ' . number_format($course->price, 0, ',', '.') }}
                            </td>
                            <td class="px-3 py-2 border-b border-gray-200 text-center space-x-2">
                                <a href="{{ route('admin.courses.edit', $course->id) }}"
                                    class="inline-block px-4 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                    <iconify-icon icon="mage:edit" width="26" height="26"></iconify-icon>
                                </a>

                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
                                    class="inline-block delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm delete-button">
                                        <iconify-icon icon="mynaui:trash" width="26" height="26"></iconify-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                Tidak ada course ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        <!-- Pagination -->
        <div class="mt-6">
            {{ $courses->withQueryString()->links() }}
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // <--- Tambahkan ini!

                    const form = button.closest('form');

                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: "Course akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e3342f',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // baru submit jika sudah dikonfirmasi
                        }
                    });
                });
            });
        });
    </script>
@endsection
