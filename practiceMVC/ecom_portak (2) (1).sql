-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 03:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_portak`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `productid`, `quantity`, `userid`) VALUES
(36, 37, 2, 13),
(43, 38, 3, 14),
(44, 37, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `urlkey` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `parentcategoryid` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `urlkey`, `status`, `discription`, `image`, `parentcategoryid`, `createdat`, `updatedat`) VALUES
(37, 'electronic', 'electronic', 1, 'electronics', '../public/uploads/download (1).jpg', NULL, '2020-02-18 04:20:00', '2020-02-18 04:20:00'),
(39, 'MI', 'MI', 1, 'MI', '../public/uploads/download (3).jpg', 37, '2020-02-18 04:21:26', '2020-02-18 04:21:26'),
(41, 'Vehical', 'Vehical', 1, 'Vehical', '../public/uploads/download (3).jpg', NULL, '2020-02-18 04:22:21', '2020-02-18 04:22:21'),
(42, 'Honda', 'Honda', 1, 'Honda', '../public/uploads/download (2).jpg', 41, '2020-02-18 04:23:59', '2020-02-18 04:23:59'),
(43, 'Suzuki', 'Suzuki', 1, 'Suzuki', '../public/uploads/download (3).jpg', 41, '2020-02-18 04:25:17', '2020-02-18 04:25:17'),
(44, 'Hyundai', 'Hyundai', 1, 'Hyundai', '../public/uploads/download (3).jpg', 41, '2020-02-18 04:26:57', '2020-02-18 04:26:57'),
(45, 'samsung', 'samsung', 1, 'electronics', '../public/uploads/download (2).jpg', 37, '2020-02-18 04:31:44', '2020-02-18 04:31:44'),
(46, 'cloth', 'cloth', 1, 'cloth', '../public/uploads/download (2).jpg', NULL, '2020-02-18 09:53:21', '2020-02-18 09:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `id` int(11) NOT NULL,
  `pagetitle` varchar(100) NOT NULL,
  `urlkey` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`id`, `pagetitle`, `urlkey`, `status`, `content`, `createdat`, `updatedat`) VALUES
(4, 'Home', 'Home', 1, 'this is home page', '2020-02-18 04:43:56', '2020-02-18 04:43:56'),
(5, 'About ', 'About', 0, 'this is about as page', '2020-02-18 04:44:18', '2020-02-18 04:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `SKU` varchar(100) NOT NULL,
  `urlkey` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(100) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `shortdiscription` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `SKU`, `urlkey`, `image`, `status`, `discription`, `shortdiscription`, `price`, `stock`, `created at`, `updated at`) VALUES
(35, 'm30s', '1', 'm30s', '../public/uploads/download (2).jpg', 1, 'samsung', 'samsung', '12000', 111, '2020-02-18 04:35:07', '2020-02-18 04:35:07'),
(36, 'A50', '1', 'A50', '../public/uploads/download (2).jpg', 1, 'samsung', 'samsung', '12000', 111, '2020-02-18 04:35:59', '2020-02-18 04:35:59'),
(37, 'Amaze', '1', 'Amaze', '../public/uploads/download (2).jpg', 1, 'Amaze', 'Amaze', '12000', 41, '2020-02-18 04:36:57', '2020-02-18 04:36:57'),
(38, 'City', '1', 'City', '../public/uploads/download.jpg', 1, 'City', 'City', '12000', 41, '2020-02-18 04:38:38', '2020-02-18 04:38:38'),
(39, 'Verna', '1', 'Verna', '../public/uploads/download (2).jpg', 1, 'Verna', 'Verna', '12000', 41, '2020-02-18 04:41:11', '2020-02-18 04:41:11'),
(40, 'i20', '1', 'i20', '../public/uploads/download (3).jpg', 1, 'i20', 'i20', '12000', 41, '2020-02-18 04:41:46', '2020-02-18 04:41:46'),
(41, 'Ertiga', '1', 'Ertiga', '../public/uploads/download (1).jpg', 1, 'Ertiga', 'Ertiga', '12000', 41, '2020-02-18 04:42:41', '2020-02-18 04:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `productid`, `categoryid`) VALUES
(15, 35, 45),
(16, 36, 45),
(17, 37, 42),
(18, 38, 42),
(19, 39, 44),
(20, 40, 44),
(21, 41, 43);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `regpassword` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `regpassword`) VALUES
(13, 'mohil', '1@gmail.com', '1'),
(14, 'rohit', '123@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `urlkey` (`urlkey`),
  ADD KEY `parentcategoryid` (`parentcategoryid`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `urlkey` (`urlkey`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `urlkey` (`urlkey`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parentcategoryid`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `products_categories_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_categories_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
