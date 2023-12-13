-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 02:47 PM
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
-- Database: `hanouti`
--

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `owner` int(255) NOT NULL,
  `price` float NOT NULL,
  `SOLD` int(4) NOT NULL DEFAULT 1,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `image`, `title`, `owner`, `price`, `SOLD`, `qty`) VALUES
(34, 'upload/a.fatima_LaptopHPi716ram1024_126237.jpg', 'Laptop HP i7 16ram 1024', 1, 1000, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_constraint_name` (`owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_constraint_name` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
