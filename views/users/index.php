<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        /* Định dạng toàn bộ trang */
        body {
            width: 1920px;
            height: 1080px;
            background: rgba(255, 255, 255, 1);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            position: fixed;
        }

        .sidebar {
            width: 269px; height: 100%;
            min-width: 112px; max-width: 280px;
            position: fixed; top: 76px; left: 0;
            background: #FFFFFF;
            border-radius: 4px;
            padding: 8px 0;
            box-shadow: 0px 2px 6px 2px #00000026, 0px 1px 2px 0px #0000004D;
        }

        .user-label {
            width: 111px;
            height: 22px; 
            position: absolute;
            top: 112px;
            left: 314px;
            font-weight: 400; 
            font-size: 16px; 
            line-height: 140%;
            letter-spacing: 0%;
            
            color: rgba(30, 30, 30, 1); 
            background: transparent;
        }
        
        .user-input {
            width: 272px;
            height: 40px;
            position: absolute;
            top: 102px;
            left: 425px;

            border-radius: 8px; 
            border-width: 1px; 
            border-top: 1px solid rgba(217, 217, 217, 1); 
            border-right: 1px solid rgba(217, 217, 217, 1);
            border-bottom: 1px solid rgba(217, 217, 217, 1);
            border-left: 1px solid rgba(217, 217, 217, 1);

            background: rgba(255, 255, 255, 1); 
            font-size: 14px;
            outline: none;
            padding-left: 8px;
        }

        .user-input::placeholder {
            width: 240px;
            height: 16px;
            font-weight: 400; 
            font-size: 14px; 
            line-height: 100%;
            letter-spacing: 0%;

            color: rgba(179, 179, 179, 1); 
            background: transparent;
            text-indent: 0;
        }

        .search-button {
            width: 93px;  
            height: 40px;
            position: absolute;
            top: 103px;
            left: 732px;

            border-radius: 8px; 
            border-width: 1px; 
            border: none;

            background: rgba(255, 119, 0, 1); /* Màu nền */

            font-weight: 400; /* Độ đậm */
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            
            color: rgba(245, 245, 245, 1); /* Màu chữ */
            text-align: center;
            cursor: pointer;

            padding: 8px 12px; 
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px; 
        }

        .search-button:hover {
            background: rgba(230, 108, 0, 1);
        }

        .search-button:active {
            background: rgba(200, 90, 0, 1);
        }

        .add-button {
            width: 99px;
            height: 40px;
            position: absolute;
            top: 102px;
            left: 1173px;

            border-radius: 8px; 
            border-width: 1px; 
            border: none;

            background: rgba(0, 126, 198, 1); 

            font-weight: 600; 
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            
            color: rgba(255, 255, 255, 1); 
            text-align: center;
            cursor: pointer;

            padding: 8px 12px; 
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px; 
        }

        .add-button:hover {
            background: rgba(0, 110, 175, 1);
        }

        .add-button:active {
            background: rgba(0, 90, 150, 1);
        }

        .delete-multiple-button {
            width: 99px;
            height: 40px;
            position: absolute;
            top: 102px;
            left: 1290px;

            border-radius: 8px; 
            border-width: 1px; 
            border: none;

            background: rgba(236, 34, 31, 1); 

            font-weight: 600; 
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            
            color: rgba(255, 255, 255, 1); 
            text-align: center;
            cursor: pointer;

            padding: 8px 12px; 
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px; 
        }

        .delete-multiple-button:hover {
            background: rgba(210, 30, 28, 1);
        }
        
        .delete-multiple-button:active {
            background: rgba(180, 25, 23, 1);
        }

        .table-container {
            width: 1083px;
            height: 646px;
            position: absolute;
            top: 173px;
            left: 305px;
            border-radius: 4px;
            border: 0.5px solid rgba(204, 204, 204, 1);
            border-bottom: none;
            border: none !important;
        }
    
        .custom-table thead th {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            line-height: 130%;
            letter-spacing: 0%;
            color: rgba(0, 0, 0, 1);
            padding: 0px 12px;
            text-align: left;
            border: 0.5px solid rgba(204, 204, 204, 1);
        }

        .custom-table thead tr:first-child th:first-child {
            border-top-left-radius: 4px;
        }

        .custom-table thead tr:first-child th:last-child {
            border-top-right-radius: 4px;
        }

        .custom-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 4px;
        }

        .custom-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 4px;
        }


        .custom-table {
            width: 100%;
            border-spacing: 0; 
            border: none !important;
        }

        .custom-table thead {
            background: rgba(240, 240, 240, 1);
            font-weight: bold;
        }

        .custom-table th,
        .custom-table td {
            height: 36px;
            padding: 0px 12px; 
            border: 0.5px solid rgba(204, 204, 204, 1);
            text-align: left;
            white-space: nowrap; 
            overflow: hidden;
            text-overflow: ellipsis; 
            vertical-align: middle; 
            font-size: 12px;
        }

        .custom-table tbody tr:hover {
            background: rgba(185, 185, 185, 1);
            cursor: pointer;
        }

        .custom-table th:nth-child(1),
        .custom-table td:nth-child(1) {
            width: 66px; 
        }

        .custom-table th:nth-child(2),
        .custom-table td:nth-child(2) {
            width: 116px; 
        }

        .custom-table th:nth-child(3),
        .custom-table td:nth-child(3) {
            width: 187px; 
        }

        .custom-table th:nth-child(4),
        .custom-table td:nth-child(4) {
            width: 191px; 
        }

        .custom-table th:nth-child(5),
        .custom-table td:nth-child(5) {
            width: 209px; 
        }

        .custom-table th:nth-child(6),
        .custom-table td:nth-child(6) {
            width: 314px; 
        }

        .custom-checkbox {
            width: 24px;
            height: 24px;
            border-radius: 4px;
            border: 1px solid rgba(204, 204, 204, 1); 
            background: rgba(255, 255, 255, 1);
            cursor: pointer;
            appearance: none; 
            display: block;
            margin: auto;
        }

        .custom-checkbox:checked {
            background: rgba(255, 255, 255, 1);; 
            position: relative;
        }

        .custom-checkbox:checked::before {
            content: "✔";
            font-size: 16;
            color: rgba(26, 26, 26, 0.87);
            font-weight: bold;
            display: block;
            text-align: center;
        }

        .action-buttons {
            display: flex;
            justify-content: left;
            gap: 8px;
        }

        .edit-button, .delete-button {
            width: 48px;
            height: 25px;
            border-radius: 8px;
            border: none;
            color: white;
            font-size: 14px;
            font-weight: 100;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            text-decoration: none; 
        }

        .edit-button {
            background: rgba(20, 174, 92, 1);
        }

        .delete-button {
            background: rgba(236, 34, 31, 1);
        }

        .edit-button:hover {
            background: rgba(16, 140, 75, 1);
        }

        .delete-button:hover {
            background: rgba(200, 30, 25, 1);
        }

        .pagination-container {
            position: absolute; 
            width: 489px;
            height: 38px;
            top: 844px;
            left: 290px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap; 
        }

        .pagination-table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 1); 
        }

        .pagination-table td {
            text-align: center;
            padding: 4px;
        }

        .pagination-btn {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            border: none;
            background: rgba(255, 255, 255, 1);
            color: rgba(30, 30, 30, 1);
            font-size: 14px;
            font-weight: 400;
            text-align: center;
            cursor: pointer;
        }

        .previous, .next {
            width: 84px;
            height: 32px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 1);
            font-size: 14px;
            font-weight: 400;
            white-space: nowrap;
            padding: 0 12px;
        }


        .previous:disabled {
            color: rgba(200, 200, 200, 1);
            cursor: default;
        }

        .next:disabled {
            color: rgba(200, 200, 200, 1);
            cursor: default;
        }

        .pagination-btn.active {
            background: rgba(0, 0, 0, 1);
            color: white;
        }

        .pagination-dots {
            font-size: 14px;
            color: rgba(0, 0, 0, 1);
            font-weight: bold;
        }

    </style>
</head>
<body>

    <?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="sidebar">
      <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    </div>

    <div class="user-label">Mã/Tên user</div>
   
    <form method="GET" action="/approval_system/public/users">
        <input type="text" class="user-input" name="search" placeholder="Value" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button class="search-button" type="submit">Tìm kiếm</button>
    </form>

    <form action="/approval_system/public/users/create" method="get">
        <button type="submit" class="add-button">Thêm mới</button>
    </form>
    
    <form id="delete-multiple-form" action="/approval_system/public/users/delete-multiple" method="post" style="display:inline;">
        <input type="hidden" name="ids[]" id="selected-user-ids">
        <button type="button" class="delete-multiple-button">Xóa nhiều</button>
    </form>
   
    <!-- Container của bảng -->
    <div class="table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th><input type="checkbox" class="custom-checkbox" id="selectAll"></th>
                    <th>Mã người dùng</th>
                    <th>Tên người dùng</th>
                    <th>Ngày lập</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                <?php
                    $userId = $user['id'];
                    $userName = htmlspecialchars($user['full_name']);
                    $createdDate = date('Y-m-d', strtotime($user['created_at']));
                    $statusLabel = $user['status'] === 'active' ? 'Đang hoạt động' : 'Ngưng hoạt động';

                    $currentUser = $_SESSION['user'];

                    // Gán biến vai trò và phòng ban
                    $currentRole = $currentUser['user_type'];
                    $currentDept = $currentUser['department_id'];

                    $targetRole = $user['user_type'];
                    $targetDept = $user['department_id'];

                    // Logic phân quyền
                    $canEdit = false;
                    $canDelete = false;

                    if ($currentUser['id'] == $userId) {
                        $canEdit = true; // Ai cũng được sửa chính mình
                    } elseif ($currentRole === 'admin' && $targetRole === 'manager') {
                        $canEdit = true;
                        $canDelete = true;
                    } elseif ($currentRole === 'manager' && $targetRole === 'user' && $currentDept == $targetDept) {
                        $canEdit = true;
                        $canDelete = true;
                    }
                ?>
                <tr>
                    <td><input type="checkbox" class="custom-checkbox user-checkbox" value="<?= $userId ?>"></td>
                    <td><?= str_pad($userId, 4, '0', STR_PAD_LEFT) ?></td>
                    <td><?= $userName ?></td>
                    <td><?= $createdDate ?></td>
                    <td><?= $statusLabel ?></td>
                    <td>
                        <div class="action-buttons">
                            <?php if ($canEdit): ?>
                                <form action="/approval_system/public/users/edit/<?= $userId ?>" method="get" style="display:inline;">
                                    <button type="submit" class="edit-button">Sửa</button>
                                </form>
                            <?php endif; ?>
                            <?php if ($canDelete): ?>
                                <form action="/approval_system/public/users/delete" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $userId ?>">
                                    <button type="submit" class="delete-button">Xóa</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <table class="pagination-table">
            <tr>
                <td>
                    <button class="pagination-btn previous" 
                        <?= ($currentPage <= 1 || $totalPages <= 1) ? 'disabled' : '' ?> 
                        onclick="changePage(<?= $currentPage - 1 ?>)">← Previous
                    </button>
                </td>

                <?php
                    $visiblePages = 3;
                    $start = max(1, $currentPage - 1);
                    $end = min($totalPages, $start + $visiblePages - 1);

                    if ($start > 1) {
                        echo "<td><button class='pagination-btn' onclick='changePage(1)'>1</button></td>";
                        if ($start > 2) echo "<td><span class='pagination-dots'>...</span></td>";
                    }

                    for ($i = $start; $i <= $end; $i++) {
                        $active = $i == $currentPage ? 'active' : '';
                        echo "<td><button class='pagination-btn $active' onclick='changePage($i)'>$i</button></td>";
                    }

                    if ($end < $totalPages) {
                        if ($end < $totalPages - 1) {
                            echo "<td><span class='pagination-dots'>...</span></td>";
                        }
                        echo "<td><button class='pagination-btn' onclick='changePage($totalPages)'>$totalPages</button></td>";
                    }
                ?>

                <td>
                    <button class="pagination-btn next" 
                        <?= ($currentPage >= $totalPages || $totalPages <= 1) ? 'disabled' : '' ?> 
                        onclick="changePage(<?= $currentPage + 1 ?>)">Next →
                    </button>
                </td>
            </tr>
        </table>
    </div>

    <?php include_once __DIR__ . '/../components/popup_confirm.php'; ?>

    <script>
        // ========== Checkbox "Chọn tất cả" ==========
        const selectAllCheckbox = document.getElementById('selectAll');
        const userCheckboxes = document.querySelectorAll('.user-checkbox');

        selectAllCheckbox?.addEventListener('change', function () {
            userCheckboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        userCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const allChecked = Array.from(userCheckboxes).every(cb => cb.checked);
                selectAllCheckbox.checked = allChecked;
            });
        });

        // ========== Phân trang ==========
        function changePage(page) {
            const url = new URL(window.location.href);
            url.searchParams.set('page', page);
            window.location.href = url.toString();
        }

        // ========== Ẩn nút cho User thường ==========
        const currentUserType = "<?= $_SESSION['user']['user_type'] ?>";
        if (currentUserType === 'user') {
            document.querySelector('.add-button')?.remove();
            document.querySelector('.delete-multiple-button')?.remove();
        }
        
        // ========== Xử lý ô tìm kiếm ==========
        const searchInput = document.querySelector('.user-input');
        const searchForm = searchInput?.closest('form');
        let previousValue = searchInput?.value || '';

        searchInput?.addEventListener('input', function () {
            const currentValue = this.value.trim();
            if (previousValue.length > 0 && currentValue.length === 0) {
                localStorage.setItem('refocusSearch', 'true');
                searchForm.submit();
            }
            previousValue = currentValue;
        });

        window.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('refocusSearch') === 'true') {
                searchInput?.focus();
                localStorage.removeItem('refocusSearch');
            }
        });

        document.querySelectorAll('.delete-button').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                const form = this.closest('form');
                const popup = document.getElementById('popup-confirm-overlay');
                const okBtn = document.getElementById('popup-ok');
                const cancelBtn = document.getElementById('popup-cancel');

                popup.style.display = 'flex';
                document.getElementById('popup-message').textContent = 'Bạn có chắc chắn muốn xóa người dùng này?';

                okBtn.onclick = () => {
                    popup.style.display = 'none';
                    form.submit(); // gửi form xóa
                };

                cancelBtn.onclick = () => {
                    popup.style.display = 'none';
                };
            });
        });

        const deleteManyBtn = document.querySelector('.delete-multiple-button');
        const checkboxes = document.querySelectorAll('.user-checkbox');
        const formMulti = document.getElementById('delete-multiple-form');
        const hiddenInput = document.getElementById('selected-user-ids');
        const popup = document.getElementById('popup-confirm-overlay');
        const okBtn = document.getElementById('popup-ok');
        const cancelBtn = document.getElementById('popup-cancel');

        deleteManyBtn?.addEventListener('click', function () {
            const selectedIds = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            if (selectedIds.length === 0) {
                alert('Vui lòng chọn ít nhất một người dùng để xóa.');
                return;
            }

            document.getElementById('popup-message').textContent = 'Bạn có chắc chắn muốn xóa các người dùng đã chọn?';
            popup.style.display = 'flex';

            okBtn.onclick = () => {
                popup.style.display = 'none';

                // Gắn input hidden động để gửi dữ liệu mảng ids[]
                selectedIds.forEach(id => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'ids[]';
                    input.value = id;
                    formMulti.appendChild(input);
                });

                formMulti.submit();
            };

            cancelBtn.onclick = () => {
                popup.style.display = 'none';
            };
        });

    </script>

</body>
</html>


