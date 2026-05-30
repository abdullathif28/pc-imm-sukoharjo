<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Konten;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $featuredKonten = Konten::with('bidang')
            ->published()
            ->where('is_featured', true)
            ->latest()
            ->take(5)
            ->get();

        $beritaTerbaru = Konten::with('bidang')
            ->published()
            ->byJenis('berita')
            ->latest()
            ->take(6)
            ->get();

        $kegiatanTerbaru = Konten::with('bidang')
            ->published()
            ->byJenis('kegiatan')
            ->latest()
            ->take(3)
            ->get();

        $bidangs = Bidang::where('is_active', true)
            ->withCount(['kontens' => fn($q) => $q->where('status', 'published')])
            ->orderBy('urutan')
            ->get();

        $stats = [
            'total_bidang'   => Bidang::where('is_active', true)->count(),
            'total_konten'   => Konten::published()->count(),
            'total_berita'   => Konten::published()->byJenis('berita')->count(),
            'total_kegiatan' => Konten::published()->byJenis('kegiatan')->count(),
        ];

        return view('public.home', compact('featuredKonten', 'beritaTerbaru', 'kegiatanTerbaru', 'bidangs', 'stats'));
    }

    public function konten(Request $request)
    {
        $query = Konten::with('bidang')->published();

        if ($request->filled('bidang_id')) $query->where('bidang_id', $request->bidang_id);
        if ($request->filled('jenis'))     $query->where('jenis', $request->jenis);
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('ringkasan', 'like', '%' . $request->search . '%');
            });
        }

        $kontens = $query->latest()->paginate(9)->withQueryString();
        $bidangs = Bidang::where('is_active', true)->orderBy('nama')->get();

        return view('public.konten', compact('kontens', 'bidangs'));
    }

    public function detailKonten($slug)
    {
        $konten = Konten::with(['bidang', 'user', 'medias'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $konten->incrementViews();

        $related = Konten::with('bidang')
            ->published()
            ->where('jenis', $konten->jenis)
            ->where('id', '!=', $konten->id)
            ->latest()
            ->take(3)
            ->get();

        return view('public.detail-konten', compact('konten', 'related'));
    }

    public function bidang()
    {
        $bidangs = Bidang::where('is_active', true)
            ->withCount(['kontens' => fn($q) => $q->where('status', 'published')])
            ->orderBy('urutan')
            ->get();

        return view('public.bidang', compact('bidangs'));
    }

    public function detailBidang(Bidang $bidang)
    {
        $berita = Konten::with('bidang')
            ->published()
            ->where('bidang_id', $bidang->id)
            ->where('jenis', 'berita')
            ->latest()
            ->paginate(6);

        $kegiatan = Konten::with('bidang')
            ->published()
            ->where('bidang_id', $bidang->id)
            ->where('jenis', 'kegiatan')
            ->latest()
            ->take(3)
            ->get();

        $proker = Konten::with('bidang')
            ->published()
            ->where('bidang_id', $bidang->id)
            ->where('jenis', 'program_kerja')
            ->latest()
            ->take(6)
            ->get();

        return view('public.detail-bidang', compact('bidang', 'berita', 'kegiatan', 'proker'));
    }
}
