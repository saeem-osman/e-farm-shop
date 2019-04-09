-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 05:13 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `multi-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Vegetables'),
(3, 'Fruits'),
(4, 'Spices');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `userid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pcategoryid` int(11) NOT NULL,
  `avaiquantity` int(20) NOT NULL,
  `minquantity` int(11) NOT NULL,
  `pprice` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`userid`, `pid`, `pname`, `pcategoryid`, `avaiquantity`, `minquantity`, `pprice`, `path`) VALUES
(11, 1, 'Banana', 3, 100, 25, 5, 'img/kola.jpg'),
(11, 2, 'Cauliflower', 2, 80, 20, 8, 'img/kopi.jpg'),
(15, 3, 'Green Coconut', 3, 150, 30, 15, 'img/dab.png'),
(15, 4, 'Banana', 3, 200, 40, 6, 'img/kola.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `district` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `user_type`, `password`, `district`) VALUES
(8, 'Saeem Osman', 'ehho@gmail.com', '', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(9, 'Saeem Osman', 'admin@nsu.org', '', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(10, 'Saeem Osman', 'rakib@local@gmail.com', '', 'buyer', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(11, 'Saeem Osman', 'payel@gmail.com', '', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'rajshahi'),
(12, 'Saeem Osman', 'salam@gmail.com', '', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'dhaka'),
(13, 'Saeem Osman', 'osman@gmail.com', '', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'dhaka'),
(14, 'Saeem Osman', 'admin@admin.com', '', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'chittagong'),
(15, 'Ahnaf Kamal', 'buyer@buyer.com', '01670400686', 'buyer', '827ccb0eea8a706c4c34a16891f84e7b', 'Khulna'),
(16, 'Aslam Bhai', 'saeemosman_bd@yahoo.com', '01670400686', 'seller', 'e10adc3949ba59abbe56e057f20f883e', 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `product` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
