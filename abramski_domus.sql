-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2022 at 03:35 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abramski_domus`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`) VALUES
(5, '1663164268.jpg', '2022-09-14 14:04:28'),
(6, '1663164402.jpg', '2022-09-14 14:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `popular` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `created_at`) VALUES
(4, 'Chairs', 'chairs', 'All kinds of chairs', 0, 0, '1661084973.jpg', '2022-08-21 12:29:33'),
(6, 'Tables', 'tables', 'All sorts of tables', 0, 0, '1661529348.jpg', '2022-08-26 15:55:48'),
(8, 'Beds', 'beds', 'All kinds of beds', 0, 0, '1663157560.jpg', '2022-09-14 12:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_orders`
--

CREATE TABLE `mobile_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax` int(11) NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mobile_orders`
--

INSERT INTO `mobile_orders` (`id`, `name`, `email`, `phone`, `address`, `date`, `comment`, `tax`, `total_price`) VALUES
(2, 'Lukas', 'abc@luk.as', '123456789', 'Petrina 17', '7/7/2022', 'No comment', 11, 833),
(4, 'Petra', 'petra@mail.com', '77755523', 'Ogulinska 3', '03/03/2023', 'Nista', 11, 833),
(5, 'Ana', 'ana@mail.com', '8235472', 'Vuckova 5', '01/01/2024', 'No', 11, 1110),
(6, 'Lik', 'neki@lik.hr', '5550173', 'Alojzija Stepinca 17', '04/07/2055', 'No koment', 11, 1665),
(9, 'Opet', 'opet@mail.pu', '825371031', 'Adresa', '07/07/2027', 'Komentar', 11, 2220);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_order_items`
--

CREATE TABLE `mobile_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price_item` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mobile_order_items`
--

INSERT INTO `mobile_order_items` (`id`, `order_id`, `amount`, `price_item`, `product_id`, `product_name`) VALUES
(1, 2, 1, 750, 5, 'Kids Bed'),
(2, 3, 1, 1000, 1, 'Gaming chair'),
(3, 4, 1, 750, 5, 'Kids Bed'),
(4, 5, 1, 1000, 1, 'Gaming chair'),
(5, 6, 2, 750, 5, 'Kids Bed'),
(6, 7, 2, 750, 5, 'Kids Bed'),
(7, 8, 2, 750, 5, 'Kids Bed'),
(8, 9, 2, 1000, 1, 'Gaming chair'),
(9, 10, 1, 750, 5, 'Kids Bed'),
(10, 10, 1, 1000, 1, 'Gaming chair');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `pin` int(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_id`, `user_id`, `name`, `email`, `phone`, `address`, `pin`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(1, 'domusorder566150173', 3, 'Lukas', 'abc@gmail.com', '5550173', 'Stepinceva 17', 3596, 2720, 'COD', '', 0, NULL, '2022-08-27 19:40:08'),
(2, 'domusorder4785579631', 3, 'Ana', 'abc@gmail.com', '55579631', 'NJEMACKA 57', 4896, 1750, 'COD', '', 0, NULL, '2022-11-13 21:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`) VALUES
(1, 1, 2, 2, 750, '2022-08-27 19:40:08'),
(2, 1, 3, 4, 55, '2022-08-27 19:40:08'),
(3, 1, 1, 1, 1000, '2022-08-27 19:40:08'),
(4, 2, 5, 1, 750, '2022-11-13 21:36:30'),
(5, 2, 1, 1, 1000, '2022-11-13 21:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `quantity`, `status`, `trending`, `created_at`) VALUES
(1, 4, 'Gaming chair', 'gaming-chair', 'Perfect chair for gamers', 'Perfect chair for gamersPerfect chair for gamersPerfect chair for gamers', 1700, 1000, '1661085667.jpg', 14, 0, 1, '2022-08-21 12:41:07'),
(2, 4, 'Office Chair', 'office-chair', 'Great chair for every office', 'This chair is a great choice for everyone who are spending a lot of time in the office.', 1000, 750, '1661529676.jpg', 9, 0, 0, '2022-08-26 16:01:16'),
(3, 6, 'Round Table', 'round-table', 'Small round table', 'Small round tableSmall round tableSmall round tableSmall round table', 80, 55, '1661529834.jpg', 7, 0, 0, '2022-08-26 16:03:54'),
(5, 8, 'Kids Bed', 'kids-bed', 'Perfect bed for kids', 'Perfect bed for kids perfect bed for kids perfect bed for kids', 1000, 750, '1663157630.jpg', 24, 0, 1, '2022-09-14 12:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(1, 'LAbram', 'admin@gmail.com', 5550173, '12344321', 1, '2022-07-15 16:48:21'),
(3, 'lukas', 'abc@gmail.com', 3334455, '1234', 1, '2022-07-29 15:50:08'),
(4, 'Ana', 'ana@gmail.com', 22558833, '01236', 0, '2022-09-05 17:25:10'),
(5, 'Webm', 'web@mob.com', 5550174, '1234', 0, '2022-09-13 15:40:04'),
(6, 'Maris', 'maris@gmail.com', 5557775, '1234', 0, '2022-09-13 15:59:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_orders`
--
ALTER TABLE `mobile_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_order_items`
--
ALTER TABLE `mobile_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mobile_orders`
--
ALTER TABLE `mobile_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mobile_order_items`
--
ALTER TABLE `mobile_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
