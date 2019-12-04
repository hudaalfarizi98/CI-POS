-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2019 pada 09.14
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodmas`
--

CREATE TABLE `prodmas` (
  `barcode` int(11) NOT NULL,
  `prdcd` int(11) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `supplier` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodmas`
--

INSERT INTO `prodmas` (`barcode`, `prdcd`, `deskripsi`, `harga`, `supplier`) VALUES
(4563874, 12091289, 'Rinso', 5000, 54),
(98989887, 10009898, 'Kopi Late Ice', 20000, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_temp`
--

CREATE TABLE `transaction_temp` (
  `id_kasir` int(11) DEFAULT NULL,
  `prdcd` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction_temp`
--

INSERT INTO `transaction_temp` (`id_kasir`, `prdcd`, `qty`) VALUES
(2015015915, 10009898, 8),
(2015015915, 12091289, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nik` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nik`, `name`, `password`, `level`) VALUES
(2015015915, 'Huda Alfarizi', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `prodmas`
--
ALTER TABLE `prodmas`
  ADD PRIMARY KEY (`barcode`),
  ADD UNIQUE KEY `prdcd` (`prdcd`);

--
-- Indeks untuk tabel `transaction_temp`
--
ALTER TABLE `transaction_temp`
  ADD PRIMARY KEY (`prdcd`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
