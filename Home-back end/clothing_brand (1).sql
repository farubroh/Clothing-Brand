-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 03:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing_brand`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`Id`, `Email`, `Password`) VALUES
(0, 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `catagoreis`
--

CREATE TABLE `catagoreis` (
  `Id` int(11) NOT NULL,
  `Catagories` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagoreis`
--

INSERT INTO `catagoreis` (`Id`, `Catagories`, `Status`) VALUES
(6, 'ababa', 1),
(9, 'omar', 1),
(10, 'newcatagories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Comment` text NOT NULL,
  `Added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Id`, `Name`, `Email`, `Mobile`, `Comment`, `Added_on`) VALUES
(2, 'omar faruk', 'adafs@gmail.com', '01756212818', 'after deleting', '2022-08-23 08:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Catagories_id` int(11) NOT NULL,
  `P_name` varchar(255) NOT NULL,
  `P_mrp` float NOT NULL,
  `Selling_price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Short_desc` varchar(2000) NOT NULL,
  `Description` text NOT NULL,
  `Meta_titile` varchar(2000) NOT NULL,
  `Meta_desc` varchar(2000) NOT NULL,
  `Meta_keyword` varchar(2000) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Catagories_id`, `P_name`, `P_mrp`, `Selling_price`, `Quantity`, `Image`, `Short_desc`, `Description`, `Meta_titile`, `Meta_desc`, `Meta_keyword`, `Status`) VALUES
(2, 3, 'dfsaf', 1000, 900, 30, '', 'fsaf', 'asfsafeae', '', '', '', 0),
(3, 3, 'fdasger', 111, 1, 1111, '', 'efar43', 'eraer', '', '', '', 0),
(4, 10, 'gsdg', 111, 11, 111, '', 'fsafdaf', 'fasfaf', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `catagoreis`
--
ALTER TABLE `catagoreis`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagoreis`
--
ALTER TABLE `catagoreis`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
