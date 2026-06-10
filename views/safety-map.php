<?php require_once __DIR__ . '/includes/header.php'; ?>

    <main class="container page-layout">
        
        <section class="page-heading-elegant">
            <span class="badge">Safety Mapping & Guidance</span>
            <h1>Denah Evakuasi & Rambu Keselamatan</h1>
            <p>Infrastruktur pemetaan zonasi bahaya secara makro, dilengkapi dengan panduan katalog 13 set Rambu K3 Internasional yang berstandar SNI.</p>
        </section>

        <section class="map-showcase mb-4">
            <div class="card card--floating">
                <div class="card__header px-4 py-3 d-flex align-items-center justify-content-between">
                    <h2 class="m-0 fs-5 font-weight-bold d-flex align-items-center gap-2">
                        <i class="ri-map-2-line"></i> Denah Zonasi Proteksi
                    </h2>
                    <span class="badge border-0" style="background-color: var(--pln-blue-light); color: var(--pln-blue);">Terverifikasi 2026</span>
                </div>
                <div class="card__body text-center mt-2">
                    <p class="text-muted mb-4 px-md-5" style="text-align: justify;">
                        Visualisasi pemetaan area bahaya secara makro pada infrastruktur gedung operasional, memandu personel ke titik kumpul darurat (Assembly Point) melalui jalur evakuasi yang aman.
                    </p>
                    <div class="img-wrapper shadow-soft rounded-xl overflow-hidden border">
                        <img src="assets/images/peta-k3-pln.png" alt="Denah Jalur Evakuasi dan Peta K3 PLN" class="map-responsive w-100" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </section>

        <section class="signs-section">
            <div class="card card--floating table-wrapper mt-4">
                <div class="card__header bg-blue-grad text-white px-4 py-3 border-0">
                    <h3 class="m-0 fs-5 font-weight-bold d-flex align-items-center gap-2">
                        <i class="ri-information-line"></i> Katalog 13 Rambu K3 PLN
                    </h3>
                </div>
                <div class="p-0 overflow-x-auto">
                    <table class="table table-striped table-hover signs-table m-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center py-3" style="width: 60px; text-align: center !important;">NO</th>
                                <th class="py-3"><i class="ri-flag-line text-primary me-1"></i> Kategori Rambu</th>
                                <th class="text-center py-3" style="text-align: center !important;"><i class="ri-price-tag-3-line text-warning me-1"></i> Klasifikasi</th>
                                <th class="py-3"><i class="ri-file-info-line text-success me-1"></i> Definisi Operasional</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">1</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Dilarang masuk</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--danger badge--soft-shadow">Larangan</span></td><td class="align-middle text-muted" style="text-align: justify;">Akses terkunci mutlak bagi anonim yang tidak berkepentingan teknis.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">2</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Wajib memakai APD</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--primary badge--soft-shadow">Perintah</span></td><td class="align-middle text-muted" style="text-align: justify;">Syarat mutlak memakai (helm, sepatu EH, rompi, dsbg) sebelum akses.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">3</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Bahaya tegangan tinggi</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted" style="text-align: justify;">Risiko letal akibat paparan langsung/induksi grid di atas standar aman.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">4</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Bahaya umum</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted" style="text-align: justify;">Peringatan siaga akan hazard non-spesifik namun cukup merugikan.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">5</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Titik kumpul darurat</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--success badge--soft-shadow">Kondisi Aman</span></td><td class="align-middle text-muted" style="text-align: justify;">Assembly point tersertifikasi aman saat aktivasi protokol darurat (SIRINE).</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">6</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Jalur evakuasi</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--success badge--soft-shadow">Kondisi Aman</span></td><td class="align-middle text-muted" style="text-align: justify;">Panduan rute bypass escape menjauhi titik letal insiden (Ground Zero).</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">7</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Material reaktif</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted" style="text-align: justify;">Mengandung fluida / gas residu yang bersifat sangat korosif atau gampang terbakar.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">8</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Max Load Capacity</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--info badge--soft-shadow">Informasi</span></td><td class="align-middle text-muted" style="text-align: justify;">Toleransi berat maksimal yang ditahan pondasi/struktur mekanis gantung.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">9</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Fire Hydrant</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--danger badge--soft-shadow">Berbahaya</span></td><td class="align-middle text-muted" style="text-align: justify;">Posisi katup suplai air pemadam tekanan tinggi bagi tim <strong>Fire Rescue</strong>.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">10</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Bahaya rotor statis</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted" style="text-align: justify;">Bisa memotong atau menarik pakaian/kulit apabila masuk threshold zone.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">11</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Pintu emergensi</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--success badge--soft-shadow">Kondisi Aman</span></td><td class="align-middle text-muted" style="text-align: justify;">Hanya boleh di <strong>breach</strong> ketika alur lorong normal sudah terblokir.</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">12</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Letak Tabung APAR</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--danger badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted" style="text-align: justify;">Alat Pemadam Api Ringan spesifik untuk hazard listrik (Gas CO2/Dry Chem).</td></tr>
                            <tr><td class="text-center align-middle" style="text-align: center !important;">13</td><td class="fw-semibold align-middle text-dark" style="text-align: justify;">Zona Heavy Logistic</td><td class="align-middle text-center" style="text-align: center !important;"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted" style="text-align: justify;">Trafik persimpangan kendaraan logistik berat (Forklift, Crawler Crane).</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
