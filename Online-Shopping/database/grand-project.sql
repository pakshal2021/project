-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2019 at 09:28 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` char(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `gender`) VALUES
(46, 'Mark', 'jen', 'mark@gmail.com', 'mark123', '1234567890', 'male'),
(32, 'alex ', 'zen', 'alex@gmail.com', 'alex123', '1234567890', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `category_desc`) VALUES
(8, 'Women', 'WomenWomenWomenWomenWomenWo'),
(9, 'Men', 'MenMenMenMenMenMenMenMenMenMenMen'),
(10, 'Mobile', 'MobileMobileMobileMobile');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` char(20) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `gender`, `registration_date`) VALUES
(5, 'Vera', 'moe', 'vera@gmail.com', 'Vera1234', '1234567890', 'male', '2019-01-17 23:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique product id,primary key auto increment',
  `product_name` varchar(50) NOT NULL COMMENT 'name of the product',
  `product_desc` varchar(100) NOT NULL COMMENT 'description about product',
  `product_price` float NOT NULL COMMENT 'product price',
  `product_qnt` int(3) NOT NULL COMMENT ' quantity ',
  `product_img` varchar(100) DEFAULT NULL COMMENT 'path of product image',
  `subcat_id` int(5) NOT NULL COMMENT 'index with subcategory table',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_qnt`, `product_img`, `subcat_id`) VALUES
(2, 'Test product', 'ljkdssgdsgsgTest productaeffewrkhjn', 300, 50, 'Picture3.jpg', 7),
(3, 'test 123', 'test 213', 230, 2, 'Picture2.jpg', 6),
(4, 'Easy Polo Black Edition', 'Easy Polo Black Edition', 250, 20, 'product12.jpg', 11),
(5, 'Easy Polo Black Edition', 'Easy Polo Black Edition', 300, 15, 'product2.jpg', 11),
(6, 'Samsung Galaxy J7 SM-J700F Gold', 'Samsung Galaxy J7 SM-J700F Gold', 13499, 10, 'p4.gif', 12);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category` varchar(255) NOT NULL,
  `sub_category_desc` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category`, `sub_category_desc`, `category_id`) VALUES
(7, 'Sarees', 'jlckanfsdFDS', 8),
(6, 'Shirt', 'asuojflakg;dsgb\r\n', 9),
(10, 'Valentino', 'jhkcnlkDSFSDvASFDGSGHDFX', 8),
(11, 'T-Shirt', 'dddd', 9),
(12, 'Samsung', 'hkafkdslfgiu;jknafoiaf fkjfnlgfa fkajndsl', 10),
(13, 'Nokia', 'sdsd', 10),
(14, 'MI', 'dsdsd', 10),
(15, 'HP', 'sdsd', 10),
(16, 'Sony', 'sdsd', 10),
(17, 'Oppo', 'test test ', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `tbl_contectus`;
CREATE TABLE IF NOT EXISTS `tbl_contectus` (
  `contect_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` text NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`contect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contectus`
--

INSERT INTO `tbl_contectus` (`contect_id`, `name`, `email`, `subject`, `comments`) VALUES
(1, 'Alex', 'alex@gmail.com', 'test ', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

DROP TABLE IF EXISTS `tbl_feedback`;
CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` text NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `name`, `email`, `subject`, `comments`) VALUES
(2, 'test', 'vera@gmail.com', 'test', 'test tes test ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
