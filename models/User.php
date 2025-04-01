<?php

class User
{
    // ============================
    // 🔍 Truy vấn theo điều kiện
    // ============================

    public static function findByUsername($username)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function exists($username)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetchColumn() > 0;
    }

    public static function search($search, $limit, $offset)
    {
        $db = Database::connect();
        $sql = "
            SELECT id, full_name, status, created_at, user_type, department_id 
            FROM users 
            WHERE status = 'active'
        ";

        if (!empty($search)) {
            $sql .= " AND (id LIKE :search OR full_name LIKE :search)";
        }

        $sql .= " ORDER BY id ASC LIMIT :limit OFFSET :offset";
        $stmt = $db->prepare($sql);

        if (!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countFiltered($search)
    {
        $db = Database::connect();
        $sql = "SELECT COUNT(*) FROM users WHERE status = 'active'";

        if (!empty($search)) {
            $sql .= " AND (id LIKE :search OR full_name LIKE :search)";
        }

        $stmt = $db->prepare($sql);

        if (!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // ============================
    // 📋 Danh sách / Phân trang
    // ============================

    public static function all()
    {
        $db = Database::connect();
        $sql = "SELECT id, full_name, status, created_at, user_type, department_id FROM users";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function paginate($limit, $offset)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT id, full_name, status, created_at, user_type, department_id 
            FROM users 
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function count()
    {
        $db = Database::connect();
        return $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }

    // ============================
    // ❌ Xóa mềm (soft delete)
    // ============================

    public static function softDelete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE users SET status = 'inactive' WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function softDeleteMany(array $ids)
    {
        if (empty($ids)) return false;

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE users SET status = 'inactive' WHERE id IN ($placeholders)");
        return $stmt->execute($ids);
    }
}
