-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 02:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(49, 59, '2024-05-04', 2, 5, '2024-05-04 12:52:39', ''),
(50, 61, '2024-05-04', 0, 11, '2024-05-04 13:38:51', ''),
(51, 9, '2024-05-10', 0, 5, '2024-05-10 16:59:10', ''),
(52, 26, '2024-05-10', 2, NULL, '2024-05-10 17:03:03', 'demo'),
(53, 26, '2024-05-10', 2, NULL, '2024-05-10 17:03:56', 'demo'),
(54, 8, '2024-05-10', 2, NULL, '2024-05-10 17:09:26', 'demo'),
(55, 26, '2024-05-10', 2, NULL, '2024-05-10 17:10:23', 'demo'),
(58, 26, '2024-05-10', 2, 5, '2024-05-10 17:19:10', 'demo'),
(59, 26, '2024-05-10', 2, 5, '2024-05-10 17:19:26', 'demo'),
(60, 63, '2024-05-08', 2, 5, '2024-05-10 17:20:44', 'demo'),
(61, 56, '2024-05-09', 2, 5, '2024-05-10 17:42:40', 'ysrhbfknml,we;.gt[pojiugcegvhjfknlq');

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
(16, 24, 'sdgsgsdhgsdh', '2024-05-10', '2024-05-10', '2024-05-09 17:06:03');

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
(1, 24, 9800.00, '2024-05-10', 'fbdfb', '2024-05-10 10:24:25'),
(2, 26, 200.00, '2024-05-10', 'xbd', '2024-05-10 10:25:10'),
(3, 26, 5000.00, '2024-05-10', 'ghkgk', '2024-05-10 10:25:37');

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
  `total_fees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `batch`, `batch_name`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `profession`, `address`, `admission_time`, `created_at`, `pending_fees`, `discount`, `total_fees`) VALUES
(24, 'nextjs', 11, 'React', 'Node JS', 'React JS', '2024-04-04', 'Male', '1531545613', 0, 'Working Professional', 'sdvsbsbss, fefgse', '2024-05-10', '2024-04-30 16:40:20', 0, 0, 0),
(26, 'QQQQQQQ', 11, 'React', 'ABC', 'dfhfgjf', '2024-04-04', 'Female', '9876541238', 0, 'Kids', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-09', '2024-04-30 17:41:48', 4600, 0, 0),
(27, 'ABC', 5, 'xyzx', 'vvvvv', 'ddddd', '2024-04-02', 'Male', '9876541238', 0, 'Housewife', 'sdfgbfdbdsb', '2024-05-02', '2024-04-30 18:29:07', 9800, 0, 0),
(28, 'xxxxyyyyy', 5, 'xyzx', 'ABC', 'sdgsd', '2024-04-04', 'Female', '1231651618', 0, 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-02', '2024-04-30 18:34:32', 9800, 0, 0),
(52, 'rest', 11, 'React', 'asdfgt', 'dfhfgjf', '2024-04-04', 'Male', '1234567898', 0, 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-05-09', '2024-04-30 18:41:41', 9800, 0, 0),
(55, 'XYZ', 5, 'xyzx', 'ABC', 'DEF', '2024-05-03', 'Female', '4565864577', 0, 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-02', '2024-05-02 12:21:54', 9800, 0, 0),
(57, 'NMKL', 5, 'xyzx', 'asdfgt', 'dfhfgjf', '0000-00-00', 'Male', '7894561230', 0, 'Student', 'sdgsbsb', '2024-05-02', '2024-05-02 12:47:33', 9800, 0, 0),
(58, 'GJ', 5, 'xyzx', 'sdvfsdsdvfs', 'sdgsd', '2024-05-05', 'Male', '5465468325', 0, 'Working Professional', 'sdvsbsbss, fefgse', '2024-05-02', '2024-05-02 12:49:29', 9800, 0, 0),
(59, 'WWW', 5, 'xyzx', 'sdvfsdsdvfs', 'sdgsd', '2024-05-05', 'Male', '1221547854', 0, 'Housewife', 'sdfgbfdbdsb', '2024-05-02', '2024-05-02 12:51:08', 9800, 0, 0),
(61, 'dart', 11, 'Rust', 'html', 'css', '2024-05-03', 'Male', '4565165131', 0, 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-04', '2024-05-04 13:38:42', 9800, 0, 0),
(62, 'gjulyuyughrjy', 5, 'abc', 'fgchvjbkn', 'fgghjk', '2024-05-02', 'Male', '4768765435', 0, 'Kids', 'cgykuhkgfyk', '2024-05-04', '2024-05-04 16:51:25', 9800, 0, 0),
(63, 'demo', 5, 'abc', 'senior demo', 'mrs senior demo', '2024-05-01', 'Male', '2345678908', 0, 'Student', 'ncujgwker,gmw,oerpgwejnw uweihrk', '2024-05-04', '2024-05-04 16:52:31', 9800, 0, 0),
(64, 'vide', 11, 'React', 'ABC', 'sdgsd', '2024-05-04', 'Male', '4654132132', 0, 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-09', '2024-05-09 17:04:45', 9800, 0, 0);

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
(4, 'parth', 'parth parmar', 'parth@gmail.com', '4641654641', '123', 2, '2024-05-07 12:55:49'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

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
