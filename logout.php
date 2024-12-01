<?php
// Bắt đầu session
session_start();

// Hủy session hiện tại
session_destroy();

// Chuyển hướng về trang đăng nhập
header("Location: login.php");
exit();
?>
