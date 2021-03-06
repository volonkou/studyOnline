-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2019-03-30 17:20:35
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
(5, '视频'),
(6, '考试');

-- --------------------------------------------------------

--
-- 表的结构 `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `exam`
--

INSERT INTO `exam` (`id`, `name`, `data`) VALUES
(1, '第一次模考', '8||9||19||20||21'),
(2, '第二次模拟考试', '8||9||19||20||25||26'),
(3, '第三次模考', '8||9||10||25||26||27'),
(4, '232323', '41');

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `create_time` varchar(255) NOT NULL,
  `update_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`id`, `type`, `name`, `score`, `title`, `options`, `answer`, `image`, `create_time`, `update_time`) VALUES
(8, 1, '判断题', 10, '行同一段路，甲用5小时，乙用4小时，甲乙速度的比是5:4', '正确||错误', '2', '', '1552032491', '1552032491'),
(9, 1, '判断题', 5, '大于90°的角都是钝角', '正确||错误', '2', '', '1552032501', '1552032501'),
(10, 1, '判断题', 5, '只要能被2除尽的数就是偶数。', '正确||错误', '2', '', '1552032515', '1552032515'),
(11, 1, '判断题', 5, '每年都有365天。', '正确||错误', '2', '', '1552032527', '1552032527'),
(12, 1, '判断题', 0, '圆柱的底面积扩大3倍，体积扩大3倍', '正确||错误', '1', '', '1552032539', '1552032539'),
(13, 1, '判断题', 0, '12/15不能化成有限小数。', '正确||错误', '2', '', '1552032551', '1552032551'),
(14, 1, '判断题', 0, '能被3整除的数一定能被9整除。', '正确||错误', '2', '', '1552032565', '1552032565'),
(15, 1, '判断题', 0, '两个锐角之和一定是钝角。 ', '正确||错误', '2', '', '1552032602', '1552032602'),
(16, 1, '判断题', 0, '在比例中，如果两个内项互为倒数，那么两个外项也互为倒数。', '正确||错误', '1', '', '1552032616', '1552032616'),
(17, 1, '判断题', 10, '“光明”牛奶包装盒上有“净含量：250亳升”的字样，这个250毫升是指包装盒的容积。', '正确||错误', '2', '', '1552032633', '1552032633'),
(18, 2, '选择题', 9, '能与12：15组成比例的比是（）', '5:4||4:5||12:13||13:12', '2', '', '1552035367', '1552035367'),
(19, 2, '选择题', 2, '2004年，“联合国亚洲及太平洋经济社会委员会”在上海召开了太平洋发展中岛国特别机构会议，参加会议的岛国目前面临最大的环境问题是：', '火山地震||大气污染||水体污染||海平面上升', '4', '', '1552035814', '1552035814'),
(20, 2, '选择题', 8, '进入20世纪以来，申办世博会的国家日益增多，到目前为止，世界博览会共举办了几届：', '28||38||40||41', '3', '', '1552035868', '1552035868'),
(21, 2, '选择题', 4, '2008年第29届夏季奥运会将在我国的北京举办，从气候条件考虑，最佳的比赛时间是：', '9-10月||7-8月||5-6月||3-4月', '2', '', '1552035917', '1552035917'),
(22, 2, '选择题', 8, '世界上最大的区域性贸易集团是：', '欧洲联盟(UN)||世界贸易组织(WTO)||石油输出国组织(OPEC)||东南亚国家联盟(ASEAN)', '1', '', '1552035960', '1552035960'),
(23, 2, '选择题', 3, '世界上面积最大的国家是', '加拿大||俄罗斯||中国||美国', '2', '', '1552035994', '1552035994'),
(24, 2, '选择题', 8, '世界上把第一颗人造卫星和第一个宇航员送上天的国家是', '美国||原苏联||中国||法国', '2', '', '1552036034', '1552036034'),
(25, 3, '填空题', 0, '莱温斯基的伙伴守恒定律是对方 v的是的伴侣胡说八道；和 v 是 v 背带裤不理会对方 v 快点放假吧绿黄色的  就是代理费 v 湖北省劳动纠纷和 v', '结婚后觉得 v', '结婚后觉得 v', '', '1552377508', '1552377508'),
(26, 4, '简答题', 6, '莱温斯基的伙伴守恒定律是对方 v的是的伴侣胡说八道；和 v 是 v 背带裤不理会对方 v 快点放假吧绿黄色的  就是代理费 v 湖北省劳动纠纷和 v', '', '', '', '1552377519', '1552377519'),
(37, 2, '选择', 5, '售楼处举办了的看家本领的进口帆布', '1||2||3||4', '2', '', '1552894010', '1552894010'),
(38, 1, '判断', 5, '不随时间做连续变化的信号，信号数值的大小和增减可采用数字形式。', '正确||错误', '1', '', '1553169406', '1553169406'),
(39, 2, '选择', 5, '加工处理数字信号的电路。即能对数字信号进行算术运算和逻辑运算', '1||2||3||4', '2', '', '1553169406', '1553169406'),
(41, 1, '判断题', 2, 'qwerq', '正确||错误', '1', '20190328/9c3e6a4f7e48e04e8b4e74d4bcc01b0c.png', '1553766244', '1553766244'),
(42, 1, '判断题', 34, '343', '正确||错误', '1', '', '1553822570', '1553822570'),
(43, 1, '判断题', 44, '2二位台湾 v', '正确||错误', '1', '20190329/cae272de17654d037debac606fd366e1.png', '1553822652', '1553822652'),
(44, 1, '判断题', 44, '2二位台湾 v', '正确||错误', '1', '', '1553822659', '1553822659');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `class` varchar(255) NOT NULL,
  `is_admin` int(2) DEFAULT '0',
  `status` int(2) DEFAULT '1',
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `class`, `is_admin`, `status`, `create_time`, `update_time`) VALUES
(168, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@qq.com', '', 2, 1, 1551252545, 1551252545),
(169, '小明', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'xiaoming@qq.com', '', 1, 1, 1551260137, 1551260137),
(170, '小红', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'xiaohong@qq.com', '', 1, 1, 1551260170, 1551260170),
(174, '猪头啊', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'zhutou@qq.com', '软件142', 1, 1, 1553168793, 1553168793),
(175, '哒哒哒哒', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dada@qq.com', '软件142', 0, 1, 1553168793, 1553168793),
(176, 'lalalal', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lala@qq.com', '软件142', 0, 1, 1553168793, 1553168793);

-- --------------------------------------------------------

--
-- 表的结构 `user_exam`
--

CREATE TABLE `user_exam` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_exam`
--

INSERT INTO `user_exam` (`user_id`, `id`, `name`, `score`, `total`) VALUES
(169, 17, '第三次模考', 32, 29),
(169, 18, '第三次模考', 13, 29),
(168, 19, '232323', 2, 2),
(168, 20, '第三次模考', 5, 26);

-- --------------------------------------------------------

--
-- 表的结构 `user_video`
--

CREATE TABLE `user_video` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `currentTime` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_video`
--

INSERT INTO `user_video` (`user_id`, `id`, `video_id`, `currentTime`) VALUES
(168, 18, 170, 0),
(168, 237, 175, 3),
(168, 248, 169, 14);

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
-- Indexes for table `exam`
--
ALTER TABLE `exam`
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
-- Indexes for table `user_exam`
--
ALTER TABLE `user_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_video`
--
ALTER TABLE `user_video`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `video_id` (`video_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cate`
--
ALTER TABLE `cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- 使用表AUTO_INCREMENT `user_exam`
--
ALTER TABLE `user_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用表AUTO_INCREMENT `user_video`
--
ALTER TABLE `user_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- 使用表AUTO_INCREMENT `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
