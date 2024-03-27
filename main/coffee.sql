-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2024 lúc 09:50 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `mabl` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `idkh` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `content` text NOT NULL,
  `luotthich` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`idcomment`, `idkh`, `idsanpham`, `content`, `luotthich`, `rating`) VALUES
(1, 3, 1, 'ngon quá shop ơi. Mong shop đừng bán cái này nữa!', 0, 1),
(2, 4, 1, 'ờ may zing gút chóp', 0, 4),
(3, 5, 1, 'ngon như bỏ đớ', 69, 5),
(5, 5, 1, '  hehe', 0, 5),
(6, 5, 1, '  hay quá', 0, 5),
(7, 5, 1, '  hay quá', 0, 5),
(8, 5, 1, '  á', 0, 5),
(9, 5, 1, '  ás', 0, 5),
(10, 5, 1, '  ôi bạn ơi', 0, 5),
(11, 7, 1, '  nhu cac a', 0, 5),
(24, 7, 1, 'Gia Khiem ngu qua', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `size` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `masp`, `soluongmua`, `thanhtien`, `tinhtrang`, `size`) VALUES
(1, 4, 3, 207000, 0, 'S'),
(1, 15, 2, 90000, 0, 'S'),
(2, 7, 5, 345000, 0, 'S'),
(2, 18, 4, 180000, 0, 'S');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctsanpham`
--

CREATE TABLE `ctsanpham` (
  `idsanpham` int(11) NOT NULL,
  `idsize` varchar(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctsanpham`
--

INSERT INTO `ctsanpham` (`idsanpham`, `idsize`, `dongia`, `soluongton`, `hinh`, `giamgia`) VALUES
(1, 'S', 45000, 12, '1.jpg', 12000),
(2, 'S', 45000, 12, '2.jpg', 10000),
(3, 'S', 29000, 12, '3.jpg', 0),
(4, 'S', 69000, 12, '4.jpg', 0),
(5, 'S', 69000, 12, '5.jpg', 12000),
(6, 'S', 65000, 12, '6.jpg', 0),
(7, 'S', 55000, 12, '7.jpg', 12000),
(8, 'S', 59000, 5, '8.jpg', 0),
(9, 'S', 55000, 12, '9.jpg', 0),
(10, 'S', 55000, 4, '10.jpg', 0),
(11, 'S', 55000, 12, '11.jpg', 0),
(12, 'S', 55000, 12, '12.jpg', 12000),
(13, 'S', 59000, 12, '13.jpg', 0),
(14, 'S', 15000, 4, '14.jpg', 2000),
(15, 'S', 45000, 12, '15.jpg', 0),
(16, 'S', 45000, 12, '16.jpg', 10000),
(17, 'S', 45000, 12, '17.jpg', 7000),
(18, 'S', 45000, 12, '18.jpg', 0),
(19, 'S', 65000, 12, '19.jpg', 16000),
(20, 'S', 45000, 12, '20.jpg', 0),
(21, 'S', 29000, 12, '21.jpg', 10000),
(22, 'S', 29000, 12, '22.jpg', 0),
(23, 'S', 29000, 12, '23.jpg', 10000),
(24, 'S', 29000, 12, '24.jpg', 0),
(25, 'S', 35000, 12, '25.jpg', 6000),
(26, '', 35000, 14, '26.jpg', 0),
(27, '', 35000, 4, '27.jpg', 0),
(28, '', 29000, 16, '28.jpg', 0),
(29, '', 29000, 11, '29.jpg', 0),
(30, '', 35000, 12, '30.jpg', 6000),
(31, 'S', 66000, 9, '31.jpg', 7000),
(32, 'S', 69000, 18, '32.jpg', 0),
(33, 'S', 140000, 15, '33.jpg', 11000),
(34, 'S', 58000, 14, '34.jpg', 0),
(35, 'S', 275000, 16, '35.jpg', 16000),
(36, 'S', 59000, 17, '36.jpg', 0),
(37, 'S', 1232, 10, '32.jpg', 123),
(38, 'S', 123000, 10, '34.jpg', 0),
(39, 'S', 0, 10, '', 0),
(40, 'S', 12000, 10, 'people.png', 1000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(83, 5, '2024-02-22', 1559000),
(84, 5, '2024-02-22', 1559000),
(85, 5, '2024-02-22', 1559000),
(86, 5, '2024-02-22', 1559000),
(87, 5, '2024-02-22', 1559000),
(88, 5, '2024-02-22', 1559000),
(89, 5, '2024-02-22', 1559000),
(90, 5, '2024-02-22', 1559000),
(91, 5, '2024-02-22', 1607000),
(92, 5, '2024-02-22', 1607000),
(93, 5, '2024-02-22', 1607000),
(94, 5, '2024-02-22', 1607000),
(95, 5, '2024-02-22', 1607000),
(96, 5, '2024-02-22', 1607000),
(97, 5, '2024-02-22', 1607000),
(98, 5, '2024-02-22', 1607000),
(99, 5, '2024-02-22', 1607000),
(100, 5, '2024-02-22', 1607000),
(101, 5, '2024-02-22', 1607000),
(102, 5, '2024-02-22', 1607000),
(103, 5, '2024-02-22', 1607000),
(104, 5, '2024-02-22', 1607000),
(105, 5, '2024-02-22', 1607000),
(106, 5, '2024-02-22', 1607000),
(107, 5, '2024-02-22', 1607000),
(108, 5, '2024-02-22', 1607000),
(109, 5, '2024-02-22', 1607000),
(110, 5, '2024-02-22', 1607000),
(111, 5, '2024-02-22', 1607000),
(112, 5, '2024-02-22', 1607000),
(113, 5, '2024-02-22', 1607000),
(114, 5, '2024-02-22', 1607000),
(115, 5, '2024-02-22', 1607000),
(116, 5, '2024-02-22', 1607000),
(117, 5, '2024-02-22', 1607000),
(118, 5, '2024-02-22', 1607000),
(119, 5, '2024-02-22', 1607000),
(120, 5, '2024-02-22', 1607000),
(121, 5, '2024-02-22', 1607000),
(122, 5, '2024-02-22', 1607000),
(123, 5, '2024-02-22', 2147000),
(124, 5, '2024-02-22', 2147000),
(125, 5, '2024-02-22', 2147000),
(126, 7, '2024-02-22', 492000),
(127, 5, '2024-02-22', 81000),
(128, 5, '2024-02-22', 256000),
(129, 5, '2024-02-22', 256000),
(130, 5, '2024-02-22', 256000),
(131, 7, '2024-02-24', 65000),
(132, 7, '2024-02-24', 65000),
(133, 5, '2024-02-26', 1040000),
(134, 5, '2024-02-26', 45000),
(135, 5, '2024-02-26', 45000),
(136, 5, '2024-02-26', 45000),
(137, 5, '2024-02-26', 45000),
(138, 5, '2024-02-26', 45000),
(139, 5, '2024-02-26', 45000),
(140, 5, '2024-02-26', 45000),
(141, 5, '2024-02-26', 45000),
(142, 5, '2024-02-26', 45000),
(143, 5, '2024-02-26', 45000),
(144, 5, '2024-02-26', 45000),
(145, 5, '2024-02-26', 45000),
(146, 5, '2024-02-26', 45000),
(147, 5, '2024-02-29', 120000),
(148, 5, '2024-03-20', 1861000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text DEFAULT NULL,
  `sodienthoai` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`) VALUES
(1, 'tú trần', 'tutran', '8f8e2909a8f683c31159ee51d593a642', 'tu@gmail.com', 'hcm', '9090789678'),
(2, 'minh minh', 'minhminh', '8f8e2909a8f683c31159ee51d593a642', 'minh@gmail.com', 'bình định', '90907896789'),
(3, 'teo', 'teoteo', '3ff19fad9f5844248f601ab23381cc88', 'teo123@gmail.com', 'hcm', '9090789698'),
(4, 'ý nhi', 'nhinhi', '87f038af05196e3dfa958a521f6f400e', 'ngvynhi.itc@gmail.com', 'thoại ngọc hầu', '9090789699'),
(5, 'Reviewer', 'qưe', 'bc64bc75036a35e2729b91908990fa9d', 'qwe@ddd.oi', 'lũy bán bích', '113113113'),
(6, 'kha', 'k', 'aa595b31b167f1608d6f25559f813e08', 'qwe@ddd.oi', 'qwe', 'qưe'),
(7, 'qwe', 'qwe', '35606102bb27b1692b9ed93f5910bbf6', 'qwe@ddd.oi', 'qwe', 'qwe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `trangthai`) VALUES
(1, 'Cà Phê', 0),
(2, 'PhinDi', 0),
(3, 'Cà Phê Espresso', 0),
(4, 'Freeze', 0),
(5, 'Freeze Không Cà Phê', 0),
(6, 'Trà Sen Vàng Mới', 0),
(7, 'Trà Thạch Đào', 0),
(8, 'Trà', 0),
(9, 'Trà Thạch Vải', 0),
(10, 'Bánh Ngọt', 0),
(11, 'Merchandise', 0),
(12, 'Khác', 0),
(14, 'hehehe1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int(11) NOT NULL,
  `hoten` varchar(250) NOT NULL,
  `dia` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `matkhau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `hoten`, `dia`, `username`, `matkhau`) VALUES
(1, 'Admin', 'hcm', 'admin', 'bc64bc75036a35e2729b91908990fa9d');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(60) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`, `trangthai`) VALUES
(1, 'PHINDI CHOCO', 1, b'0', 5, '2023-12-10', 'PhinDi Choco - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Choco ngọt tan mang đến hương vị mới lạ, không thể hấp dẫn hơn!', 0),
(2, 'PHINDI KEM SỮA', 1, b'0', 8, '2023-12-10', 'PhinDi Kem Sữa - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Kem Sữa béo ngậy mang đến hương vị mới lạ, không thể hấp dẫn hơn!', 0),
(3, 'BẠC XỈU ĐÁ', 1, b'0', 9, '2023-12-10', 'Nếu Phin Sữa Đá dành cho các bạn đam mê vị đậm đà, thì Bạc Xỉu Đá là một sự lựa chọn nhẹ “đô\" cà phê nhưng vẫn thơm ngon, chất lừ không kém!', 0),
(4, 'CARAMEL MACCHIATO', 1, b'0', 5, '2023-12-10', 'Thỏa mãn cơn thèm ngọt! Ly cà phê Caramel Macchiato bắt đầu từ dòng sữa tươi và lớp bọt sữa béo ngậy, sau đó hòa quyện cùng cà phê espresso đậm đà và sốt caramel ngọt ngào. Thông qua bàn tay điêu luyện của các chuyên gia pha chế, mọi thứ hoàn toàn được nâng tầm thành nghệ thuật! Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 0),
(5, 'MOCHA MACCHIATO', 1, b'0', 5, '2023-12-10', 'Một thức uống yêu thích được kết hợp bởi giữa sốt sô cô la ngọt ngào, sữa tươi và đặc biệt là cà phê espresso đậm đà mang thương hiệu Highlands Coffee. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 0),
(6, 'LATTE', 1, b'0', 5, '2023-12-10', 'Ly cà phê sữa ngọt ngào đến khó quên! Với một chút nhẹ nhàng hơn so với Cappuccino, Latte của chúng tôi bắt đầu với cà phê espresso, sau đó thêm sữa tươi và bọt sữa một cách đầy nghệ thuật. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 0),
(7, 'CLASSIC PHIN FREEZE', 4, b'0', 10, '2023-12-10', 'Thơm ngon đậm đà! Được kết hợp từ cà phê pha Phin truyền thống chỉ có tại Highlands Coffee, cùng với thạch cà phê và đá xay mát lạnh. Trên cùng là lớp kem tươi thơm béo và bột ca cao đậm đà. Món nước hoàn hảo để khởi đầu câu chuyện cùng bạn bè.', 0),
(8, 'FREEZE QUẢ MỌNG ANH ĐÀO', 4, b'0', 6, '2023-12-10', 'Freeze Quả Mọng Anh Đào với kem béo đậm đà, hài hòa cùng vị chua của quả mọng và cherry, thỏa mãn vị giác.', 0),
(9, 'FREEZE TRÀ XANH', 4, b'0', 6, '2023-12-10', 'Thức uống rất được ưa chuộng! Trà xanh thượng hạng từ cao nguyên Việt Nam, kết hợp cùng đá xay, thạch trà dai dai, thơm ngon và một lớp kem dày phủ lên trên vô cùng hấp dẫn. Freeze Trà Xanh thơm ngon, mát lạnh, chinh phục bất cứ ai!', 0),
(10, 'COOKIES & CREAM', 4, b'0', 8, '2023-12-10', 'Một thức uống ngon lạ miệng bởi sự kết hợp hoàn hảo giữa cookies sô cô la giòn xốp cùng hỗn hợp sữa tươi cùng sữa đặc đem say với đá viên, và cuối cùng không thể thiếu được chính là lớp kem whip mềm mịn cùng cookies sô cô la say nhuyễn.', 0),
(11, 'FREEZE SÔ-CÔ-LA', 4, b'0', 10, '2023-12-10', 'Thiên đường đá xay sô cô la! Từ những thanh sô cô la Việt Nam chất lượng được đem xay với đá cho đến khi mềm mịn, sau đó thêm vào thạch sô cô la dai giòn, ở trên được phủ một lớp kem whip beo béo và sốt sô cô la ngọt ngào. Tạo thành Freeze Sô-cô-la ngon mê mẩn chinh phục bất kì ai!', 0),
(12, 'CARAMEL PHIN FREEZE', 4, b'0', 6, '2023-12-10', 'Thơm ngon khó cưỡng! Được kết hợp từ cà phê truyền thống chỉ có tại Highlands Coffee, cùng với caramel, thạch cà phê và đá xay mát lạnh. Trên cùng là lớp kem tươi thơm béo và caramel ngọt ngào. Món nước phù hợp trong những cuộc gặp gỡ bạn bè, bởi sự ngọt ngào thường mang mọi người xích lại gần nhau.', 0),
(13, 'TRÀ QUẢ MỌNG ANH ĐÀO', 8, b'0', 7, '2023-12-10', 'Trà Quả Mọng Anh Đào là sự kết hợp giữa trà thơm cùng quả mọng chua ngọt, thêm đài quả ngâm giòn giòn, đánh tan cơn khát.', 0),
(14, 'TRÀ SEN VÀNG (CỦ NĂNG)', 8, b'0', 7, '2023-12-10', 'Thức uống chinh phục những thực khách khó tính! Sự kết hợp độc đáo giữa trà Ô long, hạt sen thơm bùi và củ năng giòn tan. Thêm vào chút sữa sẽ để vị thêm ngọt ngào.', 0),
(15, 'TRÀ SEN VÀNG (SEN)', 8, b'0', 7, '2023-12-10', 'Thức uống chinh phục những thực khách khó tính! Sự kết hợp độc đáo giữa trà Ô long, hạt sen thơm bùi và củ năng giòn tan. Thêm vào chút sữa sẽ để vị thêm ngọt ngào.', 0),
(16, 'TRÀ XANH ĐẬU ĐỎ', 8, b'0', 7, '2023-12-10', 'Thiên đường đá xay sô cô la! Từ những thanh sô cô la Việt Nam chất lượng được đem xay với đá cho đến khi mềm mịn, sau đó thêm vào thạch sô cô la dai giòn, ở trên được phủ một lớp kem whip beo béo và sốt sô cô la ngọt ngào. Tạo thành Freeze Sô-cô-la ngon mê mẩn chinh phục bất kì ai!', 0),
(17, 'TRÀ THẠCH VẢI', 8, b'0', 7, '2023-12-10', 'Một sự kết hợp thú vị giữa trà đen, những quả vải thơm ngon và thạch giòn khó cưỡng, mang đến thức uống tuyệt hảo!', 0),
(18, 'TRÀ THẠCH ĐÀO', 8, b'0', 7, '2023-12-10', 'Vị trà đậm đà kết hợp cùng những miếng đào thơm ngon mọng nước cùng thạch đào giòn dai. Thêm vào ít sữa để gia tăng vị béo.', 0),
(19, 'CAPPUCCINO', 1, b'0', 10, '2023-12-09', 'Ly cà phê sữa đậm đà thời thượng! Một chút đậm đà hơn so với Latte, Cappuccino của chúng tôi bắt đầu với cà phê espresso, sau đó thêm một lượng tương đương giữa sữa tươi và bọt sữa cho thật hấp dẫn. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 0),
(20, 'AMERICANO', 1, b'0', 10, '2023-12-09', 'Americano tại Highlands Coffee là sự kết hợp giữa cà phê espresso thêm vào nước đun sôi. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 0),
(21, 'ESPRESSO', 1, b'0', 10, '2023-12-09', 'Đích thực là ly cà phê espresso ngon đậm đà! Được chiết xuất một cách hoàn hảo từ loại cà phê rang được phối trộn độc đáo từ những hạt cà phê Robusta và Arabica chất lượng hảo hạng.', 0),
(22, 'PHIN SỮA ĐÁ', 1, b'0', 10, '2023-12-09', 'Hương vị cà phê Việt Nam đích thực! Từng hạt cà phê hảo hạng được chọn bằng tay, phối trộn độc đáo giữa hạt Robusta từ cao nguyên Việt Nam, thêm Arabica thơm lừng. Cà phê được pha từ Phin truyền thống, hoà cùng sữa đặc sánh và thêm vào chút đá tạo nên ly Phin Sữa Đá – Đậm Đà Chất Phin.', 0),
(23, 'PHIN ĐEN ĐÁ', 1, b'0', 10, '2023-12-09', 'Dành cho những tín đồ cà phê đích thực! Hương vị cà phê truyền thống được phối trộn độc đáo tại Highlands. Cà phê đậm đà pha hoàn toàn từ Phin, cho thêm 1 thìa đường, một ít đá viên mát lạnh, tạo nên Phin Đen Đá mang vị cà phê đậm đà chất Phin. ', 0),
(24, 'PHIN ĐEN NÓNG', 1, b'0', 10, '2023-12-09', 'Dành cho những tín đồ cà phê đích thực! Hương vị cà phê truyền thống được phối trộn độc đáo tại Highlands. Cà phê đậm đà pha từ Phin, cho thêm 1 thìa đường, mang đến vị cà phê đậm đà chất Phin. ', 0),
(25, 'BÁNH MOUSSE CACAO', 10, b'0', 10, '2023-12-09', 'Bánh Mousse Ca Cao, là sự kết hợp giữa ca-cao Việt Nam đậm đà cùng kem tươi.', 0),
(26, 'BÁNH MOUSSE ĐÀO', 10, b'0', 10, '2023-12-09', 'Một sự kết hợp khéo léo giữa kem và lớp bánh mềm, được phủ lên trên vài lát đào ngon tuyệt.', 0),
(27, 'BÁNH SÔ-CÔ-LA HIGHLANDS', 10, b'0', 10, '2023-12-09', 'Một chiếc bánh độc đáo! Sô cô la ngọt ngào và kem tươi béo ngậy, được phủ thêm một lớp sô cô la mỏng bên trên cho thêm phần hấp dẫn.', 0),
(28, 'BÁNH PHÔ MAI CÀ PHÊ', 10, b'0', 10, '2023-12-09', 'Làm từ cà phê truyền thống của Highlands, kết hợp với phô mai thơm ngon! Chiếc bánh phù hợp đi cùng với bất cứ món cà phê nào!', 0),
(29, 'BÁNH PHÔ MAI CHANH DÂY', 10, b'0', 10, '2023-12-09', 'Vị béo của phô mai cùng với vị chua của chanh dây, tạo nên chiếc bánh thơm ngon hấp dẫn!', 0),
(30, 'BÁNH CARAMEL PHÔ MAI', 10, b'0', 10, '2023-12-09', 'Ngon khó cưỡng! Bánh phô mai thơm béo được phủ bằng lớp caramel ngọt ngào.', 0),
(31, 'LON CÀ PHÊ ĐEN', 12, b'0', 10, '2023-12-09', 'Với thiết kế lon cao tiện dụng, sang trọng và hương vị đặc trưng từ công thức của Highlands.  Hương vị thơm ngon hấp dẫn.  Sản xuất trên dây chuyền hiện đại.  Dùng trực tiếp và ngon hơn khi ướp lạnh.', 0),
(32, 'LON CÀ PHÊ SỮA', 12, b'0', 10, '2023-12-09', 'Với thiết kế lon cao tiện dụng, sang trọng và hương vị đặc trưng từ công thức của Highlands đã tạo nên sự ưa chuộng và phổ biến hiện nay. Cà phê sữa đá là sự hòa quyện của cà phê rang đặc trưng, sữa và đá, cùng lớp kem béo ngậy. Highlands Coffee tin tưởng đây sẽ là thức uống ngọt ngào nổi bật trong các loại đồ uống bởi dư âm của nó mang lại. Lon nhỏ 185ml tiện lợi khi mang theo bên mình để có thể sử dụng mọi nơi, mọi lúc. Sản xuất trên dây chuyền hiện đại. Dùng trực tiếp, ngon hơn khi ướp lạnh.', 0),
(33, 'CÀ PHÊ HÒA TAN', 12, b'0', 10, '2023-12-09', 'Cà Phê Highlands Coffee 3in1 Hòa Tan túi 50 Gói x 17g Hương vị thơm ngon, đậm đà vị cà phê. Thích hợp cho uống nóng và lạnh. Đường mịn: 40% Bột kem tách bơ: 37% Cà phê hòa tan: 13%, hương liệu tổng hợp Tiện lợi khi sử dụng. Không chỉ dùng trong gia đình mà còn thích hợp làm quà tặng ý nghĩa dành cho người thân, bạn bè và đồng nghiệp.', 0),
(34, 'HỘP CÀ PHÊ HOÀ TAN', 12, b'0', 10, '2023-12-09', 'Cà Phê Highlands Coffee 3in1 Hòa Tan hộp 20 Gói x 17g Hương vị thơm ngon, đậm đà vị cà phê. Thích hợp cho uống nóng và lạnh Đường mịn: 40% Bột kem tách bơ: 37% Cà phê hòa tan: 13%, hương liệu tổng hợp Tiện lợi khi sử dụng. Không chỉ dùng trong gia đình mà còn thích hợp làm quà tặng ý nghĩa dành cho người thân, bạn bè và đồng nghiệp.', 0),
(35, 'TRUYỀN THỐNG 1KG', 12, b'0', 10, '2023-12-09', 'Sự kết hợp hài hòa giữa Arabica và Robusta.  Vị đậm và ngọt đầy.  Là sản phẩm đặc sản của của café Sữa Đá, Café Đá của hệ thống Highlands Coffee.  80% Robusta – 20% Arabica.', 0),
(36, 'TRUYỀN THỐNG 200GR', 12, b'0', 10, '2023-12-09', 'Cà phê truyền thống độc quyền của Highlands! Những hạt cà phê Robusta và Arabica thượng hạng trồng ở vùng cao nguyên của Việt Nam được rang và phối trộn theo công thức độc đáo tại Highlands.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `Idsize` int(11) NOT NULL,
  `size` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`Idsize`, `size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topping`
--

CREATE TABLE `topping` (
  `idtopping` int(11) NOT NULL,
  `tentopping` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `topping`
--

INSERT INTO `topping` (`idtopping`, `tentopping`) VALUES
(1, 'Kem Phô Mai Macchiato'),
(2, 'Hạt Sen'),
(3, 'Thạch Cà Phê'),
(4, 'Trân châu trắng'),
(5, 'Sốt Caramel'),
(6, 'Nha Đam'),
(7, 'Đào Miếng'),
(8, 'Trái Vải');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`mabl`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`masohd`,`masp`);

--
-- Chỉ mục cho bảng `ctsanpham`
--
ALTER TABLE `ctsanpham`
  ADD PRIMARY KEY (`idsanpham`,`idsize`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`Idsize`);

--
-- Chỉ mục cho bảng `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`idtopping`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `ctsanpham`
--
ALTER TABLE `ctsanpham`
  MODIFY `idsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `Idsize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `topping`
--
ALTER TABLE `topping`
  MODIFY `idtopping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
