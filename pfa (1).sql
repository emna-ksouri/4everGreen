-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 04:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatmessage`
--

CREATE TABLE `chatmessage` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `MessageText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `greenspace`
--

CREATE TABLE `greenspace` (
  `GreenspaceID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `CreatorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `greenspacemembers`
--

CREATE TABLE `greenspacemembers` (
  `MemberID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `GreenspaceID` int(11) NOT NULL,
  `Role` enum('member','admin') NOT NULL,
  `JoinDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `PlantID` int(11) NOT NULL,
  `GreenspaceID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plantstasks`
--

CREATE TABLE `plantstasks` (
  `TaskID` int(11) NOT NULL,
  `GreenspaceID` int(11) NOT NULL,
  `TaskName` varchar(100) NOT NULL,
  `PlantID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `DueDate` date NOT NULL,
  `Completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatmessage`
--
ALTER TABLE `chatmessage`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `SenderID` (`SenderID`);

--
-- Indexes for table `greenspace`
--
ALTER TABLE `greenspace`
  ADD PRIMARY KEY (`GreenspaceID`),
  ADD KEY `CreatorID` (`CreatorID`);

--
-- Indexes for table `greenspacemembers`
--
ALTER TABLE `greenspacemembers`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `GreenspaceID` (`GreenspaceID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`PlantID`),
  ADD KEY `GreenspaceID` (`GreenspaceID`);

--
-- Indexes for table `plantstasks`
--
ALTER TABLE `plantstasks`
  ADD PRIMARY KEY (`TaskID`),
  ADD KEY `GreenspaceID` (`GreenspaceID`),
  ADD KEY `PlantID` (`PlantID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chatmessage`
--
ALTER TABLE `chatmessage`
  ADD CONSTRAINT `chatmessage_ibfk_1` FOREIGN KEY (`SenderID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `greenspace`
--
ALTER TABLE `greenspace`
  ADD CONSTRAINT `greenspace_ibfk_1` FOREIGN KEY (`CreatorID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `greenspacemembers`
--
ALTER TABLE `greenspacemembers`
  ADD CONSTRAINT `greenspacemembers_ibfk_1` FOREIGN KEY (`GreenspaceID`) REFERENCES `greenspace` (`GreenspaceID`),
  ADD CONSTRAINT `greenspacemembers_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `greenspace` (`GreenspaceID`);

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`GreenspaceID`) REFERENCES `greenspace` (`GreenspaceID`);

--
-- Constraints for table `plantstasks`
--
ALTER TABLE `plantstasks`
  ADD CONSTRAINT `plantstasks_ibfk_1` FOREIGN KEY (`GreenspaceID`) REFERENCES `greenspace` (`GreenspaceID`),
  ADD CONSTRAINT `plantstasks_ibfk_2` FOREIGN KEY (`PlantID`) REFERENCES `plants` (`PlantID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
