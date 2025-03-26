<?php
require_once __DIR__ . '/../models/User.php';

class UserController {

    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }

        // Lấy danh sách người dùng từ model
        $users = User::all();

        // Gửi dữ liệu ra view
        require_once __DIR__ . '/../views/users/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }

        require_once __DIR__ . '/../config/database.php';
        $db = Database::connect();

        // Lấy danh sách phòng ban
        $stmt = $db->query("SELECT * FROM departments");
        $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/users/create.php';
    }

}
