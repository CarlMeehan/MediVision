-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2016 at 12:18 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medivision`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` varchar(35) NOT NULL,
  `start` varchar(35) NOT NULL,
  `finish` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `email`, `date`, `start`, `finish`) VALUES
(2, 'garethgreenaway@medivision.com', '21/02/2016', '8am', '4:30pm'),
(3, 'carlmeehan@medivision.com', '21/02/2016', '8am', '4pm');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `taskName` varchar(255) NOT NULL,
  `taskDesc` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `taskName`, `taskDesc`, `email`) VALUES
(1, 'Meeting at 3pm', 'please attend this meeting!!', 'garethgreenaway@medivision.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `image` varchar(255) NOT NULL,
  `authorisation` varchar(8) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `image`, `authorisation`, `department`) VALUES
(31, 'Sean Treanor', 'seantreanor@medivision.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'includes/img/account_logo.png', 'admin', 'IT Systems'),
(34, 'Gareth Greenaway', 'garethgreenaway@medivision.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'includes/img/account_logo.png', 'standard', 'IT Systems'),
(35, 'Carl Meehan', 'carlmeehan@medivision.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'includes/img/account_logo.png', 'standard', 'IT Systems'),
(36, 'Darren Lynch', 'darrenlynch@medivision.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'includes/img/account_logo.png', 'standard', 'IT Systems');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
