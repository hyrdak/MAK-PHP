<?php 
  if(isset($_SESSION['idnv']) )
  {
?>

<body class='container'>
<div class="row bg-white rounded-sm hehe">
<div class="mx-auto mt-4 mb-1"><h3 class="mt-3 mb-4"><b>DANH SÁCH LOẠI</b></h3></div>
<div class="row col-12">
    <div class="container">
    <div class="container">
    <div class="container">
    <div class="container">
    <div class="container">
    <div class="container row">
        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $kq = new sanpham();
                $result = $kq->getLoaiTheoID($id);
                while($set=$result->fetch()):
        ?>
        <div class="col-lg-4 mr-auto ml-5">
            <form action="index.php?action=loai&act=update_loai&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <span class='text-center'><h4><b>Chỉnh sửa loại</b></h4></span>
                    <label for="">Mã loại</label>
                    <input type="text"
                    class="form-control" name="id" value="<?php echo $id ?>" id="" aria-describedby="helpId" placeholder="" disabled>
                    <label for="" class='mt-3'>Tên loại</label>
                    <input type="text"
                    class="form-control" name="tenloai" value="<?php echo $set['tenloai'] ?>" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
                <div class="mt-5">
                    <div class="mt-5">
                        <div class="mt-5">
                        <div class="mt-5">
                            <a name="" id="" style="width: 290px;" class="btn btn-primary mt-5 mr-2" href="index.php?action=loai" role="button">Thêm loại</a>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php 
                endwhile;
            }
            else
            {
        ?>
        <div class="col-lg-4 mr-auto ml-5">
            <form action="index.php?action=loai&act=add_loai" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <span class='text-center'><h4><b>Thêm loại</b></h4></span>
                    <label for="">Mã loại</label>
                    <input type="text"
                    class="form-control" name="" disabled value="<?php $kq=new sanpham();echo $id=$kq->getID_AUTO_loai(); ?>" id="" aria-describedby="helpId" placeholder="">
                    <label for="" class='mt-3'>Tên loại</label>
                    <input type="text"
                    class="form-control" name="tenloai" id="" aria-describedby="helpId" placeholder="">
                    
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
        <?php 
            }
        ?>
        <table class="table rounded-sm ml-auto mr-5 col-lg-6">
            <thead class='rounded-sm'>
            <tr class="table-info rounded-sm ">
                <th style="width: 150px;">Mã loại</th>
                <th style="width: 220px;">Tên loại</th>
                <th style="width: 157px;">Cập nhật</th>
                <th style="width: 120px;">Xóa</th>
            </tr>
            </thead>
            <?php
                $sp=new sanpham();
                $result=$sp->getLoaiAll();// view lấy đc dữ liệu là 8 san phẩm

                // đồ dữ liệu lên views
                while($set=$result->fetch()):// $set=array(mahh:24, tenhh: giày....)
            ?>
            <tr>
                <td><?php echo $set['maloai']; ?></td>
                <td><?php echo $set['tenloai']; ?></td>
                <td><a href="index.php?action=loai&id=<?php echo $set['maloai']; ?>">Cập nhật</a></td>
                <td>
                <a href="" class="delete-btn" data-toggle="modal" data-target="#modelId<?php echo $set['maloai']; ?>" 
                    >Xóa
                </a>
                </td>
            </tr>
            <!-- Modal xóa -->
            <div class="modal fade" id="modelId<?php echo $set['maloai']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"  >
            <div class="modal-dialog modal-lg" role="document"> <!-- Thay đổi lớp modal-dialog thành modal-lg để làm modal lớn hơn -->
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vui lòng xác nhận!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xóa loại này không?
                    <div class="">
                    <b>Mã loại:</b>
                    <?php echo $set['maloai']; ?>
                    <br><b>Tên loại:</b>
                    <?php echo $set['tenloai']; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    <a href="index.php?action=deleteloai&act=0&id=<?php echo $set['maloai']; ?>"><button type="button" class="btn btn-primary">Xóa</button></a>
                </div>
                </div>
            </div>
            </div>
            
            <?php
                endwhile;
            ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
</body>
<?php 
  }
  else
  {
    echo '<script> alert("Vui lòng đăng nhập!"); </script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
  }
?>



<script>
  // Xử lý sự kiện khi nút "Xóa" được nhấp
  $(document).on("click", ".delete-btn", function () {
    var masp = $(this).data('masp'); // Lấy giá trị mã sản phẩm từ thuộc tính data-masp
    var hinh = $(this).data('hinh'); // Lấy giá trị hình ảnh từ thuộc tính data-hinh
    var tensp = $(this).data('tensp'); // Lấy giá trị tên sản phẩm từ thuộc tính data-tensp
    var dongia = $(this).data('dongia'); // Lấy giá trị đơn giá từ thuộc tính data-dongia
    var giamgia = $(this).data('giamgia');
    var loai = $(this).data('loai');
    var ngaylap = $(this).data('ngaylap');
    var mota = $(this).data('mota');
    $("#maspToDelete").text(masp); // Đặt giá trị mã sản phẩm vào modal
    $("#tenspToDelete").text(tensp); // Đặt giá trị tên sản phẩm vào modal
    $("#dongiaToDelete").text(dongia); // Đặt giá trị đơn giá vào modal
    $("#giamgiaToDelete").text(giamgia); // Đặt giá trị giảm giá vào modal
    $("#loaiToDelete").text(loai); // Đặt giá trị loại vào modal
    $("#ngaylapToDelete").text(ngaylap); // Đặt giá trị ngày lập vào modal
    $("#motaToDelete").text(mota); // Đặt giá trị mô tả vào modal
    //hình
    var imagePath = "..\\//..//Content//imgCOFFEE//" + hinh;
    document.getElementById('hinhToDeleteRemake').src = imagePath;
    var linkD = 'index.php?action=deletesanpham&act=0&id=' + masp;
    document.getElementById('buttondelete').href = linkD;
  });
</script>
