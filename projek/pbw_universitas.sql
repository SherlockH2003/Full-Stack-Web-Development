-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 15.38
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbw_universitas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id` int(11) NOT NULL,
  `mahasiswa_npm` char(13) NOT NULL,
  `matakuliah_kodemk` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id`, `mahasiswa_npm`, `matakuliah_kodemk`) VALUES
(1, '2210631250000', 'SIS000'),
(2, '2210631250001', 'SIS001'),
(3, '2210631250002', 'SIS000'),
(4, '2210631250003', 'SIS002'),
(5, '2210631250004', 'IFS001'),
(6, '2210631250005', 'SIS000'),
(7, '2210631250006', 'SIS000'),
(8, '2210631250007', 'SIS001'),
(9, '2210631250008', 'SIS001'),
(10, '2210631250009', 'SIS002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NPM` char(13) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jurusan` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NPM`, `Nama`, `Jurusan`, `Alamat`) VALUES
('2210631250000', 'Siska Putra', 'Sistem Informasi', 'Bekasi'),
('2210631250001', 'Ujang Aziz', 'Sistem Informasi', 'Karawang'),
('2210631250002', 'Veronica Setyano', 'Sistem Informasi', 'Cikarang'),
('2210631250003', 'Rizka Nurmala Putri', 'Sistem Informasi', 'Cikarang'),
('2210631250004', 'Eren Putra', 'Teknik Informatika', 'Purwakarta'),
('2210631250005', 'Putra Abdul Rachman', 'Sistem Informasi', 'Cianjur'),
('2210631250006', 'Rahmat Andriyadi', 'Sistem Informasi', 'Karawang'),
('2210631250007', 'Ayu Puspitasari', 'Sistem Informasi', 'Bekasi'),
('2210631250008', 'Putri Ayuni', 'Sistem Informasi', 'Jakarta'),
('2210631250009', 'Andri Muhammad', 'Sistem Informasi', 'Karawang'),
('2210631250049', 'Farhan Abyan Putra Karim', 'Sistem Informasi', 'Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kodemk` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_sks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kodemk`, `nama`, `jumlah_sks`) VALUES
('IFS001', 'Kajian dan Jurnal Informatika', 2),
('SIS000', 'Basis Data', 3),
('SIS001', 'Pemrograman Berbasis Web', 3),
('SIS002', 'Algoritma dan Struktur Data', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_npm` (`mahasiswa_npm`),
  ADD KEY `matakuliah_kodemk` (`matakuliah_kodemk`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NPM`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kodemk`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`mahasiswa_npm`) REFERENCES `mahasiswa` (`npm`),
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`matakuliah_kodemk`) REFERENCES `matakuliah` (`kodemk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
