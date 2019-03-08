-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2019-03-08 17:30:48
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
  `create_time` varchar(255) NOT NULL,
  `update_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`id`, `type`, `name`, `title`, `options`, `answer`, `analysis`, `create_time`, `update_time`) VALUES
(8, 1, '判断题', '行同一段路，甲用5小时，乙用4小时，甲乙速度的比是5:4', '正确||错误', '2', '', '1552032491', '1552032491'),
(9, 1, '判断题', '大于90°的角都是钝角', '正确||错误', '2', '', '1552032501', '1552032501'),
(10, 1, '判断题', '只要能被2除尽的数就是偶数。', '正确||错误', '2', '', '1552032515', '1552032515'),
(11, 1, '判断题', '每年都有365天。', '正确||错误', '2', '', '1552032527', '1552032527'),
(12, 1, '判断题', '圆柱的底面积扩大3倍，体积扩大3倍', '正确||错误', '1', '', '1552032539', '1552032539'),
(13, 1, '判断题', '12/15不能化成有限小数。', '正确||错误', '2', '', '1552032551', '1552032551'),
(14, 1, '判断题', '能被3整除的数一定能被9整除。', '正确||错误', '2', '', '1552032565', '1552032565'),
(15, 1, '判断题', '两个锐角之和一定是钝角。 ', '正确||错误', '2', '', '1552032602', '1552032602'),
(16, 1, '判断题', '在比例中，如果两个内项互为倒数，那么两个外项也互为倒数。', '正确||错误', '1', '', '1552032616', '1552032616'),
(17, 1, '判断题', '“光明”牛奶包装盒上有“净含量：250亳升”的字样，这个250毫升是指包装盒的容积。', '正确||错误', '2', '', '1552032633', '1552032633'),
(18, 2, '选择题', '能与12：15组成比例的比是（）', '5:4||4:5||12:13||13:12', '2', '', '1552035367', '1552035367'),
(19, 2, '选择题', '2004年，“联合国亚洲及太平洋经济社会委员会”在上海召开了太平洋发展中岛国特别机构会议，参加会议的岛国目前面临最大的环境问题是：', '火山地震||大气污染||水体污染||海平面上升', '4', '', '1552035814', '1552035814'),
(20, 2, '选择题', '进入20世纪以来，申办世博会的国家日益增多，到目前为止，世界博览会共举办了几届：', '28||38||40||41', '3', '', '1552035868', '1552035868'),
(21, 2, '选择题', '2008年第29届夏季奥运会将在我国的北京举办，从气候条件考虑，最佳的比赛时间是：', '9-10月||7-8月||5-6月||3-4月', '2', '', '1552035917', '1552035917'),
(22, 2, '选择题', '世界上最大的区域性贸易集团是：', '欧洲联盟(UN)||世界贸易组织(WTO)||石油输出国组织(OPEC)||东南亚国家联盟(ASEAN)', '1', '', '1552035960', '1552035960'),
(23, 2, '选择题', '世界上面积最大的国家是', '加拿大||俄罗斯||中国||美国', '2', '', '1552035994', '1552035994'),
(24, 2, '选择题', '世界上把第一颗人造卫星和第一个宇航员送上天的国家是', '美国||原苏联||中国||法国', '2', '', '1552036034', '1552036034');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
