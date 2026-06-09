<?php require_once __DIR__ . '/layouts/header.php'; ?>
        
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="h3 font-weight-bold text-dark m-0">Matriks Eksekusi K3</h1>
        <p class="text-muted mt-1 mb-0">Kelola data keselamatan dengan fitur pencarian dan paginasi.</p>
    </div>
    <button class="btn btn--primary btn--shadow px-4" onclick="openModal()">
        <i class="ri-add-line"></i> Tambah Risiko
    </button>
</div>

<?php if(isset($error) && $error): ?>
    <div class="alert alert-danger shadow-sm border-danger rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-alarm-warning-fill fs-5"></i> <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>
<?php if(isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Data berhasil dihapus dari database.
    </div>
<?php elseif(isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Data risiko berhasil ditambahkan.
    </div>
<?php elseif(isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
    <div class="alert alert-success shadow-sm border-success rounded mb-4 d-flex align-items-center gap-2">
        <i class="ri-check-double-line fs-5"></i> Data risiko berhasil diperbarui.
    </div>
<?php endif; ?>

<section class="data-section">
    <div class="card overflow-hidden">
        
        <!-- Toolbar & Search -->
        <div class="p-3 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 bg-light" style="background:#f8fafc!important;">
            <form method="GET" action="risiko.php" class="d-flex gap-2 w-100 search-form" style="max-width:550px;">
                <div class="input-group flex-grow-1" style="max-width:250px;">
                    <span class="input-group-text bg-white border-end-0"><i class="ri-search-line"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Cari lokasi, sumber..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                </div>
                <div class="input-group" style="max-width:180px;">
                    <select name="kategori" class="form-control bg-white">
                        <option value="">Semua Kategori</option>
                        <option value="badge--danger" <?= (isset($_GET['kategori']) && $_GET['kategori'] === 'badge--danger') ? 'selected' : '' ?>>Tinggi (Merah)</option>
                        <option value="badge--warning" <?= (isset($_GET['kategori']) && $_GET['kategori'] === 'badge--warning') ? 'selected' : '' ?>>Sedang (Kuning)</option>
                        <option value="badge--info" <?= (isset($_GET['kategori']) && $_GET['kategori'] === 'badge--info') ? 'selected' : '' ?>>Rendah (Hijau)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn--flat bg-white border shadow-sm px-3">Filter</button>
                <?php if(!empty($_GET['search']) || !empty($_GET['kategori'])): ?>
                    <a href="risiko.php" class="btn btn--flat bg-white border text-danger shadow-sm px-2" title="Reset"><i class="ri-close-line"></i></a>
                <?php endif; ?>
            </form>
            <div class="text-muted fs-7">
                Menampilkan <b><?= count($data_k3) ?></b> dari total <b><?= $total_data ?></b> data.
            </div>
        </div>

        <div class="table-wrapper p-0 overflow-x-auto">
            <table class="table table-hover table-striped risk-table m-0">
                <thead class="bg-white border-bottom">
                    <tr>
                        <th class="py-3 px-4 text-center" style="width: 80px;">ID</th>
                        <th class="py-3">Lokasi</th>
                        <th class="py-3">Sumber Bahaya</th>
                        <th class="py-3 text-center">Kelas Risiko</th>
                        <th class="py-3">Tindakan Pencegahan</th>
                        <th class="py-3 px-4 text-center" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data_k3) && is_array($data_k3) && count($data_k3) > 0): ?>
                        <?php foreach ($data_k3 as $row): 
                            $label = 'Rendah';
                            if ($row['kategori'] === 'badge--danger') $label = 'Tinggi';
                            else if ($row['kategori'] === 'badge--warning') $label = 'Sedang';
                        ?>
                        <tr>
                            <td class="align-middle px-4 text-center text-muted fw-bold">#<?= htmlspecialchars($row['id']) ?></td>
                            <td class="align-middle font-weight-semibold text-dark"><?= htmlspecialchars($row['lokasi']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($row['sumber_bahaya']) ?></td>
                            <td class="align-middle text-center"><span class="badge <?= htmlspecialchars($row['kategori']) ?> badge--soft-shadow m-0 p-1 px-3 border-0"><?= $label ?></span></td>
                            <td class="align-middle text-muted"><?= htmlspecialchars($row['tindakan_pencegahan']) ?></td>
                            <td class="align-middle px-4 text-center">
                                <div class="action-dropdown dropdown-toggle-container">
                                    <button class="btn btn--flat text-primary p-2 border shadow-none bg-white d-flex align-items-center gap-1 rounded" type="button" onclick="toggleMenu(<?= $row['id'] ?>)">
                                        <i class="ri-more-2-fill fs-5"></i> <span>Aksi</span>
                                    </button>
                                    <div class="action-menu text-start" id="menu-<?= $row['id'] ?>">
                                        <a href="risiko.php?action=edit&id=<?= htmlspecialchars($row['id']) ?>" class="action-item text-primary">
                                            <i class="ri-edit-line"></i> Edit
                                        </a>
                                        <form method="POST" action="risiko.php" class="m-0 p-0 w-100" style="display:block;">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                                            <button type="submit" onclick="return confirm('Hapus permanen ID #<?= $row['id'] ?>?');" class="action-item text-danger w-100 border-0 bg-transparent text-start">
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
                            <td colspan="6" class="text-center py-5">
                                <i class="ri-folder-forbid-line fs-1 d-block mb-3 text-muted" style="opacity: 0.3; font-size:4rem!important;"></i>
                                <h4 class="text-dark fs-5 font-weight-bold">Belum ada data matriks risiko.</h4>
                                <p class="text-muted">Ubah kata kunci pencarian atau tambahkan data baru.</p>
                                <button class="btn btn--primary mt-3 px-4 shadow-sm" onclick="openModal()"><i class="ri-add-line"></i> Tambah Data Baru</button>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <?php if($total_pages > 1): ?>
        <div class="p-3 border-top bg-light">
            <ul class="pagination m-0 list-unstyled d-flex gap-2 justify-content-center align-items-center">
                <?php 
                   $searchParam = (!empty($_GET['search']) ? '&search='.urlencode($_GET['search']) : '') . (!empty($_GET['kategori']) ? '&kategori='.urlencode($_GET['kategori']) : ''); 
                ?>
                <?php if($page > 1): ?>
                    <li><a href="risiko.php?page=<?= $page - 1 ?><?= $searchParam ?>" class="btn btn--flat border bg-white text-dark shadow-sm px-3 hover-bg-light"><i class="ri-arrow-left-s-line"></i> Previous</a></li>
                <?php endif; ?>
                <li class="bg-primary text-white rounded px-4 py-2 font-weight-bold shadow-sm">
                    Halaman <?= $page ?> / <?= $total_pages ?>
                </li>
                <?php if($page < $total_pages): ?>
                    <li><a href="risiko.php?page=<?= $page + 1 ?><?= $searchParam ?>" class="btn btn--flat border bg-white text-dark shadow-sm px-4 hover-bg-light">Next <i class="ri-arrow-right-s-line"></i></a></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Modal Add/Edit -->
<div id="risikoModal" class="modal-backdrop <?= (isset($edit_data) && $edit_data) ? 'show' : '' ?>">
    <div class="modal-dialog">
        <div class="modal-content border-0">
             <div class="modal-header bg-light border-bottom">
                  <h5 class="m-0 font-weight-bold text-dark d-flex align-items-center gap-2">
                       <i class="<?= isset($edit_data) && $edit_data ? 'ri-edit-box-line text-primary' : 'ri-folder-add-line text-success' ?> fs-4"></i>
                       <?= isset($edit_data) && $edit_data ? 'Edit Risiko: ID #'.$edit_data['id'] : 'Tambah Risiko Baru' ?>
                  </h5>
                  <button type="button" class="btn-close text-muted" onclick="closeModal()"><i class="ri-close-line"></i></button>
             </div>
             <div class="modal-body p-4 bg-white">
                <form method="POST" action="risiko.php">
                    <input type="hidden" name="action" value="<?= isset($edit_data) && $edit_data ? 'edit' : 'add' ?>">
                    <?php if(isset($edit_data) && $edit_data): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($edit_data['id']) ?>">
                    <?php endif; ?>
                    <div class="crud-grid">
                        <div class="form-group mb-4">
                            <label class="text-sm font-weight-bold text-dark mb-2">Lokasi</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-map-pin-2-line text-muted"></i></span>
                                <input type="text" name="lokasi" class="form-control border-start-0" placeholder="Contoh: Area Gardu Induk" required value="<?= isset($edit_data) && $edit_data ? htmlspecialchars($edit_data['lokasi']) : '' ?>">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-sm font-weight-bold text-dark mb-2">Sumber Bahaya</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-thunderstorms-line text-muted"></i></span>
                                <input type="text" name="sumber" class="form-control border-start-0" placeholder="Contoh: Tegangan Tinggi" required value="<?= isset($edit_data) && $edit_data ? htmlspecialchars($edit_data['sumber_bahaya']) : '' ?>">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-sm font-weight-bold text-dark mb-2">Klasifikasi Risiko</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-price-tag-3-line text-muted"></i></span>
                                <select name="kategori" class="form-control border-start-0 bg-white" required>
                                    <option value="badge--danger" <?= (isset($edit_data) && $edit_data['kategori'] === 'badge--danger') ? 'selected' : '' ?>>🔴 Risiko Tinggi</option>
                                    <option value="badge--warning" <?= (isset($edit_data) && $edit_data['kategori'] === 'badge--warning') ? 'selected' : '' ?>>🟡 Risiko Sedang</option>
                                    <option value="badge--info" <?= (isset($edit_data) && $edit_data['kategori'] === 'badge--info') ? 'selected' : '' ?>>🔵 Risiko Rendah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="text-sm font-weight-bold text-dark mb-2">Tindakan Pencegahan</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light shadow-none"><i class="ri-shield-check-line text-muted"></i></span>
                                <input type="text" name="cegah" class="form-control border-start-0" placeholder="Contoh: APD Level 3 Wajib" required value="<?= isset($edit_data) && $edit_data ? htmlspecialchars($edit_data['tindakan_pencegahan']) : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-top border-light d-flex gap-3 justify-content-end">
                        <button type="button" class="btn btn--flat text-muted px-4 hover-bg-light rounded font-weight-semibold" onclick="closeModal()">Batal</button>
                        <button type="submit" class="btn btn--primary btn--shadow px-4 d-inline-flex gap-2">
                            <?= isset($edit_data) && $edit_data ? 'Simpan Perubahan' : 'Tambahkan' ?> <i class="ri-save-3-line"></i>
                        </button>
                    </div>
                </form>
             </div>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('risikoModal').classList.add('show');
    }
    function closeModal() {
        document.getElementById('risikoModal').classList.remove('show');
        if(window.location.search.includes('action=edit')) {
            window.location.href = 'risiko.php';
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
