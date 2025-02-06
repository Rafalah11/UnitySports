-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2024 pada 18.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pilihan_olahraga` enum('BADMINTON','SEPAK BOLA','FUTSAL','BASKET','MINI SOCCER') NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_komunitas` varchar(255) DEFAULT NULL,
  `keterangan_harga` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `nama_kabupaten` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_lapangan` varchar(255) DEFAULT NULL,
  `waktu_mulai` varchar(255) DEFAULT NULL,
  `waktu_selesai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id`, `pilihan_olahraga`, `harga`, `level`, `alamat`, `kontak`, `provinsi`, `gambar`, `nama_komunitas`, `keterangan_harga`, `tanggal`, `nama_kabupaten`, `remember_token`, `created_at`, `updated_at`, `nama_lapangan`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 'BADMINTON', 150000, '1', 'Desa TalagaSari RT 10 WR 02 kecamatan cikupa kabupaten tangerang provinsi banten', '+111', 'Maluku Utara', '/storage/images/1719589372_1719500195_Tampilan-dalam-gor-araya.jpg', 'PB Peniti', '1 JAM', '2024-07-02', 'Halmahera Tengah', NULL, NULL, '2024-06-28 08:42:52', 'ARAYA', '11:11', '12:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` bigint(20) UNSIGNED NOT NULL,
  `id_provinsi` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_kabupaten` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `id_provinsi`, `nama_kabupaten`, `created_at`, `updated_at`) VALUES
(1, 21, 'Aceh Barat', NULL, NULL),
(2, 21, 'Aceh Barat Daya', NULL, NULL),
(3, 21, 'Aceh Besar', NULL, NULL),
(4, 21, 'Aceh Jaya', NULL, NULL),
(5, 21, 'Aceh Selatan', NULL, NULL),
(6, 21, 'Aceh Singkil', NULL, NULL),
(7, 21, 'Aceh Tamiang', NULL, NULL),
(8, 21, 'Aceh Tengah', NULL, NULL),
(9, 21, 'Aceh Tenggara', NULL, NULL),
(10, 21, 'Aceh Timur', NULL, NULL),
(11, 21, 'Aceh Utara', NULL, NULL),
(12, 32, 'Agam', NULL, NULL),
(13, 23, 'Alor', NULL, NULL),
(14, 19, 'Ambon', NULL, NULL),
(15, 34, 'Asahan', NULL, NULL),
(16, 24, 'Asmat', NULL, NULL),
(17, 1, 'Badung', NULL, NULL),
(18, 13, 'Balangan', NULL, NULL),
(19, 15, 'Balikpapan', NULL, NULL),
(20, 21, 'Banda Aceh', NULL, NULL),
(21, 18, 'Bandar Lampung', NULL, NULL),
(22, 9, 'Bandung', NULL, NULL),
(23, 9, 'Bandung', NULL, NULL),
(24, 9, 'Bandung Barat', NULL, NULL),
(25, 29, 'Banggai', NULL, NULL),
(26, 29, 'Banggai Kepulauan', NULL, NULL),
(27, 2, 'Bangka', NULL, NULL),
(28, 2, 'Bangka Barat', NULL, NULL),
(29, 2, 'Bangka Selatan', NULL, NULL),
(30, 2, 'Bangka Tengah', NULL, NULL),
(31, 11, 'Bangkalan', NULL, NULL),
(32, 1, 'Bangli', NULL, NULL),
(33, 13, 'Banjar', NULL, NULL),
(34, 9, 'Banjar', NULL, NULL),
(35, 13, 'Banjarbaru', NULL, NULL),
(36, 13, 'Banjarmasin', NULL, NULL),
(37, 10, 'Banjarnegara', NULL, NULL),
(38, 28, 'Bantaeng', NULL, NULL),
(39, 5, 'Bantul', NULL, NULL),
(40, 33, 'Banyuasin', NULL, NULL),
(41, 10, 'Banyumas', NULL, NULL),
(42, 11, 'Banyuwangi', NULL, NULL),
(43, 13, 'Barito Kuala', NULL, NULL),
(44, 14, 'Barito Selatan', NULL, NULL),
(45, 14, 'Barito Timur', NULL, NULL),
(46, 14, 'Barito Utara', NULL, NULL),
(47, 28, 'Barru', NULL, NULL),
(48, 17, 'Batam', NULL, NULL),
(49, 10, 'Batang', NULL, NULL),
(50, 8, 'Batang Hari', NULL, NULL),
(51, 11, 'Batu', NULL, NULL),
(52, 34, 'Batu Bara', NULL, NULL),
(53, 30, 'Bau-Bau', NULL, NULL),
(54, 9, 'Bekasi', NULL, NULL),
(55, 9, 'Bekasi', NULL, NULL),
(56, 2, 'Belitung', NULL, NULL),
(57, 2, 'Belitung Timur', NULL, NULL),
(58, 23, 'Belu', NULL, NULL),
(59, 21, 'Bener Meriah', NULL, NULL),
(60, 26, 'Bengkalis', NULL, NULL),
(61, 12, 'Bengkayang', NULL, NULL),
(62, 4, 'Bengkulu', NULL, NULL),
(63, 4, 'Bengkulu Selatan', NULL, NULL),
(64, 4, 'Bengkulu Tengah', NULL, NULL),
(65, 4, 'Bengkulu Utara', NULL, NULL),
(66, 15, 'Berau', NULL, NULL),
(67, 24, 'Biak Numfor', NULL, NULL),
(68, 22, 'Bima', NULL, NULL),
(69, 22, 'Bima', NULL, NULL),
(70, 34, 'Binjai', NULL, NULL),
(71, 17, 'Bintan', NULL, NULL),
(72, 21, 'Bireuen', NULL, NULL),
(73, 31, 'Bitung', NULL, NULL),
(74, 11, 'Blitar', NULL, NULL),
(75, 11, 'Blitar', NULL, NULL),
(76, 10, 'Blora', NULL, NULL),
(77, 7, 'Boalemo', NULL, NULL),
(78, 9, 'Bogor', NULL, NULL),
(79, 9, 'Bogor', NULL, NULL),
(80, 11, 'Bojonegoro', NULL, NULL),
(81, 31, 'Bolaang Mongondow (Bolmong)', NULL, NULL),
(82, 31, 'Bolaang Mongondow Selatan', NULL, NULL),
(83, 31, 'Bolaang Mongondow Timur', NULL, NULL),
(84, 31, 'Bolaang Mongondow Utara', NULL, NULL),
(85, 30, 'Bombana', NULL, NULL),
(86, 11, 'Bondowoso', NULL, NULL),
(87, 28, 'Bone', NULL, NULL),
(88, 7, 'Bone Bolango', NULL, NULL),
(89, 15, 'Bontang', NULL, NULL),
(90, 24, 'Boven Digoel', NULL, NULL),
(91, 10, 'Boyolali', NULL, NULL),
(92, 10, 'Brebes', NULL, NULL),
(93, 32, 'Bukittinggi', NULL, NULL),
(94, 1, 'Buleleng', NULL, NULL),
(95, 28, 'Bulukumba', NULL, NULL),
(96, 16, 'Bulungan (Bulongan)', NULL, NULL),
(97, 8, 'Bungo', NULL, NULL),
(98, 29, 'Buol', NULL, NULL),
(99, 19, 'Buru', NULL, NULL),
(100, 19, 'Buru Selatan', NULL, NULL),
(101, 30, 'Buton', NULL, NULL),
(102, 30, 'Buton Utara', NULL, NULL),
(103, 9, 'Ciamis', NULL, NULL),
(104, 9, 'Cianjur', NULL, NULL),
(105, 10, 'Cilacap', NULL, NULL),
(106, 3, 'Cilegon', NULL, NULL),
(107, 9, 'Cimahi', NULL, NULL),
(108, 9, 'Cirebon', NULL, NULL),
(109, 9, 'Cirebon', NULL, NULL),
(110, 34, 'Dairi', NULL, NULL),
(111, 24, 'Deiyai (Deliyai)', NULL, NULL),
(112, 34, 'Deli Serdang', NULL, NULL),
(113, 10, 'Demak', NULL, NULL),
(114, 1, 'Denpasar', NULL, NULL),
(115, 9, 'Depok', NULL, NULL),
(116, 32, 'Dharmasraya', NULL, NULL),
(117, 24, 'Dogiyai', NULL, NULL),
(118, 22, 'Dompu', NULL, NULL),
(119, 29, 'Donggala', NULL, NULL),
(120, 26, 'Dumai', NULL, NULL),
(121, 33, 'Empat Lawang', NULL, NULL),
(122, 23, 'Ende', NULL, NULL),
(123, 28, 'Enrekang', NULL, NULL),
(124, 25, 'Fakfak', NULL, NULL),
(125, 23, 'Flores Timur', NULL, NULL),
(126, 9, 'Garut', NULL, NULL),
(127, 21, 'Gayo Lues', NULL, NULL),
(128, 1, 'Gianyar', NULL, NULL),
(129, 7, 'Gorontalo', NULL, NULL),
(130, 7, 'Gorontalo', NULL, NULL),
(131, 7, 'Gorontalo Utara', NULL, NULL),
(132, 28, 'Gowa', NULL, NULL),
(133, 11, 'Gresik', NULL, NULL),
(134, 10, 'Grobogan', NULL, NULL),
(135, 5, 'Gunung Kidul', NULL, NULL),
(136, 14, 'Gunung Mas', NULL, NULL),
(137, 34, 'Gunungsitoli', NULL, NULL),
(138, 20, 'Halmahera Barat', NULL, NULL),
(139, 20, 'Halmahera Selatan', NULL, NULL),
(140, 20, 'Halmahera Tengah', NULL, NULL),
(141, 20, 'Halmahera Timur', NULL, NULL),
(142, 20, 'Halmahera Utara', NULL, NULL),
(143, 13, 'Hulu Sungai Selatan', NULL, NULL),
(144, 13, 'Hulu Sungai Tengah', NULL, NULL),
(145, 13, 'Hulu Sungai Utara', NULL, NULL),
(146, 34, 'Humbang Hasundutan', NULL, NULL),
(147, 26, 'Indragiri Hilir', NULL, NULL),
(148, 26, 'Indragiri Hulu', NULL, NULL),
(149, 9, 'Indramayu', NULL, NULL),
(150, 24, 'Intan Jaya', NULL, NULL),
(151, 6, 'Jakarta Barat', NULL, NULL),
(152, 6, 'Jakarta Pusat', NULL, NULL),
(153, 6, 'Jakarta Selatan', NULL, NULL),
(154, 6, 'Jakarta Timur', NULL, NULL),
(155, 6, 'Jakarta Utara', NULL, NULL),
(156, 8, 'Jambi', NULL, NULL),
(157, 24, 'Jayapura', NULL, NULL),
(158, 24, 'Jayapura', NULL, NULL),
(159, 24, 'Jayawijaya', NULL, NULL),
(160, 11, 'Jember', NULL, NULL),
(161, 1, 'Jembrana', NULL, NULL),
(162, 28, 'Jeneponto', NULL, NULL),
(163, 10, 'Jepara', NULL, NULL),
(164, 11, 'Jombang', NULL, NULL),
(165, 25, 'Kaimana', NULL, NULL),
(166, 26, 'Kampar', NULL, NULL),
(167, 14, 'Kapuas', NULL, NULL),
(168, 12, 'Kapuas Hulu', NULL, NULL),
(169, 10, 'Karanganyar', NULL, NULL),
(170, 1, 'Karangasem', NULL, NULL),
(171, 9, 'Karawang', NULL, NULL),
(172, 17, 'Karimun', NULL, NULL),
(173, 34, 'Karo', NULL, NULL),
(174, 14, 'Katingan', NULL, NULL),
(175, 4, 'Kaur', NULL, NULL),
(176, 12, 'Kayong Utara', NULL, NULL),
(177, 10, 'Kebumen', NULL, NULL),
(178, 11, 'Kediri', NULL, NULL),
(179, 11, 'Kediri', NULL, NULL),
(180, 24, 'Keerom', NULL, NULL),
(181, 10, 'Kendal', NULL, NULL),
(182, 30, 'Kendari', NULL, NULL),
(183, 4, 'Kepahiang', NULL, NULL),
(184, 17, 'Kepulauan Anambas', NULL, NULL),
(185, 19, 'Kepulauan Aru', NULL, NULL),
(186, 32, 'Kepulauan Mentawai', NULL, NULL),
(187, 26, 'Kepulauan Meranti', NULL, NULL),
(188, 31, 'Kepulauan Sangihe', NULL, NULL),
(189, 6, 'Kepulauan Seribu', NULL, NULL),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', NULL, NULL),
(191, 20, 'Kepulauan Sula', NULL, NULL),
(192, 31, 'Kepulauan Talaud', NULL, NULL),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)', NULL, NULL),
(194, 8, 'Kerinci', NULL, NULL),
(195, 12, 'Ketapang', NULL, NULL),
(196, 10, 'Klaten', NULL, NULL),
(197, 1, 'Klungkung', NULL, NULL),
(198, 30, 'Kolaka', NULL, NULL),
(199, 30, 'Kolaka Utara', NULL, NULL),
(200, 30, 'Konawe', NULL, NULL),
(201, 30, 'Konawe Selatan', NULL, NULL),
(202, 30, 'Konawe Utara', NULL, NULL),
(203, 13, 'Kotabaru', NULL, NULL),
(204, 31, 'Kotamobagu', NULL, NULL),
(205, 14, 'Kotawaringin Barat', NULL, NULL),
(206, 14, 'Kotawaringin Timur', NULL, NULL),
(207, 26, 'Kuantan Singingi', NULL, NULL),
(208, 12, 'Kubu Raya', NULL, NULL),
(209, 10, 'Kudus', NULL, NULL),
(210, 5, 'Kulon Progo', NULL, NULL),
(211, 9, 'Kuningan', NULL, NULL),
(212, 23, 'Kupang', NULL, NULL),
(213, 23, 'Kupang', NULL, NULL),
(214, 15, 'Kutai Barat', NULL, NULL),
(215, 15, 'Kutai Kartanegara', NULL, NULL),
(216, 15, 'Kutai Timur', NULL, NULL),
(217, 34, 'Labuhan Batu', NULL, NULL),
(218, 34, 'Labuhan Batu Selatan', NULL, NULL),
(219, 34, 'Labuhan Batu Utara', NULL, NULL),
(220, 33, 'Lahat', NULL, NULL),
(221, 14, 'Lamandau', NULL, NULL),
(222, 11, 'Lamongan', NULL, NULL),
(223, 18, 'Lampung Barat', NULL, NULL),
(224, 18, 'Lampung Selatan', NULL, NULL),
(225, 18, 'Lampung Tengah', NULL, NULL),
(226, 18, 'Lampung Timur', NULL, NULL),
(227, 18, 'Lampung Utara', NULL, NULL),
(228, 12, 'Landak', NULL, NULL),
(229, 34, 'Langkat', NULL, NULL),
(230, 21, 'Langsa', NULL, NULL),
(231, 24, 'Lanny Jaya', NULL, NULL),
(232, 3, 'Lebak', NULL, NULL),
(233, 4, 'Lebong', NULL, NULL),
(234, 23, 'Lembata', NULL, NULL),
(235, 21, 'Lhokseumawe', NULL, NULL),
(236, 32, 'Lima Puluh Koto/Kota', NULL, NULL),
(237, 17, 'Lingga', NULL, NULL),
(238, 22, 'Lombok Barat', NULL, NULL),
(239, 22, 'Lombok Tengah', NULL, NULL),
(240, 22, 'Lombok Timur', NULL, NULL),
(241, 22, 'Lombok Utara', NULL, NULL),
(242, 33, 'Lubuk Linggau', NULL, NULL),
(243, 11, 'Lumajang', NULL, NULL),
(244, 28, 'Luwu', NULL, NULL),
(245, 28, 'Luwu Timur', NULL, NULL),
(246, 28, 'Luwu Utara', NULL, NULL),
(247, 11, 'Madiun', NULL, NULL),
(248, 11, 'Madiun', NULL, NULL),
(249, 10, 'Magelang', NULL, NULL),
(250, 10, 'Magelang', NULL, NULL),
(251, 11, 'Magetan', NULL, NULL),
(252, 9, 'Majalengka', NULL, NULL),
(253, 27, 'Majene', NULL, NULL),
(254, 28, 'Makassar', NULL, NULL),
(255, 11, 'Malang', NULL, NULL),
(256, 11, 'Malang', NULL, NULL),
(257, 16, 'Malinau', NULL, NULL),
(258, 19, 'Maluku Barat Daya', NULL, NULL),
(259, 19, 'Maluku Tengah', NULL, NULL),
(260, 19, 'Maluku Tenggara', NULL, NULL),
(261, 19, 'Maluku Tenggara Barat', NULL, NULL),
(262, 27, 'Mamasa', NULL, NULL),
(263, 24, 'Mamberamo Raya', NULL, NULL),
(264, 24, 'Mamberamo Tengah', NULL, NULL),
(265, 27, 'Mamuju', NULL, NULL),
(266, 27, 'Mamuju Utara', NULL, NULL),
(267, 31, 'Manado', NULL, NULL),
(268, 34, 'Mandailing Natal', NULL, NULL),
(269, 23, 'Manggarai', NULL, NULL),
(270, 23, 'Manggarai Barat', NULL, NULL),
(271, 23, 'Manggarai Timur', NULL, NULL),
(272, 25, 'Manokwari', NULL, NULL),
(273, 25, 'Manokwari Selatan', NULL, NULL),
(274, 24, 'Mappi', NULL, NULL),
(275, 28, 'Maros', NULL, NULL),
(276, 22, 'Mataram', NULL, NULL),
(277, 25, 'Maybrat', NULL, NULL),
(278, 34, 'Medan', NULL, NULL),
(279, 12, 'Melawi', NULL, NULL),
(280, 8, 'Merangin', NULL, NULL),
(281, 24, 'Merauke', NULL, NULL),
(282, 18, 'Mesuji', NULL, NULL),
(283, 18, 'Metro', NULL, NULL),
(284, 24, 'Mimika', NULL, NULL),
(285, 31, 'Minahasa', NULL, NULL),
(286, 31, 'Minahasa Selatan', NULL, NULL),
(287, 31, 'Minahasa Tenggara', NULL, NULL),
(288, 31, 'Minahasa Utara', NULL, NULL),
(289, 11, 'Mojokerto', NULL, NULL),
(290, 11, 'Mojokerto', NULL, NULL),
(291, 29, 'Morowali', NULL, NULL),
(292, 33, 'Muara Enim', NULL, NULL),
(293, 8, 'Muaro Jambi', NULL, NULL),
(294, 4, 'Muko Muko', NULL, NULL),
(295, 30, 'Muna', NULL, NULL),
(296, 14, 'Murung Raya', NULL, NULL),
(297, 33, 'Musi Banyuasin', NULL, NULL),
(298, 33, 'Musi Rawas', NULL, NULL),
(299, 24, 'Nabire', NULL, NULL),
(300, 21, 'Nagan Raya', NULL, NULL),
(301, 23, 'Nagekeo', NULL, NULL),
(302, 17, 'Natuna', NULL, NULL),
(303, 24, 'Nduga', NULL, NULL),
(304, 23, 'Ngada', NULL, NULL),
(305, 11, 'Nganjuk', NULL, NULL),
(306, 11, 'Ngawi', NULL, NULL),
(307, 34, 'Nias', NULL, NULL),
(308, 34, 'Nias Barat', NULL, NULL),
(309, 34, 'Nias Selatan', NULL, NULL),
(310, 34, 'Nias Utara', NULL, NULL),
(311, 16, 'Nunukan', NULL, NULL),
(312, 33, 'Ogan Ilir', NULL, NULL),
(313, 33, 'Ogan Komering Ilir', NULL, NULL),
(314, 33, 'Ogan Komering Ulu', NULL, NULL),
(315, 33, 'Ogan Komering Ulu Selatan', NULL, NULL),
(316, 33, 'Ogan Komering Ulu Timur', NULL, NULL),
(317, 11, 'Pacitan', NULL, NULL),
(318, 32, 'Padang', NULL, NULL),
(319, 34, 'Padang Lawas', NULL, NULL),
(320, 34, 'Padang Lawas Utara', NULL, NULL),
(321, 32, 'Padang Panjang', NULL, NULL),
(322, 32, 'Padang Pariaman', NULL, NULL),
(323, 34, 'Padang Sidempuan', NULL, NULL),
(324, 33, 'Pagar Alam', NULL, NULL),
(325, 34, 'Pakpak Bharat', NULL, NULL),
(326, 14, 'Palangka Raya', NULL, NULL),
(327, 33, 'Palembang', NULL, NULL),
(328, 28, 'Palopo', NULL, NULL),
(329, 29, 'Palu', NULL, NULL),
(330, 11, 'Pamekasan', NULL, NULL),
(331, 3, 'Pandeglang', NULL, NULL),
(332, 9, 'Pangandaran', NULL, NULL),
(333, 28, 'Pangkajene Kepulauan', NULL, NULL),
(334, 2, 'Pangkal Pinang', NULL, NULL),
(335, 24, 'Paniai', NULL, NULL),
(336, 28, 'Parepare', NULL, NULL),
(337, 32, 'Pariaman', NULL, NULL),
(338, 29, 'Parigi Moutong', NULL, NULL),
(339, 32, 'Pasaman', NULL, NULL),
(340, 32, 'Pasaman Barat', NULL, NULL),
(341, 15, 'Paser', NULL, NULL),
(342, 11, 'Pasuruan', NULL, NULL),
(343, 11, 'Pasuruan', NULL, NULL),
(344, 10, 'Pati', NULL, NULL),
(345, 32, 'Payakumbuh', NULL, NULL),
(346, 25, 'Pegunungan Arfak', NULL, NULL),
(347, 24, 'Pegunungan Bintang', NULL, NULL),
(348, 10, 'Pekalongan', NULL, NULL),
(349, 10, 'Pekalongan', NULL, NULL),
(350, 26, 'Pekanbaru', NULL, NULL),
(351, 26, 'Pelalawan', NULL, NULL),
(352, 10, 'Pemalang', NULL, NULL),
(353, 34, 'Pematang Siantar', NULL, NULL),
(354, 15, 'Penajam Paser Utara', NULL, NULL),
(355, 18, 'Pesawaran', NULL, NULL),
(356, 18, 'Pesisir Barat', NULL, NULL),
(357, 32, 'Pesisir Selatan', NULL, NULL),
(358, 21, 'Pidie', NULL, NULL),
(359, 21, 'Pidie Jaya', NULL, NULL),
(360, 28, 'Pinrang', NULL, NULL),
(361, 7, 'Pohuwato', NULL, NULL),
(362, 27, 'Polewali Mandar', NULL, NULL),
(363, 11, 'Ponorogo', NULL, NULL),
(364, 12, 'Pontianak', NULL, NULL),
(365, 12, 'Pontianak', NULL, NULL),
(366, 29, 'Poso', NULL, NULL),
(367, 33, 'Prabumulih', NULL, NULL),
(368, 18, 'Pringsewu', NULL, NULL),
(369, 11, 'Probolinggo', NULL, NULL),
(370, 11, 'Probolinggo', NULL, NULL),
(371, 14, 'Pulang Pisau', NULL, NULL),
(372, 20, 'Pulau Morotai', NULL, NULL),
(373, 24, 'Puncak', NULL, NULL),
(374, 24, 'Puncak Jaya', NULL, NULL),
(375, 10, 'Purbalingga', NULL, NULL),
(376, 9, 'Purwakarta', NULL, NULL),
(377, 10, 'Purworejo', NULL, NULL),
(378, 25, 'Raja Ampat', NULL, NULL),
(379, 4, 'Rejang Lebong', NULL, NULL),
(380, 10, 'Rembang', NULL, NULL),
(381, 26, 'Rokan Hilir', NULL, NULL),
(382, 26, 'Rokan Hulu', NULL, NULL),
(383, 23, 'Rote Ndao', NULL, NULL),
(384, 21, 'Sabang', NULL, NULL),
(385, 23, 'Sabu Raijua', NULL, NULL),
(386, 10, 'Salatiga', NULL, NULL),
(387, 15, 'Samarinda', NULL, NULL),
(388, 12, 'Sambas', NULL, NULL),
(389, 34, 'Samosir', NULL, NULL),
(390, 11, 'Sampang', NULL, NULL),
(391, 12, 'Sanggau', NULL, NULL),
(392, 24, 'Sarmi', NULL, NULL),
(393, 8, 'Sarolangun', NULL, NULL),
(394, 32, 'Sawah Lunto', NULL, NULL),
(395, 12, 'Sekadau', NULL, NULL),
(396, 28, 'Selayar (Kepulauan Selayar)', NULL, NULL),
(397, 4, 'Seluma', NULL, NULL),
(398, 10, 'Semarang', NULL, NULL),
(399, 10, 'Semarang', NULL, NULL),
(400, 19, 'Seram Bagian Barat', NULL, NULL),
(401, 19, 'Seram Bagian Timur', NULL, NULL),
(402, 3, 'Serang', NULL, NULL),
(403, 3, 'Serang', NULL, NULL),
(404, 34, 'Serdang Bedagai', NULL, NULL),
(405, 14, 'Seruyan', NULL, NULL),
(406, 26, 'Siak', NULL, NULL),
(407, 34, 'Sibolga', NULL, NULL),
(408, 28, 'Sidenreng Rappang/Rapang', NULL, NULL),
(409, 11, 'Sidoarjo', NULL, NULL),
(410, 29, 'Sigi', NULL, NULL),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)', NULL, NULL),
(412, 23, 'Sikka', NULL, NULL),
(413, 34, 'Simalungun', NULL, NULL),
(414, 21, 'Simeulue', NULL, NULL),
(415, 12, 'Singkawang', NULL, NULL),
(416, 28, 'Sinjai', NULL, NULL),
(417, 12, 'Sintang', NULL, NULL),
(418, 11, 'Situbondo', NULL, NULL),
(419, 5, 'Sleman', NULL, NULL),
(420, 32, 'Solok', NULL, NULL),
(421, 32, 'Solok', NULL, NULL),
(422, 32, 'Solok Selatan', NULL, NULL),
(423, 28, 'Soppeng', NULL, NULL),
(424, 25, 'Sorong', NULL, NULL),
(425, 25, 'Sorong', NULL, NULL),
(426, 25, 'Sorong Selatan', NULL, NULL),
(427, 10, 'Sragen', NULL, NULL),
(428, 9, 'Subang', NULL, NULL),
(429, 21, 'Subulussalam', NULL, NULL),
(430, 9, 'Sukabumi', NULL, NULL),
(431, 9, 'Sukabumi', NULL, NULL),
(432, 14, 'Sukamara', NULL, NULL),
(433, 10, 'Sukoharjo', NULL, NULL),
(434, 23, 'Sumba Barat', NULL, NULL),
(435, 23, 'Sumba Barat Daya', NULL, NULL),
(436, 23, 'Sumba Tengah', NULL, NULL),
(437, 23, 'Sumba Timur', NULL, NULL),
(438, 22, 'Sumbawa', NULL, NULL),
(439, 22, 'Sumbawa Barat', NULL, NULL),
(440, 9, 'Sumedang', NULL, NULL),
(441, 11, 'Sumenep', NULL, NULL),
(442, 8, 'Sungaipenuh', NULL, NULL),
(443, 24, 'Supiori', NULL, NULL),
(444, 11, 'Surabaya', NULL, NULL),
(445, 10, 'Surakarta (Solo)', NULL, NULL),
(446, 13, 'Tabalong', NULL, NULL),
(447, 1, 'Tabanan', NULL, NULL),
(448, 28, 'Takalar', NULL, NULL),
(449, 25, 'Tambrauw', NULL, NULL),
(450, 16, 'Tana Tidung', NULL, NULL),
(451, 28, 'Tana Toraja', NULL, NULL),
(452, 13, 'Tanah Bumbu', NULL, NULL),
(453, 32, 'Tanah Datar', NULL, NULL),
(454, 13, 'Tanah Laut', NULL, NULL),
(455, 3, 'Tangerang', NULL, NULL),
(456, 3, 'Tangerang', NULL, NULL),
(457, 3, 'Tangerang Selatan', NULL, NULL),
(458, 18, 'Tanggamus', NULL, NULL),
(459, 34, 'Tanjung Balai', NULL, NULL),
(460, 8, 'Tanjung Jabung Barat', NULL, NULL),
(461, 8, 'Tanjung Jabung Timur', NULL, NULL),
(462, 17, 'Tanjung Pinang', NULL, NULL),
(463, 34, 'Tapanuli Selatan', NULL, NULL),
(464, 34, 'Tapanuli Tengah', NULL, NULL),
(465, 34, 'Tapanuli Utara', NULL, NULL),
(466, 13, 'Tapin', NULL, NULL),
(467, 16, 'Tarakan', NULL, NULL),
(468, 9, 'Tasikmalaya', NULL, NULL),
(469, 9, 'Tasikmalaya', NULL, NULL),
(470, 34, 'Tebing Tinggi', NULL, NULL),
(471, 8, 'Tebo', NULL, NULL),
(472, 10, 'Tegal', NULL, NULL),
(473, 10, 'Tegal', NULL, NULL),
(474, 25, 'Teluk Bintuni', NULL, NULL),
(475, 25, 'Teluk Wondama', NULL, NULL),
(476, 10, 'Temanggung', NULL, NULL),
(477, 20, 'Ternate', NULL, NULL),
(478, 20, 'Tidore Kepulauan', NULL, NULL),
(479, 23, 'Timor Tengah Selatan', NULL, NULL),
(480, 23, 'Timor Tengah Utara', NULL, NULL),
(481, 34, 'Toba Samosir', NULL, NULL),
(482, 29, 'Tojo Una-Una', NULL, NULL),
(483, 29, 'Toli-Toli', NULL, NULL),
(484, 24, 'Tolikara', NULL, NULL),
(485, 31, 'Tomohon', NULL, NULL),
(486, 28, 'Toraja Utara', NULL, NULL),
(487, 11, 'Trenggalek', NULL, NULL),
(488, 19, 'Tual', NULL, NULL),
(489, 11, 'Tuban', NULL, NULL),
(490, 18, 'Tulang Bawang', NULL, NULL),
(491, 18, 'Tulang Bawang Barat', NULL, NULL),
(492, 11, 'Tulungagung', NULL, NULL),
(493, 28, 'Wajo', NULL, NULL),
(494, 30, 'Wakatobi', NULL, NULL),
(495, 24, 'Waropen', NULL, NULL),
(496, 18, 'Way Kanan', NULL, NULL),
(497, 10, 'Wonogiri', NULL, NULL),
(498, 10, 'Wonosobo', NULL, NULL),
(499, 24, 'Yahukimo', NULL, NULL),
(500, 24, 'Yalimo', NULL, NULL),
(501, 5, 'Yogyakarta', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komunitas`
--

CREATE TABLE `komunitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pilihan_olahraga` enum('BADMINTON','SEPAK BOLA','FUTSAL','BASKET','MINI SOCCER') NOT NULL,
  `nama_komunitas` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_datavip`
--

CREATE TABLE `konfirmasi_datavip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pilihan_olahraga` enum('BADMINTON','SEPAK BOLA','FUTSAL','BASKET','MINI SOCCER') NOT NULL,
  `nama_lapangan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan_harga` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id`, `pilihan_olahraga`, `nama_lapangan`, `alamat`, `kontak`, `provinsi`, `gambar`, `harga`, `keterangan_harga`, `created_at`, `updated_at`, `kabupaten`, `tanggal`) VALUES
(3, 'BADMINTON', 'ARAYA', 'Desa TalagaSari RT 10 WR 02 kecamatan cikupa kabupaten tangerang provinsi banten', '1', 'Kepulauan Riau', '/storage/images/1719588827_1719500195_Tampilan-dalam-gor-araya.jpg', 1500000, '2 Jam', '2024-06-28 08:33:47', '2024-06-28 08:33:47', 'Bintan', '2024-06-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_24_034717_agenda', 1),
(6, '2024_06_22_143316_lapangan', 1),
(7, '2024_06_22_145409_provinsi', 1),
(8, '2024_06_22_145435_kabupaten', 1),
(9, '2024_06_23_162402_komunitas', 1),
(10, '2024_06_25_045703_konfirmasi_data_v_i_p', 1),
(11, '2024_06_25_045721_verifikasi_data_v_i_p', 1),
(12, '2024_06_27_175417_roleuser', 2),
(13, '2024_06_27_182327_update_agenda_table', 3),
(14, '2024_06_27_182459_update_agenda_table', 4),
(15, '2024_06_27_195221_update_lapangan_table', 5),
(16, '2024_06_27_215159_update_agenda_table', 6),
(17, '2024_06_28_145701_update_lapangan_table', 7),
(18, '2024_06_28_145856_update_komunitas_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` bigint(20) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`, `created_at`, `updated_at`) VALUES
(1, 'Bali', NULL, NULL),
(2, 'Bangka Belitung', NULL, NULL),
(3, 'Banten', NULL, NULL),
(4, 'Bengkulu', NULL, NULL),
(5, 'DI Yogyakarta', NULL, NULL),
(6, 'DKI Jakarta', NULL, NULL),
(7, 'Gorontalo', NULL, NULL),
(8, 'Jambi', NULL, NULL),
(9, 'Jawa Barat', NULL, NULL),
(10, 'Jawa Tengah', NULL, NULL),
(11, 'Jawa Timur', NULL, NULL),
(12, 'Kalimantan Barat', NULL, NULL),
(13, 'Kalimantan Selatan', NULL, NULL),
(14, 'Kalimantan Tengah', NULL, NULL),
(15, 'Kalimantan Timur', NULL, NULL),
(16, 'Kalimantan Utara', NULL, NULL),
(17, 'Kepulauan Riau', NULL, NULL),
(18, 'Lampung', NULL, NULL),
(19, 'Maluku', NULL, NULL),
(20, 'Maluku Utara', NULL, NULL),
(21, 'Nanggroe Aceh Darussalam (NAD)', NULL, NULL),
(22, 'Nusa Tenggara Barat (NTB)', NULL, NULL),
(23, 'Nusa Tenggara Timur (NTT)', NULL, NULL),
(24, 'Papua', NULL, NULL),
(25, 'Papua Barat', NULL, NULL),
(26, 'Riau', NULL, NULL),
(27, 'Sulawesi Barat', NULL, NULL),
(28, 'Sulawesi Selatan', NULL, NULL),
(29, 'Sulawesi Tengah', NULL, NULL),
(30, 'Sulawesi Tenggara', NULL, NULL),
(31, 'Sulawesi Utara', NULL, NULL),
(32, 'Sumatera Barat', NULL, NULL),
(33, 'Sumatera Selatan', NULL, NULL),
(34, 'Sumatera Utara', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roleuser`
--

CREATE TABLE `roleuser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_transaksi` varchar(255) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roleuser`
--

INSERT INTO `roleuser` (`id`, `jenis_transaksi`, `metode_pembayaran`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Dompet Virtual', 'DANA', '/storage/images/1719522670_1719500195_Tampilan-dalam-gor-araya.jpg', 2, '2024-06-27 14:11:10', '2024-06-27 14:11:10'),
(6, 'Dompet Virtual', 'DANA', '/storage/images/1719590820_Tampilan-dalam-gor-araya.jpg', 2, '2024-06-28 09:07:00', '2024-06-28 09:07:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('ADMIN','VIP','NVIP') NOT NULL DEFAULT 'NVIP',
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `WA` varchar(255) DEFAULT NULL,
  `IG` varchar(255) DEFAULT NULL,
  `FB` varchar(255) DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `image`, `birthplace`, `birthdate`, `address`, `fullname`, `city`, `gender`, `WA`, `IG`, `FB`, `gmail`) VALUES
(1, 'rakhmat', '$2y$10$3ZyecNA39u8GyVWAnRwRu.6IwDMY/cErlN4TxM0M8LZPU4GqT.Q7W', 'VIP', NULL, NULL, NULL, '2024-06-27 11:14:01', '2024-06-27 14:10:29', 'profile_images/ho0UkHeW7KLnBTY4Iht7xc24AkrdwnZr2EY55M0m.jpg', 'Kab. Tangerang', '2003-07-01', 'Desa TalagaSari RT 10 WR 02 kecamatan cikupa kabupaten tangerang provinsi banten', 'Rakhmat Fadhilah', 'Kab. Tangerang', 'Male', '085891791600', 'rafalah11', 'rafalah', 'adiluffy77@gmail.com'),
(2, 'brili', '$2y$10$QYr6X8LhuFW4Dv12wIaIquLHjpVOpJQRyE5LC4u7HtjIS0GZsxftW', 'NVIP', NULL, NULL, NULL, '2024-06-27 11:40:44', '2024-06-28 09:04:55', 'profile_images/a5npq8uOHIF7kR860VNPUfrItV5gbRlbBGTOJfjc.png', 'Kab. Tangerang', '2024-07-05', 'Desa TalagaSari RT 10 WR 02 kecamatan cikupa kabupaten tangerang provinsi banten', 'brilian ariestianto', 'Kab. Tangerang', 'Male', '0858917990', 'bili', 'brili', 'bili'),
(3, 'razzan', '$2y$10$ip4IXjus6d9d50.D2lw9d.BkT0ffcOEo46lfcpRN2b7ychAjN/8se', 'ADMIN', NULL, NULL, NULL, '2024-06-27 11:41:07', '2024-06-27 11:41:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi_datavip`
--

CREATE TABLE `verifikasi_datavip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `kabupaten_id_provinsi_foreign` (`id_provinsi`);

--
-- Indeks untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasi_datavip`
--
ALTER TABLE `konfirmasi_datavip`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `roleuser`
--
ALTER TABLE `roleuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleuser_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `verifikasi_datavip`
--
ALTER TABLE `verifikasi_datavip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_datavip`
--
ALTER TABLE `konfirmasi_datavip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `roleuser`
--
ALTER TABLE `roleuser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `verifikasi_datavip`
--
ALTER TABLE `verifikasi_datavip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `roleuser`
--
ALTER TABLE `roleuser`
  ADD CONSTRAINT `roleuser_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
