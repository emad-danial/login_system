-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2019 at 06:48 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `password` text NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `created_at`, `password`, `updated_at`) VALUES
(1, 'emad', 'dd@gmail.come', '011132674', '2019-12-22 21:08:51', '$2y$10$Miv200BsIkUxgd2CKy/5hOJjrZTzBWQaoMXg9fut6SJDUDIsszblS', '2019-12-22 21:08:51'),
(2, 'emad danial', 'dddd@gmail.com', '01113267477', '2019-12-22 21:22:11', '$2y$10$3LQvF1VDy0pYasvc06o6g.pG1Dv3VDJ0piHH31aMtHpTilALROAqq', '2019-12-22 21:22:11'),
(3, 'emad', 'emaddanialrefaat@gmail.com', '0123456789', '2019-12-22 21:47:23', '$2y$10$DLcamPEFvrvBiOfEM5bLQuknuJ2mbGlGOgUpQfsY.WbBz5nV1UUuC', '2019-12-22 21:47:23'),
(4, 'ememem', 'ememad@gmial.com', '01113267478', '2019-12-28 16:16:13', '$2y$10$yB3YLPP5wAz.2jTxenufVewfz27glz5iIdPhuE67g4HU8VvFCXYci', '2019-12-28 16:16:13'),
(5, 'admin admin', 'admin@yahoo.com', '01113267455', '2019-12-28 17:27:59', '$2y$10$MqsEjRfges8du4T72jQGh.ThIljYKItVABR9I7ugvUO8yj..vUb2u', '2019-12-28 17:27:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
