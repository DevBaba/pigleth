-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2021 at 06:13 AM
-- Server version: 5.7.35-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malmonre_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `capitals`
--

CREATE TABLE `capitals` (
  `capital_id` int(11) NOT NULL,
  `pig_id` int(11) NOT NULL,
  `capital_amount` float NOT NULL,
  `date_posted` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capitals`
--

INSERT INTO `capitals` (`capital_id`, `pig_id`, `capital_amount`, `date_posted`, `created`, `updated`, `description`) VALUES
(3, 2, 36500, '2021-09-19 00:00:00', '2021-11-28 15:26:10', NULL, 'Tita Rosie'),
(4, 2, 18600, '2021-09-19 00:00:00', '2021-11-28 15:26:56', NULL, 'Ervin'),
(5, 3, 35504, '2021-07-09 00:00:00', '2021-11-30 09:24:40', NULL, ''),
(6, 3, 24000, '2021-07-07 00:00:00', '2021-11-30 09:26:06', NULL, 'For piglets');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_id` int(11) NOT NULL,
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
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, 2, 'Grower', '', 1490, 1, 1490, '2021-11-25 00:00:00', 0, 0, '2021-11-28 15:35:34', NULL),
(10, 3, 'Big Boy', '', 500, 1, 500, '2021-07-26 00:00:00', 0, 0, '2021-11-28 06:33:11', NULL),
(11, 3, 'Big Boy', '', 1200, 1, 1200, '2021-07-26 00:00:00', 0, 0, '2021-11-28 06:34:37', NULL),
(12, 3, 'Big Boy', '', 1200, 1, 1200, '2021-08-03 00:00:00', 0, 0, '2021-11-28 06:35:42', NULL),
(13, 3, 'Starter Pellets', '', 1535, 1, 1535, '2021-08-07 00:00:00', 0, 0, '2021-11-28 06:37:03', NULL),
(14, 3, 'Starter Pellets', '', 1535, 1, 1535, '2021-08-19 00:00:00', 0, 0, '2021-11-28 06:37:59', NULL),
(15, 3, 'Starter Pellets', '', 1535, 1, 1535, '2021-08-27 00:00:00', 0, 0, '2021-11-28 06:38:55', NULL),
(16, 3, 'Starter Pellets', '', 1535, 1, 1535, '2021-09-03 00:00:00', 0, 0, '2021-11-28 06:40:44', NULL),
(17, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-09-14 00:00:00', 0, 0, '2021-11-28 06:55:43', NULL),
(18, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-09-14 00:00:00', 0, 0, '2021-11-28 07:01:02', NULL),
(19, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-09-18 00:00:00', 0, 0, '2021-11-28 07:02:54', NULL),
(20, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-09-23 00:00:00', 0, 0, '2021-11-28 07:04:27', NULL),
(21, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-09-27 00:00:00', 0, 0, '2021-11-28 07:05:35', NULL),
(22, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-09-30 00:00:00', 0, 0, '2021-11-28 07:07:00', NULL),
(23, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-10-05 00:00:00', 0, 0, '2021-11-28 07:34:55', NULL),
(24, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-10-09 00:00:00', 0, 0, '2021-11-28 07:36:01', NULL),
(25, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-10-13 00:00:00', 0, 0, '2021-11-28 07:44:42', NULL),
(26, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-10-17 00:00:00', 0, 0, '2021-11-28 07:50:37', NULL),
(27, 3, 'Grower Mash', '', 1370, 1, 1370, '2021-10-20 00:00:00', 0, 0, '2021-11-28 07:52:11', NULL),
(31, 3, 'Grower Mash', '', 1490, 1, 1490, '2021-11-08 00:00:00', 0, 0, '2021-11-28 08:11:29', NULL),
(32, 3, 'Grower Mash', '', 1370, 2, 2740, '2021-10-23 00:00:00', 0, 0, '2021-11-28 08:17:00', NULL),
(33, 3, 'Grower Mash', '', 1380, 1, 1380, '2021-11-01 00:00:00', 0, 0, '2021-11-28 08:19:50', NULL),
(34, 3, 'Grower Mash', '', 1380, 1, 1380, '2021-11-02 00:00:00', 0, 0, '2021-11-28 08:24:14', NULL),
(35, 3, 'Grower Mash', '', 1490, 1, 1490, '2021-11-12 00:00:00', 0, 0, '2021-11-28 08:27:04', NULL),
(36, 3, 'Grower Mash', '', 1424, 1, 1424, '2021-11-16 00:00:00', 0, 0, '2021-11-28 08:28:47', NULL),
(37, 3, 'Grower Mash', '', 1490, 1, 1490, '2021-11-23 00:00:00', 0, 0, '2021-11-28 08:31:27', NULL),
(38, 2, 'Grower', '', 1490, 1, 1490, '2021-11-27 00:00:00', 0, 0, '2021-12-04 10:18:59', NULL),
(39, 2, '500 (11-29-2021), 500 (12-03-2021) - pinaulian', '', 1000, 1, 1000, '2021-12-03 00:00:00', 0, 0, '2021-12-04 10:25:10', NULL),
(40, 2, 'Grower', '', 1500, 1, 1500, '2021-12-04 00:00:00', 0, 0, '2021-12-04 10:26:23', NULL),
(41, 2, 'Grower', '', 1490, 3, 4470, '2021-12-06 00:00:00', 40, 120, '2021-12-08 06:06:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `pigs` (
  `pig_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `nurture_batch_name` varchar(100) NOT NULL,
  `no_of_pig` int(11) NOT NULL,
  `amount_per_pig` float NOT NULL,
  `total_amount` float NOT NULL,
  `status` enum('active','sold') NOT NULL DEFAULT 'active',
  `date_buy` datetime NOT NULL,
  `date_sold` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pigs`
--

INSERT INTO `pigs` (`pig_id`, `owner_id`, `nurture_batch_name`, `no_of_pig`, `amount_per_pig`, `total_amount`, `status`, `date_buy`, `date_sold`, `created`) VALUES
(2, 15, 'September', 6, 4500, 27000, 'active', '2021-09-19 00:00:00', NULL, '2021-11-28 15:25:15'),
(3, 2, 'July', 5, 4800, 24000, 'active', '2021-07-26 00:00:00', NULL, '2021-11-28 06:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `pig_id` int(11) NOT NULL,
  `pig_no` int(11) NOT NULL,
  `kilogram` decimal(10,0) NOT NULL,
  `amount` float NOT NULL,
  `total_amount` float NOT NULL,
  `date_sold` datetime NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `pig_id`, `pig_no`, `kilogram`, `amount`, `total_amount`, `date_sold`, `created`, `updated`) VALUES
(2, 3, 1, 78, 180, 14040, '2021-12-04 00:00:00', '2021-12-04 03:56:46', NULL),
(3, 3, 2, 81, 180, 14580, '2021-12-05 00:00:00', '2021-12-05 05:20:22', NULL),
(4, 3, 3, 88, 180, 15840, '2021-12-05 00:00:00', '2021-12-05 05:20:41', NULL),
(5, 3, 4, 104, 180, 18720, '2021-12-05 00:00:00', '2021-12-05 05:21:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `role`) VALUES
(1, 'red', '47a742a7642d63983541c2bc1ec59ebe37a0eaa7', 'admin'),
(2, 'leth', '47a742a7642d63983541c2bc1ec59ebe37a0eaa7', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capitals`
--
ALTER TABLE `capitals`
  ADD PRIMARY KEY (`capital_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `pigs`
--
ALTER TABLE `pigs`
  ADD PRIMARY KEY (`pig_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capitals`
--
ALTER TABLE `capitals`
  MODIFY `capital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pigs`
--
ALTER TABLE `pigs`
  MODIFY `pig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
