<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminUserController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $role = $request->role;
    $perPage = $request->per_page ?? 10;

    $users = User::query()
        ->when($search, fn($q) => $q->where('name', 'like', "%$search%")
                                     ->orWhere('email', 'like', "%$search%")
                                     ->orWhere('no_telp', 'like', "%$search%"))
        ->when($role, fn($q) => $q->where('role', $role))
        ->latest()
        ->paginate($perPage)
        ->withQueryString();

    $roles = ['admin', 'user']; // bisa ambil unique roles dari DB kalo dinamis

    return view('admin.users.index', compact('users', 'search', 'role', 'perPage', 'roles'));
}

public function destroy(User $user)
{
    $user->delete();
    return back()->with('success', 'User berhasil dihapus.');
}


public function exportExcel()
{
    return Excel::download(new UsersExport, 'data-users.xlsx');
}



}
