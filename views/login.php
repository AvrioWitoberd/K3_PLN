<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SIM K3 PLN Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_path ?>assets/css/style.css">
    <style>
        /* ============================
           LOGIN PAGE — ENTERPRISE 2026
           ============================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body.login-enterprise {
            min-height: 100vh;
            display: flex;
            background: #f0f4f8;
            font-family: 'Inter', sans-serif;
        }

        /* LEFT PANEL — Branding */
        .login-left {
            flex: 1;
            background: linear-gradient(145deg, #003f7f 0%, #0056A0 40%, #00AEEF 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }

        /* Decorative circles in background */
        .login-left::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
            top: -150px; right: -150px;
        }
        .login-left::after {
            content: '';
            position: absolute;
            width: 320px; height: 320px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            bottom: -80px; left: -80px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
            position: relative;
            z-index: 1;
        }
        .brand-logo-icon {
            width: 56px; height: 56px;
            background: linear-gradient(135deg, #F5A623, #f8c46f);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.75rem; color: #fff;
            box-shadow: 0 8px 24px rgba(245,166,35,0.4);
        }
        .brand-logo-text {
            color: #fff;
        }
        .brand-logo-text strong {
            display: block;
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }
        .brand-logo-text span {
            font-size: 0.8rem;
            opacity: 0.7;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .brand-headline {
            color: #fff;
            text-align: center;
            position: relative; z-index: 1;
        }
        .brand-headline h1 {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
            letter-spacing: -0.03em;
        }
        .brand-headline h1 em {
            font-style: normal;
            color: #F5A623;
        }
        .brand-headline p {
            font-size: 1rem;
            opacity: 0.75;
            line-height: 1.7;
            max-width: 340px;
            margin: 0 auto;
        }

        .brand-stats {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
            position: relative; z-index: 1;
        }
        .brand-stat {
            text-align: center;
            color: rgba(255,255,255,0.85);
        }
        .brand-stat strong {
            display: block;
            font-size: 1.6rem;
            font-weight: 800;
            color: #fff;
            line-height: 1;
        }
        .brand-stat span {
            font-size: 0.75rem;
            opacity: 0.65;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* RIGHT PANEL — Login Form */
        .login-right {
            width: 480px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: #fff;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            margin-bottom: 2.5rem;
        }
        .login-header .sys-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #eff6ff;
            color: #0056A0;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 0.35rem 0.85rem;
            border-radius: 99px;
            margin-bottom: 1.25rem;
            border: 1px solid #bfdbfe;
        }
        .login-header h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.03em;
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }
        .login-header p {
            color: #64748b;
            font-size: 0.92rem;
            line-height: 1.6;
        }

        /* Form elements */
        .lf-group {
            margin-bottom: 1.4rem;
        }
        .lf-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 0.5rem;
            letter-spacing: 0.01em;
        }
        .lf-input-wrap {
            position: relative;
        }
        .lf-input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.1rem;
            pointer-events: none;
            transition: color 0.2s;
        }
        .lf-input {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.85rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            color: #0f172a;
            background: #f8fafc;
            transition: all 0.2s ease;
            outline: none;
        }
        .lf-input::placeholder { color: #94a3b8; }
        .lf-input:focus {
            border-color: #0056A0;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(0,86,160,0.1);
        }
        .lf-input:focus + .lf-input-icon,
        .lf-input-wrap:focus-within .lf-input-icon {
            color: #0056A0;
        }

        /* Toggle password visibility */
        .lf-eye {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 0;
            transition: color 0.2s;
        }
        .lf-eye:hover { color: #0056A0; }

        /* Error alert */
        .login-alert {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 0.85rem 1rem;
            color: #dc2626;
            font-size: 0.88rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            animation: shakeIn 0.35s ease;
        }
        .login-alert i { font-size: 1.1rem; flex-shrink: 0; }
        @keyframes shakeIn {
            0%   { transform: translateX(-6px); opacity: 0; }
            40%  { transform: translateX(4px); }
            70%  { transform: translateX(-2px); }
            100% { transform: translateX(0); opacity: 1; }
        }

        /* Submit button */
        .lf-btn {
            width: 100%;
            padding: 0.95rem 1.5rem;
            background: linear-gradient(135deg, #0056A0 0%, #00AEEF 100%);
            color: #fff;
            font-size: 0.98rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(0,86,160,0.3);
            letter-spacing: 0.01em;
            margin-top: 1.75rem;
        }
        .lf-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,86,160,0.4);
        }
        .lf-btn:active { transform: translateY(0); }
        .lf-btn:disabled { opacity: 0.65; cursor: not-allowed; transform: none; }

        /* Footer link */
        .login-back {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f1f5f9;
        }
        .login-back a {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        .login-back a:hover { color: #0056A0; }

        /* Security badge */
        .security-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            color: #94a3b8;
            font-size: 0.75rem;
            margin-top: 1.5rem;
        }

        /* RESPONSIVE: hide left panel on mobile */
        @media (max-width: 768px) {
            .login-left { display: none; }
            .login-right { width: 100%; }
        }

        /* Loading spinner */
        @keyframes spin { to { transform: rotate(360deg); } }
        .spinner-icon { display: inline-block; animation: spin 0.75s linear infinite; }
    </style>
</head>
<body class="login-enterprise">

    <!-- LEFT: Branding Panel -->
    <div class="login-left">
        <div class="brand-logo">
            <div class="brand-logo-icon">
                <i class="ri-flash-fill"></i>
            </div>
            <div class="brand-logo-text">
                <strong>SIM K3 PLN</strong>
                <span>PT PLN (Persero)</span>
            </div>
        </div>

        <div class="brand-headline">
            <h1>Sistem Informasi<br>Manajemen <em>K3</em><br>Terintegrasi</h1>
            <p>Platform terpadu pemantauan keselamatan dan kesehatan kerja untuk lingkungan ketenagalistrikan nasional.</p>
        </div>

        <div class="brand-stats">
            <div class="brand-stat">
                <strong>ISO</strong>
                <span>45001 Compliant</span>
            </div>
            <div class="brand-stat" style="border-left: 1px solid rgba(255,255,255,0.2); padding-left: 2rem;">
                <strong>24/7</strong>
                <span>Monitoring</span>
            </div>
            <div class="brand-stat" style="border-left: 1px solid rgba(255,255,255,0.2); padding-left: 2rem;">
                <strong>PLN</strong>
                <span>Pusat 2026</span>
            </div>
        </div>
    </div>

    <!-- RIGHT: Login Form -->
    <div class="login-right">
        <div class="login-card">
            <div class="login-header">
                <div class="sys-badge">
                    <i class="ri-shield-check-fill"></i> Akses Terotorisasi
                </div>
                <h2>Masuk ke<br>Portal Admin</h2>
                <p>Safety Management Information System — hanya untuk petugas K3 tervalidasi.</p>
            </div>

            <?php if (isset($error) && $error): ?>
                <div class="login-alert">
                    <i class="ri-error-warning-fill"></i>
                    <span><?= htmlspecialchars($error) ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php" id="loginForm" onsubmit="handleSubmit(this)">
                <div class="lf-group">
                    <label for="username" class="lf-label">Username / ID Petugas</label>
                    <div class="lf-input-wrap">
                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="lf-input"
                            placeholder="Masukkan username Anda"
                            required
                            autocomplete="username"
                        >
                        <i class="ri-user-3-line lf-input-icon"></i>
                    </div>
                </div>

                <div class="lf-group">
                    <label for="password" class="lf-label">Kata Sandi</label>
                    <div class="lf-input-wrap">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="lf-input"
                            placeholder="••••••••••••"
                            required
                            autocomplete="current-password"
                        >
                        <i class="ri-lock-2-line lf-input-icon"></i>
                        <button type="button" class="lf-eye" onclick="togglePass()" id="eyeBtn" title="Tampilkan password">
                            <i class="ri-eye-off-line" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="lf-btn" id="submitBtn">
                    <i class="ri-login-circle-line"></i>
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="login-back">
                <a href="<?= $base_path ?>index.php">
                    <i class="ri-arrow-left-line"></i> Kembali ke Website Publik
                </a>
            </div>

            <div class="security-note">
                <i class="ri-lock-2-fill"></i>
                Koneksi terenkripsi • Sesi aman HTTPS
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePass() {
            var input = document.getElementById('password');
            var icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'ri-eye-line';
            } else {
                input.type = 'password';
                icon.className = 'ri-eye-off-line';
            }
        }

        // Loading state on submit
        function handleSubmit(form) {
            var btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="ri-loader-4-line spinner-icon"></i> Memverifikasi akses...';
        }
    </script>
</body>
</html>
