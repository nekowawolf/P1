-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 04:36 PM
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
-- Database: `db_donate`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
