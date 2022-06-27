-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2022 pada 23.43
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `hargabeli` int(11) DEFAULT NULL,
  `hargajual` int(11) DEFAULT NULL,
  `biayapesan` int(11) DEFAULT NULL,
  `biayasimpan` int(11) DEFAULT NULL,
  `leadtime` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode`, `nama`, `jenis`, `satuan`, `stok`, `hargabeli`, `hargajual`, `biayapesan`, `biayasimpan`, `leadtime`, `image`) VALUES
('BRG001', 'Kabel Audio Jack', 1, 2, 26, 10000, 12000, 1000, 1000, 7, 'post-images/ILLLSsZzyCXpBlIu5fafqFTgEap5rgGdsccrYVN4.jpg'),
('BRG002', 'Meja Lipat', 2, 3, 22, 120000, 130000, 1000, 500, 8, 'post-images/Pwjx6h20ioOIE8gx5oy3FOqZcYJU7csol2cbQdoH.jpg'),
('BRG003', 'Mouse RGB KW', 1, 2, 100, 25000, 30000, 1000, 500, 12, 'post-images/ZBoHEsuibtL3Ng4O5KIpBkz5hSTBNlpy1PXzIWpQ.jpg'),
('BRG004', 'Earphone murah', 1, 1, 50, 5000, 8000, 1000, 500, 12, 'post-images/ozUAMsXyZtRYHEcHMdqUdrj68WsgEqxOKiRf5hRt.jpg'),
('BRG005', 'Stik PS 2', 1, 2, 15, 30000, 35000, 2000, 1000, 12, 'post-images/9fLmROewRr7Om72qIUWB28oghjezunrsclmJQapR.jpg'),
('BRG006', 'Airpod KW', 1, 2, 20, 27000, 29000, 1000, 500, 12, 'post-images/onR9vUiejxced6W20INhz4rky5xAKmt4lSMGtyKZ.jpg'),
('BRG007', 'Ember Plastik Murah', 2, 2, 20, 10000, 12000, 1000, 500, 12, 'post-images/FBZ1c1bduhd6xjLU6F5uAU80E2iZ0vqyLKy1qTi2.jpg'),
('BRG008', 'Sapu Ijuk', 2, 2, 20, 25000, 29000, 1000, 500, 12, 'post-images/ec0WzoSyQyrIVllUojx7h4aBSk5Ke2WBurwkzHcn.jpg'),
('BRG009', 'Barang Tanpa Nama 2', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/F9AR7M8ZgM2R4iIm7V20tN3EckcRacnZCVrG44iO.jpg'),
('BRG010', 'Tanpa Nama 1', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/eBv2MC59qNeDJL7aAfPTHUsKMRlsqv5JtKACh2CX.png'),
('BRG011', 'Tanpa Nama 2', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/CxTMFWABHmlKyX4Kdx9ajz2GFH4Jvk8xB90Cs2gi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpembelian`
--

CREATE TABLE `detailpembelian` (
  `id` int(11) NOT NULL,
  `nofaktur` char(20) DEFAULT NULL,
  `kodebarang` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailpembelian`
--

INSERT INTO `detailpembelian` (`id`, `nofaktur`, `kodebarang`, `qty`, `jumlah`) VALUES
(40, 'MS-20220622144139668', 'BRG001', 1, 10000),
(41, 'MS-20220622152043141', 'BRG002', 2, 240000),
(42, 'MS-20220622152043141', 'BRG001', 2, 20000);

--
-- Trigger `detailpembelian`
--
DELIMITER $$
CREATE TRIGGER `stok_barang_pembelian` AFTER DELETE ON `detailpembelian` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - OLD.qty
	WHERE kode = OLD.kodebarang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `id` int(11) NOT NULL,
  `nofaktur` char(20) DEFAULT NULL,
  `kodebarang` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`id`, `nofaktur`, `kodebarang`, `qty`, `jumlah`) VALUES
(24, 'KL-20220622150346179', 'BRG002', 1, 130000);

--
-- Trigger `detailpenjualan`
--
DELIMITER $$
CREATE TRIGGER `stok_barang_penjualan` AFTER DELETE ON `detailpenjualan` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + OLD.qty
	WHERE kode = OLD.kodebarang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `nama`) VALUES
(1, 'Elektronik'),
(2, 'Perabot Rumah Tangga'),
(3, 'Utilitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `nofaktur` char(20) NOT NULL,
  `tglmasuk` datetime DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `totalitem` int(11) DEFAULT NULL,
  `totalbayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`nofaktur`, `tglmasuk`, `supplier`, `totalitem`, `totalbayar`) VALUES
('MS-20220622144139668', '2022-06-22 00:00:00', 1, 1, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `nofaktur` char(20) NOT NULL,
  `tglkeluar` datetime DEFAULT NULL,
  `totalitem` int(11) DEFAULT NULL,
  `totalbayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`nofaktur`, `tglkeluar`, `totalitem`, `totalbayar`) VALUES
('KL-20220622150346179', '2022-06-22 00:00:00', 1, 130000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `nama`) VALUES
(1, 'Pak'),
(2, 'Unit'),
(3, 'Box');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `notelp` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `notelp`, `alamat`) VALUES
(1, 'Pranata', '089895353534', 'Malang'),
(2, 'Dito', '082234734738', 'Lawang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator@gmail.com', NULL, '$2y$10$.YSchuRmYt8QETgJ9vi5.etP9tJ8DemajvXr3I3sx0sXATqcD2jf2', 'ovJetSNfeg5YWdlvYnMET11BowutVLQFyZqrOLLdiivFpB9zkkgadqou2wE4', 0, '2022-05-23 08:13:57', '2022-05-23 08:13:57'),
(2, 'atasan', 'pimpinan@gmail.com', NULL, '$2y$10$f7V4W.lUW6w0MeLz.WGdmOFGnvPDoHtoi7eTxnt9DtVIzPV4.AEjG', NULL, 1, '2022-06-07 15:47:08', '2022-06-07 15:47:13'),
(3, 'Karyawan Satu', 'karyawansatu@gmail.com', NULL, '$2y$10$jO5jpMhzYVWlBTyS917U8u147mT5QGoh2Y4h3Ey2CC3dFX/x9jVRG', NULL, 2, '2022-06-07 15:47:10', '2022-06-07 15:47:15'),
(5, 'Pranata', 'pran@gmail.com', NULL, '$2y$10$iQZCaram6R2yfeEwdcZpt.GsxfkIPycIJxNdizTFKapt93Gfs3F9G', NULL, 2, '2022-06-22 07:48:09', '2022-06-22 07:48:09'),
(6, 'Zadah', 'zadah@gmail.com', NULL, '$2y$10$kbpAMOCRlosZcqZuyXHTfOnY8vQvnLnl2jbsu.4PfSdRTY4ZGXpBq', NULL, NULL, '2022-06-25 04:02:51', '2022-06-25 04:02:51'),
(7, 'Dito', 'dito@gmail.com', NULL, '$2y$10$73OEC6uiGJE9KhSsNhosKuxFVNLfzgp.ok0UhVMcawopNSK8t0z/a', NULL, NULL, '2022-06-25 04:22:42', '2022-06-25 04:22:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `detailpembelian`
--
ALTER TABLE `detailpembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`nofaktur`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`nofaktur`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpembelian`
--
ALTER TABLE `detailpembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
