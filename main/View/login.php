<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-12 login-sec">
        <h3 class="text-center"><b>Login Now</b></h3>
        <form  action="index.php?action=login" class="login-form" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Username</label>
              <input type="text" class="form-control" name="txtusername" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-uppercase">Password</label>
              <input type="password" class="form-control" name="txtpassword" placeholder="">
            </div>
            <div class="form-check">
              <button class="btn btn-primary float-right" type="submit"> Đăng Nhập</button> 
            </div>
        </form>
        <div class="copy-text">Shop Giày <i class="fa fa-heart"></i> <a href="">shopgiay.com</a></div>
      </div>
    </div>
</section>
<?php
  if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
  {
    $username = $_POST['txtusername'];
    $matkhau = $_POST['txtpassword'];
    $SaftF = 'CoNcUkHoNglO';
    $SaftL = 'cOnCUnHoXiU';
    $passnew = md5($SaftF.$matkhau.$SaftL);
    $sp=new sanpham();
    $set=$sp->login($username,$passnew);
    if($set)
    {
      // nếu đăng nhập thành công, thì tạo session để lưu trữ thông tin kh
      $_SESSION['makh']=$set['makh'];
      $_SESSION['tenkh']=$set['tenkh'];
      $_SESSION['email']=$set['email'];
      $_SESSION['diachi']=$set['diachi'];
      $_SESSION['sodienthoai']=$set['sodienthoai'];
      echo '<script> alert("Đăng nhập thành công"); </script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    }
    else
    {
      echo '<script> alert("Đăng nhập không thành công"); </script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
    }
  }
?>