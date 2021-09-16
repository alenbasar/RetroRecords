-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2021 at 01:54 AM
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
-- Database: `dbforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE IF NOT EXISTS `forum_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `post_text` text,
  `post_create_time` datetime DEFAULT NULL,
  `post_owner` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`) VALUES
(1, 1, 'yoyoyoyoyo', '2021-03-24 09:55:38', 'isaac@sdasdh'),
(2, 2, 'yoyoyo', '2021-03-24 09:56:04', 'dsdhk@sdhajkdh'),
(3, 3, 'yoyoyo', '2021-03-24 09:58:11', 'dsdhk@sdhajkdh'),
(4, 4, 'yoyoyoyo', '2021-03-24 10:04:50', 'fvf@fsdfs'),
(5, 5, 'Blue is color', '2021-03-24 10:30:04', 'isaac@yo'),
(6, 6, 'Blue is color', '2021-03-24 10:30:08', 'isaac@yo'),
(7, 7, 'hihihihi', '2021-03-24 10:49:44', 'hi@hi'),
(8, 8, 'hihihihi', '2021-03-24 10:49:48', 'hi@hi'),
(9, 8, 'Yo this is my Reply. \r\nhi hi hi ', '2021-03-24 11:45:26', 'isaac@hello'),
(10, 9, 'Abc', '2021-03-24 11:54:03', 'A@a'),
(11, 9, 'yoyo', '2021-03-24 12:08:47', 'df@dfs'),
(12, 9, 'yoyo', '2021-03-24 12:11:13', 'df@dfs'),
(13, 5, 'No Its not', '2021-03-24 12:53:00', 'yo@yo');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

DROP TABLE IF EXISTS `forum_topics`;
CREATE TABLE IF NOT EXISTS `forum_topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(150) DEFAULT NULL,
  `topic_create_time` datetime DEFAULT NULL,
  `topic_owner` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_owner`) VALUES
(4, 'yo', '2021-03-24 10:04:50', 'fvf@fsdfs'),
(3, 'yo', '2021-03-24 09:58:11', 'dsdhk@sdhajkdh'),
(5, 'What is blue', '2021-03-24 10:30:04', 'isaac@yo'),
(6, 'What is blue', '2021-03-24 10:30:08', 'isaac@yo'),
(7, 'hi', '2021-03-24 10:49:44', 'hi@hi'),
(8, 'hi', '2021-03-24 10:49:48', 'hi@hi'),
(9, 'A', '2021-03-24 11:54:03', 'A@a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
