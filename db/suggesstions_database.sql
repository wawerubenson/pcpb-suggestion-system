-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 04:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feeds_adm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `is_admin` int(255) NOT NULL,
  `admin_code` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `department`, `is_admin`, `admin_code`, `password`, `reg_time`) VALUES
(1, 'kogi', 'ben', 'ben@gmail.com', 'Academics', 2, 0, '$2y$10$apeZktsKcLBRMDMD2.g6z.JPtVE7tkRvxgGGzTU6DBsLyHnTgwLqS', '2023-03-27 14:19:17'),
(2, 'Sam', 'wamugi', 'sam@gmail.com', 'General', 2, 0, '$2y$10$Kn.r8CQfbVNqZA/amkrLkuVTHIWp77NrNi/OnCeMP.gd4HkVOfM5G', '2023-03-27 14:46:19'),
(3, 'Ann', 'Grace', 'ann@gmail.com', 'Finance', 2, 0, '$2y$10$39ZSt8wMnDU/MBzrY742U.BHSwb9XWIptfN6F3V5cyphlyT6RHHx.', '2023-03-27 15:14:27'),
(4, 'rubix', 'caly', 'rubix@gmail.com', 'Technical', 2, 0, '$2y$10$A4c.k/pdCG4kuXLBBFtCOeJD7tjRP.mARTTsy3298IXFRjIwvu4l2', '2023-03-27 18:58:40'),
(6, 'Admin', 'Sam', 'admin@gmail.com', '', 1, 0, '$2y$10$1lPyw6xt7NYymYhV43krGe2otz8CQAWzSphBAvNwVpQaiVd7Be62G', '2023-03-28 07:08:09'),
(7, 'Ann', 'korir', 'ann@gmail.com', 'Academics', 2, 1111, '$2y$10$jWzHqmG4JJNp8snXyKIhoO6mRzBY6BjkhEvmD.W6CaSZNkPm1J/Ua', '2023-03-28 13:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(255) NOT NULL,
  `sugg_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `sugg_id`, `user_id`, `user_name`, `department`, `description`, `admin_name`, `reply`) VALUES
(1, 6, 1, 'kogi', 'Academics', 'improve academics', 'kogi', 'okay                                '),
(2, 4, 2, 'Sam', 'General', 'exams issues by sam ', 'Sam', 'sorted                               '),
(3, 5, 1, 'Sam', 'General', 'Fees issues update', 'Sam', 'sorted\r\n                                    '),
(4, 13, 5, 'Sam', 'General', 'medical issues', 'Sam', 'sorted\r\n                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `user_id`, `user_name`, `department`, `description`, `post_time`) VALUES
(4, 2, 'Sam', 'General', 'exams issues by sam ', '2023-03-27 11:31:38'),
(5, 1, 'kogi', 'General', 'Fees issues update', '2023-03-27 12:59:49'),
(6, 1, 'kogi', 'Academics', 'improve academics', '2023-03-27 14:48:45'),
(7, 3, 'Ann', 'Finance', 'fees issues', '2023-03-27 15:04:26'),
(9, 3, 'Ann', 'Technical', 'add lab materials', '2023-03-27 15:10:05'),
(12, 4, 'rubix', 'General', 'medical issues', '2023-03-28 06:09:42'),
(13, 5, 'sam', 'General', 'medical issues', '2023-03-28 06:41:38'),
(14, 5, 'sam', 'Academics', 'exam issues', '2023-03-28 06:41:51'),
(15, 5, 'sam', 'Finance', 'Fee issues', '2023-03-28 06:42:27'),
(16, 5, 'sam', 'Technical', 'portal issues', '2023-03-28 06:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `reg_time`) VALUES
(1, 'kogi', 'ben', 'ben@gmail.com', '$2y$10$GMJv4erwV6kq6Q3ooDFCouKGF71HcWoLbFznn69F5cLby4qW.A6Ve', '2023-03-27 09:34:11'),
(2, 'Sam', 'wamugi', 'sam@gmail.com', '$2y$10$5xOcX870Kxwoz2RZlFtHM.j5b.Jg1WCd8IDc7pS3sM1r.SU.GBwe6', '2023-03-27 11:29:47'),
(3, 'Ann', 'Grace', 'ann@gmail.com', '$2y$10$mgaWALLLXZdxQtlameOz0O2ztjaUJrNU.3vu8Rdm6DSTnK4Ak.68i', '2023-03-27 15:04:02'),
(4, 'rubix', 'caly', 'rubix@gmail.com', '$2y$10$BAQTlVfC/ioIed1OSF66teDE8aLS077GJd4X6ZITfR4fPJHzA5Zm6', '2023-03-27 18:54:19'),
(5, 'sam', 'wam', 'test@gmail.com', '$2y$10$wNr1ksPbCK1BOkOHgzd.UewRdj1BGQEjVvxXDivK0RhiBNKde8NzC', '2023-03-28 06:39:12'),
(6, 'Admin', '', 'admin@gmail.com', '$2y$10$EbTVnlb2naU.19MpbD3BcucFu08rtDXFVEvyGyGFIZ8RUP60OOLYa', '2023-03-28 07:05:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
