<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/ArtikelModel.php';

class ArtikelController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new ArtikelModel($db);
    }

    public function index() {
        return $this->model->getAll();
    }

    public function getPublished() {
        return $this->model->getPublished();
    }

    public function getBySlug($slug) {
        return $this->model->getBySlug($slug);
    }

    public function store($data) {
        try {
            return $this->model->create($data);
        } catch (PDOException $e) {
            // Mengatasi error slug duplicate atau DB exception lain
            return false;
        }
    }

    public function update($id, $data) {
        try {
            return $this->model->update($id, $data);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}
?>
