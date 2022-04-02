<?php 
include 'connection.php';

if (isset($_REQUEST['save'])) {

/* echo '<pre>';
print_r($_FILES);
echo '</pre>';
die;*/
        $product_name=$_REQUEST['product_name'];
        $product_description=$_REQUEST['product_desc'];

        $product_price=$_REQUEST['product_price'];
        $product_quantity=$_REQUEST['product_qnt'];
        $product_image='';
        $subcategory_id=$_REQUEST['sub_category_id'];
   
        $productId = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : 0;
                              
        if (!empty($_FILES["product_image"])) {
            $imagename = $product_image = $_FILES["product_image"]["name"];
            $temp_name = $_FILES["product_image"]["tmp_name"];
            $ext      = $ext = strtolower(pathinfo($imagename, PATHINFO_EXTENSION));
            $imagename = $imagename.".". $ext;
            $target_path = "../images/products/" . $imagename;
            move_uploaded_file($temp_name, $target_path);
        }

        if ($productId) {
            $sql = "update product_detail set subcat_id='$subcategory_id',product_name='$product_name',product_desc='$product_description',product_price='$product_price',product_qnt='$product_quantity',product_img='$product_image'  where product_id='$productId' ";       

        } else {
             $sql ="INSERT INTO product_detail(product_name,product_desc,product_price,product_qnt,product_img,subcat_id) values('$product_name','$product_description',$product_price,$product_quantity,'$product_image',$subcategory_id)";
        }
        
       // die;
        if (mysqli_query($conn, $sql)) {
            echo "<script>
              alert('Your data is successfully saved.');
              window.location.href='list_product.php';
            </script>";            
        } else {
            echo "<script>
              alert('Opps Something Wrong Please try again.!!');
              window.location.href='list_product.php';
            </script>";  
        }
 }

?>