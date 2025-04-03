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

        .error-message {
            color: red;
            font-size: 13px;
            padding-left: 130px;
            padding-top: 45px;
        }

        .input-error {
            border: 1px solid red !important;
        }

        .frame-7 .error-message {
            padding-left: 130px;
            padding-top: 5px;
        }

  </style>
</head>
<body>
    <?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="sidebar">
        <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    </div>

    <div class="new-order-text">Thêm mới đơn</div>

    <form action="/approval_system/public/requests/confirm" method="post" enctype="multipart/form-data" id="requestForm">
        <div class="frame-1">
            <div class="title-text">
                Tiêu đề <span>*</span>
            </div>
            <input type="text" class="input-text-1" id = "title" name="title">
            <div class="error-message" id="error-title"></div>
        </div>
        
        <div class="frame-2">
            <div class="title-text">
                Nội dung
            </div>
            <input type="text" class="input-text-2" id="content" name="description">
        </div>

        <div class="frame-3">
            <div class="title-text">
                Người duyệt <span>*</span>
            </div>
            <select class="input-select" id="userAccept" name="approver_id">
                <option value="">-- Chọn người duyệt --</option>
                <?php foreach ($approvers as $approver): ?>
                    <option value="<?= $approver['id'] ?>"><?= htmlspecialchars($approver['full_name']) ?></option>
                <?php endforeach; ?>
            </select>
            <div class="error-message" id="error-userAccept"></div>
        </div>

        <div class="frame-4">
            <div class="title-text">
                Loại đơn <span>*</span>
            </div>
            <select class="input-select" id="typeDon" name="type">
                <option value="">-- Chọn loại đơn --</option>
                <option value="leave">Xin nghỉ phép</option>
                <option value="equipment">Mượn thiết bị</option>
                <option value="schedule_change">Đổi lịch</option>
                <option value="expense">Hoàn phí</option>
            </select>
            <div class="error-message" id="error-typeDon"></div>
        </div>

        <div class="frame-5">
            <div class="title-text">
                Ngày bắt đầu <span>*</span>
            </div>
            <div class="date-container">
                <input type="date" class="date-input" id="dob-1" name="start_date">
                <img src="/approval_system/public/assets/icons/calendar.svg" class="date-icon-1" alt="Date Icon">
            </div>
            <div class="error-message" id="error-dob-1"></div>
        </div>

        <div class="frame-6">
            <div class="title-text">
                Ngày kết thúc <span>*</span>
            </div>
            <div class="date-container">
                <input type="date" class="date-input" id="dob-2" name="end_date">
                <img src="/approval_system/public/assets/icons/calendar.svg" class="date-icon-2" alt="Date Icon">
            </div>
            <div class="error-message" id="error-dob-2"></div>
        </div>


        </div> 

        <div class="frame-7">
            <div class="title-text">
                Đính kèm <span>*</span>
            </div>

            <div class="input-file-wrapper">
                <input type="file" class="input-file" accept="image/*" onchange="displayFileName(this)" id="imageUpload" name="attached_file">
                <div class="icon-file-wrapper">
                    <img src="/approval_system/public/assets/icons/upload-icon.svg" alt="Upload Icon" class="upload-icon">
                </div>
                <div class="input-file-name"></div>
            </div>
            <div class="error-message" id="error-imageUpload"></div>
        </div>

        <div class="footer">
            <button type="submit" class="next-btn">Tiếp theo</button>
            <button type="button" class="clear-btn">Xóa trống</button>
        </div>
    </form>

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

        document.querySelector('.clear-btn').addEventListener('click', function (e) {
            e.preventDefault();
            const form = document.getElementById('requestForm');
            form.reset();
            document.querySelector('.input-file-name').textContent = '';

            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));
        });

        document.querySelector('.next-btn').addEventListener('click', function (e) {
            e.preventDefault();

            const requiredFields = [
                { id: 'title', message: 'Vui lòng nhập tiêu đề' },
                { id: 'userAccept', message: 'Vui lòng chọn người duyệt' },
                { id: 'typeDon', message: 'Vui lòng chọn loại đơn' },
                { id: 'dob-1', message: 'Vui lòng chọn ngày bắt đầu' },
                { id: 'dob-2', message: 'Vui lòng chọn ngày kết thúc' },
                { id: 'imageUpload', message: 'Vui lòng đính kèm file' }
            ];

            let isValid = true;

            requiredFields.forEach(({ id, message }) => {
                const el = document.getElementById(id);
                const error = document.getElementById(`error-${id}`);
                const isEmpty = (el.type === 'file') ? el.files.length === 0 : !el.value.trim();

                if (isEmpty) {
                el.classList.add('input-error');
                error.textContent = message;
                isValid = false;
                } else {
                el.classList.remove('input-error');
                error.textContent = '';
                }
            });

            if (isValid) {
                document.getElementById('requestForm').submit();
            }
        });

    </script>
</body>
</html>