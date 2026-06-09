<?php require_once __DIR__ . '/includes/header.php'; ?>

    <main class="container page-layout">
        <section class="risk-section">
            <div class="page-heading-elegant">
                <span class="badge">Manajemen Risiko Lanjutan</span>
                <h1>Identifikasi Bahaya & Pengendalian</h1>
                <p>Sistem terpadu pemantauan potensi bahaya operasional ketenagalistrikan, dilengkapi langkah preventif serta standar proteksi APD wajib secara <i>real-time</i>.</p>
            </div>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger shadow-sm rounded-lg border-danger mb-4">
                    <i class="ri-error-warning-fill mr-2"></i> <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <div class="card card--floating table-wrapper mt-4">
                <div class="card__header bg-blue-grad text-white px-4 py-3">
                    <h3 class="m-0 fs-5 font-weight-bold d-flex align-items-center gap-2">
                        <i class="ri-server-line"></i> Master Data Profil Risiko (Public View)
                    </h3>
                </div>
                <div class="p-0 overflow-x-auto">
                    <table class="table table-hover table-striped risk-table m-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3 px-4 text-dark"><i class="ri-map-pin-user-line text-primary"></i> Zona Lokasi</th>
                                <th class="py-3 px-4 text-dark"><i class="ri-thunderstorms-line text-primary"></i> Pemicu/Sumber Bahaya</th>
                                <th class="py-3 px-4 text-dark text-center"><i class="ri-error-warning-line text-warning"></i> Skala Bahaya</th>
                                <th class="py-3 px-4 text-dark"><i class="ri-shield-cross-line text-success"></i> Solusi Protektif & APD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($data_k3) && is_array($data_k3) && count($data_k3) > 0): ?>
                                <?php foreach ($data_k3 as $row): 
                                    $label_kategori = 'Rendah';
                                    if ($row['kategori'] === 'badge--danger') $label_kategori = 'Tinggi';
                                    elseif ($row['kategori'] === 'badge--warning') $label_kategori = 'Sedang';
                                ?>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold align-middle"><?= htmlspecialchars($row['lokasi'], ENT_QUOTES, 'UTF-8', false) ?></td>
                                    <td class="py-3 px-4 align-middle"><?= htmlspecialchars($row['sumber_bahaya'], ENT_QUOTES, 'UTF-8', false) ?></td>
                                    <td class="py-3 px-4 align-middle text-center" style="text-align: center !important;"><span class="badge <?= htmlspecialchars($row['kategori']) ?> badge--soft-shadow"><?= $label_kategori ?></span></td>
                                    <td class="py-3 px-4 align-middle text-muted"><?= htmlspecialchars($row['tindakan_pencegahan'], ENT_QUOTES, 'UTF-8', false) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="ri-inbox-archive-line fs-2 d-block mb-3 text-light-gray"></i>
                                        Sinkronisasi aman: Belum ada rekaman hazard aktif hari ini.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
