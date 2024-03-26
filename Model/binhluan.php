<?php 
    class binhluan
    {
        function getCommentTheoID($id)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="SELECT b.tenkh,a.content,a.luotthich,a.rating FROM khachhang b , comment a WHERE a.idkh=b.makh AND a.idsanpham=$id";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
        function addComment($idkh,$idsanpham,$content,$rating)
        {
            //B1: kết nối đc với dữ liệu
            $db=new connect();
            // 62: cần lấy cái gì thì truy vấn cái đó
            $select="INSERT INTO `comment` (`idcomment`, `idkh`, `idsanpham`, `content`, `luotthich`, `rating`) VALUES (NULL, '$idkh', '$idsanpham', '$content', '0', '$rating');";
            //63: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
            $result=$db->getList($select);
            return $result;// lấy được dữ liệu về
        }
    }
?>