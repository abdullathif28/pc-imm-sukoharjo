<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Konten;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KontenController extends Controller
{
    public function index(Request $request)
    {
        $query = Konten::with(['bidang', 'user']);

        if ($request->filled('bidang_id'))  $query->where('bidang_id', $request->bidang_id);
        if ($request->filled('jenis'))      $query->where('jenis', $request->jenis);
        if ($request->filled('status'))     $query->where('status', $request->status);
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $kontens = $query->latest()->paginate(12)->withQueryString();
        $bidangs = Bidang::orderBy('nama')->get();

        return view('super-admin.konten.index', compact('kontens', 'bidangs'));
    }

    public function create()
    {
        $bidangs = Bidang::where('is_active', true)->orderBy('nama')->get();
        return view('super-admin.konten.create', compact('bidangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bidang_id'      => 'required|exists:bidangs,id',
            'jenis'          => 'required|in:berita,kegiatan,program_kerja',
            'judul'          => 'required|string|max:255',
            'ringkasan'      => 'nullable|string|max:500',
            'isi'            => 'required|string',
            'tanggal_mulai'  => 'nullable|date',
            'tanggal_selesai'=> 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi'         => 'nullable|string|max:255',
            'status'         => 'required|in:draft,published',
            'thumbnail'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'medias.*'       => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,mp4,avi,mov|max:51200',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['user_id']    = auth()->id();
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['slug']       = Str::slug($validated['judul']) . '-' . uniqid();

        $konten = Konten::create($validated);

        // Handle multiple media uploads
        if ($request->hasFile('medias')) {
            foreach ($request->file('medias') as $index => $file) {
                $mime  = $file->getMimeType();
                $tipe  = str_starts_with($mime, 'video/') ? 'video' : 'foto';
                $path  = $file->store('konten/' . $konten->id, 'public');

                Media::create([
                    'konten_id' => $konten->id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'mime_type' => $mime,
                    'tipe'      => $tipe,
                    'ukuran'    => $file->getSize(),
                    'urutan'    => $index,
                ]);
            }
        }

        return redirect()->route('super-admin.konten.index')
            ->with('success', 'Konten berhasil ditambahkan.');
    }

    public function edit(Konten $konten)
    {
        $bidangs = Bidang::where('is_active', true)->orderBy('nama')->get();
        $konten->load('medias');
        return view('super-admin.konten.edit', compact('konten', 'bidangs'));
    }

    public function update(Request $request, Konten $konten)
    {
        $validated = $request->validate([
            'bidang_id'      => 'required|exists:bidangs,id',
            'jenis'          => 'required|in:berita,kegiatan,program_kerja',
            'judul'          => 'required|string|max:255',
            'ringkasan'      => 'nullable|string|max:500',
            'isi'            => 'required|string',
            'tanggal_mulai'  => 'nullable|date',
            'tanggal_selesai'=> 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi'         => 'nullable|string|max:255',
            'status'         => 'required|in:draft,published',
            'thumbnail'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'medias.*'       => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,mp4,avi,mov|max:51200',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($konten->thumbnail) Storage::disk('public')->delete($konten->thumbnail);
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        $konten->update($validated);

        if ($request->hasFile('medias')) {
            foreach ($request->file('medias') as $index => $file) {
                $mime = $file->getMimeType();
                $tipe = str_starts_with($mime, 'video/') ? 'video' : 'foto';
                $path = $file->store('konten/' . $konten->id, 'public');

                Media::create([
                    'konten_id' => $konten->id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'mime_type' => $mime,
                    'tipe'      => $tipe,
                    'ukuran'    => $file->getSize(),
                    'urutan'    => $konten->medias()->count() + $index,
                ]);
            }
        }

        // Handle deleted medias
        if ($request->filled('delete_medias')) {
            $deleteIds = explode(',', $request->delete_medias);
            $medias = Media::whereIn('id', $deleteIds)->where('konten_id', $konten->id)->get();
            foreach ($medias as $media) {
                Storage::disk('public')->delete($media->file_path);
                $media->delete();
            }
        }

        return redirect()->route('super-admin.konten.index')
            ->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy(Konten $konten)
    {
        foreach ($konten->medias as $media) {
            Storage::disk('public')->delete($media->file_path);
            $media->delete();
        }
        if ($konten->thumbnail) Storage::disk('public')->delete($konten->thumbnail);
        $konten->delete();

        return redirect()->route('super-admin.konten.index')
            ->with('success', 'Konten berhasil dihapus.');
    }
}
