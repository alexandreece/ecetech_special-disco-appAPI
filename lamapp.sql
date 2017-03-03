-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2017 at 11:40 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Score`
--

CREATE TABLE `Score` (
  `IdTeam` varchar(50) NOT NULL,
  `NomTeam` varchar(50) NOT NULL,
  `Score` int(4) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NbPlayer` int(2) NOT NULL,
  `Niveau` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Score`
--

INSERT INTO `Score` (`IdTeam`, `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau`) VALUES
('e555ed95-f91a-11e6-b50e-5c514fc8d9f3', 'Equipe1', 10, '2017-02-23 08:15:16', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f3', 'Equipe1', 10, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f1', 'Equipe2', 11, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f2', 'Equipe3', 12, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f4', 'Equipe4', 13, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f5', 'Equipe5', 14, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f6', 'Equipe6', 15, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f7', 'Equipe17', 16, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f8', 'Equipe8', 17, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f9', 'Equipe9', 18, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f12', 'Equipe10', 19, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f13', 'Equipe11', 20, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f14', 'Equipe12', 21, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f15', 'Equipe13', 22, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f16', 'Equipe14', 23, '2017-02-23 08:19:08', 5, 1),
('e555ed95-f91a-11e6-b50e-5c514fc8d9f17', 'Equipe15', 24, '2017-02-23 08:19:08', 5, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
