@extends('layouts.admin')
@section('title', 'Tambah Pengurus')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Tambah Pengurus</h4>
        <p class="text-muted mb-0">Tambah data pengurus PC IMM Sukoharjo</p>
    </div>
    <a href="{{ route('super-admin.pengurus.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('super-admin.pengurus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jabatan <span class="text-danger">*</span></label>
                    <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" placeholder="cth: Ketua Umum" required>
                    @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tipe <span class="text-danger">*</span></label>
                    <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="ketua_umum"    {{ old('tipe')=='ketua_umum'    ? 'selected':'' }}>Ketua Umum</option>
                        <option value="pengurus_inti" {{ old('tipe')=='pengurus_inti' ? 'selected':'' }}>Pengurus Inti</option>
                        <option value="admin_bidang"  {{ old('tipe')=='admin_bidang'  ? 'selected':'' }}>Admin Bidang</option>
                    </select>
                    @error('tipe')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Periode <span class="text-danger">*</span></label>
                    <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode', '2026') }}" placeholder="cth: 2026" required>
                    @error('periode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Bidang</label>
                    <select name="bidang_id" class="form-select">
                        <option value="">-- Tidak ada --</option>
                        @foreach($bidangs as $b)
                            <option value="{{ $b->id }}" {{ old('bidang_id')==$b->id ? 'selected':'' }}>{{ $b->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Asal Kampus</label>
                    <input type="text" name="asal_kampus" class="form-control" value="{{ old('asal_kampus', 'UMS Sukoharjo') }}" placeholder="cth: UMS Sukoharjo">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}" min="0">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                        <label class="form-check-label fw-semibold" for="is_active">Aktif</label>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Quote / Kutipan</label>
                    <textarea name="quote" class="form-control" rows="2" placeholder="Kutipan dari pengurus ini (opsional)">{{ old('quote') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Foto</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maks: 2MB</small>
                    @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('super-admin.pengurus.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
