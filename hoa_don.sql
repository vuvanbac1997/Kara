-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2018 lúc 04:45 PM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hoa_don`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `ten_dang_nhap` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `phan_quyen` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dang_nhap_lan_cuoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_ID`, `ten_dang_nhap`, `mat_khau`, `phan_quyen`, `dang_nhap_lan_cuoi`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', '2018-05-10 00:22:30'),
(2, 'abc@gmail.com', '123', 'member', '2018-05-11 10:16:29'),
(3, 'xyz@gmail.com', '123', 'member', '2018-05-11 10:16:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `hoadon_ID` int(11) NOT NULL,
  `khachhang_ID` int(11) NOT NULL,
  `thoi_gian_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`hoadon_ID`, `khachhang_ID`, `thoi_gian_tao`) VALUES
(1, 1, '2018-05-11 15:16:22'),
(2, 2, '2018-05-11 15:17:19'),
(3, 1, '2018-05-12 02:01:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon_sanpham`
--

CREATE TABLE `hoadon_sanpham` (
  `hoadon_ID` int(11) NOT NULL,
  `sanpham_ID` int(11) NOT NULL,
  `gia_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon_sanpham`
--

INSERT INTO `hoadon_sanpham` (`hoadon_ID`, `sanpham_ID`, `gia_san_pham`, `so_luong`) VALUES
(1, 4, 50000, 5),
(2, 3, 2000, 20),
(2, 6, 100000, 5),
(3, 5, 20000, 9),
(3, 6, 5000, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhang_ID` int(11) NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`khachhang_ID`, `ho_ten`, `Email`, `so_dien_thoai`, `dia_chi`) VALUES
(1, 'Vũ Văn Bắc', 'abc@gmail.com', '0123456789', 'Hà Nội'),
(2, 'Kiều Văn Nam', 'xyz@gmail.com', '0976543122', 'Hà Nam'),
(3, 'Vũ Văn Nam', '', '013245678', 'Hải Phòng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanpham_ID` int(11) NOT NULL,
  `ten_san_pham` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gia_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sanpham_ID`, `ten_san_pham`, `gia_san_pham`) VALUES
(1, 'Bút', 2000),
(2, 'Thước', 5000),
(3, 'Vở', 5000),
(4, 'Sữa ông thọ', 20000),
(5, 'Đường', 15000),
(6, 'Sữa tươi', 10000),
(7, 'Sữa tắm', 100000),
(9, 'Khăn giấy', 120000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hoadon_ID`),
  ADD KEY `khachhang_ID` (`khachhang_ID`);

--
-- Chỉ mục cho bảng `hoadon_sanpham`
--
ALTER TABLE `hoadon_sanpham`
  ADD KEY `sanpham_ID` (`sanpham_ID`),
  ADD KEY `rl1` (`hoadon_ID`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhang_ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanpham_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachhang_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanpham_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon_sanpham`
--
ALTER TABLE `hoadon_sanpham`
  ADD CONSTRAINT `rl1` FOREIGN KEY (`hoadon_ID`) REFERENCES `hoadon` (`hoadon_ID`),
  ADD CONSTRAINT `rl2` FOREIGN KEY (`sanpham_ID`) REFERENCES `sanpham` (`sanpham_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
