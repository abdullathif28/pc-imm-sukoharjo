@extends('layouts.admin')
@section('title', 'Timeline Sejarah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Timeline Sejarah</h4>
        <p class="text-muted mb-0 small">Jejak perjalanan sejarah PC IMM Sukoharjo</p>
    </div>
    <a href="{{ route('super-admin.timeline.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4" style="width:50px">#</th>
                    <th style="width:120px">Tahun</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th style="width:80px">Urutan</th>
                    <th style="width:80px">Status</th>
                    <th class="text-center" style="width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($timelines as $t)
                <tr>
                    <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                    <td><span class="badge bg-danger px-3 py-2">{{ $t->tahun }}</span></td>
                    <td class="fw-semibold">{{ $t->judul }}</td>
                    <td><small class="text-muted">{{ Str::limit($t->deskripsi, 80) }}</small></td>
                    <td class="text-center"><small class="text-muted">{{ $t->urutan }}</small></td>
                    <td>
                        <span class="badge {{ $t->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $t->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('super-admin.timeline.edit', $t) }}" class="btn btn-sm btn-outline-primary px-2">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('super-admin.timeline.destroy', $t) }}" method="POST"
                                  onsubmit="return confirm('Hapus timeline ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger px-2">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="bi bi-clock-history fs-1 d-block mb-2 opacity-25"></i>
                        Belum ada data timeline.
                        <a href="{{ route('super-admin.timeline.create') }}">Tambah sekarang?</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($timelines->hasPages())
        <div class="card-footer bg-transparent border-0 pt-0">
            {{ $timelines->links() }}
        </div>
    @endif
</div>
@endsection
