<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Màn hình thêm mới người dùng</title>
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

        #username {
            background: rgba(223, 223, 223, 0.5); 
        }

        .error-message {
            color: #bd0101;
            font-size: 13px;
            margin-left: 160px;
            margin-top: 55px;
            display: block;
            position: relative;
        }

        .input-error {
            border: 1px solid #bd0101 !important;
        }

    </style>
</head>
<body>
    <?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="sidebar">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    </div>

    <div class="add-user-text">Chỉnh sửa người dùng</div>

    <form action="/approval_system/public/users/update/<?= $user['id'] ?>" method="post">
        <div class="frame frame-1">
            <div class="input-container">
                <div class="username-container">
                <span class="username-text">Tên đăng nhập</span>
                <span class="required">*</span>
                </div>
                <input type="text" class="input-text" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" readonly>
            </div>
        </div>

        <div class="frame frame-2">
            <div class="input-container">
                <div class="username-container">
                <span class="username-text">Tên người dùng</span>
                <span class="required">*</span>
                </div>
                <input type="text" class="input-text" id="fullname" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>">
            </div>
            <div class="error-message" id="fullname-error"></div>
        </div>

        <div class="frame frame-3">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Mật khẩu</span>
                </div>
                <input
                type="password"
                class="input-text"
                id="password"
                name="password"
                placeholder="Nhập mật khẩu mới nếu muốn đổi"
                autocomplete="new-password"
                />
            </div>
            <div class="error-message" id="password-error"></div>
        </div>

        <div class="frame frame-4">
            <div class="input-container">
                <div class="username-container">
                <span class="username-text">Email</span>
                </div>
                <input type="email" class="input-text" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
            </div>
            <div class="error-message" id="email-error"></div>
        </div>

        <div class="frame frame-5">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Ngày sinh</span>
                    </div>
                    <div class="date-container">
                    <input type="date" class="date-input" id="dob" name="dob" value="<?= $user['dob'] ?>">
                    <img src="/approval_system/public/assets/icons/calendar.svg" class="date-icon" alt="Date Icon">
                </div>
            </div>
            <div class="error-message" id="dob-error"></div>
        </div>

        <div class="frame frame-6">
            <div class="input-container">
                <div class="username-container">
                <span class="username-text">Loại người dùng</span>
                <span class="required">*</span>
                </div>
                <select class="input-select" id="userType" name="user_type">
                    <option value="">-- Chọn loại người dùng --</option>
                    <option value="user" <?= $user['user_type'] === 'user' ? 'selected' : '' ?>>Nhân viên</option>
                    <option value="manager" <?= $user['user_type'] === 'manager' ? 'selected' : '' ?>>Quản lý</option>
                    <option value="admin" <?= $user['user_type'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <div class="error-message" id="userType-error"></div>
        </div>

        <div class="frame frame-7">
            <div class="input-container">
                <div class="username-container">
                <span class="username-text">Phòng ban</span>
                <span class="required">*</span>
                </div>
                <select class="input-select" id="department" name="department_id">
                    <option value="">-- Chọn phòng ban --</option>
                    <?php foreach ($departments as $dept): ?>
                        <option value="<?= $dept['id'] ?>" <?= $dept['id'] == $user['department_id'] ? 'selected' : '' ?>><?= htmlspecialchars($dept['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="error-message" id="department-error"></div>
        </div>

        <div class="footer">
            <button class="next-btn">Tiếp theo</button>
            <button class="clear-btn">Xóa trống</button>
        </div>
    </form>

    <script>
        // Bấm icon lịch để hiện bộ chọn ngày
        document.querySelector('.date-icon').addEventListener('click', function() {
            document.getElementById('dob').showPicker();
        });

        document.querySelector('.next-btn').addEventListener('click', function (e) {
            e.preventDefault();

            // Clear lỗi cũ
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));

            const fullname = document.getElementById('fullname');
            const password = document.getElementById('password');
            const userType = document.getElementById('userType');
            const department = document.getElementById('department');

            let isValid = true;

            if (!fullname.value.trim()) {
                fullname.classList.add('input-error');
                document.getElementById('fullname-error').textContent = 'Vui lòng nhập tên người dùng';
                fullname.focus();
                isValid = false;
            }

            const passwordValue = password.value.trim();
            const passwordPattern = /^(?=.*[A-Z])(?=.*[^A-Za-z0-9]).{8,}$/;

            // Chỉ validate nếu người dùng có nhập mật khẩu
            if (passwordValue !== '') {
                if (!passwordPattern.test(passwordValue)) {
                    password.classList.add('input-error');
                    document.getElementById('password-error').textContent = 'Mật khẩu phải từ 8 ký tự trở lên, có ít nhất 1 ký tự viết hoa và 1 ký tự đặc biệt';
                    if (isValid) password.focus();
                    isValid = false;
                }
            }

            if (!userType.value) {
                userType.classList.add('input-error');
                document.getElementById('userType-error').textContent = 'Vui lòng chọn loại người dùng';
                if (isValid) userType.focus();
                isValid = false;
            }

            if (!department.value) {
                department.classList.add('input-error');
                document.getElementById('department-error').textContent = 'Vui lòng chọn phòng ban';
                if (isValid) department.focus();
                isValid = false;
            }

            if (!isValid) return;

            // Tạo form ẩn để submit nếu hợp lệ
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/approval_system/public/users/confirm-edit';

            ['fullname', 'password', 'email', 'dob', 'userType', 'department'].forEach(id => {
                const input = document.getElementById(id);
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name =
                    id === 'fullname' ? 'full_name' :
                    id === 'userType' ? 'user_type' :
                    id === 'department' ? 'department_id' :
                    id;
                hidden.value = input.value;
                form.appendChild(hidden);
            });

            const usernameHidden = document.createElement('input');
            usernameHidden.type = 'hidden';
            usernameHidden.name = 'username';
            usernameHidden.value = document.getElementById('username').value;
            form.appendChild(usernameHidden);

            const userIdHidden = document.createElement('input');
            userIdHidden.type = 'hidden';
            userIdHidden.name = 'id';
            userIdHidden.value = <?= $user['id'] ?>;
            form.appendChild(userIdHidden);

            document.body.appendChild(form);
            form.submit();
        });
                
        // Xử lý nút "Xóa trống"
        document.querySelector('.clear-btn').addEventListener('click', function (e) {
            e.preventDefault();

            const resetFields = ['fullname', 'password', 'email', 'dob', 'userType', 'department'];

            resetFields.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    if (el.tagName.toLowerCase() === 'select') {
                        el.selectedIndex = 0;
                    } else {
                        el.value = '';
                    }
                }
            });

            // Xóa lỗi nếu có
            document.querySelectorAll('.error-text').forEach(el => el.textContent = '');
        });
    </script>
</body>
</html>