-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 12 月 15 日 04:01
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `vehicle`
--
CREATE DATABASE IF NOT EXISTS `vehicle` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vehicle`;

-- --------------------------------------------------------

--
-- 表的结构 `baicheshenma`
--

CREATE TABLE IF NOT EXISTS `baicheshenma` (
  `bcsm` varchar(25) CHARACTER SET utf8 NOT NULL,
  `scxbh` varchar(25) CHARACTER SET utf8 NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `addtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `白车身码` (`bcsm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- 转存表中的数据 `baicheshenma`
--

INSERT INTO `baicheshenma` (`bcsm`, `scxbh`, `id`, `addtime`, `name`) VALUES
('NWN', 'EBD-A', 1, '2019-12-13 21:13:40', ''),
('HHG', 'BAD-A', 2, '2019-12-13 21:28:26', '001'),
('WQD', 'BAD-A', 3, '2019-12-13 21:39:20', '001'),
('NWM\r\n', 'EBD-A', 19, '2019-12-14 11:22:24', '001');

-- --------------------------------------------------------

--
-- 表的结构 `caozuo`
--

CREATE TABLE IF NOT EXISTS `caozuo` (
  `ID` varchar(25) CHARACTER SET utf8 NOT NULL,
  `oname` varchar(25) CHARACTER SET utf8 NOT NULL,
  `mima` varchar(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `caozuo`
--

INSERT INTO `caozuo` (`ID`, `oname`, `mima`) VALUES
('001', 'ldd', '001');

-- --------------------------------------------------------

--
-- 表的结构 `czjl`
--

CREATE TABLE IF NOT EXISTS `czjl` (
  `1` varchar(25) NOT NULL,
  `2` varchar(25) CHARACTER SET utf16 NOT NULL,
  `3` varchar(25) CHARACTER SET utf16 NOT NULL,
  `4` varchar(25) CHARACTER SET utf16 NOT NULL,
  `5` varchar(25) CHARACTER SET utf16 NOT NULL,
  `6` varchar(25) CHARACTER SET utf16 NOT NULL,
  `addtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `czfs` varchar(25) CHARACTER SET utf16 NOT NULL,
  `name` varchar(25) CHARACTER SET utf16 NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `czjl`
--

INSERT INTO `czjl` (`1`, `2`, `3`, `4`, `5`, `6`, `addtime`, `czfs`, `name`, `id`) VALUES
('CMM', 'EBD-A', '', '', '', '', '2019-12-14 11:18:57', '添加', '001', 1),
('NWM\r\n', 'EBD-A', '', '', '', '', '2019-12-14 11:22:24', '添加', '001', 2),
('01', '红色', '#ff0000', '', '', '', '2019-12-14 11:41:47', '添加', '001', 5),
('QW', '2', '12SAASDSAF', '', '', '', '2019-12-14 11:44:59', '添加', '001', 6),
(' PT-A', '涂装', 'A', 's', '', 'ss', '2019-12-15 10:19:27', '添加', '001', 7),
('SDK-A', '总装', '东部车身B', '2', '0.97', '220', '2019-12-15 10:26:16', '添加', '001', 8),
('NAS', 'EBD-A', '', '', '', '', '2019-12-15 10:32:52', '添加', '001', 9),
('WDS-A', '总装', '东部车身W', '2', '0.82', '222', '2019-12-15 10:47:13', '添加', '001', 10),
('SAD', 'EBD-A', '', '', '', '', '2019-12-15 10:47:24', '添加', '001', 11),
('JHJ', 'EBD-A', '', '', '', '', '2019-12-15 10:48:09', '添加', '001', 12),
('SAD-A', '总装', 'DON', '2', '1', '222', '2019-12-15 11:06:01', '添加', '001', 13),
('JJ', 'EBD-A', '', '', '', '', '2019-12-15 11:06:16', '添加', '001', 14),
('OOI', 'EBD-A', '', '', '', '', '2019-12-15 11:06:29', '添加', '001', 15),
('ASD', 'EBD-A', '', '', '', '', '2019-12-15 11:07:12', '添加', '001', 16),
('as', 'ss', '#000000', '', '', '', '2019-12-15 11:38:10', '添加', '001', 20),
('22', '黄色', '#ffff00', '', '', '', '2019-12-15 11:39:48', '添加', '001', 21);

-- --------------------------------------------------------

--
-- 表的结构 `gonggongxinxi`
--

CREATE TABLE IF NOT EXISTS `gonggongxinxi` (
  `scxbh` varchar(25) NOT NULL,
  `scxlx` varchar(25) CHARACTER SET utf8 NOT NULL,
  `scxmc` varchar(25) CHARACTER SET utf8 NOT NULL,
  `bc` varchar(25) CHARACTER SET utf8 NOT NULL,
  `scxl` varchar(25) CHARACTER SET utf8 NOT NULL,
  `xs` varchar(25) CHARACTER SET utf8 NOT NULL,
  `scxfz` varchar(25) CHARACTER SET utf8 NOT NULL,
  `addtime` datetime DEFAULT CURRENT_TIMESTAMP,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `gonggongxinxi`
--

INSERT INTO `gonggongxinxi` (`scxbh`, `scxlx`, `scxmc`, `bc`, `scxl`, `xs`, `scxfz`, `addtime`, `id`, `name`) VALUES
('BAD-A', '车身', '东部车身A', '1', '0.98', '120', '1', '2019-12-10 10:39:48', 1, '001'),
('PT-A', '涂装', '东部涂装A', '2', '0.97', '200', '2', '2019-12-10 10:39:48', 2, '001'),
('EBD-A', '总装', '东部车身A', '2', '0.97', '200', '2', '2019-12-10 11:07:41', 3, '001');

-- --------------------------------------------------------

--
-- 表的结构 `teshufadongji`
--

CREATE TABLE IF NOT EXISTS `teshufadongji` (
  `tsfdjdm` varchar(25) CHARACTER SET utf8 NOT NULL,
  `dw` varchar(25) CHARACTER SET utf8 NOT NULL,
  `fdjmc` varchar(25) CHARACTER SET utf8 NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `addtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `teshufadongji`
--

INSERT INTO `teshufadongji` (`tsfdjdm`, `dw`, `fdjmc`, `id`, `addtime`, `name`) VALUES
('EE', '2', 'DSFDSF-DSF', 1, '2019-12-14 00:50:35', '001'),
('PE', '3', 'SDFSF-DD', 2, '2019-12-14 00:50:35', '001'),
('SDF', '2', 'ASD', 4, '2019-12-14 01:14:19', '001');

-- --------------------------------------------------------

--
-- 表的结构 `yanse`
--

CREATE TABLE IF NOT EXISTS `yanse` (
  `颜色码` varchar(25) CHARACTER SET utf8 NOT NULL,
  `生产线编号` varchar(25) CHARACTER SET utf8 NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `yanse`
--

INSERT INTO `yanse` (`颜色码`, `生产线编号`, `id`) VALUES
('22', 'EBD-A', 1);

-- --------------------------------------------------------

--
-- 表的结构 `yansepeizhi`
--

CREATE TABLE IF NOT EXISTS `yansepeizhi` (
  `ysm` varchar(25) CHARACTER SET utf8 NOT NULL,
  `ysmc` varchar(25) CHARACTER SET utf8 NOT NULL,
  `jhyys` varchar(25) CHARACTER SET utf8 NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `addtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `yansepeizhi`
--

INSERT INTO `yansepeizhi` (`ysm`, `ysmc`, `jhyys`, `id`, `addtime`, `name`) VALUES
('03', '绿色', '#008000', 9, '2019-12-14 00:45:39', '001'),
('01', '红色', '#ff0000', 10, '2019-12-14 11:41:47', '001'),
('as', 'ss', '#000000', 11, '2019-12-15 11:38:10', '001'),
('22', '黄色', '#ffff00', 12, '2019-12-15 11:39:48', '001');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
