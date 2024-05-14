-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 03:53 PM
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`, `batch_id`, `created_at`, `Reason`) VALUES
(47, 58, '2024-05-04', 1, 5, '2024-05-04 12:50:53', ''),
(49, 59, '2024-05-04', 2, 5, '2024-05-04 12:52:39', 'fgjfg'),
(50, 61, '2024-05-04', 0, 11, '2024-05-04 13:38:51', ''),
(51, 9, '2024-05-10', 0, 5, '2024-05-10 16:59:10', ''),
(58, 26, '2024-05-10', 2, 5, '2024-05-10 17:19:10', 'demo'),
(61, 56, '2024-05-09', 2, 5, '2024-05-10 17:42:40', 'ysrhbfknml,we;.gt[pojiugcegvhjfknlq'),
(62, 24, '2024-05-10', 0, 11, '2024-05-10 18:39:36', ''),
(63, 52, '2024-05-10', 1, 11, '2024-05-10 18:39:36', ''),
(64, 61, '2024-05-10', 0, 11, '2024-05-10 18:39:36', ''),
(66, 27, '2024-05-10', 0, 5, '2024-05-10 19:06:34', ''),
(67, 57, '2024-05-10', 0, 5, '2024-05-10 19:06:34', ''),
(68, 58, '2024-05-10', 1, 5, '2024-05-10 19:06:34', ''),
(69, 59, '2024-05-10', 0, 5, '2024-05-10 19:06:34', ''),
(70, 62, '2024-05-10', 0, 5, '2024-05-10 19:06:34', ''),
(72, 24, '2024-05-11', 1, 11, '2024-05-11 11:08:23', ''),
(73, 26, '2024-05-11', 0, 11, '2024-05-11 11:08:23', ''),
(74, 52, '2024-05-11', 0, 11, '2024-05-11 11:08:23', ''),
(75, 61, '2024-05-11', 0, 11, '2024-05-11 11:08:23', ''),
(76, 27, '2024-05-11', 1, 5, '2024-05-11 11:08:39', ''),
(77, 55, '2024-05-11', 0, 5, '2024-05-11 11:08:39', ''),
(78, 57, '2024-05-11', 0, 5, '2024-05-11 11:08:39', ''),
(79, 58, '2024-05-11', 0, 5, '2024-05-11 11:08:39', ''),
(80, 59, '2024-05-11', 1, 5, '2024-05-11 11:08:39', ''),
(81, 62, '2024-05-11', 0, 5, '2024-05-11 11:08:39', ''),
(82, 24, '2024-05-13', 1, 11, '2024-05-13 16:42:30', ''),
(83, 26, '2024-05-13', 0, 11, '2024-05-13 16:42:30', ''),
(84, 52, '2024-05-13', 0, 11, '2024-05-13 16:42:30', ''),
(85, 61, '2024-05-13', 0, 11, '2024-05-13 16:42:30', ''),
(86, 27, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(87, 55, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(88, 57, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(89, 58, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(90, 59, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(91, 62, '2024-05-13', 0, 5, '2024-05-13 16:42:50', '');

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
(11, 'React', '2024-05-09 11:09:19', 'Javascript');

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
(2, 26, 200.00, '2024-05-10', 'xbd', '2024-05-10 10:25:10'),
(3, 26, 5000.00, '2024-05-10', 'ghkgk', '2024-05-10 10:25:37'),
(6, 27, 500.00, '2024-05-10', 'dvsvb', '2024-05-10 13:19:48'),
(7, 52, 5000.00, '2024-05-10', 'cbdf', '2024-05-10 13:20:30'),
(8, 55, 3000.00, '2024-05-10', 'bdfb', '2024-05-10 13:20:48'),
(9, 57, 600.00, '2024-05-10', 'fddfb', '2024-05-10 13:22:07'),
(10, 58, 1234.00, '2024-05-10', 'bdgbn', '2024-05-10 13:22:24'),
(11, 59, 1313.00, '2024-05-10', 'sdxgsf', '2024-05-10 13:22:49'),
(13, 61, 1234.00, '2024-05-10', 'dfdf', '2024-05-10 13:24:25'),
(15, 62, 5000.00, '2024-05-10', 'ghfg', '2024-05-10 13:25:43'),
(18, 26, 300.00, '2024-05-11', 'Scholarship', '2024-05-11 08:09:55'),
(19, 27, 1000.00, '2024-05-11', 'Scholarship', '2024-05-11 08:45:19'),
(20, 59, 300.00, '2024-05-11', 'Scholarship', '2024-05-11 08:55:27'),
(21, 61, 200.00, '2024-05-11', 'Scholarship', '2024-05-11 08:55:36'),
(24, 27, 600.00, '2024-05-11', 'cvbsf', '2024-05-11 13:05:06'),
(25, 27, 600.00, '2024-05-11', 'cvbsf', '2024-05-11 13:05:06'),
(28, 59, 200.00, '2024-05-11', 'bdg', '2024-05-11 13:23:41'),
(29, 59, 200.00, '2024-05-11', 'bdg', '2024-05-11 13:23:41'),
(30, 26, 700.00, '2024-05-13', 'jgcjc', '2024-05-13 05:32:51'),
(31, 26, 700.00, '2024-05-13', 'jgcjc', '2024-05-13 05:32:51'),
(32, 52, 460.00, '2024-05-13', 'xcvxfv', '2024-05-13 06:31:05'),
(33, 52, 460.00, '2024-05-13', 'xcvxfv', '2024-05-13 06:31:05'),
(34, 55, 2000.00, '2024-05-13', 'cvbc', '2024-05-13 06:31:52'),
(35, 55, 2000.00, '2024-05-13', 'cvbc', '2024-05-13 06:31:52'),
(42, 55, 20.00, '2024-05-13', 'xbx', '2024-05-13 06:42:40'),
(43, 55, 30.00, '2024-05-13', 'fdsdsf', '2024-05-13 06:45:27'),
(44, 24, 1200.00, '2024-05-13', 'xcx', '2024-05-13 07:24:39'),
(45, 24, 8800.00, '2024-05-13', 'xcbx', '2024-05-13 07:39:37');

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
  `fee_status` int(10) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `admission_time` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `pending_fees` int(10) DEFAULT 0,
  `discount` int(10) NOT NULL,
  `total_fees` int(11) NOT NULL,
  `paid_fees` int(11) NOT NULL,
  `aadhar_number` varchar(20) DEFAULT NULL,
  `references` varchar(255) DEFAULT NULL,
  `joining_purpose` varchar(255) DEFAULT NULL,
  `extra_time_daily` varchar(50) DEFAULT NULL,
  `father_mobile_number` varchar(15) DEFAULT NULL,
  `mother_mobile_number` varchar(15) DEFAULT NULL,
  `father_profession` varchar(255) DEFAULT NULL,
  `work_place_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `batch`, `batch_name`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `profession`, `address`, `admission_time`, `created_at`, `pending_fees`, `discount`, `total_fees`, `paid_fees`, `aadhar_number`, `references`, `joining_purpose`, `extra_time_daily`, `father_mobile_number`, `mother_mobile_number`, `father_profession`, `work_place_address`) VALUES
(24, 'nextjs', 11, 'React', 'Node JS', 'React JS', '2024-04-04', 'Male', '1531545613', 0, 'Working Professional', 'sdvsbsbss, fefgse', '2024-05-10', '2024-04-30 16:40:20', 0, 0, 10000, 10000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'QQQQQQQ', 11, 'React', 'ABC', 'dfhfgjf', '2024-04-04', 'Female', '9876541238', 0, 'Kids', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-11', '2024-04-30 17:41:48', 2900, 300, 9800, 6900, '123456789999', NULL, 'ghgj', '3', '1234566542', NULL, NULL, NULL),
(27, 'ABC', 5, 'abc', 'vvvvv', 'ddddd', '2024-04-02', 'Male', '9876541238', 1, 'Housewife', 'sdfgbfdbdsb', '2024-05-11', '2024-04-30 18:29:07', 5500, 1000, 7000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'rest', 11, 'React', 'asdfgt', 'dfhfgjf', '2024-04-04', 'Male', '1234567898', 1, 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-05-10', '2024-04-30 18:41:41', 3880, 0, 9800, 5920, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'XYZ', 5, 'abc', 'ABC', 'DEF', '2024-05-03', 'Female', '4565864577', 1, 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-10', '2024-05-02 12:21:54', 2750, 0, 9800, 7050, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'NMKL', 5, 'abc', 'asdfgt', 'dfhfgjf', '0000-00-00', 'Male', '7894561230', 1, 'Student', 'sdgsbsb', '2024-05-11', '2024-05-02 12:47:33', 5300, 100, 6000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'GJ', 5, 'abc', 'sdvfsdsdvfs', 'sdgsd', '2024-05-05', 'Male', '5465468325', 1, 'Working Professional', 'sdvsbsbss, fefgse', '2024-05-10', '2024-05-02 12:49:29', 8566, 0, 9800, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'WWW', 5, 'abc', 'sdvfsdsdvfs', 'sdgsd', '2024-05-05', 'Male', '1221547854', 1, 'Housewife', 'sdfgbfdbdsb', '2024-05-11', '2024-05-02 12:51:08', 5987, 300, 8000, 2013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'dart', 11, 'React', 'html', 'css', '2024-05-03', 'Male', '4565165131', 1, 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-11', '2024-05-04 13:38:42', 8366, 200, 9800, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'gjulyuyughrjy', 5, 'abc', 'fgchvjbkn', 'fgghjk', '2024-05-02', 'Male', '4768765435', 0, 'Kids', 'cgykuhkgfyk', '2024-05-10', '2024-05-04 16:51:25', 0, 0, 5000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'super', 'Super Admin', 'super@admin.com', '7894567894', '123', 0, '2024-05-07 12:35:22'),
(2, 'admin', 'admin123', 'admin@admin.com', '7777777777', 'admin', 1, '2024-05-07 12:37:43'),
(9, 'test', 'test123', 'test@gmail.com', '8888888888', '123', 2, '2024-05-07 13:14:30');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inquiryinfo`
--
ALTER TABLE `inquiryinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
