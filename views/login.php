<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SIM K3 PLN Portal</title>
    <meta name="description" content="Portal login admin Sistem Informasi Manajemen K3 PLN. Akses khusus petugas K3 tervalidasi.">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* ============================
           LOGIN PAGE — CENTERED CARD
           ENTERPRISE 2026
           ============================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body.login-enterprise {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #002f60 0%, #003f7f 30%, #0056A0 65%, #00AEEF 100%);
            position: relative;
            overflow: hidden;
        }

        /* Decorative background orbs */
        body.login-enterprise::before {
            content: '';
            position: fixed;
            width: 600px; height: 600px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
            top: -200px; right: -200px;
            pointer-events: none;
        }
        body.login-enterprise::after {
            content: '';
            position: fixed;
            width: 400px; height: 400px;
            background: rgba(0,174,239,0.12);
            border-radius: 50%;
            bottom: -120px; left: -120px;
            pointer-events: none;
        }

        /* Additional decorative orb */
        .bg-orb {
            position: fixed;
            width: 250px; height: 250px;
            background: rgba(245,166,35,0.06);
            border-radius: 50%;
            top: 60%; left: 60%;
            pointer-events: none;
        }

        /* ── LOGIN CARD WRAPPER ── */
        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 480px;
            padding: 1.5rem;
        }

        /* Top brand strip */
        .login-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.85rem;
            margin-bottom: 1.75rem;
        }
        .login-brand-icon {
            width: 48px; height: 48px;
            background: linear-gradient(135deg, #F5A623, #f8c46f);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; color: #fff;
            box-shadow: 0 6px 20px rgba(245,166,35,0.45);
            flex-shrink: 0;
        }
        .login-brand-text strong {
            display: block;
            color: #fff;
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }
        .login-brand-text span {
            color: rgba(255,255,255,0.65);
            font-size: 0.78rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        /* ── THE CARD ── */
        .login-card {
            background: #fff;
            border-radius: 24px;
            padding: 2.5rem 2.5rem 2rem;
            box-shadow:
                0 4px 6px rgba(0,0,0,0.04),
                0 20px 60px rgba(0,0,0,0.18),
                0 0 0 1px rgba(255,255,255,0.08);
            animation: cardUp 0.45s cubic-bezier(0.22,1,0.36,1) both;
        }
        @keyframes cardUp {
            from { opacity: 0; transform: translateY(28px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        .login-header {
            margin-bottom: 2rem;
        }
        .login-header .sys-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #eff6ff;
            color: #0056A0;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 99px;
            margin-bottom: 1.1rem;
            border: 1px solid #bfdbfe;
        }
        .login-header h2 {
            font-size: 1.65rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.03em;
            line-height: 1.2;
            margin-bottom: 0.45rem;
        }
        .login-header p {
            color: #64748b;
            font-size: 0.88rem;
            line-height: 1.6;
        }

        /* ── Form elements ── */
        .lf-group {
            margin-bottom: 1.25rem;
        }
        .lf-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 0.45rem;
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
            font-size: 1.05rem;
            pointer-events: none;
            transition: color 0.2s;
        }
        .lf-input {
            width: 100%;
            padding: 0.82rem 1rem 0.82rem 2.75rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.93rem;
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
            font-size: 1.05rem;
            padding: 0;
            transition: color 0.2s;
        }
        .lf-eye:hover { color: #0056A0; }

        /* Error alert */
        .login-alert {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 0.8rem 1rem;
            color: #dc2626;
            font-size: 0.86rem;
            font-weight: 500;
            margin-bottom: 1.4rem;
            animation: shakeIn 0.35s ease;
        }
        .login-alert i { font-size: 1.05rem; flex-shrink: 0; }
        @keyframes shakeIn {
            0%   { transform: translateX(-6px); opacity: 0; }
            40%  { transform: translateX(4px); }
            70%  { transform: translateX(-2px); }
            100% { transform: translateX(0); opacity: 1; }
        }

        /* Submit button */
        .lf-btn {
            width: 100%;
            padding: 0.9rem 1.5rem;
            background: linear-gradient(135deg, #0056A0 0%, #00AEEF 100%);
            color: #fff;
            font-size: 0.95rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(0,86,160,0.35);
            letter-spacing: 0.01em;
            margin-top: 1.5rem;
        }
        .lf-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(0,86,160,0.45);
        }
        .lf-btn:active { transform: translateY(0); }
        .lf-btn:disabled { opacity: 0.65; cursor: not-allowed; transform: none; }

        /* Footer link */
        .login-back {
            text-align: center;
            margin-top: 1.75rem;
            padding-top: 1.25rem;
            border-top: 1px solid #f1f5f9;
        }
        .login-back a {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: #64748b;
            font-size: 0.82rem;
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
            color: rgba(255,255,255,0.55);
            font-size: 0.72rem;
            margin-top: 1.5rem;
            letter-spacing: 0.03em;
        }
        .security-note i { font-size: 0.85rem; }

        /* Bottom stats strip */
        .login-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 1.75rem;
        }
        .login-stat {
            text-align: center;
        }
        .login-stat strong {
            display: block;
            color: #fff;
            font-size: 1rem;
            font-weight: 800;
            line-height: 1;
        }
        .login-stat span {
            color: rgba(255,255,255,0.55);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Loading spinner */
        @keyframes spin { to { transform: rotate(360deg); } }
        .spinner-icon { display: inline-block; animation: spin 0.75s linear infinite; }

        /* ── RESPONSIVE ── */
        @media (max-width: 540px) {
            .login-wrapper { padding: 1rem; }
            .login-card { padding: 2rem 1.5rem 1.75rem; border-radius: 20px; }
            .login-brand-text strong { font-size: 1rem; }
        }
    </style>
</head>
<body class="login-enterprise">

    <!-- Decorative orb -->
    <div class="bg-orb"></div>

    <div class="login-wrapper">

        <!-- Brand Strip -->
        <div class="login-brand">
            <div class="login-brand-icon">
                <i class="ri-flash-fill"></i>
            </div>
            <div class="login-brand-text">
                <strong>SIM K3 PLN</strong>
                <span>PT PLN (Persero)</span>
            </div>
        </div>

        <!-- Login Card -->
        <div class="login-card">
            <div class="login-header">
                <div class="sys-badge">
                    <i class="ri-shield-check-fill"></i> Akses Terotorisasi
                </div>
                <h2>Masuk ke Portal Admin</h2>
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
        </div><!-- /.login-card -->

        <!-- Stats Strip -->
        <div class="login-stats">
            <div class="login-stat">
                <strong>ISO</strong>
                <span>45001 Compliant</span>
            </div>
            <div class="login-stat">
                <strong>24/7</strong>
                <span>Monitoring</span>
            </div>
            <div class="login-stat">
                <strong>PLN</strong>
                <span>Pusat 2026</span>
            </div>
        </div>

        <!-- Security note -->
        <div class="security-note">
            <i class="ri-lock-2-fill"></i>
            Koneksi terenkripsi &bull; Sesi aman HTTPS
        </div>

    </div><!-- /.login-wrapper -->

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
