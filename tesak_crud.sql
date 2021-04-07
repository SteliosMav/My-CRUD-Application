-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2021 at 06:59 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesak_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `datetime_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `description`, `datetime_created`) VALUES
(4, 'Finance', 'this is finance department', '2021-04-02 00:06:11'),
(6, 'H-R', 'This is H-R Department', '2021-04-02 00:23:33'),
(7, 'Accounts', 'This is Accounts Department', '2021-04-02 15:26:48'),
(8, 'I-T', 'This is Information Technology Department', '2021-04-02 22:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `departments` varchar(50) NOT NULL,
  `datetime_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `departments`, `datetime_created`) VALUES
(6, 'Anna', 'ana20@yahoo.com', 'il123', 'Finance', '2021-04-02 00:19:38'),
(7, 'Kostas', 'kostas123@gmail.com', 'in123', 'I-T', '2021-04-02 00:19:58'),
(8, 'Stelios', 'steliosmavrokoy@gmail.com', '8886123', 'H-R', '2021-04-02 00:24:55'),
(10, 'Dimitris', 'dimitri2393@gmail.com', 'ma123@@', 'H-R', '2021-04-02 15:26:03'),
(11, 'Giannis', 'giannis3@gmail.com', 'john234@', 'Accounts', '2021-04-02 15:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_department`
--

DROP TABLE IF EXISTS `user_department`;
CREATE TABLE IF NOT EXISTS `user_department` (
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  PRIMARY KEY (`u_id`,`d_id`),
  KEY `Fk_Dept_Id` (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_department`
--

INSERT INTO `user_department` (`u_id`, `d_id`) VALUES
(6, 4),
(7, 8),
(8, 6),
(10, 6),
(11, 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_department`
--
ALTER TABLE `user_department`
  ADD CONSTRAINT `Fk_Dept_Id` FOREIGN KEY (`d_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `Fk_User_Id` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
