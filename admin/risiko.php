<?php
$base_path = '../';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/RisikoController.php';

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
        header('Location: risiko.php?msg=added');
        exit;
    } else {
        $error = 'Gagal menambahkan data, pastikan input tidak kosong.';
    }
}

// Tangani C.R.U.D: Hapus Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    if ($controller->destroy($_POST['id'])) {
        header('Location: risiko.php?msg=deleted');
        exit;
    } else {
        $error = 'Gagal menghapus data dari database.';
    }
}

// Tangani C.R.U.D: Update Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    if ($controller->update($_POST['id'], $_POST)) {
        header('Location: risiko.php?msg=updated');
        exit;
    } else {
        $error = 'Gagal memperbarui data, pastikan input tidak kosong.';
    }
}

// Cek apakah mode edit untuk memuat data ke View
$edit_data = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $edit_data = $controller->edit($_GET['id']);
}

// Setup Filter & Pagination
$search = $_GET['search'] ?? '';
$kategori_filter = $_GET['kategori'] ?? '';
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10;

// Ambil data untuk spesifik query
$data_k3 = $controller->indexPaginated($search, $kategori_filter, $page, $per_page);
$total_data = $controller->getTotalCount($search, $kategori_filter);
$total_pages = ceil($total_data / $per_page);

// Akhiri dengan memanggil View
require_once __DIR__ . '/../views/admin/risiko.php';
?>
