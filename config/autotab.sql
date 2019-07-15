-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 10:40 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autotab`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(11) NOT NULL,
  `client` varchar(35) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `client`, `password`) VALUES
(1, 'station1', 'apple'),
(2, 'station2', ''),
(3, 'station2', 'asdasd'),
(4, 'station3', 'mango');

-- --------------------------------------------------------

--
-- Table structure for table `linklist`
--

CREATE TABLE `linklist` (
  `linkid` int(11) NOT NULL,
  `link` varchar(512) NOT NULL,
  `duration` int(10) NOT NULL,
  `clientid` varchar(35) NOT NULL,
  `expdate` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linklist`
--

INSERT INTO `linklist` (`linkid`, `link`, `duration`, `clientid`, `expdate`, `status`) VALUES
(1, 'http://cyberboy.in', 30000, '1', NULL, 1),
(2, 'https://closedstack.cerner.com', 45000, '1', NULL, 0),
(3, 'https://cernipamvip.cerner.com/app', 6000, '1', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `linklist`
--
ALTER TABLE `linklist`
  ADD PRIMARY KEY (`linkid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `linklist`
--
ALTER TABLE `linklist`
  MODIFY `linkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
