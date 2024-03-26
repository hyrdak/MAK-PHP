<?php 
    class admin
    {
        function login($username,$matkhau)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="SELECT idnv, hoten, dia FROM nhanvien WHERE username='$username' and matkhau='$matkhau'";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getInstance($select);
            return $result;// lấy được dữ liệu về
        }
    }
?>