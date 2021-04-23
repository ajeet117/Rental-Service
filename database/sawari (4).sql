-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 07:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sawari`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `username`, `admin_password`) VALUES
(1, 'admin', '$2y$10$iusesomecrazystrings2usP2cI8U6Yc69d9glDWipfBNxbHWvFHa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bookings`
--

CREATE TABLE `tb_bookings` (
  `booking_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `vehicle_id` int(3) NOT NULL,
  `from_date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_date` date NOT NULL,
  `to_time` time NOT NULL,
  `payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bookings`
--

INSERT INTO `tb_bookings` (`booking_id`, `user_id`, `vehicle_id`, `from_date`, `from_time`, `to_date`, `to_time`, `payment`) VALUES
(1, 4, 1, '2021-04-21', '10:00:00', '2021-04-22', '10:00:00', 'Booked'),
(2, 4, 1, '2021-04-19', '12:00:00', '2021-04-20', '17:00:00', 'Booked'),
(3, 4, 1, '2021-04-23', '10:00:00', '2021-04-23', '10:00:00', 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `brand_id` int(3) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_brand`
--

INSERT INTO `tb_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Pulsar 1'),
(6, 'Honda'),
(7, 'KTM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(3) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `liscence_no` varchar(100) NOT NULL,
  `liscence_image` varchar(100) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `firstname`, `lastname`, `email`, `phone`, `liscence_no`, `liscence_image`, `user_image`, `user_password`) VALUES
(3, 'Ajit', 'Maharjan', 'admin@admin.com', '9801234564', '1234567890', '', '', '$2y$10$iusesomecrazystrings2uwxqVj7J7zQRBheEH.fn4YwpBoRp5IC6'),
(4, 'Ram', 'Laxman', 'admin@adming.com', '9803240627', '1234567890', 'collage.jpg', 'IMAGE.jpg', '$2y$10$iusesomecrazystrings2uqHAmBhvLR.JnKVUDmhFIwNtiqWwa4We');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vehicle`
--

CREATE TABLE `tb_vehicle` (
  `vehicle_id` int(3) NOT NULL,
  `vehicle_title` varchar(100) NOT NULL,
  `brand_id` int(3) NOT NULL,
  `vehicle_overview` varchar(333) NOT NULL,
  `hourly_price` varchar(100) NOT NULL,
  `vehicle_type_id` int(3) NOT NULL,
  `vehicle_milage` varchar(100) NOT NULL,
  `vehicle_engine` varchar(100) NOT NULL,
  `vehicle_image1` varchar(100) NOT NULL,
  `vehicle_image2` varchar(100) NOT NULL,
  `vehicle_image3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vehicle`
--

INSERT INTO `tb_vehicle` (`vehicle_id`, `vehicle_title`, `brand_id`, `vehicle_overview`, `hourly_price`, `vehicle_type_id`, `vehicle_milage`, `vehicle_engine`, `vehicle_image1`, `vehicle_image2`, `vehicle_image3`) VALUES
(1, 'NS 2000', 1, 'NS is love.', '2000', 1, '45', '200', 'knowledges_base_bg.jpg', 'knowledges_base_bg.jpg', 'knowledges_base_bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vehicle_type`
--

CREATE TABLE `tb_vehicle_type` (
  `vehicle_type_id` int(3) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vehicle_type`
--

INSERT INTO `tb_vehicle_type` (`vehicle_type_id`, `vehicle_type`) VALUES
(1, 'Bike'),
(2, 'Scooter'),
(3, 'Eletrical');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicle_type_id` (`vehicle_type_id`),
  ADD KEY `vehicle_type_id_2` (`vehicle_type_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `tb_vehicle_type`
--
ALTER TABLE `tb_vehicle_type`
  ADD PRIMARY KEY (`vehicle_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  MODIFY `booking_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `brand_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  MODIFY `vehicle_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_vehicle_type`
--
ALTER TABLE `tb_vehicle_type`
  MODIFY `vehicle_type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  ADD CONSTRAINT `tb_bookings_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `tb_vehicle` (`vehicle_id`),
  ADD CONSTRAINT `tb_bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`);

--
-- Constraints for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD CONSTRAINT `tb_vehicle_ibfk_1` FOREIGN KEY (`vehicle_type_id`) REFERENCES `tb_vehicle_type` (`vehicle_type_id`),
  ADD CONSTRAINT `tb_vehicle_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `tb_brand` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
