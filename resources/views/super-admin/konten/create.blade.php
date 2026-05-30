@extends('layouts.admin')

@section('title', 'Tambah Konten')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Tambah Konten</h4>
        <p class="text-muted mb-0">Buat konten baru untuk bidang manapun</p>
    </div>
    <a href="{{ route('super-admin.konten.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<form action="{{ route('super-admin.konten.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Informasi Konten</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}" placeholder="Tulis judul konten..." required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ringkasan</label>
                    <textarea name="ringkasan" class="form-control @error('ringkasan') is-invalid @enderror" rows="3"
                        placeholder="Ringkasan singkat konten (untuk preview)...">{{ old('ringkasan') }}</textarea>
                    @error('ringkasan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Konten <span class="text-danger">*</span></label>
                    <textarea name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror" rows="12"
                        placeholder="Tulis konten selengkapnya...">{{ old('isi') }}</textarea>
                    @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Thumbnail</div>
            <div class="card-body">
                <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*">
                @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="mt-3">
                    <img id="thumbnail-preview" src="" class="img-fluid rounded d-none" style="max-height:200px">
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent fw-semibold">Galeri Media (Foto / Video)</div>
            <div class="card-body">
                <input type="file" name="medias[]" class="form-control" accept="image/*,video/*" multiple>
                <small class="text-muted">Bisa pilih lebih dari satu file. Format: JPG, PNG, MP4, dll.</small>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Pengaturan</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Bidang <span class="text-danger">*</span></label>
                    <select name="bidang_id" class="form-select @error('bidang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Bidang --</option>
                        @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" {{ old('bidang_id') == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama }}</option>
                        @endforeach
                    </select>
                    @error('bidang_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Konten <span class="text-danger">*</span></label>
                    <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="berita" {{ old('jenis')=='berita' ? 'selected' : '' }}>Berita</option>
                        <option value="kegiatan" {{ old('jenis')=='kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="program_kerja" {{ old('jenis')=='program_kerja' ? 'selected' : '' }}>Program Kerja</option>
                    </select>
                    @error('jenis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" {{ old('status')=='draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status')=='published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_featured">Tampilkan di Featured</label>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4" id="kegiatan-fields" style="display:none!important">
            <div class="card-header bg-transparent fw-semibold">Detail Kegiatan</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}">
                </div>
                <div class="mb-0">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Tempat pelaksanaan..." value="{{ old('lokasi') }}">
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Konten
            </button>
            <a href="{{ route('super-admin.konten.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </div>
</div>
</form>

@push('scripts')
<script>
// Thumbnail preview
document.getElementById('thumbnail').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('thumbnail-preview');
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        }
        reader.readAsDataURL(file);
    }
});

// Show/hide kegiatan fields
document.querySelector('[name="jenis"]').addEventListener('change', function() {
    const fields = document.getElementById('kegiatan-fields');
    fields.style.display = this.value === 'kegiatan' ? 'block' : 'none';
    fields.style.setProperty('display', this.value === 'kegiatan' ? 'block' : 'none', 'important');
});
</script>
@endpush
@endsection
