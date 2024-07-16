-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 07:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happylife`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `role_id` varchar(225) DEFAULT NULL COMMENT '1= super admin;2=users,3=staff',
  `permission_id` varchar(225) DEFAULT NULL,
  `fname` varchar(225) DEFAULT NULL,
  `lname` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `username` varchar(225) NOT NULL,
  `status` varchar(225) DEFAULT NULL,
  `loginDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone` varchar(225) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `ip_address` varchar(225) DEFAULT NULL,
  `remember_token` varchar(225) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user_id`, `role_id`, `permission_id`, `fname`, `lname`, `email`, `password`, `username`, `status`, `loginDate`, `phone`, `address`, `image`, `ip_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, '1', '0', 'Admin', 'Admin', 'admin@admin.com', '$2y$10$AxN.Cqzk30dXqHftQOigO...sqy2V/1QrlXuqE1BJuywIXh2nciO6', 'AA2586', '1', '2024-01-18 05:01:21', '9748632804', 'demo address', '', '', NULL, NULL, NULL),
(2, NULL, '2', NULL, 'Atanu', 'Ray', 'exaltedsol04@gmail.com', '$2y$10$AxN.Cqzk30dXqHftQOigO...sqy2V/1QrlXuqE1BJuywIXh2nciO6', 'AR5616', '1', '2024-02-16 13:58:36', '9748632804', NULL, '1708085172.jpg', NULL, NULL, '2024-02-10', '0000-00-00'),
(3, NULL, '3', NULL, 'Raju', 'jha', 'rajju@gmail.com', '$2y$10$bFDXw5ys2YQmNp.F/HzhSu7bQmqpk0alEx8P0Z3.gN/BFi.uCYkrS', 'RJ4601', '1', '2024-02-16 11:41:39', '9874587589', NULL, '1708083699.jpg', NULL, NULL, NULL, '2024-02-16'),
(4, NULL, '4', NULL, 'Rajesh', 'mondal', 'exaltedsol05@gmail.com', '$2y$10$/0uJ5DftdpyDbr5.WTnEXua7bTShjgvnFDYUfesxxoDqtYiaJHrnS', 'RM3891', '1', '2024-02-16 12:20:35', '9744587458', NULL, '1708083687.jpg', NULL, NULL, '2024-02-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billgenerates`
--

CREATE TABLE `tbl_billgenerates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_amount` decimal(8,2) NOT NULL,
  `received_amount` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `bill_number` varchar(255) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `price_per_brass` decimal(8,2) NOT NULL,
  `expensetypes_id` int(11) NOT NULL,
  `labour_charge` decimal(8,2) NOT NULL,
  `labour_charge_amount` decimal(8,2) NOT NULL,
  `expense_tracker_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active,2=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cabinets`
--

CREATE TABLE `tbl_cabinets` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cabinets`
--

INSERT INTO `tbl_cabinets` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'White', '1705403363.png', 1, '2024-01-16', '2024-01-16'),
(2, 'Fabric', '1705921452.png', 1, '2024-01-16', '2024-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cabinettypes`
--

CREATE TABLE `tbl_cabinettypes` (
  `id` int(10) NOT NULL,
  `subcategory_id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `LXD` varchar(225) NOT NULL,
  `WXD` varchar(225) NOT NULL,
  `WXL` varchar(225) NOT NULL,
  `hardware_amt` varchar(225) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cabinettypes`
--

INSERT INTO `tbl_cabinettypes` (`id`, `subcategory_id`, `name`, `LXD`, `WXD`, `WXL`, `hardware_amt`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Open End Cabinet With 1 Fixed Shelf', '1', '1', '1', '500', 'product-01.jpg', 1, '0000-00-00', '2024-01-23'),
(2, 1, 'Open Cabinet With 1 ADJ Shelf', '2', '3', '3', '600', 'product-02.jpg', 1, '0000-00-00', '2024-01-23'),
(3, 1, '1S_(singel door with out shelf)', '2', '2', '2', '700', 'product-03.jpg', 1, '0000-00-00', '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Modular kitchen', 'kitchen0.png', 1, '2024-01-16', '2024-01-16'),
(2, 'Bedroom', 'bedroom.png', 1, '2024-01-16', '2024-01-16'),
(3, 'Living & Dining', 'accessories.png', 1, '2024-01-16', '2024-01-16'),
(4, 'Other furniture', 'others0.png', 1, '2024-01-16', '2024-01-16'),
(5, 'custom furniture', 'custom.png', 1, '2024-01-16', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_couponcodes`
--

CREATE TABLE `tbl_couponcodes` (
  `id` int(11) NOT NULL,
  `code` varchar(225) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `mode` tinyint(1) NOT NULL COMMENT '1=fixed price; 2= percent value',
  `expire_date` date NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=inactive; 1=active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_couponcodes`
--

INSERT INTO `tbl_couponcodes` (`id`, `code`, `value`, `mode`, `expire_date`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'code12', '10.00', 2, '2024-02-05', '1707373067.png', 1, '2024-02-09 14:02:19', '2024-02-09'),
(2, 'code2', '100.00', 1, '2024-02-06', '1707487410.png', 1, '2024-02-12 05:41:42', '2024-02-12'),
(3, 'code32', '150.00', 1, '2024-02-08', '1707490838.png', 1, '2024-02-12 05:42:07', '2024-02-12'),
(4, 'Code22', '200.00', 1, '2024-02-29', '1707715256.png', 1, '2024-02-12 05:42:25', '2024-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expanse_trackers`
--

CREATE TABLE `tbl_expanse_trackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `miscellaneous` varchar(255) NOT NULL,
  `expensetypes_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `paymentmode_id` bigint(20) UNSIGNED NOT NULL,
  `remark` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active,2=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exposideprices`
--

CREATE TABLE `tbl_exposideprices` (
  `id` int(11) NOT NULL,
  `exponame` varchar(225) NOT NULL,
  `price1` varchar(225) NOT NULL,
  `price2` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1= Active; 0= Inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_exposideprices`
--

INSERT INTO `tbl_exposideprices` (`id`, `exponame`, `price1`, `price2`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Left Side', '0.5', '60', 1, '0000-00-00', '2024-01-18'),
(2, 'Right Side', '0.5', '60', 1, '0000-00-00', '2024-01-18'),
(3, 'Both Side', '60', '', 1, '0000-00-00', '2024-01-18'),
(4, 'Hardware Price', '500', '', 1, '0000-00-00', '2024-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exposides`
--

CREATE TABLE `tbl_exposides` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_exposides`
--

INSERT INTO `tbl_exposides` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Without Expo', '1705403566.png', 1, '2024-01-16', '2024-01-16'),
(2, 'Left Side Expo', '1705403588.png', 1, '2024-01-16', '2024-01-16'),
(3, 'Right Side Expo', '1705403610.png', 1, '2024-01-16', '2024-01-16'),
(4, 'Both side Expo', '1705403627.png', 1, '2024-01-16', '2024-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_handeltypes`
--

CREATE TABLE `tbl_handeltypes` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_handeltypes`
--

INSERT INTO `tbl_handeltypes` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Without Handels', '1.PNG', 1, '0000-00-00', '0000-00-00'),
(2, 'Normal Handels', '2.PNG', 1, '0000-00-00', '0000-00-00'),
(3, 'Gola profile Handels', '3.PNG', 1, '2024-01-16', '0000-00-00'),
(4, 'G_profile Handels', '1705922106.png', 1, '2024-01-16', '2024-01-22'),
(5, 'J_profile Handels', '1705922128.png', 1, '2024-01-16', '2024-01-22'),
(6, 'Edge_Profile', '7.png', 1, '2024-01-16', '0000-00-00'),
(7, '45Drg_Cut_Handels', '6.PNG', 1, '2024-01-16', '2024-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_legtypes`
--

CREATE TABLE `tbl_legtypes` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_legtypes`
--

INSERT INTO `tbl_legtypes` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'No-skt', '1705408583.png', 1, '2024-01-16', '2024-01-16'),
(2, 'Wooden SKT', '1705408611.png', 1, '2024-01-16', '2024-01-16'),
(3, 'pvc-Leg with Skt', '1705408625.png', 1, '2024-01-16', '2024-01-16'),
(4, 'SS-leg', '1705408646.png', 1, '2024-01-16', '2024-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materialply6mm`
--

CREATE TABLE `tbl_materialply6mm` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `value` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active;0=inactive	',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_materialply6mm`
--

INSERT INTO `tbl_materialply6mm` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pre-lam particle board', '35', 1, '2024-01-16', '0000-00-00'),
(2, 'pre-lam MDF', '36', 1, '2024-01-16', '0000-00-00'),
(3, 'pre-lam HDHMR', '37', 1, '2024-01-16', '0000-00-00'),
(4, 'Neem-ply (MR)', '38', 1, '2024-01-16', '2024-01-17'),
(5, 'Neem-ply (BWP)', '55', 1, '2024-01-16', '0000-00-00'),
(6, 'Geen/Century-ply (MR)', '56', 1, '2024-01-16', '0000-00-00'),
(7, 'Geen/Century-ply (BWP)', '65', 1, '2024-01-16', '0000-00-00'),
(8, 'Particle board', '0', 1, '2024-01-16', '0000-00-00'),
(9, 'MDF', '0', 1, '2024-01-16', '0000-00-00'),
(10, 'HDHMR', '0', 1, '2024-01-16', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materialply18mm`
--

CREATE TABLE `tbl_materialply18mm` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `value` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_materialply18mm`
--

INSERT INTO `tbl_materialply18mm` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pre-lam particle board', '66', 1, '2024-01-16', '0000-00-00'),
(2, 'pre-lam MDF', '95', 1, '2024-01-16', '0000-00-00'),
(3, 'pre-lam HDHMR', '120', 1, '2024-01-16', '2024-01-17'),
(4, 'Neem-ply (MR)', '78', 1, '2024-01-16', '0000-00-00'),
(5, 'Neem-ply (BWP)', '110', 1, '2024-01-16', '0000-00-00'),
(6, 'Geen/Century-ply (MR)', '87', 1, '2024-01-16', '0000-00-00'),
(7, 'Geen/Century-ply (BWP)', '100', 1, '2024-01-16', '0000-00-00'),
(8, 'Particle board', '0', 1, '2024-01-16', '0000-00-00'),
(9, 'MDF', '0', 1, '2024-01-16', '0000-00-00'),
(10, 'HDHMR', '0', 1, '2024-01-16', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materials`
--

CREATE TABLE `tbl_materials` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_materials`
--

INSERT INTO `tbl_materials` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pre-lam particle board', '1705407775.png', 1, '2024-01-16', '2024-01-16'),
(2, 'pre-lam MDF', '1705407795.png', 1, '2024-01-16', '2024-01-16'),
(3, 'pre-lam HDHMR', '1705407811.png', 1, '2024-01-16', '2024-01-16'),
(4, 'Neem-ply (MR)', '1705407826.png', 1, '2024-01-16', '2024-01-16'),
(5, 'Neem-ply (BWP)', '1705407840.png', 1, '2024-01-16', '2024-01-16'),
(6, 'Geen/Century-ply (MR)', '1705407855.png', 1, '2024-01-16', '2024-01-16'),
(7, 'Geen/Century-ply (BWP)', '1705407871.png', 1, '2024-01-16', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migrations`
--

CREATE TABLE `tbl_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_migrations`
--

INSERT INTO `tbl_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `excel_sl_no` int(11) NOT NULL,
  `invoice_no` varchar(225) NOT NULL,
  `customer_name` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `zipcode` varchar(225) NOT NULL,
  `invoice_date` date NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `discount_coupon` double(10,2) NOT NULL,
  `gstAmt` double(10,2) NOT NULL,
  `grand_total` double(10,2) NOT NULL,
  `order_type` int(11) NOT NULL COMMENT '1=With Materials; 2=Only Job Work',
  `status` tinyint(1) NOT NULL COMMENT '1=pending; 2=Approval;  3=Payment confirmation ; 4=Ordered; 5=Manufacturing; 6=Ready to dispatch; 7=Dispatched; 8=Completed',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `username`, `excel_sl_no`, `invoice_no`, `customer_name`, `address`, `city`, `state`, `zipcode`, `invoice_date`, `total_amount`, `discount_coupon`, `gstAmt`, `grand_total`, `order_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AA2586', 0, 'INV-012', 'exaltedsol12', 'dumdum', 'kolkata', 'west bengle', '1234', '2024-02-08', 0.00, 0.00, 0.00, 0.00, 0, 10, '2024-02-08 11:48:21', '2024-02-16 09:12:48'),
(2, 'AA2586', 0, 'INV-015', 'exaltedsol15', 'dumdum', 'kolkata', 'west bengle', '1234', '2024-02-08', 0.00, 0.00, 0.00, 0.00, 0, 9, '2024-02-08 12:04:37', '2024-02-16 09:11:40'),
(3, 'AA2586', 0, 'INV-018', 'exaltedsol16', 'dumdum', 'kolkata', 'west bengle', '12345', '2024-02-09', 3987.24, 100.00, 717.70, 4604.94, 0, 1, '2024-02-09 05:44:49', '2024-02-09 05:44:49'),
(4, 'AA2586', 25, 'INV-021', 'exaltedsol21', 'dumdum', 'kolkata', 'west bengle', '1234', '2024-02-07', 17001.38, 100.00, 3060.25, 19961.63, 0, 5, '2024-02-09 07:42:39', '2024-02-16 09:12:15'),
(5, 'AA2586', 26, 'INV-025', 'exaltedsol26', 'dumdum', 'kolkata', 'west bengle', '1234', '2024-02-08', 6638.96, 100.00, 1195.01, 7733.97, 0, 5, '2024-02-09 09:14:10', '2024-02-16 09:12:22'),
(6, 'AA2586', 27, 'INV-027', 'exaltedsol27', 'dumdum', 'kolkata', 'west bengle', '1234', '2024-02-08', 3726.84, 100.00, 670.83, 4297.67, 1, 1, '2024-02-09 13:52:02', '2024-02-09 13:52:02'),
(7, 'AA2586', 34, 'INV-034', 'exaltedsol34', 'dumdum', 'kolkata', 'west bengle', '12345', '2024-02-12', 3987.24, 150.00, 717.70, 4554.94, 1, 8, '2024-02-12 05:52:56', '2024-02-16 09:12:34'),
(8, 'AR3086', 36, 'INV-036', 'exaltedsol36', 'dumdum', 'kolkata', 'west bengle', '12345', '2024-01-10', 7453.90, 200.00, 1341.70, 8595.60, 2, 8, '2024-02-12 05:56:57', '2024-02-16 09:23:04'),
(9, 'AA2586', 38, 'INV-038', 'exaltedsol38', 'howrah', 'Ranihati', 'west bengle', '1234', '2024-02-16', 6385.30, 200.00, 1149.35, 7334.65, 1, 9, '2024-02-16 06:37:13', '2024-02-16 09:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `cabinet_type` int(11) NOT NULL,
  `width` varchar(225) NOT NULL,
  `length` varchar(225) NOT NULL,
  `deep` varchar(225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `material` int(11) NOT NULL,
  `cabinetcolour` int(11) NOT NULL,
  `exposide` int(11) NOT NULL,
  `expo_colour` varchar(225) NOT NULL,
  `shutter_material` int(11) NOT NULL,
  `shutter_colour` varchar(225) NOT NULL,
  `leg_type` int(11) NOT NULL,
  `skthigh` varchar(225) NOT NULL,
  `handel_type` int(11) NOT NULL,
  `shutter_finish` varchar(225) NOT NULL,
  `remarks` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `LXD` double(10,2) NOT NULL,
  `WXL` double(10,2) NOT NULL,
  `WXD` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=''cancel'',1=''pending'',2=''delivered''',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `order_id`, `Category`, `subcategory`, `cabinet_type`, `width`, `length`, `deep`, `quantity`, `material`, `cabinetcolour`, `exposide`, `expo_colour`, `shutter_material`, `shutter_colour`, `leg_type`, `skthigh`, `handel_type`, `shutter_finish`, `remarks`, `price`, `LXD`, `WXL`, `WXD`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 3, '600', '560', '720', 1, 4, 2, 1, '2', 4, '2', 3, '2', 3, '', '', 3466.44, 8.68, 9.30, 7.23, 1, '2024-02-08 11:48:21', '2024-02-08 11:48:21'),
(2, 1, 1, 1, 3, '600', '560', '720', 1, 4, 2, 2, '2', 4, '2', 3, '2', 3, '', '', 3726.84, 8.68, 9.30, 7.23, 1, '2024-02-08 11:48:21', '2024-02-08 11:48:21'),
(3, 2, 1, 1, 3, '600', '560', '720', 1, 4, 2, 1, '2', 4, '2', 3, '2', 3, '', '', 3466.44, 8.68, 9.30, 7.23, 1, '2024-02-08 12:04:37', '2024-02-08 12:04:37'),
(4, 2, 1, 1, 3, '600', '560', '720', 1, 4, 2, 2, '2', 4, '2', 3, '2', 3, '', '', 3726.84, 8.68, 9.30, 7.23, 1, '2024-02-08 12:04:37', '2024-02-08 12:04:37'),
(5, 3, 1, 1, 3, '600', '560', '720', 1, 4, 1, 4, '2', 4, '2', 4, '2', 4, '', '', 3987.24, 8.68, 9.30, 7.23, 1, '2024-02-09 05:44:49', '2024-02-09 05:44:49'),
(7, 5, 1, 1, 2, '600', '560', '720', 1, 4, 1, 4, '2', 4, '2', 2, '2', 3, '', '', 4932.20, 8.68, 13.95, 10.85, 1, '2024-02-09 09:14:10', '2024-02-09 09:14:10'),
(8, 5, 1, 1, 1, '400', '650', '500', 1, 5, 1, 2, '2', 6, '2', 1, '2', 3, '', '', 1706.76, 3.50, 2.15, 2.80, 1, '2024-02-09 09:14:10', '2024-02-09 09:14:10'),
(10, 6, 1, 1, 3, '600', '560', '720', 1, 4, 2, 3, '2', 4, '2', 2, '2', 6, '', '', 3726.84, 8.68, 9.30, 7.23, 1, '2024-02-09 13:52:02', '2024-02-09 13:52:02'),
(11, 7, 1, 1, 3, '600', '560', '720', 1, 4, 2, 4, '2', 4, '2', 4, '2', 4, '', '', 3987.24, 8.68, 9.30, 7.23, 1, '2024-02-12 05:52:56', '2024-02-12 05:52:56'),
(12, 8, 1, 1, 3, '600', '560', '720', 1, 4, 2, 4, '2', 4, '2', 4, '2', 4, '', '', 3987.24, 8.68, 9.30, 7.23, 1, '2024-02-12 05:56:57', '2024-02-12 05:56:57'),
(13, 8, 1, 1, 2, '400', '540', '600', 1, 2, 2, 2, '2', 2, '2', 3, '2', 3, '', '', 3466.66, 6.97, 7.75, 6.97, 1, '2024-02-12 05:56:58', '2024-02-12 05:56:58'),
(14, 9, 1, 1, 2, '600', '560', '720', 1, 4, 1, 2, '2', 4, '2', 3, '2', 5, '', '', 4671.80, 8.68, 13.95, 10.85, 1, '2024-02-16 06:37:13', '2024-02-16 06:37:13'),
(15, 9, 1, 1, 1, '450', '650', '550', 1, 4, 1, 4, 'EXPO Colour', 4, 'Shutter Colour', 2, 'Skt Hight (mm)', 1, '', '', 1713.50, 3.85, 2.66, 3.15, 1, '2024-02-16 06:37:13', '2024-02-16 06:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_access_tokens`
--

CREATE TABLE `tbl_personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `appapikey` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `appapikey`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AKfycbyvdYLqyHaCpdN3f6DzxGVL4H2xQ1Il2Oo9GjKWy1ceCJnsuL5wIJhuiYpdLczSa1VMiQ', 1, '0000-00-00', '2024-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shuttermaterialply18mm`
--

CREATE TABLE `tbl_shuttermaterialply18mm` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `value` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active;0=inactive	',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shuttermaterialply18mm`
--

INSERT INTO `tbl_shuttermaterialply18mm` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Particle board', '133', 1, '2024-01-16', '2024-01-17'),
(2, 'Neem-ply (MR)', '126', 1, '2024-01-16', '0000-00-00'),
(3, 'Neem-ply (BWP)', '158', 1, '2024-01-16', '0000-00-00'),
(4, 'Geen/Century-ply (MR)', '135', 1, '2024-01-16', '0000-00-00'),
(5, 'Geen/Century-ply (BWP)', '157', 1, '2024-01-16', '0000-00-00'),
(6, 'MDF', '136', 1, '2024-01-16', '0000-00-00'),
(7, 'HDHMR', '153', 1, '2024-01-16', '0000-00-00'),
(8, 'pre-lam particle board', '0', 1, '2024-01-16', '0000-00-00'),
(9, 'pre-lam MDF', '0', 1, '2024-01-16', '0000-00-00'),
(10, 'pre-lam HDHMR', '0', 1, '2024-01-16', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shutter_materials`
--

CREATE TABLE `tbl_shutter_materials` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shutter_materials`
--

INSERT INTO `tbl_shutter_materials` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'particle board', '1705408387.png', 1, '2024-01-16', '2024-01-16'),
(2, 'MDF', '1705408400.png', 1, '2024-01-16', '2024-01-16'),
(3, 'HDHMR', '1705408416.png', 1, '2024-01-16', '2024-01-16'),
(4, 'Neem-ply (MR)', '1705408457.png', 1, '2024-01-16', '2024-01-16'),
(5, 'Neem-ply (BWP)', '1705408476.png', 1, '2024-01-16', '2024-01-16'),
(6, 'Geen/Century-ply (MR)', '1705408493.png', 1, '2024-01-16', '2024-01-16'),
(7, 'Geen/Century-ply (BWP)', '1705408514.png', 1, '2024-01-16', '2024-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategories`
--

CREATE TABLE `tbl_subcategories` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active;0=inactive',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategories`
--

INSERT INTO `tbl_subcategories` (`id`, `category_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Base_Cabinet', 'Base_Cabint.png', 1, '2024-01-16', '2024-01-16'),
(2, 1, 'Wall_Cabinet', 'Wall_Cabint.png', 1, '0000-00-00', '0000-00-00'),
(3, 1, 'Medium_Tall_Cabinet', 'Mid_tall_Cabint.png', 1, '0000-00-00', '0000-00-00'),
(4, 2, 'Swing door wardrobe', '', 1, '2024-01-17', '2024-01-17'),
(5, 2, 'Sliding door wardrobe', '', 1, '2024-01-17', '2024-01-17'),
(6, 2, 'Wardrobe internal parts', NULL, 1, '2024-01-17', '2024-01-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cabinets`
--
ALTER TABLE `tbl_cabinets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cabinettypes`
--
ALTER TABLE `tbl_cabinettypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_couponcodes`
--
ALTER TABLE `tbl_couponcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exposideprices`
--
ALTER TABLE `tbl_exposideprices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exposides`
--
ALTER TABLE `tbl_exposides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_handeltypes`
--
ALTER TABLE `tbl_handeltypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_legtypes`
--
ALTER TABLE `tbl_legtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_materialply6mm`
--
ALTER TABLE `tbl_materialply6mm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_materialply18mm`
--
ALTER TABLE `tbl_materialply18mm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_materials`
--
ALTER TABLE `tbl_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_personal_access_tokens`
--
ALTER TABLE `tbl_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_personal_access_tokens_token_unique` (`token`),
  ADD KEY `tbl_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shuttermaterialply18mm`
--
ALTER TABLE `tbl_shuttermaterialply18mm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shutter_materials`
--
ALTER TABLE `tbl_shutter_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cabinets`
--
ALTER TABLE `tbl_cabinets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cabinettypes`
--
ALTER TABLE `tbl_cabinettypes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_couponcodes`
--
ALTER TABLE `tbl_couponcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_exposideprices`
--
ALTER TABLE `tbl_exposideprices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_exposides`
--
ALTER TABLE `tbl_exposides`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_handeltypes`
--
ALTER TABLE `tbl_handeltypes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_legtypes`
--
ALTER TABLE `tbl_legtypes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_materialply6mm`
--
ALTER TABLE `tbl_materialply6mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_materialply18mm`
--
ALTER TABLE `tbl_materialply18mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_materials`
--
ALTER TABLE `tbl_materials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_personal_access_tokens`
--
ALTER TABLE `tbl_personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_shuttermaterialply18mm`
--
ALTER TABLE `tbl_shuttermaterialply18mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_shutter_materials`
--
ALTER TABLE `tbl_shutter_materials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
