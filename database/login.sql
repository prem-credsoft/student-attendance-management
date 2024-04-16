-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 09:39 AM
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
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `batch` varchar(50) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `fee_status` enum('Paid','Unpaid') DEFAULT NULL,
  `admission_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `student_name`, `batch`, `father_name`, `mother_name`, `dob`, `gender`, `mobile_number`, `fee_status`, `admission_time`) VALUES
(1, 'fdgdhh', 'bkbkjbk', 'bkjbkbkjbkj', 'bjbjkbkbkjb', '2024-04-24', 'Male', '1234567890', 'Paid', '2024-04-15'),
(2, 'John Doe', '2024A', 'Michael Doe', 'Emily Doe', '2000-05-15', 'Male', '1234567890', 'Paid', '2024-04-01'),
(3, 'Jane Smith', '2024B', 'David Smith', 'Sarah Smith', '2001-08-20', 'Female', '9876543210', 'Unpaid', '2024-04-02'),
(4, 'Robert Johnson', '2024A', 'Steven Johnson', 'Laura Johnson', '1999-12-10', 'Male', '5551112233', 'Paid', '2024-04-03'),
(5, 'Emily Brown', '2024B', 'Christopher Brown', 'Jessica Brown', '2002-03-25', 'Female', '4442229999', 'Unpaid', '2024-04-04'),
(6, 'Michael Wilson', '2024A', 'James Wilson', 'Megan Wilson', '2000-07-08', 'Male', '7778885555', 'Paid', '2024-04-05'),
(7, 'Emma Martinez', '2024B', 'Daniel Martinez', 'Maria Martinez', '2003-01-30', 'Female', '6663334444', 'Unpaid', '2024-04-06'),
(8, 'William Anderson', '2024A', 'Joseph Anderson', 'Samantha Anderson', '1998-10-05', 'Male', '9990001111', 'Paid', '2024-04-07'),
(9, 'Olivia Garcia', '2024B', 'Robert Garcia', 'Jennifer Garcia', '2001-04-18', 'Female', '8887776666', 'Unpaid', '2024-04-08'),
(10, 'James Lee', '2024A', 'Michael Lee', 'Linda Lee', '1999-06-22', 'Male', '2224446666', 'Paid', '2024-04-09'),
(11, 'Sophia Rodriguez', '2024B', 'Richard Rodriguez', 'Patricia Rodriguez', '2002-09-12', 'Female', '1113335555', 'Unpaid', '2024-04-10'),
(12, 'Benjamin Nguyen', '2024A', 'David Nguyen', 'Barbara Nguyen', '2000-01-05', 'Male', '6667778888', 'Paid', '2024-04-11'),
(13, 'Isabella Hernandez', '2024B', 'William Hernandez', 'Susan Hernandez', '2003-06-28', 'Female', '3335557777', 'Unpaid', '2024-04-12'),
(14, 'Ethan Smith', '2024A', 'John Smith', 'Karen Smith', '1998-04-02', 'Male', '9991113333', 'Paid', '2024-04-13'),
(15, 'Mia Kim', '2024B', 'Matthew Kim', 'Donna Kim', '2001-11-15', 'Female', '8882224444', 'Unpaid', '2024-04-14'),
(16, 'Daniel Chen', '2024A', 'Christopher Chen', 'Lisa Chen', '1999-02-20', 'Male', '7774441111', 'Paid', '2024-04-15'),
(17, 'Ava Patel', '2024B', 'Joseph Patel', 'Helen Patel', '2002-07-05', 'Female', '6663332222', 'Unpaid', '2024-04-16'),
(18, 'Alexander Brown', '2024A', 'Daniel Brown', 'Nancy Brown', '1998-09-10', 'Male', '5558887777', 'Paid', '2024-04-17'),
(19, 'Charlotte Khan', '2024B', 'Andrew Khan', 'Dorothy Khan', '2001-12-23', 'Female', '4449993333', 'Unpaid', '2024-04-18'),
(20, 'Matthew Wu', '2024A', 'Kevin Wu', 'Margaret Wu', '2000-03-17', 'Male', '1117779999', 'Paid', '2024-04-19'),
(21, 'Amelia Martinez', '2024B', 'Steven Martinez', 'Sandra Martinez', '2003-08-07', 'Female', '2228887777', 'Unpaid', '2024-04-20'),
(22, 'Michael Taylor', '2024A', 'Timothy Taylor', 'Betty Taylor', '1999-05-29', 'Male', '3330004444', 'Paid', '2024-04-21'),
(23, 'Lily Kim', '2024B', 'George Kim', 'Carol Kim', '2002-10-14', 'Female', '5551117777', 'Unpaid', '2024-04-22'),
(24, 'David Garcia', '2024A', 'Edward Garcia', 'Sharon Garcia', '1998-08-18', 'Male', '7772224444', 'Paid', '2024-04-23'),
(25, 'Sophia Wang', '2024B', 'Brian Wang', 'Michelle Wang', '2001-02-03', 'Female', '9995553333', 'Unpaid', '2024-04-24'),
(26, 'James Martinez', '2024A', 'Ronald Martinez', 'Laura Martinez', '2000-04-27', 'Male', '8884442222', 'Paid', '2024-04-25'),
(27, 'Emily Lee', '2024B', 'Kenneth Lee', 'Kimberly Lee', '2003-09-09', 'Female', '7773331111', 'Unpaid', '2024-04-26'),
(28, 'Alexander Rodriguez', '2024A', 'Anthony Rodriguez', 'Deborah Rodriguez', '1999-01-13', 'Male', '6669998888', 'Paid', '2024-04-27'),
(29, 'Chloe Khan', '2024B', 'Peter Khan', 'Theresa Khan', '2002-06-06', 'Female', '5556667777', 'Unpaid', '2024-04-28'),
(30, 'William Nguyen', '2024A', 'Jerry Nguyen', 'Gloria Nguyen', '1998-11-30', 'Male', '4443332222', 'Paid', '2024-04-29'),
(31, 'Grace Kim', '2024B', 'Ralph Kim', 'Anna Kim', '2001-05-17', 'Female', '3332221111', 'Unpaid', '2024-04-30'),
(32, 'Daniel Lee', '2024A', 'Harry Lee', 'Martha Lee', '2000-08-10', 'Male', '2221114444', 'Paid', '2024-05-01'),
(33, 'Avery Patel', '2024B', 'Bobby Patel', 'Jane Patel', '2003-01-02', 'Female', '1110003333', 'Unpaid', '2024-05-02'),
(34, 'Olivia Lopez', '2024A', 'Carl Lopez', 'Diane Lopez', '1999-03-26', 'Male', '9994446666', 'Paid', '2024-05-03'),
(35, 'Logan Chen', '2024B', 'Gary Chen', 'Julie Chen', '2002-08-18', 'Female', '8885557777', 'Unpaid', '2024-05-04'),
(36, 'Lucas Brown', '2024A', 'Philip Brown', 'Marilyn Brown', '1998-12-14', 'Male', '7773339999', 'Paid', '2024-05-05'),
(37, 'Harper Khan', '2024B', 'Nicholas Khan', 'Virginia Khan', '2001-07-01', 'Female', '6662228888', 'Unpaid', '2024-05-06'),
(38, 'Jackson Wu', '2024A', 'Mark Wu', 'Angela Wu', '2000-02-22', 'Male', '5554446666', 'Paid', '2024-05-07'),
(39, 'Ella Martinez', '2024B', 'Albert Martinez', 'Frances Martinez', '2003-04-16', 'Female', '4443332222', 'Unpaid', '2024-05-08'),
(40, 'Penelope Taylor', '2024A', 'Terry Taylor', 'Louise Taylor', '1999-06-09', 'Male', '3332224444', 'Paid', '2024-05-09'),
(41, 'Lincoln Kim', '2024B', 'Leroy Kim', 'Judith Kim', '2002-11-03', 'Female', '2221113333', 'Unpaid', '2024-05-10'),
(42, 'Henry Garcia', '2024A', 'Harold Garcia', 'Catherine Garcia', '1998-10-27', 'Male', '1110002222', 'Paid', '2024-05-11'),
(43, 'Stella Wang', '2024B', 'Ernest Wang', 'Shirley Wang', '2001-03-21', 'Female', '9998887777', 'Unpaid', '2024-05-12'),
(44, 'Samuel Martinez', '2024A', 'Bradley Martinez', 'Evelyn Martinez', '2000-05-15', 'Male', '8887776666', 'Paid', '2024-05-13'),
(45, 'Natalie Lee', '2024B', 'Norman Lee', 'Rose Lee', '2003-09-09', 'Female', '7776665555', 'Unpaid', '2024-05-14'),
(46, 'Luke Rodriguez', '2024A', 'Allan Rodriguez', 'Thelma Rodriguez', '1999-01-31', 'Male', '6665554444', 'Paid', '2024-05-15'),
(47, 'Hannah Khan', '2024B', 'Clarence Khan', 'Wanda Khan', '2002-06-24', 'Female', '5554443333', 'Unpaid', '2024-05-16'),
(48, 'Jack Nguyen', '2024A', 'Gregory Nguyen', 'Edna Nguyen', '1998-11-18', 'Male', '4443332222', 'Paid', '2024-05-17'),
(49, 'Liam Kim', '2024B', 'Frank Kim', 'Grace Kim', '2001-05-12', 'Female', '3332221111', 'Unpaid', '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@admin.com'),
(2, 'prem', 'prem', 'prem@gmail.com');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
