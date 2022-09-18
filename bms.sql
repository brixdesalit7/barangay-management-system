-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 04:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'bryxx', 'test', 'test', 'Admin'),
(2, 'andre', 'test1', 'test1', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusiness_permit`
--

CREATE TABLE `tblbusiness_permit` (
  `id` int(11) NOT NULL,
  `DateIssued` datetime NOT NULL DEFAULT current_timestamp(),
  `OwnerName` varchar(250) NOT NULL,
  `BusinessName` text NOT NULL,
  `BusinessType` text NOT NULL,
  `TIN` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbusiness_permit`
--

INSERT INTO `tblbusiness_permit` (`id`, `DateIssued`, `OwnerName`, `BusinessName`, `BusinessType`, `TIN`) VALUES
(4, '2021-11-29 00:00:00', 'Bryxx Desalit', 'TEST', 'TESTTEST', 2147483647),
(5, '2021-12-28 19:56:48', 'test', 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblclearance`
--

CREATE TABLE `tblclearance` (
  `id` int(11) NOT NULL,
  `DateIssued` datetime NOT NULL DEFAULT current_timestamp(),
  `Name` varchar(250) NOT NULL,
  `Age` int(11) NOT NULL,
  `ContactNumber` int(111) NOT NULL,
  `receipt` varchar(250) NOT NULL,
  `Purpose` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclearance`
--

INSERT INTO `tblclearance` (`id`, `DateIssued`, `Name`, `Age`, `ContactNumber`, `receipt`, `Purpose`) VALUES
(3, '2021-11-29 00:00:00', 'test', 99, 2147483647, '09090', 'Work'),
(5, '2022-01-04 12:51:35', 'TEST', 21, 2147483647, '6767', 'test'),
(6, '2022-01-05 11:04:17', 'Desalit,Bryxx Andre M.', 21, 2147483647, '12121', 'w'),
(7, '2022-01-05 11:07:26', 'TEST', 21, 2147483647, '0121212', 'test'),
(8, '2022-01-05 11:07:38', 'TEST', 21, 2147483647, '99', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `id` int(11) NOT NULL,
  `DateIssued` datetime NOT NULL,
  `Complainant` varchar(250) NOT NULL,
  `Apellant` varchar(250) NOT NULL,
  `Complaint` varchar(250) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`id`, `DateIssued`, `Complainant`, `Apellant`, `Complaint`, `Status`) VALUES
(2, '2021-11-27 10:12:17', 'Bryxx Desalit', 'TEST', 'TEST', 'Not Settled'),
(3, '2021-11-27 12:23:56', 'TEST', 'TEST', 'TEST', 'Settled');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficial`
--

CREATE TABLE `tblofficial` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Contactnumber` bigint(20) NOT NULL,
  `StartofTerm` date NOT NULL,
  `EndofTerm` date NOT NULL,
  `Position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblofficial`
--

INSERT INTO `tblofficial` (`id`, `Name`, `Address`, `Contactnumber`, `StartofTerm`, `EndofTerm`, `Position`) VALUES
(11, 'Bryxx Desalit', 'test', 9562309512, '2021-12-11', '2021-12-07', 'Chairman');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficial_position`
--

CREATE TABLE `tblofficial_position` (
  `id` int(11) NOT NULL,
  `position` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblofficial_position`
--

INSERT INTO `tblofficial_position` (`id`, `position`) VALUES
(1, 'Kagawad'),
(2, 'Chairman');

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNumber` bigint(20) NOT NULL,
  `Gender` text NOT NULL,
  `Status` text NOT NULL,
  `Birthday` date NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`id`, `Name`, `Address`, `ContactNumber`, `Gender`, `Status`, `Birthday`, `Email`) VALUES
(2, 'Bryxx Madrideo', 'Duhat Street', 9562309512, 'Male', 'Married', '2021-11-27', 'brixdesalit7@gmail.com'),
(3, 'TEST', 'TEST', 0, 'Female', 'Married', '2021-11-01', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblzoneleader`
--

CREATE TABLE `tblzoneleader` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `ZoneLeader` int(11) NOT NULL,
  `ContactNumber` bigint(20) NOT NULL,
  `Gender` text NOT NULL,
  `Status` text NOT NULL,
  `Birthday` date NOT NULL,
  `EmailAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblzoneleader`
--

INSERT INTO `tblzoneleader` (`id`, `Name`, `ZoneLeader`, `ContactNumber`, `Gender`, `Status`, `Birthday`, `EmailAddress`) VALUES
(3, 'test', 5, 9562309512, 'Prefer not to say', 'Prefer not to say', '2022-02-02', 'brixdesalit7@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblzone_list`
--

CREATE TABLE `tblzone_list` (
  `id` int(11) NOT NULL,
  `zone_list` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblzone_list`
--

INSERT INTO `tblzone_list` (`id`, `zone_list`) VALUES
(1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id` int(11) NOT NULL,
  `barangayname` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` int(20) NOT NULL,
  `images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `barangayname`, `city`, `zipcode`, `images`) VALUES
(1, 'Brgy Central Bicutan', 'Taguig', 12121, 'all_images/3568f670fb7bfd4b58351c61e8d3f18aBarangay.svg.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbusiness_permit`
--
ALTER TABLE `tblbusiness_permit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclearance`
--
ALTER TABLE `tblclearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficial`
--
ALTER TABLE `tblofficial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficial_position`
--
ALTER TABLE `tblofficial_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblzoneleader`
--
ALTER TABLE `tblzoneleader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblzone_list`
--
ALTER TABLE `tblzone_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbusiness_permit`
--
ALTER TABLE `tblbusiness_permit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblclearance`
--
ALTER TABLE `tblclearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblofficial`
--
ALTER TABLE `tblofficial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblofficial_position`
--
ALTER TABLE `tblofficial_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblzoneleader`
--
ALTER TABLE `tblzoneleader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblzone_list`
--
ALTER TABLE `tblzone_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
