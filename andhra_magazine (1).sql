-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2014 at 07:55 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andhra_magazine`
--
CREATE DATABASE IF NOT EXISTS `andhra_magazine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `andhra_magazine`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'subbu', 'subbu');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title_id` bigint(20) NOT NULL,
  `choice` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `title_id`, `choice`) VALUES
(1, 1, 'Jr.NTR'),
(2, 1, 'Pawan Kalyan'),
(3, 2, 'Is Modi working hard'),
(4, 2, 'Is Congress Better'),
(5, 3, 'India'),
(6, 4, 'yes'),
(7, 4, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`) VALUES
(1, 'Rabhasa audio function latest HD Pics'),
(2, 'Samantha new look in Rabhasa'),
(3, 'Best Facebook cover pics for boys'),
(4, 'Best Facebook cover pics for Girls. ');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint(20) NOT NULL,
  `image_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image_name`) VALUES
(1, 1, 'assets/images/_slider_simple/2.jpg'),
(2, 1, 'assets/images/_slider_simple/1.jpg'),
(3, 1, 'assets/images/_slider_simple/3.jpg'),
(4, 1, 'assets/images/_slider_simple/4.jpg'),
(5, 1, 'assets/images/_slider_simple/3.jpg'),
(6, 1, 'assets/images/_slider_simple/4.jpg'),
(7, 1, 'assets/images/_slider_simple/1.jpg'),
(8, 1, 'assets/images/_slider_simple/2.jpg'),
(9, 1, 'assets/images/_slider_simple/2.jpg'),
(10, 1, 'assets/images/_slider_simple/2.jpg'),
(11, 1, 'assets/images/_slider_simple/3.jpg'),
(12, 4, 'assets/images/_slider_simple/3.jpg'),
(13, 3, 'assets/images/_slider_simple/3.jpg'),
(14, 2, 'assets/images/_slider_simple/3.jpg'),
(15, 2, 'assets/images/_slider_simple/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `movie_title` text NOT NULL,
  `movie_description` longtext NOT NULL,
  `movie_image` varchar(255) NOT NULL,
  `movie_tags` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `political`
--

CREATE TABLE IF NOT EXISTS `political` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `political_title` text NOT NULL,
  `political_description` longtext NOT NULL,
  `political_image` varchar(255) NOT NULL,
  `political_tags` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`) VALUES
(1, 'Who is the Best actor'),
(2, 'General People Openion'),
(3, 'Who will win in Olympics'),
(4, 'India is developed country. Is it?');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `choice_id` bigint(20) NOT NULL,
  `title_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `choice_id`, `title_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 2, 1),
(5, 3, 2),
(6, 3, 2),
(7, 5, 3),
(8, 6, 3),
(9, 2, 1),
(10, 2, 1),
(11, 1, 1),
(12, 2, 1),
(13, 1, 1),
(14, 2, 1),
(15, 1, 1),
(16, 1, 1),
(17, 1, 1),
(18, 2, 1),
(19, 1, 1),
(20, 5, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
