@extends('layouts.admin')
@section('title', 'Tambah Bidang')
@section('page-title', 'Tambah Bidang')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <a href="{{ route('super-admin.bidang.index') }}" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;"><i class="bi bi-arrow-left"></i></a>
                <h6 class="mb-0 fw-700" style="font-weight:700;">Form Tambah Bidang</h6>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0 small">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('super-admin.bidang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-600 small" style="font-weight:600;">Nama Bidang <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="Contoh: Bidang Organisasi dan Kader">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600 small" style="font-weight:600;">Singkatan</label>
                            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') }}" placeholder="BOK">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi singkat tentang bidang ini...">{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600 small" style="font-weight:600;">Warna Tema</label>
                            <div class="d-flex gap-2 align-items-center">
                                <input type="color" name="warna" class="form-control form-control-color" value="{{ old('warna', '#1d4ed8') }}" style="width:60px;height:40px;">
                                <span class="text-muted small">Pilih warna bidang</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600 small" style="font-weight:600;">Urutan Tampil</label>
                            <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}" min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600 small" style="font-weight:600;">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label small" for="is_active">Aktif</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Foto/Logo Bidang</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" id="fotoInput">
                            <div class="mt-2">
                                <img id="fotoPreview" src="" class="rounded" style="max-height:150px;display:none;">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan Bidang</button>
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
