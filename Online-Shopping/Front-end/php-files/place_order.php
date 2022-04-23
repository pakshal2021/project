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
  $billingMobile = $_REQUEST['billing_mobile'];

  $userId = $currentUserId;
  $billinAddress = $_REQUEST['billing_address'].'-'. $_REQUEST['billing_city'].','.$_REQUEST['billing_zipcode'];
  $status = 'processing';
  $billingCity = $_REQUEST['billing_city'];

 $error ='';

    if (!$billingName) { 
      $error .= 'Please enter Billig Or Shipping Name.</br>';
    } 
 
    if (strlen($billingMobile) != 10 ) {
      $error .= 'Enter a valid phone number.</br>';
    }

    if (!$_REQUEST['billing_city']) {
      $error .= 'Please enter Billing or Shipping Address city.</br>';
    }

    if (!$_REQUEST['billing_zipcode']) {
      $error .= 'Please enter Billing or Shipping Address zipcode.</br>';
    }
 

$response = array();
if ($error) {
   $response['success'] = 0;
   $response['message'] = $error;
} else {
  $sql = "INSERT INTO
    `order_detail`(    
      `cart_id`,`user_id`,`billing_address`,`billing_name`,`status`,
      `billing_mobile`,`total`,`billing_city`
    )
  VALUES('{$cartId}','{$userId}','{$billinAddress}','{$billingName}','{$status}','{$billingMobile}','{$total}','{$billingCity}')";        
    
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