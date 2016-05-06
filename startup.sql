-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 14 2014 г., 13:49
-- Версия сервера: 5.5.38
-- Версия PHP: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00"


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `startup`
--

-- --------------------------------------------------------

--
-- Структура таблицы `caffe`
--

CREATE TABLE IF NOT EXISTS `caffe` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `places` int(11) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `info` varchar(2000) NOT NULL,
  `about` varchar(2000) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- Дамп данных таблицы `caffe`
--

INSERT INTO `caffe` (`id`, `name`, `address`, `places`, `telephone`, `info`, `about`, `img`) VALUES
(69, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(70, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(71, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(72, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(73, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(74, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(75, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(76, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(77, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(78, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(79, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(80, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(81, 'caffe', 'addres', 10, '+375445378289', 'all inf', 'ABOUT', 'img'),
(82, 'caffe', 'addres', 5, '+375445378289', 'all inf', 'ABOUT', ''),
(83, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', 'img'),
(84, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(85, 'caffe', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(86, '12312312312', 'addres', 9, '+375445378289', 'all inf', 'ABOUT', ''),
(87, 'caffe', 'addres', 11, '+375445378289', 'all inf', 'ABOUT', ''),
(88, 'awdw', 'dw', 1, 'd', 'wd', 'wd', 'img'),
(89, 'caf', 'a', 11, '123123', 'awd', 'dw', 'img'),
(90, 'ц', 'ц', 1, 'ц', 'ц', 'ц', 'img'),
(91, 'wd', 'wdad', 10, 'wd', 'd', 'wd', 'img');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `table_num` int(11) NOT NULL,
  `caffe_index` int(11) NOT NULL,
  `user_key` varchar(60) NOT NULL,
  `time` int(110) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `tpl_name` varchar(100) NOT NULL,
  `time_confirmation` int(11) NOT NULL,
  `time_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
`id` int(100) NOT NULL,
  `number` int(100) NOT NULL,
  `caffe_index` int(100) NOT NULL,
  `xPos` double NOT NULL,
  `yPos` double NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=205 ;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `number`, `caffe_index`, `xPos`, `yPos`, `status`) VALUES
(39, 1, 87, 2, 5, 0),
(40, 2, 87, 367.015625, 125, 0),
(41, 3, 87, 161.015625, 83, 0),
(42, 4, 87, 398.015625, 8, 0),
(43, 5, 87, -5.984375, 98, 0),
(44, 6, 87, 107.015625, 12, 0),
(45, 7, 87, 100.015625, 196, 0),
(46, 8, 87, 265.015625, 42, 0),
(47, 9, 87, 8.015625, 220, 0),
(48, 10, 87, 246.015625, 242, 0),
(49, 11, 87, 430.015625, 237, 0),
(50, 1, 86, 320, 106, 0),
(51, 2, 86, -10, 41, 0),
(52, 3, 86, 41, 5, 0),
(53, 4, 86, 178, 100, 0),
(54, 5, 86, 88, 25, 0),
(55, 6, 86, -8, 95, 0),
(56, 7, 86, 203, 28, 0),
(57, 8, 86, 70, 155, 0),
(58, 9, 86, 201, 193, 0),
(59, 1, 82, 69, 102, 0),
(60, 2, 82, 348, 50, 0),
(61, 3, 82, 285, 213, 0),
(62, 4, 82, 14, 134, 0),
(63, 5, 82, 179, 67, 0),
(64, 1, 88, 302, 131, 2),
(65, 1, 79, 39, 16, 0),
(66, 2, 79, 134, 184, 0),
(67, 3, 79, 372, 188, 0),
(68, 4, 79, 29, 186, 0),
(69, 5, 79, 368, 26, 0),
(70, 6, 79, 219, 111, 0),
(71, 7, 79, 225, 17, 0),
(72, 8, 79, 44, 96, 0),
(73, 9, 79, 335, 111, 0),
(74, 1, 81, 0, 10, 0),
(75, 2, 81, 0, 9, 0),
(76, 3, 81, 7, 12, 0),
(77, 4, 81, 11, 15, 0),
(78, 5, 81, 7, 14, 0),
(79, 6, 81, 15, 21, 0),
(80, 7, 81, 1, 20, 0),
(81, 8, 81, 29, 24, 0),
(82, 9, 81, 64, 24, 0),
(83, 10, 81, 93, 87, 0),
(84, 1, 89, 23, 41, 0),
(85, 2, 89, 15, 115, 0),
(86, 3, 89, 9, 202, 0),
(87, 4, 89, 110, 222, 0),
(88, 5, 89, 208, 230, 0),
(89, 6, 89, 311, 230, 0),
(90, 7, 89, 401, 225, 0),
(91, 8, 89, 88, 26, 0),
(92, 9, 89, 188, 28, 0),
(93, 10, 89, 289, 22, 0),
(94, 11, 89, 409, 18, 0),
(95, 1, 90, 259, 72, 0),
(96, 1, 91, 8, 7, 0),
(97, 2, 91, 101, 217, 0),
(98, 3, 91, 187, 148, 0),
(99, 4, 91, 294, 11, 0),
(100, 5, 91, 319, 198, 0),
(101, 6, 91, 230, 239, 0),
(102, 7, 91, 15, 180, 0),
(103, 8, 91, 94, 43, 0),
(104, 9, 91, 57, 116, 0),
(105, 10, 91, 204, 58, 0),
(106, 1, 69, 0, 0, 0),
(107, 2, 69, 0, 0, 0),
(108, 3, 69, 0, 0, 0),
(109, 4, 69, 0, 0, 0),
(110, 5, 69, 0, 0, 0),
(111, 6, 69, 0, 0, 0),
(112, 7, 69, 0, 0, 0),
(113, 8, 69, 0, 0, 0),
(114, 9, 69, 0, 0, 0),
(115, 1, 70, 0, 0, 0),
(116, 2, 70, 0, 0, 0),
(117, 3, 70, 0, 0, 0),
(118, 4, 70, 0, 0, 0),
(119, 5, 70, 0, 0, 0),
(120, 6, 70, 0, 0, 0),
(121, 7, 70, 0, 0, 0),
(122, 8, 70, 0, 0, 0),
(123, 9, 70, 0, 0, 0),
(124, 1, 71, 0, 0, 0),
(125, 2, 71, 0, 0, 0),
(126, 3, 71, 0, 0, 0),
(127, 4, 71, 0, 0, 0),
(128, 5, 71, 0, 0, 0),
(129, 6, 71, 0, 0, 0),
(130, 7, 71, 0, 0, 0),
(131, 8, 71, 0, 0, 0),
(132, 9, 71, 0, 0, 0),
(133, 1, 72, 0, 0, 0),
(134, 2, 72, 0, 0, 0),
(135, 3, 72, 0, 0, 0),
(136, 4, 72, 0, 0, 0),
(137, 5, 72, 0, 0, 0),
(138, 6, 72, 0, 0, 0),
(139, 7, 72, 0, 0, 0),
(140, 8, 72, 0, 0, 0),
(141, 9, 72, 0, 0, 0),
(142, 1, 73, 0, 0, 0),
(143, 2, 73, 0, 0, 0),
(144, 3, 73, 0, 0, 0),
(145, 4, 73, 0, 0, 0),
(146, 5, 73, 0, 0, 0),
(147, 6, 73, 0, 0, 0),
(148, 7, 73, 0, 0, 0),
(149, 8, 73, 0, 0, 0),
(150, 9, 73, 0, 0, 0),
(151, 1, 74, 0, 0, 0),
(152, 2, 74, 0, 0, 0),
(153, 3, 74, 0, 0, 0),
(154, 4, 74, 0, 0, 0),
(155, 5, 74, 0, 0, 0),
(156, 6, 74, 0, 0, 0),
(157, 7, 74, 0, 0, 0),
(158, 8, 74, 0, 0, 0),
(159, 9, 74, 0, 0, 0),
(160, 1, 75, 0, 0, 0),
(161, 2, 75, 0, 0, 0),
(162, 3, 75, 0, 0, 0),
(163, 4, 75, 0, 0, 0),
(164, 5, 75, 0, 0, 0),
(165, 6, 75, 0, 0, 0),
(166, 7, 75, 0, 0, 0),
(167, 8, 75, 0, 0, 0),
(168, 9, 75, 0, 0, 0),
(169, 1, 76, 0, 0, 0),
(170, 2, 76, 0, 0, 0),
(171, 3, 76, 0, 0, 0),
(172, 4, 76, 0, 0, 0),
(173, 5, 76, 0, 0, 0),
(174, 6, 76, 0, 0, 0),
(175, 7, 76, 0, 0, 0),
(176, 8, 76, 0, 0, 0),
(177, 9, 76, 0, 0, 0),
(178, 1, 77, 0, 0, 0),
(179, 2, 77, 0, 0, 0),
(180, 3, 77, 0, 0, 0),
(181, 4, 77, 0, 0, 0),
(182, 5, 77, 0, 0, 0),
(183, 6, 77, 0, 0, 0),
(184, 7, 77, 0, 0, 0),
(185, 8, 77, 0, 0, 0),
(186, 9, 77, 0, 0, 0),
(187, 1, 78, 0, 0, 0),
(188, 2, 78, 0, 0, 0),
(189, 3, 78, 0, 0, 0),
(190, 4, 78, 0, 0, 0),
(191, 5, 78, 0, 0, 0),
(192, 6, 78, 0, 0, 0),
(193, 7, 78, 0, 0, 0),
(194, 8, 78, 0, 0, 0),
(195, 9, 78, 0, 0, 0),
(196, 1, 80, 0, 0, 0),
(197, 2, 80, 0, 0, 0),
(198, 3, 80, 0, 0, 0),
(199, 4, 80, 0, 0, 0),
(200, 5, 80, 0, 0, 0),
(201, 6, 80, 0, 0, 0),
(202, 7, 80, 0, 0, 0),
(203, 8, 80, 0, 0, 0),
(204, 9, 80, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(100) NOT NULL,
  `mail` varchar(22) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `name` varchar(12) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `secret_key` varchar(64) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `mail`, `pass`, `telephone`, `name`, `lastname`, `secret_key`, `status`) VALUES
(1, 'admin@admin', '123456', '+3754453782', 'alex', 'Alinovsky', 'd9bef46c508a864743a6d3ecdcaa939f', 10),
(2, 'wd@d', 'вццфв', 'цв', 'в', 'цв', '1ac4b556b59ab33be22146f7e0cf5524', 1),
(3, 'awd@AWD', 'wad', 'adawd', 'd', 'wd', '170cec2e9e772d57751fc31ec6a8402f', 1),
(4, 'wd@d', 'вццфв', 'цв', 'в', 'цв', '1ac4b556b59ab33be22146f7e0cf5524', 1),
(5, 'awdwad@wad', 'aawd', 'awd', 'wd', 'daw', 'd3f9d9cb972fd3335f57362bb4624e4b', 1),
(6, 'q@q', 'qq', 'q', 'q', 'q', '7adbef315c95cf1006ea06d98a51a449', 1),
(7, 'w@w', '1', 'цввц', 'цв', 'в', '41b507042c1a2c799dcade7234cd9275', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caffe`
--
ALTER TABLE `caffe`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caffe`
--
ALTER TABLE `caffe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
