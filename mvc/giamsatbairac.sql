-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 09:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giamsatbairac`
--

-- --------------------------------------------------------

--
-- Table structure for table `cambien`
--

CREATE TABLE `cambien` (
  `ma_cambien` int(11) NOT NULL,
  `ten_cambien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cambien`
--

INSERT INTO `cambien` (`ma_cambien`, `ten_cambien`) VALUES
(1, 'DHT-11'),
(2, 'MQ-135'),
(6, 'MQ-1349'),
(11, 'Lm35'),
(12, 'asdasdsaldasdasdasd'),
(14, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `dailuongdo`
--

CREATE TABLE `dailuongdo` (
  `ma_dailuong` int(11) NOT NULL,
  `ten_dailuong` varchar(255) NOT NULL,
  `ma_donvi` int(11) NOT NULL,
  `nguon_tren` int(11) NOT NULL,
  `nguon_duoi` int(11) NOT NULL,
  `mau` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailuongdo`
--

INSERT INTO `dailuongdo` (`ma_dailuong`, `ten_dailuong`, `ma_donvi`, `nguon_tren`, `nguon_duoi`, `mau`) VALUES
(1, 'nhiệt độ', 1, 40, 0, '#dd3131'),
(2, 'độ ẩm', 2, 4, -17, '#fbf309'),
(3, 'Gas', 2, 7, 0, '#242900'),
(4, 'CO', 2, 20, 0, '#6d80df'),
(26, 'Đại lượng đông tây cc hjhj', 10, 33, 2, '#7e5ef3'),
(29, 'asdasd', 10, 40, 12312, '#eb11ee');

-- --------------------------------------------------------

--
-- Table structure for table `donvido`
--

CREATE TABLE `donvido` (
  `ma_donvi` int(11) NOT NULL,
  `ten_donvi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donvido`
--

INSERT INTO `donvido` (`ma_donvi`, `ten_donvi`) VALUES
(1, '°C'),
(2, 'ppm '),
(10, 'kkk'),
(11, 'Đơn vị blue blue blue');

-- --------------------------------------------------------

--
-- Table structure for table `giatri`
--

CREATE TABLE `giatri` (
  `ma_tram` int(11) NOT NULL,
  `ten_cambien` int(11) NOT NULL,
  `ma_dailuong` int(11) NOT NULL,
  `giatri` double NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giatri`
--

INSERT INTO `giatri` (`ma_tram`, `ten_cambien`, `ma_dailuong`, `giatri`, `thoigian`) VALUES
(6801, 1, 1, 27, '2020-07-04 17:02:31'),
(6801, 1, 2, 97, '2020-07-04 17:02:31'),
(6801, 2, 3, 200, '2020-07-04 17:02:31'),
(6801, 2, 4, 300, '2020-07-04 17:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `huyen`
--

CREATE TABLE `huyen` (
  `ma_huyen` int(11) NOT NULL,
  `ten_huyen` varchar(255) NOT NULL,
  `ma_tinhtp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `huyen`
--

INSERT INTO `huyen` (`ma_huyen`, `ten_huyen`, `ma_tinhtp`) VALUES
(681, 'Châu Thành', 68),
(682, 'Giồng Riềng', 68),
(683, 'U Minh Thượng', 68),
(684, 'Hòn Đất', 68),
(686, 'An Biên', 68),
(687, 'An Minh', 68),
(688, 'Giang Thành', 68),
(689, 'Gò Quao', 68),
(691, 'Cái Nước', 69),
(692, 'Đầm Dơi', 69),
(693, 'Năm Căn', 69),
(694, 'Ngọc Hiển', 69),
(695, 'Phú Tân', 69),
(696, 'Thới Bình', 69),
(697, 'Trần Văn Thời', 69),
(6810, 'Chó Kiên Xạo Lồn', 68),
(6811, 'Đĩ mẹ mày!!!', 68);

-- --------------------------------------------------------

--
-- Table structure for table `nguoiquanly`
--

CREATE TABLE `nguoiquanly` (
  `email` varchar(50) NOT NULL,
  `hoten_nql` varchar(255) NOT NULL,
  `ngaysinh_nql` date NOT NULL,
  `chitietdiachi_nql` varchar(100) NOT NULL,
  `ma_huyen` int(11) NOT NULL,
  `taikhoan_nql` varchar(50) NOT NULL,
  `matkhau_nql` varchar(50) NOT NULL,
  `sdt_nql` int(15) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `avatar_nql` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoiquanly`
--

INSERT INTO `nguoiquanly` (`email`, `hoten_nql`, `ngaysinh_nql`, `chitietdiachi_nql`, `ma_huyen`, `taikhoan_nql`, `matkhau_nql`, `sdt_nql`, `fb_link`, `avatar_nql`) VALUES
('lehieunghiadenhatthuongtamnhan@gmail.com', 'Lê Hiếu Nghĩa Đệ Nhất Thương Tâm Nhàn', '2020-07-21', 'không có', 697, 'admin', 'admin', 836484999, 'pornhub.com', 'nguoiquanly-img.jpg'),
('nguyenvanrang@gmail.com', 'Nguyễn Văn Rạng', '2020-07-01', 'Chưa có thông tin này', 682, 'rang', 'dong', 839984489, 'facebook/hiphopneverdie.mewmewmew', 'nguoiquanly2.jpg'),
('myAccountshankstocdo@yahoo.com', 'Shanks Tóc Đỏ', '2020-06-30', '11,QL63, KP Minh Long, TT Minh Lương', 681, 'shanks', 'tocdo', 836484939, 'javhd.com', 'shanksTocDo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tinh_tp`
--

CREATE TABLE `tinh_tp` (
  `ma_tinhtp` int(11) NOT NULL,
  `ten_tinhtp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinh_tp`
--

INSERT INTO `tinh_tp` (`ma_tinhtp`, `ten_tinhtp`) VALUES
(14, 'Quảng Ninh'),
(15, 'Hải Phòng'),
(17, 'Thái Bình'),
(18, 'Nam định'),
(19, 'Phú Thọ'),
(20, 'Thái Nguyên'),
(21, 'Yên Bái'),
(22, 'Tuyên Quang'),
(23, 'Hà Giang Buồn'),
(24, 'Lào Caj'),
(25, 'Lai Châu'),
(26, 'Sơn La'),
(27, 'Điện Biên'),
(28, 'Hoà Bình'),
(29, 'Hà Nội'),
(32, 'Hà Nội'),
(33, 'Hà Tây'),
(34, 'Hải Dương'),
(35, 'Ninh Bình'),
(36, 'Thanh Hoá'),
(37, 'Nghệ An'),
(38, 'Hà Tĩnh'),
(43, 'Đà Nẵng'),
(47, 'Đắk Lắk'),
(48, 'Đắk Nông'),
(49, 'Lâm Đồng'),
(50, 'Tp.HCM'),
(57, 'Vĩnh Long'),
(59, 'Tp.HCM'),
(60, 'Đồng Nai'),
(61, 'Bình Dương'),
(62, 'Long An'),
(63, 'Tiền Giang'),
(65, 'Cần thơ'),
(66, 'Đồng Tháp'),
(67, 'An Giang'),
(68, 'Kiên Giang hjhj'),
(69, 'Cà Mau'),
(70, 'Tây Ninh'),
(71, 'Bến Tre'),
(72, 'Bà Rịa Vũng Tàu'),
(73, 'Quảng bình'),
(74, 'Quảng Trị'),
(75, 'Huế'),
(76, 'Quảng Ngãi'),
(77, 'Bình Định'),
(78, 'Phú Yên'),
(79, 'Khánh Hoà'),
(81, 'Gia Lai'),
(82, 'Kon Tum'),
(83, 'Sóc Trăng'),
(84, 'Trà Vinh'),
(85, 'Ninh Thuận'),
(86, 'Bình Thuận'),
(88, 'Vĩnh Phúc'),
(89, 'Hưng yên'),
(90, 'Hà nam'),
(92, 'Quảng Nam'),
(93, 'Bình Phước'),
(94, 'Bạc Liêu'),
(95, 'Hậu Giang'),
(97, 'asdsa'),
(98, 'Bắc Giang'),
(99, 'Bắc Ninh'),
(105, 'trăm lẻ năm'),
(106, 'Trăm lẻ sáu'),
(109, 'trăm lẻ chín'),
(200, 'hai trăm');

-- --------------------------------------------------------

--
-- Table structure for table `tramquantrac`
--

CREATE TABLE `tramquantrac` (
  `ma_tram` int(11) NOT NULL,
  `ten_tram` varchar(255) NOT NULL,
  `chitietdiachi_tram` varchar(255) NOT NULL,
  `ma_huyen` int(11) NOT NULL,
  `taikhoan_nql` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tramquantrac`
--

INSERT INTO `tramquantrac` (`ma_tram`, `ten_tram`, `chitietdiachi_tram`, `ma_huyen`, `taikhoan_nql`) VALUES
(6801, 'Bãi rác vĩ đại nhất Kiên Giang', 'Số nhà, tên đường, xả, phường - thị trấn', 689, 'admin'),
(6802, 'Bãi rác thơm nhất kiên giang', '11,Quốc lộ 63, Khu phố Minh Long, Thị Trấn Minh Lương', 681, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cambien`
--
ALTER TABLE `cambien`
  ADD PRIMARY KEY (`ma_cambien`);

--
-- Indexes for table `dailuongdo`
--
ALTER TABLE `dailuongdo`
  ADD PRIMARY KEY (`ma_dailuong`);

--
-- Indexes for table `donvido`
--
ALTER TABLE `donvido`
  ADD PRIMARY KEY (`ma_donvi`);

--
-- Indexes for table `huyen`
--
ALTER TABLE `huyen`
  ADD PRIMARY KEY (`ma_huyen`);

--
-- Indexes for table `nguoiquanly`
--
ALTER TABLE `nguoiquanly`
  ADD PRIMARY KEY (`taikhoan_nql`);

--
-- Indexes for table `tinh_tp`
--
ALTER TABLE `tinh_tp`
  ADD PRIMARY KEY (`ma_tinhtp`);

--
-- Indexes for table `tramquantrac`
--
ALTER TABLE `tramquantrac`
  ADD PRIMARY KEY (`ma_tram`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cambien`
--
ALTER TABLE `cambien`
  MODIFY `ma_cambien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dailuongdo`
--
ALTER TABLE `dailuongdo`
  MODIFY `ma_dailuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `donvido`
--
ALTER TABLE `donvido`
  MODIFY `ma_donvi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tramquantrac`
--
ALTER TABLE `tramquantrac`
  MODIFY `ma_tram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6803;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
