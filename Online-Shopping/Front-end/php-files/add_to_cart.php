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

	$selectQry = $conn->query("SELECT qty FROM tbl_cart where `cart_id` = '{$cartId}' AND product_id = '{$pid}'");
    $currnetItem = mysqli_fetch_assoc($selectQry);

	if($currnetItem){ 
		echo "<script>
            alert('This Product is Already Available in your cart.');
            window.location.href='cart.php';
         </script>";
        return; 
	}

	 $sql = "INSERT INTO `tbl_cart`(`cart_id`,`product_id`, `qty`, `price`, `user_id`)
	     VALUES ('{$cartId}','{$pid}','{$qty}','{$price}','{$currentUserId}')";        
	
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Item are added to cart');
            window.location.href='cart.php';
         </script>";            
    } else {
      echo "<script>
            alert('Opps Something Wrong Please try again.!!');
            window.location.href='cart.php';
         </script>";  
    }  
 ?>