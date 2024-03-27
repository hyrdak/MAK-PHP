
  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="container">
        <div class="mx-auto mt-5">
            <h3 class="mb-3 font-weight-bold" style="color: red;">SẢN PHẨM MỚI NHẤT</h3>
        </div>
        <div class="text-right ml-auto mr-5">
            <a href="index.php?action=sanpham&act=0">
                <span style="color: gray;">Xem chi tiết</span>
            </a>
        </div>
      </div>
      <!--Grid row-->
        <div class="row mt-4 mb-5">
            <?php
                $sp=new sanpham();
                $result=$sp->getSanPhamNew();// view lấy đc dữ liệu là 8 san phẩm

                // đồ dữ liệu lên views
                while($set=$result->fetch()):// $set=array(mahh:24, tenhh: giày....)
            ?>
                <!--Grid column-->
                    <div class="col-lg-3 col-md-4 mb-3 text-left">

                        <div class="view overlay z-depth-1-half">
                            <img src="Content\imgCOFFEE\<?php echo $set['hinh'];?>" width="250px" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                    </div>
                <h5 class="my-4 font-weight-bold" style="color: red;"><?php echo number_format($set['dongia']);?><sup><u>d</u></sup></br>
                </h5>
                <a href="index.php?action=sanphamchitiet&id=<?php echo $set['masp'] ?>">
                    <span><?php echo $set['tensp'];?></span></br></a>
                <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                <h5>Số lượt xem: <?php echo $set['soluotxem'];?></h5>
      
      </div>
        <?php
            endwhile;
        ?>
        </div>

      <!--Grid row-->

  </section>
  <!-- end sản phẩm mới nhất -->
  <!-- sản phẩm khuyến mãi -->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="container">
        <div class="mx-auto mt-5">
            <h3 class="mb-3 font-weight-bold mt-5e" style="color: red;">SẢN PHẨM KHUYẾN MÃI</h3>
        </div>
        <div class="text-right ml-auto mr-5">
            <a href="index.php?action=sanpham&act=1">
            <span style="color: gray;">Xem chi tiết</span>
            </a>
        </div>
      </div>
      <!--Grid row-->
        <div class="row mt-4 mb-5">
        <?php
            $kq=$sp->getSanPhamSale();// lấy đc 4 sản phẩm sale
            // hiển thị 4 sản phẩm sale lên 
            while($set=$kq->fetch()){
        ?>
        <!--Grid column-->  
        <div class="col-lg-3 col-md-4 mb-3 text-left">

            <div class="view overlay z-depth-1-half">
            <img src="Content\imgCOFFEE\<?php echo $set['hinh'];?>" width="250px" class="img-fluid" alt="">
                <div class="mask rgba-white-slight"></div>
            </div>

            <h5 class="my-4 font-weight-bold">
                <font color="red"><?php echo number_format($set['dongia'] - $set['giamgia']); ?><sup><u></u></sup></font>
                <strike><?php echo number_format($set['dongia']); ?></strike><sup><u>d</u></sup>
            </h5>

            <a href="index.php?action=sanphamchitiet&id=<?php echo $set['masp'] ?>">
            <span><?php echo $set['tensp'];?></span></br></a>
            <button class="btn btn-danger" id="may4" value="lap 4">New</button>
            <h5>Số lượt xem: <?php echo $set['soluotxem'];?></h5>

        </div>
        <?php
            }
        ?>
</div>

      <!--Grid row-->

  </section>
  <!-- end sản phẩm khuyến mãi -->