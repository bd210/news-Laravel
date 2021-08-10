-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 11:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newslaravelall`
--

-- --------------------------------------------------------

--
-- Table structure for table `bad_words`
--

CREATE TABLE `bad_words` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `word` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bad_words`
--

INSERT INTO `bad_words` (`id`, `created_at`, `updated_at`, `word`) VALUES
(1, '2021-08-07 14:18:02', '2021-08-07 14:18:02', 'mrs'),
(2, '2021-08-07 14:18:08', '2021-08-07 14:18:08', 'majmun'),
(3, '2021-08-07 14:18:14', '2021-08-07 14:18:14', 'debil'),
(4, '2021-08-07 14:18:18', '2021-08-07 14:18:18', 'retard');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `category_name`) VALUES
(1, '2021-08-06 11:06:40', NULL, 'Sport'),
(2, '2021-08-06 11:06:40', NULL, 'Politic'),
(3, '2021-08-06 11:06:40', NULL, 'World'),
(4, '2021-08-06 11:06:40', NULL, 'Fun'),
(5, '2021-08-06 11:06:40', NULL, 'Health'),
(6, '2021-08-06 11:06:40', NULL, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_comm` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `email`, `content`, `approved_comm`, `post_id`) VALUES
(1, '2021-08-06 14:09:20', '2021-08-06 18:21:22', 'boris.dmitrovic@quantox.com', 'asd123', 1, 2),
(5, '2021-08-07 14:36:11', '2021-08-07 14:36:17', 'boris.dmitrovic@quantox.com', '121221', 1, 1),
(6, '2021-08-07 16:09:33', '2021-08-07 16:10:29', 'marko@gmail.com', 'asdad', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`) VALUES
(77, '123321.png'),
(15, '1625822936_download (2).jpg'),
(16, '1625828256_Instagram-će-početi-da-sakriva-fotošopirane-slike-1 - Copy.jpg'),
(80, '1626166377_123321.png'),
(83, '1626167025_download - Copy.jpg'),
(84, '1626169722_download - Copy.jpg'),
(85, '1626169738_download - Copy.jpg'),
(109, '1626171567_download (2).jpg'),
(110, '1626171567_slike-prirode-za-desktop-757.jpg'),
(120, '1626172279_download (2).jpg'),
(121, '1626172279_download (3).jpg'),
(155, '1626258891_123321.png'),
(156, '1626258996_123321.png'),
(157, '1626259076_asddsa.png'),
(169, '1626264247_Pexels Videos 1003935.mp4'),
(172, '1626267485_Pexels Videos 4552.mp4'),
(191, '1626272879_download - Copy.jpg'),
(192, '1626272879_download (3).jpg'),
(193, '1626272879_download (4) - Copy.jpg'),
(203, '1626276531_download (2).jpg'),
(204, '1626276531_download (4) - Copy.jpg'),
(205, '1626276531_Instagram-će-početi-da-sakriva-fotošopirane-slike-1.jpg'),
(207, '1626276564_download (2).jpg'),
(208, '1626276564_slike-na-platnu-plaza-i-more-nina088-k_4640 - Copy.jpg'),
(214, '1626329085_download (3).jpg'),
(215, '1626329085_Instagram-će-početi-da-sakriva-fotošopirane-slike-1 - Copy.jpg'),
(216, '1626329085_slike-prirode-za-desktop-757.jpg'),
(223, '1626350978_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(224, '1626350978_asddsa.png'),
(225, '1626351131_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(226, '1626351608_download - Copy.jpg'),
(227, '1626351608_download (1).jpg'),
(228, '1626354733_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(229, '1626354733_Pexels Videos 1003935.mp4'),
(232, '1626419980_Pexels Videos 4552.mp4'),
(233, '1626420040_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(234, '1626420040_Pexels Videos 4552.mp4'),
(235, '1626420232_BD CV.pdf'),
(236, '1626433992_slike-prirode-za-desktop-757.jpg'),
(237, '1626434765_Instagram-će-početi-da-sakriva-fotošopirane-slike-1.jpg'),
(238, '1626434822_download (2).jpg'),
(239, '1626434822_download (4).jpg'),
(246, '1627040721_LARAVEL.png'),
(247, '1627040721_pesmicaaa.mp3'),
(248, '1627040721_Pexels Videos 4552.mp4'),
(249, '1627040721_porbitza.jpg'),
(250, '1627285213_LARAVEL.png'),
(251, '1627285213_pesmicaaa.mp3'),
(252, '1627285213_Pexels Videos 4552.mp4'),
(253, '1627286072_Pexels Videos 4552.mp4'),
(254, '1627286072_porbitza.jpg'),
(258, '1627302325_LARAVEL.png'),
(259, '1627302325_pesmicaaa.mp3'),
(260, '1627302325_Pexels Videos 4552.mp4'),
(261, '1627302325_porbitza.jpg'),
(262, '1627367171_admin.png'),
(263, '1627367171_LARAVEL.png'),
(264, '1627367171_pesmicaaa.mp3'),
(265, '1627367171_Pexels Videos 4552.mp4'),
(266, '1627367845_pexels-thirdman-5592438.mp4'),
(267, '1627460758_asd.png'),
(268, '1627460800_asd.png'),
(269, '1627460916_asd.png'),
(270, '1627461071_asd.png'),
(271, '1627461103_asd.png'),
(272, '1627461294_asd.png'),
(273, '1627461537_asd.png'),
(274, '1627461798_asd.png'),
(275, '1627461842_asd.png'),
(276, '1627462602_asd.png'),
(277, '1627462665_asd.png'),
(278, '1627462820_asd.png'),
(279, '1627463513_asd.png'),
(280, '1627463578_asd.png'),
(281, '1627463776_asd.png'),
(282, '1627463828_asd.png'),
(283, '1627463912_Ludi Srbi - Ludi Srbi.mp3'),
(284, '1627463961_Ludi Srbi - Ludi Srbi.mp3'),
(285, '1627464329_Ludi Srbi - Crna Glava.mp3'),
(286, '1627464329_Ludi Srbi - DLR.mp3'),
(287, '1627464329_Ludi Srbi - Idemo Niš.mp3'),
(288, '1627464732_Ludi Srbi - Idemo Niš.mp3'),
(289, '1627465019_Ludi Srbi - LS NS.mp3'),
(290, '1627465019_Ludi Srbi - Mene Ne Radi.mp3'),
(291, '1627465791_Lexington - Balkanska pravila - 01 Pile - (Audio 2014).mp3'),
(292, '1627465791_Lexington - Balkanska pravila - 02 Ako se ne vidimo - (Audio 2014).mp3'),
(293, '1627465791_Lexington - Balkanska pravila - 03 Treznili me prijatelji.mp3'),
(294, '1627477065_download - Copy.jpg'),
(295, '1627477065_download (1).jpg'),
(297, '1627542643_admin.png'),
(298, '1627542643_asd.png'),
(299, '1627545155_admin.png'),
(300, '1627545155_asd.png'),
(301, '1627545782_asd.png'),
(302, '1627545782_LARAVEL.png'),
(303, '1627545782_Ludi Srbi - Ludi Srbi.mp3'),
(304, '1627545897_Pexels Videos 1003935.mp4'),
(308, '1628076779_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(309, '1628076779_Pexels Videos 4552.mp4'),
(310, '1628076779_pexels-thirdman-5592438.mp4'),
(311, '1628076852_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(313, '1628076852_Pexels Videos 1003935.mp4'),
(312, '1628076852_Pexels Videos 4552.mp4'),
(314, '1628077090_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(315, '1628077090_Pexels Videos 1003935.mp4'),
(316, '1628077090_pexels-thirdman-5592438.mp4'),
(317, '1628083872_pexels-thirdman-5592438.mp4'),
(318, '1628084540_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(319, '1628084540_Pexels Videos 1003935.mp4'),
(320, '1628084540_pexels-thirdman-5592438.mp4'),
(321, '1628084706_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(322, '1628084706_Pexels Videos 1003935.mp4'),
(323, '1628084706_pexels-thirdman-5592438.mp4'),
(325, '1628084805_Pexels Videos 1003935.mp4'),
(324, '1628084805_Pexels Videos 4552.mp4'),
(326, '1628229878_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(327, '1628229878_Pexels Videos 4552.mp4'),
(328, '1628230026_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(329, '1628230026_Pexels Videos 1003935.mp4'),
(330, '1628230027_pexels-thirdman-5592438.mp4'),
(331, '1628231345_download (2).jpg'),
(332, '1628232165_download - Copy.jpg'),
(333, '1628232165_download (3).jpg'),
(334, '1628232166_download (4) - Copy.jpg'),
(335, '1628232516_download (4).jpg'),
(336, '1628232516_Instagram-će-početi-da-sakriva-fotošopirane-slike-1 - Copy.jpg'),
(337, '1628234182_slike-na-platnu-plaza-i-more-nina088-k_4640.jpg'),
(338, '1628234182_slike-prirode-za-desktop-757.jpg'),
(339, '1628239927_Pexels Videos 4552.mp4'),
(340, '1628239928_porbitza.jpg'),
(341, '1628345543_Aca Lukas - Bele ruze - (Audio 2000).mp3'),
(343, '1628345543_Pexels Videos 1003935.mp4'),
(342, '1628345543_Pexels Videos 4552.mp4'),
(344, '1628345543_pexels-thirdman-5592438.mp4'),
(345, '1628584359_pesmicaaa.mp3'),
(346, '1628584359_Pexels Videos 4552.mp4'),
(347, '1628584359_upd2.png'),
(348, '1628584359_upd3.png'),
(349, '1628584428_porbitza.jpg'),
(350, '1628585380_admin.png'),
(351, '1628585380_asd.png'),
(352, '1628585380_asdus.png'),
(353, '1628585380_passswrd.png'),
(9, 'featured_img1.jpg'),
(10, 'featured_img2.jpg'),
(11, 'featured_img3.jpg'),
(7, 'news_thumbnail2.jpg'),
(8, 'news_thumbnail3.jpg'),
(4, 'photograph_img3.jpg'),
(2, 'single_post_img.jpg'),
(3, 'slider_img1.jpg'),
(6, 'slider_img4.jpg'),
(78, 'temp - Copy.png'),
(79, 'temp.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_20_103154_create_bad_words_table', 1),
(2, '2021_07_20_103234_create_categories_table', 1),
(3, '2021_07_20_103415_create_files_table', 1),
(4, '2021_07_20_103544_create_permissions_table', 1),
(5, '2021_07_20_103941_create_roles_table', 1),
(6, '2021_07_20_103942_create_users_table', 1),
(7, '2021_07_20_103955_create_tags_table', 1),
(8, '2021_07_20_104150_create_verify_comments_table', 1),
(9, '2021_07_22_115213_create_posts_table', 1),
(10, '2021_07_22_115603_create_post_files_table', 1),
(11, '2021_07_22_115614_create_post_tags_table', 1),
(12, '2021_07_22_115632_create_post_likes_table', 1),
(13, '2021_07_22_121352_create_comments_table', 1),
(14, '2021_07_29_101651_create_visits_table', 1),
(15, '2021_07_29_101653_create_password_resets_table', 1),
(16, '2021_07_29_101654_create_failed_jobs_table', 1),
(17, '2021_07_29_101656_create_permission_roles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('boris.dmitrovic@quantox.com', '$2y$10$xctJKb27MAJbhPDvdK6/xuczskUwAldeEcCpnlh4pgqjyASAazLii', '2021-08-08 15:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(1, '2021-07-12 04:27:06', '2021-08-07 15:08:23', 'create-post', 'This permission can create posts.'),
(2, '2021-07-12 04:27:06', '2021-08-07 15:08:33', 'delete-post', 'This permission can delete posts.'),
(3, '2021-07-12 04:27:06', '2021-08-07 15:08:41', 'update-post', 'This permission can update posts.'),
(5, '2021-07-12 04:27:06', '2021-08-07 15:08:50', 'approve-post', 'This permission can approve posts.'),
(9, '2021-07-19 08:45:13', '2021-08-07 15:07:46', 'create-user', 'This permission can create user.'),
(10, '2021-07-19 08:45:13', '2021-08-07 15:07:56', 'delete-user', 'This permission can delete user.'),
(11, '2021-07-19 08:45:13', '2021-08-07 15:08:13', 'update-user', 'This permission can update user.'),
(12, '2021-07-19 08:46:05', '2021-08-07 15:07:12', 'create-role', 'This permission can create role.'),
(13, '2021-07-19 08:46:05', '2021-08-07 15:07:24', 'delete-role', 'This permission can delete role.'),
(14, '2021-07-19 08:46:05', '2021-08-07 15:07:34', 'update-role', 'This permission can update role.'),
(15, '2021-07-19 08:46:45', '2021-08-07 15:06:42', 'create-tag', 'This permission can create tag.'),
(16, '2021-07-19 08:46:45', '2021-08-07 15:06:52', 'delete-tag', 'This permission can delete tag.'),
(17, '2021-07-19 08:46:45', '2021-08-07 15:07:01', 'update-tag', 'This permission can update tag.'),
(18, '2021-07-19 08:47:36', '2021-08-07 15:06:13', 'create-category', 'This permission can create category.'),
(19, '2021-07-19 08:47:36', '2021-08-07 15:06:22', 'delete-category', 'This permission can delete category.'),
(20, '2021-07-19 08:47:36', '2021-08-07 15:06:31', 'update-category', 'This permission can update category.'),
(21, '2021-07-19 08:48:43', '2021-08-07 15:05:38', 'create-frobidden-word', 'This permission can create forbidden word.'),
(22, '2021-07-19 08:48:43', '2021-08-07 15:05:50', 'delete-forbidden-word', 'This permission can delete forbidden word.'),
(23, '2021-07-19 08:48:43', '2021-08-07 15:06:04', 'update-forbidden-word', 'This permission can update forbidden word.'),
(24, '2021-07-19 08:49:50', '2021-08-07 15:05:04', 'create-permission', 'This permission can create permission.'),
(25, '2021-07-19 08:49:50', '2021-08-07 15:05:15', 'delete-permission', 'This permission can delete permission.'),
(26, '2021-07-19 08:49:50', '2021-08-07 15:05:27', 'update-permission', 'This permission can update permission.'),
(27, '2021-07-19 08:50:22', '2021-08-07 15:04:45', 'update-permission-role', 'This permission can update permission role.'),
(29, '2021-07-19 08:51:42', '2021-08-07 15:04:27', 'delete-comment', 'This permission can delete comment.'),
(32, '2021-07-19 11:04:10', '2021-08-07 15:04:16', 'delete-file', 'This permission can delete file.');

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_roles`
--

INSERT INTO `permission_roles` (`permission_id`, `role_id`) VALUES
(3, 4),
(11, 4),
(14, 4),
(20, 4),
(26, 4),
(1, 1),
(2, 1),
(3, 1),
(5, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(29, 1),
(32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `edited_by` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `content`, `author_id`, `approved_by`, `edited_by`, `category_id`) VALUES
(1, '2021-06-18 02:56:00', '2021-07-28 08:57:45', 'Title 2 Title 2', 'Conten2 Content 2  Conten2 Content 2  Conten2 Content 2', 1, 1, 1, 6),
(2, '2021-06-18 02:56:00', NULL, 'Title 1', ' Content 1 Content 1 Content 1 Content 1   ', 1, 1, 1, 3),
(3, '2021-06-18 02:59:02', '2021-08-06 07:02:26', 'Title 6', 'Content 6 Content6 Content6 Content6  ', 3, 1, 1, 5),
(4, '2021-06-18 02:59:02', NULL, 'Title 5', 'Content 5 Content 5 Content 5 Content 5       ', 1, 1, 1, 4),
(5, '2021-06-18 02:59:02', NULL, 'Title 4 Titlte 4', 'Content 4 Content 4         Content 4 Content 4    Content 4 Content 4    Content 4 Content 4    ', 1, 1, 1, 3),
(6, '2021-06-18 02:59:02', NULL, 'Title 3Title 3', 'Content 3 Content 3        Content 3 Content 3    Content 3 Content 3    Content 3 Content 3    Content 3 Content 3    Content 3 Content 3    ', 1, 1, 1, 2),
(7, '2021-06-18 03:00:02', '2021-07-08 09:04:43', 'Title 8', 'Content 8 Content8 Content8 Content8 Content8             ', 1, 1, 1, 1),
(8, '2021-06-18 03:00:02', '2021-08-10 08:15:53', 'Title 7 ', ' Content 7 Content 7 Content7 Content 7 Content 7             ', 3, 1, 1, 6),
(9, '2021-06-18 03:02:18', NULL, 'Title 12', 'Content 12  Content 12 Content 12 Content 12 Content 12 Content 12 Content 12 Content 12    ', 1, 2, 1, 5),
(10, '2021-06-18 03:02:18', NULL, 'Title 11', 'Content 11 Content 11 Content 11 Content 11 Content 11 Content 11 Content 11   ', 1, 3, 1, 5),
(11, '2021-06-18 03:02:18', NULL, 'Title 10', 'Content 10 Content 10 Content 10 Content 10 Content 10 Content 10 Content 10             ', 1, 1, 1, 4),
(12, '2021-06-18 03:02:18', NULL, 'Title 9', ' Content 9 Content9 Content9 Content9 Content9             ', 1, 1, 1, 2),
(13, '2021-06-21 08:52:50', '2021-07-15 09:12:14', 'Title 13', ' Content 13  Content 13  Content 13  Content 13  Content 13  Content 13              ', 1, 1, 1, 1),
(85, '2021-07-13 05:03:45', '2021-07-14 10:27:59', 'Ovo je neka proba', '                          probejsn                                                     ', 1, 1, 1, 5),
(90, '2021-07-13 10:02:39', '2021-07-15 08:20:08', 'Konacno123', '                                      Konacno proba                                                                                                                            ', 1, 1, 1, 4),
(101, '2021-07-15 02:04:45', '2021-07-16 07:19:20', 'Ttitle X  ', '      Content X Contente X  Content X Contente X  Content X Contente X  Content X Contente X                                                               ', 3, 1, 1, 1),
(107, '2021-07-16 07:13:12', NULL, 'Proba naslov 1', '                        asasass                        ', 1, 1, NULL, 4),
(108, '2021-07-16 07:26:05', '2021-08-06 14:03:48', 'Proba naslov 13', 'hvyf  assa', 1, 1, 1, 3),
(109, '2021-07-16 07:27:02', '2021-08-07 14:12:03', 'Proba naslov 2332', 'sfafsgfsf', 1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `post_files`
--

CREATE TABLE `post_files` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `file_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_files`
--

INSERT INTO `post_files` (`post_id`, `file_id`) VALUES
(85, 84),
(107, 120),
(108, 11),
(109, 3),
(2, 109),
(6, 109),
(4, 2),
(8, 110),
(12, 121),
(9, 120),
(13, 156),
(101, 229),
(90, 110),
(101, 109),
(1, 294);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`) VALUES
(108, 2),
(108, 7);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_name`) VALUES
(1, '2021-08-06 11:05:25', NULL, 'Admin'),
(2, '2021-08-06 11:05:25', NULL, 'User'),
(3, '2021-08-06 11:05:25', NULL, 'Operator'),
(4, '2021-08-06 11:05:25', NULL, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keyword` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `keyword`) VALUES
(1, '2021-08-06 18:00:57', NULL, 'FK'),
(2, '2021-08-06 18:01:12', NULL, 'Zvezda'),
(3, '2021-08-06 18:01:12', NULL, 'Partizan'),
(4, '2021-08-06 18:01:12', NULL, 'Football'),
(5, '2021-08-06 18:01:12', NULL, 'Tenis'),
(6, '2021-08-06 18:01:12', NULL, 'KK'),
(7, '2021-08-06 18:01:12', NULL, 'tag1'),
(8, '2021-08-06 18:01:12', NULL, 'tag2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`) VALUES
(1, '2021-08-06 12:28:50', '2021-08-06 12:28:50', 'Boris', 'Dmitrovic', 'boris.dmitrovic@quantox.com', NULL, '$2y$10$CiKJCyp799dkTdlklhO4hO0djhjuN7.f86ALLUU.bozAKG8NVQLr2', 1, 'tUS6Qj254sXiO6tUhLeFW6pBdJFrQomuo536i3a9gGwgE6Xuc8r146pDSUV9'),
(2, '2021-08-06 11:05:45', '2021-08-06 11:05:45', 'Dorcas', 'Bechtelar', 'moshe.stanton@hotmail.com', NULL, '1003cfabd1ca9e486fd9aacd7515b002', 1, 'M6KJHgL9Ik'),
(3, '2021-08-06 11:05:45', '2021-08-06 11:05:45', 'Ferne', 'Abbott', 'yzboncak@goyette.org', NULL, '57e095b98d1aa70a3cc00e09d7f476ed', 2, '5GPi3XA3QC'),
(4, '2021-08-06 11:05:45', '2021-08-06 11:05:45', 'Claudine', 'Smith', 'brady.will@yahoo.com', NULL, 'd30d73726bedb8d5a1cb86b7427de17c', 2, '8xFvvIHdAT'),
(5, '2021-08-06 11:05:45', '2021-08-06 11:05:45', 'Magdalena', 'Goldner', 'bogisich.neoma@yahoo.com', NULL, 'cd2d28fa52feebe98429bc5db24845d8', 1, 'hDlOISAazD'),
(6, '2021-08-06 11:05:45', '2021-08-06 11:05:45', 'Baylee', 'Sanford', 'champlin.maximillia@gmail.com', NULL, '2317648a3bce75d2c135af9f9641214d', 1, 'VlaE3MVeAS'),
(7, '2021-08-06 11:05:45', '2021-08-06 11:05:45', 'Lukas', 'Wolff', 'felicity44@beer.org', NULL, '52714fba0e6ed578b23200f20b1a1dde', 2, '2IoH6WxFvk'),
(8, '2021-08-06 11:05:45', '2021-08-06 11:05:45', 'Nathen', 'Kertzmann', 'beer.jadyn@brakus.com', NULL, 'ed422642f30772da6047ad9e4f6383c6', 3, '8EKSS0YYQj'),
(9, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Johanna', 'Durgan', 'bogisich.ryann@gmail.com', NULL, '3e85f18e9d12ec9cff6e2067c9c570b9', 1, 'qxVGEzrQUt'),
(10, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Sunny', 'Bruen', 'ferne.boyer@gmail.com', NULL, 'fa189c48da142ec0f0b4f91eb1a86a0c', 4, 'E9CcJ3YVeE'),
(11, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Durward', 'Rice', 'demetrius.watsica@nader.com', NULL, 'd8973016724f036dc626f9cca3294527', 4, 'jqdEcht8ZJ'),
(12, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Jodie', 'Macejkovic', 'ischinner@hahn.info', NULL, 'cf24a53a5c458507c4af4a558ebb7cf9', 2, 'TOZADHr7Xc'),
(13, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Brendan', 'Tromp', 'schulist.marc@glover.com', NULL, 'fc2b2939b5d6234bbffaea4d19cb5795', 1, 'DesXH0SM9M'),
(14, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Nikko', 'Dickinson', 'blick.yvette@harvey.biz', NULL, '5087f2795d2687fa715998814c520fea', 4, 'ycre9rHJgm'),
(15, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Gus', 'Lakin', 'krajcik.graciela@gmail.com', NULL, '4a5bd8d52468f65f4635e51e593e952d', 4, 'wm2Nkn2thn'),
(16, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Leif', 'Quigley', 'moen.caroline@hotmail.com', NULL, '212563f3cd0e8df2aefa5a707a65743b', 1, 'EHxLbYPUCN'),
(17, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Halie', 'Gaylord', 'floy58@crooks.com', NULL, 'dd8f7f35f2cda4db7672f13c92ce858b', 1, '0RAKJ8aZj9'),
(18, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Silas', 'Dooley', 'francisca.kerluke@yahoo.com', NULL, 'b38e1e2b554b9b08df6a3f5c7d1911a9', 3, 'LYkU2USrUx'),
(19, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Wayne', 'Buckridge', 'kimberly.grant@lebsack.org', NULL, '2c90480b46f8952c9ac78073a4c9cdb3', 1, '3rNEsCWp1H'),
(20, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Vito', 'Rodriguez', 'ethel.lynch@dickinson.com', NULL, 'f62b41925e179011f974e61d970b412a', 4, '0WPNZVMVnN'),
(21, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Maryam', 'Hoppe', 'ferne.brakus@effertz.org', NULL, 'c5ae3d967ba097bad9aef11ba7c1942e', 4, 'KLdf0dVMRv'),
(22, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Eileen', 'Parisian', 'lindsay02@wilderman.com', NULL, '87a940f908e8b339360a9094b0075814', 2, 'zWCcEd1utm'),
(23, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Jayne', 'Glover', 'alvena.boyer@hotmail.com', NULL, '181837695ef57f325d864c61ee63eabf', 4, 'QJexmXhc3N'),
(24, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Aliza', 'Grady', 'sanford.delphia@yahoo.com', NULL, 'aa5f29878475a54f6d571ca2bd667c0a', 1, 'r6m2rb8goq'),
(25, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Constantin', 'Botsford', 'bdonnelly@labadie.info', NULL, 'f8db65a688ced2ef01b65a740778ed35', 2, '4sRT3KChO8'),
(26, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Andre', 'Kovacek', 'orlo.conn@hotmail.com', NULL, 'b9f983184c3e376acdf4b5f0baa96cda', 1, 'hDFFiEKuN8'),
(27, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Albertha', 'Schinner', 'grau@cruickshank.com', NULL, 'dbe58e625742cd20e12b212f4c9c1f0f', 1, 'EeIdlxXKGH'),
(28, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Heidi', 'Klocko', 'bosco.loren@breitenberg.com', NULL, '8e615606e1f032c038e2bb2bef9025d8', 4, 'NN2JXsjPG4'),
(29, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Doyle', 'Gorczany', 'dzemlak@yahoo.com', NULL, '21be07593001857e0bd5aab0322afd5f', 2, 'tRnyWZHA14'),
(30, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Meggie', 'Shanahan', 'egorczany@torphy.com', NULL, 'b025ade7bb80838d7e62227a21f07477', 4, 'GjgsynuZi2'),
(31, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Kailee', 'Hahn', 'loy.beier@hudson.com', NULL, '732ab4d9a0cf775a81a5600a58e0b60f', 4, '3MSNpTy9MW'),
(32, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Oran', 'Russel', 'stella.west@yahoo.com', NULL, '2884dc6a6bdc119422c03022033aff81', 2, 'pvuPjwTlib'),
(33, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Madaline', 'Pouros', 'mathias54@jast.com', NULL, 'da3973f4c4cfbfd426640a17eefe0e5b', 1, 'QkrpGNM5mq'),
(34, '2021-08-06 11:05:46', '2021-08-06 11:05:46', 'Max', 'Witting', 'tillman.sigurd@hotmail.com', NULL, 'c463c011eb04b79d1a52145c749b6036', 2, 'coEQHMaY03'),
(35, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Holly', 'Lind', 'buck.jakubowski@hackett.org', NULL, '1bf6ae55dceb68de5c61fd2f87f685f9', 4, 'XX8cRKw1pH'),
(36, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Santina', 'Purdy', 'cameron.rutherford@fay.net', NULL, '89ff9c25411f5489634edda1cfb2c6bb', 4, 'vuzeK7FHRn'),
(37, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Aliza', 'Simonis', 'crooks.chesley@bernier.com', NULL, 'cff2fb4a24bee9608210240f0c504852', 1, 'BeNxxuNqMD'),
(38, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Noemy', 'Schamberger', 'padberg.paolo@hotmail.com', NULL, '5fe66c8f2871ad2f93baaf8df8116174', 1, 'UkBduw0ClQ'),
(39, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Keshawn', 'Anderson', 'chyna98@swift.net', NULL, 'c8994102fb98f68170b1b7fe4763621d', 4, '6VeCVsP4C0'),
(40, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Dejuan', 'McClure', 'wintheiser.faye@wyman.biz', NULL, '98e177a22c77690c5bebb1448af08d4f', 2, 'McPaSOVQXC'),
(41, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Imelda', 'Mohr', 'maymie.gutmann@thompson.com', NULL, 'ac2bb61d04801cc30230ccaf50aba379', 4, 'Udrkho1ubc'),
(42, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Jannie', 'Brown', 'charity38@gmail.com', NULL, '5551f45be7207c52f4cefb3f037b6506', 1, '0PtuDsE3J4'),
(43, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Filomena', 'Weimann', 'esauer@hotmail.com', NULL, '6fc86153e302fe6551d4eed30f8fb40d', 3, 'ehcXCFCwBH'),
(44, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Talia', 'Rau', 'mwatsica@okon.com', NULL, 'a7c7e0c9a680ec437cb250b1bf0c2f79', 3, 'XvbbgRHiXU'),
(45, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Alexandro', 'Barrows', 'audrey.waters@hotmail.com', NULL, '95894ca37a3d50988f3767652c266f4b', 1, 'I7nBQNqtj4'),
(46, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Joshuah', 'Shields', 'harry.hills@yahoo.com', NULL, 'efa6e5a8d8a3d831edf11a346f8fadc5', 3, 'SSM0ZYAE2L'),
(47, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Alexandrea', 'Kshlerin', 'willow53@hegmann.org', NULL, '48c250adf48745ef1f379ed9fd400ca9', 1, '4dryxbpDU6'),
(48, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Edyth', 'Ullrich', 'carroll.austyn@gmail.com', NULL, 'a306ce5dc81134f26ab9b1b57e1a7dee', 3, '59AFDSbidX'),
(49, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Estevan', 'Walsh', 'vmohr@gmail.com', NULL, 'e3d947a04bc8e5416c611b47aab46ff3', 4, 'KMtS1sOXjB'),
(50, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Edwina', 'Stroman', 'madisen.murphy@wyman.net', NULL, 'd08d9c47e350e6b1fce9103bb2710969', 2, 'OcaknVxzf3'),
(51, '2021-08-06 11:05:47', '2021-08-06 11:05:47', 'Robbie', 'Lakin', 'garfield.koch@casper.com', NULL, '2d1cd08c32eb7d7bd42b7dfbb90639c6', 1, '5z0WBSDotV'),
(52, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Hazle', 'Hartmann', 'willy.raynor@halvorson.biz', NULL, 'b124b47067752e55c9244349e0ae5f73', 4, 'SqN48La7fR'),
(53, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Abraham', 'Heller', 'skerluke@gmail.com', NULL, 'a711b8135d0d87eb1c52190122d0b2ec', 1, '6ZxH8StSMP'),
(54, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Theodora', 'Wunsch', 'kcorwin@daniel.com', NULL, 'b023ae72930c6ec7bf165ed2c5f009c1', 2, 'ZQcz6BERMq'),
(55, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Aisha', 'Kemmer', 'judge.anderson@stamm.net', NULL, '33100fc71a9fee637d0ff7719ca780af', 2, 'ArgtB24b66'),
(56, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Tyson', 'Bartell', 'noemie35@gmail.com', NULL, '8912c2ca993a10da95476387bb4c2fdc', 1, 'U3rw4IwBVd'),
(57, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Brielle', 'Fritsch', 'russel.carlotta@blanda.info', NULL, 'b50b5199bf0fe812d4f92cbb93dc0dfc', 1, 'Be1gETNBCD'),
(58, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Oral', 'Fadel', 'peyton.lueilwitz@hotmail.com', NULL, '2aa1a68024ec04ededafe9f861e4652f', 1, 'U4uQUJrgaj'),
(59, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Emelie', 'Johns', 'cruickshank.fred@stroman.org', NULL, '051ea5e11cda94afd8fb5a3dfa3d3d11', 2, '620OLG9sYT'),
(60, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Anya', 'Botsford', 'thompson.melany@hotmail.com', NULL, '4f3a2b30d8e1ba3c124bfd14dc84d18a', 2, 'a3Y0YtJRpR'),
(61, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Ardella', 'Gorczany', 'ally89@yahoo.com', NULL, '6a4b2d987dcd6c61dc8e13439b74cd88', 1, 'DgEGRi6HFt'),
(62, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Lucinda', 'Adams', 'glennie43@yahoo.com', NULL, '107c0308dbfafb901c43fa4cadb75fe7', 4, 'vmjZpIWlxY'),
(63, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Raquel', 'Schmeler', 'shawna41@gmail.com', NULL, '29ffd2360bcaf529506442d5993bc0c9', 4, 'h8psUzNdNi'),
(64, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Elroy', 'Fisher', 'weimann.eleazar@yahoo.com', NULL, '35c9d755ffaf4cef2ad32555ad40f91b', 2, 'ZHwQK1r2Pj'),
(65, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Chaya', 'Huels', 'marks.fabian@yahoo.com', NULL, 'f5488e05cf4f47e6623b9175b15c0a49', 1, 'RJ6G5ihJxI'),
(66, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Kathleen', 'Langosh', 'fprosacco@yahoo.com', NULL, '533072d79f963cacb6eb84c2a4cd5d91', 4, 'ymQRRfrtEf'),
(67, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Reba', 'Kunze', 'trycia.lehner@kuhn.com', NULL, '0a3ef2c116191e39a5ddc14fe6511cfd', 3, 'jUbqC1IPqv'),
(68, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Cade', 'Olson', 'darrel.buckridge@hickle.com', NULL, 'b871a1297b2d9e6ad507e2c2d7bb4abc', 4, '1mpX3tYHVD'),
(69, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Sabryna', 'Hauck', 'lucienne.kuhlman@gmail.com', NULL, '545c84bbf041f63a548f74a66dcdd388', 1, '5qp4sj33x2'),
(70, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Janiya', 'Mosciski', 'keon73@gmail.com', NULL, '3304bf420d37729233b2fc9e1713f337', 3, '9sicyxYZ3r'),
(71, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Dixie', 'Beahan', 'sven06@hotmail.com', NULL, '77b1a7c7adc501726d80651c2dff1216', 2, 'bMubwWxM61'),
(72, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Lilla', 'Fisher', 'sienna15@gmail.com', NULL, '5215dc69348b1268cfefad0ebf134aec', 3, 'ZGwSUoSWW7'),
(73, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Monte', 'Medhurst', 'kelley.hodkiewicz@kilback.com', NULL, 'f846034b5c648868858ace9d61c60b7e', 3, 'TtzSoSjNP7'),
(74, '2021-08-06 11:06:43', '2021-08-06 11:06:43', 'Merritt', 'Marvin', 'sandrine.sawayn@gmail.com', NULL, '3f25abfab470d1a76317ac1a5e9f8119', 3, 'Rpibid40z5'),
(76, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Earlene', 'Ferry', 'lou11@pouros.info', NULL, 'be3de743005768897172ec5f412b3aa2', 3, 'ctyfbzBUjW'),
(77, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Geraldine', 'Jacobs', 'andreane.conn@gmail.com', NULL, '1357af1dece30a2f535d4e5f41be42d1', 2, 'WsbpxEjrT5'),
(78, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Archibald', 'Stanton', 'krista93@hotmail.com', NULL, '6a2091b88997037d8ac355a4a5e52ba5', 4, 'YiEZURLzxV'),
(79, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Rigoberto', 'Maggio', 'madyson.schmeler@tillman.com', NULL, 'c7dd6ecc5bb85348ce080df21006e295', 3, 'qoMaHR3FYh'),
(80, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Antone', 'Wolf', 'fisher.aidan@yahoo.com', NULL, 'f1eb1e0b40f17e55f3c80201de787969', 1, '7oFRuPcIOQ'),
(81, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Kyla', 'Hilpert', 'josephine.batz@hartmann.biz', NULL, 'aaf76caf5eb133558d3e4857d36840cd', 4, 'qNZcE1NGJv'),
(82, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Kristofer', 'Adams', 'vernon.bergnaum@spinka.com', NULL, '70f7a113861143310b9622eaecc113fb', 1, '4cwxNOu5y1'),
(83, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Lois', 'Williamson', 'turcotte.bethel@hotmail.com', NULL, 'fd4ddfa8555e7084b86256c20141a589', 4, 'CJE8ZkCbJW'),
(84, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Elfrieda', 'Koss', 'darrion.schuppe@hotmail.com', NULL, '24231266ecc45ff501a35190491c897a', 2, 'xH3FykeMLx'),
(85, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Lillian', 'Block', 'nat09@brekke.com', NULL, 'ef9031c9b44b22421eaff7c9a08e39be', 3, 'Iteq23xO9a'),
(86, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Alisa', 'Abshire', 'reid.hayes@gmail.com', NULL, 'd75a01cb88383543408d01d18fde8936', 3, 'CzRViGPRAO'),
(87, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Carlos', 'Schuppe', 'beer.thea@erdman.com', NULL, '5314fc7a93050e8c0c9bbac42dfa0882', 4, 'ffusO4jVWv'),
(88, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Marcia', 'Legros', 'volkman.lazaro@gmail.com', NULL, '65c0e8b01ead4fd4313aacde98581afa', 4, '3wsc2bpfUY'),
(89, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Luz', 'O\'Conner', 'helene.kuhn@wisozk.com', NULL, 'c1f8d4cf0bcd3baf20ad1faa9a24565e', 3, 'Cfi7wTBgXN'),
(90, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Travon', 'Bode', 'gilda64@hotmail.com', NULL, 'b98ae0be38fefd971d557eae43e465bb', 3, 'RQ79S1Tm7c'),
(91, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Thurman', 'Pouros', 'fmuller@crona.com', NULL, '69cd8b1386c8b34c7c1709350088f364', 2, 'P9OyNxLU3Q'),
(92, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Cindy', 'Buckridge', 'gbernier@hahn.com', NULL, '2509c11c9a1cfb195a4e0f2bf9ae6fd4', 3, '3ECJ1zxe7f'),
(93, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Arlie', 'Anderson', 'lue.ziemann@hotmail.com', NULL, '6f8a597f2e1cc83de73f32a174c886a4', 2, 'Kn2Yw59viO'),
(94, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Ramon', 'Kirlin', 'amalia.walker@gmail.com', NULL, '805822d6a5939ea95081270bf7db0df5', 2, 'OpiUyEikiH'),
(95, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Khalil', 'Dibbert', 'brandy.mertz@gmail.com', NULL, 'fa9d65d91de8023ff88d547c3096aa7f', 2, 'BehamQq4Tw'),
(96, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Clarabelle', 'Bosco', 'hroob@gmail.com', NULL, '2b230cd2d4cf3ee61acee5b50b32b533', 4, 'xHkadTIUyU'),
(97, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Trace', 'Veum', 'conn.tess@yahoo.com', NULL, 'e2f3a006bf6c6312f2a9f7136eea1b03', 3, 'qpDlTgncC0'),
(98, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Earline', 'Zulauf', 'toy.friedrich@considine.com', NULL, 'a4cd3d3e8df5c6748d5e29d87ee36fa4', 1, '0AjAsgqBAF'),
(99, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Mariane', 'Shanahan', 'howe.anya@vonrueden.com', NULL, 'f7abbb0ed77f7597587b734d85e09542', 3, '6hGwFDORLk'),
(100, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Furman', 'Kub', 'braun.weldon@yahoo.com', NULL, 'fc6332974b1e70fcf63337d2adb80707', 2, 'MxfyNiWcv0'),
(101, '2021-08-06 11:06:44', '2021-08-06 11:06:44', 'Hettie', 'Zemlak', 'everette.kuhic@hintz.com', NULL, 'ec7bcda85c9add0f7105d311196ea742', 2, 'tSFhnyCvM8'),
(104, '2021-08-06 18:47:47', '2021-08-08 15:31:44', 'Marko', 'Markovic', 'marko@gmail.com', NULL, '$2y$10$CiKJCyp799dkTdlklhO4hO0djhjuN7.f86ALLUU.bozAKG8NVQLr2', 4, NULL),
(107, '2021-08-08 15:40:42', '2021-08-08 15:40:42', 'Mriko', 'Ivanic', 'asdasd@gmail.com', NULL, '$2y$10$tg5ONTpsAcLpi4DaydKZ.eFII2.qJNAaECDSQXkCQE2pLR4Kwm0XS', 3, NULL),
(108, '2021-08-08 15:46:38', '2021-08-10 08:56:29', 'Marko', 'Markovic', 'strukapro@gmail.com', NULL, '$2y$10$/GYrpLeVcFBbptx9vO8Y9.lCjJk2oEv1fdUa8d78ygKj36ed9BRd6', 4, 'EShtBDp7zGEPXRyUfdw81mq57peOFBejH6isd85gfFn9sOltrMGU8dJnZsri'),
(111, '2021-08-09 11:31:35', '2021-08-09 11:31:35', 'Marko', 'Markovic', 'asd123@gmail.com', NULL, '$2y$10$WVNiVpLtJWnPzvTGQ.Tg8uqOTOqWkyKoHvvypXqLEwe6gKG0s/phe', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verify_comments`
--

CREATE TABLE `verify_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_comments`
--

INSERT INTO `verify_comments` (`id`, `email`, `selector`, `expired`) VALUES
(1, 'boris.dmitrovic@quantox.com', '83abaeeb22948ed5', '2021-08-06 15:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `visited_at`, `ip`, `post_id`) VALUES
(4, '2021-08-06 14:07:40', '::1', 2),
(5, '2021-08-06 14:09:16', '::1', 2),
(6, '2021-08-06 14:09:31', '::1', 2),
(7, '2021-08-06 14:10:24', '::1', 2),
(8, '2021-08-06 14:10:35', '::1', 2),
(9, '2021-08-06 14:10:40', '::1', 2),
(10, '2021-08-06 14:10:43', '::1', 2),
(11, '2021-08-06 14:10:47', '::1', 2),
(12, '2021-08-06 18:09:10', '::1', 1),
(18, '2021-08-06 18:19:49', '::1', 108),
(19, '2021-08-06 18:19:55', '::1', 108),
(20, '2021-08-06 18:20:00', '::1', 12),
(21, '2021-08-06 18:20:49', '::1', 108),
(22, '2021-08-06 18:20:52', '::1', 2),
(23, '2021-08-06 18:21:08', '::1', 2),
(24, '2021-08-06 18:21:19', '::1', 2),
(25, '2021-08-06 18:21:23', '::1', 2),
(26, '2021-08-06 19:15:37', '::1', 1),
(27, '2021-08-07 14:30:26', '::1', 1),
(28, '2021-08-07 14:30:51', '::1', 1),
(29, '2021-08-07 14:31:26', '::1', 1),
(30, '2021-08-07 14:31:50', '::1', 1),
(31, '2021-08-07 14:32:49', '::1', 1),
(32, '2021-08-07 14:32:57', '::1', 1),
(33, '2021-08-07 14:33:41', '::1', 1),
(34, '2021-08-07 14:33:53', '::1', 1),
(35, '2021-08-07 14:33:54', '::1', 1),
(36, '2021-08-07 14:34:11', '::1', 1),
(37, '2021-08-07 14:34:24', '::1', 1),
(38, '2021-08-07 14:34:30', '::1', 1),
(39, '2021-08-07 14:34:33', '::1', 1),
(40, '2021-08-07 14:35:20', '::1', 1),
(41, '2021-08-07 14:35:52', '::1', 1),
(42, '2021-08-07 14:35:56', '::1', 1),
(43, '2021-08-07 14:36:13', '::1', 1),
(44, '2021-08-07 14:36:29', '::1', 1),
(45, '2021-08-07 14:36:54', '::1', 1),
(46, '2021-08-07 14:37:08', '::1', 1),
(47, '2021-08-07 14:37:27', '::1', 1),
(48, '2021-08-07 14:40:40', '::1', 1),
(49, '2021-08-07 14:41:31', '::1', 1),
(50, '2021-08-07 14:41:42', '::1', 1),
(51, '2021-08-07 14:41:49', '::1', 1),
(52, '2021-08-07 14:41:54', '::1', 1),
(53, '2021-08-07 14:42:02', '::1', 1),
(54, '2021-08-07 14:42:08', '::1', 1),
(55, '2021-08-07 14:42:41', '::1', 1),
(56, '2021-08-07 14:43:09', '::1', 1),
(57, '2021-08-07 14:43:15', '::1', 1),
(58, '2021-08-07 14:46:49', '::1', 1),
(59, '2021-08-07 14:48:20', '::1', 1),
(60, '2021-08-07 14:48:38', '::1', 1),
(61, '2021-08-07 14:49:09', '::1', 1),
(62, '2021-08-07 14:50:02', '::1', 1),
(63, '2021-08-07 14:50:20', '::1', 1),
(64, '2021-08-07 14:50:22', '::1', 1),
(65, '2021-08-07 14:51:30', '::1', 1),
(66, '2021-08-07 14:52:10', '::1', 1),
(67, '2021-08-07 14:54:38', '::1', 1),
(68, '2021-08-07 16:03:10', '::1', 1),
(69, '2021-08-07 16:05:19', '::1', 1),
(70, '2021-08-07 16:05:27', '::1', 1),
(71, '2021-08-07 16:06:41', '::1', 1),
(72, '2021-08-07 16:07:16', '::1', 85),
(73, '2021-08-07 16:08:02', '::1', 108),
(74, '2021-08-07 16:08:05', '::1', 2),
(75, '2021-08-07 16:09:11', '::1', 2),
(76, '2021-08-07 16:09:22', '::1', 1),
(77, '2021-08-07 16:09:24', '::1', 2),
(78, '2021-08-07 16:09:35', '::1', 2),
(79, '2021-08-07 16:09:51', '::1', 2),
(80, '2021-08-07 16:10:13', '::1', 1),
(81, '2021-08-07 16:10:16', '::1', 2),
(82, '2021-08-07 16:10:24', '::1', 2),
(83, '2021-08-07 16:10:29', '::1', 2),
(84, '2021-08-07 16:10:54', '::1', 1),
(85, '2021-08-07 16:10:56', '::1', 2),
(86, '2021-08-07 16:36:05', '::1', 2),
(87, '2021-08-08 14:52:59', '::1', 1),
(88, '2021-08-08 14:53:02', '::1', 1),
(89, '2021-08-08 14:53:07', '::1', 1),
(90, '2021-08-10 08:57:23', '::1', 1),
(91, '2021-08-10 08:57:26', '::1', 1),
(92, '2021-08-10 08:57:42', '::1', 1),
(93, '2021-08-10 08:58:02', '::1', 1),
(94, '2021-08-10 08:58:21', '::1', 1),
(95, '2021-08-10 08:58:25', '::1', 1),
(96, '2021-08-10 08:58:30', '::1', 1),
(97, '2021-08-10 08:58:35', '::1', 1),
(98, '2021-08-10 08:59:15', '::1', 12),
(99, '2021-08-10 08:59:20', '::1', 12),
(100, '2021-08-10 08:59:23', '::1', 12),
(101, '2021-08-10 08:59:26', '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bad_words`
--
ALTER TABLE `bad_words`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bad_words_word_unique` (`word`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `files_file_name_unique` (`file_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD KEY `permission_roles_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_files`
--
ALTER TABLE `post_files`
  ADD KEY `post_files_post_id_foreign` (`post_id`),
  ADD KEY `post_files_file_id_foreign` (`file_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD KEY `post_likes_post_id_foreign` (`post_id`),
  ADD KEY `post_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD KEY `post_tags_post_id_foreign` (`post_id`),
  ADD KEY `post_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_keyword_unique` (`keyword`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_first_name_index` (`first_name`),
  ADD KEY `users_last_name_index` (`last_name`);

--
-- Indexes for table `verify_comments`
--
ALTER TABLE `verify_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_post_id_foreign` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bad_words`
--
ALTER TABLE `bad_words`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `verify_comments`
--
ALTER TABLE `verify_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD CONSTRAINT `permission_roles_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_files`
--
ALTER TABLE `post_files`
  ADD CONSTRAINT `post_files_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_files_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
