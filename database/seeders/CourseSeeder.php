<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'title' => 'Belajar Laravel Dasar',
            'deskripsi' => 'Kursus ini mengajarkan dasar-dasar Laravel untuk pemula.',
            'thumbnail' => 'thumbnails/laravel.png', // Simpan file gambar dummy
            'price' => 0, // Free course
            'created_by' => 1,
            'video_url' => 'https://www.youtube.com/embed/ClMX6TXvh_o',

        ]);

        Course::create([
            'title' => 'Mahir Tailwind CSS',
            'deskripsi' => 'Kursus lengkap untuk memahami utility-first CSS.',
            'thumbnail' => 'thumbnails/tailwind.png',
            'price' => 150000,
            'created_by' => 1,
            'video_url' => 'https://www.youtube.com/embed/ClMX6TXvh_o',
        ]);

    }
}
