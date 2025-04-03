<?php
require_once __DIR__ . '/../models/User.php';

class UserController
{
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

    public function index()
    {
        $this->requireLogin();

        $search      = $_GET['search'] ?? '';
        $currentPage = max((int)($_GET['page'] ?? 1), 1);
        $limit       = 16;
        $offset      = ($currentPage - 1) * $limit;

        $users       = User::search($search, $limit, $offset);
        $totalUsers  = User::countFiltered($search);
        $totalPages  = ceil($totalUsers / $limit);

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

    public function confirmEdit()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /approval_system/public/users");
            exit;
        }

        $id           = $_POST['id']            ?? '';
        $username     = $_POST['username']      ?? '';
        $fullname     = $_POST['full_name']     ?? '';
        $password     = $_POST['password']      ?? '';
        $email        = $_POST['email']         ?? '';
        $dob          = $_POST['dob']           ?? '';
        $userType     = $_POST['user_type']     ?? '';
        $departmentId = $_POST['department_id'] ?? '';

        $departments = $this->getDepartments();

        require_once __DIR__ . '/../views/users/confirm_edit.php';
    }

    public function checkUsername()
    {
        $username = $_GET['username'] ?? '';
        $exists   = User::exists($username);

        echo json_encode(['exists' => $exists]);
    }

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

        $hashedPassword = md5($password);

        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO users (username, password, full_name, email, dob, user_type, department_id, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, 'active', NOW())");
        $stmt->execute([$username, $hashedPassword, $fullname, $email, $dob, $userType, $departmentId]);

        header("Location: /approval_system/public/users");
        exit;
    }

    public function update()
    {
        $id            = $_POST['id'];
        $username      = $_POST['username'];
        $full_name     = $_POST['full_name'];
        $password      = $_POST['password'];
        $email         = $_POST['email'];
        $dob           = $_POST['dob'];
        $user_type     = $_POST['user_type'];
        $department_id = $_POST['department_id'];

        $pdo = Database::connect();

        try {
            $pdo->beginTransaction();

            if (!empty($password)) {
                // Nếu có nhập mật khẩu mới thì cập nhật
                $hashedPassword = md5($password);
                $stmt = $pdo->prepare("
                    UPDATE users 
                    SET full_name = :full_name, password = :password, email = :email, dob = :dob, user_type = :user_type, department_id = :department_id 
                    WHERE id = :id
                ");
                $stmt->execute([
                    ':full_name'     => $full_name,
                    ':password'      => $hashedPassword,
                    ':email'         => $email,
                    ':dob'           => $dob,
                    ':user_type'     => $user_type,
                    ':department_id' => $department_id,
                    ':id'            => $id
                ]);
            } else {
                // Nếu không nhập mật khẩu thì giữ nguyên mật khẩu cũ
                $stmt = $pdo->prepare("
                    UPDATE users 
                    SET full_name = :full_name, email = :email, dob = :dob, user_type = :user_type, department_id = :department_id 
                    WHERE id = :id
                ");
                $stmt->execute([
                    ':full_name'     => $full_name,
                    ':email'         => $email,
                    ':dob'           => $dob,
                    ':user_type'     => $user_type,
                    ':department_id' => $department_id,
                    ':id'            => $id
                ]);
            }

            $pdo->commit();

            header('Location: /approval_system/public/users');
            exit();
        } catch (Exception $e) {
            $pdo->rollBack();
            echo 'Lỗi cập nhật: ' . $e->getMessage();
        }
    }

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
