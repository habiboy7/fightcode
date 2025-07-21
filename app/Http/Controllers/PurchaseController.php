<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function store(Request $request, $id)
    {
        $user = Auth::user();

        // validasi pembayaran user
        $request->validate([
            'payment_method' => 'required|in:bank_transfer,e_wallet,qris',
        ]);

        // Cek apakah sudah beli
        if (Purchase::where('user_id', $user->id)->where('course_id', $id)->exists()) {
            return redirect()->route('my-course')->with('info', 'Kamu sudah membeli course ini.');
        }

        Purchase::create([
            'user_id' => $user->id,
            'course_id' => $id,
            'payment_method' => $request->payment_method,
            'price_paid' => $request->price_paid,
        ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Pembayaran Berhasil']);
        }

        return redirect()->route('my-course')->with('success', 'Pembayaran berhasil!');

    }

    public function myCourse()
    {
        $courses = Auth::user()->purchases()->with('course')->get();
        return view('my_course.index', compact('courses'));
    }

    public function learn($id){
        $purchase = Purchase::with('course.courseContents')->where('user_id', Auth::id())
        ->where('course_id', $id)
        ->firstOrFail();

        return view('my_course.learn', 
        ['course' => $purchase->course,
    ]);
    }
}
