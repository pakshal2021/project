<?php
 session_start();
 include "headerfooter/header.php";
 ?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="cssFiles/Login.css"/>
		<link rel="stylesheet" type="text/css" href="cssFiles/General.css"/>
		<link rel="stylesheet" type="text/css" href="cssFiles/table.css"/>
<title>Online Shopping</title>
<script type="text/javascript">

function validateform(){  
var bid=document.insert_product.brand_id.value;  
var sid=document.insert_product.subcat_id.value;  
var name=document.insert_product.product_name.value;  
var desc=document.insert_product.product_description.value;
var feature=document.insert_product.product_feature.value;
var price=document.insert_product.product_price.value;
var product_image=document.insert_product.product_image.value;
var qty=document.insert_product.product_quantity.value;

var ch=true;
var error="";
	
if (bid=="" || bid==null){  
  error+="Brand Name can't be blank. \n";  
  ch = false;  
}
if (sid=="" || sid==null){  
  error+="Category Name can't be blank. \n";  
  ch = false;  
} 

if (name==null || name==""){  
  error+="Product Name can't be blank. \n";  
  ch = false;  
} 	

 if(desc==null || desc==""){  
  error+="Description can't be blank. \n";  
  ch = false;  
} 
if(feature==null || feature==""){  
  error+="Features can't be blank. \n";  
  ch = false;  
}

 if(price==null || price==""){  
 error+="Price can't be blank. \n";  
  ch = false;  
}

	if( isNaN(price) )
	{
		error+="Please Enter Price. Must be numeric value\n";
		ch=false;
		
	}
 if(qty==null || qty==""){  
  error+="Quantity Name can't be blank. \n";  
  ch = false;   
}
	if( isNaN(qty) )
	{
		error+="Please Enter Quantity. Must be numeric value\n";
		ch=false;
		
	}
if(product_image==null || product_image==""){  
  error+="select Product image. \n";  
  ch = false;   
}
if(!product_image.match(/(\.jpg|\.jpeg|\.bmp|\.png)$/))
	{
		error+=" File extension not supported\n";
		ch=false;
	}

if(error!="")
	{
		alert("Following error occur:\n" +error);
		return ch;
	}
}  
</script>  
</head>

<body>
<form name="insert_product" action="insert_product_detail_act.php" method="post" >
<table align="center" border="2" bordercolor="#000000" class="bordered">
   <tr>
         <td>Brand Name</td>
		 <td><select name="brand_id" style="width:160; height:23;">
			      <option value="">Select Brand</option>
				  <?php 
			             include "include/conn.php";
	 
							 $q_select_brand_name="select * from brand_name";
							 $r_select_brand_name=mysqli_query($con,"$q_select_brand_name");
							 
			            while($row=mysqli_fetch_assoc($r_select_brand_name)){ ?>
						   <option value="<?php echo $row['brand_id'] ?>"><?php echo $row['brand_name']?></option>
						   
						 <?php } ?>
				</select>
		</td>
   </tr>
    <td> SubCategory Name</td>
		 <td><select name="subcat_id" style="width:160; height:23;">
			      <option value="">Select Category</option>
				  <?php 
			            
	 
							 $q_select_subcategory_name="select * from subcategory";
							 $r_select_subcategory_name=mysqli_query($con,"$q_select_subcategory_name");
							 
			            while($row=mysqli_fetch_assoc($r_select_subcategory_name)){ ?>
						   <option value="<?php echo $row['subcat_id'] ?>"><?php echo $row['subcat_name']?></option>
						   
						 <?php } ?>
				</select>
		</td>
   </tr>
   <tr>
         <td>Product Name</td>
		 <td><input type="text" name="product_name" style="width:160; height:23;" maxlength="50"/></td>
   </tr>
   <tr>
         <td>Product Description</td>
		 <td><textarea name="product_description" style="resize:none; width:160;" maxlength="100"></textarea></td>
   </tr>
   <tr>
         <td>Product feature</td>
		 <td><textarea name="product_feature" style="resize:none; width:160;" maxlength="500" ></textarea></td>
   </tr>
   <tr>
         <td>Product Price</td>
		 <td><input type="text" name="product_price" style="width:160; height:23;" maxlength="7"/></td>
   </tr>
    <tr>
         <td>Product Quantity</td>
		 <td><input type="text" name="product_quantity" style="width:160; height:23;" maxlength="3"/></td>
   </tr>
    <tr>
         <td>Product Image</td>
		 <td><input type="file" name="product_image" style=" height:23; width:180;" maxlength="100"/></td>
   </tr>
   
   <tr>		 
		 <td></td>
		 <td><input type="submit" name="submit" value="Submit" onClick="return validateform();"/>
		    <input type="button" name="cancel" value="Cancel" onClick="location.href='product_detail_select.php'"/></td>
	
   </tr>
</table>
</form>
</body>
</html>

