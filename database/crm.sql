-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 05:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerfeedbacks`
--

CREATE TABLE `customerfeedbacks` (
  `cfb_id` int(6) NOT NULL,
  `cfb_costumer_id` int(6) NOT NULL,
  `cfb_detailes` longtext NOT NULL,
  `cfb_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `costumer_id` int(6) NOT NULL,
  `costumer_name` varchar(200) NOT NULL,
  `costumer_email` varchar(200) NOT NULL,
  `costumer_phoneno` varchar(200) DEFAULT NULL,
  `costumer_password` varchar(200) NOT NULL,
  `costumer_created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `costomer_update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loyalties`
--

CREATE TABLE `loyalties` (
  `loyalty_id` int(6) NOT NULL,
  `loyalty_customer_id` int(6) NOT NULL,
  `loyalty_point` int(10) NOT NULL,
  `loyalty_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(6) NOT NULL,
  `order_customer_id` int(6) NOT NULL,
  `order_product_id` int(6) NOT NULL,
  `order_quantity` int(6) NOT NULL,
  `order_payment_id` int(6) NOT NULL,
  `order_create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(6) NOT NULL,
  `payment_customer_id` int(6) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `payment_create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(6) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `product_details` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_suppier_id` int(6) NOT NULL,
  `Product_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(6) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_address` varchar(200) NOT NULL,
  `supplier_payment_mode` varchar(200) NOT NULL,
  `supplier_contact` varchar(200) NOT NULL,
  `supplier_create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `user_phoneno` varchar(200) DEFAULT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerfeedbacks`
--
ALTER TABLE `customerfeedbacks`
  ADD PRIMARY KEY (`cfb_id`),
  ADD KEY `CFBTOCUSTOMER` (`cfb_costumer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`costumer_id`);

--
-- Indexes for table `loyalties`
--
ALTER TABLE `loyalties`
  ADD PRIMARY KEY (`loyalty_id`),
  ADD KEY `LOYALYTOCUSTOMER` (`loyalty_customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `ORDERTOPAYMENT` (`order_payment_id`),
  ADD KEY `ORFERTOCUSTOMER` (`order_customer_id`),
  ADD KEY `ORDERTOPRODUCT` (`order_product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `PAYMENTTOCUSTOMER` (`payment_customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `PRODUCTTOSUPPLIER` (`product_suppier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerfeedbacks`
--
ALTER TABLE `customerfeedbacks`
  MODIFY `cfb_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `costumer_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loyalties`
--
ALTER TABLE `loyalties`
  MODIFY `loyalty_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerfeedbacks`
--
ALTER TABLE `customerfeedbacks`
  ADD CONSTRAINT `CFBTOCUSTOMER` FOREIGN KEY (`cfb_costumer_id`) REFERENCES `customers` (`costumer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `loyalties`
--
ALTER TABLE `loyalties`
  ADD CONSTRAINT `LOYALYTOCUSTOMER` FOREIGN KEY (`loyalty_customer_id`) REFERENCES `customers` (`costumer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ORDERTOPAYMENT` FOREIGN KEY (`order_payment_id`) REFERENCES `payments` (`payment_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ORDERTOPRODUCT` FOREIGN KEY (`order_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ORFERTOCUSTOMER` FOREIGN KEY (`order_customer_id`) REFERENCES `customers` (`costumer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `PAYMENTTOCUSTOMER` FOREIGN KEY (`payment_customer_id`) REFERENCES `customers` (`costumer_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `PRODUCTTOSUPPLIER` FOREIGN KEY (`product_suppier_id`) REFERENCES `suppliers` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
