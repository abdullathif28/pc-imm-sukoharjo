<?php $__env->startSection('title', 'Edit Admin'); ?>
<?php $__env->startSection('page-title', 'Edit Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <a href="<?php echo e(route('super-admin.admin.index')); ?>" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;"><i class="bi bi-arrow-left"></i></a>
                <h6 class="mb-0 fw-700" style="font-weight:700;">Edit Admin: <?php echo e($admin->name); ?></h6>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0 small"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('super-admin.admin.update', $admin)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $admin->name)); ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $admin->email)); ?>" required>
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
                                <?php $__currentLoopData = $bidangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($b->id); ?>" <?php echo e(old('bidang_id', $admin->bidang_id) == $b->id ? 'selected' : ''); ?>><?php echo e($b->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600 small" style="font-weight:600;">Foto Profil</label>
                            <?php if($admin->foto): ?>
                                <div class="mb-2">
                                    <img src="<?php echo e(asset('storage/'.$admin->foto)); ?>" class="rounded-circle" style="width:64px;height:64px;object-fit:cover;">
                                    <p class="text-muted small mt-1">Upload baru untuk mengganti.</p>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="foto" class="form-control" accept="image/*" id="fotoInput">
                            <img id="fotoPreview" src="" class="rounded-circle mt-2" style="width:80px;height:80px;object-fit:cover;display:none;">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" <?php echo e(old('is_active', $admin->is_active) ? 'checked' : ''); ?>>
                                <label class="form-check-label small" for="is_active">Akun Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan Perubahan</button>
                        <a href="<?php echo e(route('super-admin.admin.index')); ?>" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('fotoInput')?.addEventListener('change', function() {
    const preview = document.getElementById('fotoPreview');
    if (this.files[0]) {
        preview.src = URL.createObjectURL(this.files[0]);
        preview.style.display = 'block';
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/super-admin/admin/edit.blade.php ENDPATH**/ ?>