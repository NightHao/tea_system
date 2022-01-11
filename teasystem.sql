-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-11 15:37:57
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `teasystem`
--

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `all_brand`
-- (請參考以下實際畫面)
--
CREATE TABLE `all_brand` (
`brandname` varchar(20)
);

-- --------------------------------------------------------

--
-- 資料表結構 `brand`
--

CREATE TABLE `brand` (
  `brandname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `shopname` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `brand`
--

INSERT INTO `brand` (`brandname`, `shopname`) VALUES
('', '小明的店'),
('', '未知好茶店'),
('50嵐', '50嵐基隆廟口店'),
('50嵐', '50嵐某某店'),
('COCO', 'COCO海洋店'),
('YK', '號好喝松山店'),
('清心福全', '海大中正店'),
('珍煮丹', '珍煮丹內湖江南店');

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `brand_drink`
-- (請參考以下實際畫面)
--
CREATE TABLE `brand_drink` (
`shopname` varchar(20)
,`brandname` varchar(20)
,`category` varchar(20)
,`name` varchar(20)
,`price` int(3)
,`size` varchar(5)
,`info` varchar(40)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `brand_drinkshop`
-- (請參考以下實際畫面)
--
CREATE TABLE `brand_drinkshop` (
`brandname` varchar(20)
,`shopname` varchar(20)
,`address` varchar(50)
,`time` varchar(20)
);

-- --------------------------------------------------------

--
-- 資料表結構 `drink`
--

CREATE TABLE `drink` (
  `shopname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `category` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `price` int(3) NOT NULL,
  `size` varchar(5) CHARACTER SET utf8 NOT NULL,
  `info` varchar(40) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `drink`
--

INSERT INTO `drink` (`shopname`, `category`, `name`, `price`, `size`, `info`) VALUES
('50嵐基隆廟口店', '找超好茶', '四季春青茶', 30, 'M', ''),
('50嵐基隆廟口店', '', '紅茶', 30, 'M', ''),
('50嵐某某店', '找牛奶', '黑糖珍珠鮮奶', 65, 'L', '不一定有'),
('小明的店', '', '', 0, '', ''),
('未知好茶店', '', '不知春', 30, 'M', ''),
('海大中正店', '', '', 0, '', ''),
('珍煮丹內湖江南店', '匠心職人黑糖', '黑糖珍珠鮮奶', 75, 'L', NULL),
('號好喝松山店', '世界第一茶', '不知春', 300, 'S', '');

-- --------------------------------------------------------

--
-- 資料表結構 `drinkshop`
--

CREATE TABLE `drinkshop` (
  `shopname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `brandname` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `drinkshop`
--

INSERT INTO `drinkshop` (`shopname`, `address`, `brandname`, `time`) VALUES
('50嵐基隆廟口店', '基隆市仁愛區愛四路1號', '50嵐', '11:00-22:00'),
('50嵐某某店', '某某路', '50嵐', '10:00-21:00'),
('小明的店', '椰林大道', '', '24小時'),
('未知好茶店', '未知路', '', ''),
('海大中正店', '基隆市中正路', '清心福全', '9:00-21:00'),
('珍煮丹內湖江南店', '台北市內湖區江南街108號', '珍煮丹', '10:00-21:00'),
('號好喝松山店', '台北市松山區民生路11號', 'YK', '24小時');

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `drink_drinkshop`
-- (請參考以下實際畫面)
--
CREATE TABLE `drink_drinkshop` (
`shopname` varchar(20)
,`category` varchar(20)
,`name` varchar(20)
,`price` int(3)
,`size` varchar(5)
,`info` varchar(40)
,`address` varchar(50)
,`brandname` varchar(20)
,`time` varchar(20)
);

-- --------------------------------------------------------

--
-- 檢視表結構 `all_brand`
--
DROP TABLE IF EXISTS `all_brand`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_brand`  AS SELECT DISTINCT `brand`.`brandname` AS `brandname` FROM `brand` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `brand_drink`
--
DROP TABLE IF EXISTS `brand_drink`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `brand_drink`  AS SELECT `brand`.`shopname` AS `shopname`, `brand`.`brandname` AS `brandname`, `drink`.`category` AS `category`, `drink`.`name` AS `name`, `drink`.`price` AS `price`, `drink`.`size` AS `size`, `drink`.`info` AS `info` FROM (`brand` join `drink` on(`brand`.`shopname` = `drink`.`shopname`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `brand_drinkshop`
--
DROP TABLE IF EXISTS `brand_drinkshop`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `brand_drinkshop`  AS SELECT `brand`.`brandname` AS `brandname`, `brand`.`shopname` AS `shopname`, `drinkshop`.`address` AS `address`, `drinkshop`.`time` AS `time` FROM (`brand` join `drinkshop` on(`brand`.`brandname` = `drinkshop`.`brandname` and `brand`.`shopname` = `drinkshop`.`shopname`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `drink_drinkshop`
--
DROP TABLE IF EXISTS `drink_drinkshop`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `drink_drinkshop`  AS SELECT `drink`.`shopname` AS `shopname`, `drink`.`category` AS `category`, `drink`.`name` AS `name`, `drink`.`price` AS `price`, `drink`.`size` AS `size`, `drink`.`info` AS `info`, `drinkshop`.`address` AS `address`, `drinkshop`.`brandname` AS `brandname`, `drinkshop`.`time` AS `time` FROM (`drink` left join `drinkshop` on(`drink`.`shopname` = `drinkshop`.`shopname`)) ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandname`,`shopname`) USING BTREE,
  ADD KEY `drink_ref2` (`shopname`);

--
-- 資料表索引 `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`shopname`,`name`,`price`);

--
-- 資料表索引 `drinkshop`
--
ALTER TABLE `drinkshop`
  ADD PRIMARY KEY (`shopname`,`address`) USING BTREE,
  ADD KEY `drink_ref3` (`brandname`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `drinkshop_ref1` FOREIGN KEY (`shopname`) REFERENCES `drinkshop` (`shopname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `drinkshop`
--
ALTER TABLE `drinkshop`
  ADD CONSTRAINT `drink_ref3` FOREIGN KEY (`brandname`) REFERENCES `brand` (`brandname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
