-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 09:05 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sID` int(11) NOT NULL,
  `sName` text COLLATE utf8_unicode_ci NOT NULL,
  `father` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` text COLLATE utf8_unicode_ci NOT NULL,
  `mComment` text COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) DEFAULT 5000,
  `sComment` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sID`, `sName`, `father`, `mother`, `category`, `mComment`, `money`, `sComment`, `status`) VALUES
(2, '1', '3', '4', '低收入戶', '789', 5000, '987654', 4),
(3, '2', '4', '5', '低收入戶', '456', 5000, '123', 0),
(4, 'student', '123', '123', '低收入戶', '456', 5000, '32165', 3),
(103, 'student', '789', '456', '中低收入戶', '32465456', 5000, '65465', 0),
(123, 'test', '456', '789', '低收入戶', '', 5000, '', 1),
(456, 'student', '', '', '低收入戶', '357', 5000, '', 2),
(789, 'student', '456', '123', '低收入戶', '123', 5000, '654', 4),
(987, 'student', '654', '321', '低收入戶', '', 5000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `loginID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `loginID`, `password`, `role`) VALUES
(1, 'student', '123', 1),
(2, 'mentor', '123', 2),
(3, 'sec', '123', 3),
(4, 'boss', '123', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=988;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
