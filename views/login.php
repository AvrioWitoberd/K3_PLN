<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Login Petugas - SIM K3 PLN</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-page d-flex align-items-center justify-content-center bg-light min-h-screen m-0">

    <div class="login-wrapper w-100 px-3">
        <div class="card login-card mx-auto p-5 overflow-hidden border-0" style="max-width: 420px;">
            <!-- Decorator ringan PLN -->
            <div class="login-decorator bg-blue-grad"></div>
            
            <div class="text-center mb-4 pt-3">
                <div class="icon-box icon-box--large bg-blue-light text-primary mx-auto mb-3"><i class="ri-shield-user-fill"></i></div>
                <h2 class="fs-4 font-weight-bold text-dark m-0">Akses Portal K3</h2>
                <p class="text-muted fs-7 mt-1">Otorisasi Eksklusif Inspector Safety</p>
            </div>

            <?php if (isset($error) && $error): ?>
                <div class="alert alert-danger fs-7 text-center rounded shadow-sm border-danger p-2 mb-4">
                    <i class="ri-error-warning-fill"></i> <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <div class="form-group mb-3">
                    <label for="username" class="text-sm font-weight-bold text-dark mb-2 d-block">ID Petugas (Username)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ri-user-3-line"></i></span>
                        <input type="text" id="username" name="username" class="form-control" placeholder="admin" required>
                    </div>
                </div>
                <div class="form-group mb-4 pb-2">
                    <label for="password" class="text-sm font-weight-bold text-dark mb-2 d-block">Kata Sandi Rahasia</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ri-lock-password-line"></i></span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn--primary btn--shadow w-100 d-flex justify-content-center align-items-center gap-2 py-3 fs-6">
                    Masuk ke Sistem <i class="ri-arrow-right-circle-fill"></i>
                </button>
            </form>
            
            <div class="text-center mt-5">
                <a href="index.php" class="text-muted text-decoration-none fs-7 hover-primary transition-all d-inline-flex gap-1 align-items-center">
                    <i class="ri-arrow-left-line"></i> Batal, kembali ke situs publik
                </a>
            </div>
        </div>
    </div>

</body>
</html>
