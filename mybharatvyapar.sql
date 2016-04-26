-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2015 at 03:57 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mybharatvyapar`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL,
  `shop_id` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `file_comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE IF NOT EXISTS `favourites` (
  `user_id` varchar(200) NOT NULL,
  `shop_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `file_reply` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `shop_name` varchar(50) NOT NULL,
  `lat` varchar(45) NOT NULL,
  `long` varchar(45) NOT NULL,
  `street` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `ratings` int(11) NOT NULL,
  `pic_dir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `emailid` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `long` varchar(45) DEFAULT NULL,
  `vendor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`emailid`, `fname`, `lname`, `gender`, `password`, `phoneno`, `dob`, `lat`, `long`, `vendor`) VALUES
('', '', '', '', '', 0, NULL, NULL, NULL, 0),
('0', '', '', '', '', 0, NULL, NULL, NULL, 0),
('abc@sd.com', 'himan', 'aggar', 'male', '25f9e794323b453885f5181f1b624d0b', 1234567890, NULL, NULL, NULL, 0),
('ausudh@dsuhbsd.com', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('bhanu@dbf.com', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('dfjk@wierui.cih', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('dsf@poiug.com', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('ef@doisk.com', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('eiff@dsfi.cvin', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('ertefdsa@wef.ef', '', '', '', '', 234567891, NULL, NULL, NULL, 0),
('jaya@gmail.com', 'jaya', 'yadav', 'male', '17068b9254b9de62afe4392f58dadcf0', 1234569870, NULL, NULL, NULL, 1),
('jayantyadav202@gmail.com', 'jayant', 'yadav', 'male', 'e10adc3949ba59abbe56e057f20f883e', 9999157033, NULL, NULL, NULL, 1),
('oiuyt@hdbc.com', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('qwertyh@werh.di', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('sac@sds.sdfjjd', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('vinay@qyhnf.com', '', '', '', '', 123456780, NULL, NULL, NULL, 0),
('vinay@sdfa.com', '', '', '', '', 1234567890, NULL, NULL, NULL, 0),
('wdqw@wef.wef', '', '', '', '', 123456789, NULL, NULL, NULL, 0),
('wfe@hfgv.com', '', '', '', '', 1234567890, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`user_id`,`shop_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`emailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
