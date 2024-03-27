  <!-- quảng cáo -->
  <?php
    // include "quangcao.php";
  ?>
  <!-- end quảng cáo -->
  
  
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
 

  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!--Grid row-->
      <!-- Heading -->
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h3 class="mb-3 mt-5 font-weight-bold text-center" style="color: red;">
                        <?php if(isset($_GET['act']) && $_GET['act'] == 0){echo 'TẤT CẢ SẢN PHẨM';}?>
                        <?php if(isset($_GET['act']) && $_GET['act'] == 1){echo '<html>TẤT CẢ SẢN PHẨM<br>KHUYẾN MÃI</html>';}?>
                        <?php if(isset($_GET['act']) && $_GET['act'] == 'timkiem'){echo 'SẢN PHẨM TÌM KIẾM';}?>
                    </h3>
                    <br/>
                </div>
            </div>
        </div>
      <!--Grid row-->
      <div class="row">
        <?php
            if(isset($_GET['act']) && $_GET['act'] == 0 || isset($_GET['act']) && $_GET['act'] == 'timkiem'){
                if($_GET['act'] == 0){
                    $sp=new sanpham();
                    $count = $sp->getSanPhamAll()->rowCount();
                    $limit = 8;
                    $trang = new page();
                    $page = $trang->findPage($count, $limit);
                    $start = $trang->findStart($limit);
                    // $result=$sp->getSanPhamAll();
                    $result=$sp->getSanPhamAllPage($start,$limit);
                }
                elseif($_GET['act'] == 'timkiem'){
                    if(isset($_GET["search"]))
                    {
                        $timkiem=$_GET["search"];
                    }
                    $sp=new sanpham();
                    $limit = 8;
                    $count = $sp->getSanPhamAllTheoSearch($timkiem)->rowCount();
                    $trang = new page();
                    $page = $trang->findPage($count, $limit);
                    $start = $trang->findStart($limit);
                    $result=$sp->selectTimKiem($timkiem,$start, $limit);
                }
                // đồ dữ liệu lên views
                while($set=$result->fetch()):
        ?>
        <!--Grid column-->
        <div class="col-lg-3 col-md-4 mb-3 text-left">

            <div class="view overlay z-depth-1-half">
            <img src="Content\imgCOFFEE\<?php echo $set['hinh'];?>" width="250px" class="img-fluid" alt="">
                <div class="mask rgba-white-slight"></div>
            </div>

            <h5 class="my-4 font-weight-bold">
                <font color="red"><?php if($set['giamgia'] != 0){echo number_format($set['dongia'] - $set['giamgia']);}
                    else{echo number_format($set['dongia'] - $set['giamgia'])."<sup><u>d</u></sup>";} ?><sup><u></u></sup></font>
                <strike><?php if($set['giamgia'] != 0){echo number_format($set['dongia'])."<sup><u>d</u></sup>";} ?></strike>
            </h5>

            <a href="index.php?action=sanphamchitiet&id=<?php echo $set['masp'] ?>">
            <span><?php echo $set['tensp'];?></span></br></a>
            <button class="btn btn-danger" id="may4" value="lap 4">New</button>
            <h5>Số lượt xem: <?php echo $set['soluotxem'];?></h5>

        </div>
        <?php
                endwhile;
            }
            else{
                // $sp=new sanpham();
                // $result=$sp->getSanPhamAllSale();
                // // đồ dữ liệu lên views
                // while($set=$result->fetch()):
            //
                $sp=new sanpham();
                $count = $sp->getSanPhamAllSale()->rowCount();
                $limit = 8;
                $trang = new page();
                $page = $trang->findPage($count, $limit);
                $start = $trang->findStart($limit);
            // 
                // $result=$sp->getSanPhamAll();
                $result=$sp->getSanPhamAllSalePage($start,$limit);
                // đồ dữ liệu lên views
                while($set=$result->fetch()):
        ?>
        <!--Grid column-->
        <div class="col-lg-3 col-md-4 mb-3 text-left">

            <div class="view overlay z-depth-1-half">
            <img src="Content\imgCOFFEE\<?php echo $set['hinh'];?>" width="250px" class="img-fluid" alt="">
                <div class="mask rgba-white-slight"></div>
            </div>

            <h5 class="my-4 font-weight-bold">
                <font color="red"><?php if($set['giamgia'] != 0){echo number_format($set['dongia'] - $set['giamgia']);}
                    else{echo number_format($set['dongia'] - $set['giamgia'])."<sup><u>d</u></sup>";} ?><sup><u></u></sup></font>
                <strike><?php if($set['giamgia'] != 0){echo number_format($set['dongia'])."<sup><u>d</u></sup>";} ?></strike>
            </h5>

            <a href="index.php?action=sanphamchitiet&id=<?php echo $set['masp'] ?>">
            <span><?php echo $set['tensp'];?></span></br></a>
            <button class="btn btn-danger" id="may4" value="lap 4">New</button>
            <h5>Số lượt xem: <?php echo $set['soluotxem'];?></h5>

        </div>
        <?php
                endwhile;
            }
        ?>
      <!--Grid row-->

  </section>
 
  
  <!-- end sản phẩm mới nhất -->

  <!-- hiển thị số trang -->
    <?php
        if(isset($_GET['act']) && $_GET['act'] == 0)
        {
    ?>
        <div class="mx-auto mt-3">
                <ul class="pagination">
                    <?php
                        // lầy giá trị trang hiện tại
                        $current_page=(isset($_GET['page'])?$_GET['page']:1);
                    ?>
                    <li ><a href="index.php?action=sanpham&act=0&page=<?php echo $current_page-1 ?>" 
                        <?php if($current_page>1 && $page>1){}else{echo "style='background:#e8ecec; pointer-events: none;'";} ?> >Prev</a>
                    </li>
                    <?php
                        for($i=1;$i<=$page; $i++){
                    ?> 
                    <li>
                        <a href="index.php?action=sanpham&act=0&page=<?php echo $i;?>"
                            <?php 
                                if($current_page == $i)
                                {
                                    echo "style='background:#e8ecec; pointer-events: none;'";
                                }
                            ?>>
                            <?php echo $i;?>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <li ><a href="index.php?action=sanpham&act=0&page=<?php echo $current_page+1 ?>" 
                        <?php if($current_page<$page && $page>1){}else{echo "style='background:#e8ecec; pointer-events: none;'";} ?> >Next</a>
                    </li>
                </ul>
        </div>
    <?php
        }elseif(isset($_GET['act']) && $_GET['act'] == 1)
        {
    ?>
        <div class="mx-auto mt-3">
            <ul class="pagination">
                <?php
                    // lầy giá trị trang hiện tại
                    $current_page=(isset($_GET['page'])?$_GET['page']:1);
                ?>
                <li>
                    <a href="index.php?action=sanpham&act=1&page=<?php echo $current_page-1 ?>" 
                    <?php if($current_page>1 && $page>1){}else{echo "style='background:#e8ecec; pointer-events: none;'";} ?> >Prev</a>
                </li>
                <?php
                    for($i=1;$i<=$page; $i++){
                ?>
                <li>
                    <a href="index.php?action=sanpham&act=1&page=<?php echo $i;?>"
                        <?php 
                            if($current_page == $i)
                            {
                                echo "style='background:#e8ecec; pointer-events: none;'";
                            }
                        ?>>
                        <?php echo $i;?>
                    </a>
                </li>
                <?php
                    }
                ?>
                <li><a href="index.php?action=sanpham&act=1&page=<?php echo $current_page+1 ?>"
                    <?php if($current_page<$page && $page>1){}else{echo "style='background:#e8ecec; pointer-events: none;'";} ?> >Next</a>
                </li>
            </ul>
        </div>
    <?php
        }
        elseif(isset($_GET['act']) && $_GET['act'] == 'timkiem')
        {
    ?>
        <div class="mx-auto mt-3">
                <ul class="pagination">
                    <?php
                        // lầy giá trị trang hiện tại
                        $current_page=(isset($_GET['page'])?$_GET['page']:1);
                    ?>
                    <li ><a href="index.php?action=sanpham&act=timkiem&search=<?php echo $_GET["search"]; ?>&page=<?php echo $current_page-1 ?>" 
                        <?php if($current_page>1 && $page>1){}else{echo "style='background:#e8ecec; pointer-events: none;'";} ?> >Prev</a>
                    </li>
                    <?php
                        for($i=1;$i<=$page; $i++){
                    ?> 
                    <li>
                        <a href="index.php?action=sanpham&act=timkiem&search=<?php echo $_GET["search"]; ?>&page=<?php echo $i;?>"
                            <?php 
                                if($current_page == $i)
                                {
                                    echo "style='background:#e8ecec; pointer-events: none;'";
                                }
                            ?>>
                            <?php echo $i;?>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <li ><a href="index.php?action=sanpham&act=timkiem&search=<?php echo $_GET["search"]; ?>&page=<?php echo $current_page+1 ?>" 
                        <?php if($current_page<$page && $page>1){}else{echo "style='background:#e8ecec; pointer-events: none;'";} ?> >Next</a>
                    </li>
                </ul>
        </div>
    <?php
        }
    ?>
<style>
    .pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}
</style>