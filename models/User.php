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
        $stmt = $db->query("SELECT id, full_name, status, created_at FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
