-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 01:29 PM
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
(31, 'education', 'education', 1, 'abc', '../public/uploads/download (3).jpg', NULL, '2020-02-17 11:19:26', '2020-02-17 11:19:26'),
(32, 'MBA', 'MBA', 1, 'abc', '../public/uploads/download (2).jpg', 31, '2020-02-17 11:19:48', '2020-02-17 11:19:48'),
(33, 'CA', 'CA', 1, 'abc', '../public/uploads/download (1).jpg', 31, '2020-02-17 11:20:16', '2020-02-17 11:20:16'),
(34, 'electronic', 'electronic', 1, 'abc', '../public/uploads/download (3).jpg', NULL, '2020-02-17 11:20:43', '2020-02-17 11:20:43'),
(35, 'samsung', 'samsung', 1, 'abc', '../public/uploads/download (2).jpg', 34, '2020-02-17 11:21:11', '2020-02-17 11:21:11'),
(36, 'poco', 'poco', 1, 'abc', '../public/uploads/download (2).jpg', 34, '2020-02-17 11:21:49', '2020-02-17 11:21:49');

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
(30, 'aa', 'aa', 'mba', '../public/uploads/download (3).jpg', 1, 'aaa', 'aaa', '111', 111, '2020-02-17 11:22:49', '2020-02-17 11:22:49'),
(31, 'aaa', 'aaa', 'bbb', '../public/uploads/download (3).jpg', 1, 'aaa', 'aaa', '111', 111, '2020-02-17 11:23:27', '2020-02-17 11:23:27'),
(32, 'aa', 'ccccc', 'ccc', '../public/uploads/download (2).jpg', 1, 'aaa', 'aaa', '111', 111, '2020-02-17 11:24:08', '2020-02-17 11:24:08');

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
(10, 30, 32),
(11, 31, 36),
(12, 32, 35);

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
