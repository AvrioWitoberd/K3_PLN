<?php require_once __DIR__ . '/includes/header.php'; ?>

<main class="page-layout bg-light" style="padding-top: 100px;">
    <article class="container mb-5" style="max-width: 800px;">
        <div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
            
            <?php if(!empty($artikel['gambar_cover'])): ?>
                <div style="width: 100%; height: 400px; background: #e2e8f0; border-bottom: 1px solid #f1f5f9;">
                    <img src="<?= htmlspecialchars($artikel['gambar_cover']) ?>" alt="<?= htmlspecialchars($artikel['judul']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            <?php else: ?>
                <!-- Hero Fallback untuk artikel tanpa cover -->
                <div style="width: 100%; padding: 4rem 2rem; background: linear-gradient(135deg, var(--bg-blue-light) 0%, #e0f2fe 100%); text-align:center; border-bottom: 1px solid #bfdbfe;">
                    <i class="ri-newspaper-line text-primary" style="font-size: 5rem; opacity: 0.2;"></i>
                </div>
            <?php endif; ?>

            <div class="p-4 p-md-5">
                <div class="d-flex align-items-center gap-3 mb-4 flex-wrap">
                    <a href="artikel.php" class="badge badge--soft border-0 m-0 px-3 py-2 text-decoration-none hover-primary" style="color:var(--pln-primary);"><i class="ri-arrow-left-line"></i> Kembali</a>
                    <span class="text-muted fs-7"><i class="ri-calendar-line text-primary"></i> Dipublikasikan pada <?= date('d F Y, H:i', strtotime($artikel['created_at'])) ?></span>
                </div>

                <h1 class="text-dark font-weight-bold" style="font-size: 2.2rem; line-height:1.3; margin-bottom:2rem; letter-spacing:-0.02em;">
                    <?= htmlspecialchars($artikel['judul']) ?>
                </h1>

                <div class="article-content" style="font-size: 1.1rem; line-height:1.8; color: var(--text-primary);">
                    <!-- Jika menggunakan RichText Editor nantinya ini bisa tidak di-escape secara mentah. Sementara escape dan nl2br untuk proteksi XSS basic via textarea -->
                    <?= nl2br(htmlspecialchars($artikel['konten'])) ?>
                </div>
                
                <div class="mt-5 pt-4 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold text-muted fs-7">Bagikan Artikel:</span>
                        <div class="d-flex gap-2">
                            <button class="btn btn--flat p-2 bg-light rounded text-primary hover-bg-blue-light"><i class="ri-facebook-circle-fill fs-5"></i></button>
                            <button class="btn btn--flat p-2 bg-light rounded text-info hover-bg-blue-light"><i class="ri-twitter-fill fs-5"></i></button>
                            <button class="btn btn--flat p-2 bg-light rounded text-success hover-bg-blue-light"><i class="ri-whatsapp-fill fs-5"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>

<style>
.article-content p { margin-bottom: 1.5rem; }
.article-content ul, .article-content ol { padding-left: 1.5rem; margin-bottom: 1.5rem; }
.article-content li { margin-bottom: 0.5rem; }
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
