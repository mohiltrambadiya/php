-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 01:12 PM
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
-- Database: `blog_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `parentcategory` varchar(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `metatitle` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `parentcategory`, `title`, `metatitle`, `url`, `content`, `createdat`, `updatedat`) VALUES
(4, 'Mobile', 'ddfghjkdfghjklfgvhbjn', 'trewq', 'ytrew', 'ytre', '2020-02-03 10:27:25', '2020-02-03 10:27:25'),
(5, 'Cricket', '', '', '', '', '2020-02-03 10:28:19', '2020-02-03 10:28:19'),
(6, 'Life', '', '', '', '', '2020-02-03 10:28:25', '2020-02-03 10:28:25'),
(7, 'Life', 'dfghj', 'trewq', 'ytrew', 'ytre', '2020-02-03 10:57:41', '2020-02-03 10:57:41'),
(8, 'Life', 'ndhwhdew', 'ewkfwle', 'ew;kdfwk', 'wedwl', '2020-02-03 12:06:02', '2020-02-03 12:06:02'),
(9, 'Mobile', 'gbnmlkjhgfgh', '<br /><b>Notice</b>:  Undefined index: updateid in <b>C:xampphtdocscybercomphpEvalulation2dataOperat', '<br /><b>Notice</b>:  Undefined index: updateid in <b>C:xampphtdocscybercomphpEvalulation2dataOperat', '<br /><b>Notice</b>:  Undefined index: updateid in <b>C:xampphtdocscybercomphpEvalulation2dataOperation.php</b> on line <b>85</b><br />', '2020-02-03 12:06:27', '2020-02-03 12:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `url` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `publishat` date NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `prefix` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `regpassword` varchar(10) NOT NULL,
  `lastlogin` timestamp NULL DEFAULT NULL,
  `information` varchar(100) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `prefix`, `firstname`, `lastname`, `mobile`, `email`, `regpassword`, `lastlogin`, `information`, `createdat`, `updatedat`) VALUES
(1, 'Dr', 'mohil', 'patel', 6546454, '123@gmail.com', '123', NULL, 'dfghjkl;', '2020-02-03 09:30:12', NULL),
(2, 'Dr', 'mohil', 'patel', 6546454, '123@gmail.com', '123', NULL, 'dfghjkl;', '2020-02-03 09:35:11', NULL),
(3, 'Mr', 'mohil', 'patel', 2147483647, '123@gmail.com', '123', NULL, 'zxcvbnm,.', '2020-02-03 09:35:49', NULL),
(6, 'Dr', 'nghj', 'ghj', 0, '1', '', NULL, '', '2020-02-03 11:06:46', NULL),
(7, 'Dr', 'fghjkl', 'ghjk', 2147483647, '123@gmail.com', '123', NULL, 'fghjkl;', '2020-02-03 11:07:15', NULL),
(8, 'Mr', '', '', 0, '', '', NULL, '', '2020-02-03 11:41:52', NULL),
(9, 'Mr', '', '', 0, '', '', NULL, '', '2020-02-03 11:42:36', NULL),
(10, 'Mr', '', '', 0, '', '', NULL, '', '2020-02-03 11:42:57', NULL),
(11, 'Mr', '', '', 0, '', '', NULL, '', '2020-02-03 11:48:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
