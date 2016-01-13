-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Sty 2016, 23:10
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adverts`
--

CREATE TABLE IF NOT EXISTS `adverts` (
  `id` bigint(20) unsigned NOT NULL,
  `title` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `rent_type` int(11) NOT NULL,
  `locality` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `area` int(11) NOT NULL,
  `description` varchar(10000) COLLATE utf8_polish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `sg` tinyint(4) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `adverts`
--

INSERT INTO `adverts` (`id`, `title`, `price`, `type`, `rent_type`, `locality`, `area`, `description`, `category`, `sg`, `modified`) VALUES
(0, 'Kajko i kokosz', 1000, 0, 0, 'Gdańsk', 52, 'Dom składa się z jasnego i przestronnego salonu połączonego z aneksem kuchennym, sypialni i pokoju dziecięcego oraz Dom składa się z jasnego i przestronnego salonu połączonego z aneksem kuchennym, sypialni i pokoju dziecięcego oraz', 0, 1, '2015-04-22 20:20:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `archive`
--

CREATE TABLE IF NOT EXISTS `archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_rent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `archive`
--

INSERT INTO `archive` (`id`, `user_id`, `book_id`, `date_rent`) VALUES
(1, 3, 1, '2015-12-13 09:15:20'),
(4, 3, 1, '2015-12-13 09:15:45'),
(5, 3, 1, '2015-12-13 09:16:30'),
(6, 3, 3, '2015-12-13 11:03:56'),
(7, 2, 1, '2016-01-13 17:26:21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `available` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `genre_id`, `name`, `author`, `img`, `available`, `description`, `amount`) VALUES
(1, 1, 'Sadam', 'JACEK PANKRACEK', '.', '2016-01-20 17:26:21', 'książka o kotach', 0),
(2, 2, 'Książka o psalmach', 'Bel Mar Kar', '.', '2015-12-20 09:09:24', 'Love me tender', 0),
(3, 1, 'SadaMarka', 'Imie jego ', '.', '2015-12-20 11:03:56', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n        Ut facilisis sagittis lacus non consequat. \n        Etiam nisi massa, volutpat eget nibh rhoncus, congue tempus lorem. \n        Curabitur orci erat, porttitor in dolor non, sodales ullamcorper leo. \n        Duis pretium magna eget diam commodo, et vestibulum nisl semper. \n        Vivamus dictum risus risus, vitae pellentesque lacus malesuada quis. In mollis eleifend vehicula. \nstique ', 0),
(4, 1, 'Syria w morze', 'Makbet', '.', '2015-12-12 21:02:05', 'inna dana', 0),
(5, 1, 'Tragikomedia na KSEM', 'Katarzyna Kałduńska', '', '2015-12-13 00:03:01', 'Nie polecam', 0),
(6, 1, 'Dramat na KIMIA', 'Katarzyna Kałduńska', '', '2015-12-13 00:05:07', 'Nope nope nope', 0),
(7, 1, 'Autobiorafia', 'Piotr Kurek', '', '2015-12-13 00:05:07', 'Nope nope nope x2', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `data_sets`
--

CREATE TABLE IF NOT EXISTS `data_sets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Komedia'),
(2, 'Dramat'),
(3, 'historyczna'),
(4, 'Antyk'),
(5, 'fantastyka'),
(6, 'sci-fi');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `advert_id` bigint(20) unsigned NOT NULL,
  `path` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `imagesmall` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `smallpath` varchar(10000) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `photos`
--

INSERT INTO `photos` (`id`, `advert_id`, `path`, `type`, `image`, `imagesmall`, `smallpath`) VALUES
(3, 0, 'logo/553ff675-8d4c-4976-bab0-08401c9bea0a.jpg', 0, 'duzy.jpg', 'miniatura.jpg', 'logosmall/553ff675-8d4c-45b8-935f-08401c9bea0a.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `modified`, `phone`, `email`) VALUES
(1, 'admin', '$2a$10$w2Oxq9zC26dNpyrr/OosIOfdcP8m4eOgeVI5UkaQaFRor6T9ECJ2a', 'Aleks', 'Tymczasowy', '2015-04-21 21:24:35', 123456789, 'aleks@tymczasowy.pl'),
(2, 'piotr', '12345', '', '', '2015-12-12 18:23:04', 0, ''),
(3, 'kasia', 'pompom', '', '', '2015-12-13 00:00:57', 0, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_books`
--

CREATE TABLE IF NOT EXISTS `user_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `user_books`
--

INSERT INTO `user_books` (`id`, `book_id`, `user_id`) VALUES
(7, 3, 3),
(8, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
