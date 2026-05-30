<?php $__env->startSection('title', 'Manajemen Konten'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Manajemen Konten</h4>
        <p class="text-muted mb-0">Kelola semua konten dari seluruh bidang</p>
    </div>
    <a href="<?php echo e(route('super-admin.konten.create')); ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Konten
    </a>
</div>


<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('super-admin.konten.index')); ?>" class="row g-2">
            <div class="col-md-3">
                <select name="jenis" class="form-select form-select-sm">
                    <option value="">Semua Jenis</option>
                    <option value="berita" <?php echo e(request('jenis')=='berita' ? 'selected' : ''); ?>>Berita</option>
                    <option value="kegiatan" <?php echo e(request('jenis')=='kegiatan' ? 'selected' : ''); ?>>Kegiatan</option>
                    <option value="program_kerja" <?php echo e(request('jenis')=='program_kerja' ? 'selected' : ''); ?>>Program Kerja</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="bidang_id" class="form-select form-select-sm">
                    <option value="">Semua Bidang</option>
                    <?php $__currentLoopData = $bidangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($bidang->id); ?>" <?php echo e(request('bidang_id')==$bidang->id ? 'selected' : ''); ?>><?php echo e($bidang->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select form-select-sm">
                    <option value="">Semua Status</option>
                    <option value="draft" <?php echo e(request('status')=='draft' ? 'selected' : ''); ?>>Draft</option>
                    <option value="published" <?php echo e(request('status')=='published' ? 'selected' : ''); ?>>Published</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari judul..." value="<?php echo e(request('search')); ?>">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Konten</th>
                        <th>Bidang</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $kontens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $konten): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4 text-muted"><?php echo e($loop->iteration); ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <?php if($konten->thumbnail): ?>
                                    <img src="<?php echo e(asset('storage/'.$konten->thumbnail)); ?>" class="rounded" width="50" height="50" style="object-fit:cover">
                                <?php else: ?>
                                    <div class="rounded d-flex align-items-center justify-content-center text-white" style="width:50px;height:50px;background:<?php echo e($konten->bidang->warna ?? '#6c757d'); ?>">
                                        <i class="bi bi-image"></i>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <div class="fw-semibold"><?php echo e(Str::limit($konten->judul, 50)); ?></div>
                                    <small class="text-muted"><?php echo e($konten->user->name); ?></small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge" style="background:<?php echo e($konten->bidang->warna ?? '#6c757d'); ?>"><?php echo e($konten->bidang->singkatan); ?></span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><?php echo e($konten->jenis_label); ?></span>
                        </td>
                        <td>
                            <?php if($konten->status === 'published'): ?>
                                <span class="badge bg-success">Published</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Draft</span>
                            <?php endif; ?>
                            <?php if($konten->is_featured): ?>
                                <span class="badge bg-warning text-dark">Featured</span>
                            <?php endif; ?>
                        </td>
                        <td><small class="text-muted"><i class="bi bi-eye"></i> <?php echo e(number_format($konten->views)); ?></small></td>
                        <td><small class="text-muted"><?php echo e($konten->created_at->format('d M Y')); ?></small></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="<?php echo e(route('konten.detail', $konten->slug)); ?>" target="_blank" class="btn btn-sm btn-outline-secondary" title="Preview">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?php echo e(route('super-admin.konten.edit', $konten)); ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('super-admin.konten.destroy', $konten)); ?>" method="POST" onsubmit="return confirm('Hapus konten ini?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox display-6 d-block mb-2"></i>
                            Belum ada konten
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($kontens->hasPages()): ?>
    <div class="card-footer bg-transparent">
        <?php echo e($kontens->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/super-admin/konten/index.blade.php ENDPATH**/ ?>