<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="h3 font-weight-bold text-dark m-0">Manajemen Pengguna (RBAC)</h1>
        <p class="text-muted mt-1 mb-0">Pemantauan data otoritasi akses dan delegasi role sistem admin.</p>
    </div>
</div>

<!-- 4 CARDS STATS GRID FOR ROLES -->
<div class="row mb-5">
    <div class="col-md-3 mb-4">
        <div class="stat-card h-100" style="margin: 0;">
            <div class="stat-card__icon text-danger" style="background: #fef2f2;"><i class="ri-admin-line"></i></div>
            <div>
                <div class="stat-card__number"><?= htmlspecialchars($stats['super_admin'] ?? 0) ?></div>
                <div class="stat-card__label">Role: Super Admin</div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="stat-card h-100" style="margin: 0;">
            <div class="stat-card__icon text-warning" style="background: #fffbeb;"><i class="ri-user-settings-line"></i></div>
            <div>
                <div class="stat-card__number"><?= htmlspecialchars($stats['admin_k3'] ?? 0) ?></div>
                <div class="stat-card__label">Role: Admin K3</div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="stat-card h-100" style="margin: 0;">
            <div class="stat-card__icon text-primary" style="background: #eff6ff;"><i class="ri-user-star-line"></i></div>
            <div>
                <div class="stat-card__number"><?= htmlspecialchars($stats['operator'] ?? 0) ?></div>
                <div class="stat-card__label">Role: Operator</div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="stat-card h-100" style="margin: 0;">
            <div class="stat-card__icon text-success" style="background: #ecfdf5;"><i class="ri-user-search-line"></i></div>
            <div>
                <div class="stat-card__number"><?= htmlspecialchars($stats['viewer'] ?? 0) ?></div>
                <div class="stat-card__label">Role: Viewer</div>
            </div>
        </div>
    </div>
</div>

<section class="data-section">
    <div class="card border-0 shadow-sm rounded-lg bg-white overflow-hidden">
        
        <div class="p-3 border-bottom d-flex justify-content-between align-items-center bg-light" style="background:#f8fafc!important;">
            <h3 class="m-0 fs-6 font-weight-bold d-flex align-items-center gap-2 text-dark">
                <i class="ri-group-line text-primary"></i> Daftar Pengguna Sistem Terdaftar
            </h3>
            <div class="text-muted fs-7">
                Total Pegawai Terdaftar: <b><?= htmlspecialchars($stats['total'] ?? 0) ?></b> user
            </div>
        </div>

        <div class="table-wrapper p-0 overflow-x-auto">
            <table class="table table-hover table-striped m-0">
                <thead class="bg-white border-bottom">
                    <tr>
                        <th class="py-3 px-4 text-center" style="width: 80px;">ID</th>
                        <th class="py-3">Username / NIP</th>
                        <th class="py-3 text-center">Hak Akses Role</th>
                        <th class="py-3">Tgl Registrasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($users) && is_array($users) && count($users) > 0): ?>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="align-middle px-4 text-center text-muted fw-bold">#<?= htmlspecialchars($user['id']) ?></td>
                            <td class="align-middle font-weight-semibold text-dark"><?= htmlspecialchars($user['username']) ?></td>
                            <td class="align-middle text-center">
                                <?php if($user['role'] === 'super_admin'): ?>
                                    <span class="badge badge--danger badge--soft-shadow m-0 p-1 px-3 border-0">Super Admin</span>
                                <?php elseif($user['role'] === 'admin_k3'): ?>
                                    <span class="badge badge--warning badge--soft-shadow m-0 p-1 px-3 border-0">Admin K3</span>
                                <?php elseif($user['role'] === 'operator'): ?>
                                    <span class="badge badge--info badge--soft-shadow m-0 p-1 px-3 border-0">Operator</span>
                                <?php else: ?>
                                    <span class="badge badge--success badge--soft-shadow m-0 p-1 px-3 border-0">Viewer</span>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle text-muted"><?= htmlspecialchars(date('d F Y', strtotime($user['created_at']))) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <i class="ri-user-unfollow-line fs-1 d-block mb-3 text-muted" style="opacity: 0.3; font-size:4rem!important;"></i>
                                <h4 class="text-dark fs-5 font-weight-bold">Belum ada user yang ditambahkan.</h4>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
