-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 03:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `confirmorderlist`
--

CREATE TABLE `confirmorderlist` (
  `coid` int(100) NOT NULL,
  `carrier_id` int(100) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `rec_name` varchar(100) NOT NULL,
  `rec_phn` varchar(100) NOT NULL,
  `pro_pic` varchar(100) NOT NULL,
  `rec_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currieractivedetail`
--

CREATE TABLE `currieractivedetail` (
  `caid` int(11) NOT NULL,
  `start` varchar(111) NOT NULL,
  `ends` varchar(111) NOT NULL,
  `dates` varchar(111) NOT NULL,
  `timesJourney` varchar(111) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currierconfirm`
--

CREATE TABLE `currierconfirm` (
  `seid` int(11) NOT NULL,
  `carrier_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `rec_name` varchar(100) NOT NULL,
  `rec_phn` varchar(100) NOT NULL,
  `rec_pic` varchar(100) NOT NULL,
  `pro_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `nid` varchar(10000) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `nid_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `precustomer`
--

CREATE TABLE `precustomer` (
  `pcid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `nid_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `senderactivity`
--

CREATE TABLE `senderactivity` (
  `sid` int(11) NOT NULL,
  `receiver_name` varchar(1100) NOT NULL,
  `receiver_phone` varchar(1100) NOT NULL,
  `receiver_pic` varchar(100) NOT NULL,
  `product_pic` varchar(100) NOT NULL,
  `carrier_id` int(11) NOT NULL,
  `sender_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `confirmorderlist`
--
ALTER TABLE `confirmorderlist`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `currieractivedetail`
--
ALTER TABLE `currieractivedetail`
  ADD PRIMARY KEY (`caid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `currierconfirm`
--
ALTER TABLE `currierconfirm`
  ADD PRIMARY KEY (`seid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `precustomer`
--
ALTER TABLE `precustomer`
  ADD PRIMARY KEY (`pcid`);

--
-- Indexes for table `senderactivity`
--
ALTER TABLE `senderactivity`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `confirmorderlist`
--
ALTER TABLE `confirmorderlist`
  MODIFY `coid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currieractivedetail`
--
ALTER TABLE `currieractivedetail`
  MODIFY `caid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `currierconfirm`
--
ALTER TABLE `currierconfirm`
  MODIFY `seid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `precustomer`
--
ALTER TABLE `precustomer`
  MODIFY `pcid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `senderactivity`
--
ALTER TABLE `senderactivity`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
