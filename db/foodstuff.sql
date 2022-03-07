-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2021 at 03:26 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodstuff`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(20) NOT NULL AUTO_INCREMENT,
  `cpname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpprice` decimal(10,2) NOT NULL,
  `cpimage` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpaval` int(10) NOT NULL,
  `cpneed` int(10) NOT NULL DEFAULT '1',
  `uname` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `cpname`, `cpprice`, `cpimage`, `cpaval`, `cpneed`, `uname`) VALUES
(171, 'banana', '50.00', 'farmers_images/OSKmuZ/banana.jpg', 55, 52, 'ponni_arisi'),
(168, 'ladys finger', '25.00', 'farmers_images/qER4jC/lf.jpg', 8, 7, 'ponni_arisi'),
(170, 'ladys finger', '25.00', 'farmers_images/qER4jC/lf.jpg', 8, 7, 'adminuser'),
(169, 'water melon', '25.00', 'farmers_images/LMmzDX/watermelon.jpg', 10, 1, 'ponni_arisi');

-- --------------------------------------------------------

--
-- Table structure for table `cregister`
--

DROP TABLE IF EXISTS `cregister`;
CREATE TABLE IF NOT EXISTS `cregister` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cregister`
--

INSERT INTO `cregister` (`uid`, `name`, `uname`, `password`, `email`) VALUES
(1, 'kishore', 'ponni_arisi', '123asdf', 'kishorekis@gmail.com\r\n'),
(2, 'avinash sekar', 'adminuser', 'asdfg12', 'avinashavi40@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `fproduct`
--

DROP TABLE IF EXISTS `fproduct`;
CREATE TABLE IF NOT EXISTS `fproduct` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdesc` longtext COLLATE utf8mb4_unicode_ci,
  `pcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pimage` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pavailable` int(10) NOT NULL,
  `pprice` decimal(10,2) NOT NULL,
  `paddress` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plocation` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pphoneno` bigint(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fproduct`
--

INSERT INTO `fproduct` (`pid`, `username`, `pname`, `pdesc`, `pcategory`, `pimage`, `pavailable`, `pprice`, `paddress`, `plocation`, `pphoneno`, `date`) VALUES
(25, 'avin_45', 'Cucumber', 'tasty', 'Vegetable', 'farmers_images/9hJVnN/cucu.jpg', 5, '70.00', 'No:9 east kudi street', 'amoor', 7369445624, '2021-07-04'),
(41, 'avin_45', 'ladys finger', 'good one', 'Vegetable', 'farmers_images/qER4jC/lf.jpg', 8, '25.00', 'no:89567 areser street', 'amoor', 6369974567, '2021-07-09'),
(39, 'avin_45', 'water melon', 'very tasty from us', 'Fruit', 'farmers_images/LMmzDX/watermelon.jpg', 10, '25.00', 'no:345/98 new melon street', 'musiri', 8789451235, '2021-07-04'),
(40, 'adminnnn', 'hebo', 'Powered by legend', 'Fruit', 'farmers_images/Iq8WbP/Screenshot (58).png', 45, '50.00', 'no:7 legend mental street', 'pattukottai', 8545687515, '2021-07-04'),
(42, 'savitri01', 'banana', 'tasty one from gunaseelam', 'Fruit', 'farmers_images/OSKmuZ/banana.jpg', 55, '50.00', 'no:6 main balaji street', 'gunaseelam', 9878686565, '2021-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `fregister`
--

DROP TABLE IF EXISTS `fregister`;
CREATE TABLE IF NOT EXISTS `fregister` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gml` bigint(30) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fregister`
--

INSERT INTO `fregister` (`id`, `name`, `uname`, `password`, `gml`, `email`) VALUES
(1, 'vel', 'vel45', '123456gh', 123456789111, 'vel@gmail.com'),
(24, 'grey', 'admin', '123asd', 12345678911, 'avinashavi4260@gmail.com'),
(25, 'grey', 'adminad', 'asd123', 12231555555, 'avinashavi60@gmail.com'),
(26, 'avinash', 'avin_45', 'asdf123', 12398745666, 'avinashavi0@gmail.com'),
(27, 'avinash sekar', 'adminnnn', '123456', 11111111111, 'avinashavi4260@gmail.com'),
(28, 'savitri', 'savitri01', '123456asdf', 89784568566, 'blackkdevil786@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
