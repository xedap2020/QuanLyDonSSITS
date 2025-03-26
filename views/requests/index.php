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
            width: 269px;
            height: 1005px;
            min-width: 112px;
            max-width: 280px;
            position: fixed;
            top: 76px;
            left: 0;
            background: rgba(255, 255, 255, 1);
            border-radius: 4px;
            padding-top: 8px;
            padding-bottom: 8px;
            box-shadow: 0px 2px 6px 2px rgba(0, 0, 0, 0.15), 
                        0px 1px 2px 0px rgba(0, 0, 0, 0.3);
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

    <input type="text" class="user-input" placeholder="Value">

    <button class="search-button">Tìm kiếm</button>
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
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đơn mới</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã hủy</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã hủy</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đơn mới</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>Xin nghỉ phép</td>
                    <td>2025-01-02</td>
                    <td class="status">Đã duyệt</td>
                    <td>2025-01-03</td>
                    <td class="status">Xin nghỉ đi đám cưới</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <table class="pagination-table">
            <tr>
                <td><button class="pagination-btn previous" disabled>← Previous</button></td>
                <td><button class="pagination-btn active">1</button></td>
                <td><button class="pagination-btn">2</button></td>
                <td><button class="pagination-btn">3</button></td>
                <td><span class="pagination-dots">...</span></td>
                <td><button class="pagination-btn">67</button></td>
                <td><button class="pagination-btn">68</button></td>
                <td><button class="pagination-btn next">Next →</button></td>
            </tr>
        </table>
    </div>

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
                let statusCell = row.children[4];
                let descriptionCell = row.children[6];

                if (statusCell.textContent.trim() === 'Đơn mới') {
                    descriptionCell.classList.add('description-cell');

                    let oldContent = descriptionCell.innerHTML;

                    // Tạo div chứa 2 button
                    let buttonGroup = document.createElement("div");
                    buttonGroup.className = "button-group";

                    // Tạo nút "Duyệt"
                    let approveButton = document.createElement("button");
                    approveButton.textContent = "Duyệt";
                    approveButton.className = "approve-btn";

                    // Tạo nút "Hủy"
                    let cancelButton = document.createElement("button");
                    cancelButton.textContent = "Hủy";
                    cancelButton.className = "cancel-btn";

                    buttonGroup.appendChild(approveButton);
                    buttonGroup.appendChild(cancelButton);

                    descriptionCell.innerHTML = oldContent; 
                    descriptionCell.appendChild(buttonGroup);
                }
            });
        });
    </script>
</body>
</html>