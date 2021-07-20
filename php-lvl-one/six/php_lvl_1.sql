-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 20 2021 г., 14:04
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_lvl_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `branch`
--

INSERT INTO `branch` (`id`, `branch_name`) VALUES
(1, 'adidas'),
(2, 'New Wos'),
(3, 'ВОЛГА'),
(4, 'unknow'),
(5, 'TeaWorlds');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `branch_id`, `price`, `views`) VALUES
(1, 'Носки', 1, '1300.00', 0),
(2, 'Шляпа', 2, '50020.00', 1),
(3, 'Автомобиль', 3, '150000.00', 0),
(4, 'Человечек', 4, '0.01', 0),
(5, 'Листья чая', 5, '114500.90', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `galary`
--

CREATE TABLE `galary` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `galary`
--

INSERT INTO `galary` (`id`, `image_name`, `type`, `url`, `id_product`) VALUES
(1, 'sddefault', 'jpg', 'assets/images/', 1),
(2, '123121', 'jpg', 'assets/images/', 2),
(3, 'mFQrVloA-ko', 'jpg', 'assets/images/', 3),
(4, 'UQocxbLVKSQ', 'jpg', 'assets/images/', 4),
(5, '54da56a2e7bbd', 'jpg', 'assets/images/', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Индексы таблицы `galary`
--
ALTER TABLE `galary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `galary`
--
ALTER TABLE `galary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
