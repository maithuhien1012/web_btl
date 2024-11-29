-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Pizza', 250000.00, 'images/pizza.jpg'),
(2, 'Bò Bít Tết', 200000.00, 'images/beef.jpg'),
(3, 'Mỳ Ý', 65000.00, 'images/mi_y.jpg'),
(4, 'Hamburger', 80000.00, 'images/hamburger.jpg'),
(5, 'Canh Kim Chi', 40000.00, 'images/canh-kim-chi.jpg'),
(6, 'Sushi', 150000.00, 'images/sushi.jpg'),
(7, 'Súp Miso', 40000.00, 'images/soup.jpg'),
(8, 'Salad', 30000.00, 'images/salad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_detail`
--

CREATE TABLE `products_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `ingredients` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`id`, `name`, `price`, `image`, `description`, `weight`, `ingredients`) VALUES
(1, 'Pizza', 250000.00, 'images/pizza.jpg', 'Pizza béo ngậy, thơm lừng. Nhân bò, nhân phô mai, nhân xúc xích. Ăn là chồng mê tới già', '1 suất ', 'Thịt bò, Xúc xích, Phô mai, Ớt chuông'),
(2, 'Bò Bít Tết', 200000.00, 'images/beef.jpg', 'Beef-steak thơm ngon. Nước sốt sánh quyện từng thớ thịt cùng chút thì là rau răm', '1 suất', 'Thịt bò mềm mọng, Lá húng quế thơm phức, Nước sốt thần thánh'),
(3, 'Mỳ Ý', 65000.00, 'images/mi_y.jpg', 'Mỳ ý sánh đậm sốt, ăn một miếng mê hai miếng là tê', '1 suất', 'Sợi mỳ dai ngon, Nước sốt đậm đà, Bò băm ê hề, Phô mai béo ngậy'),
(4, 'Hamburger', 80000.00, 'images/hamburger.jpg', 'Bánh burger bò đẫm nhân, Bánh mì quết bơ tỏi nướng lên thơm lừng, Thịt viên đậm đà, Nước sốt cay nồng', '1 phần', 'Bánh mì nóng hổi, Thịt viên săn chắc, Nước sốt đậm đà'),
(5, 'Canh Kim Chi', 40000.00, 'images/canh-kim-chi.jpg', 'Canh kim chi nóng hổi, vừa thổi vừa ăn', '1 bát', 'Kim chi, Đậu hũ non, Sốt Hàn Quốc, Hành baro'),
(6, 'Sushi', 150000.00, 'images/sushi.jpg', 'Cơm cuộn rong biển nhân cá ngừ, ăn một miếng là nhức cái nách', '1 phần', 'Cơm nóng, Rong biển, Cá ngừ xé sợi, Sốt mayonaise'),
(7, 'Súp Miso', 40000.00, 'images/soup.jpg', 'Súp miso thơm lừng, ngào ngạt hương thơm của rong biển và đậu miso', '1 bát', 'Gói súp gia vị, Rong biển, Thịt băm xào tỏi, Hành lá'),
(8, 'Salad', 30000.00, 'images/salad.jpg', 'Rau trộn thập cẩm, tươi mát cả con người', '1 phần', 'Rau salad, Húng quế, Bắp ngô, Lê cắt lát'),
(9, 'Bò Bít Tết', 200000.00, 'images/beef.jpg', 'Hamburger bò thơm béo', '1 phần', 'Bò viên hảo hạng, Sốt ướp đậm đà, Pate béo ngậy'),
(10, 'Pizza', 250000.00, 'images/pizza.jpg', 'Pizza béo ngậy, thơm lừng. Nhân bò, nhân phô mai, nhân xúc xích. Ăn là chồng mê tới già', '1 suất', 'Thịt bò, Xúc xích, Phô mai, Ớt chuông'),
(11, 'Bò Bít Tết', 200000.00, 'images/beef.jpg', 'Khô gà lá chanh thơm ngon', '1.5kg', 'Thịt gà, lá chanh, ớt, gia vị'),
(12, 'Canh Kim Chi', 40000.00, 'images/canh-kim-chi.jpg', 'Khô gà lá chanh thơm ngon', '1.5kg', 'Thịt gà, lá chanh, ớt, gia vị'),
(13, 'Sushi', 150000.00, 'images/sushi.jpg', 'Khô gà lá chanh thơm ngon', '1.5kg', 'Thịt gà, lá chanh, ớt, gia vị'),
(14, 'Súp Miso', 40000.00, 'images/soup.jpg', 'Khô gà lá chanh thơm ngon', '1.5kg', 'Thịt gà, lá chanh, ớt, gia vị'),
(15, 'Sushi', 180000.00, 'images/sushi.jpg', 'Cơm cuộn rông biển nhân cá ngừ xé sợi', '1 suất', 'Cơm trắng, Rong biển, Cá ngừ cắt lát'),
(16, 'Salad', 30000.00, 'images/salad.jpg', 'Khô gà lá chanh thơm ngon', '1.5kg', 'Thịt gà, lá chanh, ớt, gia vị'),
(17, 'Pizza', 250000.00, 'images/pizza.jpg', 'Khô gà lá chanh thơm ngon', '1.5kg', 'Thịt gà, lá chanh, ớt, gia vị'),
(18, 'Bò Bít Tết', 200000.00, 'images/beef.jpg', 'Khô gà lá chanh thơm ngon', '1.5kg', 'Thịt gà, lá chanh, ớt, gia vị'),
(19, 'Salad', 30000.00, 'images/salad.jpg', 'Rau trộn thập cẩm, tươi mát cả con người', '1 phần', 'Rau salad, Húng quế, Bắp ngô, Lê cắt lát'),
(20, 'Mỳ Ý', 65000.00, 'images/mi_y.jpg', 'Khô gà lá chanh thơm ngon', '1.5kg', 'Thịt gà, lá chanh, ớt, gia vị');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `country`, `phone`, `created_at`) VALUES
(1, 'mhien101204@gmail.com', '$2y$10$CYANZ8O0OcmQT8Zj4o/5EecPHbEfjS4Xxuo4Gq7ke1zN0/bXYGq/2', 'Mai Hiền', 'Ngô Quyền', '0364606470', '2024-11-29 02:49:05'),
(2, 'vucphong12@gmail.com', '1', 'Mai Hiền', 'Ngô Quyền', '1234567', '2024-11-29 11:37:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
