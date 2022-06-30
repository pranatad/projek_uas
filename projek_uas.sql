-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2022 pada 14.46
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
('BRG001', 'Kabel Audio Jack', 1, 2, 26, 10000, 12000, 1000, 1000, 7, 'post-images/yxD0PjCKa52CwNt1MaAMo3q02LKNq5L4QMNCJ8BR.jpg'),
('BRG002', 'Meja Lipat', 2, 3, 22, 120000, 130000, 1000, 500, 8, 'post-images/Pwjx6h20ioOIE8gx5oy3FOqZcYJU7csol2cbQdoH.jpg'),
('BRG003', 'Mouse RGB KW', 1, 2, 110, 25000, 30000, 1000, 500, 12, 'post-images/ZBoHEsuibtL3Ng4O5KIpBkz5hSTBNlpy1PXzIWpQ.jpg'),
('BRG004', 'Earphone murah', 1, 1, 50, 5000, 8000, 1000, 500, 12, 'post-images/ozUAMsXyZtRYHEcHMdqUdrj68WsgEqxOKiRf5hRt.jpg'),
('BRG005', 'Stik PS 2', 1, 2, 0, 30000, 35000, 2000, 1000, 12, 'post-images/9fLmROewRr7Om72qIUWB28oghjezunrsclmJQapR.jpg'),
('BRG006', 'Airpod KW', 1, 2, 31, 27000, 29000, 1000, 500, 12, 'post-images/onR9vUiejxced6W20INhz4rky5xAKmt4lSMGtyKZ.jpg'),
('BRG007', 'Ember Plastik Murah', 2, 2, 20, 10000, 12000, 1000, 500, 12, 'post-images/FBZ1c1bduhd6xjLU6F5uAU80E2iZ0vqyLKy1qTi2.jpg'),
('BRG008', 'Sapu Ijuk', 2, 2, 20, 25000, 29000, 1000, 500, 12, 'post-images/ec0WzoSyQyrIVllUojx7h4aBSk5Ke2WBurwkzHcn.jpg'),
('BRG009', 'Barang Tanpa Nama 2', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/F9AR7M8ZgM2R4iIm7V20tN3EckcRacnZCVrG44iO.jpg'),
('BRG010', 'Tanpa Nama 1', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/eBv2MC59qNeDJL7aAfPTHUsKMRlsqv5JtKACh2CX.png'),
('BRG011', 'Tanpa Nama 2', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/Rd3oO1dRbkYNp0CiczZgYGXJKC0SSW7u1blCHQnz.jpg'),
('BRG012', 'Tanpa Nama 3', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/vMqfsfRHbva8nsPQ7LpPqQcjrknKReFWZ9y3aHQC.jpg'),
('BRG013', 'Barang Tanpa Nama 1', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/0TWEwEVCMrNR3uurLdb6GhmP8xHtHsEiDe92lwgx.jpg'),
('BRG016', 'Tanpa Nama 1', 1, 1, 20, 27000, 29000, 1000, 500, 12, 'post-images/CCZ5Bta77gQoZt0pQdoy7LddhqbUFh7NrtK3Fptd.jpg');

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
(42, 'MS-20220622152043141', 'BRG001', 2, 20000),
(43, 'MS-20220630070136339', 'BRG006', 1, 27000),
(44, 'MS-20220630070136339', 'BRG003', 10, 250000),
(45, 'MS-20220630070302818', 'BRG006', 10, 270000),
(46, 'MS-20220630070443929', 'BRG005', 5, 150000);

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
(24, 'KL-20220622150346179', 'BRG002', 1, 130000),
(25, 'KL-20220630070345233', 'BRG005', 20, 700000);

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
(3, 'Utilitas'),
(5, 'Mekanik'),
(6, 'Mebel'),
(7, 'Bahan Bangunan'),
(8, 'Alat Pertanian'),
(9, 'Alat Bangunan');

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
('MS-20220622144139668', '2022-06-22 00:00:00', 1, 1, 10000),
('MS-20220630070136339', '2022-06-30 00:00:00', 2, 11, 277000),
('MS-20220630070302818', '2022-06-30 00:00:00', 4, 10, 270000),
('MS-20220630070443929', '2022-06-30 00:00:00', 2, 5, 150000);

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
('KL-20220622150346179', '2022-06-22 00:00:00', 1, 130000),
('KL-20220630070345233', '2022-06-30 00:00:00', 20, 700000);

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
(3, 'Box'),
(5, 'Buah'),
(6, 'Lembar'),
(7, 'Lusin'),
(8, 'Keping'),
(9, 'Bungkus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `notelp` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `notelp`, `alamat`, `image`) VALUES
(1, 'Pranata', '089895353534', 'Malang', 'sup-images/D9h1bMXbL8qSTt5miTYW8AVllTVr2W1JQtrfAzQf.jpg'),
(2, 'Dito', '082234734738', 'Lawang', 'sup-images/I1u6ILM76XZXGYcotlOfFm0mw46uDQSmWbrn1QIQ.jpg'),
(4, 'Gimo', '08123141551', 'Malang', 'sup-images/HTDnclcflDymw1pd6WGx93CnuHoJJVkdm5XZOYYZ.jpg'),
(5, 'Zadah', '08123141555', 'Singosari', 'sup-images/2RpCeolr4F5jp3GO6h1AMPMkyEFPrtzDFE9ntOQK.jpg'),
(6, 'Rony', '08726161621', 'Arjosari', 'sup-images/nK0tNNqsxEhtn3b6miqB5b6WZaN40iaV7e4QI9Nw.jpg'),
(7, 'Anya', '08171727121', 'Lawang', 'sup-images/hReHVDoAXCkuY2HiruvXI8kPyskd9FZ9mw3ut2G5.jpg');

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
(1, 'Administrator', 'administrator@gmail.com', NULL, '$2y$10$.YSchuRmYt8QETgJ9vi5.etP9tJ8DemajvXr3I3sx0sXATqcD2jf2', '2wNd7jYuiGwbIKNoTewlGEsi84BAThMXYVF83Zq0ic8BA5w0sIhTOwxMwotC', 0, '2022-05-23 08:13:57', '2022-05-23 08:13:57'),
(2, 'Pimpinan', 'pimpinan@gmail.com', NULL, '$2y$10$f7V4W.lUW6w0MeLz.WGdmOFGnvPDoHtoi7eTxnt9DtVIzPV4.AEjG', NULL, 1, '2022-06-07 15:47:08', '2022-06-07 15:47:13'),
(3, 'Karyawan Satu', 'karyawansatu@gmail.com', NULL, '$2y$10$jO5jpMhzYVWlBTyS917U8u147mT5QGoh2Y4h3Ey2CC3dFX/x9jVRG', NULL, 2, '2022-06-07 15:47:10', '2022-06-07 15:47:15'),
(5, 'Pranata', 'pran@gmail.com', NULL, '$2y$10$iQZCaram6R2yfeEwdcZpt.GsxfkIPycIJxNdizTFKapt93Gfs3F9G', NULL, 2, '2022-06-22 07:48:09', '2022-06-22 07:48:09'),
(6, 'Zadah', 'zadah@gmail.com', NULL, '$2y$10$kbpAMOCRlosZcqZuyXHTfOnY8vQvnLnl2jbsu.4PfSdRTY4ZGXpBq', NULL, 2, '2022-06-25 04:02:51', '2022-06-25 04:02:51'),
(7, 'Dito', 'dito@gmail.com', NULL, '$2y$10$73OEC6uiGJE9KhSsNhosKuxFVNLfzgp.ok0UhVMcawopNSK8t0z/a', NULL, 2, '2022-06-25 04:22:42', '2022-06-25 04:22:42'),
(8, 'Rony', 'rony@gmail.com', NULL, '$2y$10$MCC1Tuh1i9ZY86RaK4Bk9.DXnrlsv9xRYhx5b/GgAqg9T.JnTf2Ze', NULL, 2, '2022-06-29 22:28:51', '2022-06-29 22:28:51');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
