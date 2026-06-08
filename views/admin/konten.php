<?php require_once __DIR__ . '/layouts/header.php'; ?>

<!-- Sticky Header Bar -->
<div class="cms-sticky-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="cms-sticky-header__title">Manajemen CMS Website</h1>
            <p class="cms-sticky-header__subtitle">Kelola seluruh konten halaman publik dari satu tempat.</p>
        </div>
        <div class="d-flex gap-2 flex-shrink-0">
            <a href="<?= $base_path ?>index.php" target="_blank" class="btn btn--outline-cms">
                <i class="ri-external-link-line"></i> Lihat Website
            </a>
            <button type="button" class="btn btn--primary btn--shadow px-4" onclick="document.getElementById('formCms').submit(); this.disabled=true; this.innerHTML='<i class=\'ri-loader-4-line ri-spin\'></i> Menyimpan...';">
                <i class="ri-save-3-line"></i> Simpan Perubahan
            </button>
        </div>
    </div>
</div>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
    <div class="alert alert-success shadow-sm rounded-lg border-success mb-4 px-3 py-3 d-flex align-items-center gap-2">
        <div class="cms-icon-badge cms-icon-badge--success"><i class="ri-checkbox-circle-fill"></i></div>
        <span class="font-weight-semibold">Pengaturan CMS berhasil disimpan dan sudah tayang di website publik.</span>
    </div>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger shadow-sm rounded-lg border-danger mb-4 px-3 py-3 d-flex align-items-center gap-2">
        <div class="cms-icon-badge cms-icon-badge--danger"><i class="ri-error-warning-fill"></i></div>
        <span class="font-weight-semibold"><?= htmlspecialchars($error) ?></span>
    </div>
<?php endif; ?>

<?php
function renderCmsSection($icon, $judul, $deskripsi, $grup_key, $list_konten) {
    echo '<div class="cms-grid__col d-flex">';
    echo '<div class="cms-card w-100">';
    
    // Card Header
    echo '<div class="cms-card__header">';
    echo '<div class="cms-card__icon-box"><i class="' . htmlspecialchars($icon) . '"></i></div>';
    echo '<div>';
    echo '<h3 class="cms-card__title">' . htmlspecialchars($judul) . '</h3>';
    if (!empty($deskripsi)) {
        echo '<p class="cms-card__desc">' . htmlspecialchars($deskripsi) . '</p>';
    }
    echo '</div>';
    echo '</div>';
    
    // Card Body
    echo '<div class="cms-card__body">';
    if(isset($list_konten[$grup_key])) {
        foreach($list_konten[$grup_key] as $i => $konten) {
            $is_last = ($i === array_key_last($list_konten[$grup_key]));
            echo '<div class="cms-field' . ($is_last ? '' : ' mb-4') . '">';
            echo '<label class="cms-field__label">' . htmlspecialchars($konten['label']) . '</label>';
            if($konten['tipe'] == 'textarea') {
                echo '<textarea name="konten[' . htmlspecialchars($konten['kunci']) . ']" class="cms-field__input cms-field__textarea" rows="4" required>' . htmlspecialchars($konten['nilai']) . '</textarea>';
            } else {
                echo '<input type="text" name="konten[' . htmlspecialchars($konten['kunci']) . ']" class="cms-field__input" value="' . htmlspecialchars($konten['nilai']) . '" required>';
            }
            echo '</div>';
        }
    } else {
        echo '<div class="cms-empty-section"><i class="ri-information-line"></i> Tidak ada pengaturan untuk section ini.</div>';
    }
    echo '</div>';
    
    echo '</div>'; // .cms-card
    echo '</div>'; // .col
}
?>

<form action="konten.php" method="POST" id="formCms">
    <input type="hidden" name="action" value="update">
    
    <div class="cms-grid">
        <?php renderCmsSection('ri-layout-masonry-line', 'Section Hero', 'Banner utama dan tombol CTA di bagian paling atas halaman beranda.', 'hero', $konten_website); ?>
        <?php renderCmsSection('ri-building-4-line', 'Profil Perusahaan', 'Deskripsi singkat mengenai profil dan identitas korporasi.', 'profil', $konten_website); ?>
        <?php renderCmsSection('ri-chat-quote-line', 'Sambutan Manager', 'Pesan dari pimpinan terkait komitmen budaya K3 perusahaan.', 'sambutan', $konten_website); ?>
        <?php renderCmsSection('ri-focus-3-line', 'Visi & Misi', 'Visi dan panduan strategis menuju lingkungan kerja Zero-Accident.', 'visi_misi', $konten_website); ?>
        <?php renderCmsSection('ri-copyright-line', 'Section Footer', 'Teks hak cipta dan keterangan di bagian bawah halaman.', 'footer', $konten_website); ?>
    </div>
    
</form>

<!-- CMS Page Specific Styles -->
<style>
/* ---- CMS Grid Layout ---- */
.cms-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    align-items: stretch;
}
@media (min-width: 992px) {
    .cms-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
.cms-grid__col {
    display: flex;
    flex-direction: column;
}

/* ---- Sticky Header ---- */
.cms-sticky-header {
    position: sticky;
    top: 72px;
    z-index: 100;
    background: #ffffff;
    border-bottom: 1px solid #e2e8f0;
    padding: 1.25rem 0;
    margin: -1.5rem -0rem 1.5rem -0rem;
    padding-left: 0; padding-right: 0;
    margin-bottom: 1.5rem;
}
.cms-sticky-header__title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
    line-height: 1.3;
}
.cms-sticky-header__subtitle {
    font-size: 0.85rem;
    color: #64748b;
    margin: 0.25rem 0 0;
}
.btn--outline-cms {
    background: transparent;
    border: 1px solid #cbd5e1;
    color: #475569;
    font-weight: 600;
    font-size: 0.9rem;
    padding: 0.55rem 1.15rem;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    transition: all 0.2s;
}
.btn--outline-cms:hover {
    border-color: var(--pln-primary);
    color: var(--pln-primary);
    background: #eff6ff;
}

/* ---- CMS Card ---- */
.cms-card {
    width: 100%;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.03);
    display: flex;
    flex-direction: column;
    transition: box-shadow 0.2s ease, border-color 0.2s ease;
    overflow: hidden;
}
.cms-card:hover {
    box-shadow: 0 4px 12px rgba(0,86,160,0.08);
    border-color: #bfdbfe;
}

.cms-card__header {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    padding: 1rem 1.25rem;
    border-bottom: 1px solid #f1f5f9;
    background: #fafbfd;
}

.cms-card__icon-box {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    color: var(--pln-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.cms-card__title {
    font-size: 0.95rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
    line-height: 1.3;
}

.cms-card__desc {
    font-size: 0.78rem;
    color: #94a3b8;
    margin: 0.2rem 0 0;
    line-height: 1.4;
}

.cms-card__body {
    padding: 1.25rem;
    flex-grow: 1;
}

/* ---- CMS Form Fields ---- */
.cms-field__label {
    display: block;
    font-size: 0.82rem;
    font-weight: 600;
    color: #334155;
    margin-bottom: 0.5rem;
    letter-spacing: 0.01em;
}

.cms-field__input {
    width: 100%;
    padding: 0.7rem 0.9rem;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    background: #f8fafc;
    font-size: 0.9rem;
    font-family: 'Inter', sans-serif;
    color: #0f172a;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.cms-field__input:focus {
    outline: none;
    border-color: var(--pln-secondary);
    box-shadow: 0 0 0 3px rgba(0, 174, 239, 0.12);
    background: #ffffff;
}

.cms-field__textarea {
    resize: vertical;
    min-height: 90px;
    line-height: 1.6;
}

/* ---- Alert Badge Icons ---- */
.cms-icon-badge {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}
.cms-icon-badge--success { background: #dcfce7; color: #16a34a; }
.cms-icon-badge--danger  { background: #fee2e2; color: #dc2626; }

/* ---- Empty Section ---- */
.cms-empty-section {
    color: #94a3b8;
    font-size: 0.85rem;
    padding: 1rem 0;
}

/* ---- Dark Mode Support ---- */
html.dark-mode .cms-sticky-header { background: #1e293b; border-color: #334155; }
html.dark-mode .cms-sticky-header__title { color: #f1f5f9; }
html.dark-mode .cms-sticky-header__subtitle { color: #64748b; }
html.dark-mode .cms-card { background: #1e293b; border-color: #334155; }
html.dark-mode .cms-card:hover { border-color: #475569; }
html.dark-mode .cms-card__header { background: #0f172a; border-color: #334155; }
html.dark-mode .cms-card__title { color: #e2e8f0; }
html.dark-mode .cms-card__icon-box { background: linear-gradient(135deg, #1e3a5f 0%, #1e293b 100%); }
html.dark-mode .cms-field__label { color: #cbd5e1; }
html.dark-mode .cms-field__input { background: #0f172a; border-color: #334155; color: #e2e8f0; }
html.dark-mode .cms-field__input:focus { background: #1e293b; }
html.dark-mode .btn--outline-cms { border-color: #475569; color: #94a3b8; }
html.dark-mode .btn--outline-cms:hover { border-color: var(--pln-secondary); color: var(--pln-secondary); background: rgba(0,174,239,0.1); }
</style>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
