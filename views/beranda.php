<?php require_once __DIR__ . '/includes/header.php'; ?>

    <main>
        
        <!-- 1. HERO SECTION (Premium Corporate Banner) -->
        <section class="container mt-2">
            <div class="hero-premium">
                <!-- Objek Abstrak Penghias Background -->
                <div class="hero__bg-element" style="opacity: 0.15; background: radial-gradient(circle, #00AEEF 0%, transparent 70%);"></div>
                
                <div class="hero-premium__inner">
                    <span class="badge mb-4 border-0" style="background-color: rgba(0, 86, 160, 0.3); color: #93c5fd; padding: 0.4rem 1rem; font-size: 0.8rem;">Corporate Safety Portal</span>
                    <h1>Utamakan Keselamatan, Kelola Risiko <span class="text-gradient">Tanpa Kompromi</span></h1>
                    <p>Platform enterprise untuk monitoring potensi bahaya, zonasi keselamatan operasional, dan edukasi preventif ketenagalistrikan ruang lingkup PT PLN (Persero).</p>
                    
                    <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                        <a href="identifikasi.php" class="hero-action-primary">
                            <i class="ri-thunderstorms-line fs-5"></i> Lihat Matriks Risiko
                        </a>
                        <a href="safety-map.php" class="hero-action-outline">
                            <i class="ri-map-pin-user-line fs-5"></i> Peta & Rambu
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. ENTERPRISE STATS MONITORING (Floating Card Layout) -->
        <section class="container">
            <div class="stats-overlap-grid">
                <div class="stat-card-premium">
                    <div class="stat-card-premium__icon icon-danger-soft"><i class="ri-shield-check-line"></i></div>
                    <h3>0</h3>
                    <p>Fatal Accident (Target Utama Korporasi)</p>
                </div>
                <div class="stat-card-premium">
                    <div class="stat-card-premium__icon icon-warning-soft"><i class="ri-hard-hat-line"></i></div>
                    <h3>100%</h3>
                    <p>Kepatuhan APD Wajib & Sertifikasi Personel</p>
                </div>
                <div class="stat-card-premium">
                    <div class="stat-card-premium__icon icon-primary-soft"><i class="ri-spam-3-line"></i></div>
                    <h3>13+</h3>
                    <p>Rambu K3 Standardisasi PLN Terpasang</p>
                </div>
            </div>
        </section>

        <!-- 3. MULTIMEDIA KNOWLEDGE HUB (Premium Video Grid ala YouTube Enterprise) -->
        <section class="container mb-6 overflow-hidden">
            <div class="section-header text-center mb-5">
                <span class="section-label mb-2">MEDIA PEMBELAJARAN MULTIMEDIA</span>
                <h2 class="section-title">Edukasi Terintegrasi & Manajemen Risiko K3</h2>
            </div>
            
            <div class="video__grid">
                <!-- Video 1 -->
                <div class="video-card border-0">
                    <div class="video-card__thumbnail">
                        <div class="video-card__overlay"><i class="ri-play-circle-fill"></i></div>
                        <div class="video-card__bg bg-red-soft"></div>
                    </div>
                    <div class="video-card__body bg-white pt-4 px-4 pb-4">
                        <h3 class="video-card__title">Dasar-Dasar Keilmuan K3</h3>
                        <p class="video-card__desc">Membahas esensi proteksi ruang kerja aman dan mitigasi penyakit akibat kelalaian internal atau hilangnya fungsi APD.</p>
                        <a href="https://youtu.be/sTD2AYNsyAY" target="_blank" rel="noopener noreferrer" class="btn btn--flat text-primary font-weight-bold mt-auto pb-0 align-items-center gap-1">
                            + Tonton Media Pembelajaran
                        </a>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="video-card border-0">
                    <div class="video-card__thumbnail">
                        <div class="video-card__overlay"><i class="ri-play-circle-fill"></i></div>
                        <div class="video-card__bg bg-warning-soft"></div>
                    </div>
                    <div class="video-card__body bg-white pt-4 px-4 pb-4">
                        <h3 class="video-card__title">Pencegahan & Manajemen Risiko</h3>
                        <p class="video-card__desc">Metode preventif melalui identifikasi berkala, kalkulasi risiko, dan implementasi alat keselamatan di medan licin/tajam.</p>
                        <a href="https://youtu.be/E7ZjcRX4Zoc" target="_blank" rel="noopener noreferrer" class="btn btn--flat text-primary font-weight-bold mt-auto pb-0 align-items-center gap-1">
                            + Tonton Media Pembelajaran
                        </a>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="video-card border-0">
                    <div class="video-card__thumbnail">
                        <div class="video-card__overlay"><i class="ri-play-circle-fill"></i></div>
                        <div class="video-card__bg bg-success-soft"></div>
                    </div>
                    <div class="video-card__body bg-white pt-4 px-4 pb-4">
                        <h3 class="video-card__title">Penerapan K3 di Lapangan</h3>
                        <p class="video-card__desc">Sorotan nyata kepatuhan SOP lapangan, penggunaan helm dan sarung tangan, serta penumbuhan insting sadar bahaya.</p>
                        <a href="https://youtu.be/P2Km4AnxBsI" target="_blank" rel="noopener noreferrer" class="btn btn--flat text-primary font-weight-bold mt-auto pb-0 align-items-center gap-1">
                            + Tonton Media Pembelajaran
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. CORPORATE SUMMARY PANEL -->
        <section class="container mt-4 mb-2">
            <div class="corporate-summary">
                <p>Kesehatan dan Keselamatan Kerja (K3) merupakan aspek mutlak untuk melindungi insan PLN dari risiko kecelakaan kerja demi mewujudkan lingkungan operasional yang aman, sehat, dan produktif.</p>
            </div>
        </section>

    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
