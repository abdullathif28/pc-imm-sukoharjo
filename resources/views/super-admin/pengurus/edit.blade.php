@extends('layouts.admin')
@section('title', 'Edit Pengurus')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Edit Pengurus</h4>
        <p class="text-muted mb-0">{{ $pengurus->nama }}</p>
    </div>
    <a href="{{ route('super-admin.pengurus.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('super-admin.pengurus.update', $pengurus) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $pengurus->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jabatan <span class="text-danger">*</span></label>
                    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $pengurus->jabatan) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tipe <span class="text-danger">*</span></label>
                    <select name="tipe" class="form-select" required>
                        <option value="ketua_umum"    {{ old('tipe', $pengurus->tipe)=='ketua_umum'    ? 'selected':'' }}>Ketua Umum</option>
                        <option value="pengurus_inti" {{ old('tipe', $pengurus->tipe)=='pengurus_inti' ? 'selected':'' }}>Pengurus Inti</option>
                        <option value="admin_bidang"  {{ old('tipe', $pengurus->tipe)=='admin_bidang'  ? 'selected':'' }}>Admin Bidang</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Periode <span class="text-danger">*</span></label>
                    <input type="text" name="periode" class="form-control" value="{{ old('periode', $pengurus->periode) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Bidang</label>
                    <select name="bidang_id" class="form-select">
                        <option value="">-- Tidak ada --</option>
                        @foreach($bidangs as $b)
                            <option value="{{ $b->id }}" {{ old('bidang_id', $pengurus->bidang_id)==$b->id ? 'selected':'' }}>{{ $b->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Asal Kampus</label>
                    <input type="text" name="asal_kampus" class="form-control" value="{{ old('asal_kampus', $pengurus->asal_kampus) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $pengurus->urutan) }}" min="0">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $pengurus->is_active ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="is_active">Aktif</label>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Quote / Kutipan</label>
                    <textarea name="quote" class="form-control" rows="2">{{ old('quote', $pengurus->quote) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Foto</label>
                    @if($pengurus->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$pengurus->foto) }}" width="80" height="80" class="rounded-circle object-fit-cover border">
                            <small class="d-block text-muted mt-1">Foto saat ini. Upload baru untuk mengganti.</small>
                        </div>
                    @endif
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maks: 2MB</small>
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('super-admin.pengurus.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
