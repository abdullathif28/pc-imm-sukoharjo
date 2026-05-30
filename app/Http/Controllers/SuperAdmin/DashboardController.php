<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Konten;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_bidang'   => Bidang::count(),
            'total_admin'    => User::where('role', 'admin_bidang')->count(),
            'total_konten'   => Konten::count(),
            'total_published'=> Konten::where('status', 'published')->count(),
        ];

        $kontenTerbaru = Konten::with(['bidang', 'user'])
            ->latest()
            ->take(5)
            ->get();

        $bidangs = Bidang::withCount('kontens')->get();

        return view('super-admin.dashboard', compact('stats', 'kontenTerbaru', 'bidangs'));
    }
}
