-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2025 at 01:18 PM
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
-- Database: `icecream_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password_hash`, `created_at`) VALUES
(1, 'umesharyal323@gmail.com', '$2y$10$FjTUWV0PfH1610m9aAHhl.dFuSthnuWwtgGTlUiuyy0IMBQz6vP0m', '2025-08-08 01:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` text NOT NULL,
  `submitted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_path`, `caption`) VALUES
(2, 'whatsapp_image_2025-06-02_at_14.05.58_2d8c4a54.jpg', 'Chokolade'),
(3, 'whatsapp_image_2025-06-02_at_14.05.58_26d19268.jpg', 'Pistacie'),
(4, 'whatsapp_image_2025-06-02_at_14.05.58_ea6fd50c.jpg', ''),
(5, 'whatsapp_image_2025-06-02_at_14.05.58_c8545370.jpg', ''),
(6, '33cf15ad39cc509e93c8499956c8f016.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `image`, `category`, `created_at`) VALUES
(1, 'sdf', 'adsfb', 34.00, 'vecteezy_ice-cream-sune-topped-with-chocolate-syrup-and-a-cherry_56814988.png', 'sdfg', '2025-08-08 02:26:38'),
(3, 'Pistacie', 'Pistachio ice cream is a sweet, creamy frozen dessert characterized by the distinct flavor and subtle green hue of pistachios. It\'s often made with a custard base, incorporating egg yolks for a rich, smooth texture, and may include roasted pistachio pieces for added flavor and crunch. The flavor profile is a delightful balance of sweet and nutty, with some variations incorporating extracts like vanilla or almond to enhance the pistachio taste. ', 8.00, 'WhatsApp Image 2025-06-02 at 14.05.58_26d19268.jpg', 'Dessert', '2025-08-09 06:12:33'),
(4, 'Chokolade', 'Chocolate ice cream is a frozen dessert typically made with a base of cream, milk, sugar, and vanilla, with the addition of cocoa powder or chocolate liquor to give it a chocolate flavor and brown color. It\'s a popular and versatile flavor, often enjoyed on its own or as part of other desserts like sundaes or milkshakes', 10.00, 'WhatsApp Image 2025-06-02 at 14.05.58_2d8c4a54.jpg', 'Frozen Dessert', '2025-08-09 06:14:26'),
(5, 'icecreams', 'sadfghj', 9.00, 'WhatsApp Image 2025-06-02 at 14.05.58_ea6fd50c.jpg', '', '2025-08-09 06:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) DEFAULT NULL,
  `is_shop_review` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customer_name`, `rating`, `comment`, `created_at`, `item_id`, `is_shop_review`) VALUES
(6, 'umesh', 5, 'sdfg', '2025-08-09 01:01:36', 2, 0),
(7, 'dwertgh', 5, 'wewrfgfh', '2025-08-09 02:43:36', 0, 0),
(9, 'dc', 5, 'd', '2025-08-09 02:48:48', NULL, 1),
(10, 'hsgjjd', 5, 'sasas', '2025-08-09 02:49:02', NULL, 1),
(11, 'umesh', 5, 'best shop', '2025-08-09 02:50:04', NULL, 1),
(12, 'rima', 4, 'i love the people', '2025-08-09 02:50:19', NULL, 1),
(14, 'umesh', 5, 'love the flavors', '2025-08-09 06:19:49', 3, 0),
(15, 'umesh', 5, 'dszfxcgv', '2025-08-10 09:23:54', NULL, 1),
(17, 'dfg', 3, 'dfgh', '2025-08-10 09:30:40', NULL, 1),
(18, 'dfgh', 4, 'fdgh', '2025-08-10 09:30:55', NULL, 1),
(19, 'sfdgh', 5, 'dgfhj', '2025-08-10 09:31:12', NULL, 1),
(20, 'gnhbnm', 5, 'gvnbm', '2025-08-10 09:31:25', NULL, 1),
(21, 'hghgh', 3, 'dfgh', '2025-08-10 09:32:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `currency_symbol` varchar(10) NOT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `shop_hours` varchar(100) DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `shop_name`, `currency_symbol`, `contact_email`, `contact_phone`, `shop_hours`, `about`) VALUES
(1, 'Frederiksberg ishus', 'DKK', 'aryalrima789@gmail.com', '+45 42347624', 'Sun - Sat: 11:00 AM - 22:00 PM', 'Best ice cream shop in town!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
