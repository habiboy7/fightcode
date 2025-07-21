@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- User Aktif -->
        <div
            class="group bg-white p-6 rounded-xl shadow flex flex-col items-start transition duration-300 hover:bg-yellow-500">
            <p class="text-gray-500 text-lg group-hover:text-white">User Aktif</p>
            <h2 class="text-4xl font-bold text-yellow-500 mt-4 group-hover:text-white">{{ $activeUsers }}</h2>
        </div>


        <!-- Total User -->
        <div
            class="group bg-white p-6 rounded-xl shadow flex flex-col items-start transition duration-300 hover:bg-blue-500">
            <p class="text-gray-500 text-lg group-hover:text-white">Total Pengguna</p>
            <h2 class="text-4xl font-bold text-blue-500 mt-4 group-hover:text-white">{{ $totalUsers }}</h2>
        </div>


        <!-- Total Course -->
        <div
            class="group bg-white p-6 rounded-xl shadow flex flex-col items-start transition duration-300 hover:bg-green-500">
            <p class="text-gray-500 text-lg group-hover:text-white">Total Course</p>
            <h2 class="text-4xl font-bold text-green-500 mt-4 group-hover:text-white">{{ $totalCourses }}</h2>
        </div>


        <!-- Pembelian Bulan Ini -->
        <div
            class="group bg-white p-6 rounded-xl shadow flex flex-col items-start transition duration-300 hover:bg-red-500">
            <p class="text-gray-500 text-lg group-hover:text-white">Pembelian Bulan Ini</p>
            <h2 class="text-4xl font-bold text-red-500 mt-4 group-hover:text-white">{{ $monthlyPurchases }}</h2>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 mt-10 gap-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-semibold mb-4 text-gray-700">Top Course Berdasarkan Pembelian</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border border-gray-200">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-6 py-2 border">Course</th>
                            <th class="px-2 py-2 border">Jumlah Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($topCourses as $index => $course)
                            <tr class="even:bg-gray-50">
                                <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                                <td class="px-6 py-2 border">{{ $course->title }}</td>
                                <td class="px-2 py-2 border text-center">{{ $course->total_purchases }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500">Belum ada data pembelian.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
