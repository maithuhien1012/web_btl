<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div id="header">
<a href="" class="logo"><img src="images/logo.png" alt=""></a>
            <div id="menu">
                <div class="item"><a href="home.php">Trang chủ</a></div>
                <div class="item"><a href="about.php">Giới thiệu</a></div>
                <div class="item"><a href="product.php">Sản phẩm</a></div>
                <div class="item"><a href="contact.php">Liên hệ</a></div>
            </div>
            <div id="actions">
                <div class="item"><a href="user.php"><img src="images/user.png" alt=""></a></div>
                <div class="item"><a href="cart.php"><img src="images/grocery-store.png" alt=""></a></div>
            </div>
        </div>
    <div class="all">
    <a href="" class="logo"><img src="images/logo.png" style="background-color:dimgray; border-radius: 5px; width: 250px; height:250px; border-radius: 200px;"></a>
        <div class="login1">
            <div class="login1a">
                <form method="post" action="process_register.php">
                <h3>Đăng ký</h3><hr>
                
                <input type="email" name="email" placeholder="Email/Số điện thoại/Tên đăng nhập" required>
                <br>
                <input type="password" name="password" placeholder="Mật khẩu"required>
                <br>
                <input type="name" name="name" placeholder="Tên người nhận " required>
                <br>
                <input type="country" name="country" placeholder="Địa chỉ nhận hàng" required>
                <br>
                <input type="phone" name="phone" placeholder="Số điện thoại nhận hàng" required>
                <button type="submit" name="dangky" style="width:260px; height:30px; background-color:sienna; border-radius: 5px; font-size: 20px; margin-top:50px">Đăng ký</button>
                <p style="line-height: 5px;"> Chào mừng bạn đến với Good Food</p>

                </form>
            </div>
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
                        <a href="home.php">Trang chủ</a>
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
                <p>Địa chỉ: 123 Đường Khúc Thừa Dụ, Quận Thủ Đức, TP. Hồ Chí Minh</p>
                <p>Email: starfruit_weloveyou@sf6shop.com | Hotline: 1900-888-386</p>
                <p>© 2024 GOODFOOD. Được phát triển bởi đội ngũ SF6-Starfruit.</p>
            </div>
        </div>
</body>
</html>