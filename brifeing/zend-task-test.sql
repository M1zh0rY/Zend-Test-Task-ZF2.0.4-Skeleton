-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 25 2016 г., 14:10
-- Версия сервера: 5.5.47-0+deb8u1
-- Версия PHP: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zend-task-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `theme_id` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `date`, `theme_id`, `text`, `title`) VALUES
(1, '2016-02-15', 6, '', 'В экспозиции "Русский авангард: от Шагала до Малевича" представлены 130 произведений живописи, графики и скульптуры. Выставка в Музее Альбертина продлится до 26 июня. РИА Новости С.-ПЕТЕРБУРГ, 26 фев — РИА Новости. Экспозиция "Русский авангард: от Шагала до Малевича" открывается в пятницу в Музее Альбертина в Вене, сообщил Государственный Русский музей. На выставке будет представлено 130 произведений живописи, графики и скульптуры. Среди них признанные шедевры отечественного авангарда из коллекции Русского музея: "Велосипедист" Натальи Гончаровой, "Портрет Анны Ахматовой" Натана Альтмана, "Портрет В.Э. Мейерхольда" Бориса Григорьева, "Прогулка" Марка Шагала, "Черный квадрат" Казимира Малевича, "Фантазия" Кузьмы Петрова-Водкина, а также произведения Василия Кандинского, Александры Экстер, Любови Поповой, Владимира Лебедева, Михаила Ларионова и других. "Посетители смогут познакомиться со стремительной по времени, но безмерно продолжительной по влиянию на мировое искусство эволюцией русского авангарда в живописи", — говорится в сообщении Выставка "Русский авангард: от Шагала до Малевича" продлится до 26 июня. Русский музей — первый в стране государственный музей русского изобразительного искусства, основан в 1895 году в Санкт-Петербурге по указу императора Николая II. Торжественно открылся для посетителей 19 марта (7 марта по старому стилю) 1898 года. Сегодня Русский музей — это уникальное хранилище художественных ценностей, известный реставрационный центр, авторитетный научно-исследовательский институт, один из крупнейших центров культурно-просветительской работы, научно-методический центр художественных музеев РФ, курирующий работу 260 художественных музеев России. РИА Новости'),
-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
`theme_id` int(11) NOT NULL,
  `theme_title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_title`) VALUES
(1, 'Наука'),
(2, 'Спорт'),
(3, 'Интернет'),
(4, 'Авто'),
(5, 'Глямур'),
(6, 'Исскуство');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`), ADD KEY `theme_id` (`theme_id`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
 ADD PRIMARY KEY (`theme_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
