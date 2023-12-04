-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 07:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `culinary_connection`
--

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `Market_ID` int(11) NOT NULL,
  `Provider_Name` text NOT NULL,
  `Item_Name` text NOT NULL,
  `Item_Type` text NOT NULL,
  `Image` text NOT NULL,
  `Created_At` text NOT NULL DEFAULT current_timestamp(),
  `Expire_At` text NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`Market_ID`, `Provider_Name`, `Item_Name`, `Item_Type`, `Image`, `Created_At`, `Expire_At`, `Price`, `Quantity`) VALUES
(3, 'Alice Akinyi', 'Gurassa', 'Meal', 'Gurassa, Sudan Flatbread.jpg', '2023-11-12 20:21:33', '', 200, 19),
(4, 'Pamela Dan', 'Tandoori', 'Meal', 'Tandoori.jpeg', '2023-11-20 18:48:10', '', 1640, 10),
(5, 'Pamela Dan', 'Tandoori', 'Meal', 'Tandoori.jpeg', '2023-11-20 18:48:10', '', 1640, 10),
(6, 'Pamela Dan', 'Tika', 'Meal', 'chickentikkakebab.jpg', '2023-11-20 18:51:29', '', 1200, 5),
(7, 'Pamela Dan', 'Thali', 'Meal', 'Thali.jpeg', '2023-11-20 18:54:13', '', 500, 3),
(8, 'Andrew Ndeso', 'Mapo Tofu', 'Meal', 'Mapo tofu.jpg', '2023-11-20 19:02:34', '', 1500, 7),
(9, 'Andrew Ndeso', 'Deep fried Tarantula', 'Meal', 'Deep fried tarantula.jpeg', '2023-11-20 19:03:43', '', 1600, 11),
(10, 'Oziah Ori', 'White Truffle', 'Ingredient', 'white truffle.jpeg', '2023-11-27 18:33:58', '2024-01-12', 20, 17),
(11, 'Oziah Ori', 'Ibihaza', 'Meal', 'ibihaza.jpeg', '2023-11-27 18:36:49', '', 500, 8),
(12, 'Oziah Ori', 'Dulce de leche', 'Meal', 'Dulce de leche.jpeg', '2023-11-27 18:40:58', '', 2000, 10),
(13, 'Andrew Ndeso', 'Saffron', 'Ingredient', 'Saffron.jpeg', '2023-11-27 18:57:19', '2023-12-12', 200, 2),
(14, 'Pamela Dan', 'Moringa Leaves', 'Ingredient', 'Moringa Leaves.jpeg', '2023-11-27 18:59:32', '2023-12-23', 600, 12),
(15, 'Oziah Ori', 'Himalayas Morels', 'Ingredient', 'Himalayas Morels.jpeg', '2023-11-27 20:13:35', '2023-12-12', 299, 19),
(16, 'Alice Akinyi', 'Ratatouille', 'Meal', 'Rattouille.jpg', '2023-12-04 18:07:21', '', 2000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `Provider_Name` text NOT NULL,
  `Item_Name` text NOT NULL,
  `Item_Type` text NOT NULL,
  `Buyer_Name` text NOT NULL,
  `Created_At` text NOT NULL DEFAULT current_timestamp(),
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Status` enum('Pending','Cancelled','Completed','On Route') NOT NULL DEFAULT 'Pending',
  `Payment_Means` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Provider_Name`, `Item_Name`, `Item_Type`, `Buyer_Name`, `Created_At`, `Price`, `Quantity`, `Status`, `Payment_Means`) VALUES
(2, 'Alice Akinyi', 'Gurassa', ' Meal', 'Brian Ochieng', '2023-11-12 20:23:01', 200, 1, 'Completed', 'M-PESA'),
(3, 'Pamela Dan', 'Thali', ' Meal', 'Augustine Dero', '2023-11-27 19:08:22', 500, 2, 'Completed', 'M-PESA'),
(4, 'Andrew Ndeso', 'Deep fried Tarantula', ' Meal', 'Augustine Dero', '2023-11-27 19:24:18', 1600, 3, 'Cancelled', 'Debit Card'),
(5, 'Oziah Ori', 'Ibihaza', ' Meal', 'Augustine Dero', '2023-11-27 19:24:53', 500, 2, 'Completed', 'M-PESA'),
(6, 'Oziah Ori', 'White Truffle', ' Ingredient', 'Naomi Maria', '2023-11-27 19:27:51', 20, 3, 'Completed', 'M-PESA'),
(7, 'Pamela Dan', 'Moringa Leaves', ' Ingredient', 'Augustine Dero', '2023-12-04 15:59:55', 600, 5, 'Pending', 'M-PESA'),
(8, 'Oziah Ori', 'Himalayas Morels', ' Ingredient', 'Augustine Dero', '2023-12-04 16:00:52', 299, 4, 'Cancelled', 'M-PESA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `country` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `email`, `phone_number`, `password`, `role`, `country`) VALUES
(1, 'BRIAN OCHIENG ODHIAMBO', 'brian@gmail.com', '07897663435', '53629bb005990ce3cf119ab61aa35177', 'Administrator', NULL),
(5, 'Alice Akinyi', 'alice@gmail.com', '0726538311', '7b6ebd99e9eb8651324558efd413e63d', 'Culinary Providers', 'Kenya'),
(6, 'Brian Ochieng', 'brianochiengodhiambo18@gmail.com', '+254114917724', '7b6ebd99e9eb8651324558efd413e63d', 'User', 'Kenya'),
(7, 'Brian Ochieng', 'brianodhiambo20@gmail.com', '+254123456896', '7b6ebd99e9eb8651324558efd413e63d', 'User', 'Kenya'),
(8, 'Pamela Dan', 'pam@gmail.com', '+254126538311', '7b6ebd99e9eb8651324558efd413e63d', 'Culinary Providers', 'Kenya'),
(9, 'Augustine Dero', 'AgustineD@gmail.com', '+254723456192', '7b6ebd99e9eb8651324558efd413e63d', 'User', 'Kenya'),
(10, 'Andrew Ndeso', 'ANdeso@gmail.com', '+254145693587', '7b6ebd99e9eb8651324558efd413e63d', 'Culinary Providers', 'Kenya'),
(11, 'Winnie Halion', 'winnie@gmail.com', '0765238326', '7b6ebd99e9eb8651324558efd413e63d', 'User', 'Kenya'),
(12, 'Oziah Ori', 'Oziah@gmail.com', '+254786305267', '7b6ebd99e9eb8651324558efd413e63d', 'Culinary Providers', 'Kenya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`Market_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `Market_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
