-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 12:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pirt`
--

-- --------------------------------------------------------

--
-- Table structure for table `mr_akses_menu`
--

CREATE TABLE `mr_akses_menu` (
  `id_akses` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr_akses_menu`
--

INSERT INTO `mr_akses_menu` (`id_akses`, `id_level`, `id_menu`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 1, 3),
(33, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `mr_kecamatan`
--

CREATE TABLE `mr_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kode_kecamatan` varchar(7) NOT NULL,
  `kode_kota` varchar(4) NOT NULL DEFAULT '',
  `nama_kecamatan` varchar(30) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mr_kecamatan`
--

INSERT INTO `mr_kecamatan` (`id_kecamatan`, `kode_kecamatan`, `kode_kota`, `nama_kecamatan`, `is_delete`) VALUES
(1, '3579010', '3579', 'Kec. Batu', 0),
(2, '3579020', '3579', 'Kec. Junrejo', 0),
(3, '3579030', '3579', 'Kec. Bumiaji', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr_kelurahan`
--

CREATE TABLE `mr_kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `kode_kelurahan` varchar(10) NOT NULL,
  `kode_kecamatan` varchar(7) NOT NULL,
  `nama_kelurahan` varchar(40) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mr_kelurahan`
--

INSERT INTO `mr_kelurahan` (`id_kelurahan`, `kode_kelurahan`, `kode_kecamatan`, `nama_kelurahan`, `is_delete`) VALUES
(1, '3579010001', '3579010', 'Kel. Oro-oro Ombo', 0),
(2, '3579010002', '3579010', 'Kel. Temas', 0),
(3, '3579010003', '3579010', 'Kel. Sisir', 0),
(4, '3579010004', '3579010', 'Kel. Ngaglik', 0),
(5, '3579010005', '3579010', 'Kel. Pesanggrahan', 0),
(6, '3579010006', '3579010', 'Kel. Songgokerto', 0),
(7, '3579010007', '3579010', 'Kel. Sumberejo', 0),
(8, '3579010008', '3579010', 'Kel. Sidomulyo', 0),
(9, '3579020001', '3579020', 'Kel. Tlekung', 0),
(10, '3579020002', '3579020', 'Kel. Junrejo', 0),
(11, '3579020003', '3579020', 'Kel. Mojorejo', 0),
(12, '3579020004', '3579020', 'Kel. Torongrejo', 0),
(13, '3579020005', '3579020', 'Kel. Beji', 0),
(14, '3579020006', '3579020', 'Kel. Pendem', 0),
(15, '3579020007', '3579020', 'Kel. Dadaprejo', 0),
(16, '3579030001', '3579030', 'Kel. Pandanrejo', 0),
(17, '3579030002', '3579030', 'Kel. Bumiaji', 0),
(18, '3579030003', '3579030', 'Kel. Bulukerto', 0),
(19, '3579030004', '3579030', 'Kel. Gunungsari', 0),
(20, '3579030005', '3579030', 'Kel. Punten', 0),
(21, '3579030006', '3579030', 'Kel. Tulungrejo', 0),
(22, '3579030007', '3579030', 'Kel. Sumbergondo', 0),
(23, '3579030008', '3579030', 'Kel. Giripurno', 0),
(24, '3579030009', '3579030', 'Kel. Sumber Brantas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr_kemasan`
--

CREATE TABLE `mr_kemasan` (
  `id_kemasan` int(4) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `is_delete` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr_kemasan`
--

INSERT INTO `mr_kemasan` (`id_kemasan`, `kode`, `jenis`, `keterangan`, `is_delete`) VALUES
(1, '1', 'Gelas', 'Tidak digunakan untuk panganyang disterilisasi komersial', 0),
(2, '2', 'Plastik', 'Tidak digunakan untuk pangan yang disterilisasi komersial atau\r\n pasteurisasi', 0),
(3, '3', 'Karton / Kertas', 'Tidak digunakan untuk pangan\r\nyang disterilisasi komersial', 1),
(4, '4', 'Kaleng', 'Termasuk aluminium foil\r\nkombinasi plastik **)', 0),
(5, '5', 'Aluminium Foil', 'Misalnya daun', 0),
(6, '6', 'Lain-lain', 'Misalnya daun', 0),
(7, '7', 'Komposit', '***)', 0),
(8, '8', 'Ganda', '****)', 0),
(14, '09', 'www', 'asd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mr_kota`
--

CREATE TABLE `mr_kota` (
  `id_kota` int(11) NOT NULL,
  `kode_kota` varchar(4) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mr_kota`
--

INSERT INTO `mr_kota` (`id_kota`, `kode_kota`, `nama_kota`, `is_delete`) VALUES
(1, '3579', 'Kota Batu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr_level`
--

CREATE TABLE `mr_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr_level`
--

INSERT INTO `mr_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Pemohon');

-- --------------------------------------------------------

--
-- Table structure for table `mr_menu`
--

CREATE TABLE `mr_menu` (
  `id_menu` int(10) NOT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr_menu`
--

INSERT INTO `mr_menu` (`id_menu`, `menu`, `icon`, `is_delete`) VALUES
(1, 'Pengajuan', 'fas fa-fw fa-file-contract', 0),
(2, 'Master', 'fas fa-fw fa-database', 0),
(3, 'Pengaturan', 'fas fa-fw fa-cogs', 0),
(4, 'PIRT', 'fas fa-fw fa-cogs', 0),
(7, 'Profil', 'fas fa-fw fa-user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr_pangan`
--

CREATE TABLE `mr_pangan` (
  `id_pangan` int(5) NOT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr_pangan`
--

INSERT INTO `mr_pangan` (`id_pangan`, `kode`, `jenis`, `is_delete`) VALUES
(1, '01', 'HASIL OLAHAN DAGING KERING', 0),
(2, '02', 'HASIL OLAHAN IKAN KERING', 0),
(3, '03', 'HASIL OLAHAN UNGGAS KERING', 0),
(4, '04', 'HASIL OLAHAN UNGGAS KERING', 0),
(5, '05', 'HASIL OLAHAN SAYUR', 0),
(6, '06', 'HASIL OLAHAN KELAPA', 0),
(7, '07', 'TEPUNG DAN HASIL OLAHNYA', 0),
(8, '08', 'TEPUNG DAN HASIL OLAHNYA', 0),
(9, '09', 'SELAI, JELI DAN SEJENISNYA', 0),
(10, '10', 'KOPI DAN TEH KERING', 0),
(11, '11', 'BUMBU', 0),
(12, '12', 'REMPAH-REMPAH', 0),
(13, '13', 'MINUMAN SERBUK', 0),
(14, '14', 'HASIL OLAHAN BUAH', 0),
(15, '15', 'HASIL OLAHAN BIJI-BIJIAN, KACANGKACANGAN DAN UMBI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr_sub_menu`
--

CREATE TABLE `mr_sub_menu` (
  `id_sub_menu` int(10) NOT NULL,
  `id_menu` int(10) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `is_active` int(5) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr_sub_menu`
--

INSERT INTO `mr_sub_menu` (`id_sub_menu`, `id_menu`, `title`, `url`, `is_active`, `is_delete`) VALUES
(1, 1, 'Tambah Pengajuan', 'Pirt/tambah_pengajuan', 1, 0),
(2, 1, 'Status Pengajuan', 'Pirt/status_pengajuan', 1, 0),
(3, 2, 'Master Jenis Kemasan', 'Master/kemasan', 1, 0),
(4, 2, 'Master Jenis Pangan', 'Master/pangan', 1, 0),
(5, 3, 'Profil', 'Profil/index', 0, 1),
(6, 2, 'Master Menu', 'Master/menu', 1, 0),
(7, 2, 'Master Wilayah', 'Master/wilayah', 1, 0),
(9, 3, 'Database', 'Database/index', 1, 0),
(10, 7, 'Pengaturan Profil', 'Profil/index', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr_user`
--

CREATE TABLE `mr_user` (
  `id_user` int(5) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `level` int(5) NOT NULL,
  `is_active` int(5) DEFAULT NULL,
  `is_delete` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mr_user`
--

INSERT INTO `mr_user` (`id_user`, `email`, `password`, `nama_user`, `nama_perusahaan`, `alamat`, `kota`, `kecamatan`, `kelurahan`, `rt`, `rw`, `no_hp`, `level`, `is_active`, `is_delete`) VALUES
(1, 'dinkeskotabatu@gmail.com', '$2y$10$d8IIcqmTISI/hrt.kIEIr.Z//excLelMHIlRWvHhJ0c9trVZTfgmm', 'Administrator. Dinkes', 'Dinkes Kota Batu', 'Jl. Samadi No.71', '3579', '3579010', '3579010005', '00', '00', '(0341) 593164', 1, 1, 1),
(2, 'iqbalsyauqi19@gmail.com', '$2y$10$9iJfHtUNEyuEaa/mZhjCReiIkZoFHkA2BTP/RF9JZ7L.m8Obq/McG', 'Mohamamd Iqbal Syauqi', 'Bagonk Foundation', 'Jl. Borobudur Agung No.7', '3579', '3579030', '3579010007', '07', '05', '085855452920', 2, 1, 1),
(3, 'ayufirdausiah@gmail.com', '$2y$10$4h5jPelnvUxLol2IAvExeuTWI95rIawYcwvgIGKBIN4hXllDGh01K', 'Ayu Firdausiah', 'OOD Foundation', 'Jl. Bridgen Slamet Riyadi', '3579', '3579020', '3579030008', '08', '05', '082244096626', 2, 1, 1),
(4, 'psi@gmail.com', '$2y$10$.8nPMbSGv3PhrIrHXW2dqOrYuCxkBabHgjSU7ZrgVjByBJ0QxRLUm', 'Mohamamd Iqbal Syauqi', 'PSI Polinema', 'Jl. Soekarno Hatta No.9', '3579', '3579020', '3579010002', '01', '02', '085855452920', 2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mr_akses_menu`
--
ALTER TABLE `mr_akses_menu`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `mr_kecamatan`
--
ALTER TABLE `mr_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `mr_kelurahan`
--
ALTER TABLE `mr_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`) USING BTREE;

--
-- Indexes for table `mr_kemasan`
--
ALTER TABLE `mr_kemasan`
  ADD PRIMARY KEY (`id_kemasan`);

--
-- Indexes for table `mr_kota`
--
ALTER TABLE `mr_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `mr_level`
--
ALTER TABLE `mr_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mr_menu`
--
ALTER TABLE `mr_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `mr_pangan`
--
ALTER TABLE `mr_pangan`
  ADD PRIMARY KEY (`id_pangan`);

--
-- Indexes for table `mr_sub_menu`
--
ALTER TABLE `mr_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indexes for table `mr_user`
--
ALTER TABLE `mr_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mr_akses_menu`
--
ALTER TABLE `mr_akses_menu`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mr_kecamatan`
--
ALTER TABLE `mr_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mr_kelurahan`
--
ALTER TABLE `mr_kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mr_kemasan`
--
ALTER TABLE `mr_kemasan`
  MODIFY `id_kemasan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mr_kota`
--
ALTER TABLE `mr_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mr_menu`
--
ALTER TABLE `mr_menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mr_pangan`
--
ALTER TABLE `mr_pangan`
  MODIFY `id_pangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mr_sub_menu`
--
ALTER TABLE `mr_sub_menu`
  MODIFY `id_sub_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mr_user`
--
ALTER TABLE `mr_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
