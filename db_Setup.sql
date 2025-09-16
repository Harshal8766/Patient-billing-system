-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql203.infinityfree.com
-- Generation Time: Sep 16, 2025 at 07:17 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39893830_harshal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `patient_id`, `feedback`, `date`) VALUES
(2, 48, 'Excellent facilities available.', '2025-07-07 10:59:46'),
(1, 7, 'Waiting time was too long.', '2025-06-13 20:31:46'),
(3, 36, 'Hospital is clean and hygienic.', '2025-05-18 12:09:46'),
(4, 10, 'Waiting time was too long.', '2025-07-09 09:13:46'),
(5, 18, 'Could improve patient communication.', '2025-07-03 17:57:46'),
(6, 19, 'Excellent facilities available.', '2025-08-31 09:47:46'),
(7, 39, 'Could improve patient communication.', '2025-05-24 09:09:46'),
(8, 14, 'Could improve patient communication.', '2025-08-20 13:51:46'),
(9, 22, 'Hospital is clean and hygienic.', '2025-08-01 17:10:46'),
(10, 43, 'Excellent facilities available.', '2025-06-28 11:57:46'),
(11, 17, 'Doctors are very professional.', '2025-05-29 05:15:46'),
(12, 33, 'Waiting time was too long.', '2025-05-26 22:05:46'),
(13, 32, 'Waiting time was too long.', '2025-06-14 00:16:46'),
(14, 40, 'Excellent facilities available.', '2025-06-05 13:11:46'),
(15, 4, 'Doctors are very professional.', '2025-08-13 05:16:46'),
(16, 6, 'Hospital is clean and hygienic.', '2025-07-30 09:12:46'),
(17, 28, 'Nursing staff was attentive.', '2025-08-19 04:14:46'),
(18, 46, 'Nursing staff was attentive.', '2025-08-03 01:14:46'),
(19, 3, 'Doctors are very professional.', '2025-08-19 10:24:46'),
(20, 1, 'Doctors are very professional.', '2025-07-27 00:49:46'),
(21, 11, 'Hospital is clean and hygienic.', '2025-06-10 02:44:46'),
(22, 25, 'Billing needs improvement.', '2025-07-26 13:13:46'),
(23, 5, 'Billing needs improvement.', '2025-08-05 10:59:46'),
(24, 21, 'Satisfied with the service.', '2025-08-24 16:50:46'),
(25, 9, 'Good treatment and friendly staff.', '2025-09-02 15:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `patient_id`, `service`, `amount`, `date`) VALUES
(3, 17, 'MRI Scan', '514.32', '2025-05-26 17:01:46'),
(2, 34, 'Eye Checkup', '2107.84', '2025-09-01 23:10:46'),
(1, 30, 'X-Ray', '1683.48', '2025-08-26 17:17:46'),
(4, 17, 'Blood Test', '3008.06', '2025-06-04 08:18:46'),
(5, 36, 'X-Ray', '2741.08', '2025-07-08 05:50:46'),
(6, 1, 'MRI Scan', '3736.98', '2025-06-11 11:22:46'),
(7, 1, 'MRI Scan', '2937.91', '2025-07-26 13:25:46'),
(8, 44, 'ECG', '3628.57', '2025-07-21 07:51:46'),
(9, 44, 'MRI Scan', '536.90', '2025-09-13 16:31:46'),
(10, 8, 'MRI Scan', '326.61', '2025-06-17 15:03:46'),
(11, 35, 'Blood Test', '3650.05', '2025-05-29 01:02:46'),
(12, 18, 'Physiotherapy', '2775.22', '2025-08-19 17:58:46'),
(13, 22, 'MRI Scan', '3203.09', '2025-06-04 21:54:46'),
(14, 22, 'Blood Test', '658.64', '2025-07-22 23:39:46'),
(15, 45, 'ECG', '3496.20', '2025-09-09 13:25:46'),
(16, 45, 'Blood Test', '524.27', '2025-06-15 00:15:46'),
(17, 19, 'MRI Scan', '1008.88', '2025-07-09 20:58:46'),
(18, 28, 'X-Ray', '1330.62', '2025-08-16 08:38:46'),
(19, 28, 'Ultrasound', '662.26', '2025-06-24 17:13:46'),
(20, 11, 'Blood Test', '3727.56', '2025-05-31 03:56:46'),
(21, 50, 'ECG', '2081.03', '2025-05-28 22:09:46'),
(22, 50, 'Normal Checkup', '909.16', '2025-09-15 22:50:46'),
(23, 46, 'Physiotherapy', '1865.13', '2025-06-14 17:24:46'),
(24, 46, 'ECG', '872.75', '2025-08-10 05:03:46'),
(25, 48, 'Eye Checkup', '511.51', '2025-07-03 19:34:46'),
(26, 33, 'Normal Checkup', '3854.88', '2025-09-06 06:02:46'),
(27, 12, 'MRI Scan', '1793.97', '2025-05-18 16:51:46'),
(28, 49, 'Blood Test', '1851.13', '2025-07-03 16:33:46'),
(29, 47, 'Physiotherapy', '1055.76', '2025-06-17 00:51:46'),
(30, 47, 'Physiotherapy', '1764.41', '2025-06-22 14:47:46'),
(31, 4, 'Eye Checkup', '3737.37', '2025-05-20 09:06:46'),
(32, 4, 'ECG', '2598.29', '2025-07-06 08:02:46'),
(33, 38, 'Ultrasound', '1281.24', '2025-05-19 23:10:46'),
(34, 21, 'MRI Scan', '1667.25', '2025-08-26 20:13:46'),
(35, 10, 'Ultrasound', '328.95', '2025-06-03 17:47:46'),
(36, 10, 'Blood Test', '3774.04', '2025-08-30 02:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `age`, `gender`, `phone`) VALUES
(2, 'Faiyaz', 32, 'Female', '7051802512'),
(1, 'Navya', 65, 'Male', '6107420369'),
(3, 'Anay', 24, 'Male', '9163119785'),
(4, 'Seher', 45, 'Male', '8536146025'),
(5, 'Raghav', 23, 'Male', '6127978094'),
(6, 'Nirvaan', 50, 'Male', '6999270936'),
(7, 'Mamooty', 30, 'Male', '8410529190'),
(8, 'Hiran', 46, 'Female', '6946785248'),
(9, 'Sara', 73, 'Female', '9476477323'),
(10, 'Ehsaan', 69, 'Male', '9259052811'),
(11, 'Parinaaz', 45, 'Male', '8998485882'),
(12, 'Seher', 27, 'Female', '7193448329'),
(13, 'Inaaya ', 39, 'Male', '9279182318'),
(14, 'Dhruv', 42, 'Male', '6398340369'),
(15, 'Kiara', 72, 'Male', '7541804686'),
(16, 'Aarna', 34, 'Female', '8592983555'),
(17, 'Arhaan', 47, 'Male', '9134174160'),
(18, 'Aniruddh', 42, 'Male', '9961228449'),
(19, 'Divij', 36, 'Male', '8370996465'),
(20, 'Madhav', 30, 'Female', '8479708607'),
(21, 'Mehul', 60, 'Male', '6196814233'),
(22, 'Dishani', 36, 'Male', '9320303242'),
(23, 'Lavanya', 32, 'Male', '9673561638'),
(24, 'Anay', 35, 'Male', '7632629719'),
(25, 'Jhanvi', 71, 'Female', '8730243887'),
(26, 'Kiaan', 41, 'Female', '6698594025'),
(27, 'Saanvi', 60, 'Female', '6899825838'),
(28, 'Nehmat', 61, 'Female', '9014295294'),
(29, 'Rati', 58, 'Male', '8616197747'),
(30, 'Inaaya ', 64, 'Male', '8294113287'),
(31, 'Aaina', 47, 'Male', '6701808367'),
(32, 'Madhup', 58, 'Female', '7159417075'),
(33, 'Alia', 38, 'Male', '8940395823'),
(34, 'Khushi', 70, 'Male', '6983753977'),
(35, 'Ranbir', 38, 'Male', '9457645390'),
(36, 'Zoya', 22, 'Female', '7149938334'),
(37, 'Aarush', 54, 'Male', '9921889760'),
(38, 'Tara', 59, 'Female', '6913224047'),
(39, 'Zara', 74, 'Female', '7699226064'),
(40, 'Indranil', 34, 'Female', '6613628803'),
(41, 'Rasha', 65, 'Male', '7059257080'),
(42, 'Aarna', 55, 'Female', '9208399878'),
(43, 'Shlok', 55, 'Female', '9856119925'),
(44, 'Ranbir', 32, 'Female', '7554762903'),
(45, 'Indrans', 49, 'Male', '8188398760'),
(46, 'Madhav', 21, 'Male', '9246059658'),
(47, 'Tarini', 58, 'Male', '6656448479'),
(48, 'Shayak', 61, 'Male', '9401954956'),
(49, 'Ehsaan', 22, 'Female', '8561557300'),
(50, 'Divij', 56, 'Female', '7639042338');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(11, 'testuser', 'cc03e747a6afbbcbf8be7668acfebee5'),
(10, 'harshal', '363e3dac589e3a0ca6e0d0ba52cee609'),
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
