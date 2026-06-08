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
            <div class="footer__brand">
                <h3 class="footer__title"><i class="ri-flash-light-fill text-gradient"></i> SIM K3 PLN</h3>
                <p class="footer__desc"><?= htmlspecialchars($cms['footer_description'] ?? 'Sistem Informasi Manajemen Keselamatan dan Kesehatan Kerja Nasional.') ?></p>
            </div>
            <div class="footer__team">
                <h4 class="footer__subtitle"><i class="ri-team-line"></i> Tim Penyusun (Polinema)</h4>
                <ul class="team-list">
                    <li>Christoforus Avrio Witoberd <span class="nim">(244107060073)</span></li>
                    <li>Dea Marselia Rahma <span class="nim">(244107060087)</span></li>
                    <li>Gempita Fitri Nurdini <span class="nim">(244107060083)</span></li>
                    <li>Neyza Ratu Anastasya <span class="nim">(244107060119)</span></li>
                </ul>
            </div>
            <div class="footer__info">
                <h4 class="footer__subtitle"><i class="ri-bank-line"></i> Institusi Akademik</h4>
                <p>Program Studi Sistem Informasi Bisnis<br>Jurusan Teknologi Informasi<br>Politeknik Negeri Malang | <?= date('Y') ?></p>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <p><?= htmlspecialchars($cms['footer_copyright'] ?? '© 2026 PT Perusahaan') ?></p>
            </div>
        </div>
    </footer>
    <script src="<?= isset($base_path) ? $base_path : '' ?>assets/js/main.js"></script>
</body>
</html>
