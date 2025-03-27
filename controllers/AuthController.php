<?php
class AuthController {
    public function loginForm() {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function login() {
        session_start();
        header('Content-Type: application/json');

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($username) || strlen($username) < 5) {
            echo json_encode([
                'success' => false,
                'message' => 'Tên đăng nhập phải có ít nhất 5 ký tự.'
            ]);
            return;
        }

        if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/', $password)) {
            echo json_encode([
                'success' => false,
                'message' => 'Mật khẩu ít nhất 8 kí tự, bao gồm số, kí tự đặc biệt'
            ]); 
            return;
        }

        $user = User::findByUsername($username);
        if (!$user || $user['password'] !== md5($password)) {
            echo json_encode([
                'success' => false,
                'message' => 'Sai tên đăng nhập hoặc mật khẩu.'
            ]);
            return;
        }

        // Kiểm tra đủ dữ liệu user_type và department_id
        if (!isset($user['user_type']) || !isset($user['department_id'])) {
            echo json_encode([
                'success' => false,
                'message' => 'Tài khoản chưa được cấu hình đầy đủ thông tin.'
            ]);
            return;
        }

        $_SESSION['user'] = $user;
        echo json_encode(['success' => true]);
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /approval_system/public/login");
        exit;
    }
}
