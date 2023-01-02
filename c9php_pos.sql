-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 08:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c9php_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `cost`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 'pop corn', '5', '2', 0, '2023-01-02 14:24:22', '2023-01-02 14:24:22'),
(5, 'Ibra', '77', '89', 0, '2023-01-02 11:53:52', '2023-01-02 11:53:52'),
(7, 'dsfsdfdf', '23213', '123213', 0, '2023-01-02 12:17:46', '2023-01-02 12:17:46'),
(8, 'qqq', '12', '15', 2, '2023-01-02 14:35:28', '2023-01-02 14:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '10', '2023-01-02 10:21:27', '2023-01-02 10:21:27'),
(2, '15', '2023-01-02 10:24:08', '2023-01-02 10:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `display_name`, `email`, `password`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin_mamoon', 'admin_mamoon', 'mamoon@test.com', '$2y$10$37nwwpIgXedmoXAZnHs6bOeKcHVbcChupCzWCnSyfOCLhfMpWc482', 'a:12:{i:0;s:9:\"post:read\";i:1;s:11:\"post:create\";i:2;s:11:\"post:update\";i:3;s:11:\"post:delete\";i:4;s:9:\"user:read\";i:5;s:11:\"user:create\";i:6;s:11:\"user:update\";i:7;s:11:\"user:delete\";i:8;s:8:\"tag:read\";i:9;s:10:\"tag:create\";i:10;s:10:\"tag:update\";i:11;s:10:\"tag:delete\";}', '2023-01-01 15:45:49', '2023-01-01 15:45:49'),
(3, 'ibraheem', 'ibraheem', 'ibraheem@123.com', '$2y$10$5WYdpjeXPsZZQwTAfHAVAuH/hJHDXXPOMB5DC.lKezcB4rGBUDM26', '', '2023-01-02 12:25:03', '2023-01-02 12:25:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
