-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 02:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `challanmst`
--

CREATE TABLE `challanmst` (
  `ChallanId` int(11) NOT NULL,
  `ChallanNo` int(11) DEFAULT 0,
  `ChallanDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CustomerId` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `ModifiedDate` date DEFAULT NULL,
  `TotalAmount` float DEFAULT NULL,
  `Discount` float DEFAULT 0,
  `TransportCost` float DEFAULT NULL,
  `AmountToBePaid` float DEFAULT NULL,
  `RoundOffDeade` float DEFAULT NULL,
  `DueAmount` float DEFAULT NULL,
  `RecStatus` tinyint(1) DEFAULT 1,
  `ExtraCostDesc` text DEFAULT NULL,
  `ExtraCost` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challanmst`
--

INSERT INTO `challanmst` (`ChallanId`, `ChallanNo`, `ChallanDate`, `CustomerId`, `CreatedDate`, `ModifiedDate`, `TotalAmount`, `Discount`, `TransportCost`, `AmountToBePaid`, `RoundOffDeade`, `DueAmount`, `RecStatus`, `ExtraCostDesc`, `ExtraCost`) VALUES
(1, 2021040001, '2021-04-05 00:00:00', 1, '2021-04-05 19:32:45', NULL, 1200, 0, 0, NULL, NULL, NULL, 0, NULL, 0),
(2, 2021040002, '2021-04-05 00:00:00', 1, '2021-04-05 19:32:55', NULL, 1200, 0, 0, NULL, NULL, NULL, 1, NULL, 0),
(3, 2021040003, '2021-04-05 00:00:00', 1, '2021-04-05 21:26:12', NULL, 1200, 0, 0, NULL, NULL, NULL, 1, NULL, 0),
(4, 2021040004, '2021-04-05 00:00:00', 1, '2021-04-06 02:10:05', NULL, 1200, 0, 0, NULL, NULL, 1200, 1, '', 0),
(5, 2021040005, '2021-04-05 00:00:00', 1, '2021-04-06 02:13:20', NULL, 1560, 0, 0, NULL, NULL, 0, 1, '', 0),
(6, 2021040006, '2021-04-05 00:00:00', 1, '2021-04-06 02:14:21', NULL, 1340, 0, 0, NULL, NULL, 840, 1, '', 0),
(7, 2021040007, '2021-04-05 00:00:00', 3, '2021-04-06 02:15:32', NULL, 1960, 100, 100, NULL, NULL, 1160, 1, '', 0),
(8, 2021040008, '2021-04-05 00:00:00', 1, '2021-04-06 02:17:13', NULL, 1801, 50.02, 25.69, NULL, NULL, 1775.05, 1, 'Tea-Nasta', 200),
(9, 2021040009, '2021-04-05 00:00:00', 1, '2021-04-06 02:20:12', NULL, 12000, 500, 0, NULL, NULL, 5600, 1, '', 100),
(10, 2021040010, '2021-04-05 00:00:00', 1, '2021-04-06 02:23:18', NULL, 1560, 0, 0, NULL, NULL, 0, 1, 'Uddhav', 25),
(11, 2021040011, '2021-04-06 00:00:00', 2, '2021-04-06 16:05:20', NULL, 1200, 0, 0, NULL, NULL, 0, 1, '', 0),
(12, 2021040012, '2021-04-01 00:00:00', 3, '2021-04-06 16:06:03', NULL, 12000, 0, 0, NULL, NULL, 10000, 1, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challanmst`
--
ALTER TABLE `challanmst`
  ADD PRIMARY KEY (`ChallanId`),
  ADD KEY `CustomerId` (`CustomerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challanmst`
--
ALTER TABLE `challanmst`
  MODIFY `ChallanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
