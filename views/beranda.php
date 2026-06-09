<?php require_once __DIR__ . '/includes/header.php'; ?>
<?php
require_once __DIR__ . '/../controllers/KontenController.php';
if (!isset($cms)) {
    $kCtrl = new KontenController();
    $cms = [];
    foreach($kCtrl->index() as $row) $cms[$row['kunci']] = $row['nilai'];
}
?>

    <main>
        
        <!-- QUICK ALERT MARQUEE (K3 Context) -->
        <div class="k3-alert-ticker">
            <div class="ticker-wrap">
                <div class="ticker-move">
                    <div class="ticker-group">
                        <span class="ticker-item"><i class="ri-alert-fill"></i> SAFETY FIRST: Pastikan Anda selalu menggunakan APD lengkap sebelum memasuki area operasional tegangan tinggi.</span>
                        <span class="ticker-item"><i class="ri-information-fill"></i> INFO K3: Pelatihan Evakuasi Kebakaran dijadwalkan pada akhir bulan ini.</span>
                        <span class="ticker-item"><i class="ri-shield-check-fill"></i> ZERO ACCIDENT: Mari bersama-sama wujudkan lingkungan kerja aman dan sehat.</span>
                    </div>
                    <!-- Duplicate for seamless loop -->
                    <div class="ticker-group" aria-hidden="true">
                        <span class="ticker-item"><i class="ri-alert-fill"></i> SAFETY FIRST: Pastikan Anda selalu menggunakan APD lengkap sebelum memasuki area operasional tegangan tinggi.</span>
                        <span class="ticker-item"><i class="ri-information-fill"></i> INFO K3: Pelatihan Evakuasi Kebakaran dijadwalkan pada akhir bulan ini.</span>
                        <span class="ticker-item"><i class="ri-shield-check-fill"></i> ZERO ACCIDENT: Mari bersama-sama wujudkan lingkungan kerja aman dan sehat.</span>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- 1. HERO SECTION (Premium Corporate Banner) -->
        <section class="container mb-6">
            <div class="hero-premium">
                <!-- Objek Abstrak Penghias Background -->
                <div class="hero__bg-element" style="opacity: 0.15; background: radial-gradient(circle, #00AEEF 0%, transparent 70%);"></div>
                
                <div class="hero-premium__inner">
                    <span class="badge mb-4 border-0" style="background-color: rgba(0, 86, 160, 0.3); color: #93c5fd; padding: 0.4rem 1rem; font-size: 0.8rem;">Corporate Safety Portal</span>
                    <h1><?= htmlspecialchars($cms['hero_title'] ?? 'Sistem Keselamatan Terintegrasi') ?></h1>
                    <p><?= htmlspecialchars($cms['hero_subtitle'] ?? 'Monitoring dan pengelolaan keselamatan operasional korporat secara real-time') ?></p>
                    
                    <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                        <a href="identifikasi.php" class="hero-action-primary">
                            <i class="ri-thunderstorms-line fs-5"></i> <?= htmlspecialchars($cms['hero_cta_primary'] ?? 'Lihat Matriks Risiko') ?>
                        </a>
                        <a href="safety-map.php" class="hero-action-outline">
                            <i class="ri-map-pin-user-line fs-5"></i> <?= htmlspecialchars($cms['hero_cta_secondary'] ?? 'Peta & Rambu') ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. ENTERPRISE STATS MONITORING (Floating Card Layout) -->
        <section class="container">
            <div class="stats-overlap-grid">
                <div class="stat-card-v2 danger-card">
                    <div class="stat-glow"></div>
                    <div class="d-flex justify-content-between align-items-start mb-4 position-relative z-10">
                        <div class="stat-icon-wrapper"><i class="ri-shield-check-fill"></i></div>
                        <span class="stat-badge badge--danger">Target Utama</span>
                    </div>
                    <div class="stat-content text-start position-relative z-10">
                        <h3 class="stat-value">0</h3>
                        <p class="stat-label">Fatal Accident<br><span class="stat-sublabel">Di Seluruh Area Operasional</span></p>
                    </div>
                    <i class="ri-shield-check-fill stat-watermark"></i>
                </div>
                <div class="stat-card-v2 warning-card">
                    <div class="stat-glow"></div>
                    <div class="d-flex justify-content-between align-items-start mb-4 position-relative z-10">
                        <div class="stat-icon-wrapper"><i class="ri-shield-user-fill"></i></div>
                        <span class="stat-badge badge--warning">Wajib</span>
                    </div>
                    <div class="stat-content text-start position-relative z-10">
                        <h3 class="stat-value">100%</h3>
                        <p class="stat-label">Kepatuhan APD<br><span class="stat-sublabel">& Sertifikasi Personel Aktif</span></p>
                    </div>
                    <i class="ri-shield-user-fill stat-watermark"></i>
                </div>
                <div class="stat-card-v2 primary-card">
                    <div class="stat-glow"></div>
                    <div class="d-flex justify-content-between align-items-start mb-4 position-relative z-10">
                        <div class="stat-icon-wrapper"><i class="ri-signpost-fill"></i></div>
                        <span class="stat-badge badge--primary">Standardisasi</span>
                    </div>
                    <div class="stat-content text-start position-relative z-10">
                        <h3 class="stat-value">13+</h3>
                        <p class="stat-label">Rambu K3 PLN<br><span class="stat-sublabel">Terpasang & Terverifikasi</span></p>
                    </div>
                    <i class="ri-signpost-fill stat-watermark"></i>
                </div>
            </div>
        </section>

        <!-- 3. MULTIMEDIA KNOWLEDGE HUB (Premium Video Grid ala YouTube Enterprise) -->
        <section class="container mb-6">
            <div class="section-header text-center mb-5">
                <span class="section-label mb-2">MEDIA PEMBELAJARAN MULTIMEDIA</span>
                <h2 class="section-title">Edukasi Terintegrasi & Manajemen Risiko K3</h2>
            </div>
            
            <div class="video__grid">
                <!-- Video 1 -->
                <div class="video-card border-0" style="display: flex; flex-direction: column; height: 100%;">
                    <div class="video-card__thumbnail" style="flex-shrink: 0;">
                        <img src="https://img.youtube.com/vi/sTD2AYNsyAY/hqdefault.jpg" alt="Dasar K3" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                        <div class="video-card__overlay"><i class="ri-play-circle-fill"></i></div>
                    </div>
                    <div class="video-card__body" style="display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 class="video-card__title">Dasar-Dasar Keilmuan K3</h3>
                        <p class="video-card__desc">Membahas esensi proteksi ruang kerja aman dan mitigasi penyakit akibat kelalaian internal atau hilangnya fungsi APD.</p>
                        <a href="https://youtu.be/sTD2AYNsyAY" target="_blank" rel="noopener noreferrer" class="btn btn-gradient-primary w-100 d-flex justify-content-center align-items-center gap-2" style="border-radius: 12px; padding: 0.75rem; font-weight: 700; margin-top: auto;">
                            <i class="ri-play-circle-fill fs-5"></i> Tonton Media Pembelajaran
                        </a>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="video-card border-0" style="display: flex; flex-direction: column; height: 100%;">
                    <div class="video-card__thumbnail" style="flex-shrink: 0;">
                        <img src="https://img.youtube.com/vi/E7ZjcRX4Zoc/hqdefault.jpg" alt="Manajemen Risiko" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                        <div class="video-card__overlay"><i class="ri-play-circle-fill"></i></div>
                    </div>
                    <div class="video-card__body" style="display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 class="video-card__title">Pencegahan & Manajemen Risiko</h3>
                        <p class="video-card__desc">Metode preventif melalui identifikasi berkala, kalkulasi risiko, dan implementasi alat keselamatan di medan licin/tajam.</p>
                        <a href="https://youtu.be/E7ZjcRX4Zoc" target="_blank" rel="noopener noreferrer" class="btn btn-gradient-primary w-100 d-flex justify-content-center align-items-center gap-2" style="border-radius: 12px; padding: 0.75rem; font-weight: 700; margin-top: auto;">
                            <i class="ri-play-circle-fill fs-5"></i> Tonton Media Pembelajaran
                        </a>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="video-card border-0" style="display: flex; flex-direction: column; height: 100%;">
                    <div class="video-card__thumbnail" style="flex-shrink: 0;">
                        <img src="https://img.youtube.com/vi/P2Km4AnxBsI/hqdefault.jpg" alt="Penerapan K3" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                        <div class="video-card__overlay"><i class="ri-play-circle-fill"></i></div>
                    </div>
                    <div class="video-card__body" style="display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 class="video-card__title">Penerapan K3 di Lapangan</h3>
                        <p class="video-card__desc">Sorotan nyata kepatuhan SOP lapangan, penggunaan helm dan sarung tangan, serta penumbuhan insting sadar bahaya.</p>
                        <a href="https://youtu.be/j5bLwZ4HofE" target="_blank" rel="noopener noreferrer" class="btn btn-gradient-primary w-100 d-flex justify-content-center align-items-center gap-2" style="border-radius: 12px; padding: 0.75rem; font-weight: 700; margin-top: auto;">
                            <i class="ri-play-circle-fill fs-5"></i> Tonton Media Pembelajaran
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. CORPORATE SUMMARY PANEL -->
        <section class="container mb-6">
            <div class="corporate-summary">
                <p><?= htmlspecialchars($cms['company_summary'] ?? 'Kesehatan dan Keselamatan Kerja (K3) merupakan aspek mutlak untuk melindungi insan PLN dari risiko kecelakaan kerja demi mewujudkan lingkungan operasional yang aman, sehat, dan produktif.') ?></p>
            </div>

        </section>

    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
