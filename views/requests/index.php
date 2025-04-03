<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>

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
            width: 216px;
            height: 22px;
            position: absolute;
            top: 112px;
            left: 314px;

            font-family: 'Noto Sans JP', sans-serif; 
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
            left: 549px;

            border-radius: 8px; 
            border-width: 1px; 
            border-top: 1px solid rgba(217, 217, 217, 1); 
            border-right: 1px solid rgba(217, 217, 217, 1);
            border-bottom: 1px solid rgba(217, 217, 217, 1);
            border-left: 1px solid rgba(217, 217, 217, 1);

            background: rgba(255, 255, 255, 1); 
            font-size: 14px;
            font-family: 'Noto Sans JP', sans-serif;
            outline: none;
            text-indent: 8px; 
        }

        .user-input::placeholder {
            width: 240px;
            height: 16px;

            font-family: 'Noto Sans JP', sans-serif; 
            font-weight: 400; 
            font-size: 14px; 
            line-height: 100%;
            letter-spacing: 0%;

            color: rgba(179, 179, 179, 1); 
            background: transparent;
            text-indent: 8px;
        }

        .search-button {
            width: 93px;  
            height: 40px;
            position: absolute;
            top: 103px;
            left: 856px;

            border-radius: 8px; 
            border-width: 1px; 
            border: none;

            background: rgba(255, 119, 0, 1); /* Màu nền */

            font-family: 'Noto Sans JP', sans-serif;
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

        .add-button {
            width: 133px;
            height: 40px;
            position: absolute;
            top: 102px;
            left: 1262px;

            border-radius: 8px; 
            border-width: 1px; 
            border: none;

            background: rgba(0, 126, 198, 1); 

            font-family: 'Noto Sans JP', sans-serif;
            font-weight: 400; 
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

        .table-container {
            width: 1077px;
            height: 756px;
            position: absolute;
            top: 156px;
            left: 318px;
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
            width: 60px; 
        }

        .custom-table th:nth-child(2),
        .custom-table td:nth-child(2) {
            width: 110px; 
        }

        .custom-table th:nth-child(3),
        .custom-table td:nth-child(3) {
            width: 171px; 
        }

        .custom-table th:nth-child(4),
        .custom-table td:nth-child(4) {
            width: 110px; 
        }

        .custom-table th:nth-child(5),
        .custom-table td:nth-child(5) {
            width: 110px; 
        }

        .custom-table th:nth-child(6),
        .custom-table td:nth-child(6) {
            width: 108px; 
        }

        .custom-table th:nth-child(7),
        .custom-table td:nth-child(7) {
            width: 408px; 
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

        .status {
            font-weight: bold;
        }

        .description-cell {
            position: relative;
            padding-right: 8px; 
        }

        .button-group {
            position: absolute;
            right: 8px; 
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            gap: 8px; 
        }

        /* Nút "Duyệt" */
        .approve-btn {
            width: 70px;
            height: 25px;
            border-radius: 8px; 
            border: 1px solid rgba(20, 174, 92, 1); 
            background: rgba(20, 174, 92, 1); 
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        /* Nút "Hủy" */
        .cancel-btn {
            width: 70px;
            height: 25px;
            border-radius: 8px;
            border: 1px solid rgba(236, 34, 31, 1);
            background: rgba(236, 34, 31, 1); 
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

  </style>
</head>
<body>
    <?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="sidebar">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    </div>
    <div class="user-label">
        Tên user/Loại đơn/Nội dung
    </div>

    <script>
        const CURRENT_USER_TYPE = "<?= $_SESSION['user']['user_type'] ?>";
    </script>

    <input type="text" class="user-input" placeholder="Value">

    <form method="GET" action="/approval_system/public/requests">
        <input type="text" name="search" class="user-input" placeholder="Value" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit" class="search-button">Tìm kiếm</button>
    </form>

    <button class="add-button">Thêm mới đơn</button>

    <div class="table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Người dùng</th>
                    <th>Loại đơn</th>
                    <th>Ngày lập</th>
                    <th>Trạng thái</th>
                    <th>Ngày duty</th>
                    <th>Mô tả</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $index => $request): ?>
                    <tr data-request-id="<?= $request['id'] ?>">
                        <td><?= $offset + $index + 1 ?></td>
                        <td><?= htmlspecialchars($request['user_name']) ?></td>
                        <td>
                            <?php
                                echo match($request['type']) {
                                    'leave' => 'Xin nghỉ phép',
                                    'equipment' => 'Mượn thiết bị',
                                    'schedule_change' => 'Đổi lịch',
                                    'expense' => 'Hoàn phí',
                                    default => 'Không rõ'
                                };
                            ?>
                        </td>
                        <td><?= date('Y-m-d', strtotime($request['created_at'])) ?></td>
                        <td class="status">
                            <?= match($request['status']) {
                                'new' => 'Đơn mới',
                                'approved' => 'Đã duyệt',
                                'cancelled' => 'Đã hủy',
                                default => 'Không rõ'
                            } ?>
                        </td>
                        <td><?= $request['approved_at'] ? date('Y-m-d', strtotime($request['approved_at'])) : '' ?></td>
                        <td class="status"><?= htmlspecialchars($request['description']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <table class="pagination-table">
            <tr>
                <td>
                    <button class="pagination-btn previous" <?= $currentPage <= 1 ? 'disabled' : '' ?> onclick="changePage(<?= $currentPage - 1 ?>)">← Previous</button>
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
                        if ($end < $totalPages - 1) 
                            echo "<td><span class='pagination-dots'>...</span></td>";
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

    <?php include_once __DIR__ . '/../components/popup_cancel.php'; ?>
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            var statusCells = document.querySelectorAll('.custom-table .status');
            statusCells.forEach(function(cell) {
                if (cell.textContent.trim() === 'Đã hủy') {
                    cell.closest('tr').style.background = 'rgba(255, 181, 181, 1)';
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var statusCells = document.querySelectorAll('.custom-table .status');
            statusCells.forEach(function(cell) {
                if (cell.textContent.trim() === 'Đơn mới') {
                    cell.closest('tr').style.background = 'rgba(144, 255, 152, 1)';
                }
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll('.custom-table tbody tr').forEach(row => {
                const statusCell = row.children[4];
                const descriptionCell = row.children[6];

                if (statusCell.textContent.trim() === 'Đơn mới') {
                    descriptionCell.classList.add('description-cell');

                    const oldContent = descriptionCell.innerHTML;

                    if (CURRENT_USER_TYPE !== 'manager') return;

                    const buttonGroup = document.createElement("div");
                    buttonGroup.className = "button-group";

                    const approveButton = document.createElement("button");
                    approveButton.textContent = "Duyệt";
                    approveButton.className = "approve-btn";

                    const cancelButton = document.createElement("button");
                    cancelButton.textContent = "Hủy";
                    cancelButton.className = "cancel-btn";

                    const requestId = row.getAttribute("data-request-id");
                    cancelButton.dataset.requestId = requestId;

                    // ✅ Gắn sự kiện chuyển trang duyệt
                    approveButton.addEventListener('click', () => {
                        window.location.href = `/approval_system/public/requests/approve/${requestId}`;
                    });

                    // ✅ Gắn sự kiện mở popup hủy
                    cancelButton.addEventListener('click', () => {
                        openCancelPopup(requestId);
                    });

                    buttonGroup.appendChild(approveButton);
                    buttonGroup.appendChild(cancelButton);

                    descriptionCell.innerHTML = oldContent;
                    descriptionCell.appendChild(buttonGroup);
                }
            });
        });

        // 👉 Sự kiện mở popup confirm khi bấm Hủy
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('cancel-btn')) {
                const requestId = e.target.dataset.requestId;
                openCancelPopup(requestId); // Gọi đúng hàm đã định nghĩa trong popup_cancel.php
            }
        });

        approveButton.addEventListener('click', () => {
            window.location.href = `/approval_system/public/requests/approve/${requestId}`;
        });

        function changePage(page) {
            const url = new URL(window.location.href);
            url.searchParams.set('page', page);
            window.location.href = url.toString();
        }

        document.querySelector('.add-button').addEventListener('click', function () {
            window.location.href = '/approval_system/public/requests/create';
        });

        const searchInput = document.querySelector('.user-input');
        const searchForm = searchInput?.closest('form');
        let previousValue = searchInput?.value.trim() || '';

        // Khi người dùng gõ vào input
        searchInput?.addEventListener('input', function () {
            const currentValue = this.value.trim();

            // Nếu xóa hết nội dung thì submit lại form (tự động reload danh sách gốc)
            if (previousValue !== '' && currentValue === '') {
                localStorage.setItem('refocusSearch', 'true');
                searchForm?.submit();
            }

            previousValue = currentValue;
        });

        // Sau khi reload trang → refocus lại input nếu có flag
        window.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('refocusSearch') === 'true') {
                searchInput?.focus();
                localStorage.removeItem('refocusSearch');
            }
        });
                
    </script>
    
</body>
</html>