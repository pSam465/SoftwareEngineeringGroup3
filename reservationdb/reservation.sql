-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 06:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipID` int(11) NOT NULL,
  `equipType` char(45) NOT NULL,
  `equipAvailability` tinyint(1) NOT NULL,
  `equipQuantity` int(11) NOT NULL,
  `equipName` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipID`, `equipType`, `equipAvailability`, `equipQuantity`, `equipName`) VALUES
(211, 'Laptop', 1, 10, 'Macbook'),
(212, 'Table', 1, 5, 'Folding Table'),
(213, 'Projector', 1, 2, 'Projector'),
(214, 'Laptop', 1, 10, 'Dell XPS'),
(215, 'Television', 1, 2, 'Sony TV');

-- --------------------------------------------------------

--
-- Table structure for table `equipreservation`
--

CREATE TABLE `equipreservation` (
  `eReservationNum` int(11) NOT NULL,
  `equipID` int(11) DEFAULT NULL,
  `reservationStart` datetime NOT NULL,
  `reservationEnd` datetime NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipreservation`
--

INSERT INTO `equipreservation` (`eReservationNum`, `equipID`, `reservationStart`, `reservationEnd`, `userID`) VALUES
(140, 211, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 111),
(141, 213, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 114),
(142, 211, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 116),
(143, 214, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 112),
(144, 214, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 117),
(145, 212, '2021-04-29 22:57:00', '2021-04-29 23:57:00', 112),
(147, 211, '2021-04-29 18:26:00', '2021-04-29 23:35:00', 112),
(148, 211, '2021-04-30 18:26:00', '2021-04-30 23:35:00', 112),
(149, 211, '2021-05-01 18:26:00', '2021-05-01 23:35:00', 112),
(150, 211, '2021-05-02 18:26:00', '2021-05-02 23:35:00', 112),
(151, 211, '2021-05-03 18:26:00', '2021-05-03 23:35:00', 112),
(152, 211, '2021-05-04 18:26:00', '2021-05-04 23:35:00', 112),
(153, 211, '2021-05-05 18:26:00', '2021-05-05 23:35:00', 112),
(154, 211, '2021-05-06 18:26:00', '2021-05-06 23:35:00', 112),
(155, 211, '2021-05-07 18:26:00', '2021-05-07 23:35:00', 112),
(156, 211, '2021-05-08 18:26:00', '2021-05-08 23:35:00', 112),
(157, 213, '2021-04-30 18:26:00', '2021-04-30 23:35:00', 112),
(158, 214, '2021-04-30 01:44:00', '2021-04-30 05:44:00', 112),
(159, 214, '2021-05-01 01:44:00', '2021-05-01 05:44:00', 112),
(160, 214, '2021-05-02 01:44:00', '2021-05-02 05:44:00', 112),
(161, 214, '2021-05-03 01:44:00', '2021-05-03 05:44:00', 112),
(162, 214, '2021-05-04 01:44:00', '2021-05-04 05:44:00', 112),
(163, 214, '2021-05-05 01:44:00', '2021-05-05 05:44:00', 112),
(164, 214, '2021-05-06 01:44:00', '2021-05-06 05:44:00', 112),
(165, 215, '2021-05-05 00:46:00', '2021-05-05 02:46:00', 112);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(11) NOT NULL,
  `roomType` char(100) NOT NULL,
  `building` char(100) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `roomAvailability` tinyint(1) NOT NULL,
  `roomDesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomType`, `building`, `roomNum`, `roomAvailability`, `roomDesc`) VALUES
(100, 'Study Room', 'Ina Dillard Russel Library', 324, 1, 'test data ina 324'),
(101, 'Lecture Hall', 'Arts and Science', 264, 1, 'test data a&s 264'),
(102, 'Computer Lab', 'Arts and Science', 234, 1, 'test data a&s 234'),
(103, 'Computer Lab', 'Atkinson', 104, 1, 'test data stk 104'),
(104, 'Lecture Hall', 'Atkinson', 215, 1, 'test data atk 215'),
(105, 'Study Room', 'Ina Dillard Russel Library', 403, 1, 'test data ina 403'),
(106, 'Large Lecture Hall', 'Arts and Science', 354, 1, 'test data a&s 354'),
(107, 'Study Room', 'Ina Dillard Russel Library', 234, 1, 'test data ina 234'),
(108, 'Study Room', 'Ina Dillard Russel Library', 252, 1, 'test data in 252'),
(109, 'Study Room', 'Ina Dillard Russel Library', 234, 1, 'test data ina 234 v2');

-- --------------------------------------------------------

--
-- Table structure for table `roomreservation`
--

CREATE TABLE `roomreservation` (
  `roomResNum` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `reservationStart` datetime NOT NULL,
  `reservationEnd` datetime NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roomreservation`
--

INSERT INTO `roomreservation` (`roomResNum`, `roomID`, `reservationStart`, `reservationEnd`, `userID`) VALUES
(151, 100, '2021-03-15 08:00:00', '2021-03-15 08:30:00', 112),
(152, 103, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 116),
(153, 106, '2021-03-15 11:00:00', '2021-03-15 12:30:00', 111),
(154, 103, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 116),
(155, 103, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 117),
(156, 100, '2021-04-29 21:28:00', '2021-04-29 22:28:00', 112),
(157, 101, '2021-04-29 21:39:00', '2021-04-29 23:45:00', 112),
(158, 101, '2021-04-30 21:39:00', '2021-04-30 23:45:00', 112),
(159, 101, '2021-05-01 21:39:00', '2021-05-01 23:45:00', 112),
(160, 101, '2021-05-02 21:39:00', '2021-05-02 23:45:00', 112),
(161, 101, '2021-05-03 21:39:00', '2021-05-03 23:45:00', 112),
(162, 101, '2021-05-04 21:39:00', '2021-05-04 23:45:00', 112),
(163, 101, '2021-05-05 21:39:00', '2021-05-05 23:45:00', 112),
(164, 101, '2021-05-06 21:39:00', '2021-05-06 23:45:00', 112),
(165, 105, '2021-04-29 19:24:00', '2021-04-29 23:46:00', 112);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(200) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `position` char(100) NOT NULL,
  `fName` char(100) NOT NULL,
  `lName` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `salt`, `position`, `fName`, `lName`) VALUES
(110, 'fake@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'student', 'gregg', 'turkington'),
(111, 'samuel.pittman@bobcats.gcsu.edu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'admin', 'Samuel', 'pittman'),
(112, 'justin.hentz@bobcats.gcsu.edu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'admin', 'Justin', 'hentz'),
(113, 'allan.crassweller@bobcats.gcsu.edu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'admin', 'allan', 'crassweller'),
(114, 'trenton.brownlee@bobcats.gcsu.edu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'admin', 'trenton', 'brownlee'),
(115, 'angelica.jones@bobcats.gcsu.edu', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'admin', 'Angelica', 'jones'),
(116, 'fake@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'student', 'fake', 'namington'),
(117, 'fake@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'student', 'Seth', 'Douglas'),
(118, 'fake@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'student', 'Tim', 'hecker'),
(119, 'fake@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'student', 'bob', 'saltworts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipID`);

--
-- Indexes for table `equipreservation`
--
ALTER TABLE `equipreservation`
  ADD PRIMARY KEY (`eReservationNum`),
  ADD KEY `equipID` (`equipID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `roomreservation`
--
ALTER TABLE `roomreservation`
  ADD PRIMARY KEY (`roomResNum`),
  ADD KEY `userID` (`userID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipreservation`
--
ALTER TABLE `equipreservation`
  MODIFY `eReservationNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `roomreservation`
--
ALTER TABLE `roomreservation`
  MODIFY `roomResNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipreservation`
--
ALTER TABLE `equipreservation`
  ADD CONSTRAINT `equipreservation_ibfk_1` FOREIGN KEY (`equipID`) REFERENCES `equipment` (`equipID`);

--
-- Constraints for table `roomreservation`
--
ALTER TABLE `roomreservation`
  ADD CONSTRAINT `roomreservation_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `roomreservation_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
