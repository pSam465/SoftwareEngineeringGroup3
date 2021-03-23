-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 06:07 PM
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
