<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title><?php echo $__env->yieldContent('title', 'Beranda'); ?> | PC IMM Sukoharjo</title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Website Resmi PC IMM Sukoharjo — Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo. Religiusitas, Intelektualitas, Humanitas.'); ?>">
    <meta name="keywords" content="IMM Sukoharjo, Ikatan Mahasiswa Muhammadiyah, UMS, Komisariat, PC IMM">
    <meta name="author" content="PC IMM Sukoharjo">

    
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', 'PC IMM Sukoharjo'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('og_description', 'Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('images/og-default.jpg')); ?>">
    <meta property="og:url" content="<?php echo e(request()->url()); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="PC IMM Sukoharjo">

    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('og_title', 'PC IMM Sukoharjo'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('og_description', 'Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('og_image', asset('images/og-default.jpg')); ?>">

    
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
    <meta name="theme-color" content="#C62828">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="PC IMM Sukoharjo">
    <link rel="apple-touch-icon" href="<?php echo e(asset('images/icon-192.png')); ?>">

    
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800;900&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <style>
        /* ============================================
           DESIGN TOKENS — IMM SUKOHARJO
           Filosofi: Editorial × Islamic Geometric
           Warna: Merah Marun + Emas + Krem Hangat
        ============================================ */
        :root {
            --c-red:        #B71C1C;
            --c-red-mid:    #C62828;
            --c-red-light:  #EF5350;
            --c-gold:       #F9A825;
            --c-gold-light: #FDD835;
            --c-cream:      #FFF8F0;
            --c-dark:       #1A0A0A;
            --c-text:       #2D1515;
            --c-muted:      #7B5B5B;
            --c-border:     rgba(183,28,28,0.12);
            --c-surface:    #FFFFFF;
            --c-surface2:   #FFF3E8;
            --c-overlay:    rgba(26,10,10,0.04);

            --font-display: 'Playfair Display', Georgia, serif;
            --font-body:    'DM Sans', sans-serif;

            --radius-sm:  6px;
            --radius-md:  12px;
            --radius-lg:  20px;
            --radius-xl:  32px;

            --shadow-sm:  0 2px 8px rgba(183,28,28,0.08);
            --shadow-md:  0 8px 32px rgba(183,28,28,0.12);
            --shadow-lg:  0 20px 60px rgba(183,28,28,0.16);

            --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Dark Mode */
        [data-theme="dark"] {
            --c-cream:      #0D0505;
            --c-dark:       #F5E6E6;
            --c-text:       #EDD5D5;
            --c-muted:      #B08080;
            --c-border:     rgba(249,168,37,0.15);
            --c-surface:    #1C0A0A;
            --c-surface2:   #2A1010;
            --c-overlay:    rgba(255,255,255,0.04);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-body);
            background: var(--c-cream);
            color: var(--c-text);
            line-height: 1.7;
            transition: background var(--transition), color var(--transition);
            overflow-x: hidden;
        }

        h1, h2, h3, .display-font { font-family: var(--font-display); }

        /* ============ LOADING SCREEN ============ */
        #loading-screen {
            position: fixed;
            inset: 0;
            background: var(--c-red);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 16px;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        #loading-screen.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .loading-logo {
            width: 64px;
            height: 64px;
            background: var(--c-gold);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-weight: 900;
            font-size: 1.6rem;
            color: var(--c-red);
            animation: logoPulse 0.8s ease-in-out infinite alternate;
        }
        .loading-text {
            color: rgba(255,255,255,0.9);
            font-size: 0.85rem;
            letter-spacing: 3px;
            font-weight: 500;
            text-transform: uppercase;
        }
        .loading-bar {
            width: 120px;
            height: 3px;
            background: rgba(255,255,255,0.2);
            border-radius: 99px;
            overflow: hidden;
        }
        .loading-bar-fill {
            height: 100%;
            background: var(--c-gold);
            border-radius: 99px;
            animation: loadFill 1.2s ease forwards;
        }
        @keyframes logoPulse  { from { transform: scale(1); } to { transform: scale(1.08); } }
        @keyframes loadFill   { from { width: 0; } to { width: 100%; } }

        /* ============ SCROLL PROGRESS ============ */
        #scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--c-gold), var(--c-red-light));
            z-index: 9998;
            width: 0%;
            transition: width 0.1s linear;
        }

        /* ============ MARQUEE (TICKER) ============ */
        .news-ticker {
            background: var(--c-gold);
            color: var(--c-red);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 0;
            overflow: hidden;
            position: relative;
        }
        .news-ticker .ticker-label {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            background: var(--c-red);
            color: var(--c-gold);
            padding: 0 16px;
            display: flex;
            align-items: center;
            font-size: 0.7rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            z-index: 2;
        }
        .ticker-wrap {
            display: flex;
            animation: ticker 30s linear infinite;
            white-space: nowrap;
            padding-left: 140px;
        }
        .ticker-wrap:hover { animation-play-state: paused; }
        .ticker-item {
            padding: 0 40px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .ticker-item::after {
            content: '✦';
            font-size: 0.6rem;
        }
        @keyframes ticker { from { transform: translateX(0); } to { transform: translateX(-50%); } }

        /* ============ NAVBAR ============ */
        .navbar-imm {
            background: var(--c-surface) !important;
            border-bottom: 1px solid var(--c-border);
            padding: 0.75rem 0;
            transition: all var(--transition);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-imm.scrolled {
            box-shadow: var(--shadow-md);
            backdrop-filter: blur(20px);
            background: rgba(255,255,255,0.92) !important;
        }
        [data-theme="dark"] .navbar-imm.scrolled {
            background: rgba(28,10,10,0.92) !important;
        }
        .navbar-brand-mark {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--c-red), var(--c-red-light));
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-weight: 900;
            font-size: 1rem;
            color: white;
            letter-spacing: -0.5px;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
        }
        .navbar-brand-mark::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.15) 50%, transparent 60%);
            animation: shimmer 3s infinite;
        }
        @keyframes shimmer { 0%,100%{transform:translateX(-100%) rotate(45deg)} 50%{transform:translateX(100%) rotate(45deg)} }
        .navbar-brand-text {
            font-family: var(--font-display);
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--c-text);
            line-height: 1.1;
        }
        .navbar-brand-sub {
            font-size: 0.65rem;
            color: var(--c-muted);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 500;
        }
        .nav-link-imm {
            color: var(--c-text) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.4rem 0.8rem !important;
            border-radius: var(--radius-sm);
            transition: all var(--transition);
            position: relative;
        }
        .nav-link-imm::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--c-gold);
            border-radius: 99px;
            transition: width var(--transition);
        }
        .nav-link-imm:hover::after,
        .nav-link-imm.active::after { width: 60%; }
        .nav-link-imm:hover { color: var(--c-red) !important; }
        .btn-nav-cta {
            background: linear-gradient(135deg, var(--c-red), var(--c-red-mid));
            color: white !important;
            border-radius: var(--radius-md) !important;
            font-weight: 600 !important;
            font-size: 0.85rem !important;
            padding: 0.45rem 1.2rem !important;
            transition: all var(--transition) !important;
            box-shadow: 0 4px 12px rgba(183,28,28,0.3);
        }
        .btn-nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(183,28,28,0.4);
        }

        /* Dark mode toggle */
        .dark-toggle {
            width: 36px;
            height: 36px;
            border: 1px solid var(--c-border);
            border-radius: var(--radius-sm);
            background: var(--c-surface2);
            color: var(--c-text);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all var(--transition);
            font-size: 0.9rem;
        }
        .dark-toggle:hover {
            background: var(--c-red);
            color: white;
            border-color: var(--c-red);
        }

        /* ============ FOOTER ============ */
        .footer-imm {
            background: var(--c-dark);
            color: rgba(255,255,255,0.75);
            padding-top: 4rem;
        }
        [data-theme="dark"] .footer-imm {
            background: #0D0505;
        }
        .footer-brand-name {
            font-family: var(--font-display);
            font-size: 1.5rem;
            color: white;
            font-weight: 700;
        }
        .footer-link {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all var(--transition);
            display: inline-block;
        }
        .footer-link:hover {
            color: var(--c-gold);
            transform: translateX(4px);
        }
        .footer-heading {
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--c-gold);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .footer-social-btn {
            width: 38px;
            height: 38px;
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: all var(--transition);
            font-size: 1rem;
        }
        .footer-social-btn:hover {
            background: var(--c-gold);
            border-color: var(--c-gold);
            color: var(--c-red);
            transform: translateY(-3px);
        }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding: 1.25rem 0;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.4);
            margin-top: 3rem;
        }

        /* ============ BACK TO TOP ============ */
        #back-to-top {
            position: fixed;
            bottom: 80px;
            right: 24px;
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--c-red), var(--c-red-mid));
            color: white;
            border: none;
            border-radius: var(--radius-md);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: var(--shadow-md);
            opacity: 0;
            visibility: hidden;
            transform: translateY(12px);
            transition: all var(--transition);
            z-index: 500;
        }
        #back-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        #back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        /* ============ FLOATING SHARE ============ */
        #float-share {
            position: fixed;
            bottom: 24px;
            right: 24px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            z-index: 500;
        }
        .share-btn-float {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            transition: all var(--transition);
            box-shadow: var(--shadow-sm);
            color: white;
            text-decoration: none;
        }
        .share-wa   { background: #25D366; }
        .share-copy { background: var(--c-red); }
        .share-btn-float:hover { transform: scale(1.1) translateY(-2px); box-shadow: var(--shadow-md); }

        /* ============ UTILS ============ */
        .section-label {
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--c-gold);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .section-label::before {
            content: '';
            width: 24px;
            height: 2px;
            background: var(--c-gold);
            border-radius: 99px;
        }
        .section-heading {
            font-family: var(--font-display);
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            font-weight: 800;
            color: var(--c-text);
            line-height: 1.15;
        }
        .btn-primary-imm {
            background: linear-gradient(135deg, var(--c-red), var(--c-red-mid));
            color: white;
            border: none;
            border-radius: var(--radius-md);
            padding: 0.7rem 1.6rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all var(--transition);
            box-shadow: 0 4px 16px rgba(183,28,28,0.3);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-primary-imm:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(183,28,28,0.4);
        }
        .btn-outline-imm {
            background: transparent;
            color: var(--c-red);
            border: 2px solid var(--c-red);
            border-radius: var(--radius-md);
            padding: 0.65rem 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-outline-imm:hover {
            background: var(--c-red);
            color: white;
            transform: translateY(-2px);
        }
        .card-imm {
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: all var(--transition);
        }
        .card-imm:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(183,28,28,0.25);
        }

        /* ============ DROPDOWN ============ */
        .dropdown-menu {
            border: 1px solid var(--c-border) !important;
            border-radius: var(--radius-md) !important;
            box-shadow: var(--shadow-md) !important;
            background: var(--c-surface) !important;
            padding: 8px !important;
        }
        .dropdown-item {
            border-radius: var(--radius-sm) !important;
            color: var(--c-text) !important;
            font-size: 0.9rem !important;
            font-weight: 500 !important;
            transition: all var(--transition) !important;
        }
        .dropdown-item:hover {
            background: var(--c-surface2) !important;
            color: var(--c-red) !important;
        }

        /* ============ GEOMETRIC DECORATIONS ============ */
        .geo-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23B71C1C' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        @media (max-width: 768px) {
            .news-ticker .ticker-label { font-size: 0.6rem; padding: 0 10px; }
            #back-to-top { bottom: 90px; right: 16px; }
            #float-share { bottom: 16px; right: 16px; }
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>


<div id="loading-screen">
    <div class="loading-logo">IMM</div>
    <div class="loading-text">PC IMM Sukoharjo</div>
    <div class="loading-bar"><div class="loading-bar-fill"></div></div>
</div>


<div id="scroll-progress"></div>


<?php if (! empty(trim($__env->yieldContent('hide_ticker')))): ?>
<?php else: ?>
<div class="news-ticker">
    <span class="ticker-label"><i class="bi bi-broadcast me-1"></i> Terkini</span>
    <div class="ticker-wrap" id="ticker-content">
        <?php
            $tickers = \App\Models\Konten::published()->latest()->take(8)->pluck('judul')->toArray();
            if(empty($tickers)) $tickers = ['Selamat datang di website resmi PC IMM Sukoharjo', 'Berjuang untuk kemajuan umat dan bangsa'];
        ?>
        <?php $__currentLoopData = $tickers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="ticker-item"><?php echo e($t); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php $__currentLoopData = $tickers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="ticker-item"><?php echo e($t); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>


<nav class="navbar navbar-expand-lg navbar-imm" id="mainNav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="<?php echo e(route('home')); ?>">
            <div class="navbar-brand-mark">IMM</div>
            <div>
                <div class="navbar-brand-text">PC IMM Sukoharjo</div>
                <div class="navbar-brand-sub">Pimpinan Cabang</div>
            </div>
        </a>

        <button class="navbar-toggler border-0 bg-transparent p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list fs-4" style="color: var(--c-text);"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link nav-link-imm <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-imm <?php echo e(request()->routeIs('tentang*') ? 'active' : ''); ?>" href="<?php echo e(route('tentang')); ?>">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-imm <?php echo e(request()->routeIs('bidang*') ? 'active' : ''); ?>" href="<?php echo e(route('bidang')); ?>">Bidang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-imm <?php echo e(request()->routeIs('komisariat*') ? 'active' : ''); ?>" href="<?php echo e(route('komisariat')); ?>">Komisariat</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-imm dropdown-toggle <?php echo e(request()->routeIs('konten*') ? 'active' : ''); ?>" href="#" data-bs-toggle="dropdown">Konten</a>
                    <ul class="dropdown-menu border-0 shadow-lg">
                        <li><a class="dropdown-item" href="<?php echo e(route('konten', ['jenis' => 'berita'])); ?>"><i class="bi bi-newspaper me-2" style="color:var(--c-red)"></i>Berita</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('konten', ['jenis' => 'kegiatan'])); ?>"><i class="bi bi-calendar-event me-2" style="color:var(--c-gold)"></i>Kegiatan</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('konten', ['jenis' => 'program_kerja'])); ?>"><i class="bi bi-list-check me-2" style="color:var(--c-red)"></i>Program Kerja</a></li>
                        <li><hr class="dropdown-divider" style="opacity:0.1;"></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('konten')); ?>"><i class="bi bi-grid me-2" style="color:var(--c-muted)"></i>Semua Konten</a></li>
                    </ul>
                </li>

                <li class="nav-item ms-lg-2 d-flex align-items-center gap-2">
                    
                    <button class="dark-toggle" id="darkToggle" title="Ganti tema">
                        <i class="bi bi-moon-stars" id="darkIcon"></i>
                    </button>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->isSuperAdmin()): ?>
                            <a class="btn-nav-cta nav-link" href="<?php echo e(route('super-admin.dashboard')); ?>">
                                <i class="bi bi-shield-fill me-1"></i>Admin Panel
                            </a>
                        <?php else: ?>
                            <a class="btn-nav-cta nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="bi bi-person-circle me-1"></i>Dashboard
                            </a>
                        <?php endif; ?>
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-outline-secondary px-3" style="border-radius: var(--radius-sm); font-size:0.85rem;">
                                <i class="bi bi-box-arrow-right"></i>
                            </button>
                        </form>
                    <?php else: ?>
                        <a class="btn-nav-cta nav-link" href="<?php echo e(route('login')); ?>">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Masuk
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>


<main>
    <?php echo $__env->yieldContent('content'); ?>
</main>


<footer class="footer-imm">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,var(--c-red),var(--c-red-mid));border-radius:12px;display:flex;align-items:center;justify-content:center;font-family:var(--font-display);font-weight:900;font-size:1.1rem;color:white;">IMM</div>
                    <div>
                        <div class="footer-brand-name">PC IMM Sukoharjo</div>
                        <div style="font-size:0.7rem;letter-spacing:1.5px;text-transform:uppercase;color:var(--c-gold);font-weight:600;">Pimpinan Cabang</div>
                    </div>
                </div>
                <p style="font-size:0.9rem;line-height:1.8;color:rgba(255,255,255,0.55);margin-bottom:1.5rem;">
                    Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo — Berjuang dalam Religiusitas, Intelektualitas, dan Humanitas.
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="footer-social-btn"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="footer-social-btn"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="footer-social-btn"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="footer-social-btn"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="footer-social-btn"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <div class="footer-heading">Navigasi</div>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a class="footer-link" href="<?php echo e(route('home')); ?>">Beranda</a></li>
                    <li><a class="footer-link" href="<?php echo e(route('tentang')); ?>">Tentang IMM</a></li>
                    <li><a class="footer-link" href="<?php echo e(route('bidang')); ?>">Bidang</a></li>
                    <li><a class="footer-link" href="<?php echo e(route('komisariat')); ?>">Komisariat</a></li>
                    <li><a class="footer-link" href="<?php echo e(route('konten')); ?>">Konten</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="footer-heading">Konten</div>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a class="footer-link" href="<?php echo e(route('konten', ['jenis' => 'berita'])); ?>">Berita</a></li>
                    <li><a class="footer-link" href="<?php echo e(route('konten', ['jenis' => 'kegiatan'])); ?>">Kegiatan</a></li>
                    <li><a class="footer-link" href="<?php echo e(route('konten', ['jenis' => 'program_kerja'])); ?>">Program Kerja</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="footer-heading">Sekretariat</div>
                <ul class="list-unstyled d-flex flex-column gap-3" style="font-size:0.85rem;color:rgba(255,255,255,0.55);">
                    <li class="d-flex gap-2 align-items-start">
                        <i class="bi bi-geo-alt" style="color:var(--c-gold);margin-top:2px;"></i>
                        <span>Universitas Muhammadiyah Surakarta, Sukoharjo, Jawa Tengah</span>
                    </li>
                    <li class="d-flex gap-2 align-items-center">
                        <i class="bi bi-envelope" style="color:var(--c-gold);"></i>
                        <span>pcimm.sukoharjo@gmail.com</span>
                    </li>
                    <li class="d-flex gap-2 align-items-center">
                        <i class="bi bi-telephone" style="color:var(--c-gold);"></i>
                        <span>+62 xxx-xxxx-xxxx</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span>© <?php echo e(date('Y')); ?> PC IMM Sukoharjo. All rights reserved.</span>
            <span style="color:rgba(255,255,255,0.3);">Religiusitas · Intelektualitas · Humanitas</span>
        </div>
    </div>
</footer>


<button id="back-to-top" title="Kembali ke atas">
    <i class="bi bi-arrow-up"></i>
</button>


<?php if (! empty(trim($__env->yieldContent('show_share')))): ?>
<div id="float-share">
    <a href="https://wa.me/?text=<?php echo e(urlencode(request()->url())); ?>" target="_blank" class="share-btn-float share-wa" title="Share WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>
    <button onclick="navigator.clipboard.writeText('<?php echo e(request()->url()); ?>');this.innerHTML='<i class=\'bi bi-check2\'></i>';setTimeout(()=>this.innerHTML='<i class=\'bi bi-link-45deg\'></i>',2000)" class="share-btn-float share-copy" title="Salin Link">
        <i class="bi bi-link-45deg"></i>
    </button>
</div>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
/* ===== LOADING SCREEN ===== */
window.addEventListener('load', () => {
    setTimeout(() => {
        document.getElementById('loading-screen').classList.add('hidden');
    }, 1200);
});

/* ===== AOS INIT ===== */
AOS.init({ duration: 700, once: true, offset: 60, easing: 'ease-out-cubic' });

/* ===== SCROLL PROGRESS ===== */
window.addEventListener('scroll', () => {
    const doc = document.documentElement;
    const scrolled = (doc.scrollTop / (doc.scrollHeight - doc.clientHeight)) * 100;
    document.getElementById('scroll-progress').style.width = scrolled + '%';

    /* Navbar scrolled state */
    document.getElementById('mainNav').classList.toggle('scrolled', window.scrollY > 60);

    /* Back to top */
    document.getElementById('back-to-top').classList.toggle('visible', window.scrollY > 400);
});

/* ===== BACK TO TOP ===== */
document.getElementById('back-to-top').addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* ===== DARK MODE ===== */
const root      = document.documentElement;
const darkBtn   = document.getElementById('darkToggle');
const darkIcon  = document.getElementById('darkIcon');
const saved     = localStorage.getItem('imm-theme') || 'light';
root.setAttribute('data-theme', saved);
darkIcon.className = saved === 'dark' ? 'bi bi-sun' : 'bi bi-moon-stars';

darkBtn.addEventListener('click', () => {
    const current = root.getAttribute('data-theme');
    const next    = current === 'dark' ? 'light' : 'dark';
    root.setAttribute('data-theme', next);
    localStorage.setItem('imm-theme', next);
    darkIcon.className = next === 'dark' ? 'bi bi-sun' : 'bi bi-moon-stars';
});

/* ===== COUNTING ANIMATION ===== */
function animateCount(el) {
    const target = parseInt(el.dataset.count);
    const duration = 1800;
    const step = Math.ceil(target / (duration / 16));
    let current = 0;
    const timer = setInterval(() => {
        current = Math.min(current + step, target);
        el.textContent = current.toLocaleString('id-ID') + (el.dataset.suffix || '');
        if (current >= target) clearInterval(timer);
    }, 16);
}

const countObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting && !e.target.dataset.counted) {
            e.target.dataset.counted = '1';
            animateCount(e.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('[data-count]').forEach(el => countObserver.observe(el));
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/layouts/public.blade.php ENDPATH**/ ?>