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

        .input-text-3 {
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

        .input-text-4 {
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

        .input-text-5 {
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

    <div class="new-order-text">Duyệt đơn</div>

    <?php include_once __DIR__ . '/../components/popup_confirm.php'; ?>
    <?php include_once __DIR__ . '/../components/popup_cancel.php'; ?>

    <form id="approveForm" method="POST" action="/approval_system/public/requests/approve">
        <input type="hidden" name="request_id" value="<?= $request['id'] ?>">

        <div class="frame-1">
            <div class="title-text">Tiêu đề</div>
            <input type="text" class="input-text-1" value="<?= htmlspecialchars($request['title']) ?>" disabled style="background: rgba(204, 204, 204, 0.5);">
        </div>

        <div class="frame-2">
            <div class="title-text">Nội dung</div>
            <input type="text" class="input-text-2" value="<?= htmlspecialchars($request['description']) ?>" disabled style="background: rgba(204, 204, 204, 0.5);">
        </div>

        <div class="frame-3">
            <div class="title-text">Loại đơn</div>
            <input type="text" class="input-text-3" value="<?=
                match ($request['type']) {
                    'leave' => 'Xin nghỉ phép',
                    'equipment' => 'Mượn thiết bị',
                    'schedule_change' => 'Đổi lịch',
                    'expense' => 'Hoàn phí',
                    default => 'Không rõ'
                }
            ?>" disabled style="background: rgba(204, 204, 204, 0.5);">
        </div>

        <div class="frame-4">
            <div class="title-text">Ngày bắt đầu</div>
            <input type="text" class="input-text-4" value="<?= $request['start_date'] ?>" disabled style="background: rgba(204, 204, 204, 0.5);">
        </div>

        <div class="frame-5">
            <div class="title-text">Ngày kết thúc</div>
            <input type="text" class="input-text-5" value="<?= $request['end_date'] ?>" disabled style="background: rgba(204, 204, 204, 0.5);">
        </div>

        <div class="frame-6">
            <div class="title-text">Đính kèm</div>
            <?php if (!empty($request['attached_file'])): ?>
                <a href="/approval_system/uploads/<?= htmlspecialchars($request['attached_file']) ?>" target="_blank" style="text-decoration: none;">
                    <input type="text" class="input-text-1"
                        value="<?= htmlspecialchars($request['attached_file']) ?>"
                        readonly
                        style="border: none; background: none; cursor: pointer; outline: none;">
                </a>
            <?php else: ?>
                <input type="text" class="input-text-1" value="Không có file đính kèm" readonly 
                    style="background: rgba(204, 204, 204, 0.5);">
            <?php endif; ?>
        </div>

        <div class="footer">
            <button type="button" class="next-btn" id="btn-approve">Duyệt đơn</button>
            <button type="button" class="clear-btn" onclick="openCancelPopup(<?= $request['id'] ?>)">Hủy đơn</button>
        </div>
    </form>

    <script>
        const approveBtn = document.getElementById('btn-approve');
        const popup = document.getElementById('popup-confirm-overlay');
        const popupOk = document.getElementById('popup-ok');
        const popupCancel = document.getElementById('popup-cancel');

        approveBtn.addEventListener('click', () => {
            document.getElementById('popup-message').innerText = 'Bạn có chắc chắn muốn duyệt đơn này không?';
            popup.style.display = 'flex';
        });

        popupOk.addEventListener('click', () => {
            document.getElementById('approveForm').submit();
        });

        popupCancel.addEventListener('click', () => {
            popup.style.display = 'none';
        });
    </script>

</body>
</html>