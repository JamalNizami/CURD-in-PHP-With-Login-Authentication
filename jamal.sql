/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.21-MariaDB : Database - jamal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jamal` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `jamal`;

/*Table structure for table `mobile` */

DROP TABLE IF EXISTS `mobile`;

CREATE TABLE `mobile` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) DEFAULT NULL,
  `Contact` bigint(20) DEFAULT NULL,
  `SimName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mobile` */

insert  into `mobile`(`ID`,`UserName`,`Contact`,`SimName`) values (1,' jamal',3164948636,'zong'),(2,' kamal',3244088204,'warid'),(3,' Bilal',3334368861,'ufone'),(4,' Muhammad Ans',54253,'gfestge');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `Roll_No` int(11) NOT NULL,
  `Student_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Semester` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Roll_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `student` */

insert  into `student`(`Roll_No`,`Student_Name`,`Email`,`Semester`) values (1201,'Muhammad Jamal Anjum','jamal.anjum2001@gmail.com','4th');

/*Table structure for table `user_table` */

DROP TABLE IF EXISTS `user_table`;

CREATE TABLE `user_table` (
  `full_name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `pword` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_table` */

insert  into `user_table`(`full_name`,`Email`,`pword`) values ('Muhammad Jamal Anjum','jamal.anjum2001@gmail.com','$2y$10$IBEFri/mYWOREJJ1194neOVaAi5zFc4icUjv3EgwPMbrq7z6sZRtq'),('bilal','bilal@gmail.om','$2y$10$/sodQxfQlMqr6mQ23yuK.eM7/kCX5BSdSD5L.uCOKfai5NCFR00JS'),('kamal','kamal@gmail.com','$2y$10$xicWxxraRwoZREnT5YLUdOCYa.28ERpPw2LXFsLYCNb3sz91ihY1S');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
