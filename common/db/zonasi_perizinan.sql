# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.26)
# Database: ptspdki_db
# Generation Time: 2015-10-06 09:34:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table perizinan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `perizinan`;

CREATE TABLE `perizinan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_registrasi` char(6) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `pemohon_id` int(11) NOT NULL,
  `referrer_id` int(11) NOT NULL,
  `id_groupizin` int(11) DEFAULT NULL,
  `izin_id` int(11) NOT NULL,
  `status_izin` enum('Baru','Perpanjangan','Perubahan') DEFAULT NULL,
  `jumlah_tahap` int(11) NOT NULL,
  `no_urut` int(7) NOT NULL,
  `tanggal_mohon` datetime NOT NULL,
  `no_izin` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `berkas_noizin` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_izin` datetime DEFAULT NULL,
  `tanggal_expired` datetime DEFAULT NULL,
  `status` enum('Daftar','Proses','Tolak','Revisi','Lanjut','Selesai','Batal','Verifikasi') CHARACTER SET latin1 DEFAULT 'Daftar',
  `aktif` enum('Y','N') CHARACTER SET latin1 DEFAULT 'Y',
  `registrasi_urutan` enum('Closed','Open') CHARACTER SET latin1 DEFAULT 'Closed',
  `nomor_sp_rt_rw` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_sp_rt_rw` date DEFAULT NULL,
  `peruntukan` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_cek_lapangan` date DEFAULT NULL,
  `petugas_cek` varchar(100) DEFAULT NULL,
  `petugas_daftar_id` int(11) DEFAULT NULL,
  `lokasi_izin_id` int(11) DEFAULT NULL,
  `lokasi_pengambilan_id` int(11) DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1,
  `qr_code` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_pertemuan` date DEFAULT NULL,
  `status_daftar` enum('Sendiri','Petugas') CHARACTER SET latin1 DEFAULT NULL,
  `pengambilan_tanggal` date DEFAULT NULL,
  `pengambilan_sesi` enum('Sesi I','Sesi II','Sesi III') DEFAULT NULL,
  `pengambil_nik` char(16) DEFAULT NULL,
  `pengambil_nama` varchar(50) DEFAULT NULL,
  `pengambil_telepon` varchar(12) DEFAULT NULL,
  `zonasi_id` int(11) DEFAULT NULL,
  `zonasi_sesuai` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_registrasi` (`kode_registrasi`),
  KEY `id_bidang` (`izin_id`),
  KEY `status` (`status`),
  KEY `aktif` (`aktif`),
  KEY `FK_registrasi_registrasi` (`parent_id`),
  KEY `FK_perizinan_user` (`pemohon_id`),
  KEY `FK_perizinan_user_2` (`petugas_daftar_id`),
  KEY `FK_perizinan_lokasi` (`lokasi_pengambilan_id`),
  KEY `lokasi_izin_id` (`lokasi_izin_id`),
  KEY `zonasi_id` (`zonasi_id`),
  CONSTRAINT `FK_perizinan_user` FOREIGN KEY (`pemohon_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_perizinan_user_2` FOREIGN KEY (`petugas_daftar_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_registrasi_izin` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_registrasi_registrasi` FOREIGN KEY (`parent_id`) REFERENCES `perizinan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perizinan_ibfk_1` FOREIGN KEY (`lokasi_izin_id`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perizinan_ibfk_2` FOREIGN KEY (`lokasi_pengambilan_id`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perizinan_ibfk_3` FOREIGN KEY (`zonasi_id`) REFERENCES `zonasi` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `perizinan` WRITE;
/*!40000 ALTER TABLE `perizinan` DISABLE KEYS */;

INSERT INTO `perizinan` (`id`, `kode_registrasi`, `parent_id`, `pemohon_id`, `referrer_id`, `id_groupizin`, `izin_id`, `status_izin`, `jumlah_tahap`, `no_urut`, `tanggal_mohon`, `no_izin`, `berkas_noizin`, `tanggal_izin`, `tanggal_expired`, `status`, `aktif`, `registrasi_urutan`, `nomor_sp_rt_rw`, `tanggal_sp_rt_rw`, `peruntukan`, `nama_perusahaan`, `tanggal_cek_lapangan`, `petugas_cek`, `petugas_daftar_id`, `lokasi_izin_id`, `lokasi_pengambilan_id`, `keterangan`, `qr_code`, `tanggal_pertemuan`, `status_daftar`, `pengambilan_tanggal`, `pengambilan_sesi`, `pengambil_nik`, `pengambil_nama`, `pengambil_telepon`, `zonasi_id`, `zonasi_sesuai`)
VALUES
	(11,'11',NULL,3,16,NULL,626,NULL,6,1,'2015-09-09 18:43:58',NULL,NULL,NULL,NULL,'Daftar','Y','Closed',NULL,NULL,NULL,NULL,NULL,NULL,NULL,134,145,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(12,'aOHg9N',NULL,3,17,NULL,621,NULL,6,1,'2015-09-09 19:44:06','1/24.1PM.7/31.71/-1.824.27/2015',NULL,'2015-09-16 14:50:51',NULL,'Tolak','Y','Closed',NULL,NULL,NULL,NULL,NULL,NULL,NULL,134,134,NULL,'aOHg9N',NULL,NULL,'2015-09-09','Sesi I',NULL,NULL,NULL,NULL,NULL),
	(13,'0bXpZW',NULL,3,20,NULL,621,'Baru',6,1,'2015-09-22 20:30:02','1/24.1PM.7/31.71/-1.824.27/2015',NULL,'2015-10-01 02:38:18',NULL,'Selesai','Y','Closed',NULL,NULL,NULL,NULL,NULL,NULL,NULL,134,134,'ok','0bXpZW',NULL,NULL,'2015-10-14','Sesi I',NULL,NULL,NULL,NULL,NULL),
	(17,'4QP2RZ',NULL,3,0,NULL,619,'Baru',6,1,'2015-10-01 22:56:35',NULL,NULL,NULL,NULL,'Lanjut','Y','Closed',NULL,NULL,NULL,NULL,NULL,NULL,NULL,134,134,NULL,NULL,NULL,NULL,'2015-10-14','Sesi II',NULL,NULL,NULL,NULL,NULL),
	(19,'EU0B12',NULL,3,26,NULL,619,'Baru',6,1,'2015-10-01 23:17:00',NULL,NULL,NULL,NULL,'Selesai','Y','Closed',NULL,NULL,NULL,NULL,NULL,NULL,NULL,134,134,'ok',NULL,NULL,NULL,'2015-10-14','Sesi I','1234','aman','08113',39,'N');

/*!40000 ALTER TABLE `perizinan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table zonasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zonasi`;

CREATE TABLE `zonasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL DEFAULT '',
  `zonasi` varchar(50) NOT NULL DEFAULT '',
  `rdtr` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `zonasi` WRITE;
/*!40000 ALTER TABLE `zonasi` DISABLE KEYS */;

INSERT INTO `zonasi` (`id`, `kode`, `zonasi`, `rdtr`)
VALUES
	(1,'L.1 ','SUB ZONA SUAKA DAN PELESTARIAN ALAM ','ZONA LINDUNG '),
	(2,'L.2 ','SUB ZONA SEMPADAN LINDUNG ','ZONA LINDUNG '),
	(3,'L.3 ','SUB ZONA INTI KONSERVASI PULAU ','ZONA LINDUNG '),
	(4,'H.1 ','SUB ZONA HUTAN KOTA ','ZONA HUTAN KOTA '),
	(5,'H.2 ','SUB ZONA TAMAN KOTA/ LINGKUNGAN ','ZONA TAMAN KOTA/ LINGKUNGAN '),
	(6,'H.3 ','SUB ZONA PEMAKAMAN ','ZONA PERMAKAMAN '),
	(7,'H.4 ','SUB ZONA JALUR HIJAU ','ZONA JALUR HIJAU '),
	(8,'H.5 ','SUB ZONA HIJAU TEGANGAN TINGGI ','ZONA JALUR HIJAU '),
	(9,'H.6 ','SUB ZONA HIJAU PENGAMAN JALUR KERETA API ','ZONA JALUR HIJAU '),
	(10,'H.7 ','SUB ZONA HIJAU REKREASI ','ZONA HIJAU REKREASI '),
	(11,'H.8 ','SUB ZONA TERBUKA HIJAU BUDIDAYA PULAU ','ZONA TERBUKA HIJAU BUDIDAYA DI WILAYAH PULAU '),
	(12,'P.1 ','SUB ZONA PEMERINTAHAN NASIONAL ','ZONA PEMERINTAHAN NASIONAL '),
	(13,'P.2 ','SUB ZONA PERWAKILAN NEGARA ASING ','ZONA PERWAKILAN NEGARA ASING '),
	(14,'P.3 ','SUB ZONA PEMERINTAHAN DAERAH ','ZONA PEMERINTAHAN DAERAH '),
	(15,'R.1 ','SUB ZONA RUMAH KAMPUNG ','ZONA PERUMAHAN KAMPUNG '),
	(16,'R.2 ','SUB ZONA RUMAH SANGAT KECIL ','ZONA PERUMAHAN KDB SEDANG - TINGGI '),
	(17,'R.3 ','SUB ZONA RUMAH KECIL ','ZONA PERUMAHAN KDB SEDANG - TINGGI '),
	(18,'R.4 ','SUB ZONA RUMAH SEDANG ','ZONA PERUMAHAN KDB SEDANG - TINGGI '),
	(19,'R.5 ','SUB ZONA RUMAH BESAR ','ZONA PERUMAHAN KDB SEDANG - TINGGI '),
	(20,'R.6 ','SUB ZONA RUMAH FLAT ','ZONA PERUMAHAN KDB SEDANG - TINGGI '),
	(21,'R.7 ','SUB ZONA RUMAH SUSUN ','ZONA PERUMAHAN VERTIKAL '),
	(22,'R.8 ','SUB ZONA RUMAH SUSUN UMUM ','ZONA PERUMAHAN VERTIKAL '),
	(23,'R.9 ','SUB ZONA RUMAH KDB RENDAH ','ZONA PERUMAHAN KDB RENDAH '),
	(24,'R.10 ','SUB ZONA RUMAH VERTIKAL KDB RENDAH ','ZONA PERUMAHAN VERTIKAL KDB RENDAH '),
	(25,'R.11 ','SUB ZONA PERUMAHAN PULAU ','ZONA PERUMAHAN DI WIL. PULAU '),
	(26,'K.1 ','SUB ZONA PERKANTORAN ','ZONA PERKANTORAN, PERDAGANGAN, DAN JASA '),
	(27,'K.2 ','SUB ZONA PERDAGANGAN DAN JASA ','ZONA PERKANTORAN, PERDAGANGAN, DAN JASA '),
	(28,'K.3 ','SUB ZONA PERKANTORAN KDB RENDAH ','ZONA PERKANTORAN, PERDAGANGAN, DAN JASA KDB RENDAH'),
	(29,'K.4 ','SUB ZONA PERDAGANGAN DAN JASA KDB RENDAH ','ZONA PERKANTORAN, PERDAGANGAN, DAN JASA KDB RENDAH'),
	(30,'K.5 ','SUB ZONA PERDAGANGAN DAN JASA PULAU ','ZONA PERDAGANGAN DAN JASA DI WILAYAH PULAU '),
	(31,'S.1 ','SUB ZONA PRASARANA PENDIDIKAN ','ZONA PELAYANAN UMUM DAN SOSIAL '),
	(32,'S.2 ','SUB ZONA PRASARANA KESEHATAN ','ZONA PELAYANAN UMUM DAN SOSIAL '),
	(33,'S.3 ','SUB ZONA PRASARANA IBADAH ','ZONA PELAYANAN UMUM DAN SOSIAL '),
	(34,'S.4 ','SUB ZONA PRASARANA SOSIAL BUDAYA ','ZONA PELAYANAN UMUM DAN SOSIAL '),
	(35,'S.5 ','SUB ZONA PRASARANA REKREASI DAN OLAHRAGA ','ZONA PELAYANAN UMUM DAN SOSIAL '),
	(36,'S.6 ','SUB ZONA PRASARANA PELAYANAN UMUM ','ZONA PELAYANAN UMUM DAN SOSIAL '),
	(37,'S.7 ','SUB ZONA PRASARANA TERMINAL ','ZONA PELAYANAN UMUM DAN SOSIAL '),
	(38,'I.1 ','SUB ZONA INDUSTRI ','ZONA INDUSTRI DAN PERGUDANGAN '),
	(39,'G.1 ','SUB ZONA PERGUDANGAN ','ZONA INDUSTRI DAN PERGUDANGAN '),
	(40,'B.1 ','SUB ZONA TERBUKA BIRU ','ZONA TERBUKA BIRU '),
	(41,'T.1 ','SUB ZONA PERTAMBANGAN DI WILAYAH PULAU ','ZONA PERTAMBANGAN DI WIL. PULAU '),
	(42,'PP.1 ','SUB ZONA KONSERVASI PERAIRAN ','ZONA KONSERVASI PERAIRAN '),
	(43,'PP.2 ','SUB ZONA PEMANFAATAN UMUM PERAIRAN ','ZONA PEMANFAATAN UMUM PERAIRAN ');

/*!40000 ALTER TABLE `zonasi` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
