<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::where('email', $googleUser->getEmail())->first();

    // Jika user belum pernah daftar
    if (!$user) {
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'google_id' => $googleUser->getId(),
            'avatar' => $googleUser->getAvatar(), // Pake avatar Google
            'password' => null, 
        ]);
    } else {
        // Kalo avatar masih null, artinya belum pernah upload manual
        if (!$user->avatar || Str::startsWith($user->avatar, 'http')) {
            $user->update([
                'google_id' => $googleUser->getId(),
                'avatar' => $user->avatar ?: $googleUser->getAvatar(), // Jangan timpa kalau sudah upload
            ]);
        }
    }

    Auth::login($user);
    return redirect()->intended('/')->with('success', 'Berhasil Login!');
}

}

