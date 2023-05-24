-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2023 at 01:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ombor`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `created_at`, `cat_id`) VALUES
(2, 'Electronica', '2023-05-24 13:40:53', 1),
(59, 'clothes', '2023-05-24 15:33:38', 1),
(60, 'Uy', '2023-05-24 16:17:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `image` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `sklad` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `import` text NOT NULL,
  `sell` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`id`, `title`, `descr`, `image`, `category`, `sklad`, `amount`, `price`, `import`, `sell`, `created_at`) VALUES
(1, 'HP Pavilion 15 Silve', 'Экран: 15.6\" FullHD IPS Процессор: AMD Ryzen™ 3-5300U (2.6 GHz - 3.8 GHz) (4 ядра - 8 потоков) Видеокарта: AMD® Radeon Graphics ОЗУ: 8GB DDR4 (16GB=+40 у.е) Накопитель: 256GB PCIe® NVMe™ M.2 SSD (512GB SSD=+40 у.е)', 'https://nout.uz/wp-content/uploads/2021/11/new-pavilion1.jpg', 'Electronica', 'tulpor', 500, 5544000, '500', '', '2023-05-24 15:31:02'),
(2, 'Lenovo IdeaPad 5 PRO', 'Экран: 16\'\' WQXGA IPS sRGB 100%, Процессор: Intel® Core™ i5-12500H (3.3 GHz – 4.5 GHz ) (12-Ядeр; #производительных ядер 4, #эффективных ядер 8; 16-Потоков) Видеокарта: Intel Iris Xe Graphics ОЗУ: 16GB DDR5 Накопитель: 512GB PCIe® NVMe™ M.2 SSD (1TB SSD=+50 у.е)', 'https://nout.uz/wp-content/uploads/2022/05/len-ideapad-5pro4.jpg', 'Electronica', 'tulpor', 200, 250000, '200', '', '2023-05-24 15:32:40'),
(3, 'nika kasrasofka', 'qizilkrasofkadewnf fowiehf verergc  wevfew', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrbuh_8SWmYZvLInxm1Zj9PTVCupItHySMXh7UoGvbjUn3lJ5gNReKNu8CA1PChb2ZDpk&usqp=CAU', 'clothes', 'kiyim', 5, 500, '5', '', '2023-05-24 15:39:50'),
(4, 'Jordan', 'x Zion Williamson Air Jordan 1 Low OG \"Voodoo\" sneakers   $754   Size guide 11 US Add To Bag Wishlist ESTIMATED DELIVERY  Jun 1 - Jun 8', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpmAkyw76TvdA_HHp-iDx4Mv85oQD2qoI7p-6oZAPyRxuvwElmLbV-Pq7PERMY1SD7XxE&usqp=CAU', 'clothes', 'kiyim', 5, 50000, '5', '', '2023-05-24 15:41:38'),
(5, 'Kiton Blue Vicuna Overcoat', 'Kiton Blue Vicuna Overcoat Kiton Blue Vicuna Overcoat Kiton Blue Vicuna Overcoat Kiton Blue Vicuna Overcoat Kiton Blue Vicuna Overcoat Kiton Blue Vicuna Overcoat Kiton Blue Vicuna Overcoat Kiton Blue Vicuna Overcoat Kiton Blue Vicuna Overcoat', 'https://d1b7fmvx5bzyfc.cloudfront.net/catalog/product/cache/f422e4b7637dbd183123c9c34bbb4ec6/k/c/kcw12_1.jpg', 'clothes', 'kiyim', 100, 500, '100', '', '2023-05-24 15:42:32'),
(6, '5xonali uy', 'chilonzorda eng yaxshi ucudb fewuifbuiw fweiubfwe fewiufgberwiu', 'data:image/jpeg;base64,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', 'Uy', 'tulpor', 1, 5000000, '1', '', '2023-05-24 16:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `sklad`
--

CREATE TABLE `sklad` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sklad`
--

INSERT INTO `sklad` (`id`, `title`, `descr`, `type`, `owner`, `created_at`) VALUES
(3, 'tulpor', 'chilonzordagi izza  yonida', 'electronica', 'Alex', '2023-05-24 15:26:19'),
(4, 'kiyim', 'kiyim kechak sklad bek baraka', 'kiyim kechad', 'Malika', '2023-05-24 15:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `position`, `email`, `phone_number`, `password`, `created_at`) VALUES
(2, 'alisher', 'seller', 'asadullohruziev@gmail.com', '+9989978748484', 'dsdasd', '2023-05-24 15:19:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sklad`
--
ALTER TABLE `sklad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sklad`
--
ALTER TABLE `sklad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
