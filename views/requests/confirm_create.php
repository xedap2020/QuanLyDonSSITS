<?php
$data = $_SESSION['confirm_request'] ?? [];
$typeMap = [
    'leave' => 'Xin nghỉ phép',
    'equipment' => 'Mượn thiết bị',
    'schedule_change' => 'Đổi lịch',
    'expense' => 'Hoàn phí'
];
$typeText = $typeMap[$data['type'] ?? ''] ?? 'Không xác định';
?>
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

        .new-order-text {
            width: 95px;
            height: 17px;
            position: absolute;
            top: 96px;
            left: 296px;
            font-weight: 400;
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            color: rgba(0, 0, 0, 1);
        }

        .frame-1 {
            width: 613px;
            height: 40px;
            position: absolute;
            top: 171px;
            left: 389px;
            background-color: rgba(255, 255, 255, 1);
        }

        .frame-2 {
            width: 613px;
            height: 100px;
            position: absolute;
            top: 233px;
            left: 389px;
            background-color: rgba(255, 255, 255, 1);
        }

        .frame-3 {
            width: 613px;
            height: 62px;
            position: absolute;
            top: 355px;
            left: 389px;
            background-color: rgba(255, 255, 255, 1);
        }

        .frame-4 {
            width: 613px;
            height: 62px;
            position: absolute;
            top: 424px;
            left: 389px;
            background-color: rgba(255, 255, 255, 1);
        }

        .frame-5 {
            width: 613px;
            height: 40px;
            position: absolute;
            top: 493px;
            left: 387px;
            background-color: rgba(255, 255, 255, 1);
        }

        .frame-6 {
            width: 613px;
            height: 40px;
            position: absolute;
            top: 555px;
            left: 387px;
            background-color: rgba(255, 255, 255, 1);
        }

        .frame-7 {
            width: 613px;
            height: 40px;
            position: absolute;
            top: 617px;
            left: 387px;
            background-color: rgba(255, 255, 255, 1);
        }

        .title-text {
            width: 100px;
            height: 17px;
            position: absolute;
            top: 10px;
            font-weight: 400;
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            color: rgba(0, 0, 0, 1);
        }

        .title-text span {
            color: rgba(189, 1, 1, 1);
        }

        .input-text-1 {
            width: 480px;
            height: 38px;
            position: absolute;
            left: 129px; 
            background-color: rgba(255, 255, 255, 0.5); 
            border-radius: 4px; 
            border: 1px solid rgba(204, 204, 204, 1); 
        }

        .input-text-2 {
            width: 480px;
            height: 94px;
            position: absolute;
            left: 129px;
            background-color: rgba(255, 255, 255, 0.5); 
            border-radius: 4px; 
            border: 1px solid rgba(204, 204, 204, 1); 
        }

        .input-select {
            width: 240px;
            height: 40px;
            position: absolute;
            top: 2px;
            left: 129px;
            background-color: rgba(255, 255, 255, 0.5); 
            border-radius: 4px; 
            border: 1px solid rgba(204, 204, 204, 1); 
            font-size: 14px;
            padding-left: 10px;
        }

        .date-input {
            width: 189px;
            height: 40px;
            position: absolute;
            left: 123px;
            top: 0px;
            margin-left: 8px;
            border-radius: 4px;
            border: 1px solid rgba(204, 204, 204, 1);
            background: rgba(255, 255, 255, 0.5);
            padding-left: 10px;
            font-size: 14px;
            outline: none;
        }

        .date-icon-1 {
            position: absolute;
            right: 10px; 
            top: 50%; 
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            cursor: pointer;
            left: 305px;
        }

        .date-icon-2 {
            position: absolute;
            right: 10px; 
            top: 50%; 
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            cursor: pointer;
            left: 305px;
        }

        .input-text.date-input {
            padding-right: 30px; 
        }

        .date-input::-webkit-calendar-picker-indicator {
            display: none;
        }

        .input-file-wrapper {
            position: relative;
            width: 189px;
            height: 40px;
            left: 133px;
        }

        .input-file {
            width: 100%;
            height: 100%;
            padding-left: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 4px;
            border: 1px solid rgba(204, 204, 204, 1);
            color: transparent;
            cursor: pointer;
            position: relative;
        }

        .input-file::-webkit-file-upload-button {
            display: none;
        }

        .icon-file-wrapper {
            position: absolute;
            top: 50%;
            right: -8px; 
            transform: translateY(-50%); 
            pointer-events: none; 
        }

        .input-file-name {
            position: absolute;
            top: 50%;
            left: 10px;
            right: 30px; /* giới hạn phải để tránh đè icon */
            transform: translateY(-50%);
            font-family: 'Noto Sans JP', sans-serif;
            font-size: 14px;
            color: rgba(0, 0, 0, 1); 
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            pointer-events: none;
        }

        .footer {
            width: 1920px;
            height: 114px;
            top: 780px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .next-btn, .clear-btn {
            width: 220px;
            height: 50px;
            border-radius: 4px;
            padding-top: 4px;
            padding-right: 24px;
            padding-bottom: 4px;
            padding-left: 24px;
            border-width: 1px;
            font-size: 16px;
            font-weight: 400;
            transform: translateX(-330px); 
        }

        .next-btn {
            background:  rgba(0, 126, 198, 1);
            border: 1px solid rgba(204, 204, 204, 1);
            color: white;
        }

        .clear-btn {
            background: rgba(226, 0, 92, 1);
            border: 1px solid rgba(204, 204, 204, 1);
            color: white;
        }

  </style>
</head>
<body>

    <?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="sidebar">
      <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    </div>

    <div class="new-order-text">Thêm mới đơn</div>

    <form id="confirmForm" action="/approval_system/public/requests/store" method="post" enctype="multipart/form-data">
        <div class="frame-1">
            <div class="title-text">
                Tiêu đề <span>*</span>
            </div>
            <input type="text" class="input-text-1" id = "title" name="title" value="<?= htmlspecialchars($data['title'] ?? '') ?>" readonly style="background: rgba(204, 204, 204, 0.5);">
        </div>
        
        <div class="frame-2">
            <div class="title-text">
                Nội dung
            </div>
            <input type="text" class="input-text-2" id="content" name="description" value="<?= htmlspecialchars($data['description'] ?? '') ?>" readonly style="background: rgba(204, 204, 204, 0.5);">
        </div>

        <div class="frame-3">
            <div class="title-text">
                Người duyệt <span>*</span>
            </div>
            <input type="text" class="input-text-1" value="<?= htmlspecialchars($data['approver_name'] ?? '') ?>" readonly style="background: rgba(204, 204, 204, 0.5);">
            <input type="hidden" name="approver_id" value="<?= htmlspecialchars($data['approver_id'] ?? '') ?>">
        </div>

        <div class="frame-4">
            <div class="title-text">
                Loại đơn <span>*</span>
            </div>
            <input type="text" class="input-text-1" value="<?= $typeText ?>" readonly style="background: rgba(204, 204, 204, 0.5);">
            <input type="hidden" name="type" value="<?= htmlspecialchars($data['type'] ?? '') ?>">
        </div>

        <div class="frame-5">
            <div class="title-text">
                Ngày bắt đầu <span>*</span>
            </div>
            <div class="date-container">
                <input type="date" class="date-input" name="start_date" value="<?= htmlspecialchars($data['start_date'] ?? '') ?>" readonly style="background: rgba(204, 204, 204, 0.5);">
                <img src="/approval_system/public/assets/icons/calendar.svg" class="date-icon-1" alt="Date Icon">
            </div>
        </div>

        <div class="frame-6">
            <div class="title-text">
                Ngày kết thúc <span>*</span>
            </div>
            <div class="date-container">
                <input type="date" class="date-input" name="end_date" value="<?= htmlspecialchars($data['end_date'] ?? '') ?>" readonly style="background: rgba(204, 204, 204, 0.5);">
                <img src="/approval_system/public/assets/icons/calendar.svg" class="date-icon-2" alt="Date Icon">
            </div>
        </div>


        </div> 

        <div class="frame-7">
            <div class="title-text">
                Đính kèm <span>*</span>
            </div>

            <div class="input-file-wrapper">
                <div class="input-file-name"><?= htmlspecialchars($data['attached_file'] ?? 'Không có') ?></div>
                <div class="icon-file-wrapper">
                    <img src="/approval_system/public/assets/icons/upload-icon.svg" alt="Upload Icon" class="upload-icon">
                </div>
            </div>
        </div>

        <div class="footer">
            <button type="button" class="next-btn" id="btn-save">Lưu lại</button>
            <button type="button" class="clear-btn" onclick="window.history.back()">Quay lại</button>
        </div>
    </form>

    <?php include_once __DIR__ . '/../components/popup_confirm.php'; ?>

    <script>

        document.querySelector('.date-icon-1').addEventListener('click', function() {
            document.getElementById('dob-1').showPicker();
        });

        document.querySelector('.date-icon-2').addEventListener('click', function() {
            document.getElementById('dob-2').showPicker();
        });

        function displayFileName(input) {
            var fileName = input.files[0] ? input.files[0].name: "";
            var fileNameDisplay = input.nextElementSibling.nextElementSibling;
            fileNameDisplay.textContent = fileName; 
        }

        const saveBtn = document.getElementById('btn-save');
        const popup = document.getElementById('popup-confirm-overlay');
        const popupOk = document.getElementById('popup-ok');
        const popupCancel = document.getElementById('popup-cancel');

        saveBtn.addEventListener('click', () => {
            // Thay đổi nội dung popup nếu cần
            document.getElementById('popup-message').innerText = 'Bạn có chắc chắn muốn lưu đơn này không?';
            popup.style.display = 'flex';
        });

        popupOk.addEventListener('click', () => {
            document.getElementById('confirmForm').submit();
        });

        popupCancel.addEventListener('click', () => {
            popup.style.display = 'none';
        });

    </script>
</body>
</html>