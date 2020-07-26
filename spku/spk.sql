-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2020 pada 09.09
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jk`
--

CREATE TABLE `detail_jk` (
  `id_detail` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_jk`
--

INSERT INTO `detail_jk` (`id_detail`, `id_jurusan`, `id_kriteria`, `bobot`) VALUES
(9, 2, 1, 0.3),
(10, 2, 5, 0.5),
(11, 3, 1, 0.2),
(12, 3, 5, 0.4),
(13, 2, 8, 0.23),
(14, 3, 8, 0.34),
(15, 2, 6, 0.23),
(16, 3, 6, 0.31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sub`
--

CREATE TABLE `detail_sub` (
  `id_detail` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_sub`
--

INSERT INTO `detail_sub` (`id_detail`, `id_kriteria`, `id_subkriteria`) VALUES
(1, 1, 1),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 6, 9),
(10, 5, 10),
(11, 7, 11),
(12, 6, 12),
(13, 6, 13),
(14, 6, 14),
(15, 7, 15),
(16, 5, 16),
(17, 5, 17),
(18, 5, 18),
(19, 8, 19),
(20, 8, 20),
(21, 8, 21),
(22, 8, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(2, 'Teknik Sipil'),
(3, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` char(25) NOT NULL,
  `jenis` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `jenis`) VALUES
(1, 'Nilai', 'Benefit'),
(5, 'Test', 'Benefit'),
(6, 'UKT', 'Cost'),
(7, 'Nilai IPA', 'Benefit'),
(8, 'Piagam', 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_nilai`, `id_siswa`, `id_kriteria`, `nilai`) VALUES
(19, 8, 1, 2),
(20, 8, 5, 3),
(23, 13, 1, 4),
(24, 13, 5, 1),
(25, 8, 8, 3),
(26, 13, 8, 4),
(27, 8, 6, 4),
(28, 13, 6, 2),
(29, 14, 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kelas` char(5) NOT NULL,
  `tahun` int(5) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(2) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `username`, `password`, `nama`, `kelas`, `tahun`, `id_role`, `is_active`, `date_created`) VALUES
(8, 'risnuganteng', '$2y$10$Vlzm1kkM6Uox40vRZGeew.y.2O1Enfl2PvyBtRtspsqPztOItrviy', 'Risnu Asa', 'IPS 4', 2016, 2, 1, 1581940855),
(9, 'admin', '$2y$10$kqD7gWT8nDEm0DEneuD7hubCnTsGOEY4n4nve9UA.pjRZ9RWPmTtO', 'ds', 'ipa', 2016, 1, 1, 1582043155),
(13, '', '', 'Agus', '12 IP', 20202, 2, 1, 1595073772),
(14, '', '', 'Arbrar', '12 IP', 2020, 2, 1, 1595171577);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `range_nilai` varchar(25) NOT NULL,
  `bobotsk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `keterangan`, `range_nilai`, `bobotsk`) VALUES
(1, 'Sangat Baik', '80-100', 4),
(6, 'Baik', '60-80', 3),
(7, 'Cukup', '40-60', 2),
(8, 'Kurang', '0-40', 1),
(9, 'Rendah', '100000>200000', 1),
(10, 'Sangat Baik', '80-100', 4),
(11, 'Sangat Baik', '80-100', 4),
(12, 'Sedang', '200000>500000', 2),
(13, 'Tinggi', '5000000>1000000', 3),
(14, 'Sangat Tinggi', '1000000>', 4),
(15, 'Baik', '60-80', 3),
(16, 'Baik', '60-80', 3),
(17, 'Cukup', '40-60', 2),
(18, 'Kurang', '0-40', 1),
(19, 'Sangat Baik', '80-100', 4),
(20, 'Baik', '60-80', 3),
(21, 'Cukup', '40-60', 2),
(22, 'Kurang', '0-40', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access`, `id_role`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 2, 4),
(6, 1, 5),
(7, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'spk'),
(4, 'penilaian'),
(5, 'menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(7, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(8, 5, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder', 1),
(10, 1, 'Dashboard Admin', 'admin', 'fas fa-fw fa-user', 1),
(13, 3, 'Kriteria', 'spk', 'fas fa-fw fa-chart-area', 1),
(14, 3, 'Jurusan', 'spk/jurusan', 'fas fa-fw fa-chart-area', 1),
(16, 3, 'Subkriteria', 'spk/subKr', 'fas fa-fw fa-chart-area', 1),
(19, 4, 'Penilaian', 'penilaian', 'fas fa-fw fa-chart-area', 1),
(20, 4, 'SAW', 'penilaian/saw', 'fas fa-fw fa-chart-area', 1),
(21, 3, 'Bobot Kriteria', 'spk/bobot', 'fas fa-fw fa-chart-area', 1),
(22, 2, 'Siswa', 'user/siswa', 'fas fa-fw fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_jk`
--
ALTER TABLE `detail_jk`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `detail_sub`
--
ALTER TABLE `detail_sub`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_jk`
--
ALTER TABLE `detail_jk`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `detail_sub`
--
ALTER TABLE `detail_sub`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_jk`
--
ALTER TABLE `detail_jk`
  ADD CONSTRAINT `detail_jk_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jk_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_sub`
--
ALTER TABLE `detail_sub`
  ADD CONSTRAINT `detail_sub_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_sub_ibfk_2` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
