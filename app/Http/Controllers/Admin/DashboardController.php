<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user   = auth()->user();
        $bidang = $user->bidang;

        // FIX: Gabungkan 6 query COUNT menjadi 1 query
        $statsRaw = Konten::where('bidang_id', $user->bidang_id)
            ->selectRaw("
                COUNT(*) as total_konten,
                SUM(jenis = 'berita') as total_berita,
                SUM(jenis = 'kegiatan') as total_kegiatan,
                SUM(jenis = 'program_kerja') as total_proker,
                SUM(status = 'published') as published,
                SUM(status = 'draft') as total_draft
            ")
            ->first();

        $stats = [
            'total_konten'   => $statsRaw->total_konten   ?? 0,
            'total_berita'   => $statsRaw->total_berita   ?? 0,
            'total_kegiatan' => $statsRaw->total_kegiatan ?? 0,
            'total_proker'   => $statsRaw->total_proker   ?? 0,
            'published'      => $statsRaw->published      ?? 0,
            'total_draft'    => $statsRaw->total_draft    ?? 0,
        ];

        $recentKonten = Konten::where('bidang_id', $user->bidang_id)
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentKonten', 'bidang'));
    }
}
