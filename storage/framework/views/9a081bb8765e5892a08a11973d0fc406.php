<?php $__env->startSection('title', 'Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4" data-aos="fade-down">
    <h4 class="fw-bold mb-1" style="color: var(--imm-red-dark); letter-spacing: -0.5px;">Dashboard Admin — <?php echo e($bidang->nama); ?></h4>
    <p class="text-muted mb-0">Selamat datang kembali! Kelola publikasi bidang <strong><?php echo e($bidang->singkatan); ?></strong> di sini.</p>
</div>


<div class="row g-4 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red);">
                    <i class="bi bi-newspaper fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold" style="color: var(--imm-red-dark); line-height: 1.1;"><?php echo e($stats['total_berita']); ?></div>
                    <div class="text-muted small fw-bold">Total Berita</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow);">
                    <i class="bi bi-calendar-event fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold" style="color: var(--imm-red-dark); line-height: 1.1;"><?php echo e($stats['total_kegiatan']); ?></div>
                    <div class="text-muted small fw-bold">Total Kegiatan</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red);">
                    <i class="bi bi-kanban fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold" style="color: var(--imm-red-dark); line-height: 1.1;"><?php echo e($stats['total_proker']); ?></div>
                    <div class="text-muted small fw-bold">Program Kerja</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon shadow-sm" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow);">
                    <i class="bi bi-check-circle-fill fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold" style="color: var(--imm-red-dark); line-height: 1.1;"><?php echo e($stats['published']); ?></div>
                    <div class="text-muted small fw-bold">Published</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Konten Terbaru</span>
                <a href="<?php echo e(route('admin.konten.index')); ?>" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Judul</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $recentKonten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $konten): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-4">
                                    <a href="<?php echo e(route('admin.konten.edit', $konten)); ?>" class="text-decoration-none fw-semibold text-dark">
                                        <?php echo e(Str::limit($konten->judul, 45)); ?>

                                    </a>
                                </td>
                                <td><span class="badge bg-light text-dark border"><?php echo e($konten->jenis_label); ?></span></td>
                                <td>
                                    <?php if($konten->status === 'published'): ?>
                                        <span class="badge bg-success">Published</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td><small class="text-muted"><?php echo e($konten->created_at->format('d M Y')); ?></small></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada konten</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-transparent py-3">
                <h6 class="mb-0 fw-bold" style="color: var(--imm-dark);"><i class="bi bi-lightning-charge-fill me-2 text-warning"></i>Aksi Cepat</h6>
            </div>
            <div class="card-body d-grid gap-2">
                <a href="<?php echo e(route('admin.konten.create')); ?>" class="btn btn-primary shadow-sm mb-2">
                    <i class="bi bi-plus-square-fill me-2"></i>Buat Konten Baru
                </a>
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('admin.konten.index')); ?>?jenis=berita" class="btn btn-outline-imm btn-sm text-start">
                        <i class="bi bi-newspaper me-2"></i>Kelola Berita
                    </a>
                    <a href="<?php echo e(route('admin.konten.index')); ?>?jenis=kegiatan" class="btn btn-outline-imm btn-sm text-start">
                        <i class="bi bi-calendar-event me-2"></i>Kelola Kegiatan
                    </a>
                    <a href="<?php echo e(route('admin.konten.index')); ?>?jenis=program_kerja" class="btn btn-outline-imm btn-sm text-start">
                        <i class="bi bi-kanban me-2"></i>Kelola Program Kerja
                    </a>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent py-3">
                <h6 class="mb-0 fw-bold" style="color: var(--imm-dark);"><i class="bi bi-info-circle-fill me-2 text-imm-red"></i>Profil Bidang</h6>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <?php if($bidang->foto): ?>
                        <img src="<?php echo e(asset('storage/'.$bidang->foto)); ?>" class="rounded-3 shadow-sm" width="56" height="56" style="object-fit:cover">
                    <?php else: ?>
                        <div class="rounded-3 d-flex align-items-center justify-content-center text-white fw-bold shadow-sm"
                            style="width:56px; height:56px; background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow); font-size: 1.5rem;">
                            <?php echo e(substr($bidang->singkatan, 0, 1)); ?>

                        </div>
                    <?php endif; ?>
                    <div>
                        <div class="fw-bold" style="color: var(--imm-red-dark); font-size: 1.1rem;"><?php echo e($bidang->nama); ?></div>
                        <div class="badge bg-light text-muted fw-bold border" style="font-size: 0.7rem;"><?php echo e($bidang->singkatan); ?></div>
                    </div>
                </div>
                <?php if($bidang->deskripsi): ?>
                    <p class="text-muted small mb-0"><?php echo e(Str::limit($bidang->deskripsi, 120)); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>