-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2024 pada 13.51
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_table`
--

CREATE TABLE `admin_table` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_table`
--

INSERT INTO `admin_table` (`id_admin`, `email`, `password`, `username`, `reset_token`, `reset_expiration`) VALUES
(18, 'dfhv.gamer@gmail.com', '$2y$10$K73Op3NK4Q4LID95arqb5.27LoaaT9NIQMGO54vJwzg2BxiZeOmE2', 'Daffa', NULL, NULL),
(23, 'dmalikakram@gmail.com', '$2y$10$j/zUk6DZlYqhcCcdykJ7O.hbRNEApVeNzo/nKqY4Ipx/Le9i5PRYK', 'akram', 'f18f2a19c086b821598f9361e0b4f98b786ddcee15461542a6cbdb97ea9d79a06974835a143e3d95a7d11b7a5619e5feed89', '2024-06-14 18:01:13'),
(24, 'dfhv.gamer@gmail.com', '$2y$10$fhS37SxSdp2/19tZbiUvOuUJwwqVSlDdfcZfBldqNGFn6qrBz9sma', 'malik', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konser_table`
--

CREATE TABLE `konser_table` (
  `id_konser` int(11) NOT NULL,
  `nama_konser` varchar(100) NOT NULL,
  `tanggal_event` varchar(50) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `nomor_ktp` varchar(50) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `masa_berlaku` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konser_table`
--

INSERT INTO `konser_table` (`id_konser`, `nama_konser`, `tanggal_event`, `nama_lengkap`, `nomor_telepon`, `email`, `nomor_ktp`, `no_rek`, `masa_berlaku`, `kelas`) VALUES
(148, 'JKT48 INDONESIA MILENIAL & GE..', 'Rabu26 November', 'Daffa Malik Akram', '087796717243', 'dmalikakram@gmail.com', '36740503040004', '7987897896876', '26 November', 'REGULER 1'),
(151, 'IVE THE 1ST WORLD TOUR SHOW WHAT i HAVE IN JAKARTA', 'Sabtu, 24 Agustus', 'Malik Akram', '087796717243', 'dmalikakram@gmail.com', '36740503040004', '7987897896876', '24 Agustus', 'REGULER 1'),
(152, 'Avenged Sevenfold THE ONLY STO..', 'Jumat, 25 Mei 2024', 'Akram', '087796717243', 'daffamalik0304@gmail.com', '367405021432', '7987897896876', '25 Mei 2024', 'REGULER 1'),
(153, 'Westlife The Hits Tour 2024', 'Jumat, 7 Juni 2024', 'Muhammad Daffa Malik Akram', '087796717243', 'dfhv.gamer@gmail.com', '367405021432', '7987897896876', '7 Juni 2024', 'REGULER 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_table`
--

CREATE TABLE `user_table` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_table`
--

INSERT INTO `user_table` (`id_user`, `nama`, `username`, `password`, `email`) VALUES
(13, '', 'akram', '$2y$10$0OmgtTCAZrM6BWX7Q9/HK.ZI2mGmk9Eq1gw/Tb72qg9j8XAacBUrq', 'dfhv.gamer@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `konser_table`
--
ALTER TABLE `konser_table`
  ADD PRIMARY KEY (`id_konser`);

--
-- Indeks untuk tabel `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `konser_table`
--
ALTER TABLE `konser_table`
  MODIFY `id_konser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
