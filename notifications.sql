-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 07:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `inf`
--

CREATE TABLE `inf` (
  `n_id` int(11) NOT NULL,
  `notifications_name` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inf`
--

INSERT INTO `inf` (`n_id`, `notifications_name`, `message`, `active`) VALUES
(1, 'hello', 'fgfjgv', 0),
(2, 'budget', 'budget expired', 0),
(3, 'budget', 'budget expired 1', 0),
(4, 'name', 'change my user name', 0),
(5, 'hello', 'ihrnsldlks;lmveds', 0),
(6, 'uoyohj', 'khrgjdklbf', 0),
(7, 'gouygbkj', 'yfut;knl', 0),
(8, 'uoyohj', 'djyfjygkjhj', 0),
(9, 'uoyohj', 'ghgfhfhg', 0),
(10, 'hgfd', 'rgfdcx', 0),
(11, 'l , ', ' m.,,m  ', 0),
(12, 'm.  m', 'kmklm', 0),
(13, 'm.m,.//.,', 'mlk.  ', 0),
(14, ',. mbjn,', '  lm m, .m ', 0),
(15, 'n ljhvhgkhn', 'mnk,mnkn', 0),
(16, 'nmb,bmvmnb ', 'nmb nbmn', 0),
(17, 'mn ,nb bn ', 'nb vmn ,m', 0),
(18, 'tufhgk', 'kgjhj', 0),
(19, 'budget', 'jkgkhjj', 0),
(20, 'jgliukjhl', 'gilukhj', 0),
(21, 'vdfgvbn', 'sfcgvbnm', 0),
(22, 'jkjhjgjsx', 'klgiwjq', 1),
(23, 'ihpfewhwnx', 'ofiygufuk', 1),
(24, 'ken ', 'hello', 1),
(25, 'yhggh', 'huykhb', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inf`
--
ALTER TABLE `inf`
  ADD PRIMARY KEY (`n_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inf`
--
ALTER TABLE `inf`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
