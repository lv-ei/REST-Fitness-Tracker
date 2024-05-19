<?php
session_start();
include("connect.php");

    if(isset($_POST['signin-button'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']); //user nhap
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        // Kiểm tra thông tin đăng nhập
        $query = "SELECT * FROM users WHERE USemail = '$email' AND USpassword = '$password'";
        $result = mysqli_query($conn, $query);
        $numRows = mysqli_num_rows($result);

        if ($row = mysqli_fetch_assoc($result)) {
            // Lưu USid của người dùng vào phiên
            $_SESSION['user_id'] = $row['USid'];
            $_SESSION['username'] = $row['USname'];

            if ($email == 'admin@gmail.com' && $password == 'admin') {
                // Đăng nhập thành công với vai trò admin
                header("Location: admin.html");
                exit(); // Đảm bảo không có mã PHP hoặc HTML khác được thực thi sau lệnh chuyển hướng
            } else if ($numRows == 1) {
                // Đăng nhập thành công với vai trò người dùng
                header("Location: personal.php");
                exit();
            }
        } else {
            // Thất bại trong việc đăng nhập
            header("Location: loginform.php?error=invalid");
            exit();
        }
    }
?>