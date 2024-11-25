-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 09:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myvacform`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `email`, `password`, `account_type`) VALUES
(1, 'Dr. Tenorio', 'admin@gmail.com', 'admin', '1'),
(3, 'intian_27', 'intianbancoro@gmail.com', '1234', '2'),
(4, 'ronnrick_16', 'ronnrick@gmail.com', 'abcd', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booster`
--

CREATE TABLE `tbl_booster` (
  `id` int(11) NOT NULL,
  `vacidno` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `booster` varchar(255) NOT NULL,
  `vac_brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booster`
--

INSERT INTO `tbl_booster` (`id`, `vacidno`, `name`, `booster`, `vac_brand`) VALUES
(72, 'SNRHU-240622-983-179', 'Ronn Rick Gahol Jr.', 'Yes', 'Oxford-AstraZeneca'),
(73, 'SNRHU-240622-13-184', 'Juan Dalisay Dela Cruz Sr.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `email`, `feedback`) VALUES
(91, 'neilcerene@gmail.com', 'Hi! I like your website');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_postvac1stdose`
--

CREATE TABLE `tbl_postvac1stdose` (
  `id` int(11) NOT NULL,
  `vacidno` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post_vacnote` varchar(255) NOT NULL,
  `monitor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_postvac1stdose`
--

INSERT INTO `tbl_postvac1stdose` (`id`, `vacidno`, `name`, `post_vacnote`, `monitor`) VALUES
(75, 'SNRHU-240622-983-179', 'Ronn Rick Gahol Jr.', 'Discharge and no symptoms observed', 'Nurse Jamila Mayuga'),
(76, 'SNRHU-240622-13-184', 'Juan Dalisay Dela Cruz Sr.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_postvac2nddose`
--

CREATE TABLE `tbl_postvac2nddose` (
  `id` int(11) NOT NULL,
  `vacidno` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post_vacnote` varchar(255) NOT NULL,
  `monitor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_postvac2nddose`
--

INSERT INTO `tbl_postvac2nddose` (`id`, `vacidno`, `name`, `post_vacnote`, `monitor`) VALUES
(74, 'SNRHU-240622-983-179', 'Ronn Rick Gahol Jr.', 'Discharge and no symptoms observed', 'Nurse Jamila Mayuga'),
(75, 'SNRHU-240622-13-184', 'Juan Dalisay Dela Cruz Sr.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prevac1stdose`
--

CREATE TABLE `tbl_prevac1stdose` (
  `id` int(11) NOT NULL,
  `vacidno` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `temperature` float NOT NULL,
  `heart_rate` int(255) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `respiratory_rate` int(255) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `doctor_note` varchar(255) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prevac1stdose`
--

INSERT INTO `tbl_prevac1stdose` (`id`, `vacidno`, `name`, `temperature`, `heart_rate`, `blood_pressure`, `respiratory_rate`, `symptoms`, `doctor_note`, `note`) VALUES
(167, 'SNRHU-240622-983-179', 'Ronn Rick Gahol Jr.', 36.6, 36, '180/20', 17, 'No Symptoms', 'Vaccinate', 'Proceed to Vaccination Area'),
(168, 'SNRHU-240622-13-184', 'Juan Dalisay Dela Cruz Sr.', 0, 0, '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prevac2nddose`
--

CREATE TABLE `tbl_prevac2nddose` (
  `id` int(11) NOT NULL,
  `vacidno` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `temperature` decimal(65,0) NOT NULL,
  `heart_rate` int(255) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `respiratory_rate` int(255) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `doctor_note` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prevac2nddose`
--

INSERT INTO `tbl_prevac2nddose` (`id`, `vacidno`, `name`, `temperature`, `heart_rate`, `blood_pressure`, `respiratory_rate`, `symptoms`, `doctor_note`, `note`) VALUES
(74, 'SNRHU-240622-983-179', 'Ronn Rick Gahol Jr.', '37', 98, '190/30', 23, 'No Symptoms', 'Vaccinate', 'Proceed to Vaccination Area'),
(75, 'SNRHU-240622-13-184', 'Juan Dalisay Dela Cruz Sr.', '0', 0, '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacdetails1stdose`
--

CREATE TABLE `tbl_vacdetails1stdose` (
  `id` int(11) NOT NULL,
  `vacidno` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dosage_sequence` varchar(255) NOT NULL,
  `vac_site` varchar(255) NOT NULL,
  `vac_brand` varchar(255) NOT NULL,
  `batch_number` varchar(255) NOT NULL,
  `lot_number` varchar(255) NOT NULL,
  `date_vaccination` date NOT NULL,
  `vaccinator` varchar(255) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vacdetails1stdose`
--

INSERT INTO `tbl_vacdetails1stdose` (`id`, `vacidno`, `name`, `dosage_sequence`, `vac_site`, `vac_brand`, `batch_number`, `lot_number`, `date_vaccination`, `vaccinator`, `filename`) VALUES
(69, 'SNRHU-240622-983-179', 'Ronn Rick Gahol Jr.', 'Left', 'SAN NICOLAS RHU', 'Pfizer-BioNTech', 'XXYY-1234', 'AAZZ-0000', '2022-06-25', 'Dr. Charmaine Tenorio', 'drcharmaine.jpg'),
(70, 'SNRHU-240622-13-184', 'Juan Dalisay Dela Cruz Sr.', '', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacdetails2nddose`
--

CREATE TABLE `tbl_vacdetails2nddose` (
  `id` int(11) NOT NULL,
  `vacidno` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dosage_sequence` varchar(255) NOT NULL,
  `vac_site` varchar(255) NOT NULL,
  `vac_brand` varchar(255) NOT NULL,
  `batch_number` varchar(255) NOT NULL,
  `lot_number` varchar(255) NOT NULL,
  `date_vaccination` date NOT NULL,
  `vaccinator` varchar(255) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vacdetails2nddose`
--

INSERT INTO `tbl_vacdetails2nddose` (`id`, `vacidno`, `name`, `dosage_sequence`, `vac_site`, `vac_brand`, `batch_number`, `lot_number`, `date_vaccination`, `vaccinator`, `filename`) VALUES
(74, 'SNRHU-240622-983-179', 'Ronn Rick Gahol Jr.', 'Right', 'SAN NICOLAS RHU', 'Pfizer-BioNTech', '1234-ABCD', 'ZXCV-9876', '2022-06-30', 'Nurse Jamila Mayuga', 'jamilamayugasignature.jpg'),
(75, 'SNRHU-240622-13-184', 'Juan Dalisay Dela Cruz Sr.', '', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacinfo`
--

CREATE TABLE `tbl_vacinfo` (
  `id` int(11) NOT NULL,
  `vacidno` varchar(30) NOT NULL,
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
  `email` varchar(255) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `relcontactnumber` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vacinfo`
--

INSERT INTO `tbl_vacinfo` (`id`, `vacidno`, `surname`, `firstname`, `middlename`, `suffix`, `gender`, `age`, `birthday`, `birthplace`, `address`, `contactnumber`, `email`, `contactperson`, `relation`, `relcontactnumber`, `category`) VALUES
(183, 'SNRHU-240622-983-179', 'Gahol', 'Ronn', 'Rick', 'Jr.', 'Male', 24, '1997-10-16', 'Munlawin, San Nicolas, Batangas', 'Munlawin, San Nicolas, Batangas', '09123456789', 'ronnrick@gmail.com', 'Mildred Gahol', 'Mother', '09123456789', 'A3'),
(184, 'SNRHU-240622-13-184', 'Dela Cruz', 'Juan', 'Dalisay', 'Sr.', 'Male', 65, '1957-06-25', 'Metro Lemery', 'Bagong Sikat, Lemery, Batangas', '09123456789', 'juan@gmail.com', 'Flora Dela Cruz', 'Mother', '09123456789', 'A2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booster`
--
ALTER TABLE `tbl_booster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_postvac1stdose`
--
ALTER TABLE `tbl_postvac1stdose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_postvac2nddose`
--
ALTER TABLE `tbl_postvac2nddose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prevac1stdose`
--
ALTER TABLE `tbl_prevac1stdose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prevac2nddose`
--
ALTER TABLE `tbl_prevac2nddose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vacdetails1stdose`
--
ALTER TABLE `tbl_vacdetails1stdose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vacdetails2nddose`
--
ALTER TABLE `tbl_vacdetails2nddose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vacinfo`
--
ALTER TABLE `tbl_vacinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_booster`
--
ALTER TABLE `tbl_booster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_postvac1stdose`
--
ALTER TABLE `tbl_postvac1stdose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_postvac2nddose`
--
ALTER TABLE `tbl_postvac2nddose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_prevac1stdose`
--
ALTER TABLE `tbl_prevac1stdose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `tbl_prevac2nddose`
--
ALTER TABLE `tbl_prevac2nddose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_vacdetails1stdose`
--
ALTER TABLE `tbl_vacdetails1stdose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_vacdetails2nddose`
--
ALTER TABLE `tbl_vacdetails2nddose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_vacinfo`
--
ALTER TABLE `tbl_vacinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
