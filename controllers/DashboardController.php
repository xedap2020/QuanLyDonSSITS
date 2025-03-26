<?php
class DashboardController {
    public function index() {
        session_start();

        // Nếu chưa đăng nhập → chuyển về login
        if (empty($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }

        View::render('dashboard/index', [
            'user' => $_SESSION['user']
        ]);
    }
}
