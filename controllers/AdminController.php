<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/ActivityModel.php';

class AdminController {
    private $model;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new UserModel($this->db);
    }

    public function index() {
        return $this->model->getAllUsers();
    }

    public function edit($id) {
        return $this->model->getUserById($id);
    }

    public function store($data) {
        $username = trim($data['username']);
        $password = $data['password'];
        $role = 'admin'; // Role tunggal sesuai batasan
        
        // Cek username terdaftar
        if($this->model->findByUsername($username)) {
            return false;
        }

        $result = $this->model->createUser($username, $password, $role);
        if ($result) {
            $this->logActivity('Menambahkan admin baru: ' . $username);
        }
        return $result;
    }

    public function update($id, $data) {
        $username = trim($data['username']);
        $password = !empty($data['password']) ? $data['password'] : null;
        
        // Cek username exist tapi bukan id ini
        $existing = $this->model->findByUsername($username);
        if($existing && $existing['id'] != $id) {
            return false;
        }

        $result = $this->model->updateUser($id, $username, $password);
        if ($result) {
            $this->logActivity('Memperbarui data admin ID: ' . $id);
        }
        return $result;
    }

    public function destroy($id) {
        if ($id == $_SESSION['user_id']) {
            return false; // Prevent self deletion
        }
        $result = $this->model->deleteUser($id);
        if ($result) {
            $this->logActivity('Menghapus admin ID: ' . $id);
        }
        return $result;
    }

    private function logActivity($activity) {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        $activityModel = new ActivityModel($this->db);
        $activityModel->logActivity($_SESSION['user_id'] ?? null, $_SESSION['username'] ?? 'System', $activity);
    }
}
?>
