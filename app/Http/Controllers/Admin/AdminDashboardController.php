<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {

        // ambil user yg aktif dalam 5 menit terakhir
        $onlineUserId = DB::table('sessions')->where('last_activity', '>=', now()->subMinutes(5)->timestamp)->pluck('user_id');

        $activeUsers = User::whereIn('id', $onlineUserId)->count();
        $totalUsers = User::count();
        $totalCourses = Course::count();
        $monthlyPurchases = Purchase::whereMonth('created_at', now()->month)
                                    ->whereYear('created_at', now()->year)
                                    ->count();

        $topCourses = Course::select('title')
            ->withCount('purchases')
            ->orderByDesc('purchases_count')
            ->take(5)
            ->get()
            ->map(function ($course) {
                return (object) [
                    'title' => $course->title,
                    'total_purchases' => $course->purchases_count
                ];
            });

        return view('admin.dashboard', compact(
            'activeUsers', 'totalUsers', 'totalCourses', 'monthlyPurchases', 'topCourses'
        ));
    }
}
