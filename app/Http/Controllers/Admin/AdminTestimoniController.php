<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;

class AdminTestimoniController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->per_page ?? 10;
        $status = $request->status;

        $testimonials = Testimony::with('user')
            ->when($search, function ($q) use ($search) {
                $q->whereHas('user', fn($query) =>
                    $query->where('name', 'like', "%$search%"))
                  ->orWhere('comment', 'like', "%$search%");
            })
            ->when($status && in_array($status, ['pending', 'approved']), function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.testimonials.index', compact('testimonials', 'search', 'perPage', 'status'));
    }

    public function approve($id)
    {
        $testimony = Testimony::findOrFail($id);
        $testimony->update(['status' => 'approved']);

        return back()->with('success', 'Testimoni disetujui!');
    }

    public function destroy($id)
    {
        Testimony::destroy($id);
        return back()->with('success', 'Testimoni dihapus.');
    }
}
