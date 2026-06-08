<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/RisikoModel.php';
require_once __DIR__ . '/../models/ActivityModel.php';

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
            $result = $this->model->create($lokasi, $sumber, $kategori, $cegah);
            if ($result) {
                if (session_status() === PHP_SESSION_NONE) { session_start(); }
                $db = (new Database())->getConnection();
                $activityModel = new ActivityModel($db);
                $activityModel->logActivity($_SESSION['user_id'] ?? null, $_SESSION['username'] ?? 'System', 'Tambah Risiko (' . $lokasi . ')');
            }
            return $result;
        }
        return false;
    }

    public function destroy($id) {
        $id = htmlspecialchars(strip_tags($id));
        $result = $this->model->delete($id);
        if ($result) {
            if (session_status() === PHP_SESSION_NONE) { session_start(); }
            $db = (new Database())->getConnection();
            $activityModel = new ActivityModel($db);
            $activityModel->logActivity($_SESSION['user_id'] ?? null, $_SESSION['username'] ?? 'System', 'Hapus Risiko ID ' . $id);
        }
        return $result;
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
            $result = $this->model->update($id, $data_clean);
            if ($result) {
                if (session_status() === PHP_SESSION_NONE) { session_start(); }
                $db = (new Database())->getConnection();
                $activityModel = new ActivityModel($db);
                $activityModel->logActivity($_SESSION['user_id'] ?? null, $_SESSION['username'] ?? 'System', 'Edit Risiko (' . $data_clean['lokasi'] . ')');
            }
            return $result;
        }
        return false;
    }
}
?>
