<?php
    if (!isset($_SESSION['cart']))
    {
        $_SESSION['cart']=array();
    }
    include "./View/cart.php";
?>