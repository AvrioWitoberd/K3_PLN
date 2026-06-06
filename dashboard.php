<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/RisikoController.php';

$auth = new AuthController();
// Proteksi halaman admin (akan auto-redirect jika belum login)
$auth->checkAuth();

// Tangani Request Logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $auth->logout();
    header('Location: login.php');
    exit;
}

$controller = new RisikoController();
$error = '';

// Tangani C.R.U.D: Tambah Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    if ($controller->store($_POST)) {
        header('Location: dashboard.php?msg=added');
        exit;
    } else {
        $error = 'Gagal menambahkan data, pastikan input tidak kosong.';
    }
}

// Tangani C.R.U.D: Hapus Data
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    if ($controller->destroy($_GET['id'])) {
        header('Location: dashboard.php?msg=deleted');
        exit;
    } else {
        $error = 'Gagal menghapus data dari database.';
    }
}

// Ambil seluruh data matriks untuk ditampilkan di tabel
$data_k3 = $controller->index();

// Akhiri dengan memanggil View
require_once 'views/dashboard.php';
?>
