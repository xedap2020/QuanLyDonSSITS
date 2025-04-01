<?php
require_once __DIR__ . '/../models/User.php';

class UserController
{
    // ==============================
    // 🔐 Yêu cầu đăng nhập & tiện ích
    // ==============================

    private function requireLogin()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }
    }

    private function getDepartments()
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM departments")->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==============================
    // 📄 Hiển thị giao diện
    // ==============================

    public function index()
    {
        $this->requireLogin();

        $search       = $_GET['search'] ?? '';
        $currentPage  = max((int)($_GET['page'] ?? 1), 1);
        $limit        = 16;
        $offset       = ($currentPage - 1) * $limit;

        $users        = User::search($search, $limit, $offset);
        $totalUsers   = User::countFiltered($search);
        $totalPages   = ceil($totalUsers / $limit);

        require_once __DIR__ . '/../views/users/index.php';
    }

    public function create()
    {
        $this->requireLogin();
        $departments = $this->getDepartments();
        require_once __DIR__ . '/../views/users/create.php';
    }

    public function edit($id)
    {
        $this->requireLogin();

        $db   = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $departments = $this->getDepartments();
        require_once __DIR__ . '/../views/users/edit.php';
    }

    public function confirm()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /approval_system/public/users/create");
            exit;
        }

        $departments = $this->getDepartments();

        $username     = $_POST['username']      ?? '';
        $fullname     = $_POST['full_name']     ?? '';
        $password     = $_POST['password']      ?? '';
        $email        = $_POST['email']         ?? '';
        $dob          = $_POST['dob']           ?? '';
        $userType     = $_POST['user_type']     ?? '';
        $departmentId = $_POST['department_id'] ?? '';

        require __DIR__ . '/../views/users/confirm_create.php';
    }

    public function checkUsername()
    {
        $username = $_GET['username'] ?? '';
        $exists   = User::exists($username);

        echo json_encode(['exists' => $exists]);
    }

    // ==============================
    // ✅ Xử lý lưu dữ liệu
    // ==============================

    public function store()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /approval_system/public/users/create");
            exit;
        }

        $username     = $_POST['username']      ?? '';
        $fullname     = $_POST['full_name']     ?? '';
        $password     = $_POST['password']      ?? '';
        $email        = $_POST['email']         ?? null;
        $dob          = $_POST['dob']           ?? null;
        $userType     = $_POST['user_type']     ?? '';
        $departmentId = $_POST['department_id'] ?? '';

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $db = Database::connect();
        $stmt = $db->prepare("
            INSERT INTO users (
                username, password, full_name, email, dob, user_type, department_id, status, created_at
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, 'active', NOW()
            )
        ");
        $stmt->execute([
            $username,
            $hashedPassword,
            $fullname,
            $email,
            $dob,
            $userType,
            $departmentId
        ]);

        header("Location: /approval_system/public/users");
        exit;
    }

    // ==============================
    // ❌ Xử lý xóa mềm
    // ==============================

    public function delete()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /approval_system/public/users");
            exit;
        }

        $id = $_POST['id'] ?? null;

        if ($id) {
            User::softDelete($id);
        }

        header("Location: /approval_system/public/users");
        exit;
    }

    public function deleteMultiple()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /approval_system/public/users");
            exit;
        }

        $ids = $_POST['ids'] ?? [];

        if (!empty($ids)) {
            User::softDeleteMany($ids);
        }

        header("Location: /approval_system/public/users");
        exit;
    }
}
