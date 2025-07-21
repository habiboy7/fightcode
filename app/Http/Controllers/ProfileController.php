<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function upload(Request $request)
{
    $request->validate([
        'photo' => 'required|image|mimes:jpg,jpeg,png|max:4048'
    ]);

    $user = Auth::user();

    // Hapus file lama kalau bukan link dari Google
    if ($user->avatar && !Str::startsWith($user->avatar, 'http')) {
        Storage::disk('public')->delete('avatar/' . $user->avatar);
    }

    $file = $request->file('photo');
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('avatar', $filename, 'public');

    // Simpan nama file
    $user->avatar = $filename;
    $user->save(); 

    return back()->with('success', 'Foto profil berhasil diperbarui!');
}

    public function delete(){
        $user = Auth::user();

        if ($user->avatar){
            Storage::disk('public')->delete('avatar/'. $user->avatar);
            $user->avatar = null;
            $user->save();
        }

        return back();
    }


    // edit profile
    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'no_telp'));

        return redirect()->back();
    }
}


