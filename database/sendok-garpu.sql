-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2023 pada 23.25
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sendok-garpu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdd_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedd_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `jenis_id`, `user_id`, `createdd_at`, `updatedd_at`) VALUES
('B000001', 'Sambel Kerang', 1, 9, 1, '2023-03-28 02:38:16', '2023-03-28 02:40:36'),
('B000002', 'Sayur Asem 1L', 0, 9, 1, '2023-03-28 02:38:16', '2023-03-28 02:26:30'),
('B000003', 'Acar Kuning 500ML', 0, 9, 1, '2023-03-28 02:38:16', '2023-03-28 02:26:38'),
('B000004', 'Tongseng Ayam', 0, 9, 1, '2023-03-28 02:38:16', '2023-03-28 02:30:45'),
('B000005', 'Rendang Nangka 500ML', 0, 9, 1, '2023-03-28 02:38:16', '2023-03-28 02:30:55'),
('B000006', 'Buntut Bag', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:31:01'),
('B000007', 'Kuah Sup Buntut', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:31:08'),
('B000008', 'Paru Slice 1L', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:31:16'),
('B000009', 'Gulai Kikil 1L', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:31:31'),
('B000010', 'Gulai Domba 650ML', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:31:39'),
('B000011', 'Beef Betawi Bag', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:31:46'),
('B000012', 'Kuah Soto Betawi 500ML', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:31:56'),
('B000013', 'Daging Ijo 5L', 0, 8, 0, '2023-03-28 02:38:16', '2023-03-28 02:32:03'),
('B000014', 'Iga Nasi Goreng 2.5L', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:32:09'),
('B000015', 'Gulai Babat 5L', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:32:16'),
('B000016', 'Gulai Sapi 5L', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:32:22'),
('B000017', 'Iga Penyet 5L', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:32:30'),
('B000018', 'Ayam Suir 500ML', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:32:36'),
('B000019', 'Bebek (Bag)', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:32:46'),
('B000020', 'Kuah Soto Ayam 500ML', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:32:58'),
('B000021', 'Ayam Kalio 500ML', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:33:08'),
('B000022', 'Ayam Jamur 1L', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:33:14'),
('B000023', 'Ayam Nasi Goreng 5L', 0, 9, 0, '2023-03-28 02:38:16', '2023-03-28 02:33:20'),
('B000024', 'Ayam Drumstick 5L', 0, 14, 0, '2023-03-28 02:38:16', '2023-03-28 02:33:27'),
('B000025', 'Ayam Kalasan 5L', 0, 14, 0, '2023-03-28 02:38:16', '2023-03-28 02:33:34'),
('B000026', 'Ayam Goreng 5L', 0, 14, 0, '2023-03-28 02:38:16', '2023-03-28 02:33:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `user_id`, `barang_id`, `jumlah_masuk`, `tanggal_masuk`) VALUES
('T-BM-23032800001', 1, 'B000001', 1, '2023-03-28 03:02:43');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_att` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `user_id`, `created_att`, `updated_at`) VALUES
(6, 'Dry Stock B', 1, '2023-03-28 02:20:46', '2023-03-28 02:22:00'),
(7, 'Dry Stock A', 14, '2023-03-28 02:23:10', '2023-03-28 02:25:06'),
(8, 'Chiller Room', 1, '2023-03-28 02:23:46', NULL),
(9, 'Freezer Room', 1, '2023-03-28 02:23:52', NULL),
(10, 'Satay & Tongseng', 1, '2023-03-28 02:23:58', NULL),
(11, 'Raw Meat', 1, '2023-03-28 02:24:04', NULL),
(12, 'Veggies & Seafood', 1, '2023-03-28 02:25:33', NULL),
(13, 'Beef & Lamb', 1, '2023-03-28 02:25:40', NULL),
(14, 'Chicken', 1, '2023-03-28 02:25:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Administarator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', '2023-03-28 02:24:38', 'user.png', 1),
(14, 'Nomran', 'user', 'user@gmail.com', '0832423423432', 'user', '$2y$10$5buBO6G5KEJ0I2JAac.BZuBVBx/3jAcwTO67Gk6M2C.feLqnSQ2KS', '2023-03-28 02:24:38', 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kategori_id` (`jenis_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `nama_jenis` (`nama_jenis`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD CONSTRAINT `fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
