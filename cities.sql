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
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(10) NOT NULL,
  `District_id` int(10) NOT NULL,
  `cities` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `District_id`, `cities`) VALUES
(1, 1, ' Ariyalur'),
(2, 1, 'Thirumanur'),
(3, 1, 'Sendurai'),
(4, 1, 'Jayankondam'),
(5, 2, 'Maraimalainagar'),
(6, 2, 'Chengalpattu'),
(7, 2, 'Nandivaram'),
(8, 2, 'Urapakkam'),
(9, 3, 'Adambakkam'),
(10, 3, 'Anna Nagar'),
(11, 3, 'Egmore'),
(12, 3, 'Choolai'),
(13, 3, 'Meenambakkam'),
(14, 3, 'Nungambakkam'),
(15, 3, 'Triplicane'),
(16, 3, 'Kodungaiyur'),
(17, 3, 'Chennai'),
(18, 3, 'Injambakkam'),
(19, 4, 'Annur'),
(20, 4, 'Chettipalayam'),
(21, 4, 'Coimbatore'),
(22, 4, 'Saravanampatti'),
(23, 4, 'Odaiyakulam'),
(24, 5, 'Lalpet'),
(25, 5, 'Mangalampet'),
(26, 5, 'Thirupathiripuliyur'),
(27, 5, 'Virudhachalam'),
(28, 6, 'Bommidi'),
(29, 6, 'Kadathur'),
(30, 6, 'Palakkodu'),
(31, 6, 'Dharmapuri'),
(32, 7, 'Chinnalapatti'),
(33, 7, 'Dindigul'),
(34, 7, 'Palani'),
(35, 7, 'Oddanchatram'),
(36, 8, 'Elathur, Erode'),
(37, 8, 'Mettunasuvanpalayam'),
(38, 8, 'Sivagiri, Erode'),
(39, 8, 'P. Mettupalayam'),
(40, 9, 'Avadattur'),
(41, 9, 'Bukkampatti'),
(42, 9, 'Nangavalli'),
(43, 9, 'Keeripatti'),
(44, 10, 'Karaikudi'),
(45, 10, 'Devakottai'),
(46, 10, 'Aranaiyur'),
(47, 11, 'Thanjavur'),
(48, 11, 'Kandiyur'),
(49, 11, 'Papanasam'),
(50, 11, 'Pattukkottai'),
(51, 11, 'Vallam'),
(52, 11, 'Swamimalai'),
(53, 12, 'Andipatti'),
(54, 12, 'Hanumanthampatti'),
(55, 12, 'Theni'),
(56, 12, 'SukkangalPatti'),
(57, 13, 'Kovilpatti'),
(58, 13, 'Tiruchendur'),
(59, 13, 'Thoothukudi'),
(60, 14, 'Koothappar'),
(61, 14, 'Tiruchirappalli'),
(62, 14, 'Manapparai'),
(63, 15, 'Tirunelveli'),
(64, 15, 'Nallankulam'),
(65, 15, 'Eruvadi'),
(66, 17, 'Tenkasi'),
(67, 17, 'Sundarapandiapuram'),
(68, 17, 'Courtalam'),
(69, 18, 'Jagathala'),
(70, 18, 'Naduvattam, Nilgiris'),
(71, 18, 'Sholur'),
(72, 19, 'Tirupathur '),
(73, 19, 'Bommikuppam'),
(74, 19, 'Elagiri Hills'),
(75, 20, 'Udumalpet'),
(76, 20, 'Palladam'),
(77, 20, 'Dharapuram'),
(78, 21, 'Padianallur'),
(79, 21, 'Ammavarikuppam'),
(80, 21, 'Pallipattu'),
(81, 22, 'Adaiyur, Tiruvannamalai'),
(82, 22, 'Peranamallur'),
(83, 22, 'Thenimalai'),
(84, 23, 'Thiruthuraipoondi'),
(85, 23, 'Nahangudi'),
(86, 23, 'Koradacheri'),
(87, 24, 'Vellore'),
(88, 24, 'Chettithangal'),
(89, 25, 'Marakkanam'),
(90, 25, 'Viluppuram'),
(91, 25, 'Kottakuppam'),
(92, 26, 'Sivakasi'),
(93, 26, 'Srivilliputhur'),
(94, 26, 'Virudhunagar'),
(95, 26, 'Rajapalayam'),
(96, 26, 'Thiruthangal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
