-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 03:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_departemen`
--

CREATE TABLE `tbl_mst_departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(255) NOT NULL,
  `singkatan_departemen` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_departemen`
--

INSERT INTO `tbl_mst_departemen` (`id_departemen`, `nama_departemen`, `singkatan_departemen`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Informasi Teknologi Development', 'ITD', 0, '2022-02-09 07:34:19', '', '2022-02-12 21:21:00', 'admin'),
(2, 'Human Resources Department', 'HRD', 1, '2022-02-09 07:34:26', '', '2022-02-25 00:20:00', 'admin'),
(3, 'Personalia', 'PSN', 1, '2022-02-09 02:22:21', 'admin', '2022-02-11 01:39:16', 'admin'),
(7, 'Sales & Marketing', 'SM', 1, '2022-02-11 18:32:06', 'admin', '2022-02-12 01:32:06', ''),
(8, 'Purchasing', 'PS', 1, '2022-02-11 18:32:38', 'admin', '2022-02-11 18:37:06', 'admin'),
(9, 'Production', 'PD', 1, '2022-02-11 18:32:53', 'admin', '2022-02-11 18:52:33', 'admin'),
(10, 'QA Quality Assurance', 'QA', 1, '2022-02-11 18:39:49', 'admin', '2022-03-07 05:18:09', 'admin'),
(11, 'Edit Ddd', 'SS', 1, '2022-03-01 06:16:04', 'admin', '2022-03-11 07:36:23', 'admin'),
(19, '4ff', 'A', 0, '2022-03-07 06:31:15', 'admin', '2022-03-07 06:34:50', 'admin'),
(20, 'Ee', 'E', 0, '2022-03-07 06:32:22', 'admin', '2022-03-07 06:34:00', 'admin'),
(21, 'W', 'S', 0, '2022-03-07 06:32:42', 'admin', '2022-03-07 06:33:49', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_kamar`
--

CREATE TABLE `tbl_mst_kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `penghuni` int(11) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mst_kamar`
--

INSERT INTO `tbl_mst_kamar` (`id_kamar`, `id_mess`, `nomor_kamar`, `kapasitas`, `penghuni`, `is_available`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(6, 2, 1, 1, NULL, 1, 1, '2022-03-14 08:08:33', 'admin2', '0000-00-00 00:00:00', ''),
(7, 2, 2, 1, NULL, 1, 1, '2022-03-14 08:08:33', 'admin2', '0000-00-00 00:00:00', ''),
(8, 3, 1, 2, 1, 1, 1, '2022-03-15 02:40:34', 'admin2', '2022-03-14 20:40:34', 'admin2'),
(9, 3, 2, 3, NULL, 1, 1, '2022-03-15 02:09:03', 'admin2', '2022-03-14 19:54:55', 'admin2'),
(10, 3, 3, 1, 1, 0, 1, '2022-03-15 02:40:06', 'admin2', '2022-03-14 20:40:06', 'admin2'),
(11, 4, 1, 2, NULL, 1, 1, '2022-03-14 20:48:48', 'admin2', '0000-00-00 00:00:00', ''),
(12, 4, 2, 1, NULL, 1, 1, '2022-03-14 20:48:48', 'admin2', '0000-00-00 00:00:00', ''),
(13, 4, 3, 2, NULL, 1, 1, '2022-03-14 20:48:48', 'admin2', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_karyawan`
--

CREATE TABLE `tbl_mst_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_karyawan`
--

INSERT INTO `tbl_mst_karyawan` (`id_karyawan`, `id_departemen`, `nik`, `nama_karyawan`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 7, '23333', 'Wira', '2022-02-08', 'Laki-laki', 'Jl. Wira', 1, '2022-02-21 18:38:13', 'admin', '2022-02-22 01:38:13', ''),
(2, 2, '24001', 'Cinta', '2022-02-02', 'Perempuan', 'Jl. Cinta', 1, '2022-02-21 18:38:49', 'admin', '2022-02-22 01:38:49', ''),
(3, 9, '40364', 'Yuliana', '2022-02-08', 'Perempuan', 'Jl. Yuliana', 1, '2022-02-21 19:40:11', 'admin', '2022-02-22 02:40:11', ''),
(4, 3, '30963', 'Nur', '2022-02-05', 'Perempuan', 'Jl. Nur', 1, '2022-02-21 18:39:59', 'admin', '2022-02-22 01:39:59', ''),
(5, 10, '75423', 'Krisna', '2022-02-10', 'Perempuan', 'Jl. Krisna', 1, '2022-02-21 18:40:33', 'admin', '2022-02-22 01:40:33', ''),
(6, 7, '48123', 'Daud Daud', '2022-02-08', 'Laki-laki', 'Jl. Daud', 1, '2022-02-21 18:41:08', 'admin', '2022-03-07 06:38:02', 'admin'),
(7, 8, '26841', 'Irfan', '2022-02-16', 'Laki-laki', 'Jl. Irfan', 1, '2022-02-21 18:41:45', 'admin', '2022-02-25 01:44:06', 'admin'),
(8, 3, '75580', 'Putri', '2022-02-07', 'Perempuan', 'Jl. Putri', 1, '2022-02-21 18:42:11', 'admin', '2022-02-22 01:42:11', ''),
(9, 8, '06970', 'Melati', '2022-02-08', 'Perempuan', 'Jl. Melati', 1, '2022-02-21 18:42:42', 'admin', '2022-02-22 01:42:42', ''),
(10, 8, '47534', 'Surya', '2022-02-19', 'Laki-laki', 'Jl . Surya', 1, '2022-02-21 18:43:26', 'admin', '2022-02-22 01:43:26', ''),
(11, 11, '1234', 'Test Aja', '2022-02-09', 'Laki-laki', 'Test Aja', 1, '2022-03-01 19:19:31', 'admin', '2022-03-02 01:19:31', ''),
(12, 11, '1234', 'Test Aja', '2022-02-09', 'Laki-laki', 'Test Aja Edit', 0, '2022-03-01 19:20:02', 'admin', '2022-03-01 19:29:22', 'admin'),
(13, 11, '11', 'Dsf', '2022-03-01', 'Laki-laki', 'W', 0, '2022-03-07 06:38:41', 'admin', '2022-03-07 06:38:53', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_mess`
--

CREATE TABLE `tbl_mst_mess` (
  `id_mess` int(11) NOT NULL,
  `nama_mess` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_kamar` int(11) DEFAULT NULL,
  `type_mess` varchar(255) DEFAULT NULL,
  `kategori_mess` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_mess`
--

INSERT INTO `tbl_mst_mess` (`id_mess`, `nama_mess`, `alamat`, `jumlah_kamar`, `type_mess`, `kategori_mess`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Mess Sakinah', 'Jl. Sakinah No 01', 2, 'Keluarga', '', 1, '2022-03-14 08:08:33', 'admin2', '2022-03-14 14:08:33', ''),
(3, 'Mess Putri', 'Jl. Putri No 01', 3, 'Lajang', 'Perempuan', 1, '2022-03-14 08:11:48', 'admin2', '2022-03-14 14:11:48', ''),
(4, 'Mes Buaya', 'Jl. Buaya', 3, 'Lajang', 'Laki-laki', 0, '2022-03-14 20:48:48', 'admin2', '2022-03-15 02:48:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trx_mess`
--

CREATE TABLE `tbl_trx_mess` (
  `id_trx_mess` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL,
  `id_kamar` int(11) DEFAULT '0',
  `komentar` varchar(255) NOT NULL,
  `complate_stat` tinyint(255) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL,
  `approve_status` tinyint(255) DEFAULT '0',
  `approve_by` varchar(255) NOT NULL,
  `approve_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trx_mess`
--

INSERT INTO `tbl_trx_mess` (`id_trx_mess`, `id_karyawan`, `id_mess`, `id_kamar`, `komentar`, `complate_stat`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `approve_status`, `approve_by`, `approve_date`) VALUES
(26, 3, 3, 10, '', 0, 1, '2022-03-14 20:40:06', 'admin2', '2022-03-15 02:40:06', '', 0, '', '2022-03-15 02:40:06'),
(27, 2, 3, 8, '', 1, 1, '2022-03-14 20:40:34', 'admin2', '2022-03-14 20:41:39', 'admin2', 0, '', '2022-03-15 02:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `gambar`, `password`, `role_id`, `is_active`, `created_date`) VALUES
(1, 'Maulana Sarowis', 'maulanasarowis@gmail.com', 'default.jpg', '$2y$10$Xt.IyXNOkoxRhH1K2vRJkOrFttaB.MNKJLjmQQCEtdSvw7qB25i8.', 2, 1, 1645753424),
(2, 'Admin', 'admin@admin.com', 'default.jpg', '$2y$10$3qo8kRP0ruQwFxqbj/Ztd.qm3i0bNLSx/HEnB6k904Ua5/Sw4Px1m', 1, 1, 1645780472),
(3, 'User', 'user@user.com', 'default.jpg', '$2y$10$4o4PNV55HS/OXduYCSt1FOJcWyuqk1FKkDw8gXkD7gz3VD3ULbYNO', 2, 1, 1646738673),
(4, 'admin2', 'admin2@admin.com', 'default.jpg', '$2y$10$DtCA9Vkhk/cpDvpkTEltPO5fF28XyhoT.iTN10VGirSrApqq1JpVu', 1, 1, 1647224058);

-- --------------------------------------------------------

--
-- Table structure for table `users_access_menu`
--

CREATE TABLE `users_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_access_menu`
--

INSERT INTO `users_access_menu` (`id`, `role_id`, `id_menu`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 1, '2022-03-01 04:07:33', 'admin', '2022-03-01 04:07:33', ''),
(2, 1, 2, '2022-03-01 04:07:33', 'admin', '2022-03-01 04:07:33', ''),
(3, 2, 2, '2022-03-01 04:08:03', 'admin', '2022-03-01 04:08:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_menu`
--

CREATE TABLE `users_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_menu`
--

INSERT INTO `users_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `users_sub_menu`
--

CREATE TABLE `users_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `html_data_toggle` varchar(255) NOT NULL,
  `html_id` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_sub_menu`
--

INSERT INTO `users_sub_menu` (`id`, `id_menu`, `title`, `url`, `icon`, `html_data_toggle`, `html_id`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '1', 'Dashboard', 'admin/C_admin', 'fas fa-fw fa-tachometer-alt', '', '', 1, '2022-02-25 09:58:08', 'admin', '2022-02-25 09:58:08', ''),
(2, '2', 'My Profile', 'user/C_user', 'fas fa-fw fa-user', '', '', 1, '2022-02-25 10:01:47', 'admin', '2022-02-25 10:01:47', ''),
(3, '1', 'Master', '', 'fas fa-fw fa-database', 'data-toggle=\"collapse\" data-target=\"#collapseTwo\"', 'id=\"collapseTwo\"', 1, '2022-03-01 06:38:38', '', '2022-03-01 06:38:38', ''),
(4, '1', 'Transaksi', '', 'fas fa-fw fa-tachometer-alt', 'data-toggle=\"collapse\" data-target=\"#collapseUtilities\"', 'id=\"collapseUtilities\"', 1, '2022-03-01 06:38:38', '', '2022-03-01 06:38:38', ''),
(5, '2', 'Approval', 'user/C_approval', 'fas fa-fw fa-clipboard-check', '', '', 1, '2022-03-01 06:40:30', '', '2022-03-01 06:40:30', ''),
(6, '2', 'Monitoring', 'user/C_monitoring', 'fas fa-fw fa-chart-area', '', '', 1, '2022-03-01 06:40:58', '', '2022-03-01 06:40:58', ''),
(7, '1', 'Data Reject', 'user/C_approval/v_reject', 'fas fa-fw fa-tachometer-alt', '', '', 1, '2022-03-01 06:48:54', '', '2022-03-01 06:48:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_sub_sub_menu`
--

CREATE TABLE `users_sub_sub_menu` (
  `id` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `html_id` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_sub_sub_menu`
--

INSERT INTO `users_sub_sub_menu` (`id`, `id_sub_menu`, `title`, `url`, `html_id`, `is_active`) VALUES
(1, 3, 'Departemen', 'admin/C_departemen', '', 1),
(2, 3, 'Mess', 'admin/C_mess', '', 1),
(3, 3, 'Karyawan', 'admin/C_karyawan', '', 1),
(4, 4, 'Input Penghuni', 'admin/C_transaksi', '', 1),
(5, 4, 'Pindah Penghuni', 'admin/C_pindahmess', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mst_departemen`
--
ALTER TABLE `tbl_mst_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `tbl_mst_kamar`
--
ALTER TABLE `tbl_mst_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_mess` (`id_mess`);

--
-- Indexes for table `tbl_mst_karyawan`
--
ALTER TABLE `tbl_mst_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_departemen` (`id_departemen`);

--
-- Indexes for table `tbl_mst_mess`
--
ALTER TABLE `tbl_mst_mess`
  ADD PRIMARY KEY (`id_mess`);

--
-- Indexes for table `tbl_trx_mess`
--
ALTER TABLE `tbl_trx_mess`
  ADD PRIMARY KEY (`id_trx_mess`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sub_sub_menu`
--
ALTER TABLE `users_sub_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mst_departemen`
--
ALTER TABLE `tbl_mst_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_mst_kamar`
--
ALTER TABLE `tbl_mst_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_mst_karyawan`
--
ALTER TABLE `tbl_mst_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_mst_mess`
--
ALTER TABLE `tbl_mst_mess`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_trx_mess`
--
ALTER TABLE `tbl_trx_mess`
  MODIFY `id_trx_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_sub_sub_menu`
--
ALTER TABLE `users_sub_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_mst_karyawan`
--
ALTER TABLE `tbl_mst_karyawan`
  ADD CONSTRAINT `tbl_mst_karyawan_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `tbl_mst_departemen` (`id_departemen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
