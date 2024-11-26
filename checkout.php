<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $user_id = $_SESSION['user_id']; // Lưu user_id trong session khi đăng nhập

    $conn->query("INSERT INTO orders (user_id, name, address, phone, total) VALUES ('$user_id', '$name', '$address', '$phone', '$total')");
    $order_id = $conn->insert_id;

    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $result = $conn->query("SELECT price FROM products WHERE id = $product_id");
        $product = $result->fetch_assoc();
        $price = $product['price'];

        $conn->query("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')");
    }

    unset($_SESSION['cart']);
    header("Location: order_success.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Đặt hàng</h1>
<form method="post" action="">
    <label>Họ tên:</label>
    <input type="text" name="name" required>
    <br>
    <label>Địa chỉ:</label>
    <input type="text" name="address" required>
    <br>
    <label>Số điện thoại:</label>
    <input type="text" name="phone" required>
    <br>
    <button type="submit">Đặt hàng</button>
</form>
</body>
</html>
