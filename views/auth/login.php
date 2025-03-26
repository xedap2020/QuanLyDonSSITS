<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            width: 100vw; height: 100vh;
            background-color: white;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            font-family: 'Noto Sans JP', sans-serif;
            position: relative;
        }
        .header {
            width: 100vw; height: 75px;
            position: absolute; top: 0; left: 0;
            background: #007EC6;
            display: flex; align-items: center;
            padding-left: 42px;
        }
        .header-text { font-weight: 700; font-size: 40px; color: #FFFFFF; }
        .header-subtext { font-weight: 400; font-size: 24px; color: #FFFFFF; margin-left: 35px; }

        .main-text {
            font-weight: 700; font-size: 56px;
            color: #007EC6; margin-bottom: 30px;
        }
        .form-container {
            display: flex; flex-direction: column;
        }
        .form-group {
            display: flex; align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            font-size: 14px; width: 150px;
            text-align: right; margin-right: 10px;
            white-space: nowrap;
        }
        .form-group label span { color: red; }
        .input-field {
            width: 350px; height: 40px; font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc; border-radius: 5px;
        }
        .input-field::placeholder {
            font-size: 14px; color: #999;
        }
        .button-group {
            display: flex; justify-content: space-between;
            margin-top: 20px; width: 510px;
        }
        .button {
            width: 160px; height: 45px;
            font-weight: 700; font-size: 16px;
            border: none; border-radius: 5px;
            cursor: pointer; color: white;
        }
        .login-btn { background-color: #007EC6; margin-left: 160px; }
        .clear-btn { background-color: #E2005C; }
        .error-message {
            font-size: 14px;
            color: #F90A0A;
            padding: 5px 10px;
            line-height: 20px;
            height: 100%;
            visibility: hidden;
            transition: visibility 0.3s ease-in-out;
            display: flex;
            align-items: center;
        }
        .error-container {
            height: 40px; position: relative;
            margin-left: 150px;
        }
        .input-error {
            border: 1px solid #F90A0A !important;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <span class="header-text">Sanshin</span>
        <span class="header-subtext">Hệ thống quản lý đơn</span>
    </div>

    <div class="main-text">Sanshin IT Solution</div>

    <div class="form-container">
        <div class="form-group">
            <label for="username">Tên đăng nhập <span>*</span></label>
            <input type="text" id="username" class="input-field" placeholder="Tên đăng nhập" spellcheck="false">
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu <span>*</span></label>
            <input type="password" id="password" class="input-field" placeholder="Mật khẩu" spellcheck="false">
        </div>
        <div class="button-group">
            <button class="button login-btn" onclick="validateLogin()">Login</button>
            <button class="button clear-btn" onclick="clearFields()">Clear</button>
        </div>
        <div class="error-container">
            <p class="error-message" id="error-message">※ Thông báo lỗi</p>
        </div>
    </div>

    <script>
        function validateLogin() {
            const username = document.getElementById("username");
            const password = document.getElementById("password");

            username.classList.remove("input-error");
            password.classList.remove("input-error");
            hideError();

            if (username.value.trim() === "" || password.value.trim() === "") {
                showError("※ Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!", username);
                return;
            }

            fetch("/approval_system/public/login", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `username=${encodeURIComponent(username.value)}&password=${encodeURIComponent(password.value)}`
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "/approval_system/public/dashboard";
                } else {
                    showError(data.message, password);
                }
            })
            .catch(() => {
                showError("※ Lỗi hệ thống, vui lòng thử lại sau.", username);
            });
        }

        function showError(message, element) {
            const errorMessage = document.getElementById("error-message");
            errorMessage.textContent = message;
            errorMessage.style.visibility = "visible";
            element.classList.add("input-error");
            element.focus();
        }

        function hideError() {
            const errorMessage = document.getElementById("error-message");
            errorMessage.style.visibility = "hidden";
            document.getElementById("username").classList.remove("input-error");
            document.getElementById("password").classList.remove("input-error");
        }

        function clearFields() {
            document.getElementById("username").value = "";
            document.getElementById("password").value = "";
            hideError();
        }
    </script>
</body>
</html>
