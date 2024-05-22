-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 01:43 PM
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
-- Database: `db_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `donate_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `crypto_name` varchar(255) NOT NULL,
  `transaction_proof` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `donate_name`, `user_email`, `crypto_name`, `transaction_proof`, `message`, `STATUS`, `created_at`) VALUES
(3, 'hp', 'rrwwrr@gmail.com', 'LTC', 'https://etherscan.io/tx/0x090241174fca8366428c7cf40b009e48898011ce4ce2370709eb89fa646c6eea', 'done', 'pending', '2024-05-22 10:36:26'),
(4, 'test 1', 'rrwwrr@gmail.com', 'MATIC', 'https://etherscan.io/tx/0x54135971026fdcc676ec73466b4a9cf27a2f57f7fa3861e386937ce13075aa60', 'xdxdxdxdx', 'pending', '2024-05-22 10:41:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
