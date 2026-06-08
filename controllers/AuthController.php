<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/UserModel.php';

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
            session_regenerate_id(true); // Melindungi dari manipulasi sesi
            $_SESSION['admin_logged_in'] = true;       
            $_SESSION['user_id'] = $user['id'];        
            $_SESSION['username'] = $user['username']; 
            $_SESSION['role'] = $user['role'];         
            return true;
        }
        return false;
    }

    public function logout() {
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
