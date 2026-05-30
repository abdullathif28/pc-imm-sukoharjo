<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('bidang')->where('role', 'admin_bidang');

        if ($request->filled('bidang_id')) {
            $query->where('bidang_id', $request->bidang_id);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $admins  = $query->latest()->paginate(10)->withQueryString();
        $bidangs = Bidang::orderBy('nama')->get();

        return view('super-admin.admin.index', compact('admins', 'bidangs'));
    }

    public function create()
    {
        $bidangs = Bidang::where('is_active', true)->orderBy('nama')->get();
        return view('super-admin.admin.create', compact('bidangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:8|confirmed',
            'bidang_id' => 'required|exists:bidangs,id',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('admins', 'public');
        }

        $validated['password']  = Hash::make($validated['password']);
        $validated['role']      = 'admin_bidang';
        $validated['is_active'] = $request->boolean('is_active', true);

        User::create($validated);

        return redirect()->route('super-admin.admin.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit(User $admin)
    {
        $bidangs = Bidang::where('is_active', true)->orderBy('nama')->get();
        return view('super-admin.admin.edit', compact('admin', 'bidangs'));
    }

    public function update(Request $request, User $admin)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email,' . $admin->id,
            'password'  => 'nullable|min:8|confirmed',
            'bidang_id' => 'required|exists:bidangs,id',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($admin->foto) Storage::disk('public')->delete($admin->foto);
            $validated['foto'] = $request->file('foto')->store('admins', 'public');
        }

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['is_active'] = $request->boolean('is_active');
        $admin->update($validated);

        return redirect()->route('super-admin.admin.index')
            ->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy(User $admin)
    {
        if ($admin->foto) Storage::disk('public')->delete($admin->foto);
        $admin->delete();

        return redirect()->route('super-admin.admin.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
}
