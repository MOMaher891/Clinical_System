-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230314.b4895064ac
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 09:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinical_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `app_code` int(11) NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `app_code`, `patient_id`, `department_id`, `created_at`, `updated_at`) VALUES
(7, 2010, 7, 9, '2023-05-05 05:31:31', '2023-05-05 05:31:31'),
(9, 2011, 7, 9, '2023-05-05 05:31:31', '2023-05-05 05:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `day` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `dep_image` varchar(255) NOT NULL,
  `dep_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `dep_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep_name`, `dep_image`, `dep_price`, `created_at`, `updated_at`, `dep_rate`) VALUES
(8, 'Welcome', 'hdSADCZDh8aSI55KRchG5yKJlPxZH9GiE3JOmsmU.jpg', 470, '2023-05-05 05:00:41', '2023-05-05 05:00:41', 5),
(9, 'Welcome1', '88SlqCN3EvqVNMaiwRkJpu32ZEFm6Wh1vbPXuyxP.png', 470, '2023-05-05 06:05:37', '2023-05-05 06:05:37', 3);

-- --------------------------------------------------------

--
-- Table structure for table `departments_days`
--

CREATE TABLE `departments_days` (
  `id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments_days`
--

INSERT INTO `departments_days` (`id`, `day_id`, `department_id`) VALUES
(1, 1, 8),
(2, 3, 8),
(3, 7, 8),
(4, 1, 9),
(5, 3, 9),
(6, 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `doc_position` varchar(255) NOT NULL,
  `doc_gender` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->male\r\n1->female',
  `doc_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doc_name`, `doc_position`, `doc_gender`, `doc_image`, `created_at`, `updated_at`) VALUES
(3, 'Mohamed Maher', 'Doctor', 0, 'lj1Pk9GZRyAbjyYMH9qQF5iJpAzrIU6U9DumC2Su.png', '2023-05-04 20:10:34', '2023-05-04 20:10:34'),
(4, 'Mohamed Maher 2', 'Doctor', 0, 'XriZfnG3Np7TOcN1k2swHWj0dqZ3J0Nd5MruyUeJ.png', '2023-05-04 20:15:27', '2023-05-04 20:15:27'),
(6, 'Mayar', 'Doctor', 1, 'E07OGXMMOBeT1xsvPKbAekRGuLLHDAIUV2fw8iNx.jpg', '2023-05-04 20:39:27', '2023-05-04 20:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `pat_name` varchar(100) NOT NULL,
  `pat_nat_id` varchar(14) NOT NULL,
  `pat_gender` tinyint(4) NOT NULL COMMENT '0->male\r\n1->female',
  `pat_age` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `pat_name`, `pat_nat_id`, `pat_gender`, `pat_age`, `created_at`, `updated_at`) VALUES
(6, 'Mohamed Maher', '30109010107497', 0, '2020-11-09', '2023-05-05 05:31:07', '2023-05-05 05:31:07'),
(7, 'hamza ashry', '30109010107498', 0, '2001-07-20', '2023-05-05 06:31:00', '2023-05-05 06:31:00'),
(8, 'Mohamed Maher', '12345678912345', 0, '2023-05-20', '2023-05-05 06:31:10', '2023-05-05 06:31:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments_days`
--
ALTER TABLE `departments_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments_days`
--
ALTER TABLE `departments_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
