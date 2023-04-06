-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 04:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peteatmilktea`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL,
  `categorieCreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieId`, `categorieName`, `categorieCreateDate`) VALUES
(22, 'PREMIUM MILKTEA w/ PEARLS', '2022-10-18 20:54:19'),
(23, 'IMPORTED MILKTEA w/ PEARLS', '2022-10-18 20:55:07'),
(24, 'CHEESECAKE SERIES w/ PEARLS', '2022-10-18 20:56:40'),
(25, 'CREAM CHEESE SERIES w/ PEARLS', '2022-10-18 20:59:30'),
(26, 'LOCAL MILKTEA', '2022-10-18 20:57:43'),
(27, 'FRAPPE', '2022-10-18 20:58:17'),
(28, 'FRUIT TEA', '2022-10-18 20:58:47'),
(29, 'ADD ONS/ WALLING', '2022-10-18 21:00:22'),
(263, 'qwe', '2022-10-19 10:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `orderId` int(21) NOT NULL DEFAULT 0 COMMENT 'If problem is not related to the order then order id = 0',
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `userId`, `email`, `phoneNo`, `orderId`, `message`, `time`) VALUES
(1, 2, 'im.sebede@gmail.com', 9954512192, 0, 'qweqwe', '2022-10-18 20:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `contactreply`
--

CREATE TABLE `contactreply` (
  `id` int(21) NOT NULL,
  `contactId` int(21) NOT NULL,
  `userId` int(23) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactreply`
--

INSERT INTO `contactreply` (`id`, `contactId`, `userId`, `message`, `datetime`) VALUES
(1, 1, 2, 'qweqwe', '2022-10-18 22:17:38'),
(2, 1, 2, 'qweqweqw', '2022-10-18 23:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `deliverydetails`
--

CREATE TABLE `deliverydetails` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `deliveryBoyName` varchar(35) NOT NULL,
  `deliveryBoyPhoneNo` bigint(25) NOT NULL,
  `deliveryTime` int(200) NOT NULL COMMENT 'Time in minutes',
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverydetails`
--

INSERT INTO `deliverydetails` (`id`, `orderId`, `deliveryBoyName`, `deliveryBoyPhoneNo`, `deliveryTime`, `dateTime`) VALUES
(1, 2, 'qwe', 9954512197, 40, '2022-10-18 22:55:39'),
(2, 3, 'chezter', 995451219, 10, '2022-10-18 23:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `milktea`
--

CREATE TABLE `milktea` (
  `milkteaId` int(12) NOT NULL,
  `milkteaName` varchar(255) NOT NULL,
  `milkteaPrice` int(12) NOT NULL,
  `milkteaDesc` text NOT NULL,
  `milkteaCategorieId` int(12) NOT NULL,
  `milkteaPubDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milktea`
--

INSERT INTO `milktea` (`milkteaId`, `milkteaName`, `milkteaPrice`, `milkteaDesc`, `milkteaCategorieId`, `milkteaPubDate`) VALUES
(69, 'WHITE RABBIT', 95, '', 22, '2022-10-18 21:37:18'),
(70, 'DARK CHOCO', 95, '', 22, '2022-10-18 21:37:57'),
(71, 'MATCHA', 95, '', 22, '2022-10-18 21:38:10'),
(72, 'CREAMY HAZELNUT', 95, '', 22, '2022-10-18 21:38:26'),
(73, 'CHUBBY CHAN FRAPPE w/out PEARLS', 165, '', 22, '2022-10-18 21:39:34'),
(74, 'CHUBBY CHAN w/ FROSTY WHIP & CHOCO SYRUP', 145, '', 22, '2022-10-18 21:40:02'),
(75, 'ICED COFFEE', 145, '', 22, '2022-10-18 21:40:26'),
(76, 'MATCHA', 85, '', 23, '2022-10-18 21:42:32'),
(78, 'OKINAWA', 85, '', 23, '2022-10-18 21:44:23'),
(79, 'BELGIAN CHOCOLATE', 85, '', 23, '2022-10-18 21:44:38'),
(80, 'SALTED CARAMEL', 85, '', 23, '2022-10-18 21:44:53'),
(81, 'TARO', 85, '', 23, '2022-10-18 21:45:04'),
(82, 'HONEYDEW', 85, '', 23, '2022-10-18 21:45:15'),
(83, 'STRAWBERRY', 85, '', 23, '2022-10-18 21:45:27'),
(84, 'CHEESECAKE', 85, '', 23, '2022-10-18 21:45:39'),
(85, 'SAKURA STRAWBERRY', 85, '', 23, '2022-10-18 21:45:54'),
(86, 'DARK CHOCOLATE', 85, '', 23, '2022-10-18 21:46:23'),
(87, 'RED VELVET', 115, '', 24, '2022-10-18 21:46:52'),
(88, 'OKINAWA', 115, '', 24, '2022-10-18 21:47:51'),
(89, 'TARO', 115, '', 24, '2022-10-18 21:48:19'),
(90, 'WINTERMELON', 115, '', 24, '2022-10-18 21:48:46'),
(91, 'SALTED CARAMEL22', 115, '', 24, '2022-10-18 21:49:00'),
(92, 'JAVA CHIPS', 85, '', 25, '2022-10-18 21:49:51'),
(93, 'COOKIES AND CREAM', 85, '', 25, '2022-10-18 21:50:10'),
(94, 'RED VELVET', 85, '', 25, '2022-10-18 21:50:24'),
(95, 'CAPPUCINO', 85, '', 25, '2022-10-18 21:50:42'),
(96, 'ROCKY ROAD', 85, '', 25, '2022-10-18 21:50:55'),
(97, 'BLACK FOREST', 85, '', 25, '2022-10-18 21:51:11'),
(98, 'WINTERMELON', 85, '', 25, '2022-10-18 21:51:23'),
(99, 'DARK CHOCO', 165, '', 26, '2022-10-18 21:51:41'),
(100, 'JAVA', 165, '', 26, '2022-10-18 21:51:57'),
(101, 'SAKURA', 165, '', 26, '2022-10-18 21:52:09'),
(102, 'STRAWBERRY', 165, '', 26, '2022-10-18 21:52:22'),
(103, 'BLUEBERRY', 85, '', 27, '2022-10-18 21:55:35'),
(104, 'GREEN APPLE', 85, '', 27, '2022-10-18 21:55:54'),
(105, 'STRAWBERRY', 85, '', 27, '2022-10-18 21:56:08'),
(106, 'BLUEBERRY (MILK BASED)', 95, '', 27, '2022-10-18 21:56:31'),
(107, 'STRAWBERRY (MILK BASED)', 95, '', 27, '2022-10-18 21:56:52'),
(108, 'CHEESECAKE', 105, '', 28, '2022-10-18 21:57:25'),
(109, 'RED VELVET', 105, '', 28, '2022-10-18 21:57:39'),
(110, 'BELGIAN', 105, '', 28, '2022-10-18 21:57:53'),
(111, 'DARK CHOCOLATE', 105, '', 28, '2022-10-18 21:58:08'),
(112, 'MATCHA', 105, '', 28, '2022-10-18 21:58:28'),
(113, 'TARO', 105, '', 28, '2022-10-18 21:58:40'),
(114, 'SAKURA', 105, '', 28, '2022-10-18 21:58:54'),
(115, 'OKINAWA', 105, '', 28, '2022-10-18 21:59:06'),
(116, 'BLACK FOREST', 105, '', 28, '2022-10-18 21:59:17'),
(117, 'COOKIES AND CREAM', 105, '', 28, '2022-10-18 21:59:44'),
(118, 'TAPIOCA PEARLS', 10, '', 29, '2022-10-18 22:00:10'),
(119, 'NATA', 10, '', 29, '2022-10-18 22:03:31'),
(120, 'FRUIT JELLY', 10, '', 29, '2022-10-18 22:03:50'),
(121, 'CREAM CHEESE', 20, '', 29, '2022-10-18 22:04:05'),
(122, 'ROCK SALT AND CHEESE', 20, '', 29, '2022-10-18 22:04:22'),
(123, 'FROSTY WHIP', 30, '', 29, '2022-10-18 22:04:37'),
(124, 'SPECIAL CHOCO SYRUP', 20, '', 29, '2022-10-18 22:04:53'),
(125, 'CRASHED OREO', 10, '', 29, '2022-10-18 22:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `milkteaId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `milkteaId`, `itemQuantity`) VALUES
(1, 1, 1, 1),
(2, 2, 76, 1),
(3, 2, 78, 1),
(4, 2, 83, 1),
(5, 2, 82, 1),
(6, 2, 69, 1),
(7, 3, 70, 2),
(8, 4, 70, 1),
(9, 5, 69, 1),
(10, 5, 70, 1),
(11, 5, 100, 1),
(12, 5, 92, 1),
(13, 5, 78, 1),
(14, 6, 70, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sitedetail`
--

CREATE TABLE `sitedetail` (
  `tempId` int(11) NOT NULL,
  `systemName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` bigint(21) NOT NULL,
  `contact2` bigint(21) DEFAULT NULL COMMENT 'Optional',
  `address` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitedetail`
--

INSERT INTO `sitedetail` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) VALUES
(1, 'Logo', 'peteatmilkteastation@gmail.com', 9123456789, 1234567, '27 Commonwealth Ave., Fairview, Quezon City', '2021-03-23 19:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(4, 'PETEAT', 'PETEAT', 'MILKTEA STATION', 'peteatmilkteastation@gmail.com', 9123456789, '1', '$2y$10$qa59FQwpqajGqcn4yg4PDelAr0BY6T7bD9s6DZ5PWExynbwGRJjDe', '2022-10-18 22:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `milkteaId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`cartItemId`, `milkteaId`, `itemQuantity`, `userId`, `addedDate`) VALUES
(10, 76, 1, 6, '2022-10-19 04:20:24'),
(11, 78, 1, 6, '2022-10-19 04:20:25'),
(18, 79, 1, 10, '2022-10-19 10:10:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorieId`);
ALTER TABLE `categories` ADD FULLTEXT KEY `categorieName` (`categorieName`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `contactreply`
--
ALTER TABLE `contactreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`);

--
-- Indexes for table `milktea`
--
ALTER TABLE `milktea`
  ADD PRIMARY KEY (`milkteaId`);
ALTER TABLE `milktea` ADD FULLTEXT KEY `pizzaName` (`milkteaName`,`milkteaDesc`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `sitedetail`
--
ALTER TABLE `sitedetail`
  ADD PRIMARY KEY (`tempId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorieId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactreply`
--
ALTER TABLE `contactreply`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `milktea`
--
ALTER TABLE `milktea`
  MODIFY `milkteaId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sitedetail`
--
ALTER TABLE `sitedetail`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
