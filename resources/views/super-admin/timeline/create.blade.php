@extends('layouts.admin')
@section('title', 'Tambah Timeline')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Tambah Timeline</h4>
        <p class="text-muted mb-0 small">Tambah jejak sejarah perjalanan PC IMM Sukoharjo</p>
    </div>
    <a href="{{ route('super-admin.timeline.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('super-admin.timeline.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Tahun / Label <span class="text-danger">*</span></label>
                    <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
                           value="{{ old('tahun') }}" placeholder="cth: 2024 atau Berdiri" required>
                    @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-7">
                    <label class="form-label fw-semibold">Judul Peristiwa <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul') }}" placeholder="cth: Pendirian PC IMM Sukoharjo" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}" min="0">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"
                              placeholder="Ceritakan singkat peristiwa ini...">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                        <label class="form-check-label fw-semibold" for="is_active">
                            Tampilkan di halaman Tentang
                        </label>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-check-lg me-1"></i> Simpan
                </button>
                <a href="{{ route('super-admin.timeline.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
