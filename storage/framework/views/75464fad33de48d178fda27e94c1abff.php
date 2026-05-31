<?php $__env->startSection('title', 'Pengaturan Website'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Pengaturan Website</h4>
        <p class="text-muted mb-0">Kelola informasi kontak, sosial media, dan visi misi organisasi</p>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show"><?php echo e(session('success')); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
<?php endif; ?>

<form action="<?php echo e(route('super-admin.settings.update')); ?>" method="POST">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-transparent border-0 pt-4 pb-0 px-4">
            <h6 class="fw-bold text-uppercase" style="letter-spacing:1px;font-size:0.8rem;color:#C62828;">
                <i class="bi bi-<?php echo e($group == 'kontak' ? 'telephone' : ($group == 'sosmed' ? 'share' : ($group == 'organisasi' ? 'building' : 'gear'))); ?> me-2"></i>
                <?php echo e(ucfirst($group)); ?>

            </h6>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo e($setting->tipe == 'textarea' ? 'col-12' : 'col-md-6'); ?>">
                    <label class="form-label fw-semibold"><?php echo e($setting->label); ?></label>
                    <?php if($setting->tipe == 'textarea'): ?>
                        <textarea name="<?php echo e($setting->key); ?>" class="form-control" rows="3"><?php echo e($setting->value); ?></textarea>
                    <?php else: ?>
                        <div class="input-group">
                            <?php if($setting->tipe == 'url'): ?>
                                <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                            <?php elseif($setting->tipe == 'phone'): ?>
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <?php elseif($setting->tipe == 'email'): ?>
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <?php endif; ?>
                            <input type="text" name="<?php echo e($setting->key); ?>" class="form-control" value="<?php echo e($setting->value); ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="d-flex gap-2 mb-4">
        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-check-lg me-1"></i> Simpan Semua Pengaturan
        </button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/super-admin/settings/index.blade.php ENDPATH**/ ?>