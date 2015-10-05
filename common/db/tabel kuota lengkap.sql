# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.26)
# Database: ptspdki_db
# Generation Time: 2015-10-05 05:50:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table kuota
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kuota`;

CREATE TABLE `kuota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi_id` int(11) NOT NULL,
  `sesi_1_kuota` tinyint(4) DEFAULT NULL,
  `sesi_1_mulai` time DEFAULT NULL,
  `sesi_1_selesai` time DEFAULT NULL,
  `sesi_2_kuota` tinyint(4) DEFAULT NULL,
  `sesi_2_mulai` time DEFAULT NULL,
  `sesi_2_selesai` time DEFAULT NULL,
  `sesi_3_kuota` tinyint(4) DEFAULT NULL,
  `sesi_3_mulai` time DEFAULT NULL,
  `sesi_3_selesai` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__lokasi` (`lokasi_id`),
  CONSTRAINT `FK__lokasi` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `kuota` WRITE;
/*!40000 ALTER TABLE `kuota` DISABLE KEYS */;

INSERT INTO `kuota` (`id`, `lokasi_id`, `sesi_1_kuota`, `sesi_1_mulai`, `sesi_1_selesai`, `sesi_2_kuota`, `sesi_2_mulai`, `sesi_2_selesai`, `sesi_3_kuota`, `sesi_3_mulai`, `sesi_3_selesai`)
VALUES
	(1,11,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(2,134,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(3,135,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(4,136,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(5,137,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(6,138,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(7,139,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(8,872,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(9,873,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(10,874,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(11,875,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(12,876,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(13,877,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(14,878,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(15,879,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(16,880,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(17,881,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(18,882,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(19,883,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(20,884,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(21,885,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(22,886,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(23,887,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(24,888,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(25,889,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(26,890,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(27,891,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(28,892,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(29,893,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(30,894,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(31,895,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(32,896,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(33,897,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(34,898,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(35,899,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(36,900,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(37,901,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(38,902,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(39,903,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(40,904,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(41,905,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(42,906,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(43,907,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(44,908,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(45,909,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(46,910,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(47,911,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(48,912,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(49,913,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(50,914,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(51,915,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(52,7463,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(53,7464,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(54,7465,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(55,7466,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(56,7467,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(57,7468,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(58,7469,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(59,7470,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(60,7471,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(61,7472,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(62,7473,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(63,7474,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(64,7475,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(65,7476,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(66,7477,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(67,7478,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(68,7479,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(69,7480,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(70,7481,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(71,7482,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(72,7483,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(73,7484,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(74,7485,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(75,7486,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(76,7487,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(77,7488,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(78,7489,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(79,7490,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(80,7491,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(81,7492,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(82,7493,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(83,7494,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(84,7495,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(85,7496,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(86,7497,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(87,7498,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(88,7499,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(89,7500,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(90,7501,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(91,7502,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(92,7503,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(93,7504,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(94,7505,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(95,7506,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(96,7507,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(97,7508,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(98,7509,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(99,7510,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(100,7511,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(101,7512,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(102,7513,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(103,7514,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(104,7515,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(105,7516,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(106,7517,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(107,7518,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(108,8611,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(109,8612,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(110,8613,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(111,8614,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(112,8615,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(113,8616,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(114,8617,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(115,8618,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(116,8619,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(117,8620,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(118,8621,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(119,8622,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(120,8623,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(121,8624,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(122,8625,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(123,8626,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(124,8627,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(125,8628,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(126,8629,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(127,8630,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(128,8631,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(129,8632,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(130,8633,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(131,8634,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(132,8635,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(133,8636,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(134,8637,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(135,8638,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(136,8639,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(137,8640,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(138,8641,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(139,8642,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(140,8643,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(141,8644,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(142,8645,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(143,8646,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(144,8647,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(145,8648,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(146,8649,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(147,8650,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(148,8651,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(149,8652,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(150,8653,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(151,8654,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(152,8655,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(153,8656,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(154,8657,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(155,8658,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(156,8659,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(157,8660,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(158,8661,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(159,8662,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(160,8663,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(161,8664,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(162,8665,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(163,8666,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(164,9174,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(165,9175,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(166,9176,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(167,9177,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(168,9178,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(169,9179,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(170,9180,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(171,9181,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(172,9182,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(173,9183,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(174,9184,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(175,9185,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(176,9186,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(177,9187,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(178,9188,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(179,9189,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(180,9190,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(181,9191,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(182,9192,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(183,9193,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(184,9194,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(185,9195,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(186,9196,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(187,9197,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(188,9198,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(189,9199,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(190,9200,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(191,9201,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(192,9202,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(193,9203,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(194,9204,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(195,9205,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(196,9206,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(197,9207,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(198,9208,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(199,9209,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(200,9210,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(201,9211,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(202,9212,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(203,9213,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(204,9214,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(205,9215,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(206,9216,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(207,9217,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(208,9218,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(209,9219,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(210,9220,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(211,9221,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(212,9222,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(213,9223,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(214,9224,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(215,9225,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(216,9226,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(217,9227,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(218,9228,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(219,9229,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(220,9460,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(221,9461,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(222,9462,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(223,9463,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(224,9464,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(225,9465,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(226,9466,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(227,9467,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(228,9468,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(229,9469,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(230,9470,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(231,9471,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(232,9472,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(233,9473,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(234,9474,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(235,9475,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(236,9476,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(237,9477,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(238,9478,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(239,9479,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(240,9480,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(241,9481,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(242,9482,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(243,9483,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(244,9484,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(245,9485,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(246,9486,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(247,9487,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(248,9488,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(249,9489,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(250,9490,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(251,9491,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(252,9492,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(253,9493,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(254,9494,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(255,9495,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(256,9496,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(257,9497,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(258,9498,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(259,9499,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(260,9500,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(261,9501,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(262,9502,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(263,9503,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(264,9504,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(265,9505,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(266,9506,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(267,15410,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(268,15411,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(269,15412,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(270,15413,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(271,15414,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(272,15415,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(273,15416,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(274,15417,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(275,15418,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(276,15419,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(277,15420,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(278,15421,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(279,15422,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(280,15423,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(281,15424,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(282,15425,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(283,15426,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(284,15427,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(285,15428,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(286,15429,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(287,15430,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(288,15431,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(289,15432,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(290,15433,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(291,15434,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(292,15435,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(293,15436,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(294,15437,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(295,15438,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(296,15439,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(297,15440,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(298,15441,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(299,15442,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(300,15443,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(301,15444,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(302,15445,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(303,15446,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(304,15447,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(305,15448,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(306,15449,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(307,15450,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(308,15451,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(309,15452,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(310,15453,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(311,15454,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(312,15455,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(313,15456,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(314,15457,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(315,15458,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(316,15459,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(317,15460,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL),
	(318,15461,50,'08:00:00','12:00:00',40,'13:00:00','16:00:00',NULL,NULL,NULL);

/*!40000 ALTER TABLE `kuota` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
