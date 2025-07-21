<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    //simpen aktif user
    protected function authenticated(Request $request, $user){
        $user->update(['last_login_at' => now()]);
    }

    // namiplkan login
    public function show(){
        return view('auth.login');
    }

    public function login(Request $request){
        $kredensial = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //! Autentikasinya
        if (Auth::attempt($kredensial)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Berhasil Login!'); // ini redirect ke hlmn home ketika sudah login
        }

        $user = User::where('email', $kredensial['email'])->first();
        if (!$user){
            return back()->withErrors([
                'email' => 'Akun belum terdaftar'
            ])->withInput();
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ])->onlyInput('email');
    }



    //? logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //kembali ke halaman sebelumnya
        return redirect()->to(url()->previous())->with('success', 'Berhasil Logout');
    }

}
