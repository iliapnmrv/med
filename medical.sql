-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 05:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `last-medical`
--

CREATE TABLE `last-medical` (
  `id` int(11) NOT NULL,
  `unique-id` int(11) NOT NULL,
  `last-medical-date` date NOT NULL,
  `days` int(11) NOT NULL,
  `overdue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `last-medical`
--

INSERT INTO `last-medical` (`id`, `unique-id`, `last-medical-date`, `days`, `overdue`) VALUES
(1, 10, '2020-06-18', 364, 29),
(2, 11, '2020-12-08', 191, 0),
(3, 12, '2020-07-30', 322, 0),
(4, 13, '2021-06-17', 0, 0),
(5, 14, '2019-10-01', 625, 290),
(6, 15, '2020-05-22', 391, 56),
(7, 16, '2021-05-14', 34, 0),
(8, 17, '2021-06-01', 16, 0),
(9, 18, '2020-03-11', 463, 128),
(10, 19, '2020-07-04', 348, 13),
(11, 20, '2021-02-16', 121, 0);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `unique-id` int(11) NOT NULL,
  `worker-name` varchar(50) NOT NULL,
  `position` varchar(80) NOT NULL,
  `date-of-birth` date NOT NULL,
  `nomer-smeny` int(11) NOT NULL,
  `exception` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `unique-id`, `worker-name`, `position`, `date-of-birth`, `nomer-smeny`, `exception`) VALUES
(1, 10, 'Иванов Иван', 'Работник', '2021-05-18', 0, 1),
(2, 11, 'Петров Петр', 'Директор', '2021-05-18', 0, 1),
(3, 12, 'Сидоров', '', '2020-10-13', 0, 0),
(4, 13, 'Кузнецов Кузнец', 'бухгалтер', '2021-03-08', 0, 0),
(5, 14, 'Морозов Мороз', 'программист', '2020-12-08', 0, 0),
(8, 15, 'Олег Вахта', 'Строитель', '2021-01-07', 1, 0),
(9, 16, 'Михаил Вахта', 'Строитель', '2021-02-28', 2, 0),
(10, 17, 'Борис Вахта', 'Строитель', '2020-08-04', 3, 0),
(11, 18, 'Валентин Вахта', 'Строитель', '2021-01-05', 4, 0),
(12, 19, 'Владислав Вахта', '', '2021-02-03', 1, 0),
(13, 20, 'Александр Вахта', 'Строитель', '2021-01-24', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `last-medical`
--
ALTER TABLE `last-medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `last-medical`
--
ALTER TABLE `last-medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
