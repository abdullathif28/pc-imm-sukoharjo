<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi PC IMM Sukoharjo - Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo">
    <title><?php echo $__env->yieldContent('title', 'PC IMM Sukoharjo'); ?> | PC IMM Sukoharjo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
        :root {
            --imm-red: #C62828;      /* Merah elegan */
            --imm-red-dark: #8E0000; /* Merah gelap untuk gradien */
            --imm-yellow: #FBC02D;   /* Kuning emas untuk aksen */
            --imm-white: #FFFFFF;
            --imm-light: #F8F9FA;
            --imm-dark: #212529;
            
            /* Mapping to old variable names for compatibility if needed */
            --imm-primary: var(--imm-red);
            --imm-secondary: var(--imm-red-dark);
            --imm-accent: var(--imm-yellow);
        }
        * { font-family: 'Inter', sans-serif; }
        body { background-color: #fcfcfc; color: var(--imm-dark); }

        /* Navbar */
        .navbar-main { 
            background: var(--imm-red) !important; 
            box-shadow: 0 4px 20px rgba(142, 0, 0, 0.2); 
            padding: 0.8rem 0;
        }
        .navbar-brand-text { font-size: 1.1rem; font-weight: 800; line-height: 1.2; letter-spacing: -0.5px; }
        .navbar-brand-sub { font-size: 0.7rem; font-weight: 500; opacity: 0.9; text-transform: uppercase; letter-spacing: 1px; }
        .nav-link { color: rgba(255,255,255,0.9) !important; font-weight: 600; transition: all 0.2s; font-size: 0.95rem; }
        .nav-link:hover, .nav-link.active { color: var(--imm-yellow) !important; transform: translateY(-1px); }

        /* Hero Default (For pages other than home) */
        .page-header { 
            background: linear-gradient(135deg, var(--imm-red-dark) 0%, var(--imm-red) 100%); 
            padding: 4rem 0; 
            color: white;
            position: relative;
        }

        /* Cards */
        .card { 
            border: none; 
            border-radius: 16px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
            overflow: hidden;
        }
        .card:hover { transform: translateY(-8px); box-shadow: 0 12px 30px rgba(198, 40, 40, 0.12); }
        
        /* Section Titles */
        .section-title { font-size: 2rem; font-weight: 800; color: var(--imm-dark); }
        .section-divider { 
            width: 60px; 
            height: 4px; 
            background: var(--imm-red); 
            border-radius: 2px; 
            position: relative;
        }
        .section-divider::after {
            content: '';
            position: absolute;
            right: -12px;
            top: -1px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: var(--imm-yellow);
        }

        /* Footer */
        .footer-main { background: var(--imm-red-dark); color: rgba(255,255,255,0.85); }
        .footer-brand { color: white; font-weight: 800; font-size: 1.3rem; }
        .footer-link { color: rgba(255,255,255,0.7); text-decoration: none; transition: all 0.2s; font-size: 0.95rem; }
        .footer-link:hover { color: var(--imm-yellow); padding-left: 5px; }
        .footer-bottom { background: rgba(0,0,0,0.15); font-size: 0.85rem; border-top: 1px solid rgba(255,255,255,0.05); }

        /* Badges */
        .badge-berita { background: var(--imm-red); color: white; }
        .badge-kegiatan { background: var(--imm-yellow); color: var(--imm-red-dark); }
        /* Utilities */
        .text-imm-primary { color: var(--imm-red) !important; }
        .text-imm-accent { color: var(--imm-yellow) !important; }
        .bg-imm-primary { background-color: var(--imm-red) !important; }
        .bg-imm-light { background-color: var(--imm-light) !important; }
        .btn-imm-yellow { 
            background: var(--imm-yellow); 
            color: var(--imm-red-dark); 
            font-weight: 700; 
            border-radius: 50px; 
            border: none;
            transition: all 0.3s;
        }
        .btn-imm-yellow:hover { background: #fff; color: var(--imm-red); transform: translateY(-2px); }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .rounded-xl { border-radius: 16px !important; }
        .rounded-2xl { border-radius: 20px !important; }

        @media (max-width: 768px) {
            .hero-section { min-height: 70vh; }
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-main sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 text-white text-decoration-none" href="<?php echo e(route('home')); ?>">
            <div style="width:44px;height:44px;background:var(--imm-yellow);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:1.1rem;color:var(--imm-red-dark);flex-shrink:0;box-shadow: 0 4px 10px rgba(0,0,0,0.1);">IMM</div>
            <div>
                <div class="navbar-brand-text text-white">PC IMM Sukoharjo</div>
                <div class="navbar-brand-sub" style="color: var(--imm-yellow);">Pimpinan Cabang</div>
            </div>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list text-white fs-4"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link px-3 <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Beranda</a></li>
                <li class="nav-item"><a class="nav-link px-3 <?php echo e(request()->routeIs('bidang*') ? 'active' : ''); ?>" href="<?php echo e(route('bidang')); ?>">Bidang</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-3 dropdown-toggle <?php echo e(request()->routeIs('konten*') ? 'active' : ''); ?>" href="#" data-bs-toggle="dropdown">Konten</a>
                    <ul class="dropdown-menu border-0 shadow-lg" style="border-radius:12px;">
                        <li><a class="dropdown-item" href="<?php echo e(route('konten', ['jenis' => 'berita'])); ?>"><i class="bi bi-newspaper me-2 text-primary"></i>Berita</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('konten', ['jenis' => 'kegiatan'])); ?>"><i class="bi bi-calendar-event me-2 text-success"></i>Kegiatan</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('konten', ['jenis' => 'program_kerja'])); ?>"><i class="bi bi-list-check me-2 text-warning"></i>Program Kerja</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('konten')); ?>"><i class="bi bi-grid me-2"></i>Semua Konten</a></li>
                    </ul>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item ms-lg-2 d-flex align-items-center gap-2">
                        <?php if(auth()->user()->isSuperAdmin()): ?>
                            <a class="btn btn-imm-yellow btn-sm px-3 py-2" href="<?php echo e(route('super-admin.dashboard')); ?>">
                                <i class="bi bi-shield-fill me-1"></i>Panel Admin
                            </a>
                        <?php else: ?>
                            <a class="btn btn-imm-yellow btn-sm px-3 py-2" href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="bi bi-person-circle me-1"></i>Dashboard
                            </a>
                        <?php endif; ?>
                        
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-outline-light px-3 py-2" style="border-radius:50px; font-weight:600; border-width: 2px;">
                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                            </button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-imm-yellow btn-sm px-4 py-2" href="<?php echo e(route('login')); ?>">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


<main>
    <?php echo $__env->yieldContent('content'); ?>
</main>


<footer class="footer-main pt-5 pb-0 mt-5">
    <div class="container">
        <div class="row g-4 pb-4">
            <div class="col-lg-4">
                <div class="footer-brand mb-3">
                    <span style="background:var(--imm-yellow); color:var(--imm-red-dark); padding:4px 10px; border-radius:8px; margin-right:8px; font-weight: 900;">IMM</span>
                    PC IMM Sukoharjo
                </div>
                <p style="font-size:0.9rem;line-height:1.7;">Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo — Berjuang untuk kemajuan umat, bangsa, dan kemanusiaan.</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="btn btn-sm" style="background:rgba(255,255,255,0.1);color:white;border-radius:8px;"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-sm" style="background:rgba(255,255,255,0.1);color:white;border-radius:8px;"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-sm" style="background:rgba(255,255,255,0.1);color:white;border-radius:8px;"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="btn btn-sm" style="background:rgba(255,255,255,0.1);color:white;border-radius:8px;"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <h6 class="text-white fw-700 mb-3" style="font-weight:700;">Navigasi</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="footer-link" href="<?php echo e(route('home')); ?>">Beranda</a></li>
                    <li class="mb-2"><a class="footer-link" href="<?php echo e(route('bidang')); ?>">Bidang</a></li>
                    <li class="mb-2"><a class="footer-link" href="<?php echo e(route('konten')); ?>">Konten</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h6 class="text-white fw-700 mb-3" style="font-weight:700;">Konten</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="footer-link" href="<?php echo e(route('konten', ['jenis' => 'berita'])); ?>"><i class="bi bi-newspaper me-2"></i>Berita</a></li>
                    <li class="mb-2"><a class="footer-link" href="<?php echo e(route('konten', ['jenis' => 'kegiatan'])); ?>"><i class="bi bi-calendar-event me-2"></i>Kegiatan</a></li>
                    <li class="mb-2"><a class="footer-link" href="<?php echo e(route('konten', ['jenis' => 'program_kerja'])); ?>"><i class="bi bi-list-check me-2"></i>Program Kerja</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h6 class="text-white fw-700 mb-3" style="font-weight:700;">Kontak</h6>
                <ul class="list-unstyled" style="font-size:0.9rem;">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>Sukoharjo, Jawa Tengah</li>
                    <li class="mb-2"><i class="bi bi-envelope me-2"></i>pcimm.sukoharjo@gmail.com</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2"></i>+62 xxx-xxxx-xxxx</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center py-3">
        <p class="mb-0 text-white-50">© <?php echo e(date('Y')); ?> PC IMM Sukoharjo. All rights reserved. | <em>Berjuang untuk Kemajuan Umat</em></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 600, once: true, offset: 80 });</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/layouts/public.blade.php ENDPATH**/ ?>