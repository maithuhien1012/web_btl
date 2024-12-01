<?php
require 'includes/config.php'; // Kết nối cơ sở dữ liệu

// Truy vấn lấy tất cả tài khoản
$sql = "SELECT id, password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userId = $row['id'];
        $rawPassword = $row['password'];

        // Mã hóa mật khẩu
        $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

        // Cập nhật mật khẩu đã mã hóa vào cơ sở dữ liệu
        $updateSql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("si", $hashedPassword, $userId);
        $stmt->execute();
        $stmt->close();
    }
    echo "Cập nhật mật khẩu thành công!";
} else {
    echo "Không có người dùng nào để cập nhật!";
}

$conn->close();
?>
