-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 02:32 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form epass`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `District_id` int(10) NOT NULL,
  `District` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`District_id`, `District`) VALUES
(1, 'Ariyalur'),
(2, 'Chengalpattu'),
(3, 'Chennai'),
(4, 'Coimbatore'),
(5, 'Cuddalore'),
(6, 'Dharmapuri'),
(7, 'Dindigul'),
(8, 'Erode'),
(9, 'Salem'),
(10, 'Sivaganga'),
(11, 'Thanjavur'),
(12, 'Theni'),
(13, 'Thoothukudi'),
(14, 'Tiruchirappalli'),
(15, 'Tirunelveli'),
(17, 'Tenkasi'),
(18, 'Nilgiris'),
(19, 'Tirupathur'),
(20, 'Tiruppur'),
(21, 'Tiruvallur'),
(22, 'Tiruvannamalai'),
(23, 'Tiruvarur'),
(24, 'Vellore'),
(25, 'Viluppuram'),
(26, 'Virudhunagar'),
(27, 'Kallakurichi'),
(28, 'Kanchipuram'),
(29, 'Kanyakumari'),
(30, 'Madurai'),
(31, 'Namakkal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`District_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `District_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
