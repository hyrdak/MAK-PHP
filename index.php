<?php
    // include_once "Model/connect.php";
    // include_once "Model/hanghoa.php";
    // spl_autoload: tự động load lên những file là hướng đối tượng tức là class
    //cách1
        session_start();
        spl_autoload_register('myModelLoader');
        function myModelLoader($className)
        {
            $path='Model/';
            include_once $path.$className.'.php';
        }
    //cách 2:
    // set_include_path(get_include_path().PATH_SEPARATOR.'Model/');
    // spl_autoload_extensions('.php');
    // spl_autoload_register();
?>
<!doctype html>
<html lang="en">
  <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="./Content/CSS/Csscuatoi.css"/>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </body>
</html>
<body>
    <?php
        // $jnj='SELECT * FROM `hanghoa`';
        $test = new connect();
        // echo $test->getList('SELECT * FROM `hanghoa`');
    ?>
      <!-- header -->
        <?php
            include_once("./Controller/headder.php");
        ?>
      <!-- hiên thi noi dung -->
      <div class="container">
          <div class="row">
              <!-- hien thi noi dung đây -->
                <?php
                    $Ctrl = 'home';
                    if(isset($_GET['action']))
                    {
                        $Ctrl = $_GET['action'];
                    }
                    include_once("./Controller/$Ctrl.php");
                ?>
          </div>
      </div>
    <!-- hiên thị footer -->
        <?php
            include_once("./Controller/footer.php");
        ?>
</body>
