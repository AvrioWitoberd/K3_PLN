<aside class="admin-sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="<?= $base_path ?>admin/index.php" class="logo text-white d-flex align-items-center gap-2">
            <i class="ri-flash-light-fill text-warning fs-4"></i>
            <span class="font-weight-bold fs-5 tracking-wide text-white">PLN K3 HUB</span>
        </a>
    </div>
    
    <nav class="sidebar-nav mt-4">
        <div class="nav-section-title">MAIN MENU</div>
        <ul class="nav-list list-unstyled">
            <li>
                <a href="<?= $base_path ?>admin/index.php" class="sidebar-link <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                    <i class="ri-dashboard-3-line"></i> <span>Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="nav-section-title mt-4">KONTEN SISTEM</div>
        <ul class="nav-list list-unstyled">
            <li>
                <a href="<?= $base_path ?>admin/risiko.php" class="sidebar-link <?= ($current_page == 'risiko.php') ? 'active' : '' ?>">
                    <i class="ri-fire-line"></i> <span>Matriks Risiko</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_path ?>admin/artikel.php" class="sidebar-link <?= ($current_page == 'artikel.php') ? 'active' : '' ?>">
                    <i class="ri-article-line"></i> <span>Artikel Edukasi</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_path ?>admin/konten.php" class="sidebar-link <?= ($current_page == 'konten.php') ? 'active' : '' ?>">
                    <i class="ri-pages-line"></i> <span>CMS Website</span>
                </a>
            </li>
        </ul>

        <div class="nav-section-title mt-4">ADMINISTRASI</div>
        <ul class="nav-list list-unstyled">
            <li>
                <a href="<?= $base_path ?>admin/admins.php" class="sidebar-link <?= ($current_page == 'admins.php') ? 'active' : '' ?>">
                    <i class="ri-group-line"></i> <span>Manajemen Admin</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="sidebar-footer mt-auto p-4 border-top border-dark-soft">
        <div class="d-flex align-items-center gap-2 mb-3 px-2">
            <div class="icon-box icon-box--small bg-dark-soft text-light flex-shrink-0"><i class="ri-user-line"></i></div>
            <div>
                <p class="m-0 text-white fs-7 font-weight-bold"><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></p>
                <small class="text-muted" style="font-size:0.7rem;">Administrator</small>
            </div>
        </div>
        <a href="<?= $base_path ?>admin/index.php?action=logout" onclick="return confirm('Keluar dari portal?');" class="btn btn--flat text-danger w-100 justify-content-start hover-bg-danger-light rounded p-2 transition-all border-0 bg-transparent text-start">
            <i class="ri-logout-circle-r-line fs-5"></i> <span class="font-weight-bold">Keluar</span>
        </a>
    </div>
</aside>
