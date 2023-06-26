-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 13 2023 г., 04:59
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `epoxyshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `translation`, `photo`) VALUES
(1, 'clock', 'Часы', 'img/title_photo/Часы Мрамор 3.jpg'),
(2, 'board-game', 'Настольные игры', 'img/title_photo/Домино золото 1.jpg'),
(3, 'coster', 'Подставки', 'img/title_photo/Подстаканники.jpg'),
(4, 'kit', 'Наборы', 'img/title_photo/Набор винный голубой.jpg'),
(5, 'others', 'Разное', 'img/title_photo/Мыльница дно 2.jpg'),
(6, 'box', 'Шкатулки', 'img/title_photo/box.png'),
(7, 'new', 'Новинки', '');

-- --------------------------------------------------------

--
-- Структура таблицы `connection`
--

CREATE TABLE `connection` (
  `good_id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `connection`
--

INSERT INTO `connection` (`good_id`, `id_category`) VALUES
(1, 7),
(1, 4),
(2, 7),
(2, 5),
(3, 2),
(4, 2),
(5, 7),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 5),
(9, 7),
(10, 5),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 5),
(17, 5),
(18, 7),
(18, 1),
(19, 3),
(20, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `title_photo` text NOT NULL,
  `photos` text DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `title_photo`, `photos`, `price`) VALUES
(1, 'Винный набор', 'Порадуйте себя и своих близких винным пикником! А этот набор поможет вам', 'img/title_photo/Набор винный голубой.jpg', NULL, 2000),
(2, 'Держатель для бокалов', 'Лето - самое время для пикников. Наш держатель упростит и украсит любой винный пикник', 'img/title_photo/Винная розовая 4.jpg', NULL, 1000),
(3, 'Домино Джокер', 'Наше домино придаст изюминку вашей игре', 'img/title_photo/Домино Джокер 3.jpg', NULL, 1500),
(4, 'Домино Золото', 'Наше домино придаст изюминку вашей игре', 'img/title_photo/Домино золото 1.jpg', NULL, 1500),
(5, 'Домино Космос', 'Наше домино придаст изюминку вашей игре', 'img/title_photo/Домино Космос 5.jpg', NULL, 1500),
(6, 'Домино Море', 'Наше домино придаст изюминку вашей игре', 'img/title_photo/Домино море 1.jpg', NULL, 1500),
(7, 'Домино Микромир', 'Наше домино придаст изюминку вашей игре', 'img/title_photo/Домино розовое 2.jpg', NULL, 1500),
(8, 'Крестики-нолики Космос', 'Всеми любимые с детсва крестики-нолики обрели форму', 'img/title_photo/Крестики Нолики 1.jpg', NULL, 400),
(9, 'Мыльница Дно', 'Кусочек моря в вашей ванной', 'img/title_photo/Мыльница дно 2.jpg', NULL, 700),
(10, 'Мыльница Кусочек моря', 'Кусочек моря в вашей ванной', 'img/title_photo/Мыльница море 2.jpg', NULL, 1500),
(11, 'Подстаканники Иней', 'Подстаканники из эпоксидной смолы спасут вашу мебель от следов чашек', 'img/title_photo/Подстаканники Иней 1.jpg', NULL, 1000),
(12, 'Подстаканники Лимон', 'Подстаканники из эпоксидной смолы спасут вашу мебель от следов чашек', 'img/title_photo/Подстаканники Лимон 3.jpg', NULL, 1800),
(13, 'Подстаканники Нежность', 'Подстаканники из эпоксидной смолы спасут вашу мебель от следов чашек', 'img/title_photo/Подстаканники Нежность 2.jpg', NULL, 1500),
(14, 'Подстаканники Цветы', 'Подстаканники из эпоксидной смолы спасут вашу мебель от следов чашек', 'img/title_photo/Подстаканники цветы 2.jpg', NULL, 1500),
(15, 'Подстаканники Тиффани', 'Подстаканники из эпоксидной смолы спасут вашу мебель от следов чашек', 'img/title_photo/Подстаканники голубые 2.jpg', NULL, 1500),
(16, 'Тетрадь Иллюзия', 'Тетрадь из эпоксидной смолы, формата А5. Придаст вашим записям немного больше волшебства', 'img/title_photo/Тетрадь Иллюзия 1.jpg', NULL, 1500),
(17, 'Тетрадь Море', 'Тетрадь из эпоксидной смолы, формата А5. Придаст вашим записям немного больше волшебства', 'img/title_photo/Тетрадь море 4.jpg', NULL, 2000),
(18, 'Часы Мрамор', 'Наши часы придадут ещё больше уюта любому помещению', 'img/title_photo/Часы Мрамор 3.jpg', NULL, 2500),
(19, 'Подставка под яички', 'Оригинальная подставка ручной работы', 'img/title_photo/Яичница Розовая 4.jpg', NULL, 700),
(20, 'Подставка под яички', 'Оригинальная подставка ручной работы', 'img/title_photo/Яичница Синяя 2.jpg', NULL, 700);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `connection`
--
ALTER TABLE `connection`
  ADD KEY `good_id` (`good_id`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `connection_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`),
  ADD CONSTRAINT `connection_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
