<?php $__env->startSection('title', 'Manajemen Bidang'); ?>
<?php $__env->startSection('page-title', 'Manajemen Bidang'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-right">
    <div>
        <h5 class="fw-bold mb-1" style="color: var(--imm-red-dark); letter-spacing: -0.5px;">Daftar Bidang Organisasi</h5>
        <p class="text-muted small mb-0">Mengelola struktur bidang kerja PC IMM Sukoharjo</p>
    </div>
    <a href="<?php echo e(route('super-admin.bidang.create')); ?>" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-circle-fill me-2"></i>Tambah Bidang
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
                                    <div class="shadow-sm" style="width:42px;height:42px;border-radius:12px;background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow); display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <span style="font-size:0.85rem;font-weight:800;">
                                            <?php
                                                $icons = ['🏛️','🔬','🕌','🤝','⚖️','📢'];
                                                echo $icons[$loop->index % count($icons)];
                                            ?>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="fw-bold small" style="color: var(--imm-dark);"><?php echo e($b->nama); ?></div>
                                        <div class="text-muted" style="font-size:0.75rem;">Urutan Tampil: <?php echo e($b->urutan); ?></div>
                                    </div>
                                </div>
                            </td>
                             <td><span class="badge px-3 py-2" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red); font-weight:800;"><?php echo e($b->singkatan); ?></span></td>
                            <td><span class="badge bg-light text-dark border px-2 py-1"><i class="bi bi-people me-1"></i><?php echo e($b->users_count); ?> Admin</span></td>
                            <td><span class="badge bg-light text-dark border px-2 py-1"><i class="bi bi-journal-text me-1"></i><?php echo e($b->kontens_count); ?> Konten</span></td>
                            <td>
                                <span class="badge <?php echo e($b->is_active ? 'bg-success' : 'bg-secondary'); ?> px-3 py-1 shadow-sm" style="font-size: 0.7rem;">
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