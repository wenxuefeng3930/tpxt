-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 12 月 06 日 11:34
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pfxt`
--

-- --------------------------------------------------------

--
-- 表的结构 `guize`
--

CREATE TABLE IF NOT EXISTS `guize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biaoti` varchar(16) NOT NULL,
  `time` varchar(30) NOT NULL,
  `shijian` float NOT NULL,
  `zero` int(100) NOT NULL,
  `mudi` varchar(300) NOT NULL,
  `zhuban` varchar(100) NOT NULL,
  `zanzhu` varchar(100) DEFAULT NULL,
  `guize` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
