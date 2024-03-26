<?php
    $act=0;
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) 
    {
        case '0':
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $sp = new sanpham();
                $kq = $sp->deleteLoai($id);
                if($kq)
                {
                    echo '<script>alert("Đã xóa thành công");</script>';
                    echo '<script>window.location="index.php?action=loai";</script>';
                }
                else
                {
                    echo '<script>alert("Đã xóa thất bại");</script>';
                    echo '<script>window.location="index.php?action=loai";</script>';
                }
            }
            break;
        case '1':
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $sp = new sanpham();
                $kq = $sp->redeleteLoai($id);
                if($kq)
                {
                    echo '<script>alert("Đã khôi phục thành công");</script>';
                    echo '<script>window.location="index.php?action=thungrac";</script>';
                }
                else
                {
                    echo '<script>alert("Đã khôi phục thất bại");</script>';
                    echo '<script>window.location="index.php?action=thungrac";</script>';
                }
            }
            break;
        case '2':
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $sp = new sanpham();
                $kq = $sp->deleteLoaiDatabase($id);
                if($kq)
                {
                    echo '<script>alert("Đã xóa vĩnh viễn");</script>';
                    echo '<script>window.location="index.php?action=thungrac";</script>';
                }
                else
                {
                    echo '<script>alert("Đã xóa thất bại");</script>';
                    echo '<script>window.location="index.php?action=thungrac";</script>';
                }
            }
            break;
    }
?>