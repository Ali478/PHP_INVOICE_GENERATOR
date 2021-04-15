-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2021 at 06:49 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Invoice_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `contactName1` varchar(255) DEFAULT NULL,
  `phone1` int DEFAULT NULL,
  `contactName2` varchar(255) DEFAULT NULL,
  `phone2` int DEFAULT NULL,
  `Address` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`contactName1`, `phone1`, `contactName2`, `phone2`, `Address`) VALUES
('SHEIKH AWAIS', 333233233, 'SHEIKH AWAIS', 221121211, 'TechnoDevs, Block B Phase 1 Johar Town, Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoiceID` int NOT NULL,
  `Cname` varchar(255) DEFAULT NULL,
  `shopName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(160) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `unitPrice` float DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoiceID`, `Cname`, `shopName`, `address`, `phone`, `productName`, `unitPrice`, `quantity`, `total`) VALUES
(3, 'Ali Murtaza', 'ALi SOLUTIONS', 'johar town, phase 2 , bock B lahore', '323132121', 'SSD', 3232, 3, NULL),
(4, 'ahmad', 'ahmad systems', 'johar town, phase 2 , bock B lahore', '22094090', 'HDD', 13123, 33, NULL),
(13, 'Ali', 'ALi SOLUTIONS', 'johar town, phase 2 , bock B lahore', '0332-8300732', 'keyboard', 344, 44, ''),
(16, 'Ali', 'ALi SOLUTIONS', 'johar town, phase 2 , bock B lahore', '0332-8300732', 'laptop touch screen', 2343, 33, '77319'),
(17, 'Ali', 'ALi SOLUTIONS', 'johar town, phase 2 , bock B lahore', '0332-8300732', 'keyboard', 300, 33, '9900');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `PersonID` int DEFAULT NULL,
  `Cash` varchar(255) DEFAULT NULL,
  `Cheque` varchar(255) DEFAULT NULL,
  `transferID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `Pname` varchar(30) NOT NULL,
  `unitPrice` int NOT NULL,
  `availableStock` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Pname`, `unitPrice`, `availableStock`) VALUES
(1, 'SSD', 200, 234),
(4, 'laptop touch screen', 234, 4423),
(5, 'keyboard', 333, 33),
(6, 'mouse', 123, 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoiceID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
