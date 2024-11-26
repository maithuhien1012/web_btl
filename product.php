<?php
include 'includes/config.php';
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy sản phẩm";
        exit();
    }
} else {
    echo "Không tìm thấy sản phẩm";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
            <div id="menu">
                <div class="item"><a href="index.php">Trang chủ</a></div>
                <div class="item"><a href="products.php">Sản phẩm</a></div>
                <div class="item"><a href="blog.php">Blog</a></div>
                <div class="item"><a href="contact.php">Liên hệ</a></div>
            </div>
            <div id="actions">
                <div class="item"><a href="account.php"><img src="images/user.png" alt=""></a></div>
                <div class="item"><a href="cart.php"><img src="images/grocery-store.png" alt=""></a></div>
            </div>
        </div>
        <div id="product-detail">
            <div class="product-image">
                <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            </div>
            <div class="product-info">
                <h2><?php echo $row['name']; ?></h2>
                <p>Giá: <?php echo $row['price']; ?> VNĐ</p>
                <p><?php echo $row['description']; ?></p>
                <button><a href="add_to_cart.php?id=<?php echo $row['id']; ?>">Thêm vào giỏ</a></button>
            </div>
        </div>
    </div>
</body>
</html>
