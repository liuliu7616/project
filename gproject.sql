/*
 Navicat MySQL Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : gproject

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 15/06/2018 09:36:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `adminId` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `adminName` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户登录账号',
  `adminPwd` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户登录密码',
  `adminRealName` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员真实姓名',
  `adminSex` tinyint(4) NULL DEFAULT 1 COMMENT '1为男性、2为女性',
  `adminAge` tinyint(4) NULL DEFAULT NULL COMMENT '管理员年龄',
  `adminPhone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员联系方式',
  `adminEmail` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `adminAddress` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员住址',
  `createTime` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建时间',
  `updateTime` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户最后一次信息更新时间、默认为账户创建时间',
  `state` tinyint(4) NULL DEFAULT 1 COMMENT '1为一级管理员、2为二级教师管理员、3为二级学生管理员',
  PRIMARY KEY (`adminId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'yang', 'e10adc3949ba59abbe56e057f20f883e', 'yangyang1', 1, 23, '15127426131', '1042266024@qq.com1', '天津市北辰区河北工业大学1', NULL, '1528873123', 1);
INSERT INTO `admin` VALUES (2, 'teacheradmin', 'e10adc3949ba59abbe56e057f20f883e', 'teacheradmin', 1, 32, '03155582711', '1042266024@qq.com', '河北工业大学', '1524726221', '1524726221', 2);
INSERT INTO `admin` VALUES (3, 'studentadmin', 'e10adc3949ba59abbe56e057f20f883e', 'studentadmin', 1, 23, '15127426130', '1042266024@qq.com', '河北工业大学北辰校区', '1524726271', '1524726271', 3);
INSERT INTO `admin` VALUES (4, 'admin4', '21218cca77804d2ba1922c33e0151105', '张三', 1, 23, '1234567897', 'zhangsan@admin.com', '天津市', '1526289967', '1526289967', -1);
INSERT INTO `admin` VALUES (5, 'admin4', 'e10adc3949ba59abbe56e057f20f883e', 'admin4', 1, 23, '123456798', '123456798@163.com', '天津北辰', '1528531203', '1528531203', 2);

-- ----------------------------
-- Table structure for cname
-- ----------------------------
DROP TABLE IF EXISTS `cname`;
CREATE TABLE `cname`  (
  `cNameId` int(11) NOT NULL COMMENT '课程名字id',
  `cName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '课程名',
  PRIMARY KEY (`cNameId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cname
-- ----------------------------
INSERT INTO `cname` VALUES (0, '');
INSERT INTO `cname` VALUES (1, '语文');
INSERT INTO `cname` VALUES (2, '数学');
INSERT INTO `cname` VALUES (3, '英语');
INSERT INTO `cname` VALUES (4, '物理');
INSERT INTO `cname` VALUES (5, '化学');
INSERT INTO `cname` VALUES (6, '生物');
INSERT INTO `cname` VALUES (7, '政治');
INSERT INTO `cname` VALUES (8, '历史');
INSERT INTO `cname` VALUES (9, '地理');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `cId` int(11) NOT NULL AUTO_INCREMENT,
  `cNameId` int(11) NOT NULL,
  `thrId` int(11) NOT NULL,
  `aveScore` int(255) NULL DEFAULT NULL,
  `minScore` int(255) NULL DEFAULT NULL,
  `maxScore` int(255) NULL DEFAULT NULL,
  `fullNum` int(11) UNSIGNED NULL DEFAULT NULL,
  `remain_Num` int(11) UNSIGNED NULL DEFAULT NULL,
  `classId` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cId`, `thrId`) USING BTREE,
  INDEX `thrId`(`thrId`) USING BTREE,
  INDEX `cId`(`cId`) USING BTREE,
  INDEX `cNameId`(`cNameId`) USING BTREE,
  INDEX `classid`(`classId`) USING BTREE,
  CONSTRAINT `cNameId` FOREIGN KEY (`cNameId`) REFERENCES `cname` (`cNameId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `classid` FOREIGN KEY (`classId`) REFERENCES `major` (`majorId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `thrId` FOREIGN KEY (`thrId`) REFERENCES `teacher` (`thrId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES (34, 1, 34, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (35, 2, 35, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (36, 3, 36, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (37, 4, 37, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (38, 5, 38, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (39, 6, 39, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (40, 7, 40, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (41, 8, 41, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (42, 9, 42, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course` VALUES (43, 1, 43, NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO `course` VALUES (44, 2, 44, NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO `course` VALUES (45, 1, 45, NULL, NULL, NULL, NULL, NULL, 3);

-- ----------------------------
-- Table structure for major
-- ----------------------------
DROP TABLE IF EXISTS `major`;
CREATE TABLE `major`  (
  `majorId` int(11) NOT NULL AUTO_INCREMENT COMMENT '专业id',
  `majorName` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '专业名称',
  PRIMARY KEY (`majorId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of major
-- ----------------------------
INSERT INTO `major` VALUES (1, '七年级一班');
INSERT INTO `major` VALUES (2, '七年级二班');
INSERT INTO `major` VALUES (3, '七年级三班');
INSERT INTO `major` VALUES (4, '八年级一班');
INSERT INTO `major` VALUES (5, '八年级二班');
INSERT INTO `major` VALUES (6, '八年级三班');
INSERT INTO `major` VALUES (7, '九年级一班');
INSERT INTO `major` VALUES (8, '九年级二班');
INSERT INTO `major` VALUES (9, '九年级三班');

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score`  (
  `stuId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `score` int(3) NULL DEFAULT NULL,
  `paperUrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(2) UNSIGNED ZEROFILL NULL DEFAULT NULL COMMENT '0代表未选则  1表示选中',
  `part1` int(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `part2` int(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `part3` int(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `part4` int(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `part5` int(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  PRIMARY KEY (`stuId`, `cId`) USING BTREE,
  INDEX `cId`(`cId`) USING BTREE,
  CONSTRAINT `cId` FOREIGN KEY (`cId`) REFERENCES `course` (`cId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `stuId` FOREIGN KEY (`stuId`) REFERENCES `student` (`stuId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES (199, 34, 77, '5af11b93e3f31.jpg', NULL, 021, 035, 021, 000, 000);
INSERT INTO `score` VALUES (199, 35, 90, '5af1467b87c83.jpg', NULL, 029, 035, 026, 000, 000);
INSERT INTO `score` VALUES (199, 36, 86, '5af147284a395.jpg', NULL, 024, 032, 030, 000, 000);
INSERT INTO `score` VALUES (199, 37, 82, '5af151cd747ea.jpg', NULL, 022, 034, 026, 000, 000);
INSERT INTO `score` VALUES (199, 38, 90, '5af14833eb64b.jpg', NULL, 029, 035, 025, 000, 000);
INSERT INTO `score` VALUES (199, 39, 80, '5af1493f5fb9a.jpg', NULL, 027, 033, 020, 000, 000);
INSERT INTO `score` VALUES (199, 40, 84, '5af14cf78a671.png', NULL, 029, 031, 024, 000, 000);
INSERT INTO `score` VALUES (199, 41, 78, '5af14e9e66b3d.jpg', NULL, 024, 030, 024, 000, 000);
INSERT INTO `score` VALUES (199, 42, 78, '5af14d75eef69.jpg', NULL, 022, 035, 021, 000, 000);
INSERT INTO `score` VALUES (200, 34, 83, '5af11bb35c039.jpg', NULL, 029, 032, 022, 000, 000);
INSERT INTO `score` VALUES (200, 35, 52, '5af1468e83641.jpg', NULL, 025, 002, 025, 000, 000);
INSERT INTO `score` VALUES (200, 36, 91, '5af147305c7de.jpg', NULL, 025, 039, 027, 000, 000);
INSERT INTO `score` VALUES (200, 37, 74, '5af151d563dfd.jpg', NULL, 024, 030, 020, 000, 000);
INSERT INTO `score` VALUES (200, 38, 86, '5af1483b77743.jpg', NULL, 022, 039, 021, 000, 000);
INSERT INTO `score` VALUES (200, 39, 79, '5af149479048c.jpg', NULL, 027, 032, 020, 000, 000);
INSERT INTO `score` VALUES (200, 40, 83, '5af14cfe719bf.jpg', NULL, 021, 032, 030, 000, 000);
INSERT INTO `score` VALUES (200, 41, 80, '5af14ea44821d.jpg', NULL, 027, 033, 020, 000, 000);
INSERT INTO `score` VALUES (200, 42, 87, '5af14d7ca1286.jpg', NULL, 028, 039, 020, 000, 000);
INSERT INTO `score` VALUES (201, 34, 86, '5af11bcaf072c.jpg', NULL, 030, 031, 025, 000, 000);
INSERT INTO `score` VALUES (201, 35, 71, '5af146a22ab9b.jpg', NULL, 015, 036, 020, 000, 000);
INSERT INTO `score` VALUES (201, 36, 68, '5af1473640d21.jpg', NULL, 025, 018, 025, 000, 000);
INSERT INTO `score` VALUES (201, 37, 78, '5af151dbe8ecc.jpg', NULL, 015, 036, 027, 000, 000);
INSERT INTO `score` VALUES (201, 38, 81, '5af14841c06e8.jpg', NULL, 016, 039, 029, 000, 000);
INSERT INTO `score` VALUES (201, 39, 64, '5af1494ceacd5.jpg', NULL, 015, 025, 024, 000, 000);
INSERT INTO `score` VALUES (201, 40, 84, '5af14d03d4abf.jpg', NULL, 019, 040, 025, 000, 000);
INSERT INTO `score` VALUES (201, 41, 43, '5af14ea98d3ee.jpg', NULL, 000, 028, 015, 000, 000);
INSERT INTO `score` VALUES (201, 42, 35, '5af14d83109db.jpg', NULL, 015, 009, 011, 000, 000);
INSERT INTO `score` VALUES (202, 34, 22, '5b1b7fed1b758.jpg', NULL, 000, 000, 022, 000, 000);
INSERT INTO `score` VALUES (202, 35, 78, NULL, NULL, 016, 033, 029, 000, 000);
INSERT INTO `score` VALUES (202, 36, 78, NULL, NULL, 016, 033, 029, 000, 000);
INSERT INTO `score` VALUES (202, 37, 71, NULL, NULL, 016, 033, 022, 000, 000);
INSERT INTO `score` VALUES (202, 38, 78, NULL, NULL, 016, 033, 029, 000, 000);
INSERT INTO `score` VALUES (202, 39, 78, NULL, NULL, 016, 033, 029, 000, 000);
INSERT INTO `score` VALUES (202, 40, 78, NULL, NULL, 016, 033, 029, 000, 000);
INSERT INTO `score` VALUES (202, 41, 78, NULL, NULL, 016, 033, 029, 000, 000);
INSERT INTO `score` VALUES (202, 42, 78, NULL, NULL, 016, 033, 029, 000, 000);
INSERT INTO `score` VALUES (203, 34, 84, '5b1b7ffa8e8c4.jpg', NULL, 029, 034, 021, 000, 000);
INSERT INTO `score` VALUES (203, 35, 75, NULL, NULL, 017, 030, 028, 000, 000);
INSERT INTO `score` VALUES (203, 36, 75, NULL, NULL, 017, 030, 028, 000, 000);
INSERT INTO `score` VALUES (203, 37, 45, NULL, NULL, 021, 018, 006, 000, 000);
INSERT INTO `score` VALUES (203, 38, 71, NULL, NULL, 017, 018, 036, 000, 000);
INSERT INTO `score` VALUES (203, 39, 70, NULL, NULL, 017, 035, 018, 000, 000);
INSERT INTO `score` VALUES (203, 40, 73, NULL, NULL, 017, 032, 024, 000, 000);
INSERT INTO `score` VALUES (203, 41, 49, NULL, NULL, 017, 018, 014, 000, 000);
INSERT INTO `score` VALUES (203, 42, 44, NULL, NULL, 017, 018, 009, 000, 000);
INSERT INTO `score` VALUES (204, 34, 63, '5b1b806d2bb6a.jpg', NULL, 021, 021, 021, 000, 000);
INSERT INTO `score` VALUES (204, 35, 72, NULL, NULL, 018, 027, 027, 000, 000);
INSERT INTO `score` VALUES (204, 36, 72, NULL, NULL, 018, 027, 027, 000, 000);
INSERT INTO `score` VALUES (204, 37, 54, NULL, NULL, 018, 019, 017, 000, 000);
INSERT INTO `score` VALUES (204, 38, 70, NULL, NULL, 018, 019, 033, 000, 000);
INSERT INTO `score` VALUES (204, 39, 73, NULL, NULL, 018, 031, 024, 000, 000);
INSERT INTO `score` VALUES (204, 40, 52, NULL, NULL, 018, 019, 015, 000, 000);
INSERT INTO `score` VALUES (204, 41, 58, NULL, NULL, 018, 019, 021, 000, 000);
INSERT INTO `score` VALUES (204, 42, 47, NULL, NULL, 018, 014, 015, 000, 000);
INSERT INTO `score` VALUES (205, 34, 62, NULL, NULL, 019, 019, 024, 000, 000);
INSERT INTO `score` VALUES (205, 35, 69, NULL, NULL, 019, 024, 026, 000, 000);
INSERT INTO `score` VALUES (205, 36, 69, NULL, NULL, 019, 024, 026, 000, 000);
INSERT INTO `score` VALUES (205, 37, 67, NULL, NULL, 019, 020, 028, 000, 000);
INSERT INTO `score` VALUES (205, 38, 69, NULL, NULL, 019, 020, 030, 000, 000);
INSERT INTO `score` VALUES (205, 39, 69, NULL, NULL, 019, 020, 030, 000, 000);
INSERT INTO `score` VALUES (205, 40, 69, NULL, NULL, 019, 020, 030, 000, 000);
INSERT INTO `score` VALUES (205, 41, 45, NULL, NULL, 019, 020, 006, 000, 000);
INSERT INTO `score` VALUES (205, 42, 60, NULL, NULL, 019, 020, 021, 000, 000);
INSERT INTO `score` VALUES (206, 34, 73, NULL, NULL, 024, 024, 025, 000, 000);
INSERT INTO `score` VALUES (206, 35, 66, NULL, NULL, 020, 021, 025, 000, 000);
INSERT INTO `score` VALUES (206, 36, 66, NULL, NULL, 020, 021, 025, 000, 000);
INSERT INTO `score` VALUES (206, 37, 68, NULL, NULL, 020, 021, 027, 000, 000);
INSERT INTO `score` VALUES (206, 38, 68, NULL, NULL, 020, 021, 027, 000, 000);
INSERT INTO `score` VALUES (206, 39, 68, NULL, NULL, 020, 021, 027, 000, 000);
INSERT INTO `score` VALUES (206, 40, 68, NULL, NULL, 020, 021, 027, 000, 000);
INSERT INTO `score` VALUES (206, 41, 62, NULL, NULL, 020, 021, 021, 000, 000);
INSERT INTO `score` VALUES (206, 42, 68, NULL, NULL, 020, 021, 027, 000, 000);
INSERT INTO `score` VALUES (207, 34, 75, NULL, NULL, 025, 025, 025, 000, 000);
INSERT INTO `score` VALUES (207, 35, 63, NULL, NULL, 021, 018, 024, 000, 000);
INSERT INTO `score` VALUES (207, 36, 63, NULL, NULL, 021, 018, 024, 000, 000);
INSERT INTO `score` VALUES (207, 37, 67, NULL, NULL, 021, 022, 024, 000, 000);
INSERT INTO `score` VALUES (207, 38, 67, NULL, NULL, 021, 022, 024, 000, 000);
INSERT INTO `score` VALUES (207, 39, 67, NULL, NULL, 021, 022, 024, 000, 000);
INSERT INTO `score` VALUES (207, 40, 67, NULL, NULL, 021, 022, 024, 000, 000);
INSERT INTO `score` VALUES (207, 41, 67, NULL, NULL, 021, 022, 024, 000, 000);
INSERT INTO `score` VALUES (207, 42, 68, NULL, NULL, 021, 022, 025, 000, 000);
INSERT INTO `score` VALUES (208, 34, 70, NULL, NULL, 025, 024, 021, 000, 000);
INSERT INTO `score` VALUES (208, 35, 60, NULL, NULL, 022, 015, 023, 000, 000);
INSERT INTO `score` VALUES (208, 36, 60, NULL, NULL, 022, 015, 023, 000, 000);
INSERT INTO `score` VALUES (208, 37, 60, NULL, NULL, 022, 015, 023, 000, 000);
INSERT INTO `score` VALUES (208, 38, 60, NULL, NULL, 022, 015, 023, 000, 000);
INSERT INTO `score` VALUES (208, 39, 60, NULL, NULL, 022, 015, 023, 000, 000);
INSERT INTO `score` VALUES (208, 40, 60, NULL, NULL, 022, 015, 023, 000, 000);
INSERT INTO `score` VALUES (208, 41, 60, NULL, NULL, 022, 015, 023, 000, 000);
INSERT INTO `score` VALUES (208, 42, 60, NULL, NULL, 022, 015, 023, 000, 000);
INSERT INTO `score` VALUES (209, 34, 76, NULL, NULL, 024, 024, 028, 000, 000);
INSERT INTO `score` VALUES (209, 35, 57, NULL, NULL, 023, 012, 022, 000, 000);
INSERT INTO `score` VALUES (209, 36, 57, NULL, NULL, 023, 012, 022, 000, 000);
INSERT INTO `score` VALUES (209, 37, 55, NULL, NULL, 021, 012, 022, 000, 000);
INSERT INTO `score` VALUES (209, 38, 57, NULL, NULL, 023, 012, 022, 000, 000);
INSERT INTO `score` VALUES (209, 39, 57, NULL, NULL, 023, 012, 022, 000, 000);
INSERT INTO `score` VALUES (209, 40, 57, NULL, NULL, 023, 012, 022, 000, 000);
INSERT INTO `score` VALUES (209, 41, 57, NULL, NULL, 023, 012, 022, 000, 000);
INSERT INTO `score` VALUES (209, 42, 57, NULL, NULL, 023, 012, 022, 000, 000);
INSERT INTO `score` VALUES (210, 34, 78, NULL, NULL, 029, 027, 022, 000, 000);
INSERT INTO `score` VALUES (210, 35, 54, NULL, NULL, 024, 009, 021, 000, 000);
INSERT INTO `score` VALUES (210, 36, 54, NULL, NULL, 024, 009, 021, 000, 000);
INSERT INTO `score` VALUES (210, 37, 54, NULL, NULL, 024, 009, 021, 000, 000);
INSERT INTO `score` VALUES (210, 38, 54, NULL, NULL, 024, 009, 021, 000, 000);
INSERT INTO `score` VALUES (210, 39, 54, NULL, NULL, 024, 009, 021, 000, 000);
INSERT INTO `score` VALUES (210, 40, 54, NULL, NULL, 024, 009, 021, 000, 000);
INSERT INTO `score` VALUES (210, 41, 54, NULL, NULL, 024, 009, 021, 000, 000);
INSERT INTO `score` VALUES (210, 42, 54, NULL, NULL, 024, 009, 021, 000, 000);
INSERT INTO `score` VALUES (211, 34, 0, NULL, NULL, 000, 000, 000, 000, 000);
INSERT INTO `score` VALUES (211, 35, 0, NULL, NULL, 000, 000, 000, 000, 000);
INSERT INTO `score` VALUES (211, 36, 0, NULL, NULL, 000, 000, 000, 000, 000);
INSERT INTO `score` VALUES (211, 37, 0, NULL, NULL, 000, 000, 000, 000, 000);
INSERT INTO `score` VALUES (211, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `score` VALUES (211, 39, 0, NULL, NULL, 000, 000, 000, 000, 000);
INSERT INTO `score` VALUES (211, 40, 0, NULL, NULL, 000, 000, 000, 000, 000);
INSERT INTO `score` VALUES (211, 41, 0, NULL, NULL, 000, 000, 000, 000, 000);
INSERT INTO `score` VALUES (211, 42, 0, NULL, NULL, 000, 000, 000, 000, 000);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `stuId` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生id',
  `stuCard` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户登录账号 为学生学号',
  `stuPwd` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户登录密码',
  `stuRealName` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学生真实姓名',
  `stuSex` tinyint(4) NULL DEFAULT 1 COMMENT '1为男性、2为女性',
  `stuAge` tinyint(4) NULL DEFAULT NULL COMMENT '学生年龄',
  `stuPhone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学生联系方式',
  `stuEmail` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `stuMajor` tinyint(4) NULL DEFAULT NULL COMMENT '学生班级',
  `createTime` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建时间',
  `updateTime` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户最后一次信息更新时间、默认为账户创建时间',
  `state` tinyint(4) NULL DEFAULT 1,
  PRIMARY KEY (`stuId`) USING BTREE,
  INDEX `stuMajor`(`stuMajor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 212 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (199, '20180001', 'f379eaf3c831b04de153469d1bec345e', '张小明', 1, 15, '151275659', 'zhangxiaoming@163.com', 1, '1525750565', '1528529605', 1);
INSERT INTO `student` VALUES (200, '20180002', 'f379eaf3c831b04de153469d1bec345e', 'jason', 1, 15, '1234567988', 'jason@163.com', 1, '1525750565', '1528533170', 1);
INSERT INTO `student` VALUES (201, '20180003', 'f379eaf3c831b04de153469d1bec345e', '李玲', 2, 17, '12345679877', 'liling@gmail.com', 1, '1525750565', '1525761458', 1);
INSERT INTO `student` VALUES (202, '20180004', 'f379eaf3c831b04de153469d1bec345e', '丹尼', 1, 15, '123456789', NULL, 1, '1526288967', '1526288967', 1);
INSERT INTO `student` VALUES (203, '20180005', 'f379eaf3c831b04de153469d1bec345e', '学生5', 1, 15, '123456', '123456@student.com', 1, '1527223667', '1527223860', 1);
INSERT INTO `student` VALUES (204, '20180006', 'f379eaf3c831b04de153469d1bec345e', '学生6', 1, 15, '123456', '123456@student.com', 1, '1527223667', '1527223890', 1);
INSERT INTO `student` VALUES (205, '20180007', 'f379eaf3c831b04de153469d1bec345e', '学生7', 1, 15, '123456', '123456@student.com', 1, '1527223667', '1527223921', 1);
INSERT INTO `student` VALUES (206, '20180008', 'f379eaf3c831b04de153469d1bec345e', '学生8', 1, 15, '123456', '123456@student.com', 1, '1527223667', '1527223948', 1);
INSERT INTO `student` VALUES (207, '20180009', 'f379eaf3c831b04de153469d1bec345e', '学生9', 1, 15, '123456', '123456@student.com', 1, '1527223667', '1527223968', 1);
INSERT INTO `student` VALUES (208, '20180010', 'f379eaf3c831b04de153469d1bec345e', '学生10', 1, 15, '123456', '123456@student.com', 1, '1527223667', '1527223999', 1);
INSERT INTO `student` VALUES (209, '20180011', 'f379eaf3c831b04de153469d1bec345e', '学生11', 1, 15, '123456', '123456@student.com', 1, '1527223667', '1527224018', 1);
INSERT INTO `student` VALUES (210, '20180012', 'f379eaf3c831b04de153469d1bec345e', '学生12', 1, 15, '123456', '123456@student.com', 1, '1527223667', '1527224049', -1);
INSERT INTO `student` VALUES (211, '20180013', 'f379eaf3c831b04de153469d1bec345e', '学生13', 1, NULL, NULL, NULL, 1, '1528531318', '1528531318', 1);

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `thrId` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `thrName` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户登录账号',
  `thrPwd` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户登录密码',
  `thrRealName` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户真实姓名',
  `thrSex` tinyint(4) NULL DEFAULT 1 COMMENT '1为男性、2为女性',
  `thrAge` tinyint(4) NULL DEFAULT NULL COMMENT '用户年龄',
  `thrStudy` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户研究方向',
  `thrEmail` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thrPhone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户联系方式',
  `showState` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'phone, email, address, study',
  `thrAddress` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户办公地址',
  `createTime` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建时间',
  `updateTime` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户最后一次信息更新时间、默认为账户创建时间',
  `state` tinyint(4) NULL DEFAULT 1 COMMENT '1正常 -1为回收站',
  `permission` tinyint(4) NULL DEFAULT NULL COMMENT '0 有权限  1为无权限',
  PRIMARY KEY (`thrId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES (34, '180001', '21218cca77804d2ba1922c33e0151105', '张老师', 1, 22, '语文', '123456798@163.com', '123456789', '1111', '天津市北辰区河北工业大学', '1525697450', '1528529919', 1, 1);
INSERT INTO `teacher` VALUES (35, '180002', '21218cca77804d2ba1922c33e0151105', '李老师', 1, 35, '数学', 'teacherli@sina.com', '12345678998', '1111', '天津市北辰区', '1525697473', '1525761625', 1, 0);
INSERT INTO `teacher` VALUES (36, '180003', '21218cca77804d2ba1922c33e0151105', '王老师', 2, 36, '英语', 'teacherwang@sina.com', '1346749832', '1111', '天津北辰', '1525697498', '1525761776', 1, 0);
INSERT INTO `teacher` VALUES (37, '180004', '21218cca77804d2ba1922c33e0151105', '董老师', 1, 36, '物理', 'teacherDong@sina.com', '12346579876', '1111', '天津市北辰区', '1525697524', '1525766750', 1, 0);
INSERT INTO `teacher` VALUES (38, '180005', '21218cca77804d2ba1922c33e0151105', '吴老师', 2, 26, '化学', 'teacherWu@sina.com', '1234564879', '1111', '天津市北辰区', '1525697546', '1525762043', 1, 0);
INSERT INTO `teacher` VALUES (39, '180006', '21218cca77804d2ba1922c33e0151105', '刘老师', 1, 27, '生物', 'teacherLiu@sina.com', '78946541332', '1111', '天津市北辰区', '1525697584', '1525762171', 1, 0);
INSERT INTO `teacher` VALUES (40, '180007', '21218cca77804d2ba1922c33e0151105', '陈老师', 1, 39, '政治', 'teacherChen@sina.com', '12345679842', '1111', '天津市北辰区', '1525697613', '1525763248', 1, 0);
INSERT INTO `teacher` VALUES (41, '180008', '21218cca77804d2ba1922c33e0151105', '孙老师', 1, 45, '历史', 'teacherSun@sina.com', '4567981231', '1111', '天津市北辰区', '1525697641', '1525763706', 1, 0);
INSERT INTO `teacher` VALUES (42, '180009', '21218cca77804d2ba1922c33e0151105', '托尼老师', 1, 25, '地理', 'teachertony@sina.com', '78942123132', '1111', '天津市北辰区', '1525697662', '1525763405', 1, 0);
INSERT INTO `teacher` VALUES (43, '180010', '21218cca77804d2ba1922c33e0151105', '诸葛老师', 2, 24, '语文', 'Teacherzhuge@163.com', '15151515151', '1111', '天津市北辰区', '1526287813', '1526288063', -1, 1);
INSERT INTO `teacher` VALUES (44, '180011', '21218cca77804d2ba1922c33e0151105', '老师10', 1, NULL, NULL, NULL, NULL, NULL, NULL, '1528531431', '1528531431', 1, NULL);
INSERT INTO `teacher` VALUES (45, '20180022', '21218cca77804d2ba1922c33e0151105', 'zhanglaoshi', 1, NULL, NULL, NULL, NULL, NULL, NULL, '1528873180', '1528873180', 1, NULL);

SET FOREIGN_KEY_CHECKS = 1;
