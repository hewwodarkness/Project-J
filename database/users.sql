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
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(355) COLLATE utf32_bin DEFAULT NULL,
  `login` varchar(100) COLLATE utf32_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf32_bin DEFAULT NULL,
  `password` varchar(500) COLLATE utf32_bin DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf32_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES
(1, 'kekw', '1111111', '11111111231312', '1212', '321123'),
(2, 'Иванов Иван Иванович', 'test', 'test@local.ru', '202cb962ac59075b964b07152d234b70', 'uploads/15698233144.png'),
(3, 'tegt4ger', '111', '23123@fwf', '698d51a19d8a121ce581499d7b701668', 'uploads/16132153180ab8443a792b.jpg'),
(4, 'test', '1111', '111@frew', 'b59c67bf196a4758191e42f76670ceba', 'uploads/16133779071385214827193.png'),
(5, 'Starliet', '1212', '1212@1212', 'a01610228fe998f515a72dd730294d87', 'uploads/16133815361385214827193.jpg'),
(6, 'Hong', '123', '123@123', '202cb962ac59075b964b07152d234b70', 'uploads/1614170514saui391auc061.jpg'),
(7, 'Alice', '33', '33@33', '$2y$10$/U.XsE9vOiN2yjNEqtAd8ejsgqDvdoJEENUYVhWeWqu3o4.HIHR4q', 'uploads/16141744381508682_Latvian_NewShowDetailHeroPhone_5c877315-b9e8-ea11-82a8-dd291e252010.jpg'),
(8, 'Hrenovina', '333', '333@333', '$2y$10$/e6BkK3xPzF/i2hHLv6meu6TwkfTU4A3.I9sTj5gjF7Kz9I9dk1VW', 'uploads/16141744381508682_Latvian_NewShowDetailHeroPhone_5c877315-b9e8-ea11-82a8-dd291e252010.jpg'),
(9, NULL, '5', '5@5', '$2y$10$uJR1P1SARLrDJigS/mzbu.r7k8kehIFOG0kMoRwE9jGyJfgx1038O', NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
