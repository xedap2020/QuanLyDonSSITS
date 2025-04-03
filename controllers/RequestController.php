<?php
require_once __DIR__ . '/../models/Request.php';
require_once __DIR__ . '/../models/User.php';

class RequestController
{
    private function ensureLoggedIn()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }
    }

    public function index()
    {
        $this->ensureLoggedIn();

        $search      = $_GET['search'] ?? '';
        $currentPage = max((int)($_GET['page'] ?? 1), 1);
        $limit       = 16;
        $offset      = ($currentPage - 1) * $limit;

        $currentUser   = $_SESSION['user'];
        $isManager     = $currentUser['user_type'] === 'manager';

        // Hiện tại cả Admin và Manager dùng cùng một logic tìm kiếm
        $requests       = Request::search($search, $limit, $offset);
        $totalRequests  = Request::countFiltered($search);
        $totalPages     = ceil($totalRequests / $limit);

        require_once __DIR__ . '/../views/requests/index.php';
    }

    public function create()
    {
        $this->ensureLoggedIn();

        $currentUser   = $_SESSION['user'];
        $departmentId  = $currentUser['department_id'];

        $db = Database::connect();
        $stmt = $db->prepare("SELECT id, full_name FROM users WHERE user_type = 'manager' AND department_id = ?");
        $stmt->execute([$departmentId]);
        $approvers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/requests/create.php';
    }

    public function confirm()
    {
        $this->ensureLoggedIn();

        $data = $_POST;
        $file = $_FILES['attached_file'] ?? null;

        // Lưu file đính kèm nếu có
        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $fileName   = uniqid() . '_' . basename($file['name']);
            $uploadPath = __DIR__ . '/../uploads/' . $fileName;
            move_uploaded_file($file['tmp_name'], $uploadPath);
            $data['attached_file'] = $fileName;
        }

        // Lấy tên người duyệt từ ID để hiển thị
        if (!empty($data['approver_id'])) {
            $db = Database::connect();
            $stmt = $db->prepare("SELECT full_name FROM users WHERE id = ?");
            $stmt->execute([$data['approver_id']]);
            $approver = $stmt->fetch(PDO::FETCH_ASSOC);
            $data['approver_name'] = $approver['full_name'] ?? '';
        }

        $_SESSION['confirm_request'] = $data;
        require_once __DIR__ . '/../views/requests/confirm_create.php';
    }

    public function store()
    {
        $this->ensureLoggedIn();

        $currentUser = $_SESSION['user'];

        $title       = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $approverId  = $_POST['approver_id'] ?? null;
        $type        = $_POST['type'] ?? '';
        $startDate   = $_POST['start_date'] ?? '';
        $endDate     = $_POST['end_date'] ?? '';
        $fileName    = null;

        $db = Database::connect();

        try {
            $db->beginTransaction();

            // Xử lý upload file nếu có
            if (isset($_FILES['attached_file']) && $_FILES['attached_file']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../uploads/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

                $originalName = $_FILES['attached_file']['name'];
                $fileTmp      = $_FILES['attached_file']['tmp_name'];
                $ext          = pathinfo($originalName, PATHINFO_EXTENSION);
                $fileName     = uniqid('file_') . '.' . $ext;
                move_uploaded_file($fileTmp, $uploadDir . $fileName);
            }

            $stmt = $db->prepare("INSERT INTO requests (user_id, approver_id, title, description, type, start_date, end_date, attached_file)
                                  VALUES (:user_id, :approver_id, :title, :description, :type, :start_date, :end_date, :attached_file)");
            $stmt->execute([
                ':user_id'       => $currentUser['id'],
                ':approver_id'   => $approverId,
                ':title'         => $title,
                ':description'   => $description,
                ':type'          => $type,
                ':start_date'    => $startDate,
                ':end_date'      => $endDate,
                ':attached_file' => $fileName
            ]);

            $db->commit();

            header("Location: /approval_system/public/requests");
            exit;
        } catch (Exception $e) {
            $db->rollBack();
            echo "Đã có lỗi xảy ra khi lưu đơn: " . $e->getMessage();
            exit;
        }
    }

    public function cancel()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /approval_system/public/login");
            exit;
        }

        $requestId = $_POST['request_id'] ?? null;
        $reason    = trim($_POST['reason_cancel'] ?? '');

        if (!$requestId || $reason === '') {
            echo "Thiếu thông tin hủy đơn.";
            exit;
        }

        $db = Database::connect();

        try {
            $db->beginTransaction();

            $stmt = $db->prepare("UPDATE requests SET status = 'cancelled', reason_cancel = :reason, updated_at = NOW() WHERE id = :id");
            $stmt->execute([
                ':reason' => $reason,
                ':id'     => $requestId
            ]);

            $db->commit();
            header("Location: /approval_system/public/requests");
            exit;
        } catch (Exception $e) {
            $db->rollBack();
            echo "Có lỗi khi hủy đơn: " . $e->getMessage();
            exit;
        }
    }

    public function approveForm($id)
    {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'manager') {
            header("Location: /approval_system/public/login");
            exit;
        }

        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM requests WHERE id = ?");
        $stmt->execute([$id]);
        $request = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$request) {
            echo "Không tìm thấy đơn.";
            exit;
        }

        require_once __DIR__ . '/../views/requests/approve_form.php'; 
    }

    public function approve() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'manager') {
            header("Location: /approval_system/public/login");
            exit;
        }
    
        $requestId = $_POST['request_id'] ?? null;
        if (!$requestId) {
            echo "Thiếu ID đơn.";
            exit;
        }
    
        $db = Database::connect();
    
        try {
            $db->beginTransaction();
    
            $stmt = $db->prepare("UPDATE requests SET status = 'approved', approved_at = NOW() WHERE id = ?");
            $stmt->execute([$requestId]);
    
            $db->commit();
    
            header("Location: /approval_system/public/requests");
            exit;
        } catch (Exception $e) {
            $db->rollBack();
            echo "Lỗi khi duyệt đơn: " . $e->getMessage();
            exit;
        }
    }

}
