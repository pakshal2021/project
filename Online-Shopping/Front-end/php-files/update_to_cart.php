<?php

    include 'connection.php';

	$pid   = $_REQUEST['product_id'];
	$price = $_REQUEST['price'];

	$qty=1;


	if (isset($_SESSION['cart_id']) && $_SESSION['cart_id']) {
		$cartId = $_SESSION['cart_id'];
	} else {
		$cartId = substr(md5(mt_rand()), 0, 7);	
		$_SESSION['cart_id'] = $cartId;	
	}

    $selectQry = $conn->query("SELECT * FROM tbl_cart where `cart_id` = '{$cartId}' AND product_id = '{$pid}'");
    $currnetItem = mysqli_fetch_assoc($selectQry);
    $qty = $currnetItem['qty'];
    //$price = $currnetItem['price'];
    if (isset($_REQUEST['is_delete']) && $_REQUEST['is_delete']) {
        if ($qty > 1) {
    	   $qty = $qty - 1;
        } else {
            echo "<script>
            alert('Item 1 Quantity is reuired.');
            window.location.href='cart.php';
         </script>";   
        }
        //$price = $price*$qty;
    } else {
    	$qty = $qty + 1;
       // $price = $price*$qty;    	
    }

	$sql = "UPDATE `tbl_cart` SET `qty` = '{$qty}'/*,`price` = '{$price}'*/ WHERE `cart_id` ='{$cartId}' AND product_id = '{$pid}'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            window.location.href='cart.php';
         </script>";            
    } else {
      echo "<script>
            alert('Opps Something Wrong Please try again.!!');
            window.location.href='cart.php';
         </script>";  
    }  
 ?>