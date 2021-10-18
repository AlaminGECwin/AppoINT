-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 03:58 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `counselling_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

CREATE TABLE `appointment_request` (
  `id` int(40) NOT NULL,
  `problem` varchar(2000) NOT NULL,
  `schedule_id` int(100) NOT NULL,
  `slot` int(1) NOT NULL,
  `client_id` int(10) NOT NULL,
  `counselor_id` int(10) NOT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counselor_sectors`
--

CREATE TABLE `counselor_sectors` (
  `id` int(40) NOT NULL,
  `counselor_id` int(40) NOT NULL,
  `sector` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counselor_sectors`
--

INSERT INTO `counselor_sectors` (`id`, `counselor_id`, `sector`) VALUES
(1, 1, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `profile_link` varchar(250) NOT NULL,
  `profile_type` varchar(15) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(200) NOT NULL,
  `date` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `slot_schedule` varchar(8) NOT NULL,
  `counselor_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `profession` varchar(40) DEFAULT NULL,
  `designation` varchar(40) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `profile_picture` varchar(80) DEFAULT NULL,
  `active_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `profession`, `designation`, `email`, `password`, `user_type`, `user_status`, `profile_picture`, `active_status`) VALUES
(1, 'Al-amin', 'Hasan', 'Software Engineer', 'junior developer', 'alaminhbd@gmail.com', '9bf88de9dfec6ff480bf885a268d5b7f', 'counselor', 'old', '90332-2021-10-13-03-39-32.JPG', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `verify_code`
--

CREATE TABLE `verify_code` (
  `id` int(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `counselor_id` (`counselor_id`);

--
-- Indexes for table `counselor_sectors`
--
ALTER TABLE `counselor_sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counselor_id` (`counselor_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counselor_id` (`counselor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `verify_code`
--
ALTER TABLE `verify_code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_2` (`code`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_request`
--
ALTER TABLE `appointment_request`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselor_sectors`
--
ALTER TABLE `counselor_sectors`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verify_code`
--
ALTER TABLE `verify_code`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD CONSTRAINT `appointment_request_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `appointment_request_ibfk_2` FOREIGN KEY (`counselor_id`) REFERENCES `schedule` (`counselor_id`),
  ADD CONSTRAINT `appointment_request_ibfk_3` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`);

--
-- Constraints for table `counselor_sectors`
--
ALTER TABLE `counselor_sectors`
  ADD CONSTRAINT `counselor_id` FOREIGN KEY (`counselor_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`counselor_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `verify_code`
--
ALTER TABLE `verify_code`
  ADD CONSTRAINT `verify_code_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
