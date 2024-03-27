<?php 
  if(!isset($_SESSION['makh']))
  {
    echo '<script> alert("Vui lòng đăng nhập hoặc đăng ký để thanh toán!"); </script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
  }
  else
  {
    $tongtien = new cart();
    $tongtien1 = $tongtien->getAllTotal();
    $tongtien1 = $tongtien1*1000;
    $hd = new order();
    $makh = $_SESSION['makh'];
    $ngay = new DateTime('now');
    $ngaydat = $ngay->format('Y-m-d');
    $result = $hd->addHoadon($makh,$ngaydat,$tongtien1);
  }
?>
<div class="table-responsive">
 
    <form action="" method="post">
      <table class="table table-bordered" border="0">
     
                        
       <tr>
          <td colspan="4">
            <h2 style="color: red;"><b>HÓA ĐƠN</b></h2>
          </td>
        </tr>
      <tr>
          <td colspan="2"><b>Số Hóa đơn: </b>
            <?php
              $hoadon1 = new order;
              $hoadon2 = $hoadon1->soHoadon($_SESSION['makh']);
              while($set=$hoadon2->fetch())
              {
                echo $set['masohd'];
                
            ?>
          </td>
          <td colspan="2"> <b>Ngày lập: </b> <?php echo $set['ngaydat'];
              } ?></td>
        </tr>
       <tr>
          <td colspan="2"><b>Họ và tên: </b> <?php echo $_SESSION['tenkh']; ?></td>
          <td colspan="2"></td>
        </tr>
       <tr>
          <td colspan="2"><b>Địa chỉ: </b> <?php echo $_SESSION['diachi']; ?></td>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><b>Số điện thoại: </b> <?php echo $_SESSION['sodienthoai']; ?></td>
          <td colspan="2"></td>
        </tr>
      </table>
    </form>
</div>
</div>
<div class="table-responsive">
  <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
    {
  ?>
    <!-- <a value="index.php?action=cart_detele" action="index.php?action=cart_detele"> -->
    <form action="" method="post">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td colspan="5"><h1 style="color: red;" class="text-center mt-3 mb-3">
            </td>
          </tr>
          <tr class="table-success">
            <th><div class="form-check mb-2">
              STT
            </div></th>
            <th><h5><b>Thông Tin Sản Phẩm</b></h5></th>
            <th><h5><b>Tùy Chọn Của Bạn</b></h5></th>
            <th colspan="2"><h5><b>Giá</b></h5></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $j = 0;
            foreach ($_SESSION['cart'] as $i)
            {
              $j ++;           
          ?>
            <tr>
              <td>
                <div class="form-check mb-auto">
                  <label class="form-check-label ml-2 mt-5">
                    <?php echo $j; ?>
                  </label>
                </div>
              </td>
              <td>
                <img width="140px" height="140px" src="Content/imgCOFFEE/<?php echo $i['hinh']; ?>">
                <font color="red" style="font-size: 13px;"><b><?php echo $i['tensp']; ?></b></font>
              </td>
              <?php 
                if($i['size']!='emty')
                {
              ?>
              <td>
                <b><span style="font-size: 14px;">Size:</span></b>
                <span>
                <?php
                  if($i['size'] == 'M')
                  {
                    echo "<font style='font-size: 13px;' class='ml-1'>".$i['size']."<i> + 6.000 VNĐ</i></font>";
                  }
                  elseif($i['size'] == 'L')
                  {
                    echo "<font style='font-size: 13px;' class='ml-1'>".$i['size']."<i> + 10.000 VNĐ</i></font>";
                  }
                  else
                  {
                    echo "<font style='font-size: 13px;' class='ml-1'>".$i['size']."<i> + 0 VNĐ</i></font>";
                  }
                ?>
                </span>
                <br>
                <b><span style="font-size: 14px;">Topping:</span></b>
                <?php
                  if($i['topping'] != 0)
                  {
                    $mangTopping = explode(" ",$i['topping']);
                    for($i1 = 0; $i1 <= 7; $i1++)
                    {
                      if($mangTopping[$i1] != 0)
                      {
                        $sanpham1 = new sanpham();
                        $sp1 = $sanpham1->getToppingTheoID($mangTopping[$i1]);
                        while($set1=$sp1->fetch())
                        {
                            $tentopping = $set1['tentopping'];
                            echo '<br><font style="font-size: 13px;" class="ml-3">'.
                            $tentopping."<i> + 10.000 VNĐ</i></font>";
                        }
                      }
                    } 
                  }
                ?>
              </td>
              <?php 
                }
                else
                {
                  echo "<td><font style='font-size: 13px;' class='ml-1'><i>không có tùy chọn!</i></font></td>";
                }
              ?>
              <td>
                <b><span style="font-size: 14px;">Đơn Giá:</span></b>
                <br>
                <font color="red" style="font-size: 13px;" class="ml-2">
                  <b><i><?php echo $i['dongia'].'.000 VNĐ'?></i></b>
                </font>
                <?php
                  if($i['giagoc'] != $i['dongia'])
                  {
                ?>
                  <strike style="font-size: 13px;" ><?php echo $i['giagoc'].'.000 VNĐ'?></strike>
                <?php 
                  }
                ?>
                <br>
                <span style="font-size: 14px;"><b>Số Lượng:</b></span>
                <div class="form-group">
                  <input type="number" style="width:125px;height:30px;font-size:13px;"
                  class="form-control mt-1 ml-2" name="newqty[]" id="" aria-describedby="helpId"
                  value='<?php echo $i['soluong'] ?>' disabled>
                  <p style="float: right;" class='mb-5'> Thành Tiền: 
                    <?php 
                      if($i['thanhtien']>1000)
                      {
                        $duoi=$i['thanhtien']%1000;
                        $tru='0.'.$duoi;
                        $dau= $i['thanhtien']/1000 - $tru*1;
                        $xong= $dau.'.'.$duoi;
                        echo  $xong .'.000 VNĐ';
                      }
                      else
                      {
                        echo $i['thanhtien'].'.000 VNĐ';
                      }
                    ?>
                  </p>
              </td>

            </tr></div>
          <?php
            }
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <?php
                $tongtien = new cart();
                if($tongtien->getAllTotal()>1000)
                {
                  echo $tongtien->getAllTotal()/1000 .'.000 VNĐ';
                }
                else
                {
                  echo $tongtien->getAllTotal().'.000 VNĐ';
                }
              ?>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  <?php
    }
    else
    {
      echo '<script> alert("Giỏ hàng còn trống!"); </script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    }
  ?>
</div>
</div>