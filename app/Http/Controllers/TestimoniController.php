<?php

namespace App\Http\Controllers;


use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'comment' => 'required|string|max:1000',
    ]);

    Testimony::create([
        'user_id' => Auth::id(),
        'course_id' => $request->course_id,
        'comment' => $request->comment,
        'status' => 'pending',
    ]);

    return back()->with('success', 'Testimoni berhasil dikirim!');
}
}
