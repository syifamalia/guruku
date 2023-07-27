-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2023 at 07:53 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guruku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Syifa Amalia', 'syifamalia', 'syifamalia@gmail.com', '$2y$10$LZNr6zixIur0d/Bm7Qu03Oi6YQh4B4oYXP0/t7WuqbHy11brxj022', '2022-01-20 08:18:19', '2022-01-20 08:18:19'),
(2, 'Shania Susanti', 'shaniasusanti', 'shania@gmail.com', '$2y$10$LEGO/1CROyb7TySVLe0DOuKiRLG3/u2LhXwHYR9uCPtp3oKd4xvoS', '2022-02-01 03:11:27', '2022-02-01 03:11:27'),
(3, 'Reyna Amilah', 'reynamilah', 'reyna@gmail.com', '$2y$10$o9j.Q7steFsR4hg8MMbIrOpLxUOL8LbF632vaOuo7cwnGcGRLZOwe', '2022-10-23 23:55:45', '2022-10-23 23:55:45'),
(4, 'Reyna Amilash', 'reynachan', 'reynam@gmail.com', '$2y$10$WJyH4fddVZYblwmhbBaxge/6OMrko1Ol69zCRytDYrFaEIKNZrBQy', '2023-05-19 03:10:19', '2023-05-19 03:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_category_id`, `tittle`, `slug`, `image`, `desc`, `desc_body`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tantangan Membaca di Era Digital', 'tantangan-membaca-di-era-digital', 'article-images/Ba6Nn9evMvLNRvGRs5HKbOACPNyAOgCRxyP7XAOJ.png', 'Era digital sekarang ini ternyata secara tidak sadar mengubah kegiatan yang kita kenal sebagai membaca. Tidak hanya itu, era digital juga telah mengub...', '<div>Era digital sekarang ini ternyata secara tidak sadar mengubah kegiatan yang kita kenal sebagai membaca. Tidak hanya itu, era digital juga telah mengubah pengertian membaca, cara orang membaca, dan materi atau bahan bacaan. Kenyataan bahwa kita dipaksa beradaptasi dengan pandemi Covid-19 telah menyebabkan kita semakin diarahkan kepada tantangan membaca yang tidak terduga sebelumnya, yaitu membaca digital.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:19:18', '2022-01-31 08:19:18'),
(2, 1, 'Minim Prestasi di Tengah Pandemi', 'minim-prestasi-di-tengah-pandemi', 'article-images/VHdr24dQHqA6pjzJllWEYIUJbULvSncLgY7S7oPZ.png', 'Sudah berapa lama pandemi menguasai negeri ini. Tidak lagi ada berita prestasi siswa yang muncul di televisi, yang ada hanya artis ternama yang baru n...', '<div>Sudah berapa lama pandemi menguasai negeri ini. Tidak lagi ada berita prestasi siswa yang muncul di televisi, yang ada hanya artis ternama yang baru naik daun “Covid 19”. Seluruh pelajar dan pengajar merasakan dampak dari pandemi, sehingga sangat minim sekali prestasi di tengah pandemi.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:19:45', '2022-01-31 08:19:45'),
(3, 1, 'Tantangan Guru di Era Revolusi Industri 4.0', 'tantangan-guru-di-era-revolusi-industri-4-0', NULL, 'Dunia tengah memasuki era revolusi industri 4.0 dan membutuhkan sumber daya manusia yang tidak hanya mengandalkan kemampuan teknis saja. Perkembangan...', '<div>Dunia tengah memasuki era revolusi industri 4.0 dan membutuhkan sumber daya manusia yang tidak hanya mengandalkan kemampuan teknis saja. Perkembangan ilmu pengetahuan dan teknologi telah mengubah dunia sebagaimana revolusi industri generasi pertama melahirkan sejarah ketika tenaga manusia dan hewan digantikan oleh kemunculan mesin uap pada abad ke-18. Revolusi ini dicatat oleh sejarah berhasil mengangkat naik perekonomian secara dramatis.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:24:35', '2022-01-31 08:24:35'),
(4, 2, 'Nilai-nilai Utama Sekolah Inklusi, Merayakan Keunikan Setiap Anak', 'nilai-nilai-utama-sekolah-inklusi-merayakan-keunikan-setiap-anak', 'article-images/IMnXILkCsp4IlEB6kWHE7BVTdxXfgCR6HCFkm5mQ.png', 'Setiap anak memiliki potensi berbeda-beda, termasuk anak-anak berkebutuhan khusus. Anak dengan keterbatasan fisik, psikis atau kemampuan otak yang ber...', '<div>Setiap anak memiliki potensi berbeda-beda, termasuk anak-anak berkebutuhan khusus. Anak dengan keterbatasan fisik, psikis atau kemampuan otak yang berbeda, sejatinya memiliki potensi walau cara mengasahnya memerlukan cara yang tak biasa. Untuk mengembangkan potensi anak berkebutuhan khusus, sekolah inklusi bisa menjadi pilihan orangtua.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:25:08', '2022-01-31 08:25:08'),
(5, 2, 'Mencari Sekolah Inklusi untuk Anak, Perhatikan 4 Aspek Esensial', 'mencari-sekolah-inklusi-untuk-anak-perhatikan-4-aspek-esensial', 'article-images/SH2ihEBKgF3LgZN6FRUeBLzMnpJ13PpzlmHOw612.png', 'Memahami pentingnya nilai-nilai sekolah inklusi bagi anak berkebutuhan khusus perlu ditingkatkan di kalangan masyarakat. Mengingat masih banyak miskon...', '<div>Memahami pentingnya nilai-nilai sekolah inklusi bagi anak berkebutuhan khusus perlu ditingkatkan di kalangan masyarakat. Mengingat masih banyak miskonsepsi mengenai sekolah inklusi bagi anak-anak berkebutuhan khusus. Sebagai pendidik anak berkebutuhan khusus di Pendidikan Inklusi Cikal, Novia Anggraeni Iskandar atau yang akrab disapa Novia, menekankan beberapa poin penting yang perlu diketahui masyarakat Indonesia tentang sekolah inklusi.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:25:53', '2022-01-31 08:25:53'),
(6, 2, 'Cara Bangun Motivasi Belajar Anak Berkebutuhan Khusus Selama PJJ', 'cara-bangun-motivasi-belajar-anak-berkebutuhan-khusus-selama-pjj', 'article-images/ftNv4GPgfbuKklnyJDIQLHDmWcn6TEAoXy8Xuvoq.png', 'Proses belajar daring di tengah pandemi Covid-19 bukanlah kondisi ideal bagi anak berkebutuhan khusus (ABK). Meski begitu, ada yang bisa dilakukan ora...', '<div>Proses belajar daring di tengah pandemi Covid-19 bukanlah kondisi ideal bagi anak berkebutuhan khusus (ABK). Meski begitu, ada yang bisa dilakukan orangtua agar anak tetap mendapatkan hak untuk belajar. Psikolog Cikal, Dini Rahmawati mengatakan ada beberapa strategi yang dapat diterapkan orangtua bisa membantu memotivasi anak berkebutuhan khusus untuk tetap semangat dalam proses belajar saat ini.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:26:17', '2022-01-31 08:26:17'),
(7, 3, 'Apa Itu AKM (Asesmen Kompetensi Minimum)', 'apa-itu-akm-asesmen-kompetensi-minimum', 'article-images/ivqyJej7EXn47uTO49MLjAOKbkZnYDBjKunzVdET.png', 'Jika anda sampai hari ini belum memahami sebenarnya apa itu AKM dan apa tujuan dari pemerintah memutuskan kebijakan AKM ini serta apa implikasi dari A...', '<div>Jika anda sampai hari ini belum memahami sebenarnya apa itu AKM dan apa tujuan dari pemerintah memutuskan kebijakan AKM ini serta apa implikasi dari AKM untuk sekolah terutama pembelajaran. Maka saya rekomendasikan anda untuk membaca artikel ini sampai selesai.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:26:47', '2022-01-31 08:26:47'),
(8, 3, 'Menurut Survei, Guru Malaysia Paling Berdedikasi di Dunia', 'menurut-survei-guru-malaysia-paling-berdedikasi-di-dunia', 'article-images/Ndx0iBsr0s5pRuQ3SCfSvAu7p24d00UaxPu6b8x9.png', 'Dilansir dari Kompas.com, Guru memainkan peran penting dalam kehidupan, karena mereka memberikan pengetahuan selama tahun-tahun paling mendasar yakni...', '<div>Dilansir dari Kompas.com, Guru memainkan peran penting dalam kehidupan, karena mereka memberikan pengetahuan selama tahun-tahun paling mendasar yakni dari usia 5 hingga 17-18 tahun. Guru-guru di Malaysia mendapat predikat sebagai “pendidik paling berdedikasi di dunia” dalam survei Cambridge baru-baru ini.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:27:21', '2022-01-31 08:27:21'),
(9, 3, 'Mutu Pendidikan Diperbaiki, Ini Ragam Prestasi yang Diraih Kalteng', 'mutu-pendidikan-diperbaiki-ini-ragam-prestasi-yang-diraih-kalteng', NULL, 'Peningkatan mutu pendidikan menjadi salah satu fokus kerja Pemerintah Provinsi Kalimantan Tengah. Sejumlah upaya perbaikan yang dilakukan Pemprov Kalt...', '<div>Peningkatan mutu pendidikan menjadi salah satu fokus kerja Pemerintah Provinsi Kalimantan Tengah. Sejumlah upaya perbaikan yang dilakukan Pemprov Kalteng membuahkan sederet prestasi di tingkat nasional. Pemprov Kalteng di bawah kepemimpinan Gubernur Sugianto Sabran dan Wakil Gubernur Habib Ismail bin Yahya meningkatkan kualitas pendidikan melalui berbagai aspek.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', '2022-01-31 08:28:17', '2022-01-31 08:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `tittle`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Artikel Pendidikan', 'artikel-pendidikan', '2022-01-31 08:18:12', '2022-01-31 08:18:12'),
(2, 'Pendidikan Khusus', 'pendidikan-khusus', '2022-01-31 08:18:20', '2022-01-31 08:18:20'),
(3, 'Berita Pendidikan', 'berita-pendidikan', '2022-01-31 08:18:44', '2022-01-31 08:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `title`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Putri Pudjiastuti', 'Ibu', 'putri@gmail.com', 81212456783, 'Saya ingin mengajukan kerja sama', '2022-02-01 03:32:05', '2022-02-01 03:32:05'),
(2, 'Irwan Habibi', 'Bapak', 'irwan@gmail.com', 81234569021, 'Ingin bekerja sama dengan Guruku.', '2022-02-01 03:33:00', '2022-02-01 03:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `diklats`
--

CREATE TABLE `diklats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diklat_category_id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regist_deadline` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diklats`
--

INSERT INTO `diklats` (`id`, `diklat_category_id`, `tittle`, `slug`, `image`, `desc`, `desc_body`, `trainer`, `regist_deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pembelajaran Applied Behaviour Analysis (ABA) Untuk PDBK Dengan Hambatan Autisme Bagi Guru SLB Dan Sekolah Inklusif', 'pembelajaran-applied-behaviour-analysis-aba-untuk-pdbk-dengan-hambatan-autisme-bagi-guru-slb-dan-sekolah-inklusif', 'diklat-images/xPUJKkGjCchySsV4alnzoUQAdsVIGtcJEdzzWOIA.png', 'Meningkatkan pengetahuan dan keterampilan guru Sekolah Luar Biasa dan penyelenggara pendidikan inklusif dalam melaksanakan penanganan permasalahan int...', '<div>Meningkatkan pengetahuan dan keterampilan guru Sekolah Luar Biasa dan penyelenggara pendidikan inklusif dalam melaksanakan penanganan permasalahan interaksi sosial dan komunikasi pada peserta didik dengan beragam hambatan dengan pembelajaran ABA.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Widya Permata', '2022-02-14 17:00:00', '2022-01-31 08:05:09', '2022-01-31 08:05:09'),
(2, 1, 'Media Pembelajaran Interaktif Di SD', 'media-pembelajaran-interaktif-di-sd', 'diklat-images/87goYUIL67G1txNR46S14ELansVEtdHM1s24YZ8I.png', 'Pelatihan media pembelajaran interaktif merupakan&nbsp; upaya mengoptimalkan pemanfaatan teknologi informasi terutama pada media interaktif dalam pemb...', '<div>Pelatihan media pembelajaran interaktif merupakan&nbsp; upaya mengoptimalkan pemanfaatan teknologi informasi terutama pada media interaktif dalam pembelajaran di Sekolah Dasar.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Hasim Habibi', '2022-02-08 17:00:00', '2022-01-31 08:05:52', '2022-01-31 08:05:52'),
(3, 2, 'Pengembangan Metode Pembelajaran Jarak Jauh', 'pengembangan-metode-pembelajaran-jarak-jauh', 'diklat-images/QdqQ9ECSuVZdDWjMln6JZXLmpEksejwQZbHvAEfh.png', 'Kelas ini menyajikan sekumpulan materi dari berbagai pakar di bidangnya terkait dengan pengembangan metode pengajaran jarak jauh. Pada kursus ini akan...', '<div>Kelas ini menyajikan sekumpulan materi dari berbagai pakar di bidangnya terkait dengan pengembangan metode pengajaran jarak jauh. Pada kursus ini akan dibahas beberapa tips maupun trip pengajaran yang terbukti mampu meningkatkan kualitas pengajaran jarak jauh. Aspek-Aspek Kunci dalam Mendesain Pembelajaran Jarak Jauh di <strong>Era New Normal; Peran Teaching Scenario (RPP 1 Lembar)</strong> untuk Efektivitas Pembelajaran Tatap Muka dan Virtual; dan Pengembangan Kurikulum Inovatif dan Penerapan Asesmen Pembelajaran.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Sadina Andriani', '2022-02-17 17:00:00', '2022-01-31 08:07:20', '2022-01-31 08:07:20'),
(4, 3, 'Aplikasi Pedagogical Content Knowledge untuk Jenjang Sekolah Menengah Atas sederajat', 'aplikasi-pedagogical-content-knowledge-untuk-jenjang-sekolah-menengah-atas-sederajat', 'diklat-images/vgBiNW2NR80ORHufz7YhRVwsxi1PLS9niaVtpgZ9.png', 'Bagaimana cara seorang guru mengajar mata pelajaran pada jenjang SMK di sekolah menggunakan konsep PCK (Pedagogical Content Knowledge) yang dikembangk...', '<div>Bagaimana cara seorang guru mengajar mata pelajaran pada jenjang SMK di sekolah menggunakan konsep PCK (Pedagogical Content Knowledge) yang dikembangkan oleh HAFECS. Konsep PCK ini dikembangkan untuk memudahkan bagaimana cara guru mengajar dan menumbuhkan semangat berinovasi dalam mengajar di kelas, agar dapat tercipta suasana belajar siswa yang menyenangkan dan tidak membosankan.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Mala Laksmiwati', '2022-02-18 17:00:00', '2022-01-31 08:08:02', '2022-01-31 08:08:02'),
(5, 1, 'Aplikasi Pedagogical Content Knowledge untuk Jenjang Sekolah Dasar sederajat', 'aplikasi-pedagogical-content-knowledge-untuk-jenjang-sekolah-dasar-sederajat', 'diklat-images/78RyMMsYF7gPTFyML0WK809Whnkv5BanOJt5q3cC.png', 'Bagaimana cara seorang guru mengajar mata pelajaran pada jenjang SD/MI di sekolah menggunakan konsep PCK (Pedagogical Content Knowledge) yang dikemban...', '<div>Bagaimana cara seorang guru mengajar mata pelajaran pada jenjang SD/MI di sekolah menggunakan konsep PCK (Pedagogical Content Knowledge) yang dikembangkan oleh HAFECS. Konsep PCK ini dikembangkan untuk memudahkan bagaimana cara guru mengajar dan menumbuhkan semangat berinovasi dalam mengajar di kelas, agar dapat tercipta suasana belajar siswa yang menyenangkan dan tidak membosankan.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Reksa Gunawan', '2022-02-09 17:00:00', '2022-01-31 08:08:43', '2022-01-31 08:08:43'),
(6, 2, 'Merancang RPP 1 Lembar dengan Teaching Scenario untuk Mata Pelajaran IPS untuk Jenjang Sekolah Menengah Pertama sederajat', 'merancang-rpp-1-lembar-dengan-teaching-scenario-untuk-mata-pelajaran-ips-untuk-jenjang-sekolah-menengah-pertama-sederajat', 'diklat-images/TTNBtwBAXOGIrMjeivyWN9Ebj4OPzxpc5PhGJu7J.png', 'Pada kursus ini guru diarahkan untuk dapat mengidentifikasikan siswa yang sudah mengerti dan siswa yang belum mengerti serta menjalanin hubungan pembe...', '<div>Pada kursus ini guru diarahkan untuk dapat mengidentifikasikan siswa yang sudah mengerti dan siswa yang belum mengerti serta menjalanin hubungan pembelajaran sebagai prioritasnya. Bagi siswa, Teaching Scenario dapat membangun pemahaman dari berpikir kritis serta lebih terbuka untuk berdiskusi.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Argono Marbun', '2022-02-25 17:00:00', '2022-01-31 08:09:33', '2022-01-31 08:09:33'),
(7, 3, 'Pembelajaran Diskrit Time Trial (DTT) Hambatan ADHD', 'pembelajaran-diskrit-time-trial-dtt-hambatan-adhd', NULL, 'Pembelajaran Diskrit Time Trial (DTT) yang dikembangkan dari metode LOvaas dapat menjadi bentuk penanganan yang paling sederhana dan mudah diterapkan....', '<div>Pembelajaran Diskrit Time Trial (DTT) yang dikembangkan dari metode LOvaas dapat menjadi bentuk penanganan yang paling sederhana dan mudah diterapkan.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Ajimin Prabowo', '2022-02-26 17:00:00', '2022-01-31 08:10:21', '2022-01-31 08:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `diklat_categories`
--

CREATE TABLE `diklat_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diklat_categories`
--

INSERT INTO `diklat_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Jenjang SD', 'jenjang-sd', '2022-01-31 08:03:13', '2022-01-31 08:03:13'),
(2, 'Jenjang SMP', 'jenjang-smp', '2022-01-31 08:03:24', '2022-01-31 08:03:24'),
(3, 'Jenjang SMA', 'jenjang-sma', '2022-01-31 08:04:08', '2022-01-31 08:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `downloadCount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `tittle`, `slug`, `image`, `author`, `file`, `synopsis`, `downloadCount`, `created_at`, `updated_at`) VALUES
(1, 'Dari Guru Konvensional Menuju Guru yang Profesional', 'dari-guru-konvensional-menuju-guru-yang-profesional', 'coverEbook-images/rsTIqsbeDmGjQXEy49DIolqmAIIr8TiYOVxEVNR5.png', 'Bagiya Wahyudin', 'ebooks/6b75MFDkfXiwGu9Dy236nYyhKCcxVwgLzU21pnos.pdf', 'Buku ini diperuntukan untuk Guru Konvensional Menuju Guru yang Profesional. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris suscipit velit sapien, at tristique orci faucibus sed.', 7, '2022-01-31 12:39:08', '2022-02-01 04:38:33'),
(2, 'Strategi Pembelajaran Multiple Intelligences', 'strategi-pembelajaran-multiple-intelligences', 'coverEbook-images/A2G6QfRUYYVxGherYsqbyBT6L8cYjJVt5NlY6ZgM.png', 'Sakura Kuswandari', 'ebooks/qc1I0X570ydQtkD4zPxaaVHxybbFM4IJatMZ6aPf.pdf', 'Buku ini diperuntukan untuk Strategi Pembelajaran Multiple Intelligences. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris suscipit velit sapien, at tristique orci faucibus sed.', 5, '2022-01-31 12:45:28', '2022-02-01 04:38:53'),
(3, 'Model Pembelajaran Spektakuler di Sekolah', 'model-pembelajaran-spektakuler-di-sekolah', 'coverEbook-images/BgILJod907AIe82bYadJNBT8u14d6InkJzK7RafH.png', 'Ina Susanti', 'ebooks/NzX2F6TDZAJlWVGQXQ08UP0NZVLnh7mMP5Ph4H8M.pdf', 'Buku ini diperuntukan untuk 45 Model Pembelajaran Spektakuler di Sekolah. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris suscipit velit sapien, at tristique orci faucibus sed.', 0, '2022-01-31 12:46:27', '2022-01-31 12:46:27'),
(4, 'Solusi Cerdas Dalam Pembuatan PTK', 'solusi-cerdas-dalam-pembuatan-ptk', 'coverEbook-images/JFTz5lSTeBOrj3KY2KoerMHWA8kNHacObV7JR1Fl.png', 'Kania Pertiwi', 'ebooks/Wi0nDvNUGCW0AT248bf8gOTrBumCJLLgxQi4YOI8.pdf', 'Buku ini diperuntukan untuk Solusi Cerdas Dalam Pembuatan PTK (Penelitian Tidakan Kelas). Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris suscipit velit sapien.', 0, '2022-01-31 12:47:59', '2022-01-31 12:47:59'),
(5, 'Sukses AKM dengan Penguatan Pada Pembelajaran Literasi dan Numerasi', 'sukses-akm-dengan-penguatan-pada-pembelajaran-literasi-dan-numerasi', 'coverEbook-images/SJXGDfAyUeiXvrUBiEeblKw2ct3BWWDss64TLk9O.png', 'Alika Yuliarti', 'ebooks/LIXdH2ncpq2eEusb91189sS2E07G1sGs1cMxMET9.pdf', 'Buku ini diperuntukan untuk Sukses AKM dengan Penguatan Pada Pembelajaran Literasi & Numerasi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris suscipit velit sapien.', 1, '2022-01-31 12:48:40', '2023-05-19 03:11:11'),
(6, 'Sintak Metode Pembelajaran Berpusat Pada Siswa', 'sintak-metode-pembelajaran-berpusat-pada-siswa', 'coverEbook-images/iZVxdwCx4vMLns4bznlrMJjNKEPjLiWwxb3A2IH5.png', 'Restu Pertiwi', 'ebooks/knHFXIvoKPlxg2aA6DKMUYkoFNUZfjT1BZrZeRxE.pdf', 'Buku ini diperuntukan untuk 45 Sintak Metode Pembelajaran Berpusat Pada Siswa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris suscipit velit sapien, at tristique orci faucibus sed.', 10, '2022-01-31 12:49:16', '2022-02-01 04:38:04');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2021_11_30_131614_create_trainings_table', 1),
(6, '2021_12_08_084755_create_admins_table', 1),
(7, '2021_12_22_130544_create_modules_table', 1),
(8, '2021_12_26_145419_create_diklats_table', 1),
(9, '2021_12_27_090458_create_diklat_categories_table', 1),
(10, '2022_01_12_121754_create_participants_table', 1),
(11, '2022_01_17_082201_create_seminar_workshop_categories_table', 1),
(12, '2022_01_17_082221_create_seminar_workshops_table', 1),
(13, '2022_01_17_131716_create_articles_table', 1),
(14, '2022_01_17_131803_create_article_categories_table', 1),
(15, '2022_01_17_131823_create_ebooks_table', 1),
(16, '2022_01_20_110245_create_reviews_table', 1),
(17, '2022_01_20_124140_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `training_id`, `subject`, `slug`, `videoLink`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cara Membuat Video Belajar Animasi Dengan Animaker', 'cara-membuat-video-belajar-animasi-dengan-animaker', 'XLmjjj_aHPI&t=1s', '2022-01-31 07:58:20', '2022-01-31 07:58:20'),
(2, 1, 'TUTORIAL VIDEO PEMBELAJARAN ANIMASI MENGGUNAKAN KINEMASTER', 'tutorial-video-pembelajaran-animasi-menggunakan-kinemaster', '34F6bDQyMbU', '2022-01-31 07:59:03', '2022-01-31 07:59:03'),
(3, 1, 'Cara Membuat Video Pembelajaran dengan Animasi', 'cara-membuat-video-pembelajaran-dengan-animasi', 'n0qITz-Hlf8', '2022-01-31 07:59:41', '2022-01-31 07:59:41'),
(4, 2, 'Tutorial dan Panduan Classroom', 'tutorial-dan-panduan-classroom', 'DpfIGO0L1g8&t=1s', '2022-01-31 08:00:33', '2022-01-31 08:00:33'),
(6, 3, 'Template Slide Go', 'template-slide-go', 'EDlwAVQLXRw', '2022-01-31 08:02:41', '2022-01-31 08:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `diklat_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `user_id`, `diklat_id`, `email`, `status`, `certificate`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 'ulya@gmail.com', 'Aktif', NULL, '2022-02-01 03:14:14', '2022-02-01 03:41:09'),
(2, 3, 6, 'gilda@gmail.com', 'Aktif', NULL, '2022-02-01 03:15:18', '2022-02-01 03:41:19'),
(3, 4, 7, 'gilang@gmail.com', 'Selesai', 'diklat-certificates/E1u9GiRVVGNtO1COYPILjc0oBEewhySwDii499As.png', '2022-02-01 03:16:12', '2022-02-01 03:45:54'),
(4, 5, 3, 'indah@gmail.com', 'Tidak Aktif', NULL, '2022-02-01 03:17:07', '2022-02-01 03:17:07'),
(5, 4, 3, 'gilang@gmail.com', 'Tidak Aktif', NULL, '2022-02-01 04:51:24', '2022-02-01 04:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `rate`, `review`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Website Guruku bisa menjadi salah satu inspirasi dalam pengembangan pembelajaran.', '2022-02-01 03:14:00', '2022-02-01 03:14:00'),
(2, 3, 3, 'Saya sadar belajar itu bisa dimanapun, kapanpun, dan dalam kondisi apapun. Nah, Guruku ini wadah yang tepat.', '2022-02-01 03:15:07', '2022-02-01 03:15:07'),
(3, 4, 3, 'Senang dengan adanya website Guruku bisa menambah ilmu pengetahuan dan wawasan sehingga ingin selalu meningkatkan kreativitas dan aktivitas dalam pembelajaran.', '2022-02-01 03:16:03', '2022-02-01 03:16:03'),
(4, 5, 4, 'Guruku sangat bermanfaat bagi saya terutama, apalagi saya sebagai guru Honorer sangat mudah mengikuti pelatihan dan artikel yang sangat bagus.', '2022-02-01 03:16:52', '2022-02-01 03:16:52'),
(5, 6, 3, 'ssss', '2023-03-23 07:02:16', '2023-03-23 07:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_workshops`
--

CREATE TABLE `seminar_workshops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seminar_workshop_category_id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `registLink` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `speaker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regist_deadline` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_workshops`
--

INSERT INTO `seminar_workshops` (`id`, `seminar_workshop_category_id`, `tittle`, `slug`, `image`, `desc`, `desc_body`, `registLink`, `speaker`, `regist_deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mendampingi Siswa Sukses Belajar di Masa Pandemi', 'mendampingi-siswa-sukses-belajar-di-masa-pandemi', 'seminarWorkshop-images/tUxuUgXBj0KeMoOoS8QopyedimdCmbkkqtNMz2P0.png', 'Seminar ini membahas tentang pelaksanaan pembelajaran daring selama masa pandemi dari sisi psikologis kurang lebih 90 menit. Selain itu, didiskusikan...', '<div>Seminar ini membahas tentang pelaksanaan pembelajaran daring selama masa pandemi dari sisi psikologis kurang lebih 90 menit. Selain itu, didiskusikan bagaimana cara yang efektif untuk mendampingi para siswa agar tetap dapat mengikuti pembelajaran dengan baik dari rumah. Dengan adanya program ini, diharapkan dapat membantu para guru dalam mendampingi siswa-siswi tetap semangat belajar di masa pandemi.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'https://docs.google.com/forms/d/e/1FAIpQLSeorHYZXBUns5FtmChjDAewT57DqXB9pomjiC4Havo-CH2YDg/viewform', 'Ophelia Wahyuni', '2022-02-18 17:00:00', '2022-01-31 08:12:37', '2022-01-31 08:12:37'),
(2, 1, 'SMART TEACHING: SOLUSI MENJADI GURU PROFESIONAL', 'smart-teaching-solusi-menjadi-guru-profesional', 'seminarWorkshop-images/wWAt3Ljg4K73gdetClTsFHevV2czPcdg8kJASxHR.png', 'Tuntutan kualifikasi profesi bagi seorang guru di era modern saat ini menjadi tidak mudah. Atas dasar itu kami berupaya memberikan fasilitas pada maha...', '<div>Tuntutan kualifikasi profesi bagi seorang guru di era modern saat ini menjadi tidak mudah. Atas dasar itu kami berupaya memberikan fasilitas pada mahasiswa untuk meningkatkan kompetensi dalam bidang keguruan dengan menyelenggarakan seminar “Smart Teaching : Solusi Menjadi Guru Profesional” pada tanggal 1 November 2021.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'https://docs.google.com/forms/', 'Garang Saragih', '2022-02-18 17:00:00', '2022-01-31 08:13:20', '2022-01-31 08:13:20'),
(3, 1, 'Aspek-aspek Kunci dalam Mendesain Pembelajaran Jarak Jauh di Era New Normal', 'aspek-aspek-kunci-dalam-mendesain-pembelajaran-jarak-jauh-di-era-new-normal', 'seminarWorkshop-images/VMiHBYq5BqMMT8zx3t7oubOdJCShw9ICMuoRr2iq.png', 'Aspek-Aspek Kunci Dalam Mendesain Pembelajaran Jarak Jauh Yang Efektif di Era The New Normal. Dibawakan oleh: MC/Moderator : Ahmad Afryan, S.I.P Naras...', '<div>Aspek-Aspek Kunci Dalam Mendesain Pembelajaran Jarak Jauh Yang Efektif di Era The New Normal. Dibawakan oleh: MC/Moderator : Ahmad Afryan, S.I.P Narasumber : 1. Prof. Dr. Aris Munandar, M.Pd. (Guru Besar Universitas Negeri Makassar) 2. Danang Bagus Yudistira (Deputy Director in Research, Development &amp; Production)<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'https://docs.google.com/forms/', 'Prof. Dr. Aris Munandar, M.Pd. (Guru Besar Universitas Negeri Makassar) & Danang Bagus Yudistira (Deputy Director in Research, Development & Production)', '2022-02-18 17:00:00', '2022-01-31 08:14:28', '2022-01-31 08:14:28'),
(4, 1, 'Memperkaya Kosakata Bahasa Indonesia dengan Menggunakan KBBI', 'memperkaya-kosakata-bahasa-indonesia-dengan-menggunakan-kbbi', NULL, 'Disediakan agar para guru dapat menggunakan aplikasi dan layanan Kamus Besar Bahasa Indonesia (KBBI). Melalui KBBI, guru ataupun pengajar dapat memper...', '<div>Disediakan agar para guru dapat menggunakan aplikasi dan layanan Kamus Besar Bahasa Indonesia (KBBI). Melalui KBBI, guru ataupun pengajar dapat memperkaya kosakata Bahasa Indonesia dan berkontribusi dengan layanan penambahan entri kata yang belum ada dalam kamus. Guru juga dapat menggunakan KBBI untuk mengetahui kelas, ragam bahasa, baik itu bahasa daerah maupun bahasa dalam bidang tertentu.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'https://docs.google.com/forms/', 'Harto Situmorang', '2022-02-17 17:00:00', '2022-01-31 08:15:22', '2022-01-31 08:15:22'),
(5, 2, 'Workshop Peningkatan Kompetensi Guru dalam Pembelajaran Hybrid Blended Learning', 'workshop-peningkatan-kompetensi-guru-dalam-pembelajaran-hybrid-blended-learning', 'seminarWorkshop-images/ytx600J8nK8bQMqcwawkNnpzYggJKXdVloWUESQM.png', 'Dalam kegiatan ini para guru mendapat pelatihan membuat perencanaan dan pelaksanaan kegiatan pembelajaran yang menggabungkan antara pembelajaran tatap...', '<div>Dalam kegiatan ini para guru mendapat pelatihan membuat perencanaan dan pelaksanaan kegiatan pembelajaran yang menggabungkan antara pembelajaran tatap muka dengan pembelajaran jarak jauh secara serentak real time.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'https://docs.google.com/forms/', 'Samiah Laksmiwati', '2022-02-17 17:00:00', '2022-01-31 08:16:08', '2022-01-31 08:16:08'),
(6, 2, 'Workshop Merancang Pembelajaran Kreatif untuk Siswa', 'workshop-merancang-pembelajaran-kreatif-untuk-siswa', 'seminarWorkshop-images/VdsnDkC3h7skXJFetkQJPr6otFsm18Z1usari3Fw.png', 'Workshop ini ditujukan untuk membimbing para guru untuk membuat materi pembelajaran yang kreatif. Proses ini diawali dengan menurunkan silabus ke dala...', '<div>Workshop ini ditujukan untuk membimbing para guru untuk membuat materi pembelajaran yang kreatif. Proses ini diawali dengan menurunkan silabus ke dalam peta materi belajar, yang kemudian diubah menjadi materi belajar di kelas. Kegiatan ini berjalan selama 3 hari.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'https://docs.google.com/forms/', 'Ina Nasyiah', '2022-02-18 17:00:00', '2022-01-31 08:16:50', '2022-01-31 08:16:50'),
(7, 2, 'Workshop Peningkatan Kompetensi Guru Dalam Menyusun Soal Berbasis Hots, AKM & Survey Karakter', 'workshop-peningkatan-kompetensi-guru-dalam-menyusun-soal-berbasis-hots-akm', NULL, 'Dalam rangka mempersiapkan dan mendukung kebijakan pemerintah dalam hal “Merdeka Belajar”, kami melaksanakan kegiatan workshop yang bertujuan antara l...', '<div>Dalam rangka mempersiapkan dan mendukung kebijakan pemerintah dalam hal “Merdeka Belajar”, kami melaksanakan kegiatan workshop yang bertujuan antara lain untuk peningkatan kompetensi tenaga pendidik.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'https://docs.google.com/forms/', 'Damar Zulkarnain', '2022-02-25 17:00:00', '2022-01-31 08:17:42', '2022-01-31 08:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_workshop_categories`
--

CREATE TABLE `seminar_workshop_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_workshop_categories`
--

INSERT INTO `seminar_workshop_categories` (`id`, `tittle`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Seminar', 'seminar', '2022-01-31 08:11:38', '2022-01-31 08:11:38'),
(2, 'Workshop', 'workshop', '2022-01-31 08:11:48', '2022-01-31 08:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `tittle`, `slug`, `image`, `desc`, `desc_body`, `trainer`, `created_at`, `updated_at`) VALUES
(1, 'Pelatihan Pembuatan Video Animasi Pembelajaran', 'pelatihan-pembuatan-video-animasi-pembelajaran', 'training-images/mxeX6MoEIqZYRbYCtXN2Jiw79WBMVXtR0wHiQJYD.png', 'Kegiatan ini bertujuan untuk membuat Garis Besar Isi Media (GBIM) Video pembelajaran untuk guru Taman Kanak-kanak dan Guru Pendidikan Luar Biasa serta...', '<div>Kegiatan ini bertujuan untuk membuat Garis Besar Isi Media (GBIM) Video pembelajaran untuk guru Taman Kanak-kanak dan Guru Pendidikan Luar Biasa serta video animasi. Guruku menyelenggarakan kegiatan pelatihan pembuatan video animasi pembelajaran. Kegiatan ini bertujuan untuk membuat Garis Besar Isi Media (GBIM) Video pembelajaran untuk guru Taman Kanak-kanak dan Guru Pendidikan Luar Biasa serta video animasi lagu.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br></div><div>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis</div>', 'Ilsa Pudjiastuti', '2022-01-31 07:47:29', '2022-01-31 07:47:29'),
(2, 'Pelatihan Google Suite For Education', 'pelatihan-google-suite-for-education', 'training-images/dKpMSyAuROPW7K2JkfcKlj9P9b2dEyc8e3bfjThg.png', 'Pelatihan ini bertujuan untuk meningkatkan pemahaman dan keterampilan Tenaga Pendidik agar dapat mengoptimalkan penggunaan Google Suite for Education....', '<div>Pelatihan ini bertujuan untuk meningkatkan pemahaman dan keterampilan Tenaga Pendidik agar dapat mengoptimalkan penggunaan Google Suite for Education.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Gamblang Santoso', '2022-01-31 07:48:46', '2022-01-31 07:48:46'),
(3, 'Pelatihan Membuat Presentasi Menarik dengan Menggunakan Templat SlidesGo untuk Keperluan Sekolah', 'pelatihan-membuat-presentasi-menarik-dengan-menggunakan-templat-slidesgo-untuk-keperluan-sekolah', 'training-images/AJpWKcf3cTOeb8ehkceCcEkgbjUNaVEiNWWZ26zP.png', 'Kursus singkat ini disajikan agar dapat mengenal dan belajar sambil berlatih menggunakan dan memanfaatkan fitur-fitur dari SlidesGo. SlidesGo yang mer...', '<div>Kursus singkat ini disajikan agar dapat mengenal dan belajar sambil berlatih menggunakan dan memanfaatkan fitur-fitur dari SlidesGo. SlidesGo yang merupakan produk dari Freepik, memungkinkan anda untuk membuat presentasi, infografis atau bentuk materi menarik lain secara gratis. Presentasi atau materi tersebut nantinya dapat anda gunakan untuk keperluan sekolah, ataupun kegiatan belajar-mengajar.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Kamaria Zulaika', '2022-01-31 07:49:50', '2022-01-31 07:49:50'),
(4, 'Pelatihan Membuat Presensi Online', 'pelatihan-membuat-presensi-online', 'training-images/phZOtREGy2KefUVwfI3X6w9BkMSF0p8sjeiE8y5l.png', 'Kegiatan ini merupakan pelatihan membuat presensi online. Pelatihan ini membahas mengenai pembuatan absensi online yang dapat digunakan untuk absensi...', '<div>Kegiatan ini merupakan pelatihan membuat presensi online. Pelatihan ini membahas mengenai pembuatan absensi online yang dapat digunakan untuk absensi siswa.&nbsp;<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Nalar Saptono', '2022-01-31 07:53:02', '2022-01-31 07:53:02'),
(5, 'Pengecekan Tulisan Menggunakan Fitur Koreksi Bahasa pada Microsoft Word', 'pengecekan-tulisan-menggunakan-fitur-koreksi-bahasa-pada-microsoft-word', NULL, 'Fitur dari Ms. Word yang dapat digunakan untuk melakukan pengecekan tulisan adalah fitur “Language” yang tersedia juga untuk mengecek bahasa, tata bah...', '<div>Fitur dari Ms. Word yang dapat digunakan untuk melakukan pengecekan tulisan adalah fitur “Language” yang tersedia juga untuk mengecek bahasa, tata bahasa serta ejaan tulisan. Pelatihan singkat ini disediakan agar para guru dapat menggunakan aplikasi dan layanan Microsoft Word. Dengan Microsoft Word, guru ataupun pengajar dapat membuat tulisan ataupun bahan materi dengan format teks secara benar dan tepat dalam penulisannya.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Karsa Mahendra', '2022-01-31 07:55:31', '2022-01-31 07:55:31'),
(6, 'Pelatihan Merekam Media Pembelajaran Online Melalui Aplikasi OBS', 'pelatihan-merekam-media-pembelajaran-online-melalui-aplikasi-obs', 'training-images/Y4Tk8iYscPC4RXIqlhCPQxa6g7xu7gF5TYhtKFVO.png', 'Pada pelatihan ini akan dijelaskan cara mudah merekam matari pembelajaran menggunakan screen recorder (OBS). Mulai dari tahap paling awal yaitu mengin...', '<div>Pada pelatihan ini akan dijelaskan cara mudah merekam matari pembelajaran menggunakan screen recorder (OBS). Mulai dari tahap paling awal yaitu menginstal, mensetting hingga merekam, semuanya akan dibahas secara tuntas dan mendetail pada pelatihan ini.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt urna ante, et tincidunt urna viverra eget. In fermentum enim a nisi pellentesque tempus. Etiam blandit feugiat augue, et fringilla eros aliquet faucibus. Cras augue leo, dignissim id sollicitudin non, porta eget risus. Nam eu vulputate neque. Ut eu arcu elit. Donec ut leo est. Sed pellentesque elit lorem, vel sollicitudin elit ultrices aliquam. Ut placerat blandit semper. Sed vulputate faucibus risus, vel bibendum nulla. Duis malesuada semper orci, eget facilisis quam dapibus ut. Phasellus tincidunt egestas feugiat. Cras urna urna, egestas sed risus eget, tempus luctus mi. Aliquam semper libero tellus, id egestas velit rutrum eu.<br><br>Sed commodo ac ligula ut mollis. Mauris at lacinia quam. Donec semper lorem non odio pharetra vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et felis eu enim consequat vehicula quis tristique elit. Proin eu mauris aliquet, consequat massa quis, imperdiet sapien. Pellentesque quis orci sit amet felis convallis fermentum id vel mauris. Suspendisse tincidunt bibendum ullamcorper. Nunc facilisis massa et venenatis mattis. Aliquam finibus, lorem sit amet blandit bibendum, sem velit commodo eros, a convallis diam arcu et lectus. Mauris eu placerat turpis.</div>', 'Vanya Uyainah', '2022-01-31 07:56:40', '2022-01-31 07:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Syifa Amalia', 'blogsyifa@gmail.com', NULL, '$2y$10$9HeDUe0WSFWCxg.KAGFIZu4fClKLhzVG52ngJrueY2Q9inRtfZSCC', 83871334617, 'profile-images/pxWBFxWe7EjzLmbAPWzGGIYizmxYFmIcz8jwJtku.png', NULL, '2022-01-27 04:24:21', '2022-02-01 04:52:35'),
(2, 'Ulya Hariyah', 'ulya@gmail.com', NULL, '$2y$10$LdqNEQtcSJYs.Tx7n8qXm.WE9i1lEacUZp.sfuOL04a1ysR5oxLN2', 83871313122, 'profile-images/j6HXRvErSi1Df7TFUWhumXRAiey6scGLqjjWha3O.png', NULL, '2022-02-01 03:08:37', '2022-02-01 03:08:37'),
(3, 'Gilda Kuswandari', 'gilda@gmail.com', NULL, '$2y$10$lQX9/RL3nQws4JJgsS/3BOYfPtrJS0Ibklmbst84iRSr/W6PvAwha', 81233456891, 'profile-images/T5BsN6K4Ew3Mlct0cmRIQ7dLje1s2EE96NkBXJSy.png', NULL, '2022-02-01 03:09:12', '2022-02-01 03:09:12'),
(4, 'Gilang Maulana', 'gilang@gmail.com', NULL, '$2y$10$jr/XvMS4NZ1VqZbvoACQ/O3EjqDeo5gbqxxfwvZdEfalUjxs0/YwO', 812666721333, 'profile-images/CFKKAhnJsIJxKFsuvHjGHICeHHsoii9bJO2ymXI0.png', NULL, '2022-02-01 03:10:02', '2022-02-01 03:10:02'),
(5, 'Indah Yolanda', 'indah@gmail.com', NULL, '$2y$10$XgDH/GGUyNsRT6kNbPAzb.JfQGO3j1ka6f6D9TTZO.BVFmrqe1nbe', 81322267892, 'profile-images/MDRJymUKgok8NR0bjSFVkIFa5L0bxqPnUtwamkvI.png', NULL, '2022-02-01 03:10:34', '2022-02-01 03:10:34'),
(6, 'aminah', 'aminah@gmail.com', NULL, '$2y$10$TbzVhdiz9GPAgXUAKO01gOK9os8CMCFEyaHyrhMttsIrvY1shqPiG', 8384636721, 'profile-images/yAbUD06xrjwDzJcrjfUwAiJ6DbB9jvxlKbvq0ane.png', NULL, '2023-03-23 07:00:51', '2023-03-23 07:00:51'),
(7, 'Gilang Barlang', 'gilangs@gmail.com', NULL, '$2y$10$w.KhC7cbQMHeuGSEDTTXjee2LARV96ROyKmTCSclwx8ZEgqnpZwx6', 8384672617231, 'profile-images/0mxYN41ceBge3gSbe0FSYt2nMk1g79Y2A8w5yUho.jpg', NULL, '2023-05-19 05:07:20', '2023-05-19 05:07:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_categories_tittle_unique` (`tittle`),
  ADD UNIQUE KEY `article_categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diklats`
--
ALTER TABLE `diklats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diklats_slug_unique` (`slug`);

--
-- Indexes for table `diklat_categories`
--
ALTER TABLE `diklat_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diklat_categories_name_unique` (`name`),
  ADD UNIQUE KEY `diklat_categories_slug_unique` (`slug`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ebooks_slug_unique` (`slug`);

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
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_slug_unique` (`slug`),
  ADD UNIQUE KEY `modules_videolink_unique` (`videoLink`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar_workshops`
--
ALTER TABLE `seminar_workshops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seminar_workshops_slug_unique` (`slug`);

--
-- Indexes for table `seminar_workshop_categories`
--
ALTER TABLE `seminar_workshop_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seminar_workshop_categories_tittle_unique` (`tittle`),
  ADD UNIQUE KEY `seminar_workshop_categories_slug_unique` (`slug`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainings_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);
ALTER TABLE `users` ADD FULLTEXT KEY `remember_token` (`remember_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diklats`
--
ALTER TABLE `diklats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diklat_categories`
--
ALTER TABLE `diklat_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seminar_workshops`
--
ALTER TABLE `seminar_workshops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seminar_workshop_categories`
--
ALTER TABLE `seminar_workshop_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
