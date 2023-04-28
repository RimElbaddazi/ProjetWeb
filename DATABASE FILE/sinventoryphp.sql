-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2022 at 03:29 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectation_matériel`
--

DROP TABLE IF EXISTS `affectation_matériel`;
CREATE TABLE IF NOT EXISTS `affectation_matériel` (
  `IdAffectation` int(11) NOT NULL,
  `FaeTag` varchar(50) DEFAULT NULL,
  `UserId` varchar(30) DEFAULT NULL,
  `DateSortieMateriel` datetime DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdAffectation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affectation_matériel`
--

INSERT INTO `affectation_matériel` (`IdAffectation`, `FaeTag`, `UserId`, `DateSortieMateriel`, `image`, `UserName`) VALUES
(1, '9699', 'U0003', '2021-08-11 12:30:40', '../assests/images/stock/DELL_optiplex3060.jpg', 'Ali'),
(2, '9357', 'U0001', '2021-08-15 22:55:02', '../assests/images/stock/dell_E2016H.jpg', 'HOUDA');

-- --------------------------------------------------------

--
-- Table structure for table `matériel`
--

DROP TABLE IF EXISTS `matériel`;
CREATE TABLE IF NOT EXISTS `matériel` (
  `FaeTag` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `emplacement` varchar(50) DEFAULT NULL,
  `serial` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `Etat` int(11) DEFAULT NULL,
  `categorieID` int(11) DEFAULT NULL,
  PRIMARY KEY (`FaeTag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matériel`
--

INSERT INTO `matériel` (`FaeTag`, `type`, `brand`, `model`, `emplacement`, `serial`, `image`, `Etat`, `categorieID`) VALUES
('18216', 'Monitor', 'DELL', 'E2016H', 'Stock', '7371kn2', '../assests/images/stock/dell_E2016H.jpg', 0, 4),
('9269', 'Deskyop', 'DELL', 'Optiplex3050', 'Stock', '3dhzmn2', '../assests/images/stock/DELL_optiplex3050.jpg', 0, 1),
('9794', 'Monitor', 'DELL', 'E2016H', 'Stock', 'C071KN2', '../assests/images/stock/dell_E2016H.jpg', 0, 4),
('9699', 'Desktop', 'DELL', 'Optiplex3060', 'Stock', '8fn7br2', '../assests/images/stock/DELL_optiplex3060.jpg', 0, 1),
('9357', 'Monitor', 'DELL', 'E2016H', 'Stock', '6f91kn2', '../assests/images/stock/dell_E2016H.jpg', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Telephone` varchar(10) DEFAULT NULL,
  `TypeUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `Password`, `Telephone`, `TypeUser`) VALUES
('U0001', 'HOUDA', '0147', '0601020304', 1),
('U0002', 'IMAD', '0258', '0601020304', 1),
('U0003', 'ALI', '0369', '0601020304', 1),
('U0004', 'TAHA', '0159', '0601020304', 1),
('8888', 'Admin', 'F2022', '0610203040', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
