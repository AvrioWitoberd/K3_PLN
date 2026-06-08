<?php
$base_path = '../';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/UserController.php';

$auth = new AuthController();
// Proteksi halaman dan cek Role: HANYA super_admin yang boleh mengakses Manajemen User
$auth->checkRole(['super_admin']);

// Tangani Request Logout (opsional jika dipanggil dari halaman ini, biar aman)
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $auth->logout();
    header('Location: login.php');
    exit;
}

$controller = new UserController();

// Ambil data untuk spesifik query (Fase 15B-1: Read Only)
$users = $controller->index();
$stats = $controller->getStats();

// Akhiri dengan memanggil View
require_once __DIR__ . '/../views/admin/users.php';
?>
