-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 04:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upload_img`
--

-- --------------------------------------------------------

--
-- Table structure for table `dm_monhoc`
--

CREATE TABLE `dm_monhoc` (
  `mamon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tenmon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `khoiluong` int(11) NOT NULL,
  `donvitinh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cbthem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm_monhoc`
--

INSERT INTO `dm_monhoc` (`mamon`, `tenmon`, `khoiluong`, `donvitinh`, `cbthem`) VALUES
('1', 'Dịch văn học', 2, 'TC', 0),
('10', 'Nghe', 2, 'TC', 0),
('100', 'Kho dữ liệu', 2, 'TC', 0),
('101', 'Kiểm soát nội bộ', 3, 'TC', 0),
('102', 'Kiểm toán', 3, 'TC', 0),
('103', 'Kiểm toán căn bản', 3, 'TC', 0),
('104', 'Kiến thức bổ trợ dịch thuật', 2, 'TC', 0),
('105', 'Kiến trúc máy tính', 3, 'TC', 0),
('106', 'Kinh tế học', 3, 'TC', 0),
('107', 'Kinh tế lượng', 3, 'TC', 0),
('phapcanban293', 'phap can ban2', 1, 'TC', 1),
('phapcanban39', 'phap can ban', 1, 'TC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anh`
--

CREATE TABLE `tbl_anh` (
  `PK_iMaAnh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tLink` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_anh`
--

INSERT INTO `tbl_anh` (`PK_iMaAnh`, `tLink`) VALUES
('16624528337498', '16624528330.jpg'),
('16628150011350', '16628150010.jpg'),
('16628150051195', '16628150050.jpg'),
('16628150265847', '16628150260.jpg'),
('16633389988214', '16633389980.jpg'),
('16635761555731', '16635761550.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ctdt`
--

CREATE TABLE `tbl_ctdt` (
  `ma_ctdt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `matrinhdo` int(11) NOT NULL,
  `matruong` int(11) NOT NULL,
  `manganh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `namhoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_ctdt`
--

INSERT INTO `tbl_ctdt` (`ma_ctdt`, `matrinhdo`, `matruong`, `manganh`, `namhoc`) VALUES
('1000_7_Anninhmng44_2009', 7, 1000, 'Anninhmng44', '2009'),
('1000_7_Anninhmng44_2019', 7, 1000, 'Anninhmng44', '2019'),
('1000_7_Bcsakhoa18_2019', 7, 1000, 'Bcsakhoa18', '2019'),
('1002_7_Anninhmng44_2002', 7, 1002, 'Anninhmng44', '2002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ctdthou`
--

CREATE TABLE `tbl_ctdthou` (
  `ma_ctdthou` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `manganh` int(11) NOT NULL,
  `matrinhdo` int(11) NOT NULL,
  `namhoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monctdt`
--

CREATE TABLE `tbl_monctdt` (
  `ma_monctdt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mamon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ma_ctdt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `macanbo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_monctdt`
--

INSERT INTO `tbl_monctdt` (`ma_monctdt`, `mamon`, `ma_ctdt`, `macanbo`) VALUES
('1000_7_Anninhmng44_2019_1', '1', '1000_7_Anninhmng44_2019', 1),
('1000_7_Anninhmng44_2019_10', '10', '1000_7_Anninhmng44_2019', 1),
('1000_7_Anninhmng44_2019_100', '100', '1000_7_Anninhmng44_2019', 1),
('1002_7_Anninhmng44_2002_1', '1', '1002_7_Anninhmng44_2002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monctdthou`
--

CREATE TABLE `tbl_monctdthou` (
  `ma_monctdthou` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mamon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ma_ctdthou` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `macanbo` int(11) NOT NULL,
  `mamondaotao` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sinhvien`
--

CREATE TABLE `tbl_sinhvien` (
  `id` int(11) NOT NULL,
  `masv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tensv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sinhvien`
--

INSERT INTO `tbl_sinhvien` (`id`, `masv`, `tensv`) VALUES
(3, '19A10010100', 'Nguyễn Văn Linh'),
(4, '20A10010124', 'Giang Thế Hiệp'),
(6, '20A10010159', 'Mai Thị Dinh'),
(7, '20A10010181', 'Đoàn Ngọc An'),
(8, '20A10010069', 'Hoàng Ngọc Anh'),
(9, '19A10010100', 'Nguyễn Văn Linh'),
(10, '20A10010124', 'Giang Thế Hiệp'),
(12, '20A10010159', 'Mai Thị Dinh'),
(14, '20A10010069', 'Hoàng Ngọc Anh'),
(16, '20A10010124', 'Giang Thế Hiệp'),
(17, '20a10010123', 'Phạm Thị Phương Thảo'),
(18, '20A10010159', 'Mai Thị Dinh'),
(21, '19A10010100', 'Nguyễn Văn Linh'),
(22, '20A10010124', 'Giang Thế Hiệp'),
(23, '20a10010123', 'Phạm Thị Phương Thảo'),
(24, '20A10010159', 'Mai Thị Dinh'),
(25, '20A10010181', 'Đoàn Ngọc An'),
(26, '20A10010069', 'Hoàng Ngọc Anh'),
(27, '20A10010066', 'Nguyễn Thị Dịu'),
(28, '20A10010187', 'Nguyễn Việt Hoàng'),
(29, '19A10010100', 'Nguyễn Văn Linh'),
(30, '20A10010124', 'Giang Thế Hiệp'),
(31, '20a10010123', 'Phạm Thị Phương Thảo'),
(32, '20A10010159', 'Mai Thị Dinh'),
(33, '20A10010181', 'Đoàn Ngọc An'),
(34, '20A10010069', 'Hoàng Ngọc Anh'),
(35, '19A10010100', 'Nguyễn Văn Linh'),
(36, '20A10010124', 'Giang Thế Hiệp'),
(37, '20a10010123', 'Phạm Thị Phương Thảo'),
(38, '20A10010159', 'Mai Thị Dinh'),
(39, '20A10010181', 'Đoàn Ngọc An'),
(40, '20A10010069', 'Hoàng Ngọc Anh'),
(41, '19A10010100', 'Nguyễn Văn Linh'),
(42, '20A10010124', 'Giang Thế Hiệp'),
(44, '20A10010159', 'Mai Thị Dinh'),
(45, '20A10010181', 'Đoàn Ngọc An'),
(46, '20A10010069', 'Hoàng Ngọc Anh'),
(47, '19A10010100', 'Nguyễn Văn Linh'),
(48, '20A10010124', 'Giang Thế Hiệp'),
(50, '20A10010159', 'Mai Thị Dinh'),
(51, '20A10010181', 'Đoàn Ngọc An'),
(52, '20A10010066', 'Nguyễn Thị Dịu'),
(53, '20A10010187', 'Nguyễn Việt Hoàng'),
(54, '19A10010100', 'Nguyễn Văn Linh'),
(55, '20A10010124', 'Giang Thế Hiệp'),
(57, '20A10010159', 'Mai Thị Dinh'),
(58, '20A10010181', 'Đoàn Ngọc An'),
(59, '20A10010069', 'Hoàng Ngọc Anh'),
(60, '19A10010100', 'Nguyễn Văn Linh'),
(61, '20A10010124', 'Giang Thế Hiệp'),
(63, '20A10010159', 'Mai Thị Dinh'),
(64, '20A10010181', 'Đoàn Ngọc An'),
(65, '20A10010069', 'Hoàng Ngọc Anh'),
(66, '19A10010100', 'Nguyễn Văn Linh'),
(67, '20A10010124', 'Giang Thế Hiệp'),
(69, '20A10010159', 'Mai Thị Dinh'),
(70, '20A10010181', 'Đoàn Ngọc An'),
(71, '20A10010069', 'Hoàng Ngọc Anh'),
(72, '19A10010100', 'Nguyễn Văn Linh'),
(73, '20A10010124', 'Giang Thế Hiệp'),
(75, '20A10010159', 'Mai Thị Dinh'),
(111, '20A10010124', 'Mai Thị Dinh'),
(113, '20A10010126', 'Nguyễn Thị Phương');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_monhoc`
--
ALTER TABLE `dm_monhoc`
  ADD PRIMARY KEY (`mamon`);

--
-- Indexes for table `tbl_anh`
--
ALTER TABLE `tbl_anh`
  ADD PRIMARY KEY (`PK_iMaAnh`);

--
-- Indexes for table `tbl_ctdt`
--
ALTER TABLE `tbl_ctdt`
  ADD PRIMARY KEY (`ma_ctdt`);

--
-- Indexes for table `tbl_ctdthou`
--
ALTER TABLE `tbl_ctdthou`
  ADD PRIMARY KEY (`ma_ctdthou`);

--
-- Indexes for table `tbl_monctdt`
--
ALTER TABLE `tbl_monctdt`
  ADD PRIMARY KEY (`ma_monctdt`),
  ADD KEY `tbl_monctdt_mon_mamon` (`mamon`),
  ADD KEY `tbl_monctdt_ctdt_ctdt` (`ma_ctdt`);

--
-- Indexes for table `tbl_monctdthou`
--
ALTER TABLE `tbl_monctdthou`
  ADD PRIMARY KEY (`ma_monctdthou`),
  ADD KEY `tbl_monctdthou_mon_mamon` (`mamon`),
  ADD KEY `tbl_monctdthou_ctdthou_ctdthou` (`ma_ctdthou`);

--
-- Indexes for table `tbl_sinhvien`
--
ALTER TABLE `tbl_sinhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sinhvien`
--
ALTER TABLE `tbl_sinhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_monctdt`
--
ALTER TABLE `tbl_monctdt`
  ADD CONSTRAINT `tbl_monctdt_ctdt_ctdt` FOREIGN KEY (`ma_ctdt`) REFERENCES `tbl_ctdt` (`ma_ctdt`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_monctdt_mon_mamon` FOREIGN KEY (`mamon`) REFERENCES `dm_monhoc` (`mamon`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_monctdthou`
--
ALTER TABLE `tbl_monctdthou`
  ADD CONSTRAINT `tbl_monctdthou_ctdthou_ctdthou` FOREIGN KEY (`ma_ctdthou`) REFERENCES `tbl_ctdthou` (`ma_ctdthou`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_monctdthou_mon_mamon` FOREIGN KEY (`mamon`) REFERENCES `dm_monhoc` (`mamon`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
