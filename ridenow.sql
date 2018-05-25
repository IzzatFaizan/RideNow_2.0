-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 04:13 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridenow`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `platformName` varchar(50) NOT NULL,
  `current` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `pickupStatus` varchar(20) DEFAULT NULL,
  `driverPhone` varchar(10) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dropoffStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `phone`, `platformName`, `current`, `destination`, `price`, `pickupStatus`, `driverPhone`, `time`, `dropoffStatus`) VALUES
(48, '+601756426091', 'MyCar', 'K6 UPM', 'KTM Serdang', 8.00, 'Picked', '1231231231', '2018-05-25 09:43:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carID` int(11) NOT NULL,
  `carType` varchar(50) NOT NULL,
  `platNo` varchar(10) NOT NULL,
  `colour` varchar(10) NOT NULL,
  `year` varchar(5) NOT NULL,
  `carStatus` varchar(20) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carID`, `carType`, `platNo`, `colour`, `year`, `carStatus`) VALUES
(1, 'Myvi', 'NLH 2020', 'blue', '2016', 'Available'),
(2, 'Camry', 'PPP 2222', 'red', '2009', 'Available'),
(3, 'Kancil', 'lll 2020', 'red', '2015', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `commentMsg` varchar(100) NOT NULL,
  `driverName` varchar(50) NOT NULL,
  `driverPhone` varchar(50) NOT NULL,
  `complaintStatus` varchar(20) NOT NULL DEFAULT 'Unresolved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `commentMsg`, `driverName`, `driverPhone`, `complaintStatus`) VALUES
(3, 'gud', 'lololo', '3213213213', 'Unresolved'),
(4, 'yiyiyiyyiyi', 'lololo', '3213213213', 'Unresolved'),
(5, '', 'lololo', '3213213213', 'Resolved'),
(6, 'rewqrgtykkkk', 'lololo', '3213213213', 'Unresolved'),
(7, 'gooood', 'lololo', '3213213213', 'Unresolved'),
(8, 'qwqwq', 'lololo', '3213213213', 'Unresolved'),
(9, 'good', 'lololo', '3213213213', 'Unresolved'),
(10, 'weeww', 'lololo', '3213213213', 'Unresolved'),
(11, 'refnn', 'lololo', '3213213213', 'Unresolved'),
(12, 'refnn', 'lololo', '3213213213', 'Resolved'),
(13, 'nice', 'lololo', '3213213213', 'Resolved');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverID` int(11) NOT NULL,
  `driverName` varchar(50) NOT NULL,
  `driverPhone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `carID` int(11) NOT NULL,
  `driverStatus` varchar(20) DEFAULT 'Idle',
  `carType` varchar(20) NOT NULL,
  `platNo` varchar(10) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverID`, `driverName`, `driverPhone`, `password`, `carID`, `driverStatus`, `carType`, `platNo`, `colour`, `year`) VALUES
(2, 'lololo', '3213213213', '123123', 1, 'Complained', '', '', '', ''),
(13, 'iiioooo', '1231231231', '123123', 0, 'Unavailable', 'Kancil', '123123', 'red', '2009');

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `platformID` int(11) NOT NULL,
  `platformName` varchar(50) NOT NULL,
  `current` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`platformID`, `platformName`, `current`, `destination`, `price`) VALUES
(1, 'Grab', 'K6 UPM', 'KTM Serdang', 9.00),
(2, 'MyCar', 'K6 UPM', 'KTM Serdang', 8.00),
(3, 'BlaBlaCar', 'K6 UPM', 'KTM Serdang', 5.00),
(4, 'Grab', 'K6 UPM', 'IOI', 12.00),
(5, 'MyCar', 'K6 UPM', 'IOI', 10.00),
(6, 'hello', 'KTM Serdang', 'KTM Bandar Tasik Selatan', 0.00),
(7, 'Grab', 'KTM Serdang', 'K6 UPM', 7.00),
(8, 'MyCar', 'KTM Serdang', 'K6 UPM', 10.00),
(9, 'Grab', 'IOI', 'K6 UPM', 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `emergencyPhone` varchar(15) NOT NULL,
  `emergencyName` varchar(50) NOT NULL,
  `paymentMethod` varchar(10) NOT NULL DEFAULT 'cash'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `phone`, `email`, `password`, `emergencyPhone`, `emergencyName`, `paymentMethod`) VALUES
(8, 'lololo', '+60175642609', 'lololo@gmail.com', '123123', '+60175642609', 'lala', 'card'),
(18, 'thtrh', '1234567890', 'leehui_ng@yahoo.com', '123123', '1234567890', 'jyujy', 'cash'),
(21, 'admin', '123456789011', 'leehui_ng@yahoo.com', '123123', '1234567890', 'assaass', 'cash'),
(22, 'admin', '+601756426091', 'leehui_ng@yahoo.com', '123123', '+601756426091', 'Ng Lee Hui', 'cash');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`platformID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `platformID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
