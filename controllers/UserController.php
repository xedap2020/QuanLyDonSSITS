<?php
require_once __DIR__ . '/../models/User.php';

class UserController {

    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 16;
        $offset = ($currentPage - 1) * $limit;

        require_once __DIR__ . '/../models/User.php';
        $users = User::paginate($limit, $offset);
        $totalUsers = User::count();
        $totalPages = ceil($totalUsers / $limit);

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

        $stmt = $db->query("SELECT * FROM departments");
        $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/users/create.php';
    }

    public function edit($id) {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }

        require_once __DIR__ . '/../config/database.php';
        $db = Database::connect();

        // Lấy thông tin user cần sửa
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Lấy danh sách phòng ban
        $deptStmt = $db->query("SELECT * FROM departments");
        $departments = $deptStmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/users/edit.php';
    }
    
}
