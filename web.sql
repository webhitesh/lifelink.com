-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2026 at 12:23 PM
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
(6, 'pricy', 'princy4567@gmail.com', '8980927339', '1234567890', 54, 'B+', 'Vadodara ', 'Female ', '2026-03-01 18:30:00'),
(7, 'Pradeep Yadav ', 'pradeep123@gmail.com', '0123456789', '3030', 20, 'B-', 'Jamnagar', 'Male', '2026-04-01 09:48:33'),
(8, 'Pratik sharma ', 'pratik3030@gmail.com', '0123456789', '2020', 25, 'A-', 'Jamnagar', 'Male', '2026-04-01 09:49:43'),
(9, 'Priya Mehta ', 'priya2020@gmail.com', '0123456789', '1010', 21, 'AB+', 'Jamnagar', 'Female', '2026-04-01 09:50:23');

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
(2, 'amit', 'amit@gmail.com', '9106779884', '2020', 'Jamnagar', 'A-', 'need', '2026-02-20 07:23:32'),
(3, 'Hitesh Yadav', 'hitesh@gmail.com', '0123456789', '5050', 'Jamnagar', 'B-', 'emergency ', '2026-04-01 09:51:09'),
(4, 'Komal Yadav ', 'komal3030@gmail.com', '0123456789', '2020', 'Jamnagar', 'AB+', 'need', '2026-04-01 09:52:03'),
(6, 'Krupa Jadeja', 'krupa@gmail.com', '0123456789', '2020', 'Jamnagar', 'B-', 'Need', '2026-04-01 10:06:43');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requesters`
--
ALTER TABLE `requesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
