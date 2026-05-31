<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengurus::with('bidang');

        if ($request->filled('tipe'))   $query->where('tipe', $request->tipe);
        if ($request->filled('search')) $query->where('nama', 'like', '%'.$request->search.'%');

        $pengurusList = $query->orderBy('urutan')->orderBy('tipe')->paginate(15)->withQueryString();

        return view('super-admin.pengurus.index', compact('pengurusList'));
    }

    public function create()
    {
        $bidangs = Bidang::where('is_active', true)->orderBy('nama')->get();
        return view('super-admin.pengurus.create', compact('bidangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:100',
            'jabatan'     => 'required|string|max:100',
            'periode'     => 'required|string|max:20',
            'tipe'        => 'required|in:ketua_umum,pengurus_inti,admin_bidang',
            'bidang_id'   => 'nullable|exists:bidangs,id',
            'quote'       => 'nullable|string|max:500',
            'asal_kampus' => 'nullable|string|max:100',
            'urutan'      => 'nullable|integer',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Pengurus::create($validated);

        return redirect()->route('super-admin.pengurus.index')
            ->with('success', 'Pengurus berhasil ditambahkan.');
    }

    public function edit(Pengurus $pengurus)
    {
        $bidangs = Bidang::where('is_active', true)->orderBy('nama')->get();
        return view('super-admin.pengurus.edit', compact('pengurus', 'bidangs'));
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:100',
            'jabatan'     => 'required|string|max:100',
            'periode'     => 'required|string|max:20',
            'tipe'        => 'required|in:ketua_umum,pengurus_inti,admin_bidang',
            'bidang_id'   => 'nullable|exists:bidangs,id',
            'quote'       => 'nullable|string|max:500',
            'asal_kampus' => 'nullable|string|max:100',
            'urutan'      => 'nullable|integer',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pengurus->foto) Storage::disk('public')->delete($pengurus->foto);
            $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $pengurus->update($validated);

        return redirect()->route('super-admin.pengurus.index')
            ->with('success', 'Pengurus berhasil diperbarui.');
    }

    public function destroy(Pengurus $pengurus)
    {
        if ($pengurus->foto) Storage::disk('public')->delete($pengurus->foto);
        $pengurus->delete();

        return redirect()->route('super-admin.pengurus.index')
            ->with('success', 'Pengurus berhasil dihapus.');
    }
}
