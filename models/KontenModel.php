<?php
class KontenModel {
    private $conn;
    private $table_name = "konten_website";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByKey($key) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE kunci = :kunci LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kunci', $key);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getByGroup($group) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE grup = :grup ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':grup', $group);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateContent($key, $value) {
        $query = "UPDATE " . $this->table_name . " SET nilai = :nilai WHERE kunci = :kunci";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nilai', $value);
        $stmt->bindParam(':kunci', $key);
        return $stmt->execute();
    }
    public function getTotalKonten() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['total'] ?? 0;
    }
}
?>
