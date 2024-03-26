<?php
    class cart
    {
        //thêm 1 sản phẩm vào trong cart
        function addCart($masp,$size,$topping,$soluong,$thanhtien,$thanhtiengoc)
        {
            $sanpham = new sanpham();
            $sp = $sanpham->getSanPhamTheoID($masp);
            while($set=$sp->fetch())
            {
                $tensp = $set['tensp'];
                $hinh = $set['hinh'];
            }
            $total = $thanhtien * $soluong;
            $kq = new cart();        
            if($kq->checkinCart($masp, $tensp, $hinh, $size, $topping, $thanhtien, $thanhtiengoc, $soluong, $total))
            {
            }
            else
            {
                $item = array(
                    'masp' => $masp,
                    'tensp' => $tensp,
                    'hinh' => $hinh,
                    'size' => $size,
                    'topping' => $topping,
                    'dongia' => $thanhtien,
                    'giagoc' => $thanhtiengoc,
                    'soluong' => $soluong,
                    'thanhtien' => $total,
                );
                // đem đối tượng add và giỏ hang a[]
                $_SESSION['cart'][] = $item;
            }
        }
        //Tổng tiền
        function getAllTotal()
        {
            $S = 0;
            foreach ($_SESSION['cart'] as $i)
            {
                $S += $i['thanhtien'];
            }
            return $S;
        }
        function checkinCart($masp, $tensp, $hinh, $size, $topping, $thanhtien, $thanhtiengoc, $soluong, $total)
        {
            for($i = 0; $i < count($_SESSION['cart']); $i++)
            {
                if(
                    $_SESSION['cart'][$i]['masp']==$masp &&
                    $_SESSION['cart'][$i]['tensp']==$tensp &&
                    $_SESSION['cart'][$i]['hinh']==$hinh &&
                    $_SESSION['cart'][$i]['size']==$size &&
                    $_SESSION['cart'][$i]['topping']==$topping
                )
                {
                    $_SESSION['cart'][$i]['soluong']+=$soluong;
                    $_SESSION['cart'][$i]['thanhtien']+=$thanhtien*$_SESSION['cart'][$i]['soluong'];
                    return true;
                }
            }
        }
    }
?>