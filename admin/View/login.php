<?php 
  if(isset($_SESSION['idnv']) )
  {
      echo '<script> alert("Bạn đã đăng nhập"); </script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';
  }
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<div class="login-page bk-img mb-5" style="background-image: url(img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x" style="color:#fff">Admin | Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" action="index.php?action=login" class="login-form">

									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="Username" name="txtusername" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="txtpassword" class="form-control mb">
		

									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>
								</form>
			<p style="margin-top: 4%" align="center"><a href="">Back to Home</a>	</p>
							</div>

						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
  if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
  {
    $username = $_POST['txtusername'];
    $matkhau = $_POST['txtpassword'];
    $SaftF = 'CoNcUkHoNglO';
    $SaftL = 'cOnCUnHoXiU';
    $passnew = md5($SaftF.$matkhau.$SaftL);
    $sp=new admin();
    $set=$sp->login($username,$passnew);
    if($set)
    {
      // nếu đăng nhập thành công, thì tạo session để lưu trữ thông tin kh
      $_SESSION['idnv']=$set['idnv'];
      $_SESSION['hoten']=$set['hoten'];
      $_SESSION['dia']=$set['dia'];
      echo '<script> alert("Đăng nhập thành công"); </script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';
    }
    else
    {
      echo '<script> alert("Đăng nhập không thành công"); </script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
    }
  }
?>