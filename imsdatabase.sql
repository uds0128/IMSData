-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 04:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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
-- Table structure for table `tblcustomermst`
--

CREATE TABLE `tblcustomermst` (
  `CustomerId` int(10) NOT NULL,
  `CustomerName` text NOT NULL,
  `MobileNo` bigint(10) NOT NULL,
  `Email` text NOT NULL,
  `Address` text NOT NULL,
  `GSTNo` varchar(16) NOT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedDate` date NOT NULL,
  `RecStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomermst`
--

INSERT INTO `tblcustomermst` (`CustomerId`, `CustomerName`, `MobileNo`, `Email`, `Address`, `GSTNo`, `CreatedDate`, `ModifiedDate`, `RecStatus`) VALUES
(7, 'rohan', 9999999999, 'exaaamaple@gmail.com', '\"Gurukrupa\", Janak Nagar, Vavdi Road', '24AAAAA0000A1Z5', '2021-03-03', '2021-03-03', 0),
(8, 'rohan', 9999999999, 'example12@gmail.com', '\"Gurukrupa\", Janak Nagar, Vavdi Road', '24AAABB0000A1Z5', '2021-03-03', '2021-03-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblexpencemst`
--

CREATE TABLE `tblexpencemst` (
  `ExpanceId` int(10) NOT NULL,
  `Discription` text NOT NULL,
  `ExpanceDate` date NOT NULL,
  `Amount` float NOT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedDate` date NOT NULL,
  `RecStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblexpencemst`
--

INSERT INTO `tblexpencemst` (`ExpanceId`, `Discription`, `ExpanceDate`, `Amount`, `CreatedDate`, `ModifiedDate`, `RecStatus`) VALUES
(1, 'laptop 5', '2021-03-12', 150000, '2021-03-04', '2021-03-04', 0),
(2, 'Truck Rent', '2021-03-04', 25000, '2021-03-04', '2021-03-04', 1),
(3, 'home', '2020-05-25', 1100000, '2021-03-04', '2021-03-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproductmst`
--

CREATE TABLE `tblproductmst` (
  `ProductId` int(10) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductType` text NOT NULL,
  `HSNCode` bigint(10) NOT NULL,
  `BrandName` varchar(100) NOT NULL,
  `UnitOfPacking` varchar(100) NOT NULL,
  `Packing` varchar(100) NOT NULL,
  `SizeOfPacking` int(10) NOT NULL,
  `ProductGrade` varchar(255) NOT NULL,
  `CodeNo` varchar(255) NOT NULL,
  `colorTypeSeriese` varchar(255) NOT NULL,
  `TaxableGST` varchar(10) NOT NULL,
  `WeightPiceSize` varchar(100) NOT NULL,
  `BatchNo` int(10) NOT NULL,
  `StockMstSysID` int(10) NOT NULL,
  `CreatedDate` date NOT NULL DEFAULT current_timestamp(),
  `ModifiedDate` date NOT NULL,
  `RecStatus` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproductmst`
--

INSERT INTO `tblproductmst` (`ProductId`, `ProductName`, `ProductType`, `HSNCode`, `BrandName`, `UnitOfPacking`, `Packing`, `SizeOfPacking`, `ProductGrade`, `CodeNo`, `colorTypeSeriese`, `TaxableGST`, `WeightPiceSize`, `BatchNo`, `StockMstSysID`, `CreatedDate`, `ModifiedDate`, `RecStatus`) VALUES
(1, 'a', 'a', 123, 'a', 'a', 'a', 123, 'a', 'a', 'a', 'a', '123', 123, 0, '2021-02-27', '0000-00-00', 'A'),
(2, '', '', 0, '', '', '', 0, '', '', '', '', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(3, '', '', 0, '', '', '', 0, '', '', '', '', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(4, '', '', 0, '', '', '', 0, '', '', '', '', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(5, '', '', 0, '', '', '', 0, '', '', '', '', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(6, 'Ceramic', 'Wall Tiles', 123, 'jk', 'Box', '45', 0, 'std', '123', 'std', '5', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(7, 'Ceramic', 'Wall Tiles', 123, 'jk', 'Box', '45', 0, 'std', '123', 'std', '5', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(8, 'Cement', 'Grey Cement', 132, 'jk', 'Box', '45', 0, 'std', '123', 'std', '5', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(9, 'Cement', 'Grey Cement', 132, 'jk', 'Box', '45', 0, 'std', '123', 'std', '5', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(10, '', '', 0, '', '', '', 0, '', '', '', '', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(11, 'Ceramic', 'Wall Tiles', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(12, 'Ceramic', 'Vitrified Tiles', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(13, 'Ceramic', 'Vitrified Tiles', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(14, 'Ceramic', 'Vitrified Tiles', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(15, 'Ceramic', 'null', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(16, 'Ceramic', 'null', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(17, 'Cement', 'White Cement', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(18, 'Ceramic', 'Wall Tiles', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(19, 'Ceramic', 'Wall Tiles', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(20, 'Ceramic', 'Wall Tiles', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(21, 'Ceramic', 'Wall Tiles', 123, 'jk', 'Box', '45', 0, '45', '45', 'kj', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(22, 'Cement', 'White Cement', 123, 'jk', '12', '45', 0, '45', '45', '45', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(23, 'Cement', 'White Cement', 123, 'jk', '45', '45', 0, 'std', '45', 'std', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(24, 'Ceramic', 'Vitrified Tiles', 123, 'jk', 'Box', '45', 0, 'std', '45', 'std', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(25, 'Ceramic', 'Vitrified Tiles', 123, 'jk', 'Box', '45', 0, 'std', '45', 'std', '5', '0', 0, 0, '2021-02-27', '0000-00-00', 'A'),
(26, 'Ceramic', 'Wall Tiles', 12345, 'jk', 'Box', '800*800', 0, '153', '115', '5', '12', '0', 0, 0, '2021-03-01', '0000-00-00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tblqutationdetails`
--

CREATE TABLE `tblqutationdetails` (
  `Discription` text NOT NULL,
  `Qty` int(10) NOT NULL,
  `Rate` float NOT NULL,
  `Gst` int(10) NOT NULL,
  `GstAmount` float NOT NULL,
  `Amount` float NOT NULL,
  `QutationNo` int(10) NOT NULL,
  `StockMstSysId` int(11) NOT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedDate` date NOT NULL,
  `RecStatus` tinyint(1) NOT NULL,
  `QutationId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblqutationdetails`
--

INSERT INTO `tblqutationdetails` (`Discription`, `Qty`, `Rate`, `Gst`, `GstAmount`, `Amount`, `QutationNo`, `StockMstSysId`, `CreatedDate`, `ModifiedDate`, `RecStatus`, `QutationId`) VALUES
('1', 5, 5, 5, 1.25, 26.25, 1, 72, '2021-03-16', '2021-03-16', 1, 26),
('1', 5, 5, 5, 1.25, 26.25, 1, 73, '2021-03-16', '2021-03-16', 1, 26),
('1', 5, 5, 5, 1.25, 26.25, 1, 74, '2021-03-16', '2021-03-16', 1, 26),
('1', 5, 5, 5, 1.25, 26.25, 1, 75, '2021-03-16', '2021-03-16', 1, 26),
('1', 10, 20, 5, 10, 210, 1, 76, '2021-03-16', '2021-03-16', 1, 27),
('1', 10, 20, 5, 10, 210, 2, 77, '2021-03-16', '2021-03-16', 1, 27),
('1', 10, 20, 5, 10, 210, 3, 78, '2021-03-16', '2021-03-16', 1, 27),
('1', 10, 20, 5, 10, 210, 4, 79, '2021-03-16', '2021-03-16', 1, 27),
('cement', 1, 100, 12, 12, 112, 1, 80, '2021-03-16', '2021-03-16', 1, 28),
('cement', 1, 100, 18, 18, 118, 2, 81, '2021-03-16', '2021-03-16', 1, 28),
('cement', 1, 100, 12, 12, 112, 3, 82, '2021-03-16', '2021-03-16', 1, 28),
('swsws', 1, 100, 28, 28, 128, 4, 83, '2021-03-16', '2021-03-16', 1, 28),
('cement', 1, 100, 18, 18, 118, 1, 84, '2021-03-16', '2021-03-16', 1, 29),
('cement', 1, 100, 28, 28, 128, 2, 85, '2021-03-16', '2021-03-16', 1, 29),
('cement', 1, 100, 5, 5, 105, 3, 86, '2021-03-16', '2021-03-16', 1, 29),
('cement', 1, 100, 12, 12, 112, 4, 87, '2021-03-16', '2021-03-16', 1, 29),
('swsws', 1, 100, 5, 5, 105, 1, 88, '2021-03-16', '2021-03-16', 1, 30),
('swsws', 1, 100, 5, 5, 105, 2, 89, '2021-03-16', '2021-03-16', 1, 30),
('swsws', 1, 100, 5, 5, 105, 3, 90, '2021-03-16', '2021-03-16', 1, 30),
('swsws', 1, 100, 5, 5, 105, 4, 91, '2021-03-16', '2021-03-16', 1, 30),
('1', 1000, 1000, 5, 50000, 1050000, 1, 99, '2021-03-16', '2021-03-16', 1, 31),
('1', 1000, 1000, 5, 50000, 1050000, 2, 100, '2021-03-16', '2021-03-16', 1, 31),
('1', 1000, 1000, 5, 50000, 1050000, 3, 101, '2021-03-16', '2021-03-16', 1, 31),
('1', 1000, 1000, 5, 50000, 1050000, 4, 102, '2021-03-16', '2021-03-16', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tblqutationmst`
--

CREATE TABLE `tblqutationmst` (
  `QutationId` int(10) NOT NULL,
  `Name` text NOT NULL,
  `QDate` date NOT NULL,
  `TotalPrice` float NOT NULL,
  `TotalGST` float NOT NULL,
  `TotalAmount` float NOT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedDate` date NOT NULL,
  `RecStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblqutationmst`
--

INSERT INTO `tblqutationmst` (`QutationId`, `Name`, `QDate`, `TotalPrice`, `TotalGST`, `TotalAmount`, `CreatedDate`, `ModifiedDate`, `RecStatus`) VALUES
(25, 'jethloja ', '3202-05-25', 2000, 205, 2205, '2021-03-16', '2021-03-16', 1),
(26, 'jethloja ', '2020-05-25', 100, 5, 105, '2021-03-16', '2021-03-16', 1),
(27, 'rohan', '2020-02-25', 800, 40, 840, '2021-03-16', '2021-03-16', 1),
(28, 'jethloja ', '1000-03-12', 400, 70, 470, '2021-03-16', '2021-03-16', 1),
(29, 'jethloja Rohan', '2021-02-15', 400, 63, 463, '2021-03-16', '2021-03-16', 1),
(30, 'jethloja ', '2021-03-02', 400, 20, 420, '2021-03-16', '2021-03-16', 1),
(31, 'jethloja ', '1222-02-12', 4000000, 200000, 4200000, '2021-03-16', '2021-03-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblvendormst`
--

CREATE TABLE `tblvendormst` (
  `VendorId` int(10) NOT NULL,
  `VendorName` text NOT NULL,
  `MobileNo` bigint(10) NOT NULL,
  `Email` text NOT NULL,
  `Address` text NOT NULL,
  `GSTNo` varchar(16) NOT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedDate` date NOT NULL,
  `RecStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcustomermst`
--
ALTER TABLE `tblcustomermst`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `tblexpencemst`
--
ALTER TABLE `tblexpencemst`
  ADD PRIMARY KEY (`ExpanceId`);

--
-- Indexes for table `tblproductmst`
--
ALTER TABLE `tblproductmst`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `tblqutationdetails`
--
ALTER TABLE `tblqutationdetails`
  ADD PRIMARY KEY (`StockMstSysId`),
  ADD KEY `fk_foreign_key_name` (`QutationId`);

--
-- Indexes for table `tblqutationmst`
--
ALTER TABLE `tblqutationmst`
  ADD PRIMARY KEY (`QutationId`);

--
-- Indexes for table `tblvendormst`
--
ALTER TABLE `tblvendormst`
  ADD PRIMARY KEY (`VendorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcustomermst`
--
ALTER TABLE `tblcustomermst`
  MODIFY `CustomerId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblexpencemst`
--
ALTER TABLE `tblexpencemst`
  MODIFY `ExpanceId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblproductmst`
--
ALTER TABLE `tblproductmst`
  MODIFY `ProductId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblqutationdetails`
--
ALTER TABLE `tblqutationdetails`
  MODIFY `StockMstSysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tblqutationmst`
--
ALTER TABLE `tblqutationmst`
  MODIFY `QutationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblvendormst`
--
ALTER TABLE `tblvendormst`
  MODIFY `VendorId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblqutationdetails`
--
ALTER TABLE `tblqutationdetails`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`QutationId`) REFERENCES `tblqutationmst` (`QutationId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
