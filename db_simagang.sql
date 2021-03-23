-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 07:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `id_username_pembimbing` int(11) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_induk` varchar(25) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat_rumah` varchar(200) NOT NULL,
  `no_telp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `id_username_pembimbing`, `tempat_lahir`, `tanggal_lahir`, `nomor_induk`, `agama`, `alamat_rumah`, `no_telp`) VALUES
(1, 11, 'mlg', '2021-02-16', '21548', 'islam', 'jalan', '54875');

-- --------------------------------------------------------

--
-- Table structure for table `periksa_log_harian`
--

CREATE TABLE `periksa_log_harian` (
  `id_periksa` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `file_download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa_log_harian`
--

INSERT INTO `periksa_log_harian` (`id_periksa`, `id_peserta`, `tanggal`, `deskripsi`, `file_download`) VALUES
(1, 6, '2021-02-06', 'ujicoba', 'harian.pdf'),
(2, 6, '2021-02-15', 'uji coba image', 'a.jpg'),
(3, 6, '2021-02-18', 'fgh', 'IMG_20201219_110638_645.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_username` int(11) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `nomor_induk` varchar(50) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat_sekolah` varchar(200) NOT NULL,
  `alamat_rumah` varchar(200) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `alamat_kos` varchar(200) NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_username`, `tempat_lahir`, `asal_sekolah`, `jurusan`, `nomor_induk`, `agama`, `alamat_sekolah`, `alamat_rumah`, `no_telp`, `alamat_kos`, `tanggal_pelaksanaan`, `tanggal_berakhir`, `tanggal_lahir`, `kelas`) VALUES
(1, 6, 'malang', 'SMK', 'RPL', '024589', 'Islam', 'Jl.Raya', 'JL.Kampung', '0215485', 'Jl.kosan', '2021-02-10', '2021-02-19', '2021-02-04', '12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'yes', 'admin@gmail.com', 'default.jpg', '$2y$10$3THuDw1sq3doEA3X4rWs7uRUty2HcQNQo9dqOPqBXQFDnyRfDmhj2', 1, 1, 1552120289),
(6, 'Doddy Ferdiansyah', 'user@gmail.com', 'default.jpg', '$2y$10$3THuDw1sq3doEA3X4rWs7uRUty2HcQNQo9dqOPqBXQFDnyRfDmhj2', 2, 1, 1552285263),
(11, 'pembimbing', 'pembimbing@gmail.com', 'default.jpg', '$2y$10$3THuDw1sq3doEA3X4rWs7uRUty2HcQNQo9dqOPqBXQFDnyRfDmhj2', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Pembimbing');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Peserta'),
(3, 'Pembimbing');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Tambah Peserta', 'admin/tambah_peserta', 'fas fa-user-plus', 1),
(2, 1, 'Tambah Pembimbing', 'admin/tambah_pembimbing', 'fas fa-user-plus', 1),
(3, 2, 'Ubah profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 2, 'Log Harian', 'user/log', 'fas fa-fw fa-folder', 1),
(5, 3, 'Ubah profile', 'pembimbing/edit', 'fas fa-fw fa-user-edit', 1),
(7, 3, 'Periksa Log Harian Peserta', 'pembimbing/log', 'fas fa-fw fa-folder', 1),
(8, 1, 'Daftar Peserta', 'admin/view_peserta', 'fas fa-users', 1),
(9, 1, 'Daftar Pembimbing', 'admin/view_pembimbing', 'fas fa-users', 1),
(11, 1, 'Ubah profile', 'admin/edit', 'fas fa-fw fa-user-edit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `periksa_log_harian`
--
ALTER TABLE `periksa_log_harian`
  ADD PRIMARY KEY (`id_periksa`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periksa_log_harian`
--
ALTER TABLE `periksa_log_harian`
  MODIFY `id_periksa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
