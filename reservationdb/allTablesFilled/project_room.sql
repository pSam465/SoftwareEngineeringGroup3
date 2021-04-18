-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 04:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
