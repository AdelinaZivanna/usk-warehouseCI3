-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2026 at 01:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse_usk`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'dfdsfyf'),
(3, 'owinnn');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `sku` varchar(50) NOT NULL,
  `category_id` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `unit` varchar(20) NOT NULL,
  `min_stock` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `category_id`, `name`, `stock`, `unit`, `min_stock`) VALUES
(1, '91', 1, 'Lap', 2, 'Pcs', 23),
(2, '99', 1, 'Handuk', 12, 'Pcs', 5),
(6, '23', 1, 'hgfgfg', 333, 'Kg', 20),
(7, '23', 3, 'hgfgfgrrr', 233, 'Kg', 34);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `address`) VALUES
(1, 'adellavannea\'s Org', '35368765678', 'hrtgfdscvbnhgfdcxf');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_ins`
--

CREATE TABLE `transaction_ins` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_ins`
--

INSERT INTO `transaction_ins` (`id`, `product_id`, `supplier_id`, `user_id`, `qty`, `datetime`) VALUES
(1, 1, 1, NULL, 6, '2026-03-06 19:19:25'),
(2, 2, 1, NULL, 2, '2026-03-06 19:22:10'),
(3, 1, 1, 4, 100, '2026-03-07 19:30:07'),
(4, 1, 1, 4, 400, '2026-03-08 13:26:24'),
(5, 1, 1, NULL, 12, '2026-03-08 15:30:36'),
(6, 6, 1, 4, 133, '2026-03-08 15:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_outs`
--

CREATE TABLE `transaction_outs` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_outs`
--

INSERT INTO `transaction_outs` (`id`, `product_id`, `user_id`, `qty`, `destination`, `datetime`) VALUES
(1, 1, 1, 107, 'Toko cabang cililitan', '2026-03-07 19:31:00'),
(2, 1, 4, 300, NULL, '2026-03-08 17:28:08'),
(3, 1, 4, 111, 'dsfsdsd', '2026-03-08 17:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas','manajer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$9tijGND5usORH4v.af9ctOS1q9v31So5DryOuwF0a5riIeRLoATYa', 'admin'),
(4, 'nabastala', 'nabastala@gmail.com', '$2y$10$j2vRW0U9gtJ4kRb3lVbxlePGoz878m1tTMESCSNSpKjdWkO3xUAFu', 'petugas'),
(5, 'Naufal', 'Naufal@gmail.com', '$2y$10$XJDB/enrAbo8BUHwYty0guKYO/VSfOEpEXMxfYv3qsWfstlzruBFS', 'manajer'),
(6, 'Naufal', 'Naufal@gmail.com', '$2y$10$RhAeKbn35oYXsU81q11lSODvWlopcYFiVLsaRQdZFk6zHaD2jchBi', 'manajer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_ins`
--
ALTER TABLE `transaction_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_outs`
--
ALTER TABLE `transaction_outs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_ins`
--
ALTER TABLE `transaction_ins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction_outs`
--
ALTER TABLE `transaction_outs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `transaction_ins`
--
ALTER TABLE `transaction_ins`
  ADD CONSTRAINT `transaction_ins_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transaction_ins_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `transaction_ins_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_outs`
--
ALTER TABLE `transaction_outs`
  ADD CONSTRAINT `transaction_outs_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transaction_outs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
