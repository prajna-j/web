/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.7.23-log : Database - carsale
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`carsale` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `carsale`;

/*Table structure for table `carinfo` */

DROP TABLE IF EXISTS `carinfo`;

CREATE TABLE `carinfo` (
  `carID` int(10) NOT NULL AUTO_INCREMENT,
  `brandname` varchar(25) DEFAULT NULL,
  `modelname` varchar(25) DEFAULT NULL,
  `caryear` int(4) DEFAULT NULL,
  `fueltype` varchar(10) DEFAULT NULL,
  `drivenkm` varchar(10) DEFAULT NULL,
  `description` varbinary(80) DEFAULT NULL,
  `image` text,
  `caruserID` int(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`carID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `carinfo` */

LOCK TABLES `carinfo` WRITE;

insert  into `carinfo`(`carID`,`brandname`,`modelname`,`caryear`,`fueltype`,`drivenkm`,`description`,`image`,`caruserID`,`price`) values (1,'kk','kk',88,'Petrol','98','khj','6117022295dad72340f084.jpg',1,500000),(2,'Hyundai','Grand i10',2018,'Petrol','5000','best car','19555867455dad7bb242797.png',1,200000),(3,'benz','kkk',2017,'Petrol','8000','Good Condition','8720386365dad7e0e034c3.jpg',12,2000000),(4,'fddfg','f',2019,'Diesel','67','fg','10349694675dbfd9b1db6d3.jpg',17,55),(5,'fddfg','f',2019,'Diesel','67','fg','10113539405dbfd9c2b2072.jpg',17,55),(6,'fddfg','f',2019,'Diesel','67','fg','1131469705dbfd9e211293.jpg',17,55);

UNLOCK TABLES;

/*Table structure for table `orderinfo` */

DROP TABLE IF EXISTS `orderinfo`;

CREATE TABLE `orderinfo` (
  `orderRID` int(11) NOT NULL AUTO_INCREMENT,
  `carID` int(11) DEFAULT NULL,
  `sellerID` int(11) DEFAULT NULL,
  `buyerID` int(11) DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `orderDescription` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`orderRID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `orderinfo` */

LOCK TABLES `orderinfo` WRITE;

insert  into `orderinfo`(`orderRID`,`carID`,`sellerID`,`buyerID`,`orderDate`,`orderDescription`) values (1,3,12,1,'2019-11-04',NULL),(2,3,12,1,'2019-11-04',NULL),(3,3,12,1,'2019-11-04',NULL),(4,1,1,1,'2019-11-04',NULL),(5,3,12,1,'2019-11-04',NULL);

UNLOCK TABLES;

/*Table structure for table `userinfo` */

DROP TABLE IF EXISTS `userinfo`;

CREATE TABLE `userinfo` (
  `userRid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `emailId` varchar(35) NOT NULL,
  `address` varchar(25) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`userRid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `userinfo` */

LOCK TABLES `userinfo` WRITE;

insert  into `userinfo`(`userRid`,`user_name`,`contactno`,`emailId`,`address`,`username`,`pwd`) values (1,'raj','8888','kkr@gmail.com','Mangalore','kk','kk'),(7,'kk','88','jkh','jkh','jh','ljkh'),(8,'','','','','',''),(9,'','','','','',''),(10,'','','','','',''),(11,'','','','','',''),(12,'krishna','8788','kkk@gmail.com','jjj','raj','raj'),(13,'krishna','666','mjhjh','hjgljg','1234','1234'),(14,'buyer1','9874563210','abcd@abcd.com','Mangalore','buyer','buyer'),(15,'kr','888','kkk','kkk','kr','kr'),(16,'pp','999','lkjhk','ljhl','ppp','ppp'),(17,'sdff','9876543210','sdf@gmail.com','sdf','sdf','sdf');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
