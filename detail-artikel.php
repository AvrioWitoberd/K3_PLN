<?php
require_once __DIR__ . '/controllers/ArtikelController.php';

$slug = $_GET['slug'] ?? '';
if (empty($slug)) {
    header("Location: artikel.php");
    exit;
}

$controller = new ArtikelController();
$artikel = $controller->getBySlug($slug);

if (!$artikel) {
    // Jika artikel tidak ditemukan
    header("Location: artikel.php");
    exit;
}

require_once __DIR__ . '/views/detail-artikel.php';
?>
