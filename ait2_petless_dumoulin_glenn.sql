-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2020 at 06:54 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ait2_petless_dumoulin_glenn`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `content` text,
  `page_order` int(11) NOT NULL,
  `template` varchar(64) NOT NULL,
  `type` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `name`, `slug`, `title`, `content`, `page_order`, `template`, `type`) VALUES
(1, 'Home', 'home', 'Home', NULL, 1, 'home', NULL),
(2, 'Honden', 'posts/dogs', 'Honden', NULL, 2, 'posts', 'hond'),
(3, 'Katten', 'posts/cats', 'Katten', NULL, 3, 'posts', 'kat'),
(4, 'Andere', 'posts/other', 'Andere', NULL, 4, 'posts', 'andere'),
(5, 'Dier gevonden?', 'dier_gevonden', 'Wat kan je doen als je een dier vindt?', 'Hier komt de content voor de \"Dier gevonden?\" pagina.', 5, 'page', NULL),
(6, 'Contact', 'contact', 'Contacteer Ons', 'Hier komt de content voor de \"Contact\" pagina.', 6, 'page', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `type` varchar(32) NOT NULL,
  `race` varchar(32) DEFAULT NULL,
  `description` text NOT NULL,
  `found_on_lost_since` date NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `author_id`, `status`, `address`, `type`, `race`, `description`, `found_on_lost_since`, `image`, `created_on`) VALUES
(1, 1, 'found', 'Vromondstraat 48, 9270 Laarne, België', 'hond', 'bernard sennen', 'Deze hond heeft een witte vlek rond het linkeroog en draagt een rode halsband. Het beestje lijkt nog redelijk jong te zijn want het zit vol met energie en is de hele dag aan het rondlopen en kwispelen.', '2020-10-07', 'bernard_sennen.jpg', '2020-10-19 13:14:56'),
(2, 3, 'found', 'Industrieweg 12, 9000 Gent, België', 'hond', '', 'zwarte bulldog met een manke poot aan de rechter voorkant. Blaft naar elke vogel die voorbij vliegt.', '2020-10-15', 'bulldog.jpg', '2020-10-19 13:24:16'),
(3, 2, 'lost', 'Dendermondse Steenweg 16, 9300 Aalst, België', 'hond', 'poedel', 'Filou heeft een zachte, pluizige vacht en krijgt graag aandacht dus tegen geaaid worden zegt ze zeker geen nee. Als u haar gezien heeft, stuur dan zeker een berichtje om dit te laten weten.', '2020-09-30', 'poedel.jpg', '2020-10-19 13:31:09'),
(4, 4, 'found', 'Vromondstraat 48, 9270 Laarne, België', 'hond', 'duitse herder', 'Deze hond heeft een witte vlek rond het linkeroog en draagt een rode halsband. Het beestje lijkt nog redelijk jong te zijn want het zit vol met energie en is de hele dag aan het rondlopen en kwispelen.', '2020-10-03', 'duitse_herder.jpg', '2020-10-19 13:14:56'),
(5, 3, 'lost', 'Industrieweg  12, 9000 Gent, België', 'hond', 'huski', 'Deze hond heeft een witte vlek rond het linkeroog en draagt een rode halsband. Het beestje lijkt nog redelijk jong te zijn want het zit vol met energie en is de hele dag aan het rondlopen en kwispelen.', '2020-09-27', 'huski.jpg', '2020-10-19 13:14:56'),
(6, 2, 'found', 'Dendermondse Steenweg 16, 9300 Aalst, België', 'hond', 'bulldog', 'zwarte bulldog met een manke poot aan de rechter voorkant. Blaft naar elke vogel die voorbij vliegt.', '2020-10-13', 'bulldog.jpg', '2020-10-19 13:24:16'),
(7, 4, 'lost', 'Dendermondse Steenweg 16, 9300 Aalst, België', 'hond', '', 'Filou heeft een zachte, pluizige vacht en krijgt graag aandacht dus tegen geaaid worden zegt ze zeker geen nee. Als u haar gezien heeft, stuur dan zeker een berichtje om dit te laten weten.', '2020-10-17', 'bernard_sennen.jpg', '2020-10-19 13:31:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
