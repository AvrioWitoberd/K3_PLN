<?php require_once __DIR__ . '/includes/header.php'; ?>
<?php
if (!isset($cms)) {
    require_once __DIR__ . '/../controllers/KontenController.php';
    $kCtrl = new KontenController();
    $cms = [];
    foreach($kCtrl->index() as $row) $cms[$row['kunci']] = $row['nilai'];
}
?>

    <main class="container page-layout">
        
        <section class="profile-section">
            <div class="page-heading-elegant">
                <span class="badge">Profil Korporat & Landasan Berpikir</span>
                <h1><?= htmlspecialchars($cms['profil_title'] ?? 'Profil K3 Perusahaan') ?></h1>
                <p>Kinerja Kesehatan dan Keselamatan Kerja (K3) merupakan pilar utama sekaligus tulang punggung keberhasilan operasional perusahaan.</p>
            </div>
        </section>

        <section class="law-section mb-6">
            <div class="card card--floating table-wrapper">
                <div class="card__header bg-blue-grad text-white px-4 py-3 border-0">
                    <h3 class="m-0 fs-5 font-weight-bold d-flex align-items-center gap-2">
                        <i class="ri-scales-3-fill"></i> Landasan Hukum K3 Dasar
                    </h3>
                </div>
                <div class="card__body">
                    <ul class="law-list list-unstyled">
                        <li class="law-list__item d-flex align-items-start gap-3 mb-3">
                            <i class="ri-checkbox-circle-fill text-success fs-4"></i>
                            <div><strong class="text-dark">UU No. 1 Tahun 1970</strong> tentang Keselamatan Kerja Nasional.</div>
                        </li>
                        <li class="law-list__item d-flex align-items-start gap-3 mb-3">
                            <i class="ri-checkbox-circle-fill text-success fs-4"></i>
                            <div><strong class="text-dark">UU No. 13 Tahun 2003</strong> landasan regulasi Ketenagakerjaan.</div>
                        </li>
                        <li class="law-list__item d-flex align-items-start gap-3 mb-3">
                            <i class="ri-checkbox-circle-fill text-success fs-4"></i>
                            <div><strong class="text-dark">PP No. 50 Tahun 2012</strong> kewajiban Penerapan Sistem Manajemen K3 (SMK3).</div>
                        </li>
                        <li class="law-list__item d-flex align-items-start gap-3">
                            <i class="ri-checkbox-circle-fill text-success fs-4"></i>
                            <div><strong class="text-dark">SK Direksi PT PLN (Persero)</strong> turunan Peraturan Menteri ESDM terkait Keselamatan Ketenagalistrikan (K2).</div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="org-structure mt-5">
            <div class="card card--floating">
                <div class="card__header px-4 py-3">
                    <h3 class="m-0 fs-5 font-weight-bold d-flex align-items-center gap-2">
                        <i class="ri-organization-chart"></i> Struktur Organisasi PT PLN
                    </h3>
                </div>
                <div class="card__body text-center mt-2">
                    <p class="text-muted mb-4 px-md-5">
                        Bagan hierarki komando pengendalian operasional yang menempatkan Divisi Kesehatan, Keselamatan Kerja, Keamanan & Lingkungan (K4) sebagai perpanjangan tangan strategis Direktur Utama.
                    </p>
                    <div class="img-wrapper shadow-soft rounded-xl overflow-hidden border">
                        <img src="assets/images/struktur-organisasi-pln.jpeg" alt="Struktur Organisasi PT PLN" class="map-responsive w-100">
                    </div>
                </div>
            </div>
        </section>

    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
