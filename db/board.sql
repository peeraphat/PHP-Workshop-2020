-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2020 at 07:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `board`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_board`
--

CREATE TABLE `table_board` (
  `board_id` int(11) NOT NULL,
  `board_topic` varchar(255) NOT NULL,
  `board_content` text NOT NULL,
  `board_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `board_member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_comment`
--

CREATE TABLE `table_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment_board_id` int(11) NOT NULL,
  `comment_member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_member`
--

CREATE TABLE `table_member` (
  `member_id` int(11) NOT NULL,
  `member_username` varchar(255) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_role` enum('0','1') NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_lastName` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_gender` enum('m','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_member`
--

INSERT INTO `table_member` (`member_id`, `member_username`, `member_password`, `member_role`, `member_name`, `member_lastName`, `member_email`, `member_gender`) VALUES
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'admin', 'admin', 'admin@localhost', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_board`
--
ALTER TABLE `table_board`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `table_comment`
--
ALTER TABLE `table_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `table_member`
--
ALTER TABLE `table_member`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_board`
--
ALTER TABLE `table_board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_comment`
--
ALTER TABLE `table_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_member`
--
ALTER TABLE `table_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
