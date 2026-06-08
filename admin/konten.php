<?php
$base_path = '../';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/KontenController.php';

$auth = new AuthController();
$auth->checkAuth();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $auth->logout();
    header('Location: login.php');
    exit;
}

$controller = new KontenController();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    if (isset($_POST['konten']) && is_array($_POST['konten'])) {
        if ($controller->update($_POST['konten'])) {
            header('Location: konten.php?msg=updated');
            exit;
        } else {
            $error = 'Gagal menyimpan perubahan. Silakan coba lagi.';
        }
    } else {
        $error = 'Data konten tidak valid.';
    }
}

$data_konten = $controller->index();
$konten_website = [];
if (is_array($data_konten)) {
    foreach ($data_konten as $item) {
        $konten_website[$item['grup']][] = $item;
    }
}

require_once __DIR__ . '/../views/admin/konten.php';
?>
