-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 04:21 AM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`) VALUES
(1, 'shobhiya', 'karthikeyan', 'shobhikarthick@gmail.com', '9994847075', 'skluhithanish@123'),
(2, 'luhith', 'anish', 'luhithanish222@gmail.com', '9791661749', 'skluhithanish@123'),
(3, 'shobhikarthi', 'sk', 'shobhi@gmail.com', '9677334728', 'skluhithanish@123'),
(4, 'inba', 'raj', 'inbaraj@gmail.com', '9867836879', 'skluhithanish@123'),
(5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'Skluhithanish@123'),
(6, 'nithick', 'sanmuga vel', 'nithicksanmugavel@gmail.com', '8144158271', 'Skluhithanish1@'),
(7, 'malya', 'prateeksha', 'prateeksha@gmail.com', '9994847075', 'Skluhithanish@123'),
(8, 'karthikeyan', 'bavatharani', 'bavakarthi03@gmail.com', '9994847075', 'Skluhithanish@123'),
(9, 'rajasekar', 'meena', 'meenaraj03@gmail.com', '8166978587', 'Skluhithanish@123'),
(10, 'priya', 'rg', 'priya@gmail.com', '8144158271', 'Skluhithanish@123'),
(12, 'karthick', 'rajasekar', 'str.karthick22@gmail.com', '9500441258', 'Skluhithanish@123'),
(13, 'karthikeyan', 'bavatharani', 'karthi0502bava@gmail.com', '9994847075', 'Skluhithanish@123'),
(15, 'power', 'rangers', 'powerrangers@gmail.com', '1234567891', 'Powerrangers@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
