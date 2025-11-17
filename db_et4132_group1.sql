-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2025 at 07:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_et4132_group1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `address`) VALUES
(1, 'Thorin', 'Oakenshield', 'thorin.oakenshield@erebor.com', '0861234567', 'The Lonely Mountain, Erebor'),
(2, 'Galadriel', 'Starlight', 'galadriel.star@lothlorien.com', '0867654321', 'Golden Wood, Lothlorien'),
(3, 'Gimli', 'Ironforge', 'gimli.iron@misty.com', '0859876543', 'Glittering Caves, Aglarond'),
(4, 'Lyra', 'Moonshadow', 'lyra.moon@silverwood.com', '0851234567', 'Tower of Mages, Silverwood'),
(5, 'Ragnar', 'Stormblade', 'ragnar.storm@northreach.com', '0867891234', 'Warriors Hall, Northreach');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `total_amount`, `status`) VALUES
(1, 1, '2024-11-01', 28.97, 'Delivered'),
(2, 2, '2024-11-05', 15.99, 'Delivered'),
(3, 1, '2024-11-10', 45.96, 'Shipped'),
(4, 3, '2024-11-12', 8.99, 'Pending'),
(5, 2, '2024-11-13', 24.98, 'Processing'),
(6, 4, '2024-11-14', 19.99, 'Pending'),
(7, 5, '2024-11-15', 38.95, 'Shipped'),
(8, 1, '2024-11-16', 11.99, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_purchase` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price_at_purchase`) VALUES
(1, 1, 1, 5, 2.99),
(2, 1, 4, 2, 5.99),
(3, 2, 3, 1, 15.99),
(4, 3, 2, 2, 12.99),
(5, 3, 6, 1, 19.99),
(6, 4, 5, 1, 8.99),
(7, 5, 7, 5, 4.99),
(8, 6, 6, 1, 19.99),
(9, 7, 8, 2, 9.99),
(10, 7, 9, 3, 3.99),
(11, 7, 10, 1, 11.99),
(12, 8, 10, 1, 11.99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `material` varchar(20) DEFAULT NULL,
  `dice_sides` int(11) NOT NULL,
  `colour` varchar(20) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `material`, `dice_sides`, `colour`, `stock_quantity`) VALUES
(1, 'Standard D6', 'Classic 6-sided gaming die', 2.99, 'Plastic', 6, 'Red', 500),
(2, 'Metal D20', 'Premium metal 20-sided die for RPGs', 12.99, 'Metal', 20, 'Silver', 150),
(3, 'Wooden D6 Set', 'Handcrafted wooden dice set (5 dice)', 15.99, 'Wood', 6, 'Natural', 75),
(4, 'Glow D10', 'Glow-in-the-dark 10-sided die', 5.99, 'Plastic', 10, 'Green', 200),
(5, 'Crystal D12', 'Translucent crystal-effect 12-sided die', 8.99, 'Resin', 12, 'Blue', 120),
(6, 'RPG Dice Set', 'Complete 7-dice polyhedral RPG set', 19.99, 'Plastic', 0, 'Mixed', 300),
(7, 'Pearl D6', 'Pearlescent finish 6-sided die', 4.99, 'Plastic', 6, 'White', 250),
(8, 'Bronze D8', 'Antique bronze 8-sided die', 9.99, 'Metal', 8, 'Bronze', 100),
(9, 'Marble D4', 'Marble-effect 4-sided die', 3.99, 'Resin', 4, 'Black', 180),
(10, 'Galaxy D20', 'Galaxy-swirl design 20-sided die', 11.99, 'Resin', 20, 'Purple', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
