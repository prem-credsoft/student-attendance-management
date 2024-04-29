-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 09:21 AM
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
(1, 'John Doe', 'Ref123', '123 Main St', '1234567890', 'Morning', 'Teacher', '2024-04-28', '2024-04-28 12:49:49'),
(2, 'Jane Smith', 'Ref456', '456 Elm St', '9876543210', 'Afternoon', 'Engineer', '2024-04-29', '2024-04-28 12:49:49'),
(3, 'Alice Johnson', 'Ref789', '789 Oak St', '5551234567', 'Evening', 'Doctor', '2024-04-30', '2024-04-28 12:49:49'),
(4, 'Bob White', 'Ref987', '987 Pine St', '7779998888', 'Morning', 'Artist', '2024-05-01', '2024-04-28 12:49:49'),
(5, 'Emily Brown', 'Ref654', '654 Cedar St', '3216549870', 'Afternoon', 'Lawyer', '2024-05-02', '2024-04-28 12:49:49'),
(6, 'Michael Davis', 'Ref321', '321 Birch St', '9998887777', 'Evening', 'Developer', '2024-05-03', '2024-04-28 12:49:49'),
(7, 'Sarah Lee', 'Ref555', '555 Maple St', '4445556666', 'Morning', 'Writer', '2024-05-04', '2024-04-28 12:49:49'),
(8, 'David Wilson', 'Ref222', '222 Walnut St', '6664445555', 'Afternoon', 'Designer', '2024-05-05', '2024-04-28 12:49:49'),
(9, 'Jessica Martinez', 'Ref111', '111 Ash St', '2223334444', 'Evening', 'Musician', '2024-05-06', '2024-04-28 12:49:49'),
(10, 'Christopher Anderson', 'Ref999', '999 Chestnut St', '3332221111', 'Morning', 'Photographer', '2024-05-07', '2024-04-28 12:49:49'),
(11, 'Amanda Taylor', 'Ref888', '888 Pineapple St', '1112223333', 'Afternoon', 'Chef', '2024-05-08', '2024-04-28 12:49:49'),
(12, 'Kevin Thomas', 'Ref777', '777 Orange St', '8887779999', 'Evening', 'Athlete', '2024-05-09', '2024-04-28 12:49:49');

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
(4, 2, 5555.00, '2024-04-27', 'qwertyui', '2024-04-27 13:09:47'),
(5, 4, 1000.00, '2024-04-28', 'xyz', '2024-04-28 07:17:23');

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
(3, 'xfbfsdbsb', 'vdsd', 'sdvfsdsdvfs', 'sdgsd', '2024-04-10', 'Male', '4654564654', 'Fully Paid', 'Working Professional', 'sdvsbsbss, fefgse', '2024-04-27', '2024-04-27 16:16:57'),
(4, 'gg', 'vdsd', 'ABC', 'DEF', '2024-05-03', 'Male', '4567891245', 'Partially Paid', 'Housewife', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-04-28', '2024-04-28 12:46:16');

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
(1, 'prem', 'prem acharya', 'prem@admin.com', '7894561230', 'prem', '2024-04-27 19:44:19');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiryinfo`
--
ALTER TABLE `inquiryinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
