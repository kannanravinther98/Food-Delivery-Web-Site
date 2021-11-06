-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 08:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_ID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Item_Description` varchar(300) NOT NULL,
  `Item_Type` varchar(50) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_ID`, `Item_Name`, `Item_Description`, `Item_Type`, `Price`, `Image`) VALUES
(00000048, 'Pizza', 'Prepared with high quality bread, mozzarella cheese, beef and mayonese', 'Food', 20.00, 'pizza.png'),
(00000049, 'Dumplings', 'Prepared with high quality dumplings and vegetables', 'Food', 10.00, 'dumpling.png'),
(00000050, 'Avocado Toast', 'Prepared with high quality bread, egg, avocado and garlic sauce', 'Food', 15.00, 'toast.png'),
(00000051, 'Macaroni', 'Prepared with Italian macaronis, fresh tomatoes and chilies, with smoked grilled beef', 'Food', 20.00, '1.jpg'),
(00000052, 'Haha', 'dsadadsada', 'Food', 27.40, 'foodimage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `User_ID` int(9) NOT NULL,
  `Total_Price` float(10,2) NOT NULL,
  `Order_Date` date NOT NULL,
  `Order_Time` time NOT NULL,
  `Order_Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `User_ID`, `Total_Price`, `Order_Date`, `Order_Time`, `Order_Status`) VALUES
(25499316, 771365440, 80.00, '2020-02-06', '00:59:00', 'In Preperation'),
(74591560, 771365440, 65.00, '2020-02-06', '01:36:54', 'In Preperation');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `Order_ID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `Item_ID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`Order_ID`, `Item_ID`, `Quantity`) VALUES
(25499316, 00000048, 4),
(74591560, 00000048, 1),
(74591560, 00000049, 1),
(74591560, 00000050, 1),
(74591560, 00000051, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(9) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Contact_No` varchar(11) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `Password`, `Email`, `First_Name`, `Last_Name`, `Contact_No`, `Address`, `Type`) VALUES
(100123586, 'admin', 'admin', 'admin@cafe.com', 'Alex', 'Liu', '0162399773', 'MMU', 'Admin'),
(100937586, 'test', 'test', 'a@a.com', 'Alex', 'Liu', '0166899773', 'MMU', 'User'),
(771365440, 'alex', 'alex', 'alex@gmail.com', 'Alex', 'Liu', '0166073123', 'Bertam Perdana', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`Order_ID`,`Item_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_ID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `item` (`Item_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
