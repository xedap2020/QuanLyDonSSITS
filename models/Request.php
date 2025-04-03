<?php

class Request
{
    public static function paginate($limit, $offset)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT r.*, u.full_name AS user_name
            FROM requests r
            JOIN users u ON r.user_id = u.id
            ORDER BY r.created_at DESC
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countAll()
    {
        $db = Database::connect();
        return $db->query("SELECT COUNT(*) FROM requests")->fetchColumn();
    }

    public static function paginateByDepartment($departmentId, $limit, $offset)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT r.*, u.full_name AS user_name
            FROM requests r
            JOIN users u ON r.user_id = u.id
            WHERE u.department_id = :dept
            ORDER BY r.created_at DESC
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':dept', $departmentId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countByDepartment($departmentId)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT COUNT(*) FROM requests r
            JOIN users u ON r.user_id = u.id
            WHERE u.department_id = :dept
        ");
        $stmt->bindValue(':dept', $departmentId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public static function create($data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            INSERT INTO requests (user_id, approver_id, title, description, type, start_date, end_date, attached_file)
            VALUES (:user_id, :approver_id, :title, :description, :type, :start_date, :end_date, :attached_file)
        ");

        $stmt->execute([
            ':user_id' => $data['user_id'],
            ':approver_id' => $data['approver_id'],
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':type' => $data['type'],
            ':start_date' => $data['start_date'],
            ':end_date' => $data['end_date'],
            ':attached_file' => $data['attached_file'],
        ]);
    }

    public static function search($search, $limit, $offset)
    {
        $db = Database::connect();

        $sql = "
            SELECT r.*, u.full_name as user_name
            FROM requests r
            JOIN users u ON r.user_id = u.id
            WHERE 1
        ";

        if (!empty($search)) {
            $sql .= " AND (
                u.full_name LIKE :search OR 
                CASE r.type
                    WHEN 'leave' THEN 'Xin nghỉ phép'
                    WHEN 'equipment' THEN 'Mượn thiết bị'
                    WHEN 'schedule_change' THEN 'Đổi lịch'
                    WHEN 'expense' THEN 'Hoàn phí'
                    ELSE ''
                END LIKE :search OR 
                r.description LIKE :search
            )";
        }

        $sql .= " ORDER BY r.created_at DESC LIMIT :limit OFFSET :offset";

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

        $sql = "
            SELECT COUNT(*) 
            FROM requests r
            JOIN users u ON r.user_id = u.id
            WHERE 1
        ";

        if (!empty($search)) {
            $sql .= " AND (
                u.full_name LIKE :search OR 
                r.type LIKE :search OR 
                r.description LIKE :search
            )";
        }

        $stmt = $db->prepare($sql);

        if (!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchColumn();
    }

}