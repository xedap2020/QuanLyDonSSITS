<?php
class RequestController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }

        require_once __DIR__ . '/../views/requests/index.php';
    }
}
