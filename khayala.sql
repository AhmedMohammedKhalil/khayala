-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 07:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khayala`
--
CREATE DATABASE IF NOT EXISTS `khayala` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `khayala`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$RjQJD.dV5diKGcuWoyTWbOPZQq735sRZnHOhgr9My9HgD.iqgUaLi', NULL, '2022-04-04 12:56:27', '2022-04-05 21:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `treatment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cases_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `title`, `details`, `treatment`, `doctor_id`, `created_at`, `updated_at`) VALUES
(2, 'مرض التيتانوس أو الكزاز', 'تظهر بتشنج كافة العضلات التي تبدأ غالباً في الرأس، وأحياناً في القسم الخلفي من جسم الحيوان، ثم يتطور بسرعة أو ببطء.\r\nوبسبب تشنج عضلات الرأس تبدأ صعوبة المضغ أثناء تناول الطعام', 'تحقن جميع الخيول بالتوكسيد، وهذه الحقنة تبقى سارية المفعول لمدة سنة كاملة، وعلى هذا الأساس تصبح حقنة التوكسيد واجبة كل عام مرة واحدة. هذا إذا لم تكسبه الحقنة الثانية المناعة مدى الحياة من هذا المرض', 1, '2022-04-23 14:47:23', '2022-04-23 14:47:23'),
(3, 'مرض السالمونيلا المجهضة', 'يتميز بالتهاب المخ والنخاع الشوكي ويؤدي ذلك إلى ضعف وفقدان الحس، تهيج، شلل، ونسبة نفوق عالية.\r\nوسبب هذا المرض فيروس من مجموعة فيروسات الأربو، ويوجد للفيروس ثلاث حشرات شرقية وغربية وفنزويلية، وتعتبر الشرقية أشد الحشرات ضراوة حيث تصل نسبة النفوق فيها إلى حد 90%.', 'يعالج الحيوان باستخدام المصل العالي المناعة، ويعتبر العلاج الوحيد المؤثر، ويعطى بجرعة 500سم3.\r\nيجب إطعام الحيوان طعاماً مغشذياً ومليناً، بواسطة اللي المعدي\r\nوللوقاية والتحصين منه يستعمل لقاح يحتوي على الحشرة الشرقية، أو الغربية أو كلتيهما ويعطى اللقاح داخل الأدمة على جرعتين بفاصل أسبوع فتحمي الحيوان لمدة سنة كاملة', 3, '2022-05-03 16:55:40', '2022-05-03 16:55:40'),
(4, 'إنفلونزا الخيول', 'مرض تنفسي يصيب الخيول ينتشر في كل العالم ما عدا نيوزيلاندا. إنتقال المرض: ينتقل المرض بين الخيول عن طريق الإفرازات التنفسية أو المعدات الملوثة وهو مرض سريع الإنتقال.', 'لا يوجد علاج للمرض, وفي حالة الإصابة بالمرض يعطى الحيوان فترة راحة, في حالة الحمى تعطى مخفضات الحرارة, وينصح بالضادات الحيوية فقط إذا إستمرت الحمى لفترة أكثر من 3-4 أيام. تحصن الخيول ضد هذا المرض بلقاح يعطى بجرعتين بينهما من 21-90 يوم ثم جرعة بعد 6 شهور من الجرعة الثانية ثم مرة كل سنة.', 4, '2022-05-03 16:59:24', '2022-05-03 16:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

DROP TABLE IF EXISTS `competitions`;
CREATE TABLE IF NOT EXISTS `competitions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 0,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `organization`, `address`, `description`, `photo`, `appointment`, `status`, `total`, `created_at`, `updated_at`) VALUES
(1, 'مسابقة افضل الخيول العربية', 'الجواد العربى', 'الكويت', 'سباق خيل', NULL, '2022-05-03 17:03:18', 0, 30, '2022-04-03 11:44:19', '2022-04-03 11:44:19'),
(4, 'مسابقة خيول', 'الفروسية', 'الكويت', 'سباق خيل', NULL, '2022-05-10 06:40:28', 0, 34, '2022-05-02 01:30:48', '2022-05-02 07:40:28'),
(5, 'مسابقة سرعة الخيول', 'الفروانية', 'الكويت', 'سباق خيل', NULL, '2022-05-20 06:40:28', 0, 34, '2022-05-02 01:30:48', '2022-05-02 07:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `doctors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialization`, `email`, `password`, `photo`, `phone`, `address`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'نورا حماد', 'الخيول', 'n@gmail.com', '$2y$10$.K.sUiFXFjwLRmrBjMGnAu/PcnvQI6nXCkzg8O/WJ3BuOhb9PS/6.', NULL, '69535665', 'الجهراء', 'علاج  جميع الخيول', 0, '2022-04-03 11:34:40', '2022-04-03 11:34:40'),
(3, 'تالا عماد', 'الخيول', 'tala@yahoo.com', '$2y$10$CfBQB3Yg5J729p.yTfduWO1YG/nGmAWS5qO9tNBODvPpB2mCZG3d.', 'about-img2.jpg', '12345678', 'صبيه', 'علاج  جميع الخيول', 0, '2022-04-04 21:52:14', '2022-04-05 12:17:49'),
(4, 'ريم فلاح', 'الخيول', 'reem@gmail.com', '$2y$10$.K.sUiFXFjwLRmrBjMGnAu/PcnvQI6nXCkzg8O/WJ3BuOhb9PS/6.', NULL, '69532546', 'الوفرة الكويت', 'علاج  جميع الخيول', 0, '2022-04-03 11:34:40', '2022-04-03 11:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_03_30_154917_create_admins_table', 1),
(4, '2022_03_30_155018_create_trainers_table', 1),
(5, '2022_03_30_155044_create_doctors_table', 1),
(6, '2022_03_30_155111_create_products_table', 1),
(7, '2022_03_30_155137_create_cases_table', 1),
(8, '2022_03_30_155203_create_competitions_table', 1),
(9, '2022_03_30_155226_create_works_table', 1),
(10, '2022_03_30_155327_create_user_products_table', 1),
(11, '2022_03_30_155352_create_user_doctors_table', 1),
(12, '2022_03_30_155437_create_user_competitions_table', 1),
(13, '2022_03_30_155653_create_rates_table', 1),
(15, '2022_03_30_233526_create_user_trainers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_id` int(10) UNSIGNED NOT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_trainer_id_foreign` (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `details`, `photo`, `trainer_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'سرج الحصان جلدى', '28', 'تفاصيل', 'image.jpg', 1, 4, '2022-04-03 11:43:08', '2022-05-02 19:28:34'),
(2, 'سرج الحصان', '30', 'تفاصيل', 'image.jpg', 1, 3, '2022-04-03 11:43:08', '2022-05-02 18:50:30'),
(4, 'لجام الحصان', '20', 'تفاصيل', 'image.jpg', 3, 0, '2022-04-03 11:43:08', '2022-05-02 19:28:34'),
(5, 'قناع الحصان', '15', 'تفاصيل', 'image.jpg', 3, 0, '2022-04-03 11:43:08', '2022-05-02 18:50:30'),
(6, 'مسامير حدوة الحصان', '10', 'تفاصيل', 'image.jpg', 4, 0, '2022-04-03 11:43:08', '2022-05-02 19:28:34'),
(7, 'حدوة حصان', '20', 'تفاصيل', 'image.jpg', 4, 0, '2022-04-03 11:43:08', '2022-05-02 18:50:30'),
(8, 'فرشاة خاصة للحصان', '5', 'تفاصيل', 'image.jpg', 1, 0, '2022-04-03 11:43:08', '2022-05-02 19:28:34'),
(9, 'امشاط معدنية لشعر الخيول', '22', 'تفاصيل', 'image.jpg', 3, 0, '2022-04-03 11:43:08', '2022-05-02 18:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
CREATE TABLE IF NOT EXISTS `rates` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rate_id` int(10) UNSIGNED NOT NULL,
  `rate_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rates_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `rate_id`, `rate_type`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'product', 3, '2022-05-02 18:49:31', '2022-05-02 18:49:31'),
(2, 1, 1, 'trainer', 2, '2022-05-02 18:51:06', '2022-05-02 18:51:06'),
(3, 1, 1, 'product', 4, '2022-05-02 18:51:25', '2022-05-02 18:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE IF NOT EXISTS `trainers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `trainers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `specialization`, `email`, `password`, `photo`, `phone`, `address`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'تالا عبدالله', 'الخيول', 'tala@gmail.com', '$2y$10$fSVZgvFr/4dsG8zXFACzxeSRxP9G/lAKkynIc9bFKN8U3TX/3E2Ca', 'about-img.jpg', '69531242', 'السالمية', 'تفاصيل', 2, '2022-04-03 11:42:32', '2022-05-02 18:51:06'),
(3, 'سما عماد', 'الخيول', 'sama@gmail.com', '$2y$10$fSVZgvFr/4dsG8zXFACzxeSRxP9G/lAKkynIc9bFKN8U3TX/3E2Ca', '', '69532846', 'الكويت', 'تفاصيل', 0, '2022-04-03 11:42:32', '2022-04-05 12:08:14'),
(4, 'بتول سويلم', 'الخيول', 'batol@gmail.com', '$2y$10$fSVZgvFr/4dsG8zXFACzxeSRxP9G/lAKkynIc9bFKN8U3TX/3E2Ca', '', '69532461', 'الفحيحيل', 'تفاصيل', 0, '2022-04-03 11:42:32', '2022-04-05 12:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `photo`, `address`, `created_at`, `updated_at`) VALUES
(1, 'الزهراء احمد', 'zahraa@gmail.com', '$2y$10$bEuehLDGwoLVBtBGiYvgku3uWYcr7zEbvqCXxXHsgj059FlQ5Uzhe', '69532145', NULL, 'الكويت', '2022-04-04 12:59:12', '2022-04-04 12:59:12'),
(2, 'نورا فالح', 'nora@gmail.com', '$2y$10$4PDxhlz74MMz/WGqYPTbH.aho0GtceI2QNj25rFjguu6ffz0SdjfO', '69532861', 'about-img2.jpg', 'سلوى', '2022-04-04 22:22:55', '2022-04-05 05:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_competitions`
--

DROP TABLE IF EXISTS `user_competitions`;
CREATE TABLE IF NOT EXISTS `user_competitions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `competition_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_competitions_competition_id_foreign` (`competition_id`),
  KEY `user_competitions_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_competitions`
--

INSERT INTO `user_competitions` (`id`, `competition_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, '2022-05-02 03:12:15', '2022-05-02 07:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_doctors`
--

DROP TABLE IF EXISTS `user_doctors`;
CREATE TABLE IF NOT EXISTS `user_doctors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT 0,
  `book_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_doctors_doctor_id_foreign` (`doctor_id`),
  KEY `user_doctors_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_doctors`
--

INSERT INTO `user_doctors` (`id`, `doctor_id`, `user_id`, `status`, `book_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '2022-05-11 19:48:00', '2022-05-02 17:53:54', '2022-05-02 20:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

DROP TABLE IF EXISTS `user_products`;
CREATE TABLE IF NOT EXISTS `user_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_products_product_id_foreign` (`product_id`),
  KEY `user_products_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-05-02 18:02:52', '2022-05-02 18:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_trainers`
--

DROP TABLE IF EXISTS `user_trainers`;
CREATE TABLE IF NOT EXISTS `user_trainers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `trainer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT 0,
  `book_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_trainers_trainer_id_foreign` (`trainer_id`),
  KEY `user_trainers_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_trainers`
--

INSERT INTO `user_trainers` (`id`, `trainer_id`, `user_id`, `status`, `book_at`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 0, NULL, '2022-05-02 17:57:08', '2022-05-02 17:57:08'),
(5, 1, 1, 1, '2022-05-10 19:24:00', '2022-05-02 19:06:54', '2022-05-02 20:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placement` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_estimation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `works_trainer_id_foreign` (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `job_title`, `placement`, `details`, `job_estimation`, `trainer_id`, `created_at`, `updated_at`) VALUES
(2, 'مدربة خيول', 'مدينة الكويت', 'تفاصيل', '3 سنين خبرة', 1, '2022-04-20 07:25:15', '2022-04-20 07:34:04'),
(3, 'مدربة خيول', 'مدينة السالمية', 'تفاصيل', '5 سنين خبرة', 3, '2022-04-20 07:25:15', '2022-04-20 07:34:04'),
(4, 'مدربة خيول', 'مدينة الجهراء', 'تفاصيل', '1 سنة خبرة', 4, '2022-04-20 07:25:15', '2022-04-20 07:34:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_competitions`
--
ALTER TABLE `user_competitions`
  ADD CONSTRAINT `user_competitions_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_competitions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_doctors`
--
ALTER TABLE `user_doctors`
  ADD CONSTRAINT `user_doctors_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_products`
--
ALTER TABLE `user_products`
  ADD CONSTRAINT `user_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_trainers`
--
ALTER TABLE `user_trainers`
  ADD CONSTRAINT `user_trainers_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_trainers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
