<?php
class User {
    public static function findByUsername($username) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT id, full_name, status, created_at, user_type, department_id FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function paginate($limit, $offset) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT id, full_name, status, created_at, user_type, department_id FROM users LIMIT ? OFFSET ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function count() {
        $db = Database::connect();
        $stmt = $db->query("SELECT COUNT(*) FROM users");
        return $stmt->fetchColumn();
    }
    
}
