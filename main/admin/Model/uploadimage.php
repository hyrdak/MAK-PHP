<?php
    function uploadImage()
    {
        // thiết lập đuoèng dẫn chứa hình
        $target_dir="../Content/imgCOFFEE/";
        // lấy hình về và để vào trong đường dẫn thiết lập
        //$target_file=../../DuAnMau/Content/imagetourdien/hoa.jpg
        $target_file=$target_dir.basename($_FILES['image']['name']);
        // lấy phần mở rộng của hình ra
        $imagefileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Kiểm tra xem hình đó có được upload lên server hay không
        $upload=1;
        if(isset($_POST['submit']))
        {
            $check=getimagesize($_FILES['image']['tmp_name']);
            // $check=$_FILES['image']['size']
            if($check!==false)
            {
                $upload=1;
            }
            else
            {
                $upload=0;
            }
        }
        // kiểm tra xem hình đó có tồn tại trong thư mục hình chưa
        if(file_exists($target_file))
        {
            // echo '<script>alert("Hình đã tồn tại");</script>';
            $upload=0;
        }
        // kiểm tra hình có vượt quá dung lượng hay không 1000kb=1000000b
        if($_FILES['image']['size']>1000000)
        {
            echo '<script>alert("Hình vượt quá dung lượng");</script>';
            $upload=0;
        }
        if($upload==1)
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
            {
                echo '<script>alert("Upload hình thành công");</script>';
            }
            else
            {
                echo '<script>alert("Upload hình thất bại");</script>';
            }
        }
    }
?>