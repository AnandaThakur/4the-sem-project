-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 03:52 PM
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
-- Database: `aanand`
--

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL,
  `breed_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`breed_id`, `breed_title`) VALUES
(1, 'German shepard'),
(2, 'Huskey'),
(3, 'Others'),
(4, 'Bull Dog'),
(5, 'Local'),
(6, 'Hybrid'),
(7, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `pet_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`pet_id`, `ip_address`, `quantity`) VALUES
(1, '::1', 0),
(2, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Bird'),
(4, 'Fish'),
(5, 'Reptiles'),
(6, 'shiba'),
(7, 'Guinea Pig'),
(8, 'murga');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `pet_id`, `quantity`, `order_status`) VALUES
(1, 1, 1463026613, 4, 1, 'pending'),
(2, 1, 291599742, 2, 1, 'pending'),
(3, 1, 55962243, 1, 1, 'pending'),
(4, 1, 930688335, 4, 1, 'pending'),
(5, 1, 1196891058, 2, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_title` varchar(100) NOT NULL,
  `pet_description` varchar(255) NOT NULL,
  `pet_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `pet_image1` varchar(255) NOT NULL,
  `pet_image2` varchar(255) NOT NULL,
  `pet_image3` varchar(255) NOT NULL,
  `pet_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_title`, `pet_description`, `pet_keywords`, `category_id`, `breed_id`, `pet_image1`, `pet_image2`, `pet_image3`, `pet_price`, `date`, `status`) VALUES
(1, 'dog', 'good dog ', 'good dog loyal dog ', 1, 1, 'whiteorangedog.jpg', 'brownblackgerman.jpg', 'smallwhitedog.jpg', '1000', '2024-06-17 05:40:55', 'true'),
(2, 'white dog', 'it is very charming dog.', 'dog white dog ', 1, 2, 'whitedog.jpeg', 'whitedog1.jpeg', 'whitedog3.jpeg', '2000', '2024-06-17 05:42:09', 'true'),
(3, 'parrot', 'talking parrot', 'green white gray parrot', 3, 3, 'lightparrot.jpg', 'darkparrot.jpg', 'lightparrot.jpg', '3000', '2024-06-17 05:43:50', 'true'),
(4, 'fish', 'colorful fishes small in size', 'fish colorful', 4, 3, 'fish.jpg', 'colorfish.jpg', 'goldenfish.jpg', '1500', '2024-06-17 05:45:02', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_pets` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_pets`, `order_date`, `order_status`) VALUES
(1, 1, 4500, 1898020122, 2, '2024-06-17 05:47:21', 'pending'),
(2, 1, 3000, 1444982319, 1, '2024-06-17 15:35:55', 'pending'),
(3, 2, 3000, 182739040, 1, '2024-06-18 13:09:34', 'complete'),
(4, 1, 3500, 1463026613, 2, '2024-06-18 01:11:03', 'pending'),
(5, 1, 2000, 291599742, 1, '2024-06-18 02:58:54', 'pending'),
(6, 1, 1000, 55962243, 1, '2024-06-18 11:46:10', 'pending'),
(7, 1, 1500, 930688335, 1, '2024-06-18 11:46:48', 'pending'),
(8, 1, 3000, 1196891058, 2, '2024-06-18 13:38:35', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 3, 182739040, 3000, 'Cash on delivery', '2024-06-18 13:09:34'),
(2, 3, 182739040, 3000, 'Khalti', '2024-06-18 13:09:51'),
(3, 3, 182739040, 3000, 'Khalti', '2024-06-18 13:35:28'),
(4, 3, 182739040, 3000, 'Khalti', '2024-06-18 13:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'demmo', 'demo@gmail.com', '$2y$10$8Cvj.t6hUB04Rfv56u5PUuzOzPBIUL5VreY/xfYRGVMI7EP1UdkAy', 'brownwhitecat.jpg', '::1', ' tarahara', '9854671526'),
(2, 'hari', 'hari@gmail.com', '$2y$10$u/pa1VaHPOCY5V29MrPf9u.RWv3cuNbHLUXY8MUfExCDOxBAY4YMG', 'fish (2).jpg', '::1', ' basantpur', '9845418475');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`breed_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `pet_id` (`pet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `fk` (`breed_id`),
  ADD KEY `fk_cat` (`category_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `uid_fk` (`user_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `pid_fk` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`);

--
-- Constraints for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD CONSTRAINT `orders_pending_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_pending_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `fk` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`breed_id`),
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
