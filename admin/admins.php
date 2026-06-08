<?php
$base_path = '../';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/AdminController.php';

$auth = new AuthController();
$auth->checkAuth();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $auth->logout();
    header('Location: login.php');
    exit;
}

$controller = new AdminController();
$error = '';

// Tambah Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    if ($controller->store($_POST)) {
        header('Location: admins.php?msg=added');
        exit;
    } else {
        $error = 'Gagal menambah admin. Username mungkin telah digunakan atau kolom tidak lengkap.';
    }
}

// Update Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    if ($controller->update($_POST['id'], $_POST)) {
        header('Location: admins.php?msg=updated');
        exit;
    } else {
        $error = 'Gagal memperbarui admin. Username mungkin digunakan oleh ID lain.';
    }
}

// Hapus Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    if ($controller->destroy($_POST['id'])) {
        header('Location: admins.php?msg=deleted');
        exit;
    } else {
        $error = 'Gagal menghapus admin (tidak bisa menghapus akun sendiri).';
    }
}

$edit_data = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $edit_data = $controller->edit($_GET['id']);
}

$data_admin = $controller->index();

require_once __DIR__ . '/../views/admin/admins.php';
?>
