<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập/Đăng ký</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<h1>Đăng nhập</h1>
<form method="post" action="process_login.php">
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Đăng nhập</button>
</form>
<h1>Đăng ký</h1>
<form method="post" action="process_register.php">
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Đăng ký</button>
</form>
</body>
</html>
