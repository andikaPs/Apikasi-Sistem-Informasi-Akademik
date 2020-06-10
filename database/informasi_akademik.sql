/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.31-MariaDB : Database - informasi_akademik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`informasi_akademik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `informasi_akademik`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `idAdmin` char(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noTelepon` char(15) NOT NULL,
  `keterangan` varchar(10) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`idAdmin`,`username`,`password`,`nama`,`alamat`,`email`,`noTelepon`,`keterangan`) values ('Adm001','Andika','dika','Andika Permana Sidiq','Walahar I','andika@gmail.com','085321874357','admin');

/*Table structure for table `berita` */

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `idBerita` char(15) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isiBerita` text NOT NULL,
  `tanggal` date DEFAULT NULL,
  `idAdmin` char(15) DEFAULT NULL,
  PRIMARY KEY (`idBerita`),
  KEY `berita_ibfk_2` (`idAdmin`),
  CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `berita` */

insert  into `berita`(`idBerita`,`judul`,`isiBerita`,`tanggal`,`idAdmin`) values ('Brt0001','Update Jadwal UTS','<h3>Jadwal UTS untuk SEMESTER II</h3>\r\n<br>\r\n<h4>Senin</h4>\r\n- Metode Perancang Program 14.10 - 13.40\r\n<br>\r\n<h4>Selasa</h4>\r\n- Sistem Basis Data 14.10 - 13.40\r\n<br>\r\n<h4>Kamis</h4>\r\n- Aplikasi Basis Data 14.10 - 13.40\r\n','2020-06-07','Adm001');

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `idDosen` char(15) NOT NULL,
  `NIP` char(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noTelepon` char(15) NOT NULL,
  `idKelas` char(15) DEFAULT NULL,
  `keterangan` varchar(10) NOT NULL DEFAULT 'dosen',
  PRIMARY KEY (`idDosen`),
  KEY `dosen_ibfk_2` (`idKelas`),
  CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dosen` */

insert  into `dosen`(`idDosen`,`NIP`,`password`,`nama`,`alamat`,`email`,`noTelepon`,`idKelas`,`keterangan`) values ('Dos0001','131413053','3053','A. Rochman Raharjo, S.Kom','Bekasi','arr@bsi.ac.id','87321456642','Kls0003','dosen'),('Dos0002','131417245','7245','Findi Ayu Sariasih, S.T, ','Bekasi','fav@bsi.ac.id','87654567761','Kls0003','dosen'),('Dos0003','131418056','8056','Minda Septiani','Bekasi','mdt@bsi.ac.id','8987656775','Kls0003','dosen'),('Dos0004','131416133','6133','Rahayu Ningsih, M.Kom','Bekasi','ryh@bsi.ac.id','083321874357','Kls0003','dosen'),('Dos0006','131417232','7232','Istihayyu Buanasari, M.Hu','Bekasi','iyb@bsi.ac.id','085220987567','Kls0003','dosen'),('Dos0007','131414383','4383','Silvy Amelia.S.Kom, M.Kom','Bekasi','sva@bsi.ac.id','08976787656','Kls0003','dosen');

/*Table structure for table `fakultas` */

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `idFakultas` char(15) NOT NULL,
  `namaFakultas` varchar(50) NOT NULL,
  PRIMARY KEY (`idFakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fakultas` */

insert  into `fakultas`(`idFakultas`,`namaFakultas`) values ('Fk0001','Teknologi Informasi');

/*Table structure for table `jadwalpelajaran` */

DROP TABLE IF EXISTS `jadwalpelajaran`;

CREATE TABLE `jadwalpelajaran` (
  `idJadwal` char(15) NOT NULL,
  `idMatkul` char(15) NOT NULL,
  `hari` varchar(25) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `ruangan` varchar(25) NOT NULL,
  `idKelas` char(15) NOT NULL,
  `idDosen` char(15) NOT NULL,
  PRIMARY KEY (`idJadwal`),
  KEY `jadwalpelajaran_ibfk_1` (`idMatkul`),
  KEY `jadwalpelajaran_ibfk_2` (`idKelas`),
  KEY `jadwalpelajaran_ibfk_3` (`idDosen`),
  CONSTRAINT `jadwalpelajaran_ibfk_1` FOREIGN KEY (`idMatkul`) REFERENCES `matakuliah` (`idMatkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jadwalpelajaran_ibfk_2` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jadwalpelajaran_ibfk_3` FOREIGN KEY (`idDosen`) REFERENCES `dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jadwalpelajaran` */

insert  into `jadwalpelajaran`(`idJadwal`,`idMatkul`,`hari`,`jam`,`ruangan`,`idKelas`,`idDosen`) values ('Jdwl0001','Matkul0003','Senin','11.40-14.10','305','Kls0003','Dos0007'),('Jdwl0002','Matkul0007','Senin','14.10 - 16.40','307','Kls0003','Dos0003'),('Jdwl0003','Matkul0002','Selasa','11.40-14.10','305','Kls0003','Dos0002'),('Jdwl0004','Matkul0006','Selasa','15.00-16.40','303','Kls0003','Dos0006'),('Jdwl0005','Matkul0001','Kamis','14.10 - 16.40','302','Kls0003','Dos0001'),('Jdwl0006','Matkul0005','Jumat','14.10 - 16.40','301','Kls0003','Dos0004');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `idJurusan` char(15) NOT NULL,
  `namaJurusan` varchar(30) NOT NULL,
  `idFakultas` char(15) NOT NULL,
  PRIMARY KEY (`idJurusan`),
  KEY `jurusan_ibfk_1` (`idFakultas`),
  CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`idFakultas`) REFERENCES `fakultas` (`idFakultas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`idJurusan`,`namaJurusan`,`idFakultas`) values ('Jrs0001','Sistem Informasi','Fk0001'),('Jrs0002','Sistem Informasi Akuntansi','Fk0001');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `idKelas` char(15) NOT NULL,
  `namaKelas` varchar(50) NOT NULL,
  PRIMARY KEY (`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`idKelas`,`namaKelas`) values ('Kls0002','12.2B.04'),('Kls0003','12.2C.04');

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `idMahasiswa` char(15) NOT NULL,
  `NIM` char(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idKelas` char(15) DEFAULT NULL,
  `idJurusan` char(15) DEFAULT NULL,
  `idFakultas` char(15) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noTelepon` char(15) NOT NULL,
  `keterangan` varchar(10) NOT NULL DEFAULT 'mahasiswa',
  PRIMARY KEY (`idMahasiswa`),
  KEY `mahasiswa_ibfk_1` (`idKelas`),
  KEY `mahasiswa_ibfk_2` (`idJurusan`),
  KEY `mahasiswa_ibfk_3` (`idFakultas`),
  CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`idJurusan`) REFERENCES `jurusan` (`idJurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`idFakultas`) REFERENCES `fakultas` (`idFakultas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`idMahasiswa`,`NIM`,`password`,`nama`,`idKelas`,`idJurusan`,`idFakultas`,`alamat`,`email`,`noTelepon`,`keterangan`) values ('Mhs0001','1214690','4690','Andika Permana SIdiq','Kls0003','Jrs0001','Fk0001','Walahar','andika@bsi.ac.id','08532187457','mahasiswa'),('Mhs0003','1213128','3128','Pulan','Kls0002','Jrs0001','Fk0001','Bekasi','pulan@bsu.ac.id','087676543456','mahasiswa');

/*Table structure for table `matakuliah` */

DROP TABLE IF EXISTS `matakuliah`;

CREATE TABLE `matakuliah` (
  `idMatkul` char(15) NOT NULL,
  `namaMatkul` varchar(50) NOT NULL,
  `idDosen` char(15) DEFAULT NULL,
  PRIMARY KEY (`idMatkul`),
  KEY `matakuliah_ibfk_1` (`idDosen`),
  CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `matakuliah` */

insert  into `matakuliah`(`idMatkul`,`namaMatkul`,`idDosen`) values ('Matkul0001','Sistem Basis Data','Dos0001'),('Matkul0002','Struktur Data','Dos0002'),('Matkul0003','Metode Perancang Program','Dos0007'),('Matkul0005','Web Programming I','Dos0004'),('Matkul0006','Bahasa Inggris','Dos0006'),('Matkul0007','Aplikasi Basis Data','Dos0003');

/*Table structure for table `nilaiuas` */

DROP TABLE IF EXISTS `nilaiuas`;

CREATE TABLE `nilaiuas` (
  `idNilaiUas` char(15) NOT NULL,
  `idMatkul` char(15) NOT NULL,
  `nilai` char(15) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `idMahasiswa` char(15) NOT NULL,
  `idDosen` char(15) NOT NULL,
  PRIMARY KEY (`idNilaiUas`),
  KEY `nilaiuas_ibfk_1` (`idMatkul`),
  KEY `nilaiuas_ibfk_2` (`idMahasiswa`),
  KEY `nilaiuas_ibfk_3` (`idDosen`),
  CONSTRAINT `nilaiuas_ibfk_1` FOREIGN KEY (`idMatkul`) REFERENCES `matakuliah` (`idMatkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nilaiuas_ibfk_2` FOREIGN KEY (`idMahasiswa`) REFERENCES `mahasiswa` (`idMahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nilaiuas_ibfk_3` FOREIGN KEY (`idDosen`) REFERENCES `dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilaiuas` */

insert  into `nilaiuas`(`idNilaiUas`,`idMatkul`,`nilai`,`keterangan`,`idMahasiswa`,`idDosen`) values ('Uas0001','Matkul0001','90','LULUS','Mhs0001','Dos0001'),('Uas0002','Matkul0002','90','LULUS','Mhs0001','Dos0002'),('Uas0003','Matkul0007','85','LULUS','Mhs0001','Dos0003'),('Uas0004','Matkul0005','90','LULUS','Mhs0001','Dos0004'),('Uas0006','Matkul0006','88','LULUS','Mhs0001','Dos0006'),('Uas0007','Matkul0003','89','LULUS','Mhs0001','Dos0007');

/*Table structure for table `nilaiuts` */

DROP TABLE IF EXISTS `nilaiuts`;

CREATE TABLE `nilaiuts` (
  `idNilaiUts` char(15) NOT NULL,
  `idMatkul` varchar(15) NOT NULL,
  `nilai` char(20) NOT NULL,
  `idMahasiswa` char(15) NOT NULL,
  `idDosen` char(15) NOT NULL,
  PRIMARY KEY (`idNilaiUts`),
  KEY `idMatkul` (`idMatkul`),
  KEY `nilaiuts_ibfk_2` (`idMahasiswa`),
  KEY `nilaiuts_ibfk_3` (`idDosen`),
  CONSTRAINT `nilaiuts_ibfk_2` FOREIGN KEY (`idMahasiswa`) REFERENCES `mahasiswa` (`idMahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nilaiuts_ibfk_3` FOREIGN KEY (`idDosen`) REFERENCES `dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilaiuts` */

insert  into `nilaiuts`(`idNilaiUts`,`idMatkul`,`nilai`,`idMahasiswa`,`idDosen`) values ('Uts0001','Matkul0001','90','Mhs0001','Dos0001'),('Uts0002','Matkul0002','89','Mhs0001','Dos0002'),('Uts0003','Matkul0007','89','Mhs0001','Dos0003'),('Uts0004','Matkul0005','90','Mhs0001','Dos0004'),('Uts0006','Matkul0006','88','Mhs0001','Dos0006'),('Uts0007','Matkul0003','89','Mhs0001','Dos0007');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
