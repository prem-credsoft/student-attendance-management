-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 03:44 PM
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
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`, `batch_id`, `created_at`) VALUES
(1, 9, '2024-05-01', 0, 5, '2024-05-04 12:50:25'),
(2, 9, '2024-05-02', 0, 5, '2024-05-04 12:50:25'),
(3, 9, '2024-05-03', 2, 5, '2024-05-04 12:50:25'),
(4, 26, '2024-05-01', 1, 5, '2024-05-04 12:50:25'),
(5, 26, '2024-05-02', 0, 5, '2024-05-04 12:50:25'),
(6, 26, '2024-05-03', 1, 5, '2024-05-04 12:50:25'),
(7, 27, '2024-05-01', 0, 5, '2024-05-04 12:50:25'),
(8, 27, '2024-05-02', 1, 5, '2024-05-04 12:50:25'),
(9, 27, '2024-05-03', 1, 5, '2024-05-04 12:50:25'),
(10, 28, '2024-05-01', 1, 5, '2024-05-04 12:50:25'),
(11, 28, '2024-05-02', 0, 5, '2024-05-04 12:50:25'),
(12, 28, '2024-05-03', 2, 5, '2024-05-04 12:50:25'),
(13, 52, '2024-05-01', 0, 5, '2024-05-04 12:50:25'),
(14, 52, '2024-05-02', 0, 5, '2024-05-04 12:50:25'),
(15, 52, '2024-05-03', 0, 5, '2024-05-04 12:50:25'),
(16, 55, '2024-05-01', 2, 5, '2024-05-04 12:50:25'),
(17, 55, '2024-05-02', 0, 5, '2024-05-04 12:50:25'),
(18, 55, '2024-05-03', 0, 5, '2024-05-04 12:50:25'),
(19, 56, '2024-05-01', 0, 5, '2024-05-04 12:50:25'),
(20, 56, '2024-05-02', 0, 5, '2024-05-04 12:50:25'),
(21, 56, '2024-05-03', 2, 5, '2024-05-04 12:50:25'),
(22, 57, '2024-05-01', 0, 5, '2024-05-04 12:50:25'),
(23, 57, '2024-05-02', 2, 5, '2024-05-04 12:50:25'),
(24, 57, '2024-05-03', 1, 5, '2024-05-04 12:50:25'),
(25, 58, '2024-05-01', 1, 5, '2024-05-04 12:50:25'),
(26, 58, '2024-05-02', 0, 5, '2024-05-04 12:50:25'),
(27, 58, '2024-05-03', 0, 5, '2024-05-04 12:50:25'),
(28, 59, '2024-05-01', 0, 5, '2024-05-04 12:50:25'),
(29, 59, '2024-05-02', 1, 5, '2024-05-04 12:50:25'),
(30, 59, '2024-05-03', 0, 5, '2024-05-04 12:50:25'),
(31, 8, '2024-05-01', 0, 11, '2024-05-04 12:50:25'),
(32, 8, '2024-05-02', 1, 11, '2024-05-04 12:50:25'),
(33, 8, '2024-05-03', 0, 11, '2024-05-04 12:50:25'),
(35, 24, '2024-05-02', 2, 11, '2024-05-04 12:50:25'),
(36, 24, '2024-05-03', 0, 11, '2024-05-04 12:50:25'),
(37, 8, '2024-05-04', 2, 11, '2024-05-04 12:50:25'),
(38, 24, '2024-05-04', 1, 11, '2024-05-04 12:50:25'),
(39, 9, '2024-05-04', 1, 5, '2024-05-04 12:50:53'),
(40, 26, '2024-05-04', 0, 5, '2024-05-04 12:50:53'),
(41, 27, '2024-05-04', 0, 5, '2024-05-04 12:50:53'),
(42, 28, '2024-05-04', 0, 5, '2024-05-04 12:50:53'),
(43, 52, '2024-05-04', 0, 5, '2024-05-04 12:50:53'),
(44, 55, '2024-05-04', 0, 5, '2024-05-04 12:50:53'),
(45, 56, '2024-05-04', 1, 5, '2024-05-04 12:50:53'),
(46, 57, '2024-05-04', 0, 5, '2024-05-04 12:50:53'),
(47, 58, '2024-05-04', 1, 5, '2024-05-04 12:50:53'),
(49, 59, '2024-05-04', 2, 5, '2024-05-04 12:52:39'),
(50, 61, '2024-05-04', 0, 11, '2024-05-04 13:38:51');

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
(5, 'abc', '2024-05-04 07:36:09', 'nndfnd'),
(11, 'Rust', '2024-05-04 06:27:43', 'Javascript'),
(17, 'demo', '2024-05-04 11:24:22', 'demo4');

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
(29, 'dsfhjnqkwm,edc', 'zdxfcgvhbjnk', 'rdyguhjkl', '1234567890', '7:30 AM To 8:30 AM', 'Student', '2024-05-01', '2024-05-04 16:34:40'),
(30, 'dghdg', 'abc', 'fsdfsfsdfsfsdfg, gwegwesg', '1234567898', '5:00 PM To 6:00 PM', 'Housewife', '2024-05-03', '2024-05-04 18:35:46'),
(31, 'ABC', 'rehreheheh', 'dsvsdvsd', '9876541238', '7:30 AM To 8:30 AM', 'Kids', '2024-05-02', '2024-05-04 18:36:09'),
(32, 'JKL', 'rehreheheh', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '1651649481', '7:30 AM To 8:30 AM', 'Housewife', '2024-05-04', '2024-05-04 18:36:23'),
(33, 'aaaa', 'UYYRR', 'sdvsbsbss, fefgse', '9876541238', '4:00 PM To 5:00 PM', 'Kids', '2024-05-04', '2024-05-04 18:36:45'),
(34, 'IOOI', 'abc', 'dsvsdvsd', '6546545131', '5:00 PM To 6:00 PM', 'Working Professional', '2024-05-06', '2024-05-06 15:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `student_id`, `reason`, `start_date`, `end_date`, `created_at`) VALUES
(9, 24, 'sdgdfhdhgd r reh re gre g', '2024-05-05', '2024-05-07', '2024-05-01 18:20:06'),
(14, 26, 'sdgdfhdhgd r reh re gre g', '2024-05-26', '2024-06-07', '2024-05-04 13:40:14');

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
(27, 8, 3000.00, '2024-04-30', 'ouiyoihjk', '2024-04-30 13:29:24'),
(30, 58, 5555.00, '2024-05-04', 'dfdfhd', '2024-05-04 08:01:40'),
(31, 26, 100.00, '2024-05-04', 'vhjkv', '2024-05-04 08:03:01'),
(33, 26, 9700.00, '2024-05-04', 'bas ese hi', '2024-05-04 11:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `batch_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `fee_status` varchar(50) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `admission_time` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `pending_fees` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `batch`, `batch_name`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `profession`, `address`, `admission_time`, `created_at`, `pending_fees`) VALUES
(8, 'Christopher Anderson demo', 11, 'Rust', 'ABC', 'dfhfgjf', '2024-04-05', 'Male', '3332221111', 'Partially Paid', 'Housewife', '999 Chestnut St', '2024-05-04', '2024-04-28 17:58:36', 6800.00),
(9, 'Bob White', 5, 'xyzx', 'asdfgt', 'dfhfgjf', '2024-04-25', 'Male', '7779998888', 'Fully Paid', 'Working Professional', '987 Pine St', '2024-05-02', '2024-04-28 17:59:27', 9800.00),
(24, 'nextjs', 11, 'React JS', 'Node JS', 'React JS', '2024-04-04', 'Male', '1531545613', 'Fully Paid', 'Working Professional', 'sdvsbsbss, fefgse', '2024-05-04', '2024-04-30 16:40:20', 9800.00),
(26, 'QQQQQQQ', 5, 'xyzx', 'ABC', 'dfhfgjf', '2024-04-04', 'Female', '9876541238', 'Partially Paid', 'Kids', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-02', '2024-04-30 17:41:48', 0.00),
(27, 'ABC', 5, 'xyzx', 'vvvvv', 'ddddd', '2024-04-02', 'Male', '9876541238', 'Fully Paid', 'Housewife', 'sdfgbfdbdsb', '2024-05-02', '2024-04-30 18:29:07', 9800.00),
(28, 'xxxxyyyyy', 5, 'xyzx', 'ABC', 'sdgsd', '2024-04-04', 'Female', '1231651618', 'Partially Paid', 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-02', '2024-04-30 18:34:32', 9800.00),
(52, 'rest', 5, 'xyzx', 'asdfgt', 'dfhfgjf', '2024-04-04', 'Male', '1234567898', 'Fully Paid', 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-05-02', '2024-04-30 18:41:41', 9800.00),
(55, 'XYZ', 5, 'xyzx', 'ABC', 'DEF', '2024-05-03', 'Female', '4565864577', 'Partially Paid', 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-02', '2024-05-02 12:21:54', 9800.00),
(56, 'jk', 5, 'xyzx', 'asdfgt', 'sdgsd', '2024-05-05', 'Male', '4651321321', 'Fully Paid', 'Student', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-05-03', '2024-05-02 12:32:09', 9800.00),
(57, 'NMKL', 5, 'xyzx', 'asdfgt', 'dfhfgjf', '0000-00-00', 'Male', '7894561230', 'Fully Paid', 'Student', 'sdgsbsb', '2024-05-02', '2024-05-02 12:47:33', 9800.00),
(58, 'GJ', 5, 'xyzx', 'sdvfsdsdvfs', 'sdgsd', '2024-05-05', 'Male', '5465468325', 'Fully Paid', 'Working Professional', 'sdvsbsbss, fefgse', '2024-05-02', '2024-05-02 12:49:29', 4245.00),
(59, 'WWW', 5, 'xyzx', 'sdvfsdsdvfs', 'sdgsd', '2024-05-05', 'Male', '1221547854', 'Fully Paid', 'Housewife', 'sdfgbfdbdsb', '2024-05-02', '2024-05-02 12:51:08', 9800.00),
(61, 'dart', 11, 'Rust', 'html', 'css', '2024-05-03', 'Male', '4565165131', 'Partially Paid', 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-04', '2024-05-04 13:38:42', 9800.00),
(62, 'gjulyuyughrjy', 5, 'abc', 'fgchvjbkn', 'fgghjk', '2024-05-02', 'Male', '4768765435', 'Fully Paid', 'Kids', 'cgykuhkgfyk', '2024-05-04', '2024-05-04 16:51:25', 9800.00),
(63, 'demo', 5, 'abc', 'senior demo', 'mrs senior demo', '2024-05-01', 'Male', '2345678908', 'Fully Paid', 'Student', 'ncujgwker,gmw,oerpgwejnw uweihrk', '2024-05-04', '2024-05-04 16:52:31', 9800.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `mobile`, `password`, `status`, `created_at`) VALUES
(1, 'super', 'superadmin', 'super@admin.com', '7894567894', '123', 0, '2024-05-07 12:35:22'),
(2, 'admin', 'admin123', 'admin@admin.com', '7777777777', 'admin', 1, '2024-05-07 12:37:43'),
(3, 'prem', 'prem acharya', 'prem@admin.info', '9999999999', 'prem', 2, '2024-05-07 12:40:06'),
(4, 'parth', 'parth parmar', 'parth@gmail.com', '4641654641', '123', 2, '2024-05-07 12:55:49'),
(9, 'test', 'test123', 'test@gmail.com', '8888888888', '123', 2, '2024-05-07 13:14:30'),
(11, 'demo', 'demo123', 'hicevo8179@ociun.com', '5465655615', '123', 2, '2024-05-07 13:16:45'),
(19, 'abc', 'abc12', 'abc@gmail.com', '1598465465', '123', 2, '2024-05-07 13:38:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `batch_id` (`batch_id`);

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
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inquiryinfo`
--
ALTER TABLE `inquiryinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studentinfo` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch_table` (`id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studentinfo` (`id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studentinfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
