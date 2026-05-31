@extends('layouts.admin')
@section('title', 'Tambah Komisariat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Tambah Komisariat</h4>
        <p class="text-muted mb-0">Tambah data komisariat baru</p>
    </div>
    <a href="{{ route('super-admin.komisariat.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('super-admin.komisariat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Nama Komisariat <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="cth: PK IMM Muhammad Abduh" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Singkatan</label>
                    <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') }}" placeholder="cth: IMM M. Abduh">
                </div>
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Nama Kampus/Pesantren <span class="text-danger">*</span></label>
                    <input type="text" name="kampus" class="form-control @error('kampus') is-invalid @enderror" value="{{ old('kampus') }}" placeholder="cth: FAI UMS" required>
                    @error('kampus')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Basis <span class="text-danger">*</span></label>
                    <select name="basis" class="form-select" required>
                        <option value="ums"       {{ old('basis')=='ums'       ? 'selected':'' }}>Berbasis UMS</option>
                        <option value="pesantren" {{ old('basis')=='pesantren' ? 'selected':'' }}>Berbasis Pesantren</option>
                        <option value="lainnya"   {{ old('basis')=='lainnya'   ? 'selected':'' }}>Lainnya</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi singkat komisariat...">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Emoji Icon</label>
                    <input type="text" name="emoji" class="form-control text-center" value="{{ old('emoji', '🏛️') }}" placeholder="🏛️" style="font-size:1.4rem;">
                    <small class="text-muted">Copy-paste emoji</small>
                </div>
                <div class="col-md-10">
                    <label class="form-label fw-semibold">Warna Gradient Banner</label>
                    <input type="text" name="warna_gradient" class="form-control" value="{{ old('warna_gradient', 'linear-gradient(135deg, #1565C0, #0D47A1)') }}" placeholder="linear-gradient(135deg, #1565C0, #0D47A1)">
                    <small class="text-muted">Format CSS gradient. Gunakan <a href="https://cssgradient.io" target="_blank">cssgradient.io</a> untuk generate warna.</small>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jumlah Kader</label>
                    <input type="number" name="jumlah_kader" class="form-control" value="{{ old('jumlah_kader', 0) }}" min="0">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jumlah Proker</label>
                    <input type="number" name="jumlah_proker" class="form-control" value="{{ old('jumlah_proker', 0) }}" min="0">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">No. WhatsApp</label>
                    <input type="text" name="kontak_wa" class="form-control" value="{{ old('kontak_wa') }}" placeholder="628xxxxxxxxxx">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Instagram</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input type="text" name="instagram" class="form-control" value="{{ old('instagram') }}" placeholder="username">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Urutan Tampil</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}" min="0">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                        <label class="form-check-label fw-semibold" for="is_active">Aktif</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Logo Komisariat</label>
                    <input type="file" name="logo" class="form-control" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maks: 2MB (opsional)</small>
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('super-admin.komisariat.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
