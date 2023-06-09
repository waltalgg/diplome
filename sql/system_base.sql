-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 09 2023 г., 15:22
-- Версия сервера: 8.0.33-0ubuntu0.22.04.2
-- Версия PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `system_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `all_groups`
--

CREATE TABLE `all_groups` (
  `id_group` int NOT NULL,
  `name_group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted_group` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `all_groups`
--

INSERT INTO `all_groups` (`id_group`, `name_group`, `deleted_group`) VALUES
(1, 'teachers', 0),
(2, 'test_group', 0),
(3, 'test_group2', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `all_lessons`
--

CREATE TABLE `all_lessons` (
  `id_lesson` int NOT NULL,
  `name_lesson` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_teacher` int NOT NULL,
  `id_group` int NOT NULL,
  `date_lesson` datetime NOT NULL,
  `text_lesson` text COLLATE utf8mb4_general_ci NOT NULL,
  `link_lesson` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `all_lessons`
--

INSERT INTO `all_lessons` (`id_lesson`, `name_lesson`, `id_teacher`, `id_group`, `date_lesson`, `text_lesson`, `link_lesson`) VALUES
(1, 'test', 5, 2, '2023-06-08 10:00:00', 'text text', 'www.text.ru'),
(2, 'test', 4, 3, '2023-06-08 11:00:00', 'text text', 'www.text.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `all_users`
--

CREATE TABLE `all_users` (
  `id_user` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `all_users`
--

INSERT INTO `all_users` (`id_user`, `username`, `email`, `password`) VALUES
(4, 'Настоящий Venom', 'gg@mail.ru', '$2y$10$PXf.v/uy3PVi3uTlH9vO2OhGdkpNFzkbQw9mQOqMyFRR5pNTTs/qW'),
(5, 'Ненастоящий Venom', 'teacher@mail.ru', '$2y$10$qOjYHY5Z0JKf7U/DNMr.ZOjExLwscpkMKKmfpQ/tdViZ3OVJA7VBS');

-- --------------------------------------------------------

--
-- Структура таблицы `group_content`
--

CREATE TABLE `group_content` (
  `id_group` int NOT NULL,
  `Id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `group_content`
--

INSERT INTO `group_content` (`id_group`, `Id_user`) VALUES
(1, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `all_groups`
--
ALTER TABLE `all_groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Индексы таблицы `all_lessons`
--
ALTER TABLE `all_lessons`
  ADD PRIMARY KEY (`id_lesson`);

--
-- Индексы таблицы `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `all_groups`
--
ALTER TABLE `all_groups`
  MODIFY `id_group` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `all_lessons`
--
ALTER TABLE `all_lessons`
  MODIFY `id_lesson` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `all_users`
--
ALTER TABLE `all_users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
