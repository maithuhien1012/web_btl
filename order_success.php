<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');
// Lấy thông tin sản phẩm từ session
$product_ids = array_keys($_SESSION['cart']);
$product_ids = implode(',', array_map('intval', $product_ids));

if (empty($product_ids)) {
    $product_ids = '0'; // Không có sản phẩm nào
}

$query = "SELECT * FROM products WHERE id IN ($product_ids)";
$result = $conn->query($query);



?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <link rel="stylesheet" href="css/order_success.css">
</head>
<body> 
       <div id="header">
            <a href="" class="logo"><img src="images/logo.png" alt=""></a>
            <div id="menu">
                <div class="item"><a href="home2.php">Trang chủ</a></div>
                <div class="item"><a href="about.php">Giới thiệu</a></div>
                <div class="item"><a href="product.php">Sản phẩm</a></div>
                <div class="item"><a href="contact.php">Liên hệ</a></div>
            </div>
          <div id="actions">
 
                  <div class="item"><a href="user.php"><img src="images/user.png" alt=""></a></div>
                  <div class="item"><a href="cart.php"><img src="images/grocery-store.png" alt=""></a></div>
            </div>
        </div>
<div class="xuatdon">
        <h1>Đặt hàng thành công!</h1>
                    <p>Cảm ơn bạn đã đặt hàng! Dưới đây là thông tin đơn hàng của bạn:</p>

                    <h3>Thông tin đơn hàng:</h3>
                    <div class="thongtin">
                    <ul>
                        <li><strong>Họ và tên:</strong> <?php echo htmlspecialchars($_POST['name']); ?></li>
                        <li><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($_POST['address']); ?></li>
                        <li><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($_POST['phone']); ?></li>

                        <?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $order_time = $_POST['order_time'];

                            echo "<p><b>Thời gian đặt hàng: $order_time</b></p>";
                        }?>
                    </ul>
                    </div>



<h3>Chi tiết sản phẩm:</h3>

    <table boxx="">
        <tr>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
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
            <td><?php echo $row['name']; ?></td>
            <td><?php echo number_format($row['price']); ?> VNĐ</td>
            <td><?php echo $quantity; ?></td>
            <td><?php echo number_format($subtotal); ?> VNĐ</td>
        </tr>
        <?php endwhile; ?>
        <tr>
            <td colspan="3">Tổng cộng:</td>
            <td><?php echo number_format($total); ?> VNĐ</td>
        </tr>
    </table>

</p>

<p><a href="home2.php" class="nha">Quay lại trang chủ</a></p>
</div>

<div id="footer">
            <div class="box">
                <div class="logo"><img src="images/logo.png" alt=""></div>
                <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
            </div>
            <div class="box">
                <h3>NỘI DUNG</h3>
                <ul class="quick-menu">
                <div class="item">
                        <a href="inddex.php">Trang chủ</a>
                    </div>
                    <div class="item">
                        <a href="product.php">Sản phẩm</a>
                    </div>
                    <div class="item">
                        <a href="about.php">Blog</a>
                    </div>
                    <div class="item">
                        <a href="actions.php">Liên hệ</a>
                    </div>
                </ul>
            </div>
   <div class="box">
        <h3>LIÊN HỆ</h3>
        <p>Địa chỉ: 123 Đường Khúc Thừa Dụ, Quận Thủ Đức, TP. Hồ Chí Minh<br></p>
        <p>Thời gian làm việc: Thứ Hai - Chủ Nhật (8:00 - 22:00)</p>
        <p>Email: starfruit_weloveyou@sf6shop.com | Hotline: 1900-888-386</p>
        <p>© 2024 GOODFOOD. Được phát triển bởi đội ngũ SF6-Starfruit.</p> 
             
   </div>

</body>
</html>

<?php
// Sau khi hiển thị trang thành công, có thể xóa order_id khỏi session (tuỳ chọn)
unset($_SESSION['order_id']);
?>
