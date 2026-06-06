<?php
// Menerapkan MVC: Memanggil Controller Risiko untuk mengambil data sebelum me-load View
require_once 'controllers/RisikoController.php';

$controller = new RisikoController();
$data_k3 = $controller->index();

// Kirim data ($data_k3) untuk di-render oleh View
require_once 'views/identifikasi.php';
?>
