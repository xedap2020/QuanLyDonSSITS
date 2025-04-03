<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: #f9f9f9;
            display: flex; flex-direction: column;
            height: 100vh;
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

        .content {
            margin-left: 300px;
            margin-top: 120px;
            padding: 0 20px;
            flex: 1;
        }

        .table-container {
            width: 100%; margin-top: -5px; 
        }

        .custom-table {
            width: 98.5%;
            border-collapse: separate;
            border-radius: 4px;
            border: 0.5px solid #B9B9B9;
            border-spacing: 0;
            background-color: #FFFFFF;
            margin-bottom: 40px;
        }

        .custom-table th, .custom-table td {
            padding: 12px;
            text-align: left;
            border: 0.5px solid #B9B9B9;
        }

        .custom-table th:first-child { border-top-left-radius: 3.5px; }
        .custom-table th:last-child  { border-top-right-radius: 3.5px; }
        .custom-table tr:last-child td:first-child  { border-bottom-left-radius: 3.5px; }
        .custom-table tr:last-child td:last-child   { border-bottom-right-radius: 3.5px; }

        .custom-table th {
            background-color: rgba(0, 0, 0, 0.06);
            font-weight: bold;
        }

        .status { font-weight: bold; }
    </style>
</head>
<body>

    <?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="sidebar">
        <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    </div>

    <div class="content">
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
                <tbody id="table-body"></tbody>
            </table>
        </div>
    </div>

    <script>
        const data = Array(30).fill({
            user: "Nguyễn Văn A",
            type: "Xin nghỉ phép",
            date: "2025-01-02",
            status: "Đã duyệt",
            dutyDate: "2025-01-03",
            description: "Xin nghỉ đi đám cưới"
        });

        const tableBody = document.getElementById("table-body");
        data.forEach((item, index) => {
            const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.user}</td>
                    <td>${item.type}</td>
                    <td>${item.date}</td>
                    <td class="status">${item.status}</td>
                    <td>${item.dutyDate}</td>
                    <td>${item.description}</td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    </script>
</body>
</html>