-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2021 at 01:44 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storefront_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

DROP TABLE IF EXISTS `store_categories`;
CREATE TABLE IF NOT EXISTS `store_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(50) DEFAULT NULL,
  `cat_desc` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cat_title` (`cat_title`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_desc`) VALUES
(1, 'Hats', 'Funky hats in all shapes and sizes!'),
(2, 'Shirts', 'From t-shirts to\r\nsweatshirts to polo shirts and beyond.'),
(3, 'Books', 'Paperback, hardback,\r\nbooks for school or play.'),
(4, 'Shorts', 'Shorts in all sizes!'),
(5, 'Jackets', 'Winter is coming!'),
(6, 'Backpacks', 'All the backpacks you need.');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

DROP TABLE IF EXISTS `store_items`;
CREATE TABLE IF NOT EXISTS `store_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `item_title` varchar(75) DEFAULT NULL,
  `item_price` float(8,2) DEFAULT NULL,
  `item_desc` text,
  `item_image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `cat_id`, `item_title`, `item_price`, `item_desc`, `item_image`) VALUES
(1, 1, 'Baseball Hat', 12.00, 'Fancy, low-profile baseball hat.', 'baseballhat.gif'),
(2, 1, 'Cowboy Hat', 52.00, '10 gallon variety', 'cowboyhat.gif'),
(3, 1, 'Top Hat', 102.00, 'Good for costumes.', 'tophat.gif'),
(4, 2, 'Short-Sleeved T-Shirt', 12.00, '100% cotton, pre-shrunk.', 'sstshirt.gif'),
(5, 2, 'Long-Sleeved T-Shirt', 15.00, 'Just like the short-sleeved shirt, with longer sleeves.', 'lstshirt.gif'),
(6, 2, 'Sweatshirt', 22.00, 'Heavy and warm.', 'sweatshirt.gif'),
(7, 3, 'Jane\'s Self-Help Book', 12.00, 'Jane gives advice.', 'selfhelpbook.gif'),
(8, 3, 'Generic Academic Book', 35.00, 'Some required reading for school, will put you to sleep.', 'boringbook.gif'),
(9, 3, 'Chicago Manual of Style', 9.99, 'Good for copywriters.', 'chicagostyle.gif'),
(10, 4, 'Blue Shorts', 34.99, 'Blue Male Shorts', 'blue-shorts.jpg'),
(11, 4, 'Red Shorts', 34.99, 'Red Male Shorts', 'red-shorts.jpg]'),
(12, 5, 'Winter Jacket', 59.99, 'Fancy winter jacket', 'fancy-winter-jacket.jpg'),
(13, 5, 'Winter Jacket-less fancy', 39.99, 'Less Fancy winter jacket', 'less-fancy-winter-jacket.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_color`
--

DROP TABLE IF EXISTS `store_item_color`;
CREATE TABLE IF NOT EXISTS `store_item_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_color` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_color`
--

INSERT INTO `store_item_color` (`id`, `item_id`, `item_color`) VALUES
(1, 1, 'red'),
(2, 1, 'black'),
(3, 1, 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_size`
--

DROP TABLE IF EXISTS `store_item_size`;
CREATE TABLE IF NOT EXISTS `store_item_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_size` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_size`
--

INSERT INTO `store_item_size` (`id`, `item_id`, `item_size`) VALUES
(1, 1, 'One Size Fits All'),
(2, 2, 'One Size Fits All'),
(3, 3, 'One Size Fits All'),
(4, 4, 'S'),
(5, 4, 'M'),
(6, 4, 'L'),
(7, 4, 'XL');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
