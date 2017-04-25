-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2015 at 05:27 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbi`
--

CREATE TABLE IF NOT EXISTS `cbi` (
  `complaint_id` varchar(20) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `officer_id` (`officer_id`),
  KEY `complaint_id` (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `charge_sheet`
--

CREATE TABLE IF NOT EXISTS `charge_sheet` (
  `complaint_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE IF NOT EXISTS `citizen` (
  `aadhar_id` varchar(20) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `s_name` varchar(25) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`aadhar_id`),
  KEY `aadhar_id` (`aadhar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`aadhar_id`, `f_name`, `s_name`, `contact`, `dob`) VALUES
('100', 'vivek', 'anand', '922', '2015-04-08'),
('101', 'shaiwal ', 'sachdev', '923', '2015-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_complaint`
--

CREATE TABLE IF NOT EXISTS `citizen_complaint` (
  `complaint_id` varchar(20) NOT NULL,
  `aadhar_id` varchar(20) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `aadhar_id` (`aadhar_id`),
  KEY `aadhar_id_2` (`aadhar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `complaint_id` varchar(20) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `officer_id` (`officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `court_order`
--

CREATE TABLE IF NOT EXISTS `court_order` (
  `complaint_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE IF NOT EXISTS `criminal` (
  `f_name` varchar(20) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `street` varchar(25) NOT NULL,
  `city` varchar(20) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `fingerprint` varchar(20) NOT NULL,
  PRIMARY KEY (`fingerprint`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criminal_record`
--

CREATE TABLE IF NOT EXISTS `criminal_record` (
  `complaint_id` varchar(20) NOT NULL DEFAULT 'not null',
  `fingerprint` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `fingerprint` (`fingerprint`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cybercrime`
--

CREATE TABLE IF NOT EXISTS `cybercrime` (
  `complaint_id` varchar(20) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `officer_id` (`officer_id`),
  KEY `complaint_id` (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE IF NOT EXISTS `fir` (
  `complaint_id` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `name` varchar(20) CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fir`
--

INSERT INTO `fir` (`complaint_id`, `date`, `description`, `name`) VALUES
('2112', '21/2/14', 'Killing his girlfriend', 'vivek'),
('a', 'a', 'a', 'a'),
('aid2011', '2/4/15', 'caught in killing others', 'shaiwal sachdev'),
('asa', 'asa', 'asa', 'anurag das'),
('b', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE IF NOT EXISTS `general` (
  `complaint_id` varchar(20) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `officer_id` (`officer_id`),
  KEY `officer_id_2` (`officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `megistrate`
--

CREATE TABLE IF NOT EXISTS `megistrate` (
  `f_name` varchar(20) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `officer_record`
--

CREATE TABLE IF NOT EXISTS `officer_record` (
  `f_name` varchar(20) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(5) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  PRIMARY KEY (`officer_id`),
  KEY `officer_id` (`officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer_record`
--

INSERT INTO `officer_record` (`f_name`, `s_name`, `dob`, `gender`, `contact`, `officer_id`) VALUES
('Ashok', 'daga', '2013-05-07', 'm', '98000909', '001'),
('anand', 'kumar', '2015-04-08', 'm', '32312312', '002');

-- --------------------------------------------------------

--
-- Table structure for table `officer_work`
--

CREATE TABLE IF NOT EXISTS `officer_work` (
  `station_id` varchar(20) NOT NULL,
  `DoJ` date NOT NULL,
  `designation` varchar(20) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  PRIMARY KEY (`officer_id`),
  KEY `officer_id` (`officer_id`),
  KEY `officer_id_2` (`officer_id`),
  KEY `station_id` (`station_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer_work`
--

INSERT INTO `officer_work` (`station_id`, `DoJ`, `designation`, `officer_id`) VALUES
('1212', '2015-04-07', 'dsp', '001'),
('1212', '2015-04-08', 'dsp', '002');

-- --------------------------------------------------------

--
-- Table structure for table `police_station`
--

CREATE TABLE IF NOT EXISTS `police_station` (
  `name` varchar(20) NOT NULL,
  `station_id` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  PRIMARY KEY (`station_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `traffic_control`
--

CREATE TABLE IF NOT EXISTS `traffic_control` (
  `complaint_id` varchar(20) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `officer_id` (`officer_id`),
  KEY `complaint_id` (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `witnesses`
--

CREATE TABLE IF NOT EXISTS `witnesses` (
  `complaint_id` varchar(20) NOT NULL,
  `aadhar_id` varchar(20) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `womenprotection`
--

CREATE TABLE IF NOT EXISTS `womenprotection` (
  `complaint_id` varchar(20) NOT NULL,
  `officer_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `officer_id` (`officer_id`),
  KEY `complaint_id` (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cbi`
--
ALTER TABLE `cbi`
  ADD CONSTRAINT `cbi_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer_record` (`officer_id`),
  ADD CONSTRAINT `cbi_ibfk_2` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`);

--
-- Constraints for table `citizen_complaint`
--
ALTER TABLE `citizen_complaint`
  ADD CONSTRAINT `citizen_complaint_ibfk_1` FOREIGN KEY (`aadhar_id`) REFERENCES `citizen` (`aadhar_id`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer_record` (`officer_id`);

--
-- Constraints for table `criminal_record`
--
ALTER TABLE `criminal_record`
  ADD CONSTRAINT `criminal_record_ibfk_1` FOREIGN KEY (`fingerprint`) REFERENCES `criminal` (`fingerprint`);

--
-- Constraints for table `cybercrime`
--
ALTER TABLE `cybercrime`
  ADD CONSTRAINT `cybercrime_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer_record` (`officer_id`),
  ADD CONSTRAINT `cybercrime_ibfk_2` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`);

--
-- Constraints for table `general`
--
ALTER TABLE `general`
  ADD CONSTRAINT `general_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer_record` (`officer_id`);

--
-- Constraints for table `officer_work`
--
ALTER TABLE `officer_work`
  ADD CONSTRAINT `officer_work_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer_record` (`officer_id`);

--
-- Constraints for table `traffic_control`
--
ALTER TABLE `traffic_control`
  ADD CONSTRAINT `traffic_control_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer_record` (`officer_id`),
  ADD CONSTRAINT `traffic_control_ibfk_2` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`);

--
-- Constraints for table `womenprotection`
--
ALTER TABLE `womenprotection`
  ADD CONSTRAINT `womenprotection_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer_record` (`officer_id`),
  ADD CONSTRAINT `womenprotection_ibfk_2` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
