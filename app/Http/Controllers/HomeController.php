<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\Testimony;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::with(['user', 'course'])
            ->where('status', 'approved')
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('testimonies'));
    }
}
