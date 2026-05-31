<?php $__env->startSection('title', 'Kelola Komisariat'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Kelola Komisariat</h4>
        <p class="text-muted mb-0">Data komisariat di bawah PC IMM Sukoharjo</p>
    </div>
    <a href="<?php echo e(route('super-admin.komisariat.create')); ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Komisariat
    </a>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show"><?php echo e(session('success')); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Komisariat</th>
                        <th>Kampus</th>
                        <th>Basis</th>
                        <th>Kader</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $komisariats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4 text-muted"><?php echo e($loop->iteration); ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div style="width:44px;height:44px;border-radius:10px;background:<?php echo e($k->warna_gradient); ?>;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;">
                                    <?php echo e($k->emoji ?? '🏛️'); ?>

                                </div>
                                <div>
                                    <div class="fw-semibold"><?php echo e($k->nama); ?></div>
                                    <?php if($k->singkatan): ?><small class="text-muted"><?php echo e($k->singkatan); ?></small><?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td><small><?php echo e($k->kampus); ?></small></td>
                        <td><span class="badge bg-light text-dark border"><?php echo e($k->basis_label); ?></span></td>
                        <td><small class="text-muted"><?php echo e($k->jumlah_kader); ?>+ kader</small></td>
                        <td>
                            <?php if($k->is_active): ?>
                                <span class="badge bg-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Nonaktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="<?php echo e(route('super-admin.komisariat.edit', $k)); ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('super-admin.komisariat.destroy', $k)); ?>" method="POST" onsubmit="return confirm('Hapus komisariat ini?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-building display-6 d-block mb-2"></i>
                            Belum ada data komisariat. <a href="<?php echo e(route('super-admin.komisariat.create')); ?>">Tambah sekarang?</a>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($komisariats->hasPages()): ?>
        <div class="card-footer bg-transparent"><?php echo e($komisariats->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/super-admin/komisariat/index.blade.php ENDPATH**/ ?>