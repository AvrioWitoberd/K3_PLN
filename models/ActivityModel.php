<?php
class ActivityModel {
    private $conn;
    private $table_name = "activity_logs";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function logActivity($user_id, $username, $activity) {
        $query = "INSERT INTO " . $this->table_name . " (user_id, username, activity) VALUES (:user_id, :username, :activity)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':activity', $activity);

        return $stmt->execute();
    }

    public function getRecentLogs($limit = 10) {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->conn->prepare($query);
        // Bind parameter for LIMIT must be integer
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
