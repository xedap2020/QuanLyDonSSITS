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
          left: 425px;

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
          left: 732px;

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

          font-family: 'Noto Sans JP', sans-serif;
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

      /* Hover Effect */
      .add-button:hover {
          background: rgba(0, 110, 175, 1);
      }

      /* Active Effect */
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

          font-family: 'Noto Sans JP', sans-serif;
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

      /* Khi checkbox được chọn */
      .custom-checkbox:checked {
          background: rgba(255, 255, 255, 1);; 
          position: relative;
      }

      /* Biểu tượng check khi chọn */
      .custom-checkbox:checked::before {
          content: "✔";
          font-size: 16;
          color: rgba(26, 26, 26, 0.87);
          font-weight: bold;
          display: block;
          text-align: center;
      }

      /* Định dạng button */
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
      }

      /* Button Sửa */
      .edit-button {
          background: rgba(20, 174, 92, 1);
      }

      /* Button Xóa */
      .delete-button {
          background: rgba(236, 34, 31, 1);
      }

      /* Định dạng hover */
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
    <input type="text" class="user-input" placeholder="Value">

    <button class="search-button">Tìm kiếm</button>

    <form action="/approval_system/public/users/create" method="get">
        <button type="submit" class="add-button">Thêm mới</button>
    </form>
    
    <button class="delete-multiple-button">Xóa nhiều</button>
    
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
              <tr>
                  <td><input type="checkbox" class="custom-checkbox user-checkbox" value="<?= $user['id'] ?>"></td>
                  <td><?= str_pad($user['id'], 4, '0', STR_PAD_LEFT) ?></td> <!-- Mã người dùng -->
                  <td><?= htmlspecialchars($user['full_name']) ?></td>       <!-- Tên người dùng -->
                  <td><?= date('Y-m-d', strtotime($user['created_at'])) ?></td> <!-- Ngày lập -->
                  <td>
                      <?= $user['status'] === 'active' ? 'Đang hoạt động' : 'Ngưng hoạt động' ?>
                  </td>
                  <td>
                    <div class="action-buttons">
                        <button class="edit-button">Sửa</button>
                        <?php
                            $currentUser = $_SESSION['user'];
                            // Nếu người đăng nhập là quản lý và đang không duyệt chính bản thân mình
                            if ($currentUser['user_type'] === 'Quản lý' && $currentUser['id'] != $user['id']):
                        ?>
                            <button class="delete-button">Xóa</button>
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
    // Lấy checkbox đầu tiên (selectAll) và tất cả các checkbox trong bảng
    const selectAllCheckbox = document.getElementById('selectAll');
    const userCheckboxes = document.querySelectorAll('.user-checkbox');

    // Khi checkbox đầu tiên (selectAll) thay đổi
    selectAllCheckbox.addEventListener('change', function() {
        // Nếu checkbox đầu tiên được chọn, chọn tất cả checkbox trong các hàng
        userCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    // Khi bất kỳ checkbox trong các hàng thay đổi, kiểm tra lại xem có tất cả được chọn không
    userCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Kiểm tra xem có tất cả checkbox trong các hàng được chọn không
            const allChecked = Array.from(userCheckboxes).every(checkbox => checkbox.checked);
            selectAllCheckbox.checked = allChecked;
        });
    });
  </script>

</body>
</html>