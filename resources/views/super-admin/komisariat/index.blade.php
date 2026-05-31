{{-- ============ index.blade.php ============ --}}
@extends('layouts.admin')
@section('title', 'Kelola Komisariat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Kelola Komisariat</h4>
        <p class="text-muted mb-0">Data komisariat di bawah PC IMM Sukoharjo</p>
    </div>
    <a href="{{ route('super-admin.komisariat.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Komisariat
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Komisariat</th>
                        <th>Kampus</th>
                        <th>Basis</th>
                        <th>Kader</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($komisariats as $k)
                    <tr>
                        <td class="ps-4 text-muted">{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div style="width:44px;height:44px;border-radius:10px;background:{{ $k->warna_gradient }};display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;">
                                    {{ $k->emoji ?? '🏛️' }}
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $k->nama }}</div>
                                    @if($k->singkatan)<small class="text-muted">{{ $k->singkatan }}</small>@endif
                                </div>
                            </div>
                        </td>
                        <td><small>{{ $k->kampus }}</small></td>
                        <td><span class="badge bg-light text-dark border">{{ $k->basis_label }}</span></td>
                        <td><small class="text-muted">{{ $k->jumlah_kader }}+ kader</small></td>
                        <td>
                            @if($k->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('super-admin.komisariat.edit', $k) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('super-admin.komisariat.destroy', $k) }}" method="POST" onsubmit="return confirm('Hapus komisariat ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-building display-6 d-block mb-2"></i>
                            Belum ada data komisariat. <a href="{{ route('super-admin.komisariat.create') }}">Tambah sekarang?</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($komisariats->hasPages())
        <div class="card-footer bg-transparent">{{ $komisariats->links() }}</div>
    @endif
</div>
@endsection
