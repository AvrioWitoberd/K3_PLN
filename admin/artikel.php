<?php
$base_path = '../';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/ArtikelController.php';

$auth = new AuthController();
$auth->checkAuth();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $auth->logout();
    header('Location: login.php');
    exit;
}

$controller = new ArtikelController();
$error = '';

// Tambah Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $data = [
        'judul' => $_POST['judul'],
        'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['judul']))),
        'konten' => $_POST['konten'],
        'gambar_cover' => $_POST['gambar_cover'] ?? null,
        'status' => $_POST['status'] ?? 'draft',
        'created_by' => $_SESSION['user_id'] ?? 1
    ];
    if ($controller->store($data)) {
        header('Location: artikel.php?msg=added');
        exit;
    } else {
        $error = 'Gagal menambahkan artikel. Pastikan semua field wajib terisi.';
    }
}

// Hapus Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    if ($controller->destroy($_POST['id'])) {
        header('Location: artikel.php?msg=deleted');
        exit;
    } else {
        $error = 'Gagal menghapus artikel dari database.';
    }
}

// Update Data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $data = [
        'judul' => $_POST['judul'],
        'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['judul']))),
        'konten' => $_POST['konten'],
        'gambar_cover' => $_POST['gambar_cover'] ?? null,
        'status' => $_POST['status'] ?? 'draft'
    ];
    if ($controller->update($_POST['id'], $data)) {
        header('Location: artikel.php?msg=updated');
        exit;
    } else {
        $error = 'Gagal memperbarui artikel. Pastikan semua field wajib terisi.';
    }
}

// Mode edit — load data ke form
$edit_data = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    // Assuming we use a direct model call here since edit method wasn't added to ArtikelController yet.
    // Or we can fetch all and find it, but let's query it.
    // Wait, the model has getById, let's use that.
    $db = (new Database())->getConnection();
    $editModel = new ArtikelModel($db);
    $edit_data = $editModel->getById($_GET['id']);
}

// Load semua data artikel
$data_artikel = $controller->index();

require_once __DIR__ . '/../views/admin/artikel.php';
?>
