-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2020 at 10:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `InsuranceSQL`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `claimsID` int(11) NOT NULL,
  `disaster` varchar(100) NOT NULL,
  `accNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`claimsID`, `disaster`, `accNumber`) VALUES
(18, 'Accident', '7530293916'),
(19, 'Death', '8051129273');

-- --------------------------------------------------------

--
-- Table structure for table `ulogin`
--

CREATE TABLE `ulogin` (
  `uid` int(11) NOT NULL,
  `upass` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulogin`
--

INSERT INTO `ulogin` (`uid`, `upass`, `email`) VALUES
(33, 'a938dfdfbaa1f25ccbc39e16060f73c44e5ef0dd', 'sdakey1@swarthmore.edu'),
(34, 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'sebastiandakey@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(15) NOT NULL,
  `anum` varchar(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `acctype` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `anum`, `fname`, `lname`, `amount`, `acctype`, `phone`, `email`) VALUES
(3, '7530293916', 'Sebastian', 'Dakey', 12000, 'Comprehensive Insurance', '0572849365', 'sdakey1@swarthmore.edu'),
(4, '8051129273', 'Ama', 'Dako', 10000, 'Third Party Fire and Theft', '4844705113', 'sebastiandakey@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claimsID`),
  ADD KEY `insuranceID` (`accNumber`);

--
-- Indexes for table `ulogin`
--
ALTER TABLE `ulogin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `claimsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ulogin`
--
ALTER TABLE `ulogin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
