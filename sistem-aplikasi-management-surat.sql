-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2022 at 10:26 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-aplikasi-management-surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `id_surat` int(13) DEFAULT NULL,
  `tanggal_disposisi` datetime DEFAULT NULL,
  `nama_instansi` text,
  `jabatan` varchar(128) DEFAULT NULL,
  `tipe_disposisi` int(3) NOT NULL DEFAULT '1',
  `disposisi` text,
  `catatan` text,
  `is_deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `id_surat`, `tanggal_disposisi`, `nama_instansi`, `jabatan`, `tipe_disposisi`, `disposisi`, `catatan`, `is_deleted`) VALUES
(1, 1, '2022-04-21 21:48:36', 'Indra Hermawan, S.H.', 'Seketaris', 0, 'Telah diterima', 'Sudah diterima\r\n', 0),
(2, 2, '2022-04-25 17:08:13', 'fsdfsdf', 'dfsdf', 1, 'fsdfsdfsdf', 'fsdfsdfsf', 0),
(3, 1, '2022-04-25 17:09:21', 'gsdgdg', 'gdgf', 1, 'gdgdfg', 'dfgdgdfg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'pegawai', 'Pegawai group');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `instansi` varchar(200) DEFAULT NULL,
  `alamat` text,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `instansi`, `alamat`, `is_deleted`, `date_deleted`) VALUES
(1, 'Kementerian Agama Provinsi Lampung1', 'Jl. Cut Mutia No.27, Gulak Galik, Teluk Betung Utara, Bandar Lampung1\r\n', 1, '2022-04-23 16:35:01'),
(2, 'Kementerian Agama Kota Bandar Lampung', 'Jl. P. Emir Moh. Noer No.81, Sumur Putri, Kec. Telukbetung Selatan, Kota Bandar Lampung', 0, NULL),
(3, 'Kantor Kementerian Agama Kota Metro', ' Jl. Ki Arsyad No. 06, Imopuro, Kec. Metro Pusat, Kota Metro, Lampun', 0, NULL),
(4, 'Dinas Pendidikan dan Kebudayaan Provinsi Lampung', 'Jl. Drs. Warsito No.72, Sumur Putri, Kec. Tlk. Betung Utara, Kota Bandar Lampung', 0, NULL),
(5, 'Dinas Pendidikan & Kebudayaan Kota Bandar Lampung', 'Jl. Amir Hamzah, Gotong Royong, Kec. Tj. Karang Pusat, Kota Bandar Lampung', 0, NULL),
(6, 'Kejaksaan Negeri Lampung Tengah', 'Gn. Sugih, Kec. Gn. Sugih, Kabupaten Lampung Tengah, Lampung', 0, NULL),
(7, 'Kejaksaan Negeri Bandar Lampung', 'Jl. Pulau Sebesi, Sukarame, Kec. Sukarame, Kota Bandar Lampung, Lampung', 0, NULL),
(8, 'Ramayana Tanjung Karang', 'Jl. Kota Raja No.27, Gn. Sari, Engal, Kota Bandar Lampung, Lampung', 0, NULL),
(9, 'PDAM Way Rilau', 'Jl. P. Emir Moh. Noer No.11a, Sumur Putri, Kec. Tlk. Betung Utara, Kota Bandar Lampung', 0, NULL),
(10, 'PDAM Tirta Jasa unit waykandis', 'Jl. Pdam Raya I, Way Huwi, Kec. Jati Agung, Kabupaten Lampung Selatan', 0, NULL),
(11, 'PDAM PRINGSEWU WAY SEKAMPUNG', 'Jl. A.Yani No.509, Sidoharjo, Kec. Pringsewu, Kabupaten Pringsewu, Lampung', 0, NULL),
(12, 'xcvxcv', 'vxcvxcv', 0, NULL),
(13, 'xcvxcv5455', 'fdgdfgdg', 0, NULL),
(14, 'sfsfsff35345', 'gfdfgdgfd', 0, NULL),
(15, 'xcvxcv', 'bdbdfgdfg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`, `parent`, `is_deleted`, `date_deleted`) VALUES
(32, 'Kepala Bagian Umum', 0, 0, NULL),
(33, 'KaSubBag Tata Usaha dan Kepegawaian', 32, 0, NULL),
(34, 'KaSubBag Perlengkapan dan Aset', 32, 0, NULL),
(35, 'KasSubBag Rumah Tangga', 32, 0, NULL),
(36, 'Kepala Bagian Keuangan', 0, 0, NULL),
(37, 'KaSubBag Perencanaan', 36, 0, NULL),
(38, 'KaSubBag Pembukuan dan Verifikasi', 36, 0, NULL),
(39, 'KasSubBag Perjalanan Dinas', 36, 0, NULL),
(40, 'KaSubBag Pembukuan dan Verifikasi', 36, 0, NULL),
(48, 'dsfsfs45466', 47, 0, NULL),
(54, 'Kepala Humas', 0, 0, NULL),
(55, 'Bagian Nganggur', 33, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_name` varchar(64) DEFAULT NULL,
  `setting_value` text,
  `type` varchar(32) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
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
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `tipe_surat`, `nomor_surat`, `tanggal_surat`, `isi`, `tanggal_diterima`, `sifat_surat`, `kecepatan_surat`, `asal_surat`, `tujuan_surat`, `file`, `status_surat`, `penerima`, `is_deleted`, `date_deleted`) VALUES
(1, 'masuk', 'B-DL.01.01/184/2022', '2022-01-25 00:00:00', 'Pemanggilan peserta diklat Fungsional Pengangkatan Arsiparis Tingkat Ahli Angkatan 1', '2022-01-26 00:00:00', 'biasa', 'biasa', 4, 32, NULL, 'diterima', 1, 0, NULL),
(2, 'masuk', 'B-AK.01.01/25/2022', '2022-02-02 00:00:00', 'Laporan Hasil Pengawasan Kearsipan', '2022-02-02 00:00:00', 'biasa', 'biasa', 2, 34, NULL, 'diterima', 1, 0, NULL),
(3, 'masuk', '188/0366/03/2022', '2022-01-29 00:00:00', 'Penyampaian Laporan Pembentukan Peraturan Kepala Daerah/Gubernur Tahun 2021', '2022-02-22 15:18:00', 'biasa', 'biasa', NULL, NULL, NULL, 'diproses', 1, 0, NULL),
(4, 'masuk', '415.4/151/V.18/I/2022', '2022-01-26 00:00:00', 'Inventarisasi Penyelenggaraan Kerjasama Daerah', '2022-02-02 15:21:37', 'rahasia', 'biasa', NULL, NULL, NULL, 'diterima', 1, 1, NULL),
(5, 'masuk', '045/151/V.18/I/2021', '2022-02-04 00:00:00', 'Penyusunan Analisis Resiko', '2022-02-05 15:22:35', 'biasa', 'biasa', 1, 32, NULL, 'diterima', 1, 0, NULL),
(6, 'masuk', '041/186/V.18/IV/2022', '2022-02-15 00:00:00', 'Undangan Menghadiri Pembukaan BimTek Pengelolaan HomeStay', '2022-04-19 15:23:43', 'biasa', 'biasa', 2, 33, NULL, 'selesai', 1, 1, '2022-04-25 05:55:48'),
(7, 'internal', '003/DPRD/04/2022', '2022-04-15 00:00:00', 'Inventarisasi Penyelenggaraan Kerjasama Daerah', '2022-04-19 00:00:00', 'biasa', 'biasa', 33, 34, NULL, 'diterima', 1, 0, NULL),
(8, 'internal', 'rgert345345', '2022-04-05 00:00:00', 'dgfdfgd', '2022-04-11 00:00:00', 'biasa', 'biasa', 33, 32, '7ace378b77a447e52527255189bcc1ce.png', 'diterima', 1, 0, NULL),
(9, 'masuk', 'rgert345345', '2022-04-06 00:00:00', 'adadad', '2022-04-11 00:00:00', 'rahasia', 'biasa', 1, 33, 'c29c65fd6642f37e8ec22ce5f09adb2a.png', 'diterima', 1, 1, '2022-04-25 05:55:03'),
(11, 'keluar', 'bchfjghj', '2022-04-21 00:00:00', 'bcbcvb', '2022-04-25 00:00:00', 'biasa', 'segera', 1, 33, 'faaaa43bc3903d6ad8225198b02da7d9.png', 'diterima', 1, 1, '2022-04-25 06:15:29'),
(12, 'masuk', 'rgert345345', '2022-03-29 00:00:00', 'vsfsdf', '2022-04-05 00:00:00', 'rahasia', 'biasa', 2, 36, '2da157456e10396dbd052c25ca9a6ce9.jpeg', 'diterima', 1, 1, '2022-04-25 05:58:41'),
(13, 'masuk', 'rgert345345', '2022-04-14 00:00:00', 'ggfhfgh', '2022-04-07 00:00:00', 'biasa', 'biasa', 1, 32, '80ef7799ef47bb22c4bdba7799a02539.jpeg', 'diterima', 1, 1, '2022-04-25 06:03:17'),
(14, 'masuk', 'rgert345345', '2022-04-26 00:00:00', 'jhjnhg', '2022-04-12 00:00:00', 'biasa', 'biasa', 1, 32, 'ffeae079972baa7dbf4c11f4089a162a.pdf', 'diterima', 1, 0, NULL),
(15, 'masuk', 'rgert345345', '2022-04-22 00:00:00', 'bbv', '2022-04-11 00:00:00', 'biasa', 'biasa', 1, 32, 'b8bd37d46e2d79c49d118114f75b1c70.png', 'diterima', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_disposisi`
--

CREATE TABLE `tipe_disposisi` (
  `id` int(3) NOT NULL,
  `tipe_disposisi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_disposisi`
--

INSERT INTO `tipe_disposisi` (`id`, `tipe_disposisi`) VALUES
(1, 'Saran'),
(2, 'Telaah'),
(3, 'Koordinasikan'),
(4, 'Menghadap'),
(5, 'Wakili'),
(6, 'Buat Sambutan'),
(7, 'Tindak Lanjuti'),
(8, 'Laporkan'),
(9, 'Jawab Tertulis'),
(10, 'Jadwalkan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `nip` varchar(150) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `level` enum('admin','pegawai') DEFAULT NULL,
  `blokir` tinyint(1) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `nip`, `id_jabatan`, `level`, `blokir`, `is_deleted`, `date_deleted`) VALUES
(1, 'ade', '$2y$10$oriATDnGkazaYdmEchuDCOZ1R4h3gTBh.0dnhZRggqPkDpt2AZtZy', 'Ade Rahman1', 'sdad', 33, 'admin', 0, 0, NULL),
(2, 'jabrik_007', '$2y$10$oriATDnGkazaYdmEchuDCOZ1R4h3gTBh.0dnhZRggqPkDpt2AZtZy', 'Shawn C. Graham', '353534535', 32, 'admin', 0, 0, NULL),
(3, 'cinda', '$2y$10$oriATDnGkazaYdmEchuDCOZ1R4h3gTBh.0dnhZRggqPkDpt2AZtZy', 'Faeyza Armada', 'dfdfdf', 32, 'admin', 0, 1, '2022-04-23 20:28:17'),
(4, '123', '$2y$10$7PVjt7izM0dzh8/rkEDizOzZYb8ImnydNcbiuDSAmctUtauZ9rnBG', 'sdfsdfs', 'dsfdsf', 39, 'admin', 0, 1, '2022-04-25 06:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `users_back`
--

CREATE TABLE `users_back` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_back`
--

INSERT INTO `users_back` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$5LnSYYCq/4HU6pB1eGVdY.sRv9R.xF0zL0CX2lMbHkd4AnrRDI3SG', 'admin@admin.com', NULL, '', NULL, NULL, NULL, '98e2d6f83c0097dbacaa47ea84e58c2755b56317', '$2y$10$/Cuok9daVeTK.LqVe4fjjePl8h7KGTwpzEgVDHi3.fvxHA1a.7tBe', 1268889823, 1650662353, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_disposisi`
--
ALTER TABLE `tipe_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_back`
--
ALTER TABLE `users_back`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tipe_disposisi`
--
ALTER TABLE `tipe_disposisi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_back`
--
ALTER TABLE `users_back`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users_back` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
