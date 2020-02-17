-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 11:15 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `urlkey` int(11) NOT NULL,
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
(11, 'education', 1, 1, 'aaa', 'aaa', NULL, '2020-02-16 05:47:58', '2020-02-16 05:47:58'),
(15, 'CA', 2, 1, 'abc', '', 11, '2020-02-17 04:28:02', '2020-02-17 04:28:02'),
(19, 'electronic', 2, 1, 'abc', '../public/uploads/download (1).jpg', NULL, '2020-02-17 08:57:14', '2020-02-17 08:57:14'),
(21, 'mobile', 2, 1, 'abc', '../public/uploads/download (2).jpg', 19, '2020-02-17 09:49:13', '2020-02-17 09:49:13'),
(22, 'book', 2, 1, 'abc', '../public/uploads/download (2).jpg', NULL, '2020-02-17 09:49:44', '2020-02-17 09:49:44');

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
(2, 'Home', 'Home', 1, 'this is home page', '2020-02-17 07:38:09', '2020-02-17 07:38:09'),
(3, 'About as', 'About', 1, 'this is about as page', '2020-02-17 08:13:31', '2020-02-17 08:13:31');

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
(24, 'aaa', 'aaa', 'mb', '', 0, '', '', '0', 0, '2020-02-17 04:11:18', '2020-02-17 04:11:18'),
(25, 'ccc', 'aaa', 'bbb', '', 1, '1', 'ccc', '111', 111, '2020-02-17 04:18:42', '2020-02-17 04:18:42'),
(26, 'ccc', 'aaa', 'bbb', '', 1, '1', 'ccc', '111', 111, '2020-02-17 04:19:11', '2020-02-17 04:19:11'),
(27, 'mobile', 'bbb', 'mb', '', 1, 'aaa', '', '0', 0, '2020-02-17 04:19:37', '2020-02-17 04:19:37'),
(29, '', '', '', '', 0, '', '', '0', 0, '2020-02-17 06:07:35', '2020-02-17 06:07:35');

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
(4, 24, 15),
(7, 27, 11),
(9, 29, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentcategoryid` (`parentcategoryid`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

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
