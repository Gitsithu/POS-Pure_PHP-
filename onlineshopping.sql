-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 08:35 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'phone'),
(2, 'car'),
(3, 'food'),
(4, 'computer'),
(5, 'house');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delievery_name` varchar(30) NOT NULL,
  `delievery_phone` varchar(20) NOT NULL,
  `delievery_address` varchar(225) NOT NULL,
  `order_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `Send date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `delievery_name`, `delievery_phone`, `delievery_address`, `order_date`, `status`, `Send date`) VALUES
(3, 8, 'Sithu', '010203', 'asdfghjkl', '2018-07-02', 0, '0000-00-00'),
(4, 8, 'Sithu', '010203', 'asdfghjkl', '2018-07-02', 0, '0000-00-00'),
(5, 8, 'Sithu', '010203', 'asdfghjkl', '2018-07-02', 0, '0000-00-00'),
(6, 8, 'Sithu', '010203', 'asdfghjkl', '2018-07-02', 0, '0000-00-00'),
(7, 8, 'kk', '010203', 'asdfghjkl', '2018-07-02', 0, '0000-00-00'),
(8, 8, 'stns', '010203', 'asdfghjkl', '2018-07-03', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `product_qty`, `amount`) VALUES
(0, 1, 1, 100000),
(0, 1, 1, 100000),
(0, 1, 1, 100000),
(0, 1, 1, 100000),
(0, 1, 1, 100000),
(0, 1, 1, 0),
(0, 1, 1, 0),
(0, 1, 1, 0),
(3, 1, 1, 0),
(4, 1, 1, 100000),
(6, 1, 1, 100000),
(7, 10, 1, 100000),
(8, 3, 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `price`, `qty`, `photo`) VALUES
(1, 'ss', 1, 100000, 20, 'Desert - Copy (2).jpg'),
(3, 'lol', 1, 20000, 10000, 'Tulips.jpg'),
(4, 'jj', 2, 1000, 100, 'Hydrangeas.jpg'),
(10, 'gg', 5, 100000, 100, 'Koala.jpg'),
(11, 'kk', 4, 100, 100, 'Lighthouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(80) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `phone`, `address`, `role`) VALUES
(1, 'sdfa', '202cb962ac59075b964b07152d234b70', '', '', '', 'admin'),
(2, 'sfjsakj', '202cb962ac59075b964b07152d234b70', '', '', '', 'admin'),
(3, 'sdaf', '202cb962ac59075b964b07152d234b70', '', '', '', 'admin'),
(4, 'ss', 'c20ad4d76fe97759aa27a0c99bff6710', '', '', '', 'admin'),
(5, 'Admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', 'admin'),
(6, 'cowcho', '1c3bef4ff42fd0874018634417e83b75', 'cowcho@email.com', '12345', '12345', 'user'),
(7, 'st', '202cb962ac59075b964b07152d234b70', '', '', '', 'admin'),
(8, 'Sithu', '202cb962ac59075b964b07152d234b70', 'asdf@gmail.com', '010203', 'asdfghjkl', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
