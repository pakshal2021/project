<?php 
include 'connection.php';

if (isset($_REQUEST['save'])) {
        $categoryId = !empty($_REQUEST['category_id']) ? $_REQUEST['category_id'] : 0; 
        $subCategory = !empty($_REQUEST['sub_category']) ? $_REQUEST['sub_category'] : '';
        $subCategoryDesc = !empty($_REQUEST['sub_category_desc']) ? $_REQUEST['sub_category_desc'] : '';
        /*echo '<pre>';
        print_r($_REQUEST);
        //die;*/       
        $subCategoryId = isset($_REQUEST['sub_category_id']) ? $_REQUEST['sub_category_id'] : 0;        

        if ($subCategoryId) {
            $sql = "UPDATE `sub_category` SET `category_id` = '{$categoryId}',`sub_category` = '{$subCategory}', `sub_category_desc` = '{$subCategoryDesc}' WHERE `sub_category_id` = $subCategoryId";
        } else {
            $sql ="INSERT INTO `sub_category`(`sub_category`,`category_id`,`sub_category_desc`) VALUES ('{$subCategory}','{$categoryId}','{$subCategoryDesc}')"; 
        }
        if (mysqli_query($conn, $sql)) {
            echo "<script>
              alert('Your data is successfully saved.');
              window.location.href='list_sub_category.php';
            </script>";            
        } else {
            echo "<script>
              alert('Opps Something Wrong Please try again.!!');
              window.location.href='list_sub_category.php';
            </script>";  
        }
 }

?>