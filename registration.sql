-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 10:09 AM
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
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `form id` int(5) NOT NULL,
  `customer id` int(5) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `reason` varchar(30) NOT NULL,
  `district` varchar(100) NOT NULL,
  `from place` varchar(40) NOT NULL,
  `destination district` varchar(100) NOT NULL,
  `destination place` varchar(40) NOT NULL,
  `date` varchar(20) NOT NULL,
  `vehicle number` varchar(30) NOT NULL,
  `file for reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`form id`, `customer id`, `firstname`, `lastname`, `email`, `phonenumber`, `reason`, `district`, `from place`, `destination district`, `destination place`, `date`, `vehicle number`, `file for reason`) VALUES
(3, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '57', '0', '67', '07/22/2021', 'TN2323', 'upload/60dfd277a21354.29543377.jpg'),
(4, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '77', '0', '19', '2021-10-24', 'TN2345', 'upload/60dfd254bd1613.43580752.jpg'),
(5, 5, 'Shobhiya', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'medical emergency', '', '82', '0', '10', '2022-11-25', 'TN2323', 'upload/60dfc788965cb9.21269129.jpg'),
(7, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '30', '0', '65', '2021-09-04', 'TN2323', 'upload/60dfd118d48c23.19335384.jpg'),
(24, 2, 'luhith', 'anish', 'luhithanish222@gmail.com', '9791661749', 'marriage', '', 'madurai', '0', 'tripur', '2021-08-14', 'TN2345', 'upload/60e112a5bc97f4.46887537.jpg'),
(25, 2, 'luhith', 'anish', 'luhithanish222@gmail.com', '9791661749', 'medical emergency', '', 'coimbatour', '0', 'madurai', '2021-08-14', 'TN2345', 'upload/60e1187991ba88.90250369.jpg'),
(26, 2, 'luhith', 'anish', 'luhithanish222@gmail.com', '9791661749', 'marriage', '', 'maduraimalai', '0', 'chennai', '2021-09-24', 'TN2345', 'upload/60e11aca2c6a69.84675329.jpg'),
(27, 2, 'luhith', 'anish', 'luhithanish222@gmail.com', '9791661749', 'marriage', '', 'maduraimalai', '0', 'chennai', '2021-09-24', 'TN2323', 'upload/60e11bcc7d8d34.29292842.jpg'),
(28, 2, 'luhith', 'anish', 'luhithanish222@gmail.com', '9791661749', 'marriage', '', 'coimbatour', '0', 'ramesvaram', '2021-08-14', 'TN2323', 'upload/60e11e407c7008.56753273.jpg'),
(29, 2, 'luhith', 'anish', 'luhithanish222@gmail.com', '9791661749', 'marriage', '', 'maduraimalai', '0', 'sivaksi', '2021-09-24', 'TN2323', 'upload/60e121dccdd6d7.73632993.jpg'),
(160, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '64', '0', '73', '2021-08-14', 'TN2323', 'upload/shining-circle-purple-lighting-isolated-dark-background_1441-2396.jpg'),
(185, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '67', '0', '63', '08/30/2021', 'TN2323', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(186, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '30', '0', '46', '08/11/2021', 'TN2345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(187, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '67', '0', '40', '07/15/2021', 'TN2323', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(190, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '67', '0', '63', '08/11/2021', 'TN2323', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(211, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'medical emergency', '', '71', '0', '2', '07/31/2021', 'TN2323', 'upload/shining-circle-purple-lighting-isolated-dark-background_1441-2396.jpg'),
(213, 8, 'karthikeyan', 'bavatharani', 'bavakarthi03@gmail.com', '9994847075', 'marriage', '', 'srivilliputtur', '0', 'madurai', '07/23/2021', 'TN2323', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(216, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '64', '0', '25', '09/01/2021', 'TN2345', 'upload/shining-circle-purple-lighting-isolated-dark-background_1441-2396.jpg'),
(221, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '', '46', '0', '42', '07/31/2021', 'TN2325', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(230, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '10', '79', '8', '5', '07/23/2021', 'TN2345', 'upload/shining-circle-purple-lighting-isolated-dark-background_1441-2396.jpg'),
(231, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '11', '69', '13', '31', '07/23/2021', 'TN232345', 'upload/shining-circle-purple-lighting-isolated-dark-background_1441-2396.jpg'),
(235, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '12', '74', '14', '34', '07/31/2021', 'TN4340', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(236, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'medical emergency', '12', '82', '8', '23', '07/20/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(238, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '13', '58', '11', '73', '07/20/2021', 'TN2325', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(239, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '11', '50', '13', '59', '07/31/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(240, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '10', '44', '15', '63', '07/27/2021', 'TN2325', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(241, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '14', '61', '7', '33', '07/27/2021', 'TN4340', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(242, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '3', '12', '14', '62', '07/26/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(243, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '6', '30', '20', '75', '07/27/2021', 'TN4340', 'upload/shining-circle-purple-lighting-isolated-dark-background_1441-2396.jpg'),
(244, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'medical emergency', '15', '29', '4', '54', '07/25/2021', 'TN2345', 'upload/shining-circle-purple-lighting-isolated-dark-background_1441-2396.jpg'),
(245, 12, 'karthick', 'rajasekar', 'str.karthick22@gmail.com', '9500441258', 'marriage', '8', '37', '14', '62', '08/05/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(246, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'medical emergency', '10', '44', '5', '24', '08/05/2021', 'TN2325', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(247, 12, 'karthick', 'rajasekar', 'str.karthick22@gmail.com', '9500441258', 'marriage', '14', '60', '7', '35', '07/28/2021', 'TN2323', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(248, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '9', '41', '2', '6', '07/28/2021', 'TN2325', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(249, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '18', '71', '8', '38', '08/05/2021', 'TN4340', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(251, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '14', '62', '4', '19', '08/06/2021', 'TN2389', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(252, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '17', '68', '5', '26', '08/06/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(253, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '12', '55', '4', '19', '08/06/2021', 'TN2345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(254, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '15', '64', '12', '53', '08/06/2021', 'TN2345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(255, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '8', '39', '14', '61', '08/06/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(256, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '8', '39', '14', '61', '08/28/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(257, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '20', '75', '14', '60', '08/06/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(259, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'marriage', '26', '92', '26', '93', '08/15/2021', 'TN2345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(260, 5, 'SHOBHI', 'karthi', 'shobhikarthick222@gmail.com', '9500441258', 'medical emergency', '10', '44', '2', '7', '07/29/2021', 'TN232345', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg'),
(261, 12, 'karthick', 'rajasekar', 'str.karthick22@gmail.com', '9500441258', 'marriage', '26', '92', '5', '26', '07/27/2021', 'TN2325', 'upload/beautiful-hologram-water-color-frame-png_119551.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`form id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `form id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
