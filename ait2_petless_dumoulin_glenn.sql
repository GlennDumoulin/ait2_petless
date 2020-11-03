-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 03 nov 2020 om 15:18
-- Serverversie: 5.7.24
-- PHP-versie: 7.4.1

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
-- Tabelstructuur voor tabel `bookmarks`
--

CREATE TABLE `bookmarks` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bookmarks`
--

INSERT INTO `bookmarks` (`user_id`, `post_id`) VALUES
(1, 5),
(2, 9),
(3, 6),
(2, 3),
(5, 1),
(4, 9),
(1, 8),
(3, 9),
(3, 2),
(3, 5),
(2, 7),
(2, 4),
(2, 6),
(1, 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chatgroups`
--

CREATE TABLE `chatgroups` (
  `group_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `first_user_id` int(11) NOT NULL,
  `second_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `chatgroups`
--

INSERT INTO `chatgroups` (`group_id`, `post_id`, `first_user_id`, `second_user_id`) VALUES
(1, 8, 1, 6),
(2, 9, 4, 1),
(3, 3, 4, 3),
(4, 5, 5, 2),
(5, 7, 1, 5),
(6, 3, 2, 3),
(9, 7, 2, 5),
(10, 9, 2, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chatmessages`
--

CREATE TABLE `chatmessages` (
  `group_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `send_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `chatmessages`
--

INSERT INTO `chatmessages` (`group_id`, `sender_id`, `message`, `send_at`) VALUES
(1, 1, 'Dit is een test.', '2020-11-01 16:47:30'),
(1, 6, 'Dit is een nieuwe test Dit is een nieuwe test Dit is een nieuwe test Dit is een nieuwe test Dit is een nieuwe test Dit is een nieuwe test Dit is een nieuwe test Dit is een nieuwe test', '2020-11-01 18:22:42'),
(1, 1, 'Test aan de hand van inputveld.', '2020-11-01 19:10:55'),
(1, 1, 'Nog een test en hopelijk refreshed de pagina direct', '2020-11-01 19:19:03'),
(2, 4, 'Beste Glenn\r\nHet zou wel eens kunnen zijn dat u mijn lieve husky gevonden heeft. Heeft u deze hond meegenomen bij u thuis of is dit gewoon een melding dat u deze hond gespot heeft.\r\nAlvast bedankt\r\nMet vriendelijke groeten\r\nRomanie', '2020-11-01 19:30:58'),
(3, 4, 'zuk n skone katte', '2020-11-01 19:34:20'),
(4, 5, 'Een vriend van mij is zijn Bernard Sennen recentelijk kwijt geraakt. Ik zal hem eens contacteren en ik kom zeker nog eens terug op dit bericht.', '2020-11-01 19:36:00'),
(5, 1, 'Heey Jarne', '2020-11-01 21:55:46'),
(2, 1, 'Het beestje lag er mag droevig bij dus het is momenteel bij mij thuis. Kan ik iets doen om te testen of dit uw hond is bv een naam waarop hij/zij zou reageren?', '2020-11-02 12:07:03'),
(2, 1, 'Ik heb net opgemerkt dat hij/zij precies wel enthousiast lijkt te worden als ik hier over een Romanie spreek.', '2020-11-02 12:10:24'),
(6, 2, 'Beste Elien indien u deze kat bij u in huis heeft genomen, zou u dan eens kunnen kijken of hij een stervormige witte vlek heeft rond zijn linkeroor. Hij laat zich graag aaien dus in zijn buurt komen zou geen probleem mogen zijn. Alvast bedankt', '2020-11-02 12:19:20'),
(9, 2, 'Dien ond ziet druit lijk dat em in den dik ga skitten', '2020-11-02 19:41:57'),
(10, 2, 'toh een skoon beestjen wi', '2020-11-02 19:43:04'),
(11, 1, 'Hallo Test', '2020-11-03 12:17:42');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
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
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`page_id`, `name`, `slug`, `title`, `content`, `page_order`, `template`, `type`) VALUES
(1, 'Home', 'home', 'Home', NULL, 1, 'home', NULL),
(2, 'Honden', 'posts/dogs', 'Honden', NULL, 2, 'posts', 'hond'),
(3, 'Katten', 'posts/cats', 'Katten', NULL, 3, 'posts', 'kat'),
(4, 'Andere', 'posts/other', 'Andere', NULL, 4, 'posts', 'andere'),
(5, 'Dier gevonden?', 'dier_gevonden', 'Wat kan je doen als je een dier vindt?', 'Hier komt de content voor de \"Dier gevonden?\" pagina.', 5, 'page', NULL),
(6, 'Contact', 'contact', 'Contacteer Ons', '                                        Hier komt de content voor de \"Contact\" pagina.                                ', 6, 'page', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `type` varchar(64) NOT NULL,
  `race` varchar(64) DEFAULT NULL,
  `description` text NOT NULL,
  `found_on_lost_since` date NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`post_id`, `author_id`, `status`, `address`, `type`, `race`, `description`, `found_on_lost_since`, `image`, `created_on`) VALUES
(1, 1, 'found', 'Vromondstraat 27, 9270 Kalken', 'hond', 'husky', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan eros lectus, nec ullamcorper lorem euismod vitae. Aenean a tortor tellus. Donec at gravida massa, sit amet auctor orci. Duis ipsum elit, molestie vitae urna sit amet, malesuada fringilla leo. Quisque commodo dui orci, nec elementum velit mattis vel. Maecenas augue massa, vulputate id nulla eget, convallis commodo ex. Suspendisse suscipit tellus ac mauris ullamcorper, eget mattis ex laoreet. Cras eu turpis rhoncus, tempor massa eu, feugiat nisi. Quisque ipsum purus, consequat at velit vitae, tincidunt tincidunt leo. Fusce et convallis augue, non blandit ante. Praesent ullamcorper diam et dignissim facilisis. Proin finibus faucibus hendrerit.', '2020-10-20', '5f9c62e09a4b7.jpg', '2020-10-30 19:00:48'),
(2, 5, 'lost', 'Koedreef 3, 9070 Destelbergen', 'hond', 'pekinees', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu est ac ex placerat feugiat gravida quis ligula. Praesent at enim consequat, placerat tellus et, malesuada mi. Proin feugiat nisi purus, quis iaculis nisl tempus ut. Donec ac nunc non neque efficitur hendrerit. Donec euismod faucibus sapien aliquam fermentum. In at tempus nulla. Phasellus aliquet ligula non elit ullamcorper placerat.', '2020-09-12', '5f9c655e7213a.jpg', '2020-10-30 19:11:26'),
(3, 3, 'found', 'Kramershoek 8, 9940 Evergem', 'kat', 'perzisch', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu massa turpis. Nam lobortis at orci fermentum auctor. Pellentesque iaculis, lectus eu placerat lacinia, lorem diam efficitur sapien, ut placerat purus tortor eu ipsum. Pellentesque gravida dapibus hendrerit. Etiam elit libero, pellentesque eget ornare ut, molestie quis enim. Donec posuere elit sit amet nisi pharetra dignissim. Morbi ut placerat mauris. Fusce luctus eleifend metus sed laoreet.', '2020-10-12', '5f9c6716809ce.jpg', '2020-10-30 19:18:46'),
(4, 3, 'resolved', 'Dendermondse Steenweg 31, 9300 Aalst', 'kat', 'naaktkat', 'Dit is een test voor het bewerken van een post.\r\nEnkel de eigenaar van een post kan dit doen.', '2020-08-31', '5f9d88f4a49e4.jpg', '2020-10-30 19:27:34'),
(5, 2, 'found', 'Tuimelaarstraat 12, 9240 Zele', 'hond', 'bernard sennen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sem eros, suscipit laoreet enim eget, scelerisque rhoncus purus. Praesent at vehicula arcu, eu mollis felis. Sed porttitor sodales risus, eu dictum erat gravida et. Mauris scelerisque nulla eget sapien mattis, non molestie risus congue. Etiam vestibulum dolor eu tellus maximus accumsan. Proin non nulla ut turpis aliquam maximus. Phasellus nec nunc vitae ex pulvinar scelerisque at sit amet libero.', '2020-10-30', '5f9d68885ba48.jpg', '2020-10-31 13:37:12'),
(6, 1, 'lost', 'Bosstraatje 22, 9270 Kalken', 'hond', 'poedel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sem eros, suscipit laoreet enim eget, scelerisque rhoncus purus. Praesent at vehicula arcu, eu mollis felis. Sed porttitor sodales risus, eu dictum erat gravida et. Mauris scelerisque nulla eget sapien mattis, non molestie risus congue. Etiam vestibulum dolor eu tellus maximus accumsan. Proin non nulla ut turpis aliquam maximus. Phasellus nec nunc vitae ex pulvinar scelerisque at sit amet libero.', '2020-10-26', '5f9d68f76a431.jpg', '2020-10-31 13:39:03'),
(7, 5, 'lost', 'Ringvaartstraat 41, 9000 Gent', 'hond', 'bulldog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sem eros, suscipit laoreet enim eget, scelerisque rhoncus purus. Praesent at vehicula arcu, eu mollis felis. Sed porttitor sodales risus, eu dictum erat gravida et. Mauris scelerisque nulla eget sapien mattis, non molestie risus congue. Etiam vestibulum dolor eu tellus maximus accumsan. Proin non nulla ut turpis aliquam maximus. Phasellus nec nunc vitae ex pulvinar scelerisque at sit amet libero.', '2020-10-18', '5f9d6b7250626.jpg', '2020-10-31 13:49:38'),
(8, 6, 'found', 'Zuidlaan 30, 9230 Wetteren', 'hond', 'pekinees', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse commodo feugiat libero eget efficitur. Etiam at tristique nisi. Vestibulum id sem vel erat viverra lacinia. Vivamus venenatis sit amet elit id luctus. Aenean magna metus, porttitor et pellentesque in, finibus ut arcu. Integer mollis et nisi vitae blandit. Mauris sed tristique velit, sit amet elementum massa. Nunc eget faucibus libero. Donec non feugiat metus. Morbi interdum varius ex a rutrum. Cras bibendum dignissim ligula, ut tempus sem mattis nec. Nunc molestie, nunc eu consectetur viverra, mauris ligula mollis erat, at eleifend erat leo vitae ipsum.', '2020-10-29', '5f9d6c60cc2ec.jpg', '2020-10-31 13:53:36'),
(9, 1, 'found', 'Industrieweg 59, 9000 Gent', 'hond', 'husky', 'Nunc venenatis lacus augue, sit amet condimentum odio tincidunt vitae. Donec non dui sapien. Mauris sollicitudin leo egestas sem fringilla, vitae commodo velit aliquam. Phasellus et diam tincidunt, ultrices lacus eget, fringilla velit. Sed vitae mi sed ipsum posuere ullamcorper. Sed vestibulum, odio vitae commodo aliquet, nunc nisi cursus justo, eu rutrum arcu quam sed magna. Sed iaculis purus quis ex tincidunt, nec congue est cursus.', '2020-11-01', '5f9e8864d8151.jpg', '2020-11-01 10:05:24');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `isAdmin`) VALUES
(1, 'Glenn', 'Dumoulin', 'glendumo@student.arteveldehs.be', '$2y$10$Qd6.JYtL7CfuiQNhulDoNOREB.tPRaglumgskfP7EkVS3YBiCHePK', 1),
(2, 'Cedric', 'De Blanck', 'cedrdebl@student.arteveldehs.be', '$2y$10$lesMafOCqrkJ2caj3vQSjeqAemgwwxGoGAhF0gjfcycGrZbdGXA/C', 0),
(3, 'Elien', 'Maes', 'eliemaes@student.arteveldehs.be', '$2y$10$5c2F3jhjBswA4wpIpoZ6zOJVniAwHpPZek3vUUxxgrMDjUqZkmaAW', 0),
(4, 'Romanie', 'Delporte', 'romadelp@student.arteveldehs.be', '$2y$10$fbTEjm4mYrqOE9noEcXsq.gFQMK85uZ.otewW469gviWwg/1xHI96', 0),
(5, 'Jarne', 'Van Steendam', 'jarnvans@student.arteveldehs.be', '$2y$10$ZBr1d9qbqj7hMKHReeP1IummKXpkGEmmyL3KGA1k1GQMdfFzbSWGi', 0),
(6, 'Nina', 'Genitello', 'ninageni@student.arteveldehs.be', '$2y$10$7zmVX3g6gjRDAYyOiUiPheaOUTLb5.izp9IZKKGRQiS3Tj.gnaf/m', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `chatgroups`
--
ALTER TABLE `chatgroups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexen voor tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `chatgroups`
--
ALTER TABLE `chatgroups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
