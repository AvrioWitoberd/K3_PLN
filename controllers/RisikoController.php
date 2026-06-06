<?php
require_once 'config/database.php';
require_once 'models/RisikoModel.php';

class RisikoController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new RisikoModel($db);
    }

    public function index() {
        return $this->model->getAll();
    }

    public function store($data) {
        $lokasi = htmlspecialchars(strip_tags($data['lokasi'] ?? ''));
        $sumber = htmlspecialchars(strip_tags($data['sumber'] ?? ''));
        $kategori = htmlspecialchars(strip_tags($data['kategori'] ?? 'badge--info'));
        $cegah = htmlspecialchars(strip_tags($data['cegah'] ?? ''));

        if (!empty($lokasi) && !empty($sumber) && !empty($cegah)) {
            return $this->model->create($lokasi, $sumber, $kategori, $cegah);
        }
        return false;
    }

    public function destroy($id) {
        $id = htmlspecialchars(strip_tags($id));
        return $this->model->delete($id);
    }
}
?>
