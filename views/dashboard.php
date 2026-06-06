<?php require_once 'views/includes/header.php'; ?>

    <main class="container page-layout pb-6">
        
        <div class="section-header d-flex flex-wrap justify-content-between align-items-end mb-5 gap-4">
            <div>
                <span class="section-label">Otoritas Superuser Dashboard</span>
                <h1 class="section-title text-dark">Data Center API Controller</h1>
                <p class="section-desc mt-2 text-muted max-w-2xl">Manipulasi master data tabel matriks risiko secara real-time. Mode *Prepared Statements* MySQL PDO aktif dan memantau operasi C.R.U.D ini untuk perlindungan lapis ganda XSS/SQL Injection.</p>
            </div>
            <a href="dashboard.php?action=logout" onclick="return confirm('Sesi Inspector K3 anda akan dihancurkan (Destroy). Anda yakin?');" class="btn btn--flat text-danger px-4 py-2 hover-bg-danger-light rounded d-flex align-items-center gap-2 font-weight-bold">
                Singkap Perisai (Logout) <i class="ri-logout-circle-r-line fs-5"></i>
            </a>
        </div>

        <?php if(isset($error) && $error): ?>
            <div class="alert alert-danger shadow-sm border-danger rounded mb-4 d-flex align-items-center gap-2 font-weight-medium">
                <i class="ri-alarm-warning-fill fs-5"></i> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <?php if(isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
            <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2 font-weight-medium">
                <i class="ri-check-double-line fs-5"></i> Target sel data sudah dilenyapkan dari arsitektur MySQL!
            </div>
        <?php elseif(isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
            <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2 font-weight-medium">
                <i class="ri-check-double-line fs-5"></i> Injeksi data kompilasi mitigasi sukses dienkripsi ke database server.
            </div>
        <?php endif; ?>

        <!-- AREA 1: Form Input Modern -->
        <section class="crud-section mb-6">
            <div class="card card--floating border-0 pt-0 pb-2 px-1">
                <div class="card__header bg-transparent border-bottom px-4 pt-4 pb-3 mb-4">
                    <h3 class="m-0 fs-5 font-weight-bold text-dark d-flex align-items-center gap-2">
                        <div class="icon-box icon-box--small bg-orange-light text-warning"><i class="ri-add-box-line"></i></div>
                        Portal Penambahan Laporan Mitigasi Baru
                    </h3>
                </div>
                
                <form method="POST" action="dashboard.php" class="px-4 pb-4">
                    <input type="hidden" name="action" value="add">
                    <div class="crud-grid">
                        <div class="form-group mb-0">
                            <label class="text-sm font-weight-bold text-dark mb-2">Koordinat Lokasi Ruang</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ri-map-pin-2-line"></i></span>
                                <input type="text" name="lokasi" class="form-control bg-light" placeholder="Contoh: Turbin Sector B" required>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label class="text-sm font-weight-bold text-dark mb-2">Sumber/Klaim Bahaya</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ri-thunderstorms-line"></i></span>
                                <input type="text" name="sumber" class="form-control bg-light" placeholder="Contoh: Panas Eksos" required>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label class="text-sm font-weight-bold text-dark mb-2">Klasifikasi/Tag Bahaya</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ri-price-tag-3-line"></i></span>
                                <select name="kategori" class="form-control bg-light" required>
                                    <option value="badge--danger">🔴 Level Energi Letal / Terbakar</option>
                                    <option value="badge--warning">🟡 Gelombang Fisikal / Suhu / Bising</option>
                                    <option value="badge--info">🔵 Kecelakaan Logistik / Tumbukan Mekanis</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label class="text-sm font-weight-bold text-dark mb-2">Resep Toleransi / Pencegahan Tepat</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ri-shield-check-line"></i></span>
                                <input type="text" name="cegah" class="form-control bg-light" placeholder="Contoh: Ear Muff tingkat A" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-2 border-top">
                        <button type="submit" class="btn btn--primary btn--shadow px-5 d-inline-flex gap-2 align-items-center">
                            Suntikkan Ke Data Master <i class="ri-upload-cloud-2-line"></i>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- AREA 2: Tabel Manajemen Bersih -->
        <section class="data-section">
            <div class="card card--floating border-0">
                <div class="card__header bg-dark text-white px-4 py-3 d-flex justify-content-between align-items-center">
                    <h3 class="m-0 fs-5 font-weight-bold d-flex align-items-center gap-2">
                        <i class="ri-hard-drive-2-fill text-warning"></i> Arsip Log Database Master
                    </h3>
                    <span class="badge bg-white text-dark"><?= count($data_k3) ?> Total Node.</span>
                </div>
                <div class="table-wrapper p-0 overflow-x-auto">
                    <table class="table table-hover table-striped risk-table m-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3 text-center" style="width: 80px;">IndexID</th>
                                <th class="py-3">Titik Navigasi</th>
                                <th class="py-3">Ancaman Teknis</th>
                                <th class="py-3">Filter Tag</th>
                                <th class="py-3">Deskripsi Eksekusi SOP</th>
                                <th class="py-3 text-center" style="width: 140px;">Proses Validasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($data_k3) && is_array($data_k3) && count($data_k3) > 0): ?>
                                <?php foreach ($data_k3 as $row): 
                                    $label = 'Fisik';
                                    if ($row['kategori'] === 'badge--danger') $label = 'Energi Ekstrem';
                                    else if ($row['kategori'] === 'badge--info') $label = 'Dampak Benda';
                                ?>
                                <tr>
                                    <td class="align-middle text-center text-muted fw-bold">#<?= htmlspecialchars($row['id']) ?></td>
                                    <td class="align-middle fw-semibold text-dark"><?= htmlspecialchars($row['lokasi']) ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($row['sumber_bahaya']) ?></td>
                                    <td class="align-middle"><span class="badge <?= htmlspecialchars($row['kategori']) ?> badge--soft-shadow"><?= $label ?></span></td>
                                    <td class="align-middle text-muted"><?= htmlspecialchars($row['tindakan_pencegahan']) ?></td>
                                    <td class="align-middle text-center">
                                        <a href="dashboard.php?action=delete&id=<?= htmlspecialchars($row['id']) ?>" onclick="return confirm('PERINGATAN: Membay-pass ini akan mengeksekusi DELETE raw dari tabel ID #<?= $row['id'] ?> selamanya. SETUJU?');" class="btn btn--flat text-danger px-3 py-1 hover-bg-danger-light rounded font-weight-semibold d-inline-flex align-items-center gap-1 transition-all">
                                            Luruhkan <i class="ri-close-circle-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="ri-folder-forbid-line fs-1 d-block mb-2 text-light-gray"></i>
                                        Index kosong secara absolut. Tabel database nihil objek row.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

<?php require_once 'views/includes/footer.php'; ?>
