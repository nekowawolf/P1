-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 04:37 PM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `donate_name`, `user_email`, `crypto_name`, `transaction_proof`, `message`, `STATUS`, `created_at`, `Amount`) VALUES
(33, 'All Eyes on Rafah', 'vitalik@gmail.com', 'ETH', 'https://etherscan.io/tx/0x00d43f477003a35c5c989e0417fac1591714ab6679aa597f5cb57ffbe4ffae87', 'Free', 'pending', '2024-06-01 17:13:53', 2),
(34, 'Help us evacuate Gaza to survive from the war!', 'rrwwrr@gmail.com', 'TRX', 'https://tronscan.org/#/transaction/7e033b062c44d21eefc5b8dea0422050825ebd793a3ce0e8a96bdd3a04ca21a3', 'God bless', 'confirmed', '2024-06-02 18:32:31', 544),
(35, 'Donation for W3D chain development', 'rrwwrr@gmail.com', 'SOL', 'https://solscan.io/tx/5363mvNY4F5rxvhGPfSdpcq24E7WnRBmXK7iincuheUUvxUwPupHGWqBJTpbYwoKQdijngpfKL7KTj9A6CebV6in', 'LFG', 'pending', '2024-05-25 21:11:23', 40),
(36, 'Food Aid for Stray Cats and Dogs', 'vitalik@gmail.com', 'DOGE', 'https://dogechain.info/tx/55ff45ed80586d3a649231e7fc4d057a6979d59ec82d9aeff23d6b965548bb7d', 'gg', 'confirmed', '2024-06-01 21:18:31', 27.233);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
