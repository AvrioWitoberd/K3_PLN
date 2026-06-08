<?php
class RisikoModel {
    private $conn;
    private $table_name = "matriks_risiko";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPaginatedData($search = '', $kategori_filter = '', $limit = 10, $offset = 0) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE 1=1";
        if (!empty($search)) {
            $query .= " AND (lokasi LIKE :search OR sumber_bahaya LIKE :search)";
        }
        if (!empty($kategori_filter)) {
            $query .= " AND kategori = :kategori_filter";
        }
        $query .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        
        if (!empty($search)) {
            $searchTerm = "%{$search}%";
            $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        }
        if (!empty($kategori_filter)) {
            $stmt->bindParam(':kategori_filter', $kategori_filter, PDO::PARAM_STR);
        }
        
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotalCount($search = '', $kategori_filter = '') {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name . " WHERE 1=1";
        if (!empty($search)) {
            $query .= " AND (lokasi LIKE :search OR sumber_bahaya LIKE :search)";
        }
        if (!empty($kategori_filter)) {
            $query .= " AND kategori = :kategori_filter";
        }
        $stmt = $this->conn->prepare($query);
        if (!empty($search)) {
            $searchTerm = "%{$search}%";
            $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        }
        if (!empty($kategori_filter)) {
            $stmt->bindParam(':kategori_filter', $kategori_filter, PDO::PARAM_STR);
        }
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['total'];
    }

    public function getStatistics() {
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN kategori = 'badge--danger' THEN 1 ELSE 0 END) as tinggi,
                    SUM(CASE WHEN kategori = 'badge--warning' THEN 1 ELSE 0 END) as sedang,
                    SUM(CASE WHEN kategori = 'badge--info' THEN 1 ELSE 0 END) as rendah
                  FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($lokasi, $sumber, $kategori, $cegah) {
        $query = "INSERT INTO " . $this->table_name . " (lokasi, sumber_bahaya, kategori, tindakan_pencegahan) VALUES (:lokasi, :sumber, :kategori, :cegah)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':lokasi', $lokasi);
        $stmt->bindParam(':sumber', $sumber);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':cegah', $cegah);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function findById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " SET lokasi = :lokasi, sumber_bahaya = :sumber, kategori = :kategori, tindakan_pencegahan = :cegah WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':lokasi', $data['lokasi']);
        $stmt->bindParam(':sumber', $data['sumber_bahaya']);
        $stmt->bindParam(':kategori', $data['kategori']);
        $stmt->bindParam(':cegah', $data['tindakan_pencegahan']);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>
