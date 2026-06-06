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
}
?>
