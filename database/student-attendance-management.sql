-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 02:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-attendance-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquirieinfo`
--

CREATE TABLE `enquirieinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `time_of_classes` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `student_id`, `amount`, `payment_date`, `message`, `created_at`) VALUES
(1, 3, 2000.00, '2024-04-27', 'lhjvljhvjhv', '2024-04-27 12:28:39'),
(2, 2, 3000.00, '2024-04-27', 'dsgsdgdsg', '2024-04-27 12:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `batch` varchar(100) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `fee_status` varchar(50) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `admission_time` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `student_name`, `batch`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `profession`, `address`, `admission_time`, `created_at`) VALUES
(2, 'vcb', 'vdsd', 'ABC', 'DEF', '2024-04-12', 'Female', '9876541238', 'Partially Paid', 'Student', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-27', '2024-04-27 10:57:33'),
(3, 'xfbfsdbsb', 'vdsd', 'sdvfsdsdvfs', 'sdgsd', '2024-04-10', 'Male', '4654564654', 'Fully Paid', 'Working Professional', 'sdvsbsbss, fefgse', '2024-04-27', '2024-04-27 16:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '2024-04-27 10:35:53'),
(2, 'prem', 'prem', 'prem@gmail.com', '2024-04-27 10:35:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquirieinfo`
--
ALTER TABLE `enquirieinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquirieinfo`
--
ALTER TABLE `enquirieinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studentinfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
