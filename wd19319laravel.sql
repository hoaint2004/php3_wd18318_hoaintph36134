-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2024 at 03:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wd19319laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Văn hóa', NULL, NULL),
(2, 'Thể thao', NULL, NULL),
(3, 'Du lịch', NULL, NULL),
(4, 'Bất động sản', NULL, NULL),
(5, 'Chính Trị', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_29_033902_create_posts_table', 1),
(6, '2024_07_09_030558_create_categories_table', 2),
(8, '2024_07_13_024923_create_departments_table', 3),
(10, '2024_07_13_030836_create_employees_table', 4),
(11, '2014_10_12_000000_create_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int NOT NULL,
  `cate_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description`, `content`, `view`, `cate_id`, `created_at`, `updated_at`) VALUES
(1, 'Bài viết được cập nhật lần 2', 'images/8puvmT35882kjTrb59HydBL5G1fOVI8SSMbylhb7.png', 'Aut at aut et vero aliquid.', 'Eum autem tempore aut molestiae incidunt. Eos accusantium accusamus facilis iste. Nostrum qui iure est voluptatem. Sed exercitationem commodi consequatur perspiciatis ut aspernatur.', 968, 3, NULL, '2024-09-04 01:22:11'),
(2, 'Sapiente vero in sint.', 'images/dZaGAaDPrwZMbQRqJH29QsPmSeRWGnx3dZxJP6mW.jpg', 'Nihil sint rerum molestiae reiciendis.', 'Maiores et saepe cupiditate voluptatem. Odit aut id qui. Dolorum dolore iusto corrupti corrupti vitae.', 130, 3, NULL, '2024-07-24 20:41:06'),
(3, 'Facilis fugiat id non.', 'images/D2S4gYgDVVi0JLKdd0rUvEZkNvFynSu7aisghiRx.jpg', 'Quia quod labore dignissimos omnis ut error.', 'Sed sed dolorem aliquid sed. Et minus ipsum voluptatum dolores repellat. Aut quo maiores consequuntur sed vero. Necessitatibus esse dolor voluptas placeat.', 597, 2, NULL, '2024-09-04 01:51:10'),
(4, 'Porro deserunt ullam ea.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Aut aut corrupti veniam modi ipsum.', 'Et eaque iure temporibus est autem odit. Et quos voluptas magni consequatur quos ut ut. Unde repellendus perferendis ad aut.', 44, 2, NULL, '2024-07-24 21:03:42'),
(5, 'Quasi et omnis ducimus.', 'images/EzQE7TiSEfhXaAi72TpS6joOR4DsQRgF9iSQZ5Nf.png', 'Quisquam sed error fugiat neque.', 'Aliquam dolore vel quia enim sapiente. Ullam dolorem veniam tenetur sit. Commodi itaque alias voluptatem nobis. Ex sit nesciunt iusto et eius.', 374, 2, NULL, '2024-09-04 03:21:04'),
(6, 'Sint eius aut ab.', 'images/TCgU1tHXW75ZxKuQJ0IR5TPT6dFTmXj45QzLLLv1.png', 'Molestiae animi vero laboriosam qui amet culpa.', 'Excepturi nam beatae adipisci voluptatem nam. Maxime facilis quod id qui voluptatum asperiores reiciendis. Quaerat qui doloremque architecto tempora qui architecto.', 186, 4, NULL, '2024-09-04 03:00:50'),
(7, 'Autem quis eveniet quia.', 'images/0EPSuI0VpZkhFPAIR8TXQWi8YDfAeqduVU88YuLh.jpg', 'Natus eos dolor omnis nulla perferendis maiores.', 'Esse porro voluptas delectus voluptatem aut unde et. Eum sit numquam aut molestiae velit qui ut. Facilis aut asperiores cumque omnis et neque.', 485, 5, NULL, '2024-09-04 21:53:36'),
(8, 'Vel culpa ut dolorem ad.', 'images/kEkQrM1it6nS2mdOZy2NWl2NeSOU6e8112RJPK5i.png', 'Illo autem tempore soluta sunt.', 'Quia est nihil id rerum dicta esse maxime. Similique aut saepe doloribus. Vel ullam et autem quia.', 535, 3, NULL, '2024-09-04 03:01:25'),
(9, 'Sit et quas nam tempora.', 'images/JJxtKBv05IXfsCIu6uFc0igLsVl3xaSA6MfdAZhU.png', 'Modi qui quis et corporis non.', 'Totam provident ex odio adipisci voluptas et corporis. Neque inventore perspiciatis error qui velit id consequuntur. Similique omnis ut corrupti sunt.', 423, 3, NULL, '2024-09-04 03:21:26'),
(10, 'Est sunt fugit nisi.', 'images/8F7xpVzk7sh4qAwoBleJY19hHKTe3Mn8unObmkpx.jpg', 'Commodi cupiditate incidunt est laborum numquam.', 'Aut tenetur laudantium consequatur porro dolor non similique. Aperiam nostrum dolores omnis id fugit commodi culpa sit. Et soluta aut enim deserunt voluptas aut iste.', 194, 5, NULL, '2024-09-05 00:44:16'),
(11, 'Et ad quis id odit sint.', 'images/hjH3G2bhxlul0xp7V2Ez8CYlBRoUHKYayuoSlTaY.png', 'Omnis aut eveniet corrupti modi.', 'Consequatur repudiandae earum deleniti aut accusantium aliquam quas aliquam. Est atque porro nihil aut iste ut tenetur facilis. Provident autem in nesciunt.', 584, 1, '2024-09-02 04:43:04', '2024-09-04 21:44:59'),
(12, 'Est nam enim sequi in.', 'images/xkV4acRNaFysrCDv71fCkrWIa1l2J18NQuCPKVha.png', 'Omnis ad est labore mollitia quod molestiae.', 'Repellat optio corporis ex numquam. Ut adipisci quis at ab iste et. Ipsa eaque deleniti unde voluptatem eum et neque.', 796, 2, NULL, '2024-09-05 00:03:30'),
(13, 'Et est occaecati quia.', 'images/1u05uEDM6RL0I7i0YSzyg8ylqTYtri0XYjkGkU35.jpg', 'Alias quia reiciendis rem sint.', 'Id et et velit id est. Laboriosam quo aliquam quisquam omnis vero temporibus ducimus. Non consequatur nihil doloribus omnis debitis quae quia. Ad debitis quos labore facilis.', 509, 2, NULL, '2024-09-05 00:48:36'),
(14, 'Quo facere qui quis qui.', 'images/iONQ7XzTwHsHlIT3yJKuniCFBqpUpCP7AA0b58f3.jpg', 'At magni et impedit dolor fugit.', 'Harum hic pariatur voluptas quo reiciendis. Veritatis quis modi eaque velit. Aut sit perferendis non dolores blanditiis mollitia.', 172, 2, NULL, '2024-09-05 00:49:10'),
(15, 'Quidem dolorum ea qui.', 'images/BHuoMJBdPkVOwuLY6enZbFPAEOubybV4T1D3MXro.jpg', 'Laudantium non dolores eum architecto quam.', 'Nesciunt ut magni vitae eum voluptas blanditiis. Et tempore libero saepe tempore cum error. Provident consequatur alias aut quos ullam sunt nihil.', 722, 1, NULL, '2024-09-05 00:00:04'),
(16, 'Quo sit fugiat ut.', 'images/Xe2ikFDuRMGPfTlYhwZggQPV0KDe0tUkH0SWPLyu.jpg', 'Fuga quis quia illo ut ipsum ut.', 'Laboriosam optio numquam dicta officiis. Et sed magni minima ex. Esse et corporis veniam reiciendis esse.', 662, 3, NULL, '2024-09-05 00:49:41'),
(18, 'A quisquam qui et.', 'images/mTRSRuoXrhW28XuIgOwng824Rp38sP20axNHMTcg.jpg', 'Modi voluptatibus et rerum quam aut aut.', 'Ut dolores libero architecto. Iste inventore sint illo pariatur ut ut quo adipisci. Laudantium modi excepturi maiores est eius exercitationem alias dolorum. Voluptas incidunt magnam quis.', 318, 3, NULL, '2024-09-05 00:50:32'),
(19, 'In ullam aut eaque.', 'images/LIUah6zUjZV0w4dXOe8pHZ4m7o9iJ8fPaqWSbtN7.png', 'Aliquam qui minima hic veniam ea saepe.', 'Tempore mollitia qui recusandae voluptas corporis excepturi. Dicta facere rerum et commodi. Ab aspernatur porro dolorem ratione voluptatem soluta dicta.', 665, 2, NULL, '2024-09-08 20:06:55'),
(20, 'Beatae aut quam et fuga.', 'images/fEY6UPL93Q6hEGKRzJ9zZdx7wwPYo8lwQ3JoOmsd.png', 'Voluptatem dolorem quia sit laborum.', 'Facere voluptatem minus consequatur sunt asperiores molestiae. Mollitia eligendi cum et voluptatem. Reprehenderit recusandae velit voluptatibus autem odio.', 646, 2, NULL, '2024-09-08 20:07:11'),
(21, 'Labore non itaque quod.', 'images/nw4yndlzitQhSCWyrj3P549fCsdMfNoRUKkjn8ev.jpg', 'Est quibusdam voluptas et nesciunt non quia.', 'Enim dolor blanditiis accusamus ex earum est praesentium maxime. Placeat asperiores nisi possimus in dolorem officiis ad.', 154, 1, NULL, '2024-09-05 00:01:59'),
(22, 'Hic ut ab eum.', 'images/wX7HDuuLpzdT7fzpe0WMjIcqkrClPinHM2L1VlZu.png', 'Quia dolores incidunt molestiae porro rem.', 'Autem illo illum mollitia veritatis. Laborum quam laborum sed odio exercitationem eos aliquam. Reiciendis eligendi est alias sint nihil alias quia. Voluptatibus esse consequatur natus quam ut.', 449, 2, NULL, '2024-09-08 20:07:39'),
(23, 'Odit rerum ut iusto.', 'images/pqqC6A1FaDwSOwouPt413Kc6CzHu3iPilk9PK7ph.png', 'Qui molestiae eos harum repellat rerum.', 'Et itaque laborum nihil corporis aperiam ut non qui. Occaecati qui est est architecto. Ex non earum suscipit voluptatem quasi qui alias.', 309, 5, NULL, '2024-09-04 03:00:13'),
(24, 'Voluptatem quos et sint.', 'images/7RM1X2Jqv7EUEtrqusxcXvYWHJSzEbikJnLxvcix.png', 'Ducimus inventore qui voluptas praesentium.', 'Ea ut nulla aut et commodi exercitationem. Vel voluptates ex asperiores facere.', 333, 4, NULL, '2024-09-05 20:21:38'),
(25, 'Esse aut vel ut.', 'images/qzMlb7VjFhPfkHLdM22w6ewoDD5REaxV2JmsOMq6.png', 'Quos velit neque sed aut incidunt.', 'Facilis similique earum at hic voluptatem. Explicabo tempora architecto ipsum odit iste. Praesentium magni voluptatem est nobis tenetur quam. Quibusdam modi deleniti blanditiis.', 735, 2, NULL, '2024-09-08 20:08:10'),
(26, 'Itaque ea est sit ut.', 'images/SNJaWzQQJWV00PIEtnH1655YqpdGvGXGr3uHqwZz.jpg', 'Illum et illum tempora illo nulla atque.', 'Et deserunt dolorum nulla architecto hic. Repellendus laudantium nesciunt et est. Atque omnis est debitis dolorum saepe. Eaque perferendis totam tempore debitis.', 362, 4, NULL, '2024-09-05 20:22:17'),
(27, 'Alias dicta sint sit.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Modi est quia molestiae aut vitae fugit aut.', 'Non placeat porro dolore harum et. Reiciendis earum quos voluptatibus minima debitis. Natus aut sed possimus unde doloremque quis et accusantium.', 973, 3, NULL, NULL),
(28, 'Est aut enim aut odio.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Dolor distinctio maxime et est.', 'Pariatur et rerum in iste. Recusandae sequi et quis accusamus laudantium. Earum sed qui rem qui expedita. Ex aliquid tenetur sed fuga et et autem.', 815, 4, NULL, NULL),
(29, 'Neque ipsa non ut.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Qui et atque totam doloribus.', 'Illum aut dolor quia. Sunt exercitationem aspernatur et quidem. Rem culpa vel libero autem. Rerum assumenda sint veniam. Cupiditate sed qui omnis non laborum qui.', 190, 3, NULL, NULL),
(30, 'Esse in sed velit odio.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Natus rerum tempore explicabo voluptatem tempore.', 'Sit suscipit qui sit vel officia recusandae. Totam temporibus ipsum reprehenderit quos earum qui consequatur veniam. Tenetur tempora ut et libero.', 781, 4, NULL, NULL),
(31, 'Vel qui in et neque.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Doloribus voluptatem nisi vel eos.', 'Fugit quaerat recusandae maiores recusandae quam. Et expedita quia natus quo alias quo est. Accusamus ipsum officiis neque est ad eum blanditiis. Non nobis repellendus rem qui est.', 841, 2, NULL, NULL),
(32, 'Aut sed qui id earum.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Itaque et blanditiis sint velit.', 'Ut ut sint iusto dignissimos. Quod libero qui blanditiis molestiae sit. Qui est soluta consequatur voluptatem ab.', 404, 2, NULL, NULL),
(33, 'Ex voluptas quia enim.', 'images/UMz4FoEOFNdW40QfHMUPH4kih2yiVVayrph5uoiQ.png', 'Illo consectetur quia deserunt odit autem.', 'Nobis nobis quo quibusdam aspernatur. Deleniti maiores animi et aut. Magni veniam illum alias sed ea.', 790, 3, NULL, '2024-09-08 20:12:04'),
(34, 'Repellat non qui esse.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Veniam debitis id cumque ipsa. Quia quod id vero.', 'Quo voluptatum perspiciatis nostrum voluptatem aut sequi aut architecto. Est voluptatibus in ipsa ut odit ut. Laboriosam nobis ad commodi vitae consequuntur blanditiis.', 179, 1, NULL, NULL),
(35, 'Dolorem sit itaque et.', 'images/ANMgqhATM0n2hQLZjPsNTdwmzirhh0fELWA4nYyq.png', 'Quaerat odio dolorem cupiditate qui.', 'Ipsam porro voluptatem aut nisi voluptatem nam voluptatem voluptatem. Sed voluptates possimus nesciunt blanditiis. Aut optio totam ut fugiat.', 874, 2, NULL, '2024-09-08 20:12:20'),
(36, 'Ut saepe fuga vel.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Reiciendis est qui reiciendis et qui ipsa et.', 'Occaecati quia rerum laudantium in. Accusamus laudantium et quia itaque sit. Quos autem magni repudiandae at sequi sed ut expedita.', 69, 1, NULL, NULL),
(37, 'Dicta unde sit et.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Nesciunt neque dolor non quibusdam.', 'Sint suscipit nulla fugiat facilis vero. Aut rerum quam assumenda. Quisquam omnis et numquam architecto quod repellendus.', 626, 4, NULL, NULL),
(38, 'Aut beatae rem eum.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Et ratione quo sapiente velit incidunt ut.', 'Vero reprehenderit eos et in. Accusamus nulla dolor esse. Provident est id eum qui voluptatem. Exercitationem dignissimos vel architecto magnam officiis. Veritatis provident sit repudiandae.', 406, 1, NULL, NULL),
(39, 'Ex totam ullam qui.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Mollitia in culpa molestiae eum.', 'Omnis inventore vero sit molestias ipsum quod aut. Est velit fugiat quod nulla est. Quae ut ad sed quae. Itaque exercitationem ea in ut.', 311, 1, NULL, NULL),
(40, 'Odio qui est reiciendis.', 'images/FSk35e3z3Ppq0itKEjnwEOqWWv6O9unUN3rUvixm.png', 'Quo quos aliquam accusamus eaque sequi.', 'Sequi maxime aut quam et facere amet. Et odit qui quae. Veritatis ea vero qui voluptatem libero. Ex consequatur dolore quia. Officia velit sint voluptatem et sit tenetur deserunt.', 371, 4, NULL, '2024-09-08 20:13:41'),
(41, 'Officiis aut in optio.', 'images/nmA2rluqnwKH9Q9xVLtFtm500Cqf012wuKZSL5tn.png', 'Eius facilis a accusamus sit aut.', 'Non ut vitae id explicabo quia et quae vel. Tempore consequuntur earum modi alias qui ipsum ab. At quos possimus et est aut dolor. Esse voluptatem omnis quibusdam impedit quod.', 674, 3, NULL, '2024-09-08 20:13:52'),
(42, 'Odio ex quae eaque cum.', 'images/uGxQAjH1FuhF3T1hrV9GI57KjF9eJSneINpkXFB8.png', 'Ad earum pariatur saepe dolor quos.', 'Et facere ut molestias aut neque reprehenderit. Consectetur ad unde quo animi esse eos corrupti. Voluptas natus vel qui vel corrupti est ut.', 941, 3, NULL, '2024-09-08 20:14:36'),
(43, 'Numquam ea magni ullam.', 'images/E3oPbMrpLn6hT9MYUZZA0iw4xnh31HtRGyd5x0i1.png', 'Illo ut porro pariatur.', 'Soluta tempore inventore iure voluptatum. Quos minus dolorum sit. Quia qui ad dolorem ipsa iusto velit veniam aut.', 505, 4, NULL, '2024-09-08 20:14:44'),
(44, 'Quasi qui ut quibusdam.', 'images/zSm7Ka0UQPSQHaAH7n9FsQ5ypmW7sjJEDeH6JDBD.png', 'Omnis optio sit commodi adipisci.', 'Dolor sed eligendi harum tempora. Itaque nostrum omnis enim ipsum molestiae accusamus laudantium. Et amet vel vero earum. Ut sunt inventore porro explicabo assumenda.', 241, 3, NULL, '2024-09-08 20:15:10'),
(45, 'Nisi eos hic ea.', 'images/PyG0aW7IcIvNoUSF4KhFtcYu2D3fjwXbxnEEJSUW.png', 'Dolorem enim quasi est ullam eum.', 'Tempora veniam nesciunt distinctio minima vel nam repellendus. Dicta mollitia laudantium cum corrupti delectus iusto non nulla.', 629, 1, NULL, '2024-09-08 20:15:22'),
(46, 'At atque reiciendis ut.', 'images/tbBL5SgoKstxLjJT3ghLTkELZk1EUprmigi2YwsZ.png', 'Et et eum nobis est.', 'Maxime ipsa ut quo illo eos. Autem voluptatem sunt occaecati. Laboriosam cumque non ut iusto quia.', 983, 1, NULL, '2024-09-08 20:15:42'),
(47, 'Ut quo minima non quia.', 'images/3F4TFFAZDm4I1nCpFNzpQ3Usr1currmGCOZEV57q.png', 'Aut repellendus ut asperiores eos natus commodi.', 'Ratione rerum quo iste voluptatem vitae qui delectus. Pariatur in molestiae sapiente rerum modi. Non amet assumenda est nihil dolor.', 887, 3, NULL, '2024-09-08 20:15:58'),
(48, 'Quis id iusto ex sit.', 'images/5IlcZdASvPxcS8nPKEgcVLwUhSrfYPQ9gquQk4w0.png', 'Et voluptas fugiat veritatis autem.', 'Necessitatibus tenetur repellat voluptas. Iusto consectetur exercitationem autem.', 13, 4, NULL, '2024-09-08 20:16:07'),
(49, 'Repellat vel minus unde.', 'images/tpNjVspXzHZjQ5JOTzRef18gipO3OTZebA9YHjhq.png', 'Dolorem consequatur eius voluptatem delectus.', 'Nesciunt quibusdam voluptas qui. Et ipsa error et consequatur. Repellat quidem repellendus odio quia laborum excepturi et. Alias eius et quisquam aut rerum at labore.', 370, 4, NULL, '2024-09-08 20:16:28'),
(50, 'At deleniti vitae cum.', 'images/gelbtvCSMbT4H6m8hHdvFWuRHpsmri1ulCLgkCve.png', 'Eum alias libero dolor voluptatem sunt.', 'Sint distinctio quaerat enim totam. Eos officiis id hic excepturi quod alias sit dicta. Voluptas qui beatae suscipit non. Optio amet nisi ut iste ea odio ut.', 800, 1, NULL, '2024-09-08 20:16:43'),
(51, 'Enim earum id quo vitae.', 'images/aX7lg3ivXW271Db3SV3On6F8HB1kZkaXqhrBCdmC.png', 'Tempora modi dolor excepturi.', 'Magni ea est qui explicabo autem sunt in. Adipisci distinctio placeat ipsam blanditiis. Quibusdam vel et voluptas qui.', 912, 4, NULL, '2024-09-08 20:17:22'),
(52, 'Aut a maxime est.', 'images/mpEfKCdvNCPHfsO4XHSHJh4MXRLypKpJgfAyx8ob.png', 'Vel maiores ut similique iusto nihil.', 'Voluptatem qui cum accusantium occaecati. Et cupiditate et ut rerum quia.', 956, 4, NULL, '2024-09-08 20:21:07'),
(53, 'Iure ut dolorum tempora.', 'images/TTjfhhgYUngGWurYnflLz26PMeNX2aPyfzKQPtbK.png', 'Unde fuga laboriosam vel qui et id error quis.', 'Ut dicta molestiae placeat veniam animi qui. Nihil omnis minus omnis dolorum eos voluptatem ut. Alias voluptas est ea optio eveniet corrupti natus hic.', 593, 3, NULL, '2024-09-08 20:22:39'),
(54, 'Autem at hic enim.', 'images/71JugSHfkH1UJmhQU0UgpJWmDkfr9RvpACHtRClD.png', 'Non quis dolores earum consequatur qui.', 'Hic maiores cum consequatur tempora accusantium rerum temporibus. Dignissimos vero neque voluptatem iusto laborum ut. Possimus corporis odit atque impedit amet ab.', 505, 3, NULL, '2024-09-08 20:21:25'),
(55, 'Quasi non eius delectus.', 'images/XFmb7Ux6LQCMKbArqw9qMVUEtAfUOASgwrGyTdAU.png', 'Eos molestiae hic eos ipsa.', 'Sed non qui sapiente expedita iusto occaecati. Qui illo voluptatem est est laboriosam veritatis maxime. Voluptatum dolores cum earum doloribus earum voluptas qui. Ut ratione qui voluptas est.', 34, 4, NULL, '2024-09-08 20:21:35'),
(56, 'Est ad aut cum quidem.', 'images/vtJL6fTNGo9euuClxuEBD5AtdZlM073Iy1kj5fOV.png', 'Consequatur exercitationem deserunt enim.', 'Deleniti officiis odio voluptatem omnis corrupti omnis blanditiis quo. Aut amet qui et quam facere. Eaque mollitia harum placeat.', 602, 2, NULL, '2024-09-08 20:21:42'),
(57, 'Et nesciunt optio autem.', 'images/AUtJhtmkNb9FUeStJxmiTwlxNtPyRLePOG00GV7j.png', 'Praesentium officia repellat tempora sed.', 'Sint quasi quos nobis aliquam est. Vero odio ipsa quam temporibus quam minus. Architecto cumque iusto quam enim quibusdam.', 423, 1, NULL, '2024-09-08 20:21:50'),
(58, 'Nisi est tenetur quae.', 'images/2acgfOJ0CcnWfUvo0wXD0qqBz3gxPNGYi69ehhRW.png', 'Quidem sit sit cumque autem.', 'Libero culpa id fuga laborum non. Tenetur assumenda ad eius fugiat qui sed. Suscipit sed repellendus et totam placeat et ea. Placeat corrupti dolores repellat.', 274, 1, NULL, '2024-09-08 20:21:55'),
(59, 'Ipsum aliquam quo ab.', 'images/G6FM7L7WvPU8oATpycJ2js2I5j8LMpFzyj2xqN5Y.png', 'Et quas eaque in nisi et asperiores.', 'Sed beatae in eos repellendus. Voluptatem asperiores quia sed repellat. Qui ut libero ullam laborum et tenetur.', 299, 3, NULL, '2024-09-08 20:22:05'),
(60, 'Totam repellat in dolor.', 'images/edeE5Z0TBKyRNYnlTKjuXynFnNpvODyxuGVPUeKQ.png', 'Molestiae aut vel delectus placeat.', 'Nihil at atque voluptate error. Quam tenetur nisi quo et. Recusandae impedit sint voluptatem.', 315, 2, NULL, '2024-09-08 20:22:20'),
(61, 'Ratione eos sit quod.', 'images/hSG1rph9Nt9aOoyucGRynKAnp0BdwEsR1FVL3kG4.png', 'Magnam dolores dolores omnis dolorem.', 'Ut ipsa ut eaque ea et. Ut qui molestias vero nobis est. Officiis maxime est omnis incidunt modi mollitia ut.', 271, 1, NULL, '2024-09-08 20:22:27'),
(62, 'Eius aut ut est.', 'images/c0JRoBYEl0649h8WKESbtUTpqzhcj9NvLIr5zuPZ.png', 'Ut tempore impedit et aperiam.', 'Porro illum maiores qui iste ea. Et sequi doloribus voluptate accusantium. Odio minima ipsam quo qui ut laboriosam neque.', 161, 4, NULL, '2024-09-08 20:26:45'),
(63, 'Doloribus nisi qui quia.', 'images/2G5O5cLH986WkBnceyRmcmS2YVTKDB8lUS5bBD66.png', 'Eaque esse nisi voluptate aliquid.', 'Numquam accusamus earum odit et. Repudiandae magnam expedita voluptatibus ut delectus debitis. Est aliquid numquam vel dolorem. Rerum deleniti cumque ea aliquid.', 297, 1, NULL, '2024-09-08 20:27:02'),
(64, 'Quia omnis qui quis.', 'images/DtBrokLu1DQ5cicJuSqbqc6yEc8GZBsIk8Wgj8YD.png', 'Ipsum similique at eum qui quod.', 'Non occaecati sed temporibus corrupti. Recusandae quas blanditiis ex et doloremque. Eos quisquam voluptas deleniti fuga harum magni.', 263, 4, NULL, '2024-09-08 20:27:32'),
(65, 'Nisi sed minima atque.', 'images/kzUzMTW3VPscsLEY8y5QeuF8SXGuJBpGC20XZtwW.png', 'Similique est illo quia blanditiis.', 'Qui culpa rem veniam temporibus. Modi nobis nulla est quod qui pariatur pariatur. Autem ducimus ab est soluta voluptas. Corrupti aut quia id praesentium. Qui quia consequatur dicta architecto.', 398, 3, NULL, '2024-09-08 20:27:39'),
(66, 'Sunt explicabo sed est.', 'images/bdPXvc3wckdSvmbhtsXD4najxU0tGC4jjgzwaCSu.jpg', 'Tempora facilis officiis in et voluptas.', 'Sed esse itaque nulla nesciunt nisi et id. Facere et doloremque officia explicabo voluptatem blanditiis. Perspiciatis aut esse sit quis.', 251, 4, NULL, '2024-09-08 20:28:44'),
(67, 'Illo ullam alias in qui.', 'images/q4pqTRC98OStgjS3Thbb1Jel5CUI64tNKFYOpfyp.png', 'Quia pariatur saepe provident voluptate.', 'Minus voluptates doloremque ipsum earum sequi iste. Quia harum molestias qui consequuntur. Dolor nesciunt mollitia dolore aut.', 191, 4, NULL, '2024-09-08 20:28:55'),
(68, 'Qui illum deleniti qui.', 'images/Zcb3AYetXHASS8nHSuAdPDgTsoZd0j5XgLSpQYwC.jpg', 'Quia ut et quod dolores facere.', 'Veniam aut nobis fugit praesentium. Quasi libero at nisi id. Minima veniam voluptatibus mollitia consectetur aut. Maxime dolorem qui fugit hic ratione.', 777, 2, NULL, '2024-09-08 20:29:21'),
(69, 'Non et voluptates qui.', 'images/ELwxnaSegOxA3jydTAYSWI7FhS8Ma6v1I5LzlOND.jpg', 'Qui numquam quasi necessitatibus provident ea.', 'Qui vero et esse quos non repellendus magnam doloremque. Velit quia dolore earum in aut. Quis rerum optio consequatur non eveniet perferendis et.', 238, 2, NULL, '2024-09-08 20:29:33'),
(70, 'Minus laborum iste quis.', 'images/BvUKAic4fXKvmtkxiLzVHujhTusqGOH20EtbVfl5.png', 'Sapiente ut esse velit.', 'Sapiente voluptatum facilis aut quas iusto. Ex animi expedita ad optio ut excepturi deleniti. Minus deserunt qui quod porro ab. Animi veniam aspernatur dicta sint.', 553, 4, NULL, '2024-09-08 20:29:45'),
(71, 'Facilis non cumque in.', 'images/XzWVgiLTUs380pZ7gRQXgXhDXrm0Pd9Ggmp9I0Nm.png', 'Voluptas sed exercitationem debitis animi.', 'Aut sapiente ut quas itaque. Nesciunt qui qui placeat eaque dolores alias porro. Pariatur doloribus quis sunt iure tempore non. Architecto sed recusandae labore ut ipsam temporibus perferendis sit.', 360, 3, NULL, '2024-09-08 20:29:52'),
(72, 'Qui eaque et ab aut.', 'images/UUrUBBbkpD1Mm9TziKHyY1wkipcE9RL14bMsCNcL.jpg', 'Sint aliquid quibusdam et excepturi.', 'Officiis quia dolores dolorem earum maxime corporis aut. Dolor dolorem facere vero debitis.', 569, 5, NULL, '2024-09-04 02:59:03'),
(73, 'Eaque quo qui nesciunt.', 'images/euRtMQ3CYkx72vHWtR347na6UtIkw5igohtbTZlK.png', 'Molestias rem modi possimus itaque enim quo.', 'Voluptatibus dolores non inventore eos asperiores sed commodi exercitationem. Nihil enim eum animi asperiores aut porro. Provident ab quae cumque quam.', 676, 4, NULL, '2024-09-08 20:30:16'),
(74, 'Quis possimus non iure.', 'images/yPHxKSj4uKOVEedpO6PLqaKMGjFoUxYLsvEh0aKI.png', 'Accusantium minus iusto deserunt.', 'Corrupti similique magnam deserunt est qui ut nam. Cumque nobis tenetur nulla laborum et sit nisi. Dolores voluptatem aut inventore dolore perspiciatis enim nam.', 878, 4, NULL, '2024-09-08 20:30:26'),
(75, 'Ut nam libero quo.', 'images/HQcAgTihjrnHocT7JE5dFQpdPKANKEvs0aAWjYnD.png', 'Tempore dignissimos dolorum ullam ut.', 'Possimus eveniet qui suscipit tempora qui. Eius nemo nemo et ipsam quia animi. Quia molestiae aut voluptatibus non minus numquam.', 485, 3, NULL, '2024-09-08 20:30:32'),
(76, 'Ad et sint quia odit.', 'images/c9LzogboUtmFpRPA6gEdP650quTmKehjHp79JTNT.png', 'Molestiae enim deserunt ut dignissimos non.', 'Nihil voluptatem iusto et repellendus dignissimos tempore. Velit et eum possimus sunt temporibus est enim optio. Ratione nostrum ut quo atque. Tenetur incidunt mollitia voluptate.', 249, 1, NULL, '2024-09-08 20:30:41'),
(77, 'Sapiente nemo aut eum.', 'images/XjUMuL4qvxxIScwwzJ6533gGza7T93IO1G6RNd06.png', 'Odit autem sunt veritatis et aliquam.', 'Nam debitis odio nisi aut adipisci voluptas id. Illum sit unde unde est voluptatem eius. Iure corporis nobis et facilis.', 169, 3, NULL, '2024-09-08 20:30:52'),
(78, 'Eaque quod nihil saepe.', 'images/S8ONhJ9MKmTeFrlJTzDnEMv9X7ugMJGF5UzB7FlP.jpg', 'Sint doloremque ipsam sit mollitia delectus.', 'Vero beatae magni ipsam. Fugit assumenda qui eum molestiae. Corrupti in sunt optio sint quia et. Iure soluta aut sapiente suscipit nihil.', 59, 3, NULL, '2024-09-08 20:32:43'),
(79, 'Rerum ut enim ut.', 'images/xo154wQQUXfOHKvjU47OlBVh6M12KyGHypkVxTnL.jpg', 'Rem voluptatem fugit eius porro.', 'Sit ut dignissimos aliquid voluptatem quibusdam. Ut voluptatum qui sit inventore voluptatem. Et sint est voluptatibus quos. Quaerat architecto praesentium non natus eos ullam sed ea.', 973, 4, NULL, '2024-09-08 20:32:49'),
(80, 'Ut nemo sunt quam.', 'images/sAyAlaos4SPwxpYjuOYPGNmo3x50MqkVNwIyKsFa.jpg', 'Ea sint qui ratione quas quibusdam occaecati et.', 'Est ab laborum voluptate nesciunt qui exercitationem suscipit. Quia et vel sint nesciunt non impedit veniam neque. Et consectetur vero quam cupiditate quasi quam.', 464, 4, NULL, '2024-09-08 20:33:41'),
(81, 'Est quia tempora qui.', 'images/dnNs6hMwfeqYd5CYvybkVhdPjWk7HjnwLsumFJXC.jpg', 'Ut est aut voluptatem. Et animi sunt est harum.', 'Culpa enim qui omnis veritatis animi qui saepe qui. Error incidunt nesciunt itaque modi est. Magni et aut commodi quasi.', 549, 3, NULL, '2024-09-08 20:33:50'),
(82, 'Non id minus vel velit.', 'images/IpHv4uc4VK08AprcwAq0orCl7eUqx4D0YZFOxeIZ.jpg', 'Et quia eaque voluptas sit illum corrupti.', 'Dignissimos ipsa molestiae quia. Blanditiis alias soluta illo repellat. Distinctio non eveniet quis est accusamus eveniet. Quo quam dolor illum vel minima molestiae ut.', 787, 1, NULL, '2024-09-08 20:34:12'),
(83, 'Ut laborum est officia.', 'images/ZG1hNU10ev6GYlCrSIDraU91GYp5P5blP5FmdaTv.jpg', 'Error quia aperiam eos nemo est ut qui.', 'Et consequatur laborum atque esse asperiores nihil. Magnam impedit nesciunt officiis et. Beatae dolores consequuntur dolor.', 548, 4, NULL, '2024-09-08 20:34:20'),
(84, 'Eum illum est voluptate.', 'images/pu07jNKTkntyWbyvVPClDR4WnpbPmVx33SwCDDS7.jpg', 'Eos est laboriosam est.', 'Autem sint necessitatibus vitae laboriosam dolores repellendus. Adipisci cumque sit officia ratione qui. Sequi facilis porro repellat a. Consequatur quasi facere velit quibusdam placeat ad.', 91, 2, NULL, '2024-09-08 20:34:26'),
(85, 'Et ab qui id.', 'images/Vqp457ZZbMC6YHS6IWtgJEQ72Siy7zyQ88y6B4lK.jpg', 'Mollitia quos voluptas sequi modi.', 'Et est aut qui rerum ex. Nostrum ea ducimus expedita voluptatem. Est et quia qui.', 632, 1, NULL, '2024-09-08 20:34:32'),
(86, 'Sint aut sit occaecati.', 'images/SxJnPE9NrOCulCI1xPT5iyHrIEI1E5IWEL5vUgg7.jpg', 'Sint maiores velit sapiente quam et.', 'Et facilis ullam ut aliquid ullam velit. Et quis accusantium nisi repudiandae. Est ut qui aut repellendus.', 790, 4, NULL, '2024-09-08 20:34:42'),
(87, 'Quia magni corrupti id.', 'images/fsgwbsWguG1cdXrBOtKAXEVqBJLrehx0mCdBmYs8.png', 'Omnis ea quia dicta et.', 'Sint dolor consequatur dolores accusantium tempore. Itaque atque et cum veniam aut. Nemo ex accusantium temporibus ut. Labore eveniet molestiae quo aut recusandae eveniet dolores id.', 957, 5, NULL, '2024-09-04 03:00:30'),
(88, 'Mollitia quod nam unde.', 'images/APUdyFVxOMoFxYyeJvS48E1o0qjQAmQin8rlK8Xd.jpg', 'Sequi facilis quo doloremque quisquam.', 'Placeat incidunt sit quo consectetur qui numquam optio mollitia. Nemo praesentium omnis ut totam. Consectetur quia magni consequatur libero est. Molestias dolores veritatis laboriosam.', 892, 1, NULL, '2024-09-08 20:34:49'),
(89, 'Sed nostrum et autem.', 'images/5XlVD4nFTwlx3RBIysHCm1UkhUm8VPN6cVPagM37.png', 'Et saepe amet dolores et dolores aut.', 'Aspernatur quasi dolor aspernatur et quas ipsa quo. Nostrum ut aperiam dicta vel et excepturi iste. Id odio et dolor autem.', 441, 4, NULL, '2024-09-08 20:34:56'),
(90, 'Enim et sint nemo qui.', 'images/s8s8Pn5UP3ecTzZ5CTvLYfaMIywdxOSNIH9DFHQn.jpg', 'Officia id ut consectetur aut corporis at qui.', 'Unde qui quia rerum architecto. Neque et deserunt corrupti impedit. Harum rerum nostrum et accusantium in ducimus dolorum. Dolorum nisi in natus ipsa reiciendis molestiae.', 532, 1, NULL, '2024-09-08 20:35:02'),
(91, 'Est illo eos quasi qui.', 'images/6jwBO43wbJNO1Za6k2WRIKHhMOudOUGuDNhj6oum.jpg', 'Fuga officia incidunt ea omnis.', 'Excepturi dolorem labore perspiciatis amet. Aut ab fugit accusamus perspiciatis atque dolorem. Molestiae et ab delectus est est.', 117, 2, NULL, '2024-09-08 20:35:12'),
(92, 'Odio qui ut sed.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Facilis dolorem ad dicta eum.', 'Perspiciatis quae autem tempore ipsa dicta porro. Sapiente eum corporis voluptatem pariatur. Quasi dolore facere voluptatibus rerum eius. Quas qui ut nihil distinctio itaque.', 991, 2, NULL, NULL),
(93, 'Quos ut ullam odit.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Distinctio voluptatem excepturi doloribus ipsa.', 'Quas nisi a quaerat eum rerum sequi. Et eos quia eos dolorum. Deserunt vitae consequatur voluptatem ipsum sint.', 23, 3, NULL, NULL),
(94, 'Eaque quis qui et id.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Soluta sit inventore quia.', 'Ad qui consequuntur reprehenderit corporis libero cum sit. Vel ut harum consequuntur non qui similique quia.', 468, 2, NULL, NULL),
(95, 'Ut sint voluptas ex ut.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'In eius rerum fuga animi.', 'Sit rerum nesciunt nesciunt occaecati doloremque. Minima officia aliquid aspernatur ea facere. Occaecati debitis temporibus quod sed sit. Eum dolorem ut illum blanditiis totam.', 926, 1, NULL, NULL),
(96, 'Quis rerum quis ad.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Est non accusantium ut eveniet nulla explicabo.', 'Possimus numquam ratione fugiat est iure atque iusto. Et vero aut quam minima ea officiis est. Labore doloremque in aut in ipsum.', 206, 2, NULL, NULL),
(97, 'Et dolores vel officia.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Voluptatem omnis officia vel iste unde occaecati.', 'Neque quia fugiat cumque eum consequuntur tempora voluptas. Et enim aliquid a non optio voluptatem harum aliquid. Sint tempora debitis consequuntur quis.', 813, 4, NULL, NULL),
(98, 'Eum eius qui recusandae.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Qui reprehenderit harum minus.', 'Voluptatem eum ut commodi nobis. Autem ea vero autem officiis. Corrupti et vel voluptatum eius. Velit autem quia quasi et excepturi.', 705, 3, NULL, NULL),
(99, 'Qui vel voluptatem non.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Natus voluptatem autem minus ut.', 'Dolor sed dolor voluptate deleniti. Ut sequi rerum doloremque aperiam dolorum dolorem nostrum. Eos culpa eius similique et quia officiis.', 825, 4, NULL, NULL),
(100, 'Et nisi modi itaque.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Quasi et odit velit voluptatem quas.', 'Sapiente ut eum sed voluptatem ducimus beatae. Distinctio nemo sed voluptates officia iure. Et sit illum eligendi dicta recusandae quos. Officia dolores nemo culpa distinctio quos.', 892, 4, NULL, NULL),
(101, 'Rerum libero ea optio.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Dolor et at aut mollitia quod quia.', 'Quisquam voluptas ea ducimus facilis nesciunt magnam suscipit. Sit quas est repellat. Qui ut et in accusantium ea. Mollitia consequuntur laudantium aut minima tempora labore.', 993, 3, NULL, NULL),
(102, 'Maxime neque quasi et.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ducimus aut maiores reprehenderit quaerat.', 'Itaque commodi non porro rerum. Placeat dolorum ullam est sit et maiores et. Quo fugit nostrum soluta tenetur.', 986, 2, NULL, NULL),
(103, 'Mollitia quia non enim.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Quis alias recusandae est.', 'Non nemo velit tenetur et. Recusandae esse sit occaecati deleniti aut. Illum soluta numquam veritatis.', 95, 3, NULL, NULL),
(104, 'Iusto autem ut qui.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'A itaque laborum dolorem ut id qui vel.', 'Hic consequatur et optio occaecati excepturi soluta. Et aspernatur qui dolorum. Ut debitis ut quasi impedit eligendi. Veniam nihil suscipit numquam beatae sapiente.', 26, 3, NULL, NULL),
(105, 'Quo est qui libero.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Facilis dolorem nobis autem tempore voluptas.', 'Distinctio quo dolore eos officia vero. Sapiente numquam fugiat nemo.', 787, 3, NULL, NULL),
(106, 'Ea quia quis commodi.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Molestiae esse asperiores et ex et.', 'Voluptatibus corrupti inventore sapiente aperiam. Consectetur tenetur qui aut exercitationem ut. Distinctio dolores non atque non quo architecto. Tempore aperiam magni rerum dolores.', 758, 4, NULL, NULL),
(107, 'Et atque id aut et.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'In at totam officiis autem.', 'Vero eaque qui possimus sint debitis nemo. Sequi occaecati quidem aspernatur qui. Quibusdam quasi error quis omnis incidunt at eum. Qui nihil ea qui ex.', 570, 1, NULL, NULL),
(108, 'Totam qui in et.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Est nam vero adipisci dolorem in eius et.', 'Veniam libero laborum aperiam ducimus atque sunt. Et inventore est omnis nihil mollitia sed. Modi nesciunt quas deleniti sapiente eaque inventore.', 972, 3, NULL, NULL),
(109, 'Et id eum qui nemo ut.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Est sequi eum dolore aut facilis.', 'Consequatur tenetur accusamus quod. Magni libero pariatur et dignissimos sed. Reiciendis sunt nostrum dolorem et. Nam ducimus incidunt iste illum atque officiis et et.', 500, 1, NULL, NULL),
(110, 'Eum eum autem iure nam.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Et rerum eligendi ipsam culpa.', 'Vero fuga magnam accusantium cupiditate. Et excepturi ducimus dolorem porro. Nostrum eligendi fuga non voluptas. Illo qui et neque eligendi magni facilis unde.', 804, 1, NULL, NULL),
(111, 'Sed et qui maxime odit.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'In et et ut repellendus nam autem.', 'Rem quos eligendi sint nulla corporis est aut. Rerum velit sunt quidem et debitis. Dolor cupiditate similique autem rem consequatur. Omnis excepturi et quaerat nisi dolor omnis dolor est.', 947, 1, NULL, NULL),
(112, 'Asperiores et ab quia.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Fugit nesciunt repellendus doloribus.', 'Voluptatem est eaque voluptatum ut possimus saepe sed. Modi repellat architecto autem sunt ab. Iure ad similique occaecati quam. Ullam eaque deleniti accusamus omnis officia et id.', 295, 1, NULL, NULL),
(113, 'Est rerum ut repellat.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Culpa incidunt dicta architecto ut libero modi.', 'Dolor doloribus cupiditate ullam officia rerum illum ad. Dolores sint consequatur occaecati et. Laudantium consequatur praesentium et. Ut veritatis esse quidem reprehenderit unde at.', 479, 3, NULL, NULL),
(114, 'Odio earum unde illo.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Dignissimos ipsam dolorem velit maxime.', 'Quisquam et voluptas labore ut et. Dignissimos enim dolorem aperiam fugiat adipisci. Molestiae aut omnis temporibus voluptatem est deleniti. Facere delectus atque natus qui rerum placeat eum.', 299, 2, NULL, NULL),
(115, 'Illo eveniet nemo quo.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Aut eligendi voluptatum sit est.', 'Eveniet nobis ut earum et. Quibusdam magni voluptatem atque. Nihil incidunt cupiditate ipsam quos ratione. Excepturi quaerat nihil ut sed eius consequatur et ut.', 840, 4, NULL, NULL),
(116, 'Aut ad aut dignissimos.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Doloribus soluta nihil laudantium.', 'Est labore reiciendis debitis maiores blanditiis assumenda distinctio. Qui ut eligendi voluptatem rerum vel. Et et odit vitae.', 900, 1, NULL, NULL),
(117, 'Ut ut a placeat.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Enim ut ratione et.', 'Dolores occaecati iusto sed animi unde est ut provident. Accusamus quia in laudantium ut. Repellendus omnis minima doloremque dignissimos qui tempore.', 980, 4, NULL, NULL),
(118, 'Eum aut quos voluptatem.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ut ullam sit illum dolorum sit et et.', 'Vel blanditiis consequatur velit esse dolores odit pariatur libero. Atque est officia quaerat autem quos. Minima sunt alias adipisci harum. Culpa impedit suscipit provident eum.', 497, 4, NULL, NULL),
(119, 'Omnis non in ipsum.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Temporibus sed suscipit voluptas quo aliquid.', 'Accusamus aut vel iste. In temporibus non et. Accusantium voluptatum rerum impedit labore. Fuga corporis corrupti qui.', 447, 3, NULL, NULL),
(120, 'Delectus est quo et sit.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ipsa suscipit ullam iusto odio eos est minus.', 'Velit debitis qui et. Ipsa voluptatem tempore aut et sit nesciunt exercitationem. Voluptatem similique dolorem dignissimos.', 554, 2, NULL, NULL),
(121, 'Ut debitis sit rerum.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Totam occaecati nisi et et.', 'Est quibusdam explicabo nesciunt quo. Sunt dolorum perferendis iusto qui numquam cumque. Perferendis ut quia dolor aliquam. Possimus ut perspiciatis repudiandae.', 424, 3, NULL, NULL),
(122, 'Ut tenetur sit quos.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Et praesentium consequatur adipisci magnam.', 'Mollitia qui sapiente quia ducimus et quia ut magni. Quidem sed ex exercitationem deserunt et porro. Occaecati quidem magni quo repellat aut.', 885, 3, NULL, NULL),
(123, 'Ut ipsam autem commodi.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Molestias minus maiores et praesentium vitae.', 'Adipisci est et ad exercitationem est tempore aut nulla. Accusamus laudantium voluptatem nesciunt sed. Dolorum fugiat repellendus saepe esse ullam assumenda.', 482, 2, NULL, NULL),
(124, 'Vel vel eius et quidem.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Aut quasi quo est enim ullam.', 'Pariatur minus et fugiat aut autem natus aliquam. Animi iure sint iusto debitis.', 847, 3, NULL, NULL),
(125, 'Illo qui rerum nulla.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Dicta dolor et et quo.', 'Voluptas velit sit nisi aut molestiae et ratione nihil. Doloribus quidem sunt eaque sed vero. Qui quia incidunt dicta.', 256, 1, NULL, NULL),
(126, 'Ut ut nihil sed fugit.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Fuga accusamus quia dicta ex quisquam harum.', 'Quas consequuntur illum minima maxime quo modi error. Aut eos quo ipsam unde perferendis molestiae molestiae. Minus velit consectetur voluptatem ut reiciendis autem.', 48, 3, NULL, NULL),
(127, 'Expedita qui non ea.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Sit voluptas sed sit voluptatem assumenda.', 'Nesciunt et dolor eaque explicabo eum. Illum est ut rerum et eos repellendus illo. Neque recusandae enim facilis et. Cum vel mollitia molestiae molestias et repudiandae.', 235, 1, NULL, NULL),
(128, 'Ut quo rerum harum.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Sequi sint aut velit qui hic autem.', 'Recusandae quis laudantium optio. Autem fugit asperiores qui quo iure. Suscipit perferendis laborum cum nulla modi repudiandae ea. Enim error perferendis animi consequatur tenetur et.', 894, 1, NULL, NULL),
(129, 'Sint qui eius ipsa.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Optio ut autem eveniet dolorem molestiae.', 'Veniam eaque pariatur rem sit beatae. Voluptatem placeat ut reprehenderit atque. Explicabo corporis et quam nisi voluptatem quod.', 345, 2, NULL, NULL),
(130, 'Qui enim et sit neque.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Rerum aliquid non ex saepe ullam consequatur.', 'Quod consectetur minima vel ex dolorem reprehenderit. Et ea et ipsam eos dolores aut nobis. Consequatur fuga quo error dignissimos voluptatem sed voluptas.', 105, 1, NULL, NULL),
(131, 'Modi autem facilis est.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Voluptas sit id quo ipsam explicabo.', 'Sed consequatur ea nostrum sequi suscipit minima aut. Similique dolorem magni corrupti velit aut. Totam ut voluptatum est enim in sequi.', 444, 4, NULL, NULL),
(132, 'Dolorum fuga quos quasi.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Quia voluptatem ex et cumque excepturi assumenda.', 'Dolorem tenetur officia fuga non porro. Ipsum provident recusandae voluptatem itaque. Qui nesciunt architecto velit consequatur magni sunt molestiae quia. Harum adipisci ut iusto.', 331, 1, NULL, NULL),
(133, 'Libero est modi omnis.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Sed asperiores hic et deleniti.', 'Ut quaerat quibusdam aut ut. Cumque atque nostrum non iure qui aut. Rerum vitae nemo placeat voluptas nesciunt repudiandae. At beatae similique commodi. Eos voluptatibus asperiores voluptatem illum.', 313, 3, NULL, NULL),
(134, 'Qui nemo fuga ut.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Repellendus sed architecto sint.', 'Enim necessitatibus qui quia recusandae eos. Aut veritatis voluptatibus accusantium eos ratione quae. Beatae rerum molestias natus molestiae est.', 646, 3, NULL, NULL),
(135, 'Hic minus culpa omnis.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Quam totam est architecto officia nobis.', 'Ea rerum voluptate quia dolor harum nemo. Voluptates ad fugit occaecati atque quia earum. Ipsa quae et et quam nesciunt.', 310, 4, NULL, NULL),
(136, 'Delectus ad est aliquid.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Dicta nemo sequi numquam corrupti officiis ipsa.', 'Sed libero voluptates enim mollitia tempore. Similique rem in labore nobis.', 520, 3, NULL, NULL),
(137, 'Corporis est aut sit et.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Accusantium illo repudiandae est.', 'Laboriosam exercitationem quam nam perspiciatis occaecati et. Non totam dolore atque placeat ipsa et sed. Fugit consequatur est rerum modi nihil. Itaque fuga id commodi neque.', 506, 3, NULL, NULL),
(138, 'Ut qui laudantium aut.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Et consequatur aut omnis esse et id labore.', 'Ut quia est quia ut provident deserunt aut. Deserunt culpa sunt quidem mollitia velit. Magni eveniet voluptas dolores nihil ipsa assumenda.', 72, 3, NULL, NULL),
(139, 'Ut voluptas non sit.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ipsum ab et voluptas autem iusto ut perferendis.', 'Vitae pariatur quibusdam alias cum nulla vitae. Voluptas et explicabo quisquam. Numquam dolor et dolores reiciendis. Earum molestiae animi quia beatae perferendis quos.', 210, 4, NULL, NULL),
(140, 'Enim et atque voluptas.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Cumque qui doloribus autem aut autem repudiandae.', 'Mollitia placeat aspernatur quia animi. Quam aut earum quisquam id tenetur.', 7, 4, NULL, NULL),
(141, 'Alias rem id aut qui.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Et omnis aut doloribus dolorem et dignissimos.', 'Minus nulla sunt sed incidunt aut. Officia commodi repellendus veritatis nam dolor deleniti omnis. Reprehenderit similique totam autem in dolore. Illum non molestias sunt consequatur.', 889, 4, NULL, NULL),
(142, 'A et iste dolorum aut.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Molestias ut quae aut quis.', 'Magni dicta inventore magni voluptatem. Excepturi est aut aspernatur velit. Consequatur dolores molestiae enim ut est magni.', 515, 1, NULL, NULL),
(143, 'Dolores vitae earum aut.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Non sit autem dicta atque perferendis.', 'Sunt culpa ab cumque facere sunt quia. Ea rerum tempora provident ut delectus mollitia ducimus. Molestiae quasi vel sit suscipit a est inventore.', 886, 1, NULL, NULL),
(144, 'Nisi dolor vel nobis.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Eveniet iste et sed magnam earum aliquid.', 'Ad quia temporibus occaecati perspiciatis nihil fugit. Quisquam veritatis reprehenderit quia at ipsa eveniet a. Nemo recusandae officia laborum dolores quisquam.', 158, 4, NULL, NULL),
(145, 'Et sunt molestiae id et.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Voluptates illum voluptas aut ut quo facilis.', 'Dolores inventore ut rem consequatur. Aut dolorem sunt error non. Vitae consequatur quo ut assumenda ad et.', 907, 4, NULL, NULL),
(146, 'Et qui quia est.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Deserunt est vitae sint.', 'Error enim delectus nostrum explicabo fugiat aut aut. Reiciendis qui voluptates molestiae explicabo neque est.', 493, 3, NULL, NULL),
(147, 'Et natus optio incidunt.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ullam nemo temporibus dolores tenetur.', 'Eaque earum labore et corrupti. Sit cupiditate maiores corrupti neque labore voluptas adipisci. Voluptatem nemo distinctio dolorem nulla. Enim voluptas perferendis dolor expedita maxime sunt esse.', 986, 2, NULL, NULL),
(148, 'Non velit aut nam ex.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Qui quis suscipit quaerat.', 'Qui in repellat non fugit. Autem eos ut sed voluptatem voluptatem illum. Quasi ab nobis ut praesentium ab nulla corrupti. Omnis voluptatibus ea aut sunt quia debitis.', 715, 1, NULL, NULL),
(149, 'Natus enim aut quam eos.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ut quis sint dolorem. Est id in aliquid dolor.', 'Id reprehenderit aliquam quod enim sapiente quia. Sunt rem quis error sint eius minima.', 343, 3, NULL, NULL),
(150, 'Et mollitia quis ut ut.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ut cumque laudantium sunt nemo ut.', 'Eos nemo ut minus eius. Dolores quisquam quibusdam praesentium earum quas blanditiis.', 710, 2, NULL, NULL);
INSERT INTO `posts` (`id`, `title`, `image`, `description`, `content`, `view`, `cate_id`, `created_at`, `updated_at`) VALUES
(151, 'Qui quos aut nobis.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Deserunt et omnis suscipit eos aut laborum.', 'Modi et magni soluta mollitia dolor. Et consequatur ratione quia cum. Odit veritatis necessitatibus quo alias nemo accusantium beatae.', 351, 3, NULL, NULL),
(152, 'Harum ut est natus sit.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Officia quia eos qui minima impedit quaerat.', 'Libero delectus deserunt consequatur sunt. Numquam ad quaerat quisquam amet ut magni. Alias omnis velit nihil aliquid voluptas nesciunt at voluptatibus. Id minima nam quo cum iusto a eum et.', 684, 2, NULL, NULL),
(153, 'Ea et dicta qui numquam.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Nemo ullam incidunt optio est.', 'Consectetur earum debitis deleniti. Sed provident omnis voluptas quaerat exercitationem eos voluptatem non. Id sunt veritatis quo. Neque temporibus et temporibus numquam consequatur voluptatem.', 827, 4, NULL, NULL),
(154, 'Eos earum odit quis est.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ut unde quia debitis expedita beatae.', 'Magni aut laborum officia animi. Quo ea debitis laboriosam est dolores. Iste numquam assumenda voluptas sint amet itaque. Consequatur iste sunt temporibus fuga qui.', 315, 1, NULL, NULL),
(155, 'Qui et veritatis quas.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Totam fuga deserunt officiis ipsa minus nesciunt.', 'Et doloremque totam velit ipsa eos nihil. Et deleniti veniam minima sint.', 925, 1, NULL, NULL),
(156, 'Quas quis tempora enim.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Commodi consequatur ullam consequatur.', 'Et explicabo facere mollitia sunt aut quo. Itaque harum at sed neque dolorem quis. Magni error dolorum quis ut at pariatur. Laudantium cupiditate optio vitae alias in vel optio.', 680, 4, NULL, NULL),
(157, 'Nihil iusto eum qui hic.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Dolore et consequatur voluptatem repellat.', 'Et quo nihil illo laborum. Accusantium sed quia optio quod. Explicabo ipsum ut minima assumenda blanditiis. Totam est et assumenda vitae quo officiis.', 672, 4, NULL, NULL),
(158, 'In vitae eos facilis.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Qui voluptatem quas cumque vel quis vero sit.', 'Commodi laborum dolor expedita voluptatem libero ipsam iste libero. Minima quaerat nobis facilis delectus eos. Sint dolore vero sequi totam sint aut.', 527, 1, NULL, NULL),
(159, 'Rerum id eaque numquam.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Aperiam aut odio ut sint ab cumque animi.', 'Itaque et nemo corrupti facilis. Culpa non ut sit doloremque nostrum quam sapiente. Qui cumque repellat ipsum in autem. Et eos est suscipit iste illum.', 978, 3, NULL, NULL),
(160, 'Eius et quas enim.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Unde et molestiae suscipit reiciendis.', 'Molestiae autem totam enim nostrum voluptatum dolor laudantium. Minima occaecati atque quasi id. Voluptate voluptas voluptas placeat qui. Non enim vel eius adipisci odio doloribus facere.', 407, 3, NULL, NULL),
(161, 'Ea et ipsum quia.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Est et eos doloremque atque quia.', 'Fuga quaerat repellendus maxime ut beatae ullam placeat. Sit aut officiis reiciendis ut. Dolore aut et illum nihil voluptatum a.', 217, 2, NULL, NULL),
(162, 'Aut id minus quo.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Eius eos est omnis ducimus.', 'Quas aut iure et impedit illum harum. At sint quas nobis excepturi. Maxime porro maxime dolorem asperiores voluptatum ratione laborum. Incidunt inventore ex sed voluptatem vel.', 352, 1, NULL, NULL),
(163, 'Iusto ipsa et qui.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'A est voluptatem repudiandae tempore.', 'Nihil ducimus fugit eos aliquid consequuntur. Cumque placeat consequuntur dolore ab aspernatur et. Modi assumenda deleniti vitae quis autem.', 140, 1, NULL, NULL),
(164, 'Maxime cumque nemo unde.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Et magnam libero nisi animi deleniti.', 'Eaque non autem molestias consequuntur qui. Autem facere quidem iusto est. Delectus doloremque vel pariatur nam ut id ipsam. Nam dignissimos vitae quo laudantium. Qui quisquam dolorum aut sit quo et.', 470, 1, NULL, NULL),
(165, 'Ex omnis et a.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Est delectus sed quasi dolorum officiis earum.', 'Maxime sit sit ipsam quod. Alias sint nihil commodi recusandae consequatur sint et. Rem expedita dignissimos cupiditate error magni nemo. Autem non atque necessitatibus enim praesentium assumenda.', 452, 2, NULL, NULL),
(166, 'Aut sit quod harum.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Delectus dolores voluptas impedit incidunt.', 'Non laborum veniam ut architecto facilis. Et qui odit rem adipisci eum eaque. Doloribus sit totam laudantium quia nobis veniam sunt. Aut et ipsam molestiae tempore unde sit autem.', 61, 3, NULL, NULL),
(167, 'Et fugit et vel labore.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Nulla odit non quaerat.', 'Ducimus harum placeat neque eum molestiae quo consequatur. Qui consequatur ut quia eligendi ut eum corrupti et. Rerum ut aut fugit adipisci. In in nulla dolore voluptatum voluptatem porro quo.', 843, 3, NULL, NULL),
(168, 'Ea amet sunt iusto.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Ipsum corrupti accusantium et aperiam.', 'Nihil voluptas facilis sunt esse. Dolor porro ea harum voluptas sunt sequi qui. Quod ullam officiis delectus est odio est soluta.', 220, 3, NULL, NULL),
(169, 'Ea est tenetur dicta.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Sint vel doloremque atque aut.', 'Totam accusamus illum id labore tempore. Eos voluptatem non quae saepe.', 347, 3, NULL, NULL),
(170, 'Qui magnam nulla a rem.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Non ab nesciunt deleniti.', 'Placeat quos sit quos odit cum. Animi voluptates nihil praesentium voluptatem nam. Adipisci saepe est velit dolore. Laudantium dignissimos enim ut nulla et dolores ut deleniti.', 94, 4, NULL, NULL),
(171, 'Consequatur et sit cum.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Odit alias earum dignissimos.', 'Eum dolorem voluptatem praesentium inventore quo autem rerum ducimus. Alias voluptatem eum eum voluptatibus. Inventore vel possimus commodi consequatur ex pariatur.', 549, 2, NULL, NULL),
(172, 'Qui explicabo soluta et.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Quia numquam facere sit sit.', 'Quia nihil sit commodi et qui eum facere. Voluptatum atque natus deleniti id. Iure et rerum facilis provident quod. Est quasi eum cum officia non repellat.', 237, 2, NULL, NULL),
(173, 'Quo aperiam est velit.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Esse iste veritatis eos nihil dolor nesciunt.', 'Odit et reprehenderit doloremque. Explicabo possimus vel sint et maiores est. Repellendus delectus tempora aliquid quia.', 373, 1, NULL, NULL),
(174, 'Enim quia et optio.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Est eius deserunt aut dolor.', 'Distinctio aut nihil optio velit non sunt molestiae. Eos ab rerum enim. Sunt molestiae sint rerum sunt. Qui aut ut a quis sunt sint. Dolores repellat architecto voluptatem saepe.', 810, 1, NULL, NULL),
(175, 'Facere vitae eaque aut.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Distinctio harum ut sint laudantium id ex soluta.', 'Ratione ea quis ut corporis veniam non. Facilis qui autem repellat harum id magnam aliquam. Qui totam culpa in sed harum deleniti quia.', 983, 2, NULL, NULL),
(176, 'Ut facere et aut et.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Odio facere corrupti sint vero earum.', 'Ea beatae sunt aspernatur natus fugiat voluptate labore. Et rerum veniam impedit in error necessitatibus. Numquam tempora dolor vitae sed et eligendi nemo ut.', 851, 4, NULL, NULL),
(177, 'Quo et quo et sint.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Illo fugiat nam molestiae ipsam.', 'Accusantium consequatur reiciendis officiis ea mollitia voluptatem. Illo dolorem dignissimos quo optio. In fuga vitae blanditiis molestias et libero fugiat.', 102, 4, NULL, NULL),
(178, 'Qui cumque debitis iste.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Nam expedita ut illo.', 'Consequatur qui perspiciatis amet consequuntur voluptatem. Vel quaerat quis reprehenderit nemo odio. Ipsum dolores sunt harum odit dicta. Consequatur aliquam ut quis recusandae culpa.', 221, 2, NULL, NULL),
(179, 'Nobis esse rerum enim.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Quo aliquam unde est ab dolorem quo illo.', 'Non est fuga eveniet nam enim dolore. Nostrum error quae voluptatem vero saepe. Voluptatem voluptatem quis et dolorem sint. Est velit dolorem maiores est quia labore quidem.', 579, 3, NULL, NULL),
(180, 'Debitis nihil at sed.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Aut alias omnis omnis provident dolores.', 'Et perspiciatis nisi hic voluptates. Soluta excepturi quae provident sed hic.', 366, 4, NULL, NULL),
(181, 'Ea architecto et id.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Doloremque labore repellendus quos qui.', 'Quasi dolor sunt ratione deserunt. Corporis aut alias nihil minima doloribus est. Officia nihil sed qui ut.', 862, 2, NULL, NULL),
(182, 'Enim sit rerum eos nemo.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Minus veritatis veritatis est quo.', 'Voluptatem fugit eaque et sequi. Quis quis et dolor et delectus molestias quae accusantium. Id sed ad tempore aut excepturi nostrum qui. Qui dolorem reprehenderit at quam dolorem sunt veniam.', 545, 3, NULL, NULL),
(183, 'Iure ut eveniet sit sit.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Itaque quia amet et suscipit ad.', 'Iusto fuga eius et et. Qui consectetur distinctio nam provident sed. Mollitia non in quam dolore reprehenderit occaecati illum aspernatur. Quos et voluptatem aut.', 227, 1, NULL, NULL),
(184, 'Rem sit commodi ducimus.', 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg', 'Dolor non consequuntur est numquam cupiditate.', 'Incidunt aut ipsa sint amet molestiae consequatur et. Illo qui reiciendis tempore. Hic consequuntur aut culpa amet.', 703, 4, NULL, NULL),
(185, 'Cumque eum officiis aut.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Dignissimos libero sit odio.', 'Quo et consequuntur est voluptatem impedit impedit nobis ut. Voluptas et enim minima iure possimus. Ipsam atque perspiciatis asperiores fuga tempora dolorem maxime nisi.', 663, 2, NULL, NULL),
(186, 'Est magni qui est.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Ut sit delectus sed quis est ut.', 'Delectus nihil deserunt aliquam excepturi accusamus. Qui illum voluptatem tempora corrupti. Id ea sint culpa et.', 10, 3, NULL, NULL),
(187, 'Asperiores et veniam ut.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Quidem vel est enim nihil.', 'Quia eligendi consequuntur quae sint suscipit. Ut et et sit nulla ullam et. Repellat dolore vel sint quia.', 226, 3, NULL, NULL),
(188, 'Libero quis dolore et.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Quia eos id laborum.', 'Nesciunt possimus consectetur porro placeat rem enim iure qui. Dolorem nam ad ut dolor ad non. Vel sunt voluptatem autem illo atque. Consequatur facere illo enim dolores id eveniet.', 482, 1, NULL, NULL),
(189, 'Laborum at sit qui sunt.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Ratione doloremque eum quia.', 'Explicabo voluptate autem harum dolores eius quod distinctio magni. Quisquam aperiam et dicta est sed commodi est. Est numquam corporis excepturi tempora.', 122, 3, NULL, NULL),
(190, 'Nobis eius possimus a.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Optio ea quisquam nihil.', 'Cum omnis qui placeat nesciunt ut nesciunt corrupti. Maiores est possimus delectus qui voluptatem et. Sunt dolor temporibus aliquam eum quidem voluptas.', 461, 3, NULL, NULL),
(191, 'Eius earum et et autem.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Quia voluptatibus in atque.', 'Hic mollitia voluptates voluptas temporibus voluptatem. Debitis occaecati at officia recusandae dolores quia aperiam. Aliquid soluta quia odit aperiam nostrum. Autem aut quas neque voluptate.', 220, 4, NULL, NULL),
(192, 'Aut optio enim ut nemo.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Dignissimos quos veniam dolorem sint.', 'Occaecati culpa vel molestias quia distinctio et rerum quis. Explicabo debitis rem autem. Nemo mollitia similique nisi aspernatur ut consequatur temporibus.', 317, 4, NULL, NULL),
(193, 'Facilis rem modi rerum.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Aliquam porro voluptates fugit nobis quaerat.', 'Aut ratione ad corporis optio vel adipisci laboriosam. Aut sed hic itaque ratione.', 220, 2, NULL, NULL),
(194, 'Optio sed non enim aut.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Suscipit tempore rerum est veritatis id.', 'Occaecati occaecati sequi cupiditate minima similique voluptas est. Unde iste a officia quia sapiente. Est illo velit quibusdam molestias.', 847, 4, NULL, NULL),
(195, 'Non a tenetur hic nobis.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Dignissimos rerum necessitatibus explicabo sint.', 'Consectetur non odio assumenda quia. Ut consectetur molestiae sapiente enim quia. Odio consequatur voluptatem ut porro. Temporibus placeat porro quidem nesciunt.', 99, 1, NULL, NULL),
(196, 'Assumenda sed et fugit.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Modi veritatis nemo consequuntur.', 'Ratione nemo a doloribus quidem. Dolorum ut rerum nihil velit voluptas. Facere fugit eos sed tempora voluptas ex. Nihil est et veritatis minima illo fuga cumque.', 689, 4, NULL, NULL),
(197, 'Et dolorum adipisci sit.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Repellendus sit consequuntur delectus.', 'Harum ipsam delectus nisi cum. Aperiam labore necessitatibus excepturi nisi. Dolores repudiandae consequuntur omnis nihil sit eos culpa repudiandae.', 290, 1, NULL, NULL),
(198, 'Velit et omnis magni.', 'images/QTNxVLODkDewlQbVOGEcLtTX8A23U4VA1V6c2bIq.png', 'Ut non minus officia architecto voluptate.', 'Atque est facere cumque aliquam iste error fugit. Nihil omnis ad repudiandae distinctio. Aperiam ab tempore ad dolorem accusamus est. Totam maxime ut rerum in totam ipsa omnis qui.', 586, 4, NULL, NULL),
(199, 'Aperiam aut et ea aut.', 'images/MixOWp9lvyp2tllG7F8KArrX1lUzSynP12a6waKR.png', 'Sit optio sed dolorem suscipit.', 'Consequuntur vero non mollitia quia repudiandae corporis. Architecto expedita expedita ut quia excepturi. Incidunt est id aliquid ab facilis eos voluptatem.', 567, 4, NULL, '2024-09-04 01:49:08'),
(205, '\"Kim chỉ nam\" cho hành động của toàn Đảng, toàn quân và toàn dân', 'images/C7lXBtJlbtnNTjB1g24qBvzTYRsbxoVKFpHzAiac.jpg', '\"Kim chỉ nam\" cho hành động của toàn Đảng, toàn quân và toàn dân', '\"Kim chỉ nam\" cho hành động của toàn Đảng, toàn quân và toàn dân', 100, 1, '2024-08-02 20:05:30', '2024-08-02 20:17:41'),
(206, 'Thủ tướng Phạm Minh Chính tiếp Ngoại trưởng Hoa Kỳ Antony Blinken', 'images/x8I0DOGB8KLF6LUgYYBqyPRnAQxcuQAvTiXlv0M0.png', 'Thủ tướng Phạm Minh Chính tiếp Ngoại trưởng Hoa Kỳ Antony Blinken', 'Thủ tướng Phạm Minh Chính tiếp Ngoại trưởng Hoa Kỳ Antony Blinken', 1305, 1, '2024-08-02 20:19:24', '2024-09-04 01:48:01'),
(207, 'Chủ tịch nước Tô Lâm chủ trì lễ đón Tổng thống Timor-Leste thăm cấp Nhà nước', 'images/8zZkaWzQX1UrQSsQwaM4zxDL1Rew50F0OGCSkQzw.png', 'Chủ tịch nước Tô Lâm chủ trì lễ đón Tổng thống Timor-Leste thăm cấp Nhà nước', 'Chủ tịch nước Tô Lâm chủ trì lễ đón Tổng thống Timor-Leste thăm cấp Nhà nước', 551, 1, '2024-08-02 20:30:03', '2024-09-04 01:26:05'),
(208, 'Ukraine muốn chiếm giữ lãnh thổ ở tỉnh Kursk \'vô thời hạn\'', 'images/OiRknTSGujepnU88jOKFNd9TXNSMpa0MofVKWuyc.jpg', 'Ông Zelensky nói Ukraine có ý định giữ những khu vực đã kiểm soát được ở tỉnh Kursk của Nga vô thời hạn nhằm ép ông Putin đàm phán.', '\"Chúng tôi không cần đất của họ và không muốn mang lối sống của người Ukraine tới đó\", Tổng thống Ukraine Volodymyr Zelensky ngày 3/9 nói trong cuộc phỏng vấn đầu tiên với đài NBC News của Mỹ kể từ khi Kiev mở chiến dịch xuyên biên giới vào tỉnh Kursk của Nga.\n\nDù vậy, ông Zelensky cho biết Ukraine có kế hoạch giữ các vùng lãnh thổ đã kiểm soát được ở vùng Kursk vô thời hạn để ép Tổng thống Nga Vladimir Putin phải bước vào bàn đàm phán. Lãnh đạo Ukraine nhấn mạnh việc duy trì kiểm soát các vùng lãnh thổ trên là một phần trong \"kế hoạch chiến thắng\"của ông nhằm kết thúc xung đột, thêm rằng mình sẽ trình bày kế hoạch này với các đối tác quốc tế, trong đó có Mỹ.\n\n\"Hiện tại, chúng tôi cần nó\", Tổng thống Zelensky cho hay, đề cập các vùng lãnh thổ Ukraine đang kiểm soát ở tỉnh Kursk.\n\nUkraine đã tuyên bố chiếm gần 1.300 km2 lãnh thổ và bắt hàng trăm tù binh Nga sau khi mở cuộc tấn công bất ngờ vào tỉnh Kursk hôm 6/8.', 2898, 5, '2024-09-03 21:55:48', '2024-09-04 01:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thị Hoài', 'nguyenhoai', 'hoaintph36134@fpt.edu.vn', NULL, '$2y$12$k2jfJzZvaIvow8fRPOqB5.HmKk3c/6hb3i4aUPbUrMfaqI4FM3OL.', 'user', NULL, '2024-07-29 20:34:40', '2024-07-29 20:34:40'),
(2, 'Nguyễn Thị Hoài', 'admin', 'hoainguyen07122004@gmail.com', NULL, '$2y$12$zVzL.FssDQ392VQ2gWnW6u0rDQJem7E2hNM8XBLr2xzRH24ahZ5d6', 'admin', NULL, '2024-07-29 21:24:33', '2024-07-29 21:24:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_department_id_foreign` (`department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_posts_categories` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
