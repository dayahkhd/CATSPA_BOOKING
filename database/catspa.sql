-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2021 at 03:55 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catspa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `aemail` varchar(30) NOT NULL,
  `apword` varchar(30) NOT NULL,
  `status` int(5) NOT NULL COMMENT '1-admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `aemail`, `apword`, `status`) VALUES
(1, 'admin@gmail.com', 'ad123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE IF NOT EXISTS `age` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `caname` text NOT NULL,
  `castatus` int(5) NOT NULL COMMENT '1-available, 2-unavailable',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`id`, `caname`, `castatus`) VALUES
(1, 'Kitten', 1),
(2, 'Adult', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_cust` int(2) NOT NULL,
  `adate` date NOT NULL,
  `atime` varchar(10) NOT NULL,
  `apackage` varchar(10) NOT NULL,
  `cname` text NOT NULL,
  `csex` int(2) NOT NULL,
  `ccoat` int(2) NOT NULL,
  `cage` int(2) NOT NULL,
  `aptstatus` int(2) NOT NULL COMMENT '1 - in process, 2 - accepted, 3 - declined',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aptstatus`
--

CREATE TABLE IF NOT EXISTS `aptstatus` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `aptstname` text NOT NULL,
  `astatus` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aptstatus`
--

INSERT INTO `aptstatus` (`id`, `aptstname`, `astatus`) VALUES
(1, 'In Process', 1),
(2, 'Accepted', 1),
(3, 'Declined', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coat`
--

CREATE TABLE IF NOT EXISTS `coat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ccname` text NOT NULL,
  `ccstatus` int(5) NOT NULL COMMENT '1-available, 2-unavailable',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `coat`
--

INSERT INTO `coat` (`id`, `ccname`, `ccstatus`) VALUES
(1, 'Short Hair', 1),
(2, 'Long Hair', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `coname` text NOT NULL,
  `comail` varchar(50) NOT NULL,
  `coenquiry` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` text,
  `lname` text,
  `email` varchar(30) DEFAULT NULL,
  `pword` varchar(30) DEFAULT NULL,
  `pnum` varchar(15) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL COMMENT '2-customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gtime`
--

CREATE TABLE IF NOT EXISTS `gtime` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tname` text NOT NULL,
  `tstatus` int(5) NOT NULL COMMENT '1-available, 2-unavailable',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gtime`
--

INSERT INTO `gtime` (`id`, `tname`, `tstatus`) VALUES
(1, '10.00 a.m', 1),
(2, '12.00 p.m', 1),
(3, '2.00 p.m', 1),
(4, '4.00 p.m', 1),
(5, '6.00 p.m', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pname` text NOT NULL,
  `pdesc` text NOT NULL,
  `pprice` varchar(10) NOT NULL,
  `pstatus` int(5) NOT NULL COMMENT '1- active 0-deactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `pname`, `pdesc`, `pprice`, `pstatus`) VALUES
(1, 'Basic Grooming', 'Clipping Nails', 'RM10', 1),
(2, 'Medicated', 'Specific brand of shampoo is used for sensitive skin', 'RM 30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE IF NOT EXISTS `sex` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `sname` text NOT NULL,
  `sstatus` int(5) NOT NULL COMMENT '1-available, 2-unavailable',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `sname`, `sstatus`) VALUES
(1, 'Male', 1),
(2, 'Female', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
