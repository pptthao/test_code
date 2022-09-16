-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 05:13 AM
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
(1, '20A10010066', 'Nguyễn Thị Dịu'),
(2, '20A10010187', 'Nguyễn Việt Hoàng'),
(3, '19A10010100', 'Nguyễn Văn Linh'),
(4, '20A10010124', 'Giang Thế Hiệp'),
(5, '20a10010123', 'Phạm Thị Phương Thảo'),
(6, '20A10010159', 'Mai Thị Dinh'),
(7, '20A10010181', 'Đoàn Ngọc An'),
(8, '20A10010069', 'Hoàng Ngọc Anh'),
(9, '19A10010100', 'Nguyễn Văn Linh'),
(10, '20A10010124', 'Giang Thế Hiệp'),
(11, '20a10010123', 'Phạm Thị Phương Thảo'),
(12, '20A10010159', 'Mai Thị Dinh'),
(13, '20A10010181', 'Đoàn Ngọc An'),
(14, '20A10010069', 'Hoàng Ngọc Anh'),
(15, '19A10010100', 'Nguyễn Văn Linh'),
(16, '20A10010124', 'Giang Thế Hiệp'),
(17, '20a10010123', 'Phạm Thị Phương Thảo'),
(18, '20A10010159', 'Mai Thị Dinh'),
(19, '20A10010181', 'Đoàn Ngọc An'),
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
(43, '20a10010123', 'Phạm Thị Phương Thảo'),
(44, '20A10010159', 'Mai Thị Dinh'),
(45, '20A10010181', 'Đoàn Ngọc An'),
(46, '20A10010069', 'Hoàng Ngọc Anh'),
(47, '19A10010100', 'Nguyễn Văn Linh'),
(48, '20A10010124', 'Giang Thế Hiệp'),
(49, '20a10010123', 'Phạm Thị Phương Thảo'),
(50, '20A10010159', 'Mai Thị Dinh'),
(51, '20A10010181', 'Đoàn Ngọc An'),
(52, '20A10010066', 'Nguyễn Thị Dịu'),
(53, '20A10010187', 'Nguyễn Việt Hoàng'),
(54, '19A10010100', 'Nguyễn Văn Linh'),
(55, '20A10010124', 'Giang Thế Hiệp'),
(56, '20a10010123', 'Phạm Thị Phương Thảo'),
(57, '20A10010159', 'Mai Thị Dinh'),
(58, '20A10010181', 'Đoàn Ngọc An'),
(59, '20A10010069', 'Hoàng Ngọc Anh'),
(60, '19A10010100', 'Nguyễn Văn Linh'),
(61, '20A10010124', 'Giang Thế Hiệp'),
(62, '20a10010123', 'Phạm Thị Phương Thảo'),
(63, '20A10010159', 'Mai Thị Dinh'),
(64, '20A10010181', 'Đoàn Ngọc An'),
(65, '20A10010069', 'Hoàng Ngọc Anh'),
(66, '19A10010100', 'Nguyễn Văn Linh'),
(67, '20A10010124', 'Giang Thế Hiệp'),
(68, '20a10010123', 'Phạm Thị Phương Thảo'),
(69, '20A10010159', 'Mai Thị Dinh'),
(70, '20A10010181', 'Đoàn Ngọc An'),
(71, '20A10010069', 'Hoàng Ngọc Anh'),
(72, '19A10010100', 'Nguyễn Văn Linh'),
(73, '20A10010124', 'Giang Thế Hiệp'),
(74, '20a10010123', 'Phạm Thị Phương Thảo'),
(75, '20A10010159', 'Mai Thị Dinh'),
(76, '20A10010181', 'Đoàn Ngọc An');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
