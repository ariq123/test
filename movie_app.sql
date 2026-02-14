-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2026 at 11:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `imdb_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `imdb_id`, `title`, `poster`) VALUES
(44, 'tt0808279', 'Funny Games', 'https://m.media-amazon.com/images/M/MV5BMTg4OTExNTYzMV5BMl5BanBnXkFtZTcwOTg1MDU1MQ@@._V1_SX300.jpg'),
(47, 'tt5222724', 'Jimmy Carr: Funny Business', 'https://m.media-amazon.com/images/M/MV5BNjc0ODQzNDktNzJiMy00Nzk2LTgxOTEtY2JlZDNmODVmMDZhXkEyXkFqcGc@._V1_SX300.jpg'),
(49, 'tt0804497', 'It\'s Kind of a Funny Story', 'https://m.media-amazon.com/images/M/MV5BMTk0MTAyNjQ2N15BMl5BanBnXkFtZTcwNjYwOTU3Mw@@._V1_SX300.jpg'),
(58, 'tt1368982', 'Dara O Briain Talks Funny: Live in London', 'https://m.media-amazon.com/images/M/MV5BMTM2NzIxMzY2N15BMl5BanBnXkFtZTcwOTc3NzQyMw@@._V1_SX300.jpg'),
(59, 'tt0244521', 'Funny Money', 'https://m.media-amazon.com/images/M/MV5BN2ViMTI3ZDQtZjA0Zi00Yzg4LWEwMWQtMDMyOWRlODYwZjQ2XkEyXkFqcGc@._V1_SX300.jpg'),
(61, 'tt0109858', 'Funny Man', 'https://m.media-amazon.com/images/M/MV5BMjAzNDA3MzMzN15BMl5BanBnXkFtZTcwNjQ3MjMzMQ@@._V1_SX300.jpg'),
(63, 'tt0025153', 'Funny Little Bunnies', 'https://m.media-amazon.com/images/M/MV5BMjU4NGZjNjUtZmZjZC00ZjcyLWFkNTUtNWIxZmYzM2IxMjliXkEyXkFqcGc@._V1_SX300.jpg'),
(65, 'tt6318556', 'Sorabh Pant: My Dad Thinks He\'s Funny', 'https://m.media-amazon.com/images/M/MV5BNjM0OGY4N2QtZjIzNi00ZmFmLWE2MGItNmZlY2NiZjgxNzc1XkEyXkFqcGc@._V1_SX300.jpg'),
(78, 'tt1255951', 'De Dana Dan', 'https://m.media-amazon.com/images/M/MV5BMGU3MDg5M2UtY2M5OC00NDE2LWIxYjEtMmVjNzIwMjZmNDYyXkEyXkFqcGc@._V1_SX300.jpg'),
(79, 'tt3265462', 'Han Gong-ju', 'https://m.media-amazon.com/images/M/MV5BYjE5NTJmZTEtZDE1Zi00YzE0LWFlNzgtMjJjNjFhMWMyNDRiXkEyXkFqcGc@._V1_SX300.jpg');

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
(3, '2026_02_12_171427_create_favorites_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
