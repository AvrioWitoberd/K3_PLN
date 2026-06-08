<?php
class UserModel {
    private $conn;
    private $table_name = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function findByUsername($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    public function createUser($username, $password, $role) {
        $query = "INSERT INTO " . $this->table_name . " (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($query);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }
    public function getTotalUsers() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['total'] ?? 0;
    }

    public function getAllUsers() {
        $query = "SELECT id, username, role, created_at FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteUser($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getRoleStatistics() {
        $query = "SELECT role, COUNT(*) as count FROM " . $this->table_name . " GROUP BY role";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        // Return default array structure
        $stats = [
            'super_admin' => 0,
            'admin_k3' => 0,
            'operator' => 0,
            'viewer' => 0
        ];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $stats[$row['role']] = (int)$row['count'];
        }
        
        return $stats;
    }
}
?>
