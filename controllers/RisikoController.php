<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/RisikoModel.php';

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

    public function indexPaginated($search = '', $kategori_filter = '', $page = 1, $per_page = 10) {
        $offset = ($page - 1) * $per_page;
        return $this->model->getPaginatedData($search, $kategori_filter, $per_page, $offset);
    }

    public function getTotalCount($search = '', $kategori_filter = '') {
        return $this->model->getTotalCount($search, $kategori_filter);
    }

    public function getStatistics() {
        $stats = $this->model->getStatistics();
        if(!$stats) {
            return ['total' => 0, 'tinggi' => 0, 'sedang' => 0, 'rendah' => 0];
        }
        return [
            'total' => $stats['total'] ?? 0,
            'tinggi' => $stats['tinggi'] ?? 0,
            'sedang' => $stats['sedang'] ?? 0,
            'rendah' => $stats['rendah'] ?? 0
        ];
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

    public function edit($id) {
        $id = htmlspecialchars(strip_tags($id));
        return $this->model->findById($id);
    }

    public function update($id, $data) {
        $id = htmlspecialchars(strip_tags($id));
        $data_clean = [
            'lokasi' => htmlspecialchars(strip_tags($data['lokasi'] ?? '')),
            'sumber_bahaya' => htmlspecialchars(strip_tags($data['sumber'] ?? '')),
            'kategori' => htmlspecialchars(strip_tags($data['kategori'] ?? 'badge--info')),
            'tindakan_pencegahan' => htmlspecialchars(strip_tags($data['cegah'] ?? '')),
        ];

        if (!empty($data_clean['lokasi']) && !empty($data_clean['sumber_bahaya']) && !empty($data_clean['tindakan_pencegahan'])) {
            return $this->model->update($id, $data_clean);
        }
        return false;
    }
}
?>
