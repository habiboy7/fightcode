<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
 
class AdminCourseController extends Controller
{
    private $categories = ['Design', 'Coding', 'Marketing', 'Business'];

    private function convertToEmbed($url)
{
    // Format https://youtu.be/VeNfHj6MhgA
    if (preg_match('#youtu\.be/([a-zA-Z0-9_-]+)#', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // Format https://www.youtube.com/watch?v=VeNfHj6MhgA
    if (preg_match('#youtube\.com/watch\?v=([a-zA-Z0-9_-]+)#', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // Jika sudah embed atau format lain, return langsung
    return $url;
}


    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        $courses = $query->latest()->paginate(10)->withQueryString();
        $categories = $this->categories;
        $levels = ['Beginner', 'Intermediate', 'Expert'];

        return view('admin.courses.index', compact('courses', 'categories', 'levels'));
    }

    public function create()
    {
        $levels = ['Beginner', 'Intermediate', 'Expert'];
        $categories = $this->categories;
        return view('admin.courses.create', compact('levels', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'category' => 'required|string|max:100',
            'level' => 'required|in:Beginner,Intermediate,Expert',
            'price' => 'required|numeric|min:0',
            'video_url' => 'required|url',
            'thumbnail' => 'required|image|max:2048',
        ]);

        $validated['video_url'] = $this->convertToEmbed($validated['video_url']);
        $validated['created_by'] = Auth::id();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $levels = ['Beginner', 'Intermediate', 'Expert'];
        $categories = $this->categories;
        return view('admin.courses.edit', compact('course', 'levels', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'category' => 'required|string|max:100',
            'level' => 'required|in:Beginner,Intermediate,Expert',
            'price' => 'required|numeric|min:0',
            'video_url' => 'required|url',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $validated['video_url'] = $this->convertToEmbed($validated['video_url']);


        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail && Storage::disk('public')->exists($course->thumbnail)) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->thumbnail && Storage::disk('public')->exists($course->thumbnail)) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course berhasil dihapus.');
    }
}
