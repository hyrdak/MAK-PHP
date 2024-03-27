<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h4 class="font-weight-bold text-center" style="color: red;">CHI TIẾT SẢN PHẨM</h4>
        </div>
    </div>
</div>
<article class="col-12">
<!-- <div class="card"> -->
<div class="container-fliud">
    <div class="wrapper row">
        <?php
            $sp=new sanpham();
            if(isset($_GET['id']))
            { 
                $id=$_GET['id'];
            }
            $result=$sp->getSanPhamTheoID($id);// view lấy đc dữ liệu là 8 san phẩm
            // đồ dữ liệu lên views
            while($set=$result->fetch()):// $set=array(mahh:24, tenhh: giày....)
        ?>
        <form action="index.php?action=sanphamchitiet&id=<?php echo $id; ?>" method="post">
            <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->
            <div class="row">
                <div class="tab-content col-lg-6">
                    <!-- <div class="tab-pane active" id=""> -->
                        <img src="Content\imgCOFFEE\<?php echo $set['hinh'];?>" class="img-fluid" alt="">
                    <!-- </div> -->
                    <div class="container">
                        <div class="container">
                            <div class="container">
                                <div class="container">
                                    <ul class="preview-thumbnail nav nav-tabs"><h4><b>Mô tả</b></h4></ul>
                                        <span style="font-size:16px;"><?php echo $set['mota'];?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="details col-lg-6 ">
                        <h3 class="font-weight-bold mt-5 mb-3"><?php echo $set['tensp'];?></h3>
                    <!-- <h3 class="product-title"> </h3> -->
                    <!-- <div class="rating"> -->
                        <div class="stars mb-2"> 
                            <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span></span> <span class="fa fa-star"></span>
                        </div>
                    <!-- </div> -->
                    <span class="font-weight-bold">
                        <span class="price" style="font-size:18px;">Giá bán:</span>
                        <!-- truyền giá vào script -->
                        <input type="text" id='giagoc' value='<?php echo $set['dongia'];?>' hidden>
                        <input type="text" id='gia' value='<?php echo $set['dongia'] - $set['giamgia']; ?>' hidden>
                        <!-- truyền giá từ script vào php (sau submit) -->
                        <input type="text" name="thanhtien" id="htgiaT" hidden>
                        <input type="text" name="thanhtiengoc" id="htgiagocT" hidden>
                        <!-- hiển thị giá -->
                        <font id="htgia" style="font-size:20px;" class='ml-1 mt-5 ' color="red"><?php if($set['giamgia'] != 0){echo number_format($set['dongia'] - $set['giamgia']);}
                            else{echo number_format($set['dongia'] - $set['giamgia'])." VNĐ";} ?></font>
                        <?php
                            if($set['giamgia'] != 0)
                            {
                        ?>
                            <strike id='htgiagoc' style="font-size:20px;"><?php if($set['giamgia'] != 0){echo number_format($set['dongia'])." VNĐ";} ?></strike>
                        <?php
                            }
                            else
                            {
                        ?>
                            <strike id='htgiagoc' style="font-size:20px;" hidden><?php if($set['giamgia'] != 0){echo number_format($set['dongia'])." VNĐ";} ?></strike >
                        <?php
                            }
                        ?>
                    </span>
                    <h5 class="colors font-weight-bold">
            <?php
                endwhile;
                $sp=new sanpham();
                if(isset($_GET['id']))
                { 
                    $id=$_GET['id'];
                }
                $result=$sp->getLoaiTheoID($id);
                while($set=$result->fetch())
                {
                    $check = $set['maloai'];
                }
                $check = $check+0;
                if($check == 10 || $check == 12)
                {
            ?>
                <input name="sizee"  id="" value='emty' hidden>
                <input name="sizee"  id="" value='emty' hidden>
            <?php
                }
                else
                {
            ?>
                    <div style="padding-bottom: 10px;padding-top: 15px;font-size:15px;">Size:</div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <?php
                                
                                $sp=new sanpham();
                                $result=$sp->getSize();// view lấy đc dữ liệu là 8 san phẩm
                                // đồ dữ liệu lên views
                                while($set=$result->fetch()):// $set=array(mahh:24, tenhh: giày....)
                            ?>
                            <span class="btn-group-toggle" >
                                <label
                                    onclick='review(<?php echo "`".$set["size"]."`"; ?>)' 
                                    class="btn btn-info mr-2 mb-4 <?php if($set['size'] == "S"){echo 'active';}?>"
                                    style="width:140px;height:44px;"
                                >
                                    <input 
                                        type="radio"
                                        name="sizee" 
                                        autocomplete="off"
                                        <?php
                                                if($set['size'] == "S")
                                                {
                                                    echo 'checked';
                                                }
                                        ?>
                                        value="<?php echo $set['size'];?>">
                                    <div style="font-size:15px;padding-top: 4px;">
                                        <?php
                                            if($set['size']=="S")
                                            {
                                                echo $set['size']." + 0 vnđ";
                                            }
                                            elseif($set['size']=="M")
                                            {
                                                echo $set['size']." + 6.000 vnđ";
                                            }
                                            else
                                            {
                                                echo $set['size']." + 10.000 vnđ";
                                            }
                                        ?>
                                    </div>
                                </label>
                            </span>
                            <?php
                                endwhile;
                            ?>
                        </div>
                            
                        </select>
                        <div style="padding-bottom: 10px;font-size:15px;">Topping:</div>
                        
                        <?php
                            $sp=new sanpham();
                            $result=$sp->getTopping();// view lấy đc dữ liệu là 8 san phẩm
                            // đồ dữ liệu lên views
                            while($set=$result->fetch()):// $set=array(mahh:24, tenhh: giày....)
                        ?>
                        <span class="btn-group-toggle " data-toggle="buttons" >
                            <label onchange="reviewtp(<?php $idtp=$set['idtopping']; echo '`'.$idtp.'`'; ?>)" class="mb-2 btn btn-info"style="height:44px;">
                                <input type="checkbox" id="<?php $idtp=$set['idtopping']; echo $idtp; ?>" 
                                autocomplete="off" name="<?php $idtp=$set['idtopping']; echo $idtp; ?>">
                                <div style="font-size:15px;padding-top: 4px;padding-right: 4px;padding-left: 4px;"><?php echo $set['tentopping']; ?></div>
                            </label>
                        </span>
                        <?php
                            endwhile;
                        ?>
            <?php
                }
            ?>
                    <style>
                    .btn-group-toggle label {
                    background-color: white;
                    color:black;
                    }
                    </style>
                        <div style="padding-bottom: 10px;padding-top: 15px;font-size:15px;">Số Lượng:</div>
                        <input class="form-control font-weight-bold" style="width:90px;height:30px; font-size:13px;" type="number" id="soluong" name="soluong" 
                        min="1" max="100" value="<?php if(isset($_POST['soluong'])){ echo $_POST['soluong'];}else{echo 1;} ?>" size="10" />
                    <div class="action">
                        <button class="add-to-cart btn btn-info mt-3" style="height:50px;" type="submit" data-toggle="modal" data-target="#myModal">
                            <div style="font-size:15px;padding-right: 4px;padding-left: 4px;">
                                <b>Thêm vào giỏ hàng</b>
                            </div>
                        </button>
                        <a href="#" target="_blank"> <button class="like btn btn-info mt-3" style="height:50px;" type="button"><span class="fa fa-heart ml-1 mr-1"></span></button></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- </div> -->
</article>
<div class="container">
    <div class="container">
        <div class="container">
            <div class="container">
                <div class="container">
                    <br>
                    <ul class="preview-thumbnail nav nav-tabs mb-3"><h4><b>Bình luận</b></h4></ul>
                    <p class="float-left"><b> </b></p>
                    <?php 
                        if(isset($_SESSION['makh'])){
                            $makh=$_SESSION['makh'];
                    ?>
                        <form action="index.php?action=sanphamchitiet&id=<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" method="post">
                            <div class="row">
                                <input type="hidden" name="txtmasp" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>"/>
                                <img src="Content/imgCOFFEE/people.png" width="40px" height="40px" class="mr-3 ml-5 mt-2 mb-1"/>
                                <textarea class="form-control font-weight-bold" style="width:500px;height:50px; font-size:13px;" class="input-field mt-2 mb-2" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận" maxlength="197"></textarea>
                                <input  type="submit" class="btn btn-primary ml-3" style="height: 50px;" id="submitButton" value="Bình Luận" />           
                            </div>
                        </form>
                    <?php 
                        }
                        else
                        {
                            echo "<p>Vui lòng <a href='index.php?action=login' class='text-info'><b>đăng nhập</b></a> 
                            hoặc <a href='index.php?action=registration' class='text-info'><b>đăng ký</b></a> để bình luận!</p>";
                        }
                    ?>
                    <br>
                    <ul class="preview-thumbnail nav nav-tabs"><h4><b>Các bình luận</b></h4></ul>
                    <p class="float-left"><b> </b></p>
                        <?php
                            $cmt = new binhluan();
                            if(isset($_GET['id']))
                            { 
                                $id=$_GET['id'];
                            }
                            $result=$cmt->getCommentTheoID($id);// view lấy đc dữ liệu là 8 san phẩm
                            // đồ dữ liệu lên views
                            while($set=$result->fetch()):
                        ?>
                        <div class="row ">
                            <div class="mt-3 mb-3 text-left col-lg-8 ">
                                <div class="row">
                                    <div class="col-lg-1 ml-3">
                                        <img src="Content/imgCOFFEE/people.png" width="40px" height="40px" class="mr-5 mt-2 mb-1"/>
                                    </div>
                                    <div class="col-lg-10 ml-1 form-control" style='padding-bottom:95px;'>
                                        <h5 class=""><?php echo $set['tenkh'] ?></h5>
                                        <div class="stars mb-2">
                                            <span class="fa fa-star <?php if($set['rating'] >= 1){echo 'checked';} ?>"></span>
                                            <span class="fa fa-star <?php if($set['rating'] >= 2){echo 'checked';} ?>"></span>
                                            <span class="fa fa-star <?php if($set['rating'] >= 3){echo 'checked';} ?>"></span>
                                            <span class="fa fa-star <?php if($set['rating'] >= 4){echo 'checked';} ?>"></span>
                                            <span class="fa fa-star <?php if($set['rating'] >= 5){echo 'checked';} ?>"></span>
                                        </div>
                                        <?php echo $set['content'] ?>
                                        <!-- <?php echo $set['luotthich'] ?> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endwhile;
                            if(isset($_POST['txtmasp']) && isset($_POST['comment']))
                            {
                                $masp = $_POST['txtmasp'];
                                $comment = $_POST['comment'];
                                $sp=new binhluan();
                                $sp->addComment($makh,$masp,$comment,5);
                                echo "<script>alert('Đã gửi bình luận của bạn!');</script>";
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanphamchitiet&id='.$masp.'"/>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    //chuyền dữ liệu đi
    if(isset($_POST['sizee']) && isset($_POST['soluong']) && isset($_POST['thanhtien']) && isset($_POST['thanhtiengoc']))
    {
        $thanhtien = $_POST['thanhtien'];
        $thanhtiengoc = $_POST['thanhtiengoc'];
        $size = $_POST['sizee'];
        $soluong = $_POST['soluong'];
        $topping='';
        $dem=0;
        if(isset($_POST['1']))
        {
            $topping = $topping."1";
        }
        else
        {
            $topping = $topping."0";
            $dem++;
        }
        if(isset($_POST['2']))
        {
            $topping = $topping." 2";
        }
        else
        {
            $topping = $topping." 0";
            $dem++;
        }
        if(isset($_POST['3']))
        {
            $topping = $topping." 3";
        }
        else
        {
            $topping = $topping." 0";
            $dem++;
        }
        if(isset($_POST['4']))
        {
            $topping = $topping." 4";
        }
        else
        {
            $topping = $topping." 0";
            $dem++;
        }
        if(isset($_POST['5']))
        {
            $topping = $topping." 5";
        }
        else
        {
            $topping = $topping." 0";
            $dem++;
        }
        if(isset($_POST['6']))
        {
            $topping = $topping." 6";
        }
        else
        {
            $topping = $topping." 0";
            $dem++;
        }
        if(isset($_POST['7']))
        {
            $topping = $topping." 7";
        }
        else
        {
            $topping = $topping." 0";
            $dem++;
        }
        if(isset($_POST['8']))
        {
            $topping = $topping." 8";
        }
        else
        {
            $topping = $topping." 0";
            $dem++;
        }
        if($dem == 8)
        {
            $topping = 0;
        }
        $cart = new cart();
        $cart->addCart($id, $size, $topping,$soluong,$thanhtien,$thanhtiengoc);
        echo '<script> alert("Đã thêm vào giỏ hàng!"); </script>';
    }
?>
<script>
    //review giá sản phẩm
    var inputValuegia = document.getElementById("gia").value;
    var inputValuegiagoc = document.getElementById("giagoc").value;
    var ghinhogia=0;
    var ghinhogiagoc=0;
    var giatp = 0;
    var giagoctp = 0;
    ghinhogia = (inputValuegia*1 + 0)/1000;
    ghinhogiagoc = (inputValuegiagoc*1 + 0)/1000;
    var loai = 'S';
    getGiatri();
    function review(check)
    {
        loai = check;
        if(check == 'S')
        {
            ghinhogia = (inputValuegia*1 + 0)/1000;
            ghinhogiagoc = (inputValuegiagoc*1 + 0)/1000;
        }
        if(check == 'M')
        {
            ghinhogia = (inputValuegia*1 + 6000)/1000;
            ghinhogiagoc = (inputValuegiagoc*1 + 6000)/1000;
        }
        if(check == 'L')
        {
            ghinhogia = (inputValuegia*1 + 10000)/1000;
            ghinhogiagoc = (inputValuegiagoc*1 + 10000)/1000;
        }
        getGiatri();
    }
    function reviewS(check)
    {
        if(check == 'S')
        {
            ghinhogia = (inputValuegia*1 + 0)/1000;
            ghinhogiagoc = (inputValuegiagoc*1 + 0)/1000;
        }
        if(check == 'M')
        {
            ghinhogia = (inputValuegia*1 + 6000)/1000;
            ghinhogiagoc = (inputValuegiagoc*1 + 6000)/1000;
        }
        if(check == 'L')
        {
            ghinhogia = (inputValuegia*1 + 10000)/1000;
            ghinhogiagoc = (inputValuegiagoc*1 + 10000)/1000;
        }
    }
    
    function reviewtp(id)
    {
        // console.log(document.getElementById(id).checked);
        if(document.getElementById(id).checked)
        {
            giatp = giatp*1 + 10;
            giagoctp = giagoctp*1 + 10;
        }
        else
        {
            giatp = giatp*1 - 10;
            giagoctp = giagoctp*1 - 10;
        }
        console.log(giatp);
        console.log(giagoctp);
        getGiatri();
    }
    function getGiatri()
    {
        reviewS(loai);
        ghinhogia = ghinhogia + giatp;
        ghinhogiagoc = ghinhogiagoc+ giagoctp;
        document.getElementById('htgia').innerHTML = ghinhogia + '.000 VNĐ';
        document.getElementById('htgiagoc').innerHTML = ghinhogiagoc + '.000 VNĐ';
        //truyền giá đi
        document.getElementById('htgiaT').value = ghinhogia;
        document.getElementById('htgiagocT').value = ghinhogiagoc;
    }
</script>