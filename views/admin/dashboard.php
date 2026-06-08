<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 font-weight-bold text-dark m-0">Ringkasan Eksekutif K3</h1>
        <p class="text-muted mt-1">Sistem Pemantauan Terpadu PLN</p>
    </div>
    <span class="badge badge--soft badge--info px-3 py-2 fs-7 m-0"><i class="ri-calendar-line"></i> <?= date('d F Y') ?></span>
</div>

<?php
$status_bg = $total_tinggi > 0 ? 'bg-danger-light border-danger text-danger' : 'bg-success-light border-success text-success';
$status_icon = $total_tinggi > 0 ? 'ri-alarm-warning-fill' : 'ri-shield-check-fill';
$status_text = $total_tinggi > 0 ? 'Perlu Pemantauan' : 'Terkendali';
?>
<!-- Ringkasan Eksekutif Panel -->
<!-- Ringkasan Eksekutif Panel -->
<div class="card border-0 shadow-sm rounded-lg mb-4" style="background-color: <?= $total_tinggi > 0 ? '#fef2f2' : '#f0fdf4' ?>; position: relative; overflow: hidden;">
    <div style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: <?= $total_tinggi > 0 ? '#ef4444' : '#10b981' ?>;"></div>
    <div class="card__body p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3" style="padding-left: 1.5rem !important;">
        <div>
            <h5 class="font-weight-bold m-0 mb-2">Status Keselamatan: <span class="<?= $total_tinggi > 0 ? 'text-danger' : 'text-success' ?>"><?= $status_text ?></span></h5>
            <p class="text-muted m-0 fs-6" style="line-height: 1.6;">
                Dari total <strong class="text-dark"><?= htmlspecialchars($total_risiko) ?></strong> profil risiko yang tercatat, terdapat 
                <strong class="<?= $total_tinggi > 0 ? 'text-danger font-weight-bold' : 'text-dark' ?>"><?= htmlspecialchars($total_tinggi) ?></strong> risiko tinggi, 
                <strong class="text-warning"><?= htmlspecialchars($total_sedang) ?></strong> risiko sedang, dan 
                <strong class="text-success"><?= htmlspecialchars($total_rendah) ?></strong> risiko rendah.
            </p>
        </div>
        <div class="icon-box flex-shrink-0 d-flex align-items-center justify-content-center bg-white shadow-sm" style="font-size: 2.5rem; <?= $total_tinggi > 0 ? 'color: #ef4444;' : 'color: #10b981;' ?> width: 70px; height: 70px; border-radius: 50%;">
            <i class="<?= $status_icon ?>"></i>
        </div>
    </div>
</div>

<!-- 4 Stats Cards -->
<div class="row mb-5">
    <div class="col-md-3 mb-3">
        <div class="stat-card h-100" style="margin: 0;">
            <div class="stat-card__icon text-primary" style="background: #eff6ff;"><i class="ri-global-line"></i></div>
            <div>
                <div class="stat-card__number"><?= htmlspecialchars($total_risiko) ?></div>
                <div class="stat-card__label">Total Risiko</div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card h-100" style="margin: 0;">
            <div class="stat-card__icon text-danger" style="background: #fef2f2;"><i class="ri-fire-fill"></i></div>
            <div>
                <div class="stat-card__number"><?= htmlspecialchars($total_tinggi) ?></div>
                <div class="stat-card__label">Risiko Tinggi</div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card h-100" style="margin: 0;">
            <div class="stat-card__icon text-warning" style="background: #fffbeb;"><i class="ri-alarm-warning-fill"></i></div>
            <div>
                <div class="stat-card__number"><?= htmlspecialchars($total_sedang) ?></div>
                <div class="stat-card__label">Risiko Sedang</div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card h-100" style="margin: 0;">
            <div class="stat-card__icon text-success" style="background: #ecfdf5;"><i class="ri-shield-check-fill"></i></div>
            <div>
                <div class="stat-card__number"><?= htmlspecialchars($total_rendah) ?></div>
                <div class="stat-card__label">Risiko Rendah</div>
            </div>
        </div>
    </div>
</div>

<!-- Activity Log -->
<div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
    <div class="card__header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 fs-6 font-weight-bold d-flex align-items-center gap-2 text-dark">
            <i class="ri-history-line text-primary"></i> Aktivitas Terbaru Sistem
        </h3>
        <span class="badge badge-light border text-muted px-2 py-1"><i class="ri-live-line text-danger mr-1"></i> Live Log</span>
    </div>
    <div class="p-0">
        <?php if (!empty($recent_activities)): ?>
            <ul class="list-group list-group-flush m-0 list-unstyled ps-0">
                <?php foreach ($recent_activities as $log): ?>
                <li class="p-3 border-bottom d-flex align-items-start gap-3 hover-bg-light transition-all">
                    <div class="icon-box icon-box--small bg-light text-secondary flex-shrink-0 border"><i class="ri-user-settings-line"></i></div>
                    <div>
                        <p class="m-0 font-weight-semibold text-dark fs-7">
                            <span class="text-primary mr-1">[<?= htmlspecialchars($log['username']) ?>]</span>
                            <?= htmlspecialchars($log['activity']) ?>
                        </p>
                        <small class="text-muted"><i class="ri-time-line"></i> <?= htmlspecialchars(date('d M Y - H:i', strtotime($log['created_at']))) ?></small>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="ri-inbox-archive-line" style="font-size: 3rem; color: #cbd5e1;"></i>
                <h4 class="mt-3 text-dark fs-6 font-weight-bold">Belum Ada Aktivitas Tercatat</h4>
                <p class="text-muted fs-7">Login, logout, dan perubahan data akan muncul di sini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.activity-item { animation: fadeIn 0.4s ease-in-out; }
@keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
</style>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
