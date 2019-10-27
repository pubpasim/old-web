-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 11:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pub`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_uploadeds`
--

CREATE TABLE `image_uploadeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 0),
(2, '2014_10_12_100000_create_password_resets_table', 0),
(3, '2019_09_18_115748_tb_angkatan', 1),
(4, '2019_09_18_153708_tb_org_ppmb', 1),
(5, '2019_09_18_155534_tb_org_pub', 1),
(6, '2019_09_19_034851_tb_jadwal', 1),
(7, '2019_09_19_035620_tb_daerah', 1),
(8, '2019_09_19_035722_tb_jurusan', 1),
(9, '2019_09_19_035825_tb_pelatihan', 1),
(10, '2019_09_19_040014_tb_status_sos', 1),
(11, '2019_09_19_040107_tb_status_pub', 1),
(12, '2019_09_19_051609_tb_hasil', 1),
(13, '2019_09_19_051757_tb_sekolah', 1),
(14, '2019_09_22_160038_create_tb_mahasiswa_table', 1),
(15, '2019_09_22_160556_create_tb_pengalaman_table', 1),
(16, '2019_09_22_161409_create_tb_alumni_dok_table', 1),
(17, '2019_09_22_162203_create_tb_ppmb_dok_table', 1),
(18, '2019_09_22_163108_create_tb_pubdok_table', 1),
(19, '2019_09_22_163530_create_tb_detorg_ppmb_table', 1),
(20, '2019_09_22_165034_create_tb_detjadwal_table', 1),
(21, '2019_09_22_165912_create_tb_det_hasilseleksi_table', 1),
(22, '2019_09_22_171443_create_tb_detjadwal_t_s_table', 1),
(23, '2019_09_22_172554_create_tb_detorg_pub_table', 1),
(24, '2019_09_22_173150_create_tb_detpelatihan_table', 1),
(25, '2019_09_22_174209_create_tb_detpengalaman_table', 1),
(26, '2019_09_22_175520_create_tb_infaq_table', 1),
(27, '2019_09_22_181724_create_tb_pendidikan_table', 1),
(28, '2019_09_22_182144_create_tb_detpendidikan_table', 1),
(29, '2019_09_23_043305_create_tb_user_table', 1),
(30, '2019_10_01_084426_create_tb_detpengalaman_table', 2),
(31, '2019_10_01_181850_create_tb_detpendidikan_table', 3),
(32, '2019_10_02_034120_create_image_uploadeds_table', 4),
(33, '2019_10_08_155522_create_tb_user_table', 4),
(34, '2019_10_08_235725_create_tb_alumni_dok_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni_dok`
--

CREATE TABLE `tb_alumni_dok` (
  `id_alumnidok` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_angkatan` int(10) UNSIGNED NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_alumni_dok`
--

INSERT INTO `tb_alumni_dok` (`id_alumnidok`, `file`, `keterangan`, `id_angkatan`, `id_mahasiswa`, `created_at`, `updated_at`) VALUES
(2, '1570580353_20170703_150647.jpg', 'Data Saya', 1, 41, NULL, NULL),
(3, '1570580469_20170703_150647.jpg', 'Data Saya', 1, 41, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_angkatan`
--

CREATE TABLE `tb_angkatan` (
  `id_angkatan` int(10) UNSIGNED NOT NULL,
  `nama_angkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` int(255) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_angkatan`
--

INSERT INTO `tb_angkatan` (`id_angkatan`, `nama_angkatan`, `angkatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 1, NULL, NULL, NULL),
(2, '', 2, NULL, NULL, NULL),
(3, '-', 3, NULL, '2019-10-05 09:06:13', '2019-10-05 09:06:13'),
(4, 'Malware', 16, NULL, '2019-10-05 09:17:13', '2019-10-05 09:17:13'),
(5, '-', 4, NULL, '2019-10-05 12:10:58', '2019-10-05 12:10:58'),
(6, 'Firewall', 17, NULL, '2019-10-18 21:44:53', '2019-10-18 21:44:53'),
(7, '-', 5, NULL, '2019-10-18 21:45:14', '2019-10-18 21:45:14'),
(8, '-', 6, NULL, '2019-10-18 21:45:32', '2019-10-18 21:45:32'),
(9, '-', 7, NULL, '2019-10-18 21:45:55', '2019-10-18 21:45:55'),
(10, '-', 8, NULL, '2019-10-18 21:46:14', '2019-10-18 21:46:14'),
(11, '-', 9, NULL, '2019-10-18 21:46:40', '2019-10-18 21:46:40'),
(12, '-', 10, NULL, '2019-10-18 21:46:56', '2019-10-18 21:46:56'),
(13, '-', 11, NULL, '2019-10-18 21:47:26', '2019-10-18 21:47:26'),
(14, '-', 12, NULL, '2019-10-18 21:47:42', '2019-10-18 21:47:42'),
(15, '-', 13, NULL, '2019-10-18 21:47:51', '2019-10-18 21:47:51'),
(16, '-', 14, NULL, '2019-10-18 21:48:09', '2019-10-18 21:48:09'),
(17, 'Python', 15, NULL, '2019-10-18 21:48:35', '2019-10-18 21:48:35'),
(18, '-', 18, NULL, '2019-10-18 21:49:24', '2019-10-18 21:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daerah`
--

CREATE TABLE `tb_daerah` (
  `id_daerah` int(10) UNSIGNED NOT NULL,
  `kab_kot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_daerah`
--

INSERT INTO `tb_daerah` (`id_daerah`, `kab_kot`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cianjur Selatan', NULL, NULL, NULL),
(2, 'Banyumas', NULL, NULL, NULL),
(3, 'Boyolali', NULL, '2019-10-14 03:00:29', '2019-10-14 03:00:29'),
(4, 'Garut Kota', NULL, '2019-10-14 03:00:45', '2019-10-14 03:00:45'),
(5, 'Kabupaten Bandung Barat', NULL, '2019-10-18 21:57:21', '2019-10-18 21:57:21'),
(6, 'Salatiga', NULL, '2019-10-18 21:57:33', '2019-10-18 21:57:33'),
(7, 'Bandung', NULL, '2019-10-18 21:57:52', '2019-10-18 21:57:52'),
(8, 'Cirebon', NULL, '2019-10-18 21:58:57', '2019-10-18 21:58:57'),
(9, 'Ciamis', NULL, '2019-10-18 21:59:19', '2019-10-18 21:59:19'),
(10, 'Cianjur', NULL, '2019-10-18 21:59:29', '2019-10-18 21:59:29'),
(11, 'Banyumas', NULL, '2019-10-18 21:59:55', '2019-10-18 21:59:55'),
(12, 'Indramayu', NULL, '2019-10-18 22:00:04', '2019-10-18 22:00:04'),
(13, 'Sibolga', NULL, '2019-10-18 22:00:27', '2019-10-18 22:00:27'),
(14, 'Bogor', NULL, '2019-10-18 22:00:43', '2019-10-18 22:00:43'),
(15, 'Purwakarta', NULL, '2019-10-18 22:00:55', '2019-10-18 22:00:55'),
(16, 'Sumedang', NULL, '2019-10-18 22:01:11', '2019-10-18 22:01:11'),
(17, 'Banjarnegara', NULL, '2019-10-18 22:01:21', '2019-10-18 22:01:21'),
(18, 'Garut Selatan', NULL, '2019-10-18 22:03:18', '2019-10-18 22:03:40'),
(19, 'Cilacap', NULL, '2019-10-18 22:04:20', '2019-10-18 22:04:20'),
(20, 'Padang Sidimpuan', NULL, '2019-10-20 08:34:28', '2019-10-20 08:34:28'),
(21, 'Pekanbaru', NULL, '2019-10-20 08:34:43', '2019-10-20 08:34:43'),
(22, 'Medan', NULL, '2019-10-20 08:35:00', '2019-10-20 08:35:00'),
(23, 'Pangandaran', NULL, '2019-10-20 10:11:39', '2019-10-20 10:11:39'),
(24, 'Tasikmalaya', NULL, '2019-10-20 10:48:49', '2019-10-20 10:48:49'),
(25, 'Banjar', NULL, '2019-10-20 10:55:35', '2019-10-20 10:55:35'),
(26, 'Bekasi', NULL, '2019-10-20 10:55:45', '2019-10-20 10:55:45'),
(27, 'Tangerang', NULL, '2019-10-20 10:55:52', '2019-10-20 10:55:52'),
(28, 'Banjarsari', NULL, '2019-10-20 19:38:56', '2019-10-20 19:38:56'),
(29, 'Cimahi', NULL, '2019-10-22 03:31:24', '2019-10-22 03:31:24'),
(30, 'Sukabumi', NULL, '2019-10-22 03:31:36', '2019-10-22 03:31:36'),
(31, 'Tegal', NULL, '2019-10-22 08:03:44', '2019-10-22 08:03:44'),
(32, 'Jakarta', NULL, '2019-10-22 18:49:12', '2019-10-22 18:49:12'),
(33, 'Rancaekek', NULL, '2019-10-22 18:56:23', '2019-10-22 18:56:23'),
(34, 'Isi Daerah', NULL, '2019-10-22 21:02:32', '2019-10-22 21:02:32'),
(35, 'Pariaman', NULL, '2019-10-23 00:32:33', '2019-10-23 00:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detjadwal`
--

CREATE TABLE `tb_detjadwal` (
  `id_detjadwal` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `id_periode` int(10) UNSIGNED NOT NULL,
  `id_daerah` int(10) UNSIGNED NOT NULL,
  `tanggal_awal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_akhir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sekolah` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detorg_ppmb`
--

CREATE TABLE `tb_detorg_ppmb` (
  `id_detil` int(10) UNSIGNED NOT NULL,
  `id_orgppmb` int(10) UNSIGNED NOT NULL,
  `id_angkatan` int(10) UNSIGNED NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detorg_pub`
--

CREATE TABLE `tb_detorg_pub` (
  `id_detorg_pub` int(10) UNSIGNED NOT NULL,
  `id_orgpub` int(10) UNSIGNED NOT NULL,
  `id_angkatan` int(10) UNSIGNED NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detorg_pub`
--

INSERT INTO `tb_detorg_pub` (`id_detorg_pub`, `id_orgpub`, `id_angkatan`, `id_mahasiswa`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 42, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detpelatihan`
--

CREATE TABLE `tb_detpelatihan` (
  `id_detpelatihan` int(10) UNSIGNED NOT NULL,
  `id_angkatan` int(10) UNSIGNED NOT NULL,
  `id_pelatihan` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detpelatihan`
--

INSERT INTO `tb_detpelatihan` (`id_detpelatihan`, `id_angkatan`, `id_pelatihan`, `file`, `Keterangan`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'csc', 'UTS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detpendidikan`
--

CREATE TABLE `tb_detpendidikan` (
  `id_detpendidikan` int(10) UNSIGNED NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Universitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tahun_lulus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detpendidikan`
--

INSERT INTO `tb_detpendidikan` (`id_detpendidikan`, `id_mahasiswa`, `prodi`, `Universitas`, `Tahun_lulus`, `created_at`, `updated_at`) VALUES
(1, 39, 'S1', 'Universitas Widyatama', 'Tahun 2019', NULL, NULL),
(2, 40, 'S1', 'ITB', 'Dalam Proses', NULL, NULL),
(3, 41, 'S1', 'Universitas Widyatama', 'Dalam Proses', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detpengalaman`
--

CREATE TABLE `tb_detpengalaman` (
  `id_detpengalaman` int(10) UNSIGNED NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detpengalaman`
--

INSERT INTO `tb_detpengalaman` (`id_detpengalaman`, `id_mahasiswa`, `instansi`, `lama_kerja`, `jabatan`, `created_at`, `updated_at`) VALUES
(21, 39, 'PT EDI', '2 Tahun', 'programmer', NULL, NULL),
(22, 39, 'PT EDI', '2 Tahun', 'programmer', NULL, NULL),
(23, 39, 'PT EDI', '15 Tahun', 'Staf IT', NULL, NULL),
(24, 39, 'PT EDI', '2 Tahun', 'programmer', NULL, NULL),
(25, 39, 'PT EDI', '16 Tahun', 'Staf IT', NULL, NULL),
(26, 40, 'PT Telkom', '3 Tahun', 'programmer', NULL, NULL),
(27, 41, 'PT Telkom', '5 Tahun', 'programmer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_hasilseleksi`
--

CREATE TABLE `tb_det_hasilseleksi` (
  `id_det_seleksi` int(10) UNSIGNED NOT NULL,
  `id_hasil` int(10) UNSIGNED NOT NULL,
  `id_angkatan` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumentasi`
--

CREATE TABLE `tb_dokumentasi` (
  `id_dok` int(11) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokumentasi`
--

INSERT INTO `tb_dokumentasi` (`id_dok`, `foto`, `keterangan`) VALUES
(5, '1571229683_IMG_20181106_072718-min.jpg', 'TPA dan Wawancara Awal'),
(6, '1571230018_data.jpg', 'TPA dan Wawancara Awal'),
(7, '1571230042_psikotes.jpg', 'Psikotest'),
(8, '1571230059_psikotes.jpg', 'Psikotest'),
(9, '1571230076_survei2.jpg', 'Home Visit'),
(10, '1571230093_survei.jpg', 'Home Visit'),
(11, '1571230110_mou.jpg', 'MOU'),
(12, '1571230127_wa.jpg', 'Wawancara Akhir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dok_alumni`
--

CREATE TABLE `tb_dok_alumni` (
  `id` int(11) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_final`
--

CREATE TABLE `tb_final` (
  `id_final` int(11) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `jk` char(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `asal_daerah` varchar(50) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `status` char(20) NOT NULL,
  `id_tahun4` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(10) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ikatan_alumni`
--

CREATE TABLE `tb_ikatan_alumni` (
  `id_ikatan` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `masa_bakti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ikatan_alumni`
--

INSERT INTO `tb_ikatan_alumni` (`id_ikatan`, `id_mahasiswa`, `id_jabatan`, `masa_bakti`) VALUES
(5, 41, 6, '2019-2024');

-- --------------------------------------------------------

--
-- Table structure for table `tb_infaq`
--

CREATE TABLE `tb_infaq` (
  `id_infaq` int(10) UNSIGNED NOT NULL,
  `id_angkatan` int(10) UNSIGNED NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_infaq` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_infaq`
--

INSERT INTO `tb_infaq` (`id_infaq`, `id_angkatan`, `periode`, `total_infaq`, `created_at`, `updated_at`) VALUES
(1, 4, '2019-08', 26000000, NULL, NULL),
(3, 4, '2019-09', 28000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jur` int(10) UNSIGNED NOT NULL,
  `nama_jur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jur`, `nama_jur`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'D3 Manajemen Informatika', NULL, NULL, NULL),
(2, 'S1 Akuntansi', NULL, NULL, NULL),
(3, 'S1 Teknik Informatika', NULL, '2019-10-18 22:08:28', '2019-10-18 22:08:28'),
(4, 'S1 Manajemen', NULL, '2019-10-18 22:08:37', '2019-10-18 22:08:37'),
(5, 'S1 Psikologi', NULL, '2019-10-18 22:09:21', '2019-10-18 22:09:21'),
(6, 'S1 Sastra Jepang', NULL, '2019-10-18 22:09:32', '2019-10-18 22:09:32'),
(7, 'D3 Bahasa Inggris', NULL, '2019-10-18 22:10:01', '2019-10-18 22:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `NIM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_angkatan` int(10) UNSIGNED DEFAULT NULL,
  `id_sekolah` int(10) UNSIGNED DEFAULT NULL,
  `id_daerah` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_orgppmb` int(10) UNSIGNED DEFAULT NULL,
  `id_orgpub` int(10) UNSIGNED DEFAULT NULL,
  `id_jur` int(10) UNSIGNED DEFAULT NULL,
  `id_statusPub` int(10) UNSIGNED DEFAULT NULL,
  `id_statusSos` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `NIM`, `id_angkatan`, `id_sekolah`, `id_daerah`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `id_orgppmb`, `id_orgpub`, `id_jur`, `id_statusPub`, `id_statusSos`, `file`, `no_telp`, `created_at`, `updated_at`) VALUES
(39, '0204171017', 1, 1, 2, 'Asep Saepulloh', 'Ciamis', '06-12-1990', 'Laki-laki', 1, 2, 1, 2, 2, '', '085232449080', NULL, NULL),
(40, '0204171009', 2, 1, 2, 'fenita', 'Banyumas', '05-10-1999', 'Perempuan', 1, 2, 1, 2, 2, '', '082315519243', NULL, NULL),
(41, '0204171017', 1, 1, 1, 'Ihsan Nasihin', 'Garut', '02-02-1999', 'Laki-laki', 1, 1, 1, 2, 1, '', '0812923599', NULL, NULL),
(42, '0204171017', 4, 1, 1, 'Iyan Sanjaya', 'Cianjur', '02-12-1998', 'Laki-laki', 1, 1, 1, 1, 2, '1571048113_20171223_100139-min.jpg', '081292414183', NULL, NULL),
(44, '0204171018', 4, 4, 4, 'Ihsan Nasihin', 'Garut', '01-02-1999', 'Laki-laki', 1, 9, 1, 1, 2, '1571079868_20171223_100736-min.jpg', '089505881360', NULL, NULL),
(45, '0204171020', 4, 9, 6, 'Monica Dyah Pratiwi', 'Semarang', '2001-04-08', 'on', 6, 13, 1, 1, 2, '1571584736_PATORIKU.jpg', '085642470485', NULL, NULL),
(46, '0204171032', 4, 22, 9, 'Sri Hayati', 'Ciamis', '1999-05-25', 'on', 4, 5, 1, 1, 2, '1571585025_aoandon.jpeg', '081310595840', NULL, NULL),
(47, '0102171037', 4, 5, 5, 'Helma Yunia Putri', 'Bandung', '1999-06-06', 'on', 4, 6, 2, 1, 2, '1571585328_LILIN1.jpg', '085795611137', NULL, NULL),
(48, '0204181013', 6, 21, 20, 'Elisa Septiani Lubis', 'Sidadi Jae', '2000-09-10', 'on', 6, 13, 1, 1, 2, '1571585930_pasim.jpg', '0000000000', NULL, NULL),
(49, '0406171007', 4, 26, 15, 'Putria Nur\'ainun', 'Purwakarta', '1999-09-16', 'Perempuan', 1, 17, 6, 1, 2, '1571586184_aoandon.jpeg', '000000000000', NULL, NULL),
(50, '0102171047', 4, 8, 5, 'Salma Rizkiyanti Alamsyah', 'Bandung', '1999-03-22', 'on', 4, 5, 2, 1, 2, '1571586397_awan.jpg', '083893008520', NULL, NULL),
(51, '0305171046', 4, 27, 7, 'Tiara Guntari', 'Bandung', '1999-06-21', 'Perempuan', 5, 15, 5, 1, 2, '1571586560_LRM_EXPORT_132236632841689_20190724_091157016.jpeg', '083817246116', NULL, NULL),
(52, '0203171084', 4, 5, 5, 'Nenti Gustini Nurhidayah', 'Bandung', '1999-08-02', 'Perempuan', 1, 2, 3, 1, 2, '1571586924_LRM_EXPORT_112711582840855_20190708_174431743.jpeg', '083843710926', NULL, NULL),
(53, '0407171001', 4, 5, 5, 'Aldi Mulyadi', 'Bandung', '1999-12-30', 'Laki-laki', 6, 13, 7, 1, 2, '1571588079_awan.jpg', '083112505824', NULL, NULL),
(54, '0407171002', 4, 26, 15, 'Della Yulianisha', 'Purwakarta', '1999-07-13', 'on', 1, 13, 7, 1, 2, '1571589488_pasim.jpg', '087824771427', NULL, NULL),
(55, '0204171001', 4, 31, 26, 'Abdul Wahid', 'Bekasi', '1999-07-13', 'Laki-laki', 1, 15, 1, 1, 2, '1571591930_20171223_094624-min.jpg', '0895331902569', NULL, NULL),
(57, '0204171002', 4, 29, 9, 'Amelia Yuniar', 'Ciamis', '1998-06-05', 'Perempuan', 1, 18, 1, 1, 2, '1571816872_18a5a1b6-5a94-47bd-865b-eb16e3d063a7.jfif', '0000000000', NULL, NULL),
(58, '0204171005', 4, 28, 12, 'Caridi', 'Indramayu', '1999-09-07', 'Laki-laki', 1, 16, 1, 1, 2, '1571592079_20171223_095234-min.jpg', '0000000000', NULL, NULL),
(63, '0204181039', 6, 17, 9, 'Yayu Fajriati Rahayu', 'Ciamis', '1999-05-29', 'on', 5, 20, 1, 1, 2, '1571591205_pasim.jpg', '000000000000', NULL, NULL),
(64, '0204181021', 6, 16, 9, 'Lia Rizkiani', 'Ciamis', '1999-12-27', 'on', 1, 16, 1, 1, 2, '1571591338_pasim.jpg', '00000000000', NULL, NULL),
(65, '0204181020', 6, 20, 23, 'Laesya Ayu Reana', 'Ciamis', '2000-10-13', 'Perempuan', 1, 18, 1, 1, 2, '1571591483_pasim.jpg', '085723513821', NULL, NULL),
(66, '0204171006', 4, 7, 9, 'Dani Kusnaedi', 'Ciamis', '1998-10-23', 'on', 1, 12, 1, 1, 2, '1571592218_20171223_100809-min.jpg', '0000000000', NULL, NULL),
(67, '0204171007', 4, 31, 12, 'Deded Rolistio Alamsyah', 'Indramayu', '1998-12-02', 'Laki-laki', 1, 13, 1, 1, 2, '1571592426_IMG-20190817-WA0032.jpg', '0000000000', NULL, NULL),
(68, '0204171008', 4, 31, 5, 'Fahmi Ali', 'Bandung', '1997-08-15', 'Laki-laki', 1, 7, 1, 1, 2, '1571592542_20171223_095326-min.jpg', '000000000000', NULL, NULL),
(69, '0204171009', 4, 31, 11, 'Fenita Oktaviani', 'Banyumas', '1999-10-05', 'Perempuan', 1, 15, 1, 1, 2, '1571592811_20171223_100139-min.jpg', '00000000000', NULL, NULL),
(70, '0204171010', 4, 31, 18, 'Fitra Surya Saputra', 'Garut', '1999-03-06', 'Laki-laki', 1, 10, 1, 1, 2, '1571593000_pasim.jpg', '000000000000', NULL, NULL),
(71, '0204171011', 4, 5, 5, 'Hadiyanto', 'Bandung', '1999-06-13', 'on', 9, 20, 1, 1, 2, '1571593177_20171223_100915-min.jpg', '000000000000', NULL, NULL),
(72, '0204171012', 4, 31, 5, 'Hafidh Almarogi', 'Bandung', '1998-12-07', 'Laki-laki', 1, 18, 1, 1, 2, '1571593314_20171223_100030-min.jpg', '0000000', NULL, NULL),
(73, '0204171013', 4, 31, 1, 'Hasri Nuryawati', 'Cianjur', '1998-07-10', 'Perempuan', 1, 18, 1, 1, 2, '1571593409_pasim.jpg', '0000000000', NULL, NULL),
(74, '0204171014', 4, 31, 18, 'Husnul Roby Gunawan', 'Garut', '1997-06-12', 'Laki-laki', 1, 3, 1, 1, 2, '1571593512_20171223_100603-min.jpg', '000000000', NULL, NULL),
(75, '0204171016', 4, 30, 3, 'Irsyad Ilyasa', 'Cilacap', '1999-07-25', 'on', 1, 17, 1, 1, 2, '1571593602_20171223_100847-min.jpg', '000000000', NULL, NULL),
(76, '0204171019', 4, 31, 24, 'M Baghyan Widyanto', 'Tasikmalaya', '1998-03-04', 'Laki-laki', 1, 14, 1, 1, 2, '1571593705_20171223_095123-min.jpg', '00000000000', NULL, NULL),
(77, '0204171021', 4, 20, 23, 'Nina Man Aida', 'Ciamis', '1999-10-25', 'on', 1, 16, 1, 1, 2, '1571593850_20171223_095123-min.jpg', '000000000', NULL, NULL),
(78, '0204171022', 4, 22, 25, 'Ninda Try Alviani', 'Ciamis', '1998-10-26', 'Perempuan', 1, 16, 1, 1, 2, '1571593932_20171223_095326-min.jpg', '000000000', NULL, NULL),
(79, '0204171023', 4, 31, 17, 'Novelina Erlin Saputri', 'Banjarnegara', '1998-11-06', 'Perempuan', 1, 13, 1, 1, 2, '1571594044_20171223_095047-min.jpg', '000000000', NULL, NULL),
(80, '0204171024', 4, 22, 25, 'Nurdin', 'Ciamis', '1999-01-19', 'Laki-laki', 1, 19, 1, 1, 2, '1571594121_20171223_095047-min.jpg', '000000000', NULL, NULL),
(81, '0204171026', 4, 31, 27, 'Putri Widiyanti Rohman', 'Grobogan', '1999-11-11', 'Perempuan', 1, 15, 1, 1, 1, '1571594266_20171223_095123-min.jpg', '000000000', NULL, NULL),
(82, '0204171027', 4, 31, 16, 'Rini Oktaviani', 'Sumedang', '1998-10-25', 'Perempuan', 1, 14, 1, 1, 2, '1571594343_20171223_095123-min.jpg', '000000000', NULL, NULL),
(83, '0204171028', 4, 22, 25, 'Saeful Mizwar', 'Ciamis', '1998-05-15', 'Laki-laki', 1, 17, 1, 1, 2, '1571622322_WhatsApp Image 2019-10-21 at 04.15.15.jpeg', '000000000', NULL, NULL),
(84, '0204171029', 4, 3, 3, 'Saiful Nur Iksan', 'Boyolali', '1999-06-09', 'on', 1, 15, 1, 1, 2, '1571594533_20171223_100748-min.jpg', '000000000', NULL, NULL),
(85, '0204171030', 4, 7, 25, 'Saras Ayuwati', 'Ciamis', '1998-11-21', 'on', 1, 15, 1, 1, 2, '1571594599_20171223_095047-min.jpg', '000000000', NULL, NULL),
(86, '0204171031', 4, 1, 1, 'Siti Nurliani Susanti', 'Cianjur', '1999-03-03', 'on', 1, 14, 1, 1, 2, '1571594672_20171223_095047-min.jpg', '000000000', NULL, NULL),
(87, '0204171033', 4, 19, 8, 'Suyanto', 'Cirebon', '1998-09-05', 'on', 1, 19, 1, 1, 2, '1571594872_20171223_100847-min.jpg', '000000000', NULL, NULL),
(88, '0204171034', 4, 31, 5, 'Syamsul Abdul Azis', 'Bandung', '1998-08-25', 'Laki-laki', 1, 19, 1, 1, 2, '1571594959_20171223_100103-min.jpg', '000000000', NULL, NULL),
(89, '0204171036', 4, 22, 25, 'Tina Oktapiani', 'Banjar', '1998-10-29', 'on', 1, 17, 1, 1, 2, '1571595033_20171223_095234-min.jpg', '000000000', NULL, NULL),
(90, '0204171037', 4, 31, 11, 'Tri Noverita Sari', 'Banyumas', '1998-11-09', 'Perempuan', 1, 16, 1, 1, 2, '1571622401_WhatsApp Image 2019-10-21 at 05.48.39.jpeg', '000000000', NULL, NULL),
(91, '0204171038', 4, 28, 12, 'Yandi', 'Indramayu', '1997-04-10', 'on', 1, 19, 1, 1, 2, '1571595196_20171223_095944-min.jpg', '00000000', NULL, NULL),
(92, '0203171082', 4, 15, 9, 'Fitriani', 'Ciamis', '1998-12-27', 'on', 6, 13, 1, 1, 2, '1571595295_20171223_100655-min.jpg', '0000000000', NULL, NULL),
(93, '0203171083', 4, 31, 10, 'Herdiana', 'Cianjur', '1997-05-04', 'Laki-laki', 1, 13, 3, 1, 2, '1571595397_20171223_100655-min.jpg', '000000000', NULL, NULL),
(94, '0101171134', 4, 31, 3, 'Lusi Kusnaeni', 'Boyolali', '1998-09-10', 'Perempuan', 5, 14, 4, 1, 2, '1571622237_WhatsApp Image 2019-10-21 at 06.08.19.jpeg', '000000000', NULL, NULL),
(95, '0203171085', 4, 18, 13, 'Rizky Fardiansyah Tanjung', 'Sibolga', '1999-07-20', 'on', 6, 3, 3, 1, 2, '1571595610_20171223_100655-min.jpg', '000000000', NULL, NULL),
(96, '0102171049', 4, 22, 25, 'Sihabudin Ali', 'Banjar', '1999-01-14', 'on', 2, 1, 2, 1, 2, '1571595695_20171223_100748-min.jpg', '000000000', NULL, NULL),
(97, '0203171086', 4, 5, 5, 'Sinta Cantika', 'Bandung', '1999-08-23', 'on', 5, 15, 3, 1, 2, '1571595761_20171223_095047-min.jpg', '00000000', NULL, NULL),
(98, '0101171156', 4, 31, 14, 'Siti Salbyah', 'Bogor', '1999-10-15', 'Perempuan', 5, 18, 4, 1, 2, '1571595843_20171223_095123-min.jpg', '000000000', NULL, NULL),
(99, '0101171159', 4, 31, 14, 'Ulfiana Dewi', 'Jakarta', '1999-09-21', 'Perempuan', 10, 14, 4, 1, 2, '1571595925_20171223_095123-min.jpg', '000000000', NULL, NULL),
(100, '0203171087', 4, 31, 8, 'Wia Handayani', 'Cirebon', '1998-07-04', 'Perempuan', 6, 13, 3, 1, 2, '1571595991_20171223_095047-min.jpg', '000000000', NULL, NULL),
(101, '0203181027', 6, 7, 25, 'Ade Radia Rahmat', 'Ciamis', '2000-04-08', 'on', 6, 7, 3, 1, 2, '1571623785_WhatsApp Image 2019-10-21 at 00.01.26.jpeg', '083878456417', NULL, NULL),
(102, '0204181001', 6, 31, 5, 'Abdul Manaf Yusro', 'Bandung', '2000-01-21', 'Laki-laki', 1, 18, 1, 1, 2, '1571624441_WhatsApp Image 2019-10-21 at 00.01.26.jpeg', '0000000000', NULL, NULL),
(103, '0204181002', 6, 31, 5, 'Abdul Rojaq Rizki Akbar', 'Bandung', '2001-03-22', 'on', 1, 17, 1, 1, 2, '1571625753_pasim.jpg', '0000000000', NULL, NULL),
(104, '0204181003', 6, 31, 1, 'Agam Mudhaqir', 'Garut', '1999-08-29', 'on', 1, 16, 1, 1, 2, '1571625850_pasim.jpg', '00000000', NULL, NULL),
(105, '020418004', 6, 31, 5, 'Ahmad Sukriana', 'Bandung', '1999-12-15', 'on', 1, 12, 1, 1, 2, '1571637524_pasim.jpg', '000000000', NULL, NULL),
(106, '0204181005', 6, 31, 10, 'Alif Rahman Firdaus', 'Cianjur', '2000-06-02', 'on', 1, 11, 1, 1, 2, '1571637786_pasim.jpg', '0000', NULL, NULL),
(108, '0305181058', 6, 9, 6, 'Anjani Arum safitri', 'Kab.Semarang', '1999-12-15', 'on', 7, 20, 5, 1, 2, '1571637974_pasim.jpg', '00000000', NULL, NULL),
(110, '0204181006', 6, 5, 5, 'Anisa Restu Nurhamidah', 'Bandung', '2000-02-22', 'on', 1, 16, 1, 1, 2, '1571638123_pasim.jpg', '0000000', NULL, NULL),
(112, '0102181021', 6, 12, 21, 'Annisa Rizky Mulya', 'Pekanbaru', '2000-07-27', 'on', 3, 20, 2, 1, 2, '1571638364_pasim.jpg', '00000000', NULL, NULL),
(113, '0204181007', 6, 31, 19, 'Cahyatu Ayuningtias', 'Cilacap', '2001-03-24', 'on', 1, 17, 1, 1, 2, '1571638488_pasim.jpg', '0000000', NULL, NULL),
(114, '0204181009', 6, 16, 9, 'Dadan Ramdani', 'Ciamis', '1999-01-06', 'on', 6, 13, 1, 1, 2, '1571638880_pasim.jpg', '000000', NULL, NULL),
(115, '0204181010', 6, 5, 5, 'Dandy Fadillah Setiady', 'Jakarta', '1999-08-08', 'on', 1, 19, 1, 1, 2, '1571648386_pasim.jpg', '0000000', NULL, NULL),
(116, '0204181014', 6, 13, 21, 'Desi Ramadhani', 'Pekanbaru', '1999-10-05', 'on', 1, 17, 1, 1, 2, '1571648493_pasim.jpg', '000000', NULL, NULL),
(118, '0101181140', 6, 5, 5, 'Desy Rachmawati', 'Bandung', '1999-10-11', 'on', 10, 20, 4, 1, 2, '1571648645_pasim.jpg', '00000', NULL, NULL),
(120, '0204181013', 6, 13, 21, 'Della Octa Irmulvani', 'Pekanbaru', '1999-10-05', 'on', 5, 20, 1, 1, 2, '1571648811_pasim.jpg', '00000', NULL, NULL),
(121, '0204181015', 6, 31, 12, 'Dio Prasetyo', 'Indramayu', '2000-04-21', 'Laki-laki', 1, 20, 1, 1, 2, '1571649416_aoandon.jpeg', '0', NULL, NULL),
(122, '0204181018', 6, 31, 4, 'Hana Hasanah', 'Garut', '2000-07-11', 'Perempuan', 1, 14, 1, 1, 2, '1571649689_pasim.jpg', '00', NULL, NULL),
(123, '0204181017', 6, 28, 12, 'Halimatuh Sa\'diah', 'Indramayu', '2000-02-10', 'Perempuan', 5, 20, 1, 1, 2, '1571649978_pasim.jpg', '0000', NULL, NULL),
(124, '0406181006', 6, 7, 28, 'Hesti Lestari', 'Ciamis', '1999-10-05', 'Perempuan', 5, 20, 6, 1, 2, '1571650114_pasim.jpg', '0000', NULL, NULL),
(125, '0101181139', 6, 11, 13, 'Kartini Rosady Tanjung', 'Sibolga', '2000-08-28', 'Perempuan', 10, 20, 4, 1, 2, '1571650228_pasim.jpg', '000', NULL, NULL),
(126, '0102181024', 6, 8, 5, 'Ica Octa Monica', 'Bandung', '1999-10-30', 'Perempuan', 10, 16, 2, 1, 2, '1571650314_pasim.jpg', '000', NULL, NULL),
(127, '0204181040', 6, 31, 3, 'Yessy Sylviana Adyawati', 'Boyolali', '1999-04-22', 'Perempuan', 1, 15, 1, 1, 2, '1571650589_pasim.jpg', '000', NULL, NULL),
(128, '0102181020', 6, 5, 5, 'Yayat Hidayat', 'Bandung', '1999-07-09', 'Laki-laki', 6, 13, 2, 1, 2, '1571650666_pasim.jpg', '000', NULL, NULL),
(129, '0204181038', 6, 31, 2, 'Wina Dwi Waluyo', 'Banyumas', '2000-01-26', 'Perempuan', 6, 13, 1, 1, 2, '1571650806_pasim.jpg', '000', NULL, NULL),
(130, '02041891036', 6, 31, 2, 'Tria Sagita Kusparmanto', 'Banyumas', '2000-07-10', 'Laki-laki', 1, 19, 1, 1, 2, '1571650979_pasim.jpg', '00', NULL, NULL),
(131, '0204181035', 6, 31, 24, 'Tarisa Sri Rizki', 'Tasikmalaya', '2000-04-04', 'Perempuan', 6, 13, 1, 1, 2, '1571652126_pasim.jpg', '000', NULL, NULL),
(132, '0204181034', 6, 31, 17, 'Suratri', 'Banjarnegara', '2001-04-06', 'Perempuan', 1, 15, 1, 1, 2, '1571652608_pasim.jpg', '0000', NULL, NULL),
(133, '0102181023', 6, 12, 21, 'Sri Putri Andriani', 'Pekanbaru', '2000-07-03', 'Perempuan', 5, 20, 2, 1, 2, '1571652789_pasim.jpg', '000', NULL, NULL),
(134, '0204181033', 6, 31, 5, 'Rian Hidayat', 'Bandung', '1999-09-20', 'Laki-laki', 1, 15, 1, 1, 2, '1571652876_pasim.jpg', '000', NULL, NULL),
(135, '0203181044', 6, 6, 5, 'Randi Firmansyah', 'Bandung', '2000-06-04', 'Laki-laki', 1, 10, 3, 1, 2, '1571653035_pasim.jpg', '0000', NULL, NULL),
(136, '0204181030', 6, 31, 10, 'Ragil Hadiworo', 'Cianjur', '1999-07-20', 'Laki-laki', 1, 15, 1, 1, 2, '1571653133_pasim.jpg', '000', NULL, NULL),
(137, '0204181031', 6, 22, 25, 'Raihan Rizqi Fauzan', 'Ciamis', '2001-01-17', 'Laki-laki', 9, 20, 1, 1, 2, '1571653266_pasim.jpg', '000', NULL, NULL),
(138, '0204181027', 6, 28, 12, 'Muhridho Aldyansyah', 'Sukoharjo', '2000-04-20', 'Laki-laki', 1, 19, 1, 1, 1, '1571657278_pasim.jpg', '0', NULL, NULL),
(139, '0204181026', 6, 31, 18, 'Muhammad Resha Ansori', 'Garut', '1999-03-10', 'Laki-laki', 1, 9, 1, 1, 2, '1571657431_pasim.jpg', '0', NULL, NULL),
(140, '0204181024', 6, 5, 5, 'Muhamad Iqbal', 'Bandung', '1999-12-07', 'Laki-laki', 1, 19, 1, 1, 2, '1571657532_pasim.jpg', '0', NULL, NULL),
(141, '0204181022', 6, 31, 6, 'Muhammad Fahmi Rosyadi', 'Kab.Semarang', '1999-06-26', 'Laki-laki', 1, 13, 1, 1, 2, '1571657637_pasim.jpg', '0', NULL, NULL),
(142, '-', 13, 22, 25, 'Nadia Fitri', 'Banjar', '1994-04-24', 'Perempuan', 1, 20, 1, 1, 2, '1571664867_pasim.jpg', '0', NULL, NULL),
(144, '-', 17, 1, 4, 'Siti Kulsum', 'Garut', '2019-10-01', 'Perempuan', 1, 13, 1, 1, 2, '1571726922_pasim.jpg', '000000000', NULL, NULL),
(145, '-', 17, 5, 5, 'Monica Aswanti', 'Bandung', '2019-10-01', 'Perempuan', 1, 15, 1, 1, 2, '1571727102_pasim.jpg', '000000000', NULL, NULL),
(146, '-', 17, 46, 4, 'Linda Hindasah', 'Garut', '2019-10-01', 'Perempuan', 3, 2, 1, 1, 2, '1571727183_pasim.jpg', '000000000', NULL, NULL),
(147, '-', 17, 46, 10, 'Nursyifa Al Adawiyah', 'Cianjur', '2019-10-01', 'Perempuan', 4, 5, 1, 1, 2, '1571727279_pasim.jpg', '000000000', NULL, NULL),
(148, '-', 17, 46, 16, 'Wawan Setiawan', 'Sumedang', '2019-10-01', 'Laki-laki', 1, 7, 1, 1, 2, '1571727381_pasim.jpg', '000000000', NULL, NULL),
(149, '-', 17, 46, 4, 'Irpan Abdul Rohman', 'Garut', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571727497_pasim.jpg', '000000000', NULL, NULL),
(150, '-', 17, 46, 4, 'Firman Saepudin', 'Garut', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571727581_pasim.jpg', '000000000', NULL, NULL),
(153, '-', 17, 19, 8, 'Istiana', 'Cirebon', '2019-10-01', 'Perempuan', 1, 16, 1, 1, 2, '1571727702_pasim.jpg', '000000000', NULL, NULL),
(154, '-', 17, 20, 2, 'Galuh Pangestrika', 'Banyumas', '2019-10-01', 'Perempuan', 1, 15, 1, 1, 2, '1571727780_pasim.jpg', '000000000', NULL, NULL),
(155, '-', 17, 8, 16, 'Uu Syamsudin', 'Sumedang', '2019-10-01', 'Laki-laki', 1, 14, 1, 1, 2, '1571727853_pasim.jpg', '000000000', NULL, NULL),
(156, '-', 17, 20, 2, 'Khoerul Fatih', 'Banyumas', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571727925_pasim.jpg', '000000000', NULL, NULL),
(157, '-', 17, 23, 4, 'Gian Nugraha', 'Garut', '2019-10-01', 'Laki-laki', 1, 18, 1, 1, 2, '1571728040_pasim.jpg', '000000000', NULL, NULL),
(158, '-', 17, 46, 18, 'Yunus Muslim', 'Garut', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571728123_pasim.jpg', '000000000', NULL, NULL),
(159, '-', 17, 22, 25, 'Faisal Siswanto', 'Banjar', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571728206_pasim.jpg', '000000000', NULL, NULL),
(160, '-', 17, 46, 24, 'Fahmi Arsyad', 'Tasikmalaya', '2019-10-01', 'Laki-laki', 1, 8, 1, 1, 2, '1571728280_pasim.jpg', '000000000', NULL, NULL),
(161, '-', 17, 8, 5, 'Zidan Sudrajat', 'Bandung', '2019-10-01', 'Laki-laki', 1, 3, 1, 1, 2, '1571728349_pasim.jpg', '000000000', NULL, NULL),
(162, '-', 17, 23, 3, 'Muhammad Ainur Rofiq', 'Subang', '2019-10-01', 'Laki-laki', 1, 11, 1, 1, 2, '1571728496_pasim.jpg', '000000000', NULL, NULL),
(163, '-', 17, 23, 14, 'Muhammad Sahal Nasrullah', 'Bogor', '2019-10-01', 'Laki-laki', 1, 17, 1, 1, 2, '1571728575_pasim.jpg', '000000000', NULL, NULL),
(164, '-', 17, 22, 6, 'Tika Milasari', 'Salatiga', '2019-10-01', 'Perempuan', 1, 20, 1, 1, 2, '1571728643_pasim.jpg', '000000000', NULL, NULL),
(165, '-', 17, 5, 5, 'Anisa Pebriani', 'Bandung', '2019-10-01', 'Perempuan', 1, 6, 1, 1, 2, '1571728722_pasim.jpg', '000000000', NULL, NULL),
(166, '-', 17, 22, 14, 'Fauzan', 'Bogor', '2019-10-01', 'Laki-laki', 1, 10, 1, 1, 2, '1571728794_pasim.jpg', '000000000', NULL, NULL),
(167, '-', 17, 5, 5, 'Adi Maulana Amin', 'Bandung', '2019-10-01', 'Laki-laki', 1, 15, 1, 1, 2, '1571729053_pasim.jpg', '000000000', NULL, NULL),
(168, '-', 17, 20, 4, 'Firman Setiawan', 'Garut', '2019-10-01', 'Laki-laki', 1, 9, 1, 1, 2, '1571729415_pasim.jpg', '000000000', NULL, NULL),
(169, '-', 17, 22, 2, 'Stevanny Setianingtyas', 'Banyumas', '2019-10-01', 'Perempuan', 1, 16, 1, 1, 2, '1571729489_pasim.jpg', '000000000', NULL, NULL),
(170, '-', 17, 19, 1, 'Dede Hilman', 'Cianjur', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571729568_pasim.jpg', '000000000', NULL, NULL),
(171, '-', 17, 20, 25, 'Ade Sukma', 'Banjar', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571729660_pasim.jpg', '000000000', NULL, NULL),
(172, '-', 17, 5, 5, 'Leni Nurliani', 'Bandung', '2019-10-01', 'Perempuan', 1, 18, 1, 1, 2, '1571729723_pasim.jpg', '000000000', NULL, NULL),
(173, '-', 17, 19, 4, 'Gustian Nur Hidayat', 'Garut', '2019-10-01', 'Laki-laki', 1, 19, 1, 1, 2, '1571729794_pasim.jpg', '000000000', NULL, NULL),
(174, '-', 17, 23, 24, 'Topan Gunantara', 'Tasikmalaya', '2019-10-01', 'Laki-laki', 2, 20, 1, 1, 2, '1571729884_pasim.jpg', '000000000', NULL, NULL),
(175, '-', 17, 16, 9, 'Resi Meliyanti', 'Ciamis', '2019-10-01', 'Perempuan', 1, 13, 1, 1, 2, '1571729977_pasim.jpg', '000000000', NULL, NULL),
(176, '-', 17, 15, 4, 'Leni Nur Asyifa', 'Garut', '2019-10-01', 'Perempuan', 1, 14, 1, 1, 2, '1571730053_pasim.jpg', '000000000', NULL, NULL),
(177, '-', 17, 22, 25, 'Nispi Abdul Azis', 'Banjar', '2019-10-01', 'Laki-laki', 1, 4, 1, 1, 2, '1571730278_pasim.jpg', '000000000', NULL, NULL),
(178, '-', 17, 23, 14, 'Siti Khomairoh', 'Bogor', '2019-10-01', 'Perempuan', 1, 17, 1, 1, 2, '1571730344_pasim.jpg', '000000000', NULL, NULL),
(179, '-', 17, 13, 14, 'Suaibah Aslamiah', 'Bogor', '2019-10-01', 'Perempuan', 1, 14, 1, 1, 2, '1571730414_pasim.jpg', '000000000', NULL, NULL),
(181, '-', 17, 19, 12, 'Roihatul Jannah', 'Indramayu', '2019-10-01', 'Perempuan', 1, 13, 1, 1, 2, '1571732061_pasim.jpg', '000000000', NULL, NULL),
(182, '-', 17, 22, 2, 'Winda Bestari Dewi Fortun', 'Banyumas', '2019-10-01', 'Perempuan', 1, 17, 1, 1, 2, '1571732161_pasim.jpg', '000000000', NULL, NULL),
(183, '-', 17, 22, 25, 'Yusup Supriatna', 'Banjar', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571732299_pasim.jpg', '000000000', NULL, NULL),
(184, '-', 17, 16, 10, 'Cahyadi Maulana', 'Cianjur', '2019-10-01', 'Laki-laki', 1, 19, 1, 1, 2, '1571732412_pasim.jpg', '000000000', NULL, NULL),
(185, '-', 17, 13, 7, 'Fauzi Alamsyah', 'Bandung', '2019-10-01', 'Laki-laki', 1, 13, 1, 1, 2, '1571732634_pasim.jpg', '000000000', NULL, NULL),
(186, '-', 17, 26, 15, 'Fitri Sania', 'Purwakarta', '2019-10-01', 'Perempuan', 1, 18, 1, 1, 2, '1571732715_pasim.jpg', '000000000', NULL, NULL),
(187, '-', 17, 22, 16, 'Iis Kartika', 'Sumedang', '2019-10-01', 'Perempuan', 1, 15, 1, 1, 2, '1571732858_pasim.jpg', '000000000', NULL, NULL),
(188, '-', 17, 20, 19, 'Muhammad Saefulloh', 'Cilacap', '2019-10-01', 'Laki-laki', 1, 12, 1, 1, 2, '1571732966_pasim.jpg', '0000000000', NULL, NULL),
(189, '-', 17, 19, 19, 'Anisa Luthfi Febrianti', 'Cilacap', '2019-10-01', 'Perempuan', 1, 16, 1, 1, 2, '1571733180_pasim.jpg', '000000000', NULL, NULL),
(190, '-', 17, 22, 10, 'Sahdan Hidayatul', 'Cianjur', '2019-10-01', 'Laki-laki', 1, 13, 1, 1, 2, '1571733259_pasim.jpg', '000000000', NULL, NULL),
(191, '-', 17, 3, 3, 'Roudhatul Nandilia', 'Boyolali', '2019-10-01', 'Perempuan', 1, 20, 1, 1, 2, '1571733453_pasim.jpg', '000000000', NULL, NULL),
(192, '-', 17, 23, 3, 'Muhammad Zada Widiyanto', 'Boyolali', '2019-10-01', 'Laki-laki', 1, 13, 1, 1, 2, '1571733674_pasim.jpg', '00000000', NULL, NULL),
(193, '-', 17, 19, 1, 'Erik Sutiawan', 'Cianjur', '2019-10-01', 'Laki-laki', 1, 13, 1, 1, 2, '1571733738_pasim.jpg', '000000000', NULL, NULL),
(194, '-', 17, 9, 6, 'Haqimatul Izza', 'Salatiga', '2019-10-01', 'Perempuan', 1, 19, 1, 1, 2, '1571733891_pasim.jpg', '000000000', NULL, NULL),
(195, '-', 17, 17, 10, 'Andi Iskandar Abdullah', 'Cianjur', '2019-10-01', 'Laki-laki', 1, 1, 1, 1, 2, '1571733944_pasim.jpg', '000000000', NULL, NULL),
(196, '-', 17, 22, 25, 'suma Albaroh', 'Banjar', '2019-10-01', 'Laki-laki', 1, 20, 1, 1, 2, '1571734142_pasim.jpg', '000000000', NULL, NULL),
(198, '-', 16, 77, 24, 'Jejen Zaenal Mutaqin', 'Tasikmalaya', '2019-10-01', 'Laki-laki', 2, 20, 1, 2, 2, '1571734300_pasim.jpg', '000000000', NULL, NULL),
(199, '-', 16, 78, 4, 'Sandi Saputra', 'Garut', '2019-10-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571734421_pasim.jpg', '000000000', NULL, NULL),
(200, '-', 16, 79, 27, 'Lisa Nur Fibriani', 'Tangerang', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571738538_pasim.jpg', '000000000', NULL, NULL),
(201, '-', 16, 80, 5, 'Ikhtiar Nur Aini', 'Bandung', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571738903_pasim.jpg', '000000000', NULL, NULL),
(202, '-', 16, 78, 4, 'Ipin Sopian', 'Garut', '2019-10-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571739036_pasim.jpg', '000000000', NULL, NULL),
(203, '-', 16, 58, 14, 'Halah Helmia Wahclah', 'Bogor', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571739459_pasim.jpg', '000000000', NULL, NULL),
(204, '-', 16, 3, 3, 'Ulil Hidayah', 'Boyolali', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571739532_pasim.jpg', '000000000', NULL, NULL),
(205, '-', 16, 99, 23, 'Natia Ayu utari', 'Ciamis', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571739702_pasim.jpg', '000000000', NULL, NULL),
(206, '-', 16, 63, 1, 'Nurjanah', 'Cianjur', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571739804_pasim.jpg', '000000000', NULL, NULL),
(207, '-', 16, 81, 16, 'Frida Nur Hidayati', 'Sumedang', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571740144_pasim.jpg', '000000000', NULL, NULL),
(208, '-', 16, 82, 29, 'Aldy Ardian', 'Cimahi', '2019-10-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571740485_pasim.jpg', '000000000', NULL, NULL),
(209, '-', 16, 83, 29, 'Amar Abdurrahman', 'Cimahi', '2019-10-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571740556_pasim.jpg', '000000000', NULL, NULL),
(210, '-', 16, 124, 30, 'Muhammad Rafiq', 'Sukabumi', '2019-10-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571740677_pasim.jpg', '000000000', NULL, NULL),
(211, '-', 16, 124, 30, 'Mia Siti Ahadiati', 'Sukabumi', '2019-10-01', 'Perempuan', 1, 20, 1, 1, 2, '1571740802_pasim.jpg', '000000000', NULL, NULL),
(212, '-', 16, 124, 30, 'Nisa Aprilia', 'Sukabumi', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571740909_pasim.jpg', '000000000', NULL, NULL),
(213, '-', 16, 124, 30, 'Dea Mas Victory', 'Sukabumi', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571741098_pasim.jpg', '000000000', NULL, NULL),
(214, '-', 16, 124, 30, 'Firmansyah', 'Sukabumi', '0001-01-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571741166_pasim.jpg', '000000000', NULL, NULL),
(216, '-', 16, 31, 30, 'Ilham Pamungkas', 'Sukabumi', '2019-10-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571743533_pasim.jpg', '000000000', NULL, NULL),
(217, '-', 16, 84, 2, 'Yunita Niken Safitri', 'Banyumas', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571743746_pasim.jpg', '000000000', NULL, NULL),
(219, '-', 16, 77, 24, 'Ridho Muslim Hidayat', 'Tasikmalaya', '2019-10-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571743903_pasim.jpg', '000000000', NULL, NULL),
(220, '-', 16, 5, 5, 'Yusup Abdul Qohar', 'Bandung', '2019-10-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571744002_pasim.jpg', '000000000', NULL, NULL),
(221, '-', 16, 124, 30, 'Wiwin Winarti', 'Sukabumi', '2019-10-01', 'Perempuan', 1, 20, 1, 2, 2, '1571744084_pasim.jpg', '000000000', NULL, NULL),
(222, '-', 16, 31, 2, 'Sofia Hidayatun', 'Banyumas', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571744207_pasim.jpg', '000000000', NULL, NULL),
(223, '-', 16, 85, 6, 'Ikbal Yulianto', 'Salatiga', '0001-01-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571744276_pasim.jpg', '000000000', NULL, NULL),
(224, '-', 16, 86, 14, 'Anita Yulia Sari', 'Bogor', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571744386_pasim.jpg', '000000000', NULL, NULL),
(225, '-', 16, 87, 4, 'Sumirah', 'Garut', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571744489_pasim.jpg', '000000000', NULL, NULL),
(227, '-', 16, 88, 16, 'Riska Rostiani', 'Sumedang', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571744664_pasim.jpg', '000000000', NULL, NULL),
(228, '-', 16, 89, 25, 'Dasiah', 'Ciamis', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571744749_pasim.jpg', '000000000', NULL, NULL),
(229, '-', 16, 90, 8, 'Nur Ikhsan', 'Cirebon', '0001-01-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571744932_pasim.jpg', '000000000', NULL, NULL),
(230, '-', 16, 22, 9, 'Cucu Yuni Yulianti', 'Ciamis', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571745103_pasim.jpg', '000000000', NULL, NULL),
(231, '-', 16, 61, 4, 'Teguh Prabowo', 'Garut', '0001-01-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571745299_pasim.jpg', '000000000', NULL, NULL),
(232, NULL, 16, 28, 12, 'Nopan Rahmadi', '-', '0001-01-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571754276_pasim.jpg', '00', NULL, NULL),
(233, '-', 16, 16, 9, 'Sri Sugiartini', 'Ciamis', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571755230_pasim.jpg', '00', NULL, NULL),
(234, '-', 16, 91, 17, 'Tegar Budi Septian', '-', '0001-01-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571755982_pasim.jpg', '00', NULL, NULL),
(235, '-', 16, 77, 24, 'Riyan Turmudi', '-', '0001-01-01', 'Laki-laki', 1, 20, 1, 2, 2, '1571756125_pasim.jpg', '0', NULL, NULL),
(236, '-', 16, 63, 1, 'Ilfa Sri Desy', '-', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571756283_pasim.jpg', '00', NULL, NULL),
(237, '-', 16, 31, 8, 'Dyah Nuraeni', '-', '0001-01-01', 'Perempuan', 1, 20, 1, 1, 2, '1571756504_pasim.jpg', '0', NULL, NULL),
(238, '-', 16, 22, 25, 'Resti Siska Devi', '-', '0001-01-01', 'Perempuan', 1, 20, 1, 2, 2, '1571756609_pasim.jpg', '0', NULL, NULL),
(239, '-', 14, 31, 6, 'Sri Fathonah', 'Semarang', '1995-06-23', 'Perempuan', 1, 20, 1, 2, 2, '1571757476_pasim.jpg', '0', NULL, NULL),
(240, '-', 14, 31, 6, 'Muhlisin', 'Semarang', '1995-08-28', 'Laki-laki', 1, 20, 1, 2, 1, '1571787397_pasim.jpg', '0', NULL, NULL),
(241, '-', 14, 31, 8, 'Moh Wildan Kosasih', 'Cirebon', '1995-02-02', 'Laki-laki', 1, 20, 1, 2, 2, '1571787570_pasim.jpg', '0', NULL, NULL),
(242, '-', 14, 31, 8, 'Anis Marsela', 'Cirebon', '1993-02-27', 'Perempuan', 1, 20, 1, 2, 2, '1571788951_pasim.jpg', '00', NULL, NULL),
(243, '-', 14, 7, 28, 'Dede Nuraeni', 'Ciamis', '1995-01-06', 'Perempuan', 1, 20, 1, 2, 2, '1571790043_pasim.jpg', '0', NULL, NULL),
(244, '-', 14, 31, 10, 'Fahri Rahman Safari', 'Cianjur', '1995-06-08', 'Laki-laki', 1, 20, 1, 2, 2, '1571790156_pasim.jpg', NULL, NULL, NULL),
(245, '-', 14, 31, 2, 'Agustria Wantiningtyas', 'Banyumas', '1994-08-09', 'Perempuan', 1, 20, 1, 2, 2, '1571790338_pasim.jpg', NULL, NULL, NULL),
(246, '-', 14, 31, 3, 'Sri Ambarwati', 'Boyolali', '1994-03-21', 'Perempuan', 1, 20, 1, 2, 2, '1571793039_pasim.jpg', NULL, NULL, NULL),
(247, '-', 14, 125, 12, 'Maskoni', 'Indramayu', '1994-05-21', 'Laki-laki', 1, 20, 1, 2, 1, '1571793238_pasim.jpg', NULL, NULL, NULL),
(248, '-', 14, 31, 3, 'Adi Suryaningsih', 'Karanganyar', '1994-06-19', 'Laki-laki', 1, 20, 1, 2, 2, '1571793682_pasim.jpg', NULL, NULL, NULL),
(249, '-', 14, 89, 25, 'Murtafiah', 'Banjar', '1995-02-20', 'Perempuan', 1, 20, 1, 2, 2, '1571794030_pasim.jpg', NULL, NULL, NULL),
(250, '-', 14, 31, 12, 'Khariri', 'Indramayu', '1995-03-26', 'Laki-laki', 1, 20, 1, 2, 2, '1571794152_pasim.jpg', NULL, NULL, NULL),
(251, '-', 14, 31, 6, 'M Windy Sulistiyo', 'Semarang', '1995-10-18', 'Laki-laki', 1, 20, 1, 2, 2, '1571794278_pasim.jpg', NULL, NULL, NULL),
(252, '-', 14, 22, 25, 'Elia Risnawati', 'Ciamis', '1994-11-16', 'Perempuan', 1, 20, 1, 2, 2, '1571794398_pasim.jpg', NULL, NULL, NULL),
(253, '-', 14, 126, 4, 'Leni Suryaningsih', 'Garut', '1995-07-29', 'Perempuan', 1, 20, 1, 2, 2, '1571794701_pasim.jpg', NULL, NULL, NULL),
(255, '-', 14, 31, 32, 'M Nuridin', 'Tegal', '1993-09-06', 'Laki-laki', 1, 20, 1, 2, 2, '1571795457_pasim.jpg', NULL, NULL, NULL),
(256, '-', 14, 31, 12, 'Ambia Fathulillah', 'Indramayu', '1995-05-19', 'Perempuan', 1, 20, 1, 2, 2, '1571795567_pasim.jpg', NULL, NULL, NULL),
(257, '-', 14, 31, 33, 'Muhajjir Ila Robbih', 'Indramayu, 25 07 1995', '1995-07-25', 'Laki-laki', 1, 20, 1, 2, 2, '1571795880_pasim.jpg', NULL, NULL, NULL),
(258, '-', 14, 77, 24, 'Bayu Nugraha', 'Tasikmalaya', '1995-12-25', 'Laki-laki', 1, 20, 1, 2, 2, '1571796069_pasim.jpg', NULL, NULL, NULL),
(259, '-', 14, 31, 8, 'Septian Harjo Maulana', 'Cirebon, 02 09 1994', '1994-09-02', 'Laki-laki', 1, 20, 1, 2, 2, '1571796174_pasim.jpg', NULL, NULL, NULL),
(260, '-', 14, 31, 10, 'Hesti Lisnawati', 'Cianjur', '1994-04-21', 'Perempuan', 1, 20, 1, 2, 2, '1571796277_pasim.jpg', NULL, NULL, NULL),
(261, '-', 14, 77, 24, 'Rudi Risnadi', 'Tasikmalaya', '1995-10-22', 'Laki-laki', 1, 20, 1, 2, 2, '1571796422_pasim.jpg', NULL, NULL, NULL),
(262, '-', 14, 31, 3, 'Upik Novitasri', 'Boyolali', '1994-11-21', 'Perempuan', 1, 20, 1, 2, 1, '1571809665_pasim.jpg', NULL, NULL, NULL),
(263, '-', 14, 111, 4, 'Yoga Anggara Daswara', 'Garut', '1994-12-15', 'Laki-laki', 1, 20, 1, 2, 2, '1571809925_pasim.jpg', NULL, NULL, NULL),
(264, '-', 14, 31, 1, 'Lutfi Amar', 'Cianjur', '1994-09-10', 'Laki-laki', 1, 20, 1, 2, 2, '1571810161_pasim.jpg', NULL, NULL, NULL),
(265, '-', 14, 31, 5, 'Abdul Aziz', 'Bandung', '1995-01-18', 'Laki-laki', 1, 20, 1, 2, 2, '1571814770_pasim.jpg', NULL, NULL, NULL),
(266, '-', 14, 22, 25, 'Rinda Aryani', 'Ciamis', '1994-10-10', 'Perempuan', 1, 20, 1, 2, 2, '1571814983_pasim.jpg', NULL, NULL, NULL),
(267, '-', 14, 31, 16, 'Ipan Ardiansyah', 'Sumedang', '1995-09-23', 'Laki-laki', 1, 20, 1, 2, 2, '1571815159_pasim.jpg', NULL, NULL, NULL),
(268, '-', 14, 31, 10, 'Andre Andria Imam', 'Cianjur', '1995-06-20', 'Laki-laki', 1, 20, 1, 2, 2, '1571815304_pasim.jpg', NULL, NULL, NULL),
(269, '-', 14, 31, 32, 'Anggy Firmansyah', 'Jakarta', '1995-05-05', 'Laki-laki', 1, 20, 1, 2, 2, '1571815756_pasim.jpg', NULL, NULL, NULL),
(270, '-', 14, 131, 35, 'Yopi Saputra', 'Kp.Panas', '1993-10-19', 'Laki-laki', 1, 20, 1, 2, 2, '1571816165_pasim.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_orgppmb`
--

CREATE TABLE `tb_orgppmb` (
  `id_orgppmb` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_orgppmb`
--

INSERT INTO `tb_orgppmb` (`id_orgppmb`, `jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tidak Ada', NULL, NULL, NULL),
(2, 'KETUA PPMB', NULL, NULL, NULL),
(3, 'SEKRETARIS PPMB', NULL, NULL, NULL),
(4, 'BENDAHARA PPMB', NULL, NULL, NULL),
(5, 'HUMAS', NULL, NULL, NULL),
(6, 'LOGISTIK', NULL, NULL, NULL),
(7, 'ACARA', NULL, NULL, NULL),
(8, 'KONSUMSI', NULL, NULL, NULL),
(9, 'DOKUMENTASI', NULL, NULL, NULL),
(10, 'KESEKRETARIATAN', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_orgpub`
--

CREATE TABLE `tb_orgpub` (
  `id_orgpub` int(10) UNSIGNED NOT NULL,
  `jabatan_pub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_orgpub`
--

INSERT INTO `tb_orgpub` (`id_orgpub`, `jabatan_pub`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'KETUA PUB', NULL, NULL, NULL),
(2, 'SEKRETARIS PUB', NULL, NULL, NULL),
(3, 'KEAMAN PUB', NULL, NULL, NULL),
(4, 'KOOR DIV PENDIDIKAN', NULL, NULL, NULL),
(5, 'BENDAHARA INTERNAL', NULL, NULL, NULL),
(6, 'BENDAHARA EKSTERNAL', NULL, NULL, NULL),
(7, 'KOOR DIV KEROHANIAN', NULL, NULL, NULL),
(8, 'KOOR DIV KEASRAMAAN', NULL, NULL, NULL),
(9, 'KOOR DIV KESEJAHTERAAN', NULL, NULL, NULL),
(10, 'KOOR DIV KESEHATAN', NULL, NULL, NULL),
(11, 'KOOR DIV MAGANG', NULL, NULL, NULL),
(12, 'KOOR DIV KEBERSIHAN', NULL, NULL, NULL),
(13, 'ANGGOTA DIV PENDIDIKAN', NULL, NULL, NULL),
(14, 'ANGGOTA DIV KEROHANIAN', NULL, NULL, NULL),
(15, 'ANGGOTA DIV KEASRAMAAN', NULL, NULL, NULL),
(16, 'ANGGOTA DIV KESEJAHTERAAN', NULL, NULL, NULL),
(17, 'ANGGOTA DIV KESEHATAN', NULL, NULL, NULL),
(18, 'ANGGOTA DIV MAGANG', NULL, NULL, NULL),
(19, 'ANGGOTA DIV KEBERSIHAN', NULL, NULL, NULL),
(20, 'TIDAK ADA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelatihan`
--

CREATE TABLE `tb_pelatihan` (
  `id_pelatihan` int(10) UNSIGNED NOT NULL,
  `pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pelatihan`
--

INSERT INTO `tb_pelatihan` (`id_pelatihan`, `pelatihan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'JAVA', NULL, NULL, NULL),
(2, 'Logika Dan Algoritma', NULL, NULL, NULL),
(3, 'Logika Dan Algoritma', NULL, NULL, NULL),
(4, 'Struktur Data', NULL, NULL, NULL),
(5, 'Logika Dan Algoritma', NULL, NULL, NULL),
(6, 'Basis Data', NULL, NULL, NULL),
(7, 'HTML', NULL, NULL, NULL),
(8, 'PHP Fundamental', NULL, NULL, NULL),
(9, 'VB.NET Fundamental', NULL, NULL, NULL),
(10, 'Java Fundamental', NULL, NULL, NULL),
(11, 'PHP Lanjutan', NULL, NULL, NULL),
(12, 'VB.NET Lanjutan', NULL, NULL, NULL),
(13, 'Bahasa Inggris', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(10) UNSIGNED NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman`
--

CREATE TABLE `tb_pengalaman` (
  `id_pengalaman` int(10) UNSIGNED NOT NULL,
  `pengalaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_periode`
--

CREATE TABLE `tb_periode` (
  `id_periode` int(10) UNSIGNED NOT NULL,
  `periode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_periode`
--

INSERT INTO `tb_periode` (`id_periode`, `periode`, `created_at`, `updated_at`) VALUES
(1, '2018-2019', NULL, NULL),
(2, '2019-2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppmb_dok`
--

CREATE TABLE `tb_ppmb_dok` (
  `id_ppmbdok` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_angkatan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_psikotest`
--

CREATE TABLE `tb_psikotest` (
  `id_psi` int(11) NOT NULL,
  `nama_peserta` varchar(250) NOT NULL,
  `jk` char(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `asal_daerah` varchar(50) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `jenis` char(20) NOT NULL,
  `id_tahun2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_psikotest`
--

INSERT INTO `tb_psikotest` (`id_psi`, `nama_peserta`, `jk`, `jurusan`, `asal_sekolah`, `asal_daerah`, `no_hp`, `jenis`, `id_tahun2`) VALUES
(1, 'jj', 'Laki - Laki', 'S1 Teknik Informatika', 'jhd', 'gg', '0898', 'LULUS', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pubdok`
--

CREATE TABLE `tb_pubdok` (
  `id_pubdok` int(11) NOT NULL,
  `tema` varchar(200) DEFAULT NULL,
  `keterangan` varchar(2000) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pubdok`
--

INSERT INTO `tb_pubdok` (`id_pubdok`, `tema`, `keterangan`, `file`) VALUES
(6, 'Pemilihan PUB', 'Lomba Makan kerupuk pada tanggal 17 agustus 2019', '1571184028_IMG_20190817_101723-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(10) UNSIGNED NOT NULL,
  `sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `sekolah`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MA Al-Holilliyah Cidaun', NULL, NULL, NULL),
(3, 'MAN 1 Boyolali', NULL, '2019-10-14 02:52:55', '2019-10-14 02:52:55'),
(4, 'MA Izzharul Haq', NULL, '2019-10-14 03:00:05', '2019-10-14 03:00:05'),
(5, 'SMAN 1 Cililin', NULL, '2019-10-18 22:05:20', '2019-10-18 22:05:20'),
(6, 'MAN 1 Bandung Barat', NULL, '2019-10-18 22:05:35', '2019-10-18 22:05:35'),
(7, 'SMAN 2 Banjarsari', NULL, '2019-10-18 22:06:01', '2019-10-20 19:38:39'),
(8, 'SMAN 1 Batujajar', NULL, '2019-10-18 22:06:11', '2019-10-18 22:06:11'),
(9, 'MAN Salatiga', NULL, '2019-10-18 22:06:33', '2019-10-20 08:15:08'),
(10, 'SMK Perbankan Riau', NULL, '2019-10-18 22:14:37', '2019-10-18 22:14:37'),
(11, 'SMAN 3 Sibolga', NULL, '2019-10-18 22:14:53', '2019-10-18 22:14:53'),
(12, 'SMK Keuangan Pekanbaru', NULL, '2019-10-18 22:15:13', '2019-10-18 22:15:13'),
(13, 'SMAN 10 Pekanbaru', NULL, '2019-10-18 22:15:27', '2019-10-18 22:15:27'),
(14, 'SMKN 1 Pekanbaru', NULL, '2019-10-18 22:15:45', '2019-10-18 22:15:45'),
(15, 'SMAN 1 Baregbeg', NULL, '2019-10-18 22:16:43', '2019-10-18 22:16:43'),
(16, 'SMAN 1 Kawali', NULL, '2019-10-18 22:16:58', '2019-10-18 22:16:58'),
(17, 'SMKN 1 Kawali', NULL, '2019-10-18 22:17:33', '2019-10-18 22:17:33'),
(18, 'SMKN 1 Sibolga', NULL, '2019-10-18 22:18:14', '2019-10-18 22:18:14'),
(19, 'SMAN 1 Susukan', NULL, '2019-10-18 22:21:35', '2019-10-18 22:21:35'),
(20, 'SMKN 1 Cijulang', NULL, '2019-10-18 22:23:28', '2019-10-18 22:23:28'),
(21, 'MAN 2 Model Padang Sidimpuan', NULL, '2019-10-20 08:21:34', '2019-10-20 08:21:34'),
(22, 'SMKN 1 Banjar', NULL, '2019-10-20 08:21:44', '2019-10-20 08:21:44'),
(23, 'SMAN 1 Batang Angkola', NULL, '2019-10-20 08:24:28', '2019-10-20 08:24:28'),
(24, 'SMK 1 Sipirok', NULL, '2019-10-20 08:24:42', '2019-10-20 08:24:42'),
(25, 'SMK Diponegoro Salatiga', NULL, '2019-10-20 08:36:05', '2019-10-20 08:36:05'),
(26, 'SMAN 1 Pasawahan', NULL, '2019-10-20 09:07:17', '2019-10-20 09:07:17'),
(27, 'MA YUPPI Soreang', NULL, '2019-10-20 09:07:36', '2019-10-20 09:07:36'),
(28, 'SMK PGRI Jatibarang', NULL, '2019-10-20 09:58:41', '2019-10-20 10:01:32'),
(29, 'SMKN 1 Ciamis', NULL, '2019-10-20 10:15:11', '2019-10-20 10:15:11'),
(30, 'SMAN 1  Karanggede', NULL, '2019-10-20 10:34:28', '2019-10-20 10:34:28'),
(31, 'Isi Sekolah', NULL, '2019-10-20 18:49:39', '2019-10-20 18:49:39'),
(32, 'SMK An-Najiyah', NULL, '2019-10-20 19:38:01', '2019-10-20 19:38:01'),
(33, 'SMK Al-Husna', NULL, '2019-10-20 19:38:28', '2019-10-20 19:38:28'),
(34, 'SMAN 8 Tasikmalaya', NULL, '2019-10-21 06:45:52', '2019-10-21 06:45:52'),
(35, 'SMKN 5 Surakarta', NULL, '2019-10-21 06:46:32', '2019-10-21 06:46:32'),
(36, 'MAN 1 Teras', NULL, '2019-10-21 06:47:04', '2019-10-21 06:47:04'),
(37, 'SMKN 1 Bojongpicung', NULL, '2019-10-21 06:47:42', '2019-10-21 06:47:42'),
(38, 'MAN MAJALAYA', NULL, '2019-10-21 06:48:06', '2019-10-21 06:48:06'),
(39, 'SMK MUHAMMADIYAH SAMPANG', NULL, '2019-10-21 06:48:26', '2019-10-21 06:48:26'),
(40, 'SMKN 1 SUKABUMI', NULL, '2019-10-21 06:48:44', '2019-10-21 06:48:44'),
(41, 'SMAN 2 SUBANG', NULL, '2019-10-21 06:49:03', '2019-10-21 06:49:03'),
(42, 'SMAN 1 CILAKU', NULL, '2019-10-21 06:49:21', '2019-10-21 06:49:21'),
(43, 'SMAN 1 TERAS', NULL, '2019-10-21 06:50:01', '2019-10-21 06:50:01'),
(44, 'SMAP LEPPESA', NULL, '2019-10-21 06:50:29', '2019-10-21 06:50:29'),
(45, 'SMA YKB3 LELES', NULL, '2019-10-21 06:50:51', '2019-10-21 06:50:51'),
(46, 'MA DARUL FIKRI', NULL, '2019-10-21 06:51:12', '2019-10-21 06:51:12'),
(48, 'SMKN 1 Cidaun', NULL, '2019-10-22 01:55:15', '2019-10-22 01:55:15'),
(49, 'SMK 2 Surakarta', NULL, '2019-10-22 01:56:13', '2019-10-22 01:56:13'),
(50, 'SMK Nuris Afandiyah', NULL, '2019-10-22 01:56:46', '2019-10-22 01:56:46'),
(51, 'MA GUPPI Cimasuk', NULL, '2019-10-22 01:58:31', '2019-10-22 01:58:31'),
(52, 'MA La Tahzan', NULL, '2019-10-22 01:58:57', '2019-10-22 01:58:57'),
(53, 'SMK Muhammadiyah', NULL, '2019-10-22 01:59:37', '2019-10-22 01:59:37'),
(54, 'SMKN 2 Banjar', NULL, '2019-10-22 01:59:54', '2019-10-22 01:59:54'),
(55, 'SMAN 1 Sokaraja', NULL, '2019-10-22 02:00:10', '2019-10-22 02:00:10'),
(56, 'SMAN 1 Sliyeg', NULL, '2019-10-22 02:00:28', '2019-10-22 02:00:28'),
(57, 'SMK Alusi', NULL, '2019-10-22 02:00:50', '2019-10-22 02:00:50'),
(58, 'MA Muthmainah', NULL, '2019-10-22 02:01:05', '2019-10-22 02:01:05'),
(59, 'SMK Muhammadiyah Kadungora', NULL, '2019-10-22 02:01:34', '2019-10-22 02:01:34'),
(60, 'SMAN 1 Ciawi', NULL, '2019-10-22 02:01:57', '2019-10-22 02:01:57'),
(61, 'SMAN 19 Garut', NULL, '2019-10-22 02:02:13', '2019-10-22 02:02:13'),
(62, 'SMK Muhammadiyah Banjar', NULL, '2019-10-22 02:02:40', '2019-10-22 02:02:40'),
(63, 'SMAN 1 Sindangbarang', NULL, '2019-10-22 02:02:58', '2019-10-22 02:02:58'),
(64, 'SMAN 1 Purwareja', NULL, '2019-10-22 02:03:19', '2019-10-22 02:03:19'),
(65, 'SMK Pariwisata Citayam', NULL, '2019-10-22 02:03:45', '2019-10-22 02:03:45'),
(66, 'SMK Muhammadiyah Plus Salatiga', NULL, '2019-10-22 02:04:36', '2019-10-22 02:04:36'),
(67, 'SMK Mandiri', NULL, '2019-10-22 02:04:54', '2019-10-22 02:04:54'),
(68, 'MAN KIARA KUDA CIAWI', NULL, '2019-10-22 02:05:42', '2019-10-22 02:05:42'),
(69, 'MAN PAMEUNGPEUK', NULL, '2019-10-22 02:06:04', '2019-10-22 02:06:04'),
(70, 'SMK CILEDUG MUSADDADIYAH', NULL, '2019-10-22 02:06:27', '2019-10-22 02:06:27'),
(71, 'SMKN 1 KALIBOGOR', NULL, '2019-10-22 02:06:45', '2019-10-22 02:06:45'),
(72, 'SMK DALROBBY SUKASARI', NULL, '2019-10-22 02:07:05', '2019-10-22 02:07:05'),
(73, 'SMK INSAN MANDIRI', NULL, '2019-10-22 02:07:34', '2019-10-22 02:07:34'),
(74, 'SMAN CONGGEAN', NULL, '2019-10-22 02:07:58', '2019-10-22 02:07:58'),
(75, 'SMK ASY SYARIFIYAHA', NULL, '2019-10-22 02:08:20', '2019-10-22 02:08:20'),
(76, 'MA HIDAYATUL FAIZIEN', NULL, '2019-10-22 02:08:43', '2019-10-22 02:08:43'),
(77, 'SMKN RAJAPOLAH', NULL, '2019-10-22 02:09:09', '2019-10-22 02:09:09'),
(78, 'SMA AR RAHMAN KADUNGORA', NULL, '2019-10-22 02:09:31', '2019-10-22 02:09:31'),
(79, 'SMK AL IJTIHAD', NULL, '2019-10-22 02:09:47', '2019-10-22 02:09:47'),
(80, 'SMA MUSLIMIN CILILIN', NULL, '2019-10-22 02:10:16', '2019-10-22 02:10:16'),
(81, 'MAN 2 SUMEDANG', NULL, '2019-10-22 02:10:53', '2019-10-22 02:10:53'),
(82, 'SMK TI GARUDA NUSANTARA', NULL, '2019-10-22 02:11:23', '2019-10-22 02:11:23'),
(83, 'SMKN 2 CIMAHI', NULL, '2019-10-22 02:11:44', '2019-10-22 02:11:44'),
(84, 'SMK MA\'ARIF NU 1 KERURANJEN', NULL, '2019-10-22 02:13:02', '2019-10-22 02:13:02'),
(85, 'MA AL-ISLAM SUSUKAN', NULL, '2019-10-22 02:13:49', '2019-10-22 02:13:49'),
(86, 'SMK MUTIARA INSANI', NULL, '2019-10-22 02:14:05', '2019-10-22 02:14:05'),
(87, 'SMK INSAN PRIMA MANDIRI', NULL, '2019-10-22 02:14:32', '2019-10-22 02:14:32'),
(88, 'MAN SUMEDANG', NULL, '2019-10-22 02:14:53', '2019-10-22 02:14:53'),
(89, 'SMKN 3 BANJAR', NULL, '2019-10-22 02:15:07', '2019-10-22 02:15:07'),
(90, 'MAN CIREBON 1', NULL, '2019-10-22 02:15:20', '2019-10-22 02:15:20'),
(91, 'SMKN 2 BAWANG', NULL, '2019-10-22 02:16:00', '2019-10-22 02:16:00'),
(92, 'SMAN 1 BANJARANYAR', NULL, '2019-10-22 02:16:30', '2019-10-22 02:16:30'),
(93, 'SMKN 1 BAWANG', NULL, '2019-10-22 02:16:53', '2019-10-22 02:16:53'),
(94, 'SMAN 1 CIPONGKOR', NULL, '2019-10-22 02:17:07', '2019-10-22 02:17:07'),
(95, 'SMAN 1 CIANJUR', NULL, '2019-10-22 02:17:20', '2019-10-22 02:17:20'),
(96, 'SMK KEUANGAN PEKANBARU', NULL, '2019-10-22 02:17:45', '2019-10-22 02:17:45'),
(97, 'MAN 1 BANDUNG BARAT', NULL, '2019-10-22 02:17:59', '2019-10-22 02:17:59'),
(98, 'SMAS PLUS PERSIS PAMEUNGPEUK', NULL, '2019-10-22 02:18:50', '2019-10-22 02:18:50'),
(99, 'SMKN 1 CIJULANG', NULL, '2019-10-22 02:19:15', '2019-10-22 02:19:15'),
(100, 'MAN 2 GARUT', NULL, '2019-10-22 02:19:32', '2019-10-22 02:19:32'),
(101, 'MAN 2 PADANGSIDIMPUAN', NULL, '2019-10-22 02:20:06', '2019-10-22 02:20:06'),
(102, 'SMAN 10 PEKANBARU', NULL, '2019-10-22 02:20:22', '2019-10-22 02:20:22'),
(103, 'SMA PGRI CIRANJANG', NULL, '2019-10-22 02:20:48', '2019-10-22 02:20:48'),
(104, 'MA YPI NURUL HUDA', NULL, '2019-10-22 02:21:07', '2019-10-22 02:21:07'),
(105, 'MAN 3 GARUT', NULL, '2019-10-22 02:21:19', '2019-10-22 02:21:19'),
(106, 'SMAN 1 SAMPANG', NULL, '2019-10-22 02:21:44', '2019-10-22 02:21:44'),
(107, 'MAN 3 SIBOLGA', NULL, '2019-10-22 02:22:19', '2019-10-22 02:22:19'),
(108, 'SMKN CIHAMPELAS', NULL, '2019-10-22 02:22:34', '2019-10-22 02:22:34'),
(109, 'SMK PEKANBARU RIAU', NULL, '2019-10-22 02:23:19', '2019-10-22 02:23:19'),
(110, 'SMAN TOMO', NULL, '2019-10-22 02:28:10', '2019-10-22 02:28:10'),
(111, 'SMAN 2 GARUT', NULL, '2019-10-22 02:28:33', '2019-10-22 02:28:33'),
(112, 'SMAN 1 SINDANG', NULL, '2019-10-22 02:28:46', '2019-10-22 02:28:46'),
(113, 'SMK LUGINA RANCAEKEK', NULL, '2019-10-22 02:29:06', '2019-10-22 02:29:06'),
(114, 'SMA ISLAM DARUT TAUBAH', NULL, '2019-10-22 02:29:17', '2019-10-22 02:29:17'),
(115, 'SMKN 2 BANYUMAS', NULL, '2019-10-22 02:29:35', '2019-10-22 02:29:35'),
(116, 'SMAN 5 CIREBON', NULL, '2019-10-22 02:30:09', '2019-10-22 02:30:09'),
(117, 'SMAN 1 GUNUNGHALU', NULL, '2019-10-22 02:30:24', '2019-10-22 02:30:24'),
(118, 'SMA BUDI UTOMO JOMBANG', NULL, '2019-10-22 02:30:36', '2019-10-22 02:30:36'),
(119, 'SMAN 4 CIREBON', NULL, '2019-10-22 02:30:48', '2019-10-22 02:30:48'),
(120, 'MAN CILILIN', NULL, '2019-10-22 02:31:11', '2019-10-22 02:31:11'),
(121, 'SMK WIWOROTO PWT', NULL, '2019-10-22 02:31:42', '2019-10-22 02:31:42'),
(122, 'SMKN 11 BANDUNG', NULL, '2019-10-22 02:31:56', '2019-10-22 02:31:56'),
(123, 'SMK YO COLOMADU', NULL, '2019-10-22 02:32:11', '2019-10-22 02:32:11'),
(124, 'SMK PASIM PLUS', NULL, '2019-10-22 03:36:37', '2019-10-22 03:36:37'),
(125, 'SMAN 1 Kedokan Bunder', NULL, '2019-10-22 18:11:30', '2019-10-22 18:11:30'),
(126, 'SMK Dwija Dharma', NULL, '2019-10-22 18:11:49', '2019-10-22 18:11:49'),
(127, 'MA SUMUR BANDUNG', NULL, '2019-10-23 00:30:50', '2019-10-23 00:30:50'),
(128, 'SMK PGRI SITURAJA', NULL, '2019-10-23 00:31:18', '2019-10-23 00:31:18'),
(129, 'SMAN 1 CIRANJANG', NULL, '2019-10-23 00:31:32', '2019-10-23 00:31:32'),
(130, 'SMK TERATAI PUTIH JAKARTA', NULL, '2019-10-23 00:31:55', '2019-10-23 00:31:55'),
(131, 'SMAN 1 PARIAMAN', NULL, '2019-10-23 00:32:16', '2019-10-23 00:32:16'),
(132, 'SMAN 1 RANCAEKEk', NULL, '2019-10-23 00:32:59', '2019-10-23 00:32:59'),
(133, 'MA MUHAMMADIYAH TANJUNGSARI', NULL, '2019-10-23 00:33:15', '2019-10-23 00:33:15'),
(134, 'SMKN 1 LOSARANG', NULL, '2019-10-23 00:33:55', '2019-10-23 00:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statuspub`
--

CREATE TABLE `tb_statuspub` (
  `id_statusPub` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_statuspub`
--

INSERT INTO `tb_statuspub` (`id_statusPub`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PUB Aktif', NULL, NULL, NULL),
(2, 'Alumni', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_statussos`
--

CREATE TABLE `tb_statussos` (
  `id_statusSos` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_statussos`
--

INSERT INTO `tb_statussos` (`id_statusSos`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Menikah', NULL, NULL, NULL),
(2, 'Belum Menikah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_survei`
--

CREATE TABLE `tb_survei` (
  `id_survei` int(11) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `jk` char(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `asal_daerah` varchar(50) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_tahun3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_survei`
--

INSERT INTO `tb_survei` (`id_survei`, `nama_peserta`, `jk`, `jurusan`, `asal_sekolah`, `asal_daerah`, `no_hp`, `status`, `id_tahun3`) VALUES
(2, 'jj', 'Laki - Laki', 'S1 Teknik Informatika', 'jj', 'jj', '99', 'LULUS', 1),
(3, 'Eko', 'Laki - Laki', 'D3 Manajemen Informatika', 'SMAN 1 Cililin', 'Kabupaten Bandung Barat', '082315514983', 'LULUS', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_syarat_ketentuan`
--

CREATE TABLE `tb_syarat_ketentuan` (
  `id_syarat` int(10) UNSIGNED NOT NULL,
  `syarat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_syarat_ketentuan`
--

INSERT INTO `tb_syarat_ketentuan` (`id_syarat`, `syarat`) VALUES
(1, '<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">1. Beragama Islam</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">2. Mengisi Formulir Pendaftaran</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">3. Fotocopy Raport kelas X s.d kelas XII</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">4. Rangking 10 Besar Dikelas</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">&nbsp;5. Surat keterangan tidak mampu, serendah-rendahnya dari kelurahan</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">6. Surat keterangan sehat dari puskesmas atau rumah sakit</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">7. Focopy kartu keluarga</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">8. Pas photo : 3X4 , 2X3 @ 3 lembar</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">9. Fotocopy identitas diri dan keluarga</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">10. Lulusan SMA atau sederajat ( maksimal 1 tahun sebelumnya )</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">11. Slip gaji orang tua bagi PNS (Maksimal Golongan II)</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">12. Fotocopy STK,SKHUN,STTB SMA(legalisir)</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">13. Sertifikat keterampilan / penghargaan (bila ada dilampirkan)</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">14. Materai 6000 @2 lembar</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Seteah siswa/i lulus dalam tiap tahap pengetesan program beasiswa PUB dan secara persyaratan telah terpenuhi, maka untuk setiap mahasiswa/i PUB akan mendapatkan fasilitas , dantaranya :</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">&nbsp;Gratis biaya kuliah dan biaya hidup selama pendidikan </span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">1. Tempat tinggal/asrama</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">2. Sarapan dan makan</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">3. Uang saku tiap bulan</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">4. Toiletries</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">6. Jaminan kesehatan</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">7. Pelatihan di bidang IT dan bahasa pemrograman</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">8. Mengikuti magang kerja di mitra atau Unit bisnis PASIM</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">9. Penempatan kerja setelah lulus</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahunsel`
--

CREATE TABLE `tb_tahunsel` (
  `id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahunsel`
--

INSERT INTO `tb_tahunsel` (`id`, `tahun`) VALUES
(18, 2018),
(19, 2019),
(20, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tpa`
--

CREATE TABLE `tb_tpa` (
  `id_tpa` int(11) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `jml_peserta` int(11) NOT NULL,
  `jml_lulus` int(11) NOT NULL,
  `jml_gagal` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tpa`
--

INSERT INTO `tb_tpa` (`id_tpa`, `sekolah`, `jml_peserta`, `jml_lulus`, `jml_gagal`, `id_tahun`) VALUES
(2, 'mmb', 20, 19, 1, 20),
(3, 'mm', 20, 11, 9, 20),
(4, 'SMAN 1 CILILIN', 300, 19, 281, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_mahasiswa`, `username`, `password`, `level`) VALUES
(1, 40, 'Fenita', '5101999', 'admin'),
(2, 41, 'Ihsan', '02021999', 'alumni');

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
-- Indexes for table `image_uploadeds`
--
ALTER TABLE `image_uploadeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_alumni_dok`
--
ALTER TABLE `tb_alumni_dok`
  ADD PRIMARY KEY (`id_alumnidok`),
  ADD KEY `tb_alumni_dok_id_angkatan_foreign` (`id_angkatan`),
  ADD KEY `tb_alumni_dok_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indexes for table `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `tb_daerah`
--
ALTER TABLE `tb_daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `tb_detjadwal`
--
ALTER TABLE `tb_detjadwal`
  ADD PRIMARY KEY (`id_detjadwal`),
  ADD KEY `tb_detjadwal_id_jadwal_foreign` (`id_jadwal`),
  ADD KEY `tb_detjadwal_id_periode_foreign` (`id_periode`),
  ADD KEY `tb_detjadwal_id_daerah_foreign` (`id_daerah`),
  ADD KEY `tb_detjadwal_id_sekolah_foreign` (`id_sekolah`);

--
-- Indexes for table `tb_detorg_ppmb`
--
ALTER TABLE `tb_detorg_ppmb`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `tb_detorg_ppmb_id_angkatan_foreign` (`id_angkatan`),
  ADD KEY `tb_detorg_ppmb_id_orgppmb_foreign` (`id_orgppmb`),
  ADD KEY `tb_detorg_ppmb_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indexes for table `tb_detorg_pub`
--
ALTER TABLE `tb_detorg_pub`
  ADD PRIMARY KEY (`id_detorg_pub`),
  ADD KEY `tb_detorg_pub_id_angkatan_foreign` (`id_angkatan`),
  ADD KEY `tb_detorg_pub_id_orgpub_foreign` (`id_orgpub`),
  ADD KEY `tb_detorg_pub_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indexes for table `tb_detpelatihan`
--
ALTER TABLE `tb_detpelatihan`
  ADD PRIMARY KEY (`id_detpelatihan`),
  ADD KEY `tb_detpelatihan_id_angkatan_foreign` (`id_angkatan`),
  ADD KEY `tb_detpelatihan_id_pelatihan_foreign` (`id_pelatihan`);

--
-- Indexes for table `tb_detpendidikan`
--
ALTER TABLE `tb_detpendidikan`
  ADD PRIMARY KEY (`id_detpendidikan`),
  ADD KEY `tb_detpendidikan_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indexes for table `tb_detpengalaman`
--
ALTER TABLE `tb_detpengalaman`
  ADD PRIMARY KEY (`id_detpengalaman`),
  ADD KEY `tb_detpengalaman_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indexes for table `tb_det_hasilseleksi`
--
ALTER TABLE `tb_det_hasilseleksi`
  ADD PRIMARY KEY (`id_det_seleksi`),
  ADD KEY `tb_det_hasilseleksi_id_angkatan_foreign` (`id_angkatan`),
  ADD KEY `tb_det_hasilseleksi_id_hasil_foreign` (`id_hasil`);

--
-- Indexes for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  ADD PRIMARY KEY (`id_dok`);

--
-- Indexes for table `tb_dok_alumni`
--
ALTER TABLE `tb_dok_alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_final`
--
ALTER TABLE `tb_final`
  ADD PRIMARY KEY (`id_final`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_ikatan_alumni`
--
ALTER TABLE `tb_ikatan_alumni`
  ADD PRIMARY KEY (`id_ikatan`);

--
-- Indexes for table `tb_infaq`
--
ALTER TABLE `tb_infaq`
  ADD PRIMARY KEY (`id_infaq`),
  ADD KEY `tb_infaq_id_angkatan_foreign` (`id_angkatan`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `tb_mahasiswa_id_angkatan_foreign` (`id_angkatan`),
  ADD KEY `tb_mahasiswa_id_sekolah_foreign` (`id_sekolah`),
  ADD KEY `tb_mahasiswa_id_daerah_foreign` (`id_daerah`),
  ADD KEY `tb_mahasiswa_id_orgppmb_foreign` (`id_orgppmb`),
  ADD KEY `tb_mahasiswa_id_orgpub_foreign` (`id_orgpub`),
  ADD KEY `tb_mahasiswa_id_jur_foreign` (`id_jur`),
  ADD KEY `tb_mahasiswa_id_statuspub_foreign` (`id_statusPub`),
  ADD KEY `tb_mahasiswa_id_statussos_foreign` (`id_statusSos`);

--
-- Indexes for table `tb_orgppmb`
--
ALTER TABLE `tb_orgppmb`
  ADD PRIMARY KEY (`id_orgppmb`);

--
-- Indexes for table `tb_orgpub`
--
ALTER TABLE `tb_orgpub`
  ADD PRIMARY KEY (`id_orgpub`);

--
-- Indexes for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `tb_pendidikan_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indexes for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`),
  ADD KEY `tb_pengalaman_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `tb_ppmb_dok`
--
ALTER TABLE `tb_ppmb_dok`
  ADD PRIMARY KEY (`id_ppmbdok`),
  ADD KEY `tb_ppmb_dok_id_angkatan_foreign` (`id_angkatan`);

--
-- Indexes for table `tb_psikotest`
--
ALTER TABLE `tb_psikotest`
  ADD PRIMARY KEY (`id_psi`);

--
-- Indexes for table `tb_pubdok`
--
ALTER TABLE `tb_pubdok`
  ADD PRIMARY KEY (`id_pubdok`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tb_statuspub`
--
ALTER TABLE `tb_statuspub`
  ADD PRIMARY KEY (`id_statusPub`);

--
-- Indexes for table `tb_statussos`
--
ALTER TABLE `tb_statussos`
  ADD PRIMARY KEY (`id_statusSos`);

--
-- Indexes for table `tb_survei`
--
ALTER TABLE `tb_survei`
  ADD PRIMARY KEY (`id_survei`);

--
-- Indexes for table `tb_syarat_ketentuan`
--
ALTER TABLE `tb_syarat_ketentuan`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indexes for table `tb_tpa`
--
ALTER TABLE `tb_tpa`
  ADD PRIMARY KEY (`id_tpa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `tb_user_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_uploadeds`
--
ALTER TABLE `image_uploadeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_alumni_dok`
--
ALTER TABLE `tb_alumni_dok`
  MODIFY `id_alumnidok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  MODIFY `id_angkatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_daerah`
--
ALTER TABLE `tb_daerah`
  MODIFY `id_daerah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_detjadwal`
--
ALTER TABLE `tb_detjadwal`
  MODIFY `id_detjadwal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detorg_ppmb`
--
ALTER TABLE `tb_detorg_ppmb`
  MODIFY `id_detil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detorg_pub`
--
ALTER TABLE `tb_detorg_pub`
  MODIFY `id_detorg_pub` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_detpelatihan`
--
ALTER TABLE `tb_detpelatihan`
  MODIFY `id_detpelatihan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_detpendidikan`
--
ALTER TABLE `tb_detpendidikan`
  MODIFY `id_detpendidikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_detpengalaman`
--
ALTER TABLE `tb_detpengalaman`
  MODIFY `id_detpengalaman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_det_hasilseleksi`
--
ALTER TABLE `tb_det_hasilseleksi`
  MODIFY `id_det_seleksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  MODIFY `id_dok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_dok_alumni`
--
ALTER TABLE `tb_dok_alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_final`
--
ALTER TABLE `tb_final`
  MODIFY `id_final` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ikatan_alumni`
--
ALTER TABLE `tb_ikatan_alumni`
  MODIFY `id_ikatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_infaq`
--
ALTER TABLE `tb_infaq`
  MODIFY `id_infaq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `tb_orgppmb`
--
ALTER TABLE `tb_orgppmb`
  MODIFY `id_orgppmb` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_orgpub`
--
ALTER TABLE `tb_orgpub`
  MODIFY `id_orgpub` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  MODIFY `id_pelatihan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  MODIFY `id_pengalaman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id_periode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ppmb_dok`
--
ALTER TABLE `tb_ppmb_dok`
  MODIFY `id_ppmbdok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_psikotest`
--
ALTER TABLE `tb_psikotest`
  MODIFY `id_psi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pubdok`
--
ALTER TABLE `tb_pubdok`
  MODIFY `id_pubdok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tb_statuspub`
--
ALTER TABLE `tb_statuspub`
  MODIFY `id_statusPub` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_statussos`
--
ALTER TABLE `tb_statussos`
  MODIFY `id_statusSos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_survei`
--
ALTER TABLE `tb_survei`
  MODIFY `id_survei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_syarat_ketentuan`
--
ALTER TABLE `tb_syarat_ketentuan`
  MODIFY `id_syarat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tpa`
--
ALTER TABLE `tb_tpa`
  MODIFY `id_tpa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_alumni_dok`
--
ALTER TABLE `tb_alumni_dok`
  ADD CONSTRAINT `tb_alumni_dok_id_angkatan_foreign` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`);

--
-- Constraints for table `tb_detjadwal`
--
ALTER TABLE `tb_detjadwal`
  ADD CONSTRAINT `tb_detjadwal_id_daerah_foreign` FOREIGN KEY (`id_daerah`) REFERENCES `tb_daerah` (`id_daerah`),
  ADD CONSTRAINT `tb_detjadwal_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`),
  ADD CONSTRAINT `tb_detjadwal_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `tb_periode` (`id_periode`),
  ADD CONSTRAINT `tb_detjadwal_id_sekolah_foreign` FOREIGN KEY (`id_sekolah`) REFERENCES `tb_sekolah` (`id_sekolah`);

--
-- Constraints for table `tb_detorg_ppmb`
--
ALTER TABLE `tb_detorg_ppmb`
  ADD CONSTRAINT `tb_detorg_ppmb_id_angkatan_foreign` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`),
  ADD CONSTRAINT `tb_detorg_ppmb_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tb_detorg_ppmb_id_orgppmb_foreign` FOREIGN KEY (`id_orgppmb`) REFERENCES `tb_orgppmb` (`id_orgppmb`);

--
-- Constraints for table `tb_detorg_pub`
--
ALTER TABLE `tb_detorg_pub`
  ADD CONSTRAINT `tb_detorg_pub_id_angkatan_foreign` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`),
  ADD CONSTRAINT `tb_detorg_pub_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tb_detorg_pub_id_orgpub_foreign` FOREIGN KEY (`id_orgpub`) REFERENCES `tb_orgpub` (`id_orgpub`);

--
-- Constraints for table `tb_detpelatihan`
--
ALTER TABLE `tb_detpelatihan`
  ADD CONSTRAINT `tb_detpelatihan_id_angkatan_foreign` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`),
  ADD CONSTRAINT `tb_detpelatihan_id_pelatihan_foreign` FOREIGN KEY (`id_pelatihan`) REFERENCES `tb_pelatihan` (`id_pelatihan`);

--
-- Constraints for table `tb_detpendidikan`
--
ALTER TABLE `tb_detpendidikan`
  ADD CONSTRAINT `tb_detpendidikan_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tb_detpengalaman`
--
ALTER TABLE `tb_detpengalaman`
  ADD CONSTRAINT `tb_detpengalaman_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tb_det_hasilseleksi`
--
ALTER TABLE `tb_det_hasilseleksi`
  ADD CONSTRAINT `tb_det_hasilseleksi_id_angkatan_foreign` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`),
  ADD CONSTRAINT `tb_det_hasilseleksi_id_hasil_foreign` FOREIGN KEY (`id_hasil`) REFERENCES `tb_hasil` (`id_hasil`);

--
-- Constraints for table `tb_infaq`
--
ALTER TABLE `tb_infaq`
  ADD CONSTRAINT `tb_infaq_id_angkatan_foreign` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`);

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_id_angkatan_foreign` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`),
  ADD CONSTRAINT `tb_mahasiswa_id_daerah_foreign` FOREIGN KEY (`id_daerah`) REFERENCES `tb_daerah` (`id_daerah`),
  ADD CONSTRAINT `tb_mahasiswa_id_jur_foreign` FOREIGN KEY (`id_jur`) REFERENCES `tb_jurusan` (`id_jur`),
  ADD CONSTRAINT `tb_mahasiswa_id_orgppmb_foreign` FOREIGN KEY (`id_orgppmb`) REFERENCES `tb_orgppmb` (`id_orgppmb`),
  ADD CONSTRAINT `tb_mahasiswa_id_orgpub_foreign` FOREIGN KEY (`id_orgpub`) REFERENCES `tb_orgpub` (`id_orgpub`),
  ADD CONSTRAINT `tb_mahasiswa_id_sekolah_foreign` FOREIGN KEY (`id_sekolah`) REFERENCES `tb_sekolah` (`id_sekolah`),
  ADD CONSTRAINT `tb_mahasiswa_id_statuspub_foreign` FOREIGN KEY (`id_statusPub`) REFERENCES `tb_statuspub` (`id_statusPub`),
  ADD CONSTRAINT `tb_mahasiswa_id_statussos_foreign` FOREIGN KEY (`id_statusSos`) REFERENCES `tb_statussos` (`id_statusSos`);

--
-- Constraints for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD CONSTRAINT `tb_pendidikan_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  ADD CONSTRAINT `tb_pengalaman_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tb_ppmb_dok`
--
ALTER TABLE `tb_ppmb_dok`
  ADD CONSTRAINT `tb_ppmb_dok_id_angkatan_foreign` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
