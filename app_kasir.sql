-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 12:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `suplai_produk`
--
-- Error reading structure for table app_kasir.suplai_produk: #1932 - Table &#039;app_kasir.suplai_produk&#039; doesn&#039;t exist in engine
-- Error reading data for table app_kasir.suplai_produk: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `app_kasir`.`suplai_produk`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_pembelian`
--

CREATE TABLE `tbl_item_pembelian` (
  `id_item` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `jumlah_total` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_item_pembelian`
--

INSERT INTO `tbl_item_pembelian` (`id_item`, `id_pembelian`, `id_produk`, `jumlah_item`, `jumlah_total`) VALUES
(1, 3, 15, 0, 0),
(2, 4, 13, 0, 0),
(3, 5, 15, 0, 0),
(4, 6, 9, 0, 0),
(5, 6, 15, 0, 0),
(6, 7, 9, 0, 0),
(7, 9, 15, 10, 70000),
(8, 9, 16, 10, 55000),
(9, 9, 17, 15, 67500),
(10, 9, 18, 17, 85000),
(11, 9, 9, 19, 98800),
(12, 9, 13, 17, 85000),
(13, 9, 10, 15, 262500),
(14, 10, 9, 90, 468000),
(15, 11, 15, 931, 6517000),
(16, 12, 9, 10000, 52000000),
(17, 13, 13, 100, 500000),
(18, 14, 9, 1, 5200),
(19, 15, 15, 3000, 21000000),
(20, 15, 13, 1, 5000),
(21, 16, 13, 4000, 20000000),
(22, 16, 16, 3500, 19250000),
(23, 17, 12, 2000, 800000000),
(24, 17, 18, 1000, 5000000),
(25, 18, 18, 2000, 10000000),
(26, 19, 11, 700, 420000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_suplai_produk`
--

CREATE TABLE `tbl_item_suplai_produk` (
  `suplai_item_id` int(11) NOT NULL,
  `nomor_order` varchar(20) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_item_suplai_produk`
--

INSERT INTO `tbl_item_suplai_produk` (`suplai_item_id`, `nomor_order`, `id_produk`, `jumlah_stok`) VALUES
(1, '#94B3B9', 13, 17),
(2, '#94B3B9', 16, 11),
(3, '#94F499', 17, 16),
(4, '#94F499', 18, 6),
(5, '#9536DD', 9, 7570),
(6, '#9536DD', 10, 6300),
(7, '#9536DD', 11, 7541),
(8, '#9536DD', 12, 5145),
(9, '#9536DD', 13, 4930),
(10, '#9536DD', 15, 1229),
(11, '#9536DD', 16, 314),
(12, '#9536DD', 17, 2956),
(13, '#9536DD', 18, 8594),
(14, '#95E42D', 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `pembayaran` decimal(15,2) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_user`, `nama`, `no_hp`, `pembayaran`, `invoice`, `tanggal_transaksi`) VALUES
(1, 1, 'ka', '18088080', 100000.00, 'INV20240115069576', '2024-01-24 20:05:52'),
(2, 1, 'Arga', '18088080', 100000.00, 'INV20240115063829', '2024-10-24 20:05:52'),
(3, 1, 'Arga', '18088080', 100000.00, 'INV20240115069830', '2024-01-24 20:05:52'),
(4, 1, 'Arga', '18088080', 30000.00, 'INV20240115034020', '2024-01-24 20:05:52'),
(5, 1, 'Arga', '18088080', 400000.00, 'INV20240115070574', '2024-01-24 20:05:52'),
(6, 1, 'ka', '18088080', 160000.00, 'INV20240115077885', '2024-01-24 20:05:52'),
(7, 1, 'Arga', '18088080', 60000.00, 'INV20240115053965', '2024-01-24 20:05:52'),
(8, 1, 'Arga', '18088080', 60000.00, 'INV20240115052552', '2024-01-24 20:05:52'),
(9, 1, 'Arga', '18088080', 750000.00, 'INV20240115011712', '2024-01-24 20:05:52'),
(10, 1, 'Arga', '089913779', 500000.00, 'INV20240122073064', '2024-01-24 20:05:52'),
(11, 1, 'ka', '18088080', 7000000.00, 'INV20240122098572', '2024-01-24 20:05:52'),
(12, 1, 'Arga', '530598505', 55000000.00, 'INV20240122092280', '2024-11-24 20:05:52'),
(13, 1, 'arka', '3089228902', 500000.00, 'INV20240124068087', '2024-01-24 20:05:52'),
(14, 1, 'xiao', '3089228902', 6000.00, 'INV20240131048358', '2024-01-31 20:10:21'),
(15, 1, 'yan', '0899999222', 22000000.00, 'INV20240201092414', '2024-02-01 20:02:17'),
(16, 1, 'Park ', '0899999123', 40000000.00, 'INV20240201036423', '2024-02-01 20:03:40'),
(17, 1, 'min', '3089228902', 900000000.00, 'INV20240201069144', '2024-02-01 20:05:00'),
(18, 1, 'kuu', '18088080', 10000000.00, 'INV20240201066491', '2024-02-01 20:05:49'),
(19, 1, 'Yan Xiao', '0899999123', 450000000.00, 'INV20240201098304', '2024-02-01 20:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `harga_produk`, `deskripsi`, `foto_produk`, `stok_produk`) VALUES
(9, 'Biskuat', '5200', 'Biskuit', '2012202314381420210419_133646.jpg', 97576),
(10, 'Cocoa', '17500', 'Coco', '20122023144116_210216174521_premium dark cocoa 150gr_ori.webp', 16190),
(11, 'Dumbell Set 10 Kg Azivi New ', '600000', 'Alat olahraga', '20122023144652da38338fa559f7b4b5350f7195cde97f.jpg_500x500q80.jpg_.webp', 7541),
(12, 'Helm Cakil Hbc', '400000', 'Helm', '25122023135533baff02be5ce108b9cf72823ade7b0e07.jpg', 3254),
(13, 'Air Mineral', '5000', 'Minuman', '08012024135955download (1).jpg', 10870),
(15, 'Susu Cymory ', '7000', 'Susu', '12012024140158download (2).jpg', -2702),
(16, 'Susu UHT', '5500', 'Susu', '12012024140229download (3).jpg', 6845),
(17, 'Susu Frisianflag', '4500', 'Susu', '12012024140455images (1).jpg', 12978),
(18, 'Susu GreenFields', '5000', 'Susu', '12012024144903download (4).jpg', 15599);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplai_produk`
--

CREATE TABLE `tbl_suplai_produk` (
  `id_suplai` int(11) NOT NULL,
  `nomor_order` varchar(20) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `tanggal_order` date NOT NULL,
  `nama_ekspedisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_suplai_produk`
--

INSERT INTO `tbl_suplai_produk` (`id_suplai`, `nomor_order`, `nama_pengirim`, `tanggal_order`, `nama_ekspedisi`) VALUES
(1, '#94B3B9', 'luo', '2024-02-26', 'IP'),
(2, '#94D141', '', '2024-02-26', ''),
(3, '#94F499', 'SS', '2024-02-26', 'IP'),
(4, '#9536DD', 'Iure suscipit magnam', '2024-02-26', 'Aut laboriosam repu'),
(5, '#957883', '', '2024-02-26', ''),
(6, '#95E42D', 'Ka ', '2024-02-26', 'feng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `email`, `password`, `no_hp`, `jabatan`) VALUES
(1, 'Luo Yan', 'admin@gmail.com', 'admin', '081123457890', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_item_pembelian`
--
ALTER TABLE `tbl_item_pembelian`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tbl_item_suplai_produk`
--
ALTER TABLE `tbl_item_suplai_produk`
  ADD PRIMARY KEY (`suplai_item_id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_suplai_produk`
--
ALTER TABLE `tbl_suplai_produk`
  ADD PRIMARY KEY (`id_suplai`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_item_pembelian`
--
ALTER TABLE `tbl_item_pembelian`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_item_suplai_produk`
--
ALTER TABLE `tbl_item_suplai_produk`
  MODIFY `suplai_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_suplai_produk`
--
ALTER TABLE `tbl_suplai_produk`
  MODIFY `id_suplai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
