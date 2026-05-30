@extends('layouts.admin')
@section('title', 'Edit Admin')
@section('page-title', 'Edit Admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <a href="{{ route('super-admin.admin.index') }}" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;"><i class="bi bi-arrow-left"></i></a>
                <h6 class="mb-0 fw-700" style="font-weight:700;">Edit Admin: {{ $admin->name }}</h6>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0 small">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('super-admin.admin.update', $admin) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-600 small" style="font-weight:600;">Password Baru <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                            <input type="password" name="password" class="form-control" minlength="8" placeholder="Min. 8 karakter">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-600 small" style="font-weight:600;">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Bidang <span class="text-danger">*</span></label>
                            <select name="bidang_id" class="form-select" required>
                                <option value="">-- Pilih Bidang --</option>
                                @foreach($bidangs as $b)
                                    <option value="{{ $b->id }}" {{ old('bidang_id', $admin->bidang_id) == $b->id ? 'selected' : '' }}>{{ $b->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Foto Profil</label>
                            @if($admin->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$admin->foto) }}" class="rounded-circle" style="width:64px;height:64px;object-fit:cover;">
                                    <p class="text-muted small mt-1">Upload baru untuk mengganti.</p>
                                </div>
                            @endif
                            <input type="file" name="foto" class="form-control" accept="image/*" id="fotoInput">
                            <img id="fotoPreview" src="" class="rounded-circle mt-2" style="width:80px;height:80px;object-fit:cover;display:none;">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $admin->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label small" for="is_active">Akun Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan Perubahan</button>
                        <a href="{{ route('super-admin.admin.index') }}" class="btn btn-outline-secondary">Batal</a>
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
