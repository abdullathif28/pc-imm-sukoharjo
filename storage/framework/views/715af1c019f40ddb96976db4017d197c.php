<?php $__env->startSection('title', 'Dashboard Super Admin'); ?>
<?php $__env->startSection('page-title', 'Dashboard Super Admin'); ?>

<?php $__env->startSection('content'); ?>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red);"><i class="bi bi-diagram-3-fill"></i></div>
                <div>
                    <div class="fw-bold" style="font-size:1.8rem; color: var(--imm-red-dark); line-height:1;"><?php echo e($stats['total_bidang']); ?></div>
                    <div class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.7rem;">Total Bidang</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow);"><i class="bi bi-people-fill"></i></div>
                <div>
                    <div class="fw-bold" style="font-size:1.8rem; color: var(--imm-red-dark); line-height:1;"><?php echo e($stats['total_admin']); ?></div>
                    <div class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.7rem;">Total Admin</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red);"><i class="bi bi-file-earmark-text-fill"></i></div>
                <div>
                    <div class="fw-bold" style="font-size:1.8rem; color: var(--imm-red-dark); line-height:1;"><?php echo e($stats['total_konten']); ?></div>
                    <div class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.7rem;">Total Konten</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow);"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                    <div class="fw-bold" style="font-size:1.8rem; color: var(--imm-red-dark); line-height:1;"><?php echo e($stats['total_published']); ?></div>
                    <div class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 0.7rem;">Published</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h6 class="mb-0 fw-bold" style="color: var(--imm-red-dark);"><i class="bi bi-clock-history me-2"></i>Konten Terbaru</h6>
                <a href="<?php echo e(route('super-admin.konten.index')); ?>" class="btn btn-sm btn-outline-imm" style="font-size: 0.75rem;">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead><tr>
                            <th>Judul</th><th>Bidang</th><th>Jenis</th><th>Status</th><th>Tanggal</th>
                        </tr></thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $kontenTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <div class="fw-600 small line-clamp-1" style="font-weight:600;max-width:200px;"><?php echo e($k->judul); ?></div>
                                        <div class="text-muted" style="font-size:0.7rem;"><?php echo e($k->user->name); ?></div>
                                    </td>
                                    <td><span class="badge px-2" style="background:<?php echo e($k->bidang->warna); ?>20;color:<?php echo e($k->bidang->warna); ?>;font-size:0.7rem;"><?php echo e($k->bidang->singkatan ?? $k->bidang->nama); ?></span></td>
                                    <td><span class="badge <?php echo e($k->jenis == 'berita' ? 'bg-primary' : ($k->jenis == 'kegiatan' ? 'bg-success' : 'bg-warning text-dark')); ?> px-2" style="font-size:0.7rem;"><?php echo e($k->jenis_label); ?></span></td>
                                    <td>
                                        <span class="badge <?php echo e($k->status == 'published' ? 'bg-success' : 'bg-secondary'); ?> px-2" style="font-size:0.7rem;">
                                            <?php echo e($k->status == 'published' ? 'Published' : 'Draft'); ?>

                                        </span>
                                    </td>
                                    <td class="text-muted small"><?php echo e($k->created_at->format('d M Y')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada konten.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-700" style="font-weight:700;">Konten per Bidang</h6>
                <a href="<?php echo e(route('super-admin.bidang.index')); ?>" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;">Kelola</a>
            </div>
            <div class="card-body p-0">
                <?php $__currentLoopData = $bidangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex align-items-center gap-3 p-3 border-bottom">
                        <div style="width:36px;height:36px;border-radius:10px;background:<?php echo e($b->warna); ?>20;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span style="font-size:0.7rem;font-weight:800;color:<?php echo e($b->warna); ?>;"><?php echo e(substr($b->singkatan ?? $b->nama, 0, 2)); ?></span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="fw-bold small text-truncate mb-1" style="color: var(--imm-dark);"><?php echo e($b->singkatan ?? $b->nama); ?></div>
                            <div class="progress mt-1" style="height:6px; background: #f1f5f9; border-radius: 10px;">
                                <div class="progress-bar" style="width:<?php echo e($bidangs->max('kontens_count') > 0 ? ($b->kontens_count / $bidangs->max('kontens_count') * 100) : 0); ?>%; background: linear-gradient(90deg, var(--imm-red), var(--imm-red-dark)); border-radius: 10px;"></div>
                            </div>
                        </div>
                        <div class="fw-bold small flex-shrink-0" style="color: var(--imm-red);"><?php echo e($b->kontens_count); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h6 class="fw-bold mb-4" style="color: var(--imm-dark);">AKSI CEPAT</h6>
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('super-admin.konten.create')); ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-2"></i>Tambah Konten</a>
                    <a href="<?php echo e(route('super-admin.bidang.create')); ?>" class="btn btn-warning btn-sm"><i class="bi bi-plus-lg me-2"></i>Tambah Bidang</a>
                    <a href="<?php echo e(route('super-admin.admin.create')); ?>" class="btn btn-outline-imm btn-sm"><i class="bi bi-person-plus-fill me-2"></i>Tambah Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/super-admin/dashboard.blade.php ENDPATH**/ ?>