<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm mới người dùng</title>
  <style>
    body {
      width: 1920px;
      height: 1080px;
      background: #fff;
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
      position: fixed;
      top: 76px;
      left: 0;
      background: #fff;
      border-radius: 4px;
      padding: 8px 0;
      box-shadow: 0px 2px 6px 2px rgba(0, 0, 0, 0.15), 0px 1px 2px 0px rgba(0, 0, 0, 0.3);
    }

    .add-user-text {
      position: absolute;
      top: 96px;
      left: 296px;
      font-family: 'Noto Sans JP', sans-serif;
      font-size: 14px;
      color: #000;
    }

    .frame {
      width: 613px;
      height: 40px;
      background: #fff;
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
      width: 100%;
      position: absolute;
      top: 10px;
      left: 10px;
    }

    .username-container {
      width: 120px;
      font-size: 14px;
      display: flex;
      align-items: center;
    }

    .required {
      color: #bd0101;
      font-size: 16px;
      font-weight: 700;
      margin-left: 3px;
      position: relative;
      top: 4px;
    }

    .input-text,
    .input-select,
    .date-input {
      border: 1px solid #ccc;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 4px;
      padding-left: 10px;
      font-size: 14px;
      font-family: 'Noto Sans JP', sans-serif;
      outline: none;
    }

    .input-text {
      width: 480px;
      height: 40px;
      margin-left: 10px;
    }

    .date-input {
      width: 189px;
      height: 40px;
      margin-left: 8px;
      padding-right: 30px;
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

    .date-input::-webkit-calendar-picker-indicator {
      display: none;
    }

    .input-select {
      width: 240px;
      height: 40px;
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

    .next-btn,
    .clear-btn {
      width: 220px;
      height: 50px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 16px;
      font-weight: 400;
      transform: translateX(-330px);
    }

    .next-btn {
      background: #007ec6;
      color: white;
    }

    .clear-btn {
      background: #e2005c;
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

    <div class="add-user-text">Thêm mới người dùng</div>

    <form id="createForm" method="POST" action="/approval_system/public/users/confirm">
        <div class="frame frame-1">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Tên đăng nhập</span>
                    <span class="required">*</span>
                </div>
                <input type="text" class="input-text" id="username" name="username" autocomplete="off">
            </div>
            <div class="error-message" id="username-error"></div>
        </div>

        <div class="frame frame-2">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Tên người dùng</span>
                    <span class="required">*</span>
                </div>
                <input type="text" class="input-text" id="fullname" name="full_name" autocomplete="off">
            </div>
            <div class="error-message" id="fullname-error"></div>
        </div>

        <div class="frame frame-3">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Mật khẩu</span>
                    <span class="required">*</span>
                </div>
                <input type="password" class="input-text" id="password" name="password" autocomplete="new-password">
            </div>
            <div class="error-message" id="password-error"></div>
        </div>

        <div class="frame frame-4">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Email</span>
                </div>
                <input type="email" class="input-text" id="email" name="email" autocomplete="off">
            </div>
            <div class="error-message" id="email-error"></div>
        </div>

        <div class="frame frame-5">
            <div class="input-container">
                <div class="username-container">
                    <span class="username-text">Ngày sinh</span>
                </div>
                <div class="date-container">
                    <input type="date" class="date-input" id="dob" name="dob" autocomplete="off">
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
                    <option value="user">Nhân viên</option>
                    <option value="manager">Quản lý</option>
                    <option value="admin">Admin</option>
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
                        <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="error-message" id="department-error"></div>
        </div>

        <div class="footer">
            <button type="submit" class="next-btn">Tiếp theo</button>
            <button type="button" class="clear-btn">Xóa trống</button>
        </div>
    </form>

    <script>
        // Mở lịch khi bấm icon
        document.querySelector('.date-icon').addEventListener('click', function () {
            document.getElementById('dob').showPicker();
        });

        // Xử lý nút "Xóa trống"
        document.querySelector('.clear-btn').addEventListener('click', () => {
            const fields = ['username', 'fullname', 'password', 'email', 'dob', 'userType', 'department'];
            fields.forEach(id => {
                const field = document.getElementById(id);
                field.value = '';
                field.style.backgroundColor = '';
                field.classList.remove('input-error');
            });
            document.querySelectorAll('.error-message').forEach(msg => msg.textContent = '');
        });

        document.querySelector('.next-btn').addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelectorAll('.error-message').forEach(msg => msg.textContent = '');
            document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));

            let isValid = true;

            const rules = [
                {
                    id: 'username',
                    name: 'Tên đăng nhập',
                    validate: value => value.trim() !== '',
                    message: 'Vui lòng nhập tên đăng nhập'
                },
                {
                    id: 'fullname',
                    name: 'Tên người dùng',
                    validate: value => value.trim() !== '',
                    message: 'Vui lòng nhập tên người dùng'
                },
                {
                    id: 'password',
                    name: 'Mật khẩu',
                    validate: value => /^(?=.*[A-Z])(?=.*[\W_]).{8,}$/.test(value),
                    message: 'Mật khẩu phải từ 8 ký tự trở lên, có ít nhất 1 ký tự viết hoa và 1 ký tự đặc biệt'
                },

                {
                    id: 'email',
                    name: 'Email',
                    validate: value => value === '' || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
                    message: 'Email không hợp lệ'
                },
                {
                    id: 'dob',
                    name: 'Ngày sinh',
                    validate: value => {
                        if (value === '') return true;
                        const dobDate = new Date(value);
                        const today = new Date();
                        today.setHours(0, 0, 0, 0);
                        return dobDate <= today;
                    },
                    message: 'Ngày sinh không được lớn hơn ngày hiện tại'
                },
                {
                    id: 'userType',
                    name: 'Loại người dùng',
                    validate: value => value.trim() !== '',
                    message: 'Vui lòng chọn loại người dùng'
                },
                {
                    id: 'department',
                    name: 'Phòng ban',
                    validate: value => value.trim() !== '',
                    message: 'Vui lòng chọn phòng ban'
                }
            ];

            for (const rule of rules) {
                const field = document.getElementById(rule.id);
                const errorEl = document.getElementById(rule.id + '-error');
                if (!rule.validate(field.value)) {
                    isValid = false;
                    field.classList.add('input-error');
                    if (errorEl) errorEl.textContent = rule.message;
                }
            }

            if (!isValid) return;

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/approval_system/public/users/confirm'; // ✅ sửa đúng URL

            rules.forEach(rule => {
                const input = document.getElementById(rule.id);
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name =
                    rule.id === 'fullname' ? 'full_name' :
                    rule.id === 'userType' ? 'user_type' :
                    rule.id === 'department' ? 'department_id' :
                    rule.id;
                hidden.value = input.value;
                form.appendChild(hidden);
            });

            document.body.appendChild(form);
            form.submit();
        });

    </script>

</body>
</html>
