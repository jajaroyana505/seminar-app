-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2023 pada 07.36
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_seminar_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `htm`
--

CREATE TABLE `htm` (
  `id_seminar` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `htm`
--

INSERT INTO `htm` (`id_seminar`, `harga`) VALUES
(1, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `user_id` int(11) NOT NULL,
  `no_invoice` varchar(11) NOT NULL,
  `nominal` double NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `token_snap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`user_id`, `no_invoice`, `nominal`, `status`, `token_snap`) VALUES
(7441392, '1677131947', 50000, NULL, '5e8b4e9c-b91a-4a91-9aa2-04c8ce759a7e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_seminar` int(11) NOT NULL,
  `tanggal_pendaftaran` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `user_id`, `id_seminar`, `tanggal_pendaftaran`) VALUES
(12, 7441392, 1, '23-02-2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `prodi` varchar(20) NOT NULL,
  `kampus` varchar(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `token_qr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`user_id`, `nama`, `nim`, `semester`, `prodi`, `kampus`, `email`, `no_tlp`, `status`, `token_qr`) VALUES
(7441392, 'jaja royana', '12210792', '1', 'Sistem Informasi Aku', 'Cikampek', 'muhammadjajaroyana3@gmail.com', '+6281389931321', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar`
--

CREATE TABLE `seminar` (
  `id` int(11) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `pembicara` varchar(128) NOT NULL,
  `moderator` varchar(128) NOT NULL,
  `banner` varchar(128) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `tempat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `seminar`
--

INSERT INTO `seminar` (`id`, `tema`, `deskripsi`, `pembicara`, `moderator`, `banner`, `waktu`, `tanggal`, `tempat`) VALUES
(1, 'Cybersecurity: Menjaga Keamanan Informasi di Era D', 'membahas tentang pentingnya keamanan informasi dalam era digital saat ini. Dalam era digital yang semakin berkembang, ancaman cyber juga semakin tinggi dan sering terjadi. Oleh karena itu, penting untuk memahami bagaimana cara menjaga ', 'Eko Budi Rahardian - CEO dan Founder dari PT Neta Cyber Security Indonesia', 'Silivia Setiawati & Arlan Maulana', 'defaul.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `gender`, `email`, `profile_picture`) VALUES
(3313558, 'user3313558', 'Muhammad', 'Jaja Royana', NULL, 'muhammadjajaroyana4@gmail.com', 'https://lh3.googleusercontent.com/a/AGNmyxYUfYnI9LFHC1hFqt5-unN1RhbhIfigNN1TMSODxQ=s96-c'),
(3378264, 'user3378264', 'Naila', 'Nadira', NULL, 'nailanadira97@gmail.com', 'https://lh3.googleusercontent.com/a/AEdFTp7OsYXm-98q50X0g3dCT5SEsWFNrcbC4IQPkbIMxg=s96-c'),
(4007381, 'user4007381', 'Devi', 'Permatasari', NULL, 'devikinan021@gmail.com', 'https://lh3.googleusercontent.com/a/AGNmyxbxT4dRjCGnf0VC75o3v3E6Prm4Cywojnzvjva7=s96-c'),
(7441392, 'user7441392', 'MJ', 'Royana', NULL, 'muhammadjajaroyana3@gmail.com', 'https://lh3.googleusercontent.com/a/AEdFTp5EKuL2_1ONxiGPaOGJ-4M-MVUPS2wTFeKIzLje3Q=s96-c'),
(8879145, 'user8879145', 'Findi', 'Ruhyantika', NULL, 'findiruhyantika@gmail.com', 'https://lh3.googleusercontent.com/a/AGNmyxbGAqkog6hEAFCI-3Ek3X7PvhF5qDJI-W2wvIFy=s96-c');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `htm`
--
ALTER TABLE `htm`
  ADD UNIQUE KEY `id_seminar` (`id_seminar`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
