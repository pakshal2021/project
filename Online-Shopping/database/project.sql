-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 07:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grand-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `gender`) VALUES
(46, 'het', 'shah', 'het@gmail.com', 'mark123', '8456781456', 'male'),
(32, 'pakshal', 'shah', 'pakshal@gmail.com', 'alex123', '8456781235', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `category_desc`) VALUES
(1, 'Mobile', 'Here you\'ll find “Mobile: Category Page” with a decent overview of all the subcategories within the top-level category.'),
(2, 'TV', 'Here you\'ll find \"TV: Category Page” with a decent overview of all the subcategories within the top-level category.'),
(3, 'Speakers', 'Here you\'ll “Speakers: Category Page” with a decent overview of all the subcategories within the top-level category.'),
(4, 'Laptop', 'Here you\'ll find “Laptop: Category Page” with a decent overview of all the subcategories within the top-level category.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` char(20) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `gender`, `registration_date`) VALUES
(5, 'Vera', 'moe', 'vera@gmail.com', 'Vera1234', '1234567890', 'male', '2019-01-17 23:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `cart_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_name` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_mobile` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_mobile` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `cart_id`, `user_id`, `billing_name`, `billing_address`, `billing_mobile`, `shipping_address`, `shipping_name`, `shipping_mobile`, `billing_city`, `shipping_city`, `status`, `created_at`, `total`) VALUES
(33, 'f1d9b07', 5, 'vera moie', 'Baghdad-556677,Anguilla', '1234567890', 'Baghdad-556677,Anguilla', 'tim sal', '1234567890', 'zenbangf', '', 'cancelled', '2019-01-17 23:59:18', '518'),
(34, 'a3dcda8', 5, 'vera moie', 'h-123456,Australia', '1234567890', 'h-123456,Australia', 'jbjh', '7709873893', 'tcrain', '', 'processing', '2019-01-20 11:43:12', '518'),
(35, 'c9f1d28', 5, 'vera moie', 'h-123456,Australia', '1234567890', 'h-123456,Australia', 'jbjh', '7709873893', 'tenm', '', 'cancelled', '2019-01-20 11:43:32', '518'),
(36, '28210fd', 5, 'vera moie', 'uolj-123456,Australia', '1234567890', 'uolj-123456,Australia', 'tetet', '7709873893', 'akjoi', '', 'processing', '2019-01-20 11:44:37', '268'),
(37, '72017ca', 32, 'kh', 'h-243242,Austria', '1234567890', 'h-243242,Austria', 'jbjh', '1234567890', 'h', 'jbjhb', 'processing', '2019-01-20 13:32:42', '13517'),
(38, '58fc162', 46, 'kh', 'jh-123456,Armenia', '1234567890', 'jh-123456,Armenia', 'uyhj', '1234567890', 'jh', 'dskfsf', 'processing', '2019-01-20 14:26:28', '248'),
(39, '3d75bea', 0, 'khj', 'jlj-123456,Armenia', '1234567890', 'jlj-123456,Armenia', 'hjn`', '1234567890', 'jlj', 'Baghdad', 'processing', '2019-01-20 14:37:19', '248');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `product_id` int(5) NOT NULL COMMENT 'unique product id,primary key auto increment',
  `product_name` varchar(50) NOT NULL COMMENT 'name of the product',
  `product_desc` varchar(100) NOT NULL COMMENT 'description about product',
  `product_price` float NOT NULL COMMENT 'product price',
  `product_qnt` int(3) NOT NULL COMMENT ' quantity ',
  `product_img` varchar(100) DEFAULT NULL COMMENT 'path of product image',
  `subcat_id` int(5) NOT NULL COMMENT 'index with subcategory table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_qnt`, `product_img`, `subcat_id`) VALUES
(1, 'Redmi Note 11 (Space Black, 64 GB)  (6 GB RAM)', '', 14154, 8, 'images/Redmi Note 11.jpg', 1),
(2, 'REDMI Note 11T 5G (Matte black, 128 GB)  (6 GB RAM', '6 GB RAM | 128 GB ROM\r\n16.76 cm (6.6 inch) Display\r\n50MP Rear Camera\r\n5000 mAh Battery\r\nOcta Core Pr', 14154, 10, 'Online-Shopping/images/Redmi Note 11t.jpg', 1),
(3, 'Redmi 9A (SeaBlue, 32 GB)  (2 GB RAM)', '2 GB RAM | 32 GB ROM\r\n16.59 cm (6.53 inch) Full HD+ Display\r\n13MP Rear Camera\r\n5000 mAh Battery', 6999, 12, 'Online-Shopping/images/Redmi 9A.jpg', 1),
(4, 'Redmi Note 11 PRO Plus 5G (Mirage Blue, 128 GB)  (', '8 GB RAM | 128 GB ROM\r\n16.94 cm (6.67 inch) Display\r\n108MP Rear Camera\r\n5000 mAh Battery', 21498, 6, 'images/Redmi Note 11 PRO Plus 5G.jpg', 1),
(5, 'Mi 11X Pro 5G (Cosmic Black, 128 GB)  (8 GB RAM)', '8 GB RAM | 128 GB ROM\r\n16.94 cm (6.67 inch) Full HD+ Display\r\n108MP + 8MP + 5MP | 20MP Front Camera\r', 36999, 8, 'images/mi 11x pro.png', 1),
(6, 'SAMSUNG Galaxy F12 (Sky Blue, 64 GB)  (4 GB RAM)', '4 GB RAM | 64 GB ROM | Expandable Upto 512 GB\r\n16.55 cm (6.515 inch) HD+ Display\r\n48MP + 5MP + 2MP +', 9500, 8, 'images/SAMSUNG Galaxy F12.jpg', 2),
(7, 'SAMSUNG Galaxy F23 5G (Aqua Blue, 128 GB)  (6 GB R', '6 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.76 cm (6.6 inch) Full HD+ Display\r\n50MP + 8MP + 2MP', 17800, 8, 'images/SAMSUNG Galaxy F23 5G.jpg', 2),
(8, 'SAMSUNG Galaxy M12 (Black, 128 GB)  (6 GB RAM)', '6 GB RAM | 128 GB ROM\r\n16.51 cm (6.5 inch) Display\r\n48MP Rear Camera\r\n6000 mAh Battery', 9499, 12, 'images/SAMSUNG Galaxy M12.jpg', 2),
(9, 'SAMSUNG Galaxy A53 (Awesome Blue, 128 GB)  (8 GB R', '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.51 cm (6.5 inch) Full HD+ Display\r\n64MP + 12MP + 5M', 35999, 10, 'images/SAMSUNG Galaxy A53.jpg', 2),
(10, 'SAMSUNG Galaxy A22 5G (Violet, 128 GB)  (6 GB RAM)', '6 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.76 cm (6.6 inch) Full HD+ Display\r\n48MP + 5MP + 2MP', 18499, 8, 'images/SAMSUNG Galaxy A22 5G.jpg', 2),
(11, 'vivo X70 Pro (Aurora Dawn, 128 GB)  (8 GB RAM)', '8 GB RAM | 128 GB ROM\r\n16.66 cm (6.56 inch) Full HD+ Display\r\n50MP + 12MP + 12MP + 8MP | 32MP Front ', 54990, 8, 'images/vivo X70 Pro.jpg', 3),
(12, 'vivo T1 5G (Rainbow Fantasy, 128 GB)  (6 GB RAM)', '6 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.71 cm (6.58 inch) Full HD+ Display\r\n50MP + 2MP + 2M', 19990, 12, 'images/vivo T1 5G.jpg', 3),
(13, 'vivo Y15s (Mystic Blue, 32 GB)  (3 GB RAM)', '3 GB RAM | 32 GB ROM | Expandable Upto 1 TB\r\n16.54 cm (6.51 inch) HD+ Display\r\n13MP + 2MP | 8MP Fron', 10490, 8, 'images/vivo Y15s.jpg', 3),
(14, 'vivo V23e 5G (Sunshine Gold, 128 GB)  (8 GB RAM)', '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.36 cm (6.44 inch) Full HD+ AMOLED Display\r\n50MP + 8', 25990, 10, 'images/vivo V23e 5G.jpg', 3),
(15, 'vivo Y20G 2021 (Purist Blue, 64 GB)  (4 GB RAM)', '4 GB RAM | 64 GB ROM | Expandable Upto 256 GB\r\n16.54 cm (6.51 inch) HD+ Display\r\n13MP + 2MP + 2MP | ', 13990, 8, 'images/vivo Y20G 2021 .jpg', 3),
(16, 'APPLE iPhone SE (White, 128 GB)', '128 GB ROM\r\n11.94 cm (4.7 inch) Retina HD Display\r\n12MP Rear Camera | 7MP Front Camera\r\nA13 Bionic C', 43900, 8, 'images/APPLE iPhone SE.jpg', 4),
(17, 'APPLE iPhone XR (White, 128 GB)', '128 GB ROM\r\n15.49 cm (6.1 inch) Display\r\n12MP Rear Camera | 7MP Front Camera\r\nA12 Bionic Chip Proces', 42990, 8, 'images/APPLE iPhone XR.jpg', 4),
(18, 'APPLE iPhone 13 (Midnight, 128 GB)', '128 GB ROM\r\n15.49 cm (6.1 inch) Super Retina XDR Display\r\n12MP + 12MP | 12MP Front Camera\r\nA15 Bioni', 74900, 10, 'images/APPLE iPhone 13.jpg', 4),
(19, 'APPLE iPhone 12 (Black, 128 GB)', '128 GB ROM\r\n15.49 cm (6.1 inch) Super Retina XDR Display\r\n12MP + 12MP | 12MP Front Camera\r\nA14 Bioni', 54900, 8, 'images/APPLE iPhone 12.jpg', 4),
(20, 'APPLE iPhone 11 (Black, 128 GB)', '128 GB ROM\r\n11.94 cm (4.7 inch) Retina HD Display\r\n12MP Rear Camera | 7MP Front Camera\r\nA13 Bionic C', 47900, 10, 'images/APPLE iPhone 11.jpg', 4),
(21, 'SONY BRAVIA 80 cm (32 inch) HD Ready LED Smart TV', 'Supported Apps: Netflix|Prime Video|Youtube\r\nOperating System: Linux based\r\nResolution: HD Ready 136', 29990, 8, 'images/SONY BRAVIA 80 cm.jpg', 5),
(22, 'SONY X75 108 cm (43 inch) Ultra HD (4K) LED Smart ', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assist', 53950, 8, 'images/SONY X75 108 cm.jpg', 5),
(23, 'SONY W820 80 cm (32 inch) HD Ready LED Smart Andro', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assist', 29990, 8, 'images/SONY W820 80 cm.jpg', 5),
(24, 'SONY X80J 163.9 cm (65 inch) Ultra HD (4K) LED Sma', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Google TV\r\nResolution:', 90000, 12, 'images/SONY X80J 163.9 cm.jpg', 5),
(25, 'SONY 123 cm (49 inch) Ultra HD (4K) LED Smart Andr', 'Supported Apps: Netflix|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assistant & Chrome', 76990, 12, 'images/SONY 123 cm.jpg', 5),
(26, 'Panasonic 100 cm (40 inch) Full HD LED Smart Andro', 'Supported Apps: Netflix|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assistant & Chrome', 34000, 8, 'images/Panasonic 100 cm.jpg', 6),
(27, 'Panasonic 80 cm (32 inch) HD Ready LED Smart TV', 'Supported Apps:\r\nResolution: HD Ready 1366 x 768 Pixels\r\nSound Output: 20\r\nRefresh Rate: 60 Hz', 22790, 8, 'images/Panasonic 80 cm.jpg', 6),
(28, 'Panasonic 108 cm (43 inch) Ultra HD (4K) LED Smart', 'Supported Apps:\r\nResolution: Ultra HD (4K) 3840 x 2160 Pixels\r\nSound Output: 20\r\nRefresh Rate: 60 Hz', 40630, 10, 'images/Panasonic 108 cm.jpg', 6),
(29, 'Panasonic 139 cm (55 inch) Ultra HD (4K) LED Smart', 'Supported Apps: Prime Video\r\nResolution: Ultra HD (4K) 3840 * 2160 Pixels\r\nSound Output: 20\r\nRefresh', 71990, 8, 'images/Panasonic 139 cm.jpg', 6),
(30, 'Panasonic FX600 Series 139 cm (55 inch) Ultra HD (', 'Supported Apps: Netflix|Youtube\r\nOperating System: Linux based\r\nResolution: Ultra HD (4K) 3840 x 216', 69999, 8, 'images/Panasonic FX600 Series 139 cm.jpg', 6),
(31, 'OnePlus Y1 80 cm (32 inch) HD Ready LED Smart Andr', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assist', 17000, 8, 'images/OnePlus Y1 80 cm.jpg', 7),
(32, 'OnePlus U1S 126 cm (50 inch) Ultra HD (4K) LED Sma', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assist', 40990, 10, 'images/OnePlus U1S 126 cm.jpg', 7),
(33, 'OnePlus Y1 100 cm (40 inch) Full HD LED Smart Andr', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assist', 22999, 8, 'images/OnePlus Y1 100 cm.jpg', 7),
(34, 'OnePlus Q1 Series 138.8 cm (55 inch) QLED Ultra HD', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assist', 62899, 12, 'images/OnePlus Q1 Series.jpg', 7),
(35, 'OnePlus Y1S 80 cm (32 inch) HD Ready LED Smart And', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assist', 16999, 10, 'images/OnePlus Y1S 80 cm.jpg', 7),
(36, 'LG 80 cm (32 inch) HD Ready LED Smart TV', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: WebOS\r\nResolution: HD ', 18490, 10, 'images/LG 80 cm.jpg', 8),
(37, 'LG 108 cm (43 inch) Ultra HD (4K) LED Smart TV', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: WebOS\r\nResolution: Ult', 31999, 8, 'images/LG 108 cm (43 inch.jpg', 8),
(38, 'LG Nanocell 108 cm (43 inch) Ultra HD (4K) LED Sma', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: WebOS\r\nResolution: Ult', 47830, 10, 'images/LG Nanocell 108 cm.jpg', 8),
(39, 'LG All-in-One 108 cm (43 inch) Full HD LED Smart T', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: WebOS\r\nResolution: Ful', 36990, 10, 'images/LG All-in-One 108 cm.jpg', 8),
(40, 'LG OLED BX 164 cm (65 inch) OLED Ultra HD (4K) Sma', 'Supported Apps: Netflix|Disney+Hotstar|Youtube\r\nOperating System: WebOS\r\nResolution: Ultra HD (4K) 3', 219990, 10, 'images/LG OLED BX 164 cm.jpg', 8),
(41, 'ZEBRONICS ZEB-SOUND FEAST 500 70 W Bluetooth Party', 'Power Output(RMS): 70 W\r\nWireless music streaming via Bluetooth', 4300, 8, 'images/ZEBRONICS ZEB-SOUND FEAST.jpg', 9),
(42, 'ZEBRONICS Zeb Vita Pro with TWS 24 W Bluetooth Sou', 'Power Output(RMS): 24 W\r\nPower Source: 5V DC USB\r\nCharging time: 3.5 hr\r\nBluetooth Version: 5\r\nWirel', 1549, 8, 'images/ZEBRONICS Zeb Vita Pro .jpg', 9),
(43, 'ZEBRONICS Juke Bar 9000 Pro Dolby 120 W Bluetooth ', 'Power Output(RMS): 120 W\r\nPower Source: AC Adapter\r\nWireless music streaming via Bluetooth', 10899, 8, 'images/ZEBRONICS Juke Bar 9000 Pro.jpg', 9),
(44, 'ZEBRONICS Zeb-Juke Bar 3850 PRO DOLBY ATMOS 170 W ', 'Power Output(RMS): 170 W\r\nWireless music streaming via Bluetooth', 8500, 10, 'images/ZEBRONICS Zeb-Juke Bar 3850 PRO.jpg', 9),
(45, 'ZEBRONICS ZEB-Juke Bar 9400 Pro Dolby 525 W Blueto', 'Power Output(RMS): 525 W\r\nPower Source: AC Adapter\r\nBluetooth Version: 5\r\nWireless music streaming v', 14999, 10, 'images/ZEBRONICS ZEB-Juke Bar 9400.jpg', 9),
(46, 'Mivi Roam2 5 W Bluetooth Speaker', 'Power Output(RMS): 5 W\r\nPower Source: Battery\r\nBattery life: 24 hr | Charging time: 4 hr\r\nBluetooth ', 999, 6, 'images/Mivi Roam2 5 W Bluetooth Speaker.jpg', 10),
(47, 'Mivi Play 5 W Portable Bluetooth Speaker', 'Power Output(RMS): 5 W\r\nPower Source: Battery\r\nBattery life: 12 hr\r\nBluetooth Version: 5\r\nWireless r', 899, 8, 'images/Mivi Play 5 W Portable Bluetooth.jpg', 10),
(48, 'Mivi Octave 3 Wireless with 360 HD Stereo Sound Po', 'Power Output(RMS): 16 W\r\nPower Source: USB Chargeable\r\nBattery life: 8 hrs | Charging time: 3.5 hrs\r', 1800, 8, 'images/Mivi Octave 3 Wireless with 360 HD.jpg', 10),
(49, 'Mivi Fort S60 with 2 in-built subwoofers, Made in ', 'Power Output(RMS): 60 W\r\nPower Source: DC Adapter\r\nWireless music streaming via Bluetooth\r\nBluetooth', 3000, 8, 'images/Mivi Fort S60 with 2 in-built.jpg', 10),
(50, 'Mivi Octave 3 Wireless with 360 HD Stereo Sound Po', 'Power Output(RMS): 16 W\r\nPower Source: USB Chargeable\r\nBattery life: 8 hrs | Charging time: 3.5 hrs\r', 1800, 8, 'images/Mivi Octave 3 Wireless with 360 HD.jpg', 10),
(51, 'boAt Stone 350 10 W Bluetooth Speaker ', 'Power Output(RMS): 10 W\r\nBattery life: 12 hrs\r\nBluetooth Version: 5\r\nWireless range: 10 m\r\nWireless ', 1400, 8, 'images/boAt Stone 350 10 W.jpg', 11),
(52, 'boAt Party Pal 20 15 W Bluetooth Party Speaker', 'Power Output(RMS): 15 W\r\nPower Source: USB Chargeable\r\nBluetooth Version: 5\r\nWireless music streamin', 2500, 8, 'images/boAt Party Pal 20 15 .jpg', 11),
(53, 'boAt Stone 850 with ASAP Charge, upto 13 Hours Pla', 'Power Output(RMS): 16 W\r\nBluetooth Version: 5\r\nWireless range: 10 m\r\nWireless music streaming via Bl', 2500, 8, 'images/boAt Stone 850.jpg', 11),
(54, 'boAt PartyPal 60 20 W Bluetooth Party Speaker', 'Power Output(RMS): 20 W\r\nCharging time: 3.5 hr\r\nBluetooth Version: 5.0\r\nWireless range: 10 m\r\nWirele', 2500, 8, 'images/boAt PartyPal 60 20.jpg', 11),
(55, 'boAt Stone Cuboid with upto 5.5 Hours Playback 5 W', 'Power Output(RMS): 5 W\r\nBluetooth Version: 5\r\nWireless range: 10 m\r\nWireless music streaming via Blu', 1200, 6, 'images/boAt Stone Cuboid .jpg', 11),
(56, 'JBL Flip Essential IPX7 Waterproof 16 W Bluetooth ', 'Power Output(RMS): 16 W\r\nBattery life: 10 hr | Charging time: 3.5 hr\r\nBluetooth Version: 4.1\r\nWirele', 6300, 10, 'images/JBL Flip Essential .jpg', 12),
(57, 'JBL Party Box 100 Portable 160 W Bluetooth Party S', 'Power Output(RMS): 160 W\r\nBluetooth Version: 4.2\r\nWireless range: 10 m\r\nWireless music streaming via', 25000, 10, 'images/JBL Party Box 100.jpg', 12),
(58, 'JBL GO2 Portable Bluetooth Speaker', 'Power Source: AC Adapter and Cable\r\nBattery life: 5 hrs | Charging time: 2.5 hrs\r\nBluetooth Version:', 2000, 10, 'images/JBL GO2 Portable.jpg', 12),
(59, 'JBL Flip 3 Splashproof 16 W Portable Bluetooth Spe', 'Power Output(RMS): 16 W\r\nPower Source: battery\r\nWireless music streaming via Bluetooth\r\n10 hours pla', 4500, 8, 'images/JBL Flip 3.jpg', 12),
(60, 'JBL GO2 Portable Bluetooth Speaker', 'Power Source: AC Adapter and Cable\r\nBattery life: 5 hrs | Charging time: 2.5 hrs\r\nBluetooth Version:', 2000, 10, 'images/JBL GO2 Portable.jpg', 12),
(61, 'Lenovo IdeaPad 3 Core i3 10th Gen - (8 GB/256 GB S', 'Stylish & Portable Thin and Light Laptop\r\n15.6 Inch Full HD TN 220nits Anti-glare\r\nLight Laptop with', 34990, 8, 'images/Lenovo IdeaPad 3 Core i3 10th Gen.jpg', 13),
(62, 'Lenovo IdeaPad 3 Ryzen 5 Hexa Core 5500U - (8 GB/5', 'Stylish & Portable Thin and Light Laptop\r\n15.6 inch Full HD TN 250nits Anti-glare, 45% NTSC\r\nLight L', 48490, 8, 'images/Lenovo IdeaPad 3 Ryzen 5.jpg', 13),
(63, 'Lenovo IdeaPad 3 Core i3 11th Gen', 'Stylish & Portable Thin and Light Laptop\r\n15.6 inch Full HD TN 250nits Anti-glare\r\nLight Laptop with', 40990, 8, 'images/Lenovo IdeaPad 3 Core i3 11th.jpg', 13),
(64, 'Lenovo Ideapad Flex 5 Core i3 11th Gen', 'Carry It Along 2 in 1 Laptop\r\n14 inch Full HD LED Backlit IPS Glossy Multi-touch Display (250 nits B', 55790, 8, 'images/Lenovo Ideapad Flex 5 Core i3 11th.jpg', 13),
(65, 'Lenovo Ideapad Slim 5 Ryzen 7 Octa Core 5700U', 'Stylish & Portable Thin and Light Laptop\r\n15.6 inch Full HD LED Backlit, IPS Anti-Glare Display (300', 58990, 12, 'images/Lenovo Ideapad Slim 5 Ryzen.jpg', 13),
(66, 'DELL Core i3 10th Gen - (8 GB/1 TB HDD/256 GB SSD/', 'Stylish & Portable Thin and Light Laptop\r\n15.6 inch Full HD WVA AG Narrow Border\r\nLight Laptop witho', 39490, 10, 'images/DELL Core i3 10th Gen.jpg', 14),
(67, 'DELL Inspiron Core i3 11th Gen - (8 GB/1 TB HDD/25', 'Stylish & Portable Thin and Light Laptop\r\n15.6 Inch FHD WVA AG Narrow Border\r\nLight Laptop without O', 67498, 8, 'images/DELL Inspiron Core i3 11th Gen.jpg', 14),
(68, 'DELL Ryzen 3 Dual Core 3250U - (8 GB/256 GB SSD/Wi', 'Stylish & Portable Thin and Light Laptop\r\n15.6 inch Full HD Anti Glare\r\nLight Laptop without Optical', 36990, 10, 'images/DELL Ryzen 3 Dual Core.jpg', 14),
(69, 'DELL Inspiron 3000 Core i3 11th Gen', 'Stylish & Portable Thin and Light Laptop\r\n15.6 Inch FHD WVA AG Narrow Border\r\nLight Laptop without O', 39499, 10, 'images/DELL Inspiron Core i3 11th Gen.jpg', 14),
(70, 'DELL Inspiron Ryzen 5 Hexa Core R5-5500U', 'Carry It Along 2 in 1 Laptop\r\n14-inch FHD WVA Truelife Touch 60Hz Narrow Border, Dell Active Pen\r\nFi', 56789, 8, 'images/DELL Inspiron Ryzen 5 Hexa Core.jpg', 14),
(71, 'HP Core i3 11th Gen', 'Stylish & Portable Thin and Light Laptop\r\n15.6 inch Full HD, micro-edge, anti-glare, Brightness: 250', 40990, 8, 'images/HP Core i3 11th Gen.jpg', 15),
(72, 'HP Pavilion Ryzen 5 Hexa Core 5600H ', 'NVIDIA GeForce GTX 1650\r\n15.6 inch Full HD WLED-Backlit IPS Anti-glare Micro-edge Display (Brightnes', 74990, 8, 'images/HP Pavilion Ryzen 5 Hexa.jpg', 15),
(73, 'HP Pavilion x360 Core i3 11th Gen', 'Carry It Along 2 in 1 Laptop\r\n14 inch Full HD, IPS, multitouch-enabled edge-to-edge glass, micro-edg', 53499, 10, 'images/HP Pavilion x360 Core i3.jpg', 15),
(74, 'HP Core i3 11th Gen - (8 GB/1 TB HDD/Windows 11 Ho', 'Light Laptop without Optical Disk Drive\r\n15.6 inch', 45990, 12, 'images/HP Core i3 11th Gen2.jpg', 15),
(75, 'HP Pavilion Ryzen 5 Hexa Core 5625U ', 'Stylish & Portable Thin and Light Laptop\r\n15.6 Inch FHD, IPS, micro-edge, Bright view (Brightness: 2', 59399, 8, 'images/HP Pavilion Ryzen 5 Hexa Core.jpg', 15),
(76, 'acer Aspire 3 Ryzen 3 Dual Core 3250U', 'Light Laptop without Optical Disk Drive\r\n15.6 inch Full HD high-brightness Acer ComfyView LED-backli', 32399, 8, 'images/acer Aspire 3 Ryzen.jpg', 16),
(77, 'acer Aspire 7 Core i5 10th Gen', 'NVIDIA GeForce GTX 1650\r\n15.6 inch Full HD Acer ComfyView LED Backlit TFT LCD Anti-glare Display (45', 52990, 8, 'images/acer Aspire 7 Core i5.jpg', 16),
(78, 'acer Predator Helios 300 Core i7 11th Gen', '15.6 inch QHD with IPS (In-Plane Switching) technology (High-brightness (300 nits) Acer ComfyView LE', 139990, 8, 'images/acer Predator Helios 300 Core.jpg', 16),
(79, 'acer Intel EVO Swift 3 Core i5 11th Gen', 'Stylish & Portable Thin and Light Laptop\r\n14 inch Full HD (IPS (In-Plane Switching) technology, high', 59990, 12, 'images/acer Intel EVO Swift.jpg', 16),
(80, 'acer Travelmate Core i5 11th Gen', '14 inches IPS Display\r\nFinger Print Sensor for Faster System Access\r\nLight Laptop without Optical Di', 67800, 12, 'acer Travelmate Core i5 11th', 16);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `sub_category_desc` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category`, `sub_category_desc`, `category_id`) VALUES
(3, 'Vivo', 'Here you\'ll find the Mobile Phones of Vivo.', 1),
(2, 'Samsung', 'Here you\'ll find the Mobile Phones of SAMSUNG.', 1),
(1, 'MI', 'Here you\'ll find the Mobile Phones of MI.', 1),
(9, 'Zebronics', 'Here you\'ll find the Speakers of Zebronics.', 3),
(4, ' iphone', 'Here you\'ll find the Mobile Phones of Apple.', 1),
(5, 'Sony', 'Here you\'ll find the TV of MI.', 2),
(6, 'Panasonic', 'Here you\'ll find the TV of Panasonic.', 2),
(7, 'OnePlus', 'Here you\'ll find the TV of OnePlus.', 2),
(8, 'LG', 'Here you\'ll find the TV of LG.', 2),
(10, 'MIVI', 'Here you\'ll find the Speakers of MIVI.', 3),
(11, 'BoAt', 'Here you\'ll find the Speakers of BoAt.', 3),
(12, 'JBL', 'Here you\'ll find the Speakers of JBL.', 3),
(13, 'Lenovo', 'Here you\'ll find the Laptop of Lenovo.', 4),
(14, 'DELL', 'Here you\'ll find the Laptop of DELL.', 4),
(15, 'HP', 'Here you\'ll find the Laptop of DELL.', 4),
(16, 'acer', 'Here you\'ll find the Laptop of acer.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `item_id` int(11) NOT NULL,
  `cart_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`item_id`, `cart_id`, `user_id`, `qty`, `product_id`, `price`) VALUES
(1, 'f1d9b07', 5, 2, 4, '250'),
(2, '1080345', 30, 3, 6, '13499'),
(3, '1080345', 5, 1, 2, '300'),
(4, 'baeab3f', 32, 1, 2, '300'),
(5, 'baeab3f', 5, 1, 5, '300'),
(6, 'a3dcda8', 0, 2, 4, '250'),
(7, '28210fd', 5, 1, 4, '250'),
(8, '72017ca', 32, 1, 6, '13499'),
(9, '58fc162', 46, 1, 3, '230'),
(10, '3d75bea', 0, 1, 3, '230');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contectus`
--

CREATE TABLE `tbl_contectus` (
  `contect_id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contectus`
--

INSERT INTO `tbl_contectus` (`contect_id`, `name`, `email`, `subject`, `comments`) VALUES
(1, 'Alex', 'alex@gmail.com', 'test ', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `name`, `email`, `subject`, `comments`) VALUES
(2, 'test', 'vera@gmail.com', 'test', 'test tes test ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_contectus`
--
ALTER TABLE `tbl_contectus`
  ADD PRIMARY KEY (`contect_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique product id,primary key auto increment', AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_contectus`
--
ALTER TABLE `tbl_contectus`
  MODIFY `contect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
