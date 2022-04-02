<?php

    include 'connection.php';

	if (isset($_SESSION['cart_id']) && $_SESSION['cart_id']) {
		$cartId = $_SESSION['cart_id'];
	} else {
		$cartId = substr(md5(mt_rand()), 0, 7);	
		$_SESSION['cart_id'] = $cartId;	
	}

  $userId = $currentUserId;
  $total = $_REQUEST['total'];
  $billingName = $_REQUEST['billing_name'];
  $shippingName = $_REQUEST['shipping_name']; 
  $billingMobile = $_REQUEST['billing_mobile'];
  $shippingMobile = $_REQUEST['shipping_mobile'];

  $userId = $currentUserId;
  $billinAddress = $_REQUEST['billing_city'].'-'. $_REQUEST['billing_zipcode'].','.$_REQUEST['billing_country'];
  $shippingAddress = $_REQUEST['shipping_city'].'-'. $_REQUEST['shipping_zipcode'].','.$_REQUEST['shipping_country'];
  $status = 'processing';
  $billingCity = $_REQUEST['billing_city'];
  $shippingCity = $_REQUEST['shipping_city'];

 $error ='';

    if (!$billingName || !$shippingName) { 
      $error .= 'Please enter Billig Or Shipping Name.</br>';
    } 
 
    if (strlen($billingMobile) != 10 OR strlen($shippingMobile) != 10) {
      $error .= 'Enter a valid phone number.</br>';
    }
 
    if (!$_REQUEST['billing_country'] || !$_REQUEST['shipping_country']) {
      $error .= 'Please select Billing or Shipping Address country.</br>';
    }

    if (!$_REQUEST['billing_city'] || !$_REQUEST['shipping_city']) {
      $error .= 'Please enter Billing or Shipping Address city.</br>';
    }

    if (!$_REQUEST['billing_zipcode'] || !$_REQUEST['shipping_zipcode']) {
      $error .= 'Please enter Billing or Shipping Address zipcode.</br>';
    }
 

$response = array();
if ($error) {
   $response['success'] = 0;
   $response['message'] = $error;
} else {
  $sql = "INSERT INTO
    `order_detail`(    
      `cart_id`,`user_id`,`billing_address`,`shipping_address`,`billing_name`,`shipping_name`,`status`,
      `billing_mobile`,`shipping_mobile`,`total`,`billing_city`,`shipping_city`
    )
  VALUES('{$cartId}','{$userId}','{$billinAddress}','{$billinAddress}','{$billingName}','{$shippingName}','{$status}','{$billingMobile}','{$shippingMobile}','{$total}','{$billingCity}','{$shippingCity}')";        
    
      if (mysqli_query($conn, $sql)) {
        $_SESSION['cart_id'] = ''; 
        $response['success'] = 1;
      } else {
        $response['success'] = 0;
      } 
}

/*echo '<pre>';
print_r($response);
die;*/
echo $response['success'];
return ;

 ?>