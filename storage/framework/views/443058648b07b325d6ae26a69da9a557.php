<?php $__env->startSection('title', 'Manajemen Admin'); ?>
<?php $__env->startSection('page-title', 'Manajemen Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-700 mb-1" style="font-weight:700;">Daftar Admin Bidang</h5>
        <p class="text-muted small mb-0">Total: <?php echo e($admins->total()); ?> admin</p>
    </div>
    <a href="<?php echo e(route('super-admin.admin.create')); ?>" class="btn btn-primary btn-sm">
        <i class="bi bi-person-plus me-1"></i>Tambah Admin
    </a>
</div>


<div class="card mb-3">
    <div class="card-body p-3">
        <form method="GET" class="row g-2 align-items-end">
            <div class="col-md-4">
                <select name="bidang_id" class="form-select form-select-sm">
                    <option value="">Semua Bidang</option>
                    <?php $__currentLoopData = $bidangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($b->id); ?>" <?php echo e(request('bidang_id') == $b->id ? 'selected' : ''); ?>><?php echo e($b->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-5">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama atau email..." value="<?php echo e(request('search')); ?>">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm flex-grow-1"><i class="bi bi-search"></i></button>
                <a href="<?php echo e(route('super-admin.admin.index')); ?>" class="btn btn-outline-secondary btn-sm"><i class="bi bi-x"></i></a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead><tr><th>Admin</th><th>Email</th><th>Bidang</th><th>Status</th><th>Bergabung</th><th>Aksi</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width:36px;height:36px;border-radius:50%;background:#e9ecef;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.8rem;color:#6c757d;">
                                        <?php echo e(strtoupper(substr($admin->name, 0, 2))); ?>

                                    </div>
                                    <span class="fw-600 small" style="font-weight:600;"><?php echo e($admin->name); ?></span>
                                </div>
                            </td>
                            <td class="text-muted small"><?php echo e($admin->email); ?></td>
                            <td>
                                <?php if($admin->bidang): ?>
                                    <span class="badge px-2" style="background:<?php echo e($admin->bidang->warna); ?>20;color:<?php echo e($admin->bidang->warna); ?>;font-size:0.7rem;"><?php echo e($admin->bidang->singkatan ?? $admin->bidang->nama); ?></span>
                                <?php else: ?>
                                    <span class="text-muted small">-</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge <?php echo e($admin->is_active ? 'bg-success' : 'bg-danger'); ?> px-2">
                                    <?php echo e($admin->is_active ? 'Aktif' : 'Nonaktif'); ?>

                                </span>
                            </td>
                            <td class="text-muted small"><?php echo e($admin->created_at->format('d M Y')); ?></td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="<?php echo e(route('super-admin.admin.edit', $admin)); ?>" class="btn btn-sm btn-outline-primary" style="padding:3px 8px;border-radius:6px;"><i class="bi bi-pencil"></i></a>
                                    <form action="<?php echo e(route('super-admin.admin.destroy', $admin)); ?>" method="POST" onsubmit="return confirm('Hapus admin <?php echo e($admin->name); ?>?')">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger" style="padding:3px 8px;border-radius:6px;"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada admin.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($admins->hasPages()): ?>
        <div class="card-footer"><?php echo e($admins->withQueryString()->links('pagination::bootstrap-5')); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/super-admin/admin/index.blade.php ENDPATH**/ ?>