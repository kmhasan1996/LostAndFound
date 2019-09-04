-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 03:29 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lost_and_found`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'pmondal@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `city_id`, `name`) VALUES
(1, 1, 'Dhanmondi'),
(2, 2, 'New Markhet'),
(3, 1, 'Badda'),
(4, 1, 'Natun Bazar');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Passport'),
(2, 'National Id'),
(5, 'Driving Licence'),
(6, 'Human'),
(7, 'Others'),
(8, 'Key'),
(9, 'Key');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `found_or_lost_date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `area` varchar(20) NOT NULL,
  `time_limit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `image`, `status`, `category`, `title`, `description`, `found_or_lost_date`, `location`, `city`, `area`, `time_limit`) VALUES
(24, 6, 'Mens-Solid-R-Neck-T-Shirt..3602310218-690.jpg', 'Found', 'Human', 'Test', 'jgvkh', '2019-08-21', 'Road', 'Dhaka', 'Dhanmondi', '2:00 am'),
(26, 6, 'FB_IMG_1559409252969.jpg', 'Lost', 'Others', 'Shoes', 'unknown', '2019-08-18', 'United', 'Rajshahi', 'New Markhet', '2:00 am'),
(27, 6, 'png-to-icon-14.jpg', 'Found', 'Others', 'Test', 'Big', '2019-08-07', 'Road', 'Dhaka', 'Dhanmondi', '2:00 am');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(5) NOT NULL,
  `image` varchar(200) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobno` varchar(25) NOT NULL,
  `fb_link` varchar(300) NOT NULL,
  `city` varchar(10) NOT NULL,
  `area` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `image`, `first_name`, `last_name`, `gender`, `dob`, `password`, `email`, `mobno`, `fb_link`, `city`, `area`) VALUES
(2, 'mondol.jpg', 'Prosenjit', 'Mondal', 'Male', '2019-07-05', '12345', 'pmondal@gmail.com', '01749796054', 'https://www.facebook.com/prosenjit.uiu', 'Dhaka', 'Dhanmondi'),
(6, '62164992_1256646614489889_266661101930807296_o.jpg', 'Mahidy', 'Hasan', 'Male', '2019-08-14', '12345', 'kmahidy@gmail.com', '01749796054', 'https://www.facebook.com/kmhasanuiucse', 'Rajshahi', 'New Markhe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
