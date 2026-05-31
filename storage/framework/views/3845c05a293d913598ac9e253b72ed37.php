<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> | PC IMM Sukoharjo Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        :root {
            --sidebar-bg: #8E0000;
            --sidebar-width: 260px;
            --header-height: 70px;
            --imm-red: #C62828;
            --imm-red-dark: #8E0000;
            --imm-yellow: #FBC02D;
            --imm-dark: #1e1e2d;
        }
        * { font-family: 'Inter', sans-serif; }
        body { background: #f4f6f9; color: var(--imm-dark); }
        .sidebar {
            position: fixed; top: 0; left: 0; height: 100vh;
            width: var(--sidebar-width); background: var(--sidebar-bg);
            z-index: 1000; display: flex; flex-direction: column;
            transition: transform 0.3s; overflow-y: auto;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }
        .sidebar-brand {
            padding: 1.25rem 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex; align-items: center; gap: 12px;
            text-decoration: none; background: rgba(0,0,0,0.2); flex-shrink: 0;
        }
        .sidebar-brand-icon {
            width: 40px; height: 40px; background: var(--imm-yellow);
            border-radius: 10px; display: flex; align-items: center;
            justify-content: center; font-weight: 900; color: var(--imm-red-dark);
            font-size: 0.85rem; flex-shrink: 0;
        }
        .sidebar-brand-text { color: white; font-weight: 800; font-size: 0.95rem; line-height: 1.2; }
        .sidebar-brand-sub  { color: var(--imm-yellow); font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
        .sidebar-user {
            padding: 1rem 1.5rem; background: rgba(0,0,0,0.08);
            border-bottom: 1px solid rgba(255,255,255,0.06); flex-shrink: 0;
        }
        .sidebar-user-avatar {
            width: 36px; height: 36px; border-radius: 10px; background: white;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; color: var(--imm-red); font-size: 0.85rem; flex-shrink: 0;
        }
        .sidebar-user-name { color: white; font-size: 0.85rem; font-weight: 700; }
        .sidebar-user-role { color: rgba(255,255,255,0.55); font-size: 0.68rem; }
        .sidebar-nav { padding: 0.75rem 0; flex: 1; }
        .sidebar-section {
            padding: 0.85rem 1.5rem 0.4rem;
            font-size: 0.65rem; font-weight: 800;
            color: rgba(255,255,255,0.35); text-transform: uppercase; letter-spacing: 1.5px;
        }
        .sidebar-link {
            display: flex; align-items: center; gap: 10px;
            padding: 0.65rem 1.5rem; color: rgba(255,255,255,0.7);
            text-decoration: none; font-size: 0.855rem; font-weight: 500;
            transition: all 0.2s; border-left: 3px solid transparent;
        }
        .sidebar-link:hover  { color: white; background: rgba(255,255,255,0.06); }
        .sidebar-link.active {
            color: var(--imm-yellow); background: rgba(0,0,0,0.25);
            border-left-color: var(--imm-yellow); font-weight: 700;
        }
        .sidebar-link i { font-size: 0.95rem; width: 18px; flex-shrink: 0; }
        .main-content { margin-left: var(--sidebar-width); min-height: 100vh; display: flex; flex-direction: column; }
        .topbar {
            height: var(--header-height); background: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 0 2rem; display: flex; align-items: center;
            justify-content: space-between; position: sticky; top: 0;
            z-index: 100; box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .topbar-title { font-weight: 800; color: var(--imm-red-dark); font-size: 1.1rem; }
        .page-content { padding: 1.75rem; flex: 1; }
        .card { border: none !important; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
        .btn { border-radius: 10px; font-weight: 600; padding: 0.5rem 1.1rem; transition: all 0.2s; }
        .btn-primary { background: var(--imm-red); border-color: var(--imm-red); }
        .btn-primary:hover { background: var(--imm-red-dark); border-color: var(--imm-red-dark); transform: translateY(-1px); }
        .form-control:focus, .form-select:focus {
            border-color: var(--imm-red);
            box-shadow: 0 0 0 0.2rem rgba(198,40,40,0.15);
        }
        .table thead th {
            background: #f8fafc; color: #64748b; font-weight: 700;
            text-transform: uppercase; font-size: 0.72rem; letter-spacing: 1px; border-top: none;
        }
        .table tbody tr:hover { background: #fafbfc; }
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>


<aside class="sidebar" id="sidebar">
    <a href="<?php echo e(route('home')); ?>" class="sidebar-brand">
        <div class="sidebar-brand-icon">IMM</div>
        <div>
            <div class="sidebar-brand-text">PC IMM Sukoharjo</div>
            <div class="sidebar-brand-sub">Sistem Administrasi</div>
        </div>
    </a>

    <div class="sidebar-user">
        <div class="d-flex align-items-center gap-2">
            <div class="sidebar-user-avatar"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></div>
            <div class="overflow-hidden">
                <div class="sidebar-user-name text-truncate"><?php echo e(auth()->user()->name); ?></div>
                <div class="sidebar-user-role">
                    <?php if(auth()->user()->isSuperAdmin()): ?>
                        <i class="bi bi-patch-check-fill text-warning me-1"></i>Super Admin
                    <?php else: ?>
                        <?php echo e(auth()->user()->bidang?->singkatan ?? 'Admin Bidang'); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <?php if(auth()->user()->isSuperAdmin()): ?>

            <div class="sidebar-section">Utama</div>
            <a href="<?php echo e(route('super-admin.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('super-admin.dashboard') ? 'active' : ''); ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="sidebar-section">Organisasi</div>
            <a href="<?php echo e(route('super-admin.pengurus.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('super-admin.pengurus*') ? 'active' : ''); ?>">
                <i class="bi bi-person-badge-fill"></i> Pengurus
            </a>
            <a href="<?php echo e(route('super-admin.komisariat.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('super-admin.komisariat*') ? 'active' : ''); ?>">
                <i class="bi bi-building"></i> Komisariat
            </a>
            <a href="<?php echo e(route('super-admin.bidang.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('super-admin.bidang*') ? 'active' : ''); ?>">
                <i class="bi bi-diagram-3-fill"></i> Bidang
            </a>
            <a href="<?php echo e(route('super-admin.admin.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('super-admin.admin*') ? 'active' : ''); ?>">
                <i class="bi bi-people-fill"></i> Admin Bidang
            </a>

            <div class="sidebar-section">Publikasi</div>
            <a href="<?php echo e(route('super-admin.konten.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('super-admin.konten*') ? 'active' : ''); ?>">
                <i class="bi bi-collection-fill"></i> Semua Konten
            </a>

            <div class="sidebar-section">Website</div>
            <a href="<?php echo e(route('super-admin.timeline.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('super-admin.timeline*') ? 'active' : ''); ?>">
                <i class="bi bi-clock-history"></i> Timeline Sejarah
            </a>
            <a href="<?php echo e(route('super-admin.settings.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('super-admin.settings*') ? 'active' : ''); ?>">
                <i class="bi bi-gear-fill"></i> Pengaturan
            </a>

        <?php else: ?>

            <div class="sidebar-section">Utama</div>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <div class="sidebar-section">Konten Bidang</div>
            <a href="<?php echo e(route('admin.konten.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.konten.index') ? 'active' : ''); ?>">
                <i class="bi bi-journal-text"></i> Daftar Konten
            </a>
            <a href="<?php echo e(route('admin.konten.create')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.konten.create') ? 'active' : ''); ?>">
                <i class="bi bi-plus-square-fill"></i> Tambah Konten
            </a>

        <?php endif; ?>
    </nav>

    <div class="p-3" style="flex-shrink:0;">
        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-sm w-100 py-2" style="background:rgba(255,255,255,0.1);color:white;border:1px solid rgba(255,255,255,0.15);border-radius:10px;">
                <i class="bi bi-box-arrow-left me-2"></i>Logout
            </button>
        </form>
    </div>
</aside>


<div class="main-content">
    <div class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-sm d-lg-none p-1" id="sidebarToggle">
                <i class="bi bi-list fs-4" style="color:var(--imm-red-dark);"></i>
            </button>
            <div class="topbar-title"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></div>
        </div>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-sm btn-outline-secondary" target="_blank">
            <i class="bi bi-globe me-1"></i><span class="d-none d-sm-inline">Lihat Website</span>
        </a>
    </div>

    <div class="page-content">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-3">
                <i class="bi bi-check-circle-fill flex-shrink-0"></i>
                <span><?php echo e(session('success')); ?></span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-3">
                <i class="bi bi-exclamation-circle-fill flex-shrink-0"></i>
                <span><?php echo e(session('error')); ?></span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('sidebarToggle')?.addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('show');
});
document.addEventListener('click', e => {
    const sidebar = document.getElementById('sidebar');
    const toggle  = document.getElementById('sidebarToggle');
    if (window.innerWidth < 992 && sidebar?.classList.contains('show') &&
        !sidebar.contains(e.target) && !toggle?.contains(e.target)) {
        sidebar.classList.remove('show');
    }
});
setTimeout(() => {
    document.querySelectorAll('.alert[data-bs-dismiss]').forEach(el => {
        bootstrap.Alert.getOrCreateInstance(el)?.close();
    });
}, 5000);
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/layouts/admin.blade.php ENDPATH**/ ?>