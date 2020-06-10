/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.28-log : Database - accionlabs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`accionlabs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `accionlabs`;

/*Table structure for table `weather_info` */

DROP TABLE IF EXISTS `weather_info`;

CREATE TABLE `weather_info` (
  `pid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` bigint(20) DEFAULT NULL,
  `timezone` int(11) DEFAULT NULL,
  `cod` int(11) DEFAULT NULL,
  `sys_country` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_sunrise` bigint(20) DEFAULT NULL,
  `sys_sunset` bigint(20) DEFAULT NULL,
  `timestamp` bigint(20) DEFAULT NULL,
  `clouds_all` int(11) DEFAULT NULL,
  `wind_speed` decimal(5,2) DEFAULT NULL,
  `wind_deg` int(11) DEFAULT NULL,
  `base` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_temp` decimal(5,2) DEFAULT NULL,
  `main_feels_like` decimal(5,2) DEFAULT NULL,
  `main_temp_min` decimal(5,2) DEFAULT NULL,
  `main_temp_max` decimal(5,2) DEFAULT NULL,
  `main_pressure` int(11) DEFAULT NULL,
  `main_humidity` int(11) DEFAULT NULL,
  `coord_lon` decimal(11,8) DEFAULT NULL,
  `coord_lat` decimal(11,8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `id` (`id`,`timestamp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `weather_info` */

insert  into `weather_info`(`pid`,`name`,`id`,`timezone`,`cod`,`sys_country`,`sys_sunrise`,`sys_sunset`,`timestamp`,`clouds_all`,`wind_speed`,`wind_deg`,`base`,`main_temp`,`main_feels_like`,`main_temp_min`,`main_temp_max`,`main_pressure`,`main_humidity`,`coord_lon`,`coord_lat`,`created_at`) values (1,'Bengaluru',1277333,19800,200,'IN',1591834985,1591881340,1591820506,40,'7.20',270,'stations','296.15','296.35','296.15','296.15',1010,100,'77.60000000','12.98000000','2020-06-11 01:55:49'),(2,'Chennai',1264527,19800,200,'IN',1591834329,1591880709,1591820771,90,'5.10',240,'stations','303.48','305.30','303.15','303.71',1001,66,'80.28000000','13.09000000','2020-06-11 02:01:48'),(3,'Mumbai',1275339,19800,200,'IN',1591835442,1591883163,1591820706,75,'3.70',261,'stations','303.15','308.28','303.15','303.15',1004,84,'72.85000000','19.01000000','2020-06-11 02:02:02'),(4,'New Delhi',1261481,19800,200,'IN',1591833168,1591883335,1591821131,40,'1.73',100,'stations','305.51','310.83','303.15','308.15',1000,66,'77.23000000','28.61000000','2020-06-11 02:02:08'),(5,'Karnataka',1267701,19800,200,'IN',1591835312,1591881781,1591821013,100,'2.14',260,'stations','296.41','297.96','296.41','296.41',1007,75,'76.00000000','13.50000000','2020-06-11 02:02:27'),(6,'Kerala',1267254,19800,200,'IN',1591835570,1591881282,1591821178,75,'0.48',29,'stations','299.15','304.55','299.15','299.15',1007,88,'76.50000000','10.00000000','2020-06-11 02:02:31'),(7,'Agra',1279259,19800,200,'IN',1591833175,1591882948,1591820916,0,'1.10',22,'stations','310.01','309.13','310.01','310.01',997,19,'78.02000000','27.18000000','2020-06-11 02:02:42'),(8,'Gujarat',1270770,19800,200,'IN',1591835163,1591883850,1591821210,90,'2.60',240,'stations','298.15','302.75','298.15','298.15',1003,100,'72.00000000','23.00000000','2020-06-11 02:03:02'),(9,'Simla',1275004,19800,200,'IN',1591831283,1591879867,1591821227,40,'3.88',96,'stations','302.15','307.16','302.15','302.15',1000,89,'88.38000000','22.59000000','2020-06-11 02:03:19'),(10,'Pune',1259229,19800,200,'IN',1591835257,1591882863,1591821258,100,'3.88',256,'stations','297.80','299.15','297.80','297.80',1005,79,'73.86000000','18.52000000','2020-06-11 02:04:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
