-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2022 at 09:40 AM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamilton-7-hiking-dama`
--

-- --------------------------------------------------------

--
-- Table structure for table `Hikes`
--

CREATE TABLE `Hikes` (
                         `ID` int NOT NULL,
                         `name` varchar(50) NOT NULL,
                         `date_of_creation` date DEFAULT NULL,
                         `distance` int NOT NULL,
                         `duration` int NOT NULL,
                         `elevation_gain` int NOT NULL,
                         `description` varchar(50) NOT NULL,
                         `updateTime` date DEFAULT NULL,
                         `UserID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Hikes`
--

INSERT INTO `Hikes` (`ID`, `name`, `date_of_creation`, `distance`, `duration`, `elevation_gain`, `description`, `updateTime`, `UserID`) VALUES
    (12345, 'Le chemin de traverse', '2022-12-16', 15, 35, 13, 'A friendly tour', NULL, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `HikesTags`
--

CREATE TABLE `HikesTags` (
                             `ID` int NOT NULL,
                             `TagsID` int NOT NULL,
                             `HikesID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `HikesTags`
--

INSERT INTO `HikesTags` (`ID`, `TagsID`, `HikesID`) VALUES
    (12345, 12345, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `Tags`
--

CREATE TABLE `Tags` (
                        `ID` int NOT NULL,
                        `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Tags`
--

INSERT INTO `Tags` (`ID`, `name`) VALUES
    (12345, 'Forest');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
                         `ID` int NOT NULL,
                         `firstname` varchar(50) NOT NULL,
                         `lastname` varchar(50) NOT NULL,
                         `nickname` varchar(50) NOT NULL,
                         `email` varchar(50) NOT NULL,
                         `password` varchar(100) NOT NULL,
                         `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `firstname`, `lastname`, `nickname`, `email`, `password`, `isAdmin`) VALUES
    (1234, 'Admin', 'Admin', 'Admin', 'lol@admin.com', 'Admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Hikes`
--
ALTER TABLE `Hikes`
    ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `userID` (`UserID`);

--
-- Indexes for table `HikesTags`
--
ALTER TABLE `HikesTags`
    ADD KEY `TagsID` (`TagsID`),
  ADD KEY `HikesID` (`HikesID`);

--
-- Indexes for table `Tags`
--
ALTER TABLE `Tags`
    ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
    ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Hikes`
--
ALTER TABLE `Hikes`
    MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT for table `Tags`
--
ALTER TABLE `Tags`
    MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Hikes`
--
ALTER TABLE `Hikes`
    ADD CONSTRAINT `hikes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `HikesTags`
--
ALTER TABLE `HikesTags`
    ADD CONSTRAINT `hikestags_ibfk_1` FOREIGN KEY (`HikesID`) REFERENCES `Hikes` (`ID`),
  ADD CONSTRAINT `hikestags_ibfk_2` FOREIGN KEY (`TagsID`) REFERENCES `Tags` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
