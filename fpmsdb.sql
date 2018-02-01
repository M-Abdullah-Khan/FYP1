-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 09:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fpmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminprivil`
--

CREATE TABLE IF NOT EXISTS `adminprivil` (
  `SNo` int(11) NOT NULL AUTO_INCREMENT,
  `dep` varchar(30) NOT NULL,
  `backupDB` tinyint(1) DEFAULT NULL,
  `importACData` tinyint(1) DEFAULT NULL,
  `empLeaveAsL` tinyint(1) DEFAULT NULL COMMENT 'Employee leave Buisness',
  `FCLK` tinyint(1) DEFAULT NULL,
  `CLC` tinyint(1) DEFAULT NULL,
  `AR` tinyint(1) DEFAULT NULL,
  `curEmpDuty` tinyint(1) DEFAULT NULL,
  `DLEM` tinyint(1) DEFAULT NULL,
  `mainTT` tinyint(1) DEFAULT NULL,
  `mainSS` tinyint(1) DEFAULT NULL,
  `ES` tinyint(1) DEFAULT NULL,
  `holiL` tinyint(1) DEFAULT NULL,
  `leaveC` tinyint(1) DEFAULT NULL,
  `ARule` tinyint(1) DEFAULT NULL,
  `DBopt` tinyint(1) DEFAULT NULL,
  `sysOpt` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `DN` int(11) NOT NULL,
  `CN` int(11) NOT NULL,
  `Time` timestamp NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `LeaveType` varchar(2) DEFAULT NULL,
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`DN`, `CN`, `Time`, `Status`, `LeaveType`, `Sno`) VALUES
(69179101, 1268, '2016-04-20 12:22:39', 0, NULL, 1),
(69179101, 1268, '2016-04-20 12:22:39', 2, NULL, 2),
(69179101, 1268, '2016-04-20 12:23:46', 4, '0', 3),
(69179101, 320, '2016-04-20 12:23:46', 0, NULL, 4),
(101, 320, '2016-05-01 17:18:17', 2, NULL, 5),
(69179101, 320, '2016-05-01 20:21:20', NULL, NULL, 6),
(69179101, 1268, '2016-05-01 20:21:20', NULL, NULL, 7),
(69179101, 320, '2016-05-04 04:03:06', NULL, NULL, 8),
(69179101, 1268, '2016-05-09 04:15:12', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `attendencerule`
--

CREATE TABLE IF NOT EXISTS `attendencerule` (
  `Type` varchar(30) NOT NULL,
  `Symbol` varchar(3) NOT NULL,
  `Earlyout` int(11) NOT NULL,
  `LateIn` int(11) NOT NULL,
  PRIMARY KEY (`Symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `DID` int(11) NOT NULL AUTO_INCREMENT,
  `Dname` varchar(50) NOT NULL,
  `Dsuper` int(11) DEFAULT NULL COMMENT 'Contains the DID of the super department',
  PRIMARY KEY (`DID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='In this table All the departments will be listed' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DID`, `Dname`, `Dsuper`) VALUES
(1, 'Company', NULL),
(2, 'SEECS', 1),
(3, 'CS', 1),
(6, 'CS2', 3),
(24, 'CS10', 3),
(25, 'CS11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `devicemanagement`
--

CREATE TABLE IF NOT EXISTS `devicemanagement` (
  `Name` int(11) NOT NULL,
  `CommunicationMode` varchar(25) NOT NULL,
  `Port` varchar(10) NOT NULL,
  `BaudRate` int(11) NOT NULL,
  `IPAddress` varchar(20) NOT NULL,
  `CommunicationPassword` varchar(10) NOT NULL,
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT,
  `PlaceofInstall` varchar(70) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`SerialNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains Information related to device and communication' AUTO_INCREMENT=2326 ;

--
-- Dumping data for table `devicemanagement`
--

INSERT INTO `devicemanagement` (`Name`, `CommunicationMode`, `Port`, `BaudRate`, `IPAddress`, `CommunicationPassword`, `SerialNo`, `PlaceofInstall`, `Status`) VALUES
(987, 'Serial', 'COM5', 115200, 'asdasd', 'dsda', 2325, 'SDSD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `acNo` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `mobileNo` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `DOE` date NOT NULL,
  `address` varchar(80) NOT NULL,
  `PO` int(11) DEFAULT NULL,
  `off_Tel` varchar(15) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `adminType` int(11) DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `CN` bigint(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `faceCount` int(11) DEFAULT NULL,
  `fingerCountL` int(11) DEFAULT NULL,
  `fingerCountR` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`acNo`),
  UNIQUE KEY `userID` (`userID`,`mobileNo`,`CN`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`acNo`, `userID`, `name`, `title`, `mobileNo`, `DOB`, `DOE`, `address`, `PO`, `off_Tel`, `department`, `adminType`, `nationality`, `city`, `state`, `CN`, `password`, `faceCount`, `fingerCountL`, `fingerCountR`, `email`) VALUES
(1, '123', '123', '123', '123', '2016-05-02', '2016-05-05', '123', 123, '123', 123, 123, '123', '123', '123', 123, 'SEECS@123', 123, 123, 123, '123'),
(2, '12312', '123123', '1231123', '123', '2016-05-09', '2016-05-19', '32', 313, '1231', 2312, 3123, '12', '312', '3123', 123, 'SEECS@123', 2131, 131, 3112, '2312'),
(3, 'sadasd', 'asdsad', '1323', '1232', '2016-05-04', '2016-05-06', '12312', NULL, NULL, 3, 1, '123', '123', '123', 123, '123', NULL, NULL, NULL, '123123'),
(4, '54353', 'marxia', 'holiday', '123213', '2016-05-04', '2016-05-06', '123', NULL, NULL, NULL, NULL, '123', '1231', '123', 100, '123123', NULL, NULL, NULL, '1231231');

-- --------------------------------------------------------

--
-- Table structure for table `holidayinfo`
--

CREATE TABLE IF NOT EXISTS `holidayinfo` (
  `HID` int(11) NOT NULL AUTO_INCREMENT,
  `From` date NOT NULL,
  `To` date NOT NULL,
  `DN` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  PRIMARY KEY (`HID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaveinfo`
--

CREATE TABLE IF NOT EXISTS `leaveinfo` (
  `LID` int(11) NOT NULL AUTO_INCREMENT,
  `CN` int(11) NOT NULL,
  `From` date NOT NULL,
  `To` date NOT NULL,
  `DN` int(11) NOT NULL,
  `LeaveType` varchar(10) NOT NULL,
  `Reason` varchar(60) NOT NULL,
  `Issuedby` varchar(60) NOT NULL,
  PRIMARY KEY (`LID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `leaveinfo`
--

INSERT INTO `leaveinfo` (`LID`, `CN`, `From`, `To`, `DN`, `LeaveType`, `Reason`, `Issuedby`) VALUES
(23, 1268, '2016-05-05', '2016-05-07', 0, 'kjb', 'vjhvj', '321'),
(24, 1268, '2016-05-04', '2016-05-07', 0, 'sdfsd', 'sdfds', 'fsdf'),
(25, 1268, '2016-05-03', '2016-05-05', 0, 'asdasd', 'asdasd', 'sadasd');

-- --------------------------------------------------------

--
-- Table structure for table `leavesettings`
--

CREATE TABLE IF NOT EXISTS `leavesettings` (
  `Type` varchar(20) NOT NULL,
  `Symbol` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavesettings`
--

INSERT INTO `leavesettings` (`Type`, `Symbol`) VALUES
('sad', 'sa'),
('sdad', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `logindata`
--

CREATE TABLE IF NOT EXISTS `logindata` (
  `Username` varchar(80) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `UID` int(11) NOT NULL,
  `CardNo` int(11) NOT NULL,
  `Type` varchar(10) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `CardNo` (`CardNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindata`
--

INSERT INTO `logindata` (`Username`, `Password`, `UID`, `CardNo`, `Type`) VALUES
('Aimal', 'abc123', 2212, 320, 'Admin'),
('Abdullah', 'nonecandoit', 2870, 1268, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `SNO` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mon` int(11) DEFAULT NULL,
  `tue` int(11) DEFAULT NULL,
  `wed` int(11) DEFAULT NULL,
  `thu` int(11) DEFAULT NULL,
  `fri` int(11) DEFAULT NULL,
  `sat` int(11) DEFAULT NULL,
  `sun` int(11) DEFAULT NULL,
  PRIMARY KEY (`SNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shiftschedule`
--

CREATE TABLE IF NOT EXISTS `shiftschedule` (
  `CN` int(11) NOT NULL,
  `shiftNo` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shifttime`
--

CREATE TABLE IF NOT EXISTS `shifttime` (
  `SNO` int(11) NOT NULL AUTO_INCREMENT,
  `ShiftName` varchar(30) NOT NULL,
  `CIn1` time DEFAULT NULL,
  `COut1` time DEFAULT NULL,
  `CIn2` time DEFAULT NULL,
  `COut2` time DEFAULT NULL,
  `LateIn` int(11) NOT NULL,
  `EarlyOut` int(11) NOT NULL,
  PRIMARY KEY (`SNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `UID` int(11) NOT NULL,
  `CN` int(11) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `EID` varchar(80) NOT NULL,
  `PN` varchar(20) NOT NULL,
  `DID` int(11) DEFAULT NULL,
  UNIQUE KEY `UID` (`UID`,`CN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`UID`, `CN`, `Name`, `EID`, `PN`, `DID`) VALUES
(2870, 1268, 'Muhammad Abdullah Khan', '12bscsakhan', '03085293501', 102);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
