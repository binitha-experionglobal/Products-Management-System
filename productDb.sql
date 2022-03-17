-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2022 at 09:57 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `userId` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`userId`, `username`, `password`, `email`, `name`, `phone`) VALUES
(4, 'binitha', 'Bini@1997', 'binitha1997@gmail.com', 'binitha', 898989898),
(17, 'bini_tha', 'io9989', 'tony@gmail.com', 'binitha', 8987812),
(18, 'binitha', 'Bini@1997', 'binit97@gmail.com', 'binitha', 89877898),
(19, 'binitha', 'Bini@1997', 'b@gmail.com', 'binitha', 89800),
(20, 'binitha', 'Bini@1997', 'bin@gmail.com', 'binitha', 898),
(21, 'binitha', 'Bini@1997', 'binithu@gmail.com', 'binitha', 8980),
(22, 'steven', 'hellooo879', 'steven@gmail.com', 'Steve Rogers', 98986468),
(23, 'steven', 'steven', 'steverogers@gmail.com', 'Steve Rogers', 937756981),
(24, 'gazni123', 'gazni123', 'gazni@gmail.com', 'Gazni', 675676432),
(25, 'alfina', 'alfina', 'alfi@gmail.com', 'Alfina', 986756789);

-- --------------------------------------------------------

--
-- Table structure for table `ProductImages`
--

CREATE TABLE `ProductImages` (
  `id` int NOT NULL,
  `productId` int UNSIGNED NOT NULL,
  `fileName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ProductImages`
--

INSERT INTO `ProductImages` (`id`, `productId`, `fileName`) VALUES
(92, 160, 'Headphone.jpg'),
(93, 161, 'NikonCamera.jpg'),
(94, 162, 'Polaroid.jpg'),
(95, 163, 'Shoes.jpg'),
(101, 161, 'D7500.jpeg'),
(111, 178, 'Lipstick.jpg'),
(122, 189, 'Appleipad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `id` int UNSIGNED NOT NULL,
  `productname` varchar(30) NOT NULL,
  `specifications` varchar(50) NOT NULL,
  `stock` int NOT NULL,
  `shortdescription` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`id`, `productname`, `specifications`, `stock`, `shortdescription`, `description`) VALUES
(160, 'Head Phone', 'boAt Rockerz 370 Bluetooth', 2500, 'Brand-BoAt', 'Rockerz 370 offers a playback time of up to 12 hours'),
(161, 'Nikon DSLR', 'AF-S DX NIKKOR 18-140mm ', 100, 'Nikon D7500', 'autofocus (AF) sensor module with detection down to -3 EV, the D7500 captures every detail in sharp focus'),
(162, 'Polaroid', 'Color-blue', 75, 'nstax mini 11 Camera', 'automatic exposure'),
(163, 'Shoes', 'White Sneakers', 550, 'Has regular styling, lace-up ', 'Synthetic upper Cushioned footbed Textured and patterned outsole'),
(178, 'Lipstick', '3D Lipstick Red Carnival', 435, 'Brand-Lakme 3.6gm', 'It is matte with a hint of shine,dermatologically tested,Waterproof'),
(189, 'Apple iPad', '10.9 inch', 120, 'Memory-64 GB', 'A14 Bionic chip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `ProductImages`
--
ALTER TABLE `ProductImages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Login`
--
ALTER TABLE `Login`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ProductImages`
--
ALTER TABLE `ProductImages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ProductImages`
--
ALTER TABLE `ProductImages`
  ADD CONSTRAINT `ProductImages_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `Products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
