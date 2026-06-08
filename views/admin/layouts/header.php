<?php
$current_page = basename($_SERVER['PHP_SELF']);
$base_path = isset($base_path) ? $base_path : '';
$username_display = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Admin';
$role_display = isset($_SESSION['role']) ? ucfirst(htmlspecialchars($_SESSION['role'])) : 'Petugas K3';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - SIM K3 PLN</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_path ?>assets/css/style.css">
    <script>
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark-mode');
        }
    </script>
</head>
<body class="admin-body">
    <div class="admin-layout" id="adminLayout">
        <?php require_once __DIR__ . '/sidebar.php'; ?>
        
        <div class="admin-main">
            <header class="admin-topbar">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn-icon d-lg-none" id="sidebarToggle" onclick="toggleSidebar()">
                        <i class="ri-menu-line"></i>
                    </button>
                    <div class="topbar-search d-none d-md-flex">
                        <i class="ri-search-line"></i>
                        <input type="text" placeholder="Cari data, laporan, atau modul...">
                    </div>
                </div>
                <div class="topbar-actions">
                    <a href="<?= $base_path ?>index.php" class="btn-icon" title="Lihat Website Publik">
                        <i class="ri-external-link-line"></i>
                    </a>
                    <div class="admin-profile">
                        <div class="admin-avatar-initial">
                            <?= strtoupper(substr($username_display, 0, 1)) ?>
                        </div>
                        <div class="admin-info d-none d-md-block">
                            <span class="d-block font-weight-bold text-dark m-0" style="font-size: 0.9rem; line-height:1.2;"><?= $username_display ?></span>
                            <span class="text-muted fs-7"><?= $role_display ?></span>
                        </div>
                    </div>
                </div>
            </header>
            
            <main class="admin-content p-4">
