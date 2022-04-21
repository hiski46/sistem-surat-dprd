/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 5.7.33 : Database - sistem-aplikasi-management-surat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sistem-aplikasi-management-surat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sistem-aplikasi-management-surat`;

/*Table structure for table `disposisi` */

DROP TABLE IF EXISTS `disposisi`;

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(13) DEFAULT NULL,
  `tanggal_disposisi` datetime DEFAULT NULL,
  `nama_instansi` text,
  `jabatan` varchar(128) DEFAULT NULL,
  `disposisi` text,
  `catatan` text,
  `is_deleted` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_surat` (`id_surat`),
  CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `disposisi` */

insert  into `disposisi`(`id`,`id_surat`,`tanggal_disposisi`,`nama_instansi`,`jabatan`,`disposisi`,`catatan`,`is_deleted`) values 
(1,1,'2022-04-21 21:48:36','Indra Hermawan, S.H.','Seketaris','Telah diterima','Sudah diterima\r\n',0);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values 
(1,'admin','Administrator'),
(2,'members','General User'),
(3,'pegawai','Pegawai group');

/*Table structure for table `instansi` */

DROP TABLE IF EXISTS `instansi`;

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instansi` varchar(200) DEFAULT NULL,
  `alamat` text,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `instansi` */

insert  into `instansi`(`id`,`instansi`,`alamat`,`is_deleted`,`date_deleted`) values 
(1,'Kemenag','lbjhbajnasjhdbfad\r\n',0,NULL);

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id`,`jabatan`,`parent`) values 
(32,'Istimewa 123',0),
(33,'qwqwe',32),
(34,'asdasd',32),
(35,'adasd',33),
(36,'adada',1),
(37,'zczxcz',34);

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `setting_name` varchar(64) DEFAULT NULL,
  `setting_value` text,
  `type` varchar(32) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `setting` */

/*Table structure for table `surat` */

DROP TABLE IF EXISTS `surat`;

CREATE TABLE `surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_surat` enum('masuk','keluar','internal') DEFAULT 'masuk',
  `nomor_surat` text,
  `tanggal_surat` datetime DEFAULT CURRENT_TIMESTAMP,
  `isi` text,
  `tanggal_diterima` datetime DEFAULT CURRENT_TIMESTAMP,
  `sifat_surat` enum('biasa','rahasia') DEFAULT 'biasa',
  `kecepatan_surat` enum('biasa','segera') DEFAULT 'biasa',
  `asal_surat` int(11) DEFAULT NULL,
  `tujuan_surat` int(11) DEFAULT NULL,
  `file` text,
  `status_surat` enum('diterima','diproses','selesai') DEFAULT 'diterima',
  `penerima` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `surat` */

insert  into `surat`(`id`,`tipe_surat`,`nomor_surat`,`tanggal_surat`,`isi`,`tanggal_diterima`,`sifat_surat`,`kecepatan_surat`,`asal_surat`,`tujuan_surat`,`file`,`status_surat`,`penerima`,`is_deleted`,`date_deleted`) values 
(1,'masuk','21321321321','2022-04-17 00:00:00','Surat ketua','2022-04-18 00:00:00','biasa','biasa',NULL,NULL,NULL,NULL,NULL,0,NULL),
(2,'masuk','3434323qw','2022-04-18 16:41:33','assadsadsadsadsa','2022-04-18 16:41:33','biasa','biasa',NULL,NULL,NULL,'diterima',NULL,0,NULL),
(3,'masuk','001/DPR/04/2022','2022-04-19 00:00:00',NULL,'2022-04-19 15:18:00','biasa','biasa',NULL,NULL,NULL,'diterima',NULL,0,NULL),
(4,'masuk','002/DPRD/04/2022','2022-04-17 00:00:00','Pemanggilan peserta diklat','2022-04-19 15:21:37','rahasia','biasa',NULL,NULL,NULL,'diterima',NULL,1,NULL),
(5,'keluar','002/DPRD/04/2022','2022-04-17 00:00:00','Pemanggilan peserta diklat','2022-04-19 15:22:35','rahasia','biasa',NULL,NULL,NULL,'diterima',NULL,0,NULL),
(6,'keluar','003/DPRD/04/2022','2022-04-15 00:00:00','Pemanggilan peserta diklat','2022-04-19 15:23:43','biasa','biasa',NULL,NULL,NULL,'diterima',NULL,0,NULL),
(7,'internal','003/DPRD/04/2022','2022-04-15 00:00:00','Inventarisasi Penyelenggaraan Kerjasama Daerah','2022-04-19 15:28:49','biasa','biasa',NULL,NULL,NULL,'diterima',NULL,0,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`email`,`activation_selector`,`activation_code`,`forgotten_password_selector`,`forgotten_password_code`,`forgotten_password_time`,`remember_selector`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values 
(1,'127.0.0.1','administrator','$2y$10$5LnSYYCq/4HU6pB1eGVdY.sRv9R.xF0zL0CX2lMbHkd4AnrRDI3SG','admin@admin.com',NULL,'',NULL,NULL,NULL,'bb54ed43590a15c5b029537c692a0db0cf4187cd','$2y$10$kpdZOPrYZ5g5lBZiPQfzTO6L1hVpq0iHj5hmTjQrHf3f5Sr5YE8ea',1268889823,1650549632,1,'Admin','istrator','ADMIN','0');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values 
(1,1,1),
(2,1,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
