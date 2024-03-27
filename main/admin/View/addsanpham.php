<?php 
  if(isset($_SESSION['idnv']) )
  {
    if(isset($_GET['id']))
    {
        $sp = new sanpham();
        $kq = $sp->getSanPhamTheoID($_GET['id']);
        while($set=$kq->fetch())
        {
?>
                
                
                
                
<!--  -->
<form action="index.php?action=addsanpham&act=update_action" method="post" enctype="multipart/form-data">
<div class="container bg-white" style='padding-bottom:50px;padding-top:30px'>
<div style="text-align: center;" class='mb-4'><h3 ><b>CHỈNH SỬA SẢN PHẨM</b></h3></div>
<div class="container">
<div class="container">
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div>
                <span style="padding-top: 15px;">Hình</span><br>
                <span>
                    <label>
                        <img id="previewImage" width="270px" height="270px" src="..\/../Content/imgCOFFEE/<?php echo $set['hinh'];?>">
                    </label>
                    <br>Chọn file để upload:
                    <input class="ml-2" type="file" name="image" id="fileupload" accept="image/*">
                </span>
            </div>
        </div>
        <div class="col-lg-8 row" style="height: 0px;">
            <div class="col-lg-12 row">
                <div class="col-lg-3">
                    <span>Mã hàng</span>
                    <span><input type="text" class="form-control" name="masp" value="<?php echo $set['masp']; ?>" readonly/></span>
                </div>
                <div class="col-lg-9">
                    <span>Tên hàng</span>
                    <span><input type="text" class="form-control" name="tensp" value="<?php echo $set['tensp']; ?>" maxlength="100px"></span>
                </div>
                <div class="col-lg-6 mt-4">
                    <span>Đơn giá</span>
                    <span><input type="number" class="form-control" name="dongia" value="<?php echo $set['dongia']; ?>"></span>
                </div>
                <div class="col-lg-6 mt-4">
                    <span>Giảm giá</span>
                    <span><input type="number" class="form-control" name="giamgia" value="<?php echo $set['giamgia']; ?>"></span>
                </div>
            </div>
            <div class="col-lg-12 row" style="height: 170px;">
                <div class="col-lg-3 mt-4">
                    <span style="padding-top: 15px;">Mã loại</span>
                    <span>
                        <select name="maloai" class="form-control" style="width:150px;">
                            <option value="<?php echo $set['maloai']; ?>"><?php echo $set['tenloai']; ?></option>
                            <?php
                                $sp=new sanpham();
                                $kq=$sp->getLoai();// lấy đc 4 sản phẩm sale
                                // hiển thị 4 sản phẩm sale lên 
                                while($set1=$kq->fetch()){
                            ?>
                                <option value="<?php echo $set1['maloai']?>" 
                                <?php if($set1['maloai']==$set['maloai']){echo'hidden';} ?>
                                ><?php echo $set1['tenloai'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </span>
                </div>
                <div class="col-lg-9 mt-4">
                    <span>Ngày lập</span>
                    <span><input type="date" class="form-control" name="ngaylap" value='<?php echo $set['ngaylap']; ?>'></span>
                </div>
                <div class="col-lg-12 mt-4">
                    <span>Mô tả</span>
                    <span>
                    <textarea class="form-control " style="width:605px;height:100px; font-size:16px;" 
                        class="input-field mt-2 mb-2" type="text" name="mota" rows="2" cols="100" maxlength="197"
                    ><?php echo $set['mota']; ?></textarea>
                    </span>
                </div>
            </div>
        </div>
        <div class="mx-auto mt-5">
            <input type="submit" class="btn btn-info" value='  Chỉnh sửa  '>
        </div>
    </div>
</div>
</div>
</div>
</div>
</form>
<!--  -->
<?php
        }
    }
    else
    {
?>
<form action="index.php?action=addsanpham&act=sanpham_action" method="post" enctype="multipart/form-data">
<div class="container bg-white" style='padding-bottom:50px;padding-top:30px'>
<div style="text-align: center;" class='mb-4'><h3 ><b>THÊM SẢN PHẨM</b></h3></div>
<div class="container">
<div class="container">
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div>
                <span style="padding-top: 15px;">Hình</span><br>
                <span>
                    <label>
                        <img id="previewImage" width="270px" height="270px" src="">
                    </label>
                    <br>Chọn file để upload:
                    <input class="ml-2" type="file" name="image" id="fileupload" accept="image/*">
                </span>
            </div>
        </div>
        <div class="col-lg-8 row" style="height: 0px;">
            <div class="col-lg-12 row">
                <div class="col-lg-3">
                    <span>Mã hàng</span>
                    <span><input type="text" class="form-control" value="<?php $kq=new sanpham();echo $id=$kq->getID_AUTO(); ?>" readonly/></span>
                </div>
                <div class="col-lg-9">
                    <span>Tên hàng</span>
                    <span><input type="text" class="form-control" name="tensp" value=""  maxlength="100px"></span>
                </div>
                <div class="col-lg-6 mt-4">
                    <span>Đơn giá</span>
                    <span><input type="text" class="form-control" name="dongia" ></span>
                </div>
                <div class="col-lg-6 mt-4">
                    <span>Giảm giá</span>
                    <span><input type="text" class="form-control" name="giamgia" ></span>
                </div>
            </div>
            <div class="col-lg-12 row" style="height: 170px;">
                <div class="col-lg-3 mt-4">
                    <span>Mã loại</span>
                    <span>
                        <select name="maloai" class="form-control" style="width:150px;">
                            <?php
                                $sp=new sanpham();
                                $kq=$sp->getLoai();// lấy đc 4 sản phẩm sale
                                // hiển thị 4 sản phẩm sale lên 
                                while($set=$kq->fetch()){
                            ?>
                                <option class="form-control" value="<?php echo $set['maloai']?>"><?php echo $set['tenloai'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </span>
                </div>
                <div class="col-lg-9 mt-4">
                    <span>Ngày lập</span>
                    <span><input type="date" class="form-control" name="ngaylap"></span>
                </div>
                <div class="col-lg-12 mt-4">
                    <span>Mô tả</span>
                    <span>
                    <textarea class="form-control " style="width:605px;height:100px; font-size:16px;" 
                        class="input-field mt-2 mb-2" type="text" name="mota" rows="2" cols="100" maxlength="197"
                    ></textarea>
                    </span>
                </div>
            </div>
        </div>
        <div class="mx-auto mt-5">
            <input type="submit" class="btn btn-info" value='  Thêm  '>
        </div>
    </div>
</div>
</div>
</div>
</div>
</form>
<?php
    }
  }
  else
  {
    echo '<script> alert("Vui lòng đăng nhập!"); </script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
  }
?>
<script>
    document.getElementById('fileupload').addEventListener('change', function(event) {
        var file = event.target.files[0]; // Lấy tệp đã chọn từ sự kiện change
        if (file) {
            var reader = new FileReader(); // Tạo đối tượng FileReader để đọc tệp
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result; // Hiển thị hình ảnh trên label
            };
            reader.readAsDataURL(file); // Đọc tệp và chuyển đổi thành một đường dẫn dạng URL dữ liệu
        } else {
            // Nếu không có tệp nào được chọn, có thể hiển thị một hình ảnh mặc định hoặc xóa hình ảnh hiện có trên label
            document.getElementById('previewImage').src = '';
        }
    });
</script>