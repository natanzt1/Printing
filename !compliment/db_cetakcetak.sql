/*
SQLyog Enterprise v10.42 
MySQL - 5.5.5-10.1.31-MariaDB : Database - db_cetakcetak
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_cetakcetak` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_cetakcetak`;

/*Table structure for table `detail__prints` */

DROP TABLE IF EXISTS `detail__prints`;

CREATE TABLE `detail__prints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kertas_id` int(11) NOT NULL,
  `ukuran_kertas_id` int(11) DEFAULT NULL,
  `jenis_printing_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail__prints` */

insert  into `detail__prints`(`id`,`jenis_kertas_id`,`ukuran_kertas_id`,`jenis_printing_id`,`created_at`,`updated_at`) values (2,1,1,1,'2018-05-08 12:52:58','2018-05-08 12:52:58'),(3,1,2,1,'2018-05-08 12:54:07','2018-05-08 12:54:07'),(4,1,3,1,'2018-05-08 12:57:02','2018-05-08 12:57:02'),(5,1,4,1,'2018-05-08 12:57:07','2018-05-08 12:57:07'),(6,5,5,2,'2018-05-08 12:58:42','2018-05-08 12:58:42'),(7,5,6,2,'2018-05-08 12:58:48','2018-05-08 12:58:48'),(8,5,5,3,'2018-05-08 12:58:54','2018-05-08 12:58:54'),(9,5,6,3,'2018-05-08 12:58:59','2018-05-08 12:58:59'),(10,5,5,4,'2018-05-08 12:59:06','2018-05-08 12:59:06'),(11,5,6,4,'2018-05-08 12:59:11','2018-05-08 12:59:11'),(12,5,5,5,'2018-05-08 12:59:18','2018-05-08 12:59:18'),(13,5,6,5,'2018-05-08 12:59:23','2018-05-08 12:59:23');

/*Table structure for table `detail_transaksis` */

DROP TABLE IF EXISTS `detail_transaksis`;

CREATE TABLE `detail_transaksis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `layanan_tersedia_id` int(11) NOT NULL,
  `jumlah_halaman` int(11) DEFAULT NULL,
  `jumlah_cetak` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_transaksis` */

insert  into `detail_transaksis`(`id`,`transaksi_id`,`layanan_tersedia_id`,`jumlah_halaman`,`jumlah_cetak`,`harga`,`file`,`created_at`,`updated_at`) values (7,1,1,3,2,1250,'storage/uploaded_file/12/PwT5p5rWpRU9THw_1_1.jpg','2018-05-17 17:29:56','2018-05-17 17:29:56'),(8,1,2,1,1,150000,'storage/uploaded_file/12/yYY9TgrVs4FrqcD_1_1.jpg','2018-05-17 17:31:53','2018-05-17 17:31:53'),(9,2,1,2,2,1250,'storage/uploaded_file/12/33JIcLJTcEBweeU_1_1.jpg','2018-05-17 17:32:10','2018-05-17 17:32:10');

/*Table structure for table `favorites` */

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `printing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `favorites` */

/*Table structure for table `jenis_kertas` */

DROP TABLE IF EXISTS `jenis_kertas`;

CREATE TABLE `jenis_kertas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_kertas` */

insert  into `jenis_kertas`(`id`,`nama`,`created_at`,`updated_at`) values (1,'HVS',NULL,NULL),(2,'ART PAPER 190 GSM',NULL,NULL),(3,'ART PAPER 260 GSM',NULL,NULL),(4,'ART PAPER 300 GSM',NULL,NULL),(5,'ALBATROS',NULL,NULL);

/*Table structure for table `jenis_printings` */

DROP TABLE IF EXISTS `jenis_printings`;

CREATE TABLE `jenis_printings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_printings` */

insert  into `jenis_printings`(`id`,`nama`,`created_at`,`updated_at`) values (1,'Poster, Brosur, Flyer, dan sejenisnya',NULL,NULL),(2,'X-Banner Indoor',NULL,NULL),(3,'X-Banner Outdoor',NULL,NULL),(4,'Banner Indoor',NULL,NULL),(5,'Banner Outdoor',NULL,NULL);

/*Table structure for table `layanan_tersedias` */

DROP TABLE IF EXISTS `layanan_tersedias`;

CREATE TABLE `layanan_tersedias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `printing_id` int(11) NOT NULL,
  `detail__print_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `layanan_tersedias` */

insert  into `layanan_tersedias`(`id`,`printing_id`,`detail__print_id`,`harga`,`created_at`,`updated_at`) values (1,1,2,1250,NULL,NULL),(2,1,6,150000,NULL,NULL),(3,1,3,2500,'2018-05-09 07:19:57','2018-05-09 07:19:57'),(4,1,4,5000,'2018-05-09 07:19:57','2018-05-09 07:19:57'),(5,1,5,10000,'2018-05-09 07:19:57','2018-05-09 07:19:57');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2018_04_19_191236_printing',1),(2,'2018_04_19_191408_transaksi',1),(3,'2018_04_19_191448_detail_transaksi',1),(4,'2018_04_19_191507_detail_print',1),(5,'2018_04_19_191525_jenis_kertas',1),(6,'2018_04_19_191540_ukuran_kertas',1),(7,'2018_04_19_191557_layanan_tersedia',1),(8,'2018_04_19_194127_user',1),(9,'2018_05_08_091257_jenis__printing',2),(10,'2018_05_10_231139_create_favorites_table',3);

/*Table structure for table `printings` */

DROP TABLE IF EXISTS `printings`;

CREATE TABLE `printings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `printings` */

insert  into `printings`(`id`,`nama`,`alamat`,`kabupaten`,`lat`,`lng`,`email`,`username`,`password`,`deskripsi`,`rating`,`remember_token`,`created_at`,`updated_at`) values (1,'Eka Print Monang Maning','Jalan Gunung Rinjani','Kota Denpasar',-8.665161,115.19878440000002,'natanzt1@gmail.com','natanzt1','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','Eka Print di daerah monang maning',3,NULL,NULL,NULL),(2,'Eka Print Waturenggong','Jalan Gunung Sanghyang','Kota Denpasar',-8.665161,115.19878440000002,'natanzt2@gmail.com','natanzt2','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','Eka Print di daerah waturenggong',5,NULL,NULL,'2018-05-22 20:10:31');

/*Table structure for table `transaksis` */

DROP TABLE IF EXISTS `transaksis`;

CREATE TABLE `transaksis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `printing_id` int(11) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_selesai` datetime DEFAULT NULL,
  `status_pemesanan` int(11) NOT NULL DEFAULT '0',
  `bukti_pembayaran` text COLLATE utf8mb4_unicode_ci,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaksis` */

insert  into `transaksis`(`id`,`user_id`,`printing_id`,`tgl_order`,`tgl_selesai`,`status_pemesanan`,`bukti_pembayaran`,`rating`,`created_at`,`updated_at`) values (1,12,1,'2018-05-15 03:51:49',NULL,2,'storage/uploaded_file/12/bukti/pOfGnwAglQtOSXa_1_bukti.jpg',3,'2018-05-14 19:51:49','2018-05-20 20:23:12'),(2,12,2,'2018-05-18 05:05:26',NULL,4,NULL,5,NULL,'2018-05-22 20:10:30');

/*Table structure for table `ukuran_kertas` */

DROP TABLE IF EXISTS `ukuran_kertas`;

CREATE TABLE `ukuran_kertas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ukuran_kertas` */

insert  into `ukuran_kertas`(`id`,`nama`,`created_at`,`updated_at`) values (1,'A4',NULL,NULL),(2,'A3',NULL,NULL),(3,'A2',NULL,NULL),(4,'A1',NULL,NULL),(5,'160 x 60',NULL,NULL),(6,'200 x 200',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `status` int(2) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`email`,`username`,`password`,`foto`,`status`,`remember_token`,`created_at`,`updated_at`) values (12,'John','natanzt1@gmail.com','johntitor11','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','storage/member_profile/johntitor11.jpg',NULL,'THP080yUGrZtwBoqsRdjRsTtEpHy4PKnyX0nUfODVXFWEEOkItdwdptorzlv','2018-05-08 03:15:42','2018-05-11 11:53:47'),(13,'John Titor','natanzt11@gmail.com','johntitor1','$2y$10$6JpRibwYNN2kvVSxqMfKL.ecoNem2ofsiIIOOR9a6k/6B/AsVl0M2','storage/member_profile/johntitor1.jpg',NULL,'UiwaFQpKfRPNcMNpMajplV0nvv1wh5jmSDeH4CSsZAPtZX8gLfxrovlvxphz','2018-05-08 03:16:40','2018-05-11 12:09:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
