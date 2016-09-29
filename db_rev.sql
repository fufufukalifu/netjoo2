/*
SQLyog Ultimate v10.42 
MySQL - 5.6.26 : Database - db_netjoo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_netjoo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_netjoo`;

/*Table structure for table `tb_bab` */

CREATE TABLE `tb_bab` (
  `id` int(10) NOT NULL,
  `judulBab` varchar(75) NOT NULL,
  `keterangan` text NOT NULL,
  `status` char(1) DEFAULT '1',
  `tingkatPelajaranID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_bab` */

insert  into `tb_bab`(`id`,`judulBab`,`keterangan`,`status`,`tingkatPelajaranID`) values (62,'Ciri-ciri mahluk hidup','','1',13),(63,'Perkembangan mahluk hidup','','1',13),(64,'Keseimbangan ekosistem','','1',13),(65,'Greetings','','1',14),(66,'Text','','1',14),(67,'Tenses','','1',14),(68,'Salam','','1',15),(69,'Jenis Teks','','1',15),(70,'Pola Kalimat','','1',15),(71,'Sejarah','','1',16),(72,'Perang Dunia II','','1',16),(73,'Perang Dunia I','','1',16),(74,'4','','1',16);

/*Table structure for table `tb_banksoal` */

CREATE TABLE `tb_banksoal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text NOT NULL,
  `jawaban` char(1) NOT NULL,
  `kesulitan` char(1) NOT NULL,
  `id_bab` int(11) NOT NULL,
  `id_tingkat-pelajaran` int(11) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `random` char(1) DEFAULT NULL,
  `publish` char(1) NOT NULL,
  `UUID` varchar(15) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tb_banksoal` */

insert  into `tb_banksoal`(`id_soal`,`soal`,`jawaban`,`kesulitan`,`id_bab`,`id_tingkat-pelajaran`,`sumber`,`create_by`,`random`,`publish`,`UUID`) values (3,'<p>Ubah</p>\r\n','D','1',68,0,'UAN 1290m Revisi','41',NULL,'','57e243e13e88d'),(4,'<p>1+1+X</p>\r\n','A','1',68,0,'SNMPTN','41',NULL,'','57e88fc9c1946'),(5,'<p>asd</p>\r\n','C','',62,0,'UAN SMP','41',NULL,'1','57e89f35906fe'),(6,'<p>aS</p>\r\n','C','',65,0,'UAN 1290','41',NULL,'1','57e8aa083024c'),(7,'<p>asjdina</p>\r\n','E','2',65,0,'UAN 3000','41',NULL,'1','57e8aa321c808'),(8,'<p>as</p>\r\n','A','1',0,0,'asd','42',NULL,'','57e8c96d40517'),(9,'<p>as</p>\r\n','A','1',0,0,'asd','42',NULL,'','57e8c9dba07a9');

/*Table structure for table `tb_guru` */

CREATE TABLE `tb_guru` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namaDepan` varchar(32) NOT NULL,
  `namaBelakang` varchar(32) DEFAULT NULL,
  `alamat` text,
  `noKontak` varchar(15) DEFAULT NULL,
  `penggunaID` int(10) DEFAULT NULL,
  `mataPelajaranID` int(10) DEFAULT NULL,
  `biografi` text,
  `photo` varchar(32) DEFAULT 'default.jpg',
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `penggunaID` (`penggunaID`),
  KEY `a` (`mataPelajaranID`),
  CONSTRAINT `tb_guru_ibfk_2` FOREIGN KEY (`penggunaID`) REFERENCES `tb_pengguna` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_guru_ibfk_3` FOREIGN KEY (`mataPelajaranID`) REFERENCES `tb_mata-pelajaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `tb_guru` */

insert  into `tb_guru`(`id`,`namaDepan`,`namaBelakang`,`alamat`,`noKontak`,`penggunaID`,`mataPelajaranID`,`biografi`,`photo`,`status`) values (21,'sasda','asd','qqwe','45',NULL,NULL,'Sed aliquet dui auctor blandit ipsum tincidunt\r\nQuis rhoncus lorem dolor eu sem. Aenean enim risus, convallis id ultrices eget.','default.png','1'),(34,'Johny','Subejo','Deep','089656469669',42,2,NULL,'default.png','1');

/*Table structure for table `tb_komen` */

CREATE TABLE `tb_komen` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isiKomen` text,
  `timestampe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `videoID` int(10) DEFAULT NULL,
  `userID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videoID` (`videoID`),
  KEY `tb_komen_ibfk_2` (`userID`),
  CONSTRAINT `tb_komen_ibfk_1` FOREIGN KEY (`videoID`) REFERENCES `tb_video` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tb_komen_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tb_pengguna` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_komen` */

insert  into `tb_komen`(`id`,`isiKomen`,`timestampe`,`videoID`,`userID`) values (1,'comment','2016-09-09 12:55:43',9,3);

/*Table structure for table `tb_latihan` */

CREATE TABLE `tb_latihan` (
  `id_latihan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_latihan` varchar(75) NOT NULL,
  `create_by` varchar(75) NOT NULL,
  `id_paket` int(11) NOT NULL,
  PRIMARY KEY (`id_latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_latihan` */

/*Table structure for table `tb_mata-pelajaran` */

CREATE TABLE `tb_mata-pelajaran` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aliasMataPelajaran` varchar(10) NOT NULL,
  `namaMataPelajaran` varchar(32) NOT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mata-pelajaran` */

insert  into `tb_mata-pelajaran`(`id`,`aliasMataPelajaran`,`namaMataPelajaran`,`status`) values (1,'IPA','Ilmu Pengetahuan Alam',1),(2,'IPS','Ilmu Pengetahuan Sosial',1),(3,'ING','Bahasa Inggris',1),(4,'IND','Bahasa Indonesia',1);

/*Table structure for table `tb_mm-paketbank` */

CREATE TABLE `tb_mm-paketbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paket` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_mm-paketbank` */

/*Table structure for table `tb_mm-tryoutpaket` */

CREATE TABLE `tb_mm-tryoutpaket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tryout` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_mm-tryoutpaket` */

/*Table structure for table `tb_mm_sol_lat` */

CREATE TABLE `tb_mm_sol_lat` (
  `id` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_mm_sol_lat` */

/*Table structure for table `tb_paket` */

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nm_paket` varchar(75) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `jumlah_soal` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

/*Data for the table `tb_paket` */

insert  into `tb_paket`(`id_paket`,`nm_paket`,`deskripsi`,`status`,`jumlah_soal`,`durasi`) values (99,'nama_pakettt','deskripsitt',0,55,60),(100,'a','a',0,50,89),(101,'kj','klj',0,10,90),(102,'123','dsa',0,10,90),(103,'asd','dask',0,20,78),(104,'baru','tam[pil',1,10,67),(105,'gg','ferari',0,20,88),(106,'gg','ferari',1,20,88),(107,'ff','aziz',1,20,87),(108,'hh','tt',1,10,67);

/*Table structure for table `tb_pengguna` */

CREATE TABLE `tb_pengguna` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namaPengguna` varchar(32) DEFAULT NULL,
  `kataSandi` text,
  `eMail` varchar(64) NOT NULL,
  `regTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `aktivasi` char(1) DEFAULT NULL,
  `avatar` varchar(64) DEFAULT NULL,
  `oauth_uid` varchar(255) DEFAULT NULL,
  `oauth_provider` varchar(255) DEFAULT NULL,
  `hakAkses` varchar(12) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `last_akses` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

insert  into `tb_pengguna`(`id`,`namaPengguna`,`kataSandi`,`eMail`,`regTime`,`aktivasi`,`avatar`,`oauth_uid`,`oauth_provider`,`hakAkses`,`status`,`last_akses`) values (3,'siswa','bcd724d15cde8c47650fda962968f102','','2016-09-05 14:18:08','1',NULL,NULL,NULL,'siswa','1','2016-09-08 21:47:20'),(41,'siswabageur','efe6398127928f1b2e9ef3207fb82663','goichissnime@gmail.com','2016-09-13 14:18:15','1',NULL,NULL,NULL,'siswa','1','2016-09-13 14:18:15'),(42,'guru','efe6398127928f1b2e9ef3207fb82663','goichinime@gmail.com','2016-09-13 14:21:13','1',NULL,NULL,NULL,'guru','1','2016-09-13 14:21:13');

/*Table structure for table `tb_piljawaban` */

CREATE TABLE `tb_piljawaban` (
  `id_pilihan` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan` char(1) NOT NULL,
  `jawaban` text NOT NULL,
  `id_soal` int(11) NOT NULL,
  `gambar` varchar(32) NOT NULL,
  PRIMARY KEY (`id_pilihan`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `tb_piljawaban` */

insert  into `tb_piljawaban`(`id_pilihan`,`pilihan`,`jawaban`,`id_soal`,`gambar`) values (6,'A','   baju   ',3,'download1.png'),(7,'B',' baru',3,'smailll.jpg'),(8,'C','      sa    ',3,'smailll1.jpg'),(9,'D','     sada',3,'Image_e856aa1.jpg'),(10,'E','     sad',3,'download2.png'),(11,'A','1',4,'download4.png'),(12,'B',' 2',4,'smailll4.jpg'),(13,'C',' 3',4,'download.png'),(14,'D',' 4',4,'download3.png'),(15,'E',' 4',4,'smailll2.jpg'),(16,'A','',5,'download5.png'),(17,'B','',5,'smailll3.jpg'),(18,'C','',5,'Image_e856aa11.jpg'),(19,'D','',5,'download6.png'),(20,'E','',5,'smailll5.jpg'),(21,'A',' as',6,''),(22,'B','  as',6,''),(23,'C','  as',6,''),(24,'D','  as',6,''),(25,'E','  as',6,''),(26,'A','',7,'download7.png'),(27,'B','',7,'smailll6.jpg'),(28,'C','',7,'download8.png'),(29,'D','',7,'smailll7.jpg'),(30,'E','',7,'Image_e856aa12.jpg'),(31,'A',' ',8,''),(32,'B',' ',8,''),(33,'C',' ',8,''),(34,'D',' ',8,''),(35,'E',' ',8,''),(36,'A',' ',9,''),(37,'B',' ',9,''),(38,'C',' ',9,''),(39,'D',' ',9,''),(40,'E',' ',9,'');

/*Table structure for table `tb_report-latihan` */

CREATE TABLE `tb_report-latihan` (
  `id_report-latihan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `jmlh_kosong` int(11) NOT NULL,
  `jmlh_benar` int(11) NOT NULL,
  `jmlh_salah` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `tgl_pengerjaan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_report-latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_report-latihan` */

/*Table structure for table `tb_report-tryout` */

CREATE TABLE `tb_report-tryout` (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_mm-tryout-paket` int(11) NOT NULL,
  `jmlh_kosong` int(11) NOT NULL,
  `jmlh_benar` int(11) NOT NULL,
  `jmlh_salah` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `tgl_pengerjaan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_report`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_report-tryout` */

/*Table structure for table `tb_siswa` */

CREATE TABLE `tb_siswa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namaDepan` varchar(32) NOT NULL,
  `namaBelakang` varchar(32) DEFAULT NULL,
  `alamat` text NOT NULL,
  `noKontak` varchar(15) NOT NULL,
  `namaSekolah` varchar(50) NOT NULL,
  `alamatSekolah` text NOT NULL,
  `noKontakSekolah` int(15) NOT NULL,
  `penggunaID` int(10) DEFAULT NULL,
  `photo` varchar(32) DEFAULT 'default.jpg',
  `biografi` text,
  `kelas` int(1) DEFAULT NULL,
  `tingkatID` int(10) DEFAULT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `penggunaID` (`penggunaID`),
  KEY `tingkatID` (`tingkatID`),
  CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`penggunaID`) REFERENCES `tb_pengguna` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`tingkatID`) REFERENCES `tb_tingkat` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id`,`namaDepan`,`namaBelakang`,`alamat`,`noKontak`,`namaSekolah`,`alamatSekolah`,`noKontakSekolah`,`penggunaID`,`photo`,`biografi`,`kelas`,`tingkatID`,`status`) values (2,'nama depan','nama belakang','alamat saya','dfakdjafkl','s.dki','dfd',0,NULL,'default.png',NULL,NULL,NULL,''),(3,'qw','qw','qwqw','4324234','Sma Panjalu','ss',0,NULL,'default.jpg',NULL,NULL,NULL,''),(6,'siswa','bageur','Cikapundung','345345345','Sma Panjalu','Jalan Pasuruan',0,41,'smailll.jpg',NULL,NULL,NULL,'');

/*Table structure for table `tb_subbab` */

CREATE TABLE `tb_subbab` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judulSubBab` varchar(75) NOT NULL,
  `babID` int(10) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `babID` (`babID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `tb_subbab` */

insert  into `tb_subbab`(`id`,`judulSubBab`,`babID`,`date_created`,`keterangan`,`status`) values (31,'Hewan',62,NULL,'onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(32,'Melestarikan Jenis',63,'2016-09-19 10:55:35','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(33,'Berkembang Biak',63,'2016-09-19 10:55:37','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(34,'Kegiatan Manusia',64,'2016-09-19 10:55:37','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(35,'Greetings 1',65,'2016-09-19 10:55:38','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(36,'Narative Text',66,'2016-09-19 10:55:38','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(37,'Present Tense',67,'2016-09-19 10:55:39','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(38,'Perfect Tense',67,'2016-09-19 10:55:39','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(39,'Salam 1',68,'2016-09-19 10:55:39','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(40,'Gaya Salam',68,'2016-09-19 10:55:40','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(41,'Jenis Teks',69,'2016-09-19 10:55:40','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(42,'Laporan',69,'2016-09-19 10:55:40','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(43,'Pola Kalimat 1',70,'2016-09-19 10:55:41','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(44,'Polat Kalimat 2',70,'2016-09-19 10:55:41','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(45,'Sejarah',71,'2016-09-19 10:55:43','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(46,'Tujuan Belajar Sejarah',71,'2016-09-19 10:55:44','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(47,'Deskripsi Singkat',72,'2016-09-19 10:55:44','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(48,'Penyebab',72,'2016-09-19 10:55:45','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(49,'Deskripsi Singkat',73,'2016-09-19 10:55:45','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(50,'Penyebab',73,'2016-09-19 10:55:46','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(51,'',NULL,'2016-09-19 10:55:33',NULL,NULL);

/*Table structure for table `tb_tingkat` */

CREATE TABLE `tb_tingkat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aliasTingkat` varchar(10) DEFAULT NULL,
  `namaTingkat` varchar(32) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tingkat` */

insert  into `tb_tingkat`(`id`,`aliasTingkat`,`namaTingkat`,`status`) values (1,'SD','Sekolah Dasar',1),(2,'SMP','Sekolah Menengah Pertama',1),(3,'SMK','Sekolah Menengah Kejuruan',0),(4,'SMA','Sekolah Menengah Atas',1);

/*Table structure for table `tb_tingkat-pelajaran` */

CREATE TABLE `tb_tingkat-pelajaran` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tingkatID` int(10) DEFAULT NULL,
  `mataPelajaranID` int(10) DEFAULT NULL,
  `keterangan` varchar(32) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tingkatID` (`tingkatID`),
  KEY `mataPelajaranID` (`mataPelajaranID`),
  CONSTRAINT `tb_tingkat-pelajaran_ibfk_1` FOREIGN KEY (`tingkatID`) REFERENCES `tb_tingkat` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_tingkat-pelajaran_ibfk_2` FOREIGN KEY (`mataPelajaranID`) REFERENCES `tb_mata-pelajaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tingkat-pelajaran` */

insert  into `tb_tingkat-pelajaran`(`id`,`tingkatID`,`mataPelajaranID`,`keterangan`,`status`) values (13,1,1,'IPA-SD','1'),(14,4,3,'INGGRIS-SMA','1'),(15,2,4,'INDONESIA-SMP','1'),(16,3,2,'SMK-IPS','1'),(17,2,1,'untuk SMP IPA','1');

/*Table structure for table `tb_tryout` */

CREATE TABLE `tb_tryout` (
  `id_tryout` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tryout` varchar(75) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_berhenti` date NOT NULL,
  `publish` char(1) NOT NULL,
  PRIMARY KEY (`id_tryout`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_tryout` */

/*Table structure for table `tb_video` */

CREATE TABLE `tb_video` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judulVideo` varchar(32) DEFAULT NULL,
  `namaFile` varchar(32) DEFAULT NULL,
  `deskripsi` text,
  `path` varchar(64) DEFAULT NULL,
  `guruID` int(10) DEFAULT NULL,
  `published` char(1) DEFAULT NULL,
  `subBabID` int(10) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tb_video_ibfk_1` (`subBabID`),
  KEY `tb_video_ibfk_2` (`guruID`),
  CONSTRAINT `tb_video_ibfk_1` FOREIGN KEY (`subBabID`) REFERENCES `tb_subbab` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_video_ibfk_2` FOREIGN KEY (`guruID`) REFERENCES `tb_guru` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_video` */

insert  into `tb_video`(`id`,`judulVideo`,`namaFile`,`deskripsi`,`path`,`guruID`,`published`,`subBabID`,`status`) values (9,'Cicak','algoritma1.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n',NULL,34,NULL,34,'1'),(10,'Penebangan','algoritma1.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,34,NULL,34,'1'),(11,'Perburuan Liar','algoritma1.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,34,NULL,34,'1'),(12,NULL,NULL,NULL,NULL,34,NULL,34,'1');

/*Table structure for table `view_pelajaran_sd` */

DROP TABLE IF EXISTS `view_pelajaran_sd`;

/*!50001 CREATE TABLE  `view_pelajaran_sd`(
 `aliasMataPelajaran` varchar(10) ,
 `namaMataPelajaran` varchar(32) ,
 `aliasTingkat` varchar(10) 
)*/;

/*Table structure for table `view_pelajaran_sma` */

DROP TABLE IF EXISTS `view_pelajaran_sma`;

/*!50001 CREATE TABLE  `view_pelajaran_sma`(
 `aliasMataPelajaran` varchar(10) ,
 `namaMataPelajaran` varchar(32) ,
 `aliasTingkat` varchar(10) 
)*/;

/*Table structure for table `view_pelajaran_smk` */

DROP TABLE IF EXISTS `view_pelajaran_smk`;

/*!50001 CREATE TABLE  `view_pelajaran_smk`(
 `aliasMataPelajaran` varchar(10) ,
 `namaMataPelajaran` varchar(32) ,
 `aliasTingkat` varchar(10) 
)*/;

/*Table structure for table `view_pelajaran_smp` */

DROP TABLE IF EXISTS `view_pelajaran_smp`;

/*!50001 CREATE TABLE  `view_pelajaran_smp`(
 `aliasMataPelajaran` varchar(10) ,
 `namaMataPelajaran` varchar(32) ,
 `aliasTingkat` varchar(10) 
)*/;

/*View structure for view view_pelajaran_sd */

/*!50001 DROP TABLE IF EXISTS `view_pelajaran_sd` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelajaran_sd` AS (select `pelajaran`.`aliasMataPelajaran` AS `aliasMataPelajaran`,`pelajaran`.`namaMataPelajaran` AS `namaMataPelajaran`,`tingkat`.`aliasTingkat` AS `aliasTingkat` from ((`tb_mata-pelajaran` `pelajaran` join `tb_tingkat-pelajaran` `t_p` on((`pelajaran`.`id` = `t_p`.`mataPelajaranID`))) join `tb_tingkat` `tingkat` on((`tingkat`.`id` = `t_p`.`tingkatID`))) where (`tingkat`.`aliasTingkat` = 'SD')) */;

/*View structure for view view_pelajaran_sma */

/*!50001 DROP TABLE IF EXISTS `view_pelajaran_sma` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelajaran_sma` AS (select `pelajaran`.`aliasMataPelajaran` AS `aliasMataPelajaran`,`pelajaran`.`namaMataPelajaran` AS `namaMataPelajaran`,`tingkat`.`aliasTingkat` AS `aliasTingkat` from ((`tb_mata-pelajaran` `pelajaran` join `tb_tingkat-pelajaran` `t_p` on((`pelajaran`.`id` = `t_p`.`mataPelajaranID`))) join `tb_tingkat` `tingkat` on((`tingkat`.`id` = `t_p`.`tingkatID`))) where (`tingkat`.`aliasTingkat` = 'SMA')) */;

/*View structure for view view_pelajaran_smk */

/*!50001 DROP TABLE IF EXISTS `view_pelajaran_smk` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelajaran_smk` AS (select `pelajaran`.`aliasMataPelajaran` AS `aliasMataPelajaran`,`pelajaran`.`namaMataPelajaran` AS `namaMataPelajaran`,`tingkat`.`aliasTingkat` AS `aliasTingkat` from ((`tb_mata-pelajaran` `pelajaran` join `tb_tingkat-pelajaran` `t_p` on((`pelajaran`.`id` = `t_p`.`mataPelajaranID`))) join `tb_tingkat` `tingkat` on((`tingkat`.`id` = `t_p`.`tingkatID`))) where (`tingkat`.`aliasTingkat` = 'SMK')) */;

/*View structure for view view_pelajaran_smp */

/*!50001 DROP TABLE IF EXISTS `view_pelajaran_smp` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelajaran_smp` AS (select `pelajaran`.`aliasMataPelajaran` AS `aliasMataPelajaran`,`pelajaran`.`namaMataPelajaran` AS `namaMataPelajaran`,`tingkat`.`aliasTingkat` AS `aliasTingkat` from ((`tb_mata-pelajaran` `pelajaran` join `tb_tingkat-pelajaran` `t_p` on((`pelajaran`.`id` = `t_p`.`mataPelajaranID`))) join `tb_tingkat` `tingkat` on((`tingkat`.`id` = `t_p`.`tingkatID`))) where (`tingkat`.`aliasTingkat` = 'SMP')) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;