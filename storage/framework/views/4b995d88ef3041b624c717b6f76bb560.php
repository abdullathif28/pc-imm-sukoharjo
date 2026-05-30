<?php $__env->startSection('title', 'Tambah Konten'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Tambah Konten</h4>
        <p class="text-muted mb-0">Bidang: <strong><?php echo e(auth()->user()->bidang->nama); ?></strong></p>
    </div>
    <a href="<?php echo e(route('admin.konten.index')); ?>" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<form action="<?php echo e(route('admin.konten.store')); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Informasi Konten</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('judul')); ?>" placeholder="Tulis judul konten..." required>
                    <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ringkasan</label>
                    <textarea name="ringkasan" class="form-control" rows="3" placeholder="Ringkasan singkat..."><?php echo e(old('ringkasan')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Konten <span class="text-danger">*</span></label>
                    <textarea name="isi" class="form-control <?php $__errorArgs = ['isi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="12"
                        placeholder="Tulis konten selengkapnya..."><?php echo e(old('isi')); ?></textarea>
                    <?php $__errorArgs = ['isi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Thumbnail</div>
            <div class="card-body">
                <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*">
                <div class="mt-3">
                    <img id="thumbnail-preview" src="" class="img-fluid rounded d-none" style="max-height:200px">
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent fw-semibold">Galeri Media</div>
            <div class="card-body">
                <input type="file" name="medias[]" class="form-control" accept="image/*,video/*" multiple>
                <small class="text-muted">Bisa pilih lebih dari satu file foto/video.</small>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent fw-semibold">Pengaturan</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Konten <span class="text-danger">*</span></label>
                    <select name="jenis" id="jenis-select" class="form-select <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="berita" <?php echo e(old('jenis')=='berita' ? 'selected' : ''); ?>>Berita</option>
                        <option value="kegiatan" <?php echo e(old('jenis')=='kegiatan' ? 'selected' : ''); ?>>Kegiatan</option>
                        <option value="program_kerja" <?php echo e(old('jenis')=='program_kerja' ? 'selected' : ''); ?>>Program Kerja</option>
                    </select>
                    <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" <?php echo e(old('status','draft')=='draft' ? 'selected' : ''); ?>>Draft</option>
                        <option value="published" <?php echo e(old('status')=='published' ? 'selected' : ''); ?>>Published</option>
                    </select>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured">
                    <label class="form-check-label fw-semibold" for="is_featured">Tampilkan di Featured</label>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4" id="kegiatan-fields" style="display:none">
            <div class="card-header bg-transparent fw-semibold">Detail Kegiatan</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="<?php echo e(old('tanggal_mulai')); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="<?php echo e(old('tanggal_selesai')); ?>">
                </div>
                <div class="mb-0">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Tempat pelaksanaan..." value="<?php echo e(old('lokasi')); ?>">
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Konten
            </button>
            <a href="<?php echo e(route('admin.konten.index')); ?>" class="btn btn-outline-secondary">Batal</a>
        </div>
    </div>
</div>
</form>

<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('thumbnail').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            const preview = document.getElementById('thumbnail-preview');
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }
});
document.getElementById('jenis-select').addEventListener('change', function() {
    document.getElementById('kegiatan-fields').style.display = this.value === 'kegiatan' ? 'block' : 'none';
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/admin/konten/create.blade.php ENDPATH**/ ?>