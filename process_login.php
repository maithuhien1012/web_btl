<?php
require 'config.php'; // Kết nối cơ sở dữ liệu

if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Mật khẩu thô

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT id, password, name FROM user WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if ($password === $user['password']) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $email;

                header("Location: user.php"); // Chuyển hướng đến trang thông tin người dùng
                exit();
            } else {
                echo "Mật khẩu không đúng!";
            }
        } else {
            echo "Tài khoản không tồn tại!";
        }
        $stmt->close();
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
}
$conn->close();
?>
