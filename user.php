<?php
session_start();

// Kiểm tra nếu chưa đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="css/user.css">
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
<hr>
<div class="form">
<div class="form_user">
<h3>Thông tin của bạn</h3>
    <p>Họ tên:  <?php echo htmlspecialchars($_SESSION['user_name']); ?> </p>
    <p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
    <p>Địa chỉ: <?php echo htmlspecialchars($_SESSION['user_country']); ?></p>
    <p>Số điện thoại: <?php echo htmlspecialchars($_SESSION['user_phone']); ?></p>
    <form action="logout.php" method="post">
        <button type="submit" style="border-radius:5px" class="logout-btn">Đăng xuất</button>
    </form>
</div>
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
                        <a href="home2.php">Trang chủ</a>
                    </div>
                    <div class="item">
                        <a href="about.php">Giới thiệu</a>
                    </div>
                    <div class="item">
                        <a href="product.php">Sản phẩm</a>
                    </div>
                    <div class="item">
                        <a href="contact.php">Liên hệ</a>
                </div>
                </ul>
            </div>
            <div class="box">
            <h3>LIÊN HỆ</h3>
                <p>Email: starfruit_weloveyou@sf6shop.com | Hotline: 1900-888-386</p>
                <p>© 2024 GOODFOOD. Được phát triển bởi đội ngũ SF6-Starfruit.</p> 
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>