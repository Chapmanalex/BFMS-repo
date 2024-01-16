-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 01:19 PM
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
-- Database: `ems_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `budgetID` int(10) NOT NULL,
  `budgetname` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `budget_amount` decimal(10,0) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `depID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(10) NOT NULL,
  `CategoryName` varchar(60) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `depertments`
--

CREATE TABLE `depertments` (
  `depID` int(10) NOT NULL,
  `dep_name` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenseID` int(10) NOT NULL,
  `catID` int(10) NOT NULL,
  `item` varchar(100) NOT NULL,
  `E_description` varchar(200) NOT NULL,
  `E_amount` decimal(10,0) NOT NULL,
  `E_date` datetime NOT NULL DEFAULT current_timestamp(),
  `UserID` int(20) NOT NULL,
  `depID` int(11) NOT NULL,
  `budgetID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income_tb`
--

CREATE TABLE `income_tb` (
  `incomeID` int(20) NOT NULL,
  `I_amount` decimal(10,0) NOT NULL,
  `I_description` varchar(200) NOT NULL,
  `i_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID` int(10) NOT NULL,
  `from` int(10) NOT NULL,
  `to` int(10) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` bigint(20) NOT NULL,
  `userID` int(20) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `othernames` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `address` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(64) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `profile_path` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '''uploads/default_profile.png''',
  `depID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `userID`, `firstname`, `lastname`, `othernames`, `gender`, `contactNo`, `address`, `email`, `password`, `rank`, `profile_path`, `depID`) VALUES
(18, 2147483647, 'sandena', 'alx', 'al', 'male', '0772568024', 'tororo', 'sandealex2020@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin', 'uploads/18.jpg', 111),
(20, 706655, 'akello', 'rose', 'mary', 'female', '07777777777', 'tororo', 'akello@akello.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user', 'uploads/144.jpg', 110),
(26, 21473647, 'baisuka', 'billy', 'nickolas', 'male', '07777777777', 'tororo', 'billy@billy.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user', 'uploads/18.jpg', 109),
(27, 2579829, 'okwanga', 'ken', 'dash', 'male', '07777777777', 'tororo', 'okwang@okwang', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user', 'uploads/Kamoga-Lwako-Muhamadi-removebg-preview.png', 108),
(28, 2147483647, 'wandera', 'peter', 'lugunda', 'male', '0758831294', 'kansanga', 'peterlugunda906@gmail.com', '1ac8c9771bb0723de7b680d39cdb9e88c6185d9d', 'user', 'uploads/18.jpg', 113);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`budgetID`),
  ADD KEY `depID` (`depID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`),
  ADD KEY `CategoryName` (`CategoryName`,`description`);

--
-- Indexes for table `depertments`
--
ALTER TABLE `depertments`
  ADD PRIMARY KEY (`depID`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenseID`),
  ADD KEY `catID_fk` (`catID`),
  ADD KEY `item` (`item`,`E_date`),
  ADD KEY `useridfk` (`UserID`),
  ADD KEY `depID` (`depID`),
  ADD KEY `budgetname` (`budgetID`);

--
-- Indexes for table `income_tb`
--
ALTER TABLE `income_tb`
  ADD PRIMARY KEY (`incomeID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `othernames` (`othernames`),
  ADD KEY `gender` (`gender`),
  ADD KEY `contactNo` (`contactNo`),
  ADD KEY `address` (`address`),
  ADD KEY `email` (`email`),
  ADD KEY `rank` (`rank`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `budgetID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23444456;

--
-- AUTO_INCREMENT for table `depertments`
--
ALTER TABLE `depertments`
  MODIFY `depID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `income_tb`
--
ALTER TABLE `income_tb`
  MODIFY `incomeID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=678698712;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `catID_fk0` FOREIGN KEY (`catID`) REFERENCES `categories` (`catID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `userID_fk1` FOREIGN KEY (`UserID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
