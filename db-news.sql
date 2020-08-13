-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 07, 2020 at 01:21 AM
-- Server version: 5.7.28
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-news`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idTinTuc` int(10) UNSIGNED NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_iduser_foreign` (`idUser`),
  KEY `comment_idtintuc_foreign` (`idTinTuc`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `idTinTuc`, `NoiDung`, `created_at`, `updated_at`) VALUES
(1, 10, 93, 'Bài viết này được', '2016-06-09 10:20:45', NULL),
(2, 8, 19, 'Hay quá trời', '2016-06-09 10:20:45', NULL),
(3, 2, 22, 'Tôi rất thích bài viết này', '2016-06-09 10:20:45', NULL),
(4, 2, 41, 'Ý kiến của tôi khác so với bài này', '2016-06-09 10:20:45', NULL),
(5, 6, 50, 'Tôi rất thích bài viết này', '2016-06-09 10:20:45', NULL),
(6, 9, 79, 'Bài viết này được', '2016-06-09 10:20:45', NULL),
(7, 5, 94, 'Bài viết này được', '2016-06-09 10:20:46', NULL),
(8, 8, 99, 'Bài viết này được', '2016-06-09 10:20:46', NULL),
(9, 7, 22, 'Bài viết này được', '2016-06-09 10:20:46', NULL),
(10, 5, 48, 'Tôi chưa có ý kiến gì', '2016-06-09 10:20:46', NULL),
(11, 4, 69, 'Bài viết này chưa được hay lắm', '2016-06-09 10:20:46', NULL),
(12, 5, 87, 'Bài viết này được', '2016-06-09 10:20:46', NULL),
(13, 6, 72, 'Tôi chưa có ý kiến gì', '2016-06-09 10:20:46', NULL),
(14, 5, 6, 'Tôi rất thích bài viết này', '2016-06-09 10:20:46', NULL),
(15, 7, 88, 'Bài viết này được', '2016-06-09 10:20:46', NULL),
(16, 9, 58, 'Bài viết này được', '2016-06-09 10:20:46', NULL),
(17, 1, 19, 'Không thích bài viết này', '2016-06-09 10:20:46', NULL),
(18, 4, 80, 'Tôi rất thích bài viết này', '2016-06-09 10:20:46', NULL),
(19, 10, 40, 'Bài viết này tạm ổn', '2016-06-09 10:20:46', NULL),
(20, 2, 17, 'Bài viết rất hay', '2016-06-09 10:20:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

DROP TABLE IF EXISTS `loaitin`;
CREATE TABLE IF NOT EXISTS `loaitin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idTheLoai` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loaitin_idtheloai_foreign` (`idTheLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitin`
--

INSERT INTO `loaitin` (`id`, `idTheLoai`, `Ten`, `TenKhongDau`, `created_at`, `updated_at`) VALUES
(1, 1, 'Giáo Dục', 'Giao-Duc', NULL, NULL),
(2, 1, 'Nhịp Điệu Trẻ', 'Nhip-Dieu-Tre', NULL, NULL),
(3, 1, 'Du Lịch', 'Du-Lich', NULL, NULL),
(4, 1, 'Du Học', 'Du-Hoc', NULL, NULL),
(5, 2, 'Cuộc Sống Đó Đây', 'Cuoc-Song-Do-Day', NULL, NULL),
(6, 2, 'Ảnh', 'Anh', NULL, NULL),
(7, 2, 'Người Việt 5 Châu', 'Nguoi-Viet-5-Chau', NULL, NULL),
(8, 2, 'Phân Tích', 'Phan-Tich', NULL, NULL),
(9, 3, 'Chứng Khoán', 'Chung-Khoan', NULL, NULL),
(10, 3, 'Bất Động Sản', 'Bat-Dong-San', NULL, NULL),
(11, 3, 'Doanh Nhân', 'Doanh-Nhan', NULL, NULL),
(12, 3, 'Quốc Tế', 'Quoc-Te', NULL, NULL),
(13, 3, 'Mua Sắm', 'Mua-Sam', NULL, NULL),
(14, 3, 'Doanh Nghiệp Viết', 'Doanh-Nghiep-Viet', NULL, NULL),
(15, 4, 'Hoa Hậu', 'Hoa-Hau', NULL, NULL),
(16, 4, 'Nghệ Sỹ', 'Nghe-Sy', NULL, NULL),
(17, 4, 'Âm Nhạc', 'Am-Nhac', NULL, NULL),
(18, 4, 'Thời Trang', 'Thoi-Trang', NULL, NULL),
(19, 4, 'Điện Ảnh', 'Dien-Anh', NULL, NULL),
(20, 4, 'Mỹ Thuật', 'My-Thuat', NULL, NULL),
(21, 5, 'Bóng Đá', 'Bong-Da', NULL, NULL),
(22, 5, 'Tennis', 'Tennis', NULL, NULL),
(23, 5, 'Chân Dung', 'Chan-Dung', NULL, NULL),
(24, 5, 'Ảnh', 'Anh-TT', NULL, NULL),
(27, 1, 'Sennehi 12', '', '2016-06-11 01:43:27', '2016-06-11 01:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_09_021546_Tao_TheLoai', 2),
('2016_06_09_021610_Tao_LoaiTin', 3),
('2016_06_09_021813_Tao_TinTuc', 4),
('2016_06_09_022526_Tao_Slide', 5),
('2016_06_09_022904_Tao_Comment', 6),
('2019_08_19_000000_create_failed_jobs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `Ten`, `Hinh`, `NoiDung`, `theloai`, `created_at`, `updated_at`) VALUES
(5, 'Code', 'qSw3_clint-patterson-ulftbH1sA0k-unsplash.jpg', 'Code If Life ahihi', 'Dev', '2020-07-25 16:23:24', '2020-07-25 16:44:44'),
(6, 'code-2', '0444_florian-olivo-4hbJ-eymZ1o-unsplash.jpg', 'Allway Code', 'Coder', '2020-07-25 16:23:52', '2020-07-25 16:44:17'),
(7, 'code-3', 'v3RP_arnold-francisca-FBNxmwEVpAc-unsplash.jpg', 'Code Code', 'Doanh Nghiệp', '2020-07-25 16:24:25', '2020-07-25 16:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

DROP TABLE IF EXISTS `theloai`;
CREATE TABLE IF NOT EXISTS `theloai` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `Ten`, `TenKhongDau`, `created_at`, `updated_at`) VALUES
(1, 'Xã Hội', 'Xa-Hoi', NULL, NULL),
(2, 'Thế Giới', 'The-Gioi', NULL, NULL),
(3, 'Kinh Doanh', 'Kinh-Doanh', NULL, NULL),
(4, 'Văn Hoá', 'Van-Hoa', NULL, NULL),
(5, 'Thể Thao', 'The-Thao', NULL, NULL),
(6, 'Pháp Luật', 'Phap-Luat', NULL, NULL),
(7, 'Đời Sống', 'Doi-Song', NULL, NULL),
(8, 'Khoa Học', 'Khoa-Hoc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TieuDeKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiBat` int(11) NOT NULL DEFAULT '0',
  `SoLuotXem` int(11) NOT NULL DEFAULT '0',
  `idLoaiTin` int(10) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tintuc_idloaitin_foreign` (`idLoaiTin`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `SoLuotXem`, `idLoaiTin`, `created_at`, `updated_at`) VALUES
(72, 'Đi học', 'di-hoc', ' It was popularised in the 1960s', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'K59l_xps-4TBSG2Oqu0Q-unsplash.jpg', 0, 0, 1, '2020-07-27', '2020-07-27'),
(73, 'Discovery.', 'discovery-', '<p>dfvdvbkdfvb</p>', '<p>dfvdjfvndnfvldfv</p>', 'i8MZ_heye-jensen-fg-u0N2nJAY-unsplash.jpg', 0, 0, 2, '2020-07-27', '2020-07-28'),
(74, 'Jobs', 'jobs', '<p>dfvdfvd</p>', '<p>dvfvdfvdfvdfvdfv</p>', 'A9WM_xps-TxXuh_hAFd8-unsplash.jpg', 0, 0, 11, '2020-07-27', '2020-07-27'),
(75, 'Mussic', 'mussic', '<p>wsdfscwe</p>', '<p>wewefwefsdfs</p>', 'X34T_robert-katzki--D2VGCi1Fzs-unsplash.jpg', 0, 0, 17, '2020-07-27', '2020-07-27'),
(76, 'Image', 'image', '<p>sdfsdfsf</p>', '<p>sdfsdfsdfs</p>', 'kxTa_sean-thomas-jcqvJ7lgy_I-unsplash.jpg', 0, 0, 23, '2020-07-27', '2020-07-27'),
(77, 'Cars', 'cars', 'Contrary to popular belief', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'HodH_julian-hochgesang-rchz6TRY2g4-unsplash.jpg', 0, 0, 4, '2020-07-27', '2020-07-27'),
(78, 'Car vs earth', 'car-vs-earth', 'It is a long established fact that a reader', '<p>scsdcvsdvcsd</p>', 'o6Ag_johnny-lorenzo-YueQLSOeOyI-unsplash.jpg', 0, 0, 6, '2020-07-27', '2020-07-27'),
(79, 'Art', 'art', 'There are many variations of passages of Lorem Ipsum available', 'There are many variations of passages of Lorem Ipsum available', 'SX4s_hiep-duong-tVbW_71SbPI-unsplash.jpg', 0, 0, 12, '2020-07-27', '2020-07-27'),
(80, 'E-Sport', 'e-sport', '<p>Contrary to popular belief.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>', 'Tg9k_walling-OvLXbURo9Wo-unsplash.jpg', 0, 0, 24, '2020-07-27', '2020-07-27'),
(81, 'Picture-Pretty.', 'picture-pretty-', '<p>Contrary to popular belief</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:964px; position:absolute; top:38px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-316px; position:absolute; top:-6px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 'muXL_xps-EzYq1HOl5_8-unsplash.jpg', 0, 0, 19, '2020-07-27', '2020-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Đức Phú13235', 'phubui2702@gmail.com', 0, '$2y$10$uH.HMz0s9JOhyJ3PHM6wy.hhrJ6DtwnfgT/PgQGVxu.KACupezJhi', 'NJlABAo3Mgw7qFqo18kxSDVE7vmVVdQQXL5CbdTERpfLeTq3Dg0MNTAUArCH', '2016-06-09 03:05:09', '2020-07-23 10:07:26'),
(6, 'thanhhuygt', 'admin@gmail.com', 0, '123456', NULL, '2020-07-23 09:22:29', '2020-07-23 09:22:29'),
(7, 'teo', 'abc@gmail.com', 0, '$2y$10$oSs95UpZKZoTIGQSJh8SfOpAonDneHCc365WAopPGhLq3gZT9fVRq', NULL, '2020-07-24 02:21:00', '2020-07-24 02:21:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
