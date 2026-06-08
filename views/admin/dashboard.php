<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 font-weight-bold text-dark m-0">Ringkasan Eksekutif K3</h1>
        <p class="text-muted mt-1">Sistem Pemantauan Terpadu BUMN PLN</p>
    </div>
    <div>
        <span class="badge badge--soft badge--info px-3 py-2 fs-7 m-0"><i class="ri-calendar-line"></i> <?= date('d F Y') ?></span>
    </div>
</div>

<!-- Cards -->
<div class="stats__grid mb-5" style="margin-top: 0">
    <div class="stat-card" style="margin: 0;">
        <div class="stat-card__icon text-primary" style="background: #eff6ff;"><i class="ri-global-line"></i></div>
        <div>
            <div class="stat-card__number"><?= $total_risiko ?></div>
            <div class="stat-card__label">Total Matriks Risiko</div>
        </div>
    </div>
    <div class="stat-card" style="margin: 0;">
        <div class="stat-card__icon text-danger" style="background: #fef2f2;"><i class="ri-fire-fill"></i></div>
        <div>
            <div class="stat-card__number"><?= $total_tinggi ?></div>
            <div class="stat-card__label">Risiko Tinggi / Letal</div>
        </div>
    </div>
    <div class="stat-card" style="margin: 0;">
        <div class="stat-card__icon text-warning" style="background: #fffbeb;"><i class="ri-alarm-warning-fill"></i></div>
        <div>
            <div class="stat-card__number"><?= $total_sedang ?></div>
            <div class="stat-card__label">Risiko Sedang</div>
        </div>
    </div>
    <div class="stat-card" style="margin: 0;">
        <div class="stat-card__icon text-success" style="background: #ecfdf5;"><i class="ri-shield-check-fill"></i></div>
        <div>
            <div class="stat-card__number"><?= $total_rendah ?></div>
            <div class="stat-card__label">Risiko Rendah / Aman</div>
        </div>
    </div>
</div>

<!-- Dummy Activity Log -->
<div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
    <div class="card__header bg-white border-bottom px-4 py-3">
        <h3 class="m-0 fs-6 font-weight-bold d-flex align-items-center gap-2 text-dark">
            <i class="ri-history-line text-primary"></i> Log Aktivitas Terbaru
        </h3>
    </div>
    <div class="p-0">
        <ul class="list-group list-group-flush m-0 list-unstyled ps-0">
            <li class="p-3 border-bottom d-flex align-items-start gap-3 hover-bg-light transition-all">
                <div class="icon-box icon-box--small bg-blue-light text-primary flex-shrink-0"><i class="ri-user-received-2-line"></i></div>
                <div>
                    <p class="m-0 font-weight-semibold text-dark fs-7">Sesi autentikasi admin berhasil dilakukan.</p>
                    <small class="text-muted"><i class="ri-time-line"></i> Beberapa saat yang lalu | IP: <?= $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1' ?></small>
                </div>
            </li>
            <li class="p-3 border-bottom d-flex align-items-start gap-3 hover-bg-light transition-all">
                <div class="icon-box icon-box--small bg-orange-light text-warning flex-shrink-0"><i class="ri-database-2-line"></i></div>
                <div>
                    <p class="m-0 font-weight-semibold text-dark fs-7">Sistem melakukan backup *database* otomatis mingguan kelima.</p>
                    <small class="text-muted"><i class="ri-time-line"></i> 2 hari yang lalu</small>
                </div>
            </li>
            <li class="p-3 d-flex align-items-start gap-3 hover-bg-light transition-all">
                <div class="icon-box icon-box--small bg-green-light text-success flex-shrink-0" style="background:#d1fae5; color:#059669;"><i class="ri-shield-star-line"></i></div>
                <div>
                    <p class="m-0 font-weight-semibold text-dark fs-7">Keamanan port 80/443 berhasil dikalibrasi ke Standar ISO 27001.</p>
                    <small class="text-muted"><i class="ri-time-line"></i> 1 minggu yang lalu</small>
                </div>
            </li>
        </ul>
    </div>
</div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
