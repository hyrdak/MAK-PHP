<?php
    $act=0;
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) 
    {
        case '0':
            include "./View/loai.php";
            break;
        case 'add_loai':
            if(isset($_SERVER['REQUEST_METHOD'])=="POST")
            {
                $tenloai='';
                $tenloai=$_POST['tenloai'];
                $sp = new sanpham();
                $kq = $sp->addLoai($tenloai);
                if($kq)
                {
                    echo '<script>alert("Thêm loại thành công");</script>';
                    echo '<script>window.location="index.php?action=loai";</script>';
                }
                else
                {
                    echo '<script>alert("Thêm loại thất bại");</script>';
                    echo '<script>window.location="index.php?action=loai";</script>';
                }
            }
            break;
        case 'update_loai':
            if(isset($_SERVER['REQUEST_METHOD'])=="POST")
            {
                if(isset($_GET['id']))
                {
                    $tenloai='';
                    $tenloai=$_POST['tenloai'];
                    $id=$_GET['id'];
                    $sp = new sanpham();
                    $kq = $sp->updateLoai($id,$tenloai);
                    if($kq)
                    {
                        echo '<script>alert("Cập nhật loại thành công");</script>';
                        echo '<script>window.location="index.php?action=loai";</script>';
                    }
                    else
                    {
                        echo '<script>alert("Cập nhật loại thất bại");</script>';
                        echo '<script>window.location="index.php?action=loai";</script>';
                    }
                }
            }
            break;
    }
?>