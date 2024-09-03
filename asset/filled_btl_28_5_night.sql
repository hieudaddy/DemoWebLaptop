-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2024 lúc 05:30 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12
USE web_laptop;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `filled_btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accept`
--

CREATE TABLE `accept` (
  `ID_DonHang` int(11) NOT NULL,
  `ID_Account` int(11) NOT NULL,
  `ID_ThanhToan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accept`
--

INSERT INTO `accept` (`ID_DonHang`, `ID_Account`, `ID_ThanhToan`) VALUES
(16, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID_Account` int(11) NOT NULL,
  `TaiKhoan` varchar(30) NOT NULL,
  `MatKhau` varchar(300) NOT NULL,
  `otp` int(50) DEFAULT NULL,
  `otp_expiry` varchar(300) DEFAULT NULL,
  `ID_LoaiTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ID_Account`, `TaiKhoan`, `MatKhau`, `otp`, `otp_expiry`, `ID_LoaiTaiKhoan`) VALUES
(1, 'admin', '$2y$10$4qVnisMWB1OWw2Ms9i.eP.HlHxL5GqYrVzDsftzP1SLURiiMRKmuC', 201460, '2024-05-22 10:24:08', 1),
(2, 'khai', '$2y$10$3Rum9xXRD5GnMkBHX/L/M.fsdpJ6F0PDJmXwteKQPRdqscrVTylXe', 0, '', 2),
(5, 'minh', '$2y$10$xgINZRfn8cFSIF3NDnd6Z.Bo7mQXOLgrJf4dy6Ja7F7ozAV5Ut73K', 818217, '2024-05-22 10:23:31', 2),
(6, 'tuyen', '$2y$10$jmH8W0pXrtBq4GLqjTmBIexQFihJdSFFCXxZgiQMZkHjw8SxXa8XW', 0, '', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietaccept`
--

CREATE TABLE `chitietaccept` (
  `ID_DonHang` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietaccept`
--

INSERT INTO `chitietaccept` (`ID_DonHang`, `ID_SanPham`, `SoLuong`, `TongTien`) VALUES
(16, 3, 1, 16490000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ID_DonHang` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID_DonHang`, `ID_SanPham`, `SoLuong`, `TongTien`) VALUES
(1, 1, 1, 1),
(1, 2, 10, 10),
(1, 3, 20, 20),
(1, 4, 30, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID_DonHang` int(11) NOT NULL,
  `ID_HoaDon` int(11) NOT NULL,
  `NgayTao` date NOT NULL,
  `ID_ThanhToan` int(11) NOT NULL,
  `ID_Status_Giao` int(11) NOT NULL,
  `NgayCapNhat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID_DonHang`, `ID_HoaDon`, `NgayTao`, `ID_ThanhToan`, `ID_Status_Giao`, `NgayCapNhat`) VALUES
(1, 7, '2024-05-01', 1, 4, '2024-05-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ID_GioHang` int(11) NOT NULL,
  `ID_Account` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`ID_GioHang`, `ID_Account`, `ID_SanPham`, `SoLuong`) VALUES
(51, 6, 2, 1),
(52, 6, 3, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `ID_Hang` int(11) NOT NULL,
  `TenHang` varchar(50) NOT NULL,
  `link_hang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`ID_Hang`, `TenHang`, `link_hang`) VALUES
(1, 'Asus', './asset/image/logo_asus.jpg'),
(2, 'Dell', './asset/image/logo_dell.jpg'),
(3, 'Hp', './asset/image/logo_hp.jpg'),
(4, 'Lenovo', './asset/image/logo_lenovo.jpg'),
(5, 'Mac', './asset/image/logo_mac.jpg'),
(6, 'Msi', './asset/image/logo_msi.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhsanpham`
--

CREATE TABLE `hinhanhsanpham` (
  `ID_HASP` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanhsanpham`
--

INSERT INTO `hinhanhsanpham` (`ID_HASP`, `ID_SanPham`, `link`) VALUES
(38, 1, './asset/image/asus-gaming-rog-strix-scar(2).jpg'),
(39, 1, './asset/image/asus-gaming-rog-strix-scar(3).jpg'),
(40, 1, './asset/image/asus-gaming-rog-strix-scar.jpg'),
(41, 2, './asset/image/asus-tuf-gaming-f15 (2).jpg'),
(42, 2, './asset/image/asus-tuf-gaming-f15 (3).jpg'),
(43, 2, './asset/image/asus-tuf-gaming-f15.jpg'),
(44, 3, './asset/image/asus-vivobook-15-oled(2).jpg'),
(45, 3, './asset/image/asus-vivobook-15-oled(3).jpg'),
(46, 3, './asset/image/asus-vivobook-15-oled(4).jpg'),
(47, 3, './asset/image/asus-vivobook-15-oled(5).jpg'),
(48, 3, './asset/image/asus-vivobook-15-oled.jpg'),
(49, 4, './asset/image/asus-vivobook-go-15 (2).jpg'),
(50, 4, './asset/image/asus-vivobook-go-15 (3).jpg'),
(51, 4, './asset/image/asus-vivobook-go-15 (4).jpg'),
(52, 4, './asset/image/asus-vivobook-go-15 (5).jpg'),
(53, 4, './asset/image/asus-vivobook-go-15.jpg'),
(54, 6, './asset/image/asus-zenbook-14(2).jpg'),
(55, 6, './asset/image/asus-zenbook-14(3).jpg'),
(56, 6, './asset/image/asus-zenbook-14(4).jpg'),
(57, 6, './asset/image/asus-zenbook-14(5).jpg'),
(58, 6, './asset/image/asus-zenbook-14.jpg'),
(59, 5, './asset/image/asus-vivobook-s-14-flip(2).jpg'),
(60, 5, './asset/image/asus-vivobook-s-14-flip(3).jpg'),
(61, 5, './asset/image/asus-vivobook-s-14-flip(4).jpg'),
(62, 5, './asset/image/asus-vivobook-s-14-flip(5).jpg'),
(63, 5, './asset/image/asus-vivobook-s-14-flip(5).jpg'),
(64, 5, './asset/image/asus-vivobook-s-14-flip.jpg'),
(65, 7, './asset/image/dell-gaming-g15(2).jpg'),
(66, 7, './asset/image/dell-gaming-g15(3).jpg'),
(67, 7, './asset/image/dell-gaming-g15(4).jpg'),
(68, 7, './asset/image/dell-gaming-g15(5).jpg'),
(69, 7, './asset/image/dell-gaming-g15.jpg'),
(70, 8, './asset/image/dell-inspiron-14-7430(2).jpg'),
(71, 8, './asset/image/dell-inspiron-14-7430(3).jpg'),
(72, 8, './asset/image/dell-inspiron-14-7430(4).jpg'),
(73, 8, './asset/image/dell-inspiron-14-7430(5).jpg'),
(74, 8, './asset/image/dell-inspiron-14-7430.jpg'),
(75, 9, './asset/image/dell-inspiron-15-3520(2).jpg'),
(76, 9, './asset/image/dell-inspiron-15-3520(3).jpg'),
(77, 9, './asset/image/dell-inspiron-15-3520(4).jpg'),
(78, 9, './asset/image/dell-inspiron-15-3520(2).jpg'),
(79, 9, './asset/image/dell-inspiron-15-3520.jpg'),
(80, 10, './asset/image/dell-inspiron-16(2).jpg'),
(81, 10, './asset/image/dell-inspiron-16(3).jpg'),
(82, 10, './asset/image/dell-inspiron-16(4).jpg'),
(83, 10, './asset/image/dell-inspiron-16(5).jpg'),
(84, 10, './asset/image/dell-inspiron-16.jpg'),
(85, 11, './asset/image/dell-vostro-15-3520(2).jpg'),
(86, 11, './asset/image/dell-vostro-15-3520(3).jpg'),
(87, 11, './asset/image/dell-vostro-15-3520(4).jpg'),
(88, 11, './asset/image/dell-vostro-15-3520(5).jpg'),
(89, 11, './asset/image/dell-vostro-15-3520.jpg'),
(90, 12, './asset/image/hp-15s-fq5229tu(2).jpg'),
(91, 12, './asset/image/hp-15s-fq5229tu(3).jpg\r\n'),
(92, 12, './asset/image/hp-15s-fq5229tu(4).jpg'),
(93, 12, './asset/image/hp-15s-fq5229tu(5).jpg'),
(94, 12, './asset/image/hp-15s-fq5229tu.jpg'),
(95, 31, './asset/image/hp-240-g9(2).jpg'),
(96, 31, './asset/image/hp-240-g9(3).jpg'),
(97, 31, './asset/image/hp-240-g9(4).jpg'),
(98, 31, './asset/image/hp-240-g9(5).jpg'),
(99, 31, './asset/image/hp-240-g9.jpg'),
(100, 14, './asset/image/hp-245-g10(2).jpg'),
(101, 14, './asset/image/hp-245-g10(3).jpg'),
(102, 14, './asset/image/hp-245-g10(4).jpg'),
(103, 14, '/asset/image/hp-245-g10(5).jpg'),
(104, 14, './asset/image/hp-245-g10.jpg'),
(105, 15, './asset/image/hp-pavilion-14(3).jpg'),
(106, 15, './asset/image/hp-pavilion-14(4).jpg'),
(107, 15, './asset/image/hp-pavilion-14(5).jpg'),
(108, 15, './asset/image/hp-pavilion-14(2).jpg'),
(109, 15, './asset/image/hp-pavilion-14.jpg'),
(110, 16, './asset/image/hp-pavilion-15(5).jpg'),
(111, 16, './asset/image/hp-pavilion-15(4).jpg'),
(112, 16, './asset/image/hp-pavilion-15(3).jpg'),
(113, 16, './asset/image/hp-pavilion-15(2).jpg'),
(114, 16, './asset/image/hp-pavilion-15.jpg'),
(115, 17, './asset/image/lenovo-ideapad-1(2).jpg'),
(116, 17, './asset/image/lenovo-ideapad-1(3).jpg'),
(117, 17, './asset/image/lenovo-ideapad-1(4).jpg'),
(118, 17, './asset/image/lenovo-ideapad-1(5).jpg'),
(119, 17, './asset/image/lenovo-ideapad-1.jpg'),
(120, 18, './asset/image/lenovo-ideapad-gaming-3(2).jpg'),
(121, 18, './asset/image/lenovo-ideapad-gaming-3(3).jpg'),
(122, 18, './asset/image/lenovo-ideapad-gaming-3(4).jpg'),
(123, 18, './asset/image/lenovo-ideapad-gaming-3(5).jpg'),
(124, 18, './asset/image/lenovo-ideapad-gaming-3.jpg'),
(125, 19, './asset/image/lenovo-ideapad-slim-3(2).jpg'),
(126, 19, './asset/image/lenovo-ideapad-slim-3(3).jpg'),
(127, 19, './asset/image/lenovo-ideapad-slim-3(4).jpg'),
(128, 19, './asset/image/lenovo-ideapad-slim-3(5).jpg'),
(129, 19, './asset/image/lenovo-ideapad-slim-3.jpg'),
(130, 20, './asset/image/lenovo-legion-5(2).jpg'),
(131, 20, './asset/image/lenovo-legion-5(3).jpg'),
(132, 20, './asset/image/lenovo-legion-5(4).jpg'),
(133, 20, './asset/image/lenovo-legion-5(5).jpg'),
(134, 20, './asset/image/lenovo-legion-5.jpg'),
(135, 21, './asset/image/lenovo-loq-gaming(2).jpg'),
(136, 21, './asset/image/lenovo-loq-gaming(3).jpg'),
(137, 21, './asset/image/lenovo-loq-gaming(4).jpg'),
(138, 21, './asset/image/lenovo-loq-gaming(5).jpg'),
(139, 21, './asset/image/lenovo-loq-gaming.jpg'),
(140, 8, './asset/image/lenovo-v14-g3(2).jpg'),
(141, 8, './asset/image/lenovo-v14-g3(3).jpg'),
(142, 8, './asset/image/lenovo-v14-g3(4).jpg'),
(143, 8, './asset/image/lenovo-v14-g3(5).jpg'),
(144, 22, './asset/image/lenovo-v14-g3.jpg'),
(145, 23, './asset/image/lenovo-yoga-7(2).jpg'),
(146, 23, './asset/image/lenovo-yoga-7(3).jpg'),
(147, 23, './asset/image/lenovo-yoga-7(4).jpg'),
(148, 23, './asset/image/lenovo-yoga-7(5).jpg'),
(149, 23, './asset/image/lenovo-yoga-7.jpg'),
(150, 24, './asset/image/apple-macbook-air-13(2).jpg'),
(151, 24, './asset/image/apple-macbook-air-13(3).jpg'),
(152, 24, './asset/image/apple-macbook-air-13(4).jpg'),
(153, 24, './asset/image/apple-macbook-air-13(5).jpg'),
(154, 24, './asset/image/apple-macbook-air-13.jpg'),
(155, 25, './asset/image/apple-macbook-air-m2(2).jpg'),
(156, 25, './asset/image/apple-macbook-air-m2(3).jpg'),
(157, 25, './asset/image/apple-macbook-air-m2(4).jpg'),
(158, 25, './asset/image/apple-macbook-air-m2(5).jpg'),
(159, 25, './asset/image/apple-macbook-air-m2.jpg'),
(160, 27, './asset/image/apple-macbook-pro-16-m3(2).jpg'),
(161, 27, './asset/image/apple-macbook-pro-16-m3(3).jpg'),
(162, 27, './asset/image/apple-macbook-pro-16-m3(4).jpg'),
(163, 27, './asset/image/apple-macbook-pro-16-m3(5).jpg'),
(164, 27, './asset/image/apple-macbook-pro-16-m3.jpg'),
(165, 28, './asset/image/macbook-air-m1(2).jpg'),
(166, 28, './asset/image/macbook-air-m1(3).jpg'),
(167, 28, './asset/image/macbook-air-m1(4).jpg'),
(168, 28, './asset/image/macbook-air-m1(5).jpg'),
(169, 28, './asset/image/macbook-air-m1.jpg'),
(170, 26, './asset/image/macbook-pro-14(2).jpg'),
(171, 26, './asset/image/macbook-pro-14(3).jpg'),
(172, 26, './asset/image/macbook-pro-14(4).jpg'),
(173, 26, './asset/image/macbook-pro-14(5).jpg'),
(174, 26, './asset/image/macbook-pro-14.jpg'),
(175, 30, './asset/image/msi-gaming-sword-16(2).jpg'),
(176, 30, './asset/image/msi-gaming-sword-16(3).jpg'),
(177, 30, './asset/image/msi-gaming-sword-16(4).jpg'),
(178, 30, './asset/image/msi-gaming-sword-16(5).jpg'),
(179, 30, './asset/image/msi-gaming-sword-16.jpg'),
(180, 29, './asset/image/msi-gaming-gf63(2).jpg'),
(181, 29, './asset/image/msi-gaming-gf63(3).jpg'),
(182, 29, './asset/image/msi-gaming-gf63(4).jpg'),
(183, 29, './asset/image/msi-gaming-gf63(5).jpg'),
(184, 29, './asset/image/msi-gaming-gf63.jpg'),
(185, 34, './asset/image/msi-modern-14(2).jpg'),
(186, 34, './asset/image/msi-modern-14(3).jpg'),
(187, 34, './asset/image/msi-modern-14(4).jpg'),
(188, 34, './asset/image/msi-modern-14(5).jpg'),
(189, 34, './asset/image/msi-modern-14.jpg'),
(190, 32, './asset/image/msi-modern-15(2).jpg'),
(191, 32, './asset/image/msi-modern-15(3).jpg'),
(192, 32, './asset/image/msi-modern-15(4).jpg'),
(193, 32, './asset/image/msi-modern-15(5).jpg'),
(194, 32, './asset/image/msi-modern-15.jpg'),
(195, 33, './asset/image/msi-prestige-14(2).jpg'),
(196, 33, './asset/image/msi-prestige-14(3).jpg'),
(197, 33, './asset/image/msi-prestige-14(4).jpg'),
(198, 33, './asset/image/msi-prestige-14(5).jpg'),
(199, 33, './asset/image/msi-prestige-14.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_Account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID_HoaDon`, `ID_Account`) VALUES
(7, 6),
(9, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `ID_KhuyenMai` int(11) NOT NULL,
  `TenKhuyenMai` varchar(30) NOT NULL,
  `MoTa` varchar(500) NOT NULL,
  `BatDau` date NOT NULL,
  `KetThuc` date NOT NULL,
  `MucGiam` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`ID_KhuyenMai`, `TenKhuyenMai`, `MoTa`, `BatDau`, `KetThuc`, `MucGiam`) VALUES
(1, 'Black Friday', 'Trong ngày Black Friday 2024 hàng loạt món đồ thuộc đủ mọi lĩnh vực sẽ được treo biển giảm giá theo đúng nghĩa và người mua có thể mua được những món đồ cần thiết với mức giá rẻ. Đặc biệt với các món đồ công nghệ có mức giá khá cao và ít khi giảm sốc thì mua hàng vào thời điểm này sẽ có lợi nhất cho người dùng.', '2024-11-23', '2024-12-31', 70),
(2, 'Khuyến mãi Đại lễ 30/4 - 1/5 ', 'Nhân dịp Đại lễ lớn nhất cả nước 30/04 - 01/05, Công ty chúng tôi tung ưu đãi sốc nhất từ trước đến nay: Laptop Mac,MSi,Lenovo,...đua nhau giảm giá chỉ còn từ 8 triệu.', '2024-04-28', '2024-12-31', 30),
(3, 'Chương trình khuyến mãi Tết 20', 'Nhận dịp Năm mới chúng tôi giảm giá  toàn bộ của hàng với nhiều ưu đãi hấp dẫn', '2024-01-02', '2024-12-31', 50),
(4, 'Back to School ', 'Một kỳ nghỉ hè mới đã bắt đầu, một năm học mới lại sắp đến. Đây là khoảng thời gian để các bậc phụ huynh cũng như các em học sinh, sinh viên chuẩn bị hành trang sẵn sàng cho năm học mới. Nhằm giúp các em có một tinh thần phấn chấn để “Back to School” .Chương trình ưu đãi sinh viên vô cùng hấp dẫn với mức giảm giá tới 50%. Hãy cùng theo dõi để sở hữu những sản phẩm cực ấn tượng trong mùa tựu trường này nhé.', '2024-08-29', '2024-12-31', 40),
(5, 'Sale Noel', 'Noel gần kề, vào không khí Giáng sinh, một ngày lễ đầy ý nghĩa, chương trình khuyến mãi Giáng sinh với nhiều chương trình hấp dẫn dành cho các sản phẩm công nghệ như điện thoại, tai nghe, laptop,... Noel sẽ có ý nghĩa thế nào, bạn suy nghĩ khó khăn trong việc lựa chọn quà Giáng sinh ý nghĩa cho người yêu. Bài viết dưới đây sẽ giúp bạn tìm được quà tặng ưng ý cho người thân yêu của mình.\r\n\r\nSự kiến sắp tới bùng nổ với hàng ngàn sản phẩm xả hàng tồn kho giá siêu sốc đến 99% cũng khám ngay', '2024-12-17', '2024-12-31', 99);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `ID_LoaiSanPham` int(11) NOT NULL,
  `TenLoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`ID_LoaiSanPham`, `TenLoai`) VALUES
(1, 'Laptop Gaming'),
(2, 'Laptop Văn Phòng'),
(3, 'Macbook'),
(4, 'Máy trạm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `ID_LoaiTaiKhoan` int(11) NOT NULL,
  `Loai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`ID_LoaiTaiKhoan`, `Loai`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `ID_Noti` int(11) NOT NULL,
  `ID_Account` int(11) NOT NULL,
  `Mota` text NOT NULL,
  `Status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`ID_Noti`, `ID_Account`, `Mota`, `Status`) VALUES
(1, 6, '1', b'1'),
(2, 6, '2', b'1'),
(3, 6, '3', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_SanPham` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Gia` double NOT NULL,
  `Hang` int(11) NOT NULL,
  `Status` bit(1) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThongTin` varchar(1000) NOT NULL,
  `DaBan` int(11) NOT NULL,
  `BaoHanh` int(11) NOT NULL,
  `ID_KhuyenMai` int(11) DEFAULT NULL,
  `ID_LoaiSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_SanPham`, `TenSP`, `Gia`, `Hang`, `Status`, `SoLuong`, `ThongTin`, `DaBan`, `BaoHanh`, `ID_KhuyenMai`, `ID_LoaiSanPham`) VALUES
(1, 'Asus gaming rog strix scar', 98000000, 1, b'0', 0, 'Laptop Asus Gaming ROG Strix SCAR 18 G834JY i9 (N6039W) hứa hẹn sẽ thống trị thế giới laptop gaming với hiệu năng bùng nổ đến từ bộ vi xử lý Intel Core i9 thế hệ thứ 13 hoàn toàn mới, card đồ họa NVIDIA chuyên dụng và màn hình siêu lớn 18 inch 240 Hz, mang đến cho bạn trải nghiệm chơi game, làm việc trên cả tuyệt vời.', 1, 24, 1, 1),
(2, 'Asus tuf gaming f15 ', 21990000, 1, b'1', 1, 'Laptop Asus TUF Gaming F15 FX507ZC4 i5 12500H (HN229W) với cấu trúc mạnh mẽ, hiệu năng vượt trội cùng mức giá hoàn toàn ưu đãi tại Thế Giới Di Động. Đây chính xác là mẫu laptop gaming được thiết kế dành riêng cho những anh em đam mê thể thao điện tử, đáp ứng đầy đủ đến cả những công việc thiết kế, sáng tạo.', 6, 24, 2, 1),
(3, 'Asus vivobook 15 oled', 16490000, 1, b'1', 10, 'Laptop Asus Vivobook 15 OLED A1505ZA i5 12500H (L1337W) có không gian hiển thị rộng rãi, sắc nét với màn hình 15.6 inch OLED cùng nhiều hiệu năng mạnh mẽ khác. Đây chắc hẳn là chiếc laptop đồ họa - kỹ thuật phù hợp với những bạn đang có đòi hỏi về đồ họa hay các công việc sáng tạo.', 6, 24, NULL, 1),
(4, 'Laptop Asus Vivobook Go 15', 12490000, 1, b'0', 0, 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.', 10, 24, NULL, 1),
(5, 'Laptop Asus Vivobook S 14 Flip', 18990000, 1, b'0', 0, 'Laptop Asus Vivobook S 14 Flip TP3402VA i5 (LZ031W) được thiết kế với sự cân bằng tuyệt vời giữa sức mạnh và tính di động, một chiếc laptop học tập - văn phòng được tích hợp nhiều tính năng và cấu hình tiên tiến, sẵn sàng đáp ứng mọi nhu cầu sử dụng của bạn.', 25, 24, NULL, 1),
(6, 'Asus Zenbook 14 OLED', 26990000, 1, b'1', 13, 'Mở đầu cho kỷ nguyên laptop mới, hiện đại, thông minh, laptop Asus Zenbook 14 OLED UX3405MA Ultra 5 (PP151W) sở hữu con chip Intel Meteor Lake hoàn toàn mới, được tích hợp hàng loạt những tính năng AI hữu ích, màn hình chuẩn sắc nét. Mẫu sản phẩm này chắc chắn sẽ nâng tầm đáng kể cho phong cách làm việc của bạn.', 10, 24, NULL, 2),
(7, 'Laptop Dell Gaming G15 5530', 37990000, 2, b'1', 400, 'Laptop Dell Gaming G15 5530 i7 13650HX (i7H165W11GR4060) là cỗ máy gaming siêu việt đến từ Dell với vẻ bề ngoài độc đáo mang trong mình sức mạnh của Intel Gen 13 thế hệ mới cùng card rời RTX 40 series sẽ mang đến một trải nghiệm gaming đỉnh cao và đáp ứng mọi yêu cầu thường ngày, giải trí hay đồ họa của người dùng.', 66, 24, NULL, 1),
(8, 'Laptop Dell Inspiron 14', 27999000, 2, b'0', 0, 'Laptop Dell Inspiron 14 7430 2-in-1 i7 1355U (i7U165W11SLU) sẽ mang đến cho người dùng trải nghiệm sử dụng thú vị với hiệu năng mạnh mẽ từ con chip Intel Gen 13, tính năng cảm ứng đa điểm, mở gập 360 độ cùng thiết kế bắt mắt. Chiếc laptop cao cấp này chắc chắn sẽ thỏa mãn mọi nhu cầu của bạn.\r\nThiết kế thời thượng, tí', 99, 24, 2, 2),
(9, 'Laptop Dell Inspiron 15', 16499000, 2, b'1', 700, 'Laptop Dell Inspiron 15 3520 i5 1235U (25P231) hoàn toàn sở hữu mọi yếu tố mà một người dùng cá nhân cơ bản cần, hiệu năng ổn định từ con chip Intel i5, RAM 16 GB, màn hình 15.6 inch thoải mái cũng như sở hữu một mức giá lý tưởng tại shop.', 302, 24, 3, 2),
(10, 'Laptop Dell Inspiron 16 5630', 22950000, 2, b'1', 512, 'Laptop Dell Inspiron 16 5630 i5 1335U (71020244) sở hữu ngoại hình sang trọng có thể nói là \"điểm sáng\" trong những chiếc Ultrabook vào năm 2023 này, đi kèm với đó là hiệu năng mạnh mẽ từ con chip Intel thế hệ 13 hoàn toàn mới. Mẫu laptop học tập - văn phòng đến từ thương hiệu Dell này chắc chắn sẽ cho bạn những trải nghiệm thú vị nhất.', 62, 24, NULL, 2),
(11, 'Laptop Dell Vostro 15', 10490000, 2, b'1', 135, 'Laptop Dell Vostro 15 3520 i3 1215U (V5I3614W1) là một lựa chọn tuyệt vời cho những bạn đang cần tìm một chiếc laptop học tập - văn phòng sở hữu cấu hình ổn định, có khả năng vận hành trơn tru mọi tác vụ thường ngày.', 23, 24, NULL, 1),
(12, 'Laptop HP 15s fq5229TU', 10490000, 3, b'1', 321, 'Với một mức giá thành lý tưởng, bạn đã có thể sở hữu cho mình một mẫu laptop học tập - văn phòng có hiệu năng ổn định, ngoại hình thanh lịch cùng các tính năng hiện đại. Laptop HP 15s fq5229TU i3 1215U (8U237PA) chắc chắn sẽ đáp ứng đầy đủ nhu cầu làm việc, học tập và giải trí thường ngày của sinh viên cũng như người đi làm.', 123, 24, NULL, 1),
(14, 'HP 245 G10 R5 7520U', 11390000, 3, b'1', 213, 'Mẫu laptop HP 245 G10 R5 7520U (8F155PA) có thể nói là chiến thần  laptop học tập - văn phòng trong tầm giá sở hữu một cấu hình khá ổn áp, dung lượng lưu trữ lớn và khối lượng nhẹ đặc biệt là khả năng nâng cấp tối ưu.', 25, 24, NULL, 1),
(15, 'HP Pavilion 14 dv2073TU', 16990000, 3, b'1', 101, 'Laptop HP Pavilion 14 dv2073TU i5 1235U (7C0P2PA) vừa có mặt tại Thế Giới Di Động sẽ khiến bạn thực sự ấn tượng với vẻ ngoài vô cùng trẻ trung, sở hữu thông số cấu hình mạnh mẽ cho bất cứ nhu cầu sử dụng cá nhân nào. Đây chính xác là một mẫu laptop học tập - văn phòng dành cho mọi nhà.', 55, 24, NULL, 1),
(16, ' HP Pavilion 15', 17090000, 3, b'1', 63, 'Khả năng đáp ứng hiệu quả và mượt mà mọi tác vụ làm việc và giải trí nhờ sức mạnh của chip Intel Gen 12 cùng RAM 16 GB, laptop HP Pavilion 15 eg2081TU i5 1240P (7C0Q4PA) chắc chắn sẽ rất phù hợp với những bạn sinh viên, học sinh cũng như người đi làm.', 20, 24, NULL, 1),
(17, 'Lenovo IdeaPad 1 15AMN7 R5 7520U', 9290000, 4, b'1', 52, 'Với cấu hình mạnh mẽ và thiết kế thanh lịch, Lenovo IdeaPad 1 15AMN7 R5 7520U (82VG0061VN) sẽ đáp ứng đầy đủ các tiêu chí khi bạn chọn mua laptop học tập - văn phòng. Đây cũng là mẫu laptop đầu tiên trang bị CPU AMD 7000 series mới nhất tại Thế Giới Di Động.\r\nNgoại hình tinh tế, thanh lịch', 40, 24, NULL, 2),
(18, 'Lenovo Ideapad Gaming 3', 15990000, 4, b'1', 32, 'Một mẫu laptop gaming hot mang mức giá tầm trung và sở hữu những thông số đủ mạnh cho các anh em chiến thoải mái với những con game thịnh hành, phục vụ giải trí hay công việc đầy đủ. Laptop Lenovo Ideapad Gaming 3 15ACH6 R5 5500H (82K2027PVN) chắc chắn sẽ không khiến bạn thất vọng với giá trị bỏ ra.\r\n', 10, 24, NULL, 2),
(19, 'Lenovo Ideapad Slim 3', 15990000, 4, b'1', 210, 'Mẫu laptop học tập - văn phòng đến từ nhà Lenovo sở hữu những thông số cấu hình vượt trội như bộ vi xử lý Intel Gen 12 dòng H, RAM 16 GB, nhiều tiện ích tân tiến và đi kèm một mức giá thành phù hợp. Laptop Lenovo Ideapad Slim 3 15IAH8 i5 12450H (83ER000FVN) chắc chắn sẽ là sự lựa chọn không thể phù hợp hơn cho các bạn học sinh, sinh viên hay người đi làm khi đáp ứng đầy đủ nhu cầu từ làm việc đến giải trí.', 85, 24, NULL, 2),
(20, 'Lenovo Gaming Legion 5', 34999000, 4, b'1', 13, 'Laptop Lenovo Gaming Legion 5 16IRH8 i5 13500H (82YA00BSVN) với thiết kế thu hút đầy ấn tượng, hiệu năng vượt trội đến từ chip Intel Gen 13 cùng card RTX 40 series. Mẫu laptop gaming đến từ nhà Lenovo này chắc chắn sẽ là cộng sự hoàn hảo cho các anh em game thủ để làm chủ mọi chiến trường khốc liệt.', 6, 24, NULL, 1),
(21, 'Lenovo LOQ Gaming 15IAX9', 21490000, 4, b'1', 67, 'Laptop Lenovo LOQ Gaming 15IAX9 i5 12450HX (83GS000JVN) mang dáng dấp kiểu mẫu từ những chiếc laptop gaming nhà Lenovo, đưa đến một phiên bản hoàn toàn mới, đầy thời thượng. Laptop gaming còn được tích hợp với cấu hình mạnh mẽ, khung hình mượt mà cho phép bạn trải nghiệm sâu mọi tựa game.', 16, 24, NULL, 1),
(22, 'Lenovo V14 G3 ', 9690000, 4, b'1', 51, 'Đáp ứng cho bạn những trải nghiệm đầy đủ với công việc, học tập hay các hoạt động giải trí đa phương tiện đi kèm với đó là việc sở hữu một mức giá lý tưởng cho sinh viên và người đi làm. Lenovo V14 G3 ABA R5 5625U (82TU006SVN) chắc chắn là sự lựa chọn tuyệt vời cho mọi đối tượng người dùng mà không cần cân nhắc thêm bất cứ điều kiện gì.', 2, 24, NULL, 1),
(23, 'Laptop Lenovo Yoga 7', 22990000, 4, b'1', 48, 'Laptop Lenovo Yoga 7 14IRL8 i5 1340P (82YL006AVN) với thiết kế sang trọng, thanh lịch, khả năng gập xoay 360 độ đầy ấn tượng đi kèm hiệu năng vượt trội, mẫu sản phẩm này chắc chắn sẽ là sự lựa chọn hoàn hảo đáp ứng đầy đủ mọi nhu cầu làm việc, học tập và thiết kế cho người dùng.', 20, 24, NULL, 1),
(24, ' MacBook Air M3', 27290000, 5, b'1', 40, 'Tiếp nối những thành công mạnh mẽ từ phiên bản Macbook Air M2, thì nay MacBook Air M3 đã quay lại thật bùng nổ vào những tháng đầu 2024 này. Với con chip M3 cải tiến tuyệt vời, ngoại hình đến tiện ích \"miễn chê\" sẽ cho bạn trải nghiệm những chế độ công việc tuyệt vời.', 39, 24, NULL, 3),
(25, 'MacBook Air M2', 29790000, 5, b'0', 0, 'Với sức mạnh bùng nổ đến từ bộ vi xử lý M2 cùng thiết kế của một chiếc laptop cao cấp - sang trọng, MacBook Air M2 đáp ứng đầy đủ mọi nhu cầu từ học tập, văn phòng đến đồ họa, kỹ thuật nâng cao.\r\nNâng tầm mọi trải nghiệm nhờ sức mạnh bùng nổ đến từ bộ vi xử lý M2\r\nTiếp nối sự thành công của M1, thế hệ M2 sử dụng quy trình sản xuất 5 nm hiện đại với CPU 8 nhân, GPU 8 nhân cho các tác vụ thiết kế đồ họa, chỉnh sửa hình ảnh hay render video trên các ứng dụng như Photoshop, Adobe Illustrator, Adobe Premiere,... chưa bao giờ dễ dàng hơn đến thế.', 56, 24, NULL, 3),
(26, 'MacBook Pro M3', 38490000, 5, b'1', 30, 'MacBook Pro M3 8 GB là một bước tiến đáng kể trong dòng sản phẩm laptop của Apple, nổi bật với sự tập trung tối ưu hóa hiệu suất và đồ họa đỉnh cao. Với con chip M3 mạnh mẽ, sản phẩm này đặt ra một tiêu chuẩn mới cho hiệu năng và thiết kế thanh lịch. Điều này hứa hẹn mang đến trải nghiệm làm việc mượt mà và hiệu quả, đồng hành đỉnh cao cho tất cả tác vụ từ văn phòng, giải trí cho đến đồ họa chuyên nghiệp.', 10, 32, NULL, 3),
(27, 'MacBook Pro 16 inch M3 Pro', 79990000, 5, b'1', 20, 'Apple lại một lần nữa khuấy đảo giới công nghệ trong không không khí đón chào một năm mới với Apple MacBook Pro 16 inch M3 Pro 2023 12-core CPU sở hữu thế hệ chip M3 Pro hoàn toàn mới, hiệu suất cao hơn cùng sự cải tiến ưu việt về nhiều mặt, hứa hẹn sẽ mang đến cho người dùng những trải nghiệm thật tuyệt vời.', 6, 24, NULL, 3),
(28, 'MacBook Air M1', 18190000, 5, b'1', 30, 'Laptop Apple MacBook Air M1 2020 thuộc dòng laptop cao cấp sang trọng có cấu hình mạnh mẽ, chinh phục được các tính năng văn phòng lẫn đồ hoạ mà bạn mong muốn, thời lượng pin dài, thiết kế mỏng nhẹ sẽ đáp ứng tốt các nhu cầu làm việc của bạn.', 10, 24, NULL, 3),
(29, 'Laptop MSI Gaming GF63', 16990000, 6, b'0', 0, 'Laptop MSI Gaming GF63 12UC i5 12450H (803VN) là một sản phẩm mang đến cho người dùng trải nghiệm đỉnh cao và mạnh mẽ trong thế giới gaming và công việc đa nhiệm. Với thiết kế mạnh mẽ, đẹp mắt, máy là một đồng minh đáng tin cậy, sẵn sàng chinh phục mọi thách thức và kết nối bạn với thế giới ảo đầy sáng tạo.', 40, 24, NULL, 1),
(30, 'MSI Gaming Sword 16', 37990000, 6, b'1', 15, 'MSI luôn nổi tiếng với những cảm hứng thiết kế bất tận và đầy độc đáo. Với mẫu laptop MSI Gaming Sword 16 HX B14VFKG i7 14700HX (045VN) có ngoại hình lấy được nét đặc sắc từ vẻ ngoài của thanh kiếm, cấu hình đỉnh cao và tính năng tân tiến sẽ mở ra cho bạn những trải nghiệm chiến game thích thú từ phần nghe đến phần nhìn.', 6, 24, NULL, 4),
(31, 'HP 240 G9', 9690000, 3, b'1', 61, 'Sở hữu ngoại hình thanh lịch, tinh tế, hiệu năng ổn định đáp ứng đa tác vụ cùng mức giá hợp lý là những ưu điểm khiến laptop HP 240 G9 i3 1215U (6L1X7PA) trở thành một mẫu laptop học tập - văn phòng lý tưởng cho sinh viên và dân văn phòng.', 15, 24, NULL, 4),
(32, 'MSI Modern 15', 13990000, 6, b'1', 36, 'Laptop MSI Modern 15 B12MO i5 1235U (625VN) mang đam mê của bạn bắt nhịp với lối sống năng động hiện đại. Dù là bạn đang bận rộn trong văn phòng hay làm việc trên giảng đường, vi xử lý Intel Core Alder lake thế hệ mới cũng sẽ đáp ứng mọi nhu cầu của bạn.', 6, 24, NULL, 4),
(33, 'MSI Prestige 14 Evo', 26990000, 6, b'1', 32, 'Laptop MSI Prestige 14 Evo B13M i5 13500H (401VN) vừa sở hữu lối thiết kế sang trọng, linh hoạt, vừa mang trong mình hiệu năng mạnh mẽ của con chip Intel Gen 13, bộ nhớ RAM 16 GB cùng nhiều tính năng hiện đại đi kèm. Đây chắc chắn là một trong những mẫu laptop cao cấp - sang trọng đáng mua trên thị trường hiện nay.', 10, 24, NULL, 4),
(34, 'Laptop MSI Modern 14', 8490000, 6, b'1', 20, 'Laptop MSI Modern 14 C11M i3 1115G4 (011VN) được thiết kế để đáp ứng nhu cầu sử dụng cơ bản của những người dùng cần một chiếc máy tính có khả năng xử lý tốt các tác vụ học tập, làm việc văn phòng với hiệu suất ổn định.', 5, 24, NULL, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statusgiaohang`
--

CREATE TABLE `statusgiaohang` (
  `ID_Status_Giao` int(11) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `statusgiaohang`
--

INSERT INTO `statusgiaohang` (`ID_Status_Giao`, `TinhTrang`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Chờ lấy hàng'),
(3, 'Chờ giao hàng'),
(4, 'Đã giao'),
(5, 'Đã huỷ'),
(6, 'Trả hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `ID_ThanhToan` int(11) NOT NULL,
  `HinhThuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`ID_ThanhToan`, `HinhThuc`) VALUES
(1, 'Chuyển khoản ngân hàng'),
(2, 'Trả tiền khi nhận hàng'),
(3, 'Qua thẻ ATM(có Internet Banking)'),
(4, 'Qua mã QR');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userinfo`
--

CREATE TABLE `userinfo` (
  `ID_Account` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Avatar` varchar(300) DEFAULT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `userinfo`
--

INSERT INTO `userinfo` (`ID_Account`, `HoTen`, `DiaChi`, `SDT`, `Avatar`, `Email`) VALUES
(1, 'Trương Tuấn Minh', 'số 217 Trần Kiên,Kiến An,Hải Phòng', '0923905271', '', 'minhdz@gmail.com'),
(2, 'Phạm Quang Khải', 'Tú Sơn,Nghệ An', '09532142', './asset/avatar/tuyen-avatar.jpg', 'khai@gmail.com'),
(5, 'Trương Tuấn Minh', 'số 217 Trần Kiên,Kiến An,Hải Phòng', '0923905271', '', 'minh021003@gmail.com'),
(6, 'Đặng Văn Tuyến', 'Tú Sơn - Kiến Thụy - Hải Phòng', '0949745614', './asset/avatar90740-Chandung.jpg', 'supermu626@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accept`
--
ALTER TABLE `accept`
  ADD PRIMARY KEY (`ID_DonHang`),
  ADD KEY `FK_accept_account` (`ID_Account`),
  ADD KEY `FK_accept_thanhtoan` (`ID_ThanhToan`);

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID_Account`),
  ADD UNIQUE KEY `TaiKhoan` (`TaiKhoan`),
  ADD KEY `FK_account_Loaitaikhoan` (`ID_LoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `chitietaccept`
--
ALTER TABLE `chitietaccept`
  ADD KEY `FK_accept_sanpham` (`ID_SanPham`),
  ADD KEY `FK_chitiet_accept` (`ID_DonHang`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ID_DonHang`,`ID_SanPham`),
  ADD KEY `FK_ChiTiet_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID_DonHang`),
  ADD KEY `FK_DonHang_ThanhToan` (`ID_ThanhToan`),
  ADD KEY `FK_DonHang_HoaDon` (`ID_HoaDon`),
  ADD KEY `FK_DonHang_StatusGiao` (`ID_Status_Giao`) USING BTREE;

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID_GioHang`),
  ADD UNIQUE KEY `ID_Account` (`ID_Account`,`ID_SanPham`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`ID_Hang`);

--
-- Chỉ mục cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD PRIMARY KEY (`ID_HASP`),
  ADD KEY `FK_hinhanhsanpham_sanpham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID_HoaDon`),
  ADD KEY `FK_HoaDon_User` (`ID_Account`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`ID_KhuyenMai`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`ID_LoaiSanPham`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`ID_LoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID_Noti`),
  ADD KEY `FK_noti_account` (`ID_Account`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_SanPham`),
  ADD KEY `FK_SanPham_Hang` (`Hang`),
  ADD KEY `FK_SanPham_KhuyenMain` (`ID_KhuyenMai`);

--
-- Chỉ mục cho bảng `statusgiaohang`
--
ALTER TABLE `statusgiaohang`
  ADD PRIMARY KEY (`ID_Status_Giao`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`ID_ThanhToan`);

--
-- Chỉ mục cho bảng `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID_Account`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accept`
--
ALTER TABLE `accept`
  MODIFY `ID_DonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `ID_Account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ID_GioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `hang`
--
ALTER TABLE `hang`
  MODIFY `ID_Hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  MODIFY `ID_HASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID_HoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `ID_LoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `ID_LoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `ID_Noti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `statusgiaohang`
--
ALTER TABLE `statusgiaohang`
  MODIFY `ID_Status_Giao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `ID_ThanhToan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `accept`
--
ALTER TABLE `accept`
  ADD CONSTRAINT `FK_accept_account` FOREIGN KEY (`ID_Account`) REFERENCES `account` (`ID_Account`),
  ADD CONSTRAINT `FK_accept_thanhtoan` FOREIGN KEY (`ID_ThanhToan`) REFERENCES `thanhtoan` (`ID_ThanhToan`);

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK_account_Loaitaikhoan` FOREIGN KEY (`ID_LoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`ID_LoaiTaiKhoan`);

--
-- Các ràng buộc cho bảng `chitietaccept`
--
ALTER TABLE `chitietaccept`
  ADD CONSTRAINT `FK_accept_sanpham` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`),
  ADD CONSTRAINT `FK_chitiet_accept` FOREIGN KEY (`ID_DonHang`) REFERENCES `accept` (`ID_DonHang`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_ChiTiet_SanPham` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`),
  ADD CONSTRAINT `FK_chitiet_donhang` FOREIGN KEY (`ID_DonHang`) REFERENCES `donhang` (`ID_DonHang`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_DonHang_HoaDon` FOREIGN KEY (`ID_HoaDon`) REFERENCES `hoadon` (`ID_HoaDon`),
  ADD CONSTRAINT `FK_DonHang_StatusGiao` FOREIGN KEY (`ID_Status_Giao`) REFERENCES `statusgiaohang` (`ID_Status_Giao`),
  ADD CONSTRAINT `FK_DonHang_ThanhToan` FOREIGN KEY (`ID_ThanhToan`) REFERENCES `thanhtoan` (`ID_ThanhToan`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_Cart_Account` FOREIGN KEY (`ID_Account`) REFERENCES `account` (`ID_Account`),
  ADD CONSTRAINT `FK_Cart_SanPham` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`),
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Các ràng buộc cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD CONSTRAINT `FK_hinhanhsanpham_sanpham` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HoaDon_User` FOREIGN KEY (`ID_Account`) REFERENCES `account` (`ID_Account`);

--
-- Các ràng buộc cho bảng `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FK_noti_account` FOREIGN KEY (`ID_Account`) REFERENCES `account` (`ID_Account`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SanPham_Hang` FOREIGN KEY (`Hang`) REFERENCES `hang` (`ID_Hang`),
  ADD CONSTRAINT `FK_SanPham_KhuyenMain` FOREIGN KEY (`ID_KhuyenMai`) REFERENCES `khuyenmai` (`ID_KhuyenMai`);

--
-- Các ràng buộc cho bảng `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `FK_ID_ACC` FOREIGN KEY (`ID_Account`) REFERENCES `account` (`ID_Account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
