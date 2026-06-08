<?php require_once __DIR__ . '/layouts/header.php'; ?>

<main class="content-wrapper">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 font-weight-bold text-dark m-0">Manajemen CMS Website</h1>
        <a href="<?= $base_path ?>index.php" target="_blank" class="btn btn-outline-primary shadow-sm"><i class="ri-share-box-line"></i> Buka Web Publik</a>
    </div>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert alert-success shadow-sm rounded-lg border-success mb-4 px-3 py-3 d-flex align-items-center gap-2">
            <div class="icon-box icon-box--small bg-green-light text-success"><i class="ri-checkbox-circle-fill"></i></div>
            <span class="font-weight-semibold">Mantap! Pengaturan CMS Website berhasil disimpan dan telah tayang.</span>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger shadow-sm rounded-lg border-danger mb-4 px-3 py-3">
             <i class="ri-error-warning-fill mr-2"></i> <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <?php
    function renderCmsSection($judul, $deskripsi, $grup_key, $list_konten) {
        echo '<div class="card border-0 shadow-sm rounded-lg mb-4">';
        echo '<div class="card__header bg-white border-bottom px-4 py-3">';
        echo '<h3 class="m-0 fs-5 font-weight-bold text-primary">' . htmlspecialchars($judul) . '</h3>';
        if (!empty($deskripsi)) {
            echo '<p class="text-muted m-0 mt-1 fs-7">' . htmlspecialchars($deskripsi) . '</p>';
        }
        echo '</div><div class="card__body p-4">';
        
        if(isset($list_konten[$grup_key])) {
            echo '<div class="row">';
            foreach($list_konten[$grup_key] as $konten) {
                echo '<div class="col-md-12 mb-4">';
                echo '<label class="form-label font-weight-bold text-dark d-block mb-2">' . htmlspecialchars($konten['label']) . '</label>';
                if($konten['tipe'] == 'textarea') {
                    echo '<textarea name="konten[' . htmlspecialchars($konten['kunci']) . ']" class="form-control bg-light border p-3 rounded" rows="4" required>' . htmlspecialchars($konten['nilai']) . '</textarea>';
                } else {
                    echo '<input type="text" name="konten[' . htmlspecialchars($konten['kunci']) . ']" class="form-control bg-light border p-3 rounded" value="' . htmlspecialchars($konten['nilai']) . '" required>';
                }
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p class="text-muted"><i class="ri-information-line"></i> Tidak ada data pengaturan untuk seksi ini.</p>';
        }
        echo '</div></div>';
    }
    ?>

    <form action="konten.php" method="POST" id="formCms">
        <input type="hidden" name="action" value="update">
        
        <?php renderCmsSection('🌍 Section Hero', 'Pengaturan teks utama dan tombol panggilan aksi (CTA) pada bagian paling atas halaman.', 'hero', $konten_website); ?>
        <?php renderCmsSection('🏢 Section Profil Perusahaan', 'Informasi singkat mengenai profil perusahaan yang ditampilkan di halaman depan.', 'profil', $konten_website); ?>
        <?php renderCmsSection('🗣️ Section Sambutan Manager', 'Pesan atau sambutan dari manajemen terkait komitmen K3.', 'sambutan', $konten_website); ?>
        <?php renderCmsSection('🎯 Section Visi & Misi', 'Visi dan misi perusahaan dalam mewujudkan lingkungan kerja yang aman dan sehat.', 'visi_misi', $konten_website); ?>
        <?php renderCmsSection('🏷️ Section Footer', 'Teks hak cipta dan informasi tambahan di bagian paling bawah halaman.', 'footer', $konten_website); ?>
        
        <div class="text-right pb-5">
            <button type="submit" class="btn btn-primary px-5 py-3 shadow-lg font-weight-bold" style="border-radius: 9px;" onclick="document.getElementById('formCms').submit(); this.disabled=true; this.innerHTML='<i class=\'ri-loader-4-line ri-spin\'></i> Menyimpan...';">
                <i class="ri-save-3-line"></i> Simpan Perubahan CMS
            </button>
        </div>
    </form>
</main>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
