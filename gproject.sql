-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-04-25 15:12:18
-- 服务器版本： 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gproject`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL COMMENT '管理员id',
  `adminName` varchar(32) NOT NULL COMMENT '用户登录账号',
  `adminPwd` varchar(32) NOT NULL COMMENT '用户登录密码',
  `adminRealName` varchar(32) DEFAULT NULL COMMENT '管理员真实姓名',
  `adminSex` tinyint(4) DEFAULT '1' COMMENT '1为男性、2为女性',
  `adminAge` tinyint(4) DEFAULT NULL COMMENT '管理员年龄',
  `adminPhone` varchar(11) DEFAULT NULL COMMENT '管理员联系方式',
  `adminEmail` varchar(32) DEFAULT NULL,
  `adminAddress` varchar(256) DEFAULT NULL COMMENT '管理员住址',
  `createTime` varchar(12) DEFAULT NULL COMMENT '创建时间',
  `updateTime` varchar(12) DEFAULT NULL COMMENT '用户最后一次信息更新时间、默认为账户创建时间',
  `state` tinyint(4) DEFAULT '1' COMMENT '1为一级管理员、2为二级教师管理员、3为二级学生管理员'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminPwd`, `adminRealName`, `adminSex`, `adminAge`, `adminPhone`, `adminEmail`, `adminAddress`, `createTime`, `updateTime`, `state`) VALUES
(1, 'yang', 'e10adc3949ba59abbe56e057f20f883e', 'yangyang', 1, 22, '15127426131', '1042266024@qq.com', '天津市北辰区河北工业大学', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `cname`
--

CREATE TABLE `cname` (
  `cNameId` int(11) NOT NULL COMMENT '课程名字id',
  `cName` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '课程名'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `cname`
--

INSERT INTO `cname` (`cNameId`, `cName`) VALUES
(0, ''),
(1, '语文'),
(2, '数学'),
(3, '英语'),
(4, '物理'),
(5, '化学'),
(6, '生物'),
(7, '政治'),
(8, '历史'),
(9, '地理');

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `cId` int(11) NOT NULL,
  `cNameId` int(11) NOT NULL,
  `thrId` int(11) NOT NULL,
  `aveScore` int(255) DEFAULT NULL,
  `minScore` int(255) DEFAULT NULL,
  `maxScore` int(255) DEFAULT NULL,
  `fullNum` int(11) UNSIGNED DEFAULT NULL,
  `remain_Num` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`cId`, `cNameId`, `thrId`, `aveScore`, `minScore`, `maxScore`, `fullNum`, `remain_Num`) VALUES
(11, 1, 7, NULL, NULL, NULL, 60, NULL),
(12, 2, 8, NULL, NULL, NULL, 60, NULL),
(13, 3, 9, NULL, NULL, NULL, 60, NULL),
(14, 4, 10, NULL, NULL, NULL, 60, NULL),
(15, 5, 11, NULL, NULL, NULL, 60, NULL),
(16, 6, 12, NULL, NULL, NULL, 60, NULL),
(17, 7, 13, NULL, NULL, NULL, 60, NULL),
(18, 8, 14, NULL, NULL, NULL, 60, NULL),
(19, 9, 15, NULL, NULL, NULL, 60, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `gproject`
--

CREATE TABLE `gproject` (
  `gpId` int(11) NOT NULL COMMENT '毕设编号',
  `gpThrId` int(11) DEFAULT NULL COMMENT '指导教师编号',
  `gpTitle` varchar(128) DEFAULT NULL COMMENT '毕设标题',
  `gpContent` varchar(2048) DEFAULT NULL COMMENT '毕设内容',
  `gpAim` varchar(128) DEFAULT NULL COMMENT '毕设目的',
  `gpRequest` varchar(128) DEFAULT NULL COMMENT '毕设要求',
  `gpMust` varchar(128) DEFAULT NULL COMMENT '必备知识',
  `gpFormal` varchar(128) DEFAULT NULL COMMENT '提交形式',
  `gpOthers` varchar(2048) DEFAULT NULL COMMENT '毕设相关备注',
  `gpSHState` tinyint(4) DEFAULT '1' COMMENT '1为软件方向，2为硬件方向',
  `createTime` varchar(12) DEFAULT NULL COMMENT '创建时间',
  `updateTime` varchar(12) DEFAULT NULL COMMENT '更新时间',
  `state` tinyint(4) DEFAULT '1' COMMENT '0为未通过 1为通过未选择、2通过已选择、3为已确认、-1为未通过'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `gproject`
--

INSERT INTO `gproject` (`gpId`, `gpThrId`, `gpTitle`, `gpContent`, `gpAim`, `gpRequest`, `gpMust`, `gpFormal`, `gpOthers`, `gpSHState`, `createTime`, `updateTime`, `state`) VALUES
(2, 7, 'test2', 'project', 'title', 'need', 'knowledge', 'email', '', 2, '1523967980', '1523968173', 3),
(3, 7, 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 1, '1523973858', '1523973858', 1);

-- --------------------------------------------------------

--
-- 表的结构 `major`
--

CREATE TABLE `major` (
  `majorId` int(11) NOT NULL COMMENT '专业id',
  `majorName` varchar(64) DEFAULT NULL COMMENT '专业名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `major`
--

INSERT INTO `major` (`majorId`, `majorName`) VALUES
(1, '计算机科学与技术'),
(2, '物联网'),
(3, '通信工程'),
(4, '电子科学与技术'),
(5, '电子信息工程'),
(6, '电子信息科学与技术'),
(7, '网络工程');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `msgId` int(11) NOT NULL COMMENT '消息id',
  `msgParentId` int(11) DEFAULT NULL COMMENT '用于消息回复',
  `msgFromId` int(11) DEFAULT NULL COMMENT '消息发送者',
  `msgAccessId` int(11) DEFAULT NULL COMMENT '消息接收者',
  `msgContent` varchar(1024) DEFAULT NULL COMMENT '消息内容',
  `createTime` varchar(12) DEFAULT NULL COMMENT '消息发送时间',
  `state` tinyint(4) DEFAULT '1' COMMENT '1学生->老师 -1老师到学生  2管理员给学生 -2管理员给老师',
  `showStu` tinyint(4) DEFAULT '1' COMMENT '1为显示 -1为不显示',
  `showThr` tinyint(4) DEFAULT '1' COMMENT '1为显示 -1为不显示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`msgId`, `msgParentId`, `msgFromId`, `msgAccessId`, `msgContent`, `createTime`, `state`, `showStu`, `showThr`) VALUES
(1, 0, -999, -999, 'there is a meeting in room8 at 7:00PM  tonight!', '1524107183', -2, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `plan`
--

CREATE TABLE `plan` (
  `planId` int(11) NOT NULL COMMENT '计划列表Id',
  `plnStuId` int(11) NOT NULL,
  `plnThrId` int(11) NOT NULL,
  `plnGpId` int(11) NOT NULL,
  `endtime1` varchar(20) DEFAULT NULL,
  `title1` varchar(64) DEFAULT NULL,
  `other1` varchar(256) DEFAULT NULL,
  `endtime2` varchar(20) DEFAULT NULL,
  `title2` varchar(64) DEFAULT NULL,
  `other2` varchar(256) DEFAULT NULL,
  `endtime3` varchar(20) DEFAULT NULL,
  `title3` varchar(64) DEFAULT NULL,
  `other3` varchar(256) DEFAULT NULL,
  `endtime4` varchar(20) DEFAULT NULL,
  `title4` varchar(64) DEFAULT NULL,
  `other4` varchar(256) DEFAULT NULL,
  `endtime5` varchar(20) DEFAULT NULL,
  `title5` varchar(64) DEFAULT NULL,
  `other5` varchar(256) DEFAULT NULL,
  `endtime6` varchar(20) DEFAULT NULL,
  `title6` varchar(64) DEFAULT NULL,
  `other6` varchar(256) DEFAULT NULL,
  `endtime7` varchar(20) DEFAULT NULL,
  `title7` varchar(64) DEFAULT NULL,
  `other7` varchar(256) DEFAULT NULL,
  `flag` tinyint(4) DEFAULT '1',
  `createTime` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `score`
--

CREATE TABLE `score` (
  `stuId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `score` int(255) DEFAULT NULL,
  `paperUrl` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(2) UNSIGNED ZEROFILL DEFAULT NULL COMMENT '0代表未选则  1表示选中'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `score`
--

INSERT INTO `score` (`stuId`, `cId`, `score`, `paperUrl`, `status`) VALUES
(126, 11, 60, '5adfde13b4221.jpg', 01),
(126, 12, 65, NULL, 01),
(126, 13, 70, NULL, 01),
(126, 14, 75, NULL, 01),
(126, 15, 80, NULL, 01),
(126, 16, 85, NULL, 01),
(126, 17, 90, NULL, 01),
(126, 18, 95, NULL, 01),
(126, 19, 100, NULL, 01),
(127, 11, 60, '5addd130ec9c3.jpg', 01),
(127, 12, NULL, NULL, 01),
(127, 13, 80, NULL, 01),
(127, 14, NULL, NULL, 01),
(127, 15, NULL, NULL, 01),
(128, 11, 45, NULL, 01),
(128, 15, NULL, NULL, 01),
(129, 11, 99, NULL, 01),
(130, 11, 89, NULL, 01),
(131, 11, 68, NULL, 01),
(131, 15, NULL, NULL, 01),
(132, 11, 89, NULL, 01),
(133, 11, 89, NULL, 01),
(134, 11, 78, NULL, 01),
(135, 11, 87, NULL, 01),
(136, 11, 12, NULL, 01);

-- --------------------------------------------------------

--
-- 表的结构 `stlinks`
--

CREATE TABLE `stlinks` (
  `stlId` int(11) NOT NULL COMMENT '毕设选择关系表',
  `stlSpId` int(11) DEFAULT NULL COMMENT '毕设Id',
  `stlThrId` int(11) DEFAULT NULL COMMENT '教师Id',
  `stlStuId` int(11) DEFAULT NULL COMMENT '学生ID',
  `createTime` varchar(12) DEFAULT NULL COMMENT '创建时间',
  `updateTime` varchar(12) DEFAULT NULL COMMENT '更新时间',
  `state` tinyint(4) DEFAULT '1' COMMENT '1为选中、2为确认、3为放弃'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stlinks`
--

INSERT INTO `stlinks` (`stlId`, `stlSpId`, `stlThrId`, `stlStuId`, `createTime`, `updateTime`, `state`) VALUES
(2, 2, 7, 125, '1523968221', '1523968234', 2);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `stuId` int(11) NOT NULL COMMENT '学生id',
  `stuCard` varchar(32) NOT NULL COMMENT '用户登录账号 为学生学号',
  `stuPwd` varchar(32) NOT NULL COMMENT '用户登录密码',
  `stuRealName` varchar(32) DEFAULT NULL COMMENT '学生真实姓名',
  `stuSex` tinyint(4) DEFAULT '1' COMMENT '1为男性、2为女性',
  `stuAge` tinyint(4) DEFAULT NULL COMMENT '学生年龄',
  `stuPhone` varchar(11) DEFAULT NULL COMMENT '学生联系方式',
  `stuEmail` varchar(32) DEFAULT NULL,
  `stuMajor` tinyint(4) DEFAULT NULL COMMENT '学生专业',
  `createTime` varchar(12) DEFAULT NULL COMMENT '创建时间',
  `updateTime` varchar(12) DEFAULT NULL COMMENT '用户最后一次信息更新时间、默认为账户创建时间',
  `state` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`stuId`, `stuCard`, `stuPwd`, `stuRealName`, `stuSex`, `stuAge`, `stuPhone`, `stuEmail`, `stuMajor`, `createTime`, `updateTime`, `state`) VALUES
(125, '2018110001', 'e10adc3949ba59abbe56e057f20f883e', '张三', 1, 22, '15127565984', '1042266024@qq.com', 2, '1523928732', '1523967786', 1),
(126, '20181102', 'f379eaf3c831b04de153469d1bec345e', '张四', 2, 22, '15124546312', '1042266024@163.com', 6, '1524122869', '1524122869', 1),
(127, '20181103', 'f379eaf3c831b04de153469d1bec345e', '张五', 1, NULL, NULL, NULL, NULL, '1524122889', '1524122889', 1),
(128, '20181104', 'f379eaf3c831b04de153469d1bec345e', '张六', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', 1),
(129, '20181105', 'f379eaf3c831b04de153469d1bec345e', '张七', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', 1),
(130, '20181106', 'f379eaf3c831b04de153469d1bec345e', '张八', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', 1),
(131, '20181107', 'f379eaf3c831b04de153469d1bec345e', '张九', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', 1),
(132, '20181108', 'f379eaf3c831b04de153469d1bec345e', '张十', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', 1),
(133, '20181109', 'f379eaf3c831b04de153469d1bec345e', '赵一', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', 1),
(134, '20181110', 'f379eaf3c831b04de153469d1bec345e', '赵二', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', 1),
(135, '20181111', 'f379eaf3c831b04de153469d1bec345e', '赵三', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', 1),
(136, '20181112', 'f379eaf3c831b04de153469d1bec345e', '赵四', 1, NULL, NULL, NULL, NULL, '1524149033', '1524149033', -1);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `thrId` int(11) NOT NULL COMMENT '用户id',
  `thrName` varchar(32) NOT NULL COMMENT '用户登录账号',
  `thrPwd` varchar(32) NOT NULL COMMENT '用户登录密码',
  `thrRealName` varchar(32) DEFAULT NULL COMMENT '用户真实姓名',
  `thrSex` tinyint(4) DEFAULT '1' COMMENT '1为男性、2为女性',
  `thrAge` tinyint(4) DEFAULT NULL COMMENT '用户年龄',
  `thrStudy` varchar(128) DEFAULT NULL COMMENT '用户研究方向',
  `thrEmail` varchar(32) DEFAULT NULL,
  `thrPhone` varchar(11) DEFAULT NULL COMMENT '用户联系方式',
  `showState` char(4) DEFAULT NULL COMMENT 'phone, email, address, study',
  `thrAddress` varchar(256) DEFAULT NULL COMMENT '用户办公地址',
  `createTime` varchar(12) DEFAULT NULL COMMENT '创建时间',
  `updateTime` varchar(12) DEFAULT NULL COMMENT '用户最后一次信息更新时间、默认为账户创建时间',
  `state` tinyint(4) DEFAULT '1' COMMENT '1正常 -1为回收站'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`thrId`, `thrName`, `thrPwd`, `thrRealName`, `thrSex`, `thrAge`, `thrStudy`, `thrEmail`, `thrPhone`, `showState`, `thrAddress`, `createTime`, `updateTime`, `state`) VALUES
(7, '142999', '3092b3004301a601a5c62dc639a91a1b', '潘老师', 1, 38, '数据库', 'jasonpan@gmail.com', '13821578445', '0011', '河北工业大学计算机学院', '1523883421', '1524489390', 1),
(8, '142998', 'a8033e5ab918469531962e48d81d856a', '张老师', 1, 23, '语文', '1012254@gmail.com', '12311231321', '0000', '河北工业大学', '1524104358', '1524489426', 1),
(9, '142997', '7ada5cca7210b86621026feea53c58db', '王老师', 2, 21, '数学', 'lliu5790@gmail.com', '13821578445', '0000', '华北理工大学', '1524104382', '1524489455', 1),
(10, '142996', '4625247c1874d01e0f163acf5ded822a', '苏老师', 1, 25, '化学', '15222531812@163.com', '99966633', '0001', '清华大学附属中学', '1524104405', '1524489489', 1),
(11, '142995', 'a6ed7c994d03f39cd855368460fdac77', '赵老师', 1, 18, '历史', '15222535283@163.com', '15222535283', '0001', '人大附中', '1524104425', '1524489511', 1),
(12, '142993', '21218cca77804d2ba1922c33e0151105', '钱老师', 2, 23, '政治', '13931830100@163.com', '13931830100', '0000', '天津大学', '1524104442', '1524490081', 1),
(13, '142994', '842d0e7e5bf87ef5bf09c2c124f0e69a', '张老师', 1, 21, '历史', '1012254@gmail.com', '12311231321', '0000', '人大附中', '1524490243', '1524490362', 1),
(14, '142992', 'fa4086a32e8c798c1da97e3404f50e0a', '王老师', 1, 55, '历史', '1012254@gmail.com', '12311231321', '0000', '华北理工大学', '1524490260', '1524490481', 1),
(15, '142991', '514f09ff82e6d202717307f8a83c5e8c', '孙老师', 1, 23, '数据库', '13931830100@163.com', '12311231321', '0000', '河北工业大学', '1524490274', '1524490718', 1),
(16, '142990', '7031d30842c4c2187a005d2b4a19a053', '周老师', 1, NULL, NULL, NULL, NULL, NULL, NULL, '1524490289', '1524490289', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `cname`
--
ALTER TABLE `cname`
  ADD PRIMARY KEY (`cNameId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cId`,`thrId`),
  ADD KEY `thrId` (`thrId`),
  ADD KEY `cId` (`cId`),
  ADD KEY `cNameId` (`cNameId`);

--
-- Indexes for table `gproject`
--
ALTER TABLE `gproject`
  ADD PRIMARY KEY (`gpId`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`majorId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msgId`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planId`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`stuId`,`cId`),
  ADD KEY `cId` (`cId`);

--
-- Indexes for table `stlinks`
--
ALTER TABLE `stlinks`
  ADD PRIMARY KEY (`stlId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuId`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`thrId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `gproject`
--
ALTER TABLE `gproject`
  MODIFY `gpId` int(11) NOT NULL AUTO_INCREMENT COMMENT '毕设编号', AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `major`
--
ALTER TABLE `major`
  MODIFY `majorId` int(11) NOT NULL AUTO_INCREMENT COMMENT '专业id', AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT COMMENT '消息id', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `plan`
--
ALTER TABLE `plan`
  MODIFY `planId` int(11) NOT NULL AUTO_INCREMENT COMMENT '计划列表Id';

--
-- 使用表AUTO_INCREMENT `stlinks`
--
ALTER TABLE `stlinks`
  MODIFY `stlId` int(11) NOT NULL AUTO_INCREMENT COMMENT '毕设选择关系表', AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `stuId` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生id', AUTO_INCREMENT=137;

--
-- 使用表AUTO_INCREMENT `teacher`
--
ALTER TABLE `teacher`
  MODIFY `thrId` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id', AUTO_INCREMENT=17;

--
-- 限制导出的表
--

--
-- 限制表 `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `cNameId` FOREIGN KEY (`cNameId`) REFERENCES `cname` (`cNameId`),
  ADD CONSTRAINT `thrId` FOREIGN KEY (`thrId`) REFERENCES `teacher` (`thrId`);

--
-- 限制表 `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `cId` FOREIGN KEY (`cId`) REFERENCES `course` (`cId`),
  ADD CONSTRAINT `stuId` FOREIGN KEY (`stuId`) REFERENCES `student` (`stuId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
