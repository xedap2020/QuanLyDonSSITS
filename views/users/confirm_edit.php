<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Màn hình chỉnh sửa người dùng</title>
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

        .add-user-text {
            width: 144px;
            height: 17px;
            position: absolute;
            top: 96px;
            left: 296px;
            font-family: 'Noto Sans JP', sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            color: rgba(0, 0, 0, 1);
            background: transparent;
        }

        .frame {
            width: 613px;
            height: 40px;
            background: rgba(255, 255, 255, 1);
            position: absolute;
        }

        .frame-1 { top: 171px; left: 389px; }
        .frame-2 { top: 240px; left: 389px; }
        .frame-3 { top: 309px; left: 389px; }
        .frame-4 { top: 378px; left: 389px; }
        .frame-5 { top: 447px; left: 389px; }
        .frame-6 { top: 516px; left: 389px; }
        .frame-7 { top: 585px; left: 389px; }

        .input-container {
            display: flex;
            align-items: center;
            position: absolute;
            width: 100%;
        }

        .frame-1 .input-container { top: 10px; left: 10px; }
        .frame-2 .input-container { top: 10px; left: 10px; }
        .frame-3 .input-container { top: 10px; left: 10px; } 
        .frame-4 .input-container { top: 10px; left: 10px; }
        .frame-5 .input-container { top: 10px; left: 10px; } 
        .frame-6 .input-container { top: 10px; left: 10px; }
        .frame-7 .input-container { top: 10px; left: 10px; }

        .username-container {
            width: 120px; 
            font-size: 14px;
            font-weight: 400;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .required {
            color: rgba(189, 1, 1, 1);
            font-size: 16px;
            font-weight: 700;
            margin-left: 3px;
            position: relative;
            top: 4px; 
        }
        
        .input-text {
            width: 480px;
            height: 40px;
            border-radius: 4px;
            border: 1px solid rgba(204, 204, 204, 1);
            background: rgba(255, 255, 255, 0.5);
            padding-left: 10px;
            font-size: 14px;
            font-family: 'Noto Sans JP', sans-serif;
            outline: none;
            margin-left: 10px; 
        }

        .date-input {
            width: 189px;
            height: 40px;
            margin-left: 8px;
            border-radius: 4px;
            border: 1px solid rgba(204, 204, 204, 1);
            background: rgba(255, 255, 255, 0.5);
            padding-left: 10px;
            font-size: 14px;
            font-family: 'Noto Sans JP', sans-serif;
            outline: none;
        }

        .date-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .date-icon {
            position: absolute;
            right: 10px;
            width: 20px; 
            height: 20px; 
            cursor: pointer;
        }

        .input-text.date-input {
            padding-right: 30px; 
        }

        .date-input::-webkit-calendar-picker-indicator {
            display: none;
        }

        .input-select {
            width: 240px; 
            height: 40px;
            border-radius: 4px;
            border: 1px solid rgba(204, 204, 204, 1);
            background: rgba(255, 255, 255, 0.5);
            padding-left: 10px;
            font-size: 14px;
            font-family: 'Noto Sans JP', sans-serif;
            outline: none;
            margin-left: 10px;
            cursor: pointer;
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

        .next-btn:hover {
            background-color: rgba(0, 126, 198, 0.6);
            transition: background-color 0.3s;
        }

        .clear-btn:hover {
            background-color: rgba(226, 0, 92, 0.6);
            transition: background-color 0.3s;
        }

    </style>
</head>
<body>

    <?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="sidebar">
      <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    </div>

    <div class="add-user-text">Thêm mới người dùng</div>

    <form method="POST" action="/approval_system/public/users/update" id="confirm-edit-form">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="frame frame-1">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Tên đăng nhập</span>
                    <span class="required">*</span>
                </div>
                <input type="text" class="input-text" value="<?= htmlspecialchars($username) ?>" disabled style="background-color: rgba(204, 204, 204, 0.5);">
                <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
            </div>
        </div>

        <div class="frame frame-2">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Tên người dùng</span>
                    <span class="required">*</span>
                </div>
                <input type="text" class="input-text" value="<?= htmlspecialchars($fullname) ?>" disabled style="background-color: rgba(204, 204, 204, 0.5);">
                <input type="hidden" name="full_name" value="<?= htmlspecialchars($fullname) ?>">
            </div>
        </div>

        <div class="frame frame-3">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Mật khẩu</span>
                    <span class="required">*</span>
                </div>
                <input type="password" class="input-text" value="<?= htmlspecialchars($password) ?>" disabled style="background-color: rgba(204, 204, 204, 0.5);">
                <input type="hidden" name="password" value="<?= htmlspecialchars($password) ?>">
            </div>
        </div>

        <div class="frame frame-4">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Email</span>
                </div>
                <input type="email" class="input-text" value="<?= htmlspecialchars($email) ?>" disabled style="background-color: rgba(204, 204, 204, 0.5);">
                <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            </div>
        </div>

        <div class="frame frame-5">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Ngày sinh</span>
                </div>
                <div class="date-container">
                    <input type="date" class="date-input" value="<?= htmlspecialchars($dob) ?>" disabled style="background-color: rgba(204, 204, 204, 0.5);">
                    <input type="hidden" name="dob" value="<?= htmlspecialchars($dob) ?>">
                </div>
            </div>
        </div>

        <div class="frame frame-6">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Loại người dùng</span>
                    <span class="required">*</span>
                </div>
                <select class="input-select" disabled style="background-color: rgba(204, 204, 204, 0.5);">
                    <option value="user" <?= $userType === 'user' ? 'selected' : '' ?>>Nhân viên</option>
                    <option value="manager" <?= $userType === 'manager' ? 'selected' : '' ?>>Quản lý</option>
                    <option value="admin" <?= $userType === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
                <input type="hidden" name="user_type" value="<?= htmlspecialchars($userType) ?>">
            </div>
        </div>

        <div class="frame frame-7">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Phòng ban</span>
                    <span class="required">*</span>
                </div>
                <select class="input-select" disabled style="background-color: rgba(204, 204, 204, 0.5);">
                    <?php foreach ($departments as $dept): ?>
                        <option value="<?= $dept['id'] ?>" <?= $dept['id'] == $departmentId ? 'selected' : '' ?>>
                            <?= htmlspecialchars($dept['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="department_id" value="<?= htmlspecialchars($departmentId) ?>">
            </div>
        </div>

        <div class="footer">
            <button type="button" class="next-btn">Lưu lại</button>
            <button type="button" class="clear-btn" onclick="history.back()">Quay lại</button>
        </div>
    </form>

    <script>

        document.querySelector('.date-icon').addEventListener('click', function() {
            document.getElementById('dob').showPicker();
        });

    </script>
    <?php include_once __DIR__ . '/../components/popup_confirm.php'; ?>

    <script>
        function showPopupConfirm(message, onOk, onCancel) {
            const overlay = document.getElementById('popup-confirm-overlay');
            const messageEl = document.getElementById('popup-message');
            const okBtn = document.getElementById('popup-ok');
            const cancelBtn = document.getElementById('popup-cancel');

            messageEl.textContent = message;
            overlay.style.display = 'flex';

            const handleOk = () => {
                overlay.style.display = 'none';
                okBtn.removeEventListener('click', handleOk);
                cancelBtn.removeEventListener('click', handleCancel);
                onOk();
            };

            const handleCancel = () => {
                overlay.style.display = 'none';
                okBtn.removeEventListener('click', handleOk);
                cancelBtn.removeEventListener('click', handleCancel);
                if (typeof onCancel === 'function') onCancel();
            };

            okBtn.addEventListener('click', handleOk);
            cancelBtn.addEventListener('click', handleCancel);
        }

        document.querySelector('.next-btn').addEventListener('click', function () {
            showPopupConfirm(
                'Bạn có chắc chắn lưu lại thay đổi ?',
                function () {
                    document.getElementById('confirm-edit-form').submit();
                },
                function () {
                    // Cancel quay lại
                    window.location.href = '/approval_system/public/users/edit/<?= $id ?>';
                }
            );
        });
    </script>
</body>
</html>