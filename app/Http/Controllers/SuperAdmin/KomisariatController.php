<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KomisariatController extends Controller
{
    public function index(Request $request)
    {
        $query = Komisariat::query();

        if ($request->filled('basis'))  $query->where('basis', $request->basis);
        if ($request->filled('search')) $query->where('nama', 'like', '%'.$request->search.'%');

        $komisariats = $query->orderBy('urutan')->paginate(10)->withQueryString();

        return view('super-admin.komisariat.index', compact('komisariats'));
    }

    public function create()
    {
        return view('super-admin.komisariat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:150',
            'singkatan'        => 'nullable|string|max:30',
            'kampus'           => 'required|string|max:150',
            'basis'            => 'required|in:ums,pesantren,lainnya',
            'deskripsi'        => 'nullable|string',
            'emoji'            => 'nullable|string|max:10',
            'warna_gradient'   => 'nullable|string|max:200',
            'jumlah_kader'     => 'nullable|integer|min:0',
            'jumlah_proker'    => 'nullable|integer|min:0',
            'kontak_wa'        => 'nullable|string|max:20',
            'instagram'        => 'nullable|string|max:100',
            'urutan'           => 'nullable|integer',
            'logo'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('komisariat', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Komisariat::create($validated);

        return redirect()->route('super-admin.komisariat.index')
            ->with('success', 'Komisariat berhasil ditambahkan.');
    }

    public function edit(Komisariat $komisariat)
    {
        return view('super-admin.komisariat.edit', compact('komisariat'));
    }

    public function update(Request $request, Komisariat $komisariat)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:150',
            'singkatan'        => 'nullable|string|max:30',
            'kampus'           => 'required|string|max:150',
            'basis'            => 'required|in:ums,pesantren,lainnya',
            'deskripsi'        => 'nullable|string',
            'emoji'            => 'nullable|string|max:10',
            'warna_gradient'   => 'nullable|string|max:200',
            'jumlah_kader'     => 'nullable|integer|min:0',
            'jumlah_proker'    => 'nullable|integer|min:0',
            'kontak_wa'        => 'nullable|string|max:20',
            'instagram'        => 'nullable|string|max:100',
            'urutan'           => 'nullable|integer',
            'logo'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($komisariat->logo) Storage::disk('public')->delete($komisariat->logo);
            $validated['logo'] = $request->file('logo')->store('komisariat', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $komisariat->update($validated);

        return redirect()->route('super-admin.komisariat.index')
            ->with('success', 'Komisariat berhasil diperbarui.');
    }

    public function destroy(Komisariat $komisariat)
    {
        if ($komisariat->logo) Storage::disk('public')->delete($komisariat->logo);
        $komisariat->delete();

        return redirect()->route('super-admin.komisariat.index')
            ->with('success', 'Komisariat berhasil dihapus.');
    }
}
