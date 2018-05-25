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

insert  into `admins`(`id`,`email`,`password`,`username`,`nama`,`status`,`remember_token`,`created_at`,`updated_at`) values (1,'natanzt2@gmail.com','$2y$10$x/Nv2dhbP22sbPA.HnDRp.sFnGe5kO/g9UuSl1hv0BFhmVNEUrvE.','natanzt2','Yonatan Adiwinata',1,NULL,'2018-05-23 23:40:03','2018-05-23 23:40:03'),(2,'natanzt3@gmail.com','$2y$10$EVfBWhnIXta03vW3EmGAhedmkiSGtxMLGTd1/xxU15n29IftLt8f6','natanzt3',NULL,0,NULL,'2018-05-23 19:17:20','2018-05-23 19:17:20');

/*Table structure for table `detail_layanans` */

DROP TABLE IF EXISTS `detail_layanans`;

CREATE TABLE `detail_layanans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan_tersedia_id` int(11) DEFAULT NULL,
  `jenis_kertas` varchar(255) DEFAULT NULL,
  `ukuran_kertas` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `detail_layanans` */

insert  into `detail_layanans`(`id`,`layanan_tersedia_id`,`jenis_kertas`,`ukuran_kertas`,`harga`,`created_at`,`updated_at`) values (2,1,'HVS','A3',1350,NULL,NULL),(3,1,'HVS','A2',1450,NULL,NULL),(5,1,'HVS','A0',4000,'2018-05-24 14:54:03','2018-05-24 14:54:03');

/*Table structure for table `detail_transaksis` */

DROP TABLE IF EXISTS `detail_transaksis`;

CREATE TABLE `detail_transaksis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `detail_layanan_id` int(11) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `jumlah_cetak` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_transaksis` */

insert  into `detail_transaksis`(`id`,`transaksi_id`,`detail_layanan_id`,`jumlah_halaman`,`jumlah_cetak`,`harga`,`file`,`created_at`,`updated_at`) values (1,1,2,1,2,1350,'storage/uploaded_file/12/4WWJ7VYEUxRZHx7_1_2.jpg','2018-05-24 17:01:00','2018-05-24 17:01:00'),(2,2,2,12,1,1350,'storage/uploaded_file/14/7jmZ7ci8WkApVuq_2_2.pdf','2018-05-24 22:55:33','2018-05-24 22:55:33'),(3,3,2,12,1,1350,'storage/uploaded_file/14/Zjdbhl0CBvsuQdJ_3_2.pdf','2018-05-24 23:35:17','2018-05-24 23:35:17'),(4,4,2,12,1,1350,'storage/uploaded_file/14/t8nJo91QnYeCwbo_4_2.pdf','2018-05-24 23:49:34','2018-05-24 23:49:34'),(5,5,2,1,3,1350,'storage/uploaded_file/12/NxXE3DKgl7dJ6Ky_5_2.pdf','2018-05-25 02:17:26','2018-05-25 02:17:26'),(6,6,2,1,1,1350,'storage/uploaded_file/16/4x4NQ9T0KsmNWgz_6_2.jpg','2018-05-25 05:03:12','2018-05-25 05:03:12');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `layanan_tersedias` */

insert  into `layanan_tersedias`(`id`,`printing_id`,`jenis_printing`,`created_at`,`updated_at`) values (1,1,'Poster',NULL,NULL),(2,1,'Banner',NULL,NULL),(3,1,'Flayer',NULL,NULL),(4,1,'Baliho','2018-05-24 15:05:35','2018-05-24 15:05:35');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2018_04_19_191236_printing',1),(2,'2018_04_19_191408_transaksi',1),(4,'2018_04_19_191507_detail_print',1),(5,'2018_04_19_191525_jenis_kertas',1),(6,'2018_04_19_191540_ukuran_kertas',1),(7,'2018_04_19_191557_layanan_tersedia',1),(8,'2018_04_19_194127_user',1),(9,'2018_05_08_091257_jenis__printing',2),(10,'2018_05_10_231139_create_favorites_table',3),(11,'2018_04_19_191448_detail_transaksi',4);

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
  `foto` text COLLATE utf8mb4_unicode_ci,
  `rating` int(11) DEFAULT '3',
  `status` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `printings` */

insert  into `printings`(`id`,`nama`,`alamat`,`kabupaten`,`lat`,`lng`,`email`,`username`,`password`,`deskripsi`,`foto`,`rating`,`status`,`remember_token`,`created_at`,`updated_at`) values (1,'Eka Print Monang Maning','Jalan Gunung Rinjani','Kota Denpasar',-8.665161,115.19878440000002,'natanzt1@gmail.com','natanzt1','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','Eka Print di daerah monang maning, Buka jam 10.00 - 24.00.','storage/printing_profile/natanzt1.jpg',5,1,NULL,NULL,'2018-05-24 16:16:24'),(2,'Eka Print Waturenggong','Jalan Gunung Sanghyang','Kota Denpasar',-8.665161,115.19878440000002,'natanzt2@gmail.com','natanzt2','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','Eka Print di daerah waturenggong',NULL,5,1,NULL,NULL,'2018-05-24 09:55:10'),(5,'Delina Printing Bali','Jalan Tukad Pakerisan no 99, Sidakarya, Renon','Kota Denpasar',-8.678598,115.23022800000001,'delina@mail.com','delina','$2y$10$7umduDmH60irskazo9RlXe8TCoCi64OrtJx6ceoxmRUO1/zY8kXKO','Delina Printing merupakan printing yang mengutamakan pelayanan dan kualitas.',NULL,3,0,NULL,'2018-05-24 19:27:53','2018-05-24 19:27:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaksis` */

insert  into `transaksis`(`id`,`user_id`,`printing_id`,`tgl_order`,`tgl_selesai`,`status_pemesanan`,`bukti_pembayaran`,`rating`,`created_at`,`updated_at`) values (1,12,1,'2018-05-24 17:00:08','2018-05-24 23:17:08',3,NULL,NULL,'2018-05-24 17:00:08','2018-05-24 23:17:08'),(2,14,1,'2018-05-24 21:37:19','2018-05-24 23:19:41',5,'storage/uploaded_file/14/bukti/tP9FUjETgUWZWFG_2_bukti.pdf',5,'2018-05-24 21:37:19','2018-05-24 23:24:58'),(3,14,1,'2018-05-24 23:35:17','2018-05-24 23:39:10',4,'storage/uploaded_file/14/bukti/LXf5FVzVImuQsUD_3_bukti.pdf',5,'2018-05-24 23:35:17','2018-05-24 23:46:14'),(5,12,1,'2018-05-25 02:17:25','2018-05-25 05:19:55',4,'storage/uploaded_file/12/bukti/6lbj7qkIaPVUTaH_5_bukti.pdf',NULL,'2018-05-25 02:17:25','2018-05-25 05:19:55'),(6,16,1,'2018-05-25 05:03:12',NULL,1,'storage/uploaded_file/16/bukti/YbjDhsLPZsBk8kI_6_bukti.jpg',NULL,'2018-05-25 05:03:12','2018-05-25 05:42:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`email`,`username`,`password`,`foto`,`status`,`remember_token`,`created_at`,`updated_at`) values (12,'John Titor','natanzt1@gmail.com','johntitor11','$2y$10$.gU0vm8pebHc71d4mxxupe8f8FYeIFZHt0gvkap35Kjedy2KtrEBW','storage/member_profile/johntitor11.jpg',1,'j59V3qInQW7thwIXbusGaduGt2s6pUR1Edjc4jRnO7L9rZyC5hN9wgZGsm2N','2018-05-08 03:15:42','2018-05-25 03:38:49'),(13,'Johna','natanzt11@gmail.com','johntitor1','$2y$10$6JpRibwYNN2kvVSxqMfKL.ecoNem2ofsiIIOOR9a6k/6B/AsVl0M2','storage/member_profile/johntitor1.jpg',1,'UiwaFQpKfRPNcMNpMajplV0nvv1wh5jmSDeH4CSsZAPtZX8gLfxrovlvxphz','2018-05-08 03:16:40','2018-05-23 21:51:36'),(14,'kadek dede setiawan','dedenht76@gmail.com','kadek_dede_','$2y$10$beynAcC8e0g3DmDxV22tEuKz0gjwKQeuL2M9TmSnkSMOm4pBxtHau','storage/member_profile/kadek_dede_.jpg',NULL,'Rp7ITOALGYebAYpmdsJjqJHctUff82qLAU9hmxKFlfyndpPNWHhcQzRWinf5','2018-05-24 21:29:49','2018-05-24 21:31:40'),(15,NULL,'aaaa@aaa.com','a','$2y$10$wrhZZHnA8FIt6IKfZdYgSON4VKMV1wy63y445KDw67XIi32zUrhq.',NULL,NULL,'1rfuo0R34vsNxiG7Yz3FWcUpjDb3w4LJFeSqPkvAyS5Ubl8BQ81kjTV278EA','2018-05-25 03:30:01','2018-05-25 03:30:01'),(16,'Johna','natanzt4@gmail.com','natanzt4','$2y$10$61pB4/vUu8oApBFkBJx/lOzZukH5hyiQeexAKHxKBqv8PTfObnIBq','storage/member_profile/natanzt4.jpg',NULL,'gTAmNTZEyRnKDTFxaAQlvhya4tOg0TMY4wqOyFle0lb2iv98mdvCOGQuMs2G','2018-05-25 05:01:13','2018-05-25 05:02:14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
