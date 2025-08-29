-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2025 at 08:02 PM
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
-- Database: `clothing_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'pawan', '$2y$10$ydisEXDLwj2eS8owZu0OMOJwidCdnuxLRaOUl5OEdgLcvub.s8Omm');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fabric` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `print_design` varchar(255) DEFAULT NULL,
  `print_image` varchar(255) DEFAULT NULL,
  `payment_status` enum('pending','paid') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fabric`, `color`, `print_design`, `print_image`, `payment_status`) VALUES
(2, 1, 'Cotton', '#000000', NULL, NULL, 'pending'),
(3, 1, 'Cotton', '#000000', 'uploads/Read_Me_Important.txt', NULL, 'paid'),
(4, 1, 'Cotton', '#000000', 'design1.jpg', NULL, 'paid'),
(5, 1, 'Cotton', '#000000', 'uploads/1.jpg', NULL, 'paid'),
(6, 1, 'Cotton', '#000000', 'design1.jpg', NULL, 'paid'),
(7, 1, 'Cotton', '#000000', 'design3.jpg', NULL, 'paid'),
(8, 1, 'Linen', '#b71010', NULL, NULL, 'pending'),
(9, 1, 'Linen', '#b71010', NULL, NULL, 'pending'),
(10, 2, 'Silk', '#8e1515', 'design3.jpg', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `account_no`, `amount`, `status`, `created_at`) VALUES
(1, 1, '1234567890123456', 1234.00, 'success', '2025-03-15 16:19:26'),
(2, 1, '1234567890123456', 1655.00, 'success', '2025-03-15 17:33:51'),
(3, 1, '1234567890123456', 4332.00, 'success', '2025-03-15 17:39:04'),
(4, 1, '1234567890123456', 5999.00, 'success', '2025-03-15 17:41:27'),
(5, 1, '1234567890123456', 6700.00, 'success', '2025-03-15 17:57:42'),
(6, 1, '1234567890123456', 8000.00, 'success', '2025-03-15 18:04:22'),
(7, 1, '1234567890123456', 100.00, 'success', '2025-03-15 18:05:12'),
(8, 1, '1234567890123456', 6000.00, 'success', '2025-03-15 18:05:40'),
(9, 1, '1234567890123456', 3000.00, 'success', '2025-03-15 18:06:31'),
(10, 1, '1234567890123456', 7000.00, 'success', '2025-03-15 18:08:00'),
(11, 1, '1234567890123456', 123.00, 'success', '2025-03-15 18:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(1, 'Classic White T-Shirt', 'images/white_tshirt.jpg', 499.00),
(2, 'Black Cotton T-Shirt', 'images/black_tshirt.jpg', 599.00),
(3, 'Printed Graphic Tee', 'images/graphic_tee.jpg', 699.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'PAWAN ZILPE', 'PAWANZILPE1099@gmail.com', '$2y$10$WnuoYp6RcrEFj0zYneWOI.Jjp8eDoTmrYtEOTy3i6pJVjhzlDcta.'),
(2, 'rohan', 'r@gmail.com', '$2y$10$6TS5hcbQ0zIln.hqfEJ/S.Nd7C2c6XB/Ie78Bjmwzafs0DNK/WFB6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
