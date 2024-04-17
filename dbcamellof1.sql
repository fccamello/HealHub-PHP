-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2024 at 01:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcamellof1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_date`) VALUES
(1, 1, 2, '2024-01-01'),
(2, 1, 2, '2013-01-01'),
(3, 1, 2, '2024-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctor`
--

CREATE TABLE `tbldoctor` (
  `doctor_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldoctor`
--

INSERT INTO `tbldoctor` (`doctor_id`, `account_id`, `specialization`) VALUES
(20, 92, 'Pedia2'),
(21, 91, 'Pedia1');

-- --------------------------------------------------------

--
-- Table structure for table `tblupgraderequest`
--

CREATE TABLE `tblupgraderequest` (
  `request_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblupgraderequest`
--

INSERT INTO `tblupgraderequest` (`request_id`, `account_id`, `specialization`) VALUES
(22, 93, 'Pedia3');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`id`, `account_id`, `email`, `username`, `password`, `user_type`) VALUES
(2, 90, 'admin@gmail.com', 'admin', '$2y$10$WDVWvhUirGHT.k959NSm7.dYfzphC7SiSC6u1DAph9PHCgSvDD11a', 2),
(61, 91, 'doctorone@gmail.com', 'doctorone', '$2y$10$pSknFrUCNfJE8kNTytCkrebCezZ4lUw9as3/X5UOdpgLBDleSj/FK', 1),
(62, 92, 'doctortwo@gmail.com', 'doctortwo', '$2y$10$ErBTIghHdRbvM6Ad7IMJTe4j6oNXhuIRlqm0QbNxaYzf66siVFvFy', 1),
(63, 93, 'doctorthree@gmail.com', 'doctorthree', '$2y$10$UnIJqguYlvmr9q9E5a3TY.c9D6bpgGZpmdCkEFUPXUoEuaO/hcjLq', 0),
(64, 94, 'doctorfour@gmail.com', 'doctorfour', '$2y$10$KNiNgIjJ/5djZVltQ8vTfeZcQE0PJmKhLckt661tkD.MMd6qi/cfu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`user_id`, `firstname`, `lastname`, `gender`, `birthdate`) VALUES
(90, 'admin', 'admin', 'Female', '2024-01-01'),
(91, 'Doctor', 'One', 'Male', '2024-01-01'),
(92, 'Doctor', 'Two', 'Male', '2024-01-01'),
(93, 'Doctor', 'Three', 'Female', '2024-01-01'),
(94, 'Doctor', 'Four', 'Female', '2024-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tblupgraderequest`
--
ALTER TABLE `tblupgraderequest`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblupgraderequest`
--
ALTER TABLE `tblupgraderequest`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD CONSTRAINT `tbluseraccount_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `tbluserprofile` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
