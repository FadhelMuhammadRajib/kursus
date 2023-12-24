-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 07.50
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kursus`
--

CREATE TABLE `data_kursus` (
  `id_kursus` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `durasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kursus`
--

INSERT INTO `data_kursus` (`id_kursus`, `judul`, `deskripsi`, `durasi`) VALUES
(3, 'TOEFL', 'pembelajaran toefl dan tes ', '15 Hari'),
(4, 'Kursus Microsoft Office', 'Pembelajaran Dasar Microsoft Office', '7 hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kursus`, `judul`, `deskripsi`, `link`) VALUES
(11, 3, 'Pengertian TOEFL', 'TOEFL hanya bertujuan mengukur kemampuan bahasa masyarakat ', 'https://www.gramedia.com/best-seller/pengertian-tes-toefl/'),
(13, 4, 'Meteri Dasar Microsoft Word', 'kefasihan dalam menggunakan program aplikasi bernama Microsoft Word', 'https://www.gramedia.com/literasi/pengertian-microsoft-word/');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kursus`
--
ALTER TABLE `data_kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kursus`
--
ALTER TABLE `data_kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
