-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2012 年 12 月 19 日 15:13
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zkpc`
--

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_node`
--

CREATE TABLE IF NOT EXISTS `zkpc_node` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `topics_count` int(11) NOT NULL DEFAULT '0',
  `summary` varchar(128) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`nid`),
  KEY `FK_node_section` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `zkpc_node`
--

INSERT INTO `zkpc_node` (`nid`, `name`, `state`, `sort`, `topics_count`, `summary`, `section_id`) VALUES
(1, 'Java', 1, 0, 0, 'oop language', 1),
(2, 'PHP', 1, 0, 0, '脚本语言', 1),
(3, 'C/C++', 1, 0, 0, '基础语言', 1),
(4, 'C#', 1, 0, 0, '可视化编程', 1),
(5, '工具控', 1, 0, 0, '开发工具', 2),
(6, '瞎扯淡', 1, 0, 0, '闲聊', 2);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_reply`
--

CREATE TABLE IF NOT EXISTS `zkpc_reply` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `source` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `FK_reply_user` (`user_id`),
  KEY `FK_reply_topic` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `zkpc_reply`
--


-- --------------------------------------------------------

--
-- 表的结构 `zkpc_section`
--

CREATE TABLE IF NOT EXISTS `zkpc_section` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `zkpc_section`
--

INSERT INTO `zkpc_section` (`sid`, `name`, `state`, `sort`) VALUES
(1, 'Languages', 1, 0),
(2, '分享', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_topic`
--

CREATE TABLE IF NOT EXISTS `zkpc_topic` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `content` text,
  `state` int(1) NOT NULL DEFAULT '1',
  `replies_count` int(11) DEFAULT NULL,
  `last_reply_user_id` int(11) DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `source` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `node_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `FK_topic_user` (`user_id`),
  KEY `Fk_topic_node` (`node_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `zkpc_topic`
--

INSERT INTO `zkpc_topic` (`tid`, `title`, `content`, `state`, `replies_count`, `last_reply_user_id`, `replied_at`, `source`, `created_at`, `updated_at`, `node_id`, `user_id`) VALUES
(1, 'yii framework 很好用哟', 'php的一个开源框架可以开发各类大型WEB应用，并且高效率', 1, NULL, NULL, '0000-00-00 00:00:00', '', '2012-12-19 23:05:58', '2012-12-19 23:09:29', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zkpc_user`
--

CREATE TABLE IF NOT EXISTS `zkpc_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(64) NOT NULL,
  `avatar_file_name` varchar(128) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `state` int(1) NOT NULL DEFAULT '1',
  `website` varchar(128) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pwd` varchar(128) NOT NULL,
  `pwd_salt` varchar(128) NOT NULL,
  `signature` varchar(128) DEFAULT NULL,
  `p_Intro` text,
  `persistence_token` varchar(128) DEFAULT NULL,
  `login_count` int(11) DEFAULT NULL,
  `failed_login_count` int(11) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `current_login_ip` varchar(64) DEFAULT NULL,
  `last_login_ip` varchar(64) DEFAULT NULL,
  `notes_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `zkpc_user`
--

INSERT INTO `zkpc_user` (`uid`, `username`, `email`, `name`, `avatar_file_name`, `verified`, `state`, `website`, `created_at`, `updated_at`, `pwd`, `pwd_salt`, `signature`, `p_Intro`, `persistence_token`, `login_count`, `failed_login_count`, `last_login_at`, `current_login_ip`, `last_login_ip`, `notes_count`) VALUES
(1, 'hanmis', 'mishubu1314@126.com', 'hanmis', NULL, 0, 1, NULL, '2012-12-08 17:37:30', '2012-12-08 17:37:30', '482e9332852d5213c07c7195a94a98bb', 'zkpc50c30a5a5c096', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'hanmis2', 'mishubu1314@1139.com', 'hello', NULL, 0, 1, NULL, '2012-12-08 18:01:24', '2012-12-08 18:01:24', '716d869bcbd2ddc1bbe07a4a31f84179', 'zkpc50c30ff400868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'hello', 'hello@126.com', 'hello', NULL, 0, 1, NULL, '2012-12-09 22:17:29', '2012-12-09 22:17:29', '136a7514c6e4dd86d24611fd21886e8c', 'zkpc50c49d79ad7dd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'world', 'world@qq.com', 'world', NULL, 0, 1, NULL, '2012-12-09 22:19:25', '2012-12-09 22:19:25', '52ecedb45866b76d50e14180bba06f75', 'zkpc50c49ded0375b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'test', 'test@qq.com', 'test', NULL, 0, 1, NULL, '2012-12-09 22:23:40', '2012-12-09 22:23:40', '18304bad4de6317e090a2f230982d0b7', 'zkpc50c49eec36bd7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'qqq', 'qqq@qq.com', 'qqq', NULL, 0, 1, NULL, '2012-12-09 22:24:44', '2012-12-09 22:24:44', '65a7ee8ccaf7959d0f7c3c6f0772b517', 'zkpc50c49f2c409eb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'admin', 'admin@qq.com', 'admin', NULL, 0, 1, NULL, '2012-12-19 22:53:25', '2012-12-19 22:53:25', '7ae2ea4778d95cb61f48b458b9393a8b', 'zkpc50d1d4e556aeb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- 限制导出的表
--

--
-- 限制表 `zkpc_node`
--
ALTER TABLE `zkpc_node`
  ADD CONSTRAINT `FK_node_section` FOREIGN KEY (`section_id`) REFERENCES `zkpc_section` (`sid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_reply`
--
ALTER TABLE `zkpc_reply`
  ADD CONSTRAINT `FK_reply_topic` FOREIGN KEY (`topic_id`) REFERENCES `zkpc_topic` (`tid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_reply_user` FOREIGN KEY (`user_id`) REFERENCES `zkpc_user` (`uid`) ON DELETE CASCADE;

--
-- 限制表 `zkpc_topic`
--
ALTER TABLE `zkpc_topic`
  ADD CONSTRAINT `Fk_topic_node` FOREIGN KEY (`node_id`) REFERENCES `zkpc_node` (`nid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `zkpc_user` (`uid`) ON DELETE CASCADE;
