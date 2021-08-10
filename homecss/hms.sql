-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 09:30 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '123456', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `consultancyFees` int(11) NOT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` int(11) NOT NULL,
  `doctorStatus` int(11) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 'Dentist', 1, 1, 500, '2019-04-03', '5:00 PM', '2019-04-03 11:08:52', 1, 1, ''),
(4, 'Medicine', 3, 2, 500, '2020-07-27', '10:00 PM', '2020-07-28 15:53:31', 1, 1, ''),
(5, 'Neurologist', 5, 2, 1000, '2020-07-28', '10:00 PM', '2020-07-28 15:53:58', 1, 1, ''),
(6, 'Gynecologist', 4, 2, 500, '2020-07-29', '10:00 PM', '2020-07-28 15:54:13', 1, 1, ''),
(7, 'Medicine', 3, 6, 500, '2020-07-29', '10:45 PM', '2020-07-29 07:35:59', 0, 1, ''),
(8, 'Surgery', 6, 6, 1200, '2020-07-30', '8:30 PM', '2020-07-29 14:26:45', 0, 1, ''),
(31, 'sergery', 7, 29, 500, '2020-09-12', '4:00 AM', '2020-09-15 21:51:22', 1, 1, ''),
(32, 'Gynecologist', 4, 42, 500, '2020-10-22', '5:45 PM', '2020-10-25 23:26:35', 1, 1, ''),
(33, 'Surgery', 6, 35, 1200, '29-10-2020', '4:30 AM', '2020-10-28 22:19:09', 0, 1, ''),
(34, 'Surgery', 6, 35, 1200, '30-10-2020', '4:30 AM', '2020-10-28 22:26:13', 0, 1, ''),
(35, 'Surgery', 6, 35, 1200, '29-10-2020', '4:30 AM', '2020-10-28 22:27:21', 0, 1, ''),
(36, 'Surgery', 6, 35, 1200, '30-10-2020', '4:30 AM', '2020-10-28 22:27:44', 0, 1, ''),
(37, 'Neurologist', 5, 35, 1000, '30-10-2020', '7:00 AM', '2020-10-29 00:49:17', 1, 1, ''),
(38, 'dentist', 1, 35, 500, '29-10-2020', '7:00 AM', '2020-10-29 00:53:01', 1, 1, ''),
(39, 'Gynecologist', 4, 35, 500, '29-10-2020', '11:00 PM', '2020-10-29 16:48:35', 1, 1, ''),
(40, 'Gynecologist', 4, 35, 500, '31-10-2020', '11:00 PM', '2020-10-29 16:50:27', 1, 1, ''),
(41, 'Surgery', 6, 44, 1200, '26-11-2020', '1:00 AM', '2020-11-02 18:48:04', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `number` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`number`, `name`, `email`, `mobile`, `subject`, `time`) VALUES
(1, '', 'wdvqgwv@hdh', '', ' wdhwghd', '2020-11-22 16:17:14'),
(2, 'dvevd', 'bvcha@nvbn', '65672452', ' dvhegfhd', '2020-11-22 16:18:21'),
(3, 'sdvgwfgd', 'whdghwd@bh', '24634314', ' dghegdyhfegI am runa', '2020-11-22 16:21:58'),
(4, 'bvb', 'gfg@bvbv', '', ' ggyty', '2020-11-22 16:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `hospital_name` varchar(300) NOT NULL,
  `address` longtext NOT NULL,
  `docFees` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `docEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorname`, `hospital_name`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'dentist', 'sangbid', '', 'dhaka', '500', 1622160714, 'abc@gmail.com', '078563f337ec6d6fedf131ddc857db19', '2019-03-05 14:49:29', '14-09-2020 01:45:11 PM'),
(2, 'Therapist', 'Sangbid zaman', '', 'bhughar', '500', 112423542, 'dsf@gmail.com', '123467', '2019-03-13 07:05:53', '123467'),
(3, 'Medicine', 'Sangbid Zaman', '', 'Delpara,Kutubpur,Fatulla,Naraynganj', '500', 1783729544, 'sangbid12@gmail.com', '123456', '2020-07-28 12:05:03', ''),
(4, 'Gynecologist', 'Nazia Runa', '', 'mirpur', '500', 1234567, 'runa12@gmail.com', '1234567', '2020-07-28 12:06:19', ''),
(5, 'Neurologist', 'Shadesh Saha', '', 'signboard', '1000', 18373492, 'shadesh@gmail.com', '123456', '2020-07-28 12:07:25', ''),
(6, 'Surgery', 'Nazia', 'mirpur dental hospital', 'mirpur', '1200', 1001341414, 'nazia@gmail.com', '123456', '2020-07-29 07:48:35', ''),
(7, 'sergery', 'Nazia', 'kollanpur dental', 'kollanpur', '500', 18373492, 'nazia12@gmail.com', '123456', '2020-09-10 14:45:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(4, 1, 'abc@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-13 06:20:44', '', 1),
(5, 1, 'abc@gmail.com', 0x3a3a3100000000000000000000000000, '2019-03-30 14:30:14', '', 1),
(26, 2, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 08:14:38', '', 1),
(27, 2, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 08:18:18', '', 1),
(28, 2, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 08:35:15', '28-07-2020 02:07:27 PM', 1),
(29, 2, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 08:49:33', '28-07-2020 02:24:24 PM', 1),
(30, 0, 'abx@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 10:06:58', '', 0),
(31, 0, 'admin', 0x3a3a3100000000000000000000000000, '2020-07-28 10:07:00', '', 0),
(32, 0, 'admin', 0x3a3a3100000000000000000000000000, '2020-07-28 13:19:54', '', 0),
(33, 0, 'sangbid12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 15:47:17', '', 0),
(34, 3, 'sangbid12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 15:50:28', '28-07-2020 09:22:07 PM', 1),
(35, 3, 'sangbid12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 15:55:14', '28-07-2020 09:26:31 PM', 1),
(36, 3, 'sangbid12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 19:36:45', '', 1),
(37, 0, 'dfs@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-29 07:39:30', '', 0),
(38, 0, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-29 07:39:45', '', 0),
(39, 2, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-29 07:40:47', '', 1),
(40, 4, 'runa12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-29 07:41:35', '', 1),
(41, 0, 'Shadesh Saha', 0x3a3a3100000000000000000000000000, '2020-09-05 18:25:13', '', 0),
(42, 5, 'shadesh@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-05 18:26:54', '', 1),
(43, 0, 'Sangbid Zaman', 0x3a3a3100000000000000000000000000, '2020-09-09 20:29:45', '', 0),
(44, 3, 'sangbid12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-09 20:30:21', '', 1),
(45, 6, 'nazia@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-10 15:43:33', '10-09-2020 09:13:45 PM', 1),
(46, 6, 'nazia@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-10 15:44:27', '', 1),
(47, 1, 'abc@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-14 08:06:03', '14-09-2020 01:46:49 PM', 1),
(48, 7, 'nazia12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-07 22:50:19', '08-10-2020 04:21:58 AM', 1),
(49, 0, 'Nazia', 0x3a3a3100000000000000000000000000, '2020-11-21 04:07:20', '', 0),
(50, 7, 'nazia12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-21 04:07:39', '21-11-2020 09:43:22 AM', 1),
(51, 0, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 14:29:12', '', 0),
(52, 0, 'Nazia Runa', 0x3a3a3100000000000000000000000000, '2020-11-26 14:29:55', '', 0),
(53, 2, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 14:30:23', '27-11-2020 01:46:37 PM', 1),
(54, 2, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 10:01:04', '29-11-2020 11:12:03 PM', 1),
(55, 2, 'dsf@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-29 18:00:00', '29-11-2020 11:33:57 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(11, 'Medicine', '2020-07-28 09:41:11', ''),
(12, 'Neurologist', '2020-07-28 09:41:24', ''),
(14, 'Gynecologist', '2020-07-28 12:03:25', ''),
(15, 'Surgery', '2020-07-28 12:03:45', ''),
(16, 'cardiologist', '2020-07-29 07:49:30', ''),
(17, 'cardiologist', '2020-09-05 18:22:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `id`, `date`) VALUES
(1, 2, '2019-04-05'),
(2, 1, '2019-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `facilty` varchar(300) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `invoiceID`, `facilty`, `fee`) VALUES
(1, 2, 'Food fee', 500),
(3, 1, 'Operation fee', 25000),
(13, 1, 'Medicine fee', 400);

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `name`, `email`, `password`, `contact`, `gender`, `regdate`, `updationDate`) VALUES
(1, 'sangbid', 'san@gmail.com', '123456', 0, '', '2019-04-04 23:54:34', '0000-00-00'),
(2, 'Runa', 'runa@gmail.com', '123456', 1020602410, 'female', '2020-07-29 08:09:52', '0000-00-00'),
(3, 'shadesh', 'shadesh@gmail.com', '123456', 175266246, 'male', '2020-07-29 09:18:12', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `llog`
--

CREATE TABLE `llog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userip` int(50) NOT NULL,
  `logintime` date NOT NULL,
  `logout` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `llog`
--

INSERT INTO `llog` (`id`, `uid`, `username`, `userip`, `logintime`, `logout`, `status`) VALUES
(1, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(2, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(3, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(4, 0, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 0),
(5, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(6, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(7, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(8, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(9, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(10, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(11, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(12, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(13, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(14, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(15, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(16, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(17, 0, '', 0, '0000-00-00', '0000-00-00', 0),
(18, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(19, 1, 'san@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(20, 2, 'runa@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(21, 2, 'runa@gmail.com', 0, '0000-00-00', '0000-00-00', 1),
(22, 3, 'shadesh@gmail.com', 0, '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `CompanyName` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `p_id` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `CompanyName`, `status`, `description`, `p_id`) VALUES
(20, 'rupadin 10', 'tablet', 100, '', 2),
(26, 'insulin', 'liquid', 4200, '', 1),
(90, 'napa extra', 'tablet', 503, '', 1),
(91, 'napa extra', '123rdf', 12, '', 1),
(100, 'rupadin', 'square', 100, 'shordi kashi', 1),
(102, 'insulin', 'square', 130, 'liquid. which is used for diabetics', 1),
(106, 'napa extra', 'hedu', 105, '', 1),
(107, 'napa extra', 'square', 124, '', 1),
(108, 'insulin', 'gswfsg', 1888, 'nxbh', 1),
(109, 'insulin', 'square', 123, '', 1),
(110, 'insulin', 'square', 123, '', 1),
(111, 'insulin', 'square', 123, '', 1),
(112, 'filmate', 'hedu', 545645, '', 1),
(113, 'filmate', 'hedu', 545645, '', 1),
(114, 'fscfq', 'bsvxgs', 53452, '', 1),
(115, 'dilruba nusrat', 'apu', 123, '', 27),
(116, 'rupin', 'square', 10, '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `Issue` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `cost` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `p_id`, `Issue`, `date`, `cost`, `d_id`) VALUES
(3, 2, 'Heart Surgery', '2019-04-05', 50000, 2),
(4, 2, 'Heart Surgery', '2019-04-05', 50000, 2),
(5, 2, 'Heart Surgery', '2019-04-05', 50000, 2),
(6, 1, 'Breast Surgery', '2019-04-05', 25000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patientcode`
--

CREATE TABLE `patientcode` (
  `id` int(255) NOT NULL,
  `pat_uid` varchar(255) NOT NULL,
  `ph_id` varchar(255) NOT NULL,
  `ph_email` varchar(255) NOT NULL,
  `ucode` varchar(11) NOT NULL,
  `value` int(10) NOT NULL DEFAULT '0',
  `accessdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientcode`
--

INSERT INTO `patientcode` (`id`, `pat_uid`, `ph_id`, `ph_email`, `ucode`, `value`, `accessdate`) VALUES
(1, 'PID_35', '1', 'shadesh12@gmail.com', ' ', 0, '2020-10-30 15:29:11'),
(7, 'a_3415', '', '', ' ', 0, '2020-11-01 18:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `method` varchar(300) NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(300) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `id`, `method`, `amount`, `status`, `DATE`) VALUES
(1, 2, 'cash', 0, 'paid', '2019-04-05 03:43:25'),
(2, 2, 'cash', 125500, 'paid', '2019-04-05 03:43:25'),
(5, 2, 'cash', 125500, 'paid', '2019-04-05 03:57:06'),
(6, 1, 'cash', 27000, 'paid', '2019-04-05 03:57:25'),
(7, 2, 'cash', 125500, 'paid', '2019-04-05 03:58:05'),
(8, 2, 'cash', 125500, 'paid', '2019-04-05 03:58:45'),
(9, 2, 'cash', 125500, 'paid', '2019-04-05 04:00:37'),
(10, 2, 'cash', 125500, 'paid', '2019-04-05 04:01:05'),
(11, 2, 'cash', 125500, 'paid', '2019-04-05 04:07:47'),
(12, 2, 'cash', 125500, 'paid', '2019-04-05 04:10:01'),
(13, 2, 'cash', 125500, 'paid', '2019-04-05 04:11:07'),
(14, 2, 'cash', 125500, 'paid', '2019-04-05 04:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `licence_number` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `token` varchar(150) NOT NULL,
  `status` varchar(80) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `name`, `licence_number`, `email`, `contact`, `address`, `shop_address`, `shop_name`, `gender`, `password`, `token`, `status`, `regdate`, `updationDate`) VALUES
(1, 'shadesh saha', 'shadesh123456', 'shadesh12@gmail.com', '01523408765', 'signboard dhaka', 'signboard', '', 'male', '123456', '', '', '2019-04-04 17:32:31', '0000-00-00'),
(2, 'nazia', '', 'nazia@gmail.com', '615514140', 'Dhaka', '', '', 'female', '1234567', '', '', '2020-07-29 07:53:29', '0000-00-00'),
(4, 'nazia nuzhat', '1234', 'nazia15-8973@diu.edu.bd', '01705829945', 'mirpur, dhaka', '', '', 'female', '1234567', '', '', '2020-09-06 11:05:46', '0000-00-00'),
(5, 'nazia', '123asv', 'nazia@gmail.com', '01705829945', 'dhaka', '', '', 'female', '1234567', '', '', '2020-09-12 18:28:45', '0000-00-00'),
(8, 'sss', 'sss', 'nazia15-8973@diu.edu.bd', '01705829945', 'sss', '', '', 'female', '1234567', '', '', '2020-10-19 11:34:59', '0000-00-00'),
(9, 'runa', '1234r52', 'nazia.nuzhat@gmail.com', '01705829945', 'mirpur', '', '', 'female', '123456', '48a15f95fcb15454458c05c929694d', 'active', '2020-10-21 18:21:28', '0000-00-00'),
(11, 'nazia nuzhat', '1234r52', 'nazia.nuzhat25@gmail.com', '01705829945', 'mirpur', '', '', 'female', '123456', '0061ce8fcae842a1807ed9811435ad', 'active', '2020-10-21 19:02:01', '0000-00-00'),
(13, 'f', '1234r52', 'nazia.nuzhat26@gmail.com', '5443234', 'dhaka', '', '', 'female', '123456', '0f6bbb714b012f1bb76723e961fe92', 'active', '2020-10-21 19:45:58', '0000-00-00'),
(14, ' hgh', 'rdydytf', 'fgfy@gd.tt', '364364', 'mirpur', '', '', 'male', '123456', '78bf6135d818d6a0dfb64674a6b734', 'active', '2020-10-21 19:50:44', '0000-00-00'),
(15, ' hgh', 'rdydytf', 'fgfy@gd.tth', '364364', 'mirpur', '', '', 'male', '123456', 'b82ceb64203af98b0cb68ef2abd0e6', 'active', '2020-10-21 19:51:44', '0000-00-00'),
(18, 'a', '1234r52', 'sfdga@vcdvc.chgh', '01876276721', 'wwds', '', '', 'male', '123456', '4d5f4caed796b6cd2e5ffc7c72f2b1', 'inactive', '2020-10-21 20:01:47', '0000-00-00'),
(19, 'f', '1234r52', 'nazia.nuzhat27@gmail.com', '567878', 'mirpur', '', '', 'male', '123456', '02594b6891d52a003c84867c37474b', 'inactive', '2020-10-21 22:44:13', '0000-00-00'),
(20, 'f', '1234r52', 'nazia.nuzhat27@gmail.com', '567878', 'mirpur', '', '', 'male', '123456', 'b19621155788bd66c1edd35145eba9', 'inactive', '2020-10-21 22:44:41', '0000-00-00'),
(21, 'nazia nuzhat', '1234r52', 'nazia.nuzhat28@gmail.com', '55', 'mirpur', '', '', 'male', '12345678', '4ba9fe5d57cca990d1821cd0e5cbe2', 'inactive', '2020-10-21 22:55:47', '0000-00-00'),
(22, 'nazia nuzhat', '1234r52', 'nazia.nuzhat28@gmail.com', '55', 'mirpur', '', '', 'male', '123456', '1885c78b567ae416b24d2c70b4ea21', 'inactive', '2020-10-21 22:59:20', '0000-00-00'),
(23, 'nazia nuzhat', '1234r52', 'nazia.nuzhat29@gmail.com', '55', 'mirpur', '', '', 'male', '123456', '0dfb349ccabdf62447f3df362c42b8', 'inactive', '2020-10-21 23:08:05', '0000-00-00'),
(27, 'Nazia Nuzhat', 'hgwhef1fe', 'nazia.nuzhat24@gmail.com', '01705829945', 'mirpur', 'mirpur', 'apu', 'female', '123456', 'd0ac16d508b96bc25e6254f75e1984', 'active', '2020-10-22 19:19:05', '0000-00-00'),
(28, 'nazia', '1234r52', 'shadesh15-8599@diu.edu.bd', '322121', 'mirpur', 'hdr', '', 'female', '123456', '0eb49de5650909fc93eeefc2063120', 'active', '2020-11-30 19:24:51', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `plog`
--

CREATE TABLE `plog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `userip` int(50) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plog`
--

INSERT INTO `plog` (`id`, `uid`, `username`, `userip`, `logintime`, `logout`, `status`) VALUES
(1, 1, 'rahatsaqib78@gmail.com', 0, '2019-04-04 17:37:28', '2019-04-04 17:37:28', '1'),
(2, 0, 'rahat', 0, '2020-07-28 11:27:01', '0000-00-00 00:00:00', '0'),
(3, 1, 'rahatsaqib78@gmail.com', 0, '2020-07-28 11:27:25', '0000-00-00 00:00:00', '1'),
(4, 1, 'rahatsaqib78@gmail.com', 0, '2020-07-28 15:35:45', '0000-00-00 00:00:00', '1'),
(5, 1, 'shadesh12@gmail.com', 0, '2020-07-28 20:27:49', '2020-07-28 20:27:49', '1'),
(6, 1, 'shadesh12@gmail.com', 0, '2020-07-28 20:28:41', '2020-07-28 20:28:41', '1'),
(7, 1, 'shadesh12@gmail.com', 0, '2020-07-28 20:33:02', '2020-07-28 20:33:02', '1'),
(8, 1, 'shadesh12@gmail.com', 0, '2020-07-28 20:43:58', '2020-07-28 20:43:58', '1'),
(9, 2, 'nazia@gmail.com', 0, '2020-07-29 07:56:08', '2020-07-29 07:56:08', '1'),
(10, 2, 'nazia@gmail.com', 0, '2020-07-29 14:27:47', '2020-07-29 14:27:47', '1'),
(11, 2, 'nazia@gmail.com', 0, '2020-09-05 18:28:51', '2020-09-05 18:28:51', '1'),
(12, 2, 'nazia@gmail.com', 0, '2020-09-05 19:52:35', '2020-09-05 19:52:35', '1'),
(13, 3, 'nazia15-8973@diu.edu.bd', 0, '2020-09-06 11:23:00', '2020-09-06 11:23:00', '1'),
(14, 1, 'shadesh12@gmail.com', 0, '2020-09-06 11:41:22', '2020-09-06 11:41:22', '1'),
(15, 1, 'shadesh12@gmail.com', 0, '2020-09-06 11:43:22', '2020-09-06 11:43:22', '1'),
(16, 3, 'nazia15-8973@diu.edu.bd', 0, '2020-09-06 11:44:27', '2020-09-06 11:44:27', '1'),
(17, 4, 'nazia15-8973@diu.edu.bd', 0, '2020-09-06 11:45:17', '2020-09-06 11:45:17', '1'),
(18, 1, 'shadesh12@gmail.com', 0, '2020-09-06 11:51:09', '2020-09-06 11:51:09', '1'),
(19, 1, 'shadesh12@gmail.com', 0, '2020-09-06 19:30:46', '2020-09-06 19:30:46', '1'),
(20, 1, 'shadesh12@gmail.com', 0, '2020-09-07 08:31:52', '2020-09-07 08:31:52', '1'),
(21, 1, 'shadesh12@gmail.com', 0, '2020-09-07 09:25:27', '0000-00-00 00:00:00', '1'),
(22, 1, 'shadesh12@gmail.com', 0, '2020-09-07 11:16:45', '0000-00-00 00:00:00', '1'),
(23, 1, 'shadesh12@gmail.com', 0, '2020-09-07 11:17:05', '0000-00-00 00:00:00', '1'),
(24, 1, 'shadesh12@gmail.com', 0, '2020-09-07 11:39:29', '0000-00-00 00:00:00', '1'),
(25, 1, 'shadesh12@gmail.com', 0, '2020-09-07 11:43:55', '0000-00-00 00:00:00', '1'),
(26, 1, 'shadesh12@gmail.com', 0, '2020-09-07 11:45:41', '0000-00-00 00:00:00', '1'),
(27, 1, 'shadesh12@gmail.com', 0, '2020-09-07 11:50:48', '0000-00-00 00:00:00', '1'),
(28, 1, 'shadesh12@gmail.com', 0, '2020-09-07 11:52:54', '0000-00-00 00:00:00', '1'),
(29, 1, 'shadesh12@gmail.com', 0, '2020-09-07 12:01:30', '0000-00-00 00:00:00', '1'),
(30, 1, 'shadesh12@gmail.com', 0, '2020-09-07 12:24:15', '0000-00-00 00:00:00', '1'),
(31, 1, 'shadesh12@gmail.com', 0, '2020-09-07 15:03:07', '2020-09-07 15:03:07', '1'),
(32, 1, 'shadesh12@gmail.com', 0, '2020-09-07 15:48:34', '2020-09-07 15:48:34', '1'),
(33, 1, 'shadesh12@gmail.com', 0, '2020-09-07 15:55:05', '2020-09-07 15:55:05', '1'),
(34, 1, 'shadesh12@gmail.com', 0, '2020-09-07 15:57:43', '0000-00-00 00:00:00', '1'),
(35, 2, 'nazia@gmail.com', 0, '2020-09-08 18:32:17', '2020-09-08 18:32:17', '1'),
(36, 2, 'nazia@gmail.com', 0, '2020-09-08 18:35:16', '0000-00-00 00:00:00', '1'),
(37, 1, 'shadesh12@gmail.com', 0, '2020-09-08 18:36:15', '2020-09-08 18:36:15', '1'),
(38, 1, 'shadesh12@gmail.com', 0, '2020-09-08 19:01:11', '0000-00-00 00:00:00', '1'),
(39, 1, 'shadesh12@gmail.com', 0, '2020-09-09 09:14:01', '2020-09-09 09:14:01', '1'),
(40, 1, 'shadesh12@gmail.com', 0, '2020-09-09 09:36:03', '0000-00-00 00:00:00', '1'),
(41, 1, 'shadesh12@gmail.com', 0, '2020-09-09 13:46:51', '0000-00-00 00:00:00', '1'),
(42, 1, 'shadesh12@gmail.com', 0, '2020-09-09 18:48:25', '2020-09-09 18:48:25', '1'),
(43, 1, 'shadesh12@gmail.com', 0, '2020-09-12 18:04:29', '0000-00-00 00:00:00', '1'),
(44, 1, 'shadesh12@gmail.com', 0, '2020-09-13 20:56:20', '0000-00-00 00:00:00', '1'),
(45, 1, 'shadesh12@gmail.com', 0, '2020-09-16 09:34:27', '2020-09-16 09:34:27', '1'),
(46, 1, 'shadesh12@gmail.com', 0, '2020-09-26 19:11:01', '2020-09-26 19:11:01', '1'),
(47, 1, 'shadesh12@gmail.com', 0, '2020-10-07 15:53:13', '2020-10-07 15:53:13', '1'),
(48, 1, 'shadesh12@gmail.com', 0, '2020-10-07 22:53:20', '2020-10-07 22:53:20', '1'),
(49, 1, 'shadesh12@gmail.com', 0, '2020-10-08 16:09:29', '0000-00-00 00:00:00', '1'),
(50, 0, '', 0, '2020-10-19 11:10:59', '2020-10-19 11:10:59', '0'),
(51, 3, 'nazia15-8973@diu.edu.bd', 0, '2020-10-19 12:24:12', '2020-10-19 12:24:12', '1'),
(52, 0, '', 0, '2020-10-19 12:25:27', '2020-10-19 12:25:27', '0'),
(53, 3, 'nazia15-8973@diu.edu.bd', 0, '2020-10-19 12:27:44', '2020-10-19 12:27:44', '1'),
(54, 0, 'cxfsf@ghgj.fyg', 0, '2020-10-19 12:28:02', '2020-10-19 12:28:02', '0'),
(55, 0, 'cxfsf@ghgj.fyg', 0, '2020-10-19 17:51:24', '2020-10-19 17:51:24', '0'),
(56, 1, 'shadesh12@gmail.com', 0, '2020-10-19 17:52:01', '0000-00-00 00:00:00', '1'),
(57, 3, 'nazia15-8973@diu.edu.bd', 0, '2020-10-19 21:11:30', '0000-00-00 00:00:00', '1'),
(58, 3, 'nazia15-8973@diu.edu.bd', 0, '2020-10-19 23:37:39', '0000-00-00 00:00:00', '1'),
(59, 6, 'nazia15-8973@diu.edu.bd', 0, '2020-10-20 01:06:32', '0000-00-00 00:00:00', '1'),
(60, 7, 'nazia15-8973@diu.edu.bd', 0, '2020-10-20 01:44:33', '0000-00-00 00:00:00', '1'),
(61, 8, 'nazia15-8973@diu.edu.bd', 0, '2020-10-21 16:20:33', '0000-00-00 00:00:00', '1'),
(62, 0, 'nazia.nuzhat24@gmail.com', 0, '2020-10-21 20:06:37', '2020-10-21 20:06:37', '0'),
(63, 17, 'nazia.nuzhat24@gmail.com', 0, '2020-10-21 20:11:48', '0000-00-00 00:00:00', '1'),
(64, 0, 'nazi973@diu.edu.bd', 0, '2020-10-21 23:44:21', '2020-10-21 23:44:21', '0'),
(65, 17, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 00:00:39', '0000-00-00 00:00:00', '1'),
(66, 0, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 00:01:14', '2020-10-22 00:01:14', '0'),
(67, 0, 'nazia.nuzhat28@gmail.com', 0, '2020-10-22 00:01:54', '2020-10-22 00:01:54', '0'),
(68, 0, 'nazia.nuzhat29@gmail.com', 0, '2020-10-22 00:03:53', '2020-10-22 00:03:53', '0'),
(69, 22, 'nazia.nuzhat28@gmail.com', 0, '2020-10-22 00:04:05', '0000-00-00 00:00:00', '1'),
(70, 17, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 00:27:23', '0000-00-00 00:00:00', '1'),
(71, 23, 'nazia.nuzhat29@gmail.com', 0, '2020-10-22 00:27:54', '0000-00-00 00:00:00', '1'),
(72, 23, 'nazia.nuzhat29@gmail.com', 0, '2020-10-22 00:29:31', '0000-00-00 00:00:00', '1'),
(73, 17, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 00:30:13', '0000-00-00 00:00:00', '1'),
(74, 0, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 00:31:18', '2020-10-22 00:31:18', '0'),
(75, 17, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 00:32:15', '0000-00-00 00:00:00', '1'),
(76, 0, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 00:32:24', '2020-10-22 00:32:24', '0'),
(77, 0, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 02:19:00', '2020-10-22 02:19:00', '0'),
(78, 0, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 02:25:58', '2020-10-22 02:25:58', '0'),
(79, 0, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 02:59:38', '2020-10-22 02:59:38', '0'),
(80, 26, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 06:01:10', '0000-00-00 00:00:00', '1'),
(81, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 19:21:04', '0000-00-00 00:00:00', '1'),
(82, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-22 19:23:47', '0000-00-00 00:00:00', '1'),
(83, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-23 21:41:46', '0000-00-00 00:00:00', '1'),
(84, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-25 00:11:41', '0000-00-00 00:00:00', '1'),
(85, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-26 00:36:30', '0000-00-00 00:00:00', '1'),
(86, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-26 01:04:18', '0000-00-00 00:00:00', '1'),
(87, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-26 01:28:59', '0000-00-00 00:00:00', '1'),
(88, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-26 01:48:53', '0000-00-00 00:00:00', '1'),
(89, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-26 01:57:02', '0000-00-00 00:00:00', '1'),
(90, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-26 20:01:22', '0000-00-00 00:00:00', '1'),
(91, 0, 'shadesh12@gmail.com', 0, '2020-10-26 21:19:31', '2020-10-26 21:19:31', '0'),
(92, 0, 'shadesh12@gmail.com', 0, '2020-10-26 21:19:46', '2020-10-26 21:19:46', '0'),
(93, 0, 'shadesh12@gmail.com', 0, '2020-10-26 21:21:26', '2020-10-26 21:21:26', '0'),
(94, 1, 'shadesh12@gmail.com', 0, '2020-10-26 21:22:01', '0000-00-00 00:00:00', '1'),
(95, 0, 'shadesh12@gmail.com', 0, '2020-10-27 02:58:55', '2020-10-27 02:58:55', '0'),
(96, 1, 'shadesh12@gmail.com', 0, '2020-10-27 02:59:03', '0000-00-00 00:00:00', '1'),
(97, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-27 21:42:29', '0000-00-00 00:00:00', '1'),
(98, 24, 'ghrg@fcfcf.gh', 0, '2020-10-27 22:06:08', '0000-00-00 00:00:00', '1'),
(99, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-10-28 00:13:43', '0000-00-00 00:00:00', '1'),
(100, 0, 'shadesh12@gmail.com', 0, '2020-10-29 16:52:51', '2020-10-29 16:52:51', '0'),
(101, 1, 'shadesh12@gmail.com', 0, '2020-10-29 16:53:12', '0000-00-00 00:00:00', '1'),
(102, 1, 'shadesh12@gmail.com', 0, '2020-10-30 19:40:18', '0000-00-00 00:00:00', '1'),
(103, 1, 'shadesh12@gmail.com', 0, '2020-11-01 06:03:46', '0000-00-00 00:00:00', '1'),
(104, 27, 'nazia.nuzhat24@gmail.com', 0, '2020-11-01 17:28:02', '0000-00-00 00:00:00', '1'),
(105, 1, 'shadesh12@gmail.com', 0, '2020-11-01 17:33:19', '0000-00-00 00:00:00', '1'),
(106, 1, 'shadesh12@gmail.com', 0, '2020-11-02 18:52:02', '0000-00-00 00:00:00', '1'),
(107, 1, 'shadesh12@gmail.com', 0, '2020-11-19 14:48:36', '2020-11-19 14:48:36', '1'),
(108, 1, 'shadesh12@gmail.com', 0, '2020-11-23 18:44:20', '0000-00-00 00:00:00', '1'),
(109, 28, 'shadesh15-8599@diu.edu.bd', 0, '2020-11-30 19:29:28', '0000-00-00 00:00:00', '1'),
(110, 28, 'shadesh15-8599@diu.edu.bd', 0, '2020-11-30 19:30:29', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `upload_date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `description`, `upload_date`, `image`, `deleted`) VALUES
(1, 'sangbid', 'asd', 'asdas', '2020-11-04 17:07:58', 'assets/5fa2d1de8ae22africa-17344_640.jpg', 'no'),
(2, 'sangbid', 'asd', 'asdas', '2020-11-04 17:08:31', 'assets/5fa2d1ff6cc04africa-17344_640.jpg', 'no'),
(3, 'sangbid', 'asd', 'asdas', '2020-11-04 17:08:34', 'assets/5fa2d2029edeaafrica-17344_640.jpg', 'no'),
(4, 'sangbid', 'asd', 'asd', '2020-11-04 17:08:42', 'assets/5fa2d20a3cdc1africa-17344_640.jpg', 'no'),
(5, 'sangbid', 'asd', 'asd', '2020-11-04 17:08:54', 'assets/5fa2d2167c336africa-17344_640.jpg', 'no'),
(6, 'sangbid', 'asd', 'asd', '2020-11-04 17:10:10', 'assets/5fa2d26295a69africa-17344_640.jpg', 'no'),
(7, 'sangbid', 'asd', 'asd', '2020-11-04 17:11:00', 'assets/5fa2d294a0c03africa-17344_640.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `birth_date` datetime NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `Problem` varchar(300) NOT NULL,
  `Weight` varchar(4) NOT NULL,
  `Pressure` varchar(6) NOT NULL,
  `temperature` varchar(5) NOT NULL,
  `history` varchar(300) NOT NULL,
  `oex` varchar(200) NOT NULL,
  `pd` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `md_name` varchar(200) NOT NULL,
  `mg` varchar(10) NOT NULL,
  `dose` varchar(10) NOT NULL,
  `day` varchar(15) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `prescription_comment` varchar(300) NOT NULL,
  `te_name` varchar(500) NOT NULL,
  `test_description` varchar(500) NOT NULL,
  `adv` varchar(300) NOT NULL,
  `doctorsauthor` varchar(300) NOT NULL,
  `current_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `pid`, `name`, `phone`, `birth_date`, `age`, `gender`, `Problem`, `Weight`, `Pressure`, `temperature`, `history`, `oex`, `pd`, `type`, `md_name`, `mg`, `dose`, `day`, `comments`, `prescription_comment`, `te_name`, `test_description`, `adv`, `doctorsauthor`, `current_date`) VALUES
(55, '234', 'asd', '324', '2020-11-05 00:00:00', 23, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', '', '2020-11-27 10:14:06'),
(56, '0', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', '', '2020-11-27 10:14:06'),
(57, '0', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', '', '2020-11-27 10:14:06'),
(58, '0', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', '', '2020-11-27 10:14:06'),
(59, '234', 'asd', '234', '2020-11-05 00:00:00', 34, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', '', '2020-11-27 10:14:06'),
(60, '111', 'sangbid', '01783729544', '2020-11-30 00:00:00', 30, 'Male', 'fever', '85', '100/14', '101', 'fever,covid19', 'sany', 'sabu', '1.capsule', '1.monas', '1.12', '1.40', '1.23', '1.jhgjh', 'hjh', '1.xray', '1.fgsds', '1.stay safe', '', '2020-11-27 10:14:06'),
(61, '177', 'sangbid', '01783729544', '2020-11-23 00:00:00', 22, 'Male', 'fever', '82', '120/60', '98', 'khsdviowiowcdfbkwdbilwh', 'hvhvjhic', 'asckhbasckh', '1.cap', '1.montelib ', '1.100', '1.30', '1.10', '1.sdd', 'asdasd', '1.x-ray ', '1.sdvsd', '1.cDASCA', '', '2020-11-27 10:14:06'),
(62, '199', 'sany', '1234567890', '2020-11-24 00:00:00', 22, 'Male', 'covid-19', '23', '120/50', '100', 'hcdsglisdh', 'sakcb', 'ascjasc', '1.cap', '1.Monas', '1.15', '1.10', '1.12', '1.vdvsdv', 'ssdsc', '1.surgery', '1.vcdfv', '1.vsdsd', '', '2020-11-27 10:14:06'),
(63, '200', 'Rahat', '324568976575', '2020-11-17 00:00:00', 30, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Songbid Zaman', '2020-11-27 10:14:06'),
(64, '1234', 'sabgjk', '65476852689', '2020-11-17 00:00:00', 20, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Songbid Zaman', '2020-11-27 10:14:06'),
(65, '7659', 'sangbidnlk', '463472658962', '2020-11-10 00:00:00', 20, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Songbid Zaman', '2020-11-27 10:14:06'),
(66, '25234', 'sanhfg', '44321214', '2020-11-03 00:00:00', 20, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Songbid Zaman', '2020-11-27 10:14:06'),
(67, '7618712', 'sajhiugs', '2589625', '2020-11-24 00:00:00', 20, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', '1.x-ray 2.ecg 3.mri', 'Array', 'Array', 'Songbid Zaman', '2020-11-27 10:14:06'),
(68, '298', 'sdhlgsdfhk', '23796092348', '2020-11-10 00:00:00', 20, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', '1.asdaf 2.dqsdf', 'Array', 'Array', 'Songbid Zaman', '2020-11-27 10:14:06'),
(69, '63', 'Areef', '45276893562', '2020-11-23 00:00:00', 30, 'Male', 'fever', '60', '120/50', '102', 'person need to rest', '', '', '1.cap', '1.napa ', '1.10', '1.12', '1.17', '1.sdugoucd', 'dwqjgigddiucgbsac', '1.xray', '1.fvsd', '1.ascaa', 'Songbid Zaman', '2020-11-27 10:14:06'),
(70, '454', 'sany', '2345678', '2020-11-24 00:00:00', 20, 'Male', 'djh', '34', '2334/3', '122', 'fedwe', 'wedw', 'wd', '1.wd', '1.wdwdwdf', '1.10', '1.22', '1.12', '1.cefvef', '', 'Array', 'Array', 'Array', 'Songbid Zaman', '2020-11-27 10:14:06'),
(71, '24', 'sannu', '12345678', '2020-11-24 00:00:00', 20, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', '', '2020-11-27 10:14:06'),
(72, '10', 'disha', '123765389454', '2020-11-23 00:00:00', 21, 'Femal', 'fever', '50', '120/60', '99', 'previous synosais', 'sdiagisd', 'sajghsda', '1.cap 2.tab', '1.Napa 2.zmax', '1.10 2.20', '1.12 2.30', '1.27 2.35', '1.xccdasc 2.wgqui', 'uodhciubvsd', '1.xray 2.cheast', '1.ddqwwq 2.asd', '1.asdffsa', '', '2020-11-27 10:14:06'),
(73, '12321', 'disha', '12345676543', '2020-11-24 00:00:00', 20, 'Femal', 'dasasd', '50', '129/43', '100', '', '', '', '1.cap', '1.napa', '1.10', '1.12', '1.11', '1.sdca', 'acs', '1.xaray', '1.ads', '1.csa', '', '2020-11-27 10:14:06'),
(74, '12345', 'sangbiddaaaaa', '2345676543', '2020-11-09 00:00:00', 20, 'Male', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', '', '2020-11-27 10:14:06'),
(75, '133', 'sabasd', '123456543', '2020-11-16 00:00:00', 23, 'Male', 'fever', '30', '14', '134', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Sangbid', '2020-11-27 10:14:06'),
(76, '1203', 'disha', '12345676543', '2020-11-10 00:00:00', 10, 'Femal', 'fever', '50', '120/50', '101', 'dsdc', 'asdg', 'fds', '1.cap 2.tab', '1.napa 2.zmax', '1.10 2.10', '1.23 2.21', '1.23 2.12', '1.sdfa 2.sfad', '', '1.x-ray', '1.asd', '1.ads', 'Sangbid', '2020-11-27 10:14:06'),
(77, '0', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Sangbid', '2020-11-27 10:14:06'),
(78, '213', 'sanu', '1234532', '2020-11-18 00:00:00', 34, 'Male', 'asd', '23', '12', '12', 'asd', 'asd', 'sdfA', '1.asd', '1.asddf', '1.112', '1.2312', '1.12', '1.sda', 'asd', '1.xray', '1.as', '1.asd', 'Sangbid', '2020-11-27 10:14:06'),
(79, '0', 'Runa', '34567834', '2020-11-23 00:00:00', 30, 'Male', 'fever', '56', '120/50', '100', 'sdfgsa', 'jytrhfgsda', 'hgfd', '1.cap 2.tab', '1.napa 2.ace', '1.10 2.12', '1.12 2.13', '1.14 2.12', '1.dfsa', 'rgnbfvsd', '1.xray 2.mri', '1.das 2.wefdw', '1.hewfsd', 'Sangbid', '2020-11-27 10:14:06'),
(80, '1234', 'dfsasd', 'asd', '2020-11-17 00:00:00', 12, 'Male', 'fdax', '40', '134', '12', 'dsa', '12', '', '1.cap', '1.napa', '1.112', '1.12', '1.12', '1.fdssA', 'dfsa', '1.test', '1.asd', '1.asdf', 'Sangbid', '2020-11-27 10:14:06'),
(81, '213', 'sangbid', '123456754', '2020-11-24 00:00:00', 22, '', 'fever', '70', '120/60', '98', 'asdfghgfdsa', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Sangbid', '2020-11-27 10:14:06'),
(82, '213', 'sangbid', '1234567543', '2020-11-26 00:00:00', 22, 'Male', 'covid', '21', '4123', '123', 'gfdsz', 'gfds', 'gfds', '1.gfd 2.gfd 3.fds', '1.gfd 2.gfdt 3.gfds', '1.12 2.232', '1.123 2.22', '1.13 2.123 3.12', '1.gfd 2.fgds', 'gfds', '1.fds 2.fds', '1.gfds 2.fds', '1.gfds', 'Sangbid', '2020-11-27 10:14:06'),
(83, '123543', 'sanjana', '54321', '2020-11-19 00:00:00', 23, 'Femal', 'hgfd', '34', '23', '34', 'hgfds', 'hgfds', 'hgfds', '1.csdfg 2.gfd', '1.dfg 2.gfds', '1.23 2.13', '1.23 2.123', '1.123 2.1234', '1.tfds 2.gfdsa', '', '1.hgfd 2.fdhgfd', '1.dhgfds 2.gfds', 'Array', 'nazia nuzhat', '2020-11-27 10:14:06'),
(84, '32', 'gfdsa', '24', '2020-11-25 00:00:00', 14, 'Femal', 'zxcvbnb', '233', '34', '34', 'hgdfsaa', 'gdfsa', 'gfds', '1.xs 2.vcd', '1.sdfgfdsasdfg 2.gfds', '1.23 2.123', '1.234 2.32', '1.23 2.123', '1.gfdsa 2.ikjhgfd', '', '1.asd', '1.asdfg', '1.asdfg', 'Sangbid', '2020-11-27 10:14:06'),
(85, '1234', 'gdfsaa', '1234', '2020-11-11 00:00:00', 23, 'Femal', 'fgdsa', '12', '23', '321', 'hgfds', 'gfds', 'gfdsa', '1.cvb', '1.erfg', '1.123', '1.23', '1.234', '1.nbvcxsz', 'fds', '1.bvfcds', '1.gfds', '1.fds', 'Sangbid zaman', '2020-11-27 10:14:06'),
(86, '12376', 'trsdfgjh', '1234567', '2020-11-25 00:00:00', 20, 'Male', 'rdtcfygvbhkjn', '2345', '2345', '2345', 'wsredtfyguhik', 'sdcfgvbhjnmk', 'sedrftgujnmk', '1.qsdfg 2.asdfg', '1.sedtrfygvubhjnmk 2.sxdcfgvbhm', '1.234 2.23', '1.345 2.56', '1.345 2.567', '1.sdfgm,', 'sdfbnm,', '1.sdfgh', '1.sdfgnm', '1.wsdfghjk', 'Sangbid zaman', '2020-11-27 10:14:06'),
(87, '1', 'sangbid', '1234567890', '2020-11-24 00:00:00', 22, 'Male', 'fdsa', '12', '2', '123', 'cds', 'fds', 'fds', '1.cae', '1.asdf', '1.231', '1.23', '1.12', '1.xcv', 'sdfg', '1.asdf', '1.asdf', '1.asdf', 'sangbid', '2020-11-27 10:14:06'),
(88, '123456', 'bvxb', '567567', '2020-11-26 00:00:00', 22, 'Femal', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Sangbid zaman', '2020-11-27 10:14:06'),
(89, '123', 'bv', '1234', '2020-11-26 00:00:00', 1212, 'Femal', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Sangbid zaman', '2020-11-27 10:14:06'),
(90, '0', 'dfg', 'dbvcd', '2020-12-03 00:00:00', 0, 'Femal', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Sangbid zaman', '2020-11-27 10:14:06'),
(91, '0', 'dbcvbd', 'dcvbd', '2020-12-03 00:00:00', 22, 'Femal', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Sangbid zaman', '2020-11-27 10:35:03'),
(92, 'PID_35', 'runa', '123456', '2020-11-27 00:00:00', 22, 'Femal', '', '', '', '', '', '', '', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '', 'Array', 'Array', 'Array', 'Sangbid zaman', '2020-11-27 10:47:24'),
(93, 'PID_35', 'dilruba', '978936751354', '2020-11-30 00:00:00', 25, 'Femal', 'cndwvh', 'cbdv', 'cdncbd', 'd n', 'wvhw', 'rvfgrv', 'b rbn f', '1.efb b', '1.nbenbe', '1.dnebne', '1.e defbfn', '1.enbfnr', '1.be vb ', '', '1.bvgdv', '1.ebvdbe', '1.evhev', 'Sangbid zaman', '2020-11-29 18:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(26, 0, 'sangbid', 0x3a3a3100000000000000000000000000, '2020-07-28 09:44:41', '', 0),
(27, 0, 'asd@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 09:56:48', '', 0),
(28, 0, 'admin', 0x3a3a3100000000000000000000000000, '2020-07-28 09:56:51', '', 0),
(29, 2, 'abx@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 10:08:47', '28-07-2020 03:42:00 PM', 1),
(30, 0, 'runa@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 10:13:57', '', 0),
(31, 6, 'runa@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 10:15:06', '', 1),
(32, 6, 'runa@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 11:21:28', '28-07-2020 04:52:04 PM', 1),
(33, 6, 'runa@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 11:22:15', '28-07-2020 04:54:35 PM', 1),
(34, 2, 'abx@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 15:52:57', '28-07-2020 09:24:50 PM', 1),
(35, 2, 'abx@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 19:34:44', '', 1),
(36, 2, 'abx@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 19:35:35', '', 1),
(37, 0, 'sangbidshadesh12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 20:28:19', '', 0),
(38, 0, 'shadesh12@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 20:28:29', '', 0),
(39, 1, 'sang@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-28 20:43:05', '09-09-2020 12:54:34 AM', 1),
(40, 6, 'runa@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-29 07:34:38', '', 1),
(41, 0, 'runa@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-29 07:44:10', '', 0),
(42, 6, 'runa@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-29 07:44:38', '', 1),
(43, 6, 'runa@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-29 11:53:19', '', 1),
(44, 0, '01748161027', 0x3a3a3100000000000000000000000000, '2020-07-31 13:12:05', '', 0),
(45, 0, '01748161027', 0x3a3a3100000000000000000000000000, '2020-07-31 13:14:28', '', 0),
(46, 0, '01748161027', 0x3a3a3100000000000000000000000000, '2020-07-31 13:40:08', '', 0),
(47, 12, '01748161027', 0x3a3a3100000000000000000000000000, '2020-07-31 13:42:10', '', 1),
(48, 0, '01777777777', 0x3a3a3100000000000000000000000000, '2020-07-31 14:56:36', '', 0),
(51, 14, '01999999999', 0x3a3a3100000000000000000000000000, '2020-07-31 15:37:53', '', 1),
(52, 22, '1748161027', 0x3a3a3100000000000000000000000000, '2020-07-31 19:31:11', '', 1),
(53, 22, '01748161027', 0x3a3a3100000000000000000000000000, '2020-07-31 19:31:35', '', 1),
(54, 0, '01748161027', 0x3a3a3100000000000000000000000000, '2020-07-31 19:31:41', '', 0),
(55, 26, '01748161027', 0x3a3a3100000000000000000000000000, '2020-08-02 15:09:57', '02-08-2020 09:10:04 PM', 1),
(56, 25, '01748161027', 0x3a3a3100000000000000000000000000, '2020-08-02 15:10:18', '', 1),
(57, 31, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-05 18:15:33', '', 1),
(58, 31, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-05 18:17:35', '', 1),
(59, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-06 11:31:09', '', 1),
(60, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-07 11:53:58', '07-09-2020 05:56:23 PM', 1),
(61, 31, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-07 15:43:43', '07-09-2020 09:48:02 PM', 1),
(62, 31, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-07 15:48:54', '', 1),
(63, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-07 15:55:48', '07-09-2020 09:56:26 PM', 1),
(64, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-08 18:27:11', '', 1),
(65, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-08 18:34:24', '', 1),
(66, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-08 18:36:01', '', 1),
(67, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 13:09:41', '09-09-2020 07:46:34 PM', 1),
(68, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 18:28:14', '', 1),
(69, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 18:51:31', '', 1),
(70, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 18:52:50', '', 1),
(71, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 18:53:31', '', 1),
(72, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 18:54:37', '', 1),
(73, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 18:56:02', '10-09-2020 02:28:33 AM', 1),
(74, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 20:32:28', '', 1),
(75, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-09 20:34:21', '13-09-2020 12:03:33 AM', 1),
(76, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-13 15:41:18', '', 1),
(77, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-13 17:33:48', '', 1),
(78, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-13 17:36:11', '', 1),
(79, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-14 08:17:22', '16-09-2020 03:55:12 AM', 1),
(80, 0, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-16 09:07:39', '', 0),
(81, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-16 09:07:59', '16-09-2020 08:24:39 PM', 1),
(82, 0, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-16 14:24:55', '', 0),
(83, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-16 14:25:14', '17-09-2020 12:20:29 AM', 1),
(84, 32, '01705829945', 0x3a3a3100000000000000000000000000, '2020-09-16 18:52:57', '', 1),
(85, 0, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-18 14:38:19', '', 0),
(86, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-18 14:38:28', '21-09-2020 09:53:02 PM', 1),
(87, 0, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-26 20:35:56', '', 0),
(88, 29, '01748161027', 0x3a3a3100000000000000000000000000, '2020-09-26 20:36:04', '', 1),
(89, 0, '', 0x3a3a3100000000000000000000000000, '2020-10-23 14:11:55', '', 0),
(90, 36, '', 0x3a3a3100000000000000000000000000, '2020-10-23 14:12:41', '', 1),
(91, 36, 'nazia nuzhat', 0x3a3a3100000000000000000000000000, '2020-10-23 14:27:09', '23-10-2020 08:27:17 PM', 1),
(92, 0, '', 0x3a3a3100000000000000000000000000, '2020-10-23 14:27:26', '', 0),
(93, 36, 'nazia nuzhat', 0x3a3a3100000000000000000000000000, '2020-10-23 15:39:25', '23-10-2020 10:35:19 PM', 1),
(94, 38, 'a', 0x3a3a3100000000000000000000000000, '2020-10-23 16:40:24', '', 1),
(95, 38, 'a', 0x3a3a3100000000000000000000000000, '2020-10-23 16:40:36', '23-10-2020 10:40:41 PM', 1),
(96, 0, '', 0x3a3a3100000000000000000000000000, '2020-10-23 16:51:57', '', 0),
(97, 36, 'nazia nuzhat', 0x3a3a3100000000000000000000000000, '2020-10-23 16:52:05', '0', 1),
(98, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 17:51:03', '23-10-2020 11:51:38 PM', 0),
(99, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 17:52:05', '23-10-2020 11:55:27 PM', 0),
(100, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 17:58:33', '', 1),
(101, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 18:05:09', '', 1),
(102, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 18:38:29', '24-10-2020 12:38:59 AM', 0),
(103, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 18:39:59', '24-10-2020 12:40:04 AM', 0),
(104, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 18:41:08', '24-10-2020 12:41:27 AM', 0),
(105, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 18:42:37', '24-10-2020 12:42:56 AM', 1),
(106, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 19:15:07', '', 1),
(107, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 19:35:33', '24-10-2020 01:52:30 AM', 1),
(108, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 20:41:34', '', 1),
(109, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-23 20:47:21', '', 1),
(110, 43, 'ruba noor', 0x3a3a3100000000000000000000000000, '2020-10-25 02:46:32', '25-10-2020 08:48:34 AM', 1),
(111, 43, 'ruba noor', 0x3a3a3100000000000000000000000000, '2020-10-25 02:48:43', '', 1),
(112, 43, 'ruba noor', 0x3a3a3100000000000000000000000000, '2020-10-25 02:57:06', '25-10-2020 09:10:40 AM', 1),
(113, 42, 'a', 0x3a3a3100000000000000000000000000, '2020-10-25 23:23:39', '', 1),
(114, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:34:52', '26-10-2020 06:34:55 AM', 1),
(115, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:38:22', '', 1),
(116, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:40:05', '', 1),
(117, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:43:47', '', 1),
(118, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:47:05', '', 1),
(119, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:47:17', '', 1),
(120, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:48:17', '', 1),
(121, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:51:42', '', 1),
(122, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:56:24', '', 1),
(123, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:56:44', '', 1),
(124, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:57:40', '', 1),
(125, 0, '', 0x3a3a3100000000000000000000000000, '2020-10-26 00:58:40', '', 0),
(126, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 00:58:48', '', 1),
(127, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:03:35', '', 1),
(128, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:04:02', '26-10-2020 07:04:08 AM', 1),
(129, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:09:44', '', 1),
(130, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:12:37', '', 1),
(131, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:22:27', '', 1),
(132, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:27:32', '', 1),
(133, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:28:44', '26-10-2020 07:28:50 AM', 1),
(134, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:38:03', '', 1),
(135, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:39:22', '', 1),
(136, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:39:36', '', 1),
(137, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:46:58', '', 1),
(138, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:48:19', '', 1),
(139, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:48:35', '26-10-2020 07:48:42 AM', 1),
(140, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:50:40', '', 1),
(141, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:50:50', '', 1),
(142, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:55:28', '', 1),
(143, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 01:56:10', '26-10-2020 07:56:51 AM', 1),
(144, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 02:00:30', '', 1),
(145, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-26 02:10:34', '26-10-2020 08:10:38 AM', 1),
(146, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-27 19:24:46', '28-10-2020 01:25:16 AM', 1),
(147, 42, 'a', 0x3a3a3100000000000000000000000000, '2020-10-27 19:25:55', '28-10-2020 03:41:54 AM', 1),
(148, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-27 22:52:43', '28-10-2020 06:13:27 AM', 1),
(149, 35, 'f', 0x3a3a3100000000000000000000000000, '2020-10-28 22:16:02', '29-10-2020 10:52:24 PM', 1),
(150, 44, 'nazia nuzhat', 0x3a3a3100000000000000000000000000, '2020-11-02 18:42:16', '03-11-2020 12:50:03 AM', 1),
(151, 35, 'Dilruba nusrat', 0x3a3a3100000000000000000000000000, '2020-11-27 08:47:27', '27-11-2020 02:47:46 PM', 1),
(152, 35, 'Dilruba nusrat', 0x3a3a3100000000000000000000000000, '2020-11-27 08:49:21', '27-11-2020 02:49:26 PM', 1),
(153, 0, '', 0x3a3a3100000000000000000000000000, '2020-11-27 08:49:53', '', 0),
(154, 0, '', 0x3a3a3100000000000000000000000000, '2020-11-27 08:50:50', '', 0),
(155, 0, '', 0x3a3a3100000000000000000000000000, '2020-11-27 08:52:17', '', 0),
(156, 0, '', 0x3a3a3100000000000000000000000000, '2020-11-27 09:06:42', '', 0),
(157, 0, '', 0x3a3a3100000000000000000000000000, '2020-11-27 09:11:05', '', 0),
(158, 35, 'Dilruba nusrat', 0x3a3a3100000000000000000000000000, '2020-11-29 17:42:18', '29-11-2020 11:59:25 PM', 1),
(159, 35, 'Dilruba nusrat', 0x3a3a3100000000000000000000000000, '2020-11-29 18:04:32', '30-11-2020 08:20:57 PM', 1),
(160, 47, 'gft', 0x3a3a3100000000000000000000000000, '2020-11-30 19:05:58', '01-12-2020 01:06:06 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `activation` varchar(100) NOT NULL DEFAULT 'inactive',
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `address`, `city`, `gender`, `email`, `blood_group`, `phone`, `password`, `birthdate`, `uniqueid`, `activation`, `regDate`, `updationDate`) VALUES
(1, 'sangbid', 'dhaka', 'Dhaka, Bangladesh', 'male', 'sang@gmail.com', '', NULL, '123456', '', '', '', '2019-03-05 14:53:13', '04-03-2019'),
(2, 'Sangbid', 'sdfasdfs', 'Dhaka, Bangladesh', 'male', 'abx@gmail.com', '', NULL, '123456', '', '', '', '2019-04-03 09:10:07', ''),
(6, 'Runa', 'mirpur', 'dhaka', 'female', 'runa@gmail.com', '', NULL, '123456', '', '', '', '2020-07-28 10:13:32', ''),
(7, 'Shadesh Ram Gour', '', 'Dhaka', 'male', 'shadesh@gmail.com', '', NULL, '123456', '', '', '', '2020-07-29 07:29:50', '29-07-2020'),
(8, 'nazia nuzhat', 'mirpur', 'Dhaka', 'female', 'nazia15-8973@diu.edu.bd', '', NULL, 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '2020-07-31 08:25:08', ''),
(9, 'rohim', 'dhaka', 'Dhaka', 'male', 'rohim@gmail.com', '', NULL, 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '2020-07-31 08:30:11', ''),
(13, 'w', 'mirpur', 'Dhaka', 'male', 'www@gmail.com', '', '1777777777', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '2020-07-31 14:55:17', ''),
(28, 'f', 'dhaka', 'Dhaka', 'female', 'nazia15-8973@diu.edu.bd', '', '53423121', '5343423', '', '', '', '2020-08-02 18:41:50', ''),
(29, 'Nazia nuzhat runa  ', 'dhaka', 'Dhaka', 'female', 'nazia15-8973@diu.edu.bd', 'B+', '01748161027', '1234567', '', '', '', '2020-08-02 19:06:39', '16-09-2020 03:13:15 AM'),
(30, 'f', 'dhaka', 'Dhaka', 'female', 'abc@gmail.com', '', '017000000000', '123456', '', '', '', '2020-08-02 19:08:33', ''),
(31, 'f', 'mirpur', 'Dhaka', 'male', 'nazia15-8973@diu.edu.bd', '', '01748161027', '1234567', '', '', '', '2020-09-05 18:14:32', ''),
(32, 'janina dgywfyuew hdvgwedf gevdge ', 'dgdh', 'dvgdf', 'male', 'abc12@gmail.com', 'B+', '01705829945', '123450', '', '', '', '2020-09-16 18:52:30', ''),
(33, 'f', 'mirpur', 'Dhaka', 'female', 'nazia.nuzhat24@gmail.com', 'B+', '01748161027', '123456', '', '', 'inactive', '2020-10-23 04:19:57', ''),
(34, 'f', 'mirpur', 'Dhaka', 'female', 'nazia.nuzhat24@gmail.com', 'B+', '01748161027', '123456', '', '', 'inactive', '2020-10-23 04:24:04', ''),
(35, 'Dilruba nusrat', 'mirpur', 'Dhaka', 'female', 'nazia.nuzhat24@gmail.com', 'B+', '01748161027', '123456', '', 'PID_35', 'on', '2020-10-23 04:36:21', '29-10-2020 04:56:35 AM'),
(36, 'nazia nuzhat', 'dhaka', 'Dhaka', 'female', 'nazia.nuzhat24@gmail.com', 'B+', '01748161027', '123456789', '24-02-1998', 'PID_36', 'inactive', '2020-10-23 13:31:05', ''),
(37, 'a', 'mirpur', 'Dhaka', 'female', 'nazia15-8973@diu.edu.bd', 'B+', '01748161027', '123456', '19-10-2020', 'PID_37', 'inactive', '2020-10-23 13:35:32', ''),
(38, 'a', 'mirpur', 'Dhaka', 'female', 'nazia15-8973@diu.edu.bd', 'B+', '017000000000', '123123', '20-10-2020', 'PID_38', 'inactive', '2020-10-23 13:50:52', ''),
(39, 'nazia nuzhat', 'dhaka', 'Dhaka', 'female', 'nazia15-8973@diu.edu.bd', 'B+', '01748161027', '123456', '24-02-1998', 'PID_39', 'inactive', '2020-10-23 16:42:48', ''),
(40, 'nazia nuzhat', 'mirpur', 'Dhaka', 'female', 'nazia15-8973@diu.edu.bd', 'B+', '01748161027', '123456', '07-10-2020', 'PID_9982e9fc36', 'inactive', '2020-10-23 21:12:56', ''),
(41, 'a', 'mirpur', 'Dhaka', 'female', 'nazia15-8973@diu.edu.bd', 'B+', '01748161027', '123456', '21-10-2020', 'a_3415', 'inactive', '2020-10-23 21:33:29', ''),
(42, 'a', 'mirpur', 'Dhaka', '', 'nazia.nuzhat24@gmail.com', 'B+', '01999999999', '123456', '26-10-2020', 'a_4413', 'on', '2020-10-25 02:38:38', ''),
(43, 'ruba noor', 'mirpur', 'Dhaka', 'female', 'nazia.nuzhat24@gmail.com', 'B+', '0908989711', '123456', '07-10-2020', 'ruba_5701', 'on', '2020-10-25 02:41:48', ''),
(44, 'nazia nuzhat', 'dhanmondi', 'Dhaka', 'female', 'nazia.nuzhat24@gmail.com', 'B+', '01748161027', '1234567', '18-11-2020', 'nazia_2066', 'on', '2020-11-02 18:40:02', ''),
(45, 'nazia', 'mirpur', '', 'female', '', 'b+', '', '123456', '24-02-1998', 'nazia_9903', 'inactive', '2020-11-30 18:53:16', ''),
(46, 'shadesh', 'signboard', '', 'male', '', 'b+', '', '123456', '08-08-1997', 'shadesh_2114', 'inactive', '2020-11-30 19:01:12', ''),
(47, 'gft', 'hfuy', '', 'Other', 'shadesh15-8599@diu.edu.bd', 'jg', '6575434', '123456', '23-12-2020', 'gft_1082', 'on', '2020-11-30 19:04:14', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceID` (`invoiceID`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `llog`
--
ALTER TABLE `llog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `patientcode`
--
ALTER TABLE `patientcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plog`
--
ALTER TABLE `plog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `number` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `llog`
--
ALTER TABLE `llog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patientcode`
--
ALTER TABLE `patientcode`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `plog`
--
ALTER TABLE `plog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`invoiceID`) REFERENCES `invoice` (`invoiceID`);

--
-- Constraints for table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `invoice` (`invoiceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
