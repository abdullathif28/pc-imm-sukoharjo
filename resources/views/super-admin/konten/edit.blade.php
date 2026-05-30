@extends('layouts.admin')

@section('title', 'Edit Konten')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Edit Konten</h4>
        <p class="text-muted mb-0">{{ Str::limit($konten->judul, 60) }}</p>
    </div>
    <a href="{{ route('super-admin.konten.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<form action="{{ route('super-admin.konten.update', $konten) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Informasi Konten</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $konten->judul) }}" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ringkasan</label>
                    <textarea name="ringkasan" class="form-control" rows="3">{{ old('ringkasan', $konten->ringkasan) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Konten <span class="text-danger">*</span></label>
                    <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="12">{{ old('isi', $konten->isi) }}</textarea>
                    @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Thumbnail</div>
            <div class="card-body">
                @if($konten->thumbnail)
                <div class="mb-3">
                    <p class="text-muted small mb-2">Thumbnail saat ini:</p>
                    <img src="{{ asset('storage/'.$konten->thumbnail) }}" class="img-fluid rounded" style="max-height:180px">
                </div>
                @endif
                <input type="file" name="thumbnail" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti thumbnail.</small>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Galeri Media</div>
            <div class="card-body">
                @if($konten->medias->isNotEmpty())
                <div class="row g-2 mb-3">
                    @foreach($konten->medias as $media)
                    <div class="col-3">
                        <div class="position-relative">
                            @if($media->isVideo())
                                <div class="bg-dark rounded d-flex align-items-center justify-content-center" style="height:80px">
                                    <i class="bi bi-play-circle text-white fs-3"></i>
                                </div>
                            @else
                                <img src="{{ $media->url }}" class="img-fluid rounded" style="height:80px;width:100%;object-fit:cover">
                            @endif
                            <div class="form-check position-absolute top-0 start-0 m-1">
                                <input class="form-check-input" type="checkbox" name="delete_medias[]" value="{{ $media->id }}" title="Hapus media ini">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <p class="text-muted small"><i class="bi bi-info-circle"></i> Centang media untuk dihapus.</p>
                @endif
                <input type="file" name="medias[]" class="form-control" accept="image/*,video/*" multiple>
                <small class="text-muted">Tambah media baru (opsional).</small>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Pengaturan</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Bidang <span class="text-danger">*</span></label>
                    <select name="bidang_id" class="form-select" required>
                        @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" {{ old('bidang_id', $konten->bidang_id) == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Konten <span class="text-danger">*</span></label>
                    <select name="jenis" id="jenis-select" class="form-select" required>
                        <option value="berita" {{ old('jenis', $konten->jenis)=='berita' ? 'selected' : '' }}>Berita</option>
                        <option value="kegiatan" {{ old('jenis', $konten->jenis)=='kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="program_kerja" {{ old('jenis', $konten->jenis)=='program_kerja' ? 'selected' : '' }}>Program Kerja</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" {{ old('status', $konten->status)=='draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $konten->status)=='published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured"
                        {{ old('is_featured', $konten->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_featured">Tampilkan di Featured</label>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4" id="kegiatan-fields" style="{{ $konten->jenis === 'kegiatan' ? '' : 'display:none' }}">
            <div class="card-header bg-transparent fw-semibold">Detail Kegiatan</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $konten->tanggal_mulai?->format('Y-m-d')) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $konten->tanggal_selesai?->format('Y-m-d')) }}">
                </div>
                <div class="mb-0">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $konten->lokasi) }}">
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between text-muted small">
                    <span>Dibuat oleh:</span>
                    <strong>{{ $konten->user->name }}</strong>
                </div>
                <div class="d-flex justify-content-between text-muted small mt-1">
                    <span>Dibuat:</span>
                    <strong>{{ $konten->created_at->format('d M Y') }}</strong>
                </div>
                <div class="d-flex justify-content-between text-muted small mt-1">
                    <span>Views:</span>
                    <strong>{{ number_format($konten->views) }}</strong>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>
            <a href="{{ route('konten.detail', $konten->slug) }}" target="_blank" class="btn btn-outline-secondary">
                <i class="bi bi-eye me-1"></i> Preview
            </a>
        </div>
    </div>
</div>
</form>

@push('scripts')
<script>
document.getElementById('jenis-select').addEventListener('change', function() {
    document.getElementById('kegiatan-fields').style.display = this.value === 'kegiatan' ? 'block' : 'none';
});
</script>
@endpush
@endsection
