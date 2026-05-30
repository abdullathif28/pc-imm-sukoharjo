<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;

class DashboardController extends Controller
{
    public function index()
    {
        $user   = auth()->user();
        $bidang = $user->bidang;

        $stats = [
            'total_konten'    => Konten::where('bidang_id', $user->bidang_id)->count(),
            'total_berita'    => Konten::where('bidang_id', $user->bidang_id)->where('jenis', 'berita')->count(),
            'total_kegiatan'  => Konten::where('bidang_id', $user->bidang_id)->where('jenis', 'kegiatan')->count(),
            'total_proker'    => Konten::where('bidang_id', $user->bidang_id)->where('jenis', 'program_kerja')->count(),
            'published'       => Konten::where('bidang_id', $user->bidang_id)->where('status', 'published')->count(),
            'total_draft'     => Konten::where('bidang_id', $user->bidang_id)->where('status', 'draft')->count(),
        ];

        $recentKonten = Konten::where('bidang_id', $user->bidang_id)
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentKonten', 'bidang'));
    }
}
