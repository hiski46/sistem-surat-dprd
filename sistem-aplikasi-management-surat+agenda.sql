-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 03:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `agenda` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `detail` text NOT NULL,
  `is_rapat` tinyint(1) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `agenda`, `tanggal`, `detail`, `is_rapat`, `data`, `is_deleted`) VALUES
(1, 'Rapat', '2022-07-21 11:43:13', 'Akan diadakan Rapat', 1, '{}', 1),
(2, 'Rapat Coy', '0000-00-00 00:00:00', 'asdsada', 1, '\"40a529896e51e7614ad56b5e48f54e73.PNG\"', NULL),
(3, 'adasdas', '0000-00-00 00:00:00', 'asdsadsad', 1, '\"92352d29c42efbad21a13735f963f858.PNG\"', NULL),
(4, 'Rapat Coy', '2022-07-06 16:24:00', 'asdsad', 1, '\"9c5ca91f66d35bd60ca321ef5f39652c.PNG\"', NULL),
(5, 'Kunjungan', '2022-07-06 19:00:00', 'Kunjungan ke kampung', 0, '\"\"', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `id_surat` int(13) DEFAULT NULL,
  `tanggal_disposisi` datetime DEFAULT current_timestamp(),
  `sifat_disposisi` enum('rutin','penting','rahasia') DEFAULT 'rutin',
  `asal_disposisi` varchar(250) DEFAULT NULL,
  `tujuan_disposisi` varchar(250) DEFAULT NULL,
  `tipe_disposisi` int(3) NOT NULL DEFAULT 1,
  `disposisi` text DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `id_surat`, `tanggal_disposisi`, `sifat_disposisi`, `asal_disposisi`, `tujuan_disposisi`, `tipe_disposisi`, `disposisi`, `is_deleted`) VALUES
(40, 2, '2022-05-23 18:06:09', 'penting', '33', '2', 2, 'fgfhjkjk', 0),
(41, 2, '2022-05-23 18:06:40', 'penting', '2', '3', 2, 'vcbnm,m', 0),
(42, 15, '2022-05-24 15:39:30', 'rahasia', '33', '2', 7, 'hfghfghyt', 0),
(43, 15, '2022-05-24 15:39:43', 'rutin', '33', '3', 6, 'hfghfgh', 0),
(44, 13, '2022-05-24 15:40:04', 'rutin', '33', '33', 6, 'asdadasd', 0),
(45, 13, '2022-05-24 15:40:20', 'penting', '33', '35', 5, 'adadasd', 0),
(46, 17, '2022-06-24 10:57:08', 'rahasia', '33', '34', 3, 'Mohon Koordinasikan untuk pemeliharaan aset', 0),
(47, 19, '2022-06-24 11:08:54', 'penting', '33', '36', 7, 'pemeriksaan status tunjangan kinerja pegawai yang tertera', 0),
(48, 13, '2022-06-25 11:11:18', 'rutin', '35', '34', 5, 'fdguyiui', 0),
(49, 20, '2022-06-25 13:41:34', 'penting', '33', '33', 6, 'styuijjhho', 0),
(50, 20, '2022-06-25 13:41:56', 'rutin', '33', '35', 5, 'fdxcfuyuijij', 0),
(51, 21, '2022-06-28 23:12:14', 'rutin', '33', '35', 3, 'Mohon koordinasikan terkait perintah surat', 0),
(52, 21, '2022-06-28 23:14:48', 'penting', '35', '33', 4, 'gfhjkjl', 0),
(53, 22, '2022-06-29 07:15:59', 'rutin', '33', '32', 3, 'Siap', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` varchar(100) NOT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `topik_forum` varchar(255) DEFAULT NULL,
  `jenis_forum` enum('group','private') DEFAULT NULL,
  `pembahasan_forum` text DEFAULT NULL,
  `pembuat_forum` int(11) DEFAULT NULL,
  `anggota_forum` text DEFAULT NULL,
  `status` enum('open','closed') DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_forum`, `id_surat`, `topik_forum`, `jenis_forum`, `pembahasan_forum`, `pembuat_forum`, `anggota_forum`, `status`, `created_at`, `updated_at`) VALUES
('FR-00001', 21, 'Lorem Ipsum 346', 'private', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat.', 1, '[\"3\"]', 'open', '2022-06-29 01:28:28', '2022-07-01 02:27:35'),
('FR-00002', 21, 'Lorem Ipsum', 'group', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat.', 1, '[\"3\",\"5\"]', 'open', '2022-06-29 02:49:44', '2022-07-01 02:01:16'),
('FR-00003', 21, 'Lorem Ipsum', 'group', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat.', 1, '[\"3\",\"5\"]', 'open', '2022-06-29 02:50:07', '2022-07-01 02:01:16'),
('FR-00004', 21, 'Lorem Ipsum', 'group', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat.', 1, '[\"3\",\"5\"]', 'closed', '2022-06-29 23:04:42', '2022-07-01 02:01:16'),
('FR-00005', 21, 'Lorem Ipsum dolor', 'group', 'Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, '[\"1\",\"3\"]', 'open', '2022-07-01 02:46:23', NULL);

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
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `instansi` varchar(200) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
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
(11, 'PDAM PRINGSEWU WAY SEKAMPUNG', 'Jl. A.Yani No.509, Sidoharjo, Kec. Pringsewu, Kabupaten Pringsewu, Lampung', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `isi_forum`
--

CREATE TABLE `isi_forum` (
  `id` int(11) NOT NULL,
  `id_forum` varchar(100) DEFAULT NULL,
  `id_anggota_forum` int(11) DEFAULT NULL,
  `isi_forum` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_forum`
--

INSERT INTO `isi_forum` (`id`, `id_forum`, `id_anggota_forum`, `isi_forum`, `created_at`, `updated_at`) VALUES
(1, 'FR-00001', 2, 'fsdfsfdsf\r\n', '2022-06-30 13:29:02', NULL),
(2, 'FR-00001', 3, 'dfgdsgfdgdfgkjlk', '2022-06-30 13:30:24', NULL),
(3, 'FR-00001', 5, 'asdadsadasd', '2022-06-30 13:30:43', NULL),
(4, 'FR-00001', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', '2022-06-30 07:57:43', NULL),
(5, 'FR-00001', 1, 'Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt.', '2022-06-30 07:58:11', NULL),
(6, 'FR-00001', 1, 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', '2022-06-30 13:30:43', NULL),
(7, 'FR-00001', 1, 'Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt.', '2022-06-30 15:01:22', NULL),
(8, 'FR-00002', 1, 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat.', '2022-06-30 16:09:26', NULL),
(9, 'FR-00002', 1, 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.', '2022-06-30 16:26:02', NULL),
(10, 'FR-00003', 1, 'Nulla porttitor accumsan tincidunt. Nulla porttitor accumsan tincidunt.', '2022-06-30 16:28:08', NULL),
(11, 'FR-00003', 1, 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.', '2022-06-30 16:28:38', NULL),
(12, 'FR-00004', 1, 'rytfyguhklkhjgfytuyu', '2022-06-30 16:45:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
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
(40, 'KaSubBag Pembukuan dan Verifikasi', 36, 0, NULL);

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

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(16, '::1', 'ade', 1652754391),
(17, '::1', '123', 1652754409);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `read_status` tinyint(1) DEFAULT 1,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `from`, `to`, `id_surat`, `read_status`, `time`) VALUES
(1, 39, 38, 13, 0, '2022-05-23 13:58:27'),
(2, 38, 37, 13, 0, '2022-05-23 14:10:45'),
(3, 33, 33, 16, 0, '2022-05-23 17:38:10'),
(4, 33, 34, 16, 0, '2022-05-23 17:38:34'),
(5, 9, 10, 2, 1, '2022-05-23 17:42:31'),
(6, 10, 8, 2, 1, '2022-05-23 17:55:38'),
(7, 8, 11, 2, 1, '2022-05-23 17:57:43'),
(8, 33, 2, 2, 1, '2022-05-23 18:06:09'),
(9, 2, 3, 2, 1, '2022-05-23 18:06:40'),
(10, 33, 2, 15, 1, '2022-05-24 15:39:30'),
(11, 33, 3, 15, 1, '2022-05-24 15:39:43'),
(12, 33, 33, 13, 0, '2022-05-24 15:40:04'),
(13, 33, 35, 13, 1, '2022-05-24 15:40:20'),
(14, 33, 34, 17, 1, '2022-06-24 10:57:08'),
(15, 33, 36, 19, 1, '2022-06-24 11:08:54'),
(16, 35, 34, 13, 1, '2022-06-25 11:11:18'),
(17, 33, 33, 20, 1, '2022-06-25 13:41:34'),
(18, 33, 35, 20, 1, '2022-06-25 13:41:56'),
(19, 33, 35, 21, 1, '2022-06-28 23:12:14'),
(20, 35, 33, 21, 1, '2022-06-28 23:14:48'),
(21, 33, 32, 22, 0, '2022-06-29 07:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_name` varchar(64) DEFAULT NULL,
  `setting_value` text DEFAULT NULL,
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
  `nomor_surat` text DEFAULT NULL,
  `tanggal_surat` datetime DEFAULT current_timestamp(),
  `isi` text DEFAULT NULL,
  `tanggal_diterima` datetime DEFAULT current_timestamp(),
  `sifat_surat` enum('biasa','rahasia') DEFAULT 'biasa',
  `kecepatan_surat` enum('biasa','segera') DEFAULT 'biasa',
  `asal_surat` int(11) DEFAULT NULL,
  `tujuan_surat` int(11) DEFAULT NULL,
  `nomor_agenda` varchar(32) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `status_surat` enum('diterima','diproses','selesai') DEFAULT 'diterima',
  `penerima` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `tipe_surat`, `nomor_surat`, `tanggal_surat`, `isi`, `tanggal_diterima`, `sifat_surat`, `kecepatan_surat`, `asal_surat`, `tujuan_surat`, `nomor_agenda`, `file`, `status_surat`, `penerima`, `is_deleted`, `date_deleted`) VALUES
(1, 'masuk', 'B-DL.01.01/184/2022', '2022-04-14 00:00:00', 'Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.', '2021-02-01 00:00:00', 'biasa', 'biasa', 2, 37, 'AGN-00001', '9780cb93417be3332015e64fec6d53ed.jpg', 'selesai', 1, 0, NULL),
(2, 'keluar', 'B-KL.02.01/007/2022', '2022-04-27 00:00:00', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus.', '2022-02-08 00:00:00', 'biasa', 'biasa', 34, 2, 'AGN-00002', 'aea886a9a849d968dcbd2dedce7b040a.jpg', 'diproses', 1, 0, NULL),
(7, 'masuk', 'B-DL.01.01/184/2022', '2022-04-14 00:00:00', 'Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.', '2022-08-18 00:00:00', 'biasa', 'biasa', 1, 37, 'AGN-00001', '9780cb93417be3332015e64fec6d53ed.jpg', 'selesai', 1, 0, NULL),
(12, 'masuk', 'B-DL.01.05/184/2023', '2022-06-02 00:00:00', 'Curabitur aliquet quam id dui posuere blandit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.', '2022-05-24 00:00:00', 'biasa', 'biasa', 6, 37, 'AGN-00008', '4c001e4537a912c6d316d644b92e364c.jpg', 'diproses', 1, 0, NULL),
(13, 'masuk', 'rgert34534578', '2022-05-18 00:00:00', 'Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh.', '2022-12-10 00:00:00', 'biasa', 'segera', 2, 37, 'AGN-00001', '000b98b17f64c1de131981f2172d4d63.jpg', 'selesai', 1, 0, NULL),
(14, 'masuk', 'B-DL.01.01/184/202245', '2022-05-12 00:00:00', 'Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta.', '2022-05-08 00:00:00', 'biasa', 'biasa', 2, 33, 'AGN-00001', '5bcd5c5a387d13f33b0fa76be31ffea7.pdf', 'diproses', 1, 0, NULL),
(15, 'keluar', 'B-DL.01.01/184/20224509', '2022-05-25 00:00:00', 'Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta.', '2022-05-04 00:00:00', 'biasa', 'biasa', 33, 5, 'AGN-00009', 'd6f0c2d85ee757224884c6c6264ec4fb.jpg', 'diproses', 1, 0, NULL),
(16, 'internal', 'B-DL.01.01/184/20224578', '2022-05-09 00:00:00', 'dfgdfgdgv ds', '2022-05-16 00:00:00', 'biasa', 'biasa', 34, 34, 'AGN-00010', '8a1799dcd9d7a0cd37ff6f1a1aa270ee.jpg', 'diproses', 1, 0, NULL),
(17, 'internal', 'rgert345367', '2022-06-24 00:00:00', 'Surat pemeliharaan aset', '2022-06-24 00:00:00', 'rahasia', 'segera', 33, 34, 'AGN-00011', '9bfff2b9a863dd68ff3245ba1757ea93.pdf', 'diproses', 1, 0, NULL),
(18, 'keluar', 'rgert3453908', '2022-06-22 00:00:00', 'Koordinasi', '2022-06-24 00:00:00', 'rahasia', 'biasa', 33, 3, 'AGN-00012', '5d78dc3695d7305c599df12af8ba5646.pdf', 'diterima', 1, 0, NULL),
(19, 'masuk', 'B-DL.01.01/184/20245', '2022-06-22 00:00:00', 'Koordinasikan beberapa pegawai bermasalah', '2022-06-24 00:00:00', 'rahasia', 'segera', 6, 33, 'AGN-00013', 'd50b92360a95a17fcc4733fbafd938d2.pdf', 'diproses', 1, 0, NULL),
(20, 'keluar', 'B-DL.01.01/184/2022789', '2022-06-15 00:00:00', 'gfglnkjiu', '2022-06-25 00:00:00', 'biasa', 'biasa', 34, 2, 'AGN-00014', '54809c1970bcfa78c6db6a7757cd5e8c.pdf', 'diproses', 1, 0, NULL),
(21, 'masuk', 'B-DL.01.01/187/2022', '2022-06-14 00:00:00', 'Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit.', '2022-06-28 00:00:00', 'biasa', 'biasa', 3, 33, 'AGN-00015', 'fdb38b0bd2cdbcbca94be886398986de.jpeg', 'diproses', 1, 0, NULL),
(22, 'keluar', 'B-DL.01.01/184/2028', '2022-06-21 00:00:00', 'dghjkl', '2022-06-28 00:00:00', 'rahasia', 'biasa', 33, 6, 'AGN-00016', 'bc42ea288bc6f55e16d50758ef4e2cfb.jpeg', 'selesai', 1, 0, NULL),
(23, 'masuk', 'B-DL.01.01/184/2029', '2022-07-05 00:00:00', 'ykjk.', '2022-07-15 00:00:00', 'biasa', 'segera', 5, 35, 'AGN-00017', '9d0ef74f86e195a78f06a077f4824611.pdf', 'diterima', 1, 0, NULL);

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
  `blokir` tinyint(1) DEFAULT 0,
  `lasted_login` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `nip`, `id_jabatan`, `level`, `blokir`, `lasted_login`, `is_deleted`, `date_deleted`) VALUES
(1, 'ade', '$2y$10$xPgY2dw2kCImv2JykoYTSug4/ImjmzZ4AjDD1713TO.1BEtZgFNVK', 'Ade Rahman, S.Kom.', '123456789', 33, 'admin', 0, '2022-04-26 15:41:28', 0, NULL),
(2, 'andri', '$2y$10$4pZtib1.EjR.BARJK3YAXetLqMFImL9qM6qkqjHwPwq30XavDYsIa', 'Andri Ahmad Mukarom, S.Kom., M.Ti.', '987654321123', 32, 'pegawai', 0, '2022-04-26 15:41:30', 1, '2022-05-17 03:59:52'),
(3, 'cinda', '$2y$10$oriATDnGkazaYdmEchuDCOZ1R4h3gTBh.0dnhZRggqPkDpt2AZtZy', 'Faeyza Armada', 'dfdfdf', 32, 'admin', 0, '2022-04-26 15:41:32', 1, '2022-04-23 20:28:17'),
(5, 'admin', '$2y$10$8Ssr803BAa9o9mWO4JIHw.hBsXFEUGCX67fhsrBGQ9D7kkzr/Pskq', 'Admin', '123456789', 32, 'admin', 0, NULL, 0, NULL),
(6, 'faeyza', '$2y$10$S5Z/62pa3NvchrKKg7BlN.sC/EShp5SJD4HPT8vgMctIBtMSrs9we', 'Faeyza Armada', 'sasadasd', 32, 'pegawai', 0, NULL, 0, NULL);

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
(2, 1, 2),
(3, 2, 2),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_ion_auth`
--

CREATE TABLE `users_ion_auth` (
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
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_ion_auth`
--

INSERT INTO `users_ion_auth` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `nama_lengkap`, `nip`, `jabatan_id`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$TTrBsGj7UYkjsnphuk.pweQYTyTZOnlPrRYAm5Ge3ZyjX9Dnphx/C', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1652754469, 1, 'Admin', 'ADMIN', 0),
(2, '::1', 'admin', '$2y$10$XzM6zj2j9oRDTVOTebNC2uBiJ0mEgjzltvlygY/wwpunDEqObhCG2', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1652498122, NULL, 1, 'Ade', 'Team Designers and Associates', 1),
(3, '::1', 'ade', '$2y$10$Q5.WabBzBJXyjAZ51C.IXusetUEFcE1oq3fyUfduej7Mg50.RPlA2', 'aderahman9908@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1652506304, NULL, 1, 'Ade', 'Team Designers and Associates', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`);

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
-- Indexes for table `isi_forum`
--
ALTER TABLE `isi_forum`
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
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
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
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_ion_auth`
--
ALTER TABLE `users_ion_auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `uc_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `isi_forum`
--
ALTER TABLE `isi_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tipe_disposisi`
--
ALTER TABLE `tipe_disposisi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_ion_auth`
--
ALTER TABLE `users_ion_auth`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users_ion_auth` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
