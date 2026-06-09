<?php
if (!isset($cms)) {
    require_once __DIR__ . '/../../controllers/KontenController.php';
    $kCtrl = new KontenController();
    $cms = [];
    foreach($kCtrl->index() as $row) $cms[$row['kunci']] = $row['nilai'];
}
?>
    <footer class="footer mt-auto">
        <div class="container footer__grid">
            <div class="footer__col">
                <h3 class="footer__title text-warning" style="font-size: 1.3rem; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1rem;">PORTAL K3 PLN</h3>
                <p class="footer__desc" style="color: #cbd5e1;"><?= htmlspecialchars($cms['footer_description'] ?? 'Sistem Informasi Manajemen Keselamatan dan Kesehatan Kerja Terpadu. Menjamin mutu proteksi ketenagalistrikan.') ?></p>
            </div>
            
            <div class="footer__col">
                <h4 class="footer__col-title">INSTITUSI AKADEMIK</h4>
                <div class="footer__contact-list">
                    <div class="footer__contact-item">
                        <i class="ri-macbook-line"></i>
                        <span>Program Studi Sistem Informasi Bisnis</span>
                    </div>
                    <div class="footer__contact-item">
                        <i class="ri-git-branch-line"></i>
                        <span>Jurusan Teknologi Informasi</span>
                    </div>
                    <div class="footer__contact-item">
                        <i class="ri-bank-line"></i>
                        <span>Politeknik Negeri Malang | 2026</span>
                    </div>
                </div>
            </div>

            <div class="footer__col">
                <h4 class="footer__col-title">LAYANAN BANTUAN</h4>
                <div class="footer__contact-list">
                    <div class="footer__contact-item">
                        <i class="ri-mail-send-line"></i>
                        <a href="mailto:k3@pln.co.id">k3@pln.co.id</a>
                    </div>
                    <div class="footer__contact-item">
                        <i class="ri-phone-line"></i>
                        <a href="tel:123">123 (Contact Center)</a>
                    </div>
                    <div class="footer__contact-item footer__contact-item--urgent">
                        <i class="ri-alarm-warning-fill"></i>
                        <span>Darurat K3: 112</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <span class="copyright-text">&copy; <?= date('Y') ?> PT PLN (Persero). Hak cipta dilindungi.</span>
            </div>
        </div>
    </footer>

    <!-- Floating Bubble Manual Book -->
    <a href="#" target="_blank" class="manual-bubble-btn" title="Buka Manual Book Aplikasi">
        <i class="ri-book-read-fill"></i>
    </a>

    <!-- Floating Bubble Data Diri -->
    <div class="team-bubble-btn" id="teamBubbleBtn" title="Lihat Data Tim Penyusun">
        <i class="ri-team-fill"></i>
    </div>

    <!-- Modal Data Diri -->
    <div class="team-modal-overlay" id="teamModalOverlay">
        <div class="team-modal">
            <div class="team-modal-header">
                <h3 class="team-modal-title"><i class="ri-group-line text-warning"></i> Tim Penyusun</h3>
                <button class="team-modal-close" id="teamModalClose"><i class="ri-close-line"></i></button>
            </div>
            <div class="team-modal-body">
                <p class="text-muted text-center mb-4" style="font-size: 0.95rem;">Proyek Sistem Informasi Manajemen Keselamatan dan Kesehatan Kerja - SIB Polinema.</p>
                <ul class="team-list-bubble">
                    <li>
                        <span class="name">Christoforus Avrio Witoberd</span>
                        <span class="nim">244107060073</span>
                    </li>
                    <li>
                        <span class="name">Dea Marselia Rahma</span>
                        <span class="nim">244107060087</span>
                    </li>
                    <li>
                        <span class="name">Gempita Fitri Nurdini</span>
                        <span class="nim">244107060083</span>
                    </li>
                    <li>
                        <span class="name">Neyza Ratu Anastasya</span>
                        <span class="nim">244107060119</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="<?= isset($base_path) ? $base_path : '' ?>assets/js/main.js"></script>
    <script>
        // JS Khusus untuk Modal Bubble Data Diri
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('teamBubbleBtn');
            const overlay = document.getElementById('teamModalOverlay');
            const closeBtn = document.getElementById('teamModalClose');

            if(btn && overlay && closeBtn) {
                btn.addEventListener('click', () => {
                    overlay.classList.add('active');
                });

                closeBtn.addEventListener('click', () => {
                    overlay.classList.remove('active');
                });

                overlay.addEventListener('click', (e) => {
                    if(e.target === overlay) {
                        overlay.classList.remove('active');
                    }
                });
            }
        });
    </script>
</body>
</html>
