<?php $__env->startSection('title', 'Konten'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header" style="min-height:220px;display:flex;align-items:center;">
    <div class="container text-white">
        <div data-aos="fade-right">
            <h1 class="fw-bold mb-2" style="font-weight:800; font-size: 2.5rem;">Konten PC IMM Sukoharjo</h1>
            <p style="opacity:0.9; font-size: 1.1rem;">Berita, kegiatan, dan program kerja dari semua bidang.</p>
        </div>
    </div>
</div>

<div class="container py-5">
    
    <div class="card mb-4">
        <div class="card-body p-3">
            <form method="GET" action="<?php echo e(route('konten')); ?>" class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label class="form-label small fw-600" style="font-weight:600;">Jenis Konten</label>
                    <select name="jenis" class="form-select form-select-sm">
                        <option value="">Semua Jenis</option>
                        <option value="berita" <?php echo e(request('jenis') == 'berita' ? 'selected' : ''); ?>>Berita</option>
                        <option value="kegiatan" <?php echo e(request('jenis') == 'kegiatan' ? 'selected' : ''); ?>>Kegiatan</option>
                        <option value="program_kerja" <?php echo e(request('jenis') == 'program_kerja' ? 'selected' : ''); ?>>Program Kerja</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-600" style="font-weight:600;">Bidang</label>
                    <select name="bidang_id" class="form-select form-select-sm">
                        <option value="">Semua Bidang</option>
                        <?php $__currentLoopData = $bidangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($b->id); ?>" <?php echo e(request('bidang_id') == $b->id ? 'selected' : ''); ?>><?php echo e($b->singkatan ?? $b->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-600" style="font-weight:600;">Cari</label>
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari judul konten..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-imm-yellow btn-sm flex-grow-1">
                        <i class="bi bi-search"></i>
                    </button>
                    <a href="<?php echo e(route('konten')); ?>" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-clockwise"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <p class="text-muted small mb-0">Menampilkan <?php echo e($kontens->firstItem()); ?>-<?php echo e($kontens->lastItem()); ?> dari <?php echo e($kontens->total()); ?> konten</p>
    </div>

    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $kontens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $konten): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <a href="<?php echo e(route('konten.detail', $konten->slug)); ?>" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="position-relative">
                            <?php if($konten->thumbnail): ?>
                                <img src="<?php echo e(asset('storage/'.$konten->thumbnail)); ?>" class="card-img-top" alt="<?php echo e($konten->judul); ?>">
                            <?php else: ?>
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="background:linear-gradient(135deg,<?php echo e($konten->bidang->warna); ?>40,<?php echo e($konten->bidang->warna); ?>20);">
                                    <i class="bi bi-<?php echo e($konten->jenis == 'berita' ? 'newspaper' : ($konten->jenis == 'kegiatan' ? 'calendar-event' : 'list-check')); ?>" style="font-size:3rem;color:<?php echo e($konten->bidang->warna); ?>;opacity:0.5;"></i>
                                </div>
                            <?php endif; ?>
                        <div class="card-badge">
                            <span class="badge <?php echo e($konten->jenis == 'berita' ? 'badge-berita' : ($konten->jenis == 'kegiatan' ? 'badge-kegiatan' : 'badge-proker')); ?> px-3 py-2 shadow-sm">
                                <?php echo e($konten->jenis_label); ?>

                            </span>
                        </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                                <span class="badge px-2 py-1" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red); font-size:0.75rem;">
                                    <?php echo e($konten->bidang->singkatan ?? $konten->bidang->nama); ?>

                                </span>
                                <small class="text-muted"><i class="bi bi-clock me-1"></i><?php echo e($konten->created_at->diffForHumans()); ?></small>
                            </div>
                            <h5 class="card-title fw-bold line-clamp-2 mb-2" style="color: var(--imm-dark); font-size:1.1rem;"><?php echo e($konten->judul); ?></h5>
                            <p class="card-text text-muted small line-clamp-3 mb-3"><?php echo e($konten->ringkasan ?: Str::limit(strip_tags($konten->isi), 120)); ?></p>
                            <?php if($konten->lokasi): ?>
                                <div class="mb-3">
                                    <small class="text-muted"><i class="bi bi-geo-alt-fill text-imm-red me-1"></i><?php echo e($konten->lokasi); ?></small>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-0 px-3 pb-3 d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="bi bi-eye me-1"></i><?php echo e($konten->views); ?> views</small>
                            <span class="small fw-bold text-imm-primary">Baca selengkapnya <i class="bi bi-arrow-right ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-search" style="font-size:4rem;color:#dee2e6;"></i>
                    <h4 class="mt-3 text-muted">Tidak ada konten ditemukan</h4>
                    <p class="text-muted">Coba ubah filter atau kata kunci pencarian.</p>
                    <a href="<?php echo e(route('konten')); ?>" class="btn btn-outline-primary btn-sm">Reset Filter</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    
    <?php if($kontens->hasPages()): ?>
        <div class="d-flex justify-content-center mt-5">
            <?php echo e($kontens->withQueryString()->links('pagination::bootstrap-5')); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/public/konten.blade.php ENDPATH**/ ?>