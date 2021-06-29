-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 09:39 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meu-e-library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(20) NOT NULL,
  `Category_ID` int(20) NOT NULL,
  `Type` varchar(250) COLLATE utf8_bin NOT NULL,
  `Title` varchar(250) COLLATE utf8_bin NOT NULL,
  `ISBN` varchar(250) COLLATE utf8_bin NOT NULL,
  `Description` varchar(250) COLLATE utf8_bin NOT NULL,
  `Cover_Picture` varchar(250) COLLATE utf8_bin NOT NULL,
  `Author_Name` varchar(250) COLLATE utf8_bin NOT NULL,
  `File_Path` varchar(250) COLLATE utf8_bin NOT NULL,
  `Status` varchar(250) COLLATE utf8_bin NOT NULL,
  `Borrowing_Status` varchar(250) COLLATE utf8_bin NOT NULL,
  `Add_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `Category_ID`, `Type`, `Title`, `ISBN`, `Description`, `Cover_Picture`, `Author_Name`, `File_Path`, `Status`, `Borrowing_Status`, `Add_Date_Time`) VALUES
(1, 1, 'Hardcopy', 'Test', '', '', '', '', '', 'Active', 'Not Active', '2020-05-08 06:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing_records`
--

CREATE TABLE `borrowing_records` (
  `ID` int(20) NOT NULL,
  `Student_ID` int(20) NOT NULL,
  `Book_ID` int(20) NOT NULL,
  `Student_Major` varchar(250) COLLATE utf8_bin NOT NULL,
  `From_Date` varchar(250) COLLATE utf8_bin NOT NULL,
  `To_Date` varchar(250) COLLATE utf8_bin NOT NULL,
  `Return_Date` varchar(250) COLLATE utf8_bin NOT NULL,
  `Status` varchar(250) COLLATE utf8_bin NOT NULL,
  `Add_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `borrowing_records`
--

INSERT INTO `borrowing_records` (`ID`, `Student_ID`, `Book_ID`, `Student_Major`, `From_Date`, `To_Date`, `Return_Date`, `Status`, `Add_Date_Time`) VALUES
(3, 1, 1, 'IT', '2020-04-29', '2020-05-04', '2020-04-29', 'Accept', '2020-05-08 06:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(20) NOT NULL,
  `Category_Name` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Category_Name`) VALUES
(1, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `ID` int(20) NOT NULL,
  `S_ID` int(20) NOT NULL,
  `B_ID` int(20) NOT NULL,
  `Note` text COLLATE utf8_bin NOT NULL,
  `Add_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`ID`, `S_ID`, `B_ID`, `Note`, `Add_Date_Time`) VALUES
(2, 1, 1, 'dddddddddd', '2020-04-29 12:23:39'),
(3, 1, 1, 'adwawdawdadadadaw', '2020-04-29 19:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(20) NOT NULL,
  `Uni_Number` varchar(250) COLLATE utf8_bin NOT NULL,
  `Major` varchar(250) COLLATE utf8_bin NOT NULL,
  `Name` varchar(250) COLLATE utf8_bin NOT NULL,
  `Phone_Number` varchar(250) COLLATE utf8_bin NOT NULL,
  `Password` varchar(250) COLLATE utf8_bin NOT NULL,
  `Balance_Of_Volations` double NOT NULL,
  `Status` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Uni_Number`, `Major`, `Name`, `Phone_Number`, `Password`, `Balance_Of_Volations`, `Status`) VALUES
(1, '1234567', 'IT', 'Lena', '0790000000', '123456789', 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(20) NOT NULL,
  `Name` varchar(250) COLLATE utf8_bin NOT NULL,
  `Username` varchar(250) COLLATE utf8_bin NOT NULL,
  `Password` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Username`, `Password`) VALUES
(1, 'Test', 'user', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `volations`
--

CREATE TABLE `volations` (
  `ID` int(20) NOT NULL,
  `S_ID` int(20) NOT NULL,
  `R_ID` int(20) NOT NULL,
  `Date` varchar(250) COLLATE utf8_bin NOT NULL,
  `Amount` int(20) NOT NULL,
  `Add_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `volations`
--

INSERT INTO `volations` (`ID`, `S_ID`, `R_ID`, `Date`, `Amount`, `Add_Date_Time`) VALUES
(1, 1, 1, '2020-04-28', 1, '2020-04-29 12:32:46'),
(2, 1, 1, '2020-04-29', 1, '2020-04-29 12:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `borrowing_records`
--
ALTER TABLE `borrowing_records`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `Book_ID` (`Book_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `volations`
--
ALTER TABLE `volations`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `borrowing_records`
--
ALTER TABLE `borrowing_records`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `volations`
--
ALTER TABLE `volations`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `Category_ID` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`ID`);

--
-- Constraints for table `borrowing_records`
--
ALTER TABLE `borrowing_records`
  ADD CONSTRAINT `Book_ID` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`ID`),
  ADD CONSTRAINT `Student_ID` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
