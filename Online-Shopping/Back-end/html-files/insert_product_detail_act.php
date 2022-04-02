<?php 
     include "include/conn.php";
	 
	 $brand_id=$_POST['brand_id'];
	 $subcategory_id=$_POST['subcat_id'];
	 
     $product_name=$_POST['product_name'];
	 $product_description=$_POST['product_description'];
	 $product_feature=$_POST['product_feature'];
	 
     $product_price=$_POST['product_price'];
	 $product_quantity=$_POST['product_quantity'];
	 $product_image=$_POST['product_image'];
	 
	 $q_insert_product_details="insert into product_detail(product_name,product_desc,product_feature,product_price,product_qnt,product_img,subcat_id,brand_id) values('$product_name','$product_description','$product_feature',$product_price,$product_quantity,'$product_image',$subcategory_id,$brand_id)";
     $r_insert_product_details=mysqli_query($con,"$q_insert_product_details");
	  
	    
	  if($r_insert_product_details){
			 header("location:insert_stock_act.php");
	  }	
	  else{
	     $_SESSION['message']['error']="record cant inserted successfully";
		  header("location:product_detail_select.php");
	  } 
?>