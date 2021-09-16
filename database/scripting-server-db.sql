-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 06:37 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scripting-server-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Classic Rock'),
(2, 'Hard Rock'),
(3, 'Metal'),
(4, 'Punk Rock'),
(5, 'Jazz');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_text` text DEFAULT NULL,
  `post_create_time` datetime DEFAULT NULL,
  `post_owner` varchar(150) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`, `category_id`) VALUES
(1, 1, 'text text', '2021-05-25 17:28:34', 'alen@basar', NULL),
(2, 1, 'hahahahahaa', '2021-05-25 17:58:46', 'alen@basarbasar.com', NULL),
(3, 1, 'a', '2021-05-25 18:29:40', 'alen@basarbasar.commmmmm', NULL),
(4, 1, 'test', '2021-05-25 19:08:20', 'a@a', NULL),
(5, 7, '11111111111111111', '2021-05-25 19:25:54', 'alen@basar', 5),
(6, 7, 'trtrtrtrt', '2021-05-25 22:22:47', 'alen@basarbasar.com', NULL),
(7, 8, 'lulz', '2021-05-25 23:14:25', 'alen@basar', 4),
(8, 9, 'react', '2021-05-25 23:44:14', 'alen@basar', 5),
(9, 9, 'mjgb,mhb', '2021-06-01 19:31:10', 'alen@basarbasar.com', NULL),
(10, 10, 'texttesttesttext', '2021-06-01 19:32:50', 'alen@ahhahahahaha', 4),
(11, 11, 'Whats the best band ever?', '2021-06-09 01:40:35', 'alenbasar2016@gmail.com', 2),
(12, 12, 'Whats the best band ever?', '2021-06-09 01:41:14', 'alenbasar2016@gmail.com', 2),
(13, 13, 'test', '2021-06-09 01:41:32', 'alenbasar2016@gmail.com', 3),
(14, 13, 'telkjasd;lfkja;sldkfja;slkdjf', '2021-06-09 01:43:48', 'a@a', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(150) DEFAULT NULL,
  `topic_create_time` datetime DEFAULT NULL,
  `topic_owner` varchar(150) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_owner`, `category_id`) VALUES
(1, 'Title', '2021-05-25 17:28:34', 'alen@basar', NULL),
(2, 'Title', '2021-05-25 19:22:24', 'alen@basar', 5),
(3, 'Title', '2021-05-25 19:22:31', 'alen@basar', 3),
(4, 'Title', '2021-05-25 19:23:35', 'alen@basar', 1),
(5, 'Title', '2021-05-25 19:24:05', 'alen@basar', 1),
(6, 'Title', '2021-05-25 19:24:07', 'alen@basar', 1),
(7, 'Title', '2021-05-25 19:25:54', 'alen@basar', 5),
(8, 'Basar', '2021-05-25 23:14:25', 'alen@basar', 4),
(9, 'Basar', '2021-05-25 23:44:14', 'alen@basar', 5),
(10, 'Beatles', '2021-06-01 19:32:50', 'alen@ahhahahahaha', 4),
(11, 'Best band ever?', '2021-06-09 01:40:35', 'alenbasar2016@gmail.com', 2),
(12, 'Best band ever?', '2021-06-09 01:41:14', 'alenbasar2016@gmail.com', 2),
(13, 'bands', '2021-06-09 01:41:32', 'alenbasar2016@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

CREATE TABLE `store_categories` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(50) DEFAULT NULL,
  `cat_desc` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_desc`) VALUES
(1, 'Old School Rock and Roll', 'Vast selection of old school rock and roll records'),
(2, 'Rock/Hard Rock', 'Music for real men! Pick your hard rock album.'),
(3, 'Metal', 'Hardcore music for hardcore fans!'),
(4, 'Blues', 'Greatest blues albums!'),
(5, 'Punk', 'Don\'t like the system? Let everyone know!'),
(6, 'Classical', 'Want to impress a lady and her parents? Look no further.');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_title` varchar(75) DEFAULT NULL,
  `item_price` float(8,2) DEFAULT NULL,
  `item_desc` text DEFAULT NULL,
  `item_image` varchar(50) DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `cat_id`, `item_title`, `item_price`, `item_desc`, `item_image`, `item_qty`) VALUES
(1, 1, 'Elvis Presley - Jailhouse Rock', 120.00, 'Presley\'s legendary EP', 'store_images/elvis-jailhouse.jpeg', 0),
(2, 2, 'Deep Purple - Machine Head', 100.00, 'Sixth album from the legendary band Deep Purple, featuring an old time classic \"Smoke on the water\".', 'store_images/deeppurple-machinehead.jpg', -2),
(3, 3, 'Burzum - Draugen Rarities', 80.00, 'One man band! A living legend, Varg Vikernes, changed the norwegian black metal scene forever.', 'store_images/burzum.jpg', 9),
(4, 3, 'Metallica - Master of Puppets', 100.00, 'A third album from the greatest metal band in existance.', 'store_images/metallica-masterofpuppets.jpg', 0),
(5, 4, 'B.B King - The King\'s Blues Box(3 LPs)', 150.00, 'B.B King aka \"The King of Blues\" collection of 3 LPs.', 'store_images/bbking.jpg', 0),
(6, 5, 'The Exploited - Punks not dead', 90.00, 'First album of the legendary hardcore punk band \"The Exploited\".', 'store_images/exploited.jpg', 23),
(7, 5, 'Sex Pistols - Anarchy in the U.K', 200.00, 'Sex Pistols debut single.', 'store_images/sexpistolsanarchy.jpg', 0),
(8, 6, 'W.A Mozart - Berlin Philharmonic Orchestra', 400.00, 'Collection of Mozart\'s greatest compositions.', 'store_images/mozart.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

CREATE TABLE `store_orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_name` varchar(100) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_city` varchar(50) DEFAULT NULL,
  `order_state` char(2) DEFAULT NULL,
  `order_zip` varchar(10) DEFAULT NULL,
  `order_tel` varchar(25) DEFAULT NULL,
  `order_email` varchar(100) DEFAULT NULL,
  `item_total` float(6,2) DEFAULT NULL,
  `shipping_total` float(6,2) DEFAULT NULL,
  `authorization` varchar(50) DEFAULT NULL,
  `status` enum('processed','pending') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_orders`
--

INSERT INTO `store_orders` (`id`, `order_date`, `order_name`, `order_address`, `order_city`, `order_state`, `order_zip`, `order_tel`, `order_email`, `item_total`, `shipping_total`, `authorization`, `status`) VALUES
(1, '2021-06-09 00:07:35', 'Alen Basar', '7 Manson Rd', 'Strathfield', 'NS', '2135', '6666666666', 'alenbasar2016@gmail.com', 500.00, 90.00, 'authorized', ''),
(2, '2021-06-09 02:14:57', 'Alen Basar', '7 Manson Rd', 'Strathfield', 'NS', '2135', '6666666666', 'alenbasar2016@gmail.com', 620.00, 90.00, 'authorized', '');

-- --------------------------------------------------------

--
-- Table structure for table `store_orders_items`
--

CREATE TABLE `store_orders_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL,
  `sel_item_price` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store_shoppertrack`
--

CREATE TABLE `store_shoppertrack` (
  `id` int(11) NOT NULL,
  `session_id` varchar(32) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_shoppertrack`
--

INSERT INTO `store_shoppertrack` (`id`, `session_id`, `sel_item_id`, `sel_item_qty`, `date_added`) VALUES
(49, 'go9e14l2gnhl9c78e7pspuvni3', 3, 1, '2021-06-09 02:25:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `store_categories`
--
ALTER TABLE `store_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_title` (`cat_title`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_orders`
--
ALTER TABLE `store_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_orders_items`
--
ALTER TABLE `store_orders_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_shoppertrack`
--
ALTER TABLE `store_shoppertrack`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `store_categories`
--
ALTER TABLE `store_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `store_orders`
--
ALTER TABLE `store_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_orders_items`
--
ALTER TABLE `store_orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_shoppertrack`
--
ALTER TABLE `store_shoppertrack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD CONSTRAINT `forum_posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD CONSTRAINT `forum_topics_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
