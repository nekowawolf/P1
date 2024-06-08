-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 05:50 PM
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
-- Database: `web3donate`
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

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `name`, `description`, `image_url`, `end_date`) VALUES
(1, 'All Eyes on Rafah ', 'with every donation, you help pave the way for humanity in rafah.', 'https://disk.mediaindonesia.com/thumbs/480x320/news/2024/05/36ef31b0b20954d4528eb650b3d29409.jpg', '2024-08-20'),
(3, 'Help us evacuate Gaza to survive from the war!', 'your donation helps evacuate gaza from the war zone, together we can save lives.', 'https://images.gofundme.com/7WqslE_-wlFfWtAilcmQY_GKsVo=/720x405/https://d2g8igdw686xgo.cloudfront.net/79366043_1716193614118786_r.jpeg', '2024-09-26'),
(4, 'Donation for W3D chain development', 'help us grow the W3D chain to create more decentralized and transparent donations. \r\n', 'https://i.pinimg.com/564x/dc/6c/60/dc6c60d38770a8d579bc80aeeab51546.jpg', '2024-12-01'),
(5, 'Give voice to their silent cries', 'your donation helps people with hearing disabilities get the hearing aids they need to live better.', 'https://www.giving.sg/res/GetCampaignImage/54ec2ea7-6396-4fff-8eb2-ec4541551b2e.jpg', '2024-11-14'),
(6, 'Food Aid for Stray Cats and Dogs', 'with your donation, we can provide food and love to cats and dogs living on the streets.', 'https://i.kym-cdn.com/entries/icons/original/000/048/010/side_eye_cat.jpg', '2024-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'rrwwrr@gmail.com', 'bullrun', 'buy more btc ', '2024-05-16 09:28:49'),
(44, 'vitalik@gmail.com', 'bug 1', 'bug 22', '2024-05-21 10:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(13, 'rrwwrr', 'rrwwrr@gmail.com', '111', '2024-05-15 03:48:04', 'user'),
(19, 'vitalik', 'vitalik@gmail.com', '444', '2024-05-17 03:46:00', 'user'),
(36, 'admin', 'web3@donate.com', 'admin', '2024-06-08 15:33:07', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crypto`
--
ALTER TABLE `crypto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crypto`
--
ALTER TABLE `crypto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
