-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 04:55 PM
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
  `Reason` varchar(250) NOT NULL,
  `leave_status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`, `batch_id`, `created_at`, `Reason`, `leave_status`) VALUES
(1, 43, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(2, 44, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(3, 45, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(4, 46, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(5, 47, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(6, 48, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(7, 49, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(8, 51, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(9, 52, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(10, 91, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0),
(11, 169, '2024-06-03', 0, 10, '2024-06-03 13:54:35', '', 0);

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
(1, '07:30 to 08:30 R1', '2024-06-01 11:44:41', 'Raval Sir'),
(2, '07:30 to 08:30 R2', '2024-06-01 11:44:41', 'Raval Sir'),
(3, '07:30 to 08:30 R3', '2024-06-01 11:44:41', 'Raval Sir'),
(4, '08:30 to 09:30 R1', '2024-06-01 11:44:41', 'Raval Sir'),
(5, '03 to 04 R1', '2024-06-01 11:44:41', 'Raval Sir'),
(6, '04 to 05 R1', '2024-06-01 11:44:41', 'Raval Sir'),
(7, '04 to 05 R2', '2024-06-01 11:44:41', 'Raval Sir'),
(8, '04 to 05 R3', '2024-06-01 11:44:41', 'Raval Sir'),
(9, '05 to 06 R1', '2024-06-01 11:44:41', 'Raval Sir'),
(10, '05 to 06 R2', '2024-06-01 11:44:41', 'Raval Sir'),
(11, '05 to 06 R3', '2024-06-01 11:44:41', 'Raval Sir'),
(12, '06 to 07 R1', '2024-06-01 11:44:41', 'Raval Sir'),
(13, '06 to 07 R2', '2024-06-01 11:44:41', 'Raval Sir'),
(14, '06 to 07 R3', '2024-06-01 11:44:41', 'Raval Sir'),
(15, '07 to 08 R1', '2024-06-01 11:44:41', 'Raval Sir'),
(16, '07 to 08 R2', '2024-06-01 11:44:41', 'Raval Sir'),
(17, '07 to 08 R3', '2024-06-01 11:44:41', 'Raval Sir'),
(18, '08 to 09 R1', '2024-06-01 11:44:41', 'Raval Sir'),
(19, '08 to 09 R2', '2024-06-01 11:44:41', 'Raval Sir'),
(45, 'aaaa', '2024-06-03 07:00:24', 'bbb');

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
(6, 1, 2000.00, '2024-06-03', '0000-00-00', 'lhjvljhvjhv', '2024-06-03 09:04:26');

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
  `gmail_id` varchar(255) DEFAULT NULL,
  `alumnistudent` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `batch`, `batch_name`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `profession`, `address`, `admission_time`, `due_date`, `created_at`, `pending_fees`, `discount`, `total_fees`, `paid_fees`, `father_number`, `home_number`, `reference`, `father_profession`, `workplace_address`, `aadharcard_number`, `joining_purpose`, `extratime_daily`, `gmail_id`, `alumnistudent`) VALUES
(1, 'MAKWANA RAJDIP MAHENDRABHAI', 3, '07:30 to 08:30 R3', 'null', 'null', '1992-02-23', 'Male', '8780018708', 0, 'Working Professional', 'NEW RADHESHYAM SOC ST NO 2 KOTHARIYA ROAD B/H NENCY FAMILY SHOP KOTHARIYA RAJKOT ', '2024-06-03', '0000-00-00', '0000-00-00 00:00:00', 7800, 200, 10000, 2000, '7777777777', '9824454868', 'Google', 'Job', 'TAPOVAN SCHOOL ', '785688016567', 'null', 'null', 'null@gmail.com', 1),
(3, 'VISHAL RAMESHBHAI SIDPARA', 3, '07:30 to 08:30 R3', 'null', 'null', '1990-07-20', 'null', '7016259187', 0, 'Working Professional', 'JAMNA NAGAR, STREET NO. 1 SAHKAR ROAD ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9924818092', '7016259187', 'Friends', 'Business', 'RAJKOT', '319500308150', 'null', 'null', 'null', 1),
(4, 'Shishanada Prakash Rambhai ', 3, '07:30 to 08:30 R3', 'null', 'null', '1993-02-04', 'null', '9737315992', 0, 'Working Professional', '\"Shreeji Krupa\"\nHimalaya-1, Umiya chowk, 150 Ring road, Rajkot 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9574882919', '9712315992', 'Friends', 'Job', 'Sigma Melleable Pvt Ltd, Padvla ,Rajkot', '884515018556', 'null', 'null', 'null', 0),
(5, 'Undhad Sanjay Dhirajlal', 3, '07:30 to 08:30 R3', 'null', 'null', '1979-09-12', 'null', '9974452350', 0, 'Working Professional', 'kruti onilla , Goverdhan chowk 150 feet ring road, Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9316059040', '9726510920', 'Friends', 'Job', 'Jilla bank bhavan, near civil hospital , Rajkot', '626876291286', 'null', 'null', 'null', 0),
(6, 'Vaishali Ganatra Sandipbhai', 3, '07:30 to 08:30 R3', 'null', 'null', '1984-02-18', 'null', '7878549973', 0, 'Working Professional', 'Aanand Bangla chauk', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7878549973', '7878549973', 'Friends', 'Business', 'Shreeji Velvet Store ', '324549250615', 'null', 'null', 'null', 0),
(7, 'SOJITRA JIRAL ASHVINBHAI', 3, '07:30 to 08:30 R3', 'null', 'null', '2004-06-06', 'null', '9157507501', 0, 'Student', 'ARJUN PARK MAIN ROAD NANDA HALL BEHIND - RAJKOT ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9157507501', '9157507501', 'Neighbors', '', '', '246857238536', 'null', 'null', 'null', 0),
(8, 'CHAVDA FALGUNI HIREN', 3, '07:30 to 08:30 R3', 'null', 'null', '2000-11-01', 'null', '7211150174', 0, 'Homemaker', 'Vrundavan society street no. 2 ankur nagar main road', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9016631355', '7211150174', 'Friends', '', '', '576785134424', 'null', 'null', 'null', 0),
(9, 'Sojitra Prince Ashvin ', 3, '07:30 to 08:30 R3', 'null', 'null', '2006-07-04', 'null', '9913391323', 0, 'Working Professional', 'Arjun Park Behind Nanda Holl, 50 Feet Road, Rajkot, Gujarat, 360002', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9723351323', '9099570995', 'Parents', 'Business', 'Parmeshwar Soc., Street No. 5, Atika Industries Area, Dhebar Road (South) Rajkot (Guj.) India.', '282436609644', 'null', 'null', 'null', 0),
(10, 'BHHTT PRIYANK SHAILESH BHAI', 3, '07:30 to 08:30 R3', 'null', 'null', '2007-04-30', 'null', '6353570277', 0, 'Student', 'DALESHVAR KRUPA PUNIT NAGAR ST NO 5 GONDAL ROAD RAJKOT', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9016824214', '6353570277', 'Parents', '', '', '456776148821', 'null', 'null', 'null', 0),
(11, 'Bhatt Priyank Shailesh Bhai ', 3, '07:30 to 08:30 R3', 'null', 'null', '2007-04-30', 'null', '6353570277', 0, 'Student', 'DALESHVAR KRUPA PUNIT NAGAR ST NO 5 GONDAL ROAD RAJKOT ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9016824214', '6353570277', 'Parents', '', '', '456776148821', 'null', 'null', 'null', 0),
(12, 'JALU RUSHTI VIKRAMBHAI', 7, '04 to 05 R2', 'null', 'null', '2006-10-10', 'null', '7203011274', 0, 'Student', '\"LABH-SHUBH\";NEW JALARAM; Mavadi chok;150 feet road;rajkot. 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9974896331', '8799560118', 'Teacher', '', '', '735557113960', 'null', 'null', 'null', 0),
(13, 'PILOJPARA KUMKUM PIYUSHBHAI ', 6, '04 to 05 R1', 'null', 'null', '2007-04-21', 'null', '7096357355', 0, 'Student', '\"SHREE CHAMUNDA NIVAS\" NAVAL NAGAR 9/17 CORNER MAVDI PLOT RAJKOT ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9925466504', '9727890255', 'Parents', '', '', '834992165291', 'null', 'null', 'null', 0),
(14, 'GHODASARA ALIS JAYESHBHAI', 6, '04 to 05 R1', 'null', 'null', '2008-01-16', 'null', '9724419052', 0, 'Student', '\"Madhuvan\"\nVrudavan society street number:2, \nAnkur nagar main road, \nUmiya chowk behind, \nRajkot-360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, 'Ghodasara Jayeshbhai Devjibhai', 'Ghodasara Sarojben Jayeshbhai', 'Google', '', '', '716672118301', 'null', 'null', 'null', 0),
(15, 'Gohel kano rajanibhai', 6, '04 to 05 R1', 'null', 'null', '2006-06-16', 'null', '99042 84838', 0, 'Student', 'Ankur road gopal park 5', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '95749 81936', '93161 52651', 'Friends', '', '', '509986695045', 'null', 'null', 'null', 0),
(16, 'ZALA MEETRAJ BHAVESHBHAI', 6, '04 to 05 R1', 'null', 'null', '2007-03-04', 'null', '9327050879', 0, 'Student', 'lalbahadur sosayati street no:6 Shakti Krupa rajkot near ahir chowk ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7600824463', '9327050878', 'Friends', '', '', '314247181380', 'null', 'null', 'null', 0),
(17, 'Joshi Krutika Manharbhai ', 8, '04 to 05 R3', 'null', 'null', '2004-11-02', 'null', '6354653832', 0, 'Student', 'Gayatri nagar Street 4/10 hanumanderi near\n\n', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9327674046', '8238530551', 'Neighbors', '', '', '', 'null', 'null', 'null', 0),
(18, 'CHOTALIYA MIHIR RAJNISHBHAI', 6, '04 to 05 R1', 'null', 'null', '2008-10-25', 'null', '9429784213', 0, 'Student', '\"GITANJALI\" 2 NARAYAN NAGAR NEAR TRISHUL CHAWLK RAJKOT     360002', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9427725971', '9586725971', 'Parents', '', '', '361986762744', 'null', 'null', 'null', 0),
(19, 'PARMAR DEV BHARATBHAI', 6, '04 to 05 R1', 'null', 'null', '2008-05-02', 'null', '92653 98181 ', 0, 'Student', 'A-616 Shree Sitaji Township Near Jivaraj Park Speedware Party Plot and Shyamal Sky Life \nDwarkadhish Chowk 80 Feet Road Rajkot 360005', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7285810946', '97231 30142 ', 'Parents', '', '', '702313323608', 'null', 'null', 'null', 0),
(20, 'AGRAVAT  YASH BHAVESHBHAI', 6, '04 to 05 R1', 'null', 'null', '2008-03-26', 'null', '8320450019', 0, 'Student', 'Ramdut, Jaljit street 2, umiya chok', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9427387514', '8320450019', 'Parents', '', '', '544562329423', 'null', 'null', 'null', 0),
(21, 'Vyas Heer Hasmukhbhai ', 8, '04 to 05 R3', 'null', 'null', '2003-12-13', 'null', '6354606631', 0, 'Student', '\"Shiv krupa\" 4/10 Gaytri nagar near R.M.C Ground Bolbala Marg Bhakti Nagar circle Rajkot -360002', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '6355427940', '6355427940', 'Neighbors', '', '', '', 'null', 'null', 'null', 0),
(22, 'Sapna Khara Jay', 8, '04 to 05 R3', 'null', 'null', '1993-10-26', 'null', '9157902792', 0, 'Homemaker', 'Bhavani krupa  krishna nagar 15 j. d pathak plot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7405310103', '9157902790', '', '', '', '', 'null', 'null', 'null', 0),
(23, 'RATHOD JIGAR  RAMJIBHAI ', 6, '04 to 05 R1', 'null', 'null', '2007-02-17', 'null', '96011 67659 ', 0, 'Student', 'Satyam park , padvala road,Pardi,Lothika,rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9714180714', '96011 67659 ', 'Google', '', '', '509978256442', 'null', 'null', 'null', 0),
(24, 'Muliya shivam babubhai', 6, '04 to 05 R1', 'null', 'null', '2006-09-07', 'null', '8866331775', 0, 'Student', 'Vasuki plot , nagarpalika pase , thangadh', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9537623885', '9537623885', 'Google', '', '', '', 'null', 'null', 'null', 0),
(25, 'Makwana Khushbu Jaysukh bhai ', 8, '04 to 05 R3', 'null', 'null', '2005-04-30', 'null', '9313754696', 0, 'Student', 'Ambedkar Nagar chamunda Krupa street No.12 A ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9925818904', '9925818904', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(26, 'Ladva Pooja ', 8, '04 to 05 R3', 'null', 'null', '1993-04-07', 'null', '96015 62890 ', 0, 'Homemaker', 'Isharkurpa   mayani nagar street no .3 ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '', 'Google', '', '', '', 'null', 'null', 'null', 0),
(27, 'BAVISHI CHARMI NILESH ', 6, '04 to 05 R1', 'null', 'null', '1977-01-01', 'null', '94292 48605 ', 0, 'Homemaker', 'PRARABDH, 3, AMBAJI KADVA PLOT, RAJKOT ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8980019323', '', 'Google', '', '', '460953355593', 'null', 'null', 'null', 0),
(28, 'CHAVDA SWATI KAMLESHBHAI', 6, '04 to 05 R1', 'null', 'null', '2008-12-06', 'null', '9875052123', 0, 'Student', 'A-302, gayatri complex , gunatit nagar , doshi hospital main road, Rajkot ,360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, 'Father\'s mobile no. 9909445240', '9875052123', 'Neighbors', '', '', '521725911832', 'null', 'null', 'null', 0),
(29, 'Lathiya Hetvi Hirenbhai ', 6, '04 to 05 R1', 'null', 'null', '2008-06-08', 'null', '9979769897', 0, 'Student', 'Near HJ Doshi Hospital Dwarika Onella A Ving 503', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9727754999', '9979769897', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(30, 'SOLANKI AMAN JAVEDBHAI', 6, '04 to 05 R1', 'null', 'null', '2007-10-17', 'null', '9904630007', 0, 'Student', '150 fit ring road gowardhn chowk rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9904630007', '8320983440', 'Friends', '', '', '580819949948', 'null', 'null', 'null', 0),
(31, 'DANGAR RASHMITA MANVEERBHAI', 6, '04 to 05 R1', 'null', 'null', '1998-05-04', 'null', '9033005293', 0, 'Student', 'RAVECHI KRUPA STREET NO. 1 NEAR KINJAL PROVIZEN STORE', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9574105293', '9033005293', 'Former Students', '', '', '859240327896', 'null', 'null', 'null', 0),
(32, 'PARMAR BHARGAV HITESHBHAI ', 6, '04 to 05 R1', 'null', 'null', '2008-10-08', 'null', '9898082078', 0, 'Student', '\'PITRU ASHISH\' NARAYANA NAGAR Street NO 9', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, 'FATHER MO: 8238817290', '7874948256', 'Friends', '', '', '854503101529', 'null', 'null', 'null', 0),
(33, 'Parmar Nishit Dusyant bhai', 8, '04 to 05 R3', 'null', 'null', '2012-05-08', 'null', '', 0, 'Student', 'Chandresnagar-1 back bone shopping center mavdi plot Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9904255747', '92742 07003 ', 'Former Students', '', '', '', 'null', 'null', 'null', 0),
(34, 'SOLANKI ISHITA BHARATBHAI ', 6, '04 to 05 R1', 'null', 'null', '2007-06-12', 'null', '9023802548', 0, 'Student', 'SILVER PARK BLOCK No - 15 , SWAMINARAYAN CHOK RAJKOT ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8141601093', '9023802548', 'Friends', '', '', '9586 5668 0418', 'null', 'null', 'null', 0),
(35, 'Chandravadia Hansa Rajeshbhai ', 6, '04 to 05 R1', 'null', 'null', '1972-07-13', 'null', '999820881', 0, 'Homemaker', '3/4 Hari Om complex1st floor \nOpp Avkar square \nMavdi plote \nKrushnaagar main road', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9427270790', '', 'News Papers', '', 'Hind Mosaic tiles Veraval( Shapar)                                              ', '785321177571', 'null', 'null', 'null', 0),
(36, 'BADRAKIYA ADITI SHAILESBHAI ', 6, '04 to 05 R1', 'null', 'null', '0000-00-00', 'null', '6356363738', 0, 'Student', 'Block No:28  Jivraj Township, Ambika Township main road -3, Nana Mova road, Rajkot -360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9537363738', '9429218441', 'Friends', '', '', '917843757409', 'null', 'null', 'null', 0),
(37, 'VISAVADIYA ISHA MANISHKUMAR ', 6, '04 to 05 R1', 'null', 'null', '2007-09-02', 'null', '9723840621', 0, 'Student', '16, street no 6 ,krishna park society ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9377346365', '9723840621', 'Former Students', '', '', '423098458881', 'null', 'null', 'null', 0),
(38, 'Lathiya Hetvi Hirenbhai ', 8, '04 to 05 R3', 'null', 'null', '2008-06-08', 'null', '9979769897', 0, 'Student', 'Near HJ Doshi Hospital Dwarika Onella A Ving 503', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9727754999', '9979769897', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(39, 'Chauhan Margi Rajeshbhai ', 18, '08 to 09 R1', 'null', 'null', '2008-02-22', 'null', '9879722321', 0, 'Student', '\" Jalaram Krupa \" Gita nagar main road, near Gayatri temple, Gondal road Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9879522321', '9879722321', 'Neighbors', '', '', '', 'null', 'null', 'null', 0),
(40, 'TUDIYA PRINCE VIPULBHAI', 6, '04 to 05 R1', 'null', 'null', '2008-07-08', 'null', '9979983072', 0, 'Student', 'Matel Soc Street no-6 Opp Khodiya Mandir\n\" Pitru Krupa \" Mavdi Gukul Rajkot 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9979983072', '', 'Former Students', '', '', '903977770721', 'null', 'null', 'null', 0),
(41, 'Savsrta Jalak Vijaybhai ', 6, '04 to 05 R1', 'null', 'null', '2007-08-26', 'null', '7862949841', 0, 'Student', 'Shree yadu nandan mavdi road rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9974262662', '7862949841', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(42, 'Rakhasiya Nandani Satishbhai', 6, '04 to 05 R1', 'null', 'null', '2007-06-01', 'null', '93132 76556', 0, 'Student', 'Chamunda Krupa, Maduram status 2,Ankur Mein Rood, Mavadi, Rajkot \n\n', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '70432 99388', '70432 99388', 'Parents', '', '', '373973865580', 'null', 'null', 'null', 0),
(43, 'Vadgama Digna DineshBhai ', 10, '05 to 06 R2', 'null', 'null', '1996-01-25', 'null', '7016162568', 0, 'Working Professional', 'Pramukh home apartment, ankur vidhyalaya,ankur main road, guruprasad ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9979011029', '9727383710', 'Google', 'Business', 'Pramukh home apartment ', '973054026215', 'null', 'null', 'null', 0),
(44, 'Shindhav Ravi Haresh bhai ', 10, '05 to 06 R2', 'null', 'null', '2004-09-05', 'null', '8401647489', 0, 'Student', 'Meghmaya nagar Street no 2 near rajnagar chok Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9662779044', '', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(45, 'Maru Purva Sanjaybhai', 10, '05 to 06 R2', 'null', 'null', '2012-04-05', 'null', '9016763341', 0, 'Student', 'Naval nager Street no 12', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9016763341', '9016763341', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(46, 'Rupapara Jeet Bipinbhai', 10, '05 to 06 R2', 'null', 'null', '2006-06-14', 'null', '9426007803', 0, 'Student', 'Radha Krishna street no 2 lal park chock', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7048698716', '', 'News Papers', '', '', '', 'null', 'null', 'null', 0),
(47, 'Maurya Jay Dhanirambhai ', 10, '05 to 06 R2', 'null', 'null', '2006-09-05', 'null', '7623076568', 0, 'Student', 'Jay Bahucharaji Chandresh nagar Street no 8 mavadi plot Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9664976394', '9664976394', 'Google', '', '', '710042968910', 'null', 'null', 'null', 0),
(48, 'Unadpotra Tanisha Abbas Bhai ', 10, '05 to 06 R2', 'null', 'null', '2005-05-08', 'null', '9016591937', 0, 'Student', 'Devpara 80 feet road Nilkanth Park society street no.6, Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8866000085', '6352128255', 'Neighbors', '', '', '', 'null', 'null', 'null', 0),
(49, 'Dangar Nirali Ashok Bhai ', 10, '05 to 06 R2', 'null', 'null', '2005-10-09', 'null', '8128346242', 0, 'Student', 'Shiv dhara park -2 kothariya ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8320426440', '9979968350', 'Friends', '', '', '816193253499', 'null', 'null', 'null', 0),
(50, 'JOLAPARA DHRUVI DIPESHBHAI', 6, '04 to 05 R1', 'null', 'null', '2008-12-26', 'null', '9714198142', 0, 'Student', 'GURUPRASHAD SOCIETY NEAR AAKASHGANGA APARTMENT BLOK N- 303, RAJKOT', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9879402610', '9157602610', 'Neighbors', '', '', '', 'null', 'null', 'null', 0),
(51, 'Babariya Pranami Kantibhai', 10, '05 to 06 R2', 'null', 'null', '2005-06-16', 'null', '8849737188', 0, 'Student', 'Hari Om Society Street No.1 Near Old Jakat Naka Dheber Road Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9328234667', '9879159440', 'Parents', '', '', '583142489699', 'null', 'null', 'null', 0),
(52, 'Bambhava Parbat Babubhai ', 10, '05 to 06 R2', 'null', 'null', '2010-08-18', 'null', '7383814145', 0, 'Student', 'Dwarkesh vinayak nagar Street no. 6  mavadi chowkdi Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9510200057', '', 'Google', '', '', '', 'null', 'null', 'null', 0),
(53, 'CHOTALIA RINKAL SANJAYBHAI ', 6, '04 to 05 R1', 'null', 'null', '2009-03-15', 'null', '8160390340', 0, 'Student', '3/11 Gayatri Nagar Chamunda Krupa', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9725013013', '9879267164', 'Parents', '', '', '915262308239', 'null', 'null', 'null', 0),
(54, 'JOLAPARA DHRUVI DIPESHBHAI', 6, '04 to 05 R1', 'null', 'null', '2008-12-26', 'null', '9714198142', 0, 'Student', 'GURUPRASHAD SOCIETY NEAR AAKASHGANGA APARTMENT BLOK N- 303, RAJKOT', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9879402610', '9157602610', 'Neighbors', '', '', '746980478887', 'null', 'null', 'null', 0),
(55, 'PANARA NEVIL VIJAYBHAI', 6, '04 to 05 R1', 'null', 'null', '2009-02-17', 'null', '', 0, 'Student', 'Kothariya Main Road, Nanda Hall Haridhava Marg, Old Subhas Street No - 5 ,\"Pitrukrupa\",Rajkot - 360002', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9925762229', '', 'Parents', '', '', '266343437319', 'null', 'null', 'null', 0),
(56, 'DARVE SOHAM AJIT BHAI', 8, '04 to 05 R3', 'null', 'null', '2010-03-25', 'null', '', 0, 'Student', 'SAMRAT INDUSTRI AREA STREET NO 20', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8530911724', '9664843519', 'Former Students', '', '', '38645468544', 'null', 'null', 'null', 0),
(57, 'Vala parth manishbhai ', 11, '05 to 06 R3', 'null', 'null', '2006-06-06', 'null', '8490846920', 0, 'Student', '5- Saidham society Ankur Nagar main road mavdi area Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9925646920', '9586616211', '', 'Business', '', '303683029563', 'null', 'null', 'null', 0),
(58, 'Pithadiya Krish Vijaybhai', 11, '05 to 06 R3', 'null', 'null', '2006-09-15', 'null', '7202924129', 0, 'Student', 'Shridhar apt. Block no. 3 Swaminarayan nagar 2 Gokuldham main road rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824509655', '9723645125', '', '', '', '', 'null', 'null', 'null', 0),
(59, 'Pithava Payal Dharmeshbhai ', 11, '05 to 06 R3', 'null', 'null', '1995-08-29', 'null', '7874403068', 0, 'Student', '2-vinay society, near shrddha school, b/h malviya college,gondal road ,rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '', 'Friends', 'Business', '', '', 'null', 'null', 'null', 0),
(60, 'Zala Manali Rameshbhai ', 11, '05 to 06 R3', 'null', 'null', '2024-07-27', 'null', '982548661', 0, 'Student', 'Dharesvar society :4 dhebar road rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7778885454', '7778885454', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(61, 'Garala Het Rajesh Bhai ', 11, '05 to 06 R3', 'null', 'null', '2005-08-05', 'null', '9978899979', 0, 'Student', 'Pramukh bliss A801 vagal chowk pal road near sarvoday school rajkot 360004 ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9979999978', '9558899978', '', '', '', '206491424164', 'null', 'null', 'null', 0),
(62, 'RATHOD JENIL NARENDRABHAI', 11, '05 to 06 R3', 'null', 'null', '2002-11-10', 'null', '8780821972', 0, 'Student', 'NEAR BHAKTINAGAR CIRCLE JALARAM CHOWK DHARMA JIAVAN SOCIETY RAJKOT 360002', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9924540783', '9328443341', 'MEMBER OF FAMILY ', 'Business', 'NEAR SORTHIYAWADI PATEL NAGAR 3 BESIDE JALARAM PAN RAJKOT ', '990434757206', 'null', 'null', 'null', 0),
(63, 'PAMBHAR DIYEN RAJESHBHAI', 9, '05 to 06 R1', 'null', 'null', '2006-03-02', 'null', '9510955278', 0, 'Student', '\"Mansi\" - D.M.Park-B Nr.ashirwad hospital mavdi Rajkot-360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9427474533', '8905516222', 'Google', '', '', '997841658789', 'null', 'null', 'null', 0),
(64, 'Chotaliya Dharmik Mayurbhai ', 11, '05 to 06 R3', 'null', 'null', '2008-06-19', 'null', '9574945681', 0, 'Student', '\"Aashirwad\" haridwar society street no. 1, samrat industrial main road, Rajkot. 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '', '', '', '', '', 'null', 'null', 'null', 0),
(65, 'FACHARA HASTI JIGNESHBHAI ', 9, '05 to 06 R1', 'null', 'null', '0000-00-00', 'null', '6354508409', 0, 'Student', 'UDAYNAGAR_2 STREET NO_7 MAVDI MAIN ROAD \n', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8128868734', '6354508409', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(66, 'SHISHANGIYA MAYANK MANISHBHAI', 9, '05 to 06 R1', 'null', 'null', '2007-04-28', 'null', '9157415505', 0, 'Student', 'Khodiyar Krupa Naval nagar 3 mavadi main road near pir dargah rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9879868180', '9426936398', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(67, 'RAVAL VISHVA MAYURBHAI ', 9, '05 to 06 R1', 'null', 'null', '2007-07-11', 'null', '', 0, 'Student', 'Labhadeep society number 16 mavdi main road, rajkot 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '98248 85272', '7778085482', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(68, 'DANGAR YUG MANOJBHAI ', 9, '05 to 06 R1', 'null', 'null', '2006-10-24', 'null', '8320399986', 0, 'Student', 'Naval nagar Street number 9 , mavdi plot , rajkot - 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9427170789', '9662289870', 'Friends', '', '', '849818346500', 'null', 'null', 'null', 0),
(69, 'Padaliya Darsh Vipulbhai ', 9, '05 to 06 R1', 'null', 'null', '2007-01-23', 'null', '9725677380', 0, 'Student', 'Sthapatya green City, Kangsiyali road,Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7984594345 & 8141591990', '9727067434', 'Google', '', '', '6724 5877 9356', 'null', 'null', 'null', 0),
(70, 'Gohel Shubham yogeshbhai', 9, '05 to 06 R1', 'null', 'null', '2005-05-30', 'null', '9099472261', 0, 'Student', 'Mavdi Gurukul bapasitaram chowk real prime near Shivam park 2 ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9106368868', '9825189582', 'Friends', '', '', '7461-0348-2249', 'null', 'null', 'null', 0),
(71, 'Patel Uma Bhupatbhai ', 11, '05 to 06 R3', 'null', 'null', '2024-05-30', 'null', '9638843169', 0, 'Student', 'Navalnagar 3 shree ram main road rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824575860', '6354327076', '', '', '', '615099468904', 'null', 'null', 'null', 0),
(72, 'KHIMSURIYA YUVRAJ RANJITBHAI ', 9, '05 to 06 R1', 'null', 'null', '2006-04-17', 'null', '9510745420', 0, 'Student', 'Ambedkar Nagar no.1', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9327385427', '9327385427', 'Friends', 'Profession', 'Rajkot ', '607561825785', 'null', 'null', 'null', 0),
(73, 'KARELIYA SOUMAY HARESHBHAI ', 11, '05 to 06 R3', 'null', 'null', '2024-02-21', 'null', '9979906821', 0, 'Student', 'Gokuldham Street no 2, Gondal road , Rajkoat', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9979906821', '8306613744', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(74, 'JOSHI VATSAL NIMISHBHAI ', 9, '05 to 06 R1', 'null', 'null', '2007-10-29', 'null', '8128755602', 0, 'Student', 'Gokuldham sari no 2 boolno 98', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8128755602', '9376063371', 'Parents', '', '', '716032799963', 'null', 'null', 'null', 0),
(75, 'VACHHANI NAND PARESHBHAI', 9, '05 to 06 R1', 'null', 'null', '2008-11-28', 'null', '8140406564', 0, 'Student', 'B -202 aakruti apartment Ambika Township jivraj park near Modi school ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9979950667', '8140406564', 'Google', '', '', '911639688402', 'null', 'null', 'null', 0),
(76, 'GONDALIYA NEHA KIRTIBEN ', 9, '05 to 06 R1', 'null', 'null', '2006-09-29', 'null', '9724310929', 0, 'Student', 'NAVAL NAGAR STREET NO.9 RAMDEV NIVAS', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '9727473832', 'School principal ', '', '', '515496162192', 'null', 'null', 'null', 0),
(77, 'ZORA JAYENDRA NAVINCHANDRA ', 9, '05 to 06 R1', 'null', 'null', '2003-12-25', 'null', '9023529955', 0, 'Student', '201, Elora complex , Near D mart , gondal road , Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9328634144', '9825536133', 'Parents', '', '', '666502796691', 'null', 'null', 'null', 0),
(78, 'MAKWANA ASHISH MANSUKHBHAI ', 9, '05 to 06 R1', 'null', 'null', '2006-10-09', 'null', '', 0, 'Student', 'Street number 13-b Ambedkar Nagar 150 feet ring road Astha residency, rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9913620799', '8758323662', 'School principal ', '', '', '488896114667', 'null', 'null', 'null', 0),
(79, 'VASOYA JAY SANJAYBHAI', 9, '05 to 06 R1', 'null', 'null', '2006-08-09', 'null', '6355217366', 0, 'Student', '2-OM TIRUPATI BALAJI PARK, BHIND TAPSI HATEL, SARDAR CHOAK, RAJKOT, GUJARAT,  360002', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9714000929', '9265111956', 'Google', '', '', '705388730827', 'null', 'null', 'null', 0),
(80, 'TANK BHAKTI RAJESHBHAI', 9, '05 to 06 R1', 'null', 'null', '2007-02-13', 'null', '9016027532', 0, 'Student', 'E 288 shashtri nagar ajmera Nana mava main road rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7990082895', '9265980290', 'Neighbors', '', '', '930369613950', 'null', 'null', 'null', 0),
(81, 'Trivedi janki ketanbhai ', 9, '05 to 06 R1', 'null', 'null', '2007-08-11', 'null', '79904 31638 ', 0, 'Student', 'Devpara sak market blok no 306 jalaram krupa bhvnath temple pashe', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9998040567', '9898459364', 'Teacher\'s ', '', '', '', 'null', 'null', 'null', 0),
(82, 'PARTH BABRIYA ARVIND BHAI', 9, '05 to 06 R1', 'null', 'null', '2006-09-22', 'null', '9313198060', 0, 'Student', 'AMBEDKAR NAGER', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9727547806', '7016440265', 'Friends', 'Profession', 'Rajkot', '', 'null', 'null', 'null', 0),
(83, 'PARMAR DIKSHITA VIJAYBHAI ', 9, '05 to 06 R1', 'null', 'null', '2008-12-07', 'null', '8401788805', 0, 'Student', '\" CHAMUNDA KRUPA \" SHIVNAGAR -11 VIRAL HOSPITAL GONDAL ROAD RAJKOT \n\n', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9898882834', '8401788805', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(84, 'MALEK NILIMA MAHOMAD HANIF', 9, '05 to 06 R1', 'null', 'null', '1998-08-08', 'null', '8153808422', 0, 'Student', 'Prnami chok jungleshvar rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9023901011', '8140498422', 'Friends', '', '', '872542949090', 'null', 'null', 'null', 0),
(85, 'Marsonia Nency Vishal Bhai ', 9, '05 to 06 R1', 'null', 'null', '1997-10-07', 'null', '7573028400', 0, 'Homemaker', 'Jivraj park  Ambika township  near Nachiketa school  Dream Hills  B - 403 ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '95740 38400', '', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(86, 'Lalani dharmi vikasbhai', 9, '05 to 06 R1', 'null', 'null', '2008-10-07', 'null', '9727489751', 0, 'Student', 'sivnagar 12 \'TIRUPATI KRUPA\' panchasil 1 near doshi hospital \n', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8141453249', '9712536409', 'Neighbors', '', '', '', 'null', 'null', 'null', 0),
(87, 'JOBANPUTRA VANSHIKA NRESHBHAI ', 9, '05 to 06 R1', 'null', 'null', '2008-10-18', 'null', '9979594941', 0, 'Student', 'New shubhas b seri no 6', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7863845052', '8320448077', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(88, 'RATHOD DHRUVISHA PRAKASHBHAI', 9, '05 to 06 R1', 'null', 'null', '0000-00-00', 'null', '', 0, 'Student', 'Gondal roed ,s. t wort shop   ambedkarnagar street no 6', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9723363929', '9537645629', 'Neighbors', '', '', '', 'null', 'null', 'null', 0),
(89, 'VARMORA JINAL PARESHBHAI ', 9, '05 to 06 R1', 'null', 'null', '2011-08-13', 'null', '', 0, 'Student', '150, feet ring road near om nagar circle \'shyam nivash\'', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9157418377', '6353713526', 'News Papers', '', '', '302301828652', 'null', 'null', 'null', 0),
(90, 'BADELIYA ZARANA HARESHBHAI ', 9, '05 to 06 R1', 'null', 'null', '2010-12-15', 'null', '-', 0, 'Student', '150 , feet ring road near om nagar circle behind Shraddha medical \'Ajanta arts\'', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824841189', '7202005698', 'Friends', 'Profession', '-', '499472510090', 'null', 'null', 'null', 0),
(91, 'Chudasama Krutika Ashish bhai ', 10, '05 to 06 R2', 'null', 'null', '2010-10-29', 'null', '8490889504', 0, 'Student', 'Krusan nagar 10', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '70692 69422', '8490889504', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(92, 'PARMAR DHRUVI JAYENDRASINH', 6, '04 to 05 R1', 'null', 'null', '2008-09-10', 'null', '6352710479', 0, 'Student', '\' Shree Guru Krupa \' ramnagar 5 near P.D.M college Gondal road rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824481291', '9904961791', '', '', '', '941119546174', 'null', 'null', 'null', 0),
(93, 'Nehal Virani Vinodbhai ', 8, '04 to 05 R3', 'null', 'null', '2007-02-10', 'null', '9998417704', 0, 'Student', 'New kedarnath society Street no 3 kothariya road ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9998417704', '9998417704', 'Google', '', '', '995948726552', 'null', 'null', 'null', 0),
(94, 'ZALAVADIYA MARGESH BAKULBHAI ', 9, '05 to 06 R1', 'null', 'null', '2007-08-13', 'null', '8866107421', 0, 'Student', 'Umiya Chowk 150 feet ring road Jaljeet 1 Radhe ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9428894070', '8866107421', 'Neighbors', '', 'Gokuldham Road Rani Oil Meel Ganesh engineering ', '6578 8947 7851', 'null', 'null', 'null', 0),
(95, 'RADADIYA HET SANJAYBHAI', 9, '05 to 06 R1', 'null', 'null', '2008-11-18', 'null', '9327404401', 0, 'Student', 'DIPJYOT PARK 3, BAPASITARAM COWK , MAVADI, RAJAKOT', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9924265462', '9327404401', 'Teacher', '', '', '', 'null', 'null', 'null', 0),
(96, 'Parekh Dhruvi Sanjaybhai ', 11, '05 to 06 R3', 'null', 'null', '0000-00-00', 'null', '6353555069', 0, 'Student', 'Gokuldham RMC Quarter Block No:- 37 Room No:- 1738 krishnanagar main road Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '6353555069', '6353555069', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(97, 'Solanki Mahipalsinh Pankajbhai', 11, '05 to 06 R3', 'null', 'null', '2005-11-25', 'null', '8780305353', 0, 'Student', 'Laxmiwadi main road', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824222517', '8780305353', 'Parents', '', '', '803030990273', 'null', 'null', 'null', 0),
(98, 'Disha Paresh ', 0, '', 'null', 'null', '2009-03-26', 'null', '6359698414', 0, 'Student', 'Naval Nagar cherry number 17', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8980866768', '9727321479', '', 'Profession', '', '', 'null', 'null', 'null', 0),
(99, 'Disha  Paresh ', 0, '', 'null', 'null', '2009-03-26', 'null', '6356998414', 0, 'Student', 'Naval Nagar cherry number 17', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8980866768', '9727321479', '', 'Profession', '', '', 'null', 'null', 'null', 0),
(100, 'JOTANGIYA AAYUSHI MUKESHBHAI', 9, '05 to 06 R1', 'null', 'null', '0000-00-00', 'null', '9426078236', 0, 'Student', 'Ankurnagar main rod vrundavan sosaity number 4', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '6355401346', '9426078236', 'Relative', '', '', '300144673741', 'null', 'null', 'null', 0),
(101, 'JOTANGIYA AAYUSHI MUKESHBHAI ', 9, '05 to 06 R1', 'null', 'null', '0000-00-00', 'null', '9426078236', 0, 'Student', 'Ankurnagar main rod vrundavan sosaity number 4', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '6355 401 346 ', '9426078236', 'Parents', '', '', '3001 4467 3741', 'null', 'null', 'null', 0),
(102, 'KARELIYA SOUMAY HARESHBHAI ', 11, '05 to 06 R3', 'null', 'null', '2012-02-21', 'null', '9979906821', 0, 'Student', 'Gokuldham -2,rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9979906821', '6352303551', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(103, 'Dharaiya Dhruv Hirenbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2008-10-07', 'null', '9574261002', 0, 'Student', 'Udaynagar- 1 Street-24 Mavdiplot Jyot prakash Rajkot-360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9904834831', '', 'Parents', '', '', '342024729284', 'null', 'null', 'null', 0),
(104, 'Pedhadiya Krunal Hiteshbhai ', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-01-31', 'null', '6353359640', 0, 'Student', 'Aadarsh Upvan block no:-21 behind Aadarsh Green 80 ft.road', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9913144460', '6353359640', 'Friends', '', '', '492457202627', 'null', 'null', 'null', 0),
(105, 'Khunt Raj Arvindbhai ', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-07-23', 'null', '9157550138', 0, 'Student', 'Near - Gopal Chowk\nDholra ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9925150138', '9157550138', 'Parents', '', '', '864193196715', 'null', 'null', 'null', 0),
(106, 'LIMBASIYA NAGJI NILESH BHAI', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-02-11', 'null', '9106219955', 0, 'Student', 'Kiran society-2 near Hari Ghava Road Rajkot - 360002', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9879879818', '8320341908', 'Friends', '', '', '204063533617', 'null', 'null', 'null', 0),
(107, 'Khunt Senil Ashvindhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-04-14', 'null', '8320343269', 0, 'Student', 'Dholra, rajkot0', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824384911', '', 'Friends', '', '', '355980031179', 'null', 'null', 'null', 0),
(108, 'Joshi Dhyey Rakesh Bhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2008-10-06', 'null', '7874994665', 0, 'Student', 'Rangoli Bangloz Behind Ramadhana Mavadi Pal Road Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9512472202', '9023579220', 'Jd sir', '', '', '937279905419', 'null', 'null', 'null', 0),
(109, 'Lakhani Jeel Harikrushnabhai ', 1, '07:30 to 08:30 R1', 'null', 'null', '2006-10-03', 'null', '9016712901', 0, 'Student', 'Akshar,new rameshwar society sheri no-9, nalanda school,rajkot, gujarat ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9723938218', '9824949531', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(110, 'Donga Pratik Ashvinbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-07-21', 'null', '6352101601', 0, 'Student', '\"Bansi\", new khodiyar society -1, near kothariya road, opposite aditya pan, rajkot-360 002', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9925639087', '7984699295', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(111, 'Katba Aryan Manishbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2006-12-31', 'null', '9824983635', 0, 'Student', 'Khodiyar nivas, arjun park, 50 feet road, behind nanda hall, rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9904324062', '8780410564', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(112, 'Ashodiya Vivek Chiragbhai ', 1, '07:30 to 08:30 R1', 'null', 'null', '2009-03-04', 'null', '8140438166', 0, 'Student', 'Gondal road near d mart sunrise appartment B wing 401', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9426238166', '9924938166', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(113, 'Varsani Krish Shaileshbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2009-03-05', 'null', '88495 88425', 0, 'Student', 'Umiya chowk,jasraj nagar series no.3', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8140117471', '9714417471', 'Former Students', '', '', '', 'null', 'null', 'null', 0),
(114, 'Chandvaniya Darshan Ripul Bhai ', 1, '07:30 to 08:30 R1', 'null', 'null', '2008-12-06', 'null', '8128330461', 0, 'Student', 'Siv Darshan new rajdeep society ston.2,150 fit ring road ,40 fit road hotel khodal rajkot.', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7043678088', '9904021228', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(115, 'Sangani Darshan Kamleshbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-04-16', 'null', '9601268460', 0, 'Student', 'Flat No.101,Omkar Avenue, Behind Marvel Hospital,Om Park, Mavdi, Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824075278', '9727186460', 'Parents', '', '', '820958734360', 'null', 'null', 'null', 0),
(116, 'Thakre Rohit Rajeshbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2006-01-22', 'null', '8799290199', 0, 'Student', 'Om shanti Saidham Society Street no.-5 150 ft ring road 360004 Rajkot Rajkot GJ IN  \n', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9173376188', '8320015064', 'Friends', '', '', '977298169084', 'null', 'null', 'null', 0),
(117, 'Makadiy Sahil Jagdishbhai ', 1, '07:30 to 08:30 R1', 'null', 'null', '2008-12-04', 'null', '9979716065', 0, 'Student', 'Nana mova road Laxmi Nagar shak market krushannagar 1  Umiyaji krupa', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9879642950', '9979716065', 'Parents', '', '', '8644 0601 9496', 'null', 'null', 'null', 0),
(118, 'Vansh himatsinh Dhirubhai ', 1, '07:30 to 08:30 R1', 'null', 'null', '1983-10-02', 'null', '8140215804', 0, 'Working Professional', 'Guru Prasad chock krushna Naga/15\nJd Pathak plot \nBalkrishan scool near\nNilkanth Verni Apartment _201', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '', 'Friends', 'Business', 'Jay somnath industries 10 Narayan Nagar yadav pan PDmalvya fatak ', '', 'null', 'null', 'null', 0),
(119, 'Pithadiya Shyam Ketanbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2024-09-05', 'null', '8160049906', 0, 'Student', 'Pidimal viya Narayan nagar seri n. 6', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824041317', '9316147598', 'School ', '', '', '', 'null', 'null', 'null', 0),
(120, 'Dhruv Meet Manishbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2008-08-02', 'null', '6354985633', 0, 'Student', 'Nanamava mein rod laxminagarani sakmarket p.g.v.c.l ni pachar janaki makan', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '9727365590', 'Google', '', '', '', 'null', 'null', 'null', 0),
(121, 'Boghani Parul Gordhanbhai ', 1, '07:30 to 08:30 R1', 'null', 'null', '1996-01-02', 'null', '9427436541', 0, 'Working Professional', 'Kruti onella E202, Govardhan chowk ,150 feet ring road ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '9979292862', 'Neighbors', 'Job', 'Bussines bay complex ,lycos export kavalavad road ', '447957658076', 'null', 'null', 'null', 0),
(122, 'Dhuduk Bhavya Navneetbhai', 8, '04 to 05 R3', 'null', 'null', '2011-01-05', 'null', '', 0, 'Student', 'Krishna, Tapu Bhavan Plot Street. No:-2, KrushnaNagar Main Road, Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7818880999', '9979652006', '', '', '', '742897025300', 'null', 'null', 'null', 0),
(123, 'JOTANGIYA AAYUSHI MUKESHBHAI', 9, '05 to 06 R1', 'null', 'null', '2008-07-26', 'null', '9426078236', 0, 'Student', 'Ankur nagar main road vrundavan sosaity', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '6355401346', '6426078236', 'Parents', '', '', '300144673741', 'null', 'null', 'null', 0),
(124, 'Vadher Darshan Vijay bhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2010-03-17', 'null', '8320628803', 0, 'Student', '150 feet right Rd Radhe hotel ni Bh kishan park str.:-4 momai krupa Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9574260736', '9313132037', 'Google', '', '', '', 'null', 'null', 'null', 0),
(125, 'RATHOD DHRUVISHA PRAKASHBHAI', 9, '05 to 06 R1', 'null', 'null', '0000-00-00', 'null', '', 0, 'Student', 'Dondal road, s. t work shop pachhad, ambedkarnagar, rajkot. ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9723363929', '9537645629', 'Neighbors', '', '', '242841893787', 'null', 'null', 'null', 0),
(126, 'Parmar Riddhi Mansukhbhai', 11, '05 to 06 R3', 'null', 'null', '2007-01-14', 'null', '9429716901', 0, 'Student', 'Hinglaj Krupa,Udaynagar-2, Street no.7,mavdi chokdi', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9825709826', '9898814107', 'From teacher ', '', '', '2612 2259 2902', 'null', 'null', 'null', 0),
(127, 'Makvana Vishva Hiteshbhai ', 11, '05 to 06 R3', 'null', 'null', '0000-00-00', 'null', '', 0, 'Student', 'Ambaji kadva plot main road near school no-69 garbi chowk  Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9714297554', '8160183472', 'Parents', '', '', '4501  6571  1898', 'null', 'null', 'null', 0),
(128, 'JOTANGIYA AAYUSHI MUKESHBHAI ', 9, '05 to 06 R1', 'null', 'null', '2008-07-26', 'null', '9426078236', 0, 'Student', 'Ankurnagar main rod vrundavan sosaity number 4', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '6355401346', '9426078236', 'Parents', '', '', '300144673741', 'null', 'null', 'null', 0),
(129, 'JOTANGIYA AAYUSHI MUKESHBHAI ', 9, '05 to 06 R1', 'null', 'null', '2008-07-26', 'null', '9426078236', 0, 'Student', 'Ankurnagar main rod vrundavan sosaity no.4  Rajkot. ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '6355 401 346 ', '9426078236', 'Parents', '', '', '3001 4467 3741', 'null', 'null', 'null', 0),
(130, 'CHOVATIYA KASHYAP GIRISHBHAI ', 8, '04 to 05 R3', 'null', 'null', '2010-09-30', 'null', '8200375045', 0, 'Student', 'Navalnagar 3/9 corner, mavadi plot, rajkot-4.', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '98248 48095 ', '94086 13404 ', 'Parents', '', '', '5533 7293 8850', 'null', 'null', 'null', 0),
(131, 'BHADRESHA DHRUV  KALPESHBHAI', 0, '', 'null', 'null', '2009-03-19', 'null', '9265627566', 0, 'Student', 'Naval Nagar 8/15 corner', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9265627566', '', 'Parents', '', '', '', 'null', 'null', 'null', 0),
(132, 'Sakariya Jeel Ajaybhai ', 11, '05 to 06 R3', 'null', 'null', '2005-09-14', 'null', '9558198109', 0, 'Student', '', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9429485698', '9925718514', '', '', '', '780961720667', 'null', 'null', 'null', 0),
(133, 'KACHA HAPPY MAHESHBHAI', 8, '04 to 05 R3', 'null', 'null', '2007-12-08', 'null', '7203090290', 0, 'Student', 'NEW GOPAL PARK STREET NO 3\nANKUR MAIN ROAD\nRAJKOT', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7203090290', '7203090290', 'Parents', 'Business', 'GOPVANDNA SOCIETY AHIR CHOWK NEHRUNAGAR MAIN ROAD RAJKOT', '', 'null', 'null', 'null', 0),
(134, 'SARVAIYA SHRADDHA VIJAYBHAI ', 11, '05 to 06 R3', 'null', 'null', '2011-03-03', 'null', '', 0, 'Student', 'Bolenath Socity Street no-4 OM Shree Near Ankur Vidhyalay.', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '99243 50125 ', '9624610985', 'Parents', '', '', '485121939500', 'null', 'null', 'null', 0),
(135, 'CHANDPA PRATIK DHIRU ', 17, '07 to 08 R3', 'null', 'null', '1997-08-18', 'null', '9328612925', 0, 'Working Professional', 'D-104-B Adarsh Residency Pipaliya pal Lodhika rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8238573586', '', 'Google', 'Job', 'Metoda gate no.3 ', '519971968255', 'null', 'null', 'null', 0),
(136, 'Bhardiya Sagar Pravinbhai ', 17, '07 to 08 R3', 'null', 'null', '2001-07-10', 'null', '9723226995', 0, 'Working Professional', 'Lamba Ahir samaj wadi same ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '', 'Google', 'Job', 'Pipaliya RTL Ravi Technoforge Pvt. Ltd.', '2602 9926 6658', 'null', 'null', 'null', 0),
(137, 'Koradiya nehil sureshbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-03-12', 'null', '9409760302', 0, 'Student', 'Mahadev vruadavan society street no 6', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9408187868', '9409760302', 'Google', 'Job', '', '225755888400', 'null', 'null', 'null', 0),
(138, 'PARMAR RIDDHI JITENDRABHAI ', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-07-22', 'null', '93273 17622', 0, 'Student', 'Ambedkar nagar Street no 1 behind S.T work shop gondal road Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '91061 41385', '', 'Relative ', '', '', '', 'null', 'null', 'null', 0),
(139, 'Parmar Mihir Vijaybhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2010-11-02', 'null', '8401788805', 0, 'Student', 'Viral hospital pase \nShivnagar 11\nGondal road\nRajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9898882834', '8401788805', 'Parents', '', '', '584842367410', 'null', 'null', 'null', 0),
(140, 'Pipariya Madhav Dipakbhai ', 3, '07:30 to 08:30 R3', 'null', 'null', '2013-01-01', 'null', '', 0, 'Student', 'Guruprasad chowk, Gunatit nagar Street no.6, block no:99, RAJKOT\n', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8128580600', '9265318510', 'My self ', '', '', '513155067434', 'null', 'null', 'null', 0),
(141, 'Visapara Harsh Jayeshbhai', 18, '08 to 09 R1', 'null', 'null', '2010-03-25', 'null', '9558447751', 0, 'Student', '\'Radhe Krishna\' \nVrundavan socitay street no 6, ankur school main road rajkot\n', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9427732361', '7202816328', 'Parents', '', '', '2249 4695 7506', 'null', 'null', 'null', 0),
(142, 'Parmar Meetrajsinh Vikramsinh', 1, '07:30 to 08:30 R1', 'null', 'null', '2007-05-24', 'null', '8980469524', 0, 'Student', '\"Jay Mandvaraiji\" Giranar Society,  Street -1, Khijadavado Road , Rajkot.', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9687357421', '8980469524', 'Relatives ', '', '', '9001 6817 1512', 'null', 'null', 'null', 0),
(143, 'Vala Harvi manishbhai ', 11, '05 to 06 R3', 'null', 'null', '2003-11-17', 'null', '9586616211', 0, 'Student', '5- Saidham society Ankur Nagar main road mavdi area Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9925646920', '9586616211', '', 'Job', 'No', '722907190502', 'null', 'null', 'null', 0),
(144, 'Vadher Deep Vijay', 1, '07:30 to 08:30 R1', 'null', 'null', '2010-03-17', 'null', '8320628803', 0, 'Student', '150 feet ring rdv radhe hotel ni bh kishan park str:-4 momai krupa rajakot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9574260736', '9313132037', 'Google', '', '', '', 'null', 'null', 'null', 0),
(145, 'CHIRODIYA RAJESH HAMIRBHAI', 18, '08 to 09 R1', 'null', 'null', '2005-01-03', 'null', '9265730301', 0, 'Student', '14\' AMBEDKARNAGAR ,TIRUPATI CHOWK, 150FT RING ROAD, OPPOSITE FORTUNER HOTEL, RAJKOT-4', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9313429678', '', 'Friends', '', '', '9711 1802 6366', 'null', 'null', 'null', 0),
(146, 'PANSURIYA RIKUNJ RAMESH BHAI', 18, '08 to 09 R1', 'null', 'null', '2004-03-10', 'null', '', 0, 'Working Professional', 'Udhay Nagar 2 street no 4 mavdi main road ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9724491009', '', 'Friends', 'Business', 'Udhay Nagar 2 street no 4 mavdi main road ', '719640448398', 'null', 'null', 'null', 0),
(147, 'GOHEL MOHIT HITESHBHAI ', 18, '08 to 09 R1', 'null', 'null', '2002-05-21', 'null', '8238723890', 0, 'Working Professional', 'Gopal Nagar - 1 City fortune appartment block no 505, Rajkot,360002.', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824565996', '9081601536', 'Friends', 'Business', '3 - MAVDI PLOT , B/H,AMBIKA WEIGHT BRIDGE ADARSH ENGINEERING WORKS.', '972405401870', 'null', 'null', 'null', 0),
(148, 'Nena Virag Dilipbhai ', 11, '05 to 06 R3', 'null', 'null', '2010-08-04', 'null', '9737325652', 0, 'Student', 'NAVAL NAGAR 8/16 CORNER', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9978950403', '9099132565', '', '', '', '586333620945', 'null', 'null', 'null', 0),
(149, 'Nena Virag Dilipbhai ', 8, '04 to 05 R3', 'null', 'null', '2010-08-04', 'null', '9737325652', 0, 'Student', 'NAVAL NAGAR 8/16 CONNER', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9978950403', '9099132565', '', '', '', '586333620945', 'null', 'null', 'null', 0);
INSERT INTO `studentinfo` (`id`, `name`, `batch`, `batch_name`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `profession`, `address`, `admission_time`, `due_date`, `created_at`, `pending_fees`, `discount`, `total_fees`, `paid_fees`, `father_number`, `home_number`, `reference`, `father_profession`, `workplace_address`, `aadharcard_number`, `joining_purpose`, `extratime_daily`, `gmail_id`, `alumnistudent`) VALUES
(150, 'Nena Kajalben Dilipbhai', 11, '05 to 06 R3', 'null', 'null', '1990-05-26', 'null', '9099132565', 0, 'Homemaker', 'NAVAL NAGAR 8/16 CORNER', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9978950403', '', '', 'Job', 'R.I.E. CLASS', '992197708206', 'null', 'null', 'null', 0),
(151, 'RATHOD AJAY ARVINDBHAI ', 18, '08 to 09 R1', 'null', 'null', '2024-06-21', 'null', '9173525146', 0, 'Working Professional', 'VINAYAK NAGAR STREE NO 16. NR KISMAT BEKRI. MAVDI PLOt. RAJKOT. GUJARAT. 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '6353668083', '8160605460', 'Instagram', 'Job', 'METODA GIDC RAJKOT 360021', '424886319116', 'null', 'null', 'null', 0),
(152, 'Yagna Bhanderi ', 6, '04 to 05 R1', 'null', 'null', '1999-12-07', 'null', '9067506017', 0, 'Working Professional', 'New Mayani -2 , Near Saradar Patel Bhavan , \nKhijada  main road', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9724433788', '820-0527021', 'Google', 'Job', '', '3476 1914 1997', 'null', 'null', 'null', 0),
(153, 'JALU MIHIRA RAJESHBHAI ', 6, '04 to 05 R1', 'null', 'null', '2007-07-18', 'null', '8160020069', 0, 'Student', 'Ram mandir near , manavadar ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7096353789', 'Vrashaben 6353657080', 'Friends', '', '', '839169367958', 'null', 'null', 'null', 0),
(154, 'KRUPALI CHHAIYA ', 6, '04 to 05 R1', 'null', 'null', '2006-05-03', 'null', '9824208800', 0, 'Student', 'Block number 32 Silver park Swaminarayan chowk Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9714555515', '9824245515', 'Friends', '', '', '', 'null', 'null', 'null', 0),
(155, 'Babariya manav Prashantbhai', 11, '05 to 06 R3', 'null', 'null', '2008-02-22', 'null', '9537404001', 0, 'Student', 'Ambaji kadava main road', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9537404400', '', '', '', '', '', 'null', 'null', 'null', 0),
(156, 'Rathod Aman Chandubhai ', 18, '08 to 09 R1', 'null', 'null', '2008-06-02', 'null', '6353652906', 0, 'Student', 'Aambedkar nagar Street no10', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9265302096', '', 'Instagram', '', '', '3205 4591 0153', 'null', 'null', 'null', 0),
(157, 'CHHAIYA KRUPALI MANVIR BHAI ', 6, '04 to 05 R1', 'null', 'null', '2006-05-03', 'null', '9824208800', 0, 'Student', 'Block number 32 Silver park Swaminarayan chowk Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9714555515', '9824245515', 'Friends', '', '', '544618051380', 'null', 'null', 'null', 0),
(158, 'Nena Darpan Babubhai', 18, '08 to 09 R1', 'null', 'null', '2005-01-16', 'null', '7874481204', 0, 'Student', 'Nawal Nagar 8', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '7622091056', '9016196989', 'Parents', '', 'No', '386382284280', 'null', 'null', 'null', 0),
(159, 'PESHAVARIYA OM BHARATBHAI', 18, '08 to 09 R1', 'null', 'null', '2006-09-11', 'null', '7874729926', 0, 'Student', 'Shree Vishvakarma Krupa Gitanjali Society Street No - 1,Near Gokuldham krishna Nagar Main Road, Rajkot, Rajkot, Gujarat - 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8320329926', '6355416576', 'Friends', '', '', '3018 1862 0069', 'null', 'null', 'null', 0),
(160, 'PARMAR BRINDA HASMUKHBHAI ', 17, '07 to 08 R3', 'null', 'null', '2008-03-13', 'null', '8155813004', 0, 'Student', 'Navalnagar Street No 18 Close Street, Near Swaminarayan Chowk, Rajkot 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9924578915', '8155813004', 'Parents', '', '', '782249730679', 'null', 'null', 'null', 0),
(161, 'PARMAR AYUSHI JAYESHBHAI', 17, '07 to 08 R3', 'null', 'null', '2007-11-22', 'null', '9574679978', 0, 'Student', 'Navalnagar 18 A, Near Momai Floor Mil, First Close Street, Rajkot 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9586579978', '9974872998', 'Parents', '', '', '775188398184', 'null', 'null', 'null', 0),
(162, 'RADIYA  JAY  DHAVALBHAI.', 1, '07:30 to 08:30 R1', 'null', 'null', '2011-04-25', 'null', '', 0, 'Student', 'Maa, Dwarkadhish Society Stret No-2, Mavadi Chowkdi, Gokuldham Society, Rajkot, Gujarat -360004.\n ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9924022969', '9723466423', 'Family members ', '', '', '918622100073', 'null', 'null', 'null', 0),
(163, 'Parmar Mihir Rajendra ', 3, '07:30 to 08:30 R3', 'null', 'null', '2008-04-17', 'null', '8469812824', 0, 'Student', 'Jaljit society Sheri no-10 \'Anjali\' Umiya chok ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9924844245', '8469812824', 'Parents', '', '', '928623142585', 'null', 'null', 'null', 0),
(164, 'Parmar Mihir Rajendra ', 3, '07:30 to 08:30 R3', 'null', 'null', '2008-04-17', 'null', '8469812824', 0, 'Student', 'Jaljit society Sheri no -10 \'Anjali \' Umiya chok', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8469140244', '8469812824', 'Parents', '', '', '928623142585', 'null', 'null', 'null', 0),
(165, 'UNDHAD MEET SATISHBHAI', 17, '07 to 08 R3', 'null', 'null', '2008-02-21', 'null', '6355431798', 0, 'Student', 'Santoshi krupa, 8-krushnanagar, Near Swaminarayan Chowk, Opp A-one coldrinks, Rajkot', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9875006621', '6355431798', 'Parents', '', '', '878088320042', 'null', 'null', 'null', 0),
(166, 'BHADRESHA DHRUV  KALPESHBHAU', 6, '04 to 05 R1', 'null', 'null', '2009-03-19', 'null', '9265627566', 0, 'Student', 'Naval Nagar 8/15 corner', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9265627566', '9265627566', 'Parents', 'Profession', '', '690114943286', 'null', 'null', 'null', 0),
(167, 'BHADRESHA DHRUV KALPESHBHAI', 6, '04 to 05 R1', 'null', 'null', '2009-03-19', 'null', '9265627566', 0, 'Student', 'Naval Nagar 8/15 corner', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '98242 29240 ', '9265627566', 'Parents', 'Profession', '', '690114943286', 'null', 'null', 'null', 0),
(168, 'UNADKAT MAHI SANDIPBHAI', 6, '04 to 05 R1', 'null', 'null', '2010-07-15', 'null', '8460570761', 0, 'Student', 'Jalaram Krupa vishnunagar1 ankur vidhalaya main road Rajkot ', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '8460570761', '8469296651', 'Neighbors', '', '', '613543085251', 'null', 'null', 'null', 0),
(169, 'VADGAMA ROSHANI MAHESHBHAI ', 10, '05 to 06 R2', 'null', 'null', '2006-07-04', 'null', '8460624375', 0, 'Student', 'Guruprsad chok, papaya vadi, Street no 5.', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '', '', 'Friends', '', '', '512263576844', 'null', 'null', 'null', 0),
(170, 'Gohel Shreya Hiteshbhai ', 17, '07 to 08 R3', 'null', 'null', '2007-08-28', 'null', '8238723828', 0, 'Student', 'City fortune, block no.505, gopal nagar 1', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824565996', '9824250494', 'Parents', '', '', '811868383549', 'null', 'null', 'null', 0),
(171, 'Anadani Jenil Jayeshbhai', 1, '07:30 to 08:30 R1', 'null', 'null', '2008-12-02', 'null', '9033111206', 0, 'Student', 'DHANANJAY, Shajanand Nagar Main Road, B/h Fortune Hotel, OPP.Pramukhnagar, Rajkot 360004', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9824564202', '90331 11206 ', 'Parents', '', '', '387449905651', 'null', 'null', 'null', 0),
(172, 'Chudasama Dhyey Kailashbhai', 17, '07 to 08 R3', 'null', 'null', '2008-04-25', 'null', '7043394276', 0, 'Student', '\"Shree Gururam Krupa\" Shree Hari  society Street no. - 1 Plot no - 1 Bih. Jithriya Hanuman temple.', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0, 0, '9173930404', '9427536565', 'Reletive ', '', '', '440394206487', 'null', 'null', 'null', 0);

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
(1, 'super', 'Super Admin', 'super@admin.com', '7894567555', '123', 0, '2024-05-07 12:35:22'),
(2, 'admin', 'admin123', 'admin@admin.com', '7777777777', '123', 1, '2024-05-07 12:37:43'),
(9, 'test', 'test', 'test@gmail.com', '8888888888', '123', 2, '2024-05-07 13:14:30');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `inquiryinfo`
--
ALTER TABLE `inquiryinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
