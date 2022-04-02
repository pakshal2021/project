<?php 
include 'connection.php';

if (isset($_REQUEST['save'])) {
        $category = $_REQUEST['category'];        
        $categoryDesc = $_REQUEST['category_desc'];        
        $categoryId = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : 0;        

        if ($categoryId) {
            $sql = "UPDATE `category` SET `category` = '{$category}', `category_desc` = '{$categoryDesc}' WHERE `category_id` = $categoryId";
        } else {
            $sql ="INSERT INTO `category`(`category`,`category_desc`) VALUES ('{$category}','{$categoryDesc}')";
        }
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>
              alert('Your data is successfully saved.');
              window.location.href='list_category.php';
            </script>";            
        } else {
            echo "<script>
              alert('Opps Something Wrong Please try again.!!');
              window.location.href='list_category.php';
            </script>";  
        }
 }

?>