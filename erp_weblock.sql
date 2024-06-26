-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 05:55 AM
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
-- Database: `erp_weblock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `email`, `password`) VALUES
(1, 'Weblock', 'weblock@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcementId` int(11) NOT NULL,
  `type` varchar(56) NOT NULL,
  `title` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `announcement_date` date DEFAULT NULL,
  `announcement_docs` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcementId`, `type`, `title`, `message`, `announcement_date`, `announcement_docs`, `dateTime`) VALUES
(1, 'holiday', 'holi day holiday', 'holi kab hai?', '2024-03-25', '[\"1707542583256_35kb.jpg\"]', '2024-02-10 10:53:03'),
(2, 'event', 'manali trip', 'get ready', NULL, '[\"1707542625864_35kb.jpg\",\"1707542625864_500kb.jpeg\"]', '2024-02-10 10:53:45'),
(3, 'event', 'manali trip', 'get ready', NULL, '[\"1707543835640_35kb.jpg\",\"1707543835640_500kb.jpeg\"]', '2024-02-10 11:13:55'),
(9, 'holiday', 'monday', 'monday', NULL, '[]', '2024-02-28 14:59:39'),
(17, 'event', 'rwerereer', 'rtrrrerwerwrr', NULL, '[]', '2024-02-28 15:57:08'),
(18, 'holiday', 'monday', 'monday', '2004-05-22', '[]', '2024-02-29 15:13:28'),
(19, 'holiday', 'holi', 'happy holi!!!!!!', '2024-03-22', '[]', '2024-03-01 12:28:06'),
(20, 'holiday', 'gandhi jayanti', 'holiday cance;', '2024-10-02', '[\"1709889762903_500kb.jpeg\"]', '2024-03-01 12:29:39'),
(21, 'holiday', 'sardar jayanti', 'panji gaye the', '2024-10-02', '[]', '2024-03-08 14:50:59'),
(24, 'holiday', 'holi', 'Happy holi', '2024-03-10', '[\"1709889684569_35kb.jpg\"]', '2024-03-11 00:00:00'),
(25, 'trip', 'Trip', 'Trip to manali', '2024-03-31', '[\"1710220514608_DECLARATION.jpg\"]', '2024-03-12 10:45:14'),
(26, 'trip', 'Trip', 'Trip to manali', '2024-03-31', '[]', '2024-03-12 15:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `attendenceId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `clockIn` time NOT NULL,
  `clockOut` time NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`attendenceId`, `employeeId`, `Date`, `clockIn`, `clockOut`, `dateTime`) VALUES
(1001, 101, '2024-02-06', '08:00:00', '17:00:00', '2024-02-06 17:00:00'),
(1002, 102, '2024-02-06', '09:00:00', '11:18:41', '2024-02-06 18:30:00'),
(1003, 102, '2024-02-07', '09:00:00', '11:18:41', '2024-02-06 18:30:00'),
(1006, 111, '2024-02-06', '16:49:48', '11:08:33', '2024-02-06 16:49:48'),
(1018, 102, '2024-02-20', '09:00:00', '11:18:41', '2024-02-20 13:23:40'),
(1020, 102, '2024-03-02', '09:00:00', '11:18:41', '2024-03-02 11:19:02'),
(1021, 118, '2024-03-06', '17:25:59', '17:29:25', '2024-03-06 17:33:05'),
(1022, 114, '2024-03-11', '10:14:36', '00:00:00', '2024-03-11 11:33:41'),
(1023, 117, '2024-03-11', '10:14:36', '11:45:10', '2024-03-11 11:33:47'),
(1024, 118, '2024-03-11', '10:14:36', '17:29:25', '2024-03-11 11:33:56'),
(1025, 118, '2024-03-12', '10:14:36', '17:29:25', '2024-03-11 11:33:56'),
(1029, 103, '2024-03-18', '09:00:00', '18:00:00', '2024-03-18 11:28:37'),
(1030, 107, '2024-03-18', '09:16:00', '11:42:11', '2024-03-18 11:43:15'),
(1031, 103, '2024-03-19', '09:00:00', '18:00:00', '2024-03-19 09:33:36'),
(1032, 107, '2024-03-19', '09:16:00', '11:42:11', '2024-03-19 09:39:05'),
(1033, 118, '2024-03-19', '10:05:38', '17:29:25', '2024-03-19 10:06:27'),
(1034, 117, '2024-03-19', '14:19:08', '11:45:10', '2024-03-19 14:19:08'),
(1035, 103, '2024-03-19', '09:00:00', '18:00:00', '2024-03-19 17:54:34'),
(1036, 103, '2024-03-20', '09:00:00', '18:00:00', '2024-03-20 09:09:02'),
(1037, 107, '2024-03-20', '09:16:00', '11:42:11', '2024-03-20 10:30:51'),
(1038, 103, '2024-03-20', '09:00:00', '18:00:00', '2024-03-20 11:19:32'),
(1039, 103, '2024-03-21', '09:00:00', '18:00:00', '2024-03-21 09:36:09'),
(1040, 107, '2024-03-21', '09:16:00', '11:42:11', '2024-03-21 10:47:50'),
(1041, 103, '2024-03-22', '09:02:00', '17:56:00', '2024-03-22 09:16:19'),
(1042, 107, '2024-03-22', '09:16:00', '11:42:11', '2024-03-22 11:38:27'),
(1043, 117, '2024-03-22', '11:44:45', '11:45:10', '2024-03-22 11:44:45'),
(1044, 118, '2024-03-22', '17:29:04', '17:29:25', '2024-03-22 17:29:04'),
(1045, 102, '2024-03-22', '17:30:51', '17:31:09', '2024-03-22 17:30:51'),
(1046, 103, '2024-03-26', '09:16:34', '18:01:00', '2024-03-26 09:16:34'),
(1047, 103, '2024-03-27', '10:23:35', '16:40:50', '2024-03-27 10:23:35'),
(1048, 107, '2024-03-27', '11:30:28', '00:00:00', '2024-03-27 11:30:28'),
(1049, 118, '2024-03-27', '16:40:16', '16:40:26', '2024-03-27 16:40:16'),
(1050, 103, '2024-03-28', '09:07:08', '17:54:33', '2024-03-28 09:07:08'),
(1051, 103, '2024-03-29', '09:05:24', '00:00:00', '2024-03-29 09:05:24'),
(1052, 107, '2024-03-29', '09:58:53', '09:59:03', '2024-03-29 09:58:53'),
(1053, 118, '2024-03-29', '09:59:14', '09:59:22', '2024-03-29 09:59:14'),
(1054, 117, '2024-03-29', '09:59:33', '09:59:41', '2024-03-29 09:59:33'),
(1055, 114, '2024-03-29', '10:00:18', '10:00:22', '2024-03-29 10:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `breaks`
--

CREATE TABLE `breaks` (
  `breakId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `breakStart` time NOT NULL,
  `breakEnd` time NOT NULL DEFAULT '00:00:00',
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breaks`
--

INSERT INTO `breaks` (`breakId`, `employeeId`, `Date`, `breakStart`, `breakEnd`, `dateTime`) VALUES
(1, 145, '2024-02-06', '17:51:19', '00:00:00', '2024-02-06 17:51:19'),
(2, 105, '2024-02-06', '17:51:43', '17:52:40', '2024-02-06 17:51:43'),
(3, 120, '2024-02-06', '17:54:44', '17:55:04', '2024-02-06 17:54:44'),
(4, 111, '2024-02-06', '17:55:22', '17:55:39', '2024-02-06 17:55:22'),
(5, 111, '2024-02-06', '17:55:54', '17:56:07', '2024-02-06 17:55:54'),
(6, 123, '2024-02-09', '17:55:45', '17:57:00', '2024-02-09 17:55:45'),
(7, 144, '2024-02-09', '17:57:29', '00:00:00', '2024-02-09 17:57:29'),
(8, 103, '2024-03-19', '14:02:45', '14:02:45', '2024-03-19 14:04:29'),
(9, 103, '2024-03-19', '14:16:37', '14:16:50', '2024-03-19 14:16:37'),
(10, 103, '2024-03-19', '17:50:27', '17:50:38', '2024-03-19 17:50:27'),
(11, 103, '2024-03-19', '17:55:00', '17:55:17', '2024-03-19 17:55:00'),
(12, 103, '2024-03-20', '10:39:10', '10:42:22', '2024-03-20 10:39:10'),
(13, 107, '2024-03-20', '11:17:13', '11:17:23', '2024-03-20 11:17:13'),
(14, 103, '2024-03-21', '10:41:23', '10:42:03', '2024-03-21 10:41:23'),
(15, 103, '2024-03-26', '14:48:34', '14:50:16', '2024-03-26 14:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `companyEmail` varchar(56) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `mobileNumber` varchar(12) NOT NULL,
  `altmobileNumber` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joining` date NOT NULL,
  `designation` varchar(100) NOT NULL,
  `ExperienceType` varchar(56) NOT NULL,
  `salarySlip` text NOT NULL,
  `experienceLetter` text NOT NULL,
  `profilePic` text NOT NULL,
  `salary` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeId`, `name`, `email`, `companyEmail`, `password`, `gender`, `marital_status`, `mobileNumber`, `altmobileNumber`, `address`, `date_of_birth`, `date_of_joining`, `designation`, `ExperienceType`, `salarySlip`, `experienceLetter`, `profilePic`, `salary`, `dateTime`) VALUES
(102, 'Avani', 'avani@gmail.com', 'mt@weblock.com', '123', 'M', 'married', '88888888', '84834993', 'surat', '2003-10-01', '2023-10-01', 'senior developer', 'exp', '1709723707565_500kb.jpeg', '1709723707566_500kb.jpeg', '1709723742834_500kb.jpeg', 655000, '2024-02-01 10:11:54'),
(103, 'Mitesh', 'mitesh@gmail.com', 'urvashi@weblock.com', '123', 'Male', 'Unmarried', '9485632145', '22222', 'surat,Guj', '2002-01-01', '2024-01-01', 'developer', 'Fresher', 'salarySlip-20000', 'experienceLetter-2yr', '1707381975259_35kb.jpg', 42000, '0000-00-00 00:00:00'),
(107, 'prutha', 'prutha@gmail.com', 'prutha@gmail.com', '123', 'Female', 'Unmarried', '9856231545', '66666', 'sanfransisco', '2004-04-04', '2003-10-10', 'frontend', 'Fresher', '1707386238617_sign.jpg', 'experienceLetter-1yr', '1707385464446_500kb.jpeg', 20000, '2024-02-01 10:11:54'),
(114, 'urvashi', 'urvashi@gmail.com', 'urvashi@weblock.com', '123', 'F', 'M', '8888', '99999', 'surat', '0000-00-00', '0000-00-00', 'developer', 'fresher', '', '', '1707462192747_35kb.jpg', 6565656, '2024-02-09 12:33:12'),
(117, 'viken', 'viken@gmail.com', 'viken@gmail.com', '123', 'F', 'M', '8888', '99999', 'mumbai', '0000-00-00', '0000-00-00', 'developer', 'fresher', '1707475198200_ACPC_krishna.pdf', '1707475198209_birth_certy.pdf', '1707475198210_DECLARATION.jpg', 6565656, '2024-02-09 16:09:58'),
(118, 'Bansi', 'bansi@gmail.com', 'bansi@gmail.com', '123', 'Female', 'Unmarried', '8888', '99999', 'surat', '2003-08-19', '2023-06-01', 'Ui/UX', 'Fresher', '', '', '1710828678669_Group 128.jpg', 6565656, '2024-02-09 16:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `employeeprojects`
--

CREATE TABLE `employeeprojects` (
  `employeeProjectsId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeeprojects`
--

INSERT INTO `employeeprojects` (`employeeProjectsId`, `employeeId`, `projectId`, `DateTime`) VALUES
(1, 101, 25, '2024-02-10 17:02:17'),
(2, 105, 26, '2024-02-10 17:03:01'),
(3, 105, 29, '2024-02-10 17:07:17'),
(4, 106, 29, '2024-02-10 17:07:17'),
(5, 111, 30, '2024-02-10 17:07:53'),
(6, 112, 30, '2024-02-10 17:07:53'),
(7, 144, 31, '2024-02-10 17:09:14'),
(8, 145, 31, '2024-02-10 17:09:14'),
(9, 144, 32, '2024-02-10 17:13:04'),
(13, 107, 34, '2024-03-06 14:32:16'),
(14, 117, 34, '2024-03-06 14:32:16'),
(15, 118, 34, '2024-03-06 14:32:16'),
(16, 107, 35, '2024-03-06 14:34:12'),
(17, 117, 35, '2024-03-06 14:34:12'),
(18, 118, 35, '2024-03-06 14:34:12'),
(19, 102, 36, '2024-03-08 09:56:11'),
(20, 103, 36, '2024-03-08 09:56:11'),
(21, 118, 36, '2024-03-08 09:56:11'),
(22, 102, 37, '2024-03-08 10:03:29'),
(23, 103, 37, '2024-03-08 10:03:29'),
(24, 118, 37, '2024-03-08 10:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee_document`
--

CREATE TABLE `employee_document` (
  `document_id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `passbook` text NOT NULL,
  `aadharcard` text NOT NULL,
  `pancard` text NOT NULL,
  `voterId` text NOT NULL,
  `drivingLiscence` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_document`
--

INSERT INTO `employee_document` (`document_id`, `employeeId`, `passbook`, `aadharcard`, `pancard`, `voterId`, `drivingLiscence`, `datetime`) VALUES
(4, 119, '1709372032802_birth_certy.pdf', '1709372032802_ACPC_krishna.pdf', '1709372032804_500kb.jpeg', '', '', '2024-03-02 15:03:52'),
(5, 119, '1709372405019_birth_certy.pdf', '1709372405021_ACPC_krishna.pdf', '1709372405023_500kb.jpeg', '', '', '2024-03-02 15:10:05'),
(6, 102, '1709381917387_35kb.jpg', '1709381917387_35kb.jpg', '1709381917389_35kb.jpg', '1709381917389_35kb.jpg', '1709381917390_35kb.jpg', '2024-03-02 15:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `employee_education`
--

CREATE TABLE `employee_education` (
  `educationId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `degreeName` varchar(100) NOT NULL,
  `passingYear` year(4) NOT NULL,
  `percentage` float NOT NULL,
  `degreeCertificate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_education`
--

INSERT INTO `employee_education` (`educationId`, `employeeId`, `degreeName`, `passingYear`, `percentage`, `degreeCertificate`) VALUES
(1, 102, 'BE in information tech', '2024', 84, '1706863343877_birth_certy.pdf'),
(2, 103, 'BE in information tech', '2024', 84, '1707475431850_DECLARATION.jpg'),
(3, 107, 'BE in information tech', '2024', 84, '1707475454155_AdmitCard S1.pdf'),
(5, 114, 'BCA', '2023', 33, '1709380900541_35kb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `holidayId` int(11) NOT NULL,
  `holidayType` varchar(56) NOT NULL,
  `holidayName` varchar(56) NOT NULL,
  `holidayDescription` text NOT NULL,
  `holidayDate` date NOT NULL,
  `holidayDocs` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`holidayId`, `holidayType`, `holidayName`, `holidayDescription`, `holidayDate`, `holidayDocs`, `dateTime`) VALUES
(16, 'weekend', 'weekend', 'fddg', '2024-03-23', '[\"1710846897100_Group 128.jpg\"]', '2024-03-19 12:52:48'),
(19, 'holiday', 'Duleti', 'Happy Dhuleti', '2024-03-25', '[\"1710846456886_Group 128.jpg\"]', '2024-03-19 16:37:36'),
(22, 'weekend', 'weekend', 'Weekend', '2024-03-30', '[\"1711687786782_Screenshot 2024-03-07 162759.png\"]', '2024-03-29 10:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leaveId` int(11) NOT NULL,
  `empId` int(11) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'pending',
  `leaveType` varchar(56) NOT NULL,
  `noOfDays` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reason` text NOT NULL,
  `leave_doc` text NOT NULL,
  `dateTime` int(11) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leaveId`, `empId`, `status`, `leaveType`, `noOfDays`, `startDate`, `endDate`, `reason`, `leave_doc`, `dateTime`) VALUES
(1, 101, 'approve', 'full-day', 3, '0000-00-00', '0000-00-00', 'marraige', '1707129374183_35kb.jpg', 0),
(2, 101, 'approve', 'full-day', 3, '2024-01-10', '2024-02-13', 'marraige', '1707129439906_35kb.jpg', 0),
(3, 118, 'approve', 'half-day-2', 0, '2024-03-30', '2024-03-30', 'passport', '1707131112494_birth_certy.pdf', 0),
(7, 118, 'approve', 'Full Day', 5, '2024-03-16', '2024-03-20', 'marriage', '1708417992978_favicon.png', 0),
(8, 102, 'reject', 'half-day-2', 10, '2024-01-10', '2024-01-10', 'passport', '', 0),
(9, 102, 'reject', 'half-day-2', 10, '2024-01-10', '2024-01-10', 'passport', '', 2147483647),
(10, 102, 'approve', 'half-day-2', 10, '2024-01-10', '2024-01-10', 'passport', '', 2147483647),
(11, 103, 'approve', 'half-day-2', 10, '2024-01-10', '2024-01-10', 'passport', '', 2147483647),
(12, 103, 'approve', 'Full Day', 5, '2024-04-02', '2024-04-06', 'mg', '1710743399413_favicon.png', 2147483647),
(13, 103, 'approve', 'Full Day', 1, '2024-03-27', '2024-03-27', 'f', '1710743448631_favicon.png', 2147483647),
(14, 103, 'reject', 'Full Day', 1, '2024-03-28', '2024-03-28', 'e', '1711099889866_favicon.png', 2147483647),
(15, 103, 'reject', 'Full Day', 1, '2024-03-27', '2024-03-27', 'eftrewt', '1711100506578_favicon.png', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationsId` int(11) NOT NULL,
  `notificationFrom` varchar(11) NOT NULL,
  `fromId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `notificationTo` varchar(11) NOT NULL,
  `hasRead` tinyint(1) NOT NULL DEFAULT 0,
  `notificationType` varchar(11) NOT NULL,
  `notificationTitle` varchar(56) NOT NULL,
  `notificationBody` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationsId`, `notificationFrom`, `fromId`, `toId`, `notificationTo`, `hasRead`, `notificationType`, `notificationTitle`, `notificationBody`, `datetime`) VALUES
(1, 'admin', 0, 0, 'employee', 1, 'leave', 'need leave', 'for dates', '2024-03-21 15:48:34'),
(2, 'admin', 1, 102, 'employee', 1, 'leave', 'need leave', 'for dates', '2024-03-21 15:51:46'),
(3, 'employee', 102, 1, 'admin', 0, 'leave2', 'need leave of 2 days', 'for dates', '2024-03-21 16:58:20'),
(4, 'employee', 102, 1, 'admin', 0, 'leave2', 'need leave of 2 days', 'for dates', '2024-03-21 17:05:55'),
(5, 'admin', 1, 118, 'employee', 0, 'meet me', 'need leave of 2 days', 'for dates', '2024-03-21 17:11:40'),
(6, 'admin', 1, 118, 'employee', 0, 'meet me', 'need leave of 2 days', 'for dates', '2024-03-22 15:01:29'),
(7, 'admin', 1, 103, 'employee', 0, 'Leave', 'Full Day', 'eftrewt', '2024-03-22 15:11:46'),
(8, 'employee', 103, 1, 'admin', 0, 'clocktime', '09:02', 'edsfedsf', '2024-03-22 15:15:44'),
(9, 'employee', 103, 1, 'admin', 0, 'update_empl', 'Changes Names', 'Changes Names', '2024-03-22 15:27:00'),
(10, 'employee', 103, 1, 'admin', 0, 'update_empl', 'Change in Date Of Birth', 'Change in Date Of Birth', '2024-03-22 15:27:00'),
(11, 'employee', 103, 1, 'admin', 0, 'update_empl', 'Change in Date of Joining', 'Change in Date of Joining', '2024-03-22 15:27:00'),
(12, 'employee', 103, 1, 'admin', 0, 'update_empl', 'Changes Names', 'Mitesh Meghani', '2024-03-22 15:27:43'),
(13, 'employee', 103, 1, 'admin', 0, 'update_empl', 'Change in Date Of Birth', '2002-01-01', '2024-03-22 15:27:43'),
(14, 'employee', 103, 1, 'admin', 0, 'update_empl', 'Change in Date of Joining', '2024-01-01', '2024-03-22 15:27:43'),
(15, 'employee', 103, 1, 'admin', 0, 'google', 'Tanishque', 'done', '2024-03-22 16:03:33'),
(16, 'employee', 103, 1, 'admin', 0, 'clocktime', '', 'efwstg', '2024-03-22 17:31:51'),
(17, 'employee', 103, 1, 'admin', 0, 'clocktime', '', 'efs', '2024-03-22 17:32:28'),
(18, 'employee', 103, 1, 'admin', 0, 'clocktime', '09:32', 'esfa', '2024-03-22 17:32:47'),
(19, 'admin', 1, 51, 'employee', 0, 'Attendance', 'Attendance Request', 'approve', '2024-03-22 17:33:47'),
(20, 'admin', 1, 44, 'employee', 0, 'Attendance', 'Attendance Request', 'approve', '2024-03-22 17:34:25'),
(21, 'employee', 103, 1, 'admin', 0, 'clocktime', '', 'clock out', '2024-03-27 09:01:54'),
(22, 'admin', 1, 54, 'employee', 0, 'Attendance', 'Attendance Request', 'approve', '2024-03-27 09:02:10'),
(23, 'admin', 1, 53, 'employee', 0, 'Attendance', 'Attendance Request', 'reject', '2024-03-27 15:18:37'),
(24, 'admin', 1, 52, 'employee', 0, 'Attendance', 'Attendance Request', 'reject', '2024-03-27 15:18:39'),
(25, 'admin', 1, 50, 'employee', 0, 'Profile', 'Profile Request', 'reject', '2024-03-27 15:18:48'),
(26, 'admin', 1, 49, 'employee', 0, 'Profile', 'Profile Request', 'reject', '2024-03-27 15:18:50'),
(27, 'admin', 1, 47, 'employee', 0, 'Profile', 'Profile Request', 'reject', '2024-03-27 15:18:53'),
(28, 'admin', 1, 46, 'employee', 0, 'Profile', 'Profile Request', 'reject', '2024-03-27 15:18:55'),
(29, 'admin', 1, 0, 'employee', 0, 'notify', 'hello', 'edgf', '2024-03-27 15:37:19'),
(30, 'admin', 1, 0, 'employee', 0, 'notify', 'hello', 'sdf', '2024-03-27 15:39:04'),
(31, 'employee', 103, 1, 'admin', 0, 'clocktime', '', 'tgh', '2024-03-28 10:34:51'),
(32, 'admin', 1, 55, 'employee', 0, 'Attendance', 'Attendance Request', 'approve', '2024-03-28 10:35:01'),
(33, 'admin', 1, 15, 'employee', 0, 'Leave', 'Leave Request', 'reject', '2024-03-29 09:58:07'),
(34, 'admin', 1, 14, 'employee', 0, 'Leave', 'Leave Request', 'reject', '2024-03-29 09:58:09'),
(35, 'admin', 1, 48, 'employee', 0, 'Profile', 'Profile Request', 'reject', '2024-03-29 09:58:25'),
(36, 'admin', 1, 45, 'employee', 0, 'Profile', 'Profile Request', 'reject', '2024-03-29 09:58:27'),
(37, 'admin', 1, 0, 'employee', 0, 'holiday', 'weekend', 'Weekend', '2024-03-29 10:09:56'),
(38, 'admin', 1, 0, 'employee', 0, 'holiday', 'weekend', 'Weekend', '2024-03-29 10:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `policyId` int(11) NOT NULL,
  `policyName` varchar(128) NOT NULL,
  `policyDescription` text NOT NULL,
  `policyViolation` varchar(56) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`policyId`, `policyName`, `policyDescription`, `policyViolation`, `dateTime`) VALUES
(1, 'in time', '9:00 AM', 'salary cut of half day', '2024-03-12 10:51:17'),
(2, 'in time', '9:10 AM', 'same', '2024-03-12 11:03:40'),
(3, 'In time', '9:00 PM', 'salary cut of half day', '2024-03-12 11:04:35'),
(6, 'lunch time', '1:00 PM', 'salary cut of next day', '2024-03-12 11:09:53'),
(30, 'policy 1', 'policy dics', 'violation', '2024-03-15 17:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectId` int(11) NOT NULL,
  `ProjectName` varchar(255) NOT NULL,
  `projectDescription` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `participants` text NOT NULL,
  `totalTasks` int(10) NOT NULL,
  `completedTasks` int(10) NOT NULL DEFAULT 0,
  `projectDocs` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectId`, `ProjectName`, `projectDescription`, `startDate`, `endDate`, `participants`, `totalTasks`, `completedTasks`, `projectDocs`, `dateTime`, `status`) VALUES
(1, 'fiscal', 'trading', '2024-01-01', '2024-11-30', '[\"102\",\"103\"]', 12, 7, '[\"1709107379627_products_photos.sql\"]', '0000-00-00 00:00:00', ''),
(2, 'fiscal', 'trading', '2024-01-01', '2024-01-01', '[1,2,3]', 35, 7, '[\"public\\\\project_docs\\\\1707108116960-birth_certy.pdf\",\"public\\\\project_docs\\\\1707108116961-ACPC_krishna.pdf\"]', '0000-00-00 00:00:00', ''),
(3, 'fiscal', 'trading', '2024-01-01', '2024-01-01', '[1,2,3]', 35, 7, '[\"public\\\\project_docs\\\\1707108139502-birth_certy.pdf\",\"public\\\\project_docs\\\\1707108139504-ACPC_krishna.pdf\"]', '0000-00-00 00:00:00', ''),
(4, 'jagdish', 'trading', '2024-01-01', '2024-01-01', '[101,102,103]', 10, 2, '[\"1707108481108-GUJCET PAYMENT.pdf\",\"1707108481111-soji_resume.pdf\"]', '0000-00-00 00:00:00', ''),
(5, 'fiscal', 'share market trading', '2024-01-01', '2024-01-01', '[101,102,103,105]', 10, 2, '[\"1707109179302_35kb.jpg\",\"1707109179304_500kb.jpeg\"]', '0000-00-00 00:00:00', ''),
(6, 'fiscal', 'share market trading', '2024-01-01', '2024-01-01', '[101,102,103,105]', 10, 0, '[]', '2024-02-09 16:29:58', ''),
(7, 'fiscal', 'share market trading', '2024-01-01', '2024-01-01', '[101,102,103,105]', 10, 0, '[\"1707476454601_ACPC_krishna.pdf\",\"1707476454609_krishna-LC_100kb.pdf\",\"1707476454622_500kb.jpeg\"]', '2024-02-09 16:30:54', ''),
(30, 'pormmfiscal', 'neowow', '2024-01-01', '2024-01-01', '111,112', 10, 0, '[]', '2024-02-10 17:07:53', 'delayed'),
(31, 'pormmfiscal', 'neowow', '2024-01-01', '2024-01-01', '144,145', 10, 7, '[]', '2024-02-10 17:09:14', 'done'),
(34, 'Shallwe', 'this is shallwe', '2024-01-01', '2024-03-01', '107,117,118', 10, 2, '[]', '2024-03-06 14:32:16', 'running'),
(35, 'Shallwe', 'this is shallwe', '2024-01-01', '2024-03-01', '107,117,118', 10, 0, '[]', '2024-03-06 14:34:12', 'running'),
(36, 'ambani', 'no change', '2024-03-01', '2024-03-02', '102,103,117', 55, 1, '[]', '2024-03-08 09:56:11', 'Delayed'),
(37, 'Tanishque', 'CV', '2024-03-01', '2024-04-01', '102,103,118', 10, 5, '[\"1709872409119_500kb.jpeg\"]', '2024-03-08 10:03:29', 'running');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `requestId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `type` varchar(56) NOT NULL,
  `description` text NOT NULL,
  `keyname` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `status` varchar(56) NOT NULL DEFAULT 'pending',
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`requestId`, `employeeId`, `type`, `description`, `keyname`, `value`, `status`, `dateTime`, `Date`) VALUES
(1, 111, 'clocktime', 'forgot to clockin', 'new_time', '09:15:00', 'approve', '2024-02-08 10:50:38', NULL),
(2, 111, 'clocktime', 'forgot to clockin', 'new_time', '20:41', 'reject', '2024-02-08 10:55:50', NULL),
(3, 111, 'update_employee', 'new mobile number', 'mobile', '5555555555', 'reject', '2024-02-08 10:57:54', NULL),
(5, 111, 'update_employee', 'new profile photo', 'profilePic', '1707370313264_35kb.jpg', 'reject', '2024-02-08 11:01:53', NULL),
(12, 111, 'update_employee', 'new profile pic', 'profilePic', '1707539377555_35kb.jpg', 'reject', '2024-02-10 09:59:37', NULL),
(14, 102, 'clocktime', 'forgot', 'clockIn', '09:00', 'reject', '2024-02-20 17:41:05', NULL),
(15, 102, 'clocktime', 'outside so can not clock out', 'clockOut', '20:41', 'reject', '2024-02-20 17:41:26', NULL),
(16, 116, 'update_employee', 'change adress', 'address', 'mumbai', 'reject', '2024-02-29 16:25:13', NULL),
(20, 117, 'update_employee', 'change designation', 'designation', 'manager', 'reject', '2024-03-15 12:49:24', NULL),
(21, 118, 'update_employee', 'change designation', '2024-03-11', 'designation', 'reject', '2024-03-21 12:31:55', NULL),
(22, 118, 'update_employee', 'change designation', 'designation', 'manager', 'reject', '2024-03-21 12:39:46', '2024-03-11'),
(23, 102, 'update_employee', 'change profile pic', 'profilePic', '1711005068881_birth_certy.pdf', 'reject', '2024-03-21 12:41:08', '0000-00-00'),
(24, 102, 'update_employee', 'change profile pic', 'profilePic', '1711005156505_birth_certy.pdf', 'reject', '2024-03-21 12:42:36', '0000-00-00'),
(25, 102, 'update_employee', 'change profile pic', 'profilePic', '1711005190540_birth_certy.pdf', 'reject', '2024-03-21 12:43:10', '0000-00-00'),
(26, 102, 'update_employee', 'change profile pic', 'profilePic', '1711005216405_birth_certy.pdf', 'reject', '2024-03-21 12:43:36', '2024-03-11'),
(27, 102, 'update_employee', 'change profile pic', 'profilePic', '1711005238420_birth_certy.pdf', 'reject', '2024-03-21 12:43:58', '0000-00-00'),
(28, 102, 'update_employee', 'change profile pic', 'profilePic', '1711005268390_birth_certy.pdf', 'reject', '2024-03-21 12:44:28', '0000-00-00'),
(29, 102, 'update_employee', 'change profile pic', 'profilePic', '1711011552544_12MARKS_Krishna.pdf', 'reject', '2024-03-21 14:29:12', '2024-03-11'),
(30, 102, 'update_employee', 'change profile pic', 'profilePic', '1711014148948_birth_certy.pdf', 'reject', '2024-03-21 15:12:28', '2024-03-13'),
(31, 103, 'clocktime', 'wsaf', 'clockIn', '09:15', 'reject', '2024-03-21 15:15:44', NULL),
(32, 102, 'clocktime', 'change profile pic', 'profilePic', '1711014369366_SALARY_20032024_110339.pdf', 'reject', '2024-03-21 15:16:09', NULL),
(33, 102, 'clocktime', 'change profile pic', 'profilePic', '1711014441654_SALARY_20032024_110339.pdf', 'reject', '2024-03-21 15:17:21', '2024-03-11'),
(34, 103, 'update_employee', 'change profile pic', 'profilePic', '1711014879556_SALARY_20032024_110339.pdf', 'reject', '2024-03-21 15:24:39', '2024-03-13'),
(35, 103, 'clocktime', 'sdf', 'clockIn', '09:26', 'approve', '2024-03-21 15:26:31', '2024-03-19'),
(36, 103, 'clocktime', 'fgdrd', 'clockIn', '09:03', 'approve', '2024-03-21 16:30:31', '2024-03-19'),
(37, 103, 'clocktime', 'efas', 'clockIn', '09:00', 'reject', '2024-03-21 16:31:19', '2024-03-20'),
(38, 103, 'clocktime', 'hvg', 'clockIn', '09:00', 'approve', '2024-03-22 09:36:52', '2024-03-21'),
(39, 103, 'update_employee', 'Changes Names', 'name', 'Mitesh Meghani', 'reject', '2024-03-22 09:55:04', '0000-00-00'),
(40, 103, 'update_employee', 'Change in Date Of Birth', 'date_of_birth', '2002-01-01', 'reject', '2024-03-22 09:55:04', '0000-00-00'),
(41, 103, 'update_employee', 'Change in Date of Joining', 'date_of_joining', '2024-01-01', 'reject', '2024-03-22 09:55:04', '0000-00-00'),
(42, 103, 'clocktime', 'hj', 'clockOut', '18:00', 'approve', '2024-03-22 11:46:12', '2024-03-22'),
(43, 107, 'clocktime', 'rg', 'clockIn', '09:16', 'approve', '2024-03-22 11:50:08', '2024-03-22'),
(44, 103, 'clocktime', 'edsfedsf', 'clockIn', '09:02', 'approve', '2024-03-22 15:15:44', '2024-03-22'),
(45, 103, 'update_employee', 'Changes Names', 'Changes Names', 'Mitesh Meghani', 'reject', '2024-03-22 15:27:00', '0000-00-00'),
(46, 103, 'update_employee', 'Change in Date Of Birth', 'Change in Date Of Birth', '2002-01-01', 'reject', '2024-03-22 15:27:00', '0000-00-00'),
(47, 103, 'update_employee', 'Change in Date of Joining', 'Change in Date of Joining', '2024-01-01', 'reject', '2024-03-22 15:27:00', '0000-00-00'),
(48, 103, 'update_employee', 'Changes Names', 'Changes Names', 'Mitesh Meghani', 'reject', '2024-03-22 15:27:43', '0000-00-00'),
(49, 103, 'update_employee', 'Change in Date Of Birth', 'Change in Date Of Birth', '2002-01-01', 'reject', '2024-03-22 15:27:43', '0000-00-00'),
(50, 103, 'update_employee', 'Change in Date of Joining', 'Change in Date of Joining', '2024-01-01', 'reject', '2024-03-22 15:27:43', '0000-00-00'),
(51, 103, 'clocktime', 'efwstg', 'clockOut', '17:31', 'approve', '2024-03-22 17:31:51', '2024-03-22'),
(52, 103, 'clocktime', 'efs', 'clockOut', '17:32', 'reject', '2024-03-22 17:32:28', '2024-03-22'),
(53, 103, 'clocktime', 'esfa', 'clockIn', '09:32', 'reject', '2024-03-22 17:32:47', '2024-03-22'),
(54, 103, 'clocktime', 'clock out', 'clockOut', '18:01', 'approve', '2024-03-27 09:01:54', '2024-03-26'),
(55, 103, 'clocktime', 'tgh', 'clockOut', '17:56', 'approve', '2024-03-28 10:34:51', '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salaryId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `month` int(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `currentSalary` float NOT NULL,
  `leavesofMonth` int(2) NOT NULL,
  `bonus` int(11) NOT NULL,
  `netSalary` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `leavesDeducation` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salaryId`, `employeeId`, `status`, `month`, `year`, `currentSalary`, `leavesofMonth`, `bonus`, `netSalary`, `dateTime`, `leavesDeducation`) VALUES
(1, 118, '', 3, '2024', 10000, 2, 476, 1640, '2024-03-20 14:23:12', 952.381),
(2, 118, 'credited', 3, '2024', 10000, 2, 476, 1640, '2024-03-20 14:28:04', 952.381),
(3, 118, 'credited', 3, '2024', 10000, 2, 476, 1640, '2024-03-20 14:37:47', 952.381),
(4, 103, 'done', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:19:11', 1826.09),
(5, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:25:35', 1826.09),
(6, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:25:44', 1826.09),
(7, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:26:21', 1826.09),
(8, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:53:09', 1826.09),
(9, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:54:05', 1826.09),
(10, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:54:05', 1826.09),
(11, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:54:05', 1826.09),
(12, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 15:54:06', 1826.09),
(13, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:08:00', 1826.09),
(14, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:08:00', 1826.09),
(15, 114, 'pending', 3, '2024', 6565660, 0, 285463, -63436, '2024-03-20 16:08:14', 0),
(16, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:12:36', 1826.09),
(17, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:12:41', 1826.09),
(18, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:13:08', 1826.09),
(19, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:14:11', 1826.09),
(20, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:14:39', 1826.09),
(21, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:15:18', 1826.09),
(22, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:15:29', 1826.09),
(23, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:16:38', 1826.09),
(24, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:17:19', 1826.09),
(25, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:17:21', 1826.09),
(26, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:17:32', 1826.09),
(27, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:17:32', 1826.09),
(28, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:17:32', 1826.09),
(29, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:17:32', 1826.09),
(30, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:17:33', 1826.09),
(31, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:43:52', 1826.09),
(32, 103, 'pending', 3, '2024', 42000, 1, 1826, 5478, '2024-03-20 16:47:34', 1826.09),
(33, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 09:35:26', 1826.09),
(34, 103, 'pending', 3, '2024', 42000, 1, 1826, -203, '2024-03-21 09:51:41', 1826.09),
(35, 103, 'pending', 3, '2024', 42000, 1, 1826, -203, '2024-03-21 10:37:26', 1826.09),
(36, 103, 'pending', 3, '2024', 42000, 1, 1826, -203, '2024-03-21 10:37:42', 1826.09),
(37, 103, 'pending', 3, '2024', 42000, 1, 1826, 1623, '2024-03-21 10:38:26', 1826.09),
(38, 103, 'pending', 3, '2024', 42000, 1, 1826, 1623, '2024-03-21 10:41:28', 1826.09),
(39, 103, 'pending', 3, '2024', 42000, 1, 1826, 1623, '2024-03-21 10:42:07', 1826.09),
(40, 107, 'pending', 3, '2024', 20000, 0, 870, 1159, '2024-03-21 10:47:19', 0),
(41, 107, 'pending', 3, '2024', 20000, 0, 870, 1159, '2024-03-21 10:47:36', 0),
(42, 107, 'pending', 3, '2024', 20000, 0, 870, 97, '2024-03-21 10:47:55', 0),
(43, 103, 'pending', 3, '2024', 42000, 1, 1826, 1623, '2024-03-21 10:48:06', 1826.09),
(44, 103, 'pending', 3, '2024', 42000, 1, 1826, 1623, '2024-03-21 10:48:16', 1826.09),
(45, 103, 'pending', 3, '2024', 42000, 1, 1826, 1623, '2024-03-21 11:16:33', 1826.09),
(46, 103, 'pending', 3, '2024', 42000, 1, 1826, -203, '2024-03-21 12:08:37', 1826.09),
(47, 103, 'pending', 3, '2024', 42000, 1, 1826, 1623, '2024-03-21 12:08:59', 1826.09),
(48, 103, 'pending', 3, '2024', 42000, 1, 1826, 10754, '2024-03-21 12:10:29', 1826.09),
(49, 103, 'pending', 3, '2024', 42000, 1, 1826, 10754, '2024-03-21 12:41:34', 1826.09),
(50, 103, 'pending', 3, '2024', 42000, 1, 1826, 10754, '2024-03-21 13:59:43', 1826.09),
(51, 103, 'pending', 3, '2024', 42000, 1, 1826, 10754, '2024-03-21 14:00:44', 1826.09),
(52, 102, 'pending', 3, '2024', 655000, 0, 28478, 34807, '2024-03-21 14:09:19', 0),
(53, 103, 'pending', 3, '2024', 42000, 1, 1826, 10754, '2024-03-21 14:09:27', 1826.09),
(54, 107, 'pending', 3, '2024', 20000, 0, 870, 97, '2024-03-21 14:09:33', 0),
(55, 114, 'pending', 3, '2024', 6565660, 0, 285463, -63436, '2024-03-21 14:09:44', 0),
(56, 117, 'pending', 3, '2024', 6565660, 0, 285463, -539208, '2024-03-21 14:09:54', 0),
(57, 118, 'pending', 3, '2024', 6565660, 2, 285463, -31718, '2024-03-21 14:10:06', 570927),
(58, 103, 'pending', 3, '2024', 42000, 1, 1826, 10754, '2024-03-21 14:45:23', 1826.09),
(59, 103, 'pending', 3, '2024', 42000, 1, 1826, 10754, '2024-03-21 14:51:21', 1826.09),
(60, 103, 'pending', 3, '2024', 42000, 1, 1826, 10754, '2024-03-21 14:56:42', 1826.09),
(61, 103, 'pending', 3, '2024', 42000, 1, 1826, 9942, '2024-03-21 14:56:53', 1826.09),
(62, 103, 'pending', 3, '2024', 42000, 1, 1826, 9942, '2024-03-21 15:05:33', 1826.09),
(63, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 15:27:32', 1826.09),
(64, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 15:38:50', 1826.09),
(65, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 15:58:56', 1826.09),
(66, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:01:02', 1826.09),
(67, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:02:04', 1826.09),
(68, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:03:46', 1826.09),
(69, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:04:48', 1826.09),
(70, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:04:52', 1826.09),
(71, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:04:57', 1826.09),
(72, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:04:59', 1826.09),
(73, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:05:00', 1826.09),
(74, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:05:01', 1826.09),
(75, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:05:02', 1826.09),
(76, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:05:03', 1826.09),
(77, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:05:04', 1826.09),
(78, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:05:08', 1826.09),
(79, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:05:13', 1826.09),
(80, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:18:24', 1826.09),
(81, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:22:56', 1826.09),
(82, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:23:00', 1826.09),
(83, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:23:27', 1826.09),
(84, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:27:51', 1826.09),
(85, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:28:24', 1826.09),
(86, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:28:57', 1826.09),
(87, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:29:58', 1826.09),
(88, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:30:42', 1826.09),
(89, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:33:31', 1826.09),
(90, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:34:12', 1826.09),
(91, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 16:49:33', 1826.09),
(92, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 17:03:27', 1826.09),
(93, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-21 17:56:38', 1826.09),
(94, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 09:16:24', 1826.09),
(95, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 09:16:33', 1826.09),
(96, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 09:17:14', 1826.09),
(97, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 09:36:33', 1826.09),
(98, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 09:37:03', 1826.09),
(99, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 10:12:54', 1826.09),
(100, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 10:13:15', 1826.09),
(101, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 10:13:21', 1826.09),
(102, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 10:13:22', 1826.09),
(103, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 10:13:22', 1826.09),
(104, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 10:40:34', 1826.09),
(105, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 10:55:52', 1826.09),
(106, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 10:55:53', 1826.09),
(107, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-22 11:38:17', 0),
(108, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-22 11:38:38', 0),
(109, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:41:43', 1826.09),
(110, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-22 11:42:05', 0),
(111, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-22 11:42:13', 0),
(112, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:42:35', 1826.09),
(113, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:44:10', 1826.09),
(114, 117, 'pending', 3, '2024', 6565660, 0, 285463, 285463, '2024-03-22 11:44:22', 0),
(115, 117, 'pending', 3, '2024', 6565660, 0, 285463, 285463, '2024-03-22 11:44:49', 0),
(116, 117, 'pending', 3, '2024', 6565660, 0, 285463, 285463, '2024-03-22 11:45:07', 0),
(117, 117, 'pending', 3, '2024', 6565660, 0, 285463, 285463, '2024-03-22 11:45:12', 0),
(118, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:45:28', 1826.09),
(119, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:46:19', 1826.09),
(120, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:46:36', 1826.09),
(121, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-22 11:49:38', 0),
(122, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-22 11:50:16', 0),
(123, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:51:36', 1826.09),
(124, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:51:44', 1826.09),
(125, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:52:09', 1826.09),
(126, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 11:52:11', 1826.09),
(127, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 12:31:49', 1826.09),
(128, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 12:31:52', 1826.09),
(129, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 12:33:04', 1826.09),
(130, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 15:25:01', 1826.09),
(131, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 15:37:41', 1826.09),
(132, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 15:37:46', 1826.09),
(133, 118, 'pending', 3, '2024', 6565660, 2, 285463, 285463, '2024-03-22 17:28:57', 570927),
(134, 118, 'pending', 3, '2024', 6565660, 2, 285463, 285463, '2024-03-22 17:29:07', 570927),
(135, 118, 'pending', 3, '2024', 6565660, 2, 285463, 285463, '2024-03-22 17:29:26', 570927),
(136, 118, 'pending', 3, '2024', 6565660, 2, 285463, 285463, '2024-03-22 17:30:04', 570927),
(137, 117, 'pending', 3, '2024', 6565660, 0, 285463, 285463, '2024-03-22 17:30:23', 0),
(138, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-22 17:30:44', 0),
(139, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-22 17:30:57', 0),
(140, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-22 17:31:03', 0),
(141, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-22 17:31:11', 0),
(142, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 17:31:55', 1826.09),
(143, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 17:33:16', 1826.09),
(144, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 17:33:38', 1826.09),
(145, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 17:33:50', 1826.09),
(146, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 17:34:27', 1826.09),
(147, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-22 17:48:00', 1826.09),
(148, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 09:16:24', 1826.09),
(149, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 09:16:39', 1826.09),
(150, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 09:17:03', 1826.09),
(151, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 09:17:19', 1826.09),
(152, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 09:17:34', 1826.09),
(153, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 09:17:34', 1826.09),
(154, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 09:17:55', 1826.09),
(155, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 09:19:09', 1826.09),
(156, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:04:10', 1826.09),
(157, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:04:22', 1826.09),
(158, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-26 10:13:50', 0),
(159, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:23:11', 1826.09),
(160, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:34:29', 1826.09),
(161, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:34:29', 1826.09),
(162, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:34:29', 1826.09),
(163, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:34:30', 1826.09),
(164, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:34:31', 1826.09),
(165, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 10:36:49', 1826.09),
(166, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-26 11:46:16', 0),
(167, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 12:58:49', 1826.09),
(168, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 12:58:52', 1826.09),
(169, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-26 14:00:38', 0),
(170, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-26 14:03:14', 0),
(171, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 14:04:14', 1826.09),
(172, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 14:04:16', 1826.09),
(173, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 14:04:17', 1826.09),
(174, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 14:04:18', 1826.09),
(175, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-26 14:10:34', 0),
(176, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-26 14:10:45', 0),
(177, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-26 14:10:51', 0),
(178, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 14:10:54', 1826.09),
(179, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 14:37:18', 1826.09),
(180, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 14:49:02', 1826.09),
(181, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 14:50:21', 1826.09),
(182, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-26 15:28:01', 1826.09),
(183, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 09:01:10', 1826.09),
(184, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 09:01:22', 1826.09),
(185, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 09:01:28', 1826.09),
(186, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 09:01:28', 1826.09),
(187, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 09:01:28', 1826.09),
(188, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 09:01:28', 1826.09),
(189, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 09:02:13', 1826.09),
(190, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-27 09:24:33', 0),
(191, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-27 09:24:40', 0),
(192, 102, 'pending', 3, '2024', 655000, 0, 28478, 28478, '2024-03-27 09:24:44', 0),
(193, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 09:24:52', 1826.09),
(194, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:23:41', 1826.09),
(195, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:35:42', 1826.09),
(196, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:35:44', 1826.09),
(197, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:35:46', 1826.09),
(198, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:35:47', 1826.09),
(199, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:35:48', 1826.09),
(200, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:36:06', 1826.09),
(201, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:36:16', 1826.09),
(202, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:36:37', 1826.09),
(203, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 10:36:39', 1826.09),
(204, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:25:42', 1826.09),
(205, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:28:22', 1826.09),
(206, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:28:22', 1826.09),
(207, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:28:25', 1826.09),
(208, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:28:39', 1826.09),
(209, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:29:47', 1826.09),
(210, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:30:06', 1826.09),
(211, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:30:10', 1826.09),
(212, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-27 11:30:19', 0),
(213, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-27 11:30:32', 0),
(214, 107, 'pending', 3, '2024', 20000, 0, 870, 870, '2024-03-27 11:30:34', 0),
(215, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 11:31:06', 1826.09),
(216, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 12:17:18', 1826.09),
(217, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 13:59:12', 1826.09),
(218, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 14:09:07', 1826.09),
(219, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 15:08:40', 1826.09),
(220, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 15:08:55', 1826.09),
(221, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 15:08:58', 1826.09),
(222, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 15:09:01', 1826.09),
(223, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 15:09:03', 1826.09),
(224, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 15:09:10', 1826.09),
(225, 114, 'pending', 3, '2024', 6565660, 0, 285463, 285463, '2024-03-27 15:20:02', 0),
(226, 103, 'pending', 3, '2024', 42000, 1, 1826, 1826, '2024-03-27 15:34:47', 1826.09),
(227, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:25:33', 1826.09),
(228, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:25:50', 1826.09),
(229, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:25:53', 1826.09),
(230, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:23', 1826.09),
(231, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:26', 1826.09),
(232, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:26', 1826.09),
(233, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:26', 1826.09),
(234, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:26', 1826.09),
(235, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:26', 1826.09),
(236, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:27', 1826.09),
(237, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:27', 1826.09),
(238, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:26:35', 1826.09),
(239, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:27:09', 1826.09),
(240, 118, 'pending', 3, '2024', 6565660, 2, 285463, 951544, '2024-03-27 16:39:15', 570927),
(241, 118, 'pending', 3, '2024', 6565660, 2, 285463, 951544, '2024-03-27 16:39:15', 570927),
(242, 118, 'pending', 3, '2024', 6565660, 2, 285463, 951544, '2024-03-27 16:40:04', 570927),
(243, 118, 'pending', 3, '2024', 6565660, 2, 285463, 951544, '2024-03-27 16:40:13', 570927),
(244, 118, 'pending', 3, '2024', 6565660, 2, 285463, 951544, '2024-03-27 16:40:18', 570927),
(245, 118, 'pending', 3, '2024', 6565660, 2, 285463, 951544, '2024-03-27 16:40:27', 570927),
(246, 103, 'pending', 3, '2024', 42000, 1, 1826, 12377, '2024-03-27 16:40:45', 1826.09),
(247, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-27 16:40:53', 1826.09),
(248, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-27 16:46:47', 1826.09),
(249, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-27 16:47:13', 1826.09),
(250, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-27 16:47:42', 1826.09),
(251, 103, 'credited', 5, '2024', 42000, 0, 1556, 1556, '2024-03-27 17:07:00', 0),
(252, 102, 'pending', 3, '2024', 655000, 0, 28478, 34807, '2024-03-27 17:40:13', 0),
(253, 102, 'pending', 3, '2023', 655000, 0, 25192, 25192, '2024-03-27 17:40:16', 0),
(254, 102, 'pending', 3, '2024', 655000, 0, 28478, 34807, '2024-03-27 17:40:24', 0),
(255, 102, 'pending', 1, '2024', 655000, 1, 24259, 24259, '2024-03-27 17:40:31', 24259.3),
(256, 102, 'pending', 2, '2024', 655000, 0, 26200, 43667, '2024-03-27 17:40:39', 0),
(257, 102, 'pending', 1, '2024', 655000, 1, 24259, 24259, '2024-03-27 17:40:45', 24259.3),
(258, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-27 17:54:23', 1826.09),
(259, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-27 17:54:27', 1615.38),
(260, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-27 17:54:33', 0),
(261, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-27 17:54:46', 1615.38),
(262, 103, 'pending', 8, '2024', 42000, 0, 1556, 1556, '2024-03-27 17:55:01', 0),
(263, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-27 17:55:39', 1615.38),
(264, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-27 17:59:10', 1826.09),
(265, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:06:56', 1826.09),
(266, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:07:11', 1826.09),
(267, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:07:19', 1826.09),
(268, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:08:34', 1826.09),
(269, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:08:40', 1826.09),
(270, 103, 'pending', 3, '2023', 42000, 0, 1615, 1615, '2024-03-28 09:08:49', 0),
(271, 103, 'pending', 6, '2023', 42000, 0, 1680, 1680, '2024-03-28 09:08:53', 0),
(272, 103, 'pending', 6, '2024', 42000, 0, 1680, 1680, '2024-03-28 09:09:00', 0),
(273, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:09:06', 1826.09),
(274, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:11:03', 1826.09),
(275, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-28 09:11:07', 1615.38),
(276, 103, 'pending', 4, '2023', 42000, 0, 1615, 1615, '2024-03-28 09:11:09', 0),
(277, 103, 'pending', 4, '2023', 42000, 0, 1615, 1615, '2024-03-28 09:11:20', 0),
(278, 103, 'pending', 4, '2023', 42000, 0, 1615, 1615, '2024-03-28 09:11:21', 0),
(279, 103, 'pending', 4, '2023', 42000, 0, 1615, 1615, '2024-03-28 09:11:21', 0),
(280, 103, 'pending', 4, '2023', 42000, 0, 1615, 1615, '2024-03-28 09:11:21', 0),
(281, 103, 'pending', 4, '2023', 42000, 0, 1615, 1615, '2024-03-28 09:11:21', 0),
(282, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:28:22', 1826.09),
(283, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:28:44', 1826.09),
(284, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:28:57', 1826.09),
(285, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:29:04', 1826.09),
(286, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 09:33:07', 0),
(287, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 09:33:21', 0),
(288, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 09:34:28', 0),
(289, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 09:35:46', 0),
(290, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 09:37:44', 0),
(291, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 09:37:48', 0),
(292, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:38:10', 1826.09),
(293, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:38:10', 1826.09),
(294, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 09:40:05', 0),
(295, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:40:26', 1826.09),
(296, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 09:41:57', 1826.09),
(297, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 10:03:25', 1826.09),
(298, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 10:08:04', 1826.09),
(299, 103, 'pending', 3, '2024', 42000, 1, 1826, 13594, '2024-03-28 10:08:25', 1826.09),
(300, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 10:11:08', 0),
(301, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 10:13:21', 0),
(302, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 10:16:04', 0),
(303, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 10:16:21', 0),
(304, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 10:18:59', 0),
(305, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 10:19:03', 0),
(306, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 10:19:12', 0),
(307, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 10:35:05', 1826.09),
(308, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 10:35:11', 0),
(309, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 10:37:08', 0),
(310, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 10:37:16', 1555.56),
(311, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 10:37:57', 0),
(312, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-28 10:38:13', 1615.38),
(313, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 10:38:31', 1826.09),
(314, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-28 10:38:36', 1615.38),
(315, 103, 'pending', 8, '2024', 42000, 0, 1556, 1556, '2024-03-28 10:38:50', 0),
(316, 103, 'pending', 7, '2024', 42000, 0, 1556, 1556, '2024-03-28 10:39:02', 0),
(317, 103, 'pending', 5, '2024', 42000, 0, 1556, 1556, '2024-03-28 10:39:07', 0),
(318, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-28 10:39:12', 1615.38),
(319, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 10:39:20', 1826.09),
(320, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:10:29', 0),
(321, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:10:29', 0),
(322, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:10:29', 0),
(323, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:10:30', 0),
(324, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:10:30', 0),
(325, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:10:30', 0),
(326, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:10:30', 0),
(327, 102, 'pending', 3, '2024', 655000, 0, 28478, 34807, '2024-03-28 11:14:12', 0),
(328, 107, 'pending', 3, '2024', 20000, 0, 870, 1836, '2024-03-28 11:14:28', 0),
(329, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 11:14:40', 1826.09),
(330, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:15:50', 0),
(331, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:15:59', 0),
(332, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:15:59', 0),
(333, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 11:15:59', 0),
(334, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:08', 0),
(335, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:08', 0),
(336, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:08', 0),
(337, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:08', 0),
(338, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:09', 0),
(339, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:09', 0),
(340, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:09', 0),
(341, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:09', 0),
(342, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:09', 0),
(343, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:10', 0),
(344, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:10', 0),
(345, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:10', 0),
(346, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 12:09:10', 0),
(347, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:09:39', 1826.09),
(348, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 14:12:31', 0),
(349, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 14:12:32', 0),
(350, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 14:12:34', 0),
(351, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 14:14:22', 0),
(352, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 14:14:37', 0),
(353, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:17:49', 1555.56),
(354, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:17:52', 1826.09),
(355, 103, 'pending', 0, '', 42000, 0, 1355, 1355, '2024-03-28 14:18:55', 0),
(356, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:18:57', 1826.09),
(357, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:20:22', 1826.09),
(358, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:21:56', 1826.09),
(359, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:22:12', 1826.09),
(360, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:22:23', 1826.09),
(361, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:22:28', 1826.09),
(362, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:23:04', 1826.09),
(363, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:23:08', 1555.56),
(364, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:23:11', 1826.09),
(365, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 14:23:22', 0),
(366, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:23:43', 1555.56),
(367, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:22', 1555.56),
(368, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:26', 1555.56),
(369, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:26', 1555.56),
(370, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:26', 1555.56),
(371, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:27', 1555.56),
(372, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:27', 1555.56),
(373, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:27', 1555.56),
(374, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:27', 1555.56),
(375, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:28', 1555.56),
(376, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:28', 1555.56),
(377, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:28', 1555.56),
(378, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:25:28', 1555.56),
(379, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:28:14', 1555.56),
(380, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:28:22', 1555.56),
(381, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:28:22', 1555.56),
(382, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:30:03', 1555.56),
(383, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:30:08', 1555.56),
(384, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:30:08', 1555.56),
(385, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:30:09', 1555.56),
(386, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:30:09', 1555.56),
(387, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:30:15', 1826.09),
(388, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:31:13', 1826.09),
(389, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:31:23', 1826.09),
(390, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:31:24', 1826.09),
(391, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:31:25', 1826.09),
(392, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:31:25', 1826.09),
(393, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:33:09', 1826.09),
(394, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:33:09', 1826.09),
(395, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:33:09', 1826.09),
(396, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:33:09', 1826.09),
(397, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:33:10', 1826.09),
(398, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:33:10', 1826.09),
(399, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 14:33:19', 0),
(400, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-28 14:33:25', 1555.56),
(401, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-28 14:33:30', 1615.38),
(402, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:33:38', 1826.09),
(403, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:41:27', 1826.09),
(404, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:51:33', 1826.09),
(405, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:56:14', 1826.09),
(406, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:56:14', 1826.09),
(407, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:56:15', 1826.09),
(408, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 14:56:15', 1826.09),
(409, 103, 'pending', 3, '2028', 42000, 0, 1615, 1615, '2024-03-28 15:02:54', 0),
(410, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:02:59', 1826.09),
(411, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:04:50', 1826.09),
(412, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:04:52', 1826.09),
(413, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:05:23', 1826.09),
(414, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:05:23', 1826.09),
(415, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:19:44', 1826.09),
(416, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:19:44', 1826.09),
(417, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:19:45', 1826.09),
(418, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:19:45', 1826.09),
(419, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:19:45', 1826.09),
(420, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:19:45', 1826.09),
(421, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:19:45', 1826.09),
(422, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 15:23:08', 0),
(423, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 15:23:43', 0),
(424, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 15:32:22', 0),
(425, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 15:32:22', 0),
(426, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 15:32:22', 0),
(427, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 15:32:22', 0),
(428, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 15:32:22', 0),
(429, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-28 15:32:36', 0),
(430, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:32:49', 1826.09),
(431, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:42:18', 1826.09),
(432, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:43:21', 1826.09),
(433, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:43:21', 1826.09),
(434, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:43:21', 1826.09),
(435, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:43:21', 1826.09),
(436, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:44:45', 1826.09),
(437, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:49:00', 1826.09),
(438, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:49:00', 1826.09),
(439, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:49:00', 1826.09),
(440, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:49:00', 1826.09),
(441, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:49:01', 1826.09),
(442, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:49:01', 1826.09),
(443, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 15:55:52', 1826.09),
(444, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 17:23:50', 1826.09),
(445, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 17:23:50', 1826.09),
(446, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 17:23:50', 1826.09),
(447, 103, 'pending', 3, '2024', 42000, 1, 1826, 13797, '2024-03-28 17:23:50', 1826.09),
(448, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-28 17:54:35', 1826.09),
(449, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:07:35', 1826.09),
(450, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:08:04', 1826.09),
(451, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:08:15', 1826.09),
(452, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:08:24', 1826.09),
(453, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:08:25', 1826.09),
(454, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:08:55', 1826.09),
(455, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:11:29', 1826.09),
(456, 103, 'pending', 3, '2022', 42000, 0, 1615, 1615, '2024-03-29 09:11:33', 0),
(457, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:14:57', 1826.09),
(458, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:14:58', 1826.09),
(459, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:18:33', 1826.09),
(460, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:20:10', 1826.09),
(461, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:41:08', 1826.09),
(462, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:41:19', 1826.09),
(463, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:41:22', 1826.09),
(464, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:41:53', 1826.09),
(465, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:42:11', 1826.09),
(466, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:42:55', 1826.09),
(467, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:42:57', 1826.09),
(468, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:42:57', 1826.09),
(469, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:42:57', 1826.09),
(470, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:42:57', 1826.09),
(471, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:43:00', 1826.09),
(472, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:44:12', 1826.09),
(473, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:44:14', 1826.09),
(474, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:44:17', 1826.09),
(475, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-29 09:44:19', 1555.56),
(476, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-29 09:44:21', 0),
(477, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:44:23', 1826.09),
(478, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:44:24', 1615.38),
(479, 103, 'pending', 5, '2024', 42000, 0, 1556, 1556, '2024-03-29 09:44:26', 0),
(480, 103, 'pending', 5, '2023', 42000, 0, 1556, 1556, '2024-03-29 09:44:28', 0),
(481, 103, 'pending', 12, '2023', 42000, 0, 1615, 1615, '2024-03-29 09:44:32', 0),
(482, 103, 'pending', 1, '2023', 42000, 0, 1556, 1556, '2024-03-29 09:44:35', 0),
(483, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-29 09:44:37', 1555.56),
(484, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:44:41', 1826.09),
(485, 103, 'pending', 2, '2024', 42000, 0, 1680, 1680, '2024-03-29 09:44:54', 0),
(486, 103, 'pending', 0, '2024', 42000, 0, 1355, 1355, '2024-03-29 09:44:58', 0),
(487, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-29 09:44:59', 1555.56),
(488, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:45:03', 1826.09),
(489, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:49:34', 1826.09),
(490, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:49:37', 1826.09),
(491, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:49:41', 1826.09),
(492, 103, 'pending', 1, '2024', 42000, 1, 1556, 1556, '2024-03-29 09:49:42', 1555.56),
(493, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:49:45', 1826.09),
(494, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:49:49', 1826.09),
(495, 103, 'pending', 3, '2023', 42000, 0, 1615, 1615, '2024-03-29 09:49:53', 0),
(496, 103, 'pending', 2, '2023', 42000, 0, 1680, 1680, '2024-03-29 09:49:57', 0),
(497, 103, 'pending', 3, '2023', 42000, 0, 1615, 1615, '2024-03-29 09:50:01', 0),
(498, 103, 'pending', 1, '2023', 42000, 0, 1556, 1556, '2024-03-29 09:50:05', 0),
(499, 103, 'pending', 3, '2023', 42000, 0, 1615, 1615, '2024-03-29 09:50:09', 0),
(500, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:50:11', 1826.09),
(501, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:50:13', 1826.09),
(502, 103, 'pending', 3, '2023', 42000, 0, 1615, 1615, '2024-03-29 09:50:15', 0),
(503, 103, 'pending', 3, '2023', 42000, 0, 1615, 1615, '2024-03-29 09:50:19', 0),
(504, 103, 'pending', 4, '2023', 42000, 0, 1615, 1615, '2024-03-29 09:50:23', 0),
(505, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:50:24', 1826.09),
(506, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:50:51', 1826.09),
(507, 103, 'pending', 3, '2022', 42000, 0, 1615, 1615, '2024-03-29 09:53:38', 0),
(508, 103, 'pending', 4, '2022', 42000, 0, 1615, 1615, '2024-03-29 09:53:41', 0),
(509, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:53:46', 1826.09),
(510, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:53:49', 1826.09),
(511, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:53:57', 1615.38),
(512, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:53:57', 1615.38),
(513, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:53:57', 1615.38),
(514, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:53:58', 1615.38),
(515, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:53:58', 1615.38),
(516, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:54:22', 1615.38),
(517, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:54:22', 1615.38),
(518, 103, 'pending', 4, '2024', 42000, 1, 1615, 1615, '2024-03-29 09:54:22', 1615.38),
(519, 103, 'pending', 3, '2024', 42000, 1, 1826, 15623, '2024-03-29 09:54:25', 1826.09);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskId` int(11) NOT NULL,
  `taskDescription` varchar(255) NOT NULL,
  `projectId` int(11) NOT NULL,
  `priority` varchar(56) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `assignedTo` int(11) NOT NULL,
  `reportTo` int(11) NOT NULL,
  `taskDocs` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(11) NOT NULL,
  `taskName` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskId`, `taskDescription`, `projectId`, `priority`, `startDate`, `endDate`, `assignedTo`, `reportTo`, `taskDocs`, `dateTime`, `status`, `taskName`) VALUES
(1, 'jagdish meal', 4, 'High', '2024-02-14', '2024-02-28', 118, 103, '[\"1707112842178_35kb.jpg\",\"1707112842179_500kb.jpeg\"]', '0000-00-00 00:00:00', 'done', 'jagdish home'),
(4, 'updaets???', 36, 'High', '0000-00-00', '2024-03-25', 103, 114, '[\"1709379849362_12MARKS_Krishna.jpeg\"]', '2024-02-09 16:35:06', 'done', 'shalwe update'),
(8, 'updaets on shall we', 37, 'Low', '2024-03-15', '2024-03-25', 103, 102, '[\"1709896719328_500kb.jpeg\"]', '2024-03-08 16:14:42', 'done', 'tanishque update'),
(10, 'google play console', 37, 'High', '0000-00-00', '0000-00-00', 117, 118, '[]', '2024-03-11 09:35:26', 'done', 'google'),
(11, 'fiscal', 37, 'High', '2024-03-22', '2024-03-23', 103, 118, '[\"1711103494443_SALARY_20032024_110339.pdf\"]', '2024-03-11 09:35:26', 'done', 'google'),
(12, 'google play console issue', 37, 'High', '2024-10-02', '2024-10-10', 107, 107, '[\"1710240190997_birth_certy.pdf\",\"1710240190999_12MARKS_Krishna.jpeg\"]', '2024-03-12 16:13:11', 'pending', 'Fiscal'),
(13, 'ef', 36, 'High', '2024-03-19', '2024-03-23', 103, 114, '[\"1710821881116_Group 128.jpg\"]', '2024-03-19 09:48:01', 'done', 'login'),
(14, 'ds', 34, 'High', '2024-03-19', '2024-03-20', 103, 102, '[\"1711102970223_Group 128.jpg\"]', '2024-03-19 15:37:37', 'done', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `timingId` int(11) NOT NULL,
  `workingHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timing`
--

INSERT INTO `timing` (`timingId`, `workingHours`) VALUES
(1, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcementId`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`attendenceId`);

--
-- Indexes for table `breaks`
--
ALTER TABLE `breaks`
  ADD PRIMARY KEY (`breakId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `employeeprojects`
--
ALTER TABLE `employeeprojects`
  ADD PRIMARY KEY (`employeeProjectsId`);

--
-- Indexes for table `employee_document`
--
ALTER TABLE `employee_document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `employee_education`
--
ALTER TABLE `employee_education`
  ADD PRIMARY KEY (`educationId`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`holidayId`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leaveId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationsId`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`policyId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectId`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`requestId`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salaryId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskId`);

--
-- Indexes for table `timing`
--
ALTER TABLE `timing`
  ADD PRIMARY KEY (`timingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `attendenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1057;

--
-- AUTO_INCREMENT for table `breaks`
--
ALTER TABLE `breaks`
  MODIFY `breakId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `employeeprojects`
--
ALTER TABLE `employeeprojects`
  MODIFY `employeeProjectsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employee_document`
--
ALTER TABLE `employee_document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_education`
--
ALTER TABLE `employee_education`
  MODIFY `educationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holidayId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leaveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `policyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salaryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timing`
--
ALTER TABLE `timing`
  MODIFY `timingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
