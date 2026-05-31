<?php $__env->startSection('title', '404 — Halaman Tidak Ditemukan'); ?>
<?php $__env->startSection('hide_ticker'); ?>

<?php $__env->startSection('content'); ?>
<section style="min-height: 70vh; display: flex; align-items: center; padding: 5rem 0; background: var(--c-cream);">
    <div class="container text-center">
        <div data-aos="fade-up">
            <div style="font-family: var(--font-display); font-size: clamp(6rem, 20vw, 12rem); font-weight: 900; color: rgba(183,28,28,0.08); line-height: 1; margin-bottom: -1rem;">
                404
            </div>
            <div style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--c-red), var(--c-red-mid)); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <i class="bi bi-compass" style="font-size: 1.8rem; color: white;"></i>
            </div>
            <h1 style="font-family: var(--font-display); font-size: clamp(1.5rem, 4vw, 2.5rem); font-weight: 800; color: var(--c-text); margin-bottom: 1rem;">
                Halaman Tidak Ditemukan
            </h1>
            <p style="color: var(--c-muted); font-size: 1rem; max-width: 420px; margin: 0 auto 2.5rem; line-height: 1.7;">
                Maaf, halaman yang kamu cari tidak ada atau sudah dipindahkan. Mungkin kontennya sudah tidak tersedia.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="<?php echo e(route('home')); ?>" class="btn-primary-imm">
                    <i class="bi bi-house"></i> Kembali ke Beranda
                </a>
                <a href="<?php echo e(route('konten')); ?>" class="btn-outline-imm">
                    <i class="bi bi-newspaper"></i> Lihat Konten
                </a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/errors/404.blade.php ENDPATH**/ ?>