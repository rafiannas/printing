-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2020 pada 05.00
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
(4, 'asdasdasd', 'aaa@a.a', 'aaa', '123123', 'asdasd', 2),
(6, 'budi', 'bbb@b.b', 'bbb', '0879854654', 'kemang', 2);

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
(32, 7, '12', 5, 'download.jpg');

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
  `jumlah_order` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_order` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `bukti_booking` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`id_order`, `id_customer`, `tgl_order`, `jumlah_order`, `total_harga`, `status_order`, `id_operator`, `bukti_booking`) VALUES
(7, 4, '2020-01-06', 1, 100000, 3, 0, 'download.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_order`
--

CREATE TABLE `status_order` (
  `id` int(11) NOT NULL,
  `status_order` varchar(20) NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_order`
--

INSERT INTO `status_order` (`id`, `status_order`, `gambar`) VALUES
(1, 'BAYAR DP', 'pending.png'),
(2, 'PRINTING', 'printing.png'),
(3, 'DONE', 'done.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kertas`
--

CREATE TABLE `tipe_kertas` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_kertas`
--

INSERT INTO `tipe_kertas` (`id_tipe`, `tipe`) VALUES
(1, 'Kertas Ukuran A'),
(2, 'Kertas Ukuran B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_kertas`
--

CREATE TABLE `ukuran_kertas` (
  `id_tipe` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `kertas` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran_kertas`
--

INSERT INTO `ukuran_kertas` (`id_tipe`, `id`, `kertas`, `harga`, `gambar`) VALUES
(1, 1, 'A0', 25000, 'a0.png'),
(1, 2, 'A1', 20000, 'a1.png'),
(1, 3, 'A2', 15000, 'a2.png'),
(1, 4, 'A3', 10000, 'a3.png'),
(1, 5, 'A4', 2000, 'a4.png'),
(1, 6, 'A5', 1000, 'a5.png'),
(1, 7, 'A6', 700, 'a6.png'),
(1, 8, 'A7', 500, 'a7.png'),
(1, 9, 'A8', 300, 'a8.png'),
(1, 10, 'A9', 200, 'a9.png'),
(1, 11, 'A10', 100, 'a10.png'),
(2, 12, 'B0', 20000, 'b0.png'),
(2, 13, 'B1', 18000, 'b1.png'),
(2, 14, 'B2', 15000, 'b2.png'),
(2, 15, 'B3', 13000, 'b3.png'),
(2, 16, 'B4', 11000, 'b4.png'),
(2, 17, 'B5', 9000, 'b6.png'),
(2, 18, 'B7', 7000, 'b7.png'),
(2, 19, 'B8', 3000, 'b8.png'),
(2, 20, 'B9', 2000, 'b9.png'),
(2, 21, 'B10', 1000, 'b10.png');

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
-- Indeks untuk tabel `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe_kertas`
--
ALTER TABLE `tipe_kertas`
  ADD PRIMARY KEY (`id_tipe`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `isi_order`
--
ALTER TABLE `isi_order`
  MODIFY `id_isi_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tipe_kertas`
--
ALTER TABLE `tipe_kertas`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
