<?php
require 'includes/config.php'; // Kết nối cơ sở dữ liệu

if (isset($_POST['dangnhap'])) {
    $email = trim($_POST['email']); // Loại bỏ khoảng trắng dư thừa
    $password = trim($_POST['password']); // Mật khẩu thô

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT id, password, name, country, phone FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Kiểm tra mật khẩu (sử dụng password_verify nếu mật khẩu được mã hóa)
                if (password_verify($password, $user['password'])) {
                    // Bắt đầu session
                    session_start();

                    // Lưu thông tin đầy đủ vào session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_country'] = $user['country'];
                    $_SESSION['user_phone'] = $user['phone'];

                    // Chuyển hướng đến trang thông tin người dùng
                    header("Location: user.php");
                    exit();
                } else {
                    echo "Mật khẩu không đúng!";
                }
            } else {
                echo "Tài khoản không tồn tại!";
            }
            $stmt->close();
        } else {
            echo "Có lỗi xảy ra trong quá trình chuẩn bị truy vấn!";
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
}
$conn->close();
?>
