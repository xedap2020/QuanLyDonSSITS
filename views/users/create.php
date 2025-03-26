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
        .frame-2 { top: 233px; left: 389px; }
        .frame-3 { top: 295px; left: 389px; }
        .frame-4 { top: 357px; left: 389px; }
        .frame-5 { top: 419px; left: 389px; }
        .frame-6 { top: 481px; left: 389px; }
        .frame-7 { top: 543px; left: 389px; }

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

    <div class="frame frame-1">
        <div class="input-container">
            <div class="username-container">
                <span class="username-text">Tên đăng nhập</span>
                <span class="required">*</span>
            </div>
            <input type="text" class="input-text" id="username" > 
        </div>
    </div>
    
    <div class="frame frame-2">
        <div class="input-container">
            <div class="username-container">
                <span class="username-text">Tên người dùng</span>
                <span class="required">*</span>
            </div>
            <input type="text" class="input-text" id="fullname" >
        </div>
    </div>
    
    <div class="frame frame-3">
        <div class="input-container">
            <div class="username-container">
                <span class="username-text">Mật khẩu</span>
                <span class="required">*</span>
            </div>
            <input type="password" class="input-text" id="password" >
        </div>
    </div>

    <div class="frame frame-4">
        <div class="input-container">
            <div class="username-container">
                <span class="username-text">Email</span>
                <span class="required"></span>
            </div>
            <input type="email" class="input-text" id="email" >
        </div>
    </div>

    <div class="frame frame-5">
        <div class="input-container">
            <div class="username-container">
                <span class="username-text">Ngày sinh</span>
            </div>
            <div class="date-container">
                <input type="date" class="date-input" id="dob" >
                <img src="/approval_system/public/assets/icons/calendar.svg" class="date-icon" alt="Date Icon">
            </div>
        </div>
    </div>

    <div class="frame frame-6">
        <div class="input-container">
            <div class="username-container">
                <span class="username-text">Loại người dùng</span>
                <span class="required">*</span>
            </div>
            <select class="input-select" id="userType" >
                <option>Nhân viên</option>
                <option>Quản lý</option>
            </select>
        </div>
    </div>
    
    <div class="frame frame-7">
        <div class="input-container">
            <div class="username-container">
                <span class="username-text">Phòng ban</span>
                <span class="required">*</span>
            </div>
            <select class="input-select" id="department" name="department_id">
                <?php foreach ($departments as $dept): ?>
                    <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="footer">
        <button class="next-btn">Tiếp theo</button>
        <button class="clear-btn">Xóa trống</button>
    </div>

    <script>

        document.querySelector('.date-icon').addEventListener('click', function() {
            document.getElementById('dob').showPicker();
        });

        let formData = []; 

        // Lắng nghe sự kiện click trên nút "Tiếp theo"
        document.querySelector('.next-btn').addEventListener('click', function() {
            const fields = [
                document.getElementById('username'),
                document.getElementById('fullname'),
                document.getElementById('password'),
                document.getElementById('email'),
                document.getElementById('dob'),
                document.getElementById('userType'),
                document.getElementById('department')
            ];

            fields.forEach(function(field) {
                field.disabled = true; 
                field.style.backgroundColor = 'rgba(204, 204, 204, 0.5)'; 
            });

            formData = fields.map(field => field.value);

            // Chuyển nút "Tiếp theo" thành "Lưu lại" và "Xóa trống" thành "Quay lại"
            document.querySelector('.next-btn').textContent = 'Lưu lại';
            document.querySelector('.clear-btn').textContent = 'Quay lại';

            // Lắng nghe sự kiện click trên nút "Quay lại"
            document.querySelector('.clear-btn').addEventListener('click', function() {
                document.querySelector('.next-btn').textContent = 'Tiếp theo';
                document.querySelector('.clear-btn').textContent = 'Xóa trống';
                
                const fields = [
                    document.getElementById('username'),
                    document.getElementById('fullname'),
                    document.getElementById('password'),
                    document.getElementById('email'),
                    document.getElementById('dob'),
                    document.getElementById('userType'),
                    document.getElementById('department')
                ];


                fields.forEach((field, index) => {
                    field.value = formData[index]; 
                });

                fields.forEach(function(field) {
                    field.disabled = false; 
                    field.style.backgroundColor = ''; 
                });

                document.querySelector('.clear-btn').addEventListener('click', function() {
                    if (document.querySelector('.clear-btn').textContent === 'Xóa trống') {
                        fields.forEach(function(field) {
                            field.value = ''; 
                            field.style.backgroundColor = ''; 
                        });
                    }
                });

            });

        });

        // Xử lý nút "Xóa trống"
        document.querySelector('.clear-btn').addEventListener('click', function() {
            // Nếu đang ở trạng thái "Xóa trống", thực hiện xóa dữ liệu
            if (document.querySelector('.clear-btn').textContent === 'Xóa trống') {
                const fields = [
                    document.getElementById('username'),
                    document.getElementById('fullname'),
                    document.getElementById('password'),
                    document.getElementById('email'),
                    document.getElementById('dob'),
                    document.getElementById('userType'),
                    document.getElementById('department')
                ];

                fields.forEach(function(field) {
                    field.value = ''; 
                    field.style.backgroundColor = ''; 
                });
            }
        });
        
    </script>

</body>
</html>