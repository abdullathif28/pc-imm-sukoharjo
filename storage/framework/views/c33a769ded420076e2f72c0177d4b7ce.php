<?php $__env->startSection('title', 'Manajemen Bidang'); ?>
<?php $__env->startSection('page-title', 'Manajemen Bidang'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-700 mb-1" style="font-weight:700;">Daftar Bidang</h5>
        <p class="text-muted small mb-0">Total: <?php echo e($bidangs->total()); ?> bidang</p>
    </div>
    <a href="<?php echo e(route('super-admin.bidang.create')); ?>" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i>Tambah Bidang
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead><tr>
                    <th>Bidang</th><th>Singkatan</th><th>Admin</th><th>Konten</th><th>Status</th><th>Aksi</th>
                </tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $bidangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div style="width:40px;height:40px;border-radius:10px;background:<?php echo e($b->warna); ?>20;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <span style="font-size:0.75rem;font-weight:800;color:<?php echo e($b->warna); ?>;"><?php echo e(substr($b->singkatan ?? $b->nama, 0, 2)); ?></span>
                                    </div>
                                    <div>
                                        <div class="fw-600 small" style="font-weight:600;"><?php echo e($b->nama); ?></div>
                                        <div class="text-muted" style="font-size:0.7rem;">Urutan: <?php echo e($b->urutan); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge px-2 py-1" style="background:<?php echo e($b->warna); ?>20;color:<?php echo e($b->warna); ?>;font-weight:700;"><?php echo e($b->singkatan); ?></span></td>
                            <td><span class="badge bg-light text-dark"><?php echo e($b->users_count); ?> admin</span></td>
                            <td><span class="badge bg-light text-dark"><?php echo e($b->kontens_count); ?> konten</span></td>
                            <td>
                                <span class="badge <?php echo e($b->is_active ? 'bg-success' : 'bg-secondary'); ?> px-2">
                                    <?php echo e($b->is_active ? 'Aktif' : 'Nonaktif'); ?>

                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="<?php echo e(route('super-admin.bidang.edit', $b)); ?>" class="btn btn-sm btn-outline-primary" style="padding:3px 8px;border-radius:6px;" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="<?php echo e(route('super-admin.bidang.destroy', $b)); ?>" method="POST" onsubmit="return confirm('Hapus bidang <?php echo e($b->nama); ?>?')">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger" style="padding:3px 8px;border-radius:6px;" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada bidang.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($bidangs->hasPages()): ?>
        <div class="card-footer"><?php echo e($bidangs->links('pagination::bootstrap-5')); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/super-admin/bidang/index.blade.php ENDPATH**/ ?>