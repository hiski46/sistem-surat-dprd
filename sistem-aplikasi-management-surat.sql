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
  `tujuan_disposisi` varchar(250) DEFAULT NULL,
  `nama_instansi` text,
  `jabatan` varchar(128) DEFAULT NULL,
  `tipe_disposisi` int(3) NOT NULL DEFAULT '1',
  `disposisi` text,
  `catatan` text,
  `is_deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_surat` (`id_surat`),
  CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `disposisi` */

insert  into `disposisi`(`id`,`id_surat`,`tanggal_disposisi`,`tujuan_disposisi`,`nama_instansi`,`jabatan`,`tipe_disposisi`,`disposisi`,`catatan`,`is_deleted`) values 
(1,1,'2022-04-21 21:48:36','33','Indra Hermawan, S.H.','Seketaris',1,'Telah diterima','Sudah diterima\r\n',0),
(2,2,'2022-04-25 17:08:13',NULL,'fsdfsdf','dfsdf',1,'fsdfsdfsdf','fsdfsdfsf',0),
(3,1,'2022-04-25 17:09:21','33','gsdgdg','gdgf',1,'gdgdfg','dfgdgdfg',0),
(4,1,'2022-04-14 00:00:00','33',NULL,NULL,2,NULL,NULL,0),
(5,1,'2022-04-10 00:00:00','33',NULL,NULL,2,NULL,NULL,0),
(6,7,'2022-04-12 00:00:00','54',NULL,NULL,3,'Cras ultricies ligula sed magna dictum porta.',NULL,0),
(7,1,'2022-04-22 00:00:00','48',NULL,NULL,2,'gdfgdfg',NULL,0),
(8,16,'2022-04-22 00:00:00','2',NULL,NULL,3,'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',NULL,0),
(9,2,'2022-04-07 00:00:00','33',NULL,NULL,2,'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.',NULL,0),
(10,5,'2022-04-23 00:00:00','33',NULL,NULL,2,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.',NULL,0),
(13,7,'2022-04-27 11:29:45','34',NULL,NULL,3,'Donec sollicitudin molestie malesuada.',NULL,0),
(14,18,'2022-04-27 11:31:25','33',NULL,NULL,3,'Donec sollicitudin molestie malesuada.',NULL,0),
(15,18,'2022-04-27 11:32:22','36',NULL,NULL,2,'dgdfgd',NULL,0),
(16,18,'2022-04-27 11:34:00','34',NULL,NULL,3,'bcbcvbcvbb',NULL,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
(11,'PDAM PRINGSEWU WAY SEKAMPUNG','Jl. A.Yani No.509, Sidoharjo, Kec. Pringsewu, Kabupaten Pringsewu, Lampung',0,NULL),
(12,'xcvxcv','vxcvxcv',0,NULL),
(13,'xcvxcv5455','fdgdfgdg',0,NULL),
(14,'sfsfsff35345','gfdfgdgfd',0,NULL),
(15,'xcvxcv','bdbdfgdfg',0,NULL);

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

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
(40,'KaSubBag Pembukuan dan Verifikasi',36,0,NULL),
(48,'dsfsfs45466',47,0,NULL),
(54,'Kepala Humas',0,0,NULL),
(55,'Bagian Nganggur',33,1,'2022-04-27 02:17:26');

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
  `nomor_agenda` varchar(32) DEFAULT NULL,
  `file` text,
  `status_surat` enum('diterima','diproses','selesai') DEFAULT 'diterima',
  `penerima` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `surat` */

insert  into `surat`(`id`,`tipe_surat`,`nomor_surat`,`tanggal_surat`,`isi`,`tanggal_diterima`,`sifat_surat`,`kecepatan_surat`,`asal_surat`,`tujuan_surat`,`nomor_agenda`,`file`,`status_surat`,`penerima`,`is_deleted`,`date_deleted`) values 
(1,'masuk','B-DL.01.01/184/2022','2022-01-25 00:00:00','Pemanggilan peserta diklat Fungsional Pengangkatan Arsiparis Tingkat Ahli Angkatan 1','2022-01-26 00:00:00','rahasia','segera',4,32,NULL,NULL,'selesai',1,0,NULL),
(2,'masuk','B-AK.01.01/25/2022','2022-02-02 00:00:00','Laporan Hasil Pengawasan Kearsipan','2022-02-02 00:00:00','biasa','biasa',2,34,NULL,NULL,'selesai',1,0,NULL),
(4,'masuk','415.4/151/V.18/I/2022','2022-01-26 00:00:00','Inventarisasi Penyelenggaraan Kerjasama Daerah','2022-02-02 15:21:37','rahasia','biasa',NULL,NULL,NULL,NULL,'diterima',1,1,NULL),
(5,'masuk','045/151/V.18/I/2021','2022-02-04 00:00:00','Penyusunan Analisis Resiko','2022-02-05 15:22:35','biasa','biasa',1,32,NULL,NULL,'diproses',1,0,NULL),
(6,'masuk','041/186/V.18/IV/2022','2022-02-15 00:00:00','Undangan Menghadiri Pembukaan BimTek Pengelolaan HomeStay','2022-04-19 15:23:43','biasa','biasa',2,33,NULL,NULL,'selesai',1,1,'2022-04-25 05:55:48'),
(7,'internal','003/DPRD/04/2022','2022-04-15 00:00:00','Inventarisasi Penyelenggaraan Kerjasama Daerah','2022-04-19 00:00:00','biasa','biasa',33,34,NULL,NULL,'selesai',1,0,NULL),
(8,'internal','rgert345345','2022-04-05 00:00:00','dgfdfgd','2022-04-11 00:00:00','biasa','biasa',33,32,NULL,'7ace378b77a447e52527255189bcc1ce.png','selesai',1,0,NULL),
(11,'keluar','bchfjghj','2022-04-21 00:00:00','bcbcvb','2022-04-25 00:00:00','biasa','segera',1,33,NULL,'faaaa43bc3903d6ad8225198b02da7d9.png','diterima',1,1,'2022-04-25 06:15:29'),
(16,'keluar','B-DL.01.01/184/2023','2022-04-19 00:00:00','Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.','2022-04-14 00:00:00','rahasia','biasa',40,3,NULL,'f610e22e15ea913550e3398110f80de8.png','diterima',2,0,NULL),
(18,'masuk','B-DL.01.01/184/2022','2022-04-06 00:00:00','fgdgdgf','2022-04-07 00:00:00','biasa','biasa',2,33,NULL,'0049e7c16d89a15b0b41c18996c755fc.png','diproses',2,0,NULL),
(19,'masuk','B-DL.01.01/184/2025','2022-04-06 00:00:00','Curabitur aliquet quam id dui posuere blandit.','2022-04-13 00:00:00','rahasia','biasa',2,37,'fgdg1234','71d37f433a89503d1b4c02d578444a85.png','diterima',2,0,NULL),
(20,'masuk','800/8296/UT.01/2022','2022-04-01 00:00:00','Pendaftaran email official ASN di lingkungan Pemprov Lampung','2022-04-27 00:00:00','biasa','biasa',2,37,'6078','0b56c1bba4dece617ec1b01206f6dadf.pdf','diterima',1,0,NULL),
(21,'masuk','B-DL.01.01/184/2022','2022-03-31 00:00:00','Proin eget tortor risus.','2022-04-06 00:00:00','biasa','biasa',6,34,'fgdg1234','56a8dd12b0b26b1038b5450e3c35377b.png','diterima',2,0,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`nama_lengkap`,`nip`,`id_jabatan`,`level`,`blokir`,`lasted_login`,`is_deleted`,`date_deleted`) values 
(1,'ade','$2y$10$xPgY2dw2kCImv2JykoYTSug4/ImjmzZ4AjDD1713TO.1BEtZgFNVK','Ade Rahman, S.Kom.','123456789',33,'admin',0,'2022-04-26 15:41:28',0,NULL),
(2,'andri','$2y$10$rK1FmRohlTsq40LrLdtEauLrsNC8BcM6UrJNLZykoC6M8kDJ0PDpC','Andri Ahmad Mukarom, S.Kom., M.Ti.','987654321123',32,'admin',0,'2022-04-26 15:41:30',0,NULL),
(3,'cinda','$2y$10$oriATDnGkazaYdmEchuDCOZ1R4h3gTBh.0dnhZRggqPkDpt2AZtZy','Faeyza Armada','dfdfdf',32,'admin',0,'2022-04-26 15:41:32',1,'2022-04-23 20:28:17'),
(4,'123','$2y$10$7PVjt7izM0dzh8/rkEDizOzZYb8ImnydNcbiuDSAmctUtauZ9rnBG','sdfsdfs','dsfdsf',39,'admin',0,'2022-04-26 15:41:34',1,'2022-04-25 06:13:34'),
(5,'admin','$2y$10$8Ssr803BAa9o9mWO4JIHw.hBsXFEUGCX67fhsrBGQ9D7kkzr/Pskq','Admin','123456789',32,'admin',0,NULL,0,NULL);

/*Table structure for table `users_back` */

DROP TABLE IF EXISTS `users_back`;

CREATE TABLE `users_back` (
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

/*Data for the table `users_back` */

insert  into `users_back`(`id`,`ip_address`,`username`,`password`,`email`,`activation_selector`,`activation_code`,`forgotten_password_selector`,`forgotten_password_code`,`forgotten_password_time`,`remember_selector`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values 
(1,'127.0.0.1','administrator','$2y$10$5LnSYYCq/4HU6pB1eGVdY.sRv9R.xF0zL0CX2lMbHkd4AnrRDI3SG','admin@admin.com',NULL,'',NULL,NULL,NULL,'98e2d6f83c0097dbacaa47ea84e58c2755b56317','$2y$10$/Cuok9daVeTK.LqVe4fjjePl8h7KGTwpzEgVDHi3.fvxHA1a.7tBe',1268889823,1650662353,1,'Admin','istrator','ADMIN','0');

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
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users_back` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values 
(1,1,1),
(2,1,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
