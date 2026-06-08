<?php
// Root router untuk beranda (index)
require_once __DIR__ . '/controllers/RisikoController.php';

// Memanggil controller untuk menarik data statistik secara dinamis dari database sim_k3_pln
$controller = new RisikoController();
$data_k3 = $controller->index();
$total_risiko = is_array($data_k3) ? count($data_k3) : 0;

// Mengarahkan ke view beranda dengan membawa data statistik jika diperlukan
require_once __DIR__ . '/views/beranda.php';
?>
