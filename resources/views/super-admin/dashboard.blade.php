@extends('layouts.admin')
@section('title', 'Dashboard Super Admin')
@section('page-title', 'Dashboard Super Admin')

@section('content')
{{-- Stat Cards --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red);"><i class="bi bi-diagram-3-fill"></i></div>
                <div>
                    <div class="fw-bold" style="font-size:1.8rem; color: var(--imm-red-dark); line-height:1;">{{ $stats['total_bidang'] }}</div>
                    <div class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.7rem;">Total Bidang</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow);"><i class="bi bi-people-fill"></i></div>
                <div>
                    <div class="fw-bold" style="font-size:1.8rem; color: var(--imm-red-dark); line-height:1;">{{ $stats['total_admin'] }}</div>
                    <div class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.7rem;">Total Admin</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red);"><i class="bi bi-file-earmark-text-fill"></i></div>
                <div>
                    <div class="fw-bold" style="font-size:1.8rem; color: var(--imm-red-dark); line-height:1;">{{ $stats['total_konten'] }}</div>
                    <div class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.7rem;">Total Konten</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow);"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                    <div class="fw-bold" style="font-size:1.8rem; color: var(--imm-red-dark); line-height:1;">{{ $stats['total_published'] }}</div>
                    <div class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.7rem;">Published</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Konten Terbaru --}}
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h6 class="mb-0 fw-bold" style="color: var(--imm-red-dark);"><i class="bi bi-clock-history me-2"></i>Konten Terbaru</h6>
                <a href="{{ route('super-admin.konten.index') }}" class="btn btn-sm btn-outline-imm" style="font-size: 0.75rem;">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead><tr>
                            <th>Judul</th><th>Bidang</th><th>Jenis</th><th>Status</th><th>Tanggal</th>
                        </tr></thead>
                        <tbody>
                            @forelse($kontenTerbaru as $k)
                                <tr>
                                    <td>
                                        <div class="fw-600 small line-clamp-1" style="font-weight:600;max-width:200px;">{{ $k->judul }}</div>
                                        <div class="text-muted" style="font-size:0.7rem;">{{ $k->user->name }}</div>
                                    </td>
                                    <td><span class="badge px-2" style="background:{{ $k->bidang->warna }}20;color:{{ $k->bidang->warna }};font-size:0.7rem;">{{ $k->bidang->singkatan ?? $k->bidang->nama }}</span></td>
                                    <td><span class="badge {{ $k->jenis == 'berita' ? 'bg-primary' : ($k->jenis == 'kegiatan' ? 'bg-success' : 'bg-warning text-dark') }} px-2" style="font-size:0.7rem;">{{ $k->jenis_label }}</span></td>
                                    <td>
                                        <span class="badge {{ $k->status == 'published' ? 'bg-success' : 'bg-secondary' }} px-2" style="font-size:0.7rem;">
                                            {{ $k->status == 'published' ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td class="text-muted small">{{ $k->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada konten.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Bidang Summary --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-700" style="font-weight:700;">Konten per Bidang</h6>
                <a href="{{ route('super-admin.bidang.index') }}" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;">Kelola</a>
            </div>
            <div class="card-body p-0">
                @foreach($bidangs as $b)
                    <div class="d-flex align-items-center gap-3 p-3 border-bottom">
                        <div style="width:36px;height:36px;border-radius:10px;background:{{ $b->warna }}20;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span style="font-size:0.7rem;font-weight:800;color:{{ $b->warna }};">{{ substr($b->singkatan ?? $b->nama, 0, 2) }}</span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="fw-bold small text-truncate mb-1" style="color: var(--imm-dark);">{{ $b->singkatan ?? $b->nama }}</div>
                            <div class="progress mt-1" style="height:6px; background: #f1f5f9; border-radius: 10px;">
                                <div class="progress-bar" style="width:{{ $bidangs->max('kontens_count') > 0 ? ($b->kontens_count / $bidangs->max('kontens_count') * 100) : 0 }}%; background: linear-gradient(90deg, var(--imm-red), var(--imm-red-dark)); border-radius: 10px;"></div>
                            </div>
                        </div>
                        <div class="fw-bold small flex-shrink-0" style="color: var(--imm-red);">{{ $b->kontens_count }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h6 class="fw-bold mb-4" style="color: var(--imm-dark);">AKSI CEPAT</h6>
                <div class="d-grid gap-2">
                    <a href="{{ route('super-admin.konten.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-2"></i>Tambah Konten</a>
                    <a href="{{ route('super-admin.bidang.create') }}" class="btn btn-warning btn-sm"><i class="bi bi-plus-lg me-2"></i>Tambah Bidang</a>
                    <a href="{{ route('super-admin.admin.create') }}" class="btn btn-outline-imm btn-sm"><i class="bi bi-person-plus-fill me-2"></i>Tambah Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
