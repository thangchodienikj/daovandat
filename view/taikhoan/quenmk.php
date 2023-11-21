<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="forgot_password.css">
    <title>Quên Mật Khẩu</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1),
            0 1px 1px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
            min-height: 300px;
        }

        .form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-weight: bold;
            margin: 0;
            color: #333;
        }

        p {
            font-size: 16px;
            font-weight: 300;
            line-height: 24px;
            margin: 20px 0;
            color: #666;
        }

        input {
            background-color: #f5f5f5;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        .reset-button {
            border: none;
            background-color: #FF4B2B;
            color: #fff;
            padding: 12px 20px;
            margin-top: 15px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .reset-button:hover {
            background-color: #2980b9;
        }

        .reset-button:active {
            transform: scale(0.95);
        }

        .reset-button:focus {
            outline: none;
        }

        .back-button {
            font-size: 14px;
            text-decoration: none;
            color: #3498db;
            margin-top: 10px;
            display: inline-block;
            transition: color 0.3s;
        }

        .back-button:hover {
            color: #2980b9;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="form-container forgot-password-container">
        <form action="index.php?aht=hienthi" method="post">
            <h1>Quên mật khẩu</h1>
            <a href="index.php?aht=dndk" class="back-button">
                Quay lại đăng nhập</a>
            <p>
                Nhập địa chỉ email của bạn để thiết lập lại mật khẩu của bạn</p>
            <input type="email" name="email" placeholder="Email"/>
            <input type="submit" name="hienthi" class="reset-button" value="Đặt lại mật khẩu" />
        </form>
    </div>
</div>
</body>
</html>
