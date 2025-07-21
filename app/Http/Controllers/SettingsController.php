<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function show(){
      return view('settings');
    }


    public function changePass(Request $request) {
      $user = Auth::user();

      //aturan validasiinya
      $rules = ["new_password" => 'required|string|min:8|confirmed',];

      //jika user login manual (tdk poake google)
      if ($user->password) {
        $rules['current_password'] = 'required';

        $request->validate($rules);

        //validasi password lama
        if(!Hash::check($request->current_password, $user->password)) {
          return back()->withErrors(['current_password' => 'Password lama salah']);
        }
      } else {
        // user google cukup validasi pasword baru aja
        $request->validate($rules);
      }

      //nyimpan password baru
      $user->update([
        'password' => Hash::make($request->new_password)
      ]);
      
      return back()->with('gantiPass', 'Password telah diperbarui');
    }
}
