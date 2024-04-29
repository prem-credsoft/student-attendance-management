-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 04:21 PM
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
-- Table structure for table `batch_table`
--

CREATE TABLE `batch_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `FacultyName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_table`
--

INSERT INTO `batch_table` (`id`, `name`, `timestamp`, `FacultyName`) VALUES
(4, 'abc', '2024-04-29 05:24:49', 'xyz123');

-- --------------------------------------------------------

--
-- Table structure for table `inquiryinfo`
--

CREATE TABLE `inquiryinfo` (
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

--
-- Dumping data for table `inquiryinfo`
--

INSERT INTO `inquiryinfo` (`id`, `name`, `reference`, `address`, `mobile_number`, `time_of_classes`, `profession`, `date`, `created_at`) VALUES
(16, 'QQQQQ', 'rehreheheh', 'fsdfsfsdfsfsdfg, gwegwesg', '9876541238', '3:00 PM To 4:00 PM', 'Kids', '2024-04-29', '2024-04-29 19:06:58');

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
(13, 2, 1.00, '2024-04-29', 'awsderf', '2024-04-28 10:52:05'),
(15, 4, 1212.00, '2024-04-28', 'wwww', '2024-04-28 10:59:58'),
(16, 2, 1333.00, '2024-04-28', 'sdfsdvfsfv', '2024-04-28 11:00:27'),
(18, 6, 6.00, '2024-04-28', 'fgt', '2024-04-28 11:03:56'),
(19, 7, 2222.00, '2024-04-28', 'wdefghju876tre', '2024-04-28 11:08:03'),
(21, 14, 12.00, '2024-04-29', 'vvjv', '2024-04-29 14:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
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

INSERT INTO `studentinfo` (`id`, `name`, `batch`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `profession`, `address`, `admission_time`, `created_at`) VALUES
(2, 'vcb', 'vdsd', 'ABC', 'DEF', '2024-04-12', 'Female', '9876541238', 'Partially Paid', 'Student', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-27', '2024-04-27 10:57:33'),
(4, 'gg', 'vdsd', 'ABC', 'DEF', '2024-05-03', 'Male', '4567891245', 'Partially Paid', 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-28', '2024-04-28 12:46:16'),
(5, 'John Doe', 'fbdf', 'ABC', 'DEF', '2024-04-19', 'Male', '1234567890', 'Partially Paid', 'Student', '123 Main St', '2024-04-28', '2024-04-28 13:13:21'),
(6, 'jay', 'English ', 'sdvfsdsdvfs', 'dfhfgjf', '2024-04-10', 'Male', '1221547854', 'Partially Paid', 'Working Professional', 'sdfgbfdbdsb', '2024-04-28', '2024-04-28 13:32:07'),
(7, 'Jane Smith', 'vdsd', 'sdvfsdsdvfs', 'dfhfgjf', '2024-04-24', 'Male', '9876543210', 'Fully Paid', 'Student', '456 Elm St', '2024-04-28', '2024-04-28 13:32:29'),
(8, 'Christopher Anderson', 'fbdf', 'ABC', 'dfhfgjf', '2024-04-05', 'Male', '3332221111', 'Partially Paid', 'Housewife', '999 Chestnut St', '2024-04-28', '2024-04-28 17:58:36'),
(9, 'Bob White', 'vdsd', 'asdfgt', 'dfhfgjf', '2024-04-25', 'Male', '7779998888', 'Fully Paid', 'Working Professional', '987 Pine St', '2024-04-28', '2024-04-28 17:59:27'),
(10, 'vvvvcccc', 'vdsd', 'asdfgt', 'dfhfgjf', '2024-04-25', 'Female', '1531545613', 'Partially Paid', 'Housewife', 'dsvsdvsd', '2024-04-28', '2024-04-28 18:00:24'),
(11, 'VC', 'vdsd', 'asdfgt', 'dfhfgjf', '2024-04-25', 'Female', '1531545613', 'Partially Paid', 'Housewife', 'dsvsdvsd', '2024-04-29', '2024-04-29 18:33:04'),
(12, 'ABC', 'fbdf', 'asdfgt', 'dfhfgjf', '2024-05-02', 'Male', '1234567898', 'Fully Paid', 'Working Professional', 'BBBBBB', '2024-04-29', '2024-04-29 18:52:00'),
(13, 'DEF', 'vdsd', 'asdfgt', 'DEF', '2024-04-04', 'Male', '9876541238', 'Fully Paid', 'Housewife', 'DDDDDDD', '2024-04-29', '2024-04-29 19:04:17'),
(14, 'wwww', 'vdsd', 'ABC', 'DEF', '2024-05-03', 'Male', '4567891245', 'Partially Paid', 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-29', '2024-04-29 19:12:24'),
(15, 'prem', 'vdsd', 'asdfgt', 'dfhfgjf', '2024-04-25', 'Female', '1531545613', 'Partially Paid', 'Housewife', 'dsvsdvsd', '2024-04-29', '2024-04-29 19:18:20'),
(17, 'ghj', 'vdsd', 'ABC', 'DEF', '2024-05-03', 'Male', '4567891245', 'Partially Paid', 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-29', '2024-04-29 19:33:46'),
(18, 'kkkkk', 'vdsd', 'ABC', 'DEF', '2024-05-03', 'Male', '4567891245', 'Partially Paid', 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-29', '2024-04-29 19:39:15'),
(19, 'QQQQQ', 'fbdf', 'ABC', 'dfhfgjf', '2024-04-03', 'Male', '9876541238', 'Partially Paid', 'Kids', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-04-29', '2024-04-29 19:43:33'),
(20, 'react + vite', 'vdsd', 'ABC', 'DEF', '2024-04-10', 'Male', '1234567890', 'Fully Paid', 'Working Professional', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-29', '2024-04-29 19:44:24'),
(21, 'chagan', 'wert56y7uiop[', 'sdertyuiop;', ';lkjhgfdsa', '2024-04-14', 'Male', '1234567890', 'Fully Paid', 'Other', 'dfvbgnhmj,kl;oiuytre', '2024-04-29', '2024-04-29 19:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `mobile`, `password`, `created_at`) VALUES
(1, 'prem', 'prem acharya', 'prem@admin.info', '8888888888', 'prem', '2024-04-28 14:02:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_table`
--
ALTER TABLE `batch_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiryinfo`
--
ALTER TABLE `inquiryinfo`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiryinfo`
--
ALTER TABLE `inquiryinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
