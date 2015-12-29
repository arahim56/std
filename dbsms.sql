-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2014 at 09:48 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsms`
--
CREATE DATABASE IF NOT EXISTS `dbsms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbsms`;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countryId` (`countryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `countryId`) VALUES
(2, 'Dhaka', 1),
(3, 'Khulna', 1),
(4, 'New Delhi', 3),
(6, 'Mumbai', 3),
(7, 'Korachi', 4),
(8, 'Lahore', 4),
(9, 'Kathmundu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Bangladesh'),
(3, 'Hindustan'),
(4, 'Na Pakistan'),
(5, 'Nepali');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `departmentId` int(11) DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sylebus` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departmentId` (`departmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `departmentId`, `fee`, `duration`, `link`, `sylebus`, `description`) VALUES
(8, 'PHP & MYSQL', 3, 5000, 4000, 'www.php.net', 'pdf', 'na'),
(9, 'Linux', 3, 5000, 700, 'www.php.net', 'pdf', 'na'),
(10, 'Auto CAD', 3, 6000, 3000, 'www.fb.com', 'pdf', 'yes'),
(11, '3D studio Max', 2, 41000, 150, 'www.bds.com', 'pdf', 'haaaaaaaaaaaa'),
(12, 'Graphics Design', 1, 6000, 4000, 'www.h2b.com', 'docx', 'hehehe'),
(13, 'Java & Oracle 11g', 2, 70000, 4500, 'www.dbs.com', 'txt', 'faaaaaaaaaa'),
(14, 'VMware', 3, 6700, 500, 'www.fb.com', 'pdf', 'kkr'),
(15, 'Windows Server 2012', 3, 8000, 100, 'www.pdb.com', 'pdf', 'hasan'),
(16, 'Mircosoft Exchange Server', 3, 9000, 500, 'www.fb.com', 'pdf', 'HHDD'),
(17, 'MIRCOSOFT TC', 3, 20000, 43, 'www.h2b.com', 'txt', 'HD');

-- --------------------------------------------------------

--
-- Table structure for table `coursevsstudent`
--

CREATE TABLE IF NOT EXISTS `coursevsstudent` (
  `courseId` int(11) NOT NULL DEFAULT '0',
  `studentId` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `result` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`courseId`,`studentId`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursevsstudent`
--

INSERT INTO `coursevsstudent` (`courseId`, `studentId`, `date`, `enddate`, `result`) VALUES
(8, 1, '2014-09-10', '2014-11-10', 'NULL'),
(8, 2, '2014-09-10', '2014-11-10', 'NULL'),
(8, 4, '2014-09-10', '2014-11-10', 'NULL'),
(8, 5, '2014-09-01', '2014-11-01', 'NULL'),
(8, 8, '2013-09-08', '2014-01-20', 'good'),
(8, 9, '2014-09-10', '2014-11-01', 'NULL'),
(8, 10, '2014-08-10', '2014-11-01', 'NULL'),
(8, 12, '2013-09-08', '2014-11-01', 'NULL'),
(9, 1, '2014-07-10', '2014-08-10', 'NULL'),
(9, 8, '2013-09-08', '2014-01-10', 'NULL'),
(9, 11, '2014-08-10', '2014-11-01', 'NULL'),
(10, 1, '2013-09-08', '2014-02-01', 'good'),
(10, 4, '2013-03-08', '2014-01-10', 'good'),
(10, 5, '2014-09-10', '2014-11-01', 'NULL'),
(10, 6, '2014-08-10', '2014-11-10', 'NULL'),
(10, 15, '2014-09-01', '2014-11-10', 'NULL'),
(11, 7, '2014-09-08', '2014-11-01', 'NULL'),
(11, 11, '2014-09-10', '2014-11-01', 'NULL'),
(12, 4, '2014-07-10', '2014-08-10', 'NULL'),
(12, 12, '2014-08-10', '2014-11-10', 'NULL'),
(13, 10, '2013-09-08', '2014-11-01', 'NULL'),
(13, 15, '2013-09-08', '2014-01-20', 'good'),
(14, 12, '2014-08-10', '2014-11-01', 'NULL'),
(15, 2, '2014-06-10', '2014-08-10', 'good'),
(15, 6, '2013-03-08', '2014-08-10', 'good'),
(15, 11, '2014-09-01', '2014-11-01', 'NULL'),
(16, 4, '2013-03-08', '2014-01-20', 'good'),
(17, 5, '2013-11-08', '2014-02-01', 'NULL'),
(17, 7, '2014-07-10', '2014-11-10', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`) VALUES
(1, 'Science', 'na'),
(2, 'Arts', 'Arts Subjects'),
(3, 'Technical', 'Short Courses');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dateofBirth` date DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(2) NOT NULL DEFAULT 'R',
  PRIMARY KEY (`id`),
  KEY `cityId` (`cityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `contact`, `email`, `dateofBirth`, `gender`, `address`, `cityId`, `cv`, `password`, `type`) VALUES
(1, 'Fatema Begum', '019177554312', 'fm@gmail.com', '1990-12-15', b'1', 'na', 2, 'pdf', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'A'),
(2, 'Korim', '6757567', 'karim@yahoo.com', '1995-10-07', b'0', 'na', 3, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'U'),
(4, 'Rahim', '01738383838383838383', 'rahim@yahoo.com', '1995-03-08', b'0', 'Mirpur', 3, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(5, 'Palash', '0191234567', 'palash@hotmail.com', '1995-03-07', b'0', 'Dhanmond', 2, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(6, 'Hasan', '01843567829', 'hasan@gmail.com', '1995-03-08', b'0', 'Mirpur', 2, 'pdf', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(7, 'Tariqul Islamc', '01744453131', 'tariqul.relymax@yahoo.com', '0000-00-00', b'0', 'Mirpur-1', 2, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(8, 'sofiqul', '0174445312', 'sofiqu@gmail.com', '0000-00-00', b'0', 'rangpur', 7, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(9, 'dolcar', '01744453178', 'dolar@yahoo.com', '1995-03-08', b'0', 'Mirpur', 2, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(10, 'Monzil', '0178965431', 'monzil@gmail.com', '1992-03-07', b'0', 'Narayangong', 2, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(11, 'Biplob', '0174567992', 'biplob@gmail.coom', '1991-10-07', b'0', 'Narayangong', 2, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(12, 'Sumi', '01987654346', 'sumi@yahoo.com', '1990-12-15', b'1', 'djfkjdj', 2, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R'),
(15, 'bonna', '01876543212', 'ase@yahoo.com', '1988-12-10', b'1', 'queen', 9, 'docx', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `studentimage`
--

CREATE TABLE IF NOT EXISTS `studentimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `studentimage`
--

INSERT INTO `studentimage` (`id`, `studentId`, `image`, `date`, `description`) VALUES
(2, 1, 'jpg', '2014-09-10', 'aj k tola na, ager'),
(3, 2, 'jpg', '2014-09-10', 'class a asena'),
(5, 4, 'jpg', '2014-09-10', 'mota but gof ase'),
(6, 5, 'jpg', '2014-09-10', 'program banay kusi ase'),
(7, 6, 'jpg', '2014-09-10', 'Facebook pagol'),
(8, 8, 'jpg', '2014-09-10', 'valo sele'),
(10, 11, 'jpg', '2014-09-10', 'valo'),
(12, 2, 'jpg', '2014-09-10', 'good'),
(13, 15, 'jpg', '2014-09-10', 'pengunies'),
(14, 10, 'jpg', '2014-09-10', 'Butiful'),
(15, 12, 'jpg', '2014-09-10', 'picture'),
(16, 5, 'jpg', '2014-09-10', 'programmer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`);

--
-- Constraints for table `coursevsstudent`
--
ALTER TABLE `coursevsstudent`
  ADD CONSTRAINT `coursevsstudent_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `coursevsstudent_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`cityId`) REFERENCES `city` (`id`);

--
-- Constraints for table `studentimage`
--
ALTER TABLE `studentimage`
  ADD CONSTRAINT `studentimage_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
