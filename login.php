<?php
require_once 'controllers/AuthController.php';

$auth = new AuthController();

// Redirect otomatis jika sudah login
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    
    // Delegasikan logika autentikasi ke Controller
    if ($auth->login($user, $pass)) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah.';
    }
}

// Render View Login
require_once 'views/login.php';
?>
