-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2013 at 04:44 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rating`
--
CREATE DATABASE IF NOT EXISTS `rating` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rating`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `img_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `img_url`) VALUES
(1, 'MB Gigabyte G1.Sniper B5', 'template/img/products/1.jpg'),
(2, 'Asus MeMo pad ME102A', 'template/img/products/2.jpg'),
(3, 'LCD Philips 27'''' 273G3 DHSW', 'template/img/products/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE IF NOT EXISTS `rating_info` (
  `product_id` int(10) NOT NULL,
  `rate_1` int(10) NOT NULL,
  `rate_2` int(10) NOT NULL,
  `rate_3` int(10) NOT NULL,
  `rate_4` int(10) NOT NULL,
  `rate_5` int(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`product_id`, `rate_1`, `rate_2`, `rate_3`, `rate_4`, `rate_5`) VALUES
(1, 1, 2, 3, 1, 2),
(2, 12, 23, 21, 22, 11),
(3, 2, 2, 1, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
