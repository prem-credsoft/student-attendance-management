-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 03:50 PM
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
(5, 'xyzx', '2024-04-30 12:45:59', 'nndfnd'),
(11, 'React JS', '2024-04-30 12:11:04', 'Javascript');

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
(23, 'gjulyuyughrjy', 'dgfhkgfdghfgfh', 'cgykuhkgfyk', '4768765435', '7:30 AM To 8:30 AM', 'Kids', '2024-04-30', '2024-04-30 18:38:39'),
(25, 'wsza', 'dgsdvbsfgsdb', 'sdfgbfdbdsb', '9876541238', '3:00 PM To 4:00 PM', 'Housewife', '2024-04-30', '2024-04-30 18:58:32');

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
(10, 27, 'gyiugkjbkjb', '2024-05-09', '2024-05-11', '2024-05-01 18:20:25');

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
(23, 24, 980.00, '2024-04-30', 'paid by vue js', '2024-04-30 12:10:00'),
(25, 27, 1313.00, '2024-04-30', 'wrfwebrb', '2024-04-30 13:28:51'),
(26, 24, 3000.00, '2024-04-30', 'ytiutyi', '2024-04-30 13:29:11'),
(27, 8, 3000.00, '2024-04-30', 'ouiyoihjk', '2024-04-30 13:29:24');

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
(8, 'Christopher Anderson', 'fbdf', 'ABC', 'dfhfgjf', '2024-04-05', 'Male', '3332221111', 'Partially Paid', 'Housewife', '999 Chestnut St', '2024-04-28', '2024-04-28 17:58:36'),
(9, 'Bob White', 'React JS', 'asdfgt', 'dfhfgjf', '2024-04-25', 'Male', '7779998888', 'Fully Paid', 'Working Professional', '987 Pine St', '2024-05-01', '2024-04-28 17:59:27'),
(24, 'nextjs', 'React JS', 'asdfgt', 'dfhfgjf', '2024-04-04', 'Male', '1531545613', 'Fully Paid', 'Working Professional', 'sdvsbsbss, fefgse', '2024-04-30', '2024-04-30 16:40:20'),
(26, 'QQQQQ', 'xyzx', 'ABC', 'dfhfgjf', '2024-04-04', 'Female', '9876541238', 'Partially Paid', 'Kids', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-01', '2024-04-30 17:41:48'),
(27, 'ABC', 'xyzx', 'vvvvv', 'ddddd', '2024-04-02', 'Male', '9876541238', 'Fully Paid', 'Housewife', 'sdfgbfdbdsb', '2024-04-30', '2024-04-30 18:29:07'),
(28, 'xxxxyyyyy', 'xyzx', 'ABC', 'sdgsd', '2024-04-04', 'Female', '1231651618', 'Partially Paid', 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-04-30', '2024-04-30 18:34:32'),
(52, 'rest', 'abc', 'asdfgt', 'dfhfgjf', '2024-04-04', 'Male', '1234567898', 'Fully Paid', 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-30', '2024-04-30 18:41:41'),
(53, 'ssssssss', 'React JS', 'ABC', 'dfhfgjf', '2024-05-04', 'Male', '5465468325', 'Fully Paid', 'Housewife', 'dsvsdvsd', '2024-05-01', '2024-05-01 19:03:45');

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
(1, 'prem', 'prem acharya', 'prem@admin.info', '9999999999', 'prem', '2024-04-28 14:02:31');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inquiryinfo`
--
ALTER TABLE `inquiryinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
