<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PC IMM Sukoharjo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        :root {
            --imm-red: #C62828;
            --imm-red-dark: #8E0000;
            --imm-yellow: #FBC02D;
            --imm-dark: #212529;
        }
        * { font-family: 'Inter', sans-serif; }
        body { 
            min-height: 100vh; 
            background: linear-gradient(135deg, var(--imm-red-dark) 0%, var(--imm-red) 100%); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            padding: 1rem; 
            position: relative;
            overflow-x: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(251, 192, 45, 0.1) 0%, rgba(255,255,255,0) 70%);
            top: -100px;
            right: -100px;
            border-radius: 50%;
        }
        .login-card { 
            background: white; 
            border-radius: 24px; 
            box-shadow: 0 25px 60px rgba(0,0,0,0.3); 
            overflow: hidden; 
            width: 100%; 
            max-width: 420px; 
            position: relative;
            z-index: 2;
        }
        .login-header { 
            background: linear-gradient(135deg, var(--imm-red-dark), var(--imm-red)); 
            padding: 2.5rem 2rem; 
            text-align: center; 
            border-bottom: 4px solid var(--imm-yellow);
        }
        .login-logo { 
            width: 68px; 
            height: 68px; 
            background: var(--imm-yellow); 
            border-radius: 18px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: 900; 
            color: var(--imm-red-dark); 
            font-size: 1.3rem; 
            margin: 0 auto 1.2rem; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .login-body { padding: 2.5rem 2.2rem; }
        .form-control { 
            border-radius: 12px; 
            border: 2px solid #f1f5f9; 
            padding: 0.75rem 1rem; 
            transition: all 0.2s; 
            background: #f8fafc;
        }
        .form-control:focus { 
            border-color: var(--imm-red); 
            box-shadow: 0 0 0 4px rgba(198, 40, 40, 0.1); 
            background: white;
        }
        .input-group-text { 
            border-radius: 12px 0 0 12px; 
            border: 2px solid #f1f5f9; 
            background: #f8fafc; 
            border-right: none;
            color: var(--imm-red);
        }
        .input-group .form-control { border-radius: 0 12px 12px 0; border-left: none; }
        .btn-login { 
            background: var(--imm-yellow); 
            color: var(--imm-red-dark); 
            border-radius: 12px; 
            padding: 0.9rem; 
            font-weight: 800; 
            width: 100%; 
            border: none; 
            transition: all 0.3s; 
            box-shadow: 0 4px 15px rgba(251, 192, 45, 0.4);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .btn-login:hover { 
            background: var(--imm-red-dark); 
            color: white; 
            transform: translateY(-2px); 
            box-shadow: 0 8px 25px rgba(142, 0, 0, 0.3); 
        }
        .alert { border-radius: 12px; border: none; font-size: 0.9rem; font-weight: 600; }
        .back-link { 
            text-align: center; 
            padding: 1.2rem; 
            background: #fcfcfc; 
            border-top: 1px solid #f1f5f9;
        }
        .back-link a { color: #64748b; text-decoration: none; font-weight: 600; transition: color 0.2s; font-size: 0.9rem; }
        .back-link a:hover { color: var(--imm-red); }
        .demo-box {
            background: rgba(198, 40, 40, 0.05);
            border: 1px dashed rgba(198, 40, 40, 0.2);
            border-radius: 14px;
            padding: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">IMM</div>
            <h1 class="text-white fw-bold mb-1" style="font-size:1.5rem; letter-spacing: -0.5px;">PC IMM Sukoharjo</h1>
            <p class="text-white mb-0 small" style="opacity:0.9; font-weight: 500; text-transform: uppercase; letter-spacing: 1px;">Sistem Administrasi Pusat</p>
        </div>
        <div class="login-body">
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-1" style="font-size:1.4rem; color: var(--imm-dark);">Selamat Datang 👋</h2>
                <p class="text-muted small">Silakan masuk untuk mengelola konten bidang.</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger mb-4 shadow-sm">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?php echo e($errors->first()); ?>

                </div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success mb-4 shadow-sm">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Alamat Email</label>
                    <div class="input-group shadow-sm" style="border-radius: 12px;">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="admin@pcimm-sukoharjo.org" value="<?php echo e(old('email')); ?>" required autofocus>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Password</label>
                    <div class="input-group shadow-sm" style="border-radius: 12px;">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required id="passwordInput">
                        <button type="button" class="btn btn-light" id="togglePassword" style="border: 2px solid #f1f5f9; border-left: none; border-radius: 0 12px 12px 0; background: #f8fafc; color: #64748b;">
                            <i class="bi bi-eye-fill" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" style="cursor: pointer;">
                        <label class="form-check-label small text-muted" for="remember" style="cursor: pointer;">Ingat Sesi Saya</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-login mb-4">
                    <i class="bi bi-shield-lock-fill me-2"></i>Masuk ke Dashboard
                </button>
            </form>

            <div class="demo-box">
                <p class="mb-2 small fw-bold" style="color: var(--imm-red);"><i class="bi bi-info-circle-fill me-1"></i>Akses Demo:</p>
                <div class="small text-dark" style="font-size: 0.8rem; line-height: 1.6;">
                    <strong>Super Admin:</strong> superadmin@pcimm-sukoharjo.org<br>
                    <strong>Admin Bidang:</strong> admin.bok@pcimm-sukoharjo.org<br>
                    <strong>Password:</strong> <span class="badge bg-white text-dark border px-2 py-1">password</span>
                </div>
            </div>
        </div>
        <div class="back-link">
            <a href="<?php echo e(route('home')); ?>"><i class="bi bi-house-door-fill me-2"></i>Kembali ke Beranda Utama</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const input = document.getElementById('passwordInput');
            const icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash-fill';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye-fill';
            }
        });
    </script>
</body>
 </script>
</body>
</html>
<?php /**PATH C:\Users\M S I\Downloads\pc-imm-sukoharjo\resources\views/auth/login.blade.php ENDPATH**/ ?>