-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 02 2017 г., 17:16
-- Версия сервера: 5.5.44-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `taskyii2_codeonward`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birth` varchar(11) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `src_avatar` varchar(220) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `email`, `birth`, `mobile`, `src_avatar`, `password`, `create_date`, `role`) VALUES
(7, 'Vasua', 'Batareikin', 'admin', 'admin@gmail.com', '1970-01-01', '000-0000000', 'uploads/php_elephant_avatar.png', '$2y$13$ea8fqrgmnAaxAD72v4rLeeNwBo1UH2iJBCVSaiNtldK4/t4VtHX6S', '1495909238', 1),
(8, 'Homer', 'Simpson', 'fatHomer', 'homer@gmail.com', '1979-05-10', '111-1111111', 'uploads/homer_test_avatar.png', '$2y$13$M9At5.aGlKiKgT5z/lR5OueXJSZ2XsHmfldsuly.r9.8PSHE2hsuK', '1495987793', 0),
(26, 'John', 'Smith', 'englishman', 'englishman@mail.uk', '1972-05-23', '333-3333333', NULL, '$2y$13$bs.ZRj91IZyyQUiB75bOlOxeuxfNTjrKqDmZf.qvSo3LhcqWgYVIy', '1496166403', 0),
(27, 'Jack', 'Sparrow', 'captain', 'captain@gmail.com', '1983-09-21', '444-4444444', 'uploads/jack_sparrow.jpg', '$2y$13$7d9xujqFDz/dy9gUzBktEusGJKeA7m.pY5TmQznTyJin1rPLxVUMK', '1496166490', 0),
(29, 'Nicola', 'Orehov', 'orehoff', 'orehoff@i.ua', '2010-09-08', '252-5252525', 'uploads/', '$2y$13$H/lZW5g96HwoPNBlnes5ru89keMAF5iQcYpPKA3sakWRu2os7y2Le', '1496166706', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
