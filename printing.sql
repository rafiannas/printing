-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2019 pada 19.32
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `email`, `password`, `no_hp`, `alamat`, `role`) VALUES
(1, 'rafi', 'asd.asd@asd', '$2y$10$ru8LithP6zw5UUaea9WVte11BXkmd6hS3wO8RizzmK3', '123123123', 'rawasari', 2),
(2, 'qew', 'qwe@qwe.qwe', '$2y$10$j7CwY571kgTDP9SP4iil/ug2A3UzwVdoFTL9sjQ15si', '123123213', 'qweqwe', 2),
(3, 'qq', 'qq@qq.qq', '$2y$10$aGMKItI59wVih4vMDaJUUeXUxmkC6Hr9eJZPtUyZ3pP', '1313', 'qqq', 2),
(4, 'asdasdasd', 'aaa@a.a', 'aaa', '123123', 'asdasd', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_order`
--

CREATE TABLE `isi_order` (
  `id_isi_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_ukuran_kertas` varchar(3) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `isi_order`
--

INSERT INTO `isi_order` (`id_isi_order`, `id_order`, `id_ukuran_kertas`, `jumlah`, `file`) VALUES
(1, 1, '4', 7, 'ee.png'),
(2, 1, '1', 3, 'ee.png'),
(3, 1, '2', 4, 'ee.png'),
(4, 1, '1', 1, 'ee.png'),
(5, 1, '1', 1, 'ee.png'),
(6, 1, '1', 1, 'ee.png'),
(7, 1, '3', 1, 'ee.png'),
(8, 1, '2', 1, 'ee.png'),
(9, 1, '4', 4, 'ee.png'),
(10, 1, '3', 5, 'ee.png'),
(11, 1, '2', 15, 'ee.png'),
(12, 1, '2', 20, ''),
(13, 1, '2', 30, 'logo1.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `nama`, `no_hp`) VALUES
(1, 'Ucok', '087822123652'),
(2, 'Ujang', '0896456321'),
(3, 'Omen', '085644563214'),
(4, 'Ipul', '081256564123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

CREATE TABLE `orderan` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `jumah_order` int(11) NOT NULL,
  `status_order` varchar(20) NOT NULL,
  `id_operator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`id_order`, `id_customer`, `tgl_order`, `jumah_order`, `status_order`, `id_operator`) VALUES
(1, 4, '2019-12-25', 2, 'BELUM BAYAR', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_kertas`
--

CREATE TABLE `ukuran_kertas` (
  `id` int(11) NOT NULL,
  `kertas` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran_kertas`
--

INSERT INTO `ukuran_kertas` (`id`, `kertas`, `harga`) VALUES
(1, 'A0', 25000),
(2, 'A1', 20000),
(3, 'A2', 15000),
(4, 'A3', 10000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `isi_order`
--
ALTER TABLE `isi_order`
  ADD PRIMARY KEY (`id_isi_order`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indeks untuk tabel `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `isi_order`
--
ALTER TABLE `isi_order`
  MODIFY `id_isi_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
