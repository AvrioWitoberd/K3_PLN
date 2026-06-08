<?php
$base_path = '../';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/RisikoController.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/KontenModel.php';
require_once __DIR__ . '/../models/ActivityModel.php';

$auth = new AuthController();
$auth->checkAuth();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $auth->logout();
    header('Location: login.php');
    exit;
}

$db = (new Database())->getConnection();

// Stats Risiko
$risikoController = new RisikoController();
$stats = $risikoController->getStatistics();
$total_risiko = $stats['total'];
$total_tinggi = $stats['tinggi'];
$total_sedang = $stats['sedang'];
$total_rendah = $stats['rendah'];

// Stats Sistem dihapus sesuai fokus K3

// Activity Log
$activityModel = new ActivityModel($db);
$recent_activities = $activityModel->getRecentLogs(10);

require_once __DIR__ . '/../views/admin/dashboard.php';
?>
