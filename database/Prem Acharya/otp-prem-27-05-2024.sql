-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 09:18 AM
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
(47, 58, '2024-05-04', 2, 5, '2024-05-04 12:50:53', 'fvdfbd'),
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
(68, 58, '2024-05-10', 2, 5, '2024-05-10 19:06:34', 'vbsbsdf'),
(69, 59, '2024-05-10', 0, 5, '2024-05-10 19:06:34', ''),
(70, 62, '2024-05-10', 0, 5, '2024-05-10 19:06:34', ''),
(72, 24, '2024-05-11', 1, 11, '2024-05-11 11:08:23', ''),
(73, 26, '2024-05-11', 0, 11, '2024-05-11 11:08:23', ''),
(74, 52, '2024-05-11', 0, 11, '2024-05-11 11:08:23', ''),
(75, 61, '2024-05-11', 0, 11, '2024-05-11 11:08:23', ''),
(76, 27, '2024-05-11', 1, 5, '2024-05-11 11:08:39', ''),
(77, 55, '2024-05-11', 0, 5, '2024-05-11 11:08:39', ''),
(78, 57, '2024-05-11', 0, 5, '2024-05-11 11:08:39', ''),
(79, 58, '2024-05-11', 2, 5, '2024-05-11 11:08:39', 'cbgdf'),
(80, 59, '2024-05-11', 1, 5, '2024-05-11 11:08:39', ''),
(81, 62, '2024-05-11', 0, 5, '2024-05-11 11:08:39', ''),
(82, 24, '2024-05-13', 1, 11, '2024-05-13 16:42:30', ''),
(83, 26, '2024-05-13', 0, 11, '2024-05-13 16:42:30', ''),
(84, 52, '2024-05-13', 0, 11, '2024-05-13 16:42:30', ''),
(85, 61, '2024-05-13', 0, 11, '2024-05-13 16:42:30', ''),
(86, 27, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(87, 55, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(88, 57, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(89, 58, '2024-05-13', 2, 5, '2024-05-13 16:42:50', 'fdfgbd'),
(90, 59, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(91, 62, '2024-05-13', 0, 5, '2024-05-13 16:42:50', ''),
(93, 24, '2024-05-15', 0, 11, '2024-05-15 10:55:15', ''),
(94, 26, '2024-05-15', 0, 11, '2024-05-15 10:55:15', ''),
(95, 52, '2024-05-15', 0, 11, '2024-05-15 10:55:15', ''),
(96, 61, '2024-05-15', 0, 11, '2024-05-15 10:55:15', ''),
(99, 27, '2024-05-15', 0, 5, '2024-05-15 10:55:30', ''),
(100, 55, '2024-05-15', 1, 5, '2024-05-15 10:55:30', ''),
(101, 57, '2024-05-15', 0, 5, '2024-05-15 10:55:30', ''),
(102, 58, '2024-05-15', 0, 5, '2024-05-15 10:55:30', ''),
(103, 59, '2024-05-15', 0, 5, '2024-05-15 10:55:30', ''),
(104, 62, '2024-05-15', 0, 5, '2024-05-15 10:55:30', ''),
(106, 69, '2024-05-15', 0, 5, '2024-05-15 10:55:30', ''),
(107, 68, '2024-05-15', 2, 11, '2024-05-15 10:56:37', 'dfhdfh'),
(108, 24, '2024-05-16', 0, 11, '2024-05-16 11:00:06', ''),
(109, 26, '2024-05-16', 0, 11, '2024-05-16 11:00:06', ''),
(110, 52, '2024-05-16', 0, 11, '2024-05-16 11:00:06', ''),
(111, 61, '2024-05-16', 0, 11, '2024-05-16 11:00:06', ''),
(112, 68, '2024-05-16', 0, 11, '2024-05-16 11:00:06', ''),
(113, 27, '2024-05-16', 1, 5, '2024-05-16 11:01:11', ''),
(114, 55, '2024-05-16', 0, 5, '2024-05-16 11:01:11', ''),
(115, 57, '2024-05-16', 0, 5, '2024-05-16 11:01:11', ''),
(116, 58, '2024-05-16', 0, 5, '2024-05-16 11:01:11', ''),
(117, 59, '2024-05-16', 0, 5, '2024-05-16 11:01:11', ''),
(118, 62, '2024-05-16', 0, 5, '2024-05-16 11:01:11', ''),
(119, 69, '2024-05-16', 2, 5, '2024-05-16 11:01:33', 'fdbdfb'),
(120, 24, '2024-05-18', 0, 11, '2024-05-18 12:29:08', ''),
(121, 26, '2024-05-18', 0, 11, '2024-05-18 12:29:08', ''),
(122, 52, '2024-05-18', 0, 11, '2024-05-18 12:29:08', ''),
(123, 61, '2024-05-18', 0, 11, '2024-05-18 12:29:08', ''),
(124, 68, '2024-05-18', 0, 11, '2024-05-18 12:29:08', ''),
(125, 27, '2024-05-18', 0, 5, '2024-05-18 12:29:40', ''),
(126, 55, '2024-05-18', 0, 5, '2024-05-18 12:29:40', ''),
(127, 57, '2024-05-18', 0, 5, '2024-05-18 12:29:40', ''),
(128, 58, '2024-05-18', 0, 5, '2024-05-18 12:29:40', ''),
(129, 59, '2024-05-18', 0, 5, '2024-05-18 12:29:40', ''),
(130, 62, '2024-05-18', 0, 5, '2024-05-18 12:29:40', ''),
(131, 69, '2024-05-18', 0, 5, '2024-05-18 12:29:40', ''),
(132, 24, '2024-05-21', 0, 11, '2024-05-21 19:32:54', ''),
(133, 26, '2024-05-21', 0, 11, '2024-05-21 19:32:54', ''),
(134, 52, '2024-05-21', 0, 11, '2024-05-21 19:32:54', ''),
(135, 61, '2024-05-21', 0, 11, '2024-05-21 19:33:01', ''),
(136, 68, '2024-05-21', 0, 11, '2024-05-21 19:33:01', '');

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
(20, 'English', '2024-05-23 10:44:18', 'Raval Sir'),
(21, 'xyz', '2024-05-24 13:44:00', 'abc'),
(25, 'acvsaaaa', '2024-05-27 06:16:33', 'vbc');

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
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `gmail_id` varchar(255) NOT NULL,
  `otp` int(6) NOT NULL,
  `otp_created_at` datetime NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `student_id`, `gmail_id`, `otp`, `otp_created_at`, `is_verified`) VALUES
(1, 24, 'premcredsoft@gmail.com', 199525, '2024-05-23 14:56:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `student_id`, `amount`, `payment_date`, `due_date`, `message`, `created_at`) VALUES
(2, 26, 200.00, '2024-05-21', '2024-07-01', 'xbd', '2024-05-10 10:25:10'),
(3, 26, 5000.00, '2024-05-21', '2024-07-03', 'ghkgk', '2024-05-10 10:25:37'),
(6, 27, 500.00, '2024-05-10', NULL, 'dvsvb', '2024-05-10 13:19:48'),
(7, 52, 5000.00, '2024-05-10', NULL, 'cbdf', '2024-05-10 13:20:30'),
(8, 55, 3000.00, '2024-05-10', NULL, 'bdfb', '2024-05-10 13:20:48'),
(9, 57, 640.00, '2024-05-18', NULL, 'fddfb', '2024-05-10 13:22:07'),
(10, 58, 1230.00, '2024-05-21', '2024-05-09', 'bdgbn', '2024-05-10 13:22:24'),
(11, 59, 1313.00, '2024-05-10', NULL, 'sdxgsf', '2024-05-10 13:22:49'),
(13, 61, 1234.00, '2024-05-10', NULL, 'dfdf', '2024-05-10 13:24:25'),
(15, 62, 4090.00, '2024-05-15', NULL, 'ghfg', '2024-05-10 13:25:43'),
(19, 27, 1000.00, '2024-05-11', NULL, 'Scholarship', '2024-05-11 08:45:19'),
(20, 59, 3100.00, '2024-05-15', NULL, 'Scholarship', '2024-05-11 08:55:27'),
(21, 61, 300.00, '2024-05-15', NULL, 'Scholarship', '2024-05-11 08:55:36'),
(24, 27, 600.00, '2024-05-11', NULL, 'cvbsf', '2024-05-11 13:05:06'),
(25, 27, 600.00, '2024-05-11', NULL, 'cvbsf', '2024-05-11 13:05:06'),
(30, 26, 700.00, '2024-05-21', '2024-07-07', 'jgcjc', '2024-05-13 05:32:51'),
(31, 26, 700.00, '2024-05-21', '2024-07-10', 'jgcjc', '2024-05-13 05:32:51'),
(32, 52, 460.00, '2024-05-13', NULL, 'xcvxfv', '2024-05-13 06:31:05'),
(33, 52, 460.00, '2024-05-13', NULL, 'xcvxfv', '2024-05-13 06:31:05'),
(34, 55, 2000.00, '2024-05-13', NULL, 'cvbc', '2024-05-13 06:31:52'),
(35, 55, 2000.00, '2024-05-13', NULL, 'cvbc', '2024-05-13 06:31:52'),
(42, 55, 20.00, '2024-05-13', NULL, 'xbx', '2024-05-13 06:42:40'),
(43, 55, 30.00, '2024-05-13', NULL, 'fdsdsf', '2024-05-13 06:45:27'),
(44, 24, 1200.00, '2024-05-21', '2024-05-02', 'xcx', '2024-05-13 07:24:39'),
(52, 24, 8000.00, '2024-05-21', '2024-05-16', 'cnhfg', '2024-05-15 09:46:46'),
(53, 26, 12.00, '2024-05-21', '2024-07-11', 'cbg', '2024-05-15 09:47:41'),
(54, 27, 132.00, '2024-05-15', NULL, 'chd', '2024-05-15 09:48:03'),
(55, 52, 154.00, '2024-05-15', NULL, 'jhjhv', '2024-05-15 09:48:35'),
(56, 55, 124.00, '2024-05-15', NULL, 'vjh', '2024-05-15 09:49:04'),
(57, 68, 54.00, '2024-05-15', NULL, 'xgd', '2024-05-15 09:54:20'),
(58, 69, 654.00, '2024-05-15', NULL, 'kjhkj', '2024-05-15 09:54:56'),
(61, 24, 800.00, '2024-05-21', '2024-05-24', 'bdfhd', '2024-05-15 14:00:33'),
(62, 26, 120.00, '2024-05-21', '2024-07-18', 'xcdf', '2024-05-18 06:37:31'),
(63, 58, 3000.00, '2024-05-21', '2024-05-23', 'cvcf', '2024-05-21 06:23:30'),
(65, 147, 1.00, '2024-05-25', '0000-00-00', '', '2024-05-25 12:52:22');

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
  `fee_status` int(10) DEFAULT 0,
  `profession` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `admission_time` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `pending_fees` int(10) DEFAULT 0,
  `discount` int(10) NOT NULL,
  `total_fees` int(11) NOT NULL,
  `paid_fees` int(11) NOT NULL,
  `father_number` varchar(50) NOT NULL,
  `home_number` varchar(50) NOT NULL,
  `reference` varchar(200) DEFAULT NULL,
  `father_profession` varchar(200) DEFAULT NULL,
  `workplace_address` varchar(255) DEFAULT NULL,
  `aadharcard_number` varchar(20) DEFAULT NULL,
  `joining_purpose` varchar(255) DEFAULT NULL,
  `extratime_daily` varchar(255) DEFAULT NULL,
  `gmail_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `batch`, `batch_name`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `profession`, `address`, `admission_time`, `due_date`, `created_at`, `pending_fees`, `discount`, `total_fees`, `paid_fees`, `father_number`, `home_number`, `reference`, `father_profession`, `workplace_address`, `aadharcard_number`, `joining_purpose`, `extratime_daily`, `gmail_id`) VALUES
(24, 'nextjs', 11, 'React', 'Node JS', 'React JS', '2024-04-04', 'Male', '1531545613', 1, 'Working Professional', 'sdvsbsbss, fefgse', '2024-05-22', '2024-05-24', '2024-04-30 16:40:20', 0, 0, 10000, 10000, '8888888888', '9999999999', 'Relatives', 'Job', ' cbcdfgt', '546548646546', 'jova mate', '15 minute vadhare nai', 'premcredsoft@gmail.com'),
(26, 'Raj Sharma', 20, 'English', 'Rohit Sharma', ' Priya Sharma', '2002-04-10', 'Male', '8987654123', 0, 'Student', 'Rajkot, Gujarat', '2024-05-24', '2024-07-18', '2024-04-30 17:41:48', 2768, 300, 9800, 7032, '9872156454', '8454564845', 'Former Students', 'Work', 'Gujarat, India', '783456789112', 'learn new things', '1 hours', 'rajsharma123@gmail.com'),
(27, 'ABC', 5, 'abc', 'vvvvv', 'ddddd', '2024-04-02', 'Female', '987654123', 0, 'Housewife', 'sdfgbfdbdsb', '2024-05-24', '2024-05-30', '2024-04-30 18:29:07', 3168, 1000, 7000, 2832, '8764575642', '8675423457', 'Relatives', 'Work', 'dasdgdrggergsefrfew', '134567896543', 'jova mate', '15 minute vadhare nai', 'abc12@gmail.com'),
(52, 'rest', 11, 'React', 'asdfgt', 'dfhfgjf', '2024-04-04', 'Male', '1234567898', 0, 'Student', 'dfheheheherhe,  gerregrghrgg,  sdgsgsgsa', '2024-05-22', '2024-05-29', '2024-04-30 18:41:41', 3276, 450, 9800, 6074, '2121212121', '1212121212', 'Relatives', 'Work', 'fgdtyujrfyuju', '567546789875', 'jova mate', '15 minute vadhare nai', 'rest12@gmail.com'),
(55, 'XYZ', 5, 'abc', 'ABC', 'DEF', '2024-05-03', 'Female', '4565864577', 0, 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-22', '2024-05-28', '2024-05-02 12:21:54', 2391, 235, 9800, 7174, '2222222222', '4444444444', 'Neighbors', 'Work', 'this is none of your b', '435678976543', 'cvdfgdghdf', 'fgdsthrdtr', 'xyz12@gmail.com'),
(57, 'NMKL', 5, 'abc', 'asdfgt', 'dfhfgjf', '2007-02-09', 'Male', '7894561230', 0, 'Student', 'sdgsbsb', '2024-05-24', '2024-05-30', '2024-05-02 12:47:33', 4860, 500, 6000, 640, '7468653216', '8965218654', 'Neighbors', 'Work', 'vfuhtinjeirtjkhmoritk', '345678879676', '4568jghfghdfhgdfgb', 'fgbhjfujryttrgsdf', 'nmkl12@gmail.com'),
(58, 'Jay Parmar', 5, 'abc', 'sdvfsdsdvfs', 'sdgsd', '2024-05-05', 'Male', '5465468325', 0, 'Student', 'sdvsbsbss, fefgse', '2024-05-22', '2024-05-23', '2024-05-02 12:49:29', 2036, 3534, 9800, 4230, '5678657985', '7697864545', 'Neighbors', 'Work', 'fvdfhtyjbsdf', '845154218654', 'fiwnekrmfweiorkgjmo', 'erofklewmrgol 10', 'jay12@gmail.com'),
(59, 'WWW', 5, 'abc', 'sdvfsdsdvfs', 'sdgsd', '2024-05-05', 'Male', '1221547854', 0, 'Housewife', 'sdfgbfdbdsb', '2024-05-22', '2024-05-29', '2024-05-02 12:51:08', 3287, 300, 8000, 4413, '1234543212', '2345678976', 'Facebook', 'Work', 'effwiuehkrfnwiojrik', '546237840923', 'dsouihfnkweifk', '18 min', 'www12@gmail.com'),
(61, 'dart', 11, 'React', 'html', 'css', '2024-05-03', 'Male', '4565165131', 0, 'Working Professional', 'fsdfsfsdfsfsdfg, gwegwesg', '2024-05-22', '2024-05-29', '2024-05-04 13:38:42', 8066, 200, 9800, 1534, '5152105689', '8454651351', 'Neighbors', 'Other', 'DESFIJWQEIORKFQWEI', '685452135484', 'wkdmwekm,fweikfm', '15 min', 'dart12@gmail.com'),
(62, 'gjulyuyughrjy', 5, 'abc', 'fgchvjbkn', 'fgghjk', '2024-05-02', 'Male', '4768765435', 0, 'Working Professional', 'cgykuhkgfyk', '2024-05-22', '2024-05-25', '2024-05-04 16:51:25', 900, 10, 5000, 5000, '8451208451', '8965289456', 'Neighbors', 'Work', 'dcujrbndfiluerkjm', '845165321865', 'dcarfsgtrgtrgrg', '8 min', 'gjulyuyughrjy@gmail.com'),
(68, 'asadAAA', 11, 'React', 'gfnfnfgn', 'gngn', '2024-05-03', 'Male', '8888888888', 0, 'Student', 'sdgsbsb', '2024-05-22', '2024-05-30', '2024-05-14 16:02:59', 1157, 1, 1212, 54, '1234567890', '2147483647', 'Relatives', 'Work', 'DESFIJWQEIORKFQWEI', '325342635765', 'ghjgh', '10 minute j', 'asadaaa@gmail.com'),
(69, 'bdfb', 5, 'abc', 'ghkhj', 'jhg', '2024-05-01', 'Male', '5555555555', 0, 'Student', 'gfu', '2024-05-22', '2024-05-28', '2024-05-14 16:14:56', 550, 1, 1205, 654, '2147483647', '2147483647', 'Facebook', 'Business', 'ferref', '234567890987', 'jova mate', '10 minute j', 'bdfb12@gmail.com'),
(146, 'tipendra', 21, 'xyz', 'jetha lala', 'Enter a Valid Phone Number', '2002-11-02', 'Male', '7132135135', 0, 'Working Professional', 'sdnwek,fopweklfopwqe;lkd6515485', '2024-05-25', '2024-05-31', '2024-05-25 13:49:21', 9000, 800, 9800, 0, '9154652653', '8865454123', 'Parents', 'Job', 'this is none of your business55', '213215184867', 'dwikfmwopekrirewoklio', 'half an hour', 'tipendrajethalali123@gmail.com'),
(147, 'abc', 5, 'abc', 'asdfgt', 'dfhfgjf', '2019-05-04', 'Male', '7894561230', 0, 'Student', 'sdvsbsbss, fefgse', '2024-05-25', '0000-00-00', '2024-05-25 17:12:45', 98, 1, 100, 1, '7777777777', '8798465415', 'Neighbors', 'Job', 'jhvjhv4535', '546548646546', 'learn new things', '1 hours', 'xyz12@gmail.com');

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
(9, 'test', 'test123', 'test@gmail.com', '8888888888', '123', 2, '2024-05-07 13:14:30'),
(36, 'demo', 'demo123', 'demo@gmail.com', '4548748489', '123', 2, '2024-05-22 08:04:22');

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
-- Indexes for table `otp`
--
ALTER TABLE `otp`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `inquiryinfo`
--
ALTER TABLE `inquiryinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studentinfo` (`id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studentinfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
