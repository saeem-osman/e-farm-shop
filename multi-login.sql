-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 04:05 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `o_id` int(20) NOT NULL,
  `p_id` int(20) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(20) NOT NULL,
  `produc_ttitle` varchar(255) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `qty` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `total_amt` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`o_id`, `p_id`, `ip_add`, `user_id`, `produc_ttitle`, `product_image`, `qty`, `price`, `total_amt`) VALUES
(14, 2, '0', 15, 'Cauliflower', 'img/kopi.jpg', 20, 8, 8),
(15, 3, '0', 15, 'Green Coconut', 'img/dab.png', 30, 15, 15),
(16, 7, '0', 15, 'potato', 'img/potato.png', 15, 13, 13),
(17, 9, '0', 19, 'apple', 'img/RedApple.jpg', 12, 100, 100),
(18, 7, '0', 19, 'potato', 'img/potato.png', 15, 13, 13),
(19, 1, '0', 19, 'Banana', 'img/kola.jpg', 25, 5, 5);

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
(15, 4, 'Banana', 3, 200, 40, 6, 'img/kola.jpg'),
(11, 5, 'carrot', 2, 130, 24, 15, 'img/carrot.png'),
(11, 6, 'lemon', 2, 134, 12, 10, 'img/lemon.png'),
(11, 7, 'potato', 2, 145, 15, 13, 'img/potato.png'),
(11, 8, 'apple', 3, 12, 12, 100, 'img/RedApple.jpg'),
(11, 9, 'apple', 3, 12, 12, 100, 'img/RedApple.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int(15) NOT NULL,
  `s_name` varchar(223) NOT NULL,
  `c_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `s_name`, `c_id`) VALUES
(1, 'processing', 1),
(2, 'completed', 2),
(3, 'pending', 3);

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
  `district` varchar(250) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `user_type`, `password`, `district`, `address`) VALUES
(8, 'Hasan Khan', 'hasan@gmail.com', '01745632566', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'Rajshahi', 'Nakhalpara, Rajshahi'),
(9, 'Hridoy Khan', 'admin@nsu.org', '0145865456', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'Rajshahi', 'Rajapur, Rajshahi.'),
(10, 'Akash Miah', 'rakib@local@gmail.com', '0145679564', 'buyer', '827ccb0eea8a706c4c34a16891f84e7b', 'Rajshahi', 'Volapur, Rajshahi'),
(11, 'Mr. Kamal Khan', 'seller@seller.com', '01632564789', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'rajshahi', 'Kamrangir Chor, Lamapara, Rajshahi'),
(12, 'Rafsan Jani', 'salam@gmail.com', '0198745622', 'buyer', '827ccb0eea8a706c4c34a16891f84e7b', 'Rajshahi', 'Kamarpara, Rajshahi'),
(13, 'Rafiq Hossain', 'osman@gmail.com', '01956474121', 'buyer', '827ccb0eea8a706c4c34a16891f84e7b', 'Rajshahi', 'Bokshibazar, Rajshahi'),
(14, 'Saeem Osman', 'admin@admin.com', '', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'chittagong', ''),
(15, 'Ahnaf Kamal', 'buyer@buyer.com', '01670400686', 'buyer', '827ccb0eea8a706c4c34a16891f84e7b', 'Khulna', ''),
(16, 'Aslam Bhai', 'saeemosman_bd@yahoo.com', '01670400686', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'Dhaka', ''),
(17, 'Halim Miah', 'halim@halim.com', '0194568987', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'rajshahi', 'Aslampur, Rajshahi'),
(18, 'Kamal Uddin', 'kamal@kamal.com', '019568789', 'seller', '827ccb0eea8a706c4c34a16891f84e7b', 'rajshahi', 'Shantipur, Rajshahi'),
(19, 'masud', 'masud@gmail.com', '', 'buyer', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`o_id`);

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
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `o_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
