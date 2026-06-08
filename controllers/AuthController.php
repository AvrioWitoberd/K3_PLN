<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/ActivityModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new UserModel($db);
    }

    public function login($username, $password) {
        $user = $this->userModel->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            $db = (new Database())->getConnection();
            $activityModel = new ActivityModel($db);
            $activityModel->logActivity($user['id'], $user['username'], 'Login berhasil');
            return true;
        }
        return false;
    }

    public function logout() {
        if (isset($_SESSION['user_id'])) {
            $db = (new Database())->getConnection();
            $activityModel = new ActivityModel($db);
            $activityModel->logActivity($_SESSION['user_id'], $_SESSION['username'], 'Logout');
        }
        session_destroy();
    }

    public function checkAuth() {
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: login.php');
            exit;
        }
    }
}
?>
