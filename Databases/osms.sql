-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 06:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assests`
--

CREATE TABLE `assests` (
  `pid` int(11) NOT NULL,
  `pname` varchar(60) NOT NULL,
  `pdop` date NOT NULL,
  `pava` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assests`
--

INSERT INTO `assests` (`pid`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `psellingcost`) VALUES
(1, 'Mic', '2021-07-10', 2, 3, 200, 300),
(2, 'Keyboard', '2021-07-04', 1, 3, 400, 500);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork`
--

CREATE TABLE `assignwork` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text NOT NULL,
  `request_desc` text NOT NULL,
  `requester_name` varchar(60) NOT NULL,
  `requester_add1` text NOT NULL,
  `requester_add2` text NOT NULL,
  `requester_city` varchar(60) NOT NULL,
  `requester_state` varchar(60) NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `assign_tech` text NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignwork`
--

INSERT INTO `assignwork` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(2, 3, 'Mouse cable is damaged', 'I want keyboard Mouse', 'Anand sharma', 'Address 1', 'Address 2', 'Patna', 'Bihar', 7000411, 'anand@gmail.com', 9087876321, 'Sapna', '2021-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custid` int(11) NOT NULL,
  `custname` varchar(60) NOT NULL,
  `custadd` varchar(60) NOT NULL,
  `cpname` varchar(60) NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `custname`, `custadd`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(1, 'Rohan', 'Kolkata', 'Mic', 1, 300, 300, '2021-07-21'),
(2, 'Sameer Singh', 'Address 1', 'Keyboard', 2, 500, 500, '2021-07-09'),
(3, 'Sameer Singh', 'Address 1', 'Keyboard', 2, 500, 500, '2021-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin`
--

CREATE TABLE `requesterlogin` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requesterlogin`
--

INSERT INTO `requesterlogin` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(3, 'Sameer Singh', 'sameer@gmail.com', 'sameer'),
(4, 'Anand sharma', 'anand@gmail.com', 'anand'),
(5, 'ankit ', 'ankit@gmail.com', 'ankit');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest`
--

CREATE TABLE `submitrequest` (
  `request_id` int(11) NOT NULL,
  `request_info` text NOT NULL,
  `request_desc` text NOT NULL,
  `requester_name` varchar(100) NOT NULL,
  `requester_add1` text NOT NULL,
  `requester_add2` text NOT NULL,
  `requester_city` varchar(60) NOT NULL,
  `requester_state` varchar(60) NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(100) NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submitrequest`
--

INSERT INTO `submitrequest` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(2, 'Mouse cable is damaged', 'I want new Mouse', 'Anand Panday', 'Address 1', 'Address 2', 'Patna', 'Bihar', 7000411, 'anand23@gmail.com', 9087876549, '2021-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `empid` int(11) NOT NULL,
  `empName` varchar(255) NOT NULL,
  `empCity` varchar(255) NOT NULL,
  `empMobile` bigint(20) NOT NULL,
  `empEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`empid`, `empName`, `empCity`, `empMobile`, `empEmail`) VALUES
(2, 'Sapna', 'Haryana', 9087651234, 'sapna@gmail.com'),
(3, 'Sameer Singh', 'Kolkata', 9087651243, 'sammer@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assests`
--
ALTER TABLE `assests`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `assignwork`
--
ALTER TABLE `assignwork`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `requesterlogin`
--
ALTER TABLE `requesterlogin`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest`
--
ALTER TABLE `submitrequest`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assests`
--
ALTER TABLE `assests`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignwork`
--
ALTER TABLE `assignwork`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requesterlogin`
--
ALTER TABLE `requesterlogin`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `submitrequest`
--
ALTER TABLE `submitrequest`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
