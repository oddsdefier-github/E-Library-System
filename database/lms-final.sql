-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 06:13 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `BookId` int(10) NOT NULL,
  `Author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`BookId`, `Author`) VALUES
(23, 'Prince Kennex '),
(23, 'Reguyal Aldama'),
(24, 'Marilyn Mendoza'),
(24, 'Orlando Oronce'),
(25, 'DIWA'),
(26, 'J.K. Rowling'),
(26, 'Mary GrandPrÃ©'),
(27, 'Douglas Adams'),
(28, 'Bill Bryson'),
(29, 'Chris Smith'),
(29, 'Christopher Lee'),
(29, 'Richard Taylor');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookId` int(10) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Publisher` varchar(50) DEFAULT NULL,
  `Year` varchar(50) DEFAULT NULL,
  `Availability` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookId`, `Title`, `Publisher`, `Year`, `Availability`) VALUES
(23, 'The Contemporary World', 'Publishing World co.', '1992', 99),
(24, 'E-Math Elementary Algebra', 'Math Publishing co.', '2015', 99),
(25, 'Linking the World through English II', 'DIWA Publishing Corp.', '2006', 100),
(26, 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling', '2006', 100),
(28, 'Notes from a Small Island', 'Bill Bryson', '2002', 100),
(29, 'The Lord of the Rings: Weapons and Warfare', 'Chris Smith', '1995', 100);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `M_Id` int(10) NOT NULL,
  `RollNo` varchar(50) DEFAULT NULL,
  `Msg` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`M_Id`, `RollNo`, `Msg`, `Date`, `Time`) VALUES
(53, '2', 'Your request for issue of BookId: 20 has been accepted', '2023-01-24', '19:59:35'),
(57, '2', 'Your request for issue of BookId: 23 has been accepted', '2023-01-28', '00:23:52'),
(58, '2', 'Your request for issue of BookId: 24 has been accepted', '2023-01-28', '00:23:56'),
(59, '2', 'Your request for renewal of BookId: 23 has been accepted', '2023-01-28', '00:35:25'),
(60, '2', 'Your request for renewal of BookId: 24 has been accepted', '2023-01-28', '00:37:18'),
(61, '2', 'Yo', '2023-01-28', '00:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `R_ID` int(10) NOT NULL,
  `Book_Name` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `RollNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`R_ID`, `Book_Name`, `Description`, `RollNo`) VALUES
(15, 'Coo by Kaela Noel', 'After being raised by a flock of pigeons on an abandoned rooftop her whole life, a young girl must make a perilous trip to the ground for the first time to find help for Burr, the pigeon she loves most. With the help a retired postal worker, Burrâ€™s brok', '2');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL,
  `Date_of_Issue` date DEFAULT NULL,
  `Due_Date` date DEFAULT NULL,
  `Date_of_Return` date DEFAULT NULL,
  `Dues` int(10) DEFAULT NULL,
  `Renewals_left` int(10) DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`RollNo`, `BookId`, `Date_of_Issue`, `Due_Date`, `Date_of_Return`, `Dues`, `Renewals_left`, `Time`) VALUES
('1', 19, '2023-01-23', '2023-07-22', NULL, NULL, 1, '22:19:20'),
('2', 19, '2023-01-23', '2023-07-22', '2023-01-23', -180, 1, '12:45:36'),
('2', 20, '2023-01-24', '2023-07-23', NULL, NULL, 1, '18:36:16'),
('2', 21, '2023-01-23', '2024-01-18', '2023-01-24', -359, 0, '18:10:41'),
('2', 22, '2023-01-23', '2023-07-22', NULL, NULL, 1, '18:10:33'),
('2', 23, '2023-01-28', '2024-01-23', NULL, NULL, 0, '00:23:26'),
('2', 24, '2023-01-28', '2024-01-23', NULL, NULL, 0, '00:23:30'),
('4', 19, '2023-01-24', '2023-07-23', NULL, NULL, 1, '18:53:13'),
('4', 20, '2023-01-24', '2023-07-23', NULL, NULL, 1, '18:53:16'),
('4', 21, '2023-01-24', '2023-07-23', NULL, NULL, 1, '18:53:10'),
('4', 22, '2023-01-24', '2023-07-23', NULL, NULL, 1, '18:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `renew`
--

CREATE TABLE `renew` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE `return` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `RollNo` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `MobNo` bigint(11) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`RollNo`, `Name`, `Type`, `Category`, `EmailId`, `MobNo`, `Password`) VALUES
('1', 'Jeffry James', 'Student', 'College', 'jeffey@gmail.com', 1234567891, 'jeff12345'),
('123', 'Jeffry ', 'Student', 'College', 'jeffry@gmail.com', 1234567, 'jeffry12345'),
('12345', 'Josh Sandoval', 'Student', 'Junior', 'sandoval@gmail.com', 0, 'sandoval123'),
('124', 'Germs Red', 'Student', 'Junior', 'germs@gmail.com', 123456789, 'germs123'),
('2', 'Juan Dela Cruz', 'Student', 'College', 'juan@gmail.com', 123456, 'juan12345'),
('23', 'Lebron James', 'Student', 'Junior', 'lebron@gmail.com', 123456789, 'lebron123'),
('3', 'Hannah Uvas', 'Student', 'College', 'lei@gmail.com', 123456789, 'lei12345'),
('4', 'James Red', 'Student', 'Elementary', 'jamesred@gmail.com', 12345678, 'red12345'),
('ADMIN', 'admin', 'Admin', NULL, 'admin@gmail.com', 345454, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`BookId`,`Author`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`M_Id`),
  ADD KEY `RollNo` (`RollNo`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `RollNo` (`RollNo`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `renew`
--
ALTER TABLE `renew`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`RollNo`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `M_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `R_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`);

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);

--
-- Constraints for table `renew`
--
ALTER TABLE `renew`
  ADD CONSTRAINT `renew_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`),
  ADD CONSTRAINT `renew_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);

--
-- Constraints for table `return`
--
ALTER TABLE `return`
  ADD CONSTRAINT `return_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`),
  ADD CONSTRAINT `return_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
