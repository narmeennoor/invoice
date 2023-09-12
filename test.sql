-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 01:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetail`
--

CREATE TABLE `invoicedetail` (
  `invoiceno` int(11) NOT NULL,
  `lno` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `pdesc` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoicedetail`
--

INSERT INTO `invoicedetail` (`invoiceno`, `lno`, `code`, `pdesc`, `unit`, `rate`, `qty`, `total`) VALUES
(1, 1, 'prod1', 'product1name', 'pieces', 20, 2, 40),
(1, 2, 'prod2', 'somename', 'litres', 50, 2, 100),
(2, 1, 'prod1', 'product1name', 'pieces', 20, 2, 40),
(3, 1, 'prod1', 'product1name', 'pieces', 20, 5, 100),
(4, 1, 'prod2', 'somename', 'litres', 50, 5, 250),
(4, 2, 'prod1', 'product1name', 'pieces', 20, 2, 40),
(6, 1, 'prod2', 'somename', 'litres', 50, 50, 2500),
(8, 1, 'prod1', 'product1name', 'pieces', 20, 2, 40),
(8, 2, 'prod2', 'somename', 'litres', 50, 5, 250),
(11, 1, 'prod1', 'product1name', 'pieces', 20, 2, 40),
(11, 2, 'prod2', 'somename', 'litres', 50, 5, 250),
(13, 1, 'prod1', 'product1name', 'pieces', 20, 2, 40),
(14, 1, 'prod1', 'product1name', 'pieces', 20, 5, 100),
(14, 2, 'prod2', 'somename', 'litres', 50, 5, 250),
(15, 1, 'prod1', 'product1name', 'pieces', 20, 2, 40),
(16, 1, 'prod1', 'product1name', 'pieces', 20, 4, 80),
(17, 1, 'prod1', 'product1name', 'pieces', 20, 5, 100),
(7, 1, 'prod2', 'somename', 'litres', 50, 5, 250),
(7, 2, 'prod1', 'product1name', 'pieces', 20, 2, 40),
(5, 1, 'prod2', 'somename', 'litres', 50, 1, 50),
(10, 1, 'prod2', 'somename', 'litres', 50, 2, 100),
(10, 2, 'prod1', 'product1name', 'pieces', 20, 5, 100),
(10, 3, 'prod2', 'somename', 'litres', 50, 1, 50),
(9, 1, 'prod2', 'somename', 'litres', 50, 50, 2500),
(12, 1, 'prod1', 'product1name', 'pieces', 20, 5, 100),
(12, 2, 'prod2', 'somename', 'litres', 50, 1, 50),
(12, 3, 'prod2', 'somename', 'litres', 50, 1, 50),
(18, 1, 'prod3', 'newproduct', 'pieces', 80, 5, 400),
(18, 2, 'prod2', 'somename', 'litres', 50, 1, 50),
(19, 1, 'prod1', 'product1name', 'pieces', 25, 1, 25),
(20, 1, 'prod3', 'newproduct', 'pieces', 80, 1, 80),
(24, 1, '', '\n            \n          ', '', 0, 1, 25),
(25, 1, '', '\n            \n          ', '', 0, 1, 25),
(26, 1, 'prod1', 'product1name', 'pieces', 25, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `invoicehead`
--

CREATE TABLE `invoicehead` (
  `invoiceno` int(100) NOT NULL,
  `invoicedate` datetime NOT NULL,
  `custname` varchar(100) NOT NULL,
  `mobileno` bigint(15) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `nettotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoicehead`
--

INSERT INTO `invoicehead` (`invoiceno`, `invoicedate`, `custname`, `mobileno`, `remarks`, `nettotal`) VALUES
(1, '2023-08-23 06:32:23', 'narmeen', 124536, 'is it working?', 140),
(2, '2023-08-23 06:37:40', 'narmi', 14523, '', 40),
(3, '2023-08-23 10:08:24', 'nn', 2147483647, '', 100),
(4, '2023-08-23 06:41:33', 'checking', 1111, 'working?', 290),
(5, '2023-08-28 09:04:50', 'meen', 2456, '', 50),
(6, '2023-08-23 10:15:32', 'narmmm', 999, 'working?', 2500),
(7, '2023-08-25 09:20:24', 'narrr', 911361, 'worked', 290),
(8, '2023-08-23 10:18:01', 'trial', 91136169, '', 290),
(9, '2023-08-28 13:39:43', 'checking', 2147483647, '', 2500),
(10, '2023-08-28 13:23:30', 'checking', 963258741, '', 250),
(11, '2023-08-23 10:26:34', 'narrrmm', 9113616902, '', 290),
(12, '2023-08-30 11:16:45', 'nnnnn', 7349494133, '', 200),
(13, '2023-08-23 10:28:58', 'hhh', 852147, '', 40),
(14, '2023-08-23 10:30:36', 'nnnnn', 741258, '', 350),
(15, '2023-08-23 10:31:46', 'noor', 913642, '', 40),
(16, '2023-08-23 10:32:57', 'sab', 46132, '', 80),
(17, '2023-08-23 12:39:29', 'trial', 91136169, 'working', 100),
(18, '2023-08-30 12:57:05', 'working?', 911365479, 'checking', 450),
(19, '2023-08-30 17:08:03', 'checking', 91136169, 'working', 25),
(20, '2023-08-30 17:18:55', 'trial', 91136169, 'working', 80),
(21, '2023-08-30 14:04:47', 'checking', 91136169, 'code AC SAVE BTN', 0),
(22, '2023-08-30 14:04:28', 'trial', 91136169, '', 0),
(23, '2023-08-30 17:33:36', 'checking', 91136169, '', 25),
(24, '2023-08-31 09:37:04', 'checking', 91136169, '', 25),
(25, '2023-08-31 09:38:19', 'trial', 91136169, '', 25),
(26, '2023-08-31 09:38:50', 'narrrmm', 91136169, '', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tblimage`
--

CREATE TABLE `tblimage` (
  `keycode` int(11) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `unit` varchar(110) NOT NULL,
  `sellingprice` int(11) NOT NULL,
  `offerprice` int(11) NOT NULL,
  `pdesc` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblimage`
--

INSERT INTO `tblimage` (`keycode`, `productcode`, `productname`, `unit`, `sellingprice`, `offerprice`, `pdesc`, `image`) VALUES
(4, 'prod2', 'someproduct', 'litres', 800, 500, 'is it working?', 'download (1).jpg'),
(7, 'product3', 'newproduct', 'litres', 802, 702, 'very good product.......', 'download.jpg'),
(8, '121', 'product', 'pieces', 450, 250, 'newww', 'download (2).jpg'),
(9, 'prod12', 'product1', 'pieces', 750, 550, 'good desc', 'images.jpg'),
(10, 'nn', 'narmm', 'pieces', 45, 21, 'dhhr', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `keycode` int(11) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`keycode`, `productcode`, `productname`, `unit`, `rate`, `stock`, `datetime`) VALUES
(1, 'prod1', 'product1name', 'pieces', 25, 50, '2023-08-23 06:28:53'),
(2, 'prod2', 'somename', 'litres', 50, 100, '2023-08-23 06:29:32'),
(3, 'prod3', 'newproduct', 'pieces', 80, 500, '2023-08-23 09:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblunits`
--

CREATE TABLE `tblunits` (
  `keycode` int(11) NOT NULL,
  `unitname` varchar(100) NOT NULL,
  `unitvalue` int(11) NOT NULL,
  `display` varchar(110) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblunits`
--

INSERT INTO `tblunits` (`keycode`, `unitname`, `unitvalue`, `display`, `datetime`) VALUES
(1, 'pieces', 20, 'pcs', '2023-08-23 06:27:14'),
(2, 'litres', 50, 'ltr', '2023-08-23 06:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbluploads`
--

CREATE TABLE `tbluploads` (
  `keycode` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `keycode` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`keycode`, `email`, `phone`, `username`, `password`, `datetime`) VALUES
(1, 'narmeen@gmail.com', 124578, 'narmeen', '1234', '2023-08-23 06:18:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoicehead`
--
ALTER TABLE `invoicehead`
  ADD PRIMARY KEY (`invoiceno`);

--
-- Indexes for table `tblimage`
--
ALTER TABLE `tblimage`
  ADD PRIMARY KEY (`keycode`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`keycode`);

--
-- Indexes for table `tblunits`
--
ALTER TABLE `tblunits`
  ADD PRIMARY KEY (`keycode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`keycode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoicehead`
--
ALTER TABLE `invoicehead`
  MODIFY `invoiceno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblimage`
--
ALTER TABLE `tblimage`
  MODIFY `keycode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `keycode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblunits`
--
ALTER TABLE `tblunits`
  MODIFY `keycode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `keycode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
