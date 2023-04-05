-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2023 at 01:37 AM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sord1184_simkah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$JyC2vAuz2xXFN2Y2KN6R.OTbF/tl.Hqb1j2vq97Be2cydSIs/VUGe');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_istri`
--

CREATE TABLE `tb_data_istri` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `warga_negara` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tggl_lahir` datetime NOT NULL,
  `umur` varchar(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `pas_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data_istri`
--

INSERT INTO `tb_data_istri` (`id`, `pendaftar_id`, `warga_negara`, `nik`, `nama`, `tempat_lahir`, `tggl_lahir`, `umur`, `alamat`, `status`, `agama`, `pekerjaan`, `pas_foto`) VALUES
(15, 15, 'WNI', '1234567890123456', 'Sri Maya Yuliana S.pd', 'cinong', '1999-12-15 00:00:00', '23', 'Cinong', 'Perawan', 'Islam', 'Guru', 'pas-foto-istri-1680364842.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_suami`
--

CREATE TABLE `tb_data_suami` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `warga_negara` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tggl_lahir` datetime NOT NULL,
  `umur` varchar(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `pas_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data_suami`
--

INSERT INTO `tb_data_suami` (`id`, `pendaftar_id`, `warga_negara`, `nik`, `nama`, `tempat_lahir`, `tggl_lahir`, `umur`, `alamat`, `status`, `agama`, `pekerjaan`, `pas_foto`) VALUES
(19, 15, 'WNI', '7304090404940003', 'suwandi Amin Sangaji S.Kom', 'makasar', '1994-04-04 00:00:00', '28', 'kalukuang', 'Jejaka', 'Islam', 'developer', 'pas-foto-suami-1680364842.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_wali`
--

CREATE TABLE `tb_data_wali` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `hubungan` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tggl_lahir` varchar(255) NOT NULL,
  `umur` varchar(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `bin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data_wali`
--

INSERT INTO `tb_data_wali` (`id`, `pendaftar_id`, `nik`, `no_kk`, `nama`, `status`, `agama`, `hubungan`, `tempat_lahir`, `tggl_lahir`, `umur`, `alamat`, `no_telepon`, `pekerjaan`, `bin`) VALUES
(19, 15, '3910390390193103', '3847384738473847', 'amin sangaji', 'Nasab', 'Islam', 'ayah', 'makasar', '1987-09-03', '35', 'makassar', '01901903', 'kontraktor', 'pabettingi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id` int(11) NOT NULL,
  `nama_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_desa`
--

INSERT INTO `tb_desa` (`id`, `nama_desa`) VALUES
(4, 'Sawagumu'),
(5, 'Malanu'),
(6, 'Malasilen'),
(8, 'Matalamagi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemeriksaan`
--

CREATE TABLE `tb_pemeriksaan` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `nik_as` varchar(255) NOT NULL,
  `nama_as` varchar(255) NOT NULL,
  `agama_as` varchar(255) NOT NULL,
  `pekerjaan_as` varchar(255) NOT NULL,
  `alamat_as` varchar(255) NOT NULL,
  `nik_is` varchar(255) NOT NULL,
  `nama_is` varchar(255) NOT NULL,
  `agama_is` varchar(255) NOT NULL,
  `pekerjaan_is` varchar(255) NOT NULL,
  `alamat_is` varchar(255) NOT NULL,
  `nik_ai` varchar(255) NOT NULL,
  `nama_ai` varchar(255) NOT NULL,
  `agama_ai` varchar(255) NOT NULL,
  `pekerjaan_ai` varchar(255) NOT NULL,
  `alamat_ai` varchar(255) NOT NULL,
  `nik_ii` varchar(255) NOT NULL,
  `nama_ii` varchar(255) NOT NULL,
  `agama_ii` varchar(255) NOT NULL,
  `pekerjaan_ii` varchar(255) NOT NULL,
  `alamat_ii` varchar(255) NOT NULL,
  `jenis_mk` varchar(255) NOT NULL,
  `jumlah_mk` varchar(11) NOT NULL,
  `pembayaran_mk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pemeriksaan`
--

INSERT INTO `tb_pemeriksaan` (`id`, `pendaftar_id`, `nik_as`, `nama_as`, `agama_as`, `pekerjaan_as`, `alamat_as`, `nik_is`, `nama_is`, `agama_is`, `pekerjaan_is`, `alamat_is`, `nik_ai`, `nama_ai`, `agama_ai`, `pekerjaan_ai`, `alamat_ai`, `nik_ii`, `nama_ii`, `agama_ii`, `pekerjaan_ii`, `alamat_ii`, `jenis_mk`, `jumlah_mk`, `pembayaran_mk`) VALUES
(9, 15, '121211212', 'Amin Sangaji', 'Islam', 'Kontraktor', 'Alamat', '1928912819', 'Nur jiah', 'Islam', 'Ibu Rumah tangga', 'Alamat', '12012912', 'bapak Istri', 'Islam', 'Pekerjaan', 'Alamat', '23822842', 'Ibu Istri', 'Islam', 'Ibu Rumah tangga', 'Alamat', 'Emas', '10', 'Tunai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftar`
--

CREATE TABLE `tb_pendaftar` (
  `id` int(11) NOT NULL,
  `no_pendaftarn` varchar(255) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tempat_nikah` varchar(255) NOT NULL,
  `tggl_akad` date NOT NULL,
  `waktu_akad` varchar(255) NOT NULL,
  `lokasi_nikah` varchar(255) NOT NULL,
  `email_pendaftar` varchar(255) DEFAULT NULL,
  `penghulu_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`id`, `no_pendaftarn`, `desa_id`, `user_id`, `tempat_nikah`, `tggl_akad`, `waktu_akad`, `lokasi_nikah`, `email_pendaftar`, `penghulu_id`, `status`, `tanggal_daftar`) VALUES
(15, '0000-90104-2023', 4, 3, 'KUA', '2023-04-01', '02:57', 'kalukuang', NULL, 6, 'finish', '2023-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tggl_pengajuan` date NOT NULL,
  `ket_hilang` varchar(255) NOT NULL,
  `scan_kk` varchar(255) NOT NULL,
  `scan_ktp` varchar(255) NOT NULL,
  `swafoto_suami` varchar(255) NOT NULL,
  `swafoto_istri` varchar(255) DEFAULT NULL,
  `status` enum('ditinjau','disetujui','ditolak') NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `pendaftar_id`, `user_id`, `tggl_pengajuan`, `ket_hilang`, `scan_kk`, `scan_ktp`, `swafoto_suami`, `swafoto_istri`, `status`, `keterangan`) VALUES
(32, 15, 3, '2023-04-06', 'ket_hilang-15.jpeg', 'scan_kk-15.jpeg', 'scan_ktp-15.jpeg', 'swafoto_suami-15.jpeg', '', 'disetujui', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penghulu`
--

CREATE TABLE `tb_penghulu` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penghulu`
--

INSERT INTO `tb_penghulu` (`id`, `nama`, `nip`, `alamat`, `jabatan`, `no_telepon`, `status`) VALUES
(6, 'Idward Palisoa.S.Ag', '23631161282618', 'Sorong', 'Penghulu Utama', '081344556677', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `idpesan` int(11) UNSIGNED NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `password`) VALUES
(3, 'Suwand Amin sangaji', 'suwandiaminsangaji@gmail.com', '8c42eb74416a43751076e754f1cf87e5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_istri`
--
ALTER TABLE `tb_data_istri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftar_id` (`pendaftar_id`);

--
-- Indexes for table `tb_data_suami`
--
ALTER TABLE `tb_data_suami`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftar_id` (`pendaftar_id`);

--
-- Indexes for table `tb_data_wali`
--
ALTER TABLE `tb_data_wali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftar_id` (`pendaftar_id`);

--
-- Indexes for table `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftar_id` (`pendaftar_id`);

--
-- Indexes for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penghulu_id` (`penghulu_id`),
  ADD KEY `desa_id` (`desa_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftar_id` (`pendaftar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_penghulu`
--
ALTER TABLE `tb_penghulu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`idpesan`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_data_istri`
--
ALTER TABLE `tb_data_istri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_data_suami`
--
ALTER TABLE `tb_data_suami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_data_wali`
--
ALTER TABLE `tb_data_wali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_penghulu`
--
ALTER TABLE `tb_penghulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `idpesan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_data_istri`
--
ALTER TABLE `tb_data_istri`
  ADD CONSTRAINT `tb_data_istri_ibfk_1` FOREIGN KEY (`pendaftar_id`) REFERENCES `tb_pendaftar` (`id`);

--
-- Constraints for table `tb_data_suami`
--
ALTER TABLE `tb_data_suami`
  ADD CONSTRAINT `tb_data_suami_ibfk_1` FOREIGN KEY (`pendaftar_id`) REFERENCES `tb_pendaftar` (`id`);

--
-- Constraints for table `tb_data_wali`
--
ALTER TABLE `tb_data_wali`
  ADD CONSTRAINT `tb_data_wali_ibfk_1` FOREIGN KEY (`pendaftar_id`) REFERENCES `tb_pendaftar` (`id`);

--
-- Constraints for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD CONSTRAINT `tb_pemeriksaan_ibfk_1` FOREIGN KEY (`pendaftar_id`) REFERENCES `tb_pendaftar` (`id`);

--
-- Constraints for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD CONSTRAINT `tb_pendaftar_ibfk_1` FOREIGN KEY (`penghulu_id`) REFERENCES `tb_penghulu` (`id`),
  ADD CONSTRAINT `tb_pendaftar_ibfk_2` FOREIGN KEY (`desa_id`) REFERENCES `tb_desa` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `tb_pengajuan_ibfk_1` FOREIGN KEY (`pendaftar_id`) REFERENCES `tb_pendaftar` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
