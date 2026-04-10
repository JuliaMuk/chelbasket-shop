-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 29 2026 г., 14:46
-- Версия сервера: 9.1.0
-- Версия PHP: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chelbasket`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:6;', 1774795075),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1774795075;', 1774795075),
('laravel-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1774789871),
('laravel-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1774789871;', 1774789871);

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `path_img`, `created_at`, `updated_at`) VALUES
(1, 'Мячи', 'miaci', 'category-images/banner7.svg', '2026-03-29 08:09:38', '2026-03-29 09:20:52'),
(2, 'Кофты', 'kofty', 'category-images/banner2.svg', '2026-03-29 08:09:38', '2026-03-29 09:21:25'),
(3, 'Футболки', 'futbolki', 'category-images/banner3.svg', '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(4, 'Майки', 'maiki', 'category-images/banner5.svg', '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(5, 'Форма', 'forma', 'category-images/banner6.svg', '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(6, 'Сувениры', 'suveniry', 'category-images/banner4.svg', '2026-03-29 08:09:38', '2026-03-29 08:09:38');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_16_091912_create_categories_table', 1),
(5, '2026_02_16_091913_add_fields_to_users_table', 1),
(6, '2026_02_16_091914_create_products_table', 1),
(7, '2026_02_16_091915_create_addresses_table', 1),
(8, '2026_02_16_091916_create_orders_table', 1),
(9, '2026_02_16_091917_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `order_date` timestamp NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('new','in_progress','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `characteristic_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `stock_quantity` int NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `characteristics` json DEFAULT NULL,
  `path_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL DEFAULT '5.0',
  `extra_images` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `is_new`, `category_id`, `description`, `stock_quantity`, `price`, `sale_price`, `characteristics`, `path_img`, `rating`, `extra_images`, `created_at`, `updated_at`) VALUES
(1, 'Мяч баскетбольный', 'miac-basketbolnyi', 1, 1, 'Официальный баскетбольный мяч с логотипом', 0, 3990.00, NULL, '[]', 'product-images/01KMWZP7RH07470MQJ6EY43KEE.jpg', 4.0, '[\"product-gallery/01KMWW0B6NBR38Y4J99G2A1XVD.png\", \"product-gallery/01KMWW0B6TYK10RK0FDXVYAR1T.png\"]', '2026-03-29 08:09:38', '2026-03-29 09:24:12'),
(2, 'Мяч мягкий', 'miac-miagkii', 0, 1, 'Мягкий антистресс-мяч', 10, 1200.00, NULL, '[]', 'product-images/01KMWZRBBAMZ4R0E6EWXAKPSPE.jpg', 5.0, '[\"product-gallery/01KMWZRBBD609C3FHB437E1AVG.jpg\"]', '2026-03-29 08:09:38', '2026-03-29 09:25:21'),
(3, 'Кофта', 'kofta', 1, 2, 'Тёплая кофта с логотипом', 10, 3000.00, NULL, '{\"l\": \"0\", \"m\": \"1\", \"s\": \"0\", \"xl\": \"1\", \"xs\": \"1\"}', 'product-images/01KMWZ8W8KX7R9KQYW1MC94NE8.png', 5.0, '[\"product-gallery/01KMX0EZSNJE5MV0BC3ZHMR45J.jpg\", \"product-gallery/01KMX0EZTC6TQ1R409QNZM9VTS.jpg\", \"product-gallery/01KMX0EZTG39W1DDPB4K8HW7NB.jpg\", \"product-gallery/01KMX0EZTKNMSP337185RTXE89.jpg\", \"product-gallery/01KMX0EZTP7ZZ6MANB33K41F43.jpg\", \"product-gallery/01KMX0EZTWP597TXA3FJR72533.jpg\"]', '2026-03-29 08:09:38', '2026-03-29 09:37:43'),
(4, 'Бомбер', 'bomber', 0, 2, 'Стильный бомбер', 10, 10990.00, NULL, '[]', 'images/bomber.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(5, 'Футболка \"Квадрат\"', 'futbolka-kvadrat', 0, 3, 'Футболка с дизайном \"Квадрат\"', 10, 3500.00, NULL, '[]', 'images/futbolka_kvadrat.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(6, 'Футболка \"Logo Chelbasket\"', 'futbolka-logo-chelbasket', 1, 3, 'Футболка с логотипом Chelbasket', 10, 2990.00, NULL, '[]', 'images/futbolka_logo.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(7, 'Футболка \"ЧБК\"', 'futbolka-cbk', 0, 3, 'Футболка с надписью ЧБК', 10, 1990.00, NULL, '[]', 'images/futbolka_chbk.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(8, 'Футболка \"Championship\"', 'futbolka-championship', 1, 3, 'Футболка Championship', 10, 2300.00, NULL, '[]', 'images/futbolka_championship.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(9, 'Футболка \"CHILL GUY\"', 'futbolka-chill-guy', 1, 3, 'Футболка Chill Guy', 10, 1990.00, NULL, '[]', 'images/futbolka_chill_guy.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(10, 'Поло \"ЧБК\"', 'polo-cbk', 0, 3, 'Поло с логотипом ЧБК', 10, 2500.00, NULL, '[]', 'images/polo_chbk.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(11, 'Футболка с логотипом', 'futbolka-s-logotipom', 0, 3, 'Базовая футболка с логотипом', 10, 1990.00, NULL, '[]', 'images/futbolka_logo_base.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(12, 'Футболка детская вышивка', 'futbolka-detskaia-vysivka', 0, 3, 'Детская футболка с вышивкой', 10, 1990.00, NULL, '[]', 'images/futbolka_detskaya_vyshivka.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(13, 'Футболка детская с логотипом', 'futbolka-detskaia-s-logotipom', 0, 3, 'Детская футболка с принтом логотипа', 10, 1500.00, NULL, '[]', 'images/futbolka_detskaya_logo.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(14, 'Лонгслив \"ВЫШЕ.БЫСТРЕЕ.СИЛЬНЕЕ.\"', 'longsliv-vysebystreesilnee', 0, 3, 'Лонгслив с мотивационной надписью', 10, 3200.00, NULL, '[]', 'images/longsleeve_motivation.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(15, 'Лонгслив \"ЧБК\"', 'longsliv-cbk', 0, 3, 'Лонгслив с логотипом ЧБК', 10, 2990.00, NULL, '[]', 'images/longsleeve_chbk.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(16, 'Майка тренировочная \"ЧБК\"', 'maika-trenirovocnaia-cbk', 0, 4, 'Тренировочная майка ЧБК', 10, 2000.00, NULL, '[]', 'images/mayka_tren_chbk.jpg', 5.0, NULL, '2026-03-29 08:09:38', '2026-03-29 08:09:38'),
(17, 'Майка игровая чёрная', 'maika-igrovaia-cernaia', 0, 4, 'Игровая майка чёрного цвета', 10, 2500.00, NULL, '[]', 'images/mayka_igrovaya_black.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(18, 'Майка игровая белая', 'maika-igrovaia-belaia', 0, 4, 'Игровая майка белого цвета', 10, 2500.00, NULL, '[]', 'images/mayka_igrovaya_white.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(19, 'Майка оранжевая игровая', 'maika-oranzevaia-igrovaia', 0, 4, 'Яркая оранжевая игровая майка', 10, 2500.00, NULL, '[]', 'images/mayka_orange.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(20, 'Майка \"MEDIA BASKET\"', 'maika-media-basket', 0, 4, 'Майка с надписью MEDIA BASKET', 10, 2500.00, NULL, '[]', 'images/mayka_media.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(21, 'Майка \"Славянка-ЧКПЗ\"', 'maika-slavianka-ckpz', 0, 4, 'Майка Славянка-ЧКПЗ', 10, 2000.00, NULL, '[]', 'images/mayka_slavyanka.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(22, 'Костюм спортивный', 'kostium-sportivnyi', 0, 5, 'Спортивный костюм (куртка + штаны)', 10, 6990.00, NULL, '[]', 'images/kostyum_sport.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(23, 'Шорты', 'sorty', 0, 5, 'Спортивные шорты', 10, 1990.00, NULL, '[]', 'images/shorty.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(24, 'Разминка игровая', 'razminka-igrovaia', 0, 5, 'Игровая разминочная форма', 10, 3500.00, NULL, '[]', 'images/razminka.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(25, 'Значок железный', 'znacok-zeleznyi', 0, 6, 'Металлический значок с логотипом', 10, 450.00, NULL, '[]', 'images/znachok.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(26, 'Леброша маленький', 'lebrosa-malenkii', 0, 6, 'Мини-леброша с логотипом', 10, 1500.00, NULL, '[]', 'images/lebroshe_small.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(27, 'Леброша средний', 'lebrosa-srednii', 0, 6, 'Средний размер леброши', 10, 2000.00, NULL, '[]', 'images/lebroshe_medium.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(28, 'Леброша большой', 'lebrosa-bolsoi', 0, 6, 'Большая мягкая леброша', 10, 1500.00, NULL, '[]', 'images/lebroshe_large.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(29, 'Подушка', 'poduska', 0, 6, 'Декоративная подушка с принтом', 10, 790.00, NULL, '[]', 'images/podushka.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(30, 'Наклейка большая', 'nakleika-bolsaia', 0, 6, 'Большая виниловая наклейка', 10, 150.00, NULL, '[]', 'images/nakleyka_big.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(31, 'Стикерпак', 'stikerpak', 0, 6, 'Набор стикеров', 10, 150.00, NULL, '[]', 'images/stickerpack.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(32, 'Браслет силиконовый', 'braslet-silikonovyi', 0, 6, 'Силиконовый браслет с логотипом', 10, 150.00, NULL, '[]', 'images/braslet.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(33, 'Бейсболка детская', 'beisbolka-detskaia', 0, 6, 'Детская бейсболка с логотипом', 10, 1500.00, NULL, '[]', 'images/beysbolka_detskaya.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(34, 'Кепка', 'kepka', 0, 6, 'Классическая кепка с вышивкой', 10, 1990.00, NULL, '[]', 'images/kepka.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(35, 'Бутылка для воды', 'butylka-dlia-vody', 0, 6, 'Спортивная бутылка с логотипом', 10, 690.00, NULL, '[]', 'images/butilka_voda.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(36, 'Ремувка', 'remuvka', 0, 6, 'Ремувка / бирка на рюкзак', 10, 290.00, NULL, '[]', 'images/remuvka.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(37, 'Наушники', 'nausniki', 0, 6, 'Проводные/беспроводные наушники', 10, 1990.00, NULL, '[]', 'images/naushniki.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(38, 'Попсокет', 'popsoket', 0, 6, 'PopSocket с брендированным дизайном', 10, 150.00, NULL, '[]', 'images/popsoket.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(39, 'Термос', 'termos', 0, 6, 'Термос для напитков', 10, 1200.00, NULL, '[]', 'images/termos.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(40, 'Коврик для мыши', 'kovrik-dlia-mysi', 0, 6, 'Игровой коврик с логотипом', 10, 690.00, NULL, '[]', 'images/kovrik_mouse.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(41, 'Картахолдер', 'kartaxolder', 0, 6, 'Картахолдер для карт', 10, 290.00, NULL, '[]', 'images/kartkholder.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(42, 'Картахолдер из экокожи', 'kartaxolder-iz-ekokozi', 0, 6, 'Стильный картахолдер из экокожи', 10, 550.00, NULL, '[]', 'images/kartkholder_eco.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(43, '3D стикер', '3d-stiker', 0, 6, 'Объёмный 3D-стикер', 10, 100.00, NULL, '[]', 'images/3d_sticker.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(44, 'Кружка', 'kruzka', 0, 6, 'Керамическая кружка с принтом', 10, 450.00, NULL, '[]', 'images/kruzhka.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(45, 'Шарф', 'sarf', 0, 6, 'Тёплый шарф с логотипом', 10, 1290.00, NULL, '[]', 'images/sharf.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(46, 'Ручка', 'rucka', 0, 6, 'Шариковая ручка с логотипом', 10, 180.00, NULL, '[]', 'images/ruchka.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(47, 'Тетрадь', 'tetrad', 0, 6, 'Тетрадь с брендированной обложкой', 10, 290.00, NULL, '[]', 'images/tetrad.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(48, 'Чехол для телефона', 'cexol-dlia-telefona', 0, 6, 'Защитный чехол с логотипом команды', 10, 990.00, NULL, '[]', 'images/chehol_phone.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(49, 'Колонка-ночник', 'kolonka-nocnik', 0, 6, 'Портативная Bluetooth-колонка с функцией ночника', 10, 1200.00, NULL, '[]', 'images/kolonka_nochnik.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(50, 'Мешок для обуви', 'mesok-dlia-obuvi', 0, 6, 'Стильный мешок для хранения/переноски обуви', 10, 650.00, NULL, '[]', 'images/meshok_obuv.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39'),
(51, 'Носки', 'noski', 0, 6, 'Фирменные спортивные носки', 10, 390.00, NULL, '[]', 'images/noski.jpg', 5.0, NULL, '2026-03-29 08:09:39', '2026-03-29 08:09:39');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('odGq0YzRtw24PYlvH12mc1ZTicqK0wkreJD4EMV9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiU0dTb3NCNnpqa0pvZzh4TEwwYTlwT2FKY2xYQVBGTVlwNVpvQWh4ZiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVjdHMva29mdGEiO3M6NToicm91dGUiO3M6NDoiY2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6IjZkNDYwZTQ1NDJiZGM1YWRiMmYzZjFkYjgzZGEyMWU4OWY3OGQzNDRiYTZiMzYxZWJlZDIzMDM1ZGZkOTM2ODUiO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1774795209);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `birth_date`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '+7 (999) 999-99-99', '1990-01-01', NULL, '$2y$12$hikX0qg6bfqm.QfZJYqemuGepha.Wmfvbc18h4TZ/qt/NZjxfWtGO', 'n7yfCUmsyzO2t4E9fXeNpxGkCHguMrZH1ZtzOdjQIVbLZAK9rJ4aCyYhKfNd', '2026-03-29 08:09:52', '2026-03-29 08:09:52');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
