-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 02, 2026 at 01:36 PM
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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(2, 'muskan', 'muskan@gmail.com', '$2y$10$NRR/5vIdq4gOp/M8Moqn4OUVpY5x9CzIFggjWhpwHpyKBv1PV7aAm'),
(3, 'muskan', 'muskan@gmail.com', '$2y$10$bdNCX0WpWwUZ/EttzNRxdeNiMOLtO0ArY4xl/ANu1NIwnEwcDshze'),
(4, 'coco', 'coco@gmail.com', '$2y$10$yNPke8xwWrZYXjtFeZuubeRRkmvDL7QdrDHKbWU6KsnvV6Qf1EKVO'),
(5, '', '', '$2y$10$2Ik1xNGfj5j9.xqOydX7i.JifYmBid05w8zcd.HaaYfKn2woc9If.'),
(6, 'abhi', 'abhi@gmail.com', '$2y$10$YzLrJVrezBEp0wdLdmiXMOm8VYRF.o1E4R9EikORtwLrR3yVFJfqi'),
(7, 'muskan', 'muskankulkarni18@gmail.com', '$2y$10$mr/RZiy.QWOhyHJqNqKZveMz2DyDfc9HJsBkBEBKZ7A4ZZyU7nzry'),
(8, 'ak', 'ak@gmail.com', '$2y$10$suUTc8HPXeET.pt617MRw.VBlOYb/i8z60DrijWcTjh5DJeRoIgKS'),
(9, 'muku', 'muku@gmail.com', '$2y$10$an4i6lm53nZKFDbGfHTQi.e7JHwjOKG.f2.7DB64f1uoQl7f2Qu.m'),
(11, 'raj', 'raj@gmail.com', '$2y$10$mKf6lTnd3peiULzURVcRv.0U5yYfzgWrVMUQUSF5jDCIucnVSuGRa');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `confirmation_code` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `persons` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `confirmation_code`, `name`, `mobile`, `booking_date`, `booking_time`, `persons`, `created_at`, `status`) VALUES
(1, NULL, 'coco', '9356235415', '2026-01-15', '11:00:00', '2 Persons', '2025-12-21 07:55:25', 'Pending'),
(2, '100002', 'coco', '9356235415', '2026-01-15', '11:00:00', '2 Persons', '2025-12-21 08:07:13', 'Pending'),
(3, '100003', 'moko', '9356235415', '2026-01-15', '11:00:00', '2 Persons', '2025-12-21 08:07:29', 'Pending'),
(4, '100004', 'coco', '454565334', '2026-05-14', '12:03:00', '4 Persons', '2025-12-21 08:16:13', 'Pending'),
(5, '100005', 'coco', '454565334', '2026-05-14', '12:03:00', '2 Persons', '2025-12-21 08:25:24', 'Pending'),
(6, '100006', 'abhi', 'abhi@gmail.com', '2025-12-22', '04:30:00', '2 Persons', '2025-12-22 08:19:38', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
