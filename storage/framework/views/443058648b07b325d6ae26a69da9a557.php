<?php $__env->startSection('title', 'Manajemen Admin'); ?>
<?php $__env->startSection('page-title', 'Manajemen Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-right">
    <div>
        <h5 class="fw-bold mb-1" style="color: var(--imm-red-dark); letter-spacing: -0.5px;">Daftar Akun Administrator</h5>
        <p class="text-muted small mb-0">Manajemen akses kontrol untuk admin bidang</p>
    </div>
    <a href="<?php echo e(route('super-admin.admin.create')); ?>" class="btn btn-primary shadow-sm">
        <i class="bi bi-person-plus-fill me-2"></i>Tambah Admin
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
                <button type="submit" class="btn btn-warning btn-sm flex-grow-1 shadow-sm"><i class="bi bi-search me-1"></i>Cari</button>
                <a href="<?php echo e(route('super-admin.admin.index')); ?>" class="btn btn-outline-secondary btn-sm shadow-sm"><i class="bi bi-arrow-clockwise"></i></a>
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
                                <div class="d-flex align-items-center gap-3">
                                    <div class="shadow-sm" style="width:38px; height:38px; border-radius:12px; background: rgba(198, 40, 40, 0.1); color: var(--imm-red); display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.85rem;">
                                        <?php echo e(strtoupper(substr($admin->name, 0, 1))); ?>

                                    </div>
                                    <div>
                                        <div class="fw-bold small" style="color: var(--imm-dark);"><?php echo e($admin->name); ?></div>
                                        <div class="text-muted" style="font-size:0.7rem;">ID: #<?php echo e($admin->id); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted small"><?php echo e($admin->email); ?></td>
                            <td>
                                <?php if($admin->bidang): ?>
                                    <span class="badge px-3 py-2" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-red); font-weight:700; font-size: 0.7rem; border: 1px solid rgba(251, 192, 45, 0.2);">
                                        <?php echo e($admin->bidang->singkatan); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-light text-muted border px-3 py-2" style="font-size: 0.7rem;">Root Admin</span>
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