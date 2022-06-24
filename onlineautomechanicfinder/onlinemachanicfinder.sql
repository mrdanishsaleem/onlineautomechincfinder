-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 06:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinemachanicfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(100) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Attock'),
(2, 'Lahore'),
(3, 'Karachi'),
(4, 'Peshawar');

-- --------------------------------------------------------

--
-- Table structure for table `city_area`
--

CREATE TABLE `city_area` (
  `area_id` int(100) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `area_city` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_area`
--

INSERT INTO `city_area` (`area_id`, `area_name`, `area_city`) VALUES
(1, 'saddar', 1),
(2, 'Shadrah', 2),
(3, 'LAHORE CANTT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(100) NOT NULL,
  `feedback_job` int(100) NOT NULL,
  `feedback_proffessional` int(100) NOT NULL,
  `feedback_user` int(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `feedback_comments` text NOT NULL,
  `feedback_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_job`, `feedback_proffessional`, `feedback_user`, `rating`, `feedback_comments`, `feedback_date`) VALUES
(3, 3, 12, 1, '4', '	feedback				', '2020-04-03 11:26:45'),
(4, 10, 12, 1, '5', '		nice work			', '2020-04-07 20:43:11'),
(5, 0, 0, 0, '3', '		jhgjkhghkgjhk			', '2020-04-23 14:28:44'),
(6, 0, 0, 0, '5', 'Nice work!!!			', '2020-05-12 20:33:35'),
(7, 0, 0, 0, '5', 'Nice work!!!				', '2020-05-12 20:35:16'),
(8, 0, 0, 0, '5', 'Nice work!!!					', '2020-05-12 20:38:09'),
(9, 0, 0, 0, '', 'Nice work					', '2020-05-12 20:38:28'),
(10, 0, 0, 0, '5', 'Great work.					', '2020-05-12 20:43:22'),
(11, 0, 0, 0, '5', 'Great work				', '2020-05-12 20:48:24'),
(12, 0, 0, 0, '', 'Thanks for working				', '2020-05-12 20:52:03'),
(13, 0, 0, 0, '', 'Thanks for working				', '2020-05-12 20:53:05'),
(14, 0, 0, 0, '5', '			kjdnvfnkvf		', '2020-05-12 20:54:50'),
(15, 0, 0, 0, '5', '			kjdnvfnkvf		', '2020-05-12 20:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(50) NOT NULL,
  `user_id` int(100) NOT NULL,
  `job_machanic` int(100) NOT NULL,
  `job_date` datetime NOT NULL,
  `job_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `user_id`, `job_machanic`, `job_date`, `job_status`) VALUES
(3, 1, 2, '2020-04-03 07:58:53', 'Completed'),
(4, 1, 2, '2020-04-03 08:00:11', 'Pending'),
(5, 0, 4, '2020-04-07 05:15:31', 'Pending'),
(8, 1, 2, '2020-04-07 07:47:58', 'Pending'),
(9, 1, 2, '2020-04-07 08:45:28', 'Completed'),
(10, 2, 2, '2020-04-07 20:41:06', 'Completed'),
(11, 1, 12, '2020-04-23 13:43:00', 'Rejected'),
(12, 1, 12, '2020-04-23 16:14:43', 'Rejected'),
(13, 3, 14, '2020-05-12 20:33:07', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `professional`
--

CREATE TABLE `professional` (
  `mechanic_id` int(200) NOT NULL,
  `mechanic_Fullname` varchar(200) NOT NULL,
  `mechanic_cnic` bigint(200) NOT NULL,
  `mechanic_address` varchar(200) NOT NULL,
  `mechanic_city` varchar(200) NOT NULL,
  `machanic_city_area` int(50) NOT NULL,
  `mechanic_contact` bigint(200) NOT NULL,
  `mechanic_email` varchar(200) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `rate_per_hour` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `profile_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional`
--

INSERT INTO `professional` (`mechanic_id`, `mechanic_Fullname`, `mechanic_cnic`, `mechanic_address`, `mechanic_city`, `machanic_city_area`, `mechanic_contact`, `mechanic_email`, `experience`, `rate_per_hour`, `password`, `status`, `profile_photo`) VALUES
(12, 'biladar', 22222, 'south  ave ', '1', 1, 2234455, 'biladar@gmail.com', '5', 5, 'biladar', 'Active', 'WIN_20200102_21_00_47_Pro.jpg'),
(13, 'fgwer', 2345345234, 'Boltan market Lahore ', '1', 1, 987654321, 'abc', '4 year', 2432, '1234', 'Active', 'Phone Number Extraction.JPG'),
(14, 'Mechanic', 1234567890, 'Lahore Cantt  ', '2', 3, 1234567890, 'mechanic@mailinator.com', '5', 500, '1234', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(200) NOT NULL,
  `user_Fullname` varchar(200) NOT NULL,
  `user_cnic` bigint(200) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_city` varchar(200) NOT NULL,
  `user_contact` bigint(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_Fullname`, `user_cnic`, `user_address`, `user_city`, `user_contact`, `user_email`, `user_password`) VALUES
(2, 'chair', 2345345234, 'Boltan market Lahore ', 'lahore', 3139615234, 'abc@gmail.com', '1234'),
(3, 'User', 1234567890, 'Lahore Cantt ', 'Lahore', 987654321, 'user@mailinator.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `city_area`
--
ALTER TABLE `city_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `professional`
--
ALTER TABLE `professional`
  ADD PRIMARY KEY (`mechanic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city_area`
--
ALTER TABLE `city_area`
  MODIFY `area_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `professional`
--
ALTER TABLE `professional`
  MODIFY `mechanic_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
