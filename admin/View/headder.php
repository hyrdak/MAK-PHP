<style type="text/css">
    .header_action_on
    {
        position: relative;
        display: inline-block;
    }
    .header_action
    {
        display:none;
    }
    .header_action_on:hover .header_action
    {
        display: block;
    }
</style>
<header class="no-gutters">
    <section>
                <nav class="navbar navbar-expand-lg navbar-light text-white " style="background-color:#b1282f;">
                    <ul class="navbar-nav">
                        <!-- Logo -->
                        <li>
                            <a href="index.php?action=sanpham" class='ml-5'><img height="75px" class='' src="..\/../Content/imgCOFFEE/White_logo.png" alt=""></a>
                        </li>
                        <li class="nav-item mt-3">
                            <a href="index.php?action=sanpham" class="nav-link text-white" style="font-size:18px">
                                <b>Trang Chủ</b>
                            </a>
                        </li>
                        <!-- Quản trị Doanh Mục -->
                        <li class="nav-item dropdown mt-3">
                            <a href="" class="nav-link text-white dropdown-toggle" style="font-size:18px" id="navbardrop" data-toggle="dropdown">
                                <b>Quản Trị Doanh Mục</b>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">Loại Sản Phẩm</a>
                                <a class="dropdown-item" href="">Sản Phẩm</a>
                                <a class="dropdown-item" href="#">Loại menu</a>
                            </div>
                        </li>
                        <!-- Thống kê -->
                        <li class="nav-item dropdown mt-3">
                            <a href="" class="nav-link text-white dropdown-toggle" style="font-size:18px" id="navbardrop" data-toggle="dropdown">
                                <b>Thống Kê</b>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Sản Phẩm bán được nhiều Nhất</a>
                                <a class="dropdown-item" href="#">Sản Phẩm chưa được giao</a>
                                <a class="dropdown-item" href="#">Sản phẩm bán ít nhất</a>
                                <a class="dropdown-item" href="">Thống kê</a>
                            </div>
                        </li>
                        <!-- Báo cáo -->
                        <li class="nav-item dropdown mt-3">
                            <a href="" class="nav-link text-white dropdown-toggle" style="font-size:18px" id="navbardrop" data-toggle="dropdown">
                                <b>Báo Cáo</b>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Tháng</a>
                                <a class="dropdown-item" href="#">Quý</a>
                                <a class="dropdown-item" href="#">Năm</a>
                            </div>
                        </li>
                        <!-- Báo cáo Tồn kho -->
                        <li class="nav-item mt-3">
                            <a href="" class="nav-link text-white" style="font-size:18px" id="navbardrop" data-toggle="dropdown">
                                <b>Tồn Kho</b>
                            </a>
                        </li>
                        <!-- Tài khoản -->
                        <li class="nav-item header_action_on mt-3">
                    <?php
                        if(isset($_SESSION['idnv']))
                        {
                    ?>
                        <div class="header_action_on" >
                            <button type="button" class="btn text-white" style="font-size:18px"><b>Tài khoản</b></button>
                            <div class="dropdown-menu header_action" style="font-size:18px;width:277px;height:95px">
                                <div class='ml-3 mb-1 ' style="font-size:15px">Xin chào, <?php echo $_SESSION['hoten'] ?></div>
                                <a href="index.php?action=dangxuat" class='text-white ml-2 mr-2'><button type="button" class="btn btn-info text-white ml-3 mt-2"><b>Đăng xuất</b></button></a>
                                <a href="" class='text-white ml-2 mr-2'><button type="button" class="btn btn-info text-white ml-1 mt-2"><b>Đơn hàng</b></button></a>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                        </li>
                    </ul>
                </nav>
                
    </section>
</header>