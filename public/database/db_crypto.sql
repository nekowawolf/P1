-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 03:25 PM
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
-- Database: `db_crypto`
--

-- --------------------------------------------------------

--
-- Table structure for table `crypto`
--

CREATE TABLE `crypto` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crypto`
--

INSERT INTO `crypto` (`id`, `name`, `address`) VALUES
(1, 'BNB', '0xfA9Ff5581cC458D3ba3983308F93417E5Fde2013'),
(2, 'MATIC', '0xfA9Ff5581cC458D3ba3983308F93417E5Fde2013'),
(3, 'ETH', '0xfA9Ff5581cC458D3ba3983308F93417E5Fde2013'),
(4, 'SOL', 'CmXQBdcidVRdxstt29ShnGGzmksjLH8m1EdFkwBAvJGs'),
(5, 'DOGE', 'DDAUXG9u1QuNypG6RqFSNFxRTRT53JqbgE'),
(6, 'BTC', 'bc1pkqn5h8qkjsee5yq2jzttvs4rvalpw4x2cc8nfqe75uglyw5ww2tsxnrm6g'),
(7, 'USDT', '0xfA9Ff5581cC458D3ba3983308F93417E5Fde2013'),
(8, 'USDC', '0xfA9Ff5581cC458D3ba3983308F93417E5Fde2013'),
(9, 'NEAR', 'a8cc882262cd8a81682a6921ba159c922aaa20130b8a3185f19baf9c476bcb05'),
(10, 'LTC', 'LVmbtyyxhBARrh1CxujtipPg2kaL63r6Hy'),
(11, 'TIA', 'celestia1tqawc3d2awe0h4k8mymfedkxzwzhwxrsczgem0'),
(12, 'TRX', 'TQwg4kg4uFQb5pcbozhZ6LiL4dr41kDbTT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crypto`
--
ALTER TABLE `crypto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crypto`
--
ALTER TABLE `crypto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
