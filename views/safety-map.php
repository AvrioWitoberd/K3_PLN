<?php require_once 'views/includes/header.php'; ?>

    <main class="container page-layout">
        
        <section class="mapping-header text-center mb-5">
            <span class="section-label">Safety Mapping & Guidance</span>
            <h1 class="section-title">Denah Evakuasi & Rambu Keselamatan</h1>
            <p class="section-desc max-w-2xl mx-auto">Infrastruktur pemetaan zonasi bahaya secara makro di lengkapi katalog 13 set Rambu K3 Internasional berstandar SNI.</p>
        </section>

        <section class="map-showcase mb-6">
            <div class="card card--floating border-0 overflow-hidden">
                <div class="card__header bg-light border-bottom p-4 d-flex justify-content-between align-items-center">
                    <h2 class="fs-5 m-0 font-weight-bold d-flex align-items-center gap-2 text-dark">
                        <div class="icon-box icon-box--small bg-blue-light text-primary"><i class="ri-map-2-line"></i></div>
                        Denah Zonasi Proteksi
                    </h2>
                    <span class="badge badge--success">Terverifikasi 2026</span>
                </div>
                <div class="card__body p-0 bg-white d-flex justify-content-center align-items-center">
                    <img src="assets/images/peta-k3-pln.png" alt="Denah Jalur Evakuasi dan Peta K3 PLN" class="map-responsive w-100" style="object-fit: cover;">
                </div>
            </div>
        </section>

        <section class="signs-section mt-5">
            <div class="card card--floating mt-4">
                <div class="card__header px-4 py-3 border-bottom d-flex align-items-center gap-3">
                    <div class="icon-box icon-box--small bg-orange-light text-warning"><i class="ri-information-line"></i></div>
                    <h3 class="m-0 fs-5 font-weight-bold text-dark">Katalog 13 Rambu K3 PLN</h3>
                </div>
                <div class="table-wrapper p-0 overflow-x-auto">
                    <table class="table table-striped table-hover signs-table m-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center py-3" style="width: 60px;">No</th>
                                <th class="py-3">Kategori Rambu</th>
                                <th class="py-3">Klasifikasi</th>
                                <th class="py-3">Definisi Operasional</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td class="text-center align-middle">1</td><td class="fw-semibold align-middle text-dark">Dilarang masuk</td><td class="align-middle"><span class="badge badge--danger badge--soft-shadow">Larangan</span></td><td class="align-middle text-muted">Akses terkunci mutlak bagi anonim yang tidak berkepentingan teknis.</td></tr>
                            <tr><td class="text-center align-middle">2</td><td class="fw-semibold align-middle text-dark">Wajib memakai APD</td><td class="align-middle"><span class="badge badge--primary badge--soft-shadow">Perintah</span></td><td class="align-middle text-muted">Syarat mutlak memakai (helm, sepatu EH, rompi, dsbg) sebelum akses.</td></tr>
                            <tr><td class="text-center align-middle">3</td><td class="fw-semibold align-middle text-dark">Bahaya tegangan tinggi</td><td class="align-middle"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted">Risiko letal akibat paparan langsung/induksi grid di atas standar aman.</td></tr>
                            <tr><td class="text-center align-middle">4</td><td class="fw-semibold align-middle text-dark">Bahaya umum</td><td class="align-middle"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted">Peringatan siaga akan hazard non-spesifik namun cukup merugikan.</td></tr>
                            <tr><td class="text-center align-middle">5</td><td class="fw-semibold align-middle text-dark">Titik kumpul darurat</td><td class="align-middle"><span class="badge badge--success badge--soft-shadow">Informasi</span></td><td class="align-middle text-muted">Assembly point tersertifikasi aman saat aktivasi protokol darurat (SIRINE).</td></tr>
                            <tr><td class="text-center align-middle">6</td><td class="fw-semibold align-middle text-dark">Jalur evakuasi</td><td class="align-middle"><span class="badge badge--success badge--soft-shadow">Informasi</span></td><td class="align-middle text-muted">Panduan rute bypass escape menjauhi titik letal insiden (Ground Zero).</td></tr>
                            <tr><td class="text-center align-middle">7</td><td class="fw-semibold align-middle text-dark">Material reaktif</td><td class="align-middle"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted">Mengandung fluida / gas residu yang bersifat sangat korosif atau gampang terbakar.</td></tr>
                            <tr><td class="text-center align-middle">8</td><td class="fw-semibold align-middle text-dark">Max Load Capacity</td><td class="align-middle"><span class="badge badge--info badge--soft-shadow">Informasi</span></td><td class="align-middle text-muted">Toleransi berat maksimal yang ditahan pondasi/struktur mekanis gantung.</td></tr>
                            <tr><td class="text-center align-middle">9</td><td class="fw-semibold align-middle text-dark">Fire Hydrant</td><td class="align-middle"><span class="badge badge--danger badge--soft-shadow">Berbahaya</span></td><td class="align-middle text-muted">Posisi katup suplai air pemadam tekanan tinggi bagi tim *Fire Rescue*.</td></tr>
                            <tr><td class="text-center align-middle">10</td><td class="fw-semibold align-middle text-dark">Bahaya rotor statis</td><td class="align-middle"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted">Bisa memotong atau menarik pakaian/kulit apabila masuk threshold zone.</td></tr>
                            <tr><td class="text-center align-middle">11</td><td class="fw-semibold align-middle text-dark">Pintu emergensi</td><td class="align-middle"><span class="badge badge--success badge--soft-shadow">Informasi</span></td><td class="align-middle text-muted">Hanya boleh di *breach* ketika alur lorong normal sudah terblokir.</td></tr>
                            <tr><td class="text-center align-middle">12</td><td class="fw-semibold align-middle text-dark">Letak Tabung APAR</td><td class="align-middle"><span class="badge badge--danger badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted">Alat Pemadam Api Ringan spesifik untuk hazard listrik (Gas CO2/Dry Chem).</td></tr>
                            <tr><td class="text-center align-middle">13</td><td class="fw-semibold align-middle text-dark">Zona Heavy Logistic</td><td class="align-middle"><span class="badge badge--warning badge--soft-shadow">Peringatan</span></td><td class="align-middle text-muted">Trafik persimpangan kendaraan logistik berat (Forklift, Crawler Crane).</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

<?php require_once 'views/includes/footer.php'; ?>
