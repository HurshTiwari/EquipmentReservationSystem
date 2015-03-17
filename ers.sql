-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2015 at 07:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ers`
--

-- --------------------------------------------------------

--
-- Table structure for table `addusers`
--

CREATE TABLE IF NOT EXISTS `addusers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `tempaddress` text,
  `peraddress` text,
  `phoneno` varchar(10) DEFAULT NULL,
  `rollno` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `addusers`
--

INSERT INTO `addusers` (`id`, `name`, `password`, `email`, `photo`, `tempaddress`, `peraddress`, `phoneno`, `rollno`) VALUES
(1, 'phd1000001', 'iit', 'phd1000001@iiti.ac.in', NULL, NULL, NULL, NULL, '1000001'),
(2, 'asdja', 'asdhabsd', 'SDKJFS@IITI.AC.IN', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `emailid` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `tempaddress` text,
  `peraddress` text,
  `phoneno` varchar(10) DEFAULT NULL,
  `rollno` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `emailid`, `photo`, `tempaddress`, `peraddress`, `phoneno`, `rollno`) VALUES
(1, 'admin', 'iit', 'admin@iiti.ac.in', '/img/admin/1', '1', '1', '100001011', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminbookings`
--

CREATE TABLE IF NOT EXISTS `adminbookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `starttime` timestamp NOT NULL,
  `endtime` timestamp NOT NULL,
  `userid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  PRIMARY KEY (`id`,`userid`,`eid`),
  KEY `userid` (`userid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `starttime` timestamp NOT NULL,
  `endtime` timestamp NOT NULL,
  `userid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  PRIMARY KEY (`id`,`userid`,`eid`),
  KEY `bookings_ibfk_2` (`eid`),
  KEY `bookings_ibfk_1` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `date`, `starttime`, `endtime`, `userid`, `eid`) VALUES
(2, '2015-03-17 00:00:00', '2015-03-17 14:01:33', '2015-03-17 14:01:33', 1, 2),
(3, '2015-03-17 00:00:00', '2015-03-17 14:04:35', '2015-03-17 14:04:35', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `name`, `description`, `image`) VALUES
(1, 'equip1', '', '/img/equip/1.jpg'),
(2, 'equip2', '', '/img/equip/2.jpg'),
(3, 'equipment3', '', '/img/equip/3.jpg'),
(4, 'equipment4', '', '/img/equip/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`datetime`) VALUES
('2015-02-08 14:54:35'),
('1970-01-01 05:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `tempaddress` text,
  `peraddress` text,
  `phoneno` varchar(10) DEFAULT NULL,
  `rollno` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `photo`, `tempaddress`, `peraddress`, `phoneno`, `rollno`) VALUES
(1, 'hursh', 'iit', '123@iiti.ac.in', '/img/user/1', '127', '123', '900909090', '100000001'),
(2, 'manish', 'iit', 'manish@iiti.ac.in', '/img/user/2', '1231', '111', '000999000', '100000002');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `equipments` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
