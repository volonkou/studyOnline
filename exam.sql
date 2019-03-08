-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2019-03-08 14:48:05
-- 服务器版本： 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--
CREATE DATABASE IF NOT EXISTS `exam` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `exam`;

-- --------------------------------------------------------

--
-- 表的结构 `cate`
--

CREATE TABLE `cate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cate`
--

INSERT INTO `cate` (`id`, `name`) VALUES
(1, '判断题'),
(2, '选择题'),
(3, '填空题'),
(4, '简答题'),
(5, '视频');

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `analysis` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `keyword_imp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`id`, `type`, `name`, `title`, `options`, `answer`, `analysis`, `keyword`, `keyword_imp`) VALUES
(2, 1, '', 'sdfvsdf', '正确||错误', '1', 'dfvsdfvsdf', '', ''),
(3, 2, '', ',sndbckjashdblasd', 'asdasdv||asdvsd||fdsfsdf||vsdfvsdf', '1', 'sdfvsdfv', '', ''),
(4, 3, '', ',sndbckjashdblasd', '92347659273465873645', '92347659273465873645', 'sdfvsdfv', '', ''),
(5, 4, '', 'sdcasdca', '', '', 'asdcasd', 'asdcsdc', 'asdcasd'),
(6, 1, '判断题', '', '正确||错误', '', '', '', ''),
(7, 1, '判断题', 'adfgrsdfgsdfgsdfgdsf', '正确||错误', '1', 'sdfgsdfgdfg', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_admin` int(2) DEFAULT '0',
  `status` int(2) DEFAULT '1',
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `is_admin`, `status`, `create_time`, `update_time`) VALUES
(168, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@qq.com', 1, 1, 1551252545, 1551252545),
(169, '小明', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'xiaoming@qq.com', 0, 1, 1551260137, 1551260137),
(170, '小红', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'xiaohong@qq.com', 0, 1, 1551260170, 1551260170);

-- --------------------------------------------------------

--
-- 表的结构 `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `video`
--

INSERT INTO `video` (`id`, `title`, `video_url`) VALUES
(168, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(169, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(170, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(171, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(172, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(173, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(174, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(175, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(176, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(177, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(178, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(179, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(180, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(181, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4'),
(182, 'wefgsdfg', '20190308/c665bc678ca5c2df0c5da2dfae3233a6.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- 使用表AUTO_INCREMENT `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
