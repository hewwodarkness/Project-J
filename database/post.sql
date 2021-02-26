-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Лют 24 2021 р., 17:09
-- Версія сервера: 10.4.17-MariaDB
-- Версія PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `project-j`
--

-- --------------------------------------------------------

--
-- Структура таблиці `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  `post_rating` double NOT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп даних таблиці `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `dateCreated`, `comment_id`, `tags_id`, `post_rating`, `image`, `text`) VALUES
(2, 5, '2021-02-24 10:23:45', 2, 2, 1111, 'IMG-60362931951486.14289297.png', 'test test'),
(3, 5, '2021-02-24 10:24:14', 3, 3, 1111, 'IMG-6036294e274092.05696616.png', 'testim teestim '),
(4, 5, '2021-02-24 10:27:43', 4, 4, 1111, 'IMG-60362a1fe52322.87911503.jpeg', 'qtv'),
(5, 6, '2021-02-24 12:42:36', 5, 5, 1111, 'IMG-603649bc2d66b1.33063973.jpg', 'testim s drugogog acc'),
(6, 8, '2021-02-24 16:04:26', 6, 6, 1111, 'IMG-6036790a2ec2d0.16989684.jpg', 'cat,cat1');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
