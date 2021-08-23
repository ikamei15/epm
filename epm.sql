-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2021 at 12:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17244079_epm`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_data`
--

CREATE TABLE `barang_data` (
  `bd_id` int(11) NOT NULL,
  `bd_kategori` int(11) DEFAULT NULL,
  `bd_nama_barang` varchar(255) DEFAULT NULL,
  `bd_harga` double(25,2) DEFAULT NULL,
  `bd_deskripsi` text DEFAULT NULL,
  `bd_stok` int(11) DEFAULT NULL,
  `bd_berat` int(11) DEFAULT NULL,
  `bd_gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `barang_data`
--

INSERT INTO `barang_data` (`bd_id`, `bd_kategori`, `bd_nama_barang`, `bd_harga`, `bd_deskripsi`, `bd_stok`, `bd_berat`, `bd_gambar`) VALUES
(2, 5, 'Shower Hinge Dekson SH 5301 (GW) PSS', 700000.00, 'Shower Hinge Dekson SH 5301 (GW) PSS, Engsel kaca ke tembok.\r\n\r\n- Material Stainless Steel SUS 304\r\n- Tebal Kaca : 8 - 10 mm\r\n- Kapasitas Maksimum :\r\n2 Pcs : Lebar Pintu 80 Cm, Beban 50 Kg\r\n3 Pcs : Lebar Pintu 90 Cm, Beban 65 Kg\r\n- Harga 1 set = 2 pcs', 98, 1200, '20210715090702.PNG'),
(3, 5, 'Shower Hinge Dekson SH 5305 (GG) 135 PSS', 700000.00, 'Shower Hinge Dekson SH 5305 (GG) 135 PSS Engsel kaca ke kaca 135\r\nderajad.\r\n- Material Stainless Steel SUS 304\r\n- Tebal Kaca : 8 - 10 mm\r\n- Kapasitas Maksimum :\r\n2 Pcs : Lebar Pintu 80 Cm, Beban 50 Kg\r\n3 Pcs : Lebar Pintu 90 Cm, Beban 65 Kg\r\n- Harga 1 set = 2 pcs', 100, 2200, '20210715090730.PNG'),
(4, 5, 'Shower Hinge Dekson SH 5303 (GG) 180 PSS', 500000.00, 'Shower Hinge Dekson SH 5303 (GG) 180 PSS Engsel kaca ke kaca 180\r\nderajad.\r\n- Material Stainless Steel SUS 304\r\n- Tebal Kaca : 8 - 10 mm\r\n- Kapasitas Maksimum :\r\n2 Pcs : Lebar Pintu 80 Cm, Beban 50 Kg\r\n3 Pcs : Lebar Pintu 90 Cm, Beban 65 Kg\r\n- Harga 1 set = 2 pcs', 100, 2000, '20210715090722.PNG'),
(5, 4, 'Handle Shower Dekson PH DL814 25x150x450 PSS', 400000.00, 'Handle pintu shower Dekson \r\n- Ukuran 15cm x 45cm\r\n- Material Stainless Steel', 100, 600, '20210715090753.PNG'),
(6, 4, 'Handle Shower Dekson PH DL814 25x20x500 PSS', 400000.00, 'Handle pintu shower Dekson \r\n- Ukuran 20cm x 50cm\r\n- Material Stainless Steel\r\n', 100, 600, '20210715090716.PNG'),
(7, 3, 'Floor Hinge Dekson FH 84, PT 10 PSS, PT 20 PSS, US 10 PSS(Complete)', 1500000.00, '1 set komplit berisi \r\n-1 Floor Hinge Dekson FH 84\r\n-1 PT 10 PSS\r\n-1 PT 20 PSS\r\n-1 US 10 PSS\r\n', 100, 10000, '20210715090745.PNG'),
(8, 6, 'Patch Fitting PT 40 PSS', 900000.00, 'Patch Fitting PT 40 PSS, Penjepit dan penopang pintu kaca tempered..\r\n- Tebal kaca 10-12mm\r\n- Material Stainless Steel\r\n', 100, 1000, '20210715090708.PNG'),
(9, 1, 'Glass Clip GC U8541 PSS', 50000.00, 'Glass Clip GC U8541 PSS, klip kaca ke tembok - Tebal kaca 8-10mm - Material Stainless Steel ', 100, 150, '20210715090742.PNG'),
(10, 1, 'Glass Clip GC U800 AL CP', 50000.00, 'Glass Clip GC U800 AL CP, klip kaca ke lantai.\r\n- Tebal kaca 8-10mm\r\n- Material Stainless Steel\r\n', 97, 300, '20210715090712.PNG'),
(11, 2, 'Glass Clamp GH 19-01 CP', 65000.00, 'Glass Clamp GH 19-01 CP, Glass Holder.\r\n- Digunakan untuk konektor pipa ke tembok.\r\n- Ukuran pipa ¾”\r\n- Material Brass (Kuningan)\r\n', 100, 150, '20210715090718.PNG'),
(12, 2, 'Glass Clamp GH 19-02 CP', 75000.00, 'Glass Clamp GH 19-02 CP, Glass Holder.\r\n- Digunakan untuk konektor pipa ke kaca.\r\n- Ukuran pipa ¾”\r\n- Material Brass (Kuningan)', 100, 200, '20210715090758.PNG'),
(13, 2, 'Glass Clamp GH 19-03 CP', 200000.00, 'Glass Clamp GH 19-03 CP, Glass Holder.\r\n- Ukuran pipa ¾” 19mm\r\n- Material Brass (Kuningan)', 100, 200, '20210715090729.PNG'),
(14, 1, 'Glass Clip GC 018 (GW) PSS', 75000.00, 'Glass Clip GC 018 (GW) PSS, klip kaca ke tembok.\r\n- Tebal kaca 8-10mm\r\n- Material Stainless Steel', 100, 300, '20210715090720.PNG'),
(15, 1, 'Glass Clip GC 018 (GG) PSS', 75000.00, 'Glass Clip GC 018 (GG) PSS, klip kaca ke kaca.\r\n- Tebal kaca 8-10mm\r\n- Material Stainless Steel', 100, 300, '20210715090727.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `bo_users`
--

CREATE TABLE `bo_users` (
  `bu_id` int(11) NOT NULL,
  `bu_username` varchar(100) DEFAULT NULL,
  `bu_password` varchar(100) DEFAULT NULL,
  `bu_name` varchar(100) DEFAULT NULL,
  `bu_last_login` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bo_users`
--

INSERT INTO `bo_users` (`bu_id`, `bu_username`, `bu_password`, `bu_name`, `bu_last_login`) VALUES
(1, 'admin', '7c222fb2927d828af22f592134e8932480637c0d', 'Administator', '2021-08-02 09:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `dp_id` int(11) NOT NULL,
  `dp_ringkasan_id` int(11) DEFAULT NULL,
  `dp_user` int(11) DEFAULT NULL,
  `dp_barang` int(11) DEFAULT NULL,
  `dp_qty` int(11) DEFAULT NULL,
  `dp_total_harga` varchar(255) DEFAULT NULL,
  `dp_created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`dp_id`, `dp_ringkasan_id`, `dp_user`, `dp_barang`, `dp_qty`, `dp_total_harga`, `dp_created_at`) VALUES
(1, 17, 11, 8, 1, '900000', '2021-08-02 03:20:51'),
(2, 18, 11, 14, 10, '750000', '2021-08-02 09:14:04'),
(3, 19, 11, 4, 5, '2500000', '2021-08-02 09:20:22'),
(4, 19, 11, 7, 1, '1500000', '2021-08-02 09:20:22'),
(6, 20, 11, 9, 10, '500000', '2021-08-02 09:23:11'),
(7, 20, 11, 12, 5, '375000', '2021-08-02 09:23:11'),
(9, 21, 11, 9, 2, '100000', '2021-08-13 13:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi_kami`
--

CREATE TABLE `hubungi_kami` (
  `hk_id` int(11) NOT NULL,
  `hk_nama_lengkap` varchar(255) DEFAULT NULL,
  `hk_email` varchar(255) DEFAULT NULL,
  `hk_notelp` varchar(255) DEFAULT NULL,
  `hk_pesan` varchar(255) DEFAULT NULL,
  `hk_created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`hk_id`, `hk_nama_lengkap`, `hk_email`, `hk_notelp`, `hk_pesan`, `hk_created_date`) VALUES
(1, 'Adam Marulyanto', 'adammarulyanto@gmail.com', '08888888888', 'Test Pesan', '2021-07-15 01:42:45'),
(2, 'Adam', 'adammarulyanto@gmail.com', '081123123123', 'Pesan 12345', '2021-07-15 01:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `kb_id` int(11) NOT NULL,
  `kb_nama_kategori` varchar(255) DEFAULT NULL,
  `kb_created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`kb_id`, `kb_nama_kategori`, `kb_created_date`) VALUES
(1, 'Glass Clip', '2021-07-13 21:21:14'),
(2, 'Glass Clamp', '2021-07-13 21:21:25'),
(3, 'Floor Hinge', '2021-07-13 21:21:42'),
(4, 'Handle', '2021-07-13 21:21:54'),
(5, 'Engsel', '2021-07-13 21:22:10'),
(6, 'Patch Fitting', '2021-07-13 21:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `kr_id` int(11) NOT NULL,
  `kr_user` int(11) DEFAULT NULL,
  `kr_barang` int(11) DEFAULT NULL,
  `kr_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`kr_id`, `kr_user`, `kr_barang`, `kr_qty`) VALUES
(30, 11, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ringkasan_pesanan`
--

CREATE TABLE `ringkasan_pesanan` (
  `rp_id` int(11) NOT NULL,
  `rp_user` int(11) DEFAULT NULL,
  `rp_no_pesanan` varchar(50) DEFAULT NULL,
  `rp_qty` int(11) DEFAULT NULL,
  `rp_total_harga` double(25,2) DEFAULT NULL,
  `rp_ongkir` double(25,2) DEFAULT NULL,
  `rp_penerima` varchar(100) DEFAULT NULL,
  `rp_alamat` text DEFAULT NULL,
  `rp_kodepos` int(11) DEFAULT NULL,
  `rp_notelp` varchar(30) DEFAULT NULL,
  `rp_noresi` varchar(100) DEFAULT NULL,
  `rp_bukti_pembayaran` varchar(255) DEFAULT NULL,
  `rp_status` int(11) DEFAULT NULL,
  `rp_tgl_pembayaran` datetime DEFAULT NULL,
  `rp_created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ringkasan_pesanan`
--

INSERT INTO `ringkasan_pesanan` (`rp_id`, `rp_user`, `rp_no_pesanan`, `rp_qty`, `rp_total_harga`, `rp_ongkir`, `rp_penerima`, `rp_alamat`, `rp_kodepos`, `rp_notelp`, `rp_noresi`, `rp_bukti_pembayaran`, `rp_status`, `rp_tgl_pembayaran`, `rp_created_date`) VALUES
(17, 11, 'INV202108111', 1, 900000.00, 20000.00, 'Ika Wahyu', 'Jl. Bakti No. 16 A', 15227, '85714798866', '12345678', '20210802060809', 5, NULL, '2021-08-02 03:20:51'),
(18, 11, 'INV202108112', 10, 750000.00, 30000.00, 'Hikmal Akbar', 'Jl. Jombang Raya No. 60', 15227, '81212772414', '2234567', '20210802090851', 5, NULL, '2021-08-02 09:14:04'),
(19, 11, 'INV202108113', 6, 4000000.00, 100000.00, 'Sony Fitriyadi', 'Jl. Mangga Dua Dalam', 12345, '81212131323', NULL, NULL, 2, NULL, '2021-08-02 09:20:22'),
(20, 11, 'INV202108114', 15, 875000.00, 40000.00, 'Cahyo', 'Jl. Swadaya No. 5', 1234567, '85656565656', NULL, NULL, 2, NULL, '2021-08-02 09:23:11'),
(21, 11, 'INV202108115', 2, 100000.00, NULL, 'Ika Wahyu', 'askjdhasjkdhasjkaasd', 123674, '123123121232', NULL, NULL, 1, NULL, '2021-08-13 13:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `slide_banner`
--

CREATE TABLE `slide_banner` (
  `sb_id` int(11) NOT NULL,
  `sb_gambar` varchar(255) DEFAULT NULL,
  `sb_created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `slide_banner`
--

INSERT INTO `slide_banner` (`sb_id`, `sb_gambar`, `sb_created_date`) VALUES
(7, '20210716030714.png', '2021-07-16 03:53:14'),
(12, '20210727160723.png', '2021-07-27 16:56:23'),
(13, '20210727160745.png', '2021-07-27 16:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_pembeli`
--

CREATE TABLE `testimoni_pembeli` (
  `tp_id` int(11) NOT NULL,
  `tp_nama` varchar(255) DEFAULT NULL,
  `tp_testimoni` varchar(255) DEFAULT NULL,
  `tp_created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `testimoni_pembeli`
--

INSERT INTO `testimoni_pembeli` (`tp_id`, `tp_nama`, `tp_testimoni`, `tp_created_date`) VALUES
(2, 'Marull', 'Keren bed dah ah', '2021-07-16 05:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `ud_id` int(11) NOT NULL,
  `ud_nama` varchar(50) NOT NULL,
  `ud_email` varchar(50) NOT NULL,
  `ud_password` varchar(100) NOT NULL,
  `ud_last_login` datetime DEFAULT NULL,
  `ud_alamat` text DEFAULT NULL,
  `ud_kodepos` int(11) DEFAULT NULL,
  `ud_notelp` varchar(100) DEFAULT NULL,
  `ud_verified` enum('Y','N') DEFAULT 'N',
  `ud_verified_date` datetime DEFAULT NULL,
  `ud_created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`ud_id`, `ud_nama`, `ud_email`, `ud_password`, `ud_last_login`, `ud_alamat`, `ud_kodepos`, `ud_notelp`, `ud_verified`, `ud_verified_date`, `ud_created_date`) VALUES
(1, 'Admin', 'admin@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2021-07-14 21:31:54', 'jl. Sepanjang Jalan Menuju Roma, Pondok Ranji, Tangerang Selatan 14014', 14014, '088809323231', 'Y', NULL, '2021-07-14 00:26:20'),
(11, 'Ika Wahyu', 'ikawahyu4118@gmail.com', 'b9d4cae1c5cbd23c44cf331d953dedb7665c542c', '2021-08-13 12:45:15', 'askjdhasjkdhasjk', 123674, '12312312123', 'Y', '2021-07-15 04:40:26', '2021-08-13 13:23:11'),
(20, 'Wahyu Mei', 'ikanuriskripsi@gmail.com', 'b9d4cae1c5cbd23c44cf331d953dedb7665c542c', NULL, NULL, NULL, NULL, 'N', NULL, '2021-08-02 06:04:03'),
(21, 'Hikmal Akbar', 'ikanuriskripsi2021@gmail.com', 'b9d4cae1c5cbd23c44cf331d953dedb7665c542c', NULL, NULL, NULL, NULL, 'N', NULL, '2021-08-02 06:04:58'),
(22, 'Hikmal Akbar', 'ikaskripsinuri2021@gmail.com', 'b9d4cae1c5cbd23c44cf331d953dedb7665c542c', NULL, NULL, NULL, NULL, 'N', NULL, '2021-08-02 06:06:01'),
(23, 'Adammarulyanto', 'adammarulyanto@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', NULL, NULL, NULL, NULL, 'Y', '2021-08-05 19:23:39', '2021-08-05 14:38:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_data`
--
ALTER TABLE `barang_data`
  ADD PRIMARY KEY (`bd_id`) USING BTREE,
  ADD KEY `fk_1` (`bd_kategori`) USING BTREE;

--
-- Indexes for table `bo_users`
--
ALTER TABLE `bo_users`
  ADD PRIMARY KEY (`bu_id`) USING BTREE;

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`dp_id`) USING BTREE,
  ADD KEY `fk_dp_2` (`dp_user`) USING BTREE,
  ADD KEY `fk_dp_1` (`dp_ringkasan_id`) USING BTREE,
  ADD KEY `fk_dp_3` (`dp_barang`) USING BTREE;

--
-- Indexes for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  ADD PRIMARY KEY (`hk_id`) USING BTREE;

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`kb_id`) USING BTREE;

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`kr_id`) USING BTREE,
  ADD KEY `fk_kr_1` (`kr_user`) USING BTREE,
  ADD KEY `fk_kr_2` (`kr_barang`) USING BTREE;

--
-- Indexes for table `ringkasan_pesanan`
--
ALTER TABLE `ringkasan_pesanan`
  ADD PRIMARY KEY (`rp_id`) USING BTREE,
  ADD KEY `fk_rp_1` (`rp_user`) USING BTREE;

--
-- Indexes for table `slide_banner`
--
ALTER TABLE `slide_banner`
  ADD PRIMARY KEY (`sb_id`) USING BTREE;

--
-- Indexes for table `testimoni_pembeli`
--
ALTER TABLE `testimoni_pembeli`
  ADD PRIMARY KEY (`tp_id`) USING BTREE;

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ud_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_data`
--
ALTER TABLE `barang_data`
  MODIFY `bd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bo_users`
--
ALTER TABLE `bo_users`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  MODIFY `hk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `kb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `kr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ringkasan_pesanan`
--
ALTER TABLE `ringkasan_pesanan`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `slide_banner`
--
ALTER TABLE `slide_banner`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimoni_pembeli`
--
ALTER TABLE `testimoni_pembeli`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_data`
--
ALTER TABLE `barang_data`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`bd_kategori`) REFERENCES `kategori_barang` (`kb_id`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `fk_dp_1` FOREIGN KEY (`dp_ringkasan_id`) REFERENCES `ringkasan_pesanan` (`rp_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dp_2` FOREIGN KEY (`dp_user`) REFERENCES `user_data` (`ud_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dp_3` FOREIGN KEY (`dp_barang`) REFERENCES `barang_data` (`bd_id`) ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_kr_1` FOREIGN KEY (`kr_user`) REFERENCES `user_data` (`ud_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kr_2` FOREIGN KEY (`kr_barang`) REFERENCES `barang_data` (`bd_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ringkasan_pesanan`
--
ALTER TABLE `ringkasan_pesanan`
  ADD CONSTRAINT `fk_rp_1` FOREIGN KEY (`rp_user`) REFERENCES `user_data` (`ud_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
