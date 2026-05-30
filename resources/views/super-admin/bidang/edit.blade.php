@extends('layouts.admin')
@section('title', 'Edit Bidang')
@section('page-title', 'Edit Bidang')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <a href="{{ route('super-admin.bidang.index') }}" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;"><i class="bi bi-arrow-left"></i></a>
                <h6 class="mb-0 fw-700" style="font-weight:700;">Edit Bidang: {{ $bidang->nama }}</h6>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0 small">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('super-admin.bidang.update', $bidang) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-600 small" style="font-weight:600;">Nama Bidang <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $bidang->nama) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600 small" style="font-weight:600;">Singkatan</label>
                            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan', $bidang->singkatan) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $bidang->deskripsi) }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600 small" style="font-weight:600;">Warna Tema</label>
                            <div class="d-flex gap-2 align-items-center">
                                <input type="color" name="warna" class="form-control form-control-color" value="{{ old('warna', $bidang->warna) }}" style="width:60px;height:40px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600 small" style="font-weight:600;">Urutan</label>
                            <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $bidang->urutan) }}" min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600 small" style="font-weight:600;">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $bidang->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label small" for="is_active">Aktif</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Foto/Logo Bidang</label>
                            @if($bidang->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$bidang->foto) }}" class="rounded" style="max-height:120px;">
                                    <p class="text-muted small mt-1">Foto saat ini. Upload baru untuk mengganti.</p>
                                </div>
                            @endif
                            <input type="file" name="foto" class="form-control" accept="image/*" id="fotoInput">
                            <img id="fotoPreview" src="" class="rounded mt-2" style="max-height:150px;display:none;">
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan Perubahan</button>
                        <a href="{{ route('super-admin.bidang.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('fotoInput')?.addEventListener('change', function() {
    const preview = document.getElementById('fotoPreview');
    if (this.files[0]) {
        preview.src = URL.createObjectURL(this.files[0]);
        preview.style.display = 'block';
    }
});
</script>
@endpush
