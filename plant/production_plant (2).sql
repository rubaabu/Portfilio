-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 09:14 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `production_plant`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `buy_id` int(11) NOT NULL,
  `fk_user_from` int(11) NOT NULL,
  `buy_message` varchar(300) NOT NULL,
  `buy_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`buy_id`, `fk_user_from`, `buy_message`, `buy_date`) VALUES
(20, 2, 'product A', '2019-09-12'),
(21, 2, 'Product B', '2019-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `employee_status` enum('worker','manager','engineer','director','accountant','dealer','technician') NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_date`, `employee_status`, `fk_user_id`) VALUES
(1, '2019-09-13 11:22:25', 'director', 5),
(2, '2019-09-13 11:22:50', 'engineer', 6),
(3, '2019-09-13 11:22:59', 'manager', 2),
(5, '2019-09-14 16:14:01', 'dealer', 7),
(6, '2019-09-14 16:20:47', '', 11),
(7, '2019-09-14 16:20:55', 'accountant', 10),
(8, '2019-09-14 16:21:02', 'worker', 8);

-- --------------------------------------------------------

--
-- Table structure for table `employment_app`
--

CREATE TABLE `employment_app` (
  `employment_id` int(12) NOT NULL,
  `employment_message` text NOT NULL,
  `employment_file` varchar(200) NOT NULL,
  `fk_user_from` int(11) NOT NULL,
  `employment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fk_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employment_app`
--

INSERT INTO `employment_app` (`employment_id`, `employment_message`, `employment_file`, `fk_user_from`, `employment_date`, `fk_type_id`) VALUES
(18, 'srdgfsf', '20131201_153749.jpg', 2, '2019-09-13 11:09:39', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

CREATE TABLE `employment_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employment_type`
--

INSERT INTO `employment_type` (`type_id`, `type_name`) VALUES
(1, 'IT'),
(2, 'Management'),
(3, 'Finance'),
(4, 'Producer');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `machine_id` int(12) NOT NULL,
  `machine_name` varchar(200) NOT NULL,
  `machine_description` varchar(250) NOT NULL,
  `machine_date` date NOT NULL,
  `machine_status` enum('active','defect') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`machine_id`, `machine_name`, `machine_description`, `machine_date`, `machine_status`) VALUES
(1, 'Machine num 1', 'for raw material', '2019-09-18', 'active'),
(2, 'Machine num 2', 'for covering', '2019-09-02', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `date`) VALUES
(1, 'New Technology', 'New machines for raw material', '2019-09-02'),
(2, 'New Offices', 'our offices are in 5 cities', '2019-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_quantity` int(200) NOT NULL,
  `product_date` datetime NOT NULL,
  `product_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_quantity`, `product_date`, `product_description`) VALUES
(1, 'Product A', 200, '2019-09-01 05:00:00', 'Ready to sale'),
(2, 'Product B', 20, '2019-09-02 06:00:00', 'its completely new'),
(3, 'Product C', 50, '2019-09-03 00:00:00', 'it has a very good quality '),
(4, 'Product D', 60, '2019-09-04 09:00:00', 'from China');

-- --------------------------------------------------------

--
-- Table structure for table `q_message`
--

CREATE TABLE `q_message` (
  `q_message` int(12) NOT NULL,
  `q_message_name` varchar(200) NOT NULL,
  `q_message_email` varchar(200) NOT NULL,
  `q_message_subject` varchar(200) NOT NULL,
  `q_message_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `q_message`
--

INSERT INTO `q_message` (`q_message`, `q_message_name`, `q_message_email`, `q_message_subject`, `q_message_message`) VALUES
(1, 'INFO', 'in@gmail.com', 'Products', 'where do you produce the products?');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `raw_material_id` int(12) NOT NULL,
  `raw_material_name` varchar(200) NOT NULL,
  `raw_material_date` datetime NOT NULL,
  `raw_material_description` text NOT NULL,
  `raw_material_price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`raw_material_id`, `raw_material_name`, `raw_material_date`, `raw_material_description`, `raw_material_price`) VALUES
(1, 'Metal', '2019-09-12 00:00:00', 'from Germany', '5 thousands euro');

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `repository_id` int(11) NOT NULL,
  `repository_name` varchar(200) NOT NULL,
  `repository_description` varchar(250) NOT NULL,
  `fk_user_owner` int(11) NOT NULL,
  `fk_employee_id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repository`
--

INSERT INTO `repository` (`repository_id`, `repository_name`, `repository_description`, `fk_user_owner`, `fk_employee_id`, `fk_product_id`) VALUES
(1, 'Repository A', 'for raw materials', 9, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(12) NOT NULL,
  `request_type` enum('buy','sale','pay') NOT NULL,
  `request_message` varchar(250) NOT NULL,
  `request_date` datetime NOT NULL,
  `fk_user_from` int(11) NOT NULL,
  `fk_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_type`, `request_message`, `request_date`, `fk_user_from`, `fk_status_id`) VALUES
(1, 'buy', 'the sections need new raw material', '2019-09-12 00:44:00', 6, 0),
(2, 'buy', 'wen need more plastic', '2019-09-26 00:00:00', 6, 0),
(3, 'pay', 'we need 5000€ for the plastic', '2019-09-26 00:00:00', 10, 0),
(4, 'sale', 'there is a lot of products ', '2019-09-12 00:00:00', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `fk_user_from` int(11) NOT NULL,
  `fk_user_to` int(11) NOT NULL,
  `salary_amount` varchar(200) NOT NULL,
  `salary_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `fk_user_from`, `fk_user_to`, `salary_amount`, `salary_date`) VALUES
(1, 5, 6, '2000 €', '2019-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(12) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `section_description` text NOT NULL,
  `fk_raw_material_id` int(12) NOT NULL,
  `fk_user_id` int(12) NOT NULL,
  `fk_employee_id` int(12) NOT NULL,
  `fk_machine` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `section_description`, `fk_raw_material_id`, `fk_user_id`, `fk_employee_id`, `fk_machine`) VALUES
(1, 'Convert', 'Convert raw materials into manufactured materials', 1, 9, 8, 1),
(2, 'section 2', 'the second section for Metal', 1, 12, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `show_requests`
--

CREATE TABLE `show_requests` (
  `show_request_id` int(11) NOT NULL,
  `show_request_name` varchar(200) NOT NULL,
  `show_request_type` enum('buy','sale','pay') NOT NULL,
  `show_request_description` varchar(200) NOT NULL,
  `fk_user_from` int(11) NOT NULL,
  `fk_user_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_requests`
--

INSERT INTO `show_requests` (`show_request_id`, `show_request_name`, `show_request_type`, `show_request_description`, `fk_user_from`, `fk_user_to`) VALUES
(1, 'need new raw material', 'buy', 'the repository need more raw material for product D', 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `telefon` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `status` enum('Married','single') NOT NULL,
  `children` varchar(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `date_of_start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `date_of_birth`, `email`, `password`, `telefon`, `address`, `gender`, `status`, `children`, `nationality`, `education`, `date_of_start`, `role`) VALUES
(2, 'rubaaboissa', '1997-10-17', 'user@gmail.com', '123123', '125487875121', 'reinprechtsdorfer strasse. 1050 vienna', 'f', 'single', 'Null', 'Syrien', 'Matura', '2019-09-17 19:13:51', 'user'),
(5, 'Director', '1988-05-05', 'director@gmail.com', '123123', '0935074175', 'lalagasse wien,1050', 'm', 'Married', 'one', 'Austrian', 'Civil engineer', '2019-09-17 19:09:09', 'director'),
(6, 'the engineer', '1991-01-03', 'eng@gmail.com', '123123', '0935214785', 'enggasse wien1050', 'f', 'Married', 'two', 'Austrian', 'Compute science engineer', '2019-09-17 19:09:55', 'eng'),
(7, 'the dealer', '1996-06-14', 'dealer@gmail.com', '123123', '123734562', 'Germany', 'm', 'Married', 'three', 'Austrian', 'Economics', '2019-09-17 19:10:32', 'dealer'),
(8, 'Worker', '2019-05-14', 'worker@gmail.com', '123123', '09358654785', 'starasse vienna', 'm', 'Married', 'three', 'austrian', 'HTL', '2019-09-14 16:15:46', 'user'),
(9, 'manager', '2019-02-12', 'manager@gmail.com', '123123', '2347523462', 'Graz', 'f', 'single', 'No Children', 'syrien', 'Bachelor degree ', '2019-09-17 19:11:12', 'manager'),
(10, 'accountant', '2017-10-18', 'acc@gmail.com', '123123', '234465475', 'Berlin', 'f', 'Married', 'four', 'German', 'Economics Master', '2019-09-17 19:11:57', 'acc'),
(11, 'technicien', '1997-01-16', 'tech@gmail.com', '123123', '1234566782', 'Sweden ', 'f', 'single', 'No children', 'Sweden', 'IT Bachelor ', '2019-09-17 19:12:46', 'tech'),
(12, 'Manager2', '1997-09-02', 'manager2@gmail.com', '123123', '0935410601', 'Vienna 1100', 'm', 'single', 'Null', 'Syrian', 'Economics Degree', '2019-09-17 18:51:27', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`buy_id`),
  ADD KEY `fk_user_from` (`fk_user_from`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `employment_app`
--
ALTER TABLE `employment_app`
  ADD PRIMARY KEY (`employment_id`),
  ADD KEY `fk_user_from` (`fk_user_from`),
  ADD KEY `fk_type_id` (`fk_type_id`);

--
-- Indexes for table `employment_type`
--
ALTER TABLE `employment_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `q_message`
--
ALTER TABLE `q_message`
  ADD PRIMARY KEY (`q_message`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`raw_material_id`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`repository_id`),
  ADD KEY `fk_user_owner` (`fk_user_owner`),
  ADD KEY `fk_product_id` (`fk_product_id`),
  ADD KEY `fk_employee_id` (`fk_employee_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `fk_user_from` (`fk_user_from`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `fk_user_from` (`fk_user_from`),
  ADD KEY `fk_user_to` (`fk_user_to`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `fk_raw_material_id` (`fk_raw_material_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_machine` (`fk_machine`),
  ADD KEY `fk_employee_id` (`fk_employee_id`);

--
-- Indexes for table `show_requests`
--
ALTER TABLE `show_requests`
  ADD PRIMARY KEY (`show_request_id`),
  ADD KEY `fk_user_to` (`fk_user_to`),
  ADD KEY `show_requests_ibfk_1` (`fk_user_from`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employment_app`
--
ALTER TABLE `employment_app`
  MODIFY `employment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employment_type`
--
ALTER TABLE `employment_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `q_message`
--
ALTER TABLE `q_message`
  MODIFY `q_message` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `raw_material_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `repository_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `show_requests`
--
ALTER TABLE `show_requests`
  MODIFY `show_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`fk_user_from`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `employment_app`
--
ALTER TABLE `employment_app`
  ADD CONSTRAINT `employment_app_ibfk_1` FOREIGN KEY (`fk_user_from`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `employment_app_ibfk_2` FOREIGN KEY (`fk_type_id`) REFERENCES `employment_type` (`type_id`);

--
-- Constraints for table `repository`
--
ALTER TABLE `repository`
  ADD CONSTRAINT `repository_ibfk_1` FOREIGN KEY (`fk_user_owner`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `repository_ibfk_2` FOREIGN KEY (`fk_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `repository_ibfk_3` FOREIGN KEY (`fk_employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`fk_user_from`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`fk_user_from`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`fk_user_from`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `salary_ibfk_2` FOREIGN KEY (`fk_user_to`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sections_ibfk_2` FOREIGN KEY (`fk_raw_material_id`) REFERENCES `raw_material` (`raw_material_id`),
  ADD CONSTRAINT `sections_ibfk_3` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sections_ibfk_4` FOREIGN KEY (`fk_machine`) REFERENCES `machine` (`machine_id`),
  ADD CONSTRAINT `sections_ibfk_5` FOREIGN KEY (`fk_employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `show_requests`
--
ALTER TABLE `show_requests`
  ADD CONSTRAINT `show_requests_ibfk_1` FOREIGN KEY (`fk_user_from`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `show_requests_ibfk_2` FOREIGN KEY (`fk_user_to`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
