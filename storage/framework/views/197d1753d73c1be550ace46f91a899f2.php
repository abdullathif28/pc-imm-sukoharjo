<?php $__env->startSection('title', 'Edit Pengurus'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Edit Pengurus</h4>
        <p class="text-muted mb-0"><?php echo e($pengurus->nama); ?></p>
    </div>
    <a href="<?php echo e(route('super-admin.pengurus.index')); ?>" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="<?php echo e(route('super-admin.pengurus.update', ['pengurus' => $pengurus->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nama', $pengurus->nama)); ?>" required>
                    <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jabatan <span class="text-danger">*</span></label>
                    <input type="text" name="jabatan" class="form-control" value="<?php echo e(old('jabatan', $pengurus->jabatan)); ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tipe <span class="text-danger">*</span></label>
                    <select name="tipe" class="form-select" required>
                        <option value="ketua_umum"    <?php echo e(old('tipe', $pengurus->tipe)=='ketua_umum'    ? 'selected':''); ?>>Ketua Umum</option>
                        <option value="pengurus_inti" <?php echo e(old('tipe', $pengurus->tipe)=='pengurus_inti' ? 'selected':''); ?>>Pengurus Inti</option>
                        <option value="admin_bidang"  <?php echo e(old('tipe', $pengurus->tipe)=='admin_bidang'  ? 'selected':''); ?>>Admin Bidang</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Periode <span class="text-danger">*</span></label>
                    <input type="text" name="periode" class="form-control" value="<?php echo e(old('periode', $pengurus->periode)); ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Bidang</label>
                    <select name="bidang_id" class="form-select">
                        <option value="">-- Tidak ada --</option>
                        <?php $__currentLoopData = $bidangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($b->id); ?>" <?php echo e(old('bidang_id', $pengurus->bidang_id)==$b->id ? 'selected':''); ?>><?php echo e($b->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Asal Kampus</label>
                    <input type="text" name="asal_kampus" class="form-control" value="<?php echo e(old('asal_kampus', $pengurus->asal_kampus)); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="<?php echo e(old('urutan', $pengurus->urutan)); ?>" min="0">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" <?php echo e($pengurus->is_active ? 'checked' : ''); ?>>
                        <label class="form-check-label fw-semibold" for="is_active">Aktif</label>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Quote / Kutipan</label>
                    <textarea name="quote" class="form-control" rows="2"><?php echo e(old('quote', $pengurus->quote)); ?></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Foto</label>
                    <?php if($pengurus->foto): ?>
                        <div class="mb-2">
                            <img src="<?php echo e(asset('storage/'.$pengurus->foto)); ?>" width="80" height="80" class="rounded-circle object-fit-cover border">
                            <small class="d-block text-muted mt-1">Foto saat ini. Upload baru untuk mengganti.</small>
                        </div>
                    <?php endif; ?>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Maks: 2MB</small>
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
                <a href="<?php echo e(route('super-admin.pengurus.index')); ?>" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/super-admin/pengurus/edit.blade.php ENDPATH**/ ?>