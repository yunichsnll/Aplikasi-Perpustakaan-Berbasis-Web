-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 04:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `jns_identitas` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_tlpn` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `no_identitas`, `jns_identitas`, `nama`, `tgl_lahir`, `alamat`, `no_tlpn`, `kelas`, `jurusan`) VALUES
(2, 101, 'KTP', 'Yuni Chusnul khotimah', '2004-06-15', 'Depok', '089131595691', '12', 'TKJ'),
(3, 102, 'Kartu Pelajar', 'zulfa al-qodariah putri', '2003-05-25', 'Cilangkap', '089536723461', '12', 'MM'),
(4, 103, 'KTP', 'Sabrina Fadia Arrayan', '2004-11-05', 'Pabuaran', '08931247935', '11', 'SIJA'),
(6, 104, 'Kartu Pelajar', 'Latifa Hanum Indriyani', '2004-03-02', 'Bekasi', '08975312764', '11', 'DPIB'),
(7, 105, 'KTP', 'Annisa Aprilia', '2005-02-01', 'Bandung', '08931247935', '11', 'TKJ'),
(8, 106, 'Kartu Pelajar', 'Diah Tri Aprilia', '2005-03-23', 'Bogor', '082158376104', '11', 'TOI'),
(9, 107, 'KTP', 'kaila Alifia', '2004-11-10', 'Pabuaran', '085792395107', '11', 'TP');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `no_pustaka` int(11) NOT NULL,
  `rak` varchar(30) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tipe_buku` varchar(30) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`no_pustaka`, `rak`, `judul_buku`, `tipe_buku`, `pengarang`, `penerbit`, `stok`, `tgl_terbit`, `tgl_masuk`) VALUES
(14, '2', 'Beruang kutub dan Panda', 'majalah', 'Metthew J.baek', 'kid classic', '87', '2021-08-31', '2022-02-26'),
(15, '7', 'Memahami film', 'non-fiksi', 'Himawan Pratists', 'Homerian Pustaka', '21', '2022-02-10', '2022-03-01'),
(16, '7', 'Cewek Smart', 'non-fiksi', 'Ria Fariana', 'Gema Insani', '54', '2022-02-01', '2022-03-02'),
(17, '1', 'Bulan', 'fiksi', 'Tere Liye', 'PT.Gramedia', '11', '2019-10-02', '2021-08-27'),
(18, '1', 'Rembulan Tenggelam Diwajahmu', 'fiksi', 'Tere Liye', 'Republika', '44', '2009-11-10', '2021-10-21'),
(19, '7', 'Logika dan Himpunan', 'non-fiksi', 'Drs.Sukirman M.Pd', 'Hanggar Kreator', '18', '2006-03-16', '2021-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_pinjam`, `tgl_kembali`, `denda`) VALUES
(7, 7, '2022-03-05', 0),
(9, 13, '2022-03-05', 8000),
(10, 11, '2022-03-05', 56000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) UNSIGNED NOT NULL,
  `no_pustaka` int(11) UNSIGNED NOT NULL,
  `id_anggota` int(11) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_tempo` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `no_pustaka`, `id_anggota`, `tgl_pinjam`, `tgl_tempo`, `status`) VALUES
(3, 6, 2, '2022-02-27', '2022-03-02', ''),
(7, 15, 3, '2021-12-01', '2022-03-10', ''),
(9, 19, 4, '2022-03-01', '2022-03-10', ''),
(10, 18, 2, '2022-03-01', '2022-03-10', ''),
(11, 14, 9, '2021-12-01', '2022-01-08', ''),
(12, 15, 6, '2022-02-10', '2022-03-20', ''),
(13, 18, 4, '2022-02-20', '2022-03-01', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `no_identitas` (`no_identitas`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`no_pustaka`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `no_pustaka` (`no_pustaka`),
  ADD KEY `id` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `no_pustaka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
