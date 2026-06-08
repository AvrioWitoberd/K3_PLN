<?php
$base_path = '../';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/RisikoController.php';

$auth = new AuthController();
// Proteksi halaman admin
$auth->checkAuth();

// Tangani Request Logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $auth->logout();
    header('Location: login.php');
    exit;
}

$risikoController = new RisikoController();
$stats = $risikoController->getStatistics();

$total_risiko = $stats['total'];
$total_tinggi = $stats['tinggi'];
$total_sedang = $stats['sedang'];
$total_rendah = $stats['rendah'];
// Dummy Counts
$total_users = 1; 
$total_artikel = 0; 

require_once __DIR__ . '/../views/admin/dashboard.php';
?>
