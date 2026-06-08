<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new UserModel($db);
    }

    public function index() {
        return $this->model->getAllUsers();
    }

    public function getStats() {
        $stats = $this->model->getRoleStatistics();
        $total = $this->model->getTotalUsers();
        $stats['total'] = $total;
        return $stats;
    }
}
?>
