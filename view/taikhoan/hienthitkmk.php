<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông Tin Tài Khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>

        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        body {
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            position: relative;
            width: 100%;
            height: 100%;
            transition: all 0.6s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .sign-in-container {
            z-index: 2;
        }

        button {
            border-radius: 20px;
            border: none;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: bold;
            padding: 12px 30px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            cursor: pointer;
            margin-top: 20px;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        h1 {
            font-weight: bold;
            margin: 0;
            font-size: 32px;
        }

        p {
            font-size: 18px;
            font-weight: 400;
            line-height: 1.5;
            margin: 20px 0;
            text-align: center;
        }

        a {
            color: #FF4B2B;
            font-size: 16px;
            text-decoration: none;
            margin: 15px 0;
        }

        /* CSS cho nút "Đăng Xuất" */
        button.logout-btn {
            background-color: #333;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }


    </style>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <?php
            if (is_array($thongtin)) {
                extract($thongtin);
                echo '<h1>Thông tin tài khoản</h1>
            <p>Tên tài khoản: ' . $taikhoan . '</p>
            <p>Tên Mật khẩu: ' . $matkhau . '</p>
            <p>Email: ' . $email . '</p>';
            } else {
                echo 'Dữ liệu không hợp lệ.';
            }
        ?>
        <button  onclick="window.location.href='index.php?aht=dndk'">
            Quay lại đăng nhập</button>
    </div>
</div>

</body>
</html>
