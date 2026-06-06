<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM K3 - PT PLN (Persero)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <header class="header">
        <div class="container header__inner">
            <a href="index.php" class="logo">
                <i class="ri-flash-light-fill logo__icon"></i> SIM K3 PLN
            </a>
            <nav class="nav">
                <ul class="nav__list">
                    <li><a href="index.php" class="nav__link <?= ($current_page == 'index.php' || $current_page == '') ? 'active' : '' ?>">Beranda</a></li>
                    <li><a href="profil.php" class="nav__link <?= ($current_page == 'profil.php') ? 'active' : '' ?>">Profil & Regulasi</a></li>
                    <li><a href="identifikasi.php" class="nav__link <?= ($current_page == 'identifikasi.php') ? 'active' : '' ?>">Identifikasi Bahaya</a></li>
                    <li><a href="safety-map.php" class="nav__link <?= ($current_page == 'safety-map.php') ? 'active' : '' ?>">Peta & Rambu</a></li>
                    <li class="nav__item--btn">
                        <a href="login.php" class="btn btn--primary">
                            <i class="ri-admin-line"></i> Login Petugas
                        </a>
                    </li>
                </ul>
            </nav>
            <button class="menu-toggle" aria-label="Toggle Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>
