-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2023 at 08:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

DROP TABLE IF EXISTS `employee_data`;
CREATE TABLE IF NOT EXISTS `employee_data` (
  `Employee_ID` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `age` int(11) NOT NULL,
  `hoursworked` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `department` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`Employee_ID`, `fname`, `lname`, `age`, `hoursworked`, `email`, `department`, `username`, `password`) VALUES
(2001, 'Muskan ', 'Dhingra', 20, 20, 'muskandhingra@gmail.com', 'IT', 'muskan2001', 'd87d6ee3b9b64940edaab66893edf0835cff22a56e33c1b3a75aecd4d187344720fceaa976b042dc82c4810898e905de29e99937c74c77d16e004cdecad41d48'),
(2002, 'Anupam', 'Mittal', 24, 45, 'mittal423@gmail.com', 'Sales', 'mittal123', 'c61b0a68b306b07560bd48c7c58375e701d8fd531d97bbd493faf19258402d7841375071a93334085f8c79e85970d874adc66beeda9071d79d50d3bffa5f1f97'),
(2003, 'Anjali', 'Arora', 20, 35, 'arora@gmail.com', 'Management', 'arora435', 'c400f975eaeca33f2f827099bff8b23a9c2a17d6ef12aada46d3e8ed300ca271297424a1eced6ee13652bc95a8cdcaf31a4256c9fbd6e5cff2ce3444a4e3ee32'),
(2004, 'Nitin', 'Bajaj', 23, 49, 'bajaj921@gmail.com', 'HR', 'nitin921', '06255b02e19d206f28da831490cbb52433577f8184878e5a169072725a1fac17c4c6a9968821c542fc858a19280df09883293b4c639a384310fa944391a6d0ab');

-- --------------------------------------------------------

--
-- Table structure for table `imagestest`
--

DROP TABLE IF EXISTS `imagestest`;
CREATE TABLE IF NOT EXISTS `imagestest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imagestest`
--

INSERT INTO `imagestest` (`id`, `name`, `image`) VALUES
(3, 'management.jfif', './uploads/management.jfif'),
(4, 'hr.jfif', './uploads/hr.jfif'),
(5, 'group.jfif', './uploads/group.jfif'),
(6, 'employee.jfif', './uploads/employee.jfif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;