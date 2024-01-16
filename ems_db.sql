-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 01:34 PM
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
  `curentbalance` float NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `depID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`budgetID`, `budgetname`, `description`, `budget_amount`, `curentbalance`, `startdate`, `enddate`, `depID`) VALUES
(18, 'test budget1', 'for cooks', '100000', 100000, '2023-10-04', '2023-12-26', 117),
(19, 'budget1', 'for rooms', '200000', 117000, '2023-10-24', '2023-11-05', 116),
(20, 'test5', 'test', '1000000', 1000000, '2023-10-01', '2023-10-30', 115);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(10) NOT NULL,
  `CategoryName` varchar(60) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `CategoryName`, `description`) VALUES
(23444460, 'electricity', 'power'),
(23444459, 'health', 'helth'),
(23444458, 'shopping', 'shopping things ');

-- --------------------------------------------------------

--
-- Table structure for table `depertments`
--

CREATE TABLE `depertments` (
  `depID` int(10) NOT NULL,
  `dep_name` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `depertments`
--

INSERT INTO `depertments` (`depID`, `dep_name`, `description`) VALUES
(115, 'customercare', 'customer care teams'),
(116, 'test dep', 'akello rose in the test depaertment'),
(117, 'cooks', 'cooks dp'),
(118, 'admin test departmnt1', 'for the admin');

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

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expenseID`, `catID`, `item`, `E_description`, `E_amount`, `E_date`, `UserID`, `depID`, `budgetID`) VALUES
(65, 23444458, 'metro', 'test item', '23000', '2023-10-31 00:38:56', 962, 116, 19),
(66, 23444460, 'metro', 'chemistr', '30000', '2023-10-31 00:42:50', 962, 116, 19),
(67, 23444459, 'travel', 'test', '30000', '2023-10-31 00:52:55', 962, 116, 19);

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

--
-- Dumping data for table `income_tb`
--

INSERT INTO `income_tb` (`incomeID`, `I_amount`, `I_description`, `i_date`) VALUES
(678698713, '400000', 'personal finance', '2023-10-31 01:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `inf`
--

CREATE TABLE `inf` (
  `n_id` int(11) NOT NULL,
  `notifications_name` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL,
  `active` tinyint(4) NOT NULL COMMENT '0=seen, 1=newmssage \r\n',
  `userID` int(20) NOT NULL,
  `userID_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inf`
--

INSERT INTO `inf` (`n_id`, `notifications_name`, `message`, `active`, `userID`, `userID_2`) VALUES
(15, 'password', 'please change my password to alex', 0, 2147483647, 2147483647),
(16, ';ukyjhv', '        ', 0, 2147483647, 2147483647),
(17, 'klukjhb', 'jkjhg', 0, 2147483647, 2147483647),
(18, 'ttttttt', 'tttttttt', 1, 2345, 123465),
(19, 'WD', 'DC', 0, 2147483647, 2147483647),
(20, 'WSDC', 'HEHEHHEHHEE', 1, 2579829, 2147483647),
(21, 'my budget', 'my budget expired', 0, 2147483647, 962),
(22, 'gouygbkj', 'rehtthy7u667rt', 0, 2147483647, 2147483647),
(23, 'gouygbkj', '6yygw54redg', 0, 2147483647, 2147483647);

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
(18, 2147483647, 'sandena', 'alx', 'al', 'male', '0772568024', 'tororo', 'sandealex2020@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin', 'uploads/18.jpg', 116),
(27, 2579829, 'okwanga', 'ken', 'dash', 'male', '07777777777', 'tororo', 'okwang@okwang', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user', 'uploads/Kamoga-Lwako-Muhamadi-removebg-preview.png', 115),
(29, 962, 'akello', 'rose', 'mabelle', 'female', '0778999911', 'tororo', 'akello@akello.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user', 'uploads/35.jpg', 116);

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
-- Indexes for table `inf`
--
ALTER TABLE `inf`
  ADD PRIMARY KEY (`n_id`);

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
  MODIFY `budgetID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23444461;

--
-- AUTO_INCREMENT for table `depertments`
--
ALTER TABLE `depertments`
  MODIFY `depID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `income_tb`
--
ALTER TABLE `income_tb`
  MODIFY `incomeID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=678698714;

--
-- AUTO_INCREMENT for table `inf`
--
ALTER TABLE `inf`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `budget fk` FOREIGN KEY (`depID`) REFERENCES `depertments` (`depID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `userID_fk1` FOREIGN KEY (`UserID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
