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

        // Validate username
        if (empty($username) || strlen($username) < 5) {
            $this->respond(false, 'Tên đăng nhập phải có ít nhất 5 ký tự.');
            return;
        }

        // Validate password
        $passwordPattern = '/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/';
        if (!preg_match($passwordPattern, $password)) {
            $this->respond(false, 'Mật khẩu ít nhất 8 kí tự, bao gồm số, kí tự đặc biệt');
            return;
        }

        // Kiểm tra người dùng
        $user = User::findByUsername($username);
        if (!$user || $user['password'] !== md5($password)) {
            $this->respond(false, 'Sai tên đăng nhập hoặc mật khẩu.');
            return;
        }

        // Kiểm tra thông tin cần thiết
        if (empty($user['user_type']) || empty($user['department_id'])) {
            $this->respond(false, 'Tài khoản chưa được cấu hình đầy đủ thông tin.');
            return;
        }

        // Đăng nhập thành công
        $_SESSION['user'] = $user;
        $this->respond(true);
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /approval_system/public/login");
        exit;
    }

    // Phương thức tiện ích để trả về JSON
    private function respond(bool $success, string $message = '') {
        echo json_encode([
            'success' => $success,
            'message' => $message
        ]);
    }
}
