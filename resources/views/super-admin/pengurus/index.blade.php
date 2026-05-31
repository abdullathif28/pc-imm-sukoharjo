@extends('layouts.admin')
@section('title', 'Kelola Pengurus')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Kelola Pengurus</h4>
        <p class="text-muted mb-0">Data ketua umum dan pengurus PC IMM Sukoharjo</p>
    </div>
    <a href="{{ route('super-admin.pengurus.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Pengurus
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

{{-- Filter --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" class="row g-2">
            <div class="col-md-3">
                <select name="tipe" class="form-select form-select-sm">
                    <option value="">Semua Tipe</option>
                    <option value="ketua_umum"    {{ request('tipe')=='ketua_umum'    ? 'selected':'' }}>Ketua Umum</option>
                    <option value="pengurus_inti" {{ request('tipe')=='pengurus_inti' ? 'selected':'' }}>Pengurus Inti</option>
                    <option value="admin_bidang"  {{ request('tipe')=='admin_bidang'  ? 'selected':'' }}>Admin Bidang</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm flex-grow-1"><i class="bi bi-search"></i></button>
                <a href="{{ route('super-admin.pengurus.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-x"></i></a>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Pengurus</th>
                        <th>Jabatan</th>
                        <th>Tipe</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengurusList as $p)
                    <tr>
                        <td class="ps-4 text-muted">{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($p->foto)
                                    <img src="{{ asset('storage/'.$p->foto) }}" class="rounded-circle" width="44" height="44" style="object-fit:cover;">
                                @else
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:44px;height:44px;background:#C62828;font-size:1.1rem;">
                                        {{ strtoupper(substr($p->nama, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="fw-semibold">{{ $p->nama }}</div>
                                    @if($p->asal_kampus)
                                        <small class="text-muted">{{ $p->asal_kampus }}</small>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>{{ $p->jabatan }}</td>
                        <td>
                            @php
                                $badgeClass = match($p->tipe) {
                                    'ketua_umum'    => 'bg-danger',
                                    'pengurus_inti' => 'bg-warning text-dark',
                                    default         => 'bg-secondary',
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ $p->tipe_label }}</span>
                        </td>
                        <td><small class="text-muted">{{ $p->periode }}</small></td>
                        <td>
                            @if($p->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('super-admin.pengurus.edit', $p) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('super-admin.pengurus.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus pengurus ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-people display-6 d-block mb-2"></i>
                            Belum ada data pengurus. <a href="{{ route('super-admin.pengurus.create') }}">Tambah sekarang?</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($pengurusList->hasPages())
        <div class="card-footer bg-transparent">{{ $pengurusList->links() }}</div>
    @endif
</div>
@endsection
