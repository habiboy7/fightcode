@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Kelola Testimoni</h2>

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded shadow transition-opacity duration-500">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <form method="GET" class="flex gap-2 items-center">
            <select name="per_page" onchange="this.form.submit()" class="border rounded px-2 py-1">
                @foreach ([10, 20, 50, 100] as $size)
                    <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>{{ $size }} data
                    </option>
                @endforeach
            </select>

            <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1">
                <option value="">Semua Status</option>
                <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $status == 'approved' ? 'selected' : '' }}>Approved</option>
            </select>

            <input type="text" name="search" value="{{ $search }}" placeholder="Cari testimoni..."
                class="border rounded px-3 py-1">
        </form>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama User</th>
                    <th class="px-4 py-3">Isi Testimoni</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $index => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">
                            {{ ($testimonials->currentPage() - 1) * $testimonials->perPage() + $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $item->user->name }}</td>

                        <td class="px-4 py-2 max-w-md break-words overflow-y-auto max-h-32">
                            {{ $item->comment }}
                        </td>

                        <td class="px-4 py-2">
                            @if ($item->status === 'pending')
                                <span class="text-yellow-500 font-semibold">Pending</span>
                            @else
                                <span class="text-green-600 font-semibold">Approved</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            @if ($item->status === 'pending')
                                <form action="{{ route('admin.testimonials.approve', $item->id) }}" method="POST"
                                    class="inline">
                                    @csrf @method('PATCH')
                                    <button class="text-blue-600 hover:underline">
                                        <iconify-icon icon="solar:check-circle-linear" width="24"
                                            height="24"></iconify-icon>
                                    </button>
                                </form>
                            @endif
                            
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $item->id) }}" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-600 hover:underline delete-button">
                                    <iconify-icon icon="solar:trash-bin-trash-linear" width="24"
                                        height="24"></iconify-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">Tidak ada testimoni.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $testimonials->links() }}
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const form = button.closest('form');

                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: "Testimoni akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e3342f',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
