<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BidangController extends Controller
{
    public function index()
    {
        $bidangs = Bidang::withCount(['kontens', 'users'])->orderBy('urutan')->paginate(10);
        return view('super-admin.bidang.index', compact('bidangs'));
    }

    public function create()
    {
        return view('super-admin.bidang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'singkatan' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
            'warna'     => 'nullable|string|max:7',
            'urutan'    => 'nullable|integer',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('bidang', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Bidang::create($validated);

        return redirect()->route('super-admin.bidang.index')
            ->with('success', 'Bidang berhasil ditambahkan.');
    }

    public function edit(Bidang $bidang)
    {
        return view('super-admin.bidang.edit', compact('bidang'));
    }

    public function update(Request $request, Bidang $bidang)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'singkatan' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
            'warna'     => 'nullable|string|max:7',
            'urutan'    => 'nullable|integer',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($bidang->foto) {
                Storage::disk('public')->delete($bidang->foto);
            }
            $validated['foto'] = $request->file('foto')->store('bidang', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $bidang->update($validated);

        return redirect()->route('super-admin.bidang.index')
            ->with('success', 'Bidang berhasil diperbarui.');
    }

    public function destroy(Bidang $bidang)
    {
        if ($bidang->users()->count() > 0) {
            return back()->with('error', 'Bidang tidak dapat dihapus karena masih memiliki admin.');
        }

        if ($bidang->foto) {
            Storage::disk('public')->delete($bidang->foto);
        }

        $bidang->delete();

        return redirect()->route('super-admin.bidang.index')
            ->with('success', 'Bidang berhasil dihapus.');
    }
}
