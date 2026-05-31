<?php $__env->startSection('title', 'Tentang IMM Sukoharjo'); ?>
<?php $__env->startSection('og_title', 'Tentang PC IMM Sukoharjo — Religiusitas, Intelektualitas, Humanitas'); ?>
<?php $__env->startSection('og_description', 'Mengenal lebih dekat Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo — sejarah, visi misi, dan struktur kepemimpinan.'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ============================================
   TENTANG IMM — About + Leadership Page
   Aesthetic: Majalah editorial × Islamic heritage
   Feature: Timeline, Visi-Misi, Struktur, CTA
============================================ */

/* ===== PAGE HEADER ===== */
.tentang-header {
    min-height: 60vh;
    background: linear-gradient(150deg, var(--c-red) 0%, #5D0000 60%, #1A0000 100%);
    display: flex;
    align-items: center;
    padding: 6rem 0 4rem;
    position: relative;
    overflow: hidden;
}
.tentang-header::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill='%23ffffff' fill-opacity='0.025'%3E%3Cpolygon points='50,0 100,50 50,100 0,50'/%3E%3C/g%3E%3C/svg%3E");
}
.tentang-header::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 80px;
    background: var(--c-cream);
    clip-path: ellipse(55% 100% at 50% 100%);
}
[data-theme="dark"] .tentang-header::after { background: var(--c-cream); }

.tentang-header-content { position: relative; z-index: 2; }
.tentang-tagline {
    font-size: 0.72rem;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: var(--c-gold);
    font-weight: 700;
    margin-bottom: 1rem;
}
.tentang-title {
    font-family: var(--font-display);
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 900;
    color: white;
    line-height: 1.05;
    margin-bottom: 1.5rem;
}
.tentang-title .highlight {
    color: var(--c-gold);
    display: block;
}
.tentang-subtitle {
    color: rgba(255,255,255,0.65);
    font-size: 1rem;
    line-height: 1.7;
    max-width: 520px;
}

/* Tri Kompetensi badges */
.tri-badges {
    display: flex;
    gap: 0.75rem;
    margin-top: 2rem;
    flex-wrap: wrap;
}
.tri-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(249,168,37,0.3);
    border-radius: 99px;
    padding: 8px 16px;
    color: white;
    font-size: 0.82rem;
    font-weight: 600;
}
.tri-badge .tri-icon {
    width: 28px;
    height: 28px;
    background: rgba(249,168,37,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
}

/* ===== ABOUT SECTION ===== */
.about-section { padding: 5rem 0; }
.about-quote {
    border-left: 4px solid var(--c-gold);
    padding: 1.25rem 1.5rem;
    background: rgba(249,168,37,0.05);
    border-radius: 0 12px 12px 0;
    margin: 2rem 0;
}
.about-quote p {
    font-family: var(--font-display);
    font-size: 1.15rem;
    font-style: italic;
    color: var(--c-text);
    line-height: 1.6;
    margin: 0;
}
.about-quote cite {
    font-size: 0.8rem;
    color: var(--c-muted);
    font-style: normal;
    font-weight: 600;
    margin-top: 0.5rem;
    display: block;
}

/* ===== VISI MISI ===== */
.visimisi-section { padding: 5rem 0; background: var(--c-surface2); }
.visi-card {
    background: linear-gradient(135deg, var(--c-red), #7B0000);
    border-radius: 24px;
    padding: 2.5rem;
    color: white;
    position: relative;
    overflow: hidden;
    height: 100%;
}
.visi-card::before {
    content: '"';
    position: absolute;
    top: -20px;
    right: 20px;
    font-family: var(--font-display);
    font-size: 12rem;
    font-weight: 900;
    color: rgba(255,255,255,0.05);
    line-height: 1;
    pointer-events: none;
}
.visi-label {
    font-size: 0.7rem;
    letter-spacing: 3px;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--c-gold);
    margin-bottom: 1rem;
}
.visi-text {
    font-family: var(--font-display);
    font-size: 1.2rem;
    font-weight: 700;
    line-height: 1.5;
    color: white;
}

.misi-card {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 24px;
    padding: 2.5rem;
    height: 100%;
}
.misi-label {
    font-size: 0.7rem;
    letter-spacing: 3px;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--c-red);
    margin-bottom: 1.5rem;
}
.misi-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.misi-list li {
    display: flex;
    gap: 12px;
    font-size: 0.9rem;
    line-height: 1.6;
    color: var(--c-text);
}
.misi-list li::before {
    content: '';
    width: 8px;
    height: 8px;
    min-width: 8px;
    background: linear-gradient(135deg, var(--c-red), var(--c-gold));
    border-radius: 50%;
    margin-top: 7px;
}

/* ===== TIMELINE SEJARAH ===== */
.timeline-section { padding: 5rem 0; }
.timeline {
    position: relative;
    padding-left: 2rem;
}
.timeline::before {
    content: '';
    position: absolute;
    left: 0;
    top: 8px;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, var(--c-red), var(--c-gold), transparent);
}
.timeline-item {
    position: relative;
    padding: 0 0 2.5rem 2rem;
}
.timeline-item::before {
    content: '';
    position: absolute;
    left: -2rem;
    top: 6px;
    width: 12px;
    height: 12px;
    background: var(--c-red);
    border: 3px solid var(--c-gold);
    border-radius: 50%;
    transform: translateX(-5px);
    transition: transform 0.3s ease;
}
.timeline-item:hover::before { transform: translateX(-5px) scale(1.3); }
.timeline-year {
    font-size: 0.7rem;
    letter-spacing: 2px;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--c-gold);
    margin-bottom: 0.3rem;
}
.timeline-event {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--c-text);
    margin-bottom: 0.4rem;
}
.timeline-desc { font-size: 0.88rem; color: var(--c-muted); line-height: 1.6; }

/* ===== KEPEMIMPINAN ===== */
.pimpinan-section { padding: 5rem 0; background: var(--c-surface2); }

/* Ketua Utama */
.ketua-card {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 28px;
    overflow: hidden;
    display: flex;
    gap: 0;
    align-items: stretch;
}
.ketua-img-wrap {
    width: 280px;
    min-width: 280px;
    background: linear-gradient(150deg, var(--c-red), #5D0000);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: flex-end;
    justify-content: center;
}
.ketua-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top;
}
.ketua-img-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 5rem;
    opacity: 0.3;
}
.ketua-body {
    padding: 2.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.ketua-jabatan {
    font-size: 0.7rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    font-weight: 700;
    color: var(--c-red);
    margin-bottom: 0.5rem;
}
.ketua-nama {
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 900;
    color: var(--c-text);
    line-height: 1.2;
    margin-bottom: 0.5rem;
}
.ketua-periode {
    font-size: 0.82rem;
    color: var(--c-muted);
    font-weight: 600;
    margin-bottom: 1.25rem;
    display: flex;
    align-items: center;
    gap: 6px;
}
.ketua-quote {
    background: rgba(183,28,28,0.05);
    border-left: 3px solid var(--c-red);
    padding: 1rem 1.25rem;
    border-radius: 0 10px 10px 0;
    font-style: italic;
    font-size: 0.9rem;
    color: var(--c-muted);
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

/* Grid pengurus */
.pengurus-card {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 16px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
}
.pengurus-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: rgba(183,28,28,0.2);
}
.pengurus-avatar {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    object-fit: cover;
    object-position: top;
    margin: 0 auto 1rem;
    border: 3px solid var(--c-border);
    display: block;
}
.pengurus-avatar-placeholder {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--c-red), #7B0000);
    margin: 0 auto 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-display);
    font-weight: 900;
    font-size: 1.4rem;
    color: white;
    border: 3px solid rgba(183,28,28,0.2);
}
.pengurus-nama {
    font-family: var(--font-display);
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--c-text);
    margin-bottom: 0.25rem;
    line-height: 1.3;
}
.pengurus-jabatan {
    font-size: 0.75rem;
    color: var(--c-red);
    font-weight: 600;
    letter-spacing: 0.3px;
}
.pengurus-bidang {
    font-size: 0.72rem;
    color: var(--c-muted);
    margin-top: 0.2rem;
}

/* Section tab navigasi bidang */
.bidang-tabs-wrap {
    display: flex;
    gap: 0.5rem;
    overflow-x: auto;
    padding-bottom: 0.5rem;
    margin-bottom: 2rem;
    scrollbar-width: none;
}
.bidang-tabs-wrap::-webkit-scrollbar { display: none; }
.bidang-tab {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 99px;
    padding: 0.4rem 1rem;
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--c-muted);
    cursor: pointer;
    white-space: nowrap;
    transition: all 0.2s ease;
}
.bidang-tab.active, .bidang-tab:hover {
    background: var(--c-red);
    border-color: var(--c-red);
    color: white;
}

@media (max-width: 768px) {
    .ketua-card { flex-direction: column; }
    .ketua-img-wrap { width: 100%; min-width: unset; height: 260px; }
    .tentang-header { min-height: auto; padding: 5rem 0 3rem; }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="tentang-header">
    <div class="container tentang-header-content">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="tentang-tagline">Mengenal Lebih Dekat</div>
                <h1 class="tentang-title">
                    Ikatan Mahasiswa<br>
                    <span class="highlight">Muhammadiyah</span>
                    Sukoharjo
                </h1>
                <p class="tentang-subtitle">
                    Wadah perjuangan mahasiswa Muslim yang berkomitmen pada pengembangan intelektual, penguatan spiritual, dan kepedulian sosial untuk kemajuan umat dan bangsa.
                </p>
                <div class="tri-badges">
                    <div class="tri-badge"><span class="tri-icon">🕌</span> Religiusitas</div>
                    <div class="tri-badge"><span class="tri-icon">📚</span> Intelektualitas</div>
                    <div class="tri-badge"><span class="tri-icon">🤝</span> Humanitas</div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="section-label mb-2">Siapa Kami</div>
                <h2 class="section-heading mb-4">Tentang PC IMM Sukoharjo</h2>
                <p style="color:var(--c-muted);font-size:0.95rem;line-height:1.8;margin-bottom:1rem;">
                    Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah (PC IMM) Sukoharjo adalah organisasi mahasiswa Islam yang berada di bawah naungan Muhammadiyah, berpusat di wilayah Sukoharjo dengan basis kader terbesar di Universitas Muhammadiyah Surakarta (UMS).
                </p>
                <p style="color:var(--c-muted);font-size:0.95rem;line-height:1.8;margin-bottom:1rem;">
                    Sebagai gerakan mahasiswa, IMM Sukoharjo hadir untuk membentuk kader yang memiliki kompetensi ganda: kedalaman iman dan ketajaman intelektual, yang siap berkontribusi nyata bagi persyarikatan, umat, dan bangsa.
                </p>
                <div class="about-quote">
                    <p>"Membentuk kader yang beriman, berilmu, dan beramal saleh — itulah ruh dari setiap gerak IMM."</p>
                    <cite>— Semangat Tri Kompetensi Dasar IMM</cite>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                
                <div class="row g-3">
                    <?php
                        $stats = [
                            ['icon' => 'bi-diagram-3', 'val' => \App\Models\Bidang::where('is_active',true)->count(), 'label' => 'Bidang Aktif', 'suffix' => ''],
                            ['icon' => 'bi-building', 'val' => 6, 'label' => 'Komisariat', 'suffix' => '+'],
                            ['icon' => 'bi-people', 'val' => 48, 'label' => 'Pengurus Aktif', 'suffix' => ''],
                            ['icon' => 'bi-newspaper', 'val' => \App\Models\Konten::published()->count(), 'label' => 'Konten Tersedia', 'suffix' => ''],
                        ];
                    ?>
                    <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6">
                        <div style="background:var(--c-surface);border:1px solid var(--c-border);border-radius:16px;padding:1.5rem;text-align:center;transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(183,28,28,0.25)';this.style.transform='translateY(-4px)'" onmouseout="this.style.borderColor='';this.style.transform=''">
                            <i class="bi <?php echo e($s['icon']); ?>" style="font-size:1.5rem;color:var(--c-red);margin-bottom:0.5rem;display:block;"></i>
                            <div style="font-family:var(--font-display);font-size:2rem;font-weight:900;color:var(--c-text);line-height:1;" data-count="<?php echo e($s['val']); ?>" data-suffix="<?php echo e($s['suffix']); ?>">0</div>
                            <div style="font-size:0.78rem;color:var(--c-muted);font-weight:600;margin-top:0.25rem;"><?php echo e($s['label']); ?></div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="visimisi-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-label mb-2 justify-content-center">Arah Gerak</div>
            <h2 class="section-heading">Visi &amp; Misi</h2>
        </div>
        <div class="row g-4" data-aos="fade-up">
            <div class="col-lg-5">
                <div class="visi-card">
                    <div class="visi-label">Visi</div>
                    <div class="visi-text">
                        Terwujudnya kader IMM Sukoharjo yang religius, intelektual, dan humanis — sebagai kekuatan perubahan menuju masyarakat Islam yang berkemajuan dan berkeadaban.
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="misi-card">
                    <div class="misi-label">Misi</div>
                    <ul class="misi-list">
                        <li>Memperkuat nilai-nilai Islam berkemajuan di kalangan mahasiswa Muhammadiyah Sukoharjo.</li>
                        <li>Mengembangkan tradisi intelektual dan budaya kritis melalui kajian, riset, dan literasi.</li>
                        <li>Menumbuhkan kepedulian sosial dan semangat pengabdian nyata kepada masyarakat.</li>
                        <li>Mencetak kader pemimpin yang berkarakter, kompeten, dan berintegritas tinggi.</li>
                        <li>Membangun sinergi antar komisariat dan bidang untuk gerakan kolektif yang kuat.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="timeline-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4" data-aos="fade-right">
                <div class="section-label mb-2">Jejak Perjuangan</div>
                <h2 class="section-heading mb-3">Sejarah<br>IMM Sukoharjo</h2>
                <p style="color:var(--c-muted);font-size:0.9rem;line-height:1.7;">
                    Perjalanan panjang PC IMM Sukoharjo dalam membentuk kader dan berkontribusi untuk umat dan bangsa.
                </p>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <div class="timeline">
                    
                    <div class="timeline-item">
                        <div class="timeline-year">Berdiri</div>
                        <div class="timeline-event">Pendirian PC IMM Sukoharjo</div>
                        <div class="timeline-desc">PC IMM Sukoharjo resmi berdiri sebagai wadah gerakan mahasiswa Muslim di wilayah Sukoharjo, berbasis di lingkungan kampus Muhammadiyah.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">Pengembangan</div>
                        <div class="timeline-event">Tradisi Baret Merah (BM)</div>
                        <div class="timeline-desc">PC IMM Sukoharjo mengembangkan tradisi kajian Baret Merah — kelompok diskusi keilmuan yang menjadi ciri khas intelektual kader IMM Sukoharjo.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">Konsolidasi</div>
                        <div class="timeline-event">Pembentukan 6 Komisariat</div>
                        <div class="timeline-desc">Jaringan komisariat berkembang mencakup berbagai basis kampus dan pesantren di wilayah Sukoharjo untuk memperluas jangkauan kaderisasi.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2026</div>
                        <div class="timeline-event">Pelantikan Periode Baru</div>
                        <div class="timeline-desc">PC IMM Sukoharjo periode 2026 dilantik di Auditorium Moh. Djazman UMS dengan tema "Merajut Gerakan Kolektif, Menggema dalam Kolaboratif" — 48 pengurus aktif siap bergerak.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pimpinan-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-label mb-2 justify-content-center">Kepengurusan</div>
            <h2 class="section-heading">Struktur Pimpinan</h2>
            <p style="color:var(--c-muted);max-width:480px;margin:0.75rem auto 0;font-size:0.9rem;">
                Periode 2026 — Merajut Gerakan Kolektif, Menggema dalam Kolaboratif
            </p>
        </div>

        
        <div class="ketua-card mb-5" data-aos="fade-up">
            <div class="ketua-img-wrap">
                
                <div class="ketua-img-placeholder">👤</div>
            </div>
            <div class="ketua-body">
                <div class="ketua-jabatan">Ketua Umum</div>
                <div class="ketua-nama">Azhar Ardiansyah Al-Aziz</div>
                <div class="ketua-periode">
                    <i class="bi bi-calendar2-check" style="color:var(--c-red);"></i>
                    Periode 2026
                </div>
                <div class="ketua-quote">
                    "Tradisi membaca, menulis, dan berdiskusi harus terus dihidupkan di tubuh IMM. Kita harus merajut gerakan kolektif yang kuat dan bermakna."
                </div>
                <div class="d-flex gap-3 flex-wrap" style="font-size:0.82rem;color:var(--c-muted);">
                    <span><i class="bi bi-building me-1" style="color:var(--c-red);"></i>UMS Sukoharjo</span>
                    <span><i class="bi bi-people me-1" style="color:var(--c-red);"></i>48 Pengurus</span>
                </div>
            </div>
        </div>

        
        <?php
            $bidangs = \App\Models\Bidang::where('is_active', true)->orderBy('urutan')->get();
        ?>

        
        <div class="bidang-tabs-wrap" id="bidangTabs" data-aos="fade-up">
            <button class="bidang-tab active" data-target="all">Semua</button>
            <?php $__currentLoopData = $bidangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button class="bidang-tab" data-target="bidang-<?php echo e($b->id); ?>"><?php echo e($b->singkatan); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <?php
            $admins = \App\Models\User::with('bidang')
                ->where('role', 'admin_bidang')
                ->where('is_active', true)
                ->get();
        ?>
        <div class="row g-3" id="pengurusGrid" data-aos="fade-up">
            <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-6 col-md-4 col-lg-3 pengurus-item" data-bidang="bidang-<?php echo e($admin->bidang_id); ?>">
                <div class="pengurus-card">
                    <?php if($admin->foto): ?>
                        <img src="<?php echo e(asset('storage/'.$admin->foto)); ?>" class="pengurus-avatar" alt="<?php echo e($admin->name); ?>">
                    <?php else: ?>
                        <div class="pengurus-avatar-placeholder"><?php echo e(strtoupper(substr($admin->name, 0, 1))); ?></div>
                    <?php endif; ?>
                    <div class="pengurus-nama"><?php echo e($admin->name); ?></div>
                    <div class="pengurus-jabatan">Admin Bidang</div>
                    <?php if($admin->bidang): ?>
                    <div class="pengurus-bidang"><?php echo e($admin->bidang->singkatan); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="empty-state">
                    <i class="bi bi-people"></i>
                    Data pengurus belum tersedia.
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section style="background: linear-gradient(135deg, var(--c-dark) 0%, #3D0000 100%);padding:4rem 0;">
    <div class="container text-center" data-aos="fade-up">
        <h3 style="font-family:var(--font-display);color:white;font-size:clamp(1.5rem,4vw,2.5rem);font-weight:800;margin-bottom:1rem;">
            Bergabunglah Bersama Kami
        </h3>
        <p style="color:rgba(255,255,255,0.6);max-width:460px;margin:0 auto 2rem;font-size:0.95rem;line-height:1.7;">
            Jadilah bagian dari gerakan mahasiswa yang bermakna bersama PC IMM Sukoharjo.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="<?php echo e(route('komisariat')); ?>" class="btn-primary-imm" style="background:linear-gradient(135deg,var(--c-gold),#E65100);color:#1A0A0A;">
                <i class="bi bi-building"></i> Lihat Komisariat
            </a>
            <a href="<?php echo e(route('konten')); ?>" class="btn-outline-imm" style="border-color:rgba(255,255,255,0.3);color:white;">
                <i class="bi bi-newspaper"></i> Baca Konten Kami
            </a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
/* Tab filter pengurus */
document.querySelectorAll('.bidang-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.bidang-tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        const target = this.dataset.target;
        document.querySelectorAll('.pengurus-item').forEach(item => {
            if (target === 'all' || item.dataset.bidang === target) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/public/tentang.blade.php ENDPATH**/ ?>