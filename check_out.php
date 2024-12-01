<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');


?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
    
        <div id="header">
            <a href="" class="logo"><img src="images/logo.png" alt=""></a>
            <div id="menu">
                <div class="item"><a href="home2.php">Trang chủ</a></div>
                <div class="item"><a href="about.php">Giới thiệu</a></div>
                <div class="item"><a href="product.php">Sản phẩm</a></div>
                <div class="item"><a href="actions.php">Liên hệ</a></div>
            </div>
          <div id="actions">
 
                  <div class="item"><a href="user.php"><img src="images/user.png" alt=""></a></div>
                  <div class="item"><a href="cart.php"><img src="images/grocery-store.png" alt=""></a></div>
            </div>
        </div>
<class id="dathang1">
    <div id="thongtindathang">
    <h1>Đặt hàng</h1>
    <form method="POST" action="order_success.php">
        <label>Họ tên:</label>
        <input type="text" name="name" required>
        <br>
        <label>Địa chỉ:</label>
        <input type="text" name="address" required>
        <br>
        <label>Số điện thoại:</label>
        <input type="text" name="phone" required>
        <br>
        
        <!-- Lấy thời gian đặt hàng hiện tại -->
        <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); $order_time = date('d-m-Y H:i:s'); ?>
        <input type="hidden" name="order_time" value="<?php echo $order_time; ?>">

        <button type="submit">Đặt hàng</button>
    </form>
    </div>
</class>
<div id="footer">
            <div class="box">
                <div class="logo"><img src="images/logo.png" alt=""></div>
                <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
            </div>
            <div class="box">
                <h3>NỘI DUNG</h3>
                <ul class="quick-menu">
                <div class="item">
                        <a href="index.php">Trang chủ</a>
                    </div>
                    <div class="item">
                        <a href="product.php">Sản phẩm</a>
                    </div>
                    <div class="item">
                        <a href="about.php">Giới thiệu</a>
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