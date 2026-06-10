<?php
$current_page = basename($_SERVER['PHP_SELF']);
$base_path = isset($base_path) ? $base_path : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen K3 - PT PLN (Persero)</title>
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Main Style -->
    <link rel="stylesheet" href="<?= $base_path ?>assets/css/style.css">
</head>
<body>
    
    <header class="header">
        <div class="container header__inner">
            <a href="<?= $base_path ?>index.php" class="logo">
                <i class="ri-flash-light-fill logo__icon"></i> Portal Keselamatan Kerja PLN
            </a>
            <nav class="nav">
                <ul class="nav__list">
                    <li><a href="<?= $base_path ?>index.php" class="nav__link <?= ($current_page == 'index.php') ? 'active' : '' ?>">Beranda</a></li>
                    <li><a href="<?= $base_path ?>profil.php" class="nav__link <?= ($current_page == 'profil.php') ? 'active' : '' ?>">Profil & Regulasi</a></li>
                    <li><a href="<?= $base_path ?>identifikasi.php" class="nav__link <?= ($current_page == 'identifikasi.php') ? 'active' : '' ?>">Identifikasi Bahaya</a></li>
                    <li><a href="<?= $base_path ?>safety-map.php" class="nav__link <?= ($current_page == 'safety-map.php') ? 'active' : '' ?>">Peta & Rambu</a></li>
                    <li><a href="<?= $base_path ?>artikel.php" class="nav__link <?= ($current_page == 'artikel.php' || $current_page == 'detail-artikel.php') ? 'active' : '' ?>">Edukasi K3</a></li>
                     <li>
        <a href="<?= $base_path ?>manual-book.php"
           class="nav__link">
            Manual Book
        </a>
    </li>
                </ul>
            </nav>
            <div class="header__actions" style="display: flex; align-items: center; gap: 1rem;">
                <button id="theme-toggle" class="theme-toggle-btn" aria-label="Toggle Dark Mode" title="Ganti Tema Warna">
                    <i class="ri-moon-line"></i>
                </button>
                <button class="menu-toggle" aria-label="Toggle Menu">
                    <i class="ri-menu-line"></i>
                </button>
            </div>
        </div>
    </header>
