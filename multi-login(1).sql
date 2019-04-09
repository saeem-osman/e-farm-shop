-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 12:26 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `district` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `district`) VALUES
(8, 'hello', 'ehho@gmail.com', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(9, 'saeem', 'admin@nsu.org', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(10, 'rakib', 'rakib@local@gmail.com', 'buyer', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(11, 'payel', 'payel@gmail.com', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'rajshahi'),
(12, 'salam', 'salam@gmail.com', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'dhaka'),
(13, 'saeem', 'osman@gmail.com', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'dhaka'),
(14, 'admin', 'admin@admin.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'chittagong'),
(15, 'buyer', 'buyer@buyer.com', 'buyer', '827ccb0eea8a706c4c34a16891f84e7b', 'rajshahi'),
(16, 'seller', 'seller@seller.com', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'sylhet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
