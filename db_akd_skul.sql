-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 09:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_akd_skul`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'owner', '72122ce96bfec66e2396d2e25225d70a', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tmp_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `jk` enum('P','W') NOT NULL,
  `status` varchar(12) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `tmp_lahir`, `tgl_lahir`, `alamat`, `tlp`, `jk`, `status`, `password`) VALUES
('01', 'Hanifah, S.pd.I', 'Surabaya', '1990-07-15', 'Sidoresmo Dalam 37 Surabaya', '0318495449', 'W', 'Aktif', '21232f297a57a5a743894a0e4a801fc3'),
('02', 'Sigit Witono, S.Pd.', 'Nganjuk', '1979-04-20', 'Keputih III/24 Surabaya', '081752552802', 'P', 'Aktif', ''),
('03', 'Izzuddin Aly, S.Pd.I', 'Jombang', '1957-08-24', 'Kendang Sari XV/1F Surabaya', '0318471230', 'P', 'Aktif', ''),
('04', 'Drs. Hendrik Ghozali', 'Surabaya', '0000-00-00', 'surabaya', '081703001999', 'P', 'Aktif', ''),
('05', 'Baihaqi, S.Pd.I', 'Pamekasan', '0000-00-00', 'Wadung Asri Waru Sidoarjo', '0318683432', 'P', 'Aktif', ''),
('06', 'Achmad Djaelani MS.', 'Sidoarjo', '0000-00-00', 'Ds.Jiken Rt.3/2 Tanggulangin', '085707191779', 'P', 'Aktif', '21232f297a57a5a743894a0e4a801fc3'),
('07', 'Drs.H. Abd. Kholiq', 'Lamongan', '0000-00-00', 'Sukodono Sidoarjo', '0317872571', 'P', 'Tidak Aktif', ''),
('08', 'Mas Noer Kholishoh', 'Surabaya', '0000-00-00', 'Sidoresmo Dalam 2/39Surabaya', '0318493279', 'W', 'Aktif', '21232f297a57a5a743894a0e4a801fc3'),
('09', 'Aisyah S.Pd.', 'Surabaya', '0000-00-00', 'Sidoresmo Dalam Surabaya', '0318497170', 'W', 'Tidak Aktif', ''),
('10', 'Nuril Huda, S.Pd.', 'Gresik', '0000-00-00', 'Wadng Asri Waru Sidoarjo', '03177347155', 'P', 'Aktif', ''),
('11', 'A.Basyir F. Muin, S.Pd.', 'Lamongan', '0000-00-00', 'Gebang Wonorejo Glagah Lmg', '08179383752', 'P', 'Aktif', ''),
('12', 'H. A.Hafid Ayatullah, MHI.', 'Sidoarjo', '0000-00-00', 'Sidoresmo Dalam Surabaya', '085648959973', 'P', 'Aktif', ''),
('13', 'Suparto, S.Pd.', 'Tegal', '0000-00-00', 'Jl. Ketintang III/4 Surabaya', '08883557440', 'P', 'Aktif', ''),
('14', 'Farida Khikmiyah, S.HI', 'Surabaya', '0000-00-00', 'Sidoresmo Dalam Surabaya', '0318497170', 'W', 'Aktif', ''),
('15', 'Mas Charisuddin Sakti', 'Surabaya', '0000-00-00', 'Sidoresmo Dalam II/37 Sby', '60909005', 'P', 'Tidak Aktif', ''),
('16', 'H.Mas Kamil Thobroni, S.HI', 'Surabaya', '0000-00-00', 'Sidoresmo Dalam II/37 Sby', '81907900', 'P', 'Aktif', ''),
('17', 'Furjatul Udzma', 'Pekalongan', '0000-00-00', 'Sidoresmo Dalam II/37 Sby', '03160663356', 'W', 'Aktif', ''),
('18', 'Mardiyatul fitriyah', 'Surabaya', '0000-00-00', 'JL. Jagir Wonokroma 140 a', '085731188335', 'W', 'Aktif', ''),
('19', 'Mas indah', 'Surabaya', '0000-00-00', 'Sidoresmo dalam Gg II/37 Surabaya', '000000000000', 'W', 'Aktif', ''),
('20', 'Nurul Chilmiyah, S.Pd', 'Surabaya', '0000-00-00', 'surabaya', '081703001321', 'W', 'Aktif', ''),
('21', 'Nur kholis, s.sos.i', 'Lamongan', '0000-00-00', 'lamongan', '087847302000', 'P', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE IF NOT EXISTS `jadwal_pelajaran` (
`id_jadwal` int(11) NOT NULL,
  `id_waktu` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `tgl_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal`, `id_waktu`, `id_kelas`, `kode_mapel`, `nip`, `tgl_time`) VALUES
(14, 'DW01', 'DK01', 'J', '11', '2016-10-17 19:12:18'),
(15, 'DW01', 'DK02', 'K', '14', '2016-10-17 19:14:59'),
(16, 'DW01', 'DK03', 'N', '15', '2016-10-17 19:24:13'),
(17, 'DW01', 'DK04', 'G', '12', '2016-10-17 19:30:05'),
(18, 'DW01', 'DK05', 'F1', '08', '2016-10-17 19:35:16'),
(19, 'DW01', 'DK06', 'Q', '21', '2016-10-17 19:39:40'),
(20, 'DW02', 'DK01', 'J', '11', '2016-10-17 19:41:50'),
(21, 'DW02', 'DK02', 'K', '14', '2016-10-17 19:43:00'),
(22, 'DW02', 'DK03', 'N', '15', '2016-10-17 19:44:00'),
(23, 'DW02', 'DK04', 'G', '12', '2016-10-17 19:48:38'),
(24, 'DW02', 'DK05', 'F1', '08', '2016-10-17 19:49:17'),
(25, 'DW02', 'DK06', 'Q', '21', '2016-10-17 19:50:27'),
(26, 'DW03', 'DK01', 'Q', '21', '2016-10-17 19:52:41'),
(27, 'DW03', 'DK02', 'J', '11', '2016-10-17 19:54:39'),
(28, 'DW03', 'DK03', 'F1', '08', '2016-10-17 19:55:40'),
(29, 'DW03', 'DK04', 'J', '09', '2016-10-17 19:56:41'),
(30, 'DW03', 'DK05', 'N', '15', '2016-10-17 19:57:36'),
(31, 'DW03', 'DK06', 'G', '12', '2016-10-17 19:58:37'),
(32, 'DW04', 'DK01', 'Q', '21', '2016-10-17 20:01:18'),
(33, 'DW04', 'DK02', 'J', '11', '2016-10-17 20:02:47'),
(34, 'DW04', 'DK03', 'F1', '08', '2016-10-17 20:04:05'),
(35, 'DW04', 'DK04', 'J', '09', '2016-10-17 20:05:22'),
(36, 'DW04', 'DK05', 'N', '15', '2016-10-17 20:06:59'),
(37, 'DW04', 'DK06', 'G', '12', '2016-10-17 20:07:46'),
(38, 'DW06', 'DK01', 'C', '02', '2016-10-17 20:09:24'),
(39, 'DW07', 'DK01', 'C', '02', '2016-10-17 20:11:10'),
(40, 'DW06', 'DK02', 'G', '12', '2016-10-17 20:12:19'),
(41, 'DW07', 'DK02', 'G', '12', '2016-10-17 20:14:10'),
(42, 'DW06', 'DK03', 'Q', '21', '2016-10-17 20:15:28'),
(43, 'DW07', 'DK03', 'Q', '21', '2016-10-17 20:16:21'),
(44, 'DW06', 'DK04', 'K', '14', '2016-10-17 20:17:38'),
(45, 'DW07', 'DK04', 'K', '14', '2016-10-17 20:18:44'),
(46, 'DW06', 'DK05', 'F2', '11', '2016-10-17 20:20:00'),
(47, 'DW07', 'DK05', 'F2', '11', '2016-10-17 20:21:00'),
(48, 'DW08', 'DK05', 'F2', '11', '2016-10-17 20:21:56'),
(49, 'DW06', 'DK06', 'J', '09', '2016-10-17 20:22:51'),
(50, 'DW07', 'DK06', 'J', '09', '2016-10-17 20:23:26'),
(51, 'DW09', 'DK01', 'D2', '01', '2016-10-17 21:21:09'),
(52, 'DW10', 'DK01', 'D2', '01', '2016-10-17 21:22:09'),
(53, 'DW11', 'DK01', 'F2', '08', '2016-10-17 21:25:24'),
(54, 'DW12', 'DK01', 'F2', '08', '2016-10-17 21:26:10'),
(55, 'DW14', 'DK01', 'J', '11', '2016-10-17 21:27:22'),
(56, 'DW15', 'DK01', 'J', '11', '2016-10-17 21:28:06'),
(57, 'DW09', 'DK02', 'J', '11', '2016-10-17 21:32:36'),
(58, 'DW10', 'DK02', 'J', '11', '2016-10-17 21:33:19'),
(59, 'DW11', 'DK02', 'D1', '05', '2016-10-17 21:54:59'),
(60, 'DW12', 'DK02', 'D1', '05', '2016-10-17 21:57:23'),
(61, 'DW14', 'DK02', 'O', '16', '2016-10-17 21:58:22'),
(62, 'DW15', 'DK02', 'O', '16', '2016-10-17 21:59:03'),
(63, 'DW09', 'DK03', 'F1', '08', '2016-10-17 22:05:53'),
(64, 'DW10', 'DK03', 'F1', '08', '2016-10-17 22:06:27'),
(65, 'DW11', 'DK03', 'F2', '11', '2016-10-17 22:07:27'),
(66, 'DW12', 'DK03', 'F2', '11', '2016-10-17 22:08:26'),
(67, 'DW14', 'DK03', 'J', '09', '2016-10-17 22:11:07'),
(68, 'DW15', 'DK03', 'J', '09', '2016-10-17 22:11:46'),
(69, 'DW09', 'DK04', 'O', '16', '2016-10-17 22:12:45'),
(70, 'DW10', 'DK04', 'O', '16', '2016-10-17 22:13:17'),
(71, 'DW11', 'DK04', 'H', '06', '2016-10-17 22:14:32'),
(72, 'DW12', 'DK04', 'H', '06', '2016-10-17 22:15:32'),
(73, 'DW14', 'DK04', 'D1', '05', '2016-10-17 22:16:15'),
(74, 'DW15', 'DK04', 'D1', '05', '2016-10-17 22:16:55'),
(75, 'DW09', 'DK05', 'D1', '14', '2016-10-17 22:17:44'),
(76, 'DW10', 'DK05', 'D1', '14', '2016-10-17 22:18:11'),
(77, 'DW11', 'DK05', 'J', '09', '2016-10-17 22:18:48'),
(78, 'DW12', 'DK05', 'J', '09', '2016-10-17 22:19:15'),
(79, 'DW14', 'DK05', 'A', '01', '2016-10-17 22:20:00'),
(80, 'DW15', 'DK05', 'A', '01', '2016-10-17 22:20:29'),
(81, 'DW09', 'DK06', 'D2', '05', '2016-10-17 22:21:35'),
(82, 'DW10', 'DK06', 'D2', '05', '2016-10-17 22:22:01'),
(83, 'DW11', 'DK06', 'D1', '14', '2016-10-17 22:22:40'),
(84, 'DW12', 'DK06', 'D1', '14', '2016-10-17 22:23:09'),
(85, 'DW14', 'DK06', 'H', '06', '2016-10-17 22:23:54'),
(86, 'DW15', 'DK06', 'H', '06', '2016-10-17 22:24:24'),
(87, 'DW17', 'DK01', 'O', '16', '2016-10-18 17:58:37'),
(88, 'DW18', 'DK01', 'O', '16', '2016-10-18 17:59:14'),
(89, 'DW19', 'DK01', 'I', '10', '2016-10-18 18:00:42'),
(90, 'DW20', 'DK01', 'I', '10', '2016-10-18 18:01:18'),
(91, 'DW22', 'DK01', 'F1', '08', '2016-10-18 18:02:04'),
(92, 'DW23', 'DK01', 'F1', '08', '2016-10-18 18:02:41'),
(93, 'DW17', 'DK02', 'P', '17', '2016-10-18 18:04:02'),
(94, 'DW18', 'DK02', 'P', '17', '2016-10-18 18:04:27'),
(95, 'DW19', 'DK02', 'D2', '01', '2016-10-18 18:05:06'),
(96, 'DW20', 'DK02', 'D2', '01', '2016-10-18 18:05:31'),
(97, 'DW22', 'DK02', 'B', '04', '2016-10-18 18:06:31'),
(98, 'DW23', 'DK02', 'B', '04', '2016-10-18 18:06:58'),
(99, 'DW17', 'DK03', 'I', '10', '2016-10-18 18:07:44'),
(100, 'DW18', 'DK03', 'I', '10', '2016-10-18 18:08:15'),
(101, 'DW19', 'DK03', 'C', '02', '2016-10-18 18:09:07'),
(102, 'DW20', 'DK03', 'F1', '02', '2016-10-18 18:09:35'),
(103, 'DW22', 'DK03', 'O', '16', '2016-10-18 18:10:16'),
(104, 'DW23', 'DK03', 'O', '16', '2016-10-18 18:10:40'),
(105, 'DW17', 'DK04', 'E', '03', '2016-10-18 18:11:27'),
(106, 'DW18', 'DK04', 'E', '03', '2016-10-18 18:11:51'),
(107, 'DW19', 'DK04', 'B', '04', '2016-10-18 18:12:48'),
(108, 'DW20', 'DK04', 'B', '04', '2016-10-18 18:13:17'),
(109, 'DW22', 'DK04', 'I', '10', '2016-10-18 18:13:59'),
(110, 'DW23', 'DK04', 'I', '10', '2016-10-18 18:14:30'),
(111, 'DW17', 'DK05', 'F1', '08', '2016-10-18 18:15:13'),
(112, 'DW18', 'DK05', 'F1', '08', '2016-10-18 18:15:41'),
(113, 'DW19', 'DK05', 'E', '03', '2016-10-18 18:16:17'),
(114, 'DW20', 'DK05', 'E', '03', '2016-10-18 18:16:49'),
(115, 'DW22', 'DK05', 'C', '02', '2016-10-18 18:17:34'),
(116, 'DW23', 'DK05', 'C', '02', '2016-10-18 18:18:15'),
(117, 'DW17', 'DK06', 'B', '04', '2016-10-18 18:19:00'),
(118, 'DW18', 'DK06', 'B', '04', '2016-10-18 18:19:26'),
(119, 'DW19', 'DK06', 'P', '17', '2016-10-18 18:20:01'),
(120, 'DW20', 'DK06', 'P', '17', '2016-10-18 18:20:28'),
(121, 'DW22', 'DK06', 'E', '03', '2016-10-18 18:21:04'),
(122, 'DW23', 'DK06', 'E', '03', '2016-10-18 18:21:31'),
(123, 'DW25', 'DK01', 'B', '04', '2016-10-18 18:37:37'),
(124, 'DW26', 'DK01', 'B', '04', '2016-10-18 18:39:11'),
(125, 'DW37', 'DK01', 'E', '03', '2016-10-18 18:41:19'),
(126, 'DW38', 'DK01', 'E', '03', '2016-10-18 18:42:52'),
(127, 'DW40', 'DK01', 'M', '13', '2016-10-18 18:44:24'),
(128, 'DW41', 'DK01', 'M', '13', '2016-10-18 18:45:29'),
(129, 'DW25', 'DK02', 'E', '03', '2016-10-18 18:47:49'),
(130, 'DW26', 'DK02', 'E', '03', '2016-10-18 18:48:15'),
(131, 'DW37', 'DK02', 'S', '20', '2016-10-18 18:58:00'),
(132, 'DW38', 'DK02', 'S', '20', '2016-10-18 18:59:09'),
(133, 'DW40', 'DK02', 'Q', '21', '2016-10-18 19:00:36'),
(134, 'DW41', 'DK02', 'Q', '21', '2016-10-18 19:01:18'),
(135, 'DW25', 'DK03', 'M', '13', '2016-10-18 19:05:43'),
(136, 'DW26', 'DK03', 'M', '13', '2016-10-18 19:06:24'),
(137, 'DW37', 'DK03', 'B', '04', '2016-10-18 19:07:23'),
(138, 'DW38', 'DK03', 'B', '04', '2016-10-18 19:08:15'),
(139, 'DW40', 'DK03', 'E', '03', '2016-10-18 19:09:27'),
(140, 'DW41', 'DK03', 'E', '03', '2016-10-18 19:09:54'),
(141, 'DW25', 'DK04', 'J', '09', '2016-10-18 19:12:23'),
(142, 'DW26', 'DK04', 'J', '09', '2016-10-18 19:13:01'),
(143, 'DW37', 'DK04', 'Q', '21', '2016-10-18 19:14:18'),
(144, 'DW38', 'DK04', 'Q', '21', '2016-10-18 19:15:44'),
(145, 'DW40', 'DK04', 'S', '20', '2016-10-18 19:17:28'),
(146, 'DW41', 'DK04', 'S', '20', '2016-10-18 19:19:07'),
(147, 'DW25', 'DK05', 'Q', '21', '2016-10-18 19:21:20'),
(148, 'DW26', 'DK05', 'Q', '21', '2016-10-18 19:23:17'),
(149, 'DW37', 'DK05', 'C', '02', '2016-10-18 19:25:10'),
(150, 'DW38', 'DK05', 'C', '02', '2016-10-18 19:25:44'),
(151, 'DW40', 'DK05', 'B', '04', '2016-10-18 19:26:20'),
(152, 'DW41', 'DK05', 'B', '04', '2016-10-18 19:26:47'),
(153, 'DW25', 'DK06', 'S', '20', '2016-10-18 19:27:30'),
(154, 'DW26', 'DK06', 'S', '20', '2016-10-18 19:28:03'),
(155, 'DW37', 'DK06', 'M', '13', '2016-10-18 19:28:36'),
(156, 'DW38', 'DK06', 'M', '13', '2016-10-18 19:29:02'),
(157, 'DW40', 'DK06', 'J', '09', '2016-10-18 19:29:32'),
(158, 'DW41', 'DK06', 'J', '09', '2016-10-18 19:30:07'),
(159, 'DW43', 'DK01', 'A', '01', '2016-10-18 19:39:54'),
(160, 'DW44', 'DK01', 'A', '01', '2016-10-18 19:40:29'),
(161, 'DW45', 'DK01', 'K', '14', '2016-10-18 19:41:27'),
(162, 'DW46', 'DK01', 'K', '14', '2016-10-18 19:41:56'),
(163, 'DW48', 'DK01', 'C', '02', '2016-10-18 19:42:34'),
(164, 'DW49', 'DK01', 'C', '02', '2016-10-18 19:43:05'),
(165, 'DW43', 'DK02', 'H', '06', '2016-10-18 19:44:56'),
(166, 'DW44', 'DK02', 'H', '06', '2016-10-18 19:45:56'),
(167, 'DW45', 'DK02', 'I', '10', '2016-10-18 19:47:31'),
(168, 'DW46', 'DK02', 'I', '10', '2016-10-18 19:48:13'),
(169, 'DW48', 'DK02', 'M', '13', '2016-10-18 19:49:18'),
(170, 'DW49', 'DK02', 'M', '13', '2016-10-18 19:50:13'),
(171, 'DW43', 'DK03', 'J', '09', '2016-10-18 19:51:11'),
(172, 'DW44', 'DK03', 'J', '09', '2016-10-18 19:51:42'),
(173, 'DW45', 'DK03', 'C', '02', '2016-10-18 19:56:54'),
(174, 'DW46', 'DK03', 'C', '02', '2016-10-18 19:57:34'),
(175, 'DW48', 'DK03', 'A', '01', '2016-10-18 19:58:10'),
(176, 'DW49', 'DK03', 'A', '01', '2016-10-18 19:58:38'),
(177, 'DW43', 'DK04', 'M', '13', '2016-10-18 19:59:14'),
(178, 'DW44', 'DK04', 'M', '13', '2016-10-18 19:59:41'),
(179, 'DW45', 'DK04', 'P', '17', '2016-10-18 20:00:29'),
(180, 'DW46', 'DK04', 'P', '17', '2016-10-18 20:00:58'),
(181, 'DW48', 'DK04', 'H', '06', '2016-10-18 20:01:36'),
(182, 'DW49', 'DK04', 'H', '06', '2016-10-18 20:02:20'),
(183, 'DW43', 'DK05', 'I', '10', '2016-10-18 20:03:12'),
(184, 'DW44', 'DK05', 'I', '10', '2016-10-18 20:04:12'),
(185, 'DW45', 'DK05', 'M', '13', '2016-10-18 20:05:33'),
(186, 'DW46', 'DK05', 'M', '13', '2016-10-18 20:06:14'),
(187, 'DW48', 'DK05', 'J', '09', '2016-10-18 20:07:10'),
(188, 'DW49', 'DK05', 'J', '09', '2016-10-18 20:07:52'),
(189, 'DW43', 'DK06', 'K', '14', '2016-10-18 20:09:02'),
(190, 'DW44', 'DK06', 'K', '14', '2016-10-18 20:09:35'),
(191, 'DW45', 'DK06', 'H', '06', '2016-10-18 20:10:25'),
(192, 'DW46', 'DK06', 'H', '06', '2016-10-18 20:11:05'),
(193, 'DW48', 'DK06', 'I', '10', '2016-10-18 20:12:48'),
(194, 'DW49', 'DK06', 'I', '10', '2016-10-18 20:13:51'),
(195, 'DW51', 'DK01', 'D1', '05', '2016-10-18 20:19:50'),
(196, 'DW52', 'DK01', 'D1', '05', '2016-10-18 20:20:12'),
(197, 'DW53', 'DK01', 'N', '19', '2016-10-18 20:21:24'),
(198, 'DW54', 'DK01', 'N', '19', '2016-10-18 20:21:52'),
(199, 'DW56', 'DK01', 'G', '12', '2016-10-18 20:22:45'),
(200, 'DW57', 'DK01', 'G', '12', '2016-10-18 20:23:12'),
(201, 'DW51', 'DK02', 'P', '17', '2016-10-18 20:23:50'),
(202, 'DW52', 'DK02', 'P', '17', '2016-10-18 20:24:24'),
(203, 'DW53', 'DK02', 'A', '01', '2016-10-18 20:24:55'),
(204, 'DW54', 'DK02', 'A', '01', '2016-10-18 20:25:24'),
(205, 'DW56', 'DK02', 'N', '19', '2016-10-18 20:26:11'),
(206, 'DW57', 'DK02', 'N', '19', '2016-10-18 20:26:38'),
(207, 'DW51', 'DK03', 'K', '14', '2016-10-18 20:27:49'),
(208, 'DW52', 'DK03', 'K', '14', '2016-10-18 20:28:42'),
(209, 'DW53', 'DK03', 'G', '12', '2016-10-18 20:29:48'),
(210, 'DW54', 'DK03', 'G', '12', '2016-10-18 20:31:05'),
(211, 'DW56', 'DK03', 'D1', '05', '2016-10-18 20:31:56'),
(212, 'DW57', 'DK03', 'D1', '05', '2016-10-18 20:32:39'),
(213, 'DW51', 'DK04', 'N', '15', '2016-10-18 20:33:55'),
(214, 'DW52', 'DK04', 'N', '15', '2016-10-18 20:34:38'),
(215, 'DW53', 'DK04', 'P', '17', '2016-10-18 20:35:27'),
(216, 'DW54', 'DK04', 'P', '17', '2016-10-18 20:36:04'),
(217, 'DW56', 'DK04', 'A', '01', '2016-10-18 20:36:48'),
(218, 'DW57', 'DK04', 'A', '01', '2016-10-18 20:37:12'),
(219, 'DW51', 'DK05', 'G', '12', '2016-10-18 20:37:50'),
(220, 'DW52', 'DK05', 'G', '12', '2016-10-18 20:38:21'),
(221, 'DW53', 'DK05', 'D2', '05', '2016-10-18 20:38:57'),
(222, 'DW54', 'DK05', 'D2', '05', '2016-10-18 20:39:26'),
(223, 'DW56', 'DK05', 'K', '14', '2016-10-18 20:40:16'),
(224, 'DW57', 'DK05', 'K', '14', '2016-10-18 20:40:47'),
(225, 'DW51', 'DK06', 'A', '01', '2016-10-18 20:42:24'),
(226, 'DW52', 'DK06', 'A', '01', '2016-10-18 20:42:51'),
(227, 'DW53', 'DK06', 'N', '15', '2016-10-18 20:43:35'),
(228, 'DW54', 'DK06', 'N', '15', '2016-10-18 20:44:14'),
(229, 'DW56', 'DK06', 'P', '17', '2016-10-18 20:45:11'),
(230, 'DW57', 'DK06', 'P', '17', '2016-10-18 20:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('101', 'IPA'),
('102', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(5) NOT NULL,
  `kelas_bagian` varchar(15) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kelas_bagian`, `semester`, `tahun`, `nip`) VALUES
('DK01', 'X', 'IPA', 'Ganjil', 2016, '21'),
('DK02', 'X', 'IPS', 'Ganjil', 2016, '17'),
('DK03', 'XI', 'IPA', 'Ganjil', 2016, '09'),
('DK04', 'XI', 'IPS', 'Ganjil', 2016, '06'),
('DK05', 'XII', 'IPA', 'Ganjil', 2016, '14'),
('DK06', 'XII', 'IPS', 'Ganjil', 2016, '10');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_detail`
--

CREATE TABLE IF NOT EXISTS `kelas_detail` (
  `id_kelas` varchar(10) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_detail`
--

INSERT INTO `kelas_detail` (`id_kelas`, `nis`, `keterangan`) VALUES
('DK01', '20160002', 'Aktif'),
('DK01', '20160003', 'Aktif'),
('DK01', '20160004', 'Aktif'),
('DK01', '20160005', 'Aktif'),
('DK01', '20160007', 'Aktif'),
('DK01', '20160010', 'Aktif'),
('DK01', '20160011', 'Aktif'),
('DK01', '20160012', 'Aktif'),
('DK01', '20160013', 'Aktif'),
('DK01', '20160014', 'Aktif'),
('DK01', '20160019', 'Aktif'),
('DK01', '20160020', 'Aktif'),
('DK01', '20160021', 'Aktif'),
('DK01', '20160023', 'Aktif'),
('DK01', '20160024', 'Aktif'),
('DK01', '20160026', 'Aktif'),
('DK01', '20160027', 'Aktif'),
('DK01', '20160028', 'Aktif'),
('DK01', '20160030', 'Aktif'),
('DK01', '20160034', 'Aktif'),
('DK01', '20160035', 'Aktif'),
('DK01', '20160037', 'Aktif'),
('DK01', '20160038', 'Aktif'),
('DK01', '20160040', 'Aktif'),
('DK01', '20160041', 'Aktif'),
('DK01', '20160045', 'Aktif'),
('DK01', '20160048', 'Aktif'),
('DK01', '20160049', 'Aktif'),
('DK01', '20160051', 'Aktif'),
('DK01', '20160054', 'Aktif'),
('DK01', '20160055', 'Aktif'),
('DK01', '20160056', 'Aktif'),
('DK01', '20160058', 'Aktif'),
('DK01', '20160061', 'Aktif'),
('DK01', '20160063', 'Aktif'),
('DK01', '20160065', 'Aktif'),
('DK01', '20160067', 'Aktif'),
('DK01', '20160069', 'Aktif'),
('DK01', '20160075', 'Aktif'),
('DK01', '20160077', 'Aktif'),
('DK02', '20160001', 'Aktif'),
('DK02', '20160006', 'Aktif'),
('DK02', '20160008', 'Aktif'),
('DK02', '20160009', 'Aktif'),
('DK02', '20160015', 'Aktif'),
('DK02', '20160016', 'Aktif'),
('DK02', '20160017', 'Aktif'),
('DK02', '20160018', 'Aktif'),
('DK02', '20160022', 'Aktif'),
('DK02', '20160025', 'Aktif'),
('DK02', '20160029', 'Aktif'),
('DK02', '20160031', 'Aktif'),
('DK02', '20160032', 'Aktif'),
('DK02', '20160033', 'Aktif'),
('DK02', '20160036', 'Aktif'),
('DK02', '20160039', 'Aktif'),
('DK02', '20160042', 'Aktif'),
('DK02', '20160043', 'Aktif'),
('DK02', '20160044', 'Aktif'),
('DK02', '20160046', 'Aktif'),
('DK02', '20160047', 'Aktif'),
('DK02', '20160050', 'Aktif'),
('DK02', '20160052', 'Aktif'),
('DK02', '20160053', 'Aktif'),
('DK02', '20160057', 'Aktif'),
('DK02', '20160059', 'Aktif'),
('DK02', '20160060', 'Aktif'),
('DK02', '20160062', 'Aktif'),
('DK02', '20160064', 'Aktif'),
('DK02', '20160066', 'Aktif'),
('DK02', '20160068', 'Aktif'),
('DK02', '20160070', 'Aktif'),
('DK02', '20160071', 'Aktif'),
('DK02', '20160072', 'Aktif'),
('DK02', '20160073', 'Aktif'),
('DK02', '20160074', 'Aktif'),
('DK02', '20160076', 'Aktif'),
('DK02', '20160078', 'Aktif'),
('DK02', '20160079', 'Aktif'),
('DK02', '20160080', 'Aktif'),
('DK02', '20160081', 'Aktif'),
('DK03', '20150001', 'Aktif'),
('DK03', '20150002', 'Aktif'),
('DK03', '20150003', 'Aktif'),
('DK03', '20150004', 'Aktif'),
('DK03', '20150008', 'Aktif'),
('DK03', '20150010', 'Aktif'),
('DK03', '20150012', 'Aktif'),
('DK03', '20150013', 'Aktif'),
('DK03', '20150017', 'Aktif'),
('DK03', '20150018', 'Aktif'),
('DK03', '20150019', 'Aktif'),
('DK03', '20150021', 'Aktif'),
('DK03', '20150022', 'Aktif'),
('DK03', '20150024', 'Aktif'),
('DK03', '20150029', 'Aktif'),
('DK03', '20150030', 'Aktif'),
('DK03', '20150031', 'Aktif'),
('DK03', '20150032', 'Aktif'),
('DK03', '20150033', 'Aktif'),
('DK03', '20150036', 'Aktif'),
('DK03', '20150037', 'Aktif'),
('DK03', '20150046', 'Aktif'),
('DK03', '20150048', 'Aktif'),
('DK03', '20150049', 'Aktif'),
('DK03', '20150052', 'Aktif'),
('DK04', '20150005', 'Aktif'),
('DK04', '20150006', 'Aktif'),
('DK04', '20150007', 'Aktif'),
('DK04', '20150009', 'Aktif'),
('DK04', '20150011', 'Aktif'),
('DK04', '20150014', 'Aktif'),
('DK04', '20150015', 'Aktif'),
('DK04', '20150016', 'Aktif'),
('DK04', '20150020', 'Aktif'),
('DK04', '20150023', 'Aktif'),
('DK04', '20150025', 'Aktif'),
('DK04', '20150026', 'Aktif'),
('DK04', '20150027', 'Aktif'),
('DK04', '20150028', 'Aktif'),
('DK04', '20150034', 'Aktif'),
('DK04', '20150035', 'Aktif'),
('DK04', '20150038', 'Aktif'),
('DK04', '20150039', 'Aktif'),
('DK04', '20150040', 'Aktif'),
('DK04', '20150041', 'Aktif'),
('DK04', '20150042', 'Aktif'),
('DK04', '20150043', 'Aktif'),
('DK04', '20150044', 'Aktif'),
('DK04', '20150045', 'Aktif'),
('DK04', '20150047', 'Aktif'),
('DK04', '20150050', 'Aktif'),
('DK04', '20150051', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `kode_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(35) NOT NULL,
  `keterangan` text NOT NULL,
  `sts_mapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_mapel`, `keterangan`, `sts_mapel`) VALUES
('A', 'Nahwu-Shorof', 'Guru pengajar Hanifah, S.Pd.I', 'reguler'),
('B', 'B. Arab', 'Guru pengajar Drs. Hendrik Ghozali', 'reguler'),
('C', 'Fisika', 'Guru pengajar Sigit Witono, S.Pd', 'reguler'),
('D1', 'Fiqih', 'Guru pengajar Baihaqi, S.Pd.I', 'reguler'),
('D2', 'SKI', 'Guru pengajar Baihaqi, S.Pd.I', 'reguler'),
('E', 'Aqidah Akhlaq', 'Guru pengajar Izzudin Aly, S.Pd.I', 'reguler'),
('F1', 'KIMIA', 'Guru pengajar Mas Noer Kholishoh', 'reguler'),
('F2', 'Biologi', 'Guru pengajar Mas Noer Kholishoh', 'reguler'),
('G', 'Qur''an Hadits', 'Guru pengajar H. A. Hafid Ayatullah,M.HI', 'reguler'),
('H', 'Geografi', 'Guru pengajar Akhmad Djaelani', 'reguler'),
('I', 'Bahasa Inggris', 'Guru pengajar Nuril Huda, S.Pd', 'reguler'),
('J', 'Matematika', 'Guru pengajar Aisyah, S.Pd', 'reguler'),
('K', 'Bhs indonesia', 'Guru pengajar Farida Khikmiyah, S.HI', 'reguler'),
('L1', 'Biologi', 'Guru pengajar A. Basyir F. Muin, S.Pd', 'reguler'),
('L2', 'Matematika', 'Guru pengajar A. Basyir F. Muin, S.Pd', 'reguler'),
('M', 'TIK/prakarya', 'Guru pengajar Suparto, S.Pd', 'reguler'),
('N', 'sejarah', 'Guru pengajar Mas Charisuddin Sakti,', 'reguler'),
('O', 'Tauhid', 'Guru pengajar H. Mas Kamil Thobroni, S.HI', 'reguler'),
('P', 'Eko/Akunt', 'Guru pengajar Furjatul Udzma', 'reguler'),
('Q', 'PKn', 'Guru pengajar Nur Kholis, S.Sos.I', 'reguler'),
('S', 'Sosiologi', 'Guru pengajar Nurul Chilmiyah, S.Pd', 'reguler'),
('T', 'sejarah', 'Guru pengajar Mas indah', 'reguler'),
('UN01', 'Matematika', 'nilai un matematika', 'un'),
('UN02', 'Bahasa Indonesia', 'un bahasa indonesia', 'un'),
('UN03', 'Bahasa Inggris', 'un bahasa inggris', 'un');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
`id_materi` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_materi` varchar(150) NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `nama_file` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `nip`, `nama_materi`, `tgl_upload`, `nama_file`, `keterangan`) VALUES
(2, '1024', 'Modul Pengajaran Matematika 2', '2016-08-18 18:01:16', '87_Pertanyaan_Untuk_Soal_Nomor.docx', 'keterangan'),
(3, '1024', 'Modul Pengajaran Fisika', '2016-08-18 18:05:35', 'Sample_32_Chart.docx', 'Belajar fisika'),
(4, '1022', 'agama', '2016-08-25 10:50:22', '58_58.pdf', 'haha'),
(5, '01', 'bahasa', '2016-09-05 12:41:53', '38_394-1358-1-PB_2.pdf', 'dgfshsfhgfnjgn'),
(6, '06', 'geografi', '2016-10-19 11:13:51', '59_58.pdf', 'di pelajari'),
(7, '06', 'geografi', '2016-10-25 13:26:03', '24_394-1358-1-PB_2.pdf', 'tugas');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id_nilai` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `tugas` decimal(10,0) NOT NULL DEFAULT '0',
  `uts` decimal(10,0) NOT NULL DEFAULT '0',
  `uas` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `id_kelas`, `kode_mapel`, `tugas`, `uts`, `uas`) VALUES
(9, '1208205702970002', 'KL07', 'A', '100', '60', '80'),
(10, '1256015807990007', 'KL07', 'A', '80', '87', '87'),
(11, '1256161812970003', 'KL07', 'A', '97', '86', '97'),
(12, '1256165507980006', 'KL07', 'A', '96', '79', '68'),
(13, '1256190811960001', 'KL07', 'A', '88', '66', '99'),
(14, '1256230801960003', 'KL07', 'A', '68', '99', '78'),
(15, '1256244611970001', 'KL07', 'A', '99', '77', '99'),
(16, '1256245703980007', 'KL07', 'A', '77', '99', '77'),
(17, '1256246903970003', 'KL07', 'A', '99', '0', '88'),
(18, '3526176304370001', 'KL07', 'A', '87', '78', '99'),
(19, '35717122709970004', 'KL07', 'A', '9', '88', '77'),
(20, '3578020610950002', 'KL07', 'A', '89', '99', '88'),
(21, '3578030811960001', 'KL07', 'A', '99', '88', '99'),
(22, '3578036402970004', 'KL07', 'A', '0', '9', '88'),
(23, '3578040604970003', 'KL07', 'A', '99', '88', '99'),
(24, '3578046612950001', 'KL07', 'A', '87', '77', '88'),
(25, '3578055803960001', 'KL07', 'A', '99', '99', '0'),
(26, '3578061605960012', 'KL07', 'A', '88', '77', '88'),
(27, '3578070805960002', 'KL07', 'A', '77', '88', '78'),
(28, '3578080803960002', 'KL07', 'A', '89', '99', '77'),
(29, '3578110806950001', 'KL07', 'A', '99', '77', '88'),
(30, '3578114111960001', 'KL07', 'A', '77', '88', '77'),
(31, '3578115809940001', 'KL07', 'A', '99', '77', '9'),
(32, '3578122612960001', 'KL07', 'A', '9', '77', '66'),
(33, '3578126606970001', 'KL07', 'A', '88', '77', '89'),
(34, '3578152607940003', 'KL07', 'A', '9', '77', '88'),
(35, '3578153010960001', 'KL07', 'A', '77', '8', '66'),
(36, '3578160603970007', 'KL07', 'A', '6', '8', '99'),
(37, '3578165212550005', 'KL07', 'A', '9', '77', '99'),
(38, '3578172211960001', 'KL07', 'A', '7', '89', '7'),
(39, '3578232112950003', 'KL07', 'A', '89', '7', '99'),
(40, '3578245809960004', 'KL07', 'A', '76', '99', '77'),
(41, '20150005', 'DK04', 'H', '80', '70', '85'),
(42, '20150006', 'DK04', 'H', '70', '90', '80'),
(43, '20150007', 'DK04', 'H', '80', '85', '90'),
(44, '20150009', 'DK04', 'H', '90', '80', '80'),
(45, '20150011', 'DK04', 'H', '80', '85', '80'),
(46, '20150014', 'DK04', 'H', '75', '80', '80'),
(47, '20150015', 'DK04', 'H', '0', '0', '0'),
(48, '20150016', 'DK04', 'H', '0', '0', '0'),
(49, '20150020', 'DK04', 'H', '0', '0', '0'),
(50, '20150023', 'DK04', 'H', '0', '0', '0'),
(51, '20150025', 'DK04', 'H', '0', '0', '0'),
(52, '20150026', 'DK04', 'H', '0', '0', '0'),
(53, '20150027', 'DK04', 'H', '0', '0', '0'),
(54, '20150028', 'DK04', 'H', '0', '0', '0'),
(55, '20150034', 'DK04', 'H', '0', '0', '0'),
(56, '20150035', 'DK04', 'H', '0', '0', '0'),
(57, '20150038', 'DK04', 'H', '0', '0', '0'),
(58, '20150039', 'DK04', 'H', '0', '0', '0'),
(59, '20150040', 'DK04', 'H', '0', '0', '0'),
(60, '20150041', 'DK04', 'H', '0', '0', '0'),
(61, '20150042', 'DK04', 'H', '0', '0', '0'),
(62, '20150043', 'DK04', 'H', '0', '0', '0'),
(63, '20150044', 'DK04', 'H', '0', '0', '0'),
(64, '20150045', 'DK04', 'H', '0', '0', '0'),
(65, '20150047', 'DK04', 'H', '0', '0', '0'),
(66, '20150050', 'DK04', 'H', '0', '0', '0'),
(67, '20150051', 'DK04', 'H', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_un`
--

CREATE TABLE IF NOT EXISTS `nilai_un` (
`id_nilai` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `nilai` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_un`
--

INSERT INTO `nilai_un` (`id_nilai`, `nis`, `kode_mapel`, `nilai`) VALUES
(3, '1256230801960003', 'UN02', '40'),
(4, '1256230801960003', 'UN03', '90'),
(5, '35717122709970004', 'UN01', '80');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE IF NOT EXISTS `pengaturan` (
  `semester` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama_kepsek` varchar(100) DEFAULT NULL,
  `nama_waka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`semester`, `tahun`, `nama_kepsek`, `nama_waka`) VALUES
('Ganjil', 2016, 'Hanifah, S.Pd.I', 'Sigit Witono, S.Pd.');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tmp_lahir` varchar(35) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_ortu` varchar(35) NOT NULL,
  `agama` varchar(35) NOT NULL,
  `jk` enum('P','W') NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `foto` varchar(35) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_jurusan` varchar(10) NOT NULL,
  `password` varchar(35) NOT NULL,
  `thn_masuk` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `tmp_lahir`, `tgl_lahir`, `alamat`, `nama_ortu`, `agama`, `jk`, `tlp`, `kelas`, `foto`, `status`, `id_jurusan`, `password`, `thn_masuk`) VALUES
('20150001', 'RAHMAWATI', 'Surabaya', '2000-05-04', 'ASEMROWO Gg MULYO NO 71', 'ROKIP', '', 'W', '087820800025', 'X', '', '', '102', '', 2015),
('20150002', 'MOCH. FAQIH', 'SURABAYA', '2000-05-14', 'BONOWATI 2 / 6', 'H. ABDULLAH', '', 'P', '087720881072', '11', '', '', '101', '', 2015),
('20150003', 'ISOMATUL WAFIROH', 'SURABAYA', '2000-03-22', 'JL. PANDUGO Gg 1 / 20', 'HIDAYATULLOH', '', 'W', '085723098849', '11', '', '', '101', '', 2015),
('20150004', 'M. RIZAL', 'SURABAYA', '2000-05-01', 'BARATAJAYA 17 / 35', 'MATRU''I', '', '', '085864789571', '11', '', '', '101', '', 2015),
('20150005', 'LILIK HARIYANTI', 'SURABAYA', '1999-11-22', 'KEDUNG BARUK 121-A', 'YUSUF', '', 'W', '085624091608', '11', '', '', '102', '', 2015),
('20150006', 'NUR SYAFI''IYAH', 'SURABAYA', '2000-11-09', 'BULAK BANTENG WETAN 20 / 1', 'RIDA''I', '', 'W', '085723939295', '11', '', '', '102', '', 2015),
('20150007', 'FAUZIYANA RAHMATIKA', 'SURABAYA', '1999-10-16', 'TANAH MERAH SAYUR 2 / 47', 'JUMA''I', '', 'W', '085863239860', '11', '', '', '102', '', 2015),
('20150008', 'NOVIA AYU AMBARWATI', 'BANGKALAN', '1999-06-16', 'KEDINDING LOR PALEM 4/8', 'HARTONO', '', 'W', '08977540014', '11', '', '', '101', '', 2015),
('20150009', 'MASFUFAH', 'SURABAYA', '2001-04-05', 'TAMBAK DALAM BARU VII NO 19', 'MAT BEHRI', '', 'W', '085721074545', '11', '', '', '102', '', 2015),
('20150010', 'ACHMAD BARIZI', 'SURABAYA', '2000-02-02', 'TEMPEL SUKOREJO 6/5-A', 'MAT JEI', '', 'P', '085860479019', '11', '', '', '101', '', 2015),
('20150011', 'ABDUL HAFID DASUKI', 'SURABAYA', '2000-02-07', 'SOMBO 7/42 SIDOTOPO SEMAMPIR', 'BUKHORI', '', 'P', '087820488671', '11', '', '', '102', '', 2015),
('20150012', 'YENI WIDYAWATI', 'BANGKALAN', '1999-12-30', 'DSN. RABESEN PARSEH SOCAH BANGKALAN', 'RIFAI', '', 'W', '085695233334', '11', '', '', '101', '', 2015),
('20150013', 'MUTIK', 'BANGKALAN', '2000-09-09', 'DSN. MURAGUNG UTARA SOCAH BANGKALAN', 'MUNASIK', '', 'W', '081563936787', '11', '', '', '101', '', 2015),
('20150014', 'MOCH. SYAHID', 'SAMPANG', '1998-08-21', 'RUSUN PENJARINGAN BLOK FB-313', 'MOJI', '', 'P', '087820800024', '11', '', '', '102', '', 2015),
('20150015', 'MARZUQOTUL KAMALIA', 'SURABAYA', '2000-07-01', 'TAMBAK MAYOR MADYA 79', 'MAT TIMBUL ', '', 'W', '085846246551', '11', '', '', '102', '', 2015),
('20150016', 'MUHYATI', 'SURABAYA', '2000-04-29', 'JL. TAMBAK DALM BARU Gg III/24', 'HJ. JAMIYAH', '', 'W', '08977521549', '11', '', '', '102', '', 2015),
('20150017', 'LAILA ISNAINI', 'SURABAYA', '2000-07-16', 'KEPUTRAN PANJUNAN 4 / 10', 'SHOHIBUL KAHFI', '', 'W', '085721746703', '11', '', '', '101', '', 2015),
('20150018', 'MIFTACHUL MUFLICHATIN', 'SURABAYA', '1998-12-14', 'PUTAT JAYA BARAT X / 55 SURABAYA', 'SANTOSO', '', 'W', '085811601188', '11', '', '', '101', '', 2015),
('20150019', 'M. TAQIYYUDDIN ASSIDIQI', 'SURABAYA', '1999-01-15', 'SIDORESMO DALAM Gg II / 48', 'USMAN', '', 'P', '085861167277', '11', '', '', '101', '', 2015),
('20150020', 'YULIANA', 'SURABAYA', '1999-07-28', 'TAMBAK MAYOR MADYA Gg 1 LEBAR NO 75', 'ABDUS SALAM', '', 'W', '085723100860', '11', '', '', '102', '', 2015),
('20150021', 'VIRA RANIAH MAWARDAH', 'SURABAYA', '2000-05-15', 'BENDUL MERISI BESAR TIMUR 57', 'PUDJIONO', '', 'W', '081807273626', '11', '', '', '101', '', 2015),
('20150022', 'MAYANG ARMITA KUSUMA WARD', 'TULUNGAGUNG', '2000-01-24', 'PENJARINGANSARI RUSUN EA-212', 'SUWARNO', '', 'W', '085722874017', '11', '', '', '101', '', 2015),
('20150023', 'KHOIROTUL NIKMAH', 'SURABAYA', '1999-12-03', 'KALIBOKOR 61', 'RIFA''I', '', 'W', '085793825755', '11', '', '', '102', '', 2015),
('20150024', 'MOH. INSAN KAMIL', 'BANGKALAN', '2000-08-27', 'KMP. KAJUSAPEH MODUNG BANGKALAN', 'MOH. SHOLEH', '', 'P', '087720001072', '11', '', '', '101', '', 2015),
('20150025', 'USWATUN HASANAH', 'SURABAYA', '2000-06-16', 'NAMBANGAN PERAK 23', 'MAS''UD', '', 'W', '085723098819', '11', '', '', '102', '', 2015),
('20150026', 'SHOFIYATUZ ZAHRO', 'SURABAYA', '2000-09-22', 'NAMBANGAN PERAK 79', 'SUWARNO', '', 'W', '085563282376', '11', '', '', '102', '', 2015),
('20150027', 'SUCIANA RAMADHANI', 'SURABAYA', '2000-01-04', 'JL. NAMBANGAN PERAK 75', 'SAMSUL ARIP', '', 'W', '085856789571', '11', '', '', '102', '', 2015),
('20150028', 'FATIMATUS ZAHRO', 'SAMPANG', '2000-10-12', 'SIDORUKUN Gg LEBAR NO 30', 'MARHAWI', '', 'W', '085624091611', '11', '', '', '102', '', 2015),
('20150029', 'ARVIN APRILIA', 'SURABAYA', '2000-04-20', 'KALIJATEN TAMAN SIDOARJO', 'SUROTO', '', 'W', '085723939233', '11', '', '', '101', '', 2015),
('20150030', 'UMI KHULSUM', 'BOJONEGORO', '2000-09-13', 'KEBONTURI GAYAM BOJONEGORO', 'SULEMAN', '', 'W', '085863239856', '11', '', '', '101', '', 2015),
('20150031', 'MOCH. NUR SYAFI''IN SAMSUD', 'SURABAYA', '1999-10-26', 'SIMO KATRUNGAN KIDUL NO 02', 'SAMSUDIN', '', 'P', '08977540321', '11', '', '', '101', '', 2015),
('20150032', 'NURUL HASANI', 'SURABAYA', '2000-07-19', 'PUCANGAN 3 / 59-C', 'ABDUL ROCHIM', '', 'W', '085721074592', '11', '', '', '101', '', 2015),
('20150033', 'NURUL HASANAH', 'SURABAYA', '2000-07-19', 'PUCANGAN 3 / 59-C', 'ABDUL ROCHIM', '', 'W', '085759477501', '11', '', '', '101', '', 2015),
('20150034', 'MOCH. NANANG MUBAROK', 'SURABAYA', '1999-11-02', 'JL. PUCANG GG 08 NO 4', 'ISMAN', '', 'P', '085860479029', '11', '', '', '102', '', 2015),
('20150035', 'MOCH. IQROM', 'BANGKALAN', '1998-07-11', 'DS. SUMUR KUNING BANGKALAN MADURA', 'H. MUSTAIN', '', 'P', '087820488123', '11', '', '', '102', '', 2015),
('20150036', 'SITI MUNWAROH', 'SURABAYA', '2000-03-01', 'JL. BUMIARJO NO. 15 B', 'H. ABD MANAF', '', 'W', '085695233789', '11', '', '', '101', '', 2015),
('20150037', 'MOCH. IMAM BAIHAQI', 'LAMONGAN', '1999-06-25', 'BADU WANAR PUCUK LAMONGAN', 'AHMAD BUKHORI', '', 'P', '081563936799', '11', '', '', '101', '', 2015),
('20150038', 'SIULIS FARIDAH', 'LAMONGAN', '2000-05-23', 'LEMAHBANG SARIREJO LAMONGAN', 'AHMAD SHODIKIN', '', 'W', '087820800345', '11', '', '', '102', '', 2015),
('20150039', 'AHMAD SAID', 'BANGKALAN', '2000-03-03', 'DIRO, PENDOWO HARJO, SEWON, BANTUL', 'M. MANSYUR', '', 'P', '08977521001', '11', '', '', '102', '', 2015),
('20150040', 'M. IQBAL CATUR ADISYAH PU', 'SURABAYA', '1999-06-24', 'BAENGAS MADURA', 'BUSRO', '', 'P', '087720888799', '11', '', '', '102', '', 2015),
('20150041', 'ADISTY RISKY RAHMATYA', 'SURABAYA', '1998-12-10', 'TELUK NIBUNG TIMUR VI/3 SURABAYA', 'RISTIYADI', '', 'W', '085861167222', '11', '', '', '102', '', 2015),
('20150042', 'MUHAMMAD AZMI SYARIF', 'SURABAYA', '2000-04-21', 'RUSUN SUMBO BLOK E / III', 'MUDLOFAR', '', 'P', '085759305000', '11', '', '', '102', '', 2015),
('20150043', 'MOCH. ROFI''I', 'SURABAYA', '2000-01-27', 'BOTOPUTIH 1 / 73', 'ROSIDI', '', 'P', '081807273126', '11', '', '', '102', '', 2015),
('20150044', 'CHOTIB WAHYUDI', 'SURABAYA', '1999-10-20', 'KALILOM LOR INDAH MATAHARI NO 98', 'KUSNO', '', 'P', '085722874018', '11', '', '', '102', '', 2015),
('20150045', 'LAMAT SABIRIN', 'SURABAYA', '1999-12-25', 'SOMBO 76 - 78', 'MARIONO', '', 'P', '085793825744', '11', '', '', '102', '', 2015),
('20150046', 'LULUS LESTARI', 'BOJONEGORO', '2001-01-06', 'KEBONTURI GAYAM BOJONEGORO', 'LASMIN', '', 'W', '08987562543', '11', '', '', '101', '', 2015),
('20150047', 'MARYANA', 'SURABAYA', '1999-11-22', 'JL. PASAR BABAAN NO 4 A', 'ASMAT', '', 'W', '081911862922', '11', '', '', '102', '', 2015),
('20150048', 'ALDA MELINIA', 'SURABAYA', '1999-10-29', 'BULAK JAYA GG III / 12 A', 'ABDUL MALIK', '', 'W', '081720877791', '11', '', '', '101', '', 2015),
('20150049', 'MUNAWAROH', 'SURABAYA', '2000-04-04', 'TEMBOK DUKUH GG 03 NO 25', 'GUFRON', '', 'W', '085220111072', '11', '', '', '101', '', 2015),
('20150050', 'NURUL HIDAYAH ( HILDA )', 'SURABAYA', '1999-09-21', 'JL. NAMBANGAN PERAK GG 7 / 2', 'SAMSUL ARIFIN', '', 'W', '081563212376', '11', '', '', '102', '', 2015),
('20150051', 'ULIFA MIZA NABILA', 'SURABAYA', '2001-02-01', 'JL. PUTAT JAYA LEBAR A NO 41', 'MT SHOLEH AMIR', '', 'W', '087856780571', '11', '', '', '102', '', 2015),
('20150052', 'SILVIATUL KOMARIYAH', 'BANGKALAN', '2000-11-24', 'TENGGILIS KAUMAN GG 04 NO 29 L', 'ASMU''I', '', 'W', '087723539233', '11', '', '', '101', '', 2015),
('20160001', 'Abdur Rahman', 'Surabaya', '2000-05-16', 'Tembaan II/41', 'Holili', '', 'P', '081820800021', 'X', '', '', '102', '', 2016),
('20160002', 'Ach Fajar Maulana', 'Bangkalan', '1999-06-20', 'Junganyar Gunungan Socah-Bangkalan', 'Abdul Rofik', '', 'P', '081720881073', 'X', '', '', '101', '', 2016),
('20160003', 'Adi Umar', 'Bangkalan', '2001-05-31', 'Jl Kalibokor Gg. 08 No 2 A', 'Taufik ', '', 'P', '081723098841', 'X', '', '', '101', '', 2016),
('20160004', 'Adilatul Firdausiyah', 'Surabaya', '2000-10-08', 'Rusun Sumbo Blok C 211', 'Rochman', '', 'W', '081563282372', 'X', '', '', '101', '', 2016),
('20160005', 'Adnan Ibrahim', 'Surabaya', '2001-12-28', 'Irawati Gg. I No. 12', 'Zainul Arifin', '', 'P', '085864789573', 'X', '', '', '101', '', 2016),
('20160006', 'Ahmad Lutfi Nashrullah', 'Surabaya', '2001-03-15', 'Gubeng Jaya Tengah No. 14', 'H. M Syaiful Arif', '', 'P', '085624091600', 'X', '', '', '102', '', 2016),
('20160007', 'Ainur Rohmania', 'Surabaya', '2000-09-17', 'Rungkut Lor X/98F', 'Islam', '', 'W', '085723939200', 'X', '', '', '101', '', 2016),
('20160008', 'Aisyah Romadhona', 'Surabaya', '2000-11-20', 'Jl. Kranggan No. 45 c', 'Achmad Baidlowi', '', 'W', '085863239822', 'X', '', '', '102', '', 2016),
('20160009', 'Alfia', 'Surabaya', '2001-10-16', 'Genting Baru No. 51', 'Maddqi', '', 'W', '085775400140', 'X', '', '', '102', '', 2016),
('20160010', 'Alviatus Syamsiyah', 'Surabaya', '2001-05-21', 'Kebalan Wetan Gg. I /8', 'Muzdheri', '', 'W', '085721074515', 'X', '', '', '102', '', 2016),
('20160011', 'Anisa', 'Surabaya', '2001-02-19', 'Bulak Jaya V/31-A Surabaya', 'Sahri', '', 'W', '085759477540', 'X', '', '', '101', '', 2016),
('20160012', 'Anisatul Fitriya', 'Surabaya', '2000-01-01', 'Jl. Panggung Gg. 2 No. 9 RT.04 RW.11', 'Abdul Qosim', '', 'W', '085860479011', 'X', '', '', '101', '', 2016),
('20160013', 'Arif Sholahuddin al-Misba', 'Surabaya', '2001-08-03', 'Sidoresmo Dalam 53 RT.01 RW.02 Kel. Jagir ', 'Agus Hasib', '', 'P', '087820488670', 'X', '', '', '101', '', 2016),
('20160014', 'Asmaul Fauziyah', 'lamongan', '2001-03-23', 'Cumpat kulon Baru Gg.01/9 Surabaya ', 'Fauzi', '', 'W', '085695233330', 'X', '', '', '101', '', 2016),
('20160015', 'Ayunda Jannatul Firdaus', 'Surabaya', '2001-01-11', 'Kapas Baru IX/80', 'Abd Haris', '', 'W', '085659571944', 'X', '', '', '102', '', 2016),
('20160016', 'Bedrus Soleh', 'Bangkalan', '1998-06-07', 'Desa Bangkalan Kec. Tanah Merah Bangkalan', 'Samik', '', 'P', '087820800022', 'X', '', '', '102', '', 2016),
('20160017', 'Chofifatur Rohmah', 'Sidoarjo', '2001-01-25', 'Pagesangan IV No. 87 RT.01 RW.03 Surabaya', 'Nyono', '', 'W', '085846246555', 'X', '', '', '102', '', 2016),
('20160018', 'Diana Eka Syafitri', 'Surabaya', '2001-06-17', 'Semolowaru Utara 4A/6', 'Mochamad Syafi''i', '', 'W', '085721746733', 'X', '', '', '102', '', 2016),
('20160019', 'Dwi Setya Marli Rahmawati', 'Surabaya', '2000-09-27', 'Jl. Klmapis Semalang Gg. I/24 A', 'Sumarli', '', 'W', '087720888700', 'X', '', '', '101', '', 2016),
('20160020', 'Eg''Hed Erlangga', 'Surabaya', '2001-08-27', 'Jl Indragiri FG.3 Wisma Tropodo Waru', 'Alm Buid Suprijono', '', 'P', '085811601878', 'X', '', '', '101', '', 2016),
('20160021', 'Eka Putri Mauliya', 'Surabaya', '2001-05-14', 'Jl. Genteng Gg. 2 No. 22', 'Ivo Septi M', '', 'W', '085723100800', 'X', '', '', '101', '', 2016),
('20160022', 'Eva Idah Agustina', 'Sampang', '2000-08-24', 'Jln. Spanjang Taman', 'Sayari', '', 'W', '085759305254', 'X', '', '', '102', '', 2016),
('20160023', 'Fadilah', 'Surabaya', '2001-07-15', 'Bagong Ginayam 4C/2 Surabaya', 'H. Moch Hasyim Mustofa', '', 'W', '081807273622', 'X', '', '', '101', '', 2016),
('20160024', 'Fahmi Sahab', 'Surabya', '2001-04-11', 'Sencaki W.77', 'M Hamid', '', 'P', '085722874011', 'X', '', '', '101', '', 2016),
('20160025', 'Fardila Diba', 'Bangkalan', '2001-08-26', 'Kwanyar Barat', 'Moch. Amrini', '', 'W', '081911913033', 'X', '', '', '102', '', 2016),
('20160026', 'Fathur Erlangga', 'Bojonegoro', '2001-05-02', 'Panasan Bumiayu Bojonegor', 'Munasir', '', 'P', '085863394334', 'X', '', '', '101', '', 2016),
('20160027', 'Fikriatus Solihah', 'Surabaya', '2001-07-24', 'Sidosermo III/34', 'Abdullah Wahyudi', '', 'W', '085793825721', 'X', '', '', '101', '', 2016),
('20160028', 'Halimatus Sakdiyah', 'Bangkalan', '1999-07-17', 'Baih Gunung Sereng Kwanyar Bangkalan', 'Zahid', '', 'W', '081667114335', 'X', '', '', '101', '', 2016),
('20160029', 'Ikmalia Nur Mahdamia', 'surabaya', '2001-05-05', 'Tom Wetan Jambu 41 Surabaya', 'M Syamsudin', '', 'W', '085875625110', 'X', '', '', '102', '', 2016),
('20160030', 'Imam Fatoni', 'surabaya', '2000-05-28', 'Tambak Gringsing Baru I/II', 'H. Daruin', '', 'P', '081911862950', 'X', '', '', '101', '', 2016),
('20160031', 'Imroatus Solihah', 'surabaya', '2001-04-16', 'Bratang Gede 6H/6A', 'Aseulsjah H', '', 'W', '087820800011', 'X', '', '', '102', '', 2016),
('20160032', 'In''am Kurniawati', 'surabaya', '2001-04-07', 'Duku Bulak Banteng Suropati II/70', 'Abd Rohman', '', 'W', '087720001022', 'X', '', '', '102', '', 2016),
('20160033', 'Indah Nurul Laili', 'surabaya', '2000-12-05', 'Sawah Pulo Sr. 4/16', 'Samsul Romli', '', 'W', '085723098810', 'X', '', '', '102', '', 2016),
('20160034', 'Koyimah', 'Madura', '2000-11-16', 'Jenek Wetan', 'Ra''i', '', 'W', '085563282336', 'X', '', '', '101', '', 2016),
('20160035', 'Lailatul Ahadiyah', 'Bangkalan', '2001-08-06', 'Petrah', 'Ridwan', '', 'W', '085856789501', 'X', '', '', '101', '', 2016),
('20160036', 'lukman', 'madura', '2001-04-06', 'sidoresmo indah', 'agus', '', 'P', '085624091611', 'X', '', '', '102', '', 2016),
('20160037', 'M Abdilla', 'surabaya', '2001-06-15', 'Keputran Panjunan 1/2', 'Madun', '', 'P', '085723939255', 'X', '', '', '101', '', 2016),
('20160038', 'M Hafifi', 'surabaya', '2001-01-19', 'Tempel Sukorejo gg. 6 No. 5A', 'Muzammil', '', 'P', '085863239866', 'X', '', '', '101', '', 2016),
('20160039', 'M Rafi Akbar', 'surabaya', '2000-12-07', 'Nambangan Perak Gg. 07 No. 12', 'Sabar', '', 'P', '085775403111', 'X', '', '', '102', '', 2016),
('20160040', 'M. Fathur Rosi', 'surabaya', '2001-12-07', 'Jl. Medayu Utara', 'Ari', '', 'P', '085721074002', 'X', '', '', '101', '', 2016),
('20160041', 'M. Syarief Hidayatullah', 'Bangkalan', '2001-07-21', 'kwanyar timur', 'Moh Doheri', '', 'P', '085759477533', 'X', '', '', '102', '', 2016),
('20160042', 'Masdira', 'Surabaya', '2001-05-06', 'Sidorame Baru 15-A', 'Safii', '', 'W', '085860479000', 'X', '', '', '102', '', 2016),
('20160043', 'Masrurah', 'Bangkalan', '2000-12-22', 'Jl. Karah Gg.05 /44A', 'Hosen', '', 'W', '087820488133', 'X', '', '', '102', '', 2016),
('20160044', 'Miftahul Abidin', 'surabaya', '2000-01-30', 'Surabaya KLH Kedung Cowek Kel. Bulak', 'M. Toh', '', 'P', '085695233788', 'X', '', '', '102', '', 2016),
('20160045', 'Moch Faruk ', 'surabaya', '2000-05-27', 'Sidotopo Sekolahan 7/89', 'Moch Zainuri', '', 'P', '081563936799', 'X', '', '', '101', '', 2016),
('20160046', 'Moh Alvi Ramadhani', 'surabaya', '2001-04-23', 'bratang Gede ', 'samsul arifin', '', 'P', '085659571606', 'X', '', '', '102', '', 2016),
('20160047', 'Moh Syaiful Rohman', 'Sampang', '2000-08-05', 'Cantian Tenabh Gg. Buntu', 'Matniri', '', 'P', '087820801345', 'X', '', '', '102', '', 2016),
('20160048', 'Muhammad Bahrul Ulum', 'Lamongan', '2001-02-14', 'Dusun Gempol Payung Sarirejo Lamongan', 'M. Adnan', '', 'P', '085846246987', 'X', '', '', '101', '', 2016),
('20160049', 'Muhammad Heri Irwansyah', 'Bangkalan', '2001-03-25', 'Kwanyar Barat Kec. Kwanyar', 'Jaelnai', '', 'P', '081775217701', 'X', '', '', '101', '', 2016),
('20160050', 'Muhammad Ikhsan Kamil ', 'Cianjur', '2001-02-07', 'Kp. Tarikolot RT.02 RW.02 Cinangsi-Cianjur', 'Imam Suroso', '', 'P', '085721746087', 'X', '', '', '101', '', 2016),
('20160051', 'Muhammad Ulul Albab', 'Kediri', '2001-06-06', 'Rungkut Lor Gg.I', 'Setyo Catur Suparwanto', '', 'P', '087720888799', 'X', '', '', '101', '', 2016),
('20160052', 'Muhammad Unais Dardiri', 'surabaya', '2001-01-23', 'Jl. Tunjungan Gg.1 Np.08', 'Jumdi', '', 'P', '085811601551', 'X', '', '', '102', '', 2016),
('20160053', 'Mujahid al-Farizhi', 'Surabaya', '2001-06-13', 'Jl. Nambangan Baru 117', 'M. Saichu', '', 'P', '085861167332', 'X', '', '', '102', '', 2016),
('20160054', 'Mutiara P.S', 'Surabaya', '2001-02-28', 'Jl. Banyu Urip Kidul 2/II Surabaya', 'H. Harun', '', 'W', '085723100866', 'X', '', '', '101', '', 2016),
('20160055', 'Mutmainnatan Tammah', 'Sampang', '1999-10-13', 'Kedinding Lor gg. Delima 63', 'Moh Sipan', '', 'W', '085759305550', 'X', '', '', '101', '', 2016),
('20160056', 'Nabila Nursabila', 'Surabaya', '2000-11-09', 'Nambangan Peteha Gg. II No.6 Kec. Bulak', 'Muhiamin', '', 'W', '081807273126', 'X', '', '', '101', '', 2016),
('20160057', 'Nathasya Grahadi', 'Surabaya', '2001-03-07', 'Gentino OO Vi/31', 'Hadi Nur Sa''id', '', 'W', '085722874008', 'X', '', '', '102', '', 2016),
('20160058', 'Nilna Sa''adah', 'surabaya', '2000-07-07', 'kedinding Lor gg. Delima 60', 'rusdi', '', 'W', '081911913005', 'X', '', '', '101', '', 2016),
('20160059', 'Nur Kholisa', 'Surabaya', '2000-05-18', 'Jl. Wonokusumo Tengah No 42', 'Abdul Latif', '', 'W', '085793825544', 'X', '', '', '102', '', 2016),
('20160060', 'Nurin Nailin Nikmah', 'Surabaya', '2001-03-17', 'tambak weddi', 'asmuni', '', 'W', '087830204030', 'X', '', '', '102', '', 2016),
('20160061', 'Nurriyah Mas''adha', 'Gresik', '2001-05-03', 'Tambak Osowilangon', 'Slamet', '', 'W', '085875625400', 'X', '', '', '101', '', 2016),
('20160062', 'Nurun Nailar Rohmah', 'Surabaya', '2001-05-19', 'Tambak Mayor Selatan 1/6', 'Marsuto', '', 'W', '081720875491', 'X', '', '', '102', '', 2016),
('20160063', 'Rini Fitriany', 'Bangkalan', '2000-12-20', 'Jl Tambak Mayor Gg. 1 No 8', 'M. Jakfar', '', 'W', '085220110072', 'X', '', '', '101', '', 2016),
('20160064', 'Risal Umam', 'Surabaya', '2000-04-20', 'Duku Bulak Banteng PrintisUtama No. 34', 'Abd Wahid', '', 'P', '081723091889', 'X', '', '', '102', '', 2016),
('20160065', 'Romli', 'Sampang', '2000-03-17', 'Simo Kwagean Buntu Kidul', 'Juhairi', '', 'P', '087856780071', 'X', '', '', '101', '', 2016),
('20160066', 'Rosidah Indawati', 'Sampang', '2000-12-05', 'Jl. Nginden Permata 2/18', 'M. Rohib', '', 'W', '087624651611', 'X', '', '', '102', '', 2016),
('20160067', 'Seinab', 'madura', '2000-03-20', 'Jl. pucang ', 'ahmad rifa''i', '', 'W', '085881148178', 'X', '', '', '101', '', 2016),
('20160068', 'Sherly Prameswari', 'Jombang', '2001-01-07', 'Simo Gunung Baru Jaya Blok F1/31C Surabaya', 'Gunawan', '', 'W', '085881140170', 'X', '', '', '102', '', 2016),
('20160069', 'Silvi Nur fadilah', 'Brebes', '2000-03-15', 'Kp. Baru Klender RT12 RW.01Kec. Cakung', 'Ahmad Siri', '', 'W', '085881143171', 'X', '', '', '101', '', 2016),
('20160070', 'Siti Aminah', 'Surabya', '2001-04-23', 'Simo Pomahan Baru Barat No.04', 'H Ali Makki', '', 'W', '083899928817', 'X', '', '', '102', '', 2016),
('20160071', 'Siti Fathimatus Zahroh', 'Surabaya', '2001-07-28', 'Jl. Girilaya Gg. 5/29', 'Ja''far Sodiq', '', 'W', '08113257811', 'X', '', '', '102', '', 2016),
('20160072', 'Siti Fatmala Lailatus Sa''', 'Tuban', '2000-10-31', 'Simomulyo Baru 04-G/23', 'Lasiman', '', 'W', '089674200119', 'X', '', '', '102', '', 2016),
('20160073', 'Siti Nur Hasanah', 'Surabaya', '2001-01-15', 'Jl. Wonokusumo Jaya No.41', 'Suyadi', '', 'W', '089674200111', 'X', '', '', '102', '', 2016),
('20160074', 'Siti Wahimatus Salamah', 'Jember', '2001-08-19', 'Keputih Tegal 1/30A', 'Wahyudi', '', 'W', '081358142299', 'X', '', '', '102', '', 2016),
('20160075', 'Siti Mur''rifa', 'madura', '2001-05-23', 'Wonosari Tegal 1/24', 'H. Husni', '', 'W', '081331139179', 'X', '', '', '101', '', 2016),
('20160076', 'Suliati Arum Sari', 'Bojonegoro', '2000-01-27', 'Gunung Anyar Tengah Gg. 6', 'Kusmiran', '', 'W', '081331139170', 'X', '', '', '102', '', 2016),
('20160077', 'Syahrun Nur Mudhianti', 'Ngawi', '2000-08-12', 'Kupang Praupan II/23B', 'Abdi Manaf', '', 'W', '085606282656', 'X', '', '', '101', '', 2016),
('20160078', 'Syamsul Fathoni', 'surabaya', '2001-05-13', 'gunung Anyar Tengah Gg. 2', 'sulaiman', '', 'P', '081555905490', 'X', '', '', '102', '', 2016),
('20160079', 'Umar Rohman Yuda Tama', 'Madiun', '2000-07-08', 'Kedung Baruk XVI/4 Rungkut', 'Lasidi', '', 'P', '085730270614', 'X', '', '', '102', '', 2016),
('20160080', 'Uswatun Hasanah', 'Surabaya', '2001-11-23', 'Jl. Demak No. 79 Surabaya', 'H. Syamsul Arifin', '', 'W', '085730270884', 'X', '', '', '102', '', 2016),
('20160081', 'Wahyu Ramadhan', 'Demak', '2000-06-12', 'Kedondong RT. 01 RW. 02 Demak Jawa Tengah', 'Suwardi', '', 'P', '082337443369', 'X', '', '', '102', '', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE IF NOT EXISTS `waktu` (
  `id_waktu` varchar(10) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `hari`, `jam_masuk`, `jam_keluar`) VALUES
('DW01', 'SENIN', '12:50:00', '13:25:00'),
('DW02', 'SENIN', '13:25:00', '14:00:00'),
('DW03', 'SENIN', '14:00:00', '14:35:00'),
('DW04', 'SENIN', '14:35:00', '15:10:00'),
('DW05', 'SENIN', '15:00:00', '15:35:00'),
('DW06', 'SENIN', '15:35:00', '16:10:00'),
('DW07', 'SENIN', '16:10:00', '16:45:00'),
('DW08', 'SENIN', '16:45:00', '17:20:00'),
('DW09', 'SELASA', '12:50:00', '13:25:00'),
('DW10', 'SELASA', '13:25:00', '14:00:00'),
('DW11', 'SELASA', '14:00:00', '14:35:00'),
('DW12', 'SELASA', '14:35:00', '15:10:00'),
('DW13', 'SELASA', '15:00:00', '15:35:00'),
('DW14', 'SELASA', '15:35:00', '16:10:00'),
('DW15', 'SELASA', '16:10:00', '16:45:00'),
('DW16', 'SELASA', '16:45:00', '17:20:00'),
('DW17', 'RABU', '12:50:00', '13:25:00'),
('DW18', 'RABU', '13:25:00', '14:00:00'),
('DW19', 'RABU', '14:00:00', '14:35:00'),
('DW20', 'RABU', '14:35:00', '15:10:00'),
('DW21', 'RABU', '15:00:00', '15:35:00'),
('DW22', 'RABU', '15:35:00', '16:10:00'),
('DW23', 'RABU', '16:10:00', '16:45:00'),
('DW24', 'RABU', '16:45:00', '17:20:00'),
('DW25', 'KAMIS', '12:50:00', '13:25:00'),
('DW26', 'KAMIS', '13:25:00', '14:00:00'),
('DW37', 'KAMIS', '14:00:00', '14:35:00'),
('DW38', 'KAMIS', '14:35:00', '15:10:00'),
('DW39', 'KAMIS', '15:00:00', '15:35:00'),
('DW40', 'KAMIS', '15:35:00', '16:10:00'),
('DW41', 'KAMIS', '16:10:00', '16:45:00'),
('DW42', 'KAMIS', '16:45:00', '17:20:00'),
('DW43', 'SABTU', '12:50:00', '13:25:00'),
('DW44', 'SABTU', '13:25:00', '14:00:00'),
('DW45', 'SABTU', '14:00:00', '14:35:00'),
('DW46', 'SABTU', '14:35:00', '15:10:00'),
('DW47', 'SABTU', '15:00:00', '15:35:00'),
('DW48', 'SABTU', '15:35:00', '16:10:00'),
('DW49', 'SABTU', '16:10:00', '16:45:00'),
('DW50', 'SABTU', '16:45:00', '17:20:00'),
('DW51', 'AHAD', '12:50:00', '13:25:00'),
('DW52', 'AHAD', '13:25:00', '14:00:00'),
('DW53', 'AHAD', '14:00:00', '14:35:00'),
('DW54', 'AHAD', '14:35:00', '15:10:00'),
('DW55', 'AHAD', '15:00:00', '15:35:00'),
('DW56', 'AHAD', '15:35:00', '16:10:00'),
('DW57', 'AHAD', '16:10:00', '16:45:00'),
('DW58', 'AHAD', '16:45:00', '17:20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
 ADD PRIMARY KEY (`id_jadwal`), ADD KEY `FK_jadwal_pelajaran_kelas` (`id_kelas`), ADD KEY `FK_jadwal_pelajaran_waktu` (`id_waktu`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_detail`
--
ALTER TABLE `kelas_detail`
 ADD PRIMARY KEY (`id_kelas`,`nis`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
 ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
 ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `nilai_un`
--
ALTER TABLE `nilai_un`
 ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`), ADD KEY `FK_siswa_jurusan` (`id_jurusan`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
 ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `nilai_un`
--
ALTER TABLE `nilai_un`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
ADD CONSTRAINT `FK_jadwal_pelajaran_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_jadwal_pelajaran_waktu` FOREIGN KEY (`id_waktu`) REFERENCES `waktu` (`id_waktu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_detail`
--
ALTER TABLE `kelas_detail`
ADD CONSTRAINT `FK_kelas_detail_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
ADD CONSTRAINT `FK_siswa_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
