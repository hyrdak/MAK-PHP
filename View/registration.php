
<!--  -->
<div class="container"> 
 
 <div class="row"> 
  <div class="col-xs-12 col-sm-12 col-md-5 well well-sm col-md-offset-4"> 
   <legend><a href=""><i class="glyphicon glyphicon-globe"></i></a> Đăng ký thành viên!
   </legend> 
   <form  action="index.php?action=registration" method="post" class="form" role="form"> 
    <div class="row"> 
     <div class="col-xs-4 col-md-4"> <label for="email">Tên Khách Hàng:</label>
     </div>
     <div class="col-xs-8 col-md-8"><input class="form-control" name="txttenkh" placeholder="Tên khách hàng" required="" autofocus="" type="text"> </div> 
     <div class="col-xs-4 col-md-4"> <label for="email">Địa chỉ:</label>
     </div>
     <div class="col-xs-8 col-md-8"><input class="form-control" name="txtdiachi" placeholder="Địa chỉ khách hàng" required="" autofocus="" type="text"> </div> 
     <div class="col-xs-4 col-md-4"> <label for="email">Số Điện Thoại:</label>
     </div>
     <div class="col-xs-8 col-md-8"><input class="form-control" name="txtsodt" placeholder="Số điện thoại khách hàng" required="" autofocus="" type="text"> </div> 
     <div class="col-xs-4 col-md-4"><label for="email">Tên Đăng Nhập:</label>
     </div> 
     <div class="col-xs-8 col-md-8"><input class="form-control" name="txtusername" placeholder="Tên đăng nhập" required="" type="text"> 
     </div> 
    </div><label for="email">Email:</label> <input class="form-control" name="txtemail" placeholder="Email" type="email">
     <input class="form-control" name="txtpass" placeholder="Mật khẩu" type="password">
      <input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" type="password">
      
   
    <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng ký</button> 
   </form>
   <?php
      if(isset($_POST['txttenkh']) && isset($_POST['txtdiachi']) && isset($_POST['txtsodt']) && isset($_POST['txtusername'])
        && isset($_POST['txtemail']) && isset($_POST['txtpass']) && isset($_POST['retypepassword']))
      {
        if($_POST['txtpass'] == $_POST['retypepassword'])
        {
          $tenkh = $_POST['txttenkh'];
          $diachi = $_POST['txtdiachi'];
          $sdt = $_POST['txtsodt'];
          $username = $_POST['txtusername'];
          $email = $_POST['txtemail'];
          $matkhau = $_POST['txtpass'];
          $SaftF = 'CoNcUkHoNglO';
          $SaftL = 'cOnCUnHoXiU';
          $passnew = md5($SaftF.$matkhau.$SaftL);
          $sp=new sanpham();
          $test=$sp->registrationNew($tenkh,$username,$passnew,$email,$diachi,$sdt);
          echo "<script>alert('Đăng ký thàng công!');</script>";
          echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
        }
        else{
          echo "<script>alert('Nhập lại mật khẩu không trùng! Vui lòng nhập lại');</script>";
        }
      }
    ?>
  </div> 
 </div>
</div>
