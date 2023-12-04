-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2022 pada 13.22
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `tb_laundry`
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
-- Dumping data untuk tabel `tb_laundry`
--

INSERT INTO `tb_laundry` (`id_laundry`, `id_pelanggan`, `kode_user`, `tanggal_terima`, `tanggal_selesai`, `jumlah_kiloan`, `nominal`, `status`, `catatan`) VALUES
(3, 'PLG-0004', 1, '2022-09-27', '2022-09-28', 1, 7000, 'lunas', 'b'),
(5, 'PLG-0002', 1, '2022-09-27', '2022-09-28', 1, 7000, 'Lunas', 'baju'),
(6, 'PLG-0002', 2, '2022-09-27', '2022-09-28', 2, 14000, 'Lunas', 'baju2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `telepon`) VALUES
('PLG-0002', 'Ana', 'Palembang', '08957896777'),
('PLG-0003', 'Bona', 'Palembang', '0897482949'),
('PLG-0004', 'Budi', 'Palembang', '08989492133'),
('PLG-0005', 'Jono', 'Palembang', '0897674623');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
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
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kode_transaksi`, `kode_user`, `tgl_transaksi`, `pemasukan`, `pengeluaran`, `catatan`, `keterangan`) VALUES
(1, 1, '2022-09-27', 7000, 0, 'b', 'pemasukan'),
(2, 1, '2022-09-27', 7000, 0, 'baju 1', 'pemasukan'),
(6, 1, '2022-09-27', 0, 5000, 'beli detergen', 'pengeluaran'),
(7, 2, '2022-09-27', 14000, 0, 'baju2', 'pemasukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama_user`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'Admin', 'admin', 'admin', 'foto.jpg'),
(2, 'kasir', 'Kasir1', '123456', 'kasir', 'kasir.jpg'),
(3, 'user2', 'user2', 'user', 'kasir', 'avatar-3.jpg'),
(4, 'user3', 'user3', 'user3', 'kasir', 'avatar-7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_laundry`
--
ALTER TABLE `tb_laundry`
  ADD PRIMARY KEY (`id_laundry`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
