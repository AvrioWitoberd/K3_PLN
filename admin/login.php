<?php
$base_path = '../';
require_once __DIR__ . '/../controllers/AuthController.php';

$auth = new AuthController();

// Redirect otomatis jika sudah login
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    
    // Delegasikan logika autentikasi ke Controller
    if ($auth->login($user, $pass)) {
        header('Location: index.php');
        exit;
    } else {
        $error = 'Username atau password salah.';
    }
}

// Render View Login
require_once __DIR__ . '/../views/login.php';
?>
