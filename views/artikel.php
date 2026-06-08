<?php require_once __DIR__ . '/includes/header.php'; ?>

<main class="page-layout bg-light" style="padding-top: 100px;">
    <section class="container mb-5">
        <div class="row" style="margin-bottom: 2rem;">
            <div class="col-12 text-center">
                <span class="badge badge--soft border-0 mb-3 px-3 py-2 fs-7 font-weight-bold" style="background-color: var(--bg-blue-light); color: var(--pln-primary);">Edukasi Keselamatan</span>
                <h1 class="font-weight-bold text-dark m-0" style="font-size: 2.5rem; letter-spacing:-0.03em;">Artikel Edukasi K3</h1>
                <p class="text-muted mt-2 mx-auto" style="max-width:600px; font-size:1.1rem;">Temukan wawasan, regulasi, dan praktik terbaik untuk menciptakan lingkungan kerja "Zero Accident" di lingkungan PLN.</p>
            </div>
        </div>

        <?php if (!empty($data_artikel)): ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
                <?php foreach ($data_artikel as $row): ?>
                    <!-- Modern Article Card -->
                    <div class="card border-0 shadow-sm rounded-lg overflow-hidden transition-all bg-white d-flex flex-column" style="height: 100%;">
                        <div style="width: 100%; height: 200px; overflow: hidden; background: #e2e8f0; position:relative;">
                            <?php if(!empty($row['gambar_cover'])): ?>
                                <img src="<?= htmlspecialchars($row['gambar_cover']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else: ?>
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, var(--pln-primary) 0%, #0284c7 100%); opacity: 0.1;"></div>
                                <div style="display:flex; align-items:center; justify-content:center; height:100%; width:100%; font-size:4rem; color: #94a3b8;"><i class="ri-article-line"></i></div>
                            <?php endif; ?>
                            <div style="position: absolute; top:1rem; right:1rem; background: rgba(255,255,255,0.9); padding:0.3rem 0.8rem; border-radius: 999px; font-size:0.75rem; font-weight:700; color:var(--text-primary); backdrop-filter:blur(4px); box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                                <i class="ri-calendar-line text-primary"></i> <?= date('d M Y', strtotime($row['created_at'])) ?>
                            </div>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h3 style="font-size: 1.25rem; font-weight:700; line-height: 1.4; margin-bottom: 0.75rem;">
                                <a href="detail-artikel.php?slug=<?= htmlspecialchars($row['slug']) ?>" class="text-dark hover-primary"><?= htmlspecialchars($row['judul']) ?></a>
                            </h3>
                            <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6; margin-bottom:1.5rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                <?= htmlspecialchars(strip_tags(substr($row['konten'], 0, 150))) ?>...
                            </p>
                            <div class="mt-auto">
                                <a href="detail-artikel.php?slug=<?= htmlspecialchars($row['slug']) ?>" class="btn btn--flat text-primary font-weight-bold p-0 d-inline-flex align-items-center gap-1">Baca Selengkapnya <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5 bg-white shadow-sm border-0 rounded-lg">
                <i class="ri-file-search-line d-block text-muted mb-3" style="font-size: 4rem; opacity: 0.5;"></i>
                <h4 class="font-weight-bold text-dark mb-2">Belum Ada Artikel</h4>
                <p class="text-muted mb-0">Artikel edukasi K3 belum diterbitkan pada saat ini. Silakan kunjungi kembali nanti.</p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
