<?php include __DIR__ . '/includes/header.php'; ?>

<section class="manual-book-page">

    <!-- HERO HEADER (matching site's other page heroes) -->
    <div class="manual-hero">
        <span class="manual-eyebrow">📘 PORTAL K3 PLN</span>
        <h1>Manual Book Penggunaan System</h1>
        <p>Panduan lengkap penggunaan Portal Keselamatan Kerja PLN (Sistem Informasi Manajemen K3)</p>
        <button id="downloadPDF" class="download-btn">
            <i class="ri-download-line"></i> Download Manual Book
        </button>
    </div>

    <div class="container">
        <div class="manual-card" id="manualContent">

            <!-- ===== SECTION 1: INFORMASI DOKUMEN ===== -->
            <div class="section-header">
                <span class="section-icon">📋</span>
                <h2>1. Informasi Dokumen &amp; Sistem</h2>
            </div>
            <div class="info-grid">
                <div class="info-block">
                    <div class="info-label">Nama Aplikasi</div>
                    <div class="info-value">Portal Keselamatan Kerja PLN<br><span class="info-sub">(Sistem Informasi Manajemen K3)</span></div>
                </div>
                <div class="info-block">
                    <div class="info-label">Institusi Akademik</div>
                    <div class="info-value">Program Studi Sistem Informasi Bisnis<br>Jurusan Teknologi Informasi<br><span class="info-sub">Politeknik Negeri Malang | 2026</span></div>
                </div>
            </div>

            <div class="team-card">
                <div class="team-card-header">
                    <span>👥</span> Tim Penyusun
                </div>
                <div class="team-list">
                    <div class="team-member">
                        <span class="team-num">01</span>
                        <span>Christoforus Avrio Witoberd</span>
                        <span class="team-nim">244107060073</span>
                    </div>
                    <div class="team-member">
                        <span class="team-num">02</span>
                        <span>Dea Marselia Rahma</span>
                        <span class="team-nim">244107060087</span>
                    </div>
                    <div class="team-member">
                        <span class="team-num">03</span>
                        <span>Gempita Fitri Nurdini</span>
                        <span class="team-nim">244107060083</span>
                    </div>
                    <div class="team-member">
                        <span class="team-num">04</span>
                        <span>Neyza Ratu Anastasya</span>
                        <span class="team-nim">244107060119</span>
                    </div>
                </div>
            </div>

            <div class="highlight-box">
                Portal Keselamatan Kerja PLN merupakan platform sistem keselamatan terintegrasi untuk <strong>monitoring, edukasi, mitigasi risiko,</strong> serta pemetaan zonasi bahaya guna mendukung visi <strong>"Zero Accident".</strong>
            </div>

            <!-- ===== SECTION 2: STRUKTUR MENU ===== -->
            <div class="section-header mt-40">
                <span class="section-icon">🗂️</span>
                <h2>2. Struktur Menu &amp; Navigasi Utama</h2>
            </div>
            <p class="section-desc">Portal K3 PLN memiliki 6 menu utama yang dapat diakses melalui navigasi di bagian atas halaman.</p>

            <div class="menu-grid">
                <div class="menu-item">
                    <div class="menu-icon">🏠</div>
                    <div>
                        <div class="menu-name">Beranda</div>
                        <div class="menu-desc">Halaman utama yang menampilkan statistik K3 (0 Fatal Accident, 100% Kepatuhan APD, 13+ Rambu K3), tombol akses cepat ke Identifikasi Bahaya dan Peta Rambu, serta 3 video edukasi multimedia yang dapat diputar langsung.</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">📄</div>
                    <div>
                        <div class="menu-name">Profil &amp; Regulasi</div>
                        <div class="menu-desc">Berisi landasan hukum K3 (UU No. 1/1970, UU No. 13/2003, PP No. 50/2012, SK Direksi PT PLN) dan bagan Struktur Organisasi PT PLN (Persero).</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">⚠️</div>
                    <div>
                        <div class="menu-name">Identifikasi Bahaya</div>
                        <div class="menu-desc">Master data profil risiko operasional berdasarkan zona kerja, lengkap dengan skala bahaya (Rendah / Sedang / Tinggi) dan solusi protektif APD yang wajib digunakan.</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">🗺️</div>
                    <div>
                        <div class="menu-name">Peta &amp; Rambu</div>
                        <div class="menu-desc">Denah zonasi proteksi gedung operasional, jalur evakuasi, titik Assembly Point, dan katalog 13 Rambu K3 PLN berstandar SNI beserta definisi operasionalnya.</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">🎓</div>
                    <div>
                        <div class="menu-name">Edukasi K3</div>
                        <div class="menu-desc">Artikel, regulasi terkini, dan wawasan K3 untuk mewujudkan visi "Zero Accident" di seluruh lingkungan operasional PLN. Konten diperbarui secara berkala oleh admin.</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">📘</div>
                    <div>
                        <div class="menu-name">Manual Book</div>
                        <div class="menu-desc">Halaman panduan penggunaan sistem ini. Dapat diunduh dalam format PDF melalui tombol "Download Manual Book" di bagian atas halaman.</div>
                    </div>
                </div>
            </div>

            <!-- ===== SECTION 3: PANDUAN HALAMAN ===== -->
            <div class="section-header mt-40">
                <span class="section-icon">📖</span>
                <h2>3. Panduan Penggunaan Halaman</h2>
            </div>

            <!-- 3.1 Beranda -->
            <div class="guide-block">
                <div class="guide-block-header">
                    <span class="guide-num">3.1</span>
                    <span>Halaman Beranda</span>
                </div>
                <div class="guide-block-body">
                    <p>Halaman pertama yang tampil saat membuka portal. Terdapat <strong>ticker berjalan</strong> di bagian atas berisi informasi keselamatan terkini.</p>
                    <div class="stat-row">
                        <div class="stat-chip target">🎯 0 Fatal Accident — Target Utama di Seluruh Area Operasional</div>
                        <div class="stat-chip wajib">🛡️ 100% Kepatuhan APD &amp; Sertifikasi Personel Aktif</div>
                        <div class="stat-chip std">📌 13+ Rambu K3 PLN — Terpasang &amp; Terverifikasi</div>
                    </div>
                    <p class="mt-12">Dua tombol aksi utama tersedia:</p>
                    <ul>
                        <li><strong>Lihat Identifikasi</strong> — mengarahkan ke halaman Identifikasi Bahaya.</li>
                        <li><strong>Peta Rambu</strong> — mengarahkan ke halaman Peta &amp; Rambu.</li>
                    </ul>
                    <p class="mt-12">Bagian <strong>Edukasi Terintegrasi &amp; Manajemen Risiko K3</strong> menampilkan 3 video multimedia yang dapat diklik untuk diputar:</p>
                    <ul>
                        <li>Dasar-Dasar Keilmuan K3</li>
                        <li>Pencegahan &amp; Manajemen Risiko</li>
                        <li>Penerapan K3 di Lapangan</li>
                    </ul>
                </div>
            </div>

            <!-- 3.2 Profil & Regulasi -->
            <div class="guide-block">
                <div class="guide-block-header">
                    <span class="guide-num">3.2</span>
                    <span>Profil &amp; Regulasi</span>
                </div>
                <div class="guide-block-body">
                    <p>Berisi dua bagian utama:</p>
                    <p><strong>Landasan Hukum K3 Dasar:</strong></p>
                    <ul>
                        <li>UU No. 1 Tahun 1970 — tentang Keselamatan Kerja Nasional</li>
                        <li>UU No. 13 Tahun 2003 — landasan regulasi Ketenagakerjaan</li>
                        <li>PP No. 50 Tahun 2012 — kewajiban Penerapan SMK3</li>
                        <li>SK Direksi PT PLN (Persero) — turunan Peraturan Menteri ESDM terkait K2</li>
                    </ul>
                    <p class="mt-12"><strong>Struktur Organisasi PT PLN:</strong> Bagan hierarki komando mulai dari Direktur Utama hingga unit-unit operasional regional, dengan Divisi K4 (Kesehatan, Keselamatan Kerja, Keamanan &amp; Lingkungan) sebagai perpanjangan tangan strategis.</p>
                </div>
            </div>

            <!-- 3.3 Identifikasi Bahaya -->
            <div class="guide-block">
                <div class="guide-block-header">
                    <span class="guide-num">3.3</span>
                    <span>Identifikasi Bahaya &amp; Pengendalian</span>
                </div>
                <div class="guide-block-body">
                    <p>Menampilkan <strong>Master Data Profil Risiko (Public View)</strong> — sistem terpadu pemantauan potensi bahaya operasional secara real-time.</p>
                    <table class="manual-table">
                        <thead>
                            <tr>
                                <th>Zona Lokasi</th>
                                <th>Pemicu / Sumber Bahaya</th>
                                <th>Skala Bahaya</th>
                                <th>Solusi Protektif &amp; APD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gudang Material dan Logistik</td>
                                <td>Forklift dan tumpukan material</td>
                                <td><span class="badge rendah">RENDAH</span></td>
                                <td>Jalur pedestrian, label kapasitas, rak stabil, sepatu safety</td>
                            </tr>
                            <tr>
                                <td>Ruang Mesin Pembangkit (Turbin/Genset)</td>
                                <td>Mesin berputar dan kebisingan tinggi</td>
                                <td><span class="badge sedang">SEDANG</span></td>
                                <td>Peredam suara, pembatasan durasi kerja, Ear Muff, Safety Glasses</td>
                            </tr>
                            <tr>
                                <td>Menara Transmisi (SUTET/SUTT)</td>
                                <td>Ketinggian (&gt;1,8 meter)</td>
                                <td><span class="badge tinggi">TINGGI</span></td>
                                <td>Pelatihan ketinggian, buddy system, Full body harness, double lanyard</td>
                            </tr>
                            <tr>
                                <td>Area Gardu Induk / Panel Tegangan Tinggi</td>
                                <td>Peralatan bertegangan (Busbar, Transformator)</td>
                                <td><span class="badge tinggi">TINGGI</span></td>
                                <td>Rambu bahaya, pembatasan akses, pemeliharaan rutin, Helm dielektrik, Sarung tangan isolasi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 3.4 Peta & Rambu -->
            <div class="guide-block">
                <div class="guide-block-header">
                    <span class="guide-num">3.4</span>
                    <span>Peta &amp; Rambu Keselamatan</span>
                </div>
                <div class="guide-block-body">
                    <p>Terdapat dua bagian utama:</p>
                    <p><strong>Denah Zonasi Proteksi (Terverifikasi 2026):</strong> Visualisasi pemetaan area bahaya secara makro pada gedung operasional PLN, memandu personel ke titik kumpul darurat (Assembly Point) melalui jalur evakuasi yang aman.</p>
                    <p class="mt-12"><strong>Katalog 13 Rambu K3 PLN:</strong> Berstandar SNI, mencakup kategori:</p>
                    <div class="badge-row">
                        <span class="badge-cat larangan">LARANGAN</span>
                        <span class="badge-cat perintah">PERINTAH</span>
                        <span class="badge-cat peringatan">PERINGATAN</span>
                        <span class="badge-cat aman">KONDISI AMAN</span>
                        <span class="badge-cat informasi">INFORMASI</span>
                        <span class="badge-cat berbahaya">BERBAHAYA</span>
                    </div>
                    <p class="mt-12">Contoh rambu: Dilarang masuk, Wajib APD, Bahaya tegangan tinggi, Titik kumpul darurat, Jalur evakuasi, Fire Hydrant, Letak APAR, dan lainnya.</p>
                </div>
            </div>

            <!-- 3.5 Edukasi K3 -->
            <div class="guide-block">
                <div class="guide-block-header">
                    <span class="guide-num">3.5</span>
                    <span>Edukasi K3</span>
                </div>
                <div class="guide-block-body">
                    <p>Halaman ini menampilkan <strong>Artikel &amp; Regulasi K3</strong> yang dipublikasikan oleh administrator portal. Tujuannya adalah menyediakan wawasan mendalam, regulasi terkini, dan praktik terbaik K3.</p>
                    <p class="mt-12">Apabila belum ada artikel yang diterbitkan, halaman akan menampilkan pesan <em>"Belum Ada Artikel — Silakan kunjungi kembali nanti."</em></p>
                </div>
            </div>

            <!-- ===== SECTION 4: FLOATING ACTION BUTTON ===== -->
            <div class="section-header mt-40">
                <span class="section-icon">🔘</span>
                <h2>4. Floating Action Button (FAB)</h2>
            </div>
            <p class="section-desc">Di setiap halaman portal, terdapat dua tombol mengambang di sudut kanan bawah layar.</p>

            <div class="fab-guide">
                <div class="fab-item fab-yellow">
                    <div class="fab-circle yellow">📘</div>
                    <div>
                        <div class="fab-title">Tombol Kuning — Manual Book</div>
                        <div class="fab-desc">Mengklik tombol ini akan langsung membuka halaman Manual Book ini. Tersedia di semua halaman portal sebagai akses cepat panduan penggunaan sistem.</div>
                    </div>
                </div>
                <div class="fab-item fab-blue">
                    <div class="fab-circle blue">👥</div>
                    <div>
                        <div class="fab-title">Tombol Biru — Informasi Tim Penyusun</div>
                        <div class="fab-desc">Menampilkan informasi lengkap tim penyusun Portal K3 PLN: nama anggota dan NIM masing-masing. Tombol ini juga tersedia di semua halaman portal.</div>
                    </div>
                </div>
            </div>

            <!-- ===== WARNING BOX ===== -->
            <div class="warning-banner">
                <span class="warning-icon">⚠️</span>
                <div>
                    <strong>Peringatan Keselamatan</strong><br>
                    Pastikan selalu menggunakan APD lengkap sebelum memasuki area operasional tegangan tinggi. Keselamatan adalah tanggung jawab bersama.
                </div>
            </div>

        </div><!-- /#manualContent -->
    </div>
</section>

<style>
/* ===================== LAYOUT ===================== */
.manual-book-page {
    padding-top: 0;
    padding-bottom: 60px;
    background: #f0f4f8;
    min-height: 100vh;
}
.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ===================== HERO ===================== */
.manual-hero {
    background: linear-gradient(135deg, #0f2d5e 0%, #1a4a8a 60%, #1e6091 100%);
    color: white;
    text-align: center;
    padding: 100px 24px 60px;
    position: relative;
}
.manual-eyebrow {
    display: inline-block;
    background: rgba(255,255,255,0.15);
    color: #bfdbfe;
    border: 1px solid rgba(255,255,255,0.25);
    padding: 8px 20px;
    border-radius: 999px;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    margin-bottom: 20px;
}
.manual-hero h1 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    margin-bottom: 12px;
    line-height: 1.2;
}
.manual-hero p {
    color: #93c5fd;
    font-size: 1rem;
    margin-bottom: 28px;
    max-width: 560px;
    margin-left: auto;
    margin-right: auto;
}
.download-btn {
    background: #facc15;
    color: #0f172a;
    border: none;
    padding: 14px 28px;
    border-radius: 14px;
    font-weight: 700;
    cursor: pointer;
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background 0.2s, transform 0.1s;
}
.download-btn:hover {
    background: #eab308;
    transform: translateY(-1px);
}

/* ===================== CARD ===================== */
.manual-card {
    background: white;
    border-radius: 24px;
    padding: 44px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    margin-top: -32px;
    position: relative;
}

/* ===================== SECTION HEADERS ===================== */
.section-header {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #1e3a5f;
    color: white;
    padding: 16px 22px;
    border-radius: 14px;
    margin-bottom: 22px;
}
.section-header h2 {
    margin: 0;
    font-size: 1.05rem;
    font-weight: 700;
    color: white;
}
.section-icon { font-size: 1.1rem; }
.mt-40 { margin-top: 48px; }
.section-desc {
    color: #475569;
    margin-bottom: 20px;
    font-size: 0.95rem;
    line-height: 1.6;
}

/* ===================== INFO GRID ===================== */
.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
}
@media (max-width: 600px) {
    .info-grid { grid-template-columns: 1fr; }
    .manual-card { padding: 24px 18px; }
}
.info-block {
    background: #f8fafc;
    border-radius: 12px;
    padding: 18px 20px;
    border: 1px solid #e2e8f0;
}
.info-label {
    font-size: 0.72rem;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    margin-bottom: 6px;
}
.info-value {
    font-size: 0.95rem;
    font-weight: 600;
    color: #1e293b;
    line-height: 1.5;
}
.info-sub { color: #64748b; font-weight: 400; font-size: 0.88rem; }

/* ===================== TEAM CARD ===================== */
.team-card {
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 16px;
}
.team-card-header {
    background: #1e3a5f;
    color: white;
    padding: 12px 20px;
    font-weight: 700;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 8px;
}
.team-list { padding: 0; }
.team-member {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 13px 20px;
    border-bottom: 1px solid #f1f5f9;
    font-size: 0.92rem;
}
.team-member:last-child { border-bottom: none; }
.team-num {
    font-size: 0.72rem;
    font-weight: 800;
    color: white;
    background: #2563eb;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.team-nim {
    margin-left: auto;
    font-size: 0.8rem;
    color: #94a3b8;
    font-family: monospace;
}

/* ===================== HIGHLIGHT BOX ===================== */
.highlight-box {
    background: #eff6ff;
    border-left: 4px solid #2563eb;
    border-radius: 0 12px 12px 0;
    padding: 16px 20px;
    color: #1e3a5f;
    font-size: 0.93rem;
    line-height: 1.65;
}

/* ===================== MENU GRID ===================== */
.menu-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}
@media (max-width: 600px) {
    .menu-grid { grid-template-columns: 1fr; }
}
.menu-item {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 18px;
    display: flex;
    gap: 14px;
    align-items: flex-start;
}
.menu-icon {
    font-size: 1.5rem;
    flex-shrink: 0;
    width: 38px;
    text-align: center;
}
.menu-name {
    font-weight: 700;
    color: #1e40af;
    font-size: 0.95rem;
    margin-bottom: 5px;
}
.menu-desc {
    color: #475569;
    font-size: 0.85rem;
    line-height: 1.55;
}

/* ===================== GUIDE BLOCKS ===================== */
.guide-block {
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 16px;
}
.guide-block-header {
    background: #f1f5f9;
    padding: 12px 20px;
    font-weight: 700;
    color: #1e3a5f;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid #e2e8f0;
}
.guide-num {
    background: #2563eb;
    color: white;
    padding: 3px 10px;
    border-radius: 999px;
    font-size: 0.8rem;
    font-weight: 800;
}
.guide-block-body {
    padding: 20px 24px;
    font-size: 0.92rem;
    color: #334155;
    line-height: 1.65;
}
.guide-block-body ul {
    padding-left: 1.4rem;
    margin: 8px 0;
}
.guide-block-body li { margin-bottom: 4px; }
.mt-12 { margin-top: 12px; }

/* ===================== STATS ROW ===================== */
.stat-row {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 14px 0;
}
.stat-chip {
    padding: 8px 14px;
    border-radius: 10px;
    font-size: 0.82rem;
    font-weight: 600;
    flex: 1;
    min-width: 180px;
}
.stat-chip.target  { background: #fee2e2; color: #991b1b; }
.stat-chip.wajib   { background: #fef3c7; color: #92400e; }
.stat-chip.std     { background: #dbeafe; color: #1e40af; }

/* ===================== BADGES ===================== */
.badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 700;
}
.badge.rendah  { background: #dcfce7; color: #166534; }
.badge.sedang  { background: #fef3c7; color: #92400e; }
.badge.tinggi  { background: #fee2e2; color: #991b1b; }

.badge-row {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin: 10px 0;
}
.badge-cat {
    padding: 4px 12px;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 700;
}
.badge-cat.larangan   { background: #fecaca; color: #7f1d1d; }
.badge-cat.perintah   { background: #bfdbfe; color: #1e3a8a; }
.badge-cat.peringatan { background: #fde68a; color: #78350f; }
.badge-cat.aman       { background: #bbf7d0; color: #14532d; }
.badge-cat.informasi  { background: #e0f2fe; color: #0c4a6e; }
.badge-cat.berbahaya  { background: #fecdd3; color: #881337; }

/* ===================== TABLE ===================== */
.manual-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 14px;
    font-size: 0.88rem;
}
.manual-table th,
.manual-table td {
    border: 1px solid #e2e8f0;
    padding: 11px 14px;
    text-align: left;
    vertical-align: top;
}
.manual-table th {
    background: #e0f2fe;
    font-weight: 700;
    color: #1e3a5f;
    font-size: 0.82rem;
}
.manual-table tr:nth-child(even) td { background: #f8fafc; }

/* ===================== FAB GUIDE ===================== */
.fab-guide {
    display: flex;
    flex-direction: column;
    gap: 14px;
}
.fab-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 20px 22px;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
}
.fab-item.fab-yellow { background: #fffbeb; border-color: #fde68a; }
.fab-item.fab-blue   { background: #eff6ff; border-color: #bfdbfe; }
.fab-circle {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
}
.fab-circle.yellow { background: #facc15; }
.fab-circle.blue   { background: #2563eb; }
.fab-title {
    font-weight: 700;
    color: #1e293b;
    font-size: 0.95rem;
    margin-bottom: 5px;
}
.fab-desc {
    color: #475569;
    font-size: 0.88rem;
    line-height: 1.6;
}

/* ===================== WARNING BANNER ===================== */
.warning-banner {
    background: #fffbeb;
    border: 1px solid #fde68a;
    border-left: 5px solid #f59e0b;
    border-radius: 14px;
    padding: 20px 22px;
    display: flex;
    gap: 16px;
    align-items: flex-start;
    margin-top: 36px;
    color: #78350f;
    font-size: 0.92rem;
    line-height: 1.6;
}
.warning-icon { font-size: 1.4rem; flex-shrink: 0; }

/* ===================== PRINT ===================== */
@media print {
    header, footer, nav,
    .manual-bubble-btn,
    .team-bubble-btn,
    .download-btn { display: none !important; }
    .manual-hero { padding-top: 20px; }
    .manual-card { box-shadow: none; margin-top: 0; }
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
document.getElementById('downloadPDF').addEventListener('click', function () {
    const element = document.getElementById('manualContent');
    const opt = {
        margin: 0.4,
        filename: 'Manual_Book_K3_PLN.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(element).save();
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>