-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 01:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `laun_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `laun_priority` int(11) NOT NULL,
  `laun_weight` int(11) NOT NULL,
  `laun_date_received` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `laun_claimed` tinyint(4) NOT NULL DEFAULT 0,
  `laun_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`laun_id`, `customer_name`, `laun_priority`, `laun_weight`, `laun_date_received`, `laun_claimed`, `laun_type_id`) VALUES
(7, 'Reyvelyn Ybanez Viovicente', 7, 3, '2017-03-19 22:38:02', 1, 1),
(9, 'Winnie Alterado Damayo', 3, 2, '2017-03-19 22:43:23', 1, 1),
(10, 'Jane Dougah Hah', 1, 2, '2017-03-19 22:43:23', 1, 2),
(11, 'Johnny Deep', 7, 3, '2017-03-19 23:53:36', 1, 1),
(12, 'Winnie Alterado Damayo', 2, 2, '2017-03-22 16:14:48', 1, 2),
(13, 'Winnie Alterado Damayo', 4, 10, '2017-03-22 16:15:33', 1, 1),
(14, 'Winnie Damayo', 2, 2, '2022-09-15 04:22:18', 1, 1),
(15, 'Andi', 1, 10, '2022-09-15 04:23:16', 1, 1),
(16, 'Ali', 1, 5, '2022-09-15 05:29:28', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_type`
--

CREATE TABLE `laundry_type` (
  `laun_type_id` int(11) NOT NULL,
  `laun_type_desc` varchar(50) NOT NULL,
  `laun_type_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_type`
--

INSERT INTO `laundry_type` (`laun_type_id`, `laun_type_desc`, `laun_type_price`) VALUES
(1, 'Blanket', 20),
(2, 'Clothes', 30);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `sale_customer_name` varchar(100) NOT NULL,
  `sale_type_desc` varchar(50) NOT NULL,
  `sale_date_paid` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sale_laundry_received` datetime NOT NULL,
  `sale_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_customer_name`, `sale_type_desc`, `sale_date_paid`, `sale_laundry_received`, `sale_amount`) VALUES
(1, 'Reyvelyn Ybanez Viovicente', 'Blanket', '2017-03-18 22:38:02', '2017-03-20 00:00:00', 60),
(2, 'Jane Dougah Hah', 'Clothes', '2017-03-19 22:43:23', '2017-03-20 06:43:16', 60),
(3, 'Winnie Alterado Damayo', 'Blanket', '2017-03-19 22:43:23', '2017-03-20 06:42:58', 40),
(4, 'Johnny Deep', 'Blanket', '2017-03-19 23:53:36', '2017-03-20 07:53:27', 60),
(5, 'Winnie Alterado Damayo', 'Clothes', '2017-03-22 16:14:47', '2017-03-23 00:14:40', 60),
(6, 'Winnie Alterado Damayo', 'Blanket', '2017-03-22 16:15:33', '2017-03-23 00:15:28', 200),
(7, 'Winnie Damayo', 'Blanket', '2022-09-15 04:22:18', '2017-04-18 10:59:57', 40),
(8, 'Andi', 'Blanket', '2022-09-15 04:23:16', '2022-09-15 11:23:03', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laundry`
--

CREATE TABLE `tb_laundry` (
  `id_laundry` int(11) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `kode_user` int(11) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_kiloan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laundry`
--

INSERT INTO `tb_laundry` (`id_laundry`, `id_pelanggan`, `kode_user`, `tanggal_terima`, `tanggal_selesai`, `jumlah_kiloan`, `nominal`, `status`, `catatan`) VALUES
(7, 'PLG-0006', 1, '2022-10-27', '2022-10-31', 2, 0, 'Lunas', 'baju kemeja'),
(8, 'selected', 1, '2022-10-06', '2022-10-07', 2, 14000, 'Belum Lunas', 'bebas'),
(9, 'PLG-0007', 1, '2022-10-06', '2022-10-07', 1, 7000, 'Lunas', 'bebas'),
(10, 'PLG-0001', 1, '2022-10-05', '2022-10-06', 1, 7000, 'Lunas', 'Handuk'),
(11, 'PLG-0002', 1, '2022-10-07', '2022-10-09', 2, 14000, 'Lunas', 'Tas besar'),
(12, 'PLG-0003', 1, '2022-10-07', '2022-10-09', 1, 7000, 'Lunas', 'Kemeja'),
(13, 'PLG-0004', 1, '2022-10-08', '2022-10-10', 3, 21000, 'Lunas', 'Sprei\r\nHanduk'),
(14, 'PLG-0005', 1, '2022-10-10', '2022-10-12', 8, 23000, 'Lunas', 'Kiloan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `telepon`) VALUES
('PLG-0001', 'Andi', '', ''),
('PLG-0002', 'Nanda', '', ''),
('PLG-0003', 'Prasetyo', '', ''),
('PLG-0004', 'Salsabila', '', ''),
('PLG-0005', 'Susi', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kode_transaksi`, `kode_user`, `tgl_transaksi`, `pemasukan`, `pengeluaran`, `catatan`, `keterangan`) VALUES
(14, 1, '2022-10-07', 14000, 0, 'Tas besar', 'pemasukan'),
(15, 1, '2022-10-07', 7000, 0, 'Kemeja', 'pemasukan'),
(16, 1, '2022-10-08', 21000, 0, 'Sprei\r\nHanduk', 'pemasukan'),
(17, 1, '2022-10-10', 56000, 0, 'Kiloan', 'pemasukan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama_user`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'Admin', 'admin', 'admin', 'foto.jpg'),
(2, 'kasir', 'Kasir1', '123456', 'kasir', 'kasir.jpg'),
(3, 'user2', 'user2', 'user', 'kasir', 'avatar-3.jpg'),
(4, 'user3', 'user3', 'user3', 'kasir', 'avatar-7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`laun_id`),
  ADD KEY `laun_type_id` (`laun_type_id`);

--
-- Indexes for table `laundry_type`
--
ALTER TABLE `laundry_type`
  ADD PRIMARY KEY (`laun_type_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tb_laundry`
--
ALTER TABLE `tb_laundry`
  ADD PRIMARY KEY (`id_laundry`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundry`
--
ALTER TABLE `laundry`
  MODIFY `laun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `laundry_type`
--
ALTER TABLE `laundry_type`
  MODIFY `laun_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `laundry_ibfk_1` FOREIGN KEY (`laun_type_id`) REFERENCES `laundry_type` (`laun_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
