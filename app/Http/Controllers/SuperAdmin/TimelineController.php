<?php
// ==========================================
// app/Http/Controllers/SuperAdmin/TimelineController.php
// ==========================================
namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::orderBy('urutan')->paginate(15);
        return view('super-admin.timeline.index', compact('timelines'));
    }

    public function create()
    {
        return view('super-admin.timeline.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun'      => 'required|string|max:20',
            'judul'      => 'required|string|max:200',
            'deskripsi'  => 'nullable|string',
            'urutan'     => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        Timeline::create($validated);

        return redirect()->route('super-admin.timeline.index')
            ->with('success', 'Timeline berhasil ditambahkan.');
    }

    public function edit(Timeline $timeline)
    {
        return view('super-admin.timeline.edit', compact('timeline'));
    }

    public function update(Request $request, Timeline $timeline)
    {
        $validated = $request->validate([
            'tahun'      => 'required|string|max:20',
            'judul'      => 'required|string|max:200',
            'deskripsi'  => 'nullable|string',
            'urutan'     => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $timeline->update($validated);

        return redirect()->route('super-admin.timeline.index')
            ->with('success', 'Timeline berhasil diperbarui.');
    }

    public function destroy(Timeline $timeline)
    {
        $timeline->delete();
        return redirect()->route('super-admin.timeline.index')
            ->with('success', 'Timeline berhasil dihapus.');
    }
}
