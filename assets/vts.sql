/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - vts
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vts` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vts`;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `vehicle_number` varchar(250) DEFAULT NULL,
  `chasis_number` varchar(250) DEFAULT NULL,
  `form_police_station` varchar(250) DEFAULT NULL,
  `to_police_station` varchar(250) DEFAULT NULL,
  `document` varchar(250) DEFAULT NULL,
  `msg` longtext,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

/*Table structure for table `regions` */

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `regions` */

insert  into `regions`(`r_id`,`region_name`,`status`,`created_at`,`updated_at`,`created_by`) values (1,'kutpally',1,'2019-10-22 17:28:05','2019-10-22 13:50:37',3),(2,'disnagar',1,'2019-10-22 22:14:02','2019-10-22 18:44:02',1),(3,'kphp',1,'2019-10-22 16:07:26','2019-10-22 16:07:26',1),(4,'all regions',1,'2019-10-23 07:18:28','2019-10-23 07:18:28',1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` int(12) NOT NULL AUTO_INCREMENT,
  `role` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`role`,`status`,`created_at`,`updated_at`) values (1,'Super Admin',1,'2019-10-22 14:41:58','2019-10-22 14:42:00'),(2,'Admin',1,'2019-10-22 14:42:02','2019-10-22 14:42:05'),(3,'users',1,'2019-10-22 14:42:06','2019-10-22 14:42:09');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(15) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `region` text,
  `profile_pic` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`u_id`,`role_id`,`name`,`email`,`mobile_number`,`password`,`org_password`,`address`,`region`,`profile_pic`,`org_image`,`status`,`created_at`,`updated_at`,`created_by`) values (1,1,'Super admin','superadmin@gmail.com','8099010155','e10adc3949ba59abbe56e057f20f883e','123456','head officer hyd','4','','',1,'2019-10-23 07:18:58','2019-10-23 07:18:58',0),(2,2,'admin','admin@gmail.com','8099010156','e10adc3949ba59abbe56e057f20f883e','123456','hyd','1','','',1,'2019-10-23 10:41:37','2019-10-23 07:11:37',0),(3,3,'ram','ram@gmail.com','8099010155','e10adc3949ba59abbe56e057f20f883e','123456','hyderabad','1','',NULL,1,'2019-10-23 10:41:44','2019-10-23 07:11:44',2);

/*Table structure for table `vehicles` */

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `v_id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) DEFAULT NULL,
  `vehicle_number` varchar(250) DEFAULT NULL,
  `owner_name` varchar(250) DEFAULT NULL,
  `chasis_number` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `ps_region` varchar(250) DEFAULT NULL,
  `vehicle_type` varchar(250) DEFAULT NULL,
  `status` int(12) DEFAULT '1',
  `sloved_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vehicles` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
