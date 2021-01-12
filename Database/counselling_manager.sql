-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 07:35 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

--
-- Dumping data for table `appointment_request`
--

INSERT INTO `appointment_request` (`id`, `problem`, `schedule_id`, `slot`, `client_id`, `counselor_id`, `status`) VALUES
(1, 'abc', 1, 0, 12, 21, 'reject'),
(8, 'problem is very high', 13, 4, 12, 18, 'pending'),
(10, 'there is a new problem is here. can you solve?', 15, 7, 12, 21, 'accept'),
(11, 'what should i do?', 15, 3, 12, 21, 'reject'),
(12, 'testing problem', 16, 2, 12, 21, 'reject'),
(13, 'my roof is crecked', 16, 4, 12, 21, 'reject'),
(14, 'there is a new problem is here. can you solve?', 16, 6, 12, 21, 'accept'),
(15, 'testing problem', 16, 2, 12, 21, 'reject');

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
(1, 21, 'business planning process'),
(2, 21, 'Architectural Design'),
(3, 21, 'Architectural Design'),
(4, 21, 'Scecurity Analyst'),
(5, 14, 'business planning process'),
(6, 22, 'business planning process'),
(7, 22, 'Architectural Design'),
(8, 18, 'artificial intelligence for robotics'),
(9, 14, 'artificial intelligence for robotics'),
(10, 14, 'artificial intelligence for robotics'),
(11, 20, 'artificial intelligence for robotics'),
(12, 22, 'Architectural Design'),
(13, 18, 'Architectural Design'),
(14, 22, 'automobile electric car self driving system');

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

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `profile_link`, `profile_type`, `user_id`) VALUES
(2, 'https://www.linkedin.com/', 'linkedin', 22),
(3, 'no_link', 'portfolio', 22),
(4, 'https://www.facebook.com/alaminhbd', 'facebook', 22),
(5, 'https://www.youtube.com/channel/UCweMn-5F9ksTKIu7aOyJtDA', 'youtube', 18),
(6, 'https://www.linkedin.com/', 'linkedin', 21),
(7, 'https://www.facebook.com/alaminhbd', 'facebook', 21),
(8, 'https://twitter.com/login', 'twitter', 21),
(9, 'http://rowzatussalihinmadrasah.com/', 'portfolio', 21),
(10, 'https://www.youtube.com/channel/UCweMn-5F9ksTKIu7aOyJtDA', 'youtube', 21),
(11, 'https://www.facebook.com/alaminhbd', 'facebook', 12),
(12, 'https://www.youtube.com/channel/UCweMn-5F9ksTKIu7aOyJtDA', 'youtube', 12),
(13, 'https://www.linkedin.com/', 'linkedin', 12),
(21, '52426-2020-07-23-07-07-38.pdf', 'file', 21),
(22, '80471-2020-07-23-07-32-35.pdf', 'file', 12),
(23, 'http://rowzatussalihinmadrasah.com/', 'portfolio', 12),
(24, 'https://www.linkedin.com/', 'twitter', 12),
(25, 'https://www.youtube.com/channel/UCweMn-5F9ksTKIu7aOyJtDA', 'youtube', 22);

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

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `month`, `year`, `slot_schedule`, `counselor_id`) VALUES
(1, 26, 7, 2020, '11323133', 21),
(3, 26, 8, 2020, '11113233', 21),
(5, 27, 7, 2020, '21222222', 21),
(7, 26, 7, 2020, '12212223', 22),
(8, 28, 7, 2020, '22122222', 22),
(9, 27, 7, 2020, '22232222', 22),
(10, 29, 7, 2020, '21222222', 22),
(11, 30, 7, 2020, '22121212', 22),
(12, 31, 7, 2020, '21232321', 22),
(13, 31, 7, 2020, '22221212', 18),
(14, 30, 7, 2020, '22221221', 18),
(15, 31, 7, 2020, '22212221', 21),
(16, 5, 8, 2020, '22131332', 21);

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
(12, 'Al-amin', 'Hasan', 'Bussinees', 'leader', 'alaminwindows10pc@gmail.com', 'ed1363e3b3be736ad04f0664bc48338d', 'client', 'old', '75934-2020-07-10-18-32-49.jpg', 'active'),
(13, 'Afifa', 'binte Alamin', 'Teaching', 'Teacher', 'afifa@gmail.com', 'a5bee04f0b3954ce220fbaf3b638bcb7', 'client', 'old', '19088-2020-07-10-18-24-52.jpg', 'active'),
(14, 'Afifa', 'Hasan', 'Engineer', 'junior developper', 'amin35-1661@diu.edu.bd', '53ba186173faf988c637ca51defe401b', 'counselor', 'old', '44479-2020-07-11-04-54-34.png', 'active'),
(16, 'Al-amin', 'Hasan', 'Teaching', 'Teacher', 'customer@gmail.com', '8fefd7bc15c9468e084dd979fba0cf85', 'client', 'old', '23226-2020-07-10-18-19-39.jpg', 'inactive'),
(17, 'anisur rahman', 'molla', 'Physician', 'senior counselor, GEC', 'anisurrahmanmolla80@gmail.com', '38b9e7987e4e282d329ddd42a557ba59', 'client', 'old', '37974-2020-07-11-04-36-18.png', 'active'),
(18, 'habib', 'ur rahman', 'Science', 'micro biologiest', 'habib@gmail.com', 'a5bee04f0b3954ce220fbaf3b638bcb7', 'counselor', 'old', '60734-2020-07-11-12-34-11.png', 'active'),
(20, 'asma', 'bd', 'Teaching', 'Teacher', 'asma@gmail.com', 'c99d31729b10fea4cfda6a5a92fc43da', 'counselor', 'old', '47908-2020-07-11-12-49-33.png', 'active'),
(21, 'akib', 'hossain', 'Bussinees', 'leader', 'akib@gmail.com', 'c99d31729b10fea4cfda6a5a92fc43da', 'counselor', 'old', '30060-2020-07-16-09-54-18.jpg', 'active'),
(22, 'kamal', 'hossain', 'Engineer', 'junior developper', 'kamal@gmail.com', 'a5bee04f0b3954ce220fbaf3b638bcb7', 'counselor', 'old', '45379-2020-07-17-08-46-28.png', 'active'),
(23, 'imail', 'hosen', NULL, NULL, 'imail@gmail.com', 'a5bee04f0b3954ce220fbaf3b638bcb7', 'counselor', 'new', NULL, 'inactive');

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
-- Dumping data for table `verify_code`
--

INSERT INTO `verify_code` (`id`, `user_email`, `code`) VALUES
(3, 'alaminwindows10pc@gmail.com', 4226),
(4, 'alaminwindows10pc@gmail.com', 389357),
(5, 'alaminwindows10pc@gmail.com', 392018),
(6, 'amin35-1661@diu.edu.bd', 476971),
(7, 'alaminwindows10pc@gmail.com', 544150);

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
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `counselor_sectors`
--
ALTER TABLE `counselor_sectors`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `verify_code`
--
ALTER TABLE `verify_code`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
