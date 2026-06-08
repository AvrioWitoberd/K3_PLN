<?php
require_once __DIR__ . '/controllers/ArtikelController.php';

$controller = new ArtikelController();
$data_artikel = $controller->getPublished();

require_once __DIR__ . '/views/artikel.php';
?>
