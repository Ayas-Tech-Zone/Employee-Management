-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2024 at 06:58 PM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u650628273_hr_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `role` varchar(11) NOT NULL,
  `bank_name` text NOT NULL,
  `acc_name` text NOT NULL,
  `acc_no` text NOT NULL,
  `amount` float NOT NULL,
  `total_amount` varchar(150) NOT NULL,
  `app_code` int(11) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` int(11) NOT NULL,
  `admin_user` int(11) NOT NULL,
  `desig` int(11) NOT NULL,
  `incentive` int(11) NOT NULL,
  `salary` float NOT NULL,
  `leavess` int(30) NOT NULL,
  `jdate` date NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role_id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`, `image`, `created_on`, `role`, `bank_name`, `acc_name`, `acc_no`, `amount`, `total_amount`, `app_code`, `created_date_time`, `delete_status`, `admin_user`, `desig`, `incentive`, `salary`, `leavess`, `jdate`, `date`) VALUES
(1, 0, 'mayurik', 'mayuri.infospace@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Mayuri', 'K', 'Female', '', '9529230459', 'India', 'ddsds.jpg', '2018-04-30', 'admin', 'Bank', 'Admin', '1111', 168276, '', 27057, '2024-11-02 15:44:26', 0, 1, 0, 0, 0, 0, '2024-10-02', '2024-10-28'),
(62, 2, '', 'hitesh@gmail.com', '9bbfbd276fe2fde07fd723acdf125d2e2522d8ba3b54720c013125a6087e769b', 'Hitesh', 'Bagul', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-10-28 06:08:52', 0, 0, 0, 0, 14000, 5, '2024-10-01', '2024-10-28'),
(63, 3, '', 'sayali@gmail.com', '8e4f0c5d632cd69e83ae500d6a2ee33880209c316564631b1c50a5ee161d1a90', 'Sayali', 'Patil', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-10-28 06:36:42', 0, 0, 0, 0, 50000, 5, '2024-10-10', '2024-10-28'),
(64, 1, '', 'mayur@gmail.com', 'cbd1ce220af5ae776ef55aa9b03476eb7f7896a42338d74a67d634bc4e6edc40', 'Mayur', 'Mehata', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-10-28 06:10:19', 0, 0, 0, 0, 15000, 5, '2024-10-31', '2024-10-28'),
(65, 3, '', 'nakul@gmail.com', '2508a01a5d64d14cac9be9b61bd88ac5861b14714672faa90e4e72b818d83f0a', 'Nakul', 'Sharma', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-10-28 06:28:13', 0, 0, 0, 0, 4000, 5, '2024-10-24', '2024-10-28'),
(66, 2, '', 'sneha@gmail.com', '7c58dc74cc6c5239201811ec4c974501d27ce8d99a0028990166a8c794325382', 'Sneha', 'Patel', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-10-28 06:29:37', 0, 0, 0, 0, 400, 5, '2024-11-08', '2024-10-28'),
(67, 2, '', 'kavya@gmail.com', 'a298088db584c17791f480107eb2224affbe49510d4d4624cccfe29a35688f04', 'Kavya', 'Reddy', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-10-28 06:30:08', 0, 0, 0, 0, 700, 5, '2024-11-15', '2024-10-28'),
(68, 2, '', 'ananya@gmail.com', '7248bec25f6e0daba8a2ca0fb92d47f858c56ba54109b4b1ec19e2fcb391eda4', 'Ananya', 'Iyer', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-10-28 06:30:35', 0, 0, 0, 0, 1000, 5, '2024-11-09', '2024-10-28'),
(69, 2, '', 'aditya@gmail.com', '57213ef958a23178e4270c79fabf26ce4e72d67875c31acf4b3818f226f92ae4', 'Aditya', 'Rao', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-10-28 06:31:01', 0, 0, 0, 0, 2000, 6, '2024-11-07', '2024-10-28'),
(70, 2, '', 'sudama@gmail.com', '658b4e35370cbcb1e1f6c7131d2c6e3dd90b6280091c35909ffe70979daaf799', 'Sudama', 'Dharmadhikari', '', '', '', '', '', '0000-00-00', 'admin', '', '', '', 0, '', 0, '2024-11-02 15:47:33', 0, 0, 0, 0, 300, 8, '2024-11-02', '2024-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `emp` int(11) NOT NULL,
  `amount` float NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `emp`, `amount`, `month`, `year`, `reason`, `date`, `delete_status`) VALUES
(1, 63, 500, 'October', '2024', 'Personal', '2024-10-28', 0),
(2, 63, 400, 'October', '2024', 'Personal\r\n', '2024-10-28', 0),
(3, 64, 500, 'October', '2024', 'Personal', '2024-10-28', 0),
(4, 69, 2000, 'October', '2024', 'Personal', '2024-10-28', 0),
(5, 65, 500, 'October', '2024', 'For coffee', '2024-10-28', 0),
(6, 70, 500, 'November', '2024', 'for petrol', '2024-11-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `contact`, `address`, `delete_status`) VALUES
(1, 'ttttttttttttttt', 'tttttt@gmail.com ', '3434535 ', 'ttttttttttpt', 1),
(2, 'Danish Surana ', '', '56786545678  ', 'Nashik  ', 0),
(3, 'Sujata Hiray', NULL, '5656554545', 'nashik', 0),
(4, 'Meghraj Dusane', NULL, '7894561236', 'Pune', 0),
(5, 'Manisha Derore', NULL, '7894561236', 'nashik', 0),
(6, 'dsfsdfsdfsd', NULL, NULL, NULL, 0),
(7, 'dsfdsfsdfsdf', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `delete_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `delete_status`) VALUES
(1, 'Leave Manager', 'Manages leaves', 0),
(2, 'Salary ', 'Salary Manager', 0),
(3, 'Borrow Manager', 'Manages borrowe amount', 0);

-- --------------------------------------------------------

--
-- Table structure for table `installement`
--

CREATE TABLE `installement` (
  `id` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `inv_no` varchar(200) NOT NULL,
  `insta_amt` int(100) NOT NULL,
  `due_total` int(11) NOT NULL,
  `ptype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `month` varchar(150) NOT NULL,
  `year` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=paid 2=unpaid',
  `total` int(50) NOT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user`, `month`, `year`, `date`, `type`, `total`, `status`, `remark`, `delete_status`) VALUES
(1, '63', 'October', '2024', '2024-10-01', 2, 5, 1, 'DONE', 0),
(2, '63', 'October', '2024', '2024-10-19', 1, 4, 0, '', 0),
(3, '62', 'October', '2024', '2024-10-03', 2, 5, 1, 'Approved By Admin', 0),
(4, '62', 'October', '2024', '2024-10-31', 1, 4, 0, '', 0),
(5, '69', 'October', '2024', '2024-12-24', 1, 6, 0, '', 0),
(6, '69', 'October', '2024', '2025-01-30', 2, 6, 0, '', 0),
(7, '67', 'October', '2024', '2024-10-02', 2, 5, 0, '', 0),
(8, '65', 'October', '2024', '2025-01-09', 1, 5, 1, 'approced', 0),
(9, '65', 'October', '2024', '2025-03-05', 2, 5, 1, 'Approved', 0),
(10, '70', 'November', '2024', '2024-11-01', 1, 8, 1, 'approved by Mayuri', 0),
(11, '70', 'November', '2024', '2024-11-03', 2, 8, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manage_website`
--

CREATE TABLE `manage_website` (
  `id` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `short_title` varchar(600) NOT NULL,
  `logo` text NOT NULL,
  `footer` text NOT NULL,
  `currency_code` varchar(600) NOT NULL,
  `currency_symbol` varchar(600) NOT NULL,
  `login_logo` text NOT NULL,
  `invoice_logo` text NOT NULL,
  `background_login_image` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manage_website`
--

INSERT INTO `manage_website` (`id`, `title`, `short_title`, `logo`, `footer`, `currency_code`, `currency_symbol`, `login_logo`, `invoice_logo`, `background_login_image`, `status`) VALUES
(1, 'NEXT-EMP BY MAYURI K.', '', 'Lars TRANSPORTS.png', 'Developer', '', 'Rs.', 'Lars TRANSPORTS.png', '', 'Untitled6.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `month`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `operation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `operation`) VALUES
(24, 'Borrow', 'Borrow', 'Borrow'),
(25, 'Leaves', 'Leaves', 'Leaves'),
(26, 'Salary', 'Salary', 'Salary'),
(29, 'User', 'User', 'User'),
(30, 'Role', 'Role', 'Role'),
(31, 'Reports', 'Reports', 'Reports'),
(32, 'Settings', 'Settings', 'Settings'),
(33, 'Author', 'Author', 'Author'),
(34, 'Backup Database', 'Backup Database', 'Backup Database');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(50) NOT NULL,
  `permission_id` int(50) NOT NULL,
  `group_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `group_id`) VALUES
(1, 25, 1),
(2, 25, 2),
(3, 31, 2),
(4, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `emp` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `leave` int(11) NOT NULL,
  `borrow` float NOT NULL,
  `actual` float NOT NULL,
  `final` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp`, `month`, `year`, `leave`, `borrow`, `actual`, `final`, `date`) VALUES
(1, '63', 'October', '2024', 1, 900, 50000, 1499100, '2024-10-28'),
(2, '62', 'October', '2024', 1, 0, 14000, 420000, '2024-10-28'),
(3, '69', 'October', '2024', 0, 2000, 2000, 60000, '2024-10-28'),
(4, '67', 'October', '2024', 0, 0, 700, 21700, '2024-10-28'),
(5, '65', 'October', '2024', 1, 500, 4000, 119500, '2024-10-28'),
(7, '70', 'November', '2024', 0, 500, 300, 8500, '2024-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alerts`
--

CREATE TABLE `tbl_alerts` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_alerts`
--

INSERT INTO `tbl_alerts` (`id`, `code`, `description`, `type`) VALUES
(1, '001', 'Invalid email or password', 'warning'),
(2, '002', 'Settings are updated', 'success'),
(3, '003', 'Record Added Successfully', 'success'),
(4, '004', 'Record Successfully Updated', 'success'),
(5, '005', 'Record Sudccessfully Deleted', 'success'),
(6, '006', 'Class has been registered', 'success'),
(7, '007', 'Class has been deleted', 'success'),
(8, '008', 'Class has been updated', 'success'),
(9, '009', 'Subject has been registered', 'success'),
(10, '010', 'Subject have been deleted', 'success'),
(11, '011', 'Subject has been updated', 'success'),
(12, '012', 'Email address is already registered', 'warning'),
(13, '013', 'Student have been registered', 'success'),
(14, '014', 'Student have been deleted', 'success'),
(15, '015', 'Student have been updated', 'success'),
(16, '016', 'School info has been updated', 'success'),
(17, '017', 'Logo image must be 400 X 400 Pixels', 'warning'),
(18, '018', 'Exam have been registered', 'success'),
(19, '019', 'Enroll number has been deleted', 'success'),
(20, '020', 'Exam has been updated', 'success'),
(21, '021', 'Question has been added', 'success'),
(22, '022', 'Profile have been updated', 'success'),
(23, '023', 'Password has been updated', 'success'),
(24, '024', 'Account was not found', 'danger'),
(25, '025', 'Open your email to continue', 'info'),
(26, '026', 'An error occurred while sending e-mail', 'warning'),
(27, '027', 'Assessment have been re-activated', 'success'),
(28, '028', 'All assessments have been re-acativate', 'success'),
(29, '029', 'Exam have been deleted', 'success'),
(30, '030', 'Notice have been pinned', 'success'),
(31, '031', 'Notice have been deleted', 'success'),
(32, '032', 'Please add some question before activating the exam', 'warning'),
(33, '033', 'Exam has been set active', 'success'),
(34, '034', 'Exam has been set inactive', 'success'),
(35, '035', 'Question has been deleted', 'success'),
(36, '036', 'Question has been updated', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deduct`
--

CREATE TABLE `tbl_deduct` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deduct_quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_deduct`
--

INSERT INTO `tbl_deduct` (`id`, `product_id`, `deduct_quantity`, `date`, `created_date_time`) VALUES
(1, 30, 1, '2024-09-30', '2024-09-30 12:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_config`
--

CREATE TABLE `tbl_email_config` (
  `id` int(21) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int(50) NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL,
  `approvestatus` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `status`, `delete_status`) VALUES
(1, 'ttttttttt', 'Deactive', 1),
(2, 'test', 'Active', 1),
(3, 'Set', 'Active', 0),
(4, 'Pair', 'Active', 0),
(5, 'Piece', 'Active', 0),
(6, 'Meter', 'Active', 0),
(7, '1 Meter', 'Active', 1),
(8, '10 Meter', 'Active', 1),
(9, 'XL', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `year`) VALUES
(1, '2020'),
(2, '2021'),
(3, '2022'),
(4, '2023'),
(5, '2024'),
(6, '2025'),
(7, '2026'),
(8, '2027'),
(9, '2028'),
(10, '2029'),
(11, '2030'),
(12, '2031'),
(13, '2032'),
(14, '2033'),
(15, '2034'),
(16, '2035'),
(17, '2036'),
(18, '2037'),
(19, '2038'),
(20, '2039'),
(21, '2040');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installement`
--
ALTER TABLE `installement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_website`
--
ALTER TABLE `manage_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_deduct`
--
ALTER TABLE `tbl_deduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `installement`
--
ALTER TABLE `installement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manage_website`
--
ALTER TABLE `manage_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_deduct`
--
ALTER TABLE `tbl_deduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
