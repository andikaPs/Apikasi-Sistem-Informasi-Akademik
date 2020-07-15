/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.1.31-MariaDB : Database - informasi_akademik
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
  `noTelepon` varchar(15) NOT NULL,
  `keterangan` varchar(10) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`idAdmin`,`username`,`password`,`nama`,`alamat`,`email`,`noTelepon`,`keterangan`) values 
('Adm001','Andika','dika','Andika','Walahar I','andika@gmail.com','085321874358','admin');

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

insert  into `berita`(`idBerita`,`judul`,`isiBerita`,`tanggal`,`idAdmin`) values 
('Brt0001','Update Jadwal UTS','* Senin\r\n<br>\r\n- Aplikasi Basis Data 14.10 - 16.10','2020-06-20','Adm001'),
('Brt0002','Update Jadwal UAS','*Senin\r\n<br>\r\n- Metode Perancang Program 11.40 - 14.10','2020-07-07','Adm001');

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `idDosen` char(15) NOT NULL,
  `NIP` char(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noTelepon` varchar(15) NOT NULL,
  `idKelas` char(15) DEFAULT NULL,
  `keterangan` varchar(10) NOT NULL DEFAULT 'dosen',
  PRIMARY KEY (`idDosen`),
  KEY `dosen_ibfk_2` (`idKelas`),
  CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dosen` */

insert  into `dosen`(`idDosen`,`NIP`,`password`,`nama`,`alamat`,`email`,`noTelepon`,`idKelas`,`keterangan`) values 
('Dos0001','131418960','8960','Mikasa Ackerman','Indonesia','mks@bsi.ac.id','0857898989','Kls0001','dosen'),
('Dos0002','131416572','6572','Eren Yeager','Paradise','ern@bsi.ac.id','085321874358','Kls0001','dosen'),
('Dos0003','131417850','7850','Rikka','jepang','rk@bsi.ac.id','898','Kls0001','dosen'),
('Dos0004','131413902','3902','Kazuma','Jepang','kzm@bsi.ac.id','92839','Kls0001','dosen');

/*Table structure for table `fakultas` */

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `idFakultas` char(15) NOT NULL,
  `namaFakultas` varchar(50) NOT NULL,
  PRIMARY KEY (`idFakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fakultas` */

insert  into `fakultas`(`idFakultas`,`namaFakultas`) values 
('Fk0001','Teknologi Informasi'),
('Fk0002','Sains');

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

insert  into `jadwalpelajaran`(`idJadwal`,`idMatkul`,`hari`,`jam`,`ruangan`,`idKelas`,`idDosen`) values 
('Jdwl0001','Matkul0001','Senin','14.10 - 16.40','305','Kls0001','Dos0001'),
('Jdwl0002','Matkul0002','Jumat','14.10 - 17.30','305','Kls0001','Dos0004');

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

insert  into `jurusan`(`idJurusan`,`namaJurusan`,`idFakultas`) values 
('Jrs0001','Sistem Informasi','Fk0001'),
('Jrs0002','Sistem Informasi Akuntansi','Fk0001'),
('Jrs0003','ABCD','Fk0001');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `idKelas` char(15) NOT NULL,
  `namaKelas` varchar(50) NOT NULL,
  PRIMARY KEY (`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`idKelas`,`namaKelas`) values 
('Kls0001','12.2C.04');

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
  `noTelepon` varchar(15) NOT NULL,
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

insert  into `mahasiswa`(`idMahasiswa`,`NIM`,`password`,`nama`,`idKelas`,`idJurusan`,`idFakultas`,`alamat`,`email`,`noTelepon`,`keterangan`) values 
('Mhs0001','1215249','5249','Andika Permana Sidiq','Kls0001','Jrs0001','Fk0001','Walahar I','andika@gmail.com','085321874355','mahasiswa'),
('Mhs0002','1218410','8410','Andika','Kls0001','Jrs0001','Fk0001','Walahar I','a@gmail.com','8298938','mahasiswa');

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

insert  into `matakuliah`(`idMatkul`,`namaMatkul`,`idDosen`) values 
('Matkul0001','Aplikasi Basis Data','Dos0001'),
('Matkul0002','Web Programming I','Dos0004');

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

insert  into `nilaiuas`(`idNilaiUas`,`idMatkul`,`nilai`,`keterangan`,`idMahasiswa`,`idDosen`) values 
('Uas0001','Matkul0001','90','LULUS','Mhs0001','Dos0001'),
('Uas0002','Matkul0001','85','LULUS','Mhs0002','Dos0001');

/*Table structure for table `nilaiuts` */

DROP TABLE IF EXISTS `nilaiuts`;

CREATE TABLE `nilaiuts` (
  `idNilaiUts` char(15) NOT NULL,
  `idMatkul` varchar(15) NOT NULL,
  `nilai` char(20) NOT NULL,
  `idMahasiswa` char(15) NOT NULL,
  `idDosen` char(15) NOT NULL,
  PRIMARY KEY (`idNilaiUts`),
  KEY `nilaiuts_ibfk_2` (`idMahasiswa`),
  KEY `nilaiuts_ibfk_3` (`idDosen`),
  KEY `idMatkul` (`idMatkul`),
  CONSTRAINT `nilaiuts_ibfk_2` FOREIGN KEY (`idMahasiswa`) REFERENCES `mahasiswa` (`idMahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nilaiuts_ibfk_3` FOREIGN KEY (`idDosen`) REFERENCES `dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nilaiuts_ibfk_4` FOREIGN KEY (`idMatkul`) REFERENCES `matakuliah` (`idMatkul`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilaiuts` */

insert  into `nilaiuts`(`idNilaiUts`,`idMatkul`,`nilai`,`idMahasiswa`,`idDosen`) values 
('Uts0001','Matkul0001','90','Mhs0001','Dos0001'),
('Uts0002','Matkul0001','89','Mhs0002','Dos0001');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
