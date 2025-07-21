<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // simpen user ke db
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //? hash password disini ye
        ]);

        // redirect ke login
        return redirect()->route('login')->with('success', 'Berhasil Daftar, Silahkan Login');
    }
}
