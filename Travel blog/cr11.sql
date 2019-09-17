-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 12:21 PM
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
-- Database: `cr11`
--

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `concert_id` smallint(5) UNSIGNED NOT NULL,
  `concert_name` varchar(30) NOT NULL,
  `concert_location` varchar(30) NOT NULL,
  `eventdate` date NOT NULL,
  `eventtime` time NOT NULL,
  `web_address` varchar(50) NOT NULL,
  `fk_things_to_do` smallint(5) UNSIGNED DEFAULT NULL,
  `fK_concert_location` smallint(5) UNSIGNED DEFAULT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`concert_id`, `concert_name`, `concert_location`, `eventdate`, `eventtime`, `web_address`, `fk_things_to_do`, `fK_concert_location`, `price`) VALUES
(1, 'Kris Kristofferson', 'Vienna 1150, Wiener Stadthalle', '2018-11-18', '20:00:00', 'http://kriskristofferson.com/', NULL, NULL, '58,50 EUR'),
(2, 'Lenny Kravitz', 'Vienna 1150, Wiener Stadthalle', '2019-12-09', '19:30:00', 'www.lennykravitz.com/', NULL, NULL, '47,80 EUR'),
(3, 'Herbert Granemeyer', 'Vienna 1150, Wiener Stadthalle', '2019-09-12', '19:30:00', 'https://www.wien-ticket.at/', NULL, NULL, '58.20EUR'),
(4, 'Enrique Iglasias', 'Vienna, 1150 Wiener Stadthalle', '2018-05-13', '20:30:00', 'www.enriqueiglasias.com/', NULL, NULL, '400.25EUR'),
(36, 'mozart', 'oper', '2019-02-02', '08:30:00', 'www.facebook.com', NULL, NULL, '45.00eur');

-- --------------------------------------------------------

--
-- Table structure for table `concert_location`
--

CREATE TABLE `concert_location` (
  `conlocation_id` smallint(5) UNSIGNED NOT NULL,
  `city` varchar(30) NOT NULL,
  `ZIPcode` int(4) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concert_location`
--

INSERT INTO `concert_location` (`conlocation_id`, `city`, `ZIPcode`, `address`, `image`) VALUES
(1, 'Vienna', 1150, 'Wiener Stadthalle, Halle F, Roland Rainer Platz 1', 0x6b7269732e6a7067),
(2, 'Vienna', 1150, 'Wiener Stadthalle - Halle D, Roland Rainer Platz 1', 0x6c656e6e792e6a7067),
(3, 'Vienna', 1150, 'Wiener Stadthalle - Halle D, Roland Rainer Platz 1', 0x65692e6a7067),
(4, 'Vienna', 1150, 'Wiener Stadthalle - Halle D', 0x6865722e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` smallint(5) UNSIGNED NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurant_location` varchar(50) NOT NULL,
  `restaurant_type` varchar(50) NOT NULL,
  `restaurant_tel` varchar(50) NOT NULL,
  `short_description` varchar(100) NOT NULL,
  `web_address` varchar(50) NOT NULL,
  `fk_restaurant_location` smallint(5) UNSIGNED DEFAULT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `restaurant_name`, `restaurant_location`, `restaurant_type`, `restaurant_tel`, `short_description`, `web_address`, `fk_restaurant_location`, `image`) VALUES
(1, 'Lemon Leaf', '', 'Thai', '+43(1)5812308', 'The Thai food culture has a very long history and finds its origin in China, India and Europe. Over ', 'http://www.lemonleaf.at/', NULL, ''),
(2, 'SIXTA', '', 'Viennese', '+43 1 58 528 56 l +43 1 58 528 56', 'Viennese cuisine, Austrian, International', 'http://www.sixta-restaurant.at/', NULL, ''),
(3, 'MR. ORIENT', '', 'syrian', '068864330649', 'Experience with us an evening with varied or oriental cuisine and all its culinary subtleties', 'https://www.mr-orient-wien.at/', NULL, ''),
(4, 'Vapiano', '', 'italien', '(0) 15122277', 'ALL WE DO, WE DO WITH LOVE, TO REFRESH YOUR LIFE.', 'https://at.vapiano.com/at/home/', NULL, ''),
(12, 'hamyam', 'Vienna', 'syrian', '0265498541', 'optimistic', 'www.oper.at', NULL, ''),
(13, 'hamyam', 'dada', 'syrian', '234234', 'sdsd', 'rgdbrd@gmail.com', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_location`
--

CREATE TABLE `restaurant_location` (
  `reslocation_id` smallint(5) UNSIGNED NOT NULL,
  `city` varchar(30) NOT NULL,
  `ZIPcode` int(4) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_location`
--

INSERT INTO `restaurant_location` (`reslocation_id`, `city`, `ZIPcode`, `address`, `image`) VALUES
(1, 'Vienna', 1050, 'Kettenbrückengasse 19', 0x6c656d6f6e2e6a7067),
(2, 'Vienna', 1050, 'Schönbrunner Straße 21', 0x73697874612e6a7067),
(3, 'Vienna', 1010, 'Walfischgasse 11', 0x76617069616e6f2e6a7067),
(4, 'Vienna', 1030, ' Schlachthausgasse 16', 0x6f7269656e742e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `things_location`
--

CREATE TABLE `things_location` (
  `thlocation_id` smallint(5) UNSIGNED NOT NULL,
  `city` varchar(30) NOT NULL,
  `ZIPcode` int(4) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `things_location`
--

INSERT INTO `things_location` (`thlocation_id`, `city`, `ZIPcode`, `address`, `image`) VALUES
(1, 'Vienna', 1010, 'Karlsplatz 1', 0x6b61726c2e6a7067),
(2, 'Vienna', 1130, 'Maxingstraße 13b', 0x7a6f6f2e6a7067),
(3, 'Vienna', 1010, 'Operahouse, Opernring 2', 0x6d656c6b2e6a7067),
(4, 'Vienna', 1030, 'Prinz-Eugen-Strasse 27', 0x62656c7665646572652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `things_to_do`
--

CREATE TABLE `things_to_do` (
  `things_id` smallint(5) UNSIGNED NOT NULL,
  `things_name` varchar(30) NOT NULL,
  `things_location` varchar(30) NOT NULL,
  `things_Type` varchar(20) NOT NULL,
  `short_description` varchar(100) NOT NULL,
  `web_address` varchar(50) NOT NULL,
  `fk_rstaurants` smallint(5) UNSIGNED DEFAULT NULL,
  `fK_things_location` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `things_to_do`
--

INSERT INTO `things_to_do` (`things_id`, `things_name`, `things_location`, `things_Type`, `short_description`, `web_address`, `fk_rstaurants`, `fK_things_location`) VALUES
(1, 'St. Charles Church', 'Vienna 1010, Karlsplatz 1', 'museum', 'A magnificent religious building with a large cupola: St. Charles Church, the last work of the emine', 'http://www.karlskirche.at/', NULL, NULL),
(2, 'Tiergarten SchÃ¶nbrunn', ' Vienna 1130, Maxingstrasse 13', 'Zoo', 'From penguins and orangutans to giant pandas: discover more than 700 species of animals in the uniqu', 'https://www.zoovienna.at/en/', NULL, NULL),
(3, 'Melk Abbey and Danube Valley D', 'Vienna 1010, Operahouse, Opern', 'Trip', 'Arrive at the central Vienna meeting point for a 9am departure. Travel to the Danube Valley aboard a', 'https://www.tripadvisor.com/AttractionProductRevie', NULL, NULL),
(4, 'Belvedere Museum', 'Vienna 1030, Prinz-Eugen-Stras', 'museum', 'The two Belvedere palaces were built in the early eighteenth century by the famous Baroque architect', 'https://www.belvedere.at/en', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `role`) VALUES
(1, 'Ruba ABU ISA', 'abu@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin'),
(2, 'rabba', 'abur@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user'),
(3, 'Ruba ABU ISA', 'ruba@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`concert_id`),
  ADD KEY `FK_things_to_do` (`fk_things_to_do`),
  ADD KEY `FK_consert_location` (`fK_concert_location`);

--
-- Indexes for table `concert_location`
--
ALTER TABLE `concert_location`
  ADD PRIMARY KEY (`conlocation_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `FK_restaurant_location` (`fk_restaurant_location`);

--
-- Indexes for table `restaurant_location`
--
ALTER TABLE `restaurant_location`
  ADD PRIMARY KEY (`reslocation_id`);

--
-- Indexes for table `things_location`
--
ALTER TABLE `things_location`
  ADD PRIMARY KEY (`thlocation_id`);

--
-- Indexes for table `things_to_do`
--
ALTER TABLE `things_to_do`
  ADD PRIMARY KEY (`things_id`),
  ADD KEY `FK_things_location` (`fK_things_location`),
  ADD KEY `FK_rstaurants` (`fk_rstaurants`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `concert_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `concert_location`
--
ALTER TABLE `concert_location`
  MODIFY `conlocation_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurant_location`
--
ALTER TABLE `restaurant_location`
  MODIFY `reslocation_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `things_location`
--
ALTER TABLE `things_location`
  MODIFY `thlocation_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `things_to_do`
--
ALTER TABLE `things_to_do`
  MODIFY `things_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `FK_consert_location` FOREIGN KEY (`fK_concert_location`) REFERENCES `concert_location` (`conlocation_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_things_to_do` FOREIGN KEY (`fk_things_to_do`) REFERENCES `things_to_do` (`things_id`) ON UPDATE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `FK_restaurant_location` FOREIGN KEY (`fk_restaurant_location`) REFERENCES `restaurant_location` (`reslocation_id`) ON UPDATE CASCADE;

--
-- Constraints for table `things_to_do`
--
ALTER TABLE `things_to_do`
  ADD CONSTRAINT `FK_rstaurants` FOREIGN KEY (`fk_rstaurants`) REFERENCES `restaurants` (`restaurant_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_things_location` FOREIGN KEY (`fK_things_location`) REFERENCES `things_location` (`thlocation_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
