<?php
    class sanpham{
        // phương thức hiện thị sản phẩm new
        function getSanPhamNew()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // b2: cần lấy cái gì thì truy vấn cái đó 
            $select="select a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,a.ngaylap from sanpham a,ctsanpham b
            WHERE a.masp=b.idsanpham and a.trangthai=0 ORDER by a.ngaylap DESC LIMIT 8";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSanPhamSale()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,b.giamgia,a.ngaylap from sanpham a, ctsanpham b 
            WHERE a.masp=b.idsanpham and b.giamgia!=0 and a.trangthai=0 ORDER by a.ngaylap DESC LIMIT 4";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSanPhamAll()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,b.giamgia from sanpham a, ctsanpham b 
            WHERE a.masp=b.idsanpham and a.trangthai=0 ORDER by a.masp";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSanPhamAllSale()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,b.giamgia from sanpham a, ctsanpham b
            WHERE a.masp=b.idsanpham and b.giamgia!=0 and a.trangthai=0 ORDER by a.masp";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSanPhamAllPage($start,$limit)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,b.giamgia from sanpham a, ctsanpham b
            WHERE a.masp=b.idsanpham and a.trangthai=0 ORDER by a.masp limit ".$start.",".$limit;
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSanPhamAllSalePage($start,$limit)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,b.giamgia from sanpham a, ctsanpham b 
            WHERE a.masp=b.idsanpham and b.giamgia!=0 and a.trangthai=0 ORDER by a.masp limit ".$start.",".$limit;
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getLoai()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.maloai, a.tenloai from loai a
            WHERE a.maloai=1 OR a.maloai=4 OR a.maloai=8 OR a.maloai=10 OR a.maloai=12 ORDER by a.maloai";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getLoaiTheoID($id)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.maloai from sanpham a
            WHERE a.masp = $id";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSanPhamTheoLoai($chonloai)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select c.maloai,a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,b.giamgia from sanpham a, ctsanpham b, loai c
            WHERE c.maloai=".$chonloai." and a.masp=b.idsanpham and c.maloai=a.maloai and a.trangthai=0 ORDER by a.masp";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSanPhamTheoID($chonid)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select DISTINCT a.masp,a.tensp,a.mota,a.soluotxem,b.hinh,b.dongia,b.giamgia,d.maloai,d.tenloai from sanpham a, ctsanpham b , size c , loai d 
            WHERE a.masp=b.idsanpham and d.maloai=a.maloai and a.masp=".$chonid." and a.trangthai=0 ORDER by a.masp;";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSize()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select DISTINCT a.masp,a.tensp,a.mota,a.soluotxem,b.hinh,b.dongia,b.giamgia,d.maloai,d.tenloai,c.size from sanpham a, ctsanpham b , size c , loai d 
            WHERE a.masp=b.idsanpham and d.maloai=a.maloai and a.masp=1 ORDER by a.masp;";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getToppingTheoID($id)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="SELECT `idtopping`, `tentopping` FROM `topping` WHERE idtopping =".$id;
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getTopping()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="SELECT `idtopping`, `tentopping` FROM `topping` WHERE 1";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function registrationNew($tenkh,$username,$matkhau,$email,$diachi,$sdt)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`) 
            VALUES ('', '".$tenkh."', '".$username."', '".$matkhau."', '".$email."', '".$diachi."', '".$sdt."');";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function login($username,$matkhau)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="SELECT makh, tenkh, email, diachi, sodienthoai FROM khachhang WHERE username='$username' and matkhau='$matkhau'";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getInstance($select);
            return $result;// lấy được dữ liệu về
        }
        function selectTimKiem($tensp, $start, $limit)
        {
            $db=new connect();
            $select="select a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,b.giamgia from sanpham a, ctsanpham b
            WHERE a.masp=b.idsanpham and a.tensp like '%$tensp%' ORDER by a.masp limit $start,$limit";
            //ai thực thi select? query mà query nằm trong pt getlist và getInstance, 2 pt năm trong class connect
            $result=$db->getList($select);
            return $result;
        }
        function getSanPhamAllTheoSearch($tensp)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,b.hinh,b.dongia,b.giamgia from sanpham a, ctsanpham b WHERE and a.trangthai=0 a.masp=b.idsanpham and a.tensp like '%$tensp%' ORDER by a.masp";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
    }
?>