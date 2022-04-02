<?php

include 'connection.php';

if (isset($_REQUEST['product_id'])) {
    $pid   = $_REQUEST['product_id'];
	

	if (isset($_SESSION['cart_id']) && $_SESSION['cart_id']) {
		$cartId = $_SESSION['cart_id'];
	} else {
		$cartId = substr(md5(mt_rand()), 0, 7);	
		$_SESSION['cart_id'] = $cartId;	
	}
    $sql = "DELETE FROM tbl_cart where `cart_id` = '{$cartId}' AND product_id = '{$pid}'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Item delete successfully');
                window.location.href='cart.php';
             </script>";
    } else {
        echo "<script>
                alert('Opps something wents wrong...!!!');
                window.location.href='cart.php';
             </script>";
    }
}
?>