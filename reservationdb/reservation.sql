-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 09:54 PM
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
(144, 214, '2021-03-15 09:00:00', '2021-03-15 10:30:00', 117);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(11) NOT NULL,
  `roomType` char(100) NOT NULL,
  `building` char(100) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `roomAvailability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomType`, `building`, `roomNum`, `roomAvailability`) VALUES
(1, 'Classroom', 'Arts and Sciences', 310, 1),
(100, 'Study Room', 'Ina Dillard Russel Library', 324, 1),
(101, 'Lecture Hall', 'Arts and Science', 264, 1),
(102, 'Computer Lab', 'Arts and Science', 234, 1),
(103, 'Computer Lab', 'Atkinson', 104, 1),
(104, 'Lecture Hall', 'Atkinson', 215, 1),
(105, 'Study Room', 'Ina Dillard Russel Library', 403, 1),
(106, 'Large Lecture Hall', 'Arts and Science', 354, 1),
(107, 'Study Room', 'Ina Dillard Russel Library', 234, 1),
(108, 'Study Room', 'Ina Dillard Russel Library', 252, 1),
(109, 'Study Room', 'Ina Dillard Russel Library', 234, 1),
(110, 'Classroom', 'Arts and Sciences', 110, 1),
(112, 'Classroom', 'Arts and Sciences', 110, 1),
(113, 'Classroom', 'Arts and Sciences', 111, 1),
(114, 'Classroom', 'Arts and Sciences', 112, 1),
(115, 'Classroom', 'Arts and Sciences', 113, 1),
(116, 'Classroom', 'Arts and Sciences', 114, 1),
(117, 'Classroom', 'Arts and Sciences', 115, 1),
(118, 'Classroom', 'Arts and Sciences', 116, 1),
(119, 'Classroom', 'Arts and Sciences', 117, 1),
(120, 'Classroom', 'Arts and Sciences', 118, 1),
(121, 'Classroom', 'Arts and Sciences', 119, 1),
(122, 'Classroom', 'Arts and Sciences', 120, 1),
(124, 'Classroom', 'Arts and Sciences', 111, 1),
(125, 'Classroom', 'Arts and Sciences', 112, 1),
(126, 'Classroom', 'Arts and Sciences', 113, 1),
(127, 'Classroom', 'Arts and Sciences', 114, 1),
(128, 'Classroom', 'Arts and Sciences', 115, 1),
(129, 'Classroom', 'Arts and Sciences', 116, 1),
(130, 'Classroom', 'Arts and Sciences', 117, 1),
(131, 'Classroom', 'Arts and Sciences', 118, 1),
(132, 'Classroom', 'Arts and Sciences', 119, 1),
(133, 'Classroom', 'Arts and Sciences', 120, 1);

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
(1234, 113, '2021-03-15 08:00:00', '2021-03-15 09:00:00', NULL),
(12346, 113, '2021-03-15 08:00:00', '2021-03-15 09:00:00', NULL),
(12422, 1, '2021-04-15 11:00:00', '2021-04-15 15:15:00', 110),
(12423, 1, '2021-04-16 11:00:00', '2021-04-16 15:15:00', 110),
(12424, 1, '2021-04-17 11:00:00', '2021-04-17 15:15:00', 110),
(12425, 100, '2021-04-07 11:00:00', '2021-04-07 14:30:00', 112),
(12426, 100, '2021-04-08 11:00:00', '2021-04-08 14:30:00', 112),
(12427, 100, '2021-04-09 11:00:00', '2021-04-09 14:30:00', 112),
(12428, 100, '2021-04-10 11:00:00', '2021-04-10 14:30:00', 112),
(12429, 100, '2021-04-11 11:00:00', '2021-04-11 14:30:00', 112),
(12430, 100, '2021-04-12 11:00:00', '2021-04-12 14:30:00', 112),
(12431, 100, '2021-04-13 11:00:00', '2021-04-13 14:30:00', 112),
(12432, 100, '2021-04-14 11:00:00', '2021-04-14 14:30:00', 112),
(12433, 100, '2021-04-15 11:00:00', '2021-04-15 14:30:00', 112),
(12434, 100, '2021-04-16 11:00:00', '2021-04-16 14:30:00', 112);

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
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `roomreservation`
--
ALTER TABLE `roomreservation`
  MODIFY `roomResNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12435;

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
  ADD CONSTRAINT `roomID` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
