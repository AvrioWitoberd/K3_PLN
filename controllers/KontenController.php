<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/KontenModel.php';
require_once __DIR__ . '/../models/ActivityModel.php';

class KontenController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new KontenModel($db);
    }

    public function index() {
        return $this->model->getAll();
    }

    public function update($data) {
        $success = true;
        foreach ($data as $key => $value) {
            $key_clean = htmlspecialchars(strip_tags($key));
            $value_clean = htmlspecialchars(strip_tags($value));
            
            if (!$this->model->updateContent($key_clean, $value_clean)) {
                $success = false;
            }
        }
        if ($success) {
            if (session_status() === PHP_SESSION_NONE) { session_start(); }
            $db = (new Database())->getConnection();
            $activityModel = new ActivityModel($db);
            $activityModel->logActivity($_SESSION['user_id'] ?? null, $_SESSION['username'] ?? 'System', 'Update CMS Website');
        }
        return $success;
    }
}
?>
