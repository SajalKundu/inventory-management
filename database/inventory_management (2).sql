-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 07:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'main item', 'active', '2023-09-16 09:58:54', '2023-09-16 09:58:54'),
(5, 'main item 2', 'active', '2023-09-16 09:59:46', '2023-09-16 09:59:46'),
(6, 'gear box', 'active', '2023-10-14 02:06:04', '2023-10-14 02:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `title`, `address`, `phone`, `email`, `mobile`, `label`, `created_at`, `updated_at`) VALUES
(1, 'datacraft limited', 'Road No.14(new)\r\nHouse No.8/A.(3rd floor)\r\nDhanmondi,Dhaka\r\nBangladesh', NULL, 'info@datacraftbd.com', '(+88) 019.1193.9408', 'This is demo text.This is demo text.This is demo text.This is demo text.This is demo text.', NULL, '2023-10-16 10:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_company` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `title`, `details`, `about_company`, `address`, `phone`, `email`, `mobile`, `fax`, `map`, `banner`, `banner_path`, `created_at`, `updated_at`) VALUES
(1, 'Contact Us', '<p>Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>\r\n\r\n<p>Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna aliqua ut enim ad minim veniam.</p>', 'test', '300 E-Block Building, Dhaka', '+1 0123 456 789', 'info@inventory.com', '453', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.95338886736!2d90.41968899999999!3d23.7808405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1696864063783!5m2!1sen!2sbd\"', '1697474911_banner_man.jpg', 'assets/contact/', NULL, '2023-11-01 11:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `creditors`
--

CREATE TABLE `creditors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recovery_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deal_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creditors`
--

INSERT INTO `creditors` (`id`, `name`, `company`, `recovery_amount`, `email`, `phone`, `mobile`, `details`, `address`, `amount`, `file`, `path`, `deal_date`, `payment_date`, `created_at`, `updated_at`) VALUES
(12, 'wegfeasfaqdf', 'ewfwqfqwd', NULL, NULL, '453534543345', NULL, NULL, 'sfdfasd', '500', NULL, 'assets/creditors/', '2023-10-14', '2023-10-31', '2023-10-14 01:56:44', '2023-11-11 06:59:10'),
(13, 'Yvette Horn', 'Allen and Phelps Associates', NULL, 'tosunyfuv@mailinator.com', '+1 (211) 202-7664', 'Occaecat autem et di', NULL, NULL, 'Nobis quod voluptate', NULL, 'assets/creditors/', '1980-11-04', '2005-01-26', '2023-10-31 23:37:19', '2023-10-31 23:37:19'),
(14, 'ef', 'dsfds', NULL, NULL, NULL, NULL, NULL, NULL, '400', NULL, 'assets/creditors/', '2023-11-11', NULL, '2023-11-11 06:34:20', '2023-11-11 06:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Quon Byers', 'batuzygib@mailinator.com', '12345678999', 'zdasfasfa', 'active', '2023-10-08 11:16:24', '2023-10-17 22:37:35'),
(3, 'Colin Vaughan', 'hodoz@mailinator.com', '96444444444', '<p>gfuff</p>', 'active', '2023-10-08 11:30:35', '2023-10-08 11:30:35'),
(4, 'Tanmoy', 'tanmiy@gmail.com', '01751497927', '<p>sdfsfsdsasadsa</p>', 'active', '2023-10-13 09:32:14', '2023-10-13 09:32:14'),
(5, 'Tanmoy', 'sfwdfs@drgs.com', '01751497928', '<p>sfgsdgdsgdg</p>', 'active', '2023-10-14 01:36:04', '2023-10-14 01:36:04'),
(6, 'jahed', 'jah@gmail.com', '01819895657', '<p>gretgreyryr</p>', 'active', '2023-10-14 02:26:41', '2023-10-14 02:26:41'),
(7, 'solimuddin', NULL, NULL, NULL, 'active', '2023-10-17 10:39:52', '2023-10-17 10:39:52'),
(8, 'asdasasd', NULL, NULL, NULL, 'active', '2023-10-17 23:18:57', '2023-10-17 23:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE `debtors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recovery_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deal_date` date DEFAULT NULL,
  `recovery_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `debtors`
--

INSERT INTO `debtors` (`id`, `name`, `company`, `email`, `phone`, `mobile`, `details`, `address`, `amount`, `recovery_amount`, `file`, `path`, `deal_date`, `recovery_date`, `created_at`, `updated_at`) VALUES
(1, 'Tanmoy Sikder', NULL, 'tanmoy@datacraftbd.com', NULL, '04423456783', NULL, '<p>dsfsdfsdf</p>', '500', NULL, NULL, NULL, '2023-10-06', NULL, '2023-10-06 01:44:30', '2023-10-06 01:44:30'),
(2, 'Sajal Kunu', 'SajalKunduIt', NULL, NULL, '01751837757', '<p>Invoice Id: 10000003 and Product Name: Gillian Pitts, Lydia Quinn</p>', '<p>asdfasdfsdfsdf</p>', '400', '500', NULL, 'assets/creditors/', '2023-10-16', '2023-10-30', '2023-10-16 11:39:30', '2023-11-10 08:33:23'),
(3, 'Zena Small', 'rferfr', NULL, NULL, '33456789234', 'Invoice Id: 10000005 and Product Name: Lydia Quinn, Sold Quantity: 500,', 'Testing', '35000', '10000', NULL, 'assets/creditors/', '2023-11-10', '2023-11-10', '2023-11-10 09:06:53', '2023-11-11 06:37:39'),
(4, 'solimuddin', NULL, NULL, NULL, NULL, 'Invoice Id: 10000009 and Product Name: test-1, Sold Quantity: 30, ', 'dfaf', '11000', NULL, NULL, NULL, '2023-11-11', NULL, '2023-11-11 06:54:39', '2023-11-11 06:54:39');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `rank`, `title`, `image`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'image 1 dgasgaed sdgadgad sffafa sfadfafas afSFf', '1697474613_gallery-img1.jpg', 'assets/home/gallery/', 1, '2023-10-14 09:49:04', '2023-11-01 08:40:52'),
(3, 2, 'image 2', '1697474630_gallery-img2 (1).jpg', 'assets/home/gallery/', 1, '2023-10-16 10:43:50', '2023-10-16 10:43:50'),
(4, 3, 'image 3', '1697474644_gallery-img3.jpg', 'assets/home/gallery/', 1, '2023-10-16 10:44:04', '2023-10-16 10:44:04'),
(5, 4, 'image 4', '1697474659_gallery-img4.jpg', 'assets/home/gallery/', 1, '2023-10-16 10:44:19', '2023-10-16 10:44:19'),
(6, 5, 'image 5', '1697474675_gallery-img5.jpg', 'assets/home/gallery/', 1, '2023-10-16 10:44:35', '2023-10-16 10:44:35'),
(7, 6, 'image 6', '1697474690_gallery-img6.jpg', 'assets/home/gallery/', 1, '2023-10-16 10:44:50', '2023-10-16 10:44:50'),
(8, 7, 'image 7', '1697474704_gallery-img7.jpg', 'assets/home/gallery/', 1, '2023-10-16 10:45:04', '2023-10-16 10:45:04'),
(9, 8, 'image 8', '1697474718_gallery-img8.jpg', 'assets/home/gallery/', 1, '2023-10-16 10:45:18', '2023-10-16 10:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `home__sliders`
--

CREATE TABLE `home__sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home__sliders`
--

INSERT INTO `home__sliders` (`id`, `rank`, `title`, `details`, `image`, `thumb`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'slider 1', NULL, '1696521423_banner4.jpg', 'thumb_1696521423_banner4.jpg', 'assets/home/slider/', 1, '2023-10-05 09:57:04', '2023-10-05 10:12:20'),
(4, 5, 'banner 2', NULL, '1696521442_banner3.jpg', 'thumb_1696521442_banner3.jpg', 'assets/home/slider/', 1, '2023-10-05 09:57:22', '2023-10-05 10:12:02'),
(5, 3, 'banner 3', NULL, '1696521462_banner1.jpg', 'thumb_1696521462_banner1.jpg', 'assets/home/slider/', 1, '2023-10-05 09:57:42', '2023-10-05 09:57:42'),
(6, 4, 'banner 4', NULL, '1696521476_banner2.jpg', 'thumb_1696521476_banner2.jpg', 'assets/home/slider/', 1, '2023-10-05 09:57:57', '2023-10-05 09:57:57');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_05_160323_create_customers_table', 2),
(6, '2023_09_06_100342_create_categories_table', 3),
(7, '2023_09_09_093343_create_sub_categories_table', 4),
(8, '2023_09_10_150623_create_home__sliders_table', 5),
(11, '2023_09_12_155119_create_creditors_table', 6),
(12, '2023_09_12_171719_create_debtors_table', 6),
(13, '2023_09_10_144512_create_products_table', 7),
(14, '2023_09_12_161459_create_product_stocks_table', 7),
(15, '2023_09_16_100318_create_sales_table', 7),
(16, '2023_09_20_144458_create_contact_us_table', 8),
(17, '2023_10_06_054430_create_sale_products_table', 9),
(18, '2023_10_14_152912_create_galleries_table', 10),
(19, '2023_10_16_160743_create_company_details_table', 11);

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
('admin@gmail.com', '$2y$10$2K/YpYI4zgr8wJ2fErb/h.mS8WjspRI1NZFnkHx/HUbvNMbq4tnF6', '2023-09-10 08:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT 0,
  `available_quantity` int(11) DEFAULT NULL,
  `sold_quantity` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `name`, `details`, `image`, `image_path`, `price`, `sale_price`, `available_quantity`, `sold_quantity`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 3, 'Gear', 'sfassf', '1694880261.jpg', 'assets/products/', 0, 3000, 6005, 45, 'active', '2023-09-16 10:04:21', '2023-11-14 11:24:28'),
(3, 5, 4, 'Laurel Luna', 'Et qui velit cillum', NULL, 'assets/products/', 983, 1000, 194, 365, 'active', '2023-09-22 10:06:10', '2023-11-11 06:50:23'),
(4, 4, 3, 'xxxx', 'sdfasf', NULL, 'assets/products/', 20000, 30000, -19, 39, 'active', '2023-10-14 01:30:26', '2023-10-31 23:56:11'),
(5, 6, 5, 'slr 540', 'rgrwgtrwg', NULL, 'assets/products/', 450, 500, 8, 90, 'active', '2023-10-14 02:17:25', '2023-10-31 23:55:24'),
(6, 4, 3, 'casas', 'sca', NULL, 'assets/products/', 260, 40, 17, NULL, 'active', '2023-11-01 00:14:02', '2023-11-11 06:47:56'),
(7, 6, 6, 'test-1', 'das', NULL, 'assets/products/', 142, 400, 20, 30, 'active', '2023-11-11 06:52:00', '2023-11-14 11:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stock_type` enum('sale','add','sub') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sale',
  `qunatity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `stock_type`, `qunatity`, `created_at`, `updated_at`) VALUES
(2, 2, 'add', 10, '2023-09-16 10:04:21', '2023-09-16 10:04:21'),
(3, 2, 'add', 20, '2023-09-16 10:06:33', '2023-09-16 10:06:33'),
(4, 2, 'add', 5, '2023-09-20 09:22:54', '2023-09-20 09:22:54'),
(5, 2, 'add', 10, '2023-09-22 09:46:53', '2023-09-22 09:46:53'),
(6, 3, 'add', 565, '2023-09-22 10:06:10', '2023-09-22 10:06:10'),
(7, 3, 'sale', 5, '2023-10-08 11:25:49', '2023-10-08 11:25:49'),
(8, 2, 'sale', 40, '2023-10-08 11:25:49', '2023-10-08 11:25:49'),
(9, 3, 'sale', 100, '2023-10-08 11:25:49', '2023-10-08 11:25:49'),
(10, 3, 'sale', 60, '2023-10-08 11:31:31', '2023-10-08 11:31:31'),
(11, 2, 'sale', 5, '2023-10-08 11:31:31', '2023-10-08 11:31:31'),
(12, 3, 'add', 4, '2023-10-13 09:14:50', '2023-10-13 09:14:50'),
(13, 3, 'sale', 200, '2023-10-13 09:33:46', '2023-10-13 09:33:46'),
(14, 4, 'add', 10, '2023-10-14 01:30:26', '2023-10-14 01:30:26'),
(15, 4, 'add', 10, '2023-10-14 01:31:24', '2023-10-14 01:31:24'),
(16, 4, 'sale', 15, '2023-10-14 01:39:11', '2023-10-14 01:39:11'),
(17, 5, 'add', 20, '2023-10-14 02:17:25', '2023-10-14 02:17:25'),
(18, 5, 'add', 78, '2023-10-14 02:23:24', '2023-10-14 02:23:24'),
(19, 5, 'sale', 88, '2023-10-14 02:30:02', '2023-10-14 02:30:02'),
(20, 4, 'sale', 2, '2023-10-17 10:42:19', '2023-10-17 10:42:19'),
(21, 5, 'sale', 1, '2023-10-31 23:52:38', '2023-10-31 23:52:38'),
(22, 5, 'sale', 1, '2023-10-31 23:55:24', '2023-10-31 23:55:24'),
(23, 4, 'sale', 22, '2023-10-31 23:56:11', '2023-10-31 23:56:11'),
(24, 6, 'add', 12, '2023-11-01 00:14:02', '2023-11-01 00:14:02'),
(25, 2, 'add', 10, '2023-11-11 06:41:52', '2023-11-11 06:41:52'),
(26, 2, 'add', 6000, '2023-11-11 06:45:59', '2023-11-11 06:45:59'),
(27, 6, 'add', 5, '2023-11-11 06:47:56', '2023-11-11 06:47:56'),
(28, 7, 'add', 20, '2023-11-11 06:52:00', '2023-11-11 06:52:00'),
(29, 7, 'add', 20, '2023-11-11 06:52:23', '2023-11-11 06:52:23'),
(30, 7, 'add', 10, '2023-11-11 06:53:15', '2023-11-11 06:53:15'),
(31, 7, 'sale', 30, '2023-11-11 06:54:39', '2023-11-11 06:54:39'),
(32, 2, 'add', 5, '2023-11-14 11:24:28', '2023-11-14 11:24:28'),
(33, 7, 'add', 5, '2023-11-14 11:25:00', '2023-11-14 11:25:00'),
(34, 7, 'sub', 5, '2023-11-14 11:25:26', '2023-11-14 11:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_create_date` date DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total_amount` int(11) DEFAULT NULL,
  `advanced_amount` int(11) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_id`, `customer_id`, `invoice_create_date`, `customer_name`, `customer_mobile`, `customer_address`, `grand_total_amount`, `advanced_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(1, '10000001', 2, '2023-10-08', 'Quon Byers', '12345678999', '<p>zdasfasfa</p>', 33000, 400, 32600, '2023-10-08 11:31:31', '2023-10-08 11:31:31'),
(2, '10000002', 4, '2023-10-13', 'Tanmoy', '01751497927', '<p>sdfsfsdsasadsa</p>', 200000, 200000, 0, '2023-10-13 09:33:46', '2023-10-13 09:33:46'),
(3, '10000003', 5, '2023-10-14', 'Tanmoy', '01751497928', '<p>sfgsdgdsgdg</p>', 375000, 300000, 75000, '2023-10-14 01:39:11', '2023-10-14 01:39:11'),
(4, '10000004', 6, '2023-10-14', 'jahed', '01819895657', '<p>gretgreyryr</p>', 35200, 35200, 0, '2023-10-14 02:30:02', '2023-10-14 02:30:02'),
(5, '10000005', 7, '2023-10-17', 'solimuddin', NULL, 'test', 60000, 40000, 20000, '2023-10-17 10:42:19', '2023-10-17 10:42:19'),
(6, '10000006', 7, '2023-11-01', 'solimuddin', NULL, 'dcc', 500, NULL, 500, '2023-10-31 23:52:38', '2023-10-31 23:52:38'),
(7, '10000007', 6, '2023-11-01', 'jahed', '01819895657', '<p>gretgreyryr</p>', 500, NULL, 500, '2023-10-31 23:55:24', '2023-10-31 23:55:24'),
(8, '10000008', 8, '2023-11-01', 'asdasasd', NULL, 'ZXc', 660000, 0, 660000, '2023-10-31 23:56:11', '2023-10-31 23:56:11'),
(9, '10000009', 7, '2023-11-11', 'solimuddin', NULL, 'dfaf', 12000, 1000, 11000, '2023-11-11 06:54:39', '2023-11-11 06:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `buy_price_price` int(11) DEFAULT NULL,
  `sale_quantity` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`id`, `sale_id`, `product_id`, `product_name`, `sale_price`, `buy_price_price`, `sale_quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Laurel Luna', 300, 983, 60, 18000, '2023-10-08 11:31:31', '2023-10-08 11:31:31'),
(2, 1, 2, 'Gear', 50, 2500, 5, 15000, '2023-10-08 11:31:31', '2023-10-08 11:31:31'),
(3, 2, 3, 'Laurel Luna', 1000, 983, 200, 200000, '2023-10-13 09:33:46', '2023-10-13 09:33:46'),
(4, 3, 4, 'xxxx', 25000, 20000, 15, 375000, '2023-10-14 01:39:11', '2023-10-14 01:39:11'),
(5, 4, 5, 'slr 540', 400, 450, 88, 35200, '2023-10-14 02:30:02', '2023-10-14 02:30:02'),
(6, 5, 4, 'xxxx', 30000, 20000, 2, 60000, '2023-10-17 10:42:19', '2023-10-17 10:42:19'),
(7, 6, 5, 'slr 540', 500, 450, 1, 500, '2023-10-31 23:52:38', '2023-10-31 23:52:38'),
(8, 7, 5, 'slr 540', 500, 450, 1, 500, '2023-10-31 23:55:24', '2023-10-31 23:55:24'),
(9, 8, 4, 'xxxx', 30000, 20000, 22, 660000, '2023-10-31 23:56:11', '2023-10-31 23:56:11'),
(10, 9, 7, 'test-1', 400, 172, 30, 12000, '2023-11-11 06:54:39', '2023-11-11 06:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `model_name`, `part_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Polo T-shirt', NULL, NULL, 'active', '2023-09-09 10:50:59', '2023-09-09 11:07:52'),
(2, 3, 'Sophia Fleming', NULL, NULL, 'active', '2023-09-09 11:15:57', '2023-09-09 11:21:44'),
(3, 4, 'sub item', 'ewrqw', NULL, 'active', '2023-09-16 09:59:06', '2023-11-01 11:38:32'),
(4, 5, 'sub item 2', NULL, NULL, 'active', '2023-09-16 09:59:59', '2023-09-16 09:59:59'),
(5, 6, 'nozzle 120', NULL, NULL, 'active', '2023-10-14 02:10:45', '2023-10-14 02:10:45'),
(6, 6, 'mncbabkncb', NULL, NULL, 'active', '2023-10-14 02:13:47', '2023-10-14 02:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `thumb`, `image_path`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '1697561345_pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png', 'thumb_1697561345_pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png', 'assets/user/', 1, NULL, '$2y$10$EBbwfhK9xBaQHNz6tgSXZODqAHpcHOtoGFSUHGgRQTIKZqeZvI2xm', 'kFBAQsyG77mbXi2OyfD1BWef139jZAV4umbjLe91CAOx8l9YSnlKozdXN5mb', '2023-08-28 09:52:47', '2023-08-28 09:52:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditors`
--
ALTER TABLE `creditors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home__sliders`
--
ALTER TABLE `home__sliders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `creditors`
--
ALTER TABLE `creditors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `home__sliders`
--
ALTER TABLE `home__sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
