<?php 
    class order
    {
        function addHoadon($makh,$ngaydat,$tongtien)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // b2: cần lấy cái gì thì truy vấn cái đó 
            $select="INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES (NULL, '$makh', '$ngaydat', '$tongtien');";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function soHoadon($makh)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // b2: cần lấy cái gì thì truy vấn cái đó
            $select="select a.masohd,a.ngaydat from hoadon a WHERE a.makh=$makh ORDER by a.masohd DESC LIMIT 1";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
    }
?>