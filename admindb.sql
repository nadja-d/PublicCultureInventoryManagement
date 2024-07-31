-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 05:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admindb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateProduct` (IN `p_name` VARCHAR(255), IN `p_stock` INT, IN `p_description` TEXT, IN `p_price` DECIMAL(10,2), IN `p_product_category` VARCHAR(255), IN `p_product_image` VARCHAR(255))   BEGIN
    INSERT INTO product (name, stock, description, price, productCategory, productImage)
    VALUES (p_name, p_stock, p_description, p_price, p_product_category, p_product_image);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteProduct` (IN `p_productID` INT)   BEGIN
    DELETE FROM product
    WHERE productID = p_productID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllOrders` ()   BEGIN
    SELECT 
        orderID,
        customer_name,
        productID,
        quantityOrdered,
        total_amount,
        order_status,
        created_at
    FROM 
        `order`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllProducts` ()   BEGIN
    SELECT 
        productID,
        name,
        stock,
        description,
        price,
        productCategory,
        productImage
    FROM 
        product;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetProductAttributesByName` (IN `p_productName` VARCHAR(255))   BEGIN
    SELECT 
        productID,
        name,
        stock,
        description,
        price,
        productCategory,
        productImage
        FROM product WHERE name = p_productName;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateProduct` (IN `p_productID` INT, IN `p_name` VARCHAR(255), IN `p_stock` INT, IN `p_description` TEXT, IN `p_price` DECIMAL(10,2), IN `p_product_category` VARCHAR(255), IN `p_product_image` VARCHAR(255))   BEGIN
    UPDATE product
    SET
        name = p_name,
        stock = p_stock,
        description = p_description,
        price = p_price,
        productCategory = p_product_category,
        productImage = p_product_image
    WHERE productID = p_productID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validateLogin` (IN `p_username` VARCHAR(255), IN `p_password` VARCHAR(255))   BEGIN
    SELECT username FROM admin WHERE username = p_username AND password = p_password;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `name`, `email`, `created_at`) VALUES
(1, 'maryjane', 'mary99', 'Mary Jane', 'maryj@clover.com', '2024-01-05 07:45:52'),
(2, 'drake', 'drake99', 'Drake', 'drake@clover.com', '2024-01-05 07:46:27'),
(3, 'lolakelly', 'lola99', 'Lola', 'lolakelly@clover.com', '2024-01-05 07:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantityOrdered` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_status` enum('Pending','Processing','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `customer_name`, `productID`, `quantityOrdered`, `total_amount`, `order_status`, `created_at`) VALUES
(1, 'Bob Johnson', 2, 3, 1800000.00, 'Delivered', '2024-01-07 05:00:00'),
(2, 'Alice Brown', 4, 2, 1200000.00, 'Delivered', '2024-01-07 07:45:00'),
(3, 'Charlie Wilson', 5, 1, 600000.00, 'Cancelled', '2024-01-07 09:20:00'),
(4, 'Eva Miller', 2, 1, 600000.00, 'Shipped', '2024-01-08 02:30:00'),
(5, 'David Davis', 4, 2, 1200000.00, 'Delivered', '2024-01-08 04:45:00'),
(6, 'Grace Lee', 1, 3, 1800000.00, 'Processing', '2024-01-08 06:15:00'),
(7, 'Frank Harris', 3, 1, 600000.00, 'Shipped', '2024-01-08 08:00:00'),
(8, 'Olivia Robinson', 5, 2, 1200000.00, 'Delivered', '2024-01-08 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `productCategory` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `stock`, `description`, `price`, `productCategory`, `productImage`) VALUES
(1, 'Absentee Hoodie - Black', 50, 'Absentee Hoodie Collection', 600000.00, 'Hoodie', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/12/12/6ef8f50c-3711-4236-9ef2-a58d411f2a9b.jpg'),
(2, 'Absentee Hoodie - Grey', 50, 'Absentee Hoodie Collection', 600000.00, 'Hoodie', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/12/12/b9c5586a-cc1d-4eee-a7b5-f1f6b7f8af29.jpg'),
(3, 'New Life Hoodie - Black', 50, 'New Life Hoodie Collection', 600000.00, 'Hoodie', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/10/27/5966809a-b3c8-4c41-9a54-0fd2b72a46ec.jpg'),
(4, 'Living Hoodie - Black', 50, 'Living Hoodie Collection', 600000.00, 'Hoodie', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/10/27/eb2d7ea6-1685-4c9b-91bd-bb6b70a7e7c5.jpg'),
(5, 'Living Hoodie - Misty Grey', 50, 'Living Hoodie Collection', 600000.00, 'Hoodie', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/10/27/f138eb84-42ec-4878-9f8e-771e5cea8cc5.jpg'),
(6, 'No Cure Hoodie - Black', 50, 'No Cure Hoodie Collection', 420000.00, 'Hoodie', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/9/26/3ca54549-f49c-4857-955c-f60e5a4c1d9a.jpg'),
(7, 'No Cure Hoodie - Sand', 50, 'No Cure Hoodie Collection', 420000.00, 'Hoodie', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/9/26/2fb50d84-9337-48dc-8423-438d3913f992.jpg'),
(8, 'Unity Tee - Black', 35, 'Unity Tea Collection', 300000.00, 'T-Shirt', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/9/26/9dd762a2-9d43-471c-bf8c-dbd97ce2923b.jpg'),
(9, 'Unity Tee - White', 35, 'Unity Tea Collection', 300000.00, 'T-Shirt', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/9/26/e00edcfd-48e0-49be-834d-2f6ce3d82bc6.jpg'),
(10, 'Unity Tee - Blue', 35, 'Unity Tea Collection', 300000.00, 'T-Shirt', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/9/26/8fd9edfe-fa38-41b5-8f11-42639c4a3573.jpg'),
(11, 'Checkered Tee - White', 35, 'Checkered Tee Collection', 300000.00, 'T-Shirt', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/7/4/5d66de89-37ec-4ce8-be9c-a2bfa76b6d87.png'),
(12, 'Checkered Tee - Black', 35, 'Checkered Tee Collection', 300000.00, 'T-Shirt', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/7/4/384c83cb-99bd-435b-a2c0-051633552755.png'),
(13, 'Checkered Tee - Misty', 35, 'Checkered Tee Collection', 300000.00, 'T-Shirt', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/7/4/9c4614a0-3578-493d-8299-45737a85e5c3.png'),
(14, 'Checkered Tee - Neon Green', 35, 'Checkered Tee Collection', 300000.00, 'T-Shirt', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/7/4/3edade13-b259-4748-aef2-f1f95519d440.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
