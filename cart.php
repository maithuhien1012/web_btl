<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_ids = array_keys($_SESSION['cart']);
$product_ids = implode(',', array_map('intval', $product_ids));

if (empty($product_ids)) {
    $product_ids = '0';
}
$query = "SELECT * FROM products WHERE id IN ($product_ids)";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Giỏ hàng của bạn</h1>
<table>
    <tr>
        <th>Sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng</th>
        <th>Hành động</th>
    </tr>
    <?php
    $total = 0;
    while ($row = $result->fetch_assoc()):
        $product_id = $row['id'];
        $quantity = $_SESSION['cart'][$product_id];
        $subtotal = $row['price'] * $quantity;
        $total += $subtotal;
    ?>
        <tr>
            <td><img src="<?php echo $row['image']; ?>" alt="" width="50"> <?php echo $row['name']; ?></td>
            <td><?php echo number_format($row['price']); ?> VNĐ</td>
            <td>
                <form method="post" action="update_cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1">
                    <button type="submit">Cập nhật</button>
                </form>
            </td>
            <td><?php echo number_format($subtotal); ?> VNĐ</td>
            <td>
                <form method="post" action="remove_from_cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <button type="submit">Xóa</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
    <tr>
        <td colspan="3"><strong>Tổng cộng:</strong></td>
        <td><strong><?php echo number_format($total); ?> VNĐ</strong></td>
        <td></td>
    </tr>
</table>
<a href="checkout.php">Đặt hàng</a>
</body>
</html>
