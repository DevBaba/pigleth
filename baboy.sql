-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2021 at 10:31 AM
-- Server version: 5.7.35
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baboy`
--

-- --------------------------------------------------------

--
-- Table structure for table `capitals`
--

DROP TABLE IF EXISTS `capitals`;
CREATE TABLE IF NOT EXISTS `capitals` (
  `capital_id` int(11) NOT NULL AUTO_INCREMENT,
  `pig_id` int(11) NOT NULL,
  `capital_amount` float NOT NULL,
  `date_posted` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`capital_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capitals`
--

INSERT INTO `capitals` (`capital_id`, `pig_id`, `capital_amount`, `date_posted`, `created`, `updated`, `description`) VALUES
(3, 2, 36500, '2021-09-19 00:00:00', '2021-11-28 15:26:10', NULL, 'Tita Rosie'),
(4, 2, 18600, '2021-09-19 00:00:00', '2021-11-28 15:26:56', NULL, 'Ervin');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pig_id` int(11) NOT NULL,
  `exp_description` varchar(50) NOT NULL,
  `exp_remarks` varchar(255) DEFAULT NULL,
  `exp_item_amount` float NOT NULL,
  `exp_item_count` int(11) NOT NULL,
  `exp_total_amount` float NOT NULL,
  `date_purchaised` datetime DEFAULT NULL,
  `fare_per_item` float DEFAULT NULL,
  `fare_total` float DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `pig_id`, `exp_description`, `exp_remarks`, `exp_item_amount`, `exp_item_count`, `exp_total_amount`, `date_purchaised`, `fare_per_item`, `fare_total`, `created`, `updated`) VALUES
(2, 2, 'Big Boy', '', 1165, 2, 2330, '2021-09-20 00:00:00', 40, 80, '2021-11-28 15:29:52', '2021-11-28 15:48:34'),
(3, 2, 'Starter', '', 1485, 4, 5940, '2021-09-20 00:00:00', 40, 160, '2021-11-28 15:30:22', NULL),
(4, 2, 'Starter', '', 1515, 1, 1515, '2021-09-30 00:00:00', 0, 0, '2021-11-28 15:32:01', NULL),
(5, 2, 'Food Supplement', '', 500, 1, 500, '2021-10-01 00:00:00', 0, 0, '2021-11-28 15:32:31', NULL),
(6, 2, 'Grower', '', 1320, 1, 1320, '2021-11-02 00:00:00', 0, 0, '2021-11-28 15:33:24', NULL),
(7, 2, 'Grower', '', 1440, 1, 1440, '2021-11-14 00:00:00', 0, 0, '2021-11-28 15:34:37', NULL),
(8, 2, 'Grower', '', 1390, 2, 2780, '2021-11-16 00:00:00', 40, 80, '2021-11-28 15:35:14', NULL),
(9, 2, 'Grower', '', 1490, 1, 1490, '2021-11-25 00:00:00', 0, 0, '2021-11-28 15:35:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
CREATE TABLE IF NOT EXISTS `owners` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `full_name`, `contact`, `address`, `created`, `updated`) VALUES
(2, 'Red', '', '', '2021-11-27 21:18:02', NULL),
(14, 'Joyce', '', '', '2021-11-28 14:27:09', NULL),
(15, 'Ervin & Tita Rosie', '', 'Masipit', '2021-11-28 15:19:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pigs`
--

DROP TABLE IF EXISTS `pigs`;
CREATE TABLE IF NOT EXISTS `pigs` (
  `pig_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `nurture_batch_name` varchar(100) NOT NULL,
  `no_of_pig` int(11) NOT NULL,
  `amount_per_pig` float NOT NULL,
  `total_amount` float NOT NULL,
  `status` enum('active','sold') NOT NULL DEFAULT 'active',
  `date_buy` datetime NOT NULL,
  `date_sold` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pigs`
--

INSERT INTO `pigs` (`pig_id`, `owner_id`, `nurture_batch_name`, `no_of_pig`, `amount_per_pig`, `total_amount`, `status`, `date_buy`, `date_sold`, `created`) VALUES
(2, 15, 'September', 6, 4500, 27000, 'active', '2021-09-19 00:00:00', NULL, '2021-11-28 15:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `pig_id` int(11) NOT NULL,
  `pig_no` int(11) NOT NULL,
  `kilogram` decimal(10,0) NOT NULL,
  `amount` float NOT NULL,
  `total_amount` float NOT NULL,
  `date_sold` datetime NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `role`) VALUES
(1, 'red', '47a742a7642d63983541c2bc1ec59ebe37a0eaa7', 'admin'),
(2, 'leth', '47a742a7642d63983541c2bc1ec59ebe37a0eaa7', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
