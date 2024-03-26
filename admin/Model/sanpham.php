<?php 
    class sanpham
    {
        function getSanPhamAll()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,a.ngaylap,a.maloai,a.mota,b.hinh,b.dongia,b.giamgia,c.tenloai from sanpham a, ctsanpham b, loai c
            WHERE a.masp=b.idsanpham and c.maloai=a.maloai and a.trangthai=0 ORDER by a.masp";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getSanPhamTheoID($id)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,a.ngaylap,a.maloai,a.mota,b.hinh,b.dongia,b.giamgia,c.tenloai from sanpham a, ctsanpham b, loai c
            WHERE a.masp=b.idsanpham and c.maloai=a.maloai and a.masp=$id ORDER by a.masp";
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
        function getLoaiAll()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="SELECT * FROM `loai` WHERE `trangthai` = 0";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getLoaiAll_bin()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="SELECT * FROM `loai` WHERE `trangthai` = 1";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function getLoaiTheoID($id)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="SELECT * FROM `loai` WHERE maloai = $id";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function updateSanPham($masp,$tensp,$dongia,$giamgia,$maloai,$ngaylap,$mota,$hinh)
        {
            $db=new connect();
            $query="update sanpham
            set tensp='$tensp',maloai=$maloai,ngaylap='$ngaylap',mota='$mota'
            where masp=$masp";
            $query1="update ctsanpham
            set dongia=$dongia, giamgia=$giamgia, hinh='$hinh'
            where idsanpham=$masp";
            $result=$db->exec($query);
            $result1=$db->exec($query1);
            return $result;
        }
        function insertSanPham($tensp,$dongia,$giamgia,$maloai,$ngaylap,$mota,$hinh)
        {
            $db=new connect();
            //auto id
            $kq=new sanpham();
            $id=$kq->getID_AUTO();
            //insert vao bang san pham
            $query="INSERT INTO `sanpham` (`masp`, `tensp`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`) 
            VALUES ('$id', '$tensp', '$maloai', 0, 10, '$ngaylap', '$mota');";
            $result=$db->exec($query);
            //insert vao bang ct san pham
            $query1="INSERT INTO `ctsanpham` (`idsanpham`, `idsize`, `dongia`, `soluongton`, `hinh`, `giamgia`) 
            VALUES ('$id', 'S', '$dongia', '10', '$hinh', '$giamgia');";
            $result1=$db->exec($query1);
            //return
            return $result1;
        }
        function getID_AUTO()
        {
            $db=new connect();
            $query='SELECT MAX(masp)+1 FROM `sanpham` WHERE  1;';
            $result=$db->getList($query);
            while($set=$result->fetch())
            {
                $id = $set['MAX(masp)+1'];
            }
            return $id;
        }
        function deleteSanPham($masp)
        {
            $db=new connect();
            $query="UPDATE `sanpham` SET `trangthai` = '1' WHERE `sanpham`.`masp` = $masp";
            $result=$db->exec($query);
            return $result;
        }
        function deleteLoai($maloai)
        {
            $db=new connect();
            $query="UPDATE `loai` SET `trangthai` = '1' WHERE `maloai` = $maloai";
            $result=$db->exec($query);
            return $result;
        }
        function addLoai($tenloai)
        {
            $db=new connect();
            //auto id
            $kq=new sanpham();
            $id=$kq->getID_AUTO_loai();
            //insert vao bang
            $query="INSERT INTO `loai` (`maloai`, `tenloai`, `trangthai`) VALUES ('$id', '$tenloai', '0');";
            $result=$db->exec($query);
            return $result;
        }
        function getID_AUTO_loai()
        {
            $db=new connect();
            $query='SELECT MAX(maloai)+1 FROM `loai` WHERE  1;';
            $result=$db->getList($query);
            while($set=$result->fetch())
            {
                $id = $set['MAX(maloai)+1'];
            }
            return $id;
        }
        function updateLoai($id,$tenloai)
        {
            $db=new connect();
            $query="UPDATE `loai` SET `tenloai` = '$tenloai' WHERE `loai`.`maloai` = $id;";
            $result=$db->exec($query);
            return $result;
        }
        function redeleteSanPham($masp)
        {
            $db=new connect();
            $query="UPDATE `sanpham` SET `trangthai` = '0' WHERE `sanpham`.`masp` = $masp";
            $result=$db->exec($query);
            return $result;
        }
        function redeleteLoai($maloai)
        {
            $db=new connect();
            $query="UPDATE `loai` SET `trangthai` = '0' WHERE `maloai` = $maloai";
            $result=$db->exec($query);
            return $result;
        }
        function getSanPhamAll_bin()
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masp,a.tensp,a.soluotxem,a.ngaylap,a.maloai,a.mota,b.hinh,b.dongia,b.giamgia,c.tenloai from sanpham a, ctsanpham b, loai c
            WHERE a.masp=b.idsanpham and c.maloai=a.maloai and a.trangthai=1 ORDER by a.masp";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function deleteSanPhamDatabase($masp)
        {
            $db=new connect();
            $query="DELETE FROM sanpham WHERE `sanpham`.`masp` = $masp";
            $query1="DELETE FROM ctsanpham WHERE `ctsanpham`.`idsanpham` = $masp AND `ctsanpham`.`idsize` = 'S'";
            $result=$db->exec($query);
            $result1=$db->exec($query1);
            return $result;
        }
        function deleteLoaiDatabase($maloai)
        {
            $db=new connect();
            $query="DELETE FROM `loai` WHERE `loai`.`maloai` = $maloai";
            $result=$db->exec($query);
            return $result;
        }
    }
?>