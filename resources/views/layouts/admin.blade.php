<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | PC IMM Sukoharjo Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        :root {
            --sidebar-bg: #8E0000; /* Merah Gelap */
            --sidebar-width: 260px;
            --header-height: 70px;
            --imm-red: #C62828;
            --imm-red-dark: #8E0000;
            --imm-yellow: #FBC02D;
            --imm-white: #FFFFFF;
            --imm-dark: #1e1e2d;
        }
        * { font-family: 'Inter', sans-serif; }
        body { background: #f4f6f9; color: var(--imm-dark); }

        /* Sidebar */
        .sidebar { 
            position: fixed; 
            top: 0; 
            left: 0; 
            height: 100vh; 
            width: var(--sidebar-width); 
            background: var(--sidebar-bg); 
            z-index: 1000; 
            display: flex; 
            flex-direction: column; 
            transition: transform 0.3s; 
            overflow-y: auto;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }
        .sidebar-brand { 
            padding: 1.5rem; 
            border-bottom: 1px solid rgba(255,255,255,0.1); 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            text-decoration: none; 
            background: rgba(0,0,0,0.15);
        }
        .sidebar-brand-icon { 
            width: 42px; 
            height: 42px; 
            background: var(--imm-yellow); 
            border-radius: 12px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: 900; 
            color: var(--imm-red-dark); 
            font-size: 0.9rem; 
            flex-shrink: 0; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .sidebar-brand-text { color: white; font-weight: 800; font-size: 1rem; line-height: 1.2; letter-spacing: -0.5px; }
        .sidebar-brand-sub { color: var(--imm-yellow); font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
        
        .sidebar-user { padding: 1.25rem 1.5rem; background: rgba(0,0,0,0.05); border-bottom: 1px solid rgba(255,255,255,0.05); }
        .sidebar-user-avatar { 
            width: 38px; 
            height: 38px; 
            border-radius: 12px; 
            background: white; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: 800; 
            color: var(--imm-red); 
            font-size: 0.9rem;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        .sidebar-user-name { color: white; font-size: 0.9rem; font-weight: 700; }
        .sidebar-user-role { color: rgba(255,255,255,0.6); font-size: 0.7rem; font-weight: 500; }
        
        .sidebar-nav { padding: 1.25rem 0; flex: 1; }
        .sidebar-section { padding: 0.75rem 1.5rem 0.5rem; font-size: 0.7rem; font-weight: 800; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 1.5px; }
        .sidebar-link { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            padding: 0.75rem 1.5rem; 
            color: rgba(255,255,255,0.75); 
            text-decoration: none; 
            font-size: 0.9rem; 
            font-weight: 500; 
            transition: all 0.25s; 
            border-right: 4px solid transparent;
        }
        .sidebar-link:hover { color: white; background: rgba(255,255,255,0.05); }
        .sidebar-link.active { 
            color: var(--imm-yellow); 
            background: rgba(0,0,0,0.2); 
            border-right-color: var(--imm-yellow);
            font-weight: 700;
        }
        .sidebar-link i { font-size: 1.1rem; width: 22px; transition: transform 0.2s; }
        .sidebar-link:hover i { transform: scale(1.1); }

        /* Main content */
        .main-content { margin-left: var(--sidebar-width); min-height: 100vh; display: flex; flex-direction: column; }
        .topbar { 
            height: var(--header-height); 
            background: white; 
            border-bottom: 1px solid rgba(0,0,0,0.05); 
            padding: 0 2rem; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            position: sticky; 
            top: 0; 
            z-index: 100; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.03); 
        }
        .topbar-title { font-weight: 800; color: var(--imm-red-dark); font-size: 1.25rem; letter-spacing: -0.5px; }
        .page-content { padding: 2rem; flex: 1; }

        /* Cards */
        .card { 
            border: none; 
            border-radius: 16px; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.05); 
            transition: all 0.3s ease;
        }
        .card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.08); }
        .card-header { background: transparent; border-bottom: 1px solid #f1f5f9; padding: 1.25rem 1.5rem; font-weight: 700; color: var(--imm-dark); }
        
        /* Buttons */
        .btn { border-radius: 10px; font-weight: 600; padding: 0.6rem 1.2rem; transition: all 0.2s; }
        .btn-primary { background: var(--imm-red); border-color: var(--imm-red); box-shadow: 0 4px 12px rgba(198, 40, 40, 0.2); }
        .btn-primary:hover { background: var(--imm-red-dark); border-color: var(--imm-red-dark); transform: translateY(-1px); }
        .btn-warning { background: var(--imm-yellow); border-color: var(--imm-yellow); color: var(--imm-red-dark); box-shadow: 0 4px 12px rgba(251, 192, 45, 0.3); }
        .btn-warning:hover { background: #fbc02d; color: var(--imm-red-dark); transform: translateY(-1px); }

        /* Tables */
        .table thead th { background: #f8fafc; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px; border-top: none; }
        
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- Sidebar --}}
<aside class="sidebar" id="sidebar">
    <a href="{{ route('home') }}" class="sidebar-brand">
        <div class="sidebar-brand-icon">IMM</div>
        <div>
            <div class="sidebar-brand-text">PC IMM Sukoharjo</div>
            <div class="sidebar-brand-sub">Sistem Administrasi</div>
        </div>
    </a>

    <div class="sidebar-user">
        <div class="d-flex align-items-center gap-3">
            <div class="sidebar-user-avatar flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="overflow-hidden">
                <div class="sidebar-user-name text-truncate">{{ auth()->user()->name }}</div>
                <div class="sidebar-user-role">
                    @if(auth()->user()->isSuperAdmin())
                        <i class="bi bi-patch-check-fill text-warning me-1"></i>Super Admin
                    @else
                        {{ auth()->user()->bidang?->singkatan ?? 'Admin Bidang' }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <nav class="sidebar-nav">
        @if(auth()->user()->isSuperAdmin())
            <div class="sidebar-section">Utama</div>
            <a href="{{ route('super-admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('super-admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="sidebar-section">Organisasi</div>
            <a href="{{ route('super-admin.bidang.index') }}" class="sidebar-link {{ request()->routeIs('super-admin.bidang*') ? 'active' : '' }}">
                <i class="bi bi-diagram-3-fill"></i> Kelola Bidang
            </a>
            <a href="{{ route('super-admin.admin.index') }}" class="sidebar-link {{ request()->routeIs('super-admin.admin*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Kelola Admin
            </a>

            <div class="sidebar-section">Publikasi</div>
            <a href="{{ route('super-admin.konten.index') }}" class="sidebar-link {{ request()->routeIs('super-admin.konten*') ? 'active' : '' }}">
                <i class="bi bi-collection-fill"></i> Semua Konten
            </a>
        @else
            <div class="sidebar-section">Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="sidebar-section">Konten Bidang</div>
            <a href="{{ route('admin.konten.index') }}" class="sidebar-link {{ request()->routeIs('admin.konten.index') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i> Daftar Konten
            </a>
            <a href="{{ route('admin.konten.create') }}" class="sidebar-link {{ request()->routeIs('admin.konten.create') ? 'active' : '' }}">
                <i class="bi bi-plus-square-fill"></i> Tambah Konten
            </a>
        @endif
    </nav>

    <div class="p-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm w-100 py-2" style="background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);">
                <i class="bi bi-box-arrow-left me-2"></i>Logout Akun
            </button>
        </form>
    </div>
</aside>

{{-- Main Content --}}
<div class="main-content">
    <div class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-sm d-lg-none" id="sidebarToggle" style="color:var(--imm-primary);">
                <i class="bi bi-list fs-5"></i>
            </button>
            <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary" target="_blank">
                <i class="bi bi-globe me-1"></i><span class="d-none d-sm-inline">Lihat Website</span>
            </a>
            <span class="badge" style="background:#e9ecef;color:#6c757d;font-size:0.75rem;">
                {{ auth()->user()->isSuperAdmin() ? 'Super Admin' : 'Admin ' . (auth()->user()->bidang?->singkatan ?? '') }}
            </span>
        </div>
    </div>

    <div class="page-content">
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 mb-3" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center gap-2 mb-3" role="alert">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar toggle for mobile
    document.getElementById('sidebarToggle')?.addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });
    // Close sidebar when clicking outside
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const toggle  = document.getElementById('sidebarToggle');
        if (window.innerWidth < 992 && sidebar.classList.contains('show') &&
            !sidebar.contains(e.target) && !toggle?.contains(e.target)) {
            sidebar.classList.remove('show');
        }
    });
    // Auto-dismiss alerts
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(a => {
            const bsAlert = new bootstrap.Alert(a);
            bsAlert?.close();
        });
    }, 5000);
</script>
@stack('scripts')
</body>
</html>
