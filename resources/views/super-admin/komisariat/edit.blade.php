@extends('layouts.admin')
@section('title', 'Edit Komisariat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Edit Komisariat</h4>
        <p class="text-muted mb-0">{{ $komisariat->nama }}</p>
    </div>
    <a href="{{ route('super-admin.komisariat.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('super-admin.komisariat.update', $komisariat) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Nama Komisariat <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $komisariat->nama) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Singkatan</label>
                    <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan', $komisariat->singkatan) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Nama Kampus/Pesantren <span class="text-danger">*</span></label>
                    <input type="text" name="kampus" class="form-control" value="{{ old('kampus', $komisariat->kampus) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Basis <span class="text-danger">*</span></label>
                    <select name="basis" class="form-select" required>
                        <option value="ums"       {{ old('basis', $komisariat->basis)=='ums'       ? 'selected':'' }}>Berbasis UMS</option>
                        <option value="pesantren" {{ old('basis', $komisariat->basis)=='pesantren' ? 'selected':'' }}>Berbasis Pesantren</option>
                        <option value="lainnya"   {{ old('basis', $komisariat->basis)=='lainnya'   ? 'selected':'' }}>Lainnya</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $komisariat->deskripsi) }}</textarea>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Emoji Icon</label>
                    <input type="text" name="emoji" class="form-control text-center" value="{{ old('emoji', $komisariat->emoji) }}" style="font-size:1.4rem;">
                </div>
                <div class="col-md-10">
                    <label class="form-label fw-semibold">Warna Gradient Banner</label>
                    <input type="text" name="warna_gradient" class="form-control" value="{{ old('warna_gradient', $komisariat->warna_gradient) }}">
                    <small class="text-muted">Gunakan <a href="https://cssgradient.io" target="_blank">cssgradient.io</a> untuk generate warna.</small>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jumlah Kader</label>
                    <input type="number" name="jumlah_kader" class="form-control" value="{{ old('jumlah_kader', $komisariat->jumlah_kader) }}" min="0">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jumlah Proker</label>
                    <input type="number" name="jumlah_proker" class="form-control" value="{{ old('jumlah_proker', $komisariat->jumlah_proker) }}" min="0">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">No. WhatsApp</label>
                    <input type="text" name="kontak_wa" class="form-control" value="{{ old('kontak_wa', $komisariat->kontak_wa) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Instagram</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $komisariat->instagram) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Urutan Tampil</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $komisariat->urutan) }}" min="0">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $komisariat->is_active ? 'checked':'' }}>
                        <label class="form-check-label fw-semibold" for="is_active">Aktif</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Logo Komisariat</label>
                    @if($komisariat->logo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$komisariat->logo) }}" width="60" height="60" class="rounded border object-fit-cover">
                            <small class="d-block text-muted mt-1">Upload baru untuk mengganti.</small>
                        </div>
                    @endif
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('super-admin.komisariat.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
