@extends('layouts.admin')

@section('title', 'Konten Saya')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Konten — {{ auth()->user()->bidang->nama }}</h4>
        <p class="text-muted mb-0">Kelola berita, kegiatan, dan program kerja bidang Anda</p>
    </div>
    <a href="{{ route('admin.konten.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Konten
    </a>
</div>

{{-- Filter --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.konten.index') }}" class="row g-2">
            <div class="col-md-3">
                <select name="jenis" class="form-select form-select-sm">
                    <option value="">Semua Jenis</option>
                    <option value="berita" {{ request('jenis')=='berita' ? 'selected' : '' }}>Berita</option>
                    <option value="kegiatan" {{ request('jenis')=='kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="program_kerja" {{ request('jenis')=='program_kerja' ? 'selected' : '' }}>Program Kerja</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select form-select-sm">
                    <option value="">Semua Status</option>
                    <option value="draft" {{ request('status')=='draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ request('status')=='published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
            <div class="col-md-5">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari judul..." value="{{ request('search') }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary btn-sm w-100"><i class="bi bi-search"></i></button>
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
                        <th>Konten</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kontens as $konten)
                    <tr>
                        <td class="ps-4 text-muted">{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($konten->thumbnail)
                                    <img src="{{ asset('storage/'.$konten->thumbnail) }}" class="rounded" width="50" height="50" style="object-fit:cover">
                                @else
                                    <div class="rounded d-flex align-items-center justify-content-center text-white"
                                        style="width:50px;height:50px;background:{{ auth()->user()->bidang->warna ?? '#6c757d' }}">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                                <div class="fw-semibold">{{ Str::limit($konten->judul, 50) }}</div>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ $konten->jenis_label }}</span></td>
                        <td>
                            @if($konten->status === 'published')
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td><small class="text-muted"><i class="bi bi-eye"></i> {{ number_format($konten->views) }}</small></td>
                        <td><small class="text-muted">{{ $konten->created_at->format('d M Y') }}</small></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('konten.detail', $konten->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="Preview">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.konten.edit', $konten) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.konten.destroy', $konten) }}" method="POST" onsubmit="return confirm('Hapus konten ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox display-6 d-block mb-2"></i>
                            Belum ada konten. <a href="{{ route('admin.konten.create') }}">Tambah sekarang?</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($kontens->hasPages())
    <div class="card-footer bg-transparent">{{ $kontens->links() }}</div>
    @endif
</div>
@endsection
