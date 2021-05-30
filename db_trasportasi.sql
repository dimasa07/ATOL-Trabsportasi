/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.8-MariaDB : Database - db_transportasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_transportasi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_transportasi`;

/*Table structure for table `bahasa` */

DROP TABLE IF EXISTS `bahasa`;

CREATE TABLE `bahasa` (
  `text` varchar(30) NOT NULL,
  `indonesia` varchar(255) DEFAULT NULL,
  `inggris` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`text`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `bahasa` */

insert  into `bahasa`(`text`,`indonesia`,`inggris`) values 
('account','AKUN','ACCOUNT'),
('alert_empty','Username dan password tidak boleh kosong !','Username and password cannot be empty !'),
('alert_failed_login','Username atau Password tidak sesuai ! Silahkan daftar jika belum mempunyai akun.','Incorrect username or pasword ! Please register if you don\'t have an account.'),
('confirm','Konfirmasi','Confirm'),
('fullname','Nama lengkap','Fullname'),
('have_account?','Sudah punya akun?','Do you have account?'),
('logout','Keluar','Logout'),
('order_history','History Pemesanan','Order History'),
('order_ticket','Pesan Tiket','Order a Ticket'),
('register','Daftar','Register'),
('register_caption','Daftar untuk membuat akun anda','Register to create your account'),
('sign','Masuk','Sign in'),
('sign_caption','Masuk untuk memulai sesi anda','Sign in to start your session'),
('success_register','Daftar sukses !','Success register !'),
('train_list','List Kereta','Train List');

/*Table structure for table `detail_tiket` */

DROP TABLE IF EXISTS `detail_tiket`;

CREATE TABLE `detail_tiket` (
  `Kode_Booking` varchar(7) NOT NULL,
  `Id_TmptDuduk` varchar(11) DEFAULT NULL,
  `Id_Jadwal` varchar(10) DEFAULT NULL,
  `Harga` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Kode_Booking`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_tiket` */

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `Id_Jadwal` varchar(10) NOT NULL,
  `Berangkat` varchar(30) NOT NULL,
  `Waktu_Berangkat` datetime NOT NULL,
  `Tujuan` varchar(30) NOT NULL,
  `Perkiraan_Tiba` datetime NOT NULL,
  PRIMARY KEY (`Id_Jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal` */

/*Table structure for table `kereta` */

DROP TABLE IF EXISTS `kereta`;

CREATE TABLE `kereta` (
  `No_Kereta` varchar(3) NOT NULL,
  `Nama_Kereta` varchar(25) NOT NULL,
  `Kelas` enum('Ekonomi','Bisnis','Eksklusif') NOT NULL,
  PRIMARY KEY (`No_Kereta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kereta` */

/*Table structure for table `penumpang` */

DROP TABLE IF EXISTS `penumpang`;

CREATE TABLE `penumpang` (
  `No_Identitas` varchar(40) NOT NULL,
  `Nama_Penumpang` varchar(30) NOT NULL,
  `JK` enum('L','P') NOT NULL,
  `Alamat` varchar(50) DEFAULT NULL,
  `Id_Tipe` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`No_Identitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penumpang` */

/*Table structure for table `tempat_duduk` */

DROP TABLE IF EXISTS `tempat_duduk`;

CREATE TABLE `tempat_duduk` (
  `Id_TmptDuduk` varchar(11) NOT NULL,
  `No_TmptDuduk` varchar(20) NOT NULL,
  `No_Kereta` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`Id_TmptDuduk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tempat_duduk` */

/*Table structure for table `tiket_kereta` */

DROP TABLE IF EXISTS `tiket_kereta`;

CREATE TABLE `tiket_kereta` (
  `Kode_Booking` varchar(7) NOT NULL,
  `No_Identitas` varchar(40) DEFAULT NULL,
  `Check_In` datetime NOT NULL,
  PRIMARY KEY (`Kode_Booking`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tiket_kereta` */

/*Table structure for table `tipe` */

DROP TABLE IF EXISTS `tipe`;

CREATE TABLE `tipe` (
  `Id_Tipe` varchar(7) NOT NULL,
  `Nama_Tipe` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipe` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
