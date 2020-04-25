-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Okt 2019 pada 08.32
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_lampiran`
--

CREATE TABLE `bukti_lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `nama_lampiran` varchar(70) NOT NULL,
  `deskripsi_lampiran` text NOT NULL,
  `id_jenislampiran` int(11) NOT NULL,
  `ukuran_lampiran` int(11) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `insert_at` datetime NOT NULL,
  `insert_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukti_lampiran`
--

INSERT INTO `bukti_lampiran` (`id_lampiran`, `id_proyek`, `id_kegiatan`, `nama_lampiran`, `deskripsi_lampiran`, `id_jenislampiran`, `ukuran_lampiran`, `file_type`, `insert_at`, `insert_by`, `update_by`, `update_at`) VALUES
(4, 1, 140, '3987-8424-1-SM.pdf', 'tes', 1, 228, '.pdf', '2019-08-08 19:11:11', 1, 0, '0000-00-00 00:00:00'),
(8, 2, 148, 'FJUR047_16753025.pdf', '', 1, 900, '.pdf', '2019-08-11 21:18:01', 4, 0, '0000-00-00 00:00:00'),
(12, 1, 140, '2906-6275-1-SM.pdf', 'tes', 1, 536, '.pdf', '2019-08-12 12:05:55', 1, 0, '0000-00-00 00:00:00'),
(13, 1, 140, '2906-6275-1-SM1.pdf', 'tes', 3, 536, '.pdf', '2019-08-12 12:10:37', 1, 0, '0000-00-00 00:00:00'),
(14, 1, 140, 'tabel_db_ilham.docx', 'tes', 1, 26, '.docx', '2019-08-14 06:11:26', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `kontak_client` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `telepon_client` varchar(13) NOT NULL,
  `email_client` varchar(100) NOT NULL,
  `provinsi_client` int(11) NOT NULL,
  `alamat_client` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `kontak_client`, `nama_perusahaan`, `telepon_client`, `email_client`, `provinsi_client`, `alamat_client`, `created_by`, `created_at`, `update_by`, `update_at`) VALUES
(2, 'mas ilham', 'Musdev Corp', '3434', 'ilhamvannyputra@gmail.com', 21, 'test', 1, '2019-08-02 22:02:35', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator atau DPS'),
(2, 'unit', 'Unit Bisnis'),
(3, 'pimpinan', 'Sektor Bisnis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `idjenis_kegiatan` int(11) NOT NULL,
  `namajenis_kegiatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`idjenis_kegiatan`, `namajenis_kegiatan`) VALUES
(1, 'Persiapan'),
(2, 'Pelaksanaan'),
(3, 'Pelaporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_lampiran`
--

CREATE TABLE `jenis_lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `jenis_lampiran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_lampiran`
--

INSERT INTO `jenis_lampiran` (`id_lampiran`, `jenis_lampiran`) VALUES
(1, 'Laporan Pendahuluan'),
(2, 'Rencana Kerja'),
(3, 'Berita Acara'),
(4, 'Notulen'),
(5, 'Absen'),
(6, 'Log Book'),
(7, 'Lainya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `jenis_kegiatan` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `bobot_kegiatan` int(11) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `tgl_rencanaselesai` date NOT NULL,
  `tgl_mulai_kegiatan` date NOT NULL,
  `tgl_selesai_kegiatan` date NOT NULL,
  `id_status_kegiatan` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_proyek`, `jenis_kegiatan`, `urutan`, `nama_kegiatan`, `bobot_kegiatan`, `deskripsi_kegiatan`, `tgl_rencanaselesai`, `tgl_mulai_kegiatan`, `tgl_selesai_kegiatan`, `id_status_kegiatan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(140, 1, 1, 2, 'Pengumpulan Data Awa', 2, '', '2019-08-10', '2019-08-04', '2019-08-14', 3, 0, '2019-08-15 07:23:37', 1, '2019-08-15'),
(141, 1, 1, 3, ' Kajian Data Awal', 4, '', '2019-08-18', '2019-08-11', '2019-08-04', 2, 0, '2019-08-18 09:07:14', 1, '2019-08-18'),
(148, 2, 2, 2, 'tes3', 53, 'tes3', '2019-12-26', '2019-08-07', '2019-12-17', 2, 4, '2019-08-15 07:18:21', 1, '2019-08-15'),
(149, 1, 1, 2, 'Persiapan Personil', 5, 'Persiapan Personil', '2019-08-22', '2019-08-21', '0000-00-00', 3, 1, '2019-08-14 20:56:38', 1, '2019-08-15'),
(153, 1, 1, 3, 'Persiapan Peralatan', 5, '', '2019-08-10', '2019-08-03', '0000-00-00', 1, 1, '2019-09-09 00:13:22', 1, '2019-09-09'),
(154, 1, 1, 2, 'Mobilisasi personil', 7, '', '2019-08-14', '2019-08-11', '0000-00-00', 2, 1, '2019-08-18 09:07:14', 1, '2019-08-18'),
(155, 1, 1, 5, 'Perumusan Instrumen', 3, '', '2019-08-13', '2019-08-11', '0000-00-00', 1, 1, '2019-09-09 00:13:10', 1, '2019-09-09'),
(156, 1, 1, 6, 'Penyusunan Rencana Kerja', 7, '', '2019-08-16', '2019-08-14', '0000-00-00', 1, 1, '2019-09-09 00:13:10', 1, '2019-09-09'),
(157, 1, 1, 7, 'Sosialisasi Kegiata', 3, '', '2019-08-20', '2019-08-17', '0000-00-00', 1, 1, '2019-09-09 00:13:10', 1, '2019-09-09'),
(158, 1, 2, 4, 'Survey Pengukuran ke Sumenep, ', 15, '', '2019-08-22', '2019-08-17', '0000-00-00', 2, 1, '2019-08-18 09:39:54', 1, '2019-08-18'),
(159, 1, 2, 5, 'Survey Pengukuran ke Sumatera,', 6, '', '2019-08-24', '2019-08-22', '0000-00-00', 2, 1, '2019-08-18 09:41:01', 1, '2019-08-18'),
(160, 1, 2, 3, 'Survey Pengukuran ke jogjakart', 5, 'Survey Pengukuran ke jogjakart', '2019-08-28', '2019-08-25', '0000-00-00', 3, 1, '2019-08-14 20:56:39', 1, '2019-08-15'),
(161, 1, 3, 2, 'Presentasi Laporan Pendahuluan', 4, '', '2019-09-04', '2019-09-01', '0000-00-00', 1, 1, '2019-09-09 00:13:10', 1, '2019-09-09'),
(162, 1, 3, 2, 'Presentasi Laporan Antara ', 4, '', '2019-09-07', '2019-09-05', '0000-00-00', 1, 1, '2019-09-09 00:13:22', 1, '2019-09-09'),
(163, 1, 3, 4, '5 Presentasi Laporan Akhir', 1, '', '2019-09-10', '2019-09-08', '0000-00-00', 1, 1, '2019-09-09 00:13:10', 1, '2019-09-09'),
(164, 6, 1, 2, 'perencanaan', 50, 'test', '2019-08-08', '2019-08-01', '1900-12-19', 2, 7, '2019-08-15 04:34:06', 7, '2019-08-15'),
(165, 4, 1, 0, 'contoh', 30, 'Proyek', '2019-08-08', '2019-07-28', '0000-00-00', 2, 6, '2019-08-21 21:11:37', 6, '2019-08-22');

--
-- Trigger `kegiatan`
--
DELIMITER $$
CREATE TRIGGER `update_kegaitan` BEFORE UPDATE ON `kegiatan` FOR EACH ROW INSERT INTO log_kegiatan
    set id_proyek = OLD.id_proyek,
    id_user=new.updated_by,
    id_kegiatan=old.id_kegiatan,
    status_kegiatan=old.id_status_kegiatan,
    status_kegiatan_sekarang=new.id_status_kegiatan,
    aksi="update",
    waktu_perubahan = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `kegiatansektor`
--
CREATE TABLE `kegiatansektor` (
`id_proyek` int(11)
,`nama_proyek` varchar(70)
,`id_kegiatan` int(11)
,`nama_kegiatan` varchar(30)
,`unit_id` int(11)
,`id_sektor` int(11)
,`nama_sektor` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_kegiatan`
--

CREATE TABLE `log_kegiatan` (
  `id_logkegiatan` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kegiatan` varchar(5) NOT NULL,
  `status_kegiatan` int(11) NOT NULL,
  `status_kegiatan_sekarang` int(11) NOT NULL,
  `aksi` varchar(11) NOT NULL,
  `waktu_perubahan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_kegiatan`
--

INSERT INTO `log_kegiatan` (`id_logkegiatan`, `id_proyek`, `id_user`, `id_kegiatan`, `status_kegiatan`, `status_kegiatan_sekarang`, `aksi`, `waktu_perubahan`) VALUES
(4, 1, 1, '141', 1, 2, 'update', '2019-08-12 05:41:08'),
(5, 1, 1, '140', 3, 3, 'update', '2019-08-12 06:05:30'),
(6, 1, 1, '141', 2, 3, 'update', '2019-08-12 06:05:30'),
(7, 1, 4, '141', 3, 3, 'update', '2019-08-12 06:08:43'),
(8, 1, 4, '141', 3, 3, 'update', '2019-08-12 06:08:59'),
(9, 1, 4, '140', 3, 2, 'update', '2019-08-12 06:09:00'),
(10, 1, 4, '141', 3, 3, 'update', '2019-08-12 06:10:09'),
(11, 1, 4, '140', 2, 3, 'update', '2019-08-12 06:10:09'),
(12, 1, 1, '140', 3, 3, 'update', '2019-08-12 06:11:37'),
(13, 1, 1, '140', 3, 3, 'update', '2019-08-12 06:11:56'),
(14, 1, 1, '141', 3, 1, 'update', '2019-08-12 06:11:58'),
(15, 2, 4, '148', 3, 2, 'update', '2019-08-12 06:13:44'),
(16, 2, 1, '148', 2, 1, 'update', '2019-08-12 06:15:55'),
(17, 2, 1, '148', 1, 2, 'update', '2019-08-12 06:24:20'),
(18, 2, 1, '148', 2, 3, 'update', '2019-08-12 06:24:39'),
(19, 2, 1, '148', 3, 2, 'update', '2019-08-12 06:25:14'),
(20, 2, 1, '148', 2, 1, 'update', '2019-08-12 06:32:25'),
(21, 2, 1, '148', 1, 2, 'update', '2019-08-12 06:34:25'),
(22, 2, 1, '148', 2, 3, 'update', '2019-08-12 06:34:41'),
(23, 2, 1, '148', 3, 3, 'update', '2019-08-12 06:36:00'),
(24, 1, 1, '140', 3, 3, 'update', '2019-08-12 06:48:09'),
(25, 1, 1, '141', 1, 1, 'update', '2019-08-12 06:48:09'),
(26, 1, 1, '140', 3, 3, 'update', '2019-08-12 10:14:51'),
(27, 1, 1, '141', 1, 1, 'update', '2019-08-12 10:14:51'),
(28, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:19:56'),
(29, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:20:03'),
(30, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:20:10'),
(31, 1, 1, '149', 1, 2, 'update', '2019-08-14 01:20:10'),
(32, 1, 1, '141', 1, 2, 'update', '2019-08-14 01:21:00'),
(33, 1, 1, '149', 2, 2, 'update', '2019-08-14 01:21:00'),
(34, 1, 1, '140', 3, 3, 'update', '2019-08-14 01:33:21'),
(35, 1, 1, '141', 2, 2, 'update', '2019-08-14 01:33:21'),
(36, 1, 1, '149', 2, 2, 'update', '2019-08-14 01:33:21'),
(37, 1, 1, '140', 3, 3, 'update', '2019-08-14 01:33:50'),
(38, 1, 1, '141', 2, 2, 'update', '2019-08-14 01:33:50'),
(39, 1, 1, '149', 2, 2, 'update', '2019-08-14 01:33:50'),
(40, 1, 1, '140', 3, 1, 'update', '2019-08-14 01:34:31'),
(41, 1, 1, '141', 2, 1, 'update', '2019-08-14 01:34:31'),
(42, 1, 1, '149', 2, 1, 'update', '2019-08-14 01:34:31'),
(43, 1, 1, '153', 1, 1, 'update', '2019-08-14 01:45:24'),
(44, 1, 1, '155', 1, 1, 'update', '2019-08-14 01:45:24'),
(45, 1, 1, '156', 1, 1, 'update', '2019-08-14 01:45:24'),
(46, 1, 1, '157', 1, 1, 'update', '2019-08-14 01:45:24'),
(47, 1, 1, '140', 1, 1, 'update', '2019-08-14 01:45:24'),
(48, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:45:24'),
(49, 1, 1, '149', 1, 1, 'update', '2019-08-14 01:45:24'),
(50, 1, 1, '153', 1, 1, 'update', '2019-08-14 01:45:32'),
(51, 1, 1, '155', 1, 1, 'update', '2019-08-14 01:45:32'),
(52, 1, 1, '156', 1, 1, 'update', '2019-08-14 01:45:32'),
(53, 1, 1, '157', 1, 1, 'update', '2019-08-14 01:45:32'),
(54, 1, 1, '140', 1, 1, 'update', '2019-08-14 01:45:32'),
(55, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:45:32'),
(56, 1, 1, '149', 1, 1, 'update', '2019-08-14 01:45:32'),
(57, 1, 1, '140', 1, 1, 'update', '2019-08-14 01:45:55'),
(58, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:45:55'),
(59, 1, 1, '149', 1, 1, 'update', '2019-08-14 01:45:55'),
(60, 1, 1, '153', 1, 1, 'update', '2019-08-14 01:45:55'),
(61, 1, 0, '154', 1, 1, 'update', '2019-08-14 01:45:55'),
(62, 1, 1, '155', 1, 1, 'update', '2019-08-14 01:45:55'),
(63, 1, 1, '156', 1, 1, 'update', '2019-08-14 01:45:55'),
(64, 1, 1, '157', 1, 1, 'update', '2019-08-14 01:45:55'),
(65, 1, 1, '140', 1, 1, 'update', '2019-08-14 01:51:05'),
(66, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:51:05'),
(67, 1, 1, '149', 1, 1, 'update', '2019-08-14 01:51:05'),
(68, 1, 1, '153', 1, 1, 'update', '2019-08-14 01:51:05'),
(69, 1, 0, '154', 1, 1, 'update', '2019-08-14 01:51:05'),
(70, 1, 1, '155', 1, 1, 'update', '2019-08-14 01:51:05'),
(71, 1, 1, '156', 1, 1, 'update', '2019-08-14 01:51:05'),
(72, 1, 1, '157', 1, 1, 'update', '2019-08-14 01:51:05'),
(73, 1, 0, '158', 1, 1, 'update', '2019-08-14 01:51:05'),
(74, 1, 0, '159', 1, 1, 'update', '2019-08-14 01:51:05'),
(75, 1, 0, '160', 1, 1, 'update', '2019-08-14 01:51:05'),
(76, 1, 1, '140', 1, 1, 'update', '2019-08-14 01:56:30'),
(77, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:56:30'),
(78, 1, 1, '149', 1, 1, 'update', '2019-08-14 01:56:30'),
(79, 1, 1, '153', 1, 1, 'update', '2019-08-14 01:56:30'),
(80, 1, 0, '154', 1, 1, 'update', '2019-08-14 01:56:30'),
(81, 1, 1, '155', 1, 1, 'update', '2019-08-14 01:56:30'),
(82, 1, 1, '156', 1, 1, 'update', '2019-08-14 01:56:30'),
(83, 1, 1, '157', 1, 1, 'update', '2019-08-14 01:56:30'),
(84, 1, 0, '158', 1, 1, 'update', '2019-08-14 01:56:30'),
(85, 1, 0, '159', 1, 1, 'update', '2019-08-14 01:56:30'),
(86, 1, 0, '160', 1, 1, 'update', '2019-08-14 01:56:30'),
(87, 1, 1, '140', 1, 1, 'update', '2019-08-14 01:57:06'),
(88, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:57:06'),
(89, 1, 1, '149', 1, 1, 'update', '2019-08-14 01:57:06'),
(90, 1, 1, '153', 1, 1, 'update', '2019-08-14 01:57:06'),
(91, 1, 0, '154', 1, 1, 'update', '2019-08-14 01:57:06'),
(92, 1, 1, '155', 1, 1, 'update', '2019-08-14 01:57:06'),
(93, 1, 1, '156', 1, 1, 'update', '2019-08-14 01:57:06'),
(94, 1, 1, '157', 1, 1, 'update', '2019-08-14 01:57:06'),
(95, 1, 0, '158', 1, 1, 'update', '2019-08-14 01:57:06'),
(96, 1, 0, '159', 1, 1, 'update', '2019-08-14 01:57:06'),
(97, 1, 0, '160', 1, 1, 'update', '2019-08-14 01:57:06'),
(98, 1, 1, '140', 1, 1, 'update', '2019-08-14 01:59:59'),
(99, 1, 1, '141', 1, 1, 'update', '2019-08-14 01:59:59'),
(100, 1, 1, '149', 1, 1, 'update', '2019-08-14 01:59:59'),
(101, 1, 1, '153', 1, 1, 'update', '2019-08-14 01:59:59'),
(102, 1, 1, '154', 1, 1, 'update', '2019-08-14 01:59:59'),
(103, 1, 1, '155', 1, 1, 'update', '2019-08-14 01:59:59'),
(104, 1, 1, '156', 1, 1, 'update', '2019-08-14 01:59:59'),
(105, 1, 1, '157', 1, 1, 'update', '2019-08-14 01:59:59'),
(106, 1, 1, '158', 1, 1, 'update', '2019-08-14 01:59:59'),
(107, 1, 1, '159', 1, 1, 'update', '2019-08-14 01:59:59'),
(108, 1, 1, '160', 1, 2, 'update', '2019-08-14 01:59:59'),
(109, 1, 1, '140', 1, 3, 'update', '2019-08-14 02:01:06'),
(110, 1, 1, '141', 1, 1, 'update', '2019-08-14 02:01:06'),
(111, 1, 1, '149', 1, 1, 'update', '2019-08-14 02:01:06'),
(112, 1, 1, '153', 1, 1, 'update', '2019-08-14 02:01:06'),
(113, 1, 1, '154', 1, 1, 'update', '2019-08-14 02:01:06'),
(114, 1, 1, '155', 1, 1, 'update', '2019-08-14 02:01:06'),
(115, 1, 1, '156', 1, 1, 'update', '2019-08-14 02:01:06'),
(116, 1, 1, '157', 1, 1, 'update', '2019-08-14 02:01:06'),
(117, 1, 1, '158', 1, 1, 'update', '2019-08-14 02:01:06'),
(118, 1, 1, '159', 1, 1, 'update', '2019-08-14 02:01:06'),
(119, 1, 1, '160', 2, 2, 'update', '2019-08-14 02:01:06'),
(120, 1, 1, '140', 3, 3, 'update', '2019-08-14 02:02:25'),
(121, 1, 1, '141', 1, 1, 'update', '2019-08-14 02:02:25'),
(122, 1, 1, '149', 1, 1, 'update', '2019-08-14 02:02:25'),
(123, 1, 1, '153', 1, 1, 'update', '2019-08-14 02:02:25'),
(124, 1, 1, '154', 1, 1, 'update', '2019-08-14 02:02:25'),
(125, 1, 1, '155', 1, 1, 'update', '2019-08-14 02:02:25'),
(126, 1, 1, '156', 1, 1, 'update', '2019-08-14 02:02:25'),
(127, 1, 1, '157', 1, 1, 'update', '2019-08-14 02:02:25'),
(128, 1, 1, '158', 1, 1, 'update', '2019-08-14 02:02:25'),
(129, 1, 1, '159', 1, 1, 'update', '2019-08-14 02:02:25'),
(130, 1, 1, '160', 2, 2, 'update', '2019-08-14 02:02:25'),
(131, 1, 1, '140', 3, 3, 'update', '2019-08-14 02:10:11'),
(132, 1, 1, '141', 1, 1, 'update', '2019-08-14 02:10:11'),
(133, 1, 1, '149', 1, 1, 'update', '2019-08-14 02:10:11'),
(134, 1, 1, '153', 1, 1, 'update', '2019-08-14 02:10:11'),
(135, 1, 1, '154', 1, 1, 'update', '2019-08-14 02:10:11'),
(136, 1, 1, '155', 1, 1, 'update', '2019-08-14 02:10:11'),
(137, 1, 1, '156', 1, 1, 'update', '2019-08-14 02:10:11'),
(138, 1, 1, '157', 1, 1, 'update', '2019-08-14 02:10:11'),
(139, 1, 1, '158', 1, 1, 'update', '2019-08-14 02:10:11'),
(140, 1, 1, '159', 1, 1, 'update', '2019-08-14 02:10:11'),
(141, 1, 1, '160', 2, 2, 'update', '2019-08-14 02:10:11'),
(142, 1, 0, '161', 1, 1, 'update', '2019-08-14 02:10:11'),
(143, 1, 0, '162', 1, 1, 'update', '2019-08-14 02:10:11'),
(144, 1, 0, '163', 1, 1, 'update', '2019-08-14 02:10:11'),
(145, 1, 1, '140', 3, 3, 'update', '2019-08-14 02:11:17'),
(146, 1, 1, '141', 1, 1, 'update', '2019-08-14 02:11:17'),
(147, 1, 1, '149', 1, 1, 'update', '2019-08-14 02:11:17'),
(148, 1, 1, '153', 1, 1, 'update', '2019-08-14 02:11:17'),
(149, 1, 1, '154', 1, 1, 'update', '2019-08-14 02:11:17'),
(150, 1, 1, '155', 1, 1, 'update', '2019-08-14 02:11:17'),
(151, 1, 1, '156', 1, 1, 'update', '2019-08-14 02:11:17'),
(152, 1, 1, '157', 1, 1, 'update', '2019-08-14 02:11:17'),
(153, 1, 1, '158', 1, 1, 'update', '2019-08-14 02:11:17'),
(154, 1, 1, '159', 1, 1, 'update', '2019-08-14 02:11:17'),
(155, 1, 1, '160', 2, 2, 'update', '2019-08-14 02:11:17'),
(156, 1, 0, '161', 1, 1, 'update', '2019-08-14 02:11:17'),
(157, 1, 0, '162', 1, 1, 'update', '2019-08-14 02:11:17'),
(158, 1, 0, '163', 1, 1, 'update', '2019-08-14 02:11:17'),
(159, 1, 1, '140', 3, 3, 'update', '2019-08-15 03:15:49'),
(160, 1, 1, '141', 1, 1, 'update', '2019-08-15 03:15:49'),
(161, 1, 1, '149', 1, 1, 'update', '2019-08-15 03:15:49'),
(162, 1, 1, '153', 1, 1, 'update', '2019-08-15 03:15:49'),
(163, 1, 1, '154', 1, 1, 'update', '2019-08-15 03:15:49'),
(164, 1, 1, '155', 1, 1, 'update', '2019-08-15 03:15:49'),
(165, 1, 1, '156', 1, 1, 'update', '2019-08-15 03:15:49'),
(166, 1, 1, '157', 1, 1, 'update', '2019-08-15 03:15:49'),
(167, 1, 1, '158', 1, 1, 'update', '2019-08-15 03:15:49'),
(168, 1, 1, '159', 1, 1, 'update', '2019-08-15 03:15:49'),
(169, 1, 1, '160', 2, 2, 'update', '2019-08-15 03:15:49'),
(170, 1, 0, '161', 1, 1, 'update', '2019-08-15 03:15:49'),
(171, 1, 0, '162', 1, 1, 'update', '2019-08-15 03:15:49'),
(172, 1, 0, '163', 1, 1, 'update', '2019-08-15 03:15:49'),
(173, 1, 1, '140', 3, 3, 'update', '2019-08-15 03:33:53'),
(174, 1, 1, '141', 1, 1, 'update', '2019-08-15 03:33:53'),
(175, 1, 1, '149', 1, 2, 'update', '2019-08-15 03:33:53'),
(176, 1, 1, '153', 1, 1, 'update', '2019-08-15 03:33:53'),
(177, 1, 1, '154', 1, 1, 'update', '2019-08-15 03:33:53'),
(178, 1, 1, '155', 1, 1, 'update', '2019-08-15 03:33:53'),
(179, 1, 1, '156', 1, 1, 'update', '2019-08-15 03:33:53'),
(180, 1, 1, '157', 1, 1, 'update', '2019-08-15 03:33:53'),
(181, 1, 1, '158', 1, 1, 'update', '2019-08-15 03:33:53'),
(182, 1, 1, '159', 1, 1, 'update', '2019-08-15 03:33:53'),
(183, 1, 1, '160', 2, 2, 'update', '2019-08-15 03:33:53'),
(184, 1, 1, '161', 1, 1, 'update', '2019-08-15 03:33:53'),
(185, 1, 1, '162', 1, 1, 'update', '2019-08-15 03:33:53'),
(186, 1, 1, '163', 1, 1, 'update', '2019-08-15 03:33:53'),
(187, 1, 1, '140', 3, 3, 'update', '2019-08-15 03:44:03'),
(188, 1, 1, '141', 1, 2, 'update', '2019-08-15 03:44:03'),
(189, 1, 1, '149', 2, 2, 'update', '2019-08-15 03:44:03'),
(190, 1, 1, '153', 1, 1, 'update', '2019-08-15 03:44:03'),
(191, 1, 1, '154', 1, 1, 'update', '2019-08-15 03:44:03'),
(192, 1, 1, '155', 1, 1, 'update', '2019-08-15 03:44:03'),
(193, 1, 1, '156', 1, 1, 'update', '2019-08-15 03:44:03'),
(194, 1, 1, '157', 1, 1, 'update', '2019-08-15 03:44:03'),
(195, 1, 1, '158', 1, 1, 'update', '2019-08-15 03:44:03'),
(196, 1, 1, '159', 1, 1, 'update', '2019-08-15 03:44:03'),
(197, 1, 1, '160', 2, 2, 'update', '2019-08-15 03:44:03'),
(198, 1, 1, '161', 1, 1, 'update', '2019-08-15 03:44:03'),
(199, 1, 1, '162', 1, 1, 'update', '2019-08-15 03:44:03'),
(200, 1, 1, '163', 1, 1, 'update', '2019-08-15 03:44:03'),
(201, 1, 4, '140', 3, 2, 'update', '2019-08-15 03:48:18'),
(202, 1, 4, '141', 2, 2, 'update', '2019-08-15 03:48:18'),
(203, 1, 4, '149', 2, 2, 'update', '2019-08-15 03:48:18'),
(204, 1, 4, '153', 1, 1, 'update', '2019-08-15 03:48:18'),
(205, 1, 4, '154', 1, 1, 'update', '2019-08-15 03:48:18'),
(206, 1, 4, '155', 1, 1, 'update', '2019-08-15 03:48:18'),
(207, 1, 4, '156', 1, 1, 'update', '2019-08-15 03:48:18'),
(208, 1, 4, '157', 1, 1, 'update', '2019-08-15 03:48:18'),
(209, 1, 4, '158', 1, 1, 'update', '2019-08-15 03:48:18'),
(210, 1, 4, '159', 1, 1, 'update', '2019-08-15 03:48:18'),
(211, 1, 4, '160', 2, 2, 'update', '2019-08-15 03:48:18'),
(212, 1, 4, '161', 1, 1, 'update', '2019-08-15 03:48:18'),
(213, 1, 4, '162', 1, 1, 'update', '2019-08-15 03:48:18'),
(214, 1, 4, '163', 1, 1, 'update', '2019-08-15 03:48:18'),
(215, 1, 4, '140', 2, 3, 'update', '2019-08-15 03:49:44'),
(216, 1, 4, '141', 2, 2, 'update', '2019-08-15 03:49:44'),
(217, 1, 4, '149', 2, 2, 'update', '2019-08-15 03:49:44'),
(218, 1, 4, '153', 1, 1, 'update', '2019-08-15 03:49:44'),
(219, 1, 4, '154', 1, 1, 'update', '2019-08-15 03:49:44'),
(220, 1, 4, '155', 1, 1, 'update', '2019-08-15 03:49:44'),
(221, 1, 4, '156', 1, 1, 'update', '2019-08-15 03:49:44'),
(222, 1, 4, '157', 1, 1, 'update', '2019-08-15 03:49:44'),
(223, 1, 4, '158', 1, 1, 'update', '2019-08-15 03:49:44'),
(224, 1, 4, '159', 1, 1, 'update', '2019-08-15 03:49:44'),
(225, 1, 4, '160', 2, 2, 'update', '2019-08-15 03:49:44'),
(226, 1, 4, '161', 1, 1, 'update', '2019-08-15 03:49:44'),
(227, 1, 4, '162', 1, 1, 'update', '2019-08-15 03:49:44'),
(228, 1, 4, '163', 1, 1, 'update', '2019-08-15 03:49:44'),
(229, 1, 4, '140', 3, 3, 'update', '2019-08-15 03:53:20'),
(230, 1, 4, '141', 2, 2, 'update', '2019-08-15 03:53:20'),
(231, 1, 4, '149', 2, 3, 'update', '2019-08-15 03:53:20'),
(232, 1, 4, '153', 1, 1, 'update', '2019-08-15 03:53:20'),
(233, 1, 4, '154', 1, 1, 'update', '2019-08-15 03:53:20'),
(234, 1, 4, '155', 1, 1, 'update', '2019-08-15 03:53:20'),
(235, 1, 4, '156', 1, 1, 'update', '2019-08-15 03:53:20'),
(236, 1, 4, '157', 1, 1, 'update', '2019-08-15 03:53:20'),
(237, 1, 4, '158', 1, 1, 'update', '2019-08-15 03:53:20'),
(238, 1, 4, '159', 1, 1, 'update', '2019-08-15 03:53:20'),
(239, 1, 4, '160', 2, 2, 'update', '2019-08-15 03:53:20'),
(240, 1, 4, '161', 1, 1, 'update', '2019-08-15 03:53:20'),
(241, 1, 4, '162', 1, 1, 'update', '2019-08-15 03:53:20'),
(242, 1, 4, '163', 1, 1, 'update', '2019-08-15 03:53:20'),
(243, 1, 4, '140', 3, 2, 'update', '2019-08-15 03:54:24'),
(244, 1, 4, '141', 2, 2, 'update', '2019-08-15 03:54:24'),
(245, 1, 4, '149', 3, 3, 'update', '2019-08-15 03:54:24'),
(246, 1, 4, '153', 1, 1, 'update', '2019-08-15 03:54:24'),
(247, 1, 4, '154', 1, 1, 'update', '2019-08-15 03:54:24'),
(248, 1, 4, '155', 1, 1, 'update', '2019-08-15 03:54:24'),
(249, 1, 4, '156', 1, 1, 'update', '2019-08-15 03:54:24'),
(250, 1, 4, '157', 1, 1, 'update', '2019-08-15 03:54:24'),
(251, 1, 4, '158', 1, 1, 'update', '2019-08-15 03:54:24'),
(252, 1, 4, '159', 1, 1, 'update', '2019-08-15 03:54:24'),
(253, 1, 4, '160', 2, 2, 'update', '2019-08-15 03:54:24'),
(254, 1, 4, '161', 1, 1, 'update', '2019-08-15 03:54:24'),
(255, 1, 4, '162', 1, 1, 'update', '2019-08-15 03:54:24'),
(256, 1, 4, '163', 1, 1, 'update', '2019-08-15 03:54:24'),
(257, 2, 4, '148', 3, 2, 'update', '2019-08-15 03:54:48'),
(258, 2, 4, '148', 2, 3, 'update', '2019-08-15 03:55:59'),
(259, 1, 1, '140', 2, 2, 'update', '2019-08-15 03:56:38'),
(260, 1, 1, '141', 2, 2, 'update', '2019-08-15 03:56:38'),
(261, 1, 1, '149', 3, 3, 'update', '2019-08-15 03:56:38'),
(262, 1, 1, '160', 2, 3, 'update', '2019-08-15 03:56:39'),
(263, 6, 7, '164', 1, 2, 'update', '2019-08-15 11:26:26'),
(264, 6, 7, '164', 2, 3, 'update', '2019-08-15 11:26:36'),
(265, 6, 7, '164', 3, 2, 'update', '2019-08-15 11:34:06'),
(266, 2, 1, '148', 3, 2, 'update', '2019-08-15 14:18:21'),
(267, 1, 1, '140', 2, 3, 'update', '2019-08-15 14:23:37'),
(268, 1, 1, '141', 2, 2, 'update', '2019-08-15 14:23:37'),
(269, 1, 1, '149', 3, 3, 'update', '2019-08-15 14:23:37'),
(270, 1, 1, '153', 1, 1, 'update', '2019-08-15 14:23:37'),
(271, 1, 1, '154', 1, 1, 'update', '2019-08-15 14:23:37'),
(272, 1, 1, '155', 1, 1, 'update', '2019-08-15 14:23:37'),
(273, 1, 1, '156', 1, 1, 'update', '2019-08-15 14:23:37'),
(274, 1, 1, '157', 1, 1, 'update', '2019-08-15 14:23:37'),
(275, 1, 1, '158', 1, 1, 'update', '2019-08-15 14:23:37'),
(276, 1, 1, '159', 1, 1, 'update', '2019-08-15 14:23:37'),
(277, 1, 1, '160', 3, 3, 'update', '2019-08-15 14:23:37'),
(278, 1, 1, '161', 1, 1, 'update', '2019-08-15 14:23:37'),
(279, 1, 1, '162', 1, 1, 'update', '2019-08-15 14:23:37'),
(280, 1, 1, '163', 1, 1, 'update', '2019-08-15 14:23:37'),
(281, 1, 1, '158', 1, 1, 'update', '2019-08-18 16:07:12'),
(282, 1, 1, '159', 1, 1, 'update', '2019-08-18 16:07:12'),
(283, 1, 1, '161', 1, 1, 'update', '2019-08-18 16:07:12'),
(284, 1, 1, '162', 1, 1, 'update', '2019-08-18 16:07:12'),
(285, 1, 1, '163', 1, 1, 'update', '2019-08-18 16:07:12'),
(286, 1, 1, '153', 1, 1, 'update', '2019-08-18 16:07:12'),
(287, 1, 1, '155', 1, 1, 'update', '2019-08-18 16:07:12'),
(288, 1, 1, '156', 1, 1, 'update', '2019-08-18 16:07:12'),
(289, 1, 1, '157', 1, 1, 'update', '2019-08-18 16:07:12'),
(290, 1, 1, '154', 1, 2, 'update', '2019-08-18 16:07:14'),
(291, 1, 1, '141', 2, 2, 'update', '2019-08-18 16:07:14'),
(292, 1, 1, '158', 1, 1, 'update', '2019-08-18 16:10:17'),
(293, 1, 1, '159', 1, 1, 'update', '2019-08-18 16:10:17'),
(294, 1, 1, '161', 1, 1, 'update', '2019-08-18 16:10:17'),
(295, 1, 1, '162', 1, 1, 'update', '2019-08-18 16:10:17'),
(296, 1, 1, '163', 1, 1, 'update', '2019-08-18 16:10:17'),
(297, 1, 1, '153', 1, 1, 'update', '2019-08-18 16:10:17'),
(298, 1, 1, '155', 1, 1, 'update', '2019-08-18 16:10:17'),
(299, 1, 1, '156', 1, 1, 'update', '2019-08-18 16:10:17'),
(300, 1, 1, '154', 2, 2, 'update', '2019-08-18 16:39:54'),
(301, 1, 1, '141', 2, 2, 'update', '2019-08-18 16:39:54'),
(302, 1, 1, '158', 1, 2, 'update', '2019-08-18 16:39:54'),
(303, 1, 1, '159', 1, 1, 'update', '2019-08-18 16:39:57'),
(304, 1, 1, '161', 1, 1, 'update', '2019-08-18 16:39:58'),
(305, 1, 1, '162', 1, 1, 'update', '2019-08-18 16:39:58'),
(306, 1, 1, '163', 1, 1, 'update', '2019-08-18 16:39:58'),
(307, 1, 1, '153', 1, 1, 'update', '2019-08-18 16:39:58'),
(308, 1, 1, '155', 1, 1, 'update', '2019-08-18 16:39:58'),
(309, 1, 1, '156', 1, 1, 'update', '2019-08-18 16:39:58'),
(310, 1, 1, '157', 1, 1, 'update', '2019-08-18 16:39:58'),
(311, 1, 1, '161', 1, 1, 'update', '2019-08-18 16:41:00'),
(312, 1, 1, '162', 1, 1, 'update', '2019-08-18 16:41:00'),
(313, 1, 1, '163', 1, 1, 'update', '2019-08-18 16:41:00'),
(314, 1, 1, '153', 1, 1, 'update', '2019-08-18 16:41:00'),
(315, 1, 1, '155', 1, 1, 'update', '2019-08-18 16:41:00'),
(316, 1, 1, '156', 1, 1, 'update', '2019-08-18 16:41:00'),
(317, 1, 1, '157', 1, 1, 'update', '2019-08-18 16:41:00'),
(318, 1, 1, '154', 2, 2, 'update', '2019-08-18 16:41:01'),
(319, 1, 1, '141', 2, 2, 'update', '2019-08-18 16:41:01'),
(320, 1, 1, '158', 2, 2, 'update', '2019-08-18 16:41:01'),
(321, 1, 1, '159', 1, 2, 'update', '2019-08-18 16:41:01'),
(322, 1, 1, '162', 1, 1, 'update', '2019-08-18 16:50:11'),
(323, 1, 1, '163', 1, 1, 'update', '2019-08-18 16:50:11'),
(324, 1, 1, '153', 1, 1, 'update', '2019-08-18 16:50:11'),
(325, 1, 1, '155', 1, 1, 'update', '2019-08-18 16:50:12'),
(326, 1, 1, '156', 1, 1, 'update', '2019-08-18 16:50:12'),
(327, 1, 1, '157', 1, 1, 'update', '2019-08-18 16:50:12'),
(328, 1, 1, '162', 1, 1, 'update', '2019-08-18 16:50:22'),
(329, 1, 1, '163', 1, 1, 'update', '2019-08-18 16:50:22'),
(330, 1, 1, '153', 1, 1, 'update', '2019-08-18 16:50:22'),
(331, 1, 1, '155', 1, 1, 'update', '2019-08-18 16:50:22'),
(332, 1, 1, '156', 1, 1, 'update', '2019-08-18 16:50:22'),
(333, 1, 1, '157', 1, 1, 'update', '2019-08-18 16:50:22'),
(334, 1, 1, '161', 1, 1, 'update', '2019-08-18 17:41:32'),
(335, 1, 1, '162', 1, 1, 'update', '2019-08-18 17:41:32'),
(336, 1, 1, '153', 1, 1, 'update', '2019-08-18 17:41:32'),
(337, 1, 1, '155', 1, 1, 'update', '2019-08-18 17:41:32'),
(338, 1, 1, '156', 1, 1, 'update', '2019-08-18 17:41:32'),
(339, 1, 1, '157', 1, 1, 'update', '2019-08-18 17:41:32'),
(340, 4, 6, '165', 1, 2, 'update', '2019-08-22 00:22:18'),
(341, 4, 6, '165', 2, 2, 'update', '2019-08-22 00:22:56'),
(342, 4, 6, '165', 2, 3, 'update', '2019-08-22 00:23:09'),
(343, 4, 6, '165', 3, 2, 'update', '2019-08-22 04:11:37'),
(344, 1, 1, '161', 1, 1, 'update', '2019-09-09 07:13:10'),
(345, 1, 1, '162', 1, 1, 'update', '2019-09-09 07:13:10'),
(346, 1, 1, '163', 1, 1, 'update', '2019-09-09 07:13:10'),
(347, 1, 1, '155', 1, 1, 'update', '2019-09-09 07:13:10'),
(348, 1, 1, '156', 1, 1, 'update', '2019-09-09 07:13:10'),
(349, 1, 1, '157', 1, 1, 'update', '2019-09-09 07:13:10'),
(350, 1, 1, '162', 1, 1, 'update', '2019-09-09 07:13:22'),
(351, 1, 1, '153', 1, 1, 'update', '2019-09-09 07:13:22'),
(352, 1, 1, '163', 1, 1, 'update', '2019-09-09 07:13:22'),
(353, 1, 1, '155', 1, 1, 'update', '2019-09-09 07:13:22'),
(354, 1, 1, '156', 1, 1, 'update', '2019-09-09 07:13:22'),
(355, 1, 1, '157', 1, 1, 'update', '2019-09-09 07:13:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(70) NOT NULL,
  `deskripsi_proyek` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_perencanaan_selesai` date NOT NULL,
  `nilai_proyek` varchar(15) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `status_proyek` enum('T','F','P','') NOT NULL DEFAULT 'P',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `deskripsi_proyek`, `tgl_mulai`, `tgl_selesai`, `tgl_perencanaan_selesai`, `nilai_proyek`, `unit_id`, `id_client`, `status_proyek`, `created_by`, `created_at`, `update_by`, `update_at`) VALUES
(1, 'Proyek Gis2', 'teste2', '2019-08-06', '0000-00-00', '2019-07-25', '2147483647', 10, 2, 'P', 1, '2019-08-12 07:47:09', 1, '2019-08-12 06:41:10'),
(2, 'Pre Purchase Inspection Kapal', 'tes', '2019-10-08', '0000-00-00', '2019-12-01', '2147483647', 10, 2, 'P', 1, '2019-08-19 08:46:08', 1, '2019-08-14 02:07:43'),
(3, 'Monitoring gis ', 'tes', '2019-08-27', '0000-00-00', '2019-08-29', '434', 3, 2, 'T', 1, '2019-08-22 00:28:02', 0, '0000-00-00 00:00:00'),
(4, 'ilham proyek', 'tse', '2019-08-26', '0000-00-00', '2019-08-22', '34234', 3, 2, 'P', 1, '2019-08-15 04:19:45', 0, '0000-00-00 00:00:00'),
(5, 'proyek b', 'tes', '2019-08-27', '0000-00-00', '2019-08-23', '465465', 1, 2, 'P', 1, '2019-08-15 04:30:58', 0, '0000-00-00 00:00:00'),
(6, 'tes', 'deskripsi proyek', '2019-08-22', '0000-00-00', '2019-08-30', '2000000', 2, 2, 'T', 1, '2019-08-15 11:25:27', 0, '0000-00-00 00:00:00'),
(7, 'tes', 'tes', '2019-08-15', '0000-00-00', '2019-08-24', '3244324', 1, 2, 'F', 1, '2019-08-15 14:19:02', 0, '0000-00-00 00:00:00'),
(8, 'fsdf', 'tes', '2019-08-27', '0000-00-00', '2019-08-23', '3424', 1, 2, 'T', 1, '2019-08-15 14:22:23', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor`
--

CREATE TABLE `sektor` (
  `id_sektor` int(11) NOT NULL,
  `nama_sektor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sektor`
--

INSERT INTO `sektor` (`id_sektor`, `nama_sektor`) VALUES
(1, 'mimba'),
(2, 'migas'),
(3, 'pendidikan'),
(4, 'infrastruktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_kegiatan`
--

CREATE TABLE `status_kegiatan` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_kegiatan`
--

INSERT INTO `status_kegiatan` (`id_status`, `nama_status`) VALUES
(1, 'Open'),
(2, 'Progress'),
(3, 'Finish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `id_sektor` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`unit_id`, `id_sektor`, `unit_name`) VALUES
(1, 3, 'SI CAB BALIKPAPAN'),
(2, 3, 'SI CAB JAKARTA'),
(3, 3, 'SI CAB MADYA MEDAN'),
(4, 3, 'SI CAB PALEMBANG'),
(5, 4, 'SI CAB PEKANBARU'),
(6, 4, 'SI CAB SURABAYA'),
(7, 4, 'SI CAPRAM ACEH'),
(8, 4, 'SI CAPRAM BANJARBARU'),
(9, 2, 'SI CAB MADYA BATAM'),
(10, 1, 'SI CAPRAM LAMPUNG'),
(11, 1, 'SI CAB MADYA MAKASSAR'),
(12, 2, 'CAPRAM PADANG'),
(13, 1, 'SI CAPRAM PONTIANAK'),
(14, 1, 'SI CAB MADYA SEMARANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(15) NOT NULL,
  `jenis_kelamin` enum('L','P','','') DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `foto` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `jenis_kelamin`, `phone`, `unit_id`, `foto`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$fZKh3EzNCLlrtZ.SgoeAIe23VbaWoRazXYuLoWvkCTix4I3cZ2rBC', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1570352590, 1, 'ilham admin', 'surateno', 'musdev', 'L', '89484937583', 2, 'b104cb359af249dacf25f44a4aa22579.jpg'),
(2, '::1', 'ilhamvannyputra@gmail.com', '$2y$10$qAdCVxJTF1bIrKGu1XXqZOeJPRVqBKqhs/xfDekXx0PX9SDMw5axq', 'ilhamvannyputra@gmail.com', NULL, NULL, 'c4e0eedd0f3c5cded914', '$2y$10$LnV6D5oYeU7Rr5ZY6kKwqe4pn.o/3Hd4IEMe60xv.1PxeYOlgfoce', 1565823217, NULL, NULL, 1564613522, 1565258837, 1, 'ilham2', 'vp', 'musdev', 'P', '738748', 2, '824d7ab5a64618b9072deb07c65f5dbe.png'),
(3, '::1', 'ilhamvannyputra2@gmail.com', '$2y$10$vIn44r1ddvnqS4cEbkLnNe2K2hEN7ktLKKOB5CmedOqaZrAY3ITwy', 'ilhamvannyputra2@gmail.com', NULL, NULL, '471ef83b724ec819bc39', '$2y$10$ckqp2kr43Dd3QoukAbRgFuLET/KvkMIu4fqgJVWcgtwlV0b8obVV2', 1565822897, NULL, NULL, 1565139131, NULL, 1, 'ilham', 'test', 'musdev', 'L', '085783575783', 5, 'ci.png'),
(4, '::1', 'faniaja534@gmail.com', '$2y$10$TQh/18fuhHLJJBdFJ7UC1.JuYIbLO.E6UDVo.3vprUPUEY0RYuZ1i', 'faniaja534@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1565139677, 1565843719, 1, 'hamtar', 'software', 'musdev', 'L', '085183585773', 11, '28c3b78161fcbadf7d6cf6a86cd17113.jpg'),
(5, '::1', 'ilham@ilham.com', '$2y$10$ojQqQGu1TIKKZ2zuDJItTerTHAnv32f5RhJVGji0btYIVTeU0L7q6', 'ilham@ilham.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1565257260, NULL, 1, 'ilham2', 'putra2', 'musdev', 'P', '85783575783223', 5, '27a1e27544d49e288a3dccaa8f2a485d.png'),
(6, '::1', 'ilhamvannyputrapp@gmail.com', '$2y$10$5Z3lpu7t/BZeKp9j3Ai.x.9.cgL9KOugu7DXojmRi1hMYGDuqKvtO', 'ilhamvannyputrapp@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1565257520, 1566421877, 1, 'ilham', 'putra', 'musdev', 'L', '85783575783', 2, '525e7b7adf2df69c89c5e125e863a2e5.png'),
(7, '::1', 'anisshasholeha@gmail.com', '$2y$10$VgJn4/lmY3QUgY3uk5NMPOazssC/nmqr1zjtD1Ysyfqg5kAW4yjjq', 'anisshasholeha@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1565840491, 1565841520, 1, 'anissha', 'sholeha', 'musdev', 'P', '085783575783', 2, ''),
(8, '::1', 'alamnabaroka@gmail.com', '$2y$10$mVISJuRCLEqwwnxJvZzNf.L5HshylpBYzE9MCK1iCZZbY6D5vwuju', 'alamnabaroka@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1565851180, 1565851252, 1, 'ilham', 'unit bisnis', 'musdev', 'L', '85783575783', 1, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `usersektor2`
--
CREATE TABLE `usersektor2` (
`id` int(11) unsigned
,`username` varchar(30)
,`id_sektor` int(11)
,`nama_sektor` varchar(50)
,`unit_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(9, 1, 1),
(15, 2, 2),
(23, 3, 3),
(20, 4, 3),
(12, 5, 3),
(17, 6, 3),
(21, 7, 2),
(24, 8, 2);

-- --------------------------------------------------------

--
-- Struktur untuk view `kegiatansektor`
--
DROP TABLE IF EXISTS `kegiatansektor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kegiatansektor`  AS  select `proyek`.`id_proyek` AS `id_proyek`,`proyek`.`nama_proyek` AS `nama_proyek`,`kegiatan`.`id_kegiatan` AS `id_kegiatan`,`kegiatan`.`nama_kegiatan` AS `nama_kegiatan`,`units`.`unit_id` AS `unit_id`,`sektor`.`id_sektor` AS `id_sektor`,`sektor`.`nama_sektor` AS `nama_sektor` from (((`proyek` join `units`) join `sektor`) join `kegiatan`) where ((`kegiatan`.`id_proyek` = `proyek`.`id_proyek`) and (`proyek`.`unit_id` = `units`.`unit_id`) and (`units`.`id_sektor` = `sektor`.`id_sektor`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `usersektor2`
--
DROP TABLE IF EXISTS `usersektor2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usersektor2`  AS  select `users`.`id` AS `id`,`users`.`username` AS `username`,`sektor`.`id_sektor` AS `id_sektor`,`sektor`.`nama_sektor` AS `nama_sektor`,`units`.`unit_name` AS `unit_name` from (((`users` join `sektor`) join `units`) join `users_groups`) where ((`units`.`id_sektor` = `sektor`.`id_sektor`) and (`users`.`unit_id` = `units`.`unit_id`) and (`users_groups`.`user_id` = `users`.`id`) and (`users_groups`.`group_id` = 3)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_lampiran`
--
ALTER TABLE `bukti_lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `jenis_lampiran` (`id_jenislampiran`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `provinsi_client` (`provinsi_client`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`idjenis_kegiatan`);

--
-- Indexes for table `jenis_lampiran`
--
ALTER TABLE `jenis_lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `status_kegiatan` (`id_status_kegiatan`),
  ADD KEY `id_proyek` (`id_proyek`),
  ADD KEY `jenis_kegiatan` (`jenis_kegiatan`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_kegiatan`
--
ALTER TABLE `log_kegiatan`
  ADD PRIMARY KEY (`id_logkegiatan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id_sektor`);

--
-- Indexes for table `status_kegiatan`
--
ALTER TABLE `status_kegiatan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `id_sektor` (`id_sektor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti_lampiran`
--
ALTER TABLE `bukti_lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `idjenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_lampiran`
--
ALTER TABLE `jenis_lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_kegiatan`
--
ALTER TABLE `log_kegiatan`
  MODIFY `id_logkegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id_sektor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_kegiatan`
--
ALTER TABLE `status_kegiatan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukti_lampiran`
--
ALTER TABLE `bukti_lampiran`
  ADD CONSTRAINT `bukti_lampiran_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`),
  ADD CONSTRAINT `bukti_lampiran_ibfk_2` FOREIGN KEY (`id_jenislampiran`) REFERENCES `jenis_lampiran` (`id_lampiran`),
  ADD CONSTRAINT `bukti_lampiran_ibfk_3` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

--
-- Ketidakleluasaan untuk tabel `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`provinsi_client`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`id_status_kegiatan`) REFERENCES `status_kegiatan` (`id_status`),
  ADD CONSTRAINT `kegiatan_ibfk_3` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`),
  ADD CONSTRAINT `kegiatan_ibfk_4` FOREIGN KEY (`jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`idjenis_kegiatan`);

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`),
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Ketidakleluasaan untuk tabel `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`id_sektor`) REFERENCES `sektor` (`id_sektor`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
