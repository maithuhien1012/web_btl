<?php
require 'includes/config.php'; // Kết nối cơ sở dữ liệu

if (isset($_POST['dangky'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Lưu mật khẩu thô
    $name = $_POST['name'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    if (!empty($email) && !empty($password) && !empty($name) && !empty($country) && !empty($phone)) {
        $sql = "INSERT INTO users (email, password, name, country, phone) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $email, $password, $name, $country, $phone);

        if ($stmt->execute()) {
            // Lưu thông tin vào session
            session_start();
            $_SESSION['user_id'] = $stmt->insert_id; // Lấy ID của người dùng vừa đăng ký
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_country'] = $country;
            $_SESSION['user_phone'] = $phone;        
                

            header("Location: user.php"); // Chuyển hướng đến trang thông tin người dùng
            exit();
        } else {
            echo "Lỗi khi đăng ký: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Vui lòng điền đầy đủ thông tin!";
    }
}
$conn->close();
?>
