-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2018 at 06:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Lambton`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_tickets`
--

CREATE TABLE `booked_tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `ID` int(10) NOT NULL,
  `Pickup_Location` varchar(250) NOT NULL,
  `Drop_Location` varchar(250) NOT NULL,
  `Time` time NOT NULL,
  `Day` varchar(20) NOT NULL,
  `number_of_tickets` int(11) NOT NULL DEFAULT '50',
  `seats_taken` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`ID`, `Pickup_Location`, `Drop_Location`, `Time`, `Day`, `number_of_tickets`, `seats_taken`) VALUES
(1, 'Brampton', 'Lambton College', '06:45:00', 'Weekdays', 50, 0),
(2, 'Mississuaga', 'Lambton College', '06:45:00', 'Weekdays', 50, 0),
(3, 'Brampton', 'Lambton College', '10:20:00', 'Weekdays', 50, 0),
(4, 'Brampton', 'Lambton College', '11:00:00', 'ALL', 50, 0),
(5, 'Mississuaga', 'Lambton College', '11:15:00', 'Weekdays', 50, 0),
(6, 'Brampton', 'Lambton College', '11:40:00', 'ALL', 50, 0),
(7, 'Brampton', 'Lambton College', '12:30:00', 'ALL', 50, 0),
(8, 'Mississuaga', 'Lambton College', '11:00:00', 'ALL', 50, 0),
(9, 'Brampton', 'Lambton College', '14:30:00', 'Weekdays', 50, 0),
(10, 'Brampton', 'Lambton College', '15:40:00', 'Weekdays', 50, 0),
(11, 'Brampton', 'Lambton College', '16:00:00', 'ALL', 50, 0),
(12, 'Brampton', 'Lambton College', '16:25:00', 'Weekdays', 50, 0),
(13, 'Mississuaga', 'Lambton College', '16:25:00', 'Weekdays', 50, 0),
(14, 'Lambton College', 'Brampton', '23:30:00', 'ALL', 50, 0),
(15, 'Lambton College', 'Mississuga/Brampton', '23:00:00', 'ALL', 50, 0),
(16, 'Lambton College', 'Brampton', '13:30:00', 'ALL', 50, 0),
(17, 'Lambton College', 'Mississuaga/Brampton', '13:45:00', 'ALL', 50, 0),
(18, 'Lambton College', 'Mississuaga/Brampton', '14:30:00', 'Weekdays', 50, 0),
(19, 'Lambton College', 'Mississuaga/Brampton', '15:30:00', 'ALL', 50, 0),
(20, 'Lambton College', 'Mississuaga/Brampton', '17:00:00', 'ALL', 50, 0),
(21, 'Lambton College', 'Brampton', '17:05:00', 'Weekdays', 50, 0),
(22, 'Lambton College', 'Mississuaga/Brampton', '18:00:00', 'ALL', 50, 0),
(23, 'Lambton College', 'Mississuaga/Brampton', '19:30:00', 'ALL', 50, 0),
(24, 'Lambton College', 'Mississuaga/Brampton', '19:45:00', 'ALL', 50, 0),
(25, 'Lambton College', 'Mississuaga/Brampton', '20:10:00', 'ALL', 50, 0),
(26, 'Lambton College', 'Brampton', '21:35:00', 'Weekdays', 50, 0),
(27, 'Lambton College', 'Mississuaga/Brampton', '21:45:00', 'Weekdays', 50, 0),
(28, 'Lambton College', 'Mississuaga/Brampton', '22:20:00', 'ALL', 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `is_login` varchar(255) NOT NULL DEFAULT 'false',
  `phone` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `is_login`, `phone`) VALUES
(3, 'ash', 'MTIzNA==', 'admin', 'false', ''),
(4, 'rishu', 'MTIz', 'user', 'true', '3657789438');

-- --------------------------------------------------------

--
-- Table structure for table `user_pass`
--

CREATE TABLE `user_pass` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pass_number` varchar(225) NOT NULL,
  `expiry_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pass`
--

INSERT INTO `user_pass` (`id`, `user_id`, `pass_number`, `expiry_date`, `name`, `student_id`) VALUES
(4, 4, '1535358422', '2019-02-19', 'Rishu', 'C01fjdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pass`
--
ALTER TABLE `user_pass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_pass`
--
ALTER TABLE `user_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
