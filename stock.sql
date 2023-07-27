-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2023 at 11:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `active`) VALUES
(5, 'color', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `attribute_parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attribute_parent_id`) VALUES
(5, 'Blue', 2),
(6, 'White', 2),
(7, 'M', 3),
(8, 'L', 3),
(9, 'Green', 2),
(10, 'Black', 2),
(12, 'Grey', 2),
(13, 'S', 3),
(14, '100', 4),
(15, 'blue', 5),
(16, 'green', 5),
(17, 'red', 5);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `active`) VALUES
(5, 'IPSO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`) VALUES
(4, 'Machine', 1),
(5, 'Meralco', 1),
(6, 'Maynilad', 1),
(7, 'Gas', 1),
(8, 'Internet', 1),
(9, 'Cable', 1),
(10, 'Salary', 1),
(11, 'drinking water', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'BLISS WASH LAUNDRY', '0', '0', '2314 Chino Roces Cor Pasay Road Pio del Pilar, 1230 City of Makati NCR Fourth District Philippines, <br>VAT Reg. TIN 007-162-284-00010', '00000000', 'philippines', '<b>Welcome</b>', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `fullname`, `address`, `phone`, `date`) VALUES
(0, 'Prince', 'TGLY', '1234', '2022-11-06 19:35:45'),
(0, 'walkin', 'nana', '1234', '2022-11-08 01:22:35'),
(0, 'walkin', 'nana', '1234', '2022-11-08 01:37:55'),
(0, 'drop off', 'nana', '1234', '2022-11-08 01:38:34'),
(0, 'D-OFF', 'nana', '1234', '2022-11-08 02:06:26'),
(0, 'luisa', 'nana', '1234', '2022-11-08 02:07:47'),
(0, 'delmar', 'nana', '1234', '2022-11-08 02:08:37'),
(0, 'gab', 'nana', '1234', '2022-11-08 02:09:54'),
(0, 'gabriel', 'nana', '1234', '2022-11-08 02:10:45'),
(0, 'cristina', 'pasong tamo', '09750165232', '2023-01-26 08:56:38'),
(0, 'paulo puyat', 'makati', '', '2023-01-27 07:17:27'),
(0, 'marilyn', 'makati', '', '2023-01-27 08:28:46'),
(0, 'kiezen', 'makati', '', '2023-01-27 09:11:50'),
(0, 'daisery', '', '', '2023-01-27 16:49:08'),
(0, 'Ali', '', '', '2023-01-27 22:14:06'),
(0, 'chester', '', '', '2023-01-28 16:21:10'),
(0, 'ness', '', '', '2023-01-28 22:04:28'),
(0, 'SELF SERVICE', '', '', '2023-01-30 17:23:42'),
(0, 'asdasd', 'asd', '', '2023-07-16 23:43:17'),
(0, '', '', '', '2023-07-16 23:43:32'),
(0, '', '', '', '2023-07-16 23:44:13'),
(0, '', '', '', '2023-07-16 23:44:24'),
(0, '', '', '', '2023-07-16 23:45:02'),
(0, '', '', '', '2023-07-16 23:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `daily_reports`
--

CREATE TABLE `daily_reports` (
  `product_name` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_reports`
--

INSERT INTO `daily_reports` (`product_name`, `qty`, `date_time`) VALUES
('DRY1', '1', '1689905719'),
('DRY11', '1', '1689907141'),
('DRY12', '1', '1689908544'),
('DRY1', '1', '1690137684'),
('DRY1', '1', '1690138501'),
('DELIVERY - 1', '1', '1690139683'),
('DRY1', '1', '1690142608'),
('DRY2', '1', '1690144067'),
('DRY1', '1', '1690160433'),
('DRY1', '1', '1690162205'),
('DRY1', '1', '1690222173'),
('DRY10', '1', '1690222173'),
('DRY12', '1', '1690222173'),
('DRY1', '1', '1690332952'),
('DRY1', '1', '1690333182'),
('DRY10', '1', '1690333248'),
('DRY1', '1', '1690333327'),
('DRY1', '1', '1690333600'),
('DRY11', '1', '1690333600'),
('DRY11', '1', '1690333600'),
('DRY12', '1', '1690333801'),
('DRY11', '1', '1690333900'),
('DRY11', '1', '1690334425'),
('DRY1', '1', '1690342864'),
('WASH 2', '1', '1690342864'),
('DRYER1', '1', '1690405248'),
('DRYER1', '1', '1690405398'),
('DRYER1', '1', '1690407188'),
('DRYER1', '1', '1690407188');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `express_items`
--

CREATE TABLE `express_items` (
  `id` int(11) NOT NULL,
  `express_amount` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `express_items`
--

INSERT INTO `express_items` (`id`, `express_amount`, `date_time`) VALUES
(1, '0', '1690407188');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:36:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:11:\"viewReports\";i:33;s:13:\"updateCompany\";i:34;s:11:\"viewProfile\";i:35;s:13:\"updateSetting\";}'),
(5, 'STAFF', 'a:8:{i:0;s:13:\"createProduct\";i:1;s:13:\"updateProduct\";i:2;s:11:\"viewProduct\";i:3;s:11:\"createOrder\";i:4;s:9:\"viewOrder\";i:5;s:11:\"viewReports\";i:6;s:11:\"viewProfile\";i:7;s:13:\"updateSetting\";}'),
(6, 'ADMIN', 'a:36:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:11:\"viewReports\";i:33;s:13:\"updateCompany\";i:34;s:11:\"viewProfile\";i:35;s:13:\"updateSetting\";}');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `prod_id` varchar(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `prod_qty`) VALUES
('101', 'DRYER1', 'dryer', 0.00, 3),
('102', 'DRYER2', 'dryer', 0.00, 0),
('103', 'DRYER3', 'dryer', 0.00, 0),
('104', 'DRYER4', 'dryer', 0.00, 0),
('105', 'DRYER5', 'dryer', 0.00, 0),
('106', 'WASHER1', 'washer', 0.00, 0),
('107', 'WASHER2', 'washer', 0.00, 0),
('108', 'WASHER3', 'washer', 0.00, 0),
('109', 'WASHER4', 'washer', 0.00, 0),
('110', 'WASHER5', 'washer', 0.00, 0),
('111', 'DRYER6', 'dryer', 0.00, 0),
('112', 'WASHER6', 'washer', 0.00, 0),
('113', 'DRYER7', 'dryer', 0.00, 0),
('114', 'WASHER7', 'washer', 0.00, 0),
('115', 'DRYER8', 'dryer', 0.00, 0),
('116', 'WASHER8', 'washer', 0.00, 0),
('117', 'DRYER9', 'dryer', 0.00, 0),
('118', 'WASHER9', 'washer', 0.00, 0),
('119', 'DRYER10', 'dryer', 0.00, 0),
('120', 'WASHER10', 'washer', 0.00, 0),
('121', 'DRYER11', 'dryer', 0.00, 0),
('122', 'WASHER11', 'washer', 0.00, 0),
('123', 'DRYER12', 'dryer', 0.00, 0),
('124', 'WASHER12', 'washer', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `machinelogs`
--

CREATE TABLE `machinelogs` (
  `machine` varchar(255) NOT NULL,
  `DateTime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `Express` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `Staff` varchar(255) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slot` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `customer_name`, `customer_address`, `customer_phone`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge`, `vat_charge_rate`, `vat_charge`, `net_amount`, `Express`, `Remarks`, `Staff`, `paid_status`, `user_id`, `slot`, `date`) VALUES
(1, 'TRANSNO-E87A', '', '', '', '1690407188', '180.00', '0', '0', '0', '0', '180.00', '0', '', 'prince', 1, 1, 0, '2023-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `slot` int(255) NOT NULL,
  `Staff` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`id`, `order_id`, `product_id`, `qty`, `rate`, `amount`, `slot`, `Staff`, `date_time`, `product_name`) VALUES
(1, 1, 101, '1', '90', '90.00', 0, 'prince', '1690407188', 'DRYER1'),
(2, 1, 101, '1', '90', '90.00', 0, 'prince', '1690407188', 'DRYER1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prime_id` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `attribute_value_id` text DEFAULT NULL,
  `brand_id` text NOT NULL,
  `category_id` text NOT NULL,
  `store_id` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `slot` int(255) NOT NULL,
  `qty_used` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prime_id`, `id`, `name`, `sku`, `price`, `qty`, `image`, `description`, `attribute_value_id`, `brand_id`, `category_id`, `store_id`, `availability`, `slot`, `qty_used`) VALUES
(1, '101', 'DRYER1', 'D1', '90', '998', '<p>You did not select a file to upload.</p>', '<p>test</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 2),
(2, '119', 'DRYER10', 'D10', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>DRYER</p>', '[\"17\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(3, '121', 'DRYER11', 'D11', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>DRYER</p>', '[\"17\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(4, '123', 'DRYER12', 'D12', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>DRYER</p>', '[\"17\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(5, '102', 'DRYER2', 'D2', '90', '1000', '<p>You did not select a file to upload.</p>', '', '[\"17\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(6, '103', 'DRYER3', 'D3', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>test</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(7, '104', 'DRYER4', 'D4', '90', '1000', '', 'dryer', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(8, '105', 'DRYER5', 'D5', '90', '1000', '', 'DRYER', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(9, '111', 'DRYER6', 'D6', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>DRYER</p>', '[\"17\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(10, '113', 'DRYER7', 'D7', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>DRYER</p>', '[\"17\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(11, '115', 'DRYER8', 'D8', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>DRYER </p>', '[\"17\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(12, '117', 'DRYER9', 'D9', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>DRYER</p>', '[\"17\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(13, '1', 'DELIVERY - 1', 'DEL1', '30', '1000', '<p>You did not select a file to upload.</p>', '<p>SERVICE 1</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(14, '2', 'DELIVERY - 2', 'DEL2', '50', '1000', '<p>You did not select a file to upload.</p>', '<p>SERVICE - 2</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(15, '3', 'DELIVERY -3', 'DEL3', '100', '1000', '<p>You did not select a file to upload.</p>', '<p>SERVICE - 3</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(16, '4', 'FABCON', 'FC', '15', '1000', '<p>You did not select a file to upload.</p>', '<p>FABRIC CONDITIONER</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(17, '5', 'FOLD', 'FLD', '40', '1000', '<p>You did not select a file to upload.</p>', '<p>FOLD</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(18, '6', 'LIQDET', 'LQ', '15', '1000', '<p>You did not select a file to upload.</p>', '<p>LIQUID DETERGENT</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(19, '14', 'Plastic', 'Plastic1', '3.00', '1000', '<p>You did not select a file to upload.</p>', '<p>plastic</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(20, '7', 'SERVICE', 'S1', '10', '1000', '<p>You did not select a file to upload.</p>', '<p>SERVICE - 3</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(21, '106', 'WASH1', 'W1', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER </p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(22, '120', 'WASH10', 'W10', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(23, '122', 'WASH11', 'W11', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>washer</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(24, '107', 'WASH 2', 'W2', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER </p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(25, '108', 'WASH3', 'W3', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER </p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(26, '109', 'WASH4', 'W4', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(27, '110', 'WASH5', 'W5', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(28, '112', 'WASH6', 'W6', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(29, '114', 'WASH7', 'W7', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(30, '116', 'WASH8', 'W8', '90', '1000', '<p>You did not select a file to upload.</p>', '', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(31, '118', 'WASH9', 'W9', '90', '1000', '<p>You did not select a file to upload.</p>', '<p>WASHER</p>', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(32, '124', 'WASH12', 'wash', '90', '1000', '', 'washer', '[\"15\"]', '[\"5\"]', '[\"4\"]', 3, 1, 0, 0),
(33, '', 'test', 'DRY100', '100', '1000', '<p>The upload destination folder does not appear to be writable.</p>', '', 'null', 'null', 'null', 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resetstamp`
--

CREATE TABLE `resetstamp` (
  `machine` varchar(255) NOT NULL,
  `DateTime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resetstamp`
--

INSERT INTO `resetstamp` (`machine`, `DateTime`) VALUES
('W8', '11/9/2022 1:36:22 AM'),
('D8', '11/9/2022 1:36:37 AM'),
('W5', '11/13/2022 12:03:02 AM'),
('W5', '11/13/2022 2:21:44 PM'),
('D5', '11/13/2022 2:21:51 PM'),
('D12', '11/23/2022 7:31:42 AM'),
('D11', '11/24/2022 1:45:04 PM'),
('D8', '11/28/2022 6:54:58 AM'),
('D11', '11/28/2022 6:55:05 AM'),
('W11', '11/28/2022 9:50:00 AM'),
('W7', '11/28/2022 9:50:11 AM'),
('D8', '11/29/2022 7:03:54 AM'),
('D2', '11/29/2022 7:04:03 AM'),
('W1', '12/1/2022 2:34:19 AM'),
('D11', '12/1/2022 2:34:33 AM'),
('D8', '12/1/2022 2:34:40 AM'),
('W5', '12/5/2022 9:33:33 AM'),
('W9', '12/5/2022 9:33:49 AM'),
('W4', '12/8/2022 11:10:31 PM'),
('W12', '12/9/2022 1:15:09 PM'),
('W4', '12/10/2022 10:50:25 AM'),
('W4', '12/11/2022 4:40:07 PM'),
('D12', '12/14/2022 3:57:53 PM'),
('W9', '12/17/2022 3:17:16 AM'),
('D3', '12/17/2022 3:18:51 AM'),
('D3', '12/17/2022 12:41:06 PM'),
('D8', '1/2/2023 10:59:00 PM'),
('D8', '1/5/2023 12:28:30 AM'),
('W1', '1/7/2023 2:38:47 AM'),
('D5', '1/8/2023 1:26:06 AM'),
('D3', '1/8/2023 1:26:12 AM'),
('D8', '1/9/2023 3:55:39 AM'),
('D5', '1/9/2023 3:55:46 AM'),
('D3', '1/9/2023 3:55:51 AM'),
('W5', '1/9/2023 4:55:48 AM'),
('D5', '1/10/2023 12:40:42 AM'),
('D3', '1/10/2023 12:40:50 AM'),
('D1', '1/10/2023 12:42:25 AM'),
('D9', '1/10/2023 5:33:35 AM'),
('D3', '1/10/2023 5:33:42 AM'),
('D2', '1/10/2023 5:33:47 AM'),
('D1', '1/10/2023 5:33:52 AM'),
('D5', '1/10/2023 11:40:16 PM'),
('D5', '1/13/2023 2:06:56 AM'),
('D8', '1/13/2023 2:07:02 AM'),
('D10', '1/13/2023 10:13:18 PM'),
('D8', '1/15/2023 1:27:32 AM'),
('D2', '1/15/2023 1:27:45 AM'),
('D11', '1/15/2023 3:50:51 AM'),
('D10', '1/16/2023 3:16:28 AM'),
('D8', '1/16/2023 8:21:42 PM'),
('D8', '1/21/2023 3:47:03 AM'),
('D5', '1/22/2023 12:46:52 AM'),
('D8', '1/22/2023 12:55:19 AM'),
('D10', '1/22/2023 6:04:52 AM'),
('W8', '1/22/2023 6:05:03 AM'),
('W9', '1/22/2023 6:05:08 AM'),
('W10', '1/22/2023 6:05:13 AM'),
('W11', '1/22/2023 6:05:27 AM'),
('W12', '1/22/2023 6:05:36 AM'),
('W5', '1/22/2023 6:05:47 AM'),
('D8', '1/22/2023 9:57:16 PM'),
('D8', '1/23/2023 7:42:58 PM'),
('D1', '1/25/2023 12:25:58 AM'),
('W4', '1/25/2023 12:26:05 AM'),
('W7', '1/26/2023 9:53:35 AM'),
('D7', '1/26/2023 9:53:53 AM'),
('D7', '1/26/2023 9:55:24 AM'),
('W7', '1/26/2023 9:55:33 AM'),
('D12', '1/26/2023 4:18:09 PM'),
('D11', '1/26/2023 4:18:13 PM'),
('D10', '1/26/2023 4:18:24 PM'),
('D9', '1/26/2023 4:18:28 PM'),
('W8', '1/27/2023 6:09:39 AM'),
('D5', '1/27/2023 11:39:36 PM'),
('D10', '1/29/2023 3:09:48 AM'),
('D12', '1/29/2023 3:54:17 AM'),
('D8', '1/29/2023 3:54:24 AM'),
('D1', '1/29/2023 3:54:36 AM'),
('D8', '1/30/2023 4:29:40 AM'),
('D3', '1/31/2023 3:51:11 AM'),
('D5', '1/31/2023 3:51:19 AM'),
('D11', '1/31/2023 3:51:26 AM'),
('W12', '1/31/2023 5:39:59 PM'),
('W4', '1/31/2023 10:30:00 PM'),
('D11', '2/1/2023 2:15:05 AM'),
('D9', '2/1/2023 2:15:12 AM'),
('D8', '2/1/2023 2:15:16 AM'),
('D7', '2/1/2023 2:15:22 AM'),
('W4', '2/1/2023 2:15:28 AM'),
('D3', '2/1/2023 2:15:33 AM'),
('D5', '2/2/2023 5:32:45 AM'),
('D6', '2/2/2023 5:32:52 AM'),
('D5', '2/6/2023 3:58:29 AM'),
('D12', '2/6/2023 6:03:30 AM'),
('D7', '2/6/2023 6:03:39 AM'),
('D3', '2/6/2023 6:03:46 AM'),
('D1', '2/7/2023 5:08:01 AM'),
('D6', '2/7/2023 5:08:06 AM'),
('D8', '2/8/2023 5:32:31 PM'),
('D11', '2/9/2023 2:47:54 AM'),
('D6', '2/9/2023 3:03:46 AM'),
('D8', '2/9/2023 3:03:53 AM'),
('D1', '2/11/2023 3:16:31 AM'),
('D8', '2/12/2023 12:13:26 AM'),
('D12', '2/14/2023 11:13:13 PM'),
('D1', '2/16/2023 4:45:13 AM'),
('D5', '2/18/2023 3:55:44 AM'),
('D8', '2/18/2023 3:56:05 AM'),
('D9', '2/18/2023 3:56:10 AM'),
('D11', '2/18/2023 3:56:15 AM'),
('D1', '2/21/2023 5:12:00 AM'),
('D2', '2/21/2023 5:12:06 AM'),
('D3', '2/21/2023 5:12:12 AM'),
('W4', '2/21/2023 5:12:17 AM'),
('D11', '2/24/2023 1:06:33 AM'),
('D11', '2/25/2023 6:20:36 AM'),
('D10', '2/25/2023 11:42:25 PM'),
('D12', '2/28/2023 2:42:41 PM'),
('W11', '2/28/2023 8:20:04 PM');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`) VALUES
('0');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `active`) VALUES
(3, 'BWL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'prince', '$2y$10$F/52yPGxF3ZbVuTZfDwhzuOpiitNWUsmHXM2BJrMgxqlpfn5a3Bh.', 'princetigleyinfotech@gmail.com', 'prince', 'tigley', '12345', 1),
(12, 'staff1', '$2y$10$F/52yPGxF3ZbVuTZfDwhzuOpiitNWUsmHXM2BJrMgxqlpfn5a3Bh.', 'staff@gmail.com', 'firstname', 'lastname', '1234567878', 2),
(13, 'SampleStaff', '$2y$10$e62kiAoh3woimnb2V91bZ.d1DRVwdEIAiPc2G0fBF.3GqtITg5z.6', 'samplestaff@gnail.com', 'Sample', 'Staff', '00000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(7, 6, 5),
(8, 7, 6),
(9, 8, 5),
(10, 9, 5),
(11, 10, 5),
(12, 11, 6),
(13, 12, 5),
(14, 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `voided_orders_item`
--

CREATE TABLE `voided_orders_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `slot` int(255) NOT NULL,
  `Staff` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `voided_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `express_items`
--
ALTER TABLE `express_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prime_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `express_items`
--
ALTER TABLE `express_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
