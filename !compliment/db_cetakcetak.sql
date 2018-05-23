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

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admins` */

insert  into `admins`(`id`,`email`,`password`,`username`,`nama`,`status`,`remember_token`,`created_at`,`updated_at`) values (1,'natanzt2@gmail.com','$2y$10$x/Nv2dhbP22sbPA.HnDRp.sFnGe5kO/g9UuSl1hv0BFhmVNEUrvE.','natanzt2',NULL,0,NULL,'2018-05-23 19:14:52','2018-05-23 19:14:52'),(2,'natanzt3@gmail.com','$2y$10$EVfBWhnIXta03vW3EmGAhedmkiSGtxMLGTd1/xxU15n29IftLt8f6','natanzt3',NULL,0,NULL,'2018-05-23 19:17:20','2018-05-23 19:17:20');

/*Table structure for table `detail_layanans` */

DROP TABLE IF EXISTS `detail_layanans`;

CREATE TABLE `detail_layanans` (
  `id` int(11) NOT NULL,
  `layanan_tersedia_id` int(11) DEFAULT NULL,
  `jenis_kertas` varchar(255) DEFAULT NULL,
  `ukuran_kertas` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_layanans` */

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

/*Table structure for table `layanan_tersedias` */

DROP TABLE IF EXISTS `layanan_tersedias`;

CREATE TABLE `layanan_tersedias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `printing_id` int(11) DEFAULT NULL,
  `jenis_printing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `layanan_tersedias` */

insert  into `layanan_tersedias`(`id`,`printing_id`,`jenis_printing`,`created_at`,`updated_at`) values (1,1,NULL,NULL,NULL),(2,1,NULL,NULL,NULL),(3,1,NULL,'2018-05-09 07:19:57','2018-05-09 07:19:57'),(4,1,NULL,'2018-05-09 07:19:57','2018-05-09 07:19:57'),(5,1,NULL,'2018-05-09 07:19:57','2018-05-09 07:19:57'),(6,1,NULL,'2018-05-23 16:47:00','2018-05-23 16:47:00'),(7,1,NULL,'2018-05-23 16:47:00','2018-05-23 16:47:00'),(8,1,NULL,'2018-05-23 16:47:00','2018-05-23 16:47:00'),(9,1,NULL,'2018-05-23 16:47:00','2018-05-23 16:47:00');

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
  `status` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `printings` */

insert  into `printings`(`id`,`nama`,`alamat`,`kabupaten`,`lat`,`lng`,`email`,`username`,`password`,`deskripsi`,`rating`,`status`,`remember_token`,`created_at`,`updated_at`) values (1,'Eka Print Monang Maning','Jalan Gunung Rinjani','Kota Denpasar',-8.665161,115.19878440000002,'natanzt1@gmail.com','natanzt1','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','Eka Print di daerah monang maning',5,NULL,NULL,NULL,'2018-05-23 16:43:33'),(2,'Eka Print Waturenggong','Jalan Gunung Sanghyang','Kota Denpasar',-8.665161,115.19878440000002,'natanzt2@gmail.com','natanzt2','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','Eka Print di daerah waturenggong',5,NULL,NULL,NULL,'2018-05-22 20:10:31');

/*Table structure for table `transaksis` */

DROP TABLE IF EXISTS `transaksis`;

CREATE TABLE `transaksis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `printing_id` int(11) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_selesai` timestamp NULL DEFAULT NULL,
  `status_pemesanan` int(11) NOT NULL DEFAULT '0',
  `bukti_pembayaran` text COLLATE utf8mb4_unicode_ci,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaksis` */

insert  into `transaksis`(`id`,`user_id`,`printing_id`,`tgl_order`,`tgl_selesai`,`status_pemesanan`,`bukti_pembayaran`,`rating`,`created_at`,`updated_at`) values (1,12,1,'2018-05-15 03:51:49','2018-05-23 04:41:21',4,'storage/uploaded_file/12/bukti/pOfGnwAglQtOSXa_1_bukti.jpg',5,'2018-05-14 19:51:49','2018-05-23 16:43:33'),(2,12,2,'2018-05-18 05:05:26',NULL,2,NULL,5,NULL,'2018-05-22 20:10:30'),(3,12,1,'2018-05-23 15:20:04','2018-05-23 16:42:23',3,'storage/uploaded_file/12/bukti/OkU4q2emWjiOYDl_3_bukti.JPG',NULL,'2018-05-23 15:20:04','2018-05-23 16:42:23');

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

insert  into `users`(`id`,`nama`,`email`,`username`,`password`,`foto`,`status`,`remember_token`,`created_at`,`updated_at`) values (12,'John Titor','natanzt1@gmail.com','johntitor11','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','storage/member_profile/johntitor11.jpg',NULL,'G73V2kLkbyQ5mRm1mpSpjCWTFaoYGlRMe36jQzaWN6htuCI2oMyXfPTNn5cO','2018-05-08 03:15:42','2018-05-23 16:51:57'),(13,'John Titor','natanzt11@gmail.com','johntitor1','$2y$10$6JpRibwYNN2kvVSxqMfKL.ecoNem2ofsiIIOOR9a6k/6B/AsVl0M2','storage/member_profile/johntitor1.jpg',NULL,'UiwaFQpKfRPNcMNpMajplV0nvv1wh5jmSDeH4CSsZAPtZX8gLfxrovlvxphz','2018-05-08 03:16:40','2018-05-11 12:09:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
