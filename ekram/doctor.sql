-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2015 at 06:10 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `er_info`
--

CREATE TABLE IF NOT EXISTS `er_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` int(10) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `er_info`
--

INSERT INTO `er_info` (`id`, `name`, `email`, `number`, `lat`, `lng`) VALUES
(1, 'Ekram', 'ekramulhq26@gmail.com', 1776368998, '23.7806', '90.3936'),
(8, 'Khaled', 'khaled@gmail.com', 1711520122, '23.78436302593396', '90.49281437587888'),
(9, 'Tabir', 'aasdasd@gmail.com', 34234234, '23.739744048509188', '90.19549687099607'),
(10, 'Omar', 'asdasd@gmail.com', 9089089, '23.827357145735853', '90.12364585590512');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
