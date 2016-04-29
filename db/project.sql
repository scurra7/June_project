-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2016 at 06:19 AM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(25) NOT NULL,
  `date` date NOT NULL,
  `stuedentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gradings`
--

CREATE TABLE `gradings` (
  `id` int(25) NOT NULL,
  `studentId` varchar(45) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `password`, `role`, `username`) VALUES
(17, '$2y$10$/H1tYD.cegNZz4.TpBTeQuddmWFPFEIcW.4pw8hFDbCbXJVi6b3Xa', 1, 'admin'),
(18, '$2y$10$nXAHM0Kzrfs/DlAb7IJvN.a7okjvPemjx4Smuhe1v2TQgDCde6sXK', 0, 'student'),
(19, '$2y$10$NQOMPGcNpWuVu1crLCVHqeT3QWeGoH8p7RrLov.foK9437q5mfo.2', 1, 'admin'),
(20, '$2y$10$xM8iLGJKCGjrT2.63huoD.GJBXkIC//BWtg.csrBComcyroVm0eKC', 0, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) NOT NULL,
  `currentBeltGrade` text CHARACTER SET swe7 NOT NULL,
  `currentStatus` text CHARACTER SET swe7 NOT NULL,
  `nextGrade` text CHARACTER SET swe7 NOT NULL,
  `nextBeltGradeSyllabus` text CHARACTER SET swe7 NOT NULL,
  `requireStatus` text CHARACTER SET swe7 NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `currentBeltGrade`, `currentStatus`, `nextGrade`, `nextBeltGradeSyllabus`, `requireStatus`, `name`) VALUES
(10, '10th Kup (White Belt)', '9th Kup (Yellow Tag) ', '8th Kup (Yellow Belt) ', '7th Kup (Green Tag) ', 'Yellow', 'Joe Blogs'),
(12, '5th Kup (Blue Tag) ', '4th Kup (Blue Belt) ', '3rd Kup (Red Tag) ', '2nd Kup (Red Belt) ', 'Pass', 'Bob Jones'),
(20, '8th Kup (Yellow Belt) ', '7th Kup (Green Tag) ', '6th Kup (Green Belt) ', '5th Kup (Blue Tag)', 'Pass', 'Bill Green');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `surname` text NOT NULL,
  `firstName` text NOT NULL,
  `joinedClub` date NOT NULL,
  `lastGrading` date NOT NULL,
  `currentGrade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `surname`, `firstName`, `joinedClub`, `lastGrading`, `currentGrade`) VALUES
(1, 'Smith', 'Joe', '2015-01-01', '2015-11-01', '10th Kup: White Belt'),
(2, 'Curran', 'Steve', '2015-02-01', '2015-05-08', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `techniques`
--

CREATE TABLE `techniques` (
  `id` int(25) NOT NULL,
  `discription` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `users` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users`, `password`, `role`) VALUES
(4, '001', '1', 0),
(5, '002', '2', 0),
(6, '003', '3', 0),
(7, '004', '4', 0),
(8, '005', '5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradings`
--
ALTER TABLE `gradings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techniques`
--
ALTER TABLE `techniques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gradings`
--
ALTER TABLE `gradings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `techniques`
--
ALTER TABLE `techniques`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
