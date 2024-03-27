<?php 
  if(isset($_SESSION['idnv']) )
  {
?>

<body class='container'>
<div class="row bg-white rounded-sm hehe">
<div class="mx-auto mt-4 mb-1"><h3 class="mt-2"><b>SẢN PHẨM ĐÃ XÓA</b></h3></div>
<div class="row col-12">
<span class='ml-5 mb-2'><b>- Cảnh báo:</b> Sau khi "<b>xóa vĩnh viễn</b>" sẽ không thể khôi phục lại sản phẩm!</span>
</div>
  <table class="table rounded-sm mb-5">
    <thead class='rounded-sm'>
      <tr class="table-info rounded-sm ">
        <th style="width: 150px;">Mã sản phẩm</th>
        <th style="width: 150px;">Hình</th>
        <th style="width: 130px;">Tên sản phẩm</th>
        <th style="width: 100px;">Đơn giá</th>
        <th style="width: 100px;">Giảm giá</th>
        <!-- <th>Mã Loại</th> -->
        <th style="width: 73px;">loại</th>
        <!-- <th>Số lượt xem</th> -->
        <th style="width: 130px;">Ngày lập</th>
        <th style="width: 400px;">Mô tả</th>
        <th style="width: 120px;">Khôi phục</th>
        <th style="width: 160px;">Xóa vĩnh viễn</th>
      </tr>
    </thead>
      <?php
        $sp=new sanpham();
        $result=$sp->getSanPhamAll_bin();// view lấy đc dữ liệu là 8 san phẩm

        // đồ dữ liệu lên views
        while($set=$result->fetch()):// $set=array(mahh:24, tenhh: giày....)
      ?>
      <tr>
        <td style="text-align: center;padding-top:33px"><?php echo $set['masp']; ?></td>
        <td><img src="..\/../Content/imgCOFFEE/<?php echo $set['hinh'];?>" width='300%' class="img-fluid" alt=""></td>
        <td><?php echo $set['tensp']; ?></td>
        <td><?php echo $set['dongia']; ?></td>
        <td><?php echo $set['giamgia']; ?></td>
        <!-- <td><?php echo $set['maloai']; ?></td> -->
        <td><?php echo $set['tenloai']; ?></td>
        <!-- <td><?php echo $set['soluotxem']; ?></td> -->
        <td><?php echo $set['ngaylap']; ?></td>
        <td><?php echo $set['mota']; ?></td>
        <td><a href="" data-toggle="modal" data-target="#modelId1">Khôi phục</a></td>
        <td>
          <a href="" class="delete-btn" data-toggle="modal" data-target="#modelId" 
            data-masp="<?php echo $set['masp']; ?>"
            data-hinh="<?php echo $set['hinh']; ?>"
            data-tensp="<?php echo $set['tensp']; ?>"
            data-dongia="<?php echo $set['dongia']; ?>"
            data-giamgia="<?php echo $set['giamgia']; ?>"
            data-loai="<?php echo $set['tenloai']; ?>"
            data-ngaylap="<?php echo $set['ngaylap']; ?>"
            data-mota="<?php echo $set['mota']; ?>"
            >Xóa vĩnh viễn
          </a>
        </td>
      </tr>
<!-- Modal -->
<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Khôi phục sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                <a name="" id="" class="btn btn-primary" href="index.php?action=deletesanpham&act=1&id=<?php echo $set['masp']; ?>" role="button">Khôi phục</a>
            </div>
        </div>
    </div>
</div>
      <?php
        endwhile;
      ?>
    </tbody>
  </table>
  <!--  -->
  <div class="text-center mt-5 mb-1 col-lg-12"><h3 class="mt-2"><b>LOẠI ĐÃ XÓA</b></h3></div>
  <table class="table rounded-sm col-lg-6 mx-auto mt-1 mb-5">
        <thead class='rounded-sm'>
        <tr class="table-info rounded-sm ">
            <th style="width: 150px;">Mã loại</th>
            <th style="width: 220px;">Tên loại</th>
            <th style="width: 157px;">Khôi phục</th>
            <th style="width: 140px;">Xóa vĩnh viễn</th>
        </tr>
        </thead>
        <?php
            $sp=new sanpham();
            $result=$sp->getLoaiAll_bin();// view lấy đc dữ liệu là 8 san phẩm

            // đồ dữ liệu lên views
            while($set=$result->fetch()):// $set=array(mahh:24, tenhh: giày....)
        ?>
        <tr>
            <td><?php echo $set['maloai']; ?></td>
            <td><?php echo $set['tenloai']; ?></td>
            <td>
                <a href="" class="delete-btn" data-toggle="modal" data-target="#modelIdkq<?php echo $set['maloai']; ?>" 
                    >Khôi phục
                </a>
            </td>
            <td>
            <a href="" class="delete-btn" data-toggle="modal" data-target="#modelId<?php echo $set['maloai']; ?>" 
                >Xóa vĩnh viễn
            </a>
            </td>
        </tr>
        <!-- Modal xóa-->
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
                <a href="index.php?action=deleteloai&act=2&id=<?php echo $set['maloai']; ?>"><button type="button" class="btn btn-primary">Xóa</button></a>
            </div>
            </div>
        </div>
        </div>
        <!-- Modal khôi phục -->
        <div class="modal fade" id="modelIdkq<?php echo $set['maloai']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"  >
            <div class="modal-dialog modal-lg" role="document"> <!-- Thay đổi lớp modal-dialog thành modal-lg để làm modal lớn hơn -->
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vui lòng xác nhận!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn khôi phục loại này không?
                    <div class="">
                    <b>Mã loại:</b>
                    <?php echo $set['maloai']; ?>
                    <br><b>Tên loại:</b>
                    <?php echo $set['tenloai']; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    <a href="index.php?action=deleteloai&act=1&id=<?php echo $set['maloai']; ?>"><button type="button" class="btn btn-primary">Khôi phục</button></a>
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
</body>
<?php 
  }
  else
  {
    echo '<script> alert("Vui lòng đăng nhập!"); </script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
  }
?>
<!-- Modal delete -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"  >
  <div class="modal-dialog modal-lg" role="document"> <!-- Thay đổi lớp modal-dialog thành modal-lg để làm modal lớn hơn -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Vui lòng xác nhận!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        Bạn có thực sự muốn xóa sản phẩm này không?
        <div class="">
          <b>Mã sản phẩm:</b>
          <span id="maspToDelete"></span>
          <br><b>Hình:</b><br>
          <img id="hinhToDeleteRemake" width='30%' class="img-fluid" alt="">
          <br><b>Tên sản phẩm:</b>
          <span id="tenspToDelete"></span>
          <br><b>Đơn giá:</b>
          <span id="dongiaToDelete"></span>
          <br><b>Giảm giá:</b>
          <span id="giamgiaToDelete"></span>
          <br><b>Tên loại:</b>
          <span id="loaiToDelete"></span>
          <br><b>Ngày lập:</b>
          <span id="ngaylapToDelete"></span>
          <br><b>Mô tả:</b>
          <span id="motaToDelete"></span>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <a id='buttondelete'><button type="button" class="btn btn-primary">Xóa</button></a>
      </div>
    </div>
  </div>
</div>

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
    var linkD = 'index.php?action=deletesanpham&act=2&id=' + masp;
    document.getElementById('buttondelete').href = linkD;
  });
</script>
