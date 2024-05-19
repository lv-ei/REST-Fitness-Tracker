-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 11:27 AM
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
-- Database: `canopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Cid` int(30) NOT NULL,
  `Cname` varchar(50) NOT NULL,
  `Cexercise` int(10) NOT NULL,
  `Clink` varchar(20) NOT NULL,
  `Ctime` int(255) NOT NULL,
  `Ccate` varchar(60) NOT NULL,
  `Cdes` varchar(500) NOT NULL,
  `Cimg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Cid`, `Cname`, `Cexercise`, `Clink`, `Ctime`, `Ccate`, `Cdes`, `Cimg`) VALUES
(4, 'OVERVIEW OF MUSCLE GAIN AND NUTRITION', 0, 'weight_loss_b.html', 504, 'Weight loss', '', ''),
(5, 'EFFECTIVE TRAINING PROGRAM FOR MUSCLE GAIN', 0, 'weight_loss_b.html', 720, 'Weight loss', '', ''),
(6, 'MEAL PLANNING AND DAILY CALORIE TRACKING', 0, 'muscle_gain_b.html', 840, 'Muscle gain', '', ''),
(8, 'MUSCLE TRAINING TECHNIQUES', 12, 'body_building_b.html', 6, 'Body building', '', ''),
(9, 'MUSCLE TRAINING PLANNING', 7, 'body_building_b.html', 840, 'Body building', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fid` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Femail` varchar(50) NOT NULL,
  `mess` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Fdate` date DEFAULT NULL,
  `checkDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fid`, `Fname`, `Femail`, `mess`, `status`, `Fdate`, `checkDate`) VALUES
(2, 'ivy', 'ivy@gmail.com', 'hello world', 'read', '2024-05-01', '2024-05-19'),
(5, 'sun', 'sun@gmail.com', 'hi', 'unread', '2024-04-23', '2024-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USid` int(11) NOT NULL,
  `USname` varchar(50) NOT NULL,
  `USemail` varchar(50) NOT NULL,
  `USphone` int(15) NOT NULL,
  `USpassword` varchar(50) NOT NULL,
  `USava` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USid`, `USname`, `USemail`, `USphone`, `USpassword`, `USava`) VALUES
(23, 'admin', 'admin@gmail.com', 0, 'admin', ''),
(45, 'ashley', 'nguyenngocthaovy004@gmail.com', 123232, '12', ''),
(52, 'ivy', 'ivy@gmail.com', 32432, 'ivy', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Cid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
