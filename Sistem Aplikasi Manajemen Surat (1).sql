CREATE TABLE `surat` (
  `id` integer(13) PRIMARY KEY AUTO_INCREMENT,
  `tipe_surat` ENUM ('masuk', 'keluar', 'internal') DEFAULT "masuk",
  `nomor_surat` varchar(64),
  `tanggal_surat` datetime,
  `isi_surat` text,
  `tanggal_diterima` datetime NOT NULL DEFAULT (now()),
  `sifat_surat` ENUM ('biasa', 'rahasia') DEFAULT "biasa",
  `kecepatan_surat` ENUM ('biasa', 'segera'),
  `asal_surat` integer,
  `tujuan_surat` integer,
  `pengolah_surat` integer(4),
  `file` varchar(128),
  `status_surat` ENUM ('diterima', 'proses', 'selesai') DEFAULT "diterima",
  `penerima` integer,
  `is_deleted` boolean DEFAULT false,
  `date_deleted` datetime DEFAULT null
);

CREATE TABLE `disposisi` (
  `id` integer(13) PRIMARY KEY AUTO_INCREMENT,
  `id_surat` integer(13),
  `tanggal_disposisi` datetime NOT NULL DEFAULT (now()),
  `nama` text,
  `jabatan` varchar(128) NOT NULL,
  `disposisi` text,
  `catatan` text,
  `file` text,
  `status` boolean DEFAULT false,
  `is_deleted` boolean DEFAULT false
);

CREATE TABLE `jabatan` (
  `id` integer(3) PRIMARY KEY AUTO_INCREMENT,
  `jabatan` varchar(128),
  `parent` integer(3),
  `is_deleted` boolean DEFAULT false
);

CREATE TABLE `instansi` (
  `id` integer(6) PRIMARY KEY AUTO_INCREMENT,
  `instansi` text,
  `alamat` text,
  `is_deleted` boolean DEFAULT false
);

CREATE TABLE `settings` (
  `setting_name` varchar(64),
  `setting_value` text,
  `type` varchar(32) DEFAULT "app",
  `is_deleted` boolean DEFAULT false
);

ALTER TABLE `disposisi` ADD FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`);
