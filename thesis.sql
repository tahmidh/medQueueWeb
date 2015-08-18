-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2015 at 02:40 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_details`
--

CREATE TABLE IF NOT EXISTS `app_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `app_fname` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_phone` varchar(255) NOT NULL,
  `app_reason` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `app_details`
--

INSERT INTO `app_details` (`id`, `app_fname`, `app_email`, `app_phone`, `app_reason`) VALUES
(1, 'Russel', 'russel@f.com', '4135', 'abc'),
(2, 'abc', 'abc@xyz.com', '123456', 'acvb'),
(3, 'abc', 'abc@abd.com', '123', 'abshdk'),
(4, 'adad', 'adad', '312', 'daad'),
(5, 'omar', 'omar@omar.com', '121', 'jhfb'),
(6, 'omar', 'omar@omar.com', 'da', 'fff'),
(7, 'omar', 'omar@omar.com', '21', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doc_appointment`
--

CREATE TABLE IF NOT EXISTS `doc_appointment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `book_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `notes` text,
  `id_doctor` int(10) NOT NULL,
  `id_patient` int(10) NOT NULL,
  `services_name` varchar(255) NOT NULL,
  `id_appdetails` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `doc_appointment`
--

INSERT INTO `doc_appointment` (`id`, `book_date`, `start_time`, `end_time`, `notes`, `id_doctor`, `id_patient`, `services_name`, `id_appdetails`) VALUES
(1, '2015-08-13', '18:00:00', '19:00:00', NULL, 2, 0, 'dental service ', 0),
(2, '2015-08-13', '10:00:00', '11:00:00', NULL, 2, 0, 'dental service ', 0),
(3, '2015-08-14', '18:00:00', '19:00:00', NULL, 2, 0, 'dental service ', 4),
(4, '2015-08-13', '16:00:00', '17:00:00', NULL, 2, 2, 'dental service ', 5),
(5, '2015-08-13', '15:00:00', '15:30:00', NULL, 2, 2, 'Orthopedic', 6),
(6, '2015-08-15', '16:00:00', '18:00:00', NULL, 2, 2, 'dental service ', 7);

-- --------------------------------------------------------

--
-- Table structure for table `doc_qualifications`
--

CREATE TABLE IF NOT EXISTS `doc_qualifications` (
  `id` int(10) NOT NULL,
  `qualifications` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `specialities` varchar(255) DEFAULT NULL,
  `hospitals` varchar(255) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `professional_det` text,
  `shortbio` text,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc_services`
--

CREATE TABLE IF NOT EXISTS `doc_services` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `currency` varchar(32) DEFAULT NULL,
  `description` text,
  `service_categories` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `doc_services`
--

INSERT INTO `doc_services` (`id`, `name`, `duration`, `price`, `currency`, `description`, `service_categories`, `user_id`) VALUES
(1, 'dental service ', 120, '200.00', 'adsasd', 'contactlist', 'Dental ', 2),
(2, 'dental service', 60, '100.00', 'adsasd', 'contactlist', 'Dental', 6),
(3, 'Orthopedic', 120, '2000.00', 'taka', 'mypopulation', ' Orthopedic ', 2),
(4, 'dental serv', 120, '2000.00', 'taka', NULL, 'Dental', 5);

-- --------------------------------------------------------

--
-- Table structure for table `doc_workplan`
--

CREATE TABLE IF NOT EXISTS `doc_workplan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `workplan` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `doc_workplan`
--

INSERT INTO `doc_workplan` (`id`, `user_id`, `workplan`) VALUES
(1, 2, '{"Saturday":"","Sunday":{"start":"10:00:00","end":"22:00:00","break":{"start":"13:00:00","end":"14:00:00"}},"Monday":{"start":"10:00:00","end":"22:00:00","break":{"start":"13:00:00","end":"14:00:00"}},"Tuesday":{"start":"10:00:00","end":"22:00:00","break":{"start":"13:00:00","end":"14:00:00"}},"Wednesday":{"start":"10:00:00","end":"22:00:00","break":{"start":"13:00:00","end":"14:00:00"}},"Thursday":{"start":"10:00:00","end":"22:00:00","break":{"start":"13:00:00","end":"14:00:00"}},"Friday":""}'),
(2, 6, '{"Saturday":"","Sunday":"","Monday":{"start":"10:00:00","end":"22:00:00","break":{"start":"13:00:00","end":"16:00:00"}},"Tuesday":{"start":"10:00:00","end":"22:00:00","break":{"start":"13:00:00","end":"18:00:00"}},"Wednesday":"","Thursday":"","Friday":""}');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip_code` varchar(8) DEFAULT NULL,
  `notes` text,
  `login_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_id` (`login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `notes`, `login_id`) VALUES
(5, 'omar', 'khan', 'omar@omar.com', '8784784', '8484', 'sadsa', 'Dhaka', 'Bangladesh', '2121', 'dasadasdas', 2),
(6, 'Tahmid', 'Hasan', 'tahmid@gmail.com', '012321', '123214', 'masdoams', 'Dhaka', 'Bangladesh', '1230', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_type` varchar(10) NOT NULL,
  `first` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `u_email` (`u_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`uid`, `u_name`, `u_email`, `u_password`, `u_type`, `first`) VALUES
(1, 'contactlist', 'omer_alone2032@yahoo.com', 'e1d5be1c7f2f456670de3d53c7b54f4a', 'doctor', 'true'),
(2, 'omar', 'omar@omar.com', '202cb962ac59075b964b07152d234b70', 'doctor', 'true'),
(3, 'omar khan', 'omr@omr.com', '202cb962ac59075b964b07152d234b70', 'doctor', 'true'),
(4, 'Javed', 'j@j.com', '202cb962ac59075b964b07152d234b70', 'patient', 'true'),
(5, 'Ahmed', 'ah@ah.com', '202cb962ac59075b964b07152d234b70', 'patient', 'false'),
(6, 'Tahmid', 'tahmid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'doctor', 'false');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
