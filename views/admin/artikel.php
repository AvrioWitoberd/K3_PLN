<?php require_once __DIR__ . '/layouts/header.php'; ?>
        
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="h3 font-weight-bold text-dark m-0">Artikel Edukasi K3</h1>
        <p class="text-muted mt-1 mb-0">Kelola daftar artikel, pedoman, dan edukasi keselamatan kerja.</p>
    </div>
    <button class="btn btn--primary btn--shadow px-4" onclick="openModal()">
        <i class="ri-add-line"></i> Tambah Artikel
    </button>
</div>

<?php if(isset($error) && $error): ?>
    <div class="alert alert-danger shadow-sm border-danger rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-alarm-warning-fill fs-5"></i> <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>
<?php if(isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Artikel berhasil dihapus dari database.
    </div>
<?php elseif(isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Artikel edukasi baru berhasil ditambahkan.
    </div>
<?php elseif(isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Artikel edukasi berhasil diperbarui.
    </div>
<?php endif; ?>

<section class="data-section">
    <div class="card overflow-hidden">
        
        <div class="p-3 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 bg-light" style="background:#f8fafc!important;">
            <div class="text-muted fs-7">
                Menampilkan <b><?= count($data_artikel) ?></b> data artikel edukasi K3.
            </div>
        </div>

        <div class="table-wrapper p-0 overflow-x-auto">
            <table class="table table-hover table-striped risk-table m-0">
                <thead class="bg-white border-bottom">
                    <tr>
                        <th class="py-3 px-4 text-center" style="width: 80px;">ID</th>
                        <th class="py-3">Judul Artikel</th>
                        <th class="py-3">Slug / Permalink</th>
                        <th class="py-3 text-center">Status</th>
                        <th class="py-3 px-4 text-center" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data_artikel) && is_array($data_artikel) && count($data_artikel) > 0): ?>
                        <?php foreach ($data_artikel as $row): 
                            $status_class = $row['status'] === 'published' ? 'badge--success' : 'badge--warning';
                            $status_label = $row['status'] === 'published' ? 'Published' : 'Draft';
                        ?>
                        <tr>
                            <td class="align-middle px-4 text-center text-muted fw-bold">#<?= htmlspecialchars($row['id']) ?></td>
                            <td class="align-middle font-weight-semibold text-dark"><?= htmlspecialchars($row['judul']) ?></td>
                            <td class="align-middle text-muted"><?= htmlspecialchars($row['slug']) ?></td>
                            <td class="align-middle text-center"><span class="badge <?= $status_class ?> badge--soft-shadow m-0 p-1 px-3 border-0"><?= $status_label ?></span></td>
                            <td class="align-middle px-4 text-center">
                                <div class="action-dropdown dropdown-toggle-container">
                                    <button class="btn btn--flat text-primary p-2 border shadow-none bg-white d-flex align-items-center gap-1 rounded" type="button" onclick="toggleMenu(<?= $row['id'] ?>)">
                                        <i class="ri-more-2-fill fs-5"></i> <span>Aksi</span>
                                    </button>
                                    <div class="action-menu text-start" id="menu-<?= $row['id'] ?>">
                                        <a href="artikel.php?action=edit&id=<?= htmlspecialchars($row['id']) ?>" class="action-item text-primary">
                                            <i class="ri-edit-line"></i> Edit
                                        </a>
                                        <form method="POST" action="artikel.php" class="m-0 p-0 w-100" style="display:block;">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                                            <button type="submit" onclick="return confirm('Hapus permanen artikel ID #<?= $row['id'] ?>?');" class="action-item text-danger w-100 border-0 bg-transparent text-start">
                                                <i class="ri-delete-bin-line"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="ri-article-line fs-1 d-block mb-3 text-muted" style="opacity: 0.3; font-size:4rem!important;"></i>
                                <h4 class="text-dark fs-5 font-weight-bold">Belum ada artikel edukasi.</h4>
                                <p class="text-muted">Mulai tambahkan artikel wawasan K3 pertama Anda.</p>
                                <button class="btn btn--primary mt-3 px-4 shadow-sm" onclick="openModal()"><i class="ri-add-line"></i> Tambah Artikel</button>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Add/Edit -->
<div id="artikelModal" class="modal-backdrop <?= (isset($edit_data) && $edit_data) ? 'show' : '' ?>">
    <div class="modal-dialog" style="max-width: 800px;">
        <div class="modal-content border-0">
             <div class="modal-header bg-light border-bottom">
                  <h5 class="m-0 font-weight-bold text-dark d-flex align-items-center gap-2">
                       <i class="<?= isset($edit_data) && $edit_data ? 'ri-edit-box-line text-primary' : 'ri-file-add-line text-success' ?> fs-4"></i>
                       <?= isset($edit_data) && $edit_data ? 'Edit Artikel: ID #'.$edit_data['id'] : 'Tambah Artikel Edukasi' ?>
                  </h5>
                  <button type="button" class="btn-close text-muted" onclick="closeModal()"><i class="ri-close-line"></i></button>
             </div>
             <div class="modal-body p-4 bg-white">
                <form method="POST" action="artikel.php">
                    <input type="hidden" name="action" value="<?= isset($edit_data) && $edit_data ? 'edit' : 'add' ?>">
                    <?php if(isset($edit_data) && $edit_data): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($edit_data['id']) ?>">
                    <?php endif; ?>
                    <div class="form-group mb-4">
                        <label class="text-sm font-weight-bold text-dark mb-2">Judul Artikel</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-text text-muted"></i></span>
                            <input type="text" name="judul" class="form-control border-start-0" placeholder="Contoh: Prosedur Keselamatan Area Gardu" required value="<?= isset($edit_data) && $edit_data ? htmlspecialchars($edit_data['judul']) : '' ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="text-sm font-weight-bold text-dark mb-2">Status Penayangan</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-eye-line text-muted"></i></span>
                                    <select name="status" class="form-control border-start-0 bg-white" required>
                                        <option value="draft" <?= (isset($edit_data) && $edit_data['status'] === 'draft') ? 'selected' : '' ?>>Draft / Konsep</option>
                                        <option value="published" <?= (isset($edit_data) && $edit_data['status'] === 'published') ? 'selected' : '' ?>>Published / Tayang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="text-sm font-weight-bold text-dark mb-2">URL Gambar Cover (Opsional)</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-image-line text-muted"></i></span>
                                    <input type="text" name="gambar_cover" class="form-control border-start-0" placeholder="https://..." value="<?= isset($edit_data) && $edit_data ? htmlspecialchars($edit_data['gambar_cover'] ?? '') : '' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label class="text-sm font-weight-bold text-dark mb-2">Konten Artikel</label>
                        <textarea class="form-control bg-light border p-3 rounded w-100" name="konten" rows="8" placeholder="Tulis isi konten edukasi K3 disini..." required><?= isset($edit_data) && $edit_data ? htmlspecialchars($edit_data['konten']) : '' ?></textarea>
                    </div>
                    <div class="mt-4 pt-3 border-top border-light d-flex gap-3 justify-content-end">
                        <button type="button" class="btn btn--flat text-muted px-4 hover-bg-light rounded font-weight-semibold" onclick="closeModal()">Batal</button>
                        <button type="submit" class="btn btn--primary btn--shadow px-4 d-inline-flex gap-2">
                            <?= isset($edit_data) && $edit_data ? 'Simpan Perubahan' : 'Terbitkan Artikel' ?> <i class="ri-save-3-line"></i>
                        </button>
                    </div>
                </form>
             </div>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('artikelModal').classList.add('show');
    }
    function closeModal() {
        document.getElementById('artikelModal').classList.remove('show');
        if(window.location.search.includes('action=edit')) {
            window.location.href = 'artikel.php';
        }
    }
    function toggleMenu(id) {
        document.querySelectorAll('.action-menu').forEach(menu => {
            if(menu.id !== 'menu-'+id) menu.classList.remove('show');
        });
        const target = document.getElementById('menu-'+id);
        if(target) target.classList.toggle('show');
    }
    document.addEventListener('click', function(e) {
        if(!e.target.closest('.dropdown-toggle-container')) {
            document.querySelectorAll('.action-menu').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });
</script>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
