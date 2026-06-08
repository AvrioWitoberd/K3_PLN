<?php
class ArtikelModel {
    private $conn;
    private $table_name = "artikel_edukasi";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " 
                  (judul, slug, konten, gambar_cover, status, created_by) 
                  VALUES (:judul, :slug, :konten, :gambar_cover, :status, :created_by)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $data['judul']);
        $stmt->bindParam(':slug', $data['slug']);
        $stmt->bindParam(':konten', $data['konten']);
        $stmt->bindParam(':gambar_cover', $data['gambar_cover']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':created_by', $data['created_by']);
        
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " 
                  SET judul = :judul, slug = :slug, konten = :konten, gambar_cover = :gambar_cover, status = :status 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $data['judul']);
        $stmt->bindParam(':slug', $data['slug']);
        $stmt->bindParam(':konten', $data['konten']);
        $stmt->bindParam(':gambar_cover', $data['gambar_cover']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
