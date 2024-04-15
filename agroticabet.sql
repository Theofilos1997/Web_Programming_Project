-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2018 at 07:29 PM
-- Server version: 5.7.21-log
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agroticabids`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `last_name`, `first_name`, `username`, `hashed_password`, `email`) VALUES
(1, 'panagiotopoulos', 'grigoris', 'grigoris', '$2y$10$R0SB5DgjKGpOcEGee4KtdOpK5DauxMbKlYHR5rvU/8aHX7FVG9vkC', 'zopucohofi@2odem.com'),
(2, 'seve', 'dimitris', 'dimitris', '$2y$10$wn9nWCH2V.qKbl2KyLEp3uWfcAWNbRgECY0z4mNiA5b0pUUGG0P4W', 'zopucohofi@2odem.com'),
(3, 'vasiliou', 'pandelis', 'pandelis', '$2y$10$/j1ASGkRxXsKMJykOgfHRufbXXncHlf8OO4jcet6kzLGYPWvZ2xZm', 'zopucohofi@3odem.com');

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `description` text NOT NULL,
  `start_price` float DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `id_pro`, `code`, `count`, `description`, `start_price`, `date_start`, `time_start`, `date_end`, `time_end`, `active`) VALUES
(1, 1, 111, 500, ' ΕΞΑΙΡΕΤΙΚΗ ΠΟΙΟΤΗΤΑ!!', 0.4, '2018-05-26', '19:15:01', '2018-05-27', '19:15:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `code_auction` int(11) DEFAULT NULL,
  `code_trader` int(11) DEFAULT NULL,
  `price_offer` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `code_auction`, `code_trader`, `price_offer`, `date`, `time`) VALUES
(1, 1, 1, 0.45, '2018-05-26', '22:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `producers`
--

CREATE TABLE `producers` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text,
  `phone` text,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`id`, `last_name`, `first_name`, `username`, `password`, `address`, `phone`, `email`) VALUES
(1, 'seve', 'dimiris', 'dimitris_pr', 'Aa1!', ' 1704 Whaley Lane\r\nNew Berlin', ' 262-498-7746\r\n', 'vasilou@aditus.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `code` int(11) NOT NULL,
  `kind` varchar(255) DEFAULT NULL,
  `description` text,
  `payment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`code`, `kind`, `description`, `payment`) VALUES
(111, 'Πατάτες', 'Πατάτες ', 'Paypal'),
(112, ' Ντομάτες', ' Ντομάτες', ' Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `traders`
--

CREATE TABLE `traders` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traders`
--

INSERT INTO `traders` (`id`, `last_name`, `first_name`, `username`, `password`, `address`, `phone`, `email`) VALUES
(1, 'vasiliou', 'pandelis', 'pandelis_tr', 'Aa1!', ' 558 Glenwood Avenue\r\nCleveland', '216-357-2718\r\n', 'vasoxo@aditus.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `auctions_ibfk_2` (`id_pro`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_trader` (`code_trader`),
  ADD KEY `offers_ibfk_1` (`code_auction`);

--
-- Indexes for table `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `traders`
--
ALTER TABLE `traders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `traders`
--
ALTER TABLE `traders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_ibfk_1` FOREIGN KEY (`code`) REFERENCES `products` (`code`),
  ADD CONSTRAINT `auctions_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `producers` (`id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`code_auction`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `offers_ibfk_2` FOREIGN KEY (`code_trader`) REFERENCES `traders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
