-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 12:40 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curdapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `is_active`, `created`) VALUES
(1, 'rahul12', 'rd@mail.com', '121212', 0, '2018-09-16 10:31:42'),
(2, 'rahu;', 'rahul@mail.ocm', 'test12342342355', 1, '2018-09-16 07:08:44'),
(3, 'rahu;', 'rahul@mail.ocm', 'test12342342355', 1, '2018-09-16 07:09:28'),
(4, 'lasdm,', 'nksjdn@mail.com', 'sadsad', 1, '2018-09-16 07:10:46'),
(5, 'asd', 'asdsad', 'sadsad', 1, '2018-09-16 07:10:53'),
(6, ';lakmslk', 'masl,d.m', '.mls.,fm', 1, '2018-09-16 07:11:11'),
(7, ';lakmslk', 'masl,d.m', '.mls.,fm', 1, '2018-09-16 07:11:39'),
(8, ';lakmslk', 'masl,d.m', '.mls.,fm', 1, '2018-09-16 07:11:44'),
(9, 'sa.,dm.,', 'ms,c', ',ml,.sfc', 1, '2018-09-16 07:12:34'),
(10, 'asdsd', 'sadasd', 'sdsd', 1, '2018-09-16 07:15:34'),
(11, 'asdsd', 'sadasd', 'asdsd', 1, '2018-09-16 07:15:52'),
(12, 'asdsd', 'sadasd', 'zzxffsf', 1, '2018-09-16 07:16:07'),
(13, 'asdsad', 'sadda', 'dasdsad', 1, '2018-09-16 07:18:27'),
(14, 'test', 'test', 'test', 1, '2018-09-16 07:25:44'),
(15, 'test', 'test', 'test', 1, '2018-09-16 07:26:15'),
(16, 'ksadnkm', 'lkasnd', 'aslmdk', 1, '2018-09-16 07:43:59'),
(17, '', '', '', 1, '2018-09-22 12:04:52'),
(18, 'wqe', 'sadfsf', 'qew', 1, '2018-09-22 12:06:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
