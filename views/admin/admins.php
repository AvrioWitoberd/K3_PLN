<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="h3 font-weight-bold text-dark m-0">Manajemen Admin</h1>
        <p class="text-muted mt-1 mb-0">Kelola kredensial akun administrator sistem.</p>
    </div>
    <button class="btn btn--primary btn--shadow px-4" onclick="openModal()">
        <i class="ri-user-add-line"></i> Tambah Admin
    </button>
</div>

<?php if(isset($error) && $error): ?>
    <div class="alert alert-danger shadow-sm border-danger rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-alarm-warning-fill fs-5"></i> <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>
<?php if(isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Admin berhasil dihapus dari database.
    </div>
<?php elseif(isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Akun admin baru berhasil ditambahkan.
    </div>
<?php elseif(isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Akun admin berhasil diperbarui.
    </div>
<?php endif; ?>

<section class="data-section">
    <div class="card overflow-hidden">
        
        <div class="p-3 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 bg-light" style="background:#f8fafc!important;">
            <div class="text-muted fs-7">
                Menampilkan <b><?= count($data_admin) ?></b> akun admin yang terdaftar.
            </div>
        </div>

        <div class="table-wrapper p-0 overflow-x-auto">
            <table class="table table-hover table-striped risk-table m-0">
                <thead class="bg-white border-bottom">
                    <tr>
                        <th class="py-3 px-4 text-center" style="width: 80px;">ID</th>
                        <th class="py-3">Username</th>
                        <th class="py-3 text-center">Role / Hak Akses</th>
                        <th class="py-3">Tanggal Didaftarkan</th>
                        <th class="py-3 px-4 text-center" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data_admin) && is_array($data_admin) && count($data_admin) > 0): ?>
                        <?php foreach ($data_admin as $row): ?>
                        <tr>
                            <td class="align-middle px-4 text-center text-muted fw-bold">#<?= htmlspecialchars($row['id']) ?></td>
                            <td class="align-middle font-weight-semibold text-dark"><i class="ri-user-star-fill text-primary" style="margin-right:8px;"></i> <?= htmlspecialchars($row['username']) ?></td>
                            <td class="align-middle text-center"><span class="badge badge--info badge--soft-shadow m-0 p-1 px-3 border-0 text-uppercase"><?= htmlspecialchars($row['role']) ?></span></td>
                            <td class="align-middle text-muted"><?= htmlspecialchars(date('d M Y - H:i', strtotime($row['created_at']))) ?></td>
                            <td class="align-middle px-4 text-center">
                                <?php if($row['id'] != $_SESSION['user_id']): ?>
                                <div class="action-dropdown dropdown-toggle-container">
                                    <button class="btn btn--flat text-primary p-2 border shadow-none bg-white d-flex align-items-center gap-1 rounded" type="button" onclick="toggleMenu(<?= $row['id'] ?>)">
                                        <i class="ri-more-2-fill fs-5"></i> <span>Aksi</span>
                                    </button>
                                    <div class="action-menu text-start" id="menu-<?= $row['id'] ?>">
                                        <a href="admins.php?action=edit&id=<?= htmlspecialchars($row['id']) ?>" class="action-item text-primary">
                                            <i class="ri-edit-line"></i> Edit
                                        </a>
                                        <form method="POST" action="admins.php" class="m-0 p-0 w-100" style="display:block;">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                                            <button type="submit" onclick="return confirm('Hapus permanen akun admin <?= $row['username'] ?>?');" class="action-item text-danger w-100 border-0 bg-transparent text-start">
                                                <i class="ri-delete-bin-line"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <?php else: ?>
                                <span class="badge badge--soft border-0 text-muted m-0 p-1 px-2"><i class="ri-shield-user-fill"></i> Akun Anda</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="ri-group-line fs-1 d-block mb-3 text-muted" style="opacity: 0.3; font-size:4rem!important;"></i>
                                <h4 class="text-dark fs-5 font-weight-bold">Tidak ada admin.</h4>
                                <p class="text-muted">Data kosong, hal ini tidak seharusnya terjadi.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Add/Edit -->
<div id="adminModal" class="modal-backdrop <?= (isset($edit_data) && $edit_data) ? 'show' : '' ?>">
    <div class="modal-dialog">
        <div class="modal-content border-0">
             <div class="modal-header bg-light border-bottom">
                  <h5 class="m-0 font-weight-bold text-dark d-flex align-items-center gap-2">
                       <i class="<?= isset($edit_data) && $edit_data ? 'ri-edit-box-line text-primary' : 'ri-user-add-line text-success' ?> fs-4"></i>
                       <?= isset($edit_data) && $edit_data ? 'Edit Admin: ID #'.$edit_data['id'] : 'Tambah Administrator' ?>
                  </h5>
                  <button type="button" class="btn-close text-muted" onclick="closeModal()"><i class="ri-close-line"></i></button>
             </div>
             <div class="modal-body p-4 bg-white">
                <form method="POST" action="admins.php">
                    <input type="hidden" name="action" value="<?= isset($edit_data) && $edit_data ? 'edit' : 'add' ?>">
                    <?php if(isset($edit_data) && $edit_data): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($edit_data['id']) ?>">
                    <?php endif; ?>
                    <div class="form-group mb-4">
                        <label class="text-sm font-weight-bold text-dark mb-2">Username Administrator</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-user-line text-muted"></i></span>
                            <input type="text" name="username" class="form-control border-start-0" placeholder="Username unik (tanpa spasi disarankan)" required value="<?= isset($edit_data) && $edit_data ? htmlspecialchars($edit_data['username']) : '' ?>">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label class="text-sm font-weight-bold text-dark mb-2">Password <?= isset($edit_data) && $edit_data ? '(Kosongkan jika tidak ingin mengubah)' : 'Baru' ?></label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-lock-line text-muted"></i></span>
                            <input type="password" name="password" class="form-control border-start-0" placeholder="Ketik kata sandi yang kuat" <?= isset($edit_data) && $edit_data ? '' : 'required' ?>>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top border-light d-flex gap-3 justify-content-end">
                        <button type="button" class="btn btn--flat text-muted px-4 hover-bg-light rounded font-weight-semibold" onclick="closeModal()">Batal</button>
                        <button type="submit" class="btn btn--primary btn--shadow px-4 d-inline-flex gap-2">
                            <?= isset($edit_data) && $edit_data ? 'Simpan' : 'Tambahkan Akun' ?> <i class="ri-save-3-line"></i>
                        </button>
                    </div>
                </form>
             </div>
        </div>
    </div>
</div>

<script>
    function openModal() { document.getElementById('adminModal').classList.add('show'); }
    function closeModal() {
        document.getElementById('adminModal').classList.remove('show');
        if(window.location.search.includes('action=edit')) window.location.href = 'admins.php';
    }
    function toggleMenu(id) {
        document.querySelectorAll('.action-menu').forEach(m => { if(m.id !== 'menu-'+id) m.classList.remove('show'); });
        const target = document.getElementById('menu-'+id);
        if(target) target.classList.toggle('show');
    }
    document.addEventListener('click', e => {
        if(!e.target.closest('.dropdown-toggle-container')) {
            document.querySelectorAll('.action-menu').forEach(m => m.classList.remove('show'));
        }
    });
</script>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
