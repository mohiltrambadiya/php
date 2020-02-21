-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 01:07 PM
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
-- Database: `vehical_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `service_registration`
--

CREATE TABLE `service_registration` (
  `serviceid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `vehicalnumber` varchar(100) NOT NULL,
  `licensenumber` varchar(100) NOT NULL,
  `servicedate` varchar(100) NOT NULL,
  `timeslot` varchar(100) NOT NULL,
  `vehicalissue` varchar(100) NOT NULL,
  `servicecenter` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_registration`
--

INSERT INTO `service_registration` (`serviceid`, `userid`, `title`, `vehicalnumber`, `licensenumber`, `servicedate`, `timeslot`, `vehicalissue`, `servicecenter`, `status`, `createdat`) VALUES
(9, 4, 'qqq', '11111', '', '2020-02-02', '9-10', '11', 'center2', 0, '2020-02-21 10:56:47'),
(10, 4, 'qqq', '11111', '', '2020-02-02', '9-10', '11', 'center3', 0, '2020-02-21 11:01:23'),
(11, 5, 'qqq', '11111', '', '2020-02-02', '9-10', '11', 'center2', 0, '2020-02-21 11:18:23'),
(16, 5, 'qqq', '11111', '', '2020-02-10', '10-11', '11', 'center2', 0, '2020-02-21 11:30:00'),
(17, 4, 'qqq', '11111', '', '2020-02-03', '9-10', 'emfme', 'center1', 0, '2020-02-21 11:31:46'),
(18, 4, 'qqq', '11111', '', '2020-02-12', '9-10', '11', 'center2', 0, '2020-02-21 12:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `regpassword` varchar(8) NOT NULL,
  `phoneno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `email`, `regpassword`, `phoneno`) VALUES
(4, 'mohil', 'trambadiya', '123@gmail.com', '123', 1234567891),
(5, 'rohit', 'kotadiya', '1@gmail.com', '1', 2147483647),
(6, 'utsav', 'patel', '2@gmail.com', '1', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `addid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`addid`, `userid`, `street`, `city`, `state`, `country`) VALUES
(1, 4, 'abc', 'rajkot', 'Punjab', 'USA'),
(2, 4, 'abc', 'rajkot', 'Punjab', 'USA'),
(3, 5, 'Guruprasad chowk', 'mumbai', 'Rajasthan', 'India'),
(4, 6, 'Guruprasad chowk', 'rajkot', 'Gujrat', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_registration`
--
ALTER TABLE `service_registration`
  ADD PRIMARY KEY (`serviceid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`addid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_registration`
--
ALTER TABLE `service_registration`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `addid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_registration`
--
ALTER TABLE `service_registration`
  ADD CONSTRAINT `service_registration_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
