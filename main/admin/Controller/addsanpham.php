<?php
    $act="addsanpham";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'addsanpham':
            include_once "./View/addsanpham.php";
            break;
        case 'sanpham_action':
            // nhận thông tin
            if(isset($_SERVER['REQUEST_METHOD'])=="POST")
            {
                $tensp=$_POST['tensp'];
                $dongia=$_POST['dongia'];
                $giamgia=$_POST['giamgia'];
                $maloai=$_POST['maloai'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                $hinh=$_FILES['image']['name'];
                // đem dữ liệu này lưu vào database
                $sp=new sanpham();
                $check=$sp->insertSanPham($tensp,$dongia,$giamgia,$maloai,$ngaylap,$mota,$hinh);
                uploadImage();
                if($check!==false)
                {
                    echo '<script>alert("Thêm dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=sanpham"/>';
                }
                else
                {
                    echo '<script>alert("Thêm dữ liệu thất bại");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=sanpham"/>';
                }
            }
            break;
        case 'update_action':
            if(isset($_SERVER['REQUEST_METHOD'])=="POST")
            {
                $masp=$_POST['masp'];
                $tensp=$_POST['tensp'];
                $dongia=$_POST['dongia'];
                $giamgia=$_POST['giamgia'];
                $maloai=$_POST['maloai'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                $sp=new sanpham();
                if($_FILES['image']['name']=="")
                {
                    $layhinh=$sp->getSanPhamTheoID($masp);
                    while($set=$layhinh->fetch())
                    {
                        $hinh=$set['hinh'];
                    }
                }
                else
                {
                    $hinh=$_FILES['image']['name'];
                }
                // đem dữ liệu này lưu vào database
                
                $check=$sp->updateSanPham($masp,$tensp,$dongia,$giamgia,$maloai,$ngaylap,$mota,$hinh);
                uploadImage();
                if($check!==false)
                {
                    echo '<script>alert("Update dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=sanpham"/>';
                }
                else
                {
                    echo '<script>alert("Update dữ liệu thất bại");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=sanpham"/>';
                }
            }
            break;
    }
   
?>