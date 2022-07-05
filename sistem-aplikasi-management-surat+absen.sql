-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sistem-aplikasi-management-surat
CREATE DATABASE IF NOT EXISTS `sistem-aplikasi-management-surat` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistem-aplikasi-management-surat`;

-- Dumping structure for table sistem-aplikasi-management-surat.absen
CREATE TABLE IF NOT EXISTS `absen` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `absensi` enum('hadir','izin','absen') DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `detail` text NOT NULL,
  `is_rapat` tinyint(1) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.disposisi
CREATE TABLE IF NOT EXISTS `disposisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(13) DEFAULT NULL,
  `tanggal_disposisi` datetime DEFAULT CURRENT_TIMESTAMP,
  `sifat_disposisi` enum('rutin','penting','rahasia') DEFAULT 'rutin',
  `asal_disposisi` varchar(250) DEFAULT NULL,
  `tujuan_disposisi` varchar(250) DEFAULT NULL,
  `tipe_disposisi` int(3) NOT NULL DEFAULT '1',
  `disposisi` text,
  `is_deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_surat` (`id_surat`),
  CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `id_forum` varchar(100) NOT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `topik_forum` varchar(255) DEFAULT NULL,
  `jenis_forum` enum('group','private') DEFAULT NULL,
  `pembahasan_forum` text,
  `pembuat_forum` int(11) DEFAULT NULL,
  `anggota_forum` text,
  `status` enum('open','closed') DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.instansi
CREATE TABLE IF NOT EXISTS `instansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instansi` varchar(200) DEFAULT NULL,
  `alamat` text,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.isi_forum
CREATE TABLE IF NOT EXISTS `isi_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` varchar(100) DEFAULT NULL,
  `id_anggota_forum` int(11) DEFAULT NULL,
  `isi_forum` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.notifikasi
CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `read_status` tinyint(1) DEFAULT '1',
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `setting_name` varchar(64) DEFAULT NULL,
  `setting_value` text,
  `type` varchar(32) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.surat
CREATE TABLE IF NOT EXISTS `surat` (
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.tipe_disposisi
CREATE TABLE IF NOT EXISTS `tipe_disposisi` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tipe_disposisi` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.users
CREATE TABLE IF NOT EXISTS `users` (
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

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
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

-- Data exporting was unselected.

-- Dumping structure for table sistem-aplikasi-management-surat.users_ion_auth
CREATE TABLE IF NOT EXISTS `users_ion_auth` (
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

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
