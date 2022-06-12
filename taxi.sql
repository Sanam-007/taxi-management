-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 07:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `contact number`) VALUES
(1, 'admin1@gmail.com', '11111', '01814567651'),
(2, 'admin2@gmail.com', '12345', '01914567876');

-- --------------------------------------------------------

--
-- Table structure for table `assigndriver`
--

CREATE TABLE `assigndriver` (
  `id` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigndriver`
--

INSERT INTO `assigndriver` (`id`, `did`, `tid`, `date`, `status`) VALUES
(1, 8, 43, '2022-04-24', 0),
(2, 1, 43, '2022-04-24', 1),
(3, 4, 45, '2022-05-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'BMW'),
(2, 'Mercedes'),
(3, 'Toyota'),
(4, 'Lexus'),
(5, 'Aston Martin'),
(6, 'Volkswagen');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `email`, `password`, `contact`, `dob`, `location`) VALUES
(1, 'raju islam', 'raju@gmail.com', '11', '01912332334', '2022-04-04', '2no gate,ctg'),
(2, 'rahim', 'rahim@gmail.com', '77777', '98987', '2022-04-14', 'GEC'),
(3, 'shumon', 'shumon@gmail.com', '11111', '98987', '2022-04-20', 'polytechniq'),
(4, 'karim', 'karim@gmail.com', '1111', '1234599', '2022-04-23', 'bohoddarhat'),
(5, 'jamil', 'jamil@gmail.com', '11111', '09876', '2022-04-02', 'badurtola'),
(6, 'kamal', 'kamal@gmail.com', '11111', '78789', '2022-05-02', 'mojaffornogor'),
(7, 'jalaal', 'jalal@gmail.com', '11111', '9899999', '2022-04-30', 'mohommadpur'),
(8, 'ali ahmed', 'ali@gmail.com', '11111', '012345', '2022-04-13', 'chondonpura'),
(9, 'mahfuj', 'mah123@gmail.com', '11111', '0987645', '2022-04-22', 'chawkbajar'),
(10, 'aziz', 'aziz@gmail.com', '11111', '767699', '2022-03-31', 'rohoman nogor');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model`) VALUES
(1, 'X5'),
(2, 'GT86'),
(3, 'Land Cruiser'),
(4, 'M4'),
(5, 'G63');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact number` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `name`, `email`, `password`, `contact number`, `dob`, `location`) VALUES
(1, 'Moli shen', 'moli@gmail.com', '11111', '01710234634', '1000-10-20', 'polytechnic,ctg'),
(2, 'Sonia akter', 'sonia@gmail.com', '123456', '0181234556', '2022-04-21', 'mirpur,dhaka'),
(3, 'Rajjak ahmed', 'raju@gmail.com', '125678', '01711014456', '2001-04-01', 'mojaffornogor,dhaka'),
(4, 'Nayar khan', 'nayar@gmail.com', '445445', '01714423456', '2002-04-07', 'rohomotnogor,ctg '),
(5, 'Ria akter', 'ria@gmail.com', '554554', '01814051751', '2001-04-26', 'nasirabad,ctg');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destiny` varchar(255) NOT NULL,
  `booking_time` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `source`, `destiny`, `booking_time`, `passenger_id`) VALUES
(1, '2 no gate', 'polytechniq', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE `taxi` (
  `id` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `model` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxi`
--

INSERT INTO `taxi` (`id`, `brand`, `number`, `model`) VALUES
(43, 2, 'DHAKA-METRO 1122', 2),
(44, 2, 'CHATTA-METRO 2341', 2),
(45, 4, 'DHAKA-METRO 4567', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigndriver`
--
ALTER TABLE `assigndriver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AD_1` (`did`),
  ADD KEY `FK_AD_2` (`tid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`),
  ADD KEY `FK_taxi-1` (`brand`),
  ADD KEY `FK_taxi-2` (`model`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigndriver`
--
ALTER TABLE `assigndriver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxi`
--
ALTER TABLE `taxi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigndriver`
--
ALTER TABLE `assigndriver`
  ADD CONSTRAINT `FK_AD_1` FOREIGN KEY (`did`) REFERENCES `driver` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_AD_2` FOREIGN KEY (`tid`) REFERENCES `taxi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taxi`
--
ALTER TABLE `taxi`
  ADD CONSTRAINT `FK_taxi-1` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_taxi-2` FOREIGN KEY (`model`) REFERENCES `model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
