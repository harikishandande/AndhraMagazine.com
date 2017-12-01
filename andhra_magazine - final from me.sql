-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2014 at 10:44 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andhra_magazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'subbu', 'subbu', 'administrator'),
(6, 'kishan', 'kishan', 'Controller'),
(7, 'harsha', 'harsha', 'Controller');

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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(767) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `comment_time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_title`, `name`, `email`, `comment`, `comment_time_stamp`) VALUES
(26, 'Movie title of one', 'kishan', 'harikishan2014@outlook.com', 'article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article ', '2014-08-12 21:35:15'),
(27, 'Movie title of one', 'awery', 'kishanking360@gmail.com', '$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);$query->bindValue("1", $movie_title);\r\n				$query->bindValue("2", $old_movie_title);', '2014-08-12 21:37:37'),
(28, 'Political Title One two', 'kishan', 'kishanking360', '					$_SESSION[''old_movie_title''] = $movie_title;\r\n					$_SESSION[''old_movie_title''] = $movie_title;\r\n					$_SESSION[''old_movie_title''] = $movie_title;\r\n					$_SESSION[''old_movie_title''] = $movie_title;\r\n					$_SESSION[''old_movie_title''] = $movie_title;\r\n', '2014-08-12 21:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(767) NOT NULL,
  `message` longtext NOT NULL,
  `time_stamp` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`, `time_stamp`) VALUES
(5, 'kishan', 'kishanking360@gmail.com', 'dfhddjh', 'sdfghjz sgdhfjgy sgdhfjgk sdfghj dfgh sdfghjz sgdhfjgy sgdhfjgk sdfghj dfgh sdfghjz sgdhfjgy sgdhfjgk sdfghj dfgh sdfghjz sgdhfjgy sgdhfjgk sdfghj dfgh sdfghjz sgdhfjgy sgdhfjgk sdfghj dfgh sdfghjz sgdhfjgy sgdhfjgk sdfghj dfgh sdfghjz sgdhfjgy sgdhfjgk sdfghj dfgh sdfghjz sgdhfjgy sgdhfjgk sdfghj dfgh ', '2014-08-15 05:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `phone`, `email`) VALUES
(1, 8686401033, 'harikishan2014@outlook.com');

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
  `movie_title` varchar(767) NOT NULL,
  `movie_description` longtext NOT NULL,
  `movie_image` varchar(255) NOT NULL DEFAULT 'sample.jpg',
  `movie_tags` varchar(255) NOT NULL,
  `movie_username` varchar(255) NOT NULL,
  `movie_time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `movie_title` (`movie_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_title`, `movie_description`, `movie_image`, `movie_tags`, `movie_username`, `movie_time_stamp`) VALUES
(31, 'Movie title of one', 'article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article article ', '3085angry_birds___space-wallpaper-1366x768.jpg,1753angry_birds_space-wallpaper-1366x768.jpg,9591assassins_creed_iv_2-wallpaper-1366x768.jpg', 'tag1,tag2', 'subbu', '2014-08-12 21:34:38'),
(32, 'movie yucyfvy', 'movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy movie yucyfvy ', '9612and_the_world_will_sleep_too-wallpaper-1366x768.jpg,205angry_birds___red_bird-wallpaper-1366x768.jpg,7248attom-wallpaper-1366x768.jpg', 'fsegsd,fsadgvsdgds,sdgdsgds', 'subbu', '2014-08-14 10:01:46'),
(34, 'movie blaf;sd'' asfsdgb ', 'movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb movie blaf;sd'' asfsdgb ', '353and_the_world_will_sleep_too-wallpaper-1366x768.jpg,4977angry_birds___red_bird-wallpaper-1366x768.jpg,3114angry_birds_space-wallpaper-1366x768.jpg', 'iykutrhdg,tyhrdgrsf,thd', 'subbu', '2014-08-14 10:02:40'),
(35, 'movie oijhuvjbklhvkblj vkjblnjkjvhk ', 'movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk movie oijhuvjbklhvkblj vkjblnjkjvhk ', '9888and_the_world_will_sleep_too-wallpaper-1366x768.jpg,2899angry_birds___red_bird-wallpaper-1366x768.jpg,401angry_birds_space-wallpaper-1366x768.jpg,3045assassins_creed_iv_2-wallpaper-1366x768.jpg', 'wertf,wertyu,werty', 'subbu', '2014-08-14 10:03:06'),
(36, 'movie movie hvjbj nj m', 'movie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj mmovie movie hvjbj nj m', '652ace_combat_infinity-1366x768.jpg,7197and_the_world_will_sleep_too-wallpaper-1366x768.jpg,1015assassins_creed_iv_2-wallpaper-1366x768.jpg', 'tryuio,werdtfygf,sdfgh', 'subbu', '2014-08-14 10:03:41'),
(38, 'sri ytuiop ytuytio ', 'sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio sri ytuiop ytuytio ', '4901batman_arkham_origins_12-wallpaper-1366x768.jpg,7488batman_design-wallpaper-1366x768.jpg,6187batman_knight-wallpaper-1366x768.jpg', 'feghrdg,edthfgvhj,fzthcygvu', 'subbu', '2014-08-15 03:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `political`
--

CREATE TABLE IF NOT EXISTS `political` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `political_title` varchar(767) NOT NULL,
  `political_description` longtext NOT NULL,
  `political_image` varchar(255) NOT NULL DEFAULT 'sample.jpg',
  `political_tags` varchar(255) NOT NULL,
  `political_username` varchar(255) NOT NULL,
  `political_time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `political_title` (`political_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `political`
--

INSERT INTO `political` (`id`, `political_title`, `political_description`, `political_image`, `political_tags`, `political_username`, `political_time_stamp`) VALUES
(3, 'Political Title One two', 'Political Desc Political DescPolitical DescPolitical DescPolitical DescPolitical Desc Political DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical DescPolitical Desc', '3884cold_leaves-1366x768.jpg,2276crab_on_sea-wallpaper-1366x768.jpg,1293custom_bikes_2-wallpaper-1366x768.jpg,3926cute__fantasy-1366x768.jpg,3931dark_cartoon_art-wallpaper-1366x768.jpg', 'tag1,tag2', 'subbu', '2014-08-12 11:03:56'),
(4, 'Political asdfgfabcfx a', 'Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc Political asdfgfabcfx afsdfcdsfdbc ', '141che_guevara-wallpaper-1366x768.jpg,4448cold_leaves-1366x768.jpg,4999crab_on_sea-wallpaper-1366x768.jpg', 'iuo,ertfd,ss', 'subbu', '2014-08-14 10:05:10'),
(5, 'Political Title tugyhl yvu', 'Political Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuyPolitical Title tugyhl yvuyv yvuy', '5595and_the_world_will_sleep_too-wallpaper-1366x768.jpg,2572angry_birds_space-wallpaper-1366x768.jpg,2242assassins_creed_iv_2-wallpaper-1366x768.jpg,1194attom-wallpaper-1366x768.jpg', 'pipoipoi,jtyj', 'subbu', '2014-08-14 10:05:46'),
(6, 'Political esdfgvnsdjf b', 'Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds Political esdfgvnsdjf bgbsdjbgjsddsgbdj hbds ', '2033chicken_little_funny-wallpaper-1366x768.jpg,1935clock-1366x768.jpg,7418clouds_multicolor-wallpaper-1366x768.jpg', 'yujrhtdgr,y,fdgr', 'subbu', '2014-08-14 10:06:24'),
(7, 'Political Title One two sedgdg s ', 'Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s Political Title One two sedgdg s ', '9115flower_game-1366x768.jpg,9300funny_winter_holidays-wallpaper-1366x768.jpg,6143futurama_bender_cigar-wallpaper-1366x768.jpg', 'jrthegsf,gd,gsx', 'subbu', '2014-08-14 10:06:56'),
(8, 'Poli fds', 'Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd Poli fdsvfdfd fsgs dgvd ', '9228beats_audio_2-wallpaper-1366x768.jpg,6295brain_3-wallpaper-1366x768.jpg,9562clouds_multicolor-wallpaper-1366x768.jpg', 'poioijuoihoiu,sg,df', 'subbu', '2014-08-14 10:07:40');

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
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tags` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags` (`tags`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tags`) VALUES
(114, ''),
(74, 'asdfgh'),
(106, 'b dv'),
(68, 'bbubbu'),
(113, 'bcgfn'),
(92, 'cv'),
(124, 'df'),
(66, 'dfghkj'),
(110, 'dfj'),
(111, 'dhsf'),
(101, 'dvf'),
(115, 'dvxbc'),
(107, 'dx '),
(142, 'edthfgvhj'),
(137, 'eqwrw'),
(86, 'eqwrwrw'),
(90, 'ertfd'),
(81, 'fdfcgv'),
(130, 'fdgr'),
(100, 'fdgrsfead'),
(141, 'feghrdg'),
(70, 'fsadgvsdgds'),
(69, 'fsegsd'),
(143, 'fzthcygvu'),
(104, 'gd'),
(97, 'gdv'),
(127, 'gsx'),
(105, 'gsxb'),
(56, 'Harsha'),
(95, 'hfgsa'),
(89, 'iuo'),
(75, 'iykutrhdg'),
(103, 'jrthegsf'),
(132, 'jtyj'),
(94, 'jtyjy'),
(93, 'pipoipoi'),
(108, 'poioijuoihoiu'),
(87, 'rqwrqwrqwr'),
(67, 'rxtcyu'),
(84, 'sdfgh'),
(71, 'sdgdsgds'),
(109, 'sg'),
(96, 'ss'),
(91, 'ssdfgfdsd'),
(53, 'tag1'),
(54, 'tag2'),
(55, 'tag3'),
(77, 'thd'),
(116, 'tr'),
(121, 'tryu'),
(82, 'tryuio'),
(76, 'tyhrdgrsf'),
(119, 'tyui'),
(83, 'werdtfygf'),
(78, 'wertf'),
(73, 'wertfhg'),
(140, 'werty'),
(80, 'wertyguhdsd'),
(79, 'wertyu'),
(72, 'wqertfyg'),
(85, 'wqwewq'),
(88, 'wrw'),
(99, 'y'),
(118, 'ytuh'),
(98, 'yujrhtdgr'),
(112, 'z'),
(102, 'zxc');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE IF NOT EXISTS `views` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(767) NOT NULL,
  `view_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `article_title`, `view_count`) VALUES
(9, 'Political Title One two', 5),
(13, 'Movie title of one', 2),
(14, 'movie yucyfvy', 0),
(16, 'movie blaf;sd'' asfsdgb ', 0),
(17, 'movie oijhuvjbklhvkblj vkjblnjkjvhk ', 2),
(18, 'movie movie hvjbj nj m', 1),
(20, 'Political asdfgfabcfx a', 0),
(21, 'Political Title tugyhl yvu', 0),
(22, 'Political esdfgvnsdjf b', 0),
(23, 'Political Title One two sedgdg s ', 1),
(24, 'Poli fds', 0),
(26, 'sri ytuiop ytuytio ', 0);

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
