-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 04:22 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q&a`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdId` int(11) NOT NULL,
  `UID` int(11) DEFAULT NULL,
  `NumRep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `RID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`RID`, `UID`, `count`) VALUES
(13, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `RID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`RID`, `UID`, `count`) VALUES
(13, 16, 1),
(14, 16, 1),
(14, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QID` int(11) NOT NULL,
  `QType` varchar(50) NOT NULL,
  `Question` text NOT NULL,
  `QDescp` mediumtext,
  `UID` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QID`, `QType`, `Question`, `QDescp`, `UID`, `username`, `count`) VALUES
(13, 'prog', 'What is array?', 'Preferably in C++', 16, 'uk96', 0),
(14, 'bm', 'What is golden number?', 'It is related to fibonacci number', 16, 'uk96', 2),
(15, 'emoad', 'how to overcome stress?', '', 35, 'chikorita0_o', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `RID` int(11) NOT NULL,
  `Reply` longtext NOT NULL,
  `Respondent` varchar(50) NOT NULL,
  `RTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Likes` int(11) NOT NULL DEFAULT '0',
  `Dislikes` int(11) NOT NULL DEFAULT '0',
  `QID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`RID`, `Reply`, `Respondent`, `RTime`, `Likes`, `Dislikes`, `QID`) VALUES
(13, ' dqdqdwqdqdqdqd', 'uk96', '2018-11-14 05:17:57', 1, 1, 14),
(14, ' Any two lengths where a:b is the same as a+b:a are said to be in the golden ratio. These proportions have been encoded by artists and architects into their work for thousands of years. The ancient Parthenon in Greece shows these proportions, as do the works of Da Vinci, Dali, and more recently Mondrian.\r\n\r\nThe ratio can be expressed as a number, but it is not a rational number like 1, 42, or 7367; instead itâ€™s like Ï€, impossible to express exactly as a fraction. In fact, it has its own letter, Ï†. We can find Ï† using algebra:\r\nGolden numbersSo aÏ†=b. Making the substitution and rearranging (you can work through the details yourself!) gives this rather pretty little number:\r\n\r\nGolden numbers', 'chikorita0_o', '2018-11-14 05:40:37', 2, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `report_admin`
--

CREATE TABLE `report_admin` (
  `RAID` int(11) NOT NULL,
  `Count` int(11) NOT NULL DEFAULT '1',
  `RID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_admin`
--

INSERT INTO `report_admin` (`RAID`, `Count`, `RID`) VALUES
(23, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `report_user`
--

CREATE TABLE `report_user` (
  `RID` int(11) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_user`
--

INSERT INTO `report_user` (`RID`, `UID`) VALUES
(13, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `UserType` varchar(30) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Interest` varchar(100) NOT NULL,
  `profile_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `FirstName`, `LastName`, `Email`, `UserType`, `UserName`, `Password`, `Interest`, `profile_pic`) VALUES
(16, 'Uddesh', 'Kadu', 'uddeshkadu@gmail.com', 'user', 'uk96', 'fc9299b0ca684ce01ef7079071ed83ae', 'Science,BookRef,General', ''),
(25, 'Tejal', 'kadu', 'tejal.kadu@somaiya.edu', 'admin', 'baymax08', 'fc9299b0ca684ce01ef7079071ed83ae', 'Science,BM,Commerce,Programming,em,Hobbies', ''),
(35, 'tej', 'k', 'tejal.kadu@somaiya.edu', 'user', 'chikorita0_o', '4025ebf60704c3c3adf8da24d720fc4d', 'Science,BM,em,Hobbies', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdId`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`RID`,`UID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`RID`,`UID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QID`),
  ADD KEY `UID` (`UID`),
  ADD KEY `User` (`username`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`RID`),
  ADD KEY `QID` (`QID`);

--
-- Indexes for table `report_admin`
--
ALTER TABLE `report_admin`
  ADD PRIMARY KEY (`RAID`),
  ADD KEY `RID` (`RID`);

--
-- Indexes for table `report_user`
--
ALTER TABLE `report_user`
  ADD PRIMARY KEY (`RID`,`UID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `UN` (`UserName`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `report_admin`
--
ALTER TABLE `report_admin`
  MODIFY `RAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD CONSTRAINT `dislikes_ibfk_1` FOREIGN KEY (`RID`) REFERENCES `reply` (`RID`),
  ADD CONSTRAINT `dislikes_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`RID`) REFERENCES `reply` (`RID`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `User` FOREIGN KEY (`username`) REFERENCES `user` (`UserName`),
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`QID`) REFERENCES `question` (`QID`);

--
-- Constraints for table `report_admin`
--
ALTER TABLE `report_admin`
  ADD CONSTRAINT `report_admin_ibfk_1` FOREIGN KEY (`RID`) REFERENCES `reply` (`RID`);

--
-- Constraints for table `report_user`
--
ALTER TABLE `report_user`
  ADD CONSTRAINT `report_user_ibfk_1` FOREIGN KEY (`RID`) REFERENCES `reply` (`RID`),
  ADD CONSTRAINT `report_user_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
