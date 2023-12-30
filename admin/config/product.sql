-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 06:05 PM
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
-- Database: `phpadminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `date`) VALUES
(66, 'Biryani', 'Biryani,Kolkata.', '100', 'biriani.png', '2023-12-30 13:39:13'),
(67, 'Pizza', 'Pizza, Fast Food,Kolkata', '269', 'food4.jpg', '2023-12-30 13:43:33'),
(68, 'Burgers', 'Burger, Fast Food, Kolkata', '150', 'food1.jpg', '2023-12-30 13:45:46'),
(69, 'Chicken', 'Chicken,Kolkata.', '250', 'food3.jpg', '2023-12-30 13:50:45'),
(70, 'Chowmein', 'Chowmein, Fast Food,Kolkata', '150', 'food6.jpg', '2023-12-30 13:53:30'),
(71, 'Egg Roll', 'Egg Roll, Fast Food,Kolkata', '50', 'Egg-Rolls-PNG-Clipart.png', '2023-12-30 13:59:12'),
(72, 'Fried Rice', 'Fried Rice,kolkata', '250', 'food7.png', '2023-12-30 17:00:34'),
(73, 'pasta', 'Pasta,Kolkata.', '50', 'pasta.png', '2023-12-30 17:01:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
