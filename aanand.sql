-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 04:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(1, 17, 1668495022, 7, 1, 'pending'),
(2, 17, 1538098677, 4, 1, 'pending'),
(3, 17, 401646811, 4, 2, 'pending');

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
(2, 'parrot', 'Parrot can talk words that u say', 'Parrot, Bird', 3, 3, 'WhatsApp Image 2024-04-30 at 09.08.07_37666570.jpg', 'WhatsApp Image 2024-04-30 at 09.08.07_05e9e430.jpg', 'WhatsApp Image 2024-04-30 at 09.08.05_3264677a.jpg', '850', '2024-05-02 06:11:46', 'true'),
(4, 'Cat', 'cat is a loving animal', 'bird, good bird, parrot, green', 3, 3, 'IMG-20240430-WA0009.jpg', 'IMG-20240430-WA0001.jpg', 'IMG-20240430-WA0018.jpg', '499', '2024-05-03 02:24:27', 'true'),
(5, 'cat', 'Cat is very lovely. ', 'cat, lovely cat, white cat', 2, 3, 'IMG-20240430-WA0002.jpg', 'IMG-20240430-WA0000.jpg', 'IMG-20240430-WA0013.jpg', '899', '2024-05-03 02:51:50', 'true'),
(7, 'bird', 'parrot is a very charming.', 'bird', 4, 3, 'IMG-20240430-WA0021.jpg', 'IMG-20240430-WA0000.jpg', 'IMG-20240430-WA0019.jpg', '500', '2024-05-09 04:29:38', 'true');

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
(1, 17, 500, 1668495022, 1, '2024-05-08 14:20:55', 'pending'),
(2, 17, 499, 1538098677, 1, '2024-05-09 02:02:50', 'pending'),
(3, 17, 998, 401646811, 1, '2024-05-09 04:35:16', 'pending');

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
(17, 'sonam', 'sonam@gmail.com', '$2y$10$ZMIljxkbnT0iOKvh6l6IAeD1JQKI4AYykzczbvwqAthAiYs4H//dW', 'IMG-20240430-WA0005.jpg', '::1', ' basant', '8745896547'),
(18, 'saayam', 'saayam@gmail.com', '$2y$10$NbKLbbW6FpHIbqUt6eE81OTIy53oOk1VVN8IsDhSmiA9sYfTCG/Rm', 'whitedog1.jpeg', '::1', ' mirchi', '4879561254'),
(19, 'user', 'user@gmail.com', '$2y$10$dATLBfAHlHqMYLYofHhs7.JNn0iEEhLcaGyonAMU30vMKg.7aRNDO', 'whitedog.jpeg', '::1', ' pakali', '8546921540');

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
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
