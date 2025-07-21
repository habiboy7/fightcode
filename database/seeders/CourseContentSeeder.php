<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseContentSeeder extends Seeder
{
    
    public function run(): void
    {
        $course = Course::first(); // ambil course pertama

        CourseContent::create([
            'course_id' => $course->id,
            'title' => 'Pengenalan Laravel',
            'content_url' => 'Laravel adalah framework PHP MVC yang sangat populer...',
        ]);

        CourseContent::create([
            'course_id' => $course->id,
            'title' => 'Routing Dasar',
            'content_url' => 'Routing adalah cara menentukan URL dan controller yang dijalankan...',
        ]);
    }
}
