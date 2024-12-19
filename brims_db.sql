-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 11:06 AM
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
-- Database: `brims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `email`, `password`, `account_type`) VALUES
(1, 'Brgy. Sec', 'admin@gmail.com', 'brgysec@admin', '1'),
(16, 'juanrdelacruz', 'user@gmail.com', 'userjuan', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `email`, `feedback`) VALUES
(91, 'neilcerene@gmail.com', 'Hi! I like your website'),
(100, 'adasdas@sfsdfs', 'sdfsfsdf'),
(101, 'sdfsed@dgdfg', 'sdfsdfsdfsdfsdvdfbdgb'),
(102, 'raskien@fadfasda', 'adadasda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_residentinfo`
--

CREATE TABLE `tbl_residentinfo` (
  `id` int(11) NOT NULL,
  `brimsidno` varchar(30) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` date NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_residentinfo`
--

INSERT INTO `tbl_residentinfo` (`id`, `brimsidno`, `surname`, `firstname`, `middlename`, `suffix`, `gender`, `age`, `birthday`, `birthplace`, `address`, `contactnumber`, `email`) VALUES
(1, 'BRIMS-301124-001-1', 'Dela Cruz', 'Juana', 'Balba', '', 'Female', 30, '1995-05-12', 'Batangas Regional Hospital', 'Batangas City, Philippines', '0987654321', 'juan@gmail.com'),
(187, 'BRIMS-011224-511-2', 'Bancoro', 'Mark Raskien', 'Pasamba', 'Jr.', 'Male', 26, '1995-03-26', 'Hipit San Nicolas Batangas', 'Hipit San Nicolas Batangas', '091347658621', 'raskien@gmail.com'),
(188, 'BRIMS-011224-631-188', 'Del Rosario', 'Adam', 'Zane', '', 'Male', 2, '2022-03-01', 'Hipit San Nicolas Batangas', 'Hipit San Nicolas Batangas', '09846745653523', 'adamboy@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_residentinfo`
--
ALTER TABLE `tbl_residentinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_residentinfo`
--
ALTER TABLE `tbl_residentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
