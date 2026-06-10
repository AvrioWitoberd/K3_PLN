<?php require_once __DIR__ . '/includes/header.php'; ?>

<main class="page-layout">
    <section class="container mb-5">
        <div class="page-heading-elegant">
            <span class="badge">Edukasi Keselamatan</span>
            <h1>Artikel & Regulasi K3</h1>
            <p>Temukan wawasan mendalam, regulasi terkini, serta praktik terbaik guna mewujudkan visi "Zero Accident" di seluruh lingkungan operasional PLN.</p>
        </div>

        <?php if (!empty($data_artikel)): ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
                <?php foreach ($data_artikel as $row): ?>
                    <!-- Modern Article Card -->
                    <div class="video-card bg-white border-0" style="height: 100%; display: flex; flex-direction: column;">
                        <div style="width: 100%; height: 200px; overflow: hidden; background: #e2e8f0; position:relative; flex-shrink: 0; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                            <?php if(!empty($row['gambar_cover'])): ?>
                                <img src="<?= htmlspecialchars($row['gambar_cover']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else: ?>
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, var(--pln-primary) 0%, #0284c7 100%); opacity: 0.1;"></div>
                                <div style="display:flex; align-items:center; justify-content:center; height:100%; width:100%; font-size:4rem; color: #94a3b8;"><i class="ri-article-line"></i></div>
                            <?php endif; ?>
                            <div style="position: absolute; top:1rem; right:1rem; background: rgba(255,255,255,0.9); padding:0.3rem 0.8rem; border-radius: 999px; font-size:0.75rem; font-weight:700; color: #0F172A !important; backdrop-filter:blur(4px); box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                                <i class="ri-calendar-line text-primary"></i> <?= date('d M Y', strtotime($row['created_at'])) ?>
                            </div>
                        </div>
                        <div class="p-4" style="display: flex; flex-direction: column; flex-grow: 1;">
                            <h3 style="font-size: 1.25rem; font-weight:700; line-height: 1.4; margin-bottom: 0.75rem;">
                                <a href="detail-artikel.php?slug=<?= htmlspecialchars($row['slug']) ?>" class="card-article-title"><?= htmlspecialchars($row['judul']) ?></a>
                            </h3>
                            <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6; margin-bottom:1.5rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-align: justify;">
                                <?= htmlspecialchars(strip_tags(substr($row['konten'], 0, 150))) ?>...
                            </p>
                            <div style="margin-top: auto;">
                                <a href="detail-artikel.php?slug=<?= htmlspecialchars($row['slug']) ?>" class="btn btn-gradient-primary w-100 d-flex justify-content-center align-items-center gap-2" style="border-radius: 12px; padding: 0.75rem; font-weight: 700;">
                                    <i class="ri-book-read-fill fs-5"></i> Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="card card--floating table-wrapper">
                <div class="card__header bg-blue-grad text-white px-4 py-3 border-0">
                    <h3 class="m-0 fs-5 font-weight-bold d-flex align-items-center gap-2">
                        <i class="ri-article-line"></i> Informasi Artikel
                    </h3>
                </div>
                <div class="card__body text-center py-5">
                    <i class="ri-file-search-line d-block text-muted mb-3" style="font-size: 4rem; opacity: 0.5;"></i>
                    <h4 class="font-weight-bold text-dark mb-2">Belum Ada Artikel</h4>
                    <p class="text-muted mb-0">Artikel edukasi K3 belum diterbitkan pada saat ini. Silakan kunjungi kembali nanti.</p>
                </div>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
