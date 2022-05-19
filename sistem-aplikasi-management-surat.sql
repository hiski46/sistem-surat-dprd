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
  `tanggal_disposisi` datetime DEFAULT CURRENT_TIMESTAMP,
  `asal_disposisi` varchar(250) DEFAULT NULL,
  `tujuan_disposisi` varchar(250) DEFAULT NULL,
  `tipe_disposisi` int(3) NOT NULL DEFAULT '1',
  `disposisi` text,
  `is_deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_surat` (`id_surat`),
  CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `disposisi` */

insert  into `disposisi`(`id`,`id_surat`,`tanggal_disposisi`,`asal_disposisi`,`tujuan_disposisi`,`tipe_disposisi`,`disposisi`,`is_deleted`) values 
(1,1,'2022-05-10 10:30:13','40','33',3,'segera dikoordinasikan',0),
(3,8,'2022-05-14 09:25:49','40','33',2,'Nulla porttitor accumsan tincidunt. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.',0),
(5,8,'2022-05-14 09:44:19','40','34',6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.',0),
(6,9,'2022-05-17 10:48:42','40','32',2,'Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',0),
(8,8,'2022-05-17 14:04:29','40','32',2,'Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.',0),
(9,8,'2022-05-17 19:54:43','40','35',6,'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.',0),
(10,10,'2022-05-18 09:33:34','40','33',2,'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus.',0),
(12,7,'2022-05-18 10:46:22','33','33',2,'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla porttitor accumsan tincidunt.',0),
(13,7,'2022-05-18 10:46:51','33','35',2,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh.',0),
(14,7,'2022-05-18 10:47:11','35','36',2,'Pellentesque in ipsum id orci porta dapibus. Pellentesque in ipsum id orci porta dapibus.',0),
(15,12,'2022-05-18 10:48:32','33','34',2,'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',0),
(16,12,'2022-05-18 10:49:56','34','35',3,'Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat.',0),
(17,13,'2022-05-18 14:19:10','33','33',3,'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',0),
(18,13,'2022-05-18 14:20:04','33','34',4,'Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',0),
(19,13,'2022-05-18 14:20:31','34','35',7,'Curabitur aliquet quam id dui posuere blandit. Proin eget tortor risus.',0);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values 
(1,'admin','Administrator'),
(2,'members','General User');

/*Table structure for table `instansi` */

DROP TABLE IF EXISTS `instansi`;

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instansi` varchar(200) DEFAULT NULL,
  `alamat` text,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `instansi` */

insert  into `instansi`(`id`,`instansi`,`alamat`,`is_deleted`,`date_deleted`) values 
(1,'Kementerian Agama Provinsi Lampung1','Jl. Cut Mutia No.27, Gulak Galik, Teluk Betung Utara, Bandar Lampung1\r\n',1,'2022-04-23 16:35:01'),
(2,'Kementerian Agama Kota Bandar Lampung','Jl. P. Emir Moh. Noer No.81, Sumur Putri, Kec. Telukbetung Selatan, Kota Bandar Lampung',0,NULL),
(3,'Kantor Kementerian Agama Kota Metro',' Jl. Ki Arsyad No. 06, Imopuro, Kec. Metro Pusat, Kota Metro, Lampun',0,NULL),
(4,'Dinas Pendidikan dan Kebudayaan Provinsi Lampung','Jl. Drs. Warsito No.72, Sumur Putri, Kec. Tlk. Betung Utara, Kota Bandar Lampung',0,NULL),
(5,'Dinas Pendidikan & Kebudayaan Kota Bandar Lampung','Jl. Amir Hamzah, Gotong Royong, Kec. Tj. Karang Pusat, Kota Bandar Lampung',0,NULL),
(6,'Kejaksaan Negeri Lampung Tengah','Gn. Sugih, Kec. Gn. Sugih, Kabupaten Lampung Tengah, Lampung',0,NULL),
(7,'Kejaksaan Negeri Bandar Lampung','Jl. Pulau Sebesi, Sukarame, Kec. Sukarame, Kota Bandar Lampung, Lampung',0,NULL),
(8,'Ramayana Tanjung Karang','Jl. Kota Raja No.27, Gn. Sari, Engal, Kota Bandar Lampung, Lampung',0,NULL),
(9,'PDAM Way Rilau','Jl. P. Emir Moh. Noer No.11a, Sumur Putri, Kec. Tlk. Betung Utara, Kota Bandar Lampung',0,NULL),
(10,'PDAM Tirta Jasa unit waykandis','Jl. Pdam Raya I, Way Huwi, Kec. Jati Agung, Kabupaten Lampung Selatan',0,NULL),
(11,'PDAM PRINGSEWU WAY SEKAMPUNG','Jl. A.Yani No.509, Sidoharjo, Kec. Pringsewu, Kabupaten Pringsewu, Lampung',0,NULL);

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id`,`jabatan`,`parent`,`is_deleted`,`date_deleted`) values 
(32,'Kepala Bagian Umum',0,0,NULL),
(33,'KaSubBag Tata Usaha dan Kepegawaian',32,0,NULL),
(34,'KaSubBag Perlengkapan dan Aset',32,0,NULL),
(35,'KasSubBag Rumah Tangga',32,0,NULL),
(36,'Kepala Bagian Keuangan',0,0,NULL),
(37,'KaSubBag Perencanaan',36,0,NULL),
(38,'KaSubBag Pembukuan dan Verifikasi',36,0,NULL),
(39,'KasSubBag Perjalanan Dinas',36,0,NULL),
(40,'KaSubBag Pembukuan dan Verifikasi',36,0,NULL);

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

insert  into `login_attempts`(`id`,`ip_address`,`login`,`time`) values 
(16,'::1','ade',1652754391),
(17,'::1','123',1652754409);

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
  `nomor_agenda` varchar(32) DEFAULT NULL,
  `file` text,
  `status_surat` enum('diterima','diproses','selesai') DEFAULT 'diterima',
  `penerima` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `surat` */

insert  into `surat`(`id`,`tipe_surat`,`nomor_surat`,`tanggal_surat`,`isi`,`tanggal_diterima`,`sifat_surat`,`kecepatan_surat`,`asal_surat`,`tujuan_surat`,`nomor_agenda`,`file`,`status_surat`,`penerima`,`is_deleted`,`date_deleted`) values 
(1,'masuk','B-DL.01.01/184/2022','2022-04-14 00:00:00','Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.','2022-04-19 00:00:00','biasa','biasa',2,37,'AGN-00001','9780cb93417be3332015e64fec6d53ed.jpg','selesai',1,0,NULL),
(2,'keluar','B-KL.02.01/007/2022','2022-04-27 00:00:00','Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus.','2022-04-27 00:00:00','biasa','biasa',34,2,'AGN-00002','aea886a9a849d968dcbd2dedce7b040a.jpg','diterima',1,0,NULL),
(3,'internal','B-IL.01.01/009/2022','2022-04-27 00:00:00','Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta.','2022-04-27 00:00:00','biasa','segera',39,36,'AGN-00003','5608743506550b69e1529559f67cbc2e.jpg','diterima',1,0,NULL),
(4,'internal','B-IL.01.01/009/2022','2022-04-27 00:00:00','Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta.','2022-04-27 00:00:00','biasa','segera',39,36,'AGN-00003','5608743506550b69e1529559f67cbc2e.jpg','diterima',1,0,NULL),
(5,'internal','B-IL.01.01/009/2022','2022-04-27 00:00:00','Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta.','2022-04-27 00:00:00','biasa','segera',39,36,'AGN-00003','5608743506550b69e1529559f67cbc2e.jpg','diterima',1,0,NULL),
(6,'internal','B-IL.01.01/009/2022','2022-04-27 00:00:00','Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta.','2022-04-27 00:00:00','biasa','segera',39,36,'AGN-00003','5608743506550b69e1529559f67cbc2e.jpg','diterima',1,0,NULL),
(7,'masuk','B-DL.01.01/184/2022','2022-04-14 00:00:00','Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.','2022-04-19 00:00:00','biasa','biasa',1,37,'AGN-00001','9780cb93417be3332015e64fec6d53ed.jpg','selesai',1,0,NULL),
(8,'masuk','B-DL.01.01/184/2022','2022-04-14 00:00:00','Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.','2022-04-19 00:00:00','biasa','biasa',1,37,'AGN-00001','9780cb93417be3332015e64fec6d53ed.jpg','selesai',1,0,NULL),
(9,'masuk','B-DL.01.01/184/2022','2022-04-14 00:00:00','Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.','2022-04-19 00:00:00','biasa','biasa',1,37,'AGN-00001','9780cb93417be3332015e64fec6d53ed.jpg','selesai',1,0,NULL),
(10,'masuk','B-DL.01.01/184/2022','2022-04-14 00:00:00','Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.','2022-04-19 00:00:00','biasa','biasa',1,37,'AGN-00001','9780cb93417be3332015e64fec6d53ed.jpg','diproses',1,0,NULL),
(11,'internal','B-IL.01.01/009/2022','2022-04-27 00:00:00','Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta.','2022-04-27 00:00:00','biasa','segera',39,36,'AGN-00003','5608743506550b69e1529559f67cbc2e.jpg','diterima',1,0,NULL),
(12,'masuk','B-DL.01.05/184/2023','2022-06-02 00:00:00','Curabitur aliquet quam id dui posuere blandit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.','2022-05-24 00:00:00','biasa','biasa',6,37,'AGN-00008','4c001e4537a912c6d316d644b92e364c.jpg','diproses',1,0,NULL),
(13,'masuk','rgert34534578','2022-05-18 00:00:00','Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh.','2022-05-18 00:00:00','biasa','segera',2,37,'AGN-00001','000b98b17f64c1de131981f2172d4d63.jpg','diproses',1,0,NULL);

/*Table structure for table `tipe_disposisi` */

DROP TABLE IF EXISTS `tipe_disposisi`;

CREATE TABLE `tipe_disposisi` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tipe_disposisi` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tipe_disposisi` */

insert  into `tipe_disposisi`(`id`,`tipe_disposisi`) values 
(1,'Saran'),
(2,'Telaah'),
(3,'Koordinasikan'),
(4,'Menghadap'),
(5,'Wakili'),
(6,'Buat Sambutan'),
(7,'Tindak Lanjuti'),
(8,'Laporkan'),
(9,'Jawab Tertulis'),
(10,'Jadwalkan');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `nip` varchar(150) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `level` enum('admin','pegawai') DEFAULT NULL,
  `blokir` tinyint(1) DEFAULT '0',
  `lasted_login` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`nama_lengkap`,`nip`,`id_jabatan`,`level`,`blokir`,`lasted_login`,`is_deleted`,`date_deleted`) values 
(1,'ade','$2y$10$xPgY2dw2kCImv2JykoYTSug4/ImjmzZ4AjDD1713TO.1BEtZgFNVK','Ade Rahman, S.Kom.','123456789',33,'admin',0,'2022-04-26 15:41:28',0,NULL),
(2,'andri','$2y$10$4pZtib1.EjR.BARJK3YAXetLqMFImL9qM6qkqjHwPwq30XavDYsIa','Andri Ahmad Mukarom, S.Kom., M.Ti.','987654321123',32,'pegawai',0,'2022-04-26 15:41:30',1,'2022-05-17 03:59:52'),
(3,'cinda','$2y$10$oriATDnGkazaYdmEchuDCOZ1R4h3gTBh.0dnhZRggqPkDpt2AZtZy','Faeyza Armada','dfdfdf',32,'admin',0,'2022-04-26 15:41:32',1,'2022-04-23 20:28:17'),
(5,'admin','$2y$10$8Ssr803BAa9o9mWO4JIHw.hBsXFEUGCX67fhsrBGQ9D7kkzr/Pskq','Admin','123456789',32,'admin',0,NULL,0,NULL),
(6,'faeyza','$2y$10$S5Z/62pa3NvchrKKg7BlN.sC/EShp5SJD4HPT8vgMctIBtMSrs9we','Faeyza Armada','sasadasd',32,'pegawai',0,NULL,0,NULL);

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
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users_ion_auth` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values 
(1,1,1),
(2,1,2),
(3,2,2),
(4,3,2);

/*Table structure for table `users_ion_auth` */

DROP TABLE IF EXISTS `users_ion_auth`;

CREATE TABLE `users_ion_auth` (
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
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  UNIQUE KEY `uc_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `users_ion_auth` */

insert  into `users_ion_auth`(`id`,`ip_address`,`username`,`password`,`email`,`activation_selector`,`activation_code`,`forgotten_password_selector`,`forgotten_password_code`,`forgotten_password_time`,`remember_selector`,`remember_code`,`created_on`,`last_login`,`active`,`nama_lengkap`,`nip`,`jabatan_id`) values 
(1,'127.0.0.1','administrator','$2y$10$TTrBsGj7UYkjsnphuk.pweQYTyTZOnlPrRYAm5Ge3ZyjX9Dnphx/C','admin@admin.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1268889823,1652754469,1,'Admin','ADMIN',0),
(2,'::1','admin','$2y$10$XzM6zj2j9oRDTVOTebNC2uBiJ0mEgjzltvlygY/wwpunDEqObhCG2','admin@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1652498122,NULL,1,'Ade','Team Designers and Associates',1),
(3,'::1','ade','$2y$10$Q5.WabBzBJXyjAZ51C.IXusetUEFcE1oq3fyUfduej7Mg50.RPlA2','aderahman9908@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1652506304,NULL,1,'Ade','Team Designers and Associates',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
