-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2026 at 07:03 AM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `bloodgroup` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `contact`, `pass`, `age`, `bloodgroup`, `city`, `gender`, `reg_date`) VALUES
(6, 'pricy', 'princy4567@gmail.com', '8980927339', '1234567890', 54, 'B+', 'Vadodara ', 'Female ', '2026-03-01 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `requesters`
--

CREATE TABLE `requesters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `reason` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requesters`
--

INSERT INTO `requesters` (`id`, `name`, `email`, `contact`, `pass`, `city`, `bloodgroup`, `reason`, `reg_date`) VALUES
(1, 'jaydeep', 'karmur@gmail.com', '8529637410', '8520', 'Patan', 'O-', 'no', '2025-10-02 18:59:16'),
(2, 'amit', 'amit@gmail.com', '9106779884', '2020', 'Jamnagar', 'A-', 'need', '2026-02-20 07:23:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requesters`
--
ALTER TABLE `requesters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requesters`
--
ALTER TABLE `requesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
